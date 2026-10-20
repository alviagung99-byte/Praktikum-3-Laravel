@extends('layouts.main')

@section('title', 'Beranda')

@push('styles')
<style>
    .hero {
        background: linear-gradient(135deg, #1e40af 0%, #0ea5e9 100%);
        color: #fff;
        text-align: center;
        padding: 5rem 1.5rem 6rem;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }

    .hero-badge {
        display: inline-block;
        background: rgba(255,255,255,.15);
        border: 1px solid rgba(255,255,255,.3);
        padding: .4rem 1.25rem;
        border-radius: 999px;
        font-size: .85rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        letter-spacing: .05em;
    }

    .hero-content { position: relative; max-width: 720px; margin: 0 auto; }
    .hero h1 { font-size: clamp(1.85rem, 5vw, 3rem); font-weight: 800; line-height: 1.15; margin-bottom: 1.25rem; }
    .hero p  { font-size: 1.05rem; opacity: .88; max-width: 540px; margin: 0 auto 2.5rem; }

    .hero-actions { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }

    .btn-hero-primary {
        background: #fff;
        color: #1e40af;
        padding: .9rem 2rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        text-decoration: none;
        box-shadow: 0 4px 16px rgba(0,0,0,.15);
        transition: transform .15s, box-shadow .15s;
    }

    .btn-hero-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,.2); text-decoration: none; }

    .btn-hero-outline {
        border: 2px solid rgba(255,255,255,.6);
        color: #fff;
        padding: .88rem 2rem;
        border-radius: 12px;
        font-weight: 700;
        font-size: 1rem;
        text-decoration: none;
        transition: background .15s;
    }

    .btn-hero-outline:hover { background: rgba(255,255,255,.15); text-decoration: none; color: #fff; }

    .fitur-section {
        max-width: 1100px;
        margin: -2rem auto 3rem;
        padding: 0 1.5rem;
    }

    .fitur-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 1.25rem; }

    .fitur-card {
        background: #fff;
        border: 1px solid #e2e8f0;
        border-radius: 18px;
        padding: 1.75rem;
        box-shadow: 0 2px 8px rgba(0,0,0,.06);
        transition: transform .2s, box-shadow .2s;
    }

    .fitur-card:hover { transform: translateY(-4px); box-shadow: 0 8px 24px rgba(0,0,0,.1); }
    .fitur-icon { font-size: 2rem; margin-bottom: 1rem; }
    .fitur-card h3 { font-size: 1.05rem; margin-bottom: .5rem; }
    .fitur-card p  { font-size: .88rem; color: #64748b; line-height: 1.6; }

    .role-section { max-width: 1100px; margin: 0 auto 4rem; padding: 0 1.5rem; }
    .role-section h2 { font-size: 1.6rem; font-weight: 800; margin-bottom: 1.5rem; text-align: center; }
    .role-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; }

    .role-card {
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
        border: 1px solid #bfdbfe;
        border-radius: 16px;
        padding: 1.5rem;
        text-align: center;
        text-decoration: none;
        transition: transform .2s;
        display: block;
    }

    .role-card:hover { transform: translateY(-3px); text-decoration: none; }
    .role-emoji { font-size: 2.25rem; display: block; margin-bottom: .75rem; }
    .role-card strong { display: block; color: #1e40af; font-size: 1rem; }
    .role-card small  { color: #475569; font-size: .8rem; }
</style>
@endpush

@section('content')

{{-- Hero --}}
<section class="hero">
    <div class="hero-content">
        <span class="hero-badge">🏫 Platform Pendidikan Inklusif</span>
        <h1>Belajar Lebih Mudah, Lebih Inklusif</h1>
        <p>SmartEduInclusion menyediakan materi, latihan, dan monitoring perkembangan siswa yang dapat diakses oleh semua pihak terkait di sekolah.</p>
        <div class="hero-actions">
            <a href="{{ route('login') }}" class="btn-hero-primary">🚀 Mulai Sekarang</a>
            <a href="#fitur" class="btn-hero-outline">📖 Lihat Fitur</a>
        </div>
    </div>
</section>

{{-- Fitur — menggunakan @foreach --}}
<section class="fitur-section" id="fitur">
    <div class="fitur-grid">
        @foreach ($fitur as $item)
        <div class="fitur-card">
            <div class="fitur-icon">{{ $item['ikon'] }}</div>
            <h3>{{ $item['judul'] }}</h3>
            <p>{{ $item['deskripsi'] }}</p>
        </div>
        @endforeach
    </div>
</section>

{{-- Role Section --}}
<section class="role-section">
    <h2>Masuk Sesuai Peran Anda</h2>
    <div class="role-grid">
        <a href="{{ route('staff-tu.dashboard') }}" class="role-card">
            <span class="role-emoji">🏢</span>
            <strong>Staff TU</strong>
            <small>Kelola pengguna, kelas & mapel</small>
        </a>
        <a href="{{ route('guru.dashboard') }}" class="role-card">
            <span class="role-emoji">👨‍🏫</span>
            <strong>Guru</strong>
            <small>Upload materi & soal latihan</small>
        </a>
        <a href="{{ route('siswa.dashboard') }}" class="role-card">
            <span class="role-emoji">🎒</span>
            <strong>Siswa</strong>
            <small>Belajar materi & kerjakan latihan</small>
        </a>
        <a href="{{ route('orang-tua.dashboard') }}" class="role-card">
            <span class="role-emoji">👨‍👩‍👦</span>
            <strong>Orang Tua</strong>
            <small>Pantau progres belajar anak</small>
        </a>
    </div>
</section>

@endsection
