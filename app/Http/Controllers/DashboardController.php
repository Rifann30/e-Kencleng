<?php

namespace App\Http\Controllers;

use App\Charts\KenclengChart;
use Illuminate\Http\Request;
use App\Models\Jamaah;
use App\Models\Pengambilan;
use App\Models\Pengeluaran;
use Barryvdh\DomPDF\Facade\Pdf;


class DashboardController extends Controller
{
    public function cetakSaldo(Request $request)
    {
        $tahun = $request->get('tahun');

        // Filter berdasarkan tahun jika dipilih
        $pengambilanTerbaru = Pengambilan::when($tahun, function ($query) use ($tahun) {
            return $query->where('periode', 'like', '%' . $tahun . '%');
        })->latest()->get();

        $pengeluaranTerbaru = Pengeluaran::when($tahun, function ($query) use ($tahun) {
            return $query->whereYear('tanggal', $tahun);
        })->latest()->get();

        $totalPengambilan = Pengambilan::when($tahun, function ($query) use ($tahun) {
            return $query->where('periode', 'like', '%' . $tahun . '%');
        })->sum('jml_dana');

        $totalPengeluaran = Pengeluaran::when($tahun, function ($query) use ($tahun) {
            return $query->whereYear('tanggal', $tahun);
        })->sum('jml_dana');

        $totalJamaah = Jamaah::count();
        $sisaDana = $totalPengambilan - $totalPengeluaran;



        $data = [
            'pengambilanTerbaru' => $pengambilanTerbaru,
            'pengeluaranTerbaru' => $pengeluaranTerbaru,
            'sisaDana' => $sisaDana,
            'totalPengambilan' => $totalPengambilan,
            'totalPengeluaran' => $totalPengeluaran,
            'totalJamaah' => $totalJamaah,
            'selectedTahun' => $tahun
        ];

        // Jika export sebagai PDF
        if ($request->get('export') === 'pdf') {
            $pdf = Pdf::loadView('cetakSaldo', $data);
            return $pdf->download('Laporan Kencleng' . ($tahun ? ' ' . $tahun : '') . '.pdf');
        }

        return view('cetakSaldo', $data);
    }


    public function index(Request $request, KenclengChart $chart)
    {
        $tahun = $request->get('tahun');
        // $bulan = daftarBulan();

        for ($i = 1; $i <= 12; $i++) {
            $namaBulan = ubahAngkaToBulan($i);

            if ($tahun) {
                $periode = $namaBulan . ' ' . $tahun;

                $pengambilan = Pengambilan::where('periode', $periode)->sum('jml_pengambilan');
                $pengeluaran = Pengeluaran::whereYear('tanggal', $tahun)
                                        ->whereMonth('tanggal', $i)
                                        ->sum('jml_pengeluaran');
            } else {
                // Semua tahun
                $pengambilan = Pengambilan::where('periode', 'like', $namaBulan . '%')->sum('jml_pengambilan');
                $pengeluaran = Pengeluaran::whereMonth('tanggal', $i)->sum('jml_pengeluaran');
            }

            $dataBulan[] = $namaBulan;
            $saldoAkhir[] = $pengambilan - $pengeluaran;
        }


        // Data pengambilan terbaru
        $pengambilanTerbaru = Pengambilan::when($tahun, function ($query) use ($tahun) {
            return $query->where('periode', 'like', '%' . $tahun . '%');
        })->latest()->get();

        $pengeluaranTerbaru = Pengeluaran::when($tahun, function ($query) use ($tahun) {
            return $query->whereYear('tanggal', $tahun);
        })->latest()->get();

        // Total nilai
        $totalPengambilan = Pengambilan::when($tahun, function ($query) use ($tahun) {
            return $query->where('periode', 'like', '%' . $tahun . '%');
        })->sum('jml_dana');

        $totalPengeluaran = Pengeluaran::when($tahun, function ($query) use ($tahun) {
            return $query->where('tanggal', 'like', '%' . $tahun . '%');
        })->sum('jml_dana');

        $totalJamaah = Jamaah::count();
        $sisaDana = $totalPengambilan - $totalPengeluaran;


        return view('dashboard', [
            'chart' => $chart->build(),
            'dataBulan' => $dataBulan,
            'saldoAkhir' => $saldoAkhir,
            'totalJamaah' => $totalJamaah,
            'totalPengambilan' => $totalPengambilan,
            'totalPengeluaran' => $totalPengeluaran,
            'sisaDana' => $sisaDana,
            'pengambilanTerbaru' => $pengambilanTerbaru,
            'pengeluaranTerbaru' => $pengeluaranTerbaru,
            'selectedTahun' => $tahun,
            'title' => 'Dashboard'
        ]);
    }

}
