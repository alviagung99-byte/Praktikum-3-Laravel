<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaporBanjir — Konfirmasi Laporan</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        body { background: linear-gradient(135deg, #e0f2fe 0%, #f0f9ff 100%); min-height: 100vh; }

        .konfirmasi-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem 1rem 3rem;
        }

        .konfirmasi-header {
            text-align: center;
            padding: 2rem 1rem;
            margin-bottom: 1.5rem;
        }
        .check-icon {
            width: 80px; height: 80px;
            border-radius: 50%;
            background: #d1fae5;
            display: flex; align-items: center; justify-content: center;
            font-size: 2.25rem;
            margin: 0 auto 1.25rem;
            animation: popIn .4s ease;
        }
        @keyframes popIn {
            from { transform: scale(0); opacity: 0; }
            to   { transform: scale(1); opacity: 1; }
        }
        .konfirmasi-header h1 { font-size: 1.75rem; color: #065f46; }
        .konfirmasi-header p  { color: #64748b; margin-top: .5rem; }

        .nomor-laporan {
            background: linear-gradient(135deg, #1d4ed8, #0ea5e9);
            color: #fff;
            border-radius: 16px;
            padding: 1.25rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.5rem;
        }
        .nomor-laporan .label { font-size: .85rem; opacity: .8; }
        .nomor-laporan .kode  { font-size: 1.5rem; font-weight: 800; letter-spacing: .1em; }

        .detail-card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(0,0,0,.08);
            margin-bottom: 1.5rem;
        }
        .detail-card-header {
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            padding: 1rem 1.5rem;
            font-weight: 700;
            font-size: .95rem;
            color: #0c4a6e;
        }
        .detail-row {
            display: flex;
            padding: .875rem 1.5rem;
            border-bottom: 1px solid #f1f5f9;
        }
        .detail-row:last-child { border-bottom: none; }
        .detail-key   { width: 180px; font-size: .85rem; color: #64748b; font-weight: 500; flex-shrink: 0; }
        .detail-value { font-weight: 600; word-break: break-word; }

        /* Status badges */
        .status-rendah  { background: #fefce8; color: #a16207; padding: .3rem .9rem; border-radius: 999px; font-weight: 700; font-size: .85rem; }
        .status-sedang  { background: #fff7ed; color: #9a3412; padding: .3rem .9rem; border-radius: 999px; font-weight: 700; font-size: .85rem; }
        .status-merah   { background: #fef2f2; color: #991b1b; padding: .3rem .9rem; border-radius: 999px; font-weight: 700; font-size: .85rem; }

        .status-bar {
            display: flex;
            gap: .75rem;
            padding: 1rem 1.5rem;
            background: #fff;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            margin-bottom: 1.5rem;
        }
        .status-step {
            flex: 1;
            text-align: center;
            padding: .75rem .5rem;
            border-radius: 8px;
            font-size: .78rem;
            font-weight: 600;
            background: #f1f5f9;
            color: #94a3b8;
        }
        .status-step.done { background: #d1fae5; color: #065f46; }
        .status-step.active { background: #dbeafe; color: #1e40af; }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }
        .action-buttons .btn { flex: 1; justify-content: center; border-radius: 12px; padding: .9rem; }

        @media (max-width: 500px) {
            .detail-row { flex-direction: column; gap: .35rem; }
            .detail-key { width: auto; }
            .action-buttons { flex-direction: column; }
        }
    </style>
</head>
<body>

<div class="konfirmasi-container">

    <div class="konfirmasi-header">
        <div class="check-icon">✅</div>
        <h1>Laporan Berhasil Dikirim!</h1>
        <p>Terima kasih, {{ $nama }}. Laporan Anda telah kami terima dan akan segera ditindaklanjuti.</p>
    </div>

    {{-- Nomor Laporan --}}
    <div class="nomor-laporan">
        <div>
            <div class="label">Nomor Laporan</div>
            <div class="kode">#{{ $nomorLaporan }}</div>
        </div>
        <div style="font-size:2rem">🗒️</div>
    </div>

    {{-- Status Proses --}}
    <div class="status-bar">
        <div class="status-step done">✅ Terkirim</div>
        <div class="status-step active">🔍 Verifikasi</div>
        <div class="status-step">🚒 Penanganan</div>
        <div class="status-step">✔️ Selesai</div>
    </div>

    {{-- Detail Laporan --}}
    <div class="detail-card">
        <div class="detail-card-header">📋 Ringkasan Laporan Banjir</div>

        <div class="detail-row">
            <span class="detail-key">👤 Nama Pelapor</span>
            <span class="detail-value">{{ $nama }}</span>
        </div>

        <div class="detail-row">
            <span class="detail-key">📍 Lokasi Kejadian</span>
            <span class="detail-value">{{ $lokasi }}</span>
        </div>

        <div class="detail-row">
            <span class="detail-key">🌊 Tinggi Genangan</span>
            <span class="detail-value">{{ $genangan }} cm</span>
        </div>

        <div class="detail-row">
            <span class="detail-key">⚠️ Status Banjir</span>
            <span class="detail-value">
                @if ($warna === 'kuning')
                    <span class="status-rendah">🟡 {{ $status }}</span>
                @elseif ($warna === 'oranye')
                    <span class="status-sedang">🟠 {{ $status }}</span>
                @else
                    <span class="status-merah">🔴 {{ $status }}</span>
                @endif
            </span>
        </div>

        @if ($keterangan && $keterangan !== '-')
        <div class="detail-row">
            <span class="detail-key">📝 Keterangan</span>
            <span class="detail-value">{{ $keterangan }}</span>
        </div>
        @endif
    </div>

    {{-- Informasi tambahan berdasarkan status --}}
    @if ($warna === 'merah')
    <div class="alert alert-danger">
        <span>🚨</span>
        <div>
            <strong>Banjir Tingkat Tinggi!</strong>
            Tim BPBD akan segera diturunkan. Harap segera evakuasi ke tempat yang lebih aman dan hubungi <strong>119</strong> jika darurat.
        </div>
    </div>
    @elseif ($warna === 'oranye')
    <div class="alert alert-warning">
        <span>⚠️</span>
        <div>
            <strong>Banjir Tingkat Sedang.</strong>
            Tim monitoring BPBD akan memantau situasi. Tetap waspada dan ikuti arahan petugas.
        </div>
    </div>
    @else
    <div class="alert alert-success">
        <span>ℹ️</span>
        <div>
            <strong>Banjir Tingkat Rendah.</strong>
            Laporan Anda telah dicatat. Tim BPBD akan memantau perkembangan situasi di wilayah Anda.
        </div>
    </div>
    @endif

    {{-- Action Buttons --}}
    <div class="action-buttons">
        <a href="{{ route('laporbanjir.form') }}" class="btn btn-outline">
            ➕ Lapor Lagi
        </a>
        <a href="{{ route('home') }}" class="btn btn-primary">
            🏠 Kembali ke Beranda
        </a>
    </div>

</div>

</body>
</html>
