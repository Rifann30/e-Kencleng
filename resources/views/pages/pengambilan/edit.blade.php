@extends('layouts.app_adminkit')

@section('content')
<div class="container">
    <div class="row">
        <div class="card-bto">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Edit <strong>Data Pengambilan</strong></h2>
                </div>
                <div class="card-body">
                    {{-- Alert --}}
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Form Edit --}}
                    <form action="{{ route('pengambilan.update', $pengambilan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            {{-- Bulan --}}
                            <div class="card-bto mb-3">
                                <label for="bulan" class="form-label" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Bulan</label>
                                <select id="bulan" name="bulan" class="form-select select2-hijau" required>
                                    <option value="">-- Pilih Bulan --</option>
                                    @foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'] as $bln)
                                        <option value="{{ $bln }}">{{ $bln }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Tahun --}}
                            <div class="card-bto mb-3">
                                <label for="tahun" class="form-label" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Tahun</label>
                                {{-- <input type="number" id="tahun" name="tahun" class="form-control" placeholder="Contoh: 2025" required> --}}
                                <select name="tahun" id="tahun" class="form-select select2-hijau" required>
                                    <option value="">-- Pilih Tahun --</option>
                                    @for ($tahun = now()->year; $tahun >= 2023; $tahun--)
                                        <option value="{{ $tahun }}">{{ $tahun }}</option>
                                    @endfor
                                </select>

                            </div>

                            {{-- Hidden periode --}}
                            <input type="hidden" name="periode" id="periode">

                            {{-- Jumlah dana --}}
                            <div class="col-md-6 mb-3">
                                <label for="jml_dana" class="form-label" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Jumlah Dana</label>
                                <input type="text" name="jml_dana" id="jml_dana" class="form-control rupiah select2-hijau" value="{{ old('jml_dana', $pengambilan->jml_dana) }}" required>
                            </div>


                        </div>

                        {{-- Hidden jumlah jamaah --}}
                        <input type="hidden" name="jml_jamaah" id="jml_jamaah" value="0">



                        <hr>

                        {{-- Filter kelompok --}}
                            <div class="col-md-4 mb-3">
                                <label for="filterKelompok" class="form-label" style="font-size: clamp(0.6rem, 1vw, 1rem); font-weight: 600;">Filter Kelompok Jamaah</label>
                                <select id="filterKelompok" class="form-select select2-hijau">
                                    <option value="">Semua Kelompok</option>
                                    @foreach($kelompoks->sortKeys() as $kelompok => $jamaahs)
                                        <option value="{{ $kelompok }}">{{ $kelompok }}</option>
                                    @endforeach
                                </select>
                            </div>

                        {{-- Checklist jamaah --}}
                        <div class="row">
                            @foreach($kelompoks->sortKeys() as $kelompok => $jamaahs)
                                <div class="col-md-6 kelompok-container mb-4" data-kelompok="{{ $kelompok }}">
                                    <div class="border rounded p-3 h-100">
                                        <h6 class="fw-bold mb-2">{{ $kelompok }}</h6>
                                        @foreach($jamaahs as $jamaah)
                                            <div class="form-check mb-1">
                                                <input
                                                    class="form-check-input checkbox-jamaah"
                                                    type="checkbox"
                                                    name="jamaah_id[]"
                                                    value="{{ $jamaah['id'] }}"
                                                    id="jamaah-{{ $jamaah['id'] }}"
                                                    {{ in_array($jamaah['id'], old('jamaah_id', $pengambilan->jamaah->pluck('id')->toArray() ?? [])) ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="jamaah-{{ $jamaah['id'] }}">
                                                    {{ $jamaah['nama'] }} ({{ $jamaah['alamat'] }})
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Jumlah Jamaah Terpilih --}}
                        <div class="flex-wrap mt-0">
                            <label class="form-label">Jumlah Pengambilan Kencleng</label>
                            <p id="total-jamaah" class="" style="color: #23D155; font-size: 1rem; font-weight: 600;">0 Jamaah</p>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-hijau">Update Data</button>
                            <a href="{{ route('pengambilan.index') }}" class="btn btn-secondary ms-2">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ambil dan pecah periode lama
        const periodeLama = @json($pengambilan->periode);
        const [bulanLama, tahunLama] = periodeLama.split(' ');

        // Set nilai default
        document.getElementById('bulan').value = bulanLama;
        document.getElementById('tahun').value = tahunLama;

        // Perbarui hidden periode
        const bulanSelect = document.getElementById('bulan');
        const tahunInput = document.getElementById('tahun');
        const periodeInput = document.getElementById('periode');

        function updatePeriode() {
            const bulan = bulanSelect.value;
            const tahun = tahunInput.value;
            if (bulan && tahun) {
                periodeInput.value = bulan + ' ' + tahun;
            }
        }

        bulanSelect.addEventListener('change', updatePeriode);
        tahunInput.addEventListener('input', updatePeriode);
        updatePeriode();

        // Filter kelompok
        const filterKelompokSelect = document.getElementById('filterKelompok');
        const kelompokContainers = document.querySelectorAll('.kelompok-container');

        function filterKelompok() {
            const selected = filterKelompokSelect.value;
            kelompokContainers.forEach(container => {
                container.style.display = (!selected || container.dataset.kelompok === selected) ? 'block' : 'none';
            });
        }

        filterKelompokSelect.addEventListener('change', filterKelompok);
        filterKelompok();

        // Hitung jumlah checklist jamaah
        const checkboxes = document.querySelectorAll('.checkbox-jamaah');
        const jmlJamaahInput = document.getElementById('jml_jamaah');
        const totalJamaahText = document.getElementById('total-jamaah');

        function hitungJamaahTerpilih() {
            const terpilih = document.querySelectorAll('.checkbox-jamaah:checked').length;
            jmlJamaahInput.value = terpilih;
            totalJamaahText.textContent = `${terpilih} Jamaah`;
        }

        checkboxes.forEach(cb => cb.addEventListener('change', hitungJamaahTerpilih));
        hitungJamaahTerpilih(); // inisialisasi awal
    });
</script>
@endsection
