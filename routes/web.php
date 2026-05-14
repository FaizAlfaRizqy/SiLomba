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
            Route::get('/tim-finder', [LombaController::class, 'timFinder'])->name('tim-finder');
            Route::get('/tim-finder/slot/{id}', [LombaController::class, 'slotShow'])->name('tim-finder.show');
            Route::post('/tim-finder/apply/{slotId}', [\App\Http\Controllers\Mahasiswa\TeamController::class, 'apply'])->name('team.apply');
            
        // Team Management
        Route::get('/team/create', [\App\Http\Controllers\Mahasiswa\TeamController::class, 'create'])->name('team.create');
        Route::post('/team', [\App\Http\Controllers\Mahasiswa\TeamController::class, 'store'])->name('team.store');
        Route::get('/my-teams', [\App\Http\Controllers\Mahasiswa\TeamController::class, 'myTeams'])->name('team.my');
        Route::get('/team/manage/{id}', [\App\Http\Controllers\Mahasiswa\TeamController::class, 'manage'])->name('team.manage');
        Route::post('/lamaran/accept/{id}', [\App\Http\Controllers\Mahasiswa\TeamController::class, 'acceptApplication'])->name('lamaran.accept');
        Route::post('/lamaran/reject/{id}', [\App\Http\Controllers\Mahasiswa\TeamController::class, 'rejectApplication'])->name('lamaran.reject');
        
        // Chat
        Route::get('/team/{teamId}/messages', [\App\Http\Controllers\Mahasiswa\ChatMessageController::class, 'index'])->name('chat.index');
        Route::post('/team/{teamId}/messages', [\App\Http\Controllers\Mahasiswa\ChatMessageController::class, 'store'])->name('chat.store');
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
