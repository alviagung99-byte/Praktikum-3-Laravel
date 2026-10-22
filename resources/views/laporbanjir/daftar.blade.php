@extends('layouts.app')

@section('title', 'Daftar Laporan Banjir')

@section('content')

{{-- Page Heading --}}
<div style="display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:1rem; margin-bottom:1.75rem;">
    <div>
        <h1 style="font-size:1.6rem; font-weight:800; color:#0c4a6e;">📄 Daftar Laporan Banjir</h1>
        <p style="color:#64748b; margin-top:.35rem; font-size:.9rem;">
            Rekap laporan banjir yang masuk ke BPBD Kabupaten Bandung.
        </p>
    </div>
    <a href="{{ route('laporbanjir.form') }}" class="btn btn-primary">
        ➕ Buat Laporan Baru
    </a>
</div>

{{-- Statistik Ringkas --}}
<div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(150px,1fr)); gap:1rem; margin-bottom:1.75rem;">
    <div style="background:#fff; border-radius:14px; padding:1.25rem; text-align:center; border:1.5px solid #e0f2fe;">
        <div style="font-size:1.75rem; font-weight:800; color:#0c4a6e;">{{ count($laporan) }}</div>
        <div style="font-size:.82rem; color:#64748b; margin-top:.25rem;">Total Laporan</div>
    </div>
    <div style="background:#fef9c3; border-radius:14px; padding:1.25rem; text-align:center; border:1.5px solid #fef08a;">
        <div style="font-size:1.75rem; font-weight:800; color:#854d0e;">{{ $jumlah_waspada }}</div>
        <div style="font-size:.82rem; color:#854d0e; margin-top:.25rem;">🟡 Waspada</div>
    </div>
    <div style="background:#fff7ed; border-radius:14px; padding:1.25rem; text-align:center; border:1.5px solid #fed7aa;">
        <div style="font-size:1.75rem; font-weight:800; color:#9a3412;">{{ $jumlah_siaga }}</div>
        <div style="font-size:.82rem; color:#9a3412; margin-top:.25rem;">🟠 Siaga</div>
    </div>
    <div style="background:#fef2f2; border-radius:14px; padding:1.25rem; text-align:center; border:1.5px solid #fecaca;">
        <div style="font-size:1.75rem; font-weight:800; color:#991b1b;">{{ $jumlah_awas }}</div>
        <div style="font-size:.82rem; color:#991b1b; margin-top:.25rem;">🔴 Awas</div>
    </div>
</div>

{{-- Daftar Laporan menggunakan @forelse dan partial @include --}}
{{-- Data dari database via Laporan::all() — object Eloquent --}}
@forelse ($laporan as $item)
    @include('partials.laporan-card', ['laporan' => $item])
@empty
    {{-- Tampil jika tidak ada laporan --}}
    <x-alert type="warning" message="Belum ada laporan banjir yang masuk. Jadilah yang pertama melaporkan!" />
    <div style="text-align:center; padding:2rem 0;">
        <p style="font-size:3rem; margin-bottom:1rem;">🏞️</p>
        <p style="color:#64748b;">Tidak ada data laporan untuk ditampilkan.</p>
        <a href="{{ route('laporbanjir.form') }}" class="btn btn-primary" style="margin-top:1rem;">
            📋 Buat Laporan Pertama
        </a>
    </div>
@endforelse

@endsection
