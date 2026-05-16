<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Mahasiswa\ProfileController as MahasiswaProfileController;
use App\Http\Controllers\Mahasiswa\LombaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes (Breeze)
require __DIR__.'/auth.php';

// Authenticated Routes
Route::middleware(['auth', 'verified'])->group(function () {
    
    // Universal Dashboard Redirect
    Route::get('/dashboard', function () {
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('mahasiswa.dashboard');
    })->name('dashboard');

    // Mahasiswa Routes
    Route::middleware(['role:mahasiswa|ketua_tim'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
        
        // Dashboard
        Route::get('/dashboard', function () {
            return view('mahasiswa.dashboard');
        })->middleware('profile.complete')->name('dashboard');

        // Profile Completion & Management
        Route::get('/profile', [MahasiswaProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile', [MahasiswaProfileController::class, 'update'])->name('profile.update');
        Route::get('/notifications', [MahasiswaProfileController::class, 'notifications'])->name('notifications');
        
        // Public Portfolio
        Route::get('/{nim}/portofolio', [MahasiswaProfileController::class, 'portfolio'])->name('portfolio');

        // Lomba Directory
        Route::middleware('profile.complete')->group(function () {
            Route::resource('lomba', LombaController::class)->only(['index', 'show']);
            
            // Tim Finder
            Route::get('/tim-finder', [\App\Http\Controllers\Mahasiswa\TimFinderController::class, 'index'])->name('tim-finder.index');
            Route::get('/tim-finder/{slot}', [\App\Http\Controllers\Mahasiswa\TimFinderController::class, 'show'])->name('tim-finder.show');
            Route::post('/tim-finder/{slot}/apply', [\App\Http\Controllers\Mahasiswa\TimFinderController::class, 'apply'])->name('tim-finder.apply');

            // My Teams
            Route::get('/my-teams', [\App\Http\Controllers\Mahasiswa\MyTeamController::class, 'index'])->name('my-teams.index');
            Route::get('/my-teams/{tim}', [\App\Http\Controllers\Mahasiswa\MyTeamController::class, 'show'])->name('my-teams.show');
            
            Route::post('/my-teams/lamaran/{lamaran}/terima', [\App\Http\Controllers\Mahasiswa\MyTeamController::class, 'terimaLamaran'])->name('my-teams.lamaran.terima');
            Route::post('/my-teams/lamaran/{lamaran}/tolak', [\App\Http\Controllers\Mahasiswa\MyTeamController::class, 'tolakLamaran'])->name('my-teams.lamaran.tolak');
            Route::delete('/my-teams/lamaran/{lamaran}/cancel', [\App\Http\Controllers\Mahasiswa\MyTeamController::class, 'cancelLamaran'])->name('my-teams.cancel');

            // Notifications
            Route::get('/notifikasi', [\App\Http\Controllers\Mahasiswa\NotifikasiController::class, 'index'])->name('notifikasi.index');
            Route::post('/notifikasi/{id}/baca', [\App\Http\Controllers\Mahasiswa\NotifikasiController::class, 'tandaiBaca'])->name('notifikasi.baca');
            Route::post('/notifikasi/baca-semua', [\App\Http\Controllers\Mahasiswa\NotifikasiController::class, 'bacaSemua'])->name('notifikasi.baca-semua');
            Route::get('/notifikasi/unread-count', [\App\Http\Controllers\Mahasiswa\NotifikasiController::class, 'unreadCount'])->name('notifikasi.unread-count');

            // Chat Tim
            Route::get('/chat', [\App\Http\Controllers\Mahasiswa\ChatController::class, 'index'])->name('chat.index');
            Route::get('/chat/{tim}', [\App\Http\Controllers\Mahasiswa\ChatController::class, 'show'])->name('chat.show');
            Route::post('/chat/{tim}/kirim', [\App\Http\Controllers\Mahasiswa\ChatController::class, 'kirim'])->name('chat.kirim');
            Route::post('/chat/{tim}/upload', [\App\Http\Controllers\Mahasiswa\ChatController::class, 'upload'])->name('chat.upload');
            Route::get('/chat/{tim}/pesan-baru', [\App\Http\Controllers\Mahasiswa\ChatController::class, 'pesanBaru'])->name('chat.pesan-baru');
            Route::post('/chat/pesan/{pesan}/pin', [\App\Http\Controllers\Mahasiswa\ChatController::class, 'pinPesan'])->name('chat.pin');
            
            // Team Management (Ketua)
            Route::get('/team/create', [\App\Http\Controllers\Mahasiswa\TeamController::class, 'create'])->name('team.create');
            Route::post('/team', [\App\Http\Controllers\Mahasiswa\TeamController::class, 'store'])->name('team.store');
            Route::get('/team/manage/{id}', [\App\Http\Controllers\Mahasiswa\TeamController::class, 'manage'])->name('team.manage');
            Route::post('/lamaran/accept/{id}', [\App\Http\Controllers\Mahasiswa\TeamController::class, 'acceptApplication'])->name('lamaran.accept');
            Route::post('/lamaran/reject/{id}', [\App\Http\Controllers\Mahasiswa\TeamController::class, 'rejectApplication'])->name('lamaran.reject');
        });
    });

    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/export-pdf', [\App\Http\Controllers\Admin\DashboardController::class, 'exportPDF'])->name('export.pdf');
        Route::get('/export-excel', [\App\Http\Controllers\Admin\DashboardController::class, 'exportExcel'])->name('export.excel');
        Route::resource('lomba', \App\Http\Controllers\Admin\LombaController::class);
        Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('tim', \App\Http\Controllers\Admin\TimController::class)->only(['index', 'show', 'destroy']);
        Route::post('users/{user}/toggle', [\App\Http\Controllers\Admin\UserController::class, 'toggleStatus'])->name('users.toggle');
    });

    // Standard Breeze Profile (Optional, we use MahasiswaProfile)
    Route::get('/profile-settings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-settings', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile-settings', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
