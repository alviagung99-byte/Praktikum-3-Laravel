<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru — SmartEduInclusion</title>
    <link rel="stylesheet" href="/css/app.css">
    <style>
        body { background: #f7f8ff; }

        .reg-header {
            background: linear-gradient(135deg, #1e40af, #0ea5e9);
            color: #fff;
            padding: 2.5rem 1.5rem;
            text-align: center;
        }
        .reg-header h1 { font-size: 1.9rem; font-weight: 800; }
        .reg-header p  { opacity: .85; margin-top: .5rem; max-width: 480px; margin-left: auto; margin-right: auto; }

        .reg-container {
            max-width: 720px;
            margin: -1.5rem auto 3rem;
            padding: 0 1rem;
        }

        .step-bar {
            display: flex;
            gap: .5rem;
            background: #fff;
            border-radius: 14px;
            padding: 1rem 1.5rem;
            box-shadow: 0 2px 8px rgba(0,0,0,.07);
            margin-bottom: 1.5rem;
        }
        .step {
            flex: 1;
            text-align: center;
            font-size: .78rem;
            font-weight: 700;
            padding: .5rem .25rem;
            border-radius: 8px;
            color: #94a3b8;
        }
        .step.active { background: #dbeafe; color: #1e40af; }
        .step.done   { background: #d1fae5; color: #065f46; }

        .reg-card {
            background: #fff;
            border-radius: 18px;
            padding: 2.25rem;
            box-shadow: 0 4px 16px rgba(0,0,0,.08);
        }
        .reg-card h2 {
            font-size: 1.1rem;
            font-weight: 700;
            color: #1e40af;
            margin-bottom: 1.5rem;
            padding-bottom: .875rem;
            border-bottom: 2px solid #eff6ff;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }
        .form-row.full { grid-template-columns: 1fr; }
        @media (max-width: 580px) { .form-row { grid-template-columns: 1fr; } }

        .form-section-title {
            font-size: .9rem;
            font-weight: 700;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: .05em;
            margin: 1.75rem 0 1rem;
            padding-bottom: .5rem;
            border-bottom: 1px solid #f1f5f9;
        }

        .btn-submit {
            width: 100%;
            padding: .9rem;
            background: linear-gradient(135deg, #1e40af, #0ea5e9);
            color: #fff;
            font-size: 1rem;
            font-weight: 700;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            margin-top: 1.75rem;
            transition: opacity .2s;
        }
        .btn-submit:hover { opacity: .9; }

        .char-count {
            font-size: .78rem;
            color: #94a3b8;
            text-align: right;
            margin-top: .25rem;
        }
    </style>
</head>
<body>

<header class="reg-header">
    <p style="font-size:.85rem;font-weight:700;opacity:.7;margin-bottom:.5rem;text-transform:uppercase;letter-spacing:.06em;">🎓 SmartEduInclusion</p>
    <h1>📝 Pendaftaran Siswa Baru</h1>
    <p>Isi formulir berikut dengan lengkap dan benar untuk mendaftarkan siswa ke sistem SmartEduInclusion.</p>
</header>

<div class="reg-container">
    {{-- Step Indicator --}}
    <div class="step-bar">
        <div class="step active">1️⃣ Data Pribadi</div>
        <div class="step">2️⃣ Data Sekolah</div>
        <div class="step">3️⃣ Konfirmasi</div>
    </div>

    <div class="reg-card">
        <h2>📋 Formulir Pendaftaran Siswa</h2>

        <form action="{{ route('pendaftaran.proses') }}" method="POST" id="regForm">
            @csrf

            {{-- Data Pribadi --}}
            <p class="form-section-title">👤 Data Pribadi</p>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="nama">Nama Lengkap <span style="color:#dc2626">*</span></label>
                    <input type="text" id="nama" name="nama" class="form-control"
                           placeholder="Nama sesuai akte lahir" required minlength="3">
                </div>
                <div class="form-group">
                    <label class="form-label" for="nisn">NISN <span style="color:#dc2626">*</span></label>
                    <input type="text" id="nisn" name="nisn" class="form-control"
                           placeholder="10 digit NISN" required pattern="\d{10}" maxlength="10"
                           title="NISN harus 10 digit angka">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="tempat_lahir">Tempat Lahir <span style="color:#dc2626">*</span></label>
                    <input type="text" id="tempat_lahir" name="tempat_lahir" class="form-control"
                           placeholder="Kota/Kabupaten" required>
                </div>
                <div class="form-group">
                    <label class="form-label" for="tanggal_lahir">Tanggal Lahir <span style="color:#dc2626">*</span></label>
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required
                           max="{{ date('Y-m-d') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="jenis_kelamin">Jenis Kelamin <span style="color:#dc2626">*</span></label>
                    <select id="jenis_kelamin" name="jenis_kelamin" class="form-control" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="email">Email <span style="color:#dc2626">*</span></label>
                    <input type="email" id="email" name="email" class="form-control"
                           placeholder="siswa@sekolah.id" required>
                </div>
            </div>

            {{-- Data Sekolah --}}
            <p class="form-section-title">🏫 Data Sekolah</p>

            <div class="form-row">
                <div class="form-group">
                    <label class="form-label" for="kode_kelas">Kelas <span style="color:#dc2626">*</span></label>
                    <select id="kode_kelas" name="kode_kelas" class="form-control" required
                            onchange="syncNamaKelas(this)">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($kelas as $k)
                        <option value="{{ $k['kode'] }}" data-nama="{{ $k['nama'] }}">{{ $k['nama'] }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" id="nama_kelas" name="nama_kelas">
                </div>
                <div class="form-group">
                    <label class="form-label">&nbsp;</label>
                    <div style="background:#eff6ff;border-radius:10px;padding:.9rem 1rem;font-size:.85rem;color:#1e40af;">
                        <strong>💡 Info Kelas:</strong><br>
                        Pilih kelas sesuai dengan jenjang pendidikan siswa.
                    </div>
                </div>
            </div>

            {{-- Alamat --}}
            <p class="form-section-title">📍 Alamat</p>

            <div class="form-group">
                <label class="form-label" for="alamat">Alamat Lengkap <span style="color:#dc2626">*</span></label>
                <textarea id="alamat" name="alamat" class="form-control" rows="3"
                          placeholder="Jl. Contoh No. 1, RT/RW, Kelurahan, Kecamatan, Kota" required
                          maxlength="300" oninput="updateCharCount(this, 'alamatCount', 300)"></textarea>
                <div class="char-count"><span id="alamatCount">0</span>/300 karakter</div>
            </div>

            <button type="submit" class="btn-submit">
                📋 Daftar Sekarang →
            </button>
        </form>
    </div>
</div>

<script>
    function syncNamaKelas(select) {
        const opt = select.options[select.selectedIndex];
        document.getElementById('nama_kelas').value = opt.dataset.nama || '';
    }

    function updateCharCount(el, countId, max) {
        document.getElementById(countId).textContent = el.value.length;
    }

    // Validate NISN is numeric
    document.getElementById('nisn').addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 10);
    });

    // Simple client-side form validation feedback
    document.getElementById('regForm').addEventListener('submit', function (e) {
        const nisn = document.getElementById('nisn').value;
        if (nisn.length !== 10) {
            e.preventDefault();
            alert('NISN harus tepat 10 digit angka.');
            document.getElementById('nisn').focus();
        }
    });
</script>
</body>
</html>
