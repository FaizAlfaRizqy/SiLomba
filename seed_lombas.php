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
    'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=80',
    'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&q=80',
    'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=600&q=80',
    'https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=600&q=80',
    'https://images.unsplash.com/photo-1515162816999-a0c47dc192f7?w=600&q=80',
    'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=600&q=80',
    'https://images.unsplash.com/photo-1553877522-43269d4ea984?w=600&q=80',
    'https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=600&q=80',
    'https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=600&q=80',
    'https://images.unsplash.com/photo-1531482615713-2afd69097998?w=600&q=80',
    'https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=600&q=80',
    'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=600&q=80',
    'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=600&q=80',
    'https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&q=80',
    'https://images.unsplash.com/photo-1542744094-24638eff58bb?w=600&q=80',
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
    $imgUrl = $images[$imageIndex++];
    $imgData = file_get_contents($imgUrl);
    $filename = 'posters/' . uniqid() . '.jpg';
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
    $imgUrl = $images[$imageIndex++];
    $imgData = file_get_contents($imgUrl);
    $filename = 'posters/' . uniqid() . '.jpg';
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
