<?php

namespace Database\Seeders;

use App\Models\Lomba;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LombaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lomba::create([
            'nama' => 'Gemastik XVII 2026',
            'penyelenggara' => 'Puspresnas',
            'kategori' => 'Teknologi',
            'tingkat' => 'nasional',
            'deadline' => Carbon::now()->addDays(5),
            'hadiah' => 'Total Rp 50.000.000',
            'syarat_peserta' => 'Mahasiswa aktif Diploma/Sarjana',
            'deskripsi' => 'Pagelaran Mahasiswa Nasional Bidang Teknologi Informasi dan Komunikasi.',
            'link_resmi' => 'https://gemastik.kemdikbud.go.id',
            'status' => 'buka',
        ]);

        Lomba::create([
            'nama' => 'Business Plan Competition UNY',
            'penyelenggara' => 'UNY',
            'kategori' => 'Bisnis',
            'tingkat' => 'nasional',
            'deadline' => Carbon::now()->addDays(2), // Segera Berakhir!
            'hadiah' => 'Juara 1: Rp 5.000.000',
            'syarat_peserta' => 'Tim 3 orang',
            'deskripsi' => 'Kompetisi ide bisnis kreatif mahasiswa tingkat nasional.',
            'link_resmi' => 'https://uny.ac.id/bpc',
            'status' => 'buka',
        ]);

        Lomba::create([
            'nama' => 'Imagine Cup 2026',
            'penyelenggara' => 'Microsoft',
            'kategori' => 'Teknologi',
            'tingkat' => 'internasional',
            'deadline' => Carbon::now()->addMonths(2),
            'hadiah' => '$100,000 + Azure Credits',
            'syarat_peserta' => 'Umur 16+, Mahasiswa',
            'deskripsi' => 'Global technology competition for students to create innovative solutions.',
            'link_resmi' => 'https://imaginecup.microsoft.com',
            'status' => 'buka',
        ]);
    }
}
