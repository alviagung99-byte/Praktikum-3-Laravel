@extends('layouts.main')

@section('title', 'Pendaftaran Siswa Baru')

@push('styles')
<style>
    .reg-hero {
        background: linear-gradient(135deg, #1e40af, #0ea5e9);
        color: #fff;
        padding: 2.5rem 1.5rem 4rem;
        text-align: center;
    }
    .reg-hero h1 { font-size: 1.9rem; font-weight: 800; margin-bottom: .5rem; }
    .reg-hero p  { opacity: .85; max-width: 480px; margin: 0 auto; }

    .reg-container {
        max-width: 720px;
        margin: -2rem auto 3rem;
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

    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

    .form-section-title {
        font-size: .88rem;
        font-weight: 700;
        color: #64748b;
        text-transform: uppercase;
        letter-spacing: .05em;
        margin: 1.75rem 0 1rem;
        padding-bottom: .5rem;
        border-bottom: 1px solid #f1f5f9;
    }

    .char-count { font-size: .78rem; color: #94a3b8; text-align: right; margin-top: .25rem; }

    @media (max-width: 580px) { .form-row { grid-template-columns: 1fr; } }
</style>
@endpush

@section('content')

<header class="reg-hero">
    <p style="font-size:.82rem; font-weight:700; opacity:.7; margin-bottom:.5rem; text-transform:uppercase; letter-spacing:.06em;">🎓 SmartEduInclusion</p>
    <h1>📝 Pendaftaran Siswa Baru</h1>
    <p>Isi formulir berikut dengan lengkap dan benar untuk mendaftarkan siswa ke sistem SmartEduInclusion.</p>
</header>

<div class="reg-container">

    {{-- Komponen Alert Info --}}
    <x-alert type="success" message="Pastikan semua data yang diisi sesuai dokumen resmi (akte lahir, kartu keluarga). Data tidak dapat diubah setelah dikirim." />

    {{-- Step Indicator --}}
    <div class="step-bar">
        <div class="step active">1️⃣ Data Pribadi</div>
        <div class="step">2️⃣ Data Sekolah</div>
        <div class="step">3️⃣ Konfirmasi</div>
    </div>

    <div class="card">
        <p class="card-header">📋 Formulir Pendaftaran Siswa</p>

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
                           placeholder="10 digit NISN" required pattern="\d{10}" maxlength="10">
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
                    <input type="date" id="tanggal_lahir" name="tanggal_lahir" class="form-control" required>
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
                    <div style="background:#eff6ff; border-radius:10px; padding:.9rem 1rem; font-size:.85rem; color:#1e40af;">
                        <strong>💡 Info:</strong> Pilih kelas sesuai dengan jenjang pendidikan siswa.
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

            <button type="submit" class="btn btn-primary btn-block" style="margin-top:.5rem; padding:.9rem;">
                📋 Daftar Sekarang →
            </button>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function syncNamaKelas(select) {
        const opt = select.options[select.selectedIndex];
        document.getElementById('nama_kelas').value = opt.dataset.nama || '';
    }

    function updateCharCount(el, countId, max) {
        document.getElementById(countId).textContent = el.value.length;
    }

    document.getElementById('nisn').addEventListener('input', function () {
        this.value = this.value.replace(/\D/g, '').slice(0, 10);
    });

    document.getElementById('regForm').addEventListener('submit', function (e) {
        const nisn = document.getElementById('nisn').value;
        if (nisn.length !== 10) {
            e.preventDefault();
            alert('NISN harus tepat 10 digit angka.');
            document.getElementById('nisn').focus();
        }
    });
</script>
@endpush
