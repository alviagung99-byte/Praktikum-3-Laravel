@extends('layouts.dashboard')

@section('title', 'Materi Saya')
@section('sidebar-subtitle', 'Portal Siswa')
@section('page-title', 'Materi Pelajaran')
@section('user-initials', 'SW')

@section('sidebar-menu')
    <a href="{{ route('siswa.dashboard') }}">🏠 Beranda</a>
    <a href="{{ route('siswa.materi') }}" class="active">📖 Materi</a>
    <a href="{{ route('siswa.latihan') }}">✏️ Latihan</a>
@endsection

@section('content')
<h2 style="font-size:1.6rem;font-weight:800;margin-bottom:.5rem;">📖 Materi Pelajaran</h2>
<p style="color:#64748b;margin-bottom:1.75rem;">Baca dan pelajari materi sesuai jadwal belajarmu.</p>

<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:1.25rem;">
    @foreach ($materi as $m)
    <div class="card" style="padding:1.5rem;">
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:.875rem;">
            <span style="font-size:.78rem;font-weight:700;color:#2563eb;text-transform:uppercase;">{{ $m['mapel'] }}</span>
            @if ($m['status'] === 'Selesai')
                <span class="badge badge-green">✅ Selesai</span>
            @else
                <span class="badge badge-orange">📖 Belum</span>
            @endif
        </div>
        <h3 style="font-weight:700;margin-bottom:.5rem;">{{ $m['judul'] }}</h3>
        <p style="font-size:.82rem;color:#94a3b8;">{{ $m['halaman'] }} halaman</p>
        <div style="margin-top:1rem;padding-top:1rem;border-top:1px solid #f1f5f9;">
            <a href="{{ route('siswa.materi.detail', $m['kode']) }}" class="btn btn-primary" style="width:100%;justify-content:center;font-size:.85rem;">
                {{ $m['status'] === 'Selesai' ? '🔄 Baca Ulang' : '▶️ Mulai Belajar' }}
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection
