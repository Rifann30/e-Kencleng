@extends('layouts.app_adminkit')

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
            forecastDataPoints: {
                count: 0
            },
            stroke: {
                width: window.innerWidth < 768 ? 3 : 5,
                curve: 'smooth',
            },

            colors: ['#23D155'], // Warna utama hijau
            forecastDataPoints: {
                count: 0
            },


            xaxis: {
                categories: @json($dataBulan),
                labels: {
                    style: {

                        fontSize: window.innerWidth < 768 ? '5px' : '13px'
                    }
                }
            },
            yaxis: {
                labels: {
                    style: {

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
                    color: '#666'
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
<div class="container">
    <div class="d-flex justify-content-between align-items-end flex-wrap ">
        <h2 class="mb-3">Grafik <strong style="color: #23D155">Keluar Masuk</strong> Dana Kencleng {{ $selectedTahun ? 'Tahun ' . $selectedTahun : '' }}</h2>

        <form method="GET" action="{{ route('home') }}">
            <div  class=" d-flex justify-content-end mb-3 g-3 align-items-end">
            <div class="me-2">
                <label for="tahun" class="form-label mb-0 me-2 text-nowrap label-responsive">Filter Tahun</label>
                <select name="tahun" id="tahun" class="form-select select2-hijau">
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

            <div class="card-bto">
                <a href="{{ route('cetakSaldo', ['tahun' => $selectedTahun, 'export' => 'pdf']) }}" class="btn btn-hijau text-nowrap"> Export Data</a>
            </div>
            </div>
        </form>
    </div>



    {{-- Grafik Saldo --}}
    <div class="row mb-2">
        <div class="col-xl-12">
            <div class=" flex-fill w-100">
                <div class="card-header">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="d-flex flex-wrap justify-content-between gap-responsive ">
        {{-- Saldo Akhir --}}
            <div class="mb-1 card-wid">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Saldo Akhir</h6>
                        <h3 class="m-0" style="color: #23D155">{{ formatRupiah($sisaDana, true) }}</h3>
                    </div>
                </div>
            </div>

        {{-- Total Pengambilan --}}
        <div class="mb-1 card-wid">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Total Pengambilan</h6>
                    <h3 class="m-0" style="color: #23D155">{{ formatRupiah($totalPengambilan, true) }}</h3>

                </div>
            </div>
        </div>

        {{-- Total Pengeluaran --}}
        <div class="mb-1 card-wid">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Total Pengeluaran</h6>
                    <h3 class="m-0" style="color: #23D155">{{ formatRupiah($totalPengeluaran, true) }}</h3>

                </div>
            </div>
        </div>

        {{-- Total Jamaah --}}
        <div class="mb-1 card-wid">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Jamaah</h6>
                    <h3 class="m-0" style="color: #23D155">{{ $totalJamaah }}</h3>

                </div>
            </div>
        </div>
        </div>
    </div>

    {{-- Tabel Pengambilan Terbaru --}}
    <div class="row mt-1">
        <div class="col-12 ">
            <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0" style="font-size: clamp(0.8rem, 2vw, 1.1rem);">Pengambilan Terbaru</h5>
                    </div>

                    {{-- Tambahkan pembungkus dengan scroll dan batas tinggi --}}
                    <div style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-hijau table-hover my-0">
                            <thead class="table-header-sticky">
                                <tr >
                                    <th>No</th>
                                    <th class="">Tanggal Update</th>
                                    <th class="">Periode Pengambilan</th>
                                    <th>Jumlah Kencleng Diambil</th>
                                    <th>Dana Perolehan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pengambilanTerbaru as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                    <td class="">{{ $item->periode }}</td>
                                    <td>{{ $item->jml_jamaah }}</td>
                                    <td style="color: #23D155">{{ formatRupiah($item->jml_dana, true) }}</td>
                                </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="5">Tidak ada data pengambilan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    </div>

    {{-- Tabel Pengeluaran Terbaru --}}
    <div class="row mt-4 mb-5">
        <div class="col-12 ">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0" style="font-size: clamp(0.8rem, 2vw, 1.1rem);">Pengeluaran Terbaru</h5>
                </div>

                {{-- Scroll dengan batas tinggi --}}
                <div style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-hijau table-hover my-0">
                        <thead class="table-header-sticky">
                            <tr>
                                <th>No</th>
                                <th class="">Tanggal Update</th>
                                <th>Nama Pengeluaran</th>
                                <th>Jumlah Dana</th>
                                <th class="">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pengeluaranTerbaru as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                    <td>{{ $item->pengeluaran }}</td>
                                    <td style="color: #23D155">{{ formatRupiah($item->jml_dana, true) }}</td>
                                    <td class="">{{ $item->keterangan }}</td>
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
