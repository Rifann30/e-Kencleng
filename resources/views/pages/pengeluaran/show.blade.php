@extends('layouts.app_adminkit')

@section('content')
<div class="container card-bto">
    <h2 class="">Detail Data <strong>Pengeluaran</strong></h2>

    <table class="table table-bordered" style="margin-top: clamp(1rem, 2vw, 8rem)">
        <tr>
            <th>Tanggal Input</th>
            <td>{{ $pengeluaran->created_at->translatedFormat('d F Y, H:i') }}</td>
        </tr>
        <tr>
            <th>Terakhir Diedit</th>
            <td>{{ $pengeluaran->updated_at->translatedFormat('d F Y, H:i') }}</td>
        </tr>
        <tr>
            <th>Diinput oleh</th>
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
            <th>Tanggal Pengeluaran</th>
            <td>{{ \Carbon\Carbon::parse($pengeluaran->tanggal)->translatedFormat('d F Y') }}</td>
        </tr>
    </table>

    <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
