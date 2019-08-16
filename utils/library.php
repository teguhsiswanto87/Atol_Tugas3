<?php

// tanggal dengan format inggris
function tgl_english($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulanAngka = substr($tgl, 5, 2); // konversi menjadi nama bulan bahasa inggris
    $bulan = ambilbulan(substr($tgl, 5, 2)); // konversi menjadi nama bulan bahasa inggris
    $tahun = substr($tgl, 0, 4);
    return $bulan . ' ' . $tanggal . ', ' . $tahun;
}

// fungsi untuk mengubah angka bulan menjadi nama bulan
function ambilbulan($bln)
{
    if ($bln == "01") return "January";
    elseif ($bln == "02") return "February";
    elseif ($bln == "03") return "March";
    elseif ($bln == "04") return "April";
    elseif ($bln == "05") return "May";
    elseif ($bln == "06") return "June";
    elseif ($bln == "07") return "July";
    elseif ($bln == "08") return "August";
    elseif ($bln == "09") return "September";
    elseif ($bln == "10") return "October";
    elseif ($bln == "11") return "November";
    elseif ($bln == "12") return "December";
}

// format number for price
function priceFormat($nominal)
{
    return number_format($nominal, 0, ",", ".");
}