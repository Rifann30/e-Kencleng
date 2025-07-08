@extends('layouts.app_adminkit')

@section('content')
<div class="container mt-4">
    <h3>Detail Pengeluaran</h3>

    <table class="table table-bordered">
        <tr>
            <th>Tanggal Input</th>
            <td>{{ $pengeluaran->created_at->translatedFormat('d F Y, H:i') }}</td>
        </tr>
        <tr>
            <th>Terakhir Diedit</th>
            <td>{{ $pengeluaran->updated_at->translatedFormat('d F Y, H:i') }}</td>
        </tr>
        <tr>
            <th>Dibuat oleh</th>
            <td>{{ $pengeluaran->createdBy->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Diedit oleh</th>
            <td>{{ $pengeluaran->updatedBy->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Nama Pengeluaran</th>
            <td>{{ $pengeluaran->pengeluaran }}</td>
        </tr>
        <tr>
            <th>Jumlah Dana</th>
            <td>{{ formatRupiah($pengeluaran->jml_dana, true) }}</td>
        </tr>
        <tr>
            <th>Keterangan</th>
            <td>{{ $pengeluaran->keterangan ?? '-' }}</td>
        </tr>
        <tr>
            <th>Tanggal</th>
            <td>{{ \Carbon\Carbon::parse($pengeluaran->tanggal)->translatedFormat('d F Y') }}</td>
        </tr>
    </table>

    <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
