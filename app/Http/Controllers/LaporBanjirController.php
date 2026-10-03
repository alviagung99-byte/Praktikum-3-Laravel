<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporBanjirController extends Controller
{
    /**
     * Menampilkan halaman form pelaporan banjir.
     */
    public function form()
    {
        return view('laporbanjir.form');
    }

    /**
     * Memproses data laporan banjir dari form POST,
     * lalu menampilkan halaman konfirmasi.
     * Data tidak disimpan ke database (proses sementara).
     */
    public function kirim(Request $request)
    {
        $nama      = $request->input('nama_pelapor');
        $lokasi    = $request->input('lokasi');
        $genangan  = $request->input('tinggi_genangan');
        $keterangan = $request->input('keterangan', '-');

        // Tentukan status berdasarkan tinggi genangan
        if ($genangan <= 30) {
            $status = 'Rendah';
            $warna  = 'kuning';
        } elseif ($genangan <= 70) {
            $status = 'Sedang';
            $warna  = 'oranye';
        } else {
            $status = 'Tinggi';
            $warna  = 'merah';
        }

        $nomorLaporan = strtoupper(substr(md5(uniqid()), 0, 8));

        return view('laporbanjir.konfirmasi', compact(
            'nama',
            'lokasi',
            'genangan',
            'keterangan',
            'status',
            'warna',
            'nomorLaporan'
        ));
    }
}
