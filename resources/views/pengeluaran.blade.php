@extends('layouts.app_adminkit')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 font-weight-bold">Data <strong>Pengeluaran</strong></h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-between mb-3 align-items-center flex-wrap gap-2">
        <div>
            <label class="form-label mb-0 fw-bold mt-2">Total Pengeluaran:</label>
            <p class="mb-0" style="color: #23D155; font-size: 1.5rem; font-weight: 600;">Rp {{ number_format($jumlahPengeluaran, 0, ',', '.') }}</p>
        </div>
        <div class="d-flex gap-2">
        <a href="{{ route('pengeluaran.create') }}" class="btn btn-hijau">+ Tambah Pengeluaran</a>
        <a href="{{ route('pengeluaran.cetak', request()->only(['pengeluaran', 'bulan', 'tahun']) + ['export' => 'pdf']) }}" class="btn btn-hijau">
            Export PDF
        </a>
        </div>
    </div>


    <!-- Form Filter -->
    <form method="GET" action="{{ route('pengeluaran.index') }}" class="mb-3 row g-2 align-items-end">
        <div class="col-md-4">
            <label for="filter_pengeluaran" class="form-label">Filter Nama Pengeluaran</label>
            <input type="text" class="form-control" id="filter_pengeluaran" name="pengeluaran"
                value="{{ request('pengeluaran') }}" placeholder="Cari nama pengeluaran...">
        </div>

        <div class="col-md-3">
            <label for="filter_bulan" class="form-label">Filter Bulan</label>
            <select name="bulan" id="filter_bulan" class="form-select">
                <option value="">-- Semua Bulan --</option>
                @foreach(range(1, 12) as $bulan)
                    <option value="{{ $bulan }}" {{ request('bulan') == $bulan ? 'selected' : '' }}>
                        {{ DateTime::createFromFormat('!m', $bulan)->format('F') }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <label for="filter_tahun" class="form-label">Filter Tahun</label>
            <select name="tahun" id="filter_tahun" class="form-select">
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

        <div class="col-md-2 d-flex gap-2">
            <button type="submit" class="btn btn-primary w-100">Filter</button>
            <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary w-100">Reset</a>
        </div>
    </form>


    <div class="table-responsive">
        <table class="table table-hijau table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal Update</th>
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
                            <a href="{{ route('pengeluaran.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="{{ route('pengeluaran.show', $item->id) }}" class="btn btn-sm btn-info">Info</a>
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
