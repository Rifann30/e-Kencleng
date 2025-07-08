@extends('layouts.app_adminkit')


@section('content')
<div class="container">
    <h1 class="mb-4">Data <strong style="">Jamaah</strong></h1>

    {{-- Tombol Tambah & Export --}}
    <div class="d-flex justify-content-between mb-3 align-items-center flex-wrap gap-2">
        <div>
            <label for="jml_jamaah" class="form-label mb-0 fw-bold">Jumlah Jamaah:</label>
            <p id="jml_jamaah" class="mb-0" style="color: #23D155; font-size: 1.5rem; font-weight: 600;">{{ $jumlahJamaah }} Jamaah</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('jamaah.create') }}" class="btn btn-hijau">Tambah Data</a>
            <a href="{{ route('jamaah.cetak', request()->only(['search', 'alamat', 'kelompok']) + ['export' => 'pdf']) }}" class="btn btn-hijau">
                Export Data
            </a>


        </div>
    </div>


    {{-- Filter Data Jamaah --}}
    <form method="GET" action="{{ route('jamaah.index') }}" class="mb-3 row g-2 align-items-end">
        <div class="col-md-3">
            <label for="filter_search" class="form-label">Cari Nama</label>
            <input type="text" class="form-control" id="filter_search" name="search"
                value="{{ request('search') }}" placeholder="Contoh: Ahmad">
        </div>

        <div class="col-md-3">
            <label for="filter_kelompok" class="form-label">Filter Kelompok</label>
            <select name="kelompok" id="filter_kelompok" class="form-select">
                <option value="">-- Semua Kelompok --</option>
                @foreach(['Kelompok 1', 'Kelompok 2', 'Kelompok 3', 'Kelompok 4'] as $kelompok)
                    <option value="{{ $kelompok }}" {{ request('kelompok') == $kelompok ? 'selected' : '' }}>
                        {{ $kelompok }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-2">
            <label for="filter_alamat" class="form-label">Filter Alamat</label>
            <select name="alamat" id="filter_alamat" class="form-select">
                <option value="">-- Semua Alamat --</option>
                <option value="RT 1/RW 3" {{ request('alamat') == 'RT 1/RW 3' ? 'selected' : '' }}>RT 1/RW 3</option>
                <option value="RT 2/RW 3" {{ request('alamat') == 'RT 2/RW 3' ? 'selected' : '' }}>RT 2/RW 3</option>
            </select>
        </div>

        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
        </div>

        <div class="col-md-2">
            <a href="{{ route('jamaah.index') }}" class="btn btn-secondary w-100">Reset</a>
        </div>
    </form>



    {{-- Tabel Jamaah --}}
    <div class="table-responsive">
        <table class="table table-hijau table-bordered table-hover text-center align-middle">
            <thead class="bg-light text-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Kelompok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jamaahs as $index => $jamaah)
                    <tr>
                        <td>{{ $jamaahs->firstItem() + $index }}</td>
                        <td>{{ $jamaah->nama }}</td>
                        <td>{{ $jamaah->alamat }}</td>
                        <td>{{ $jamaah->kelompok }}</td>
                        <td>
                            <a href="{{ route('jamaah.edit', $jamaah->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                <i class="fas fa-edit">Edit</i>
                            </a>
                            <form action="{{ route('jamaah.destroy', $jamaah->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('Yakin ingin menghapus data ini?')" class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash-alt">Hapus</i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Tidak ada data jamaah yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


    {{-- Pagination --}}
    {{-- <div>
        Showing
        {{ $jamaahs->fisrtItem()}}
        to
        {{ $jamaahs->lastItem()}}
        of
        {{ $jamaahs->total()}}
        entries
    </div> --}}

    <div class="pull-right">
        {{ $jamaahs->links() }}
    </div>
</div>
@endsection
