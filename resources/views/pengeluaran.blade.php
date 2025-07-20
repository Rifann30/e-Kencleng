@extends('layouts.app_adminkit')

@section('content')
<div class="container">
    <h2 class="mt-3" style="margin-bottom: clamp(0.6rem, 1.7vw, 2rem);">Data <strong>Pengeluaran</strong></h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3 align-items-center flex-wrap gap-0">
        <div>
            <label class="form-label mb-0 fw-bold" style="font-size: clamp(0.6rem, 0.8vw, 1rem);">Total Pengeluaran:</label>
            <p class="mb-0" style="color: #23D155; font-size: clamp(1.2rem, 1.7vw, 1.8rem); font-weight: 600;">Rp {{ number_format($jumlahPengeluaran, 0, ',', '.') }}</p>
        </div>
        <div class="d-flex gap-2">
        <a href="{{ route('pengeluaran.create') }}" class="btn btn-hijau">+ Tambah Pengeluaran</a>
        {{-- <a href="{{ route('pengeluaran.cetak', request()->only(['pengeluaran', 'bulan', 'tahun']) + ['export' => 'pdf']) }}" class="btn btn-hijau">
            Export PDF
        </a> --}}
        </div>
    </div>


    <!-- Form Filter -->
    <form method="GET" action="{{ route('pengeluaran.index') }}">
        <div class="d-flex justify-content-between align-items-end flex-wrap mb-3">
        <div class="d-flex flex-column card-bto me-2">
            <label for="filter_pengeluaran" class="form-label label-responsive">Filter Nama Pengeluaran</label>
            <input type="text" class="form-control select2-hijau" id="filter_pengeluaran" name="pengeluaran"
                value="{{ request('pengeluaran') }}" placeholder="Cari nama pengeluaran...">
        </div>

        <div class="card-bto me-2 mt-2">
            <label for="filter_bulan" class="form-label label-responsive">Filter Bulan</label>
            <select name="bulan" id="filter_bulan" class="form-select select2-hijau">
                <option value="">-- Semua Bulan --</option>
                @foreach(range(1, 12) as $bulan)
                    <option value="{{ $bulan }}" {{ request('bulan') == $bulan ? 'selected' : '' }}>
                        {{ DateTime::createFromFormat('!m', $bulan)->format('F') }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="card-bto me-2 mt-2">
            <label for="filter_tahun" class="form-label label-responsive">Filter Tahun</label>
            <select name="tahun" id="filter_tahun" class="form-select select2-hijau">
                <option value="">-- Semua Tahun --</option>
                @php
                    $tahunSekarang = date('Y');
                    $tahunAwal = 2020;
                @endphp
                @for ($tahun = $tahunSekarang; $tahun >= $tahunAwal; $tahun--)
                    <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                        {{ $tahun }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="card-bto me-2 d-flex flex-row mt-2">
            <button type="submit" class="btn btn-primary w-100 me-2">Tampilkan</button>
            <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary w-100">Reset</a>
        </div>
        </div>
    </form>


    <div class="card-aksi table-responsive mb-3">
        <table class="table table-hijau table-bordered table-striped table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal Pengeluaran</th>
                    <th>NamaPengeluaran</th>
                    <th>Jumlah Dana</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengeluarans as $index => $item)
                    <tr>
                        <td>{{ $pengeluarans->firstItem() + $index }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                        <td>{{ $item->pengeluaran }}</td>
                        <td>Rp {{ number_format($item->jml_dana, 0, ',', '.') }}</td>
                        <td>{{ $item->keterangan }}</td>

                        <td>
                            <a href="{{ route('pengeluaran.edit', $item->id) }}" class="btn btn-sm btn-warning mb-1">Edit</a>
                            <a href="{{ route('pengeluaran.show', $item->id) }}" class="btn btn-sm btn-info mb-1">Info</a>
                            <form action="{{ route('pengeluaran.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash-alt"> Hapus</i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data pengeluaran.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="pull-right">
        {{ $pengeluarans->links() }}
    </div>
</div>
@endsection
