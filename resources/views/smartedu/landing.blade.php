<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartEduInclusion — Platform Pendidikan Inklusif</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        body { background: #f7f8ff; }

        /* Hero */
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
        .hero-content { position: relative; max-width: 720px; margin: 0 auto; }
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
        .hero h1 { font-size: clamp(2rem, 5vw, 3.25rem); font-weight: 800; line-height: 1.15; margin-bottom: 1.25rem; }
        .hero p { font-size: 1.1rem; opacity: .88; max-width: 560px; margin: 0 auto 2.5rem; }
        .hero-actions { display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap; }
        .btn-hero-primary {
            background: #fff;
            color: #1e40af;
            padding: .9rem 2.25rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            transition: transform .15s, box-shadow .15s;
            box-shadow: 0 4px 16px rgba(0,0,0,.15);
        }
        .btn-hero-primary:hover { transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,.2); text-decoration: none; }
        .btn-hero-outline {
            border: 2px solid rgba(255,255,255,.6);
            color: #fff;
            padding: .88rem 2.25rem;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            transition: background .15s;
        }
        .btn-hero-outline:hover { background: rgba(255,255,255,.15); text-decoration: none; }

        /* Fitur section */
        .fitur-section { max-width: 1100px; margin: -2rem auto 3rem; padding: 0 1.5rem; }
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

        /* Role section */
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
        }
        .role-card:hover { transform: translateY(-3px); text-decoration: none; }
        .role-card .role-emoji { font-size: 2.25rem; display: block; margin-bottom: .75rem; }
        .role-card strong { display: block; color: #1e40af; font-size: 1rem; }
        .role-card small  { color: #475569; font-size: .8rem; }

        /* Footer */
        .landing-footer {
            background: #1e293b;
            color: #94a3b8;
            text-align: center;
            padding: 2rem;
            font-size: .85rem;
        }
        .landing-footer a { color: #7dd3fc; }
    </style>
</head>
<body>

{{-- Navbar --}}
<nav style="background:#fff;border-bottom:1px solid #e2e8f0;padding:.9rem 2rem;display:flex;align-items:center;justify-content:space-between;gap:1rem;">
    <a href="{{ route('home') }}" style="font-size:1.1rem;font-weight:800;color:#1e40af;text-decoration:none;">🎓 SmartEduInclusion</a>
    <div style="display:flex;gap:1rem;align-items:center;">
        <a href="{{ route('laporbanjir.form') }}" style="font-size:.88rem;color:#64748b;text-decoration:none;font-weight:500;">💧 LaporBanjir</a>
        <a href="{{ route('pendaftaran.form') }}" style="font-size:.88rem;color:#64748b;text-decoration:none;font-weight:500;">📝 Pendaftaran</a>
        <a href="{{ route('login') }}" style="background:#2563eb;color:#fff;padding:.5rem 1.25rem;border-radius:8px;text-decoration:none;font-weight:600;font-size:.88rem;">Masuk</a>
    </div>
</nav>

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

{{-- Fitur --}}
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

<footer class="landing-footer">
    &copy; 2025 SmartEduInclusion &mdash; Tugas Akhir Web Programming &nbsp;|&nbsp;
    <a href="{{ route('laporbanjir.form') }}">LaporBanjir</a> &nbsp;|&nbsp;
    <a href="{{ route('pendaftaran.form') }}">Pendaftaran Siswa</a>
</footer>

</body>
</html>
