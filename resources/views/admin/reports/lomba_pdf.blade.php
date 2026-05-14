<!DOCTYPE html>
<html>
<head>
    <title>Laporan Lomba</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { bg-color: #f2f2f2; }
        .header { text-align: center; margin-bottom: 30px; }
        .logo { width: 80px; }
    </style>
</head>
<body>
    <div class="header">
        <h2>SiLomba - Sistem Informasi Lomba & Event Mahasiswa</h2>
        <h3>Laporan Daftar Lomba Aktif</h3>
        <p>Tanggal Cetak: {{ date('d M Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lomba</th>
                <th>Penyelenggara</th>
                <th>Kategori</th>
                <th>Deadline</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lombas as $index => $lomba)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $lomba->nama }}</td>
                    <td>{{ $lomba->penyelenggara }}</td>
                    <td>{{ $lomba->kategori }}</td>
                    <td>{{ $lomba->deadline->format('d M Y') }}</td>
                    <td>{{ $lomba->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
