@extends('layouts.app_adminkit')

@section('content')
<div class="container">
    <h2 class="mb-3 mt-2">Pengambilan <strong>Kencleng</strong></h2>
    {{-- Filter Kelompok Jamaah --}}
    <div class=" form-group mb-3">
        <label for="filterKelompok" class="form-label" style="font-size: clamp(0.6rem, 0.8vw, 1rem);">Filter Kelompok Jamaah</label>
        <select id="filterKelompok" class="form-select select2-hijau" style="width: 50%">
            <option value="">Semua Kelompok</option>
            @foreach($kelompoks->sortKeys() as $kelompok => $jamaahs)
                <option value="{{ $kelompok }}">{{ $kelompok }}</option>
            @endforeach
        </select>
    </div>

    {{-- Form Tambah Pengambilan --}}
    <form action="{{ route('pengambilan.store') }}" method="POST">
        @csrf

        {{-- Daftar Jamaah --}}
        {{-- Scrollable Container untuk Daftar Jamaah --}}
        <div id="daftar-jamaah">
            @foreach ($kelompoks->sortKeys() as $group => $jamaah)
                <div class="mb-3 kelompok-container" data-kelompok="{{ $group }}">
                    <h5><b>{{ $group }}</b></h5>

                    {{-- Scroll table --}}
                    <div style="max-height: 350px; overflow-y: auto; border: 1px solid rgb(215, 215, 215);">
                        <table class="table table-hijau table-hover table-bordered mb-0">
                            <thead class="table-light sticky-top" style="top: 0; z-index: 1;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Ambil</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $checkedIds = \App\Models\PengambilanTemp::where('user_id', auth()->id())->pluck('jamaah_id')->toArray();
                                @endphp

                                @foreach ($jamaah as $index => $j)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><strong>{{ $j['nama'] }}</strong></td>
                                        <td>{{ $j['alamat'] }}</td>
                                        <td>
                                            <input type="checkbox"
                                                name="jamaah_id[]"
                                                value="{{ $j['id'] }}"
                                                class="checkbox-jamaah"
                                                data-id="{{ $j['id'] }}"
                                                {{ in_array($j['id'], $checkedIds) ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    {{-- Tombol hapus kanan
                    <div class="d-flex justify-content-end mt-2">
                        <button type="button" class="btn btn-sm btn-danger clear-checkbox" data-kelompok="{{ $group }}">
                            Hapus checkbox Kelompok Ini
                        </button>
                    </div> --}}

                </div>
            @endforeach
        </div>


        {{-- Input Pengambilan --}}
        <div class="row d-flex mt-4">
            <div class="col-md-6">
                <label for="jml_dana" class="form-label label-responsive">Jumlah Dana diperoleh</label>
                <input type="text" name="jml_dana" id="jml_dana" class="rupiah form-control select2-hijau " placeholder="Masukkan jumlah dana" required >
            </div>
            <div class="col-md-6">
                <label for="jml_jamaah" class="form-label label-responsive">Jumlah Pengambilan Kencleng</label>
                <p id="total-jamaah" class="text-success mt-2" style="color: #23D155; font-size: clamp(0.8rem, 1.3vw, 2.5rem);">0 Jamaah</p>
                <input type="hidden" name="jml_jamaah" id="jml_jamaah" value="0">
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="bulan" class="form-label label-responsive">Bulan Pengambilan</label>
                <select name="bulan" id="bulan" class="form-select select2-hijau" required>
                    <option value="">-- Pilih Bulan --</option>
                    @foreach($dataBulan as $angka => $nama)
                        <option value="{{ $nama }}">{{ $nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="tahun" class="form-label label-responsive">Tahun Pengambilan</label>
                <select name="tahun" id="tahun" class="form-select select2-hijau" required>
                    <option value="">-- Pilih Tahun --</option>
                    @for ($tahun = now()->year; $tahun >= 2023; $tahun--)
                        <option value="{{ $tahun }}">{{ $tahun }}</option>
                    @endfor
                </select>
            </div>
            <input type="hidden" name="periode" id="periode">
        </div>

        <div class="col-4 mx-auto mb-3">
            <button type="submit" class="btn btn-hijau w-100">Simpan</button>
        </div>

    </form>

    {{-- Data Pengambilan --}}

        <div id="tabel-pengambilan" class="d-flex justify-content-between align-items-end flex-wrap" style="margin-top: clamp(2.5rem, 5vw, 6rem);">
            <div class="">
                <h3 class="" style="font-size: clamp(1rem, 2vw, 1.5rem)">Data <strong>Pengambilan</strong></h3>
                <label class="form-label mb-0 fw-bold" style="font-size: clamp(0.6rem, 0.8vw, 1rem); margin-top: clamp(0.1rem, 0.3vw, 4rem);">Total Dana Pengambilan:</label>
                <p class=" mb-0" style="color: #23D155; font-size: clamp(1.2rem, 1.7vw, 1.8rem); font-weight: 600;">Rp {{ number_format($jumlahPengambilan, 0, ',', '.') }}</p>
            </div>

        <div class="text-end">
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        const el = document.getElementById('tabel-pengambilan');
                        if (el) {
                            setTimeout(() => {
                                el.scrollIntoView({ behavior: 'smooth', block: 'start' });
                            }, 300); // jeda agar layout sempat render
                        }
                    });
                </script>
                @endif

        </div>

        </div>





<div class="card-aksi table-responsive mt-2" style="max-height: 1000px; overflow-y: auto;">
    <table class="table table-hijau table-hover my-0">
        <thead class="table-header-sticky">
            <tr>
                <th>No</th>

                <th>Periode Pengambilan</th>
                <th>Jumlah Kencleng Diambil</th>
                <th>Dana Perolehan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengambilans as $index => $item)
                <tr>
                    <td>{{ $pengambilans->firstItem() + $index }}</td>
                    <td>{{ $item->periode }}</td>
                    <td>{{ $item->jml_jamaah }}</td>
                    <td style="color: #23D155;">{{ formatRupiah($item->jml_dana, true) }}</td>
                    <td>
                        <a href="{{ route('pengambilan.edit', $item->id) }}" class="btn btn-sm btn-warning mb-1">
                            <i class="fas fa-edit"> Edit</i>
                        </a>
                        <a href="{{ route('pengambilan.show', $item->id) }}" class="btn btn-sm btn-info mb-1">
                            <i class="fas fa-info-circle"> Info</i>
                        </a>
                        <form action="{{ route('pengambilan.destroy', $item->id) }}" method="POST" style="display:inline-block">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus?')">
                                <i class="fas fa-trash-alt"> Hapus</i>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    <div class="mt-3">
    {{ $pengambilans->links() }}
    </div>
</div>

{{-- Script Section --}}
<script>

    document.addEventListener('DOMContentLoaded', function () {
        // Simpan checkbox ketika berubah
        document.querySelectorAll('.checkbox-jamaah').forEach(checkbox => {
            checkbox.addEventListener('change', function () {
                const jamaahId = this.dataset.id;

                fetch("{{ route('pengambilan.temp.toggle') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ jamaah_id: jamaahId })
                });
            });
        });

        // Tombol hapus semua per kelompok
        document.querySelectorAll('.clear-checkbox').forEach(button => {
            button.addEventListener('click', function () {
                const kelompokContainer = this.closest('.kelompok-container');
                const checkboxes = kelompokContainer.querySelectorAll('.checkbox-jamaah');
                const ids = Array.from(checkboxes).map(cb => cb.value);

                checkboxes.forEach(cb => cb.checked = false);

                fetch("{{ route('pengambilan.temp.clear') }}", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ jamaah_ids: ids })
                });
            });
        });
    });



    document.addEventListener('DOMContentLoaded', function () {
    function hitungJamaah() {
        const checked = document.querySelectorAll('.checkbox-jamaah:checked').length;
        document.getElementById('total-jamaah').textContent = checked + " Jamaah";
        document.getElementById('jml_jamaah').value = checked;
    }

    const filterKelompokSelect = document.getElementById('filterKelompok');
    const kelompokContainers = document.querySelectorAll('.kelompok-container');

    function filterKelompok() {
        const selected = filterKelompokSelect.value;
        kelompokContainers.forEach(container => {
            if (!selected || container.dataset.kelompok === selected) {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        });
    }

    // Tambahan untuk periode
    function setPeriode() {
        const bulan = document.getElementById('bulan').value;
        const tahun = document.getElementById('tahun').value;
        const periodeField = document.getElementById('periode');
        if (bulan && tahun) {
            periodeField.value = bulan + ' ' + tahun;
        }
    }

    document.getElementById('bulan').addEventListener('change', setPeriode);
    document.getElementById('tahun').addEventListener('change', setPeriode);

    filterKelompokSelect.addEventListener('change', filterKelompok);
    document.querySelectorAll('.checkbox-jamaah').forEach(cb => {
        cb.addEventListener('change', hitungJamaah);
    });


    filterKelompok();
    hitungJamaah();
});

</script>
@endsection



