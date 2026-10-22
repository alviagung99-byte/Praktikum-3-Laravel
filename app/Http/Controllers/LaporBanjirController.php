<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class LaporBanjirController extends Controller
{

    public function form()
    {
        return view('laporbanjir.form');
    }

    public function kirim(Request $request)
    {
        $nama       = $request->input('nama_pelapor');
        $lokasi     = $request->input('lokasi');
        $genangan   = (int) $request->input('tinggi_genangan');
        $keterangan = $request->input('keterangan') ?: null;

    
        if ($genangan < 30) {
            $status = 'Waspada';
            $warna  = 'waspada';
        } elseif ($genangan <= 70) {
            $status = 'Siaga';
            $warna  = 'siaga';
        } else {
            $status = 'Awas';
            $warna  = 'awas';
        }

        $laporan = Laporan::create([
            'nama_pelapor'     => $nama,
            'lokasi'           => $lokasi,
            'tinggi_genangan'  => $genangan,
            'keterangan'       => $keterangan,
            'tanggal_kejadian' => now()->toDateString(),
        ]);

        $nomorLaporan = strtoupper(str_pad($laporan->id, 6, '0', STR_PAD_LEFT));

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

 
    public function daftar()
    {
 
        $laporan = Laporan::orderBy('tanggal_kejadian', 'desc')
                          ->orderBy('created_at', 'desc')
                          ->get();


        $jumlah_waspada = $laporan->filter(fn($l) => $l->tinggi_genangan < 30)->count();
        $jumlah_siaga   = $laporan->filter(fn($l) => $l->tinggi_genangan >= 30 && $l->tinggi_genangan <= 70)->count();
        $jumlah_awas    = $laporan->filter(fn($l) => $l->tinggi_genangan > 70)->count();

        return view('laporbanjir.daftar', compact(
            'laporan',
            'jumlah_waspada',
            'jumlah_siaga',
            'jumlah_awas'
        ));
    }
}
