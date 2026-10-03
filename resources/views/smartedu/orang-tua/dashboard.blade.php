@extends('layouts.dashboard')

@section('title', 'Dashboard Orang Tua')
@section('sidebar-subtitle', 'Portal Orang Tua')
@section('page-title', 'Pantau Perkembangan Anak')
@section('user-initials', 'OT')

@section('sidebar-menu')
    <a href="{{ route('orang-tua.dashboard') }}" class="active">🏠 Beranda</a>
    <button class="nav-btn">📈 Perkembangan</button>
@endsection

@section('content')
<h2 style="font-size:1.75rem;font-weight:800;margin-bottom:.5rem;">Halo, {{ $data['nama_ortu'] }}! 👋</h2>
<p style="color:#64748b;margin-bottom:2rem;">
    Memantau aktivitas belajar <strong>{{ $data['nama_anak'] }}</strong> ({{ $data['kelas'] }})
</p>

{{-- Progress Card --}}
<div class="card" style="margin-bottom:1.5rem;max-width:620px;">
    <div style="display:flex;align-items:center;justify-content:space-between;gap:1rem;">
        <div>
            <h3 style="font-weight:700;">📊 Progress Belajar {{ $data['nama_anak'] }}</h3>
            <p style="font-size:.88rem;color:#64748b;margin-top:.35rem;">
                {{ $data['materi_selesai'] }} dari {{ $data['total_materi'] }} materi selesai
            </p>
        </div>
        <span style="font-size:2.5rem;font-weight:800;color:#059669;">{{ $data['progress'] }}%</span>
    </div>
    <div class="progress-wrap mt-2">
        <div class="progress-bar" style="width:{{ $data['progress'] }}%;"></div>
    </div>
</div>

<div style="display:grid;grid-template-columns:1fr 300px;gap:1.5rem;">
    {{-- Chart Progres Mingguan --}}
    <div class="card">
        <h3 class="section-title">📈 Progres Mingguan</h3>
        <div style="height:140px;background:#f8fafc;border-radius:10px;padding:1rem .5rem;display:flex;align-items:flex-end;gap:.75rem;justify-content:space-around;border:1px solid #f1f5f9;">
            @foreach ($progres_mingguan as $item)
            @php $height = min($item['aktivitas'] * 18, 100); @endphp
            <div style="flex:1;display:flex;flex-direction:column;align-items:center;gap:.5rem;">
                <div style="width:100%;max-width:36px;height:{{ $height }}px;background:#2563eb;border-radius:6px 6px 0 0;min-height:8px;"></div>
                <span style="font-size:.78rem;font-weight:600;color:#64748b;">{{ $item['hari'] }}</span>
            </div>
            @endforeach
        </div>
        <p style="font-size:.82rem;color:#64748b;margin-top:.875rem;">
            {{ $data['nama_anak'] }} memiliki total {{ array_sum(array_column($progres_mingguan, 'aktivitas')) }} aktivitas belajar minggu ini.
        </p>
    </div>

    {{-- Fokus Minggu Ini --}}
    <div style="background:linear-gradient(135deg,#059669,#34d399);border-radius:18px;padding:1.75rem;color:#fff;">
        <h3 style="font-size:1.05rem;font-weight:700;margin-bottom:1rem;">💡 Fokus Minggu Ini</h3>
        <h4 style="font-weight:700;font-size:1rem;margin-bottom:.75rem;">Pertahankan progres belajar</h4>
        <p style="font-size:.85rem;opacity:.9;line-height:1.7;">
            Dampingi {{ $data['nama_anak'] }} agar tetap konsisten menyelesaikan materi pembelajaran setiap hari.
        </p>
        <button onclick="alert('Tips pendampingan akan tersedia segera.')" style="margin-top:1.25rem;width:100%;background:#fff;color:#059669;border:none;padding:.75rem;border-radius:10px;font-weight:700;cursor:pointer;">
            Lihat Tips Pendampingan
        </button>
    </div>
</div>

{{-- Tugas Pending --}}
<div class="card" style="margin-top:1.5rem;">
    <h3 class="section-title">📋 Tugas Belum Selesai</h3>
    @if (count($tugas_pending) > 0)
        @foreach ($tugas_pending as $t)
        <div class="activity-item">
            <div class="activity-icon" style="background:#fef3c7;color:#d97706;">📚</div>
            <div>
                <strong>{{ $t['judul'] }}</strong>
                <p class="activity-meta">{{ $t['mapel'] }} &mdash; Belum dikerjakan</p>
            </div>
        </div>
        @endforeach
    @else
        <div style="text-align:center;padding:2rem;color:#64748b;">
            <p style="font-size:1.75rem;margin-bottom:.75rem;">✅</p>
            <p style="font-weight:600;">Semua tugas sudah selesai!</p>
        </div>
    @endif
</div>
@endsection
