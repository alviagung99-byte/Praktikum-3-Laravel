<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaporBanjir — Form Pelaporan</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        /* ---- LaporBanjir specific styles ---- */
        body { background: linear-gradient(135deg, #e0f2fe 0%, #f0f9ff 100%); min-height: 100vh; }

        .lb-header {
            background: linear-gradient(135deg, #1d4ed8, #0ea5e9);
            color: #fff;
            text-align: center;
            padding: 2.5rem 1rem;
        }
        .lb-header h1 { font-size: 2rem; margin-bottom: .5rem; }
        .lb-header p  { opacity: .85; max-width: 520px; margin: 0 auto; }

        .lb-badge {
            display: inline-block;
            background: rgba(255,255,255,.2);
            border: 1px solid rgba(255,255,255,.35);
            padding: .35rem 1rem;
            border-radius: 999px;
            font-size: .8rem;
            font-weight: 600;
            margin-bottom: 1rem;
            letter-spacing: .05em;
        }

        .lb-container {
            max-width: 600px;
            margin: -2rem auto 3rem;
            padding: 0 1rem;
        }

        .lb-card {
            background: #fff;
            border-radius: 20px;
            padding: 2.25rem;
            box-shadow: 0 8px 32px rgba(0,0,0,.1);
        }
        .lb-card h2 {
            font-size: 1.2rem;
            margin-bottom: 1.5rem;
            padding-bottom: .875rem;
            border-bottom: 2px solid #e0f2fe;
            color: #0c4a6e;
        }

        .form-control:focus { border-color: #0ea5e9; box-shadow: 0 0 0 3px rgba(14,165,233,.15); }

        .info-box {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 10px;
            padding: 1rem;
            font-size: .85rem;
            color: #1e40af;
            margin-bottom: 1.5rem;
        }
        .info-box strong { display: block; margin-bottom: .4rem; }

        .tinggi-hint {
            display: flex;
            gap: .75rem;
            margin-top: .5rem;
        }
        .tinggi-hint span {
            flex: 1;
            text-align: center;
            padding: .5rem .25rem;
            border-radius: 8px;
            font-size: .78rem;
            font-weight: 600;
        }
        .hint-rendah  { background: #fefce8; color: #a16207; border: 1px solid #fef08a; }
        .hint-sedang  { background: #fff7ed; color: #9a3412; border: 1px solid #fed7aa; }
        .hint-tinggi  { background: #fef2f2; color: #991b1b; border: 1px solid #fecaca; }

        .submit-row { margin-top: 1.75rem; }

        .btn-lapor {
            width: 100%;
            padding: .9rem;
            background: linear-gradient(135deg, #1d4ed8, #0ea5e9);
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: opacity .2s, transform .1s;
        }
        .btn-lapor:hover   { opacity: .92; }
        .btn-lapor:active  { transform: scale(.98); }

        .lb-footer {
            text-align: center;
            padding: 1.5rem;
            font-size: .82rem;
            color: #64748b;
        }
    </style>
</head>
<body>

<header class="lb-header">
    <span class="lb-badge">🚨 BPBD Kabupaten Bandung</span>
    <h1>💧 LaporBanjir</h1>
    <p>Laporkan kejadian banjir di wilayah Anda dengan cepat dan mudah. Setiap laporan membantu kami bertindak lebih sigap.</p>
</header>

<div class="lb-container">
    <div class="lb-card">
        <h2>📋 Form Pelaporan Banjir</h2>

        <div class="info-box">
            <strong>ℹ️ Petunjuk Pengisian</strong>
            Isi semua kolom dengan informasi yang akurat agar tim BPBD dapat segera menindaklanjuti laporan Anda.
        </div>

        <form action="{{ route('laporbanjir.kirim') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label" for="nama_pelapor">👤 Nama Pelapor <span style="color:#dc2626">*</span></label>
                <input
                    type="text"
                    id="nama_pelapor"
                    name="nama_pelapor"
                    class="form-control"
                    placeholder="Masukkan nama lengkap Anda"
                    required
                    minlength="3"
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="lokasi">📍 Lokasi Kejadian (Kecamatan / Desa) <span style="color:#dc2626">*</span></label>
                <input
                    type="text"
                    id="lokasi"
                    name="lokasi"
                    class="form-control"
                    placeholder="Contoh: Kec. Baleendah, Desa Andir"
                    required
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="tinggi_genangan">🌊 Tinggi Genangan Air (cm) <span style="color:#dc2626">*</span></label>
                <input
                    type="number"
                    id="tinggi_genangan"
                    name="tinggi_genangan"
                    class="form-control"
                    placeholder="Estimasi tinggi air dalam cm"
                    min="1"
                    max="500"
                    required
                >
                <div class="tinggi-hint">
                    <span class="hint-rendah">🟡 1–30 cm = Rendah</span>
                    <span class="hint-sedang">🟠 31–70 cm = Sedang</span>
                    <span class="hint-tinggi">🔴 &gt;70 cm = Tinggi</span>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="keterangan">📝 Keterangan Tambahan</label>
                <textarea
                    id="keterangan"
                    name="keterangan"
                    class="form-control"
                    rows="3"
                    placeholder="Contoh: Jalan tergenang, warga mulai mengungsi, listrik padam..."
                ></textarea>
            </div>

            <div class="submit-row">
                <button type="submit" class="btn-lapor">
                    🚨 Kirim Laporan Sekarang
                </button>
            </div>
        </form>
    </div>

    <div class="lb-footer">
        &copy; 2025 BPBD Kabupaten Bandung &mdash;
        <a href="{{ route('home') }}">Kembali ke SmartEdu</a>
    </div>
</div>

<script>
    // Real-time status preview based on input tinggi genangan
    document.getElementById('tinggi_genangan').addEventListener('input', function () {
        const val = parseInt(this.value, 10);
        const hints = document.querySelectorAll('.tinggi-hint span');
        hints.forEach(h => h.style.fontWeight = '600');

        if (!isNaN(val)) {
            if (val <= 30) {
                hints[0].style.fontWeight = '800';
                hints[0].style.boxShadow = '0 0 0 2px #ca8a04';
                hints[1].style.boxShadow = hints[2].style.boxShadow = '';
            } else if (val <= 70) {
                hints[1].style.fontWeight = '800';
                hints[1].style.boxShadow = '0 0 0 2px #ea580c';
                hints[0].style.boxShadow = hints[2].style.boxShadow = '';
            } else {
                hints[2].style.fontWeight = '800';
                hints[2].style.boxShadow = '0 0 0 2px #dc2626';
                hints[0].style.boxShadow = hints[1].style.boxShadow = '';
            }
        }
    });
</script>
</body>
</html>
