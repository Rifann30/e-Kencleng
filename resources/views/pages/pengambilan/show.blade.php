@extends('layouts.app_adminkit')

@section('content')
<div class="container">
    <h2>Detail Pengambilan Kencleng</h2>
    <table class="table table-bordered">
        <tr>
            <th>Tanggal Input</th>
            <td>{{ $pengambilan->created_at->translatedFormat('d F Y, H:i') }}</td>
        </tr>
        <tr>
            <th>Terakhir Diedit</th>
            <td>{{ $pengambilan->updated_at->translatedFormat('d F Y, H:i') }}</td>
        </tr>
        <tr>
            <th>Dibuat oleh</th>
            <td>{{ $pengambilan->createdBy->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Diedit oleh</th>
            <td>{{ $pengambilan->updatedBy->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>Jumlah Jamaah</th>
            <td>{{ $pengambilan->jml_jamaah }}</td>
        </tr>
        <tr>
            <th>Jumlah Dana</th>
            <td>{{ formatRupiah($pengambilan->jml_dana, true) }}</td>
        </tr>
        <tr>
            <th>Periode</th>
            <td>{{ $pengambilan->periode }}</td>
        </tr>
        <tr>
            <th>Tanggal Pengambilan</th>
            <td>{{ \Carbon\Carbon::parse($pengambilan->tanggal)->translatedFormat('d F Y') }}</td>
        </tr>
    </table>

    <a href="{{ route('pengambilan.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection
