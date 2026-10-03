@extends('layouts.dashboard')

@section('title', 'Latihan')
@section('sidebar-subtitle', 'Portal Siswa')
@section('page-title', 'Soal Latihan')
@section('user-initials', 'SW')

@section('sidebar-menu')
    <a href="{{ route('siswa.dashboard') }}">🏠 Beranda</a>
    <a href="{{ route('siswa.materi') }}">📖 Materi</a>
    <a href="{{ route('siswa.latihan') }}" class="active">✏️ Latihan</a>
@endsection

@section('content')
<h2 style="font-size:1.6rem;font-weight:800;margin-bottom:.5rem;">✏️ Soal Latihan</h2>
<p style="color:#64748b;margin-bottom:1.75rem;">Kerjakan soal latihan untuk menguji pemahamanmu.</p>

<div style="display:flex;flex-direction:column;gap:1rem;">
    @foreach ($latihan as $l)
    <div class="card" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:1rem;">
        <div style="display:flex;align-items:center;gap:1rem;">
            <div style="width:48px;height:48px;background:#dbeafe;border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.35rem;flex-shrink:0;">✏️</div>
            <div>
                <h3 style="font-weight:700;">{{ $l['judul'] }}</h3>
                <p style="font-size:.82rem;color:#64748b;margin-top:.2rem;">
                    {{ $l['mapel'] }} &bull; {{ $l['total_soal'] }} soal
                </p>
            </div>
        </div>
        <div style="display:flex;align-items:center;gap:.875rem;">
            @if ($l['status'] === 'Selesai')
                <span class="badge badge-green">✅ Selesai</span>
                <a href="{{ route('siswa.latihan.detail', $l['kode']) }}" class="btn btn-outline" style="font-size:.85rem;">🔄 Ulangi</a>
            @else
                <span class="badge badge-orange">⏳ Belum</span>
                <a href="{{ route('siswa.latihan.detail', $l['kode']) }}" class="btn btn-primary" style="font-size:.85rem;">▶️ Mulai</a>
            @endif
        </div>
    </div>
    @endforeach
</div>
@endsection
