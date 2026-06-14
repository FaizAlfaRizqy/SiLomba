<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Models\Notification;
use App\Models\Lomba;
use App\Models\User;
use Carbon\Carbon;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

// Scheduled Task: Send automated deadline reminders for H-7, H-3, and H-1
Schedule::call(function () {
    $today = Carbon::today();
    
    // Define target offsets
    $intervals = [
        7 => 'Lomba akan berakhir dalam 7 hari lagi! Segera persiapkan berkas tim Anda.',
        3 => 'H-3 Pendaftaran Lomba! Selesaikan pengisian dan pendaftaran tim.',
        1 => 'H-1 Pendaftaran Lomba! Ini hari terakhir untuk menyelesaikan pendaftaran Anda.'
    ];

    foreach ($intervals as $days => $message) {
        $targetDate = $today->copy()->addDays($days);
        $lombas = Lomba::whereDate('deadline', $targetDate)->where('status', 'buka')->get();

        foreach ($lombas as $lomba) {
            // Find all active student users to notify them of upcoming deadlines
            $students = User::role('mahasiswa')->get();

            foreach ($students as $student) {
                // Check if notification already exists for this specific interval to prevent duplicates
                $exists = Notification::where('id_penerima', $student->id)
                    ->where('judul', 'Pengingat Deadline: ' . $lomba->nama)
                    ->whereDate('created_at', $today)
                    ->exists();

                if (!$exists) {
                    Notification::create([
                        'id_penerima' => $student->id,
                        'judul' => 'Pengingat Deadline: ' . $lomba->nama,
                        'isi' => $message,
                        'tipe' => 'reminder',
                        'link' => route('mahasiswa.lomba.show', $lomba->id),
                        'is_read' => false,
                    ]);
                }
            }
        }
    }
})->daily();
