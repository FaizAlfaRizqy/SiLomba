<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TimController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NotifikasiController as AdminNotifikasiController;
use App\Http\Controllers\Mahasiswa\ChatController;
use App\Http\Controllers\Mahasiswa\LombaController;
use App\Http\Controllers\Mahasiswa\MyTeamController;
use App\Http\Controllers\Mahasiswa\NotifikasiController;
use App\Http\Controllers\Mahasiswa\ProfileController as MahasiswaProfileController;
use App\Http\Controllers\Mahasiswa\TeamController;
use App\Http\Controllers\Mahasiswa\TimFinderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/terms', function() {
    return view('terms');
})->name('terms');

Route::get('/privacy', function() {
    return view('privacy');
})->name('privacy');

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
            Route::get('/tim-finder', [TimFinderController::class, 'index'])->name('tim-finder.index');
            Route::get('/tim-finder/{slot}', [TimFinderController::class, 'show'])->name('tim-finder.show');
            Route::post('/tim-finder/{slot}/apply', [TimFinderController::class, 'apply'])->name('tim-finder.apply');

            // My Teams
            Route::get('/my-teams', [MyTeamController::class, 'index'])->name('my-teams.index');
            Route::get('/my-teams/{tim}', [MyTeamController::class, 'show'])->name('my-teams.show');

            Route::post('/my-teams/lamaran/{lamaran}/terima', [MyTeamController::class, 'terimaLamaran'])->name('my-teams.lamaran.terima');
            Route::post('/my-teams/lamaran/{lamaran}/tolak', [MyTeamController::class, 'tolakLamaran'])->name('my-teams.lamaran.tolak');
            Route::delete('/my-teams/lamaran/{lamaran}/cancel', [MyTeamController::class, 'cancelLamaran'])->name('my-teams.cancel');

            // Notifications
            Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');
            Route::post('/notifikasi/{id}/baca', [NotifikasiController::class, 'tandaiBaca'])->name('notifikasi.baca');
            Route::post('/notifikasi/baca-semua', [NotifikasiController::class, 'bacaSemua'])->name('notifikasi.baca-semua');
            Route::get('/notifikasi/unread-count', [NotifikasiController::class, 'unreadCount'])->name('notifikasi.unread-count');

            // Chat Tim
            Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
            Route::get('/chat/{tim}', [ChatController::class, 'show'])->name('chat.show');
            Route::post('/chat/{tim}/kirim', [ChatController::class, 'kirim'])->name('chat.kirim');
            Route::post('/chat/{tim}/upload', [ChatController::class, 'upload'])->name('chat.upload');
            Route::get('/chat/{tim}/pesan-baru', [ChatController::class, 'pesanBaru'])->name('chat.pesan-baru');
            Route::post('/chat/pesan/{pesan}/pin', [ChatController::class, 'pinPesan'])->name('chat.pin');

            // Team Management (Ketua)
            Route::get('/team/create', [TeamController::class, 'create'])->name('team.create');
            Route::post('/team', [TeamController::class, 'store'])->name('team.store');
            Route::get('/team/manage/{id}', [TeamController::class, 'manage'])->name('team.manage');
            Route::post('/lamaran/accept/{id}', [TeamController::class, 'acceptApplication'])->name('lamaran.accept');
            Route::post('/lamaran/reject/{id}', [TeamController::class, 'rejectApplication'])->name('lamaran.reject');
        });
    });

    // Admin Routes
    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/export-pdf', [DashboardController::class, 'exportPDF'])->name('export.pdf');
        Route::get('/export-excel', [DashboardController::class, 'exportExcel'])->name('export.excel');
        Route::resource('lomba', App\Http\Controllers\Admin\LombaController::class);
        Route::post('lomba/{lomba}/toggle-status', [App\Http\Controllers\Admin\LombaController::class, 'toggleStatus'])->name('lomba.toggle-status');
        Route::resource('users', UserController::class);
        Route::resource('tim', TimController::class)->only(['index', 'show', 'destroy']);
        Route::get('/notifikasi', [AdminNotifikasiController::class, 'index'])->name('notifikasi.index');
        Route::post('users/{user}/toggle', [UserController::class, 'toggleStatus'])->name('users.toggle');
    });

    // Standard Breeze Profile (Optional, we use MahasiswaProfile)
    Route::get('/profile-settings', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile-settings', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile-settings', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
