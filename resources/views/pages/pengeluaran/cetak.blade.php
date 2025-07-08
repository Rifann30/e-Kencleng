<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Laporan Data Pengeluaran</title>
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
        }

        .detail-table th {
            background-color: #23d1543d;
            text-align: center;
        }

        .detail-table td {
            text-align: center;
        }

        .text-left {
            text-align: left !important;
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
            <strong>Laporan Data Pengeluaran Dana Kencleng Masjid Akbar</strong>
        </div>
        <div class="printed-date">
            Dicetak: {{ \Carbon\Carbon::now()->translatedFormat('d F Y, H:i:s') }}
        </div>
    </div>

    <!-- Detail Data -->
    <h4>Data Pengeluaran {{ $judulFilter }}</h4>
    <table class="detail-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Pengeluaran</th>
                <th>Jumlah Dana</th>
                <th>Keterangan</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengeluarans as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td class="text-left">{{ $item->pengeluaran }}</td>
                    <td>Rp {{ number_format($item->jml_dana, 0, ',', '.') }}</td>
                    <td class="text-left">{{ $item->keterangan }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data pengeluaran yang ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
