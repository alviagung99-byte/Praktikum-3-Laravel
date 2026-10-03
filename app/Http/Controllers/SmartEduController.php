<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SmartEduController extends Controller
{
    // ----------------------------------------------------------
    // Landing & Auth
    // ----------------------------------------------------------

    public function landing()
    {
        $fitur = [
            ['ikon' => '📚', 'judul' => 'Materi Inklusif',    'deskripsi' => 'Konten pembelajaran yang disesuaikan dengan kebutuhan setiap siswa.'],
            ['ikon' => '✏️', 'judul' => 'Latihan Interaktif', 'deskripsi' => 'Soal latihan terstruktur untuk mengukur pemahaman siswa.'],
            ['ikon' => '📊', 'judul' => 'Pantau Perkembangan', 'deskripsi' => 'Orang tua dapat memantau progres belajar anak secara real-time.'],
            ['ikon' => '🏫', 'judul' => 'Manajemen Sekolah',  'deskripsi' => 'Staff TU mengelola kelas, guru, dan siswa dengan mudah.'],
        ];

        $roles = ['Staff TU', 'Guru', 'Siswa', 'Orang Tua'];

        return view('smartedu.landing', compact('fitur', 'roles'));
    }

    public function loginForm()
    {
        return view('smartedu.login');
    }

    // ----------------------------------------------------------
    // Dashboard
    // ----------------------------------------------------------

    public function staffDashboard()
    {
        $statistik = [
            'total_siswa' => 128,
            'guru_aktif'  => 14,
            'kelas'       => 8,
        ];

        $aktivitas = [
            ['nama' => 'Budi Santoso',    'role' => 'Siswa',    'aksi' => 'Menyelesaikan materi Matematika Bab 3',      'waktu' => '2 menit yang lalu'],
            ['nama' => 'Ibu Dewi',        'role' => 'Guru',     'aksi' => 'Menambahkan soal latihan IPA',               'waktu' => '15 menit yang lalu'],
            ['nama' => 'Ahmad Fauzi',     'role' => 'Siswa',    'aksi' => 'Mendaftar ke kelas VII-A',                   'waktu' => '1 jam yang lalu'],
            ['nama' => 'Pak Rahmat',      'role' => 'Staff TU', 'aksi' => 'Memperbarui data kelas VIII-B',             'waktu' => '2 jam yang lalu'],
        ];

        return view('smartedu.staff-tu.dashboard', compact('statistik', 'aktivitas'));
    }

    public function guruDashboard()
    {
        $data = [
            'nama_guru'    => 'Ibu Dewi Lestari',
            'mata_pelajaran' => 'Ilmu Pengetahuan Alam (IPA)',
            'total_siswa'  => 32,
            'total_materi' => 10,
            'total_soal'   => 25,
        ];

        return view('smartedu.guru.dashboard', compact('data'));
    }

    public function siswaDashboard()
    {
        $data = [
            'nama_siswa'     => 'Andi Prasetyo',
            'kelas'          => 'VII-A',
            'progress'       => 65,
            'materi_selesai' => 5,
            'total_materi'   => 8,
        ];

        $materi_hari_ini = [
            ['kode' => 'MTK-01', 'judul' => 'Bilangan Bulat',      'mapel' => 'Matematika', 'status' => 'Selesai'],
            ['kode' => 'IPA-02', 'judul' => 'Ekosistem Hutan',     'mapel' => 'IPA',        'status' => 'Belum'],
            ['kode' => 'BIN-03', 'judul' => 'Menulis Puisi',       'mapel' => 'Bhs. Indonesia', 'status' => 'Belum'],
        ];

        return view('smartedu.siswa.dashboard', compact('data', 'materi_hari_ini'));
    }

    public function orangTuaDashboard()
    {
        $data = [
            'nama_ortu'      => 'Bapak Prasetyo',
            'nama_anak'      => 'Andi Prasetyo',
            'kelas'          => 'VII-A',
            'progress'       => 65,
            'materi_selesai' => 5,
            'total_materi'   => 8,
        ];

        $progres_mingguan = [
            ['hari' => 'Sen', 'aktivitas' => 3],
            ['hari' => 'Sel', 'aktivitas' => 5],
            ['hari' => 'Rab', 'aktivitas' => 2],
            ['hari' => 'Kam', 'aktivitas' => 4],
            ['hari' => 'Jum', 'aktivitas' => 1],
        ];

        $tugas_pending = [
            ['judul' => 'Soal Latihan Ekosistem',  'mapel' => 'IPA'],
            ['judul' => 'Menulis Puisi Bebas',      'mapel' => 'Bhs. Indonesia'],
        ];

        return view('smartedu.orang-tua.dashboard', compact('data', 'progres_mingguan', 'tugas_pending'));
    }

    // ----------------------------------------------------------
    // Staff TU — CRUD Pages
    // ----------------------------------------------------------

    public function pengguna()
    {
        $pengguna = [
            ['id' => 'TU-001',    'nama' => 'Admin Sekolah',   'email' => 'admin@smartedu.id',   'role' => 'Staff TU'],
            ['id' => 'GR-0012',   'nama' => 'Ibu Dewi',        'email' => 'dewi@smartedu.id',    'role' => 'Guru'],
            ['id' => '20240001',  'nama' => 'Andi Prasetyo',   'email' => 'andi@smartedu.id',    'role' => 'Siswa'],
            ['id' => 'OT-20240001','nama' => 'Bapak Prasetyo', 'email' => 'prasetyo@gmail.com',  'role' => 'Orang Tua'],
        ];

        return view('smartedu.staff-tu.pengguna', compact('pengguna'));
    }

    public function kelas()
    {
        $kelas = [
            ['kode' => 'VII-A',  'nama' => 'Kelas VII A'],
            ['kode' => 'VII-B',  'nama' => 'Kelas VII B'],
            ['kode' => 'VIII-A', 'nama' => 'Kelas VIII A'],
            ['kode' => 'VIII-B', 'nama' => 'Kelas VIII B'],
            ['kode' => 'IX-A',   'nama' => 'Kelas IX A'],
            ['kode' => 'IX-B',   'nama' => 'Kelas IX B'],
        ];

        return view('smartedu.staff-tu.kelas', compact('kelas'));
    }

    public function mapel()
    {
        $mapel = [
            ['kode' => 'MTK', 'nama' => 'Matematika'],
            ['kode' => 'IPA', 'nama' => 'Ilmu Pengetahuan Alam'],
            ['kode' => 'IPS', 'nama' => 'Ilmu Pengetahuan Sosial'],
            ['kode' => 'BIN', 'nama' => 'Bahasa Indonesia'],
            ['kode' => 'BIG', 'nama' => 'Bahasa Inggris'],
            ['kode' => 'PKN', 'nama' => 'Pendidikan Kewarganegaraan'],
        ];

        return view('smartedu.staff-tu.mapel', compact('mapel'));
    }

    // ----------------------------------------------------------
    // Siswa — Materi & Latihan
    // ----------------------------------------------------------

    public function materi()
    {
        $materi = [
            ['kode' => 'MTK-01', 'judul' => 'Bilangan Bulat',       'mapel' => 'Matematika',        'status' => 'Selesai', 'halaman' => 5],
            ['kode' => 'IPA-02', 'judul' => 'Ekosistem Hutan',      'mapel' => 'IPA',               'status' => 'Belum',   'halaman' => 8],
            ['kode' => 'BIN-03', 'judul' => 'Menulis Puisi',        'mapel' => 'Bhs. Indonesia',    'status' => 'Belum',   'halaman' => 4],
            ['kode' => 'IPS-04', 'judul' => 'Keragaman Budaya',     'mapel' => 'IPS',               'status' => 'Selesai', 'halaman' => 6],
            ['kode' => 'BIG-05', 'judul' => 'Simple Present Tense', 'mapel' => 'Bhs. Inggris',      'status' => 'Belum',   'halaman' => 7],
        ];

        return view('smartedu.siswa.materi', compact('materi'));
    }

    public function detailMateri($kodeMateri)
    {
        $contoh = [
            'MTK-01' => ['judul' => 'Bilangan Bulat',       'mapel' => 'Matematika',     'isi' => 'Bilangan bulat adalah bilangan yang terdiri dari bilangan negatif, nol, dan bilangan positif. Contoh: ..., -3, -2, -1, 0, 1, 2, 3, ...'],
            'IPA-02' => ['judul' => 'Ekosistem Hutan',      'mapel' => 'IPA',            'isi' => 'Ekosistem hutan adalah suatu sistem ekologi yang terbentuk oleh hubungan timbal balik antara makhluk hidup dengan lingkungannya di kawasan hutan.'],
            'BIN-03' => ['judul' => 'Menulis Puisi',        'mapel' => 'Bhs. Indonesia', 'isi' => 'Puisi adalah karya sastra yang mengungkapkan pikiran dan perasaan penyair secara imajinatif dengan mengutamakan keindahan bahasa.'],
        ];

        $materi = $contoh[$kodeMateri] ?? [
            'judul' => 'Materi ' . $kodeMateri,
            'mapel' => 'Umum',
            'isi'   => 'Konten materi ini akan segera tersedia.',
        ];

        return view('smartedu.siswa.detail-materi', compact('materi', 'kodeMateri'));
    }

    public function latihan()
    {
        $latihan = [
            ['kode' => 'MTK-01', 'judul' => 'Soal Bilangan Bulat',       'mapel' => 'Matematika',     'total_soal' => 10, 'status' => 'Selesai'],
            ['kode' => 'IPA-02', 'judul' => 'Soal Ekosistem',            'mapel' => 'IPA',            'total_soal' => 8,  'status' => 'Belum'],
            ['kode' => 'BIN-03', 'judul' => 'Soal Puisi dan Sastra',     'mapel' => 'Bhs. Indonesia', 'total_soal' => 5,  'status' => 'Belum'],
        ];

        return view('smartedu.siswa.latihan', compact('latihan'));
    }

    public function detailLatihan($kodeMateri)
    {
        $contoh = [
            'MTK-01' => [
                'judul' => 'Soal Latihan Bilangan Bulat',
                'mapel' => 'Matematika',
                'soal'  => [
                    ['no' => 1, 'pertanyaan' => 'Berapakah hasil dari -5 + 3?',    'pilihan' => ['-8', '-2', '2', '8'],       'jawaban' => 'B'],
                    ['no' => 2, 'pertanyaan' => 'Manakah yang merupakan bilangan bulat negatif?', 'pilihan' => ['5', '0', '-3', '2.5'], 'jawaban' => 'C'],
                    ['no' => 3, 'pertanyaan' => 'Hasil dari (-4) × (-3) adalah?',  'pilihan' => ['-12', '-7', '7', '12'],     'jawaban' => 'D'],
                ],
            ],
        ];

        $latihan = $contoh[$kodeMateri] ?? [
            'judul' => 'Soal Latihan ' . $kodeMateri,
            'mapel' => 'Umum',
            'soal'  => [],
        ];

        return view('smartedu.siswa.detail-latihan', compact('latihan', 'kodeMateri'));
    }
}
