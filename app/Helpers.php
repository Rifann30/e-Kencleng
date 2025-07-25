<?php

function formatRupiah($nominal, $prefix = false)
{
    if ($prefix) {
        return "Rp ".number_format($nominal, 0, ',', '.');
    }
    return number_format($nominal, 0, ',', '.');
}

function ubahAngkaToBulan($bulanAngka)
{
    $bulanArray = [
        '0' => '',
        '1' => 'Januari',
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ];

    $bulanAngka = (int) $bulanAngka;

    // return $bulanArray[$bulanAngka] ?? 'Bulan tidak valid';
    return $bulanArray[$bulanAngka + 0];
}

function daftarBulan()
{
    return [
        '1' => 'Januari',
        '2' => 'Februari',
        '3' => 'Maret',
        '4' => 'April',
        '5' => 'Mei',
        '6' => 'Juni',
        '7' => 'Juli',
        '8' => 'Agustus',
        '9' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember',
    ];
}

