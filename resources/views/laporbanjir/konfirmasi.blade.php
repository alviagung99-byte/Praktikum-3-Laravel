@extends('layouts.app')

@section('title', 'Konfirmasi Laporan')

@section('content')

<div style="max-width:600px; margin:0 auto;">

    {{-- Header Sukses --}}
    <div style="text-align:center; margin-bottom:2rem;">
        <div style="width:72px; height:72px; background:#d1fae5; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:2rem; margin:0 auto 1rem;">
            ✅
        </div>
        <h1 style="font-size:1.6rem; font-weight:800; color:#065f46;">Laporan Berhasil Dikirim!</h1>
        <p style="color:#64748b; margin-top:.5rem;">
            Terima kasih, <strong>{{ $nama }}</strong>. Laporan Anda telah kami terima.
        </p>
    </div>

    {{-- Komponen Alert --}}
    @if ($warna === 'awas')
        <x-alert type="error" message="Banjir Tingkat AWAS! Tim BPBD akan segera diturunkan. Harap evakuasi ke tempat aman dan hubungi 119 jika darurat." />
    @elseif ($warna === 'siaga')
        <x-alert type="warning" message="Banjir Tingkat SIAGA. Tim monitoring BPBD akan memantau situasi. Tetap waspada dan ikuti arahan petugas." />
    @else
        <x-alert type="success" message="Banjir Tingkat WASPADA. Laporan Anda telah dicatat. Tim BPBD akan memantau perkembangan situasi." />
    @endif

    {{-- Nomor Laporan --}}
    <div style="background:linear-gradient(135deg,#1d4ed8,#0ea5e9); color:#fff; border-radius:14px; padding:1.25rem 1.5rem; display:flex; align-items:center; justify-content:space-between; margin-bottom:1.25rem;">
        <div>
            <div style="font-size:.8rem; opacity:.8;">Nomor Laporan</div>
            <div style="font-size:1.5rem; font-weight:800; letter-spacing:.1em;">#{{ $nomorLaporan }}</div>
        </div>
        <span style="font-size:2rem;">🗒️</span>
    </div>

    {{-- Detail Laporan --}}
    <div class="card">
        <p class="card-header">📋 Ringkasan Laporan</p>

        <table style="width:100%; border-collapse:collapse;">
            <tr>
                <td style="padding:.75rem 0; color:#64748b; font-size:.88rem; width:160px; font-weight:500; vertical-align:top;">👤 Nama Pelapor</td>
                <td style="padding:.75rem 0; font-weight:600; border-bottom:1px solid #f1f5f9;">{{ $nama }}</td>
            </tr>
            <tr>
                <td style="padding:.75rem 0; color:#64748b; font-size:.88rem; vertical-align:top;">📍 Lokasi</td>
                <td style="padding:.75rem 0; font-weight:600; border-bottom:1px solid #f1f5f9;">{{ $lokasi }}</td>
            </tr>
            <tr>
                <td style="padding:.75rem 0; color:#64748b; font-size:.88rem; vertical-align:top;">🌊 Tinggi Genangan</td>
                <td style="padding:.75rem 0; font-weight:600; border-bottom:1px solid #f1f5f9;">{{ $genangan }} cm</td>
            </tr>
            <tr>
                <td style="padding:.75rem 0; color:#64748b; font-size:.88rem; vertical-align:top;">⚠️ Status</td>
                <td style="padding:.75rem 0; border-bottom:1px solid #f1f5f9;">
                    @if ($warna === 'awas')
                        <span class="badge badge-awas">🔴 Awas</span>
                    @elseif ($warna === 'siaga')
                        <span class="badge badge-siaga">🟠 Siaga</span>
                    @else
                        <span class="badge badge-waspada">🟡 Waspada</span>
                    @endif
                </td>
            </tr>
            @if ($keterangan && $keterangan !== '-')
            <tr>
                <td style="padding:.75rem 0; color:#64748b; font-size:.88rem; vertical-align:top;">📝 Keterangan</td>
                <td style="padding:.75rem 0; font-weight:600;">{{ $keterangan }}</td>
            </tr>
            @endif
        </table>
    </div>

    {{-- Tombol Aksi --}}
    <div style="display:flex; gap:1rem; margin-top:.5rem;">
        <a href="{{ route('laporbanjir.form') }}" class="btn btn-outline" style="flex:1; text-align:center;">
            ➕ Lapor Lagi
        </a>
        <a href="{{ route('laporbanjir.daftar') }}" class="btn btn-primary" style="flex:1; text-align:center;">
            📄 Daftar Laporan
        </a>
    </div>

</div>

@endsection
