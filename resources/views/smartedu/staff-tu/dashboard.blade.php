@extends('layouts.dashboard')

@section('title', 'Dashboard Staff TU')
@section('sidebar-subtitle', 'Admin Panel')
@section('page-title', 'Dashboard')
@section('user-initials', 'TU')

@section('sidebar-menu')
    <a href="{{ route('staff-tu.dashboard') }}" class="active">🏠 Beranda</a>
    <a href="{{ route('staff-tu.pengguna') }}">👥 Manajemen Pengguna</a>
    <a href="{{ route('staff-tu.kelas') }}">🏫 Manajemen Kelas</a>
    <a href="{{ route('staff-tu.mapel') }}">📚 Manajemen Mapel</a>
@endsection

@section('content')
<h2 style="font-size:1.75rem;font-weight:800;margin-bottom:.5rem;">Halo, Staff Tata Usaha! 👋</h2>
<p style="color:#64748b;margin-bottom:2rem;">Pantau dan kelola data operasional sekolah hari ini.</p>

{{-- Statistik --}}
<div class="stat-grid">
    <div class="stat-card">
        <div class="stat-icon blue">🎒</div>
        <div>
            <div class="stat-label">Total Siswa</div>
            <div class="stat-value">{{ $statistik['total_siswa'] }}</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green">👨‍🏫</div>
        <div>
            <div class="stat-label">Guru Aktif</div>
            <div class="stat-value">{{ $statistik['guru_aktif'] }}</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon purple">🏫</div>
        <div>
            <div class="stat-label">Kelas Terdaftar</div>
            <div class="stat-value">{{ $statistik['kelas'] }}</div>
        </div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 280px;gap:1.5rem;margin-top:1.5rem;">
    {{-- Aktivitas Terkini --}}
    <div class="card">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.25rem;">
            <h3 class="section-title" style="margin:0;">⏱️ Aktivitas Terkini</h3>
            <span class="badge badge-blue">{{ count($aktivitas) }} aktivitas</span>
        </div>

        @foreach ($aktivitas as $item)
        <div class="activity-item">
            <div class="activity-icon">🔔</div>
            <div>
                <strong>{{ $item['aksi'] }}</strong>
                <p class="activity-meta">{{ $item['nama'] }} &mdash; {{ $item['role'] }} &mdash; {{ $item['waktu'] }}</p>
            </div>
        </div>
        @endforeach
    </div>

    {{-- Aksi Cepat --}}
    <div>
        <h3 class="section-title">⚡ Aksi Cepat</h3>
        <div style="display:flex;flex-direction:column;gap:.875rem;">
            <a href="{{ route('staff-tu.pengguna') }}"
               style="background:#2563eb;color:#fff;padding:1.25rem 1rem;border-radius:14px;text-decoration:none;display:block;font-weight:700;">
                ➕ Daftarkan Siswa
                <small style="display:block;font-weight:400;opacity:.8;margin-top:.25rem;font-size:.8rem;">Formulir pendaftaran baru</small>
            </a>
            <a href="{{ route('staff-tu.kelas') }}"
               style="border:1.5px solid #bfdbfe;background:#eff6ff;color:#1e40af;padding:1.25rem 1rem;border-radius:14px;text-decoration:none;display:block;font-weight:700;">
                🏫 Buat Kelas Baru
                <small style="display:block;font-weight:400;color:#475569;margin-top:.25rem;font-size:.8rem;">Manajemen ruang & sesi</small>
            </a>
            <a href="{{ route('staff-tu.mapel') }}"
               style="border:1.5px solid #bfdbfe;background:#eff6ff;color:#1e40af;padding:1.25rem 1rem;border-radius:14px;text-decoration:none;display:block;font-weight:700;">
                📚 Tambah Mata Pelajaran
                <small style="display:block;font-weight:400;color:#475569;margin-top:.25rem;font-size:.8rem;">Input data mapel baru</small>
            </a>
        </div>
    </div>
</div>
@endsection
