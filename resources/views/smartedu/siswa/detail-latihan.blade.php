@extends('layouts.dashboard')

@section('title', $latihan['judul'])
@section('sidebar-subtitle', 'Portal Siswa')
@section('page-title', 'Kerjakan Soal')
@section('user-initials', 'SW')

@section('sidebar-menu')
    <a href="{{ route('siswa.dashboard') }}">🏠 Beranda</a>
    <a href="{{ route('siswa.materi') }}">📖 Materi</a>
    <a href="{{ route('siswa.latihan') }}" class="active">✏️ Latihan</a>
@endsection

@section('content')
<div style="max-width:720px;">
    <a href="{{ route('siswa.latihan') }}" style="font-size:.88rem;color:#2563eb;font-weight:600;">← Kembali ke Daftar Latihan</a>

    <div class="card" style="margin-top:1.25rem;padding:2rem;">
        <span style="font-size:.78rem;font-weight:700;color:#2563eb;text-transform:uppercase;">{{ $latihan['mapel'] }}</span>
        <h2 style="font-size:1.5rem;font-weight:800;margin-top:.5rem;">{{ $latihan['judul'] }}</h2>

        @if (count($latihan['soal']) > 0)
        <form style="margin-top:1.5rem;">
            @foreach ($latihan['soal'] as $soal)
            <div style="padding:1.25rem;border:1.5px solid #e2e8f0;border-radius:12px;margin-bottom:1rem;">
                <p style="font-weight:700;margin-bottom:.875rem;">{{ $soal['no'] }}. {{ $soal['pertanyaan'] }}</p>
                @foreach ($soal['pilihan'] as $idx => $pilihan)
                @php $huruf = chr(65 + $idx); @endphp
                <label style="display:flex;align-items:center;gap:.75rem;padding:.5rem .75rem;border-radius:8px;cursor:pointer;margin-bottom:.35rem;transition:background .15s;"
                       onmouseover="this.style.background='#f1f5f9'" onmouseout="this.style.background=''">
                    <input type="radio" name="jawaban_{{ $soal['no'] }}" value="{{ $huruf }}"
                           style="width:16px;height:16px;accent-color:#2563eb;">
                    <span style="font-size:.9rem;"><strong>{{ $huruf }}.</strong> {{ $pilihan }}</span>
                </label>
                @endforeach
            </div>
            @endforeach

            <div style="display:flex;gap:1rem;margin-top:1.5rem;">
                <button type="button" onclick="alert('Jawaban berhasil dikumpulkan! Fitur penilaian tersedia di versi database.')" class="btn btn-success">
                    ✅ Kumpulkan Jawaban
                </button>
                <a href="{{ route('siswa.latihan') }}" class="btn btn-outline">← Batal</a>
            </div>
        </form>
        @else
        <div style="text-align:center;padding:2.5rem;border:2px dashed #e2e8f0;border-radius:12px;margin-top:1.5rem;">
            <p style="font-size:1.5rem;margin-bottom:.75rem;">📭</p>
            <p style="color:#64748b;">Soal untuk materi ini belum tersedia.</p>
            <a href="{{ route('siswa.latihan') }}" class="btn btn-outline" style="margin-top:1rem;">← Kembali</a>
        </div>
        @endif
    </div>
</div>
@endsection
