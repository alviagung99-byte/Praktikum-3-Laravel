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

{{-- Menggunakan @forelse dengan partial @include untuk setiap kartu materi --}}
<div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(260px,1fr));gap:1.25rem;">
    @forelse ($materi as $m)
        @include('partials.materi-card', ['materi' => $m])
    @empty
        <p style="color:#64748b;">Belum ada materi tersedia.</p>
    @endforelse
</div>
@endsection
