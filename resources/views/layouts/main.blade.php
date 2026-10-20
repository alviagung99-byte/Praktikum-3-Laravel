<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SmartEduInclusion') — Platform Pendidikan Inklusif</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Arial, sans-serif;
            background: #f7f8ff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #1e293b;
        }

        /* ===== NAVBAR ===== */
        .main-navbar {
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: .875rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 1px 4px rgba(0,0,0,.06);
        }

        .navbar-brand {
            font-size: 1.1rem;
            font-weight: 800;
            color: #1e40af;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .navbar-brand:hover { text-decoration: none; opacity: .85; }

        .navbar-links {
            display: flex;
            align-items: center;
            gap: .5rem;
            flex-wrap: wrap;
        }

        .navbar-links a {
            font-size: .88rem;
            color: #475569;
            text-decoration: none;
            font-weight: 500;
            padding: .45rem .85rem;
            border-radius: 8px;
            transition: background .15s, color .15s;
        }

        .navbar-links a:hover {
            background: #f1f5f9;
            color: #1e40af;
            text-decoration: none;
        }

        .navbar-links a.btn-masuk {
            background: #2563eb;
            color: #fff;
            font-weight: 700;
            padding: .5rem 1.25rem;
        }

        .navbar-links a.btn-masuk:hover {
            background: #1d4ed8;
            color: #fff;
        }

        /* ===== MAIN CONTENT ===== */
        .main-content {
            flex: 1;
        }

        /* ===== PAGE WRAPPER (untuk halaman non-hero) ===== */
        .page-wrapper {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        /* ===== FOOTER ===== */
        .main-footer {
            background: #1e293b;
            color: #94a3b8;
            text-align: center;
            padding: 1.75rem 1.5rem;
            font-size: .82rem;
            margin-top: auto;
        }

        .main-footer a {
            color: #7dd3fc;
            text-decoration: none;
        }

        .main-footer a:hover { text-decoration: underline; }

        /* ===== UTILITIES ===== */
        .card {
            background: #fff;
            border-radius: 18px;
            padding: 2rem;
            box-shadow: 0 4px 16px rgba(0,0,0,.07);
            margin-bottom: 1.25rem;
        }

        .card-header {
            font-size: 1.05rem;
            font-weight: 700;
            color: #1e40af;
            padding-bottom: .875rem;
            border-bottom: 2px solid #eff6ff;
            margin-bottom: 1.25rem;
        }

        .form-group { margin-bottom: 1.25rem; }

        .form-label {
            display: block;
            font-size: .88rem;
            font-weight: 600;
            color: #374151;
            margin-bottom: .4rem;
        }

        .form-control {
            width: 100%;
            padding: .7rem 1rem;
            border: 1.5px solid #d1d5db;
            border-radius: 10px;
            font-size: .95rem;
            font-family: inherit;
            transition: border-color .15s, box-shadow .15s;
            background: #fff;
        }

        .form-control:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,.12);
        }

        textarea.form-control { resize: vertical; }

        .btn {
            display: inline-block;
            padding: .7rem 1.5rem;
            border-radius: 10px;
            font-size: .95rem;
            font-weight: 700;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: opacity .15s, transform .1s;
            text-align: center;
        }

        .btn:active { transform: scale(.97); }
        .btn:hover  { text-decoration: none; }

        .btn-primary {
            background: linear-gradient(135deg, #1e40af, #0ea5e9);
            color: #fff;
        }

        .btn-primary:hover { opacity: .9; color: #fff; }

        .btn-success {
            background: linear-gradient(135deg, #059669, #34d399);
            color: #fff;
        }

        .btn-outline {
            background: #fff;
            color: #1e40af;
            border: 2px solid #bfdbfe;
        }

        .btn-outline:hover { background: #eff6ff; }

        .btn-block { width: 100%; }

        .badge {
            display: inline-block;
            padding: .25rem .875rem;
            border-radius: 999px;
            font-size: .8rem;
            font-weight: 700;
        }

        .badge-blue   { background: #dbeafe; color: #1e40af; }
        .badge-green  { background: #d1fae5; color: #065f46; }
        .badge-orange { background: #ffedd5; color: #9a3412; }
        .badge-yellow { background: #fef9c3; color: #854d0e; }

        @media (max-width: 600px) {
            .main-navbar { padding: .75rem 1rem; }
            .navbar-links { gap: .25rem; }
            .page-wrapper { padding: 0 1rem; margin: 1.25rem auto; }
        }
    </style>
    @stack('styles')
</head>
<body>

{{-- ===== NAVBAR ===== --}}
<nav class="main-navbar">
    <a href="{{ route('home') }}" class="navbar-brand">
        🎓 SmartEduInclusion
    </a>
    <div class="navbar-links">
        <a href="{{ route('laporbanjir.form') }}">💧 LaporBanjir</a>
        <a href="{{ route('pendaftaran.form') }}">📝 Pendaftaran</a>
        <a href="{{ route('login') }}" class="btn-masuk">Masuk</a>
    </div>
</nav>

{{-- ===== KONTEN UTAMA ===== --}}
<div class="main-content">
    @yield('content')
</div>

{{-- ===== FOOTER ===== --}}
<footer class="main-footer">
    <p>&copy; 2025 SmartEduInclusion &mdash; Platform Pendidikan Inklusif</p>
    <p style="margin-top:.4rem;">
        <a href="{{ route('home') }}">Beranda</a> &nbsp;|&nbsp;
        <a href="{{ route('laporbanjir.form') }}">LaporBanjir</a> &nbsp;|&nbsp;
        <a href="{{ route('pendaftaran.form') }}">Pendaftaran Siswa</a> &nbsp;|&nbsp;
        <a href="{{ route('login') }}">Masuk</a>
    </p>
</footer>

<script src="/js/app.js"></script>
@stack('scripts')
</body>
</html>
