<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftaranSiswaController extends Controller
{
    /**
     * Menampilkan halaman form pendaftaran siswa baru.
     * Mewakili proses "input data pengguna baru" pada SmartEduInclusion.
     */
    public function form()
    {
        // Data kelas dan mapel diisi statis (tanpa database)
        $kelas = [
            ['kode' => 'VII-A',  'nama' => 'Kelas VII A'],
            ['kode' => 'VII-B',  'nama' => 'Kelas VII B'],
            ['kode' => 'VIII-A', 'nama' => 'Kelas VIII A'],
            ['kode' => 'VIII-B', 'nama' => 'Kelas VIII B'],
            ['kode' => 'IX-A',   'nama' => 'Kelas IX A'],
            ['kode' => 'IX-B',   'nama' => 'Kelas IX B'],
        ];

        return view('pendaftaran.form', compact('kelas'));
    }

    /**
     * Memproses data pendaftaran siswa dari form POST.
     * Data diproses sementara di Controller lalu dikirim ke view hasil.
     * Tidak ada penyimpanan ke database.
     */
    public function proses(Request $request)
    {
        $nama          = $request->input('nama');
        $nisn          = $request->input('nisn');
        $email         = $request->input('email');
        $tempatLahir   = $request->input('tempat_lahir');
        $tanggalLahir  = $request->input('tanggal_lahir');
        $jenisKelamin  = $request->input('jenis_kelamin');
        $kodeKelas     = $request->input('kode_kelas');
        $namaKelas     = $request->input('nama_kelas');
        $alamat        = $request->input('alamat');

        // Proses: hitung umur dari tanggal lahir
        $umur = null;
        if ($tanggalLahir) {
            $lahir = new \DateTime($tanggalLahir);
            $umur  = $lahir->diff(new \DateTime())->y;
        }

        // Proses: format tanggal ke bahasa Indonesia
        $bulan = [
            '01' => 'Januari',  '02' => 'Februari', '03' => 'Maret',
            '04' => 'April',    '05' => 'Mei',       '06' => 'Juni',
            '07' => 'Juli',     '08' => 'Agustus',   '09' => 'September',
            '10' => 'Oktober',  '11' => 'November',  '12' => 'Desember',
        ];

        $tanggalFormatted = null;
        if ($tanggalLahir) {
            [$thn, $bln, $tgl] = explode('-', $tanggalLahir);
            $tanggalFormatted = "{$tgl} {$bulan[$bln]} {$thn}";
        }

        // Generate ID pengguna sementara
        $idPengguna = 'SISWA-' . strtoupper(substr(md5($nisn . $nama), 0, 6));

        return view('pendaftaran.hasil', compact(
            'nama',
            'nisn',
            'email',
            'tempatLahir',
            'tanggalLahir',
            'tanggalFormatted',
            'jenisKelamin',
            'kodeKelas',
            'namaKelas',
            'alamat',
            'umur',
            'idPengguna'
        ));
    }
}
