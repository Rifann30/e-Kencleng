<?php

namespace App\Http\Controllers;

use App\Charts\KenclengChart;
use Illuminate\Http\Request;
use App\Models\Jamaah;
use App\Models\Pengambilan;
use App\Models\Pengeluaran;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
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


        return view('home', [
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
