@extends('layouts.app_welcome')


@section('js')

    <link rel="stylesheet" href="{{ asset('achart/dist/apexcharts.css') }}" />
    <script src="{{ asset('achart/dist/apexcharts.js') }}"></script>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        var options = {
            series: [{
                name: 'Saldo Akhir',
                data: @json($saldoAkhir),
            }],
            chart: {
                height: window.innerWidth < 768 ? 200 : 350,
                type: 'line',
                toolbar: {
                    show: false
                }
            },
            colors: ['#23D155'], // Warna utama hijau
            forecastDataPoints: {
                count: 0
            },
            stroke: {
                width: window.innerWidth < 768 ? 3 : 5,
                curve: 'smooth'
            },
            xaxis: {
                categories: @json($dataBulan),
                labels: {
                    style: {
                        colors: '#23D155',
                        fontSize: window.innerWidth < 768 ? '5px' : '13px'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#23D155',
                        fontSize: window.innerWidth < 768 ? '5px' : '13px'
                    },
                    formatter: function(value) {
                        return value.toLocaleString("id-ID", {
                            style: "currency",
                            currency: "IDR"
                        });
                    }
                }
            },
            title: {

                align: 'left',
                style: {
                    fontSize: "16px",
                    color: '#23D155'
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'dark',
                    gradientToColors: ['#FDD835'],
                    shadeIntensity: 1,
                    type: 'horizontal',
                    opacityFrom: 1,
                    opacityTo: 1,
                    stops: [0, 100, 100, 100]
                }
            }


        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    });
</script>

@endsection


@section('content')

<div class="container-fluid px-responsive py-2">
            <div class="mt-5 mb-0 d-flex justify-content-between align-items-center">
                <h2>Grafik <strong style="color:#23D155">Keluar Masuk</strong> Dana Kencleng {{ $selectedTahun ? 'Tahun ' . $selectedTahun : '' }}</h2>
            </div>

                    <form method="GET" action="{{ route('dashboard') }}">
                    <div  class="d-flex justify-content-end mb-3 g-3 align-items-end">

                        <div class="me-2">
                            <label for="tahun" class="form-label mb-0 me-2 text-nowrap label-responsive" style="opacity: 0.8;">
                                Filter Tahun
                            </label>
                            <select name="tahun" id="tahun" class="select2-hijau form-select text-nowrap">
                                <option value="">Semua Tahun</option>
                                @for ($tahun = now()->year; $tahun >= 2022; $tahun--)
                                    <option value="{{ $tahun }}" {{ $selectedTahun == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}
                                    </option>
                                @endfor
                            </select>
                        </div>


                        <div class="card-bto me-2">
                            <button type="submit" class="btn btn-secondary">Tampilkan</button>
                        </div>

                        <div class="card-bto text-nowrap">
                            <a href="{{ route('cetakSaldo', ['tahun' => $selectedTahun, 'export' => 'pdf']) }}" class="btn btn-hijau"> Export Data</a>
                        </div>
                    </div>
                    </form>






					<div class="row ">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="w-100">
                                <div class="col-xl-12 col-xxl-12 mb-3">
                                    <div class="">
                                        <div class="card card-glass">
                                            {{-- {!! $chart->container() !!} --}}

                                            <div id="chart" ></div>
                                        </div>
                                    </div>
						        </div>
                            </div>
						</div>
					</div>


                    <div class="row">
                                <div class="d-flex flex-wrap justify-content-between gap-responsive mb-3">
                                    {{-- Saldo Akhir --}}
                                    <div class="mb-1 card-wid">
                                        <div class="card card-glass h-100">
                                            <div class="card-body">
                                                <h6 class="mb-1">Saldo Akhir</h6>
                                                <h3 class="m-0">{{ formatRupiah($sisaDana, true) }}</h3>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Total Pengambilan --}}
                                    <div class=" mb-1 card-wid">
                                        <div class="card card-glass h-100">
                                            <div class="card-body">
                                                <h6 class="mb-1">Total Pengambilan</h6>
                                                <h3 class="m-0">{{ formatRupiah($totalPengambilan, true) }}</h3>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Total Pengeluaran --}}
                                    <div class=" mb-1 card-wid">
                                        <div class="card card-glass h-100">
                                            <div class="card-body">
                                                <h6 class="mb-1">Total Pengeluaran</h6>
                                                <h3 class="m-0">{{ formatRupiah($totalPengeluaran, true) }}</h3>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Total Jamaah --}}
                                    <div class=" mb-1 card-wid">
                                        <div class="card card-glass h-100">
                                            <div class="card-body">
                                                <h6 class="mb-1">Jumlah Jamaah</h6>
                                                <h3 class="m-0">{{ $totalJamaah }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



					<div class="row">
						<div class="col-12">
							<div class="card card-glass flex-fill w-100">
								<div class="card-header">
									<h5 class="card-title mb-0" style="font-size: clamp(0.8rem, 2vw, 1.25rem);">Pengambilan Terbaru</h5>
								</div>

                                <div style="max-height: 300px; overflow-y: auto;">
								<table class="table-glass table table-hover my-0" style="thead-tr-th-color: #23D155;">
									<thead class="table-header-sticky">
										<tr>
                                            <th class="text-start">No</th>

                                            <th class="text-start">Periode Pengambilan</th>
                                            <th class="text-start">Jumlah kencleng Diambil</th>
                                            <th class="text-start">Dana Perolehan</th>
										</tr>
									</thead>
									<tbody>
                                        @foreach($pengambilanTerbaru as $index => $item)
                                            <tr>
                                                <td class="text-start">{{ $index + 1 }}</td>

                                                <td class="text-start">{{ $item->periode }}</td>
                                                <td class="text-start">{{ $item->jml_jamaah }}</td>
                                                <td class="text-start">{{ formatRupiah($item->jml_dana, true) }}</td>

                                            </tr>
                                        @endforeach


									</tbody>
								</table>
                            </div>
							</div>
						</div>
					</div>


                        <div class="row mt-4">
                            <div class="col-12 ">
                                <div class="card card-glass flex-fill w-100">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0" style="font-size: clamp(0.8rem, 2vw, 1.25rem);">Pengeluaran Terbaru</h5>
                                    </div>

                                    {{-- Scroll dengan batas tinggi --}}
                                    <div style="max-height: 400px; overflow-y: auto; ">
                                        <table class="table-glass table table-hover my-0 " style="thead-tr-th-color: #23D155;">
                                            <thead class="table-header-sticky">
                                                <tr>
                                                    <th class="text-start ">No</th>
                                                    <th class="text-start th-kecil">Tanggal Pengeluaran</th>
                                                    <th class="text-start">Nama Pengeluaran</th>
                                                    <th class="text-start">Jumlah Dana</th>
                                                    <th class="text-start">Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($pengeluaranTerbaru as $index => $item)
                                                    <tr>
                                                        <td class="text-start">{{ $index + 1 }}</td>
                                                        <td class="text-start">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                                        <td class="text-start">{{ $item->pengeluaran }}</td>
                                                        <td class="text-start" style="color: #23D155">{{ formatRupiah($item->jml_dana, true) }}</td>
                                                        <td class="text-start">{{ $item->keterangan }}</td>
                                                    </tr>
                                                    @empty
                                                        <tr>
                                                            <td class="text-center" colspan="5">Tidak ada data pengeluaran.</td>
                                                        </tr>
                                                    @endforelse
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>

</div>


@endsection


@push('js')
  <script>

    $(document).ready(function() {
      demo.checkFullPageBackgroundImage();
    });
  </script>
@endpush

