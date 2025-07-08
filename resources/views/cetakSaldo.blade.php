<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Laporan Kencleng Masjid</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #000;
            position: relative;
        }

        .summary-table, .detail-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        .summary-table th, .summary-table td,
        .detail-table th, .detail-table td {
            border: 1px solid #000;
            padding: 8px 12px;
            text-align: center;
        }

        .summary-table th {
            background-color: #f0f0f0;
        }

        .summary-table td {
            font-weight: bold;
        }

        .detail-table th {
            background-color: #23d1543d;
        }

        .text-center {
            text-align: center;
        }

        /* Watermark tengah */
        .watermark {
            position: fixed;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0.1;
            z-index: -1;
        }

        /* Header / kop */
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

    {{-- Watermark --}}
    <div class="watermark">
        <img src="{{ public_path('icon/takmir.png') }}" width="300" alt="Watermark">
    </div>

    {{-- Header (Logo & Judul & Tanggal Cetak) --}}
    <div class="kop-header">
        <img src="{{ public_path('icon/takmir.png') }}" class="kop-logo" alt="Logo Takmir">
        <div class="kop-title">
            <strong>Laporan Kencleng Masjid Akbar {{ $selectedTahun ? 'Tahun ' . $selectedTahun : '' }}</strong>
        </div>
        <div class="printed-date">
            Dicetak: {{ \Carbon\Carbon::now()->translatedFormat('d F Y, H:i:s') }}
        </div>
    </div>

    {{-- Ringkasan --}}
    <table class="summary-table detail-table">
        <thead>
            <tr>
                <th>Saldo Akhir</th>
                <th>Total Pengambilan</th>
                <th>Total Pengeluaran</th>
                <th>Jumlah Jamaah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ formatRupiah($sisaDana, true) }}</td>
                <td>{{ formatRupiah($totalPengambilan, true) }}</td>
                <td>{{ formatRupiah($totalPengeluaran, true) }}</td>
                <td>{{ $totalJamaah }}</td>
            </tr>
        </tbody>
    </table>

    {{-- Detail Pengambilan --}}
    <h4>Data Pengambilan</h4>
    <table class="detail-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Update</th>
                <th>Periode Pengambilan</th>
                <th>Jumlah Kencleng Diambil</th>
                <th>Dana Perolehan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengambilanTerbaru as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                    <td>{{ $item->periode }}</td>
                    <td>{{ $item->jml_jamaah }}</td>
                    <td>{{ formatRupiah($item->jml_dana, true) }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Tidak ada data pengambilan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Detail Pengeluaran --}}
    <h4>Data Pengeluaran</h4>
    <table class="detail-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal Update</th>
                <th>Nama Pengeluaran</th>
                <th>Jumlah Dana</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pengeluaranTerbaru as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                    <td style="text-align: left;">{{ $item->pengeluaran }}</td>
                    <td>{{ formatRupiah($item->jml_dana, true) }}</td>
                    <td style="text-align: left;">{{ $item->keterangan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Tidak ada data pengeluaran.</td>
                </tr>
            @endforelse
        </tbody>
    </table>


</body>
</html>
