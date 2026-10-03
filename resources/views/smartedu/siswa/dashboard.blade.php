@extends('layouts.dashboard')

@section('title', 'Dashboard Siswa')
@section('sidebar-subtitle', 'Portal Siswa')
@section('page-title', 'Dashboard Siswa')
@section('user-initials', 'SW')

@section('sidebar-menu')
    <a href="{{ route('siswa.dashboard') }}" class="active">🏠 Beranda</a>
    <a href="{{ route('siswa.materi') }}">📖 Materi</a>
    <a href="{{ route('siswa.latihan') }}">✏️ Latihan</a>
@endsection

@section('content')
<h2 style="font-size:1.75rem;font-weight:800;margin-bottom:.5rem;">Halo, {{ $data['nama_siswa'] }}! 🎒</h2>
<p style="color:#64748b;margin-bottom:2rem;">Kelas: <strong>{{ $data['kelas'] }}</strong> &mdash; Semangat belajar ya!</p>

{{-- Progress Card --}}
<div class="card" style="max-width:640px;margin-bottom:1.5rem;">
    <div style="display:flex;align-items:center;justify-content:space-between;">
        <div>
            <h3 style="font-weight:700;">📊 Progress Hari Ini</h3>
            <p style="font-size:.88rem;color:#64748b;margin-top:.35rem;">
                {{ $data['materi_selesai'] }} dari {{ $data['total_materi'] }} materi selesai
            </p>
        </div>
        <span style="font-size:2.25rem;font-weight:800;color:#059669;">{{ $data['progress'] }}%</span>
    </div>
    <div class="progress-wrap mt-2">
        <div class="progress-bar" style="width:{{ $data['progress'] }}%;"></div>
    </div>
</div>

{{-- Materi Hari Ini --}}
<h3 class="section-title">📖 Materi Hari Ini</h3>
<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:1rem;">
    @foreach ($materi_hari_ini as $m)
    <div class="card" style="padding:1.5rem;">
        <div style="width:44px;height:44px;background:#dbeafe;border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:1.25rem;margin-bottom:1rem;">📖</div>
        <span style="font-size:.78rem;font-weight:700;color:#2563eb;text-transform:uppercase;letter-spacing:.05em;">{{ $m['mapel'] }}</span>
        <h4 style="margin-top:.35rem;font-weight:700;">{{ $m['judul'] }}</h4>
        <div style="margin-top:1rem;">
            @if ($m['status'] === 'Selesai')
                <span style="font-size:.82rem;color:#64748b;">✅ Sudah dibaca</span>
            @else
                <a href="{{ route('siswa.materi.detail', $m['kode']) }}" style="font-size:.88rem;font-weight:700;color:#2563eb;">Mulai Belajar →</a>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection
