@extends('layouts.app_adminkit')

@section('content')
<div class="container card-bto">
    <h2>Detail Data <strong>Pengambilan Kencleng</strong></h2>
    <table class="table table-bordered" style="margin-top: clamp(1rem, 2vw, 8rem)">
        <tr>
            <th>Tanggal Input</th>
            <td>{{ $pengambilan->created_at->translatedFormat('d F Y, H:i') }}</td>
        </tr>
        <tr>
            <th>Terakhir Diedit</th>
            <td>{{ $pengambilan->updated_at->translatedFormat('d F Y, H:i') }}</td>
        </tr>
        <tr>
            <th>Diinput oleh</th>
            <td>{{ $pengambilan->createdBy->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Diedit oleh</th>
            <td>{{ $pengambilan->updatedBy->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jumlah Kencleng</th>
            <td>{{ $pengambilan->jml_jamaah }}</td>
        </tr>
        <tr>
            <th>Jumlah Dana</th>
            <td>{{ formatRupiah($pengambilan->jml_dana, true) }}</td>
        </tr>
        <tr>
            <th>Periode Pengambilan</th>
            <td>{{ $pengambilan->periode }}</td>
        </tr>
    </table>

    <a href="{{ route('pengambilan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
