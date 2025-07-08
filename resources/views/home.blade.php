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
                height: 350,
                type: 'line',
                toolbar: {
                    show: false
                }
            },
            forecastDataPoints: {
                count: 0
            },
            stroke: {
                width: 5,
                curve: 'smooth',
            },

            colors: ['#23D155'], // Warna utama hijau
            forecastDataPoints: {
                count: 0
            },


            xaxis: {
                categories: @json($dataBulan),
            },
            yaxis: {
                labels: {
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
<div class="container-fluid ">
    <div class="d-flex justify-content-between align-items-center flex-wrap mb-5 ">
        <h1 class="h3 mb-0">Grafik <strong style="color: #23D155">Keluar Masuk</strong> Dana Kencleng {{ $selectedTahun ? 'Tahun ' . $selectedTahun : '' }}</h1>

        <form method="GET" action="{{ route('home') }}" class="mb-3 row row-cols-lg-auto g-2 align-items-end">
            <div class="col-md-3">
                <label for="tahun" class="form-label mb-0 me-2">Filter Tahun</label>
                <select name="tahun" id="tahun" class="form-select">
                    <option value="">Semua Tahun</option>
                    @for ($tahun = now()->year; $tahun >= 2022; $tahun--)
                        <option value="{{ $tahun }}" {{ $selectedTahun == $tahun ? 'selected' : '' }}>
                            {{ $tahun }}
                        </option>
                    @endfor
                </select>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-secondary">Tampilkan</button>
            </div>

            <div class="col-md-2">
                <a href="{{ route('cetakSaldo', ['tahun' => $selectedTahun, 'export' => 'pdf']) }}" class="btn btn-hijau"> Export Data</a>
            </div>
        </form>
    </div>



    {{-- Grafik Saldo --}}
    <div class="row">
        <div class="col-xl-12">
            <div class="card flex-fill w-100">
                <div class="card-header">
                    <div id="chart"></div>
                </div>
            </div>
        </div>
    </div>




    <div class="row">

        {{-- Saldo Akhir --}}

            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Saldo Akhir</h5>
                        <h1 class="mt-1 mb-3" style="color: #23D155">{{ formatRupiah($sisaDana, true) }}</h1>

                    </div>
                </div>
            </div>

        {{-- Total Pengambilan --}}
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Pengambilan</h5>
                    <h1 class="mt-1 mb-3" style="color: #23D155">{{ formatRupiah($totalPengambilan, true) }}</h1>

                </div>
            </div>
        </div>

        {{-- Total Pengeluaran --}}
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Total Pengeluaran</h5>
                    <h1 class="mt-1 mb-3" style="color: #23D155">{{ formatRupiah($totalPengeluaran, true) }}</h1>

                </div>
            </div>
        </div>

        {{-- Total Jamaah --}}
        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Jamaah</h5>
                    <h1 class="mt-1 mb-3" style="color: #23D155">{{ $totalJamaah }}</h1>

                </div>
            </div>
        </div>
    </div>

    {{-- Tabel Pengambilan Terbaru --}}
    <div class="row mt-3">
        <div class="col-12 ">
            <div class="card flex-fill">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Pengambilan Terbaru</h5>
                    </div>

                    {{-- Tambahkan pembungkus dengan scroll dan batas tinggi --}}
                    <div style="max-height: 400px; overflow-y: auto;">
                        <table class="table table-hijau table-hover my-0">
                            <thead >
                                <tr >
                                    <th>No</th>
                                    <th class="d-none d-xl-table-cell">Tanggal Update</th>
                                    <th class="d-none d-xl-table-cell">Periode Pengambilan</th>
                                    <th>Jumlah Kencleng Diambil</th>
                                    <th>Dana Perolehan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pengambilanTerbaru as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="d-none d-xl-table-cell">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $item->periode }}</td>
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
    <div class="row mt-3">
        <div class="col-12 ">
            <div class="card flex-fill">
                <div class="card-header">
                    <h5 class="card-title mb-0">Pengeluaran Terbaru</h5>
                </div>

                {{-- Scroll dengan batas tinggi --}}
                <div style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-hijau table-hover my-0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th class="d-none d-xl-table-cell">Tanggal Update</th>
                                <th>Nama Pengeluaran</th>
                                <th>Jumlah Dana</th>
                                <th class="d-none d-xl-table-cell">Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pengeluaranTerbaru as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="d-none d-xl-table-cell">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') }}</td>
                                    <td>{{ $item->pengeluaran }}</td>
                                    <td style="color: #23D155">{{ formatRupiah($item->jml_dana, true) }}</td>
                                    <td class="d-none d-xl-table-cell">{{ $item->keterangan }}</td>
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
