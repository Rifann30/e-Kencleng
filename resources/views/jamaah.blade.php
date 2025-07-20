@extends('layouts.app_adminkit')


@section('content')
<div class="container">
    <h2 class=" mt-3" style="margin-bottom: clamp(0.6rem, 1.7vw, 2rem);">Data <strong>Jamaah</strong></h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Tombol Tambah & Export --}}
    <div class="d-flex justify-content-between mb-3 align-items-center flex-wrap gap-0">
        <div>
            <label for="jml_jamaah" class="form-label mb-0 fw-bold" style="font-size: clamp(0.6rem, 0.8vw, 1rem);">Jumlah Jamaah:</label>
            <p id="jml_jamaah" class="mb-0" style="color: #23D155; font-size: clamp(1.2rem, 1.7vw, 1.8rem); font-weight: 600;">{{ $jumlahJamaah }} Jamaah</p>
        </div>
        <div class="row-col-2 gap-2">
            <a href="{{ route('jamaah.create') }}" class="btn btn-hijau">Tambah Data</a>
            <a href="{{ route('jamaah.cetak', request()->only(['search', 'alamat', 'kelompok']) + ['export' => 'pdf']) }}" class="btn btn-hijau">
                Export Data
            </a>
        </div>
    </div>


    {{-- Filter Data Jamaah --}}
    <form method="GET" action="{{ route('jamaah.index') }}">
        <div class="d-flex justify-content-between align-items-end flex-wrap mb-3">
        <div class="d-flex flex-column card-bto me-2">
            <label for="filter_search" class="form-label label-responsive">Cari Nama</label>
            <input type="text" class="form-control select2-hijau" id="filter_search" name="search"
                value="{{ request('search') }}" placeholder="Contoh: Ahmad">
        </div>

        <div class="card-bto me-2 mt-2">
            <label for="filter_kelompok" class="form-label label-responsive">Filter Kelompok</label>
            <select name="kelompok" id="filter_kelompok" class="form-select select2-hijau">
                <option value="">-- Semua Kelompok --</option>
                @foreach(['Kelompok 1', 'Kelompok 2', 'Kelompok 3', 'Kelompok 4'] as $kelompok)
                    <option value="{{ $kelompok }}" {{ request('kelompok') == $kelompok ? 'selected' : '' }}>
                        {{ $kelompok }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="card-bto me-2 mt-2">
            <label for="filter_alamat" class="form-label label-responsive">Filter Alamat</label>
            <select name="alamat" id="filter_alamat" class="form-select select2-hijau">
                <option value="">-- Semua Alamat --</option>
                <option value="RT 1/RW 3" {{ request('alamat') == 'RT 1/RW 3' ? 'selected' : '' }}>RT 1/RW 3</option>
                <option value="RT 2/RW 3" {{ request('alamat') == 'RT 2/RW 3' ? 'selected' : '' }}>RT 2/RW 3</option>
            </select>
        </div>

        <div class="card-bto me-2 d-flex flex-row mt-2">
            <button type="submit" class="btn btn-primary w-100 me-2">Tampilkan</button>
            <a href="{{ route('jamaah.index') }}" class="btn btn-secondary w-100">Reset</a>
        </div>

        {{-- <div class="card-bto me-2">

        </div> --}}
        </div>
    </form>



    {{-- Tabel Jamaah --}}
    <div class="card-aksi table-responsive mb-3">
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
                        <td >{{ $jamaahs->firstItem() + $index }}</td>
                        <td class="text-nowrap">{{ $jamaah->nama }}</td>
                        <td class="text-nowrap">{{ $jamaah->alamat }}</td>
                        <td>{{ $jamaah->kelompok }}</td>
                        <td>
                            <a href="{{ route('jamaah.edit', $jamaah->id) }}" class="btn btn-sm btn-warning mb-1" title="Edit">
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
