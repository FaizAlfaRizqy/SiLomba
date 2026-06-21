<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Lomba;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

$images = [
    'C:\\Users\\asus\\.gemini\\antigravity\\brain\\edabce34-5e98-41f0-a5a0-bf2907305cba\\poster1_1782049023145.png',
    'C:\\Users\\asus\\.gemini\\antigravity\\brain\\edabce34-5e98-41f0-a5a0-bf2907305cba\\poster2_1782049066984.png',
    'C:\\Users\\asus\\.gemini\\antigravity\\brain\\edabce34-5e98-41f0-a5a0-bf2907305cba\\poster3_1782049085794.png',
];

$lombas_aktif = [
    ['nama' => 'National Hackathon 2026', 'penyelenggara' => 'Kemendikbudristek', 'kategori' => 'Teknologi', 'tingkat' => 'nasional'],
    ['nama' => 'Business Plan Competition', 'penyelenggara' => 'Universitas Indonesia', 'kategori' => 'Bisnis', 'tingkat' => 'nasional'],
    ['nama' => 'Scientific Paper Competition', 'penyelenggara' => 'ITB Research Center', 'kategori' => 'Sains', 'tingkat' => 'internasional'],
    ['nama' => 'Lomba Desain Poster Nasional', 'penyelenggara' => 'Kemenparekraf', 'kategori' => 'Seni', 'tingkat' => 'nasional'],
    ['nama' => 'Olimpiade Matematika', 'penyelenggara' => 'Universitas Gadjah Mada', 'kategori' => 'Sains', 'tingkat' => 'nasional'],
    ['nama' => 'Data Science Challenge', 'penyelenggara' => 'Telkom Indonesia', 'kategori' => 'Teknologi', 'tingkat' => 'nasional'],
    ['nama' => 'Debat Bahasa Inggris Internasional', 'penyelenggara' => 'Universitas Airlangga', 'kategori' => 'Kemanusiaan', 'tingkat' => 'internasional'],
    ['nama' => 'Lomba Inovasi Teknologi Tepat Guna', 'penyelenggara' => 'BRIN', 'kategori' => 'Teknologi', 'tingkat' => 'nasional'],
    ['nama' => 'Kompetisi Startup Mahasiswa', 'penyelenggara' => 'BDI', 'kategori' => 'Bisnis', 'tingkat' => 'nasional'],
    ['nama' => 'Lomba Cipta Puisi Nasional', 'penyelenggara' => 'Badan Bahasa', 'kategori' => 'Seni', 'tingkat' => 'nasional'],
];

$lombas_arsip = [
    ['nama' => 'Hackathon 2025', 'penyelenggara' => 'Google Indonesia', 'kategori' => 'Teknologi', 'tingkat' => 'internasional'],
    ['nama' => 'Olimpiade Fisika 2025', 'penyelenggara' => 'ITS', 'kategori' => 'Sains', 'tingkat' => 'nasional'],
    ['nama' => 'Marketing Plan 2025', 'penyelenggara' => 'Unpad', 'kategori' => 'Bisnis', 'tingkat' => 'nasional'],
    ['nama' => 'Lomba Esai Mahasiswa 2025', 'penyelenggara' => 'Kemdikbud', 'kategori' => 'Kemanusiaan', 'tingkat' => 'nasional'],
    ['nama' => 'Kompetisi Robotika 2025', 'penyelenggara' => 'PENS', 'kategori' => 'Teknologi', 'tingkat' => 'nasional'],
];

DB::table('lomba')->delete();

if (!Storage::disk('public')->exists('posters')) {
    Storage::disk('public')->makeDirectory('posters');
}

$imageIndex = 0;

foreach ($lombas_aktif as $data) {
    $imgPath = $images[$imageIndex % 3];
    $imageIndex++;
    $imgData = file_get_contents($imgPath);
    $filename = 'posters/' . uniqid() . '.png';
    Storage::disk('public')->put($filename, $imgData);

    Lomba::create([
        'nama' => $data['nama'],
        'penyelenggara' => $data['penyelenggara'],
        'kategori' => $data['kategori'],
        'tingkat' => $data['tingkat'],
        'tanggal_buka' => Carbon::now()->subDays(rand(1, 10)),
        'deadline' => Carbon::now()->addDays(rand(5, 30)),
        'hadiah' => 'Rp ' . rand(5, 50) . '.000.000',
        'syarat_peserta' => 'Mahasiswa aktif',
        'deskripsi' => 'Ini adalah deskripsi untuk kompetisi ' . $data['nama'] . '.',
        'link_resmi' => 'https://example.com/'.Str::slug($data['nama']),
        'status' => 'buka',
        'poster' => $filename
    ]);
    echo "Created Lomba Aktif: {$data['nama']}\n";
}

foreach ($lombas_arsip as $data) {
    $imgPath = $images[$imageIndex % 3];
    $imageIndex++;
    $imgData = file_get_contents($imgPath);
    $filename = 'posters/' . uniqid() . '.png';
    Storage::disk('public')->put($filename, $imgData);

    Lomba::create([
        'nama' => $data['nama'],
        'penyelenggara' => $data['penyelenggara'],
        'kategori' => $data['kategori'],
        'tingkat' => $data['tingkat'],
        'tanggal_buka' => Carbon::now()->subDays(60),
        'deadline' => Carbon::now()->subDays(rand(1, 30)),
        'hadiah' => 'Rp ' . rand(5, 50) . '.000.000',
        'syarat_peserta' => 'Mahasiswa aktif',
        'deskripsi' => 'Kompetisi ' . $data['nama'] . ' ini telah selesai diselenggarakan.',
        'link_resmi' => 'https://example.com/'.Str::slug($data['nama']),
        'status' => 'tutup',
        'poster' => $filename
    ]);
    echo "Created Lomba Arsip: {$data['nama']}\n";
}
echo "DONE\n";
