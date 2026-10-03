@extends('layouts.dashboard')

@section('title', 'Dashboard Guru')
@section('sidebar-subtitle', 'Portal Guru')
@section('page-title', 'Dashboard Guru')
@section('user-initials', 'GR')

@section('sidebar-menu')
    <a href="{{ route('guru.dashboard') }}" class="active">🏠 Beranda</a>
    <button class="nav-btn">🏫 Kelas Saya</button>
    <button class="nav-btn">📖 Materi</button>
    <button class="nav-btn">📝 Soal Latihan</button>
@endsection

@section('content')
<h2 style="font-size:1.75rem;font-weight:800;margin-bottom:.5rem;">Halo, {{ $data['nama_guru'] }}! 👋</h2>
<p style="color:#64748b;margin-bottom:2rem;">Mata Pelajaran: <strong>{{ $data['mata_pelajaran'] }}</strong></p>

<div class="stat-grid" style="grid-template-columns:repeat(3,1fr);">
    <div class="stat-card">
        <div class="stat-icon blue">🎒</div>
        <div>
            <div class="stat-label">Total Siswa</div>
            <div class="stat-value">{{ $data['total_siswa'] }}</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green">📖</div>
        <div>
            <div class="stat-label">Materi Dibuat</div>
            <div class="stat-value">{{ $data['total_materi'] }}</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon orange">✏️</div>
        <div>
            <div class="stat-label">Soal Latihan</div>
            <div class="stat-value">{{ $data['total_soal'] }}</div>
        </div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:1.25rem;margin-top:1.5rem;">
    <div class="card">
        <h3 class="section-title">📖 Materi Terbaru</h3>
        @foreach ([['MTK-01','Bilangan Bulat','2 hari lalu'],['MTK-02','Persamaan Linear','5 hari lalu'],['MTK-03','Statistika Dasar','1 minggu lalu']] as [$kode, $judul, $waktu])
        <div style="display:flex;align-items:center;justify-content:space-between;padding:.75rem 0;border-bottom:1px solid #f1f5f9;">
            <div>
                <strong style="font-size:.9rem;">{{ $judul }}</strong>
                <p style="font-size:.78rem;color:#94a3b8;margin-top:.15rem;">{{ $kode }} &bull; {{ $waktu }}</p>
            </div>
            <span class="badge badge-blue">Aktif</span>
        </div>
        @endforeach
    </div>

    <div class="card">
        <h3 class="section-title">✏️ Aksi Cepat</h3>
        <div style="display:flex;flex-direction:column;gap:.75rem;">
            <button onclick="alert('Fitur tersedia di versi lengkap.')" class="btn btn-primary">➕ Upload Materi Baru</button>
            <button onclick="alert('Fitur tersedia di versi lengkap.')" class="btn btn-outline">📝 Buat Soal Latihan</button>
            <button onclick="alert('Fitur tersedia di versi lengkap.')" class="btn" style="border:1.5px solid #e2e8f0;color:#475569;">📊 Lihat Nilai Siswa</button>
        </div>
    </div>
</div>
@endsection
