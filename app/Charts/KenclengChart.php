<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Models\Pengambilan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Carbon\Carbon;

class KenclengChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

public function build($tahun = null): \ArielMejiaDev\LarapexCharts\LineChart
{
    $dataBulan = [];
    $saldoAkhir = [];

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

    return $this->chart->lineChart()
        ->setTitle('Grafik Saldo Kencleng')
        ->setSubtitle($tahun ? "Tahun $tahun" : "Semua Tahun")
        ->addData('Saldo Akhir', $saldoAkhir)
        ->setHeight(278)
        ->setXAxis($dataBulan);
}


}
