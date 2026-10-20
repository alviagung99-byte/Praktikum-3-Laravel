@extends('layouts.main')

@section('title', 'Pendaftaran Berhasil')

@push('styles')
<style>
    .success-banner {
        background: linear-gradient(135deg, #059669, #34d399);
        border-radius: 20px;
        padding: 2rem;
        color: #fff;
        text-align: center;
        margin-bottom: 1.75rem;
        position: relative;
        overflow: hidden;
    }

    .success-banner::before {
        content: '';
        position: absolute;
        top: -40px; right: -40px;
        width: 140px; height: 140px;
        background: rgba(255,255,255,.08);
        border-radius: 50%;
    }

    .success-icon {
        width: 72px; height: 72px;
        background: rgba(255,255,255,.2);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 2rem;
        margin: 0 auto 1rem;
        animation: popIn .45s cubic-bezier(.18,.89,.32,1.28);
    }

    @keyframes popIn {
        from { transform: scale(0) rotate(-15deg); opacity: 0; }
        to   { transform: scale(1) rotate(0); opacity: 1; }
    }

    .success-banner h1 { font-size: 1.6rem; font-weight: 800; margin-bottom: .4rem; }
    .success-banner p  { opacity: .88; font-size: .95rem; }

    .id-card {
        background: linear-gradient(135deg, #1e40af, #0ea5e9);
        border-radius: 16px;
        padding: 1.5rem;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 1rem;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
    }

    .id-card .label { font-size: .8rem; opacity: .75; margin-bottom: .25rem; }
    .id-card .value { font-size: 1.4rem; font-weight: 800; letter-spacing: .08em; font-family: monospace; }

    .detail-row {
        display: flex;
        padding: .875rem 0;
        border-bottom: 1px solid #f8fafc;
        align-items: flex-start;
        gap: 1rem;
    }

    .detail-row:last-child { border-bottom: none; }
    .detail-key { width: 170px; font-size: .82rem; color: #94a3b8; font-weight: 600; flex-shrink: 0; }
    .detail-value { font-weight: 600; word-break: break-word; }

    .step-item { display: flex; align-items: flex-start; gap: 1rem; margin-bottom: 1rem; }
    .step-item:last-child { margin-bottom: 0; }

    .step-num {
        width: 32px; height: 32px;
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: .8rem;
        font-weight: 700;
        flex-shrink: 0;
    }

    .step-num.done   { background: #d1fae5; color: #059669; }
    .step-num.active { background: #dbeafe; color: #1e40af; }
    .step-num.next   { background: #f1f5f9; color: #94a3b8; }
    .step-text strong { display: block; font-size: .9rem; }
    .step-text span   { font-size: .8rem; color: #64748b; }

    @media (max-width: 500px) {
        .detail-row { flex-direction: column; gap: .2rem; }
        .detail-key { width: auto; }
    }
</style>
@endpush

@section('content')

<div class="page-wrapper" style="max-width:680px;">

    {{-- Komponen Alert Sukses --}}
    <x-alert type="success" message="Pendaftaran berhasil diproses! Data siswa telah tercatat dalam sistem." />

    {{-- Success Banner --}}
    <div class="success-banner">
        <div class="success-icon">🎉</div>
        <h1>Pendaftaran Berhasil!</h1>
        <p>Data <strong>{{ $nama }}</strong> telah berhasil diproses dan terdaftar ke sistem SmartEduInclusion.</p>
    </div>

    {{-- ID Pengguna --}}
    <div class="id-card">
        <div>
            <div class="label">ID Pengguna (Sementara)</div>
            <div class="value">{{ $idPengguna }}</div>
        </div>
        <span style="font-size:2.5rem; opacity:.8;">🎒</span>
    </div>

    {{-- Detail Data Siswa --}}
    <div class="card">
        <p class="card-header">📋 Data Siswa Terdaftar</p>

        <div class="detail-row">
            <span class="detail-key">👤 Nama Lengkap</span>
            <span class="detail-value">{{ $nama }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-key">🪪 NISN</span>
            <span class="detail-value" style="font-family:monospace;">{{ $nisn }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-key">📧 Email</span>
            <span class="detail-value">{{ $email }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-key">🎂 Tempat, Tgl Lahir</span>
            <span class="detail-value">{{ $tempatLahir }}, {{ $tanggalFormatted }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-key">📅 Umur</span>
            <span class="detail-value">{{ $umur }} tahun</span>
        </div>
        <div class="detail-row">
            <span class="detail-key">⚧ Jenis Kelamin</span>
            <span class="detail-value">{{ $jenisKelamin }}</span>
        </div>
        <div class="detail-row">
            <span class="detail-key">🏫 Kelas</span>
            <span class="detail-value">
                <span class="badge badge-blue">{{ $namaKelas }} ({{ $kodeKelas }})</span>
            </span>
        </div>
        <div class="detail-row">
            <span class="detail-key">📍 Alamat</span>
            <span class="detail-value" style="font-weight:500;">{{ $alamat }}</span>
        </div>
    </div>

    {{-- Langkah Selanjutnya --}}
    <div class="card">
        <p class="card-header">📌 Langkah Selanjutnya</p>

        <div class="step-item">
            <div class="step-num done">✓</div>
            <div class="step-text">
                <strong>Formulir Terisi</strong>
                <span>Data pendaftaran telah diisi dan diproses.</span>
            </div>
        </div>
        <div class="step-item">
            <div class="step-num active">2</div>
            <div class="step-text">
                <strong>Verifikasi Oleh Staff TU</strong>
                <span>Staff TU akan memverifikasi data dan membuat akun login.</span>
            </div>
        </div>
        <div class="step-item">
            <div class="step-num next">3</div>
            <div class="step-text">
                <strong>Aktivasi Akun</strong>
                <span>Email konfirmasi beserta password akan dikirim ke {{ $email }}.</span>
            </div>
        </div>
        <div class="step-item">
            <div class="step-num next">4</div>
            <div class="step-text">
                <strong>Mulai Belajar</strong>
                <span>Login ke SmartEduInclusion dan mulai perjalanan belajarmu!</span>
            </div>
        </div>
    </div>

    {{-- Tombol Aksi --}}
    <div style="display:flex; gap:1rem; flex-wrap:wrap;">
        <a href="{{ route('pendaftaran.form') }}" class="btn btn-outline" style="flex:1; min-width:140px;">
            ➕ Daftar Siswa Lain
        </a>
        <button type="button" onclick="window.print()" class="btn btn-outline" style="flex:1; min-width:140px; border-color:#e2e8f0; color:#475569;">
            🖨️ Cetak Data
        </button>
        <a href="{{ route('home') }}" class="btn btn-primary" style="flex:1; min-width:140px;">
            🏠 Ke Beranda
        </a>
    </div>

</div>

@endsection
