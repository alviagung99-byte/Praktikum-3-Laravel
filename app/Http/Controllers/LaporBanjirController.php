<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $keterangan = $request->input('keterangan', '-');

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

    public function daftar()
    {
        $laporan = [
            [
                'nomor'           => 'A1B2C3D4',
                'nama'            => 'Budi Santoso',
                'lokasi'          => 'Kec. Baleendah, Desa Andir',
                'tinggi_genangan' => 85,
                'keterangan'      => 'Jalan utama tergenang, warga mulai mengungsi ke masjid.',
                'tanggal'         => '20 Okt 2026',
            ],
            [
                'nomor'           => 'E5F6G7H8',
                'nama'            => 'Siti Rahayu',
                'lokasi'          => 'Kec. Dayeuhkolot, Desa Citereup',
                'tinggi_genangan' => 45,
                'keterangan'      => 'Halaman rumah warga mulai tergenang sejak pukul 03.00 WIB.',
                'tanggal'         => '20 Okt 2026',
            ],
            [
                'nomor'           => 'I9J0K1L2',
                'nama'            => 'Ahmad Fauzi',
                'lokasi'          => 'Kec. Majalaya, Desa Majasetra',
                'tinggi_genangan' => 20,
                'keterangan'      => 'Genangan ringan di depan SD, anak-anak masih bisa masuk sekolah.',
                'tanggal'         => '19 Okt 2026',
            ],
            [
                'nomor'           => 'M3N4O5P6',
                'nama'            => 'Dewi Kusuma',
                'lokasi'          => 'Kec. Cileunyi, Desa Cibiru Hilir',
                'tinggi_genangan' => 110,
                'keterangan'      => 'Banjir besar, 12 keluarga terpaksa mengungsi. Akses jalan terputus.',
                'tanggal'         => '19 Okt 2026',
            ],
            [
                'nomor'           => 'Q7R8S9T0',
                'nama'            => 'Rahmat Hidayat',
                'lokasi'          => 'Kec. Solokanjeruk, Desa Rancakasumba',
                'tinggi_genangan' => 55,
                'keterangan'      => '-',
                'tanggal'         => '18 Okt 2026',
            ],
        ];

        $jumlah_waspada = count(array_filter($laporan, fn($l) => $l['tinggi_genangan'] < 30));
        $jumlah_siaga   = count(array_filter($laporan, fn($l) => $l['tinggi_genangan'] >= 30 && $l['tinggi_genangan'] <= 70));
        $jumlah_awas    = count(array_filter($laporan, fn($l) => $l['tinggi_genangan'] > 70));

        return view('laporbanjir.daftar', compact(
            'laporan',
            'jumlah_waspada',
            'jumlah_siaga',
            'jumlah_awas'
        ));
    }
}
