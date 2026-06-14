<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Daftar Lomba Aktif</title>
    <style>
        body { 
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; 
            color: #000000;
            margin: 20px;
            font-size: 13px;
            line-height: 1.6;
        }
        .header-container {
            border-bottom: 3px double #00524D;
            padding-bottom: 15px;
            margin-bottom: 25px;
            text-align: center;
        }
        .header-title { 
            color: #00524D;
            font-size: 22px;
            font-weight: bold;
            text-transform: uppercase;
            margin: 0 0 5px 0;
            letter-spacing: 1px;
        }
        .header-subtitle {
            color: #48A89A;
            font-size: 14px;
            font-weight: 600;
            margin: 0 0 10px 0;
        }
        .header-meta {
            font-size: 11px;
            color: #555555;
            margin: 0;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-top: 10px; 
            margin-bottom: 30px;
        }
        th { 
            background-color: #00524D; 
            color: #ffffff;
            font-weight: bold;
            text-align: left;
            text-transform: uppercase;
            font-size: 11px;
            padding: 12px 10px;
            border: 1px solid #00524D;
        }
        td { 
            padding: 10px; 
            border: 1px solid #e5e7eb;
            font-size: 12px;
        }
        tr:nth-child(even) { 
            background-color: #f9fafb; 
        }
        tr:hover {
            background-color: #CBEFEB;
        }
        .badge {
            display: inline-block;
            padding: 3px 8px;
            font-size: 10px;
            font-weight: bold;
            text-transform: uppercase;
            border-radius: 4px;
        }
        .badge-active {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
        .badge-closed {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fca5a5;
        }
        .footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #777777;
            border-top: 1px solid #e5e7eb;
            padding-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header-container">
        <h1 class="header-title">SiLomba</h1>
        <h2 class="header-subtitle">Laporan Daftar Event Lomba Aktif</h2>
        <p class="header-meta">Dicetak oleh: Administrator &bull; Tanggal: {{ date('d M Y, H:i') }} WIB</p>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%; text-align: center;">No</th>
                <th style="width: 35%;">Nama Lomba</th>
                <th style="width: 25%;">Penyelenggara</th>
                <th style="width: 15%;">Kategori</th>
                <th style="width: 12%;">Deadline</th>
                <th style="width: 8%; text-align: center;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lombas as $index => $lomba)
                <tr>
                    <td style="text-align: center; font-weight: bold; color: #555;">{{ $index + 1 }}</td>
                    <td style="font-weight: bold; color: #00524D;">{{ $lomba->nama }}</td>
                    <td>{{ $lomba->penyelenggara }}</td>
                    <td>{{ $lomba->kategori }}</td>
                    <td>{{ $lomba->deadline->format('d M Y') }}</td>
                    <td style="text-align: center;">
                        @if($lomba->status == 'buka')
                            <span class="badge badge-active">Buka</span>
                        @else
                            <span class="badge badge-closed">Tutup</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Laporan ini dihasilkan secara otomatis oleh Sistem Informasi SiLomba &copy; {{ date('Y') }}. Hak Cipta Dilindungi.
    </div>
</body>
</html>
