<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'LaporBanjir') — BPBD Kab. Bandung</title>
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: Arial, sans-serif;
            background: #f0f9ff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ===== HEADER / NAVBAR ===== */
        .lb-header {
            background: linear-gradient(135deg, #1d4ed8, #0ea5e9);
            color: #fff;
            padding: 0 2rem;
        }

        .lb-header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 0;
            gap: 1rem;
        }

        .lb-brand {
            display: flex;
            align-items: center;
            gap: .75rem;
            text-decoration: none;
            color: #fff;
        }

        .lb-brand-icon {
            width: 46px;
            height: 46px;
            background: rgba(255,255,255,.2);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .lb-brand-text strong {
            display: block;
            font-size: 1.15rem;
            font-weight: 800;
            line-height: 1.1;
        }

        .lb-brand-text small {
            font-size: .75rem;
            opacity: .8;
        }

        /* ===== NAVIGASI ===== */
        .lb-nav {
            display: flex;
            align-items: center;
            gap: .5rem;
        }

        .lb-nav a {
            color: rgba(255,255,255,.85);
            text-decoration: none;
            font-size: .88rem;
            font-weight: 600;
            padding: .5rem .9rem;
            border-radius: 8px;
            transition: background .15s;
        }

        .lb-nav a:hover,
        .lb-nav a.aktif {
            background: rgba(255,255,255,.2);
            color: #fff;
        }

        .lb-nav a.btn-nav-outline {
            border: 1.5px solid rgba(255,255,255,.5);
        }

        /* ===== MAIN CONTENT ===== */
        .lb-main {
            flex: 1;
            padding: 2rem 1.5rem;
            max-width: 900px;
            width: 100%;
            margin: 0 auto;
        }

        /* ===== FOOTER ===== */
        .lb-footer {
            background: #1e293b;
            color: #94a3b8;
            text-align: center;
            padding: 1.5rem 1rem;
            font-size: .82rem;
            margin-top: auto;
        }

        .lb-footer a {
            color: #7dd3fc;
            text-decoration: none;
        }

        .lb-footer a:hover {
            text-decoration: underline;
        }

        /* ===== CARD ===== */
        .card {
            background: #fff;
            border-radius: 16px;
            padding: 1.75rem;
            box-shadow: 0 4px 16px rgba(0,0,0,.08);
            margin-bottom: 1.25rem;
        }

        .card-header {
            font-size: 1.05rem;
            font-weight: 700;
            color: #0c4a6e;
            padding-bottom: .875rem;
            border-bottom: 2px solid #e0f2fe;
            margin-bottom: 1.25rem;
        }

        /* ===== FORM ===== */
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
            border-color: #0ea5e9;
            box-shadow: 0 0 0 3px rgba(14,165,233,.15);
        }

        textarea.form-control { resize: vertical; }

        /* ===== TOMBOL ===== */
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
        }

        .btn:active { transform: scale(.97); }

        .btn-primary {
            background: linear-gradient(135deg, #1d4ed8, #0ea5e9);
            color: #fff;
        }

        .btn-primary:hover { opacity: .9; }

        .btn-outline {
            background: #fff;
            color: #1d4ed8;
            border: 2px solid #bfdbfe;
        }

        .btn-outline:hover { background: #eff6ff; }

        .btn-block { width: 100%; text-align: center; }

        /* ===== BADGE STATUS ===== */
        .badge {
            display: inline-block;
            padding: .3rem 1rem;
            border-radius: 999px;
            font-size: .8rem;
            font-weight: 700;
        }

        .badge-waspada { background: #fef9c3; color: #854d0e; border: 1px solid #fef08a; }
        .badge-siaga   { background: #fff7ed; color: #9a3412; border: 1px solid #fed7aa; }
        .badge-awas    { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }

        /* ===== TABEL ===== */
        .table-wrap { overflow-x: auto; }

        table { width: 100%; border-collapse: collapse; }

        table th {
            background: #f0f9ff;
            text-align: left;
            padding: .75rem 1rem;
            font-size: .85rem;
            color: #0c4a6e;
            border-bottom: 2px solid #e0f2fe;
        }

        table td {
            padding: .875rem 1rem;
            border-bottom: 1px solid #f1f5f9;
            font-size: .9rem;
            vertical-align: middle;
        }

        table tr:last-child td { border-bottom: none; }
        table tr:hover td { background: #f8fafc; }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 600px) {
            .lb-header-top { flex-direction: column; align-items: flex-start; }
            .lb-nav { flex-wrap: wrap; }
            .lb-main { padding: 1.25rem 1rem; }
        }
    </style>
    @stack('styles')
</head>
<body>

{{-- ===== HEADER ===== --}}
<header class="lb-header">
    <div class="lb-header-top">
        {{-- Brand --}}
        <a href="{{ route('laporbanjir.form') }}" class="lb-brand">
            <div class="lb-brand-icon">💧</div>
            <div class="lb-brand-text">
                <strong>LaporBanjir</strong>
                <small>BPBD Kabupaten Bandung</small>
            </div>
        </a>

        {{-- Navigasi --}}
        <nav class="lb-nav">
            <a href="{{ route('laporbanjir.form') }}">📋 Lapor</a>
            <a href="{{ route('laporbanjir.daftar') }}">📄 Daftar Laporan</a>
            <a href="{{ route('home') }}" class="btn-nav-outline">🏠 SmartEdu</a>
        </nav>
    </div>
</header>

{{-- ===== KONTEN UTAMA ===== --}}
<main class="lb-main">
    @yield('content')
</main>

{{-- ===== FOOTER ===== --}}
<footer class="lb-footer">
    <p>&copy; 2025 BPBD Kabupaten Bandung &mdash; Sistem Pelaporan Banjir <strong>LaporBanjir</strong></p>
    <p style="margin-top:.4rem;">
        <a href="{{ route('laporbanjir.form') }}">Form Laporan</a> &nbsp;|&nbsp;
        <a href="{{ route('laporbanjir.daftar') }}">Daftar Laporan</a> &nbsp;|&nbsp;
        <a href="{{ route('home') }}">SmartEduInclusion</a>
    </p>
</footer>

<script src="/js/app.js"></script>
@stack('scripts')
</body>
</html>
