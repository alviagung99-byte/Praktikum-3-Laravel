@extends('layouts.dashboard')

@section('title', $materi['judul'])
@section('sidebar-subtitle', 'Portal Siswa')
@section('page-title', 'Detail Materi')
@section('user-initials', 'SW')

@section('sidebar-menu')
    <a href="{{ route('siswa.dashboard') }}">🏠 Beranda</a>
    <a href="{{ route('siswa.materi') }}" class="active">📖 Materi</a>
    <a href="{{ route('siswa.latihan') }}">✏️ Latihan</a>
@endsection

@section('content')
<div style="max-width:720px;">
    <a href="{{ route('siswa.materi') }}" style="font-size:.88rem;color:#2563eb;font-weight:600;">← Kembali ke Daftar Materi</a>

    <div class="card" style="margin-top:1.25rem;padding:2rem;">
        <span style="font-size:.78rem;font-weight:700;color:#2563eb;text-transform:uppercase;letter-spacing:.05em;">{{ $materi['mapel'] }}</span>
        <h2 style="font-size:1.6rem;font-weight:800;margin-top:.5rem;">{{ $materi['judul'] }}</h2>

        <div style="margin-top:1.5rem;padding-top:1.5rem;border-top:1px solid #f1f5f9;line-height:1.8;color:#374151;">
            <p>{{ $materi['isi'] }}</p>

            <p style="margin-top:1.25rem;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Materi ini disajikan secara inklusif agar dapat dipahami oleh semua siswa dengan berbagai kebutuhan belajar. Pendekatan visual, audio, dan teks tersedia untuk memaksimalkan pemahaman.
            </p>

            <p style="margin-top:1.25rem;">
                Setelah membaca materi ini, kamu diharapkan dapat memahami konsep dasar, mengerjakan contoh soal sederhana, dan menerapkannya dalam kehidupan sehari-hari.
            </p>
        </div>

        <div style="margin-top:2rem;display:flex;gap:1rem;flex-wrap:wrap;">
            <a href="{{ route('siswa.latihan.detail', $kodeMateri) }}" class="btn btn-success">
                ✏️ Kerjakan Latihan
            </a>
            <a href="{{ route('siswa.materi') }}" class="btn btn-outline">
                ← Kembali
            </a>
        </div>
    </div>
</div>
@endsection
