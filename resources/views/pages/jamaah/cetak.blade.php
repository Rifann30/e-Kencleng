<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Laporan Data Jamaah Kencleng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #000;
            position: relative;
        }

        .detail-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .detail-table th, .detail-table td {
            border: 1px solid #000;
            padding: 8px 12px;
            text-align: center;
        }

        .detail-table th {
            background-color: #23d1543d;
        }

        .text-center {
            text-align: center;
        }

        .watermark {
            position: fixed;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.15;
            z-index: -1;
        }

        .kop-header {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            position: relative;
        }

        .kop-logo {
            width: 80px;
            height: auto;
            margin-right: 20px;
        }

        .kop-title {
            font-size: 20px;
            text-align: center;
            flex-grow: 1;
        }

        .printed-date {
            position: absolute;
            top: 0;
            right: 0;
            font-size: 12px;
        }

        h4 {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <!-- Watermark -->
    <div class="watermark">
        <img src="{{ public_path('icon/takmir.png') }}" width="300" alt="Watermark">
    </div>

    <!-- Header -->
    <div class="kop-header">
        <img src="{{ public_path('icon/takmir.png') }}" class="kop-logo" alt="Logo Takmir">
        <div class="kop-title">
            <strong>Laporan Data Jamaah Kencleng Masjid Akbar</strong>
        </div>
        <div class="printed-date">
            Dicetak: {{ \Carbon\Carbon::now()->translatedFormat('d F Y, H:i:s') }}
        </div>
    </div>

    <!-- Detail Data Jamaah -->
    <h4>Data Jamaah {{ $judulFilter }}</h4>
    <table class="detail-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Kelompok</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jamaahs as $index => $jamaah)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $jamaah->nama }}</td>
                    <td>{{ $jamaah->alamat }}</td>
                    <td>{{ $jamaah->kelompok }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Tidak ada data jamaah yang ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
