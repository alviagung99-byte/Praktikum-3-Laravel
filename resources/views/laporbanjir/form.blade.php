@extends('layouts.app')

@section('title', 'Form Pelaporan Banjir')

@section('content')

<div style="max-width:600px; margin:0 auto;">

    {{-- Page Heading --}}
    <div style="text-align:center; margin-bottom:2rem;">
        <h1 style="font-size:1.75rem; font-weight:800; color:#0c4a6e;">📋 Form Pelaporan Banjir</h1>
        <p style="color:#64748b; margin-top:.5rem;">
            Isi formulir di bawah ini dengan informasi yang akurat agar tim BPBD dapat segera menindaklanjuti laporan Anda.
        </p>
    </div>

    {{-- Info Box --}}
    <div style="background:#eff6ff; border:1px solid #bfdbfe; border-radius:12px; padding:1rem 1.25rem; margin-bottom:1.5rem; font-size:.88rem; color:#1e40af;">
        <strong style="display:block; margin-bottom:.35rem;">ℹ️ Petunjuk Pengisian</strong>
        Pastikan data yang Anda masukkan akurat dan lengkap. Nomor laporan akan diberikan secara otomatis setelah pengiriman.
    </div>

    {{-- Form Card --}}
    <div class="card">
        <p class="card-header">🗒️ Data Pelaporan</p>

        <form action="{{ route('laporbanjir.kirim') }}" method="POST">
            @csrf

            {{-- Nama Pelapor --}}
            <div class="form-group">
                <label class="form-label" for="nama_pelapor">
                    👤 Nama Pelapor <span style="color:#dc2626;">*</span>
                </label>
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

            {{-- Lokasi --}}
            <div class="form-group">
                <label class="form-label" for="lokasi">
                    📍 Lokasi Kejadian (Kecamatan / Desa) <span style="color:#dc2626;">*</span>
                </label>
                <input
                    type="text"
                    id="lokasi"
                    name="lokasi"
                    class="form-control"
                    placeholder="Contoh: Kec. Baleendah, Desa Andir"
                    required
                >
            </div>

            {{-- Tinggi Genangan --}}
            <div class="form-group">
                <label class="form-label" for="tinggi_genangan">
                    🌊 Tinggi Genangan Air (cm) <span style="color:#dc2626;">*</span>
                </label>
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
                {{-- Hint Status --}}
                <div style="display:flex; gap:.5rem; margin-top:.65rem; font-size:.78rem; font-weight:700;">
                    <span style="flex:1; text-align:center; padding:.45rem; border-radius:8px; background:#fef9c3; color:#854d0e; border:1px solid #fef08a;">
                        🟡 &lt; 30 cm = Waspada
                    </span>
                    <span style="flex:1; text-align:center; padding:.45rem; border-radius:8px; background:#fff7ed; color:#9a3412; border:1px solid #fed7aa;">
                        🟠 30–70 cm = Siaga
                    </span>
                    <span style="flex:1; text-align:center; padding:.45rem; border-radius:8px; background:#fef2f2; color:#991b1b; border:1px solid #fecaca;">
                        🔴 &gt; 70 cm = Awas
                    </span>
                </div>
            </div>

            {{-- Keterangan --}}
            <div class="form-group">
                <label class="form-label" for="keterangan">📝 Keterangan Tambahan</label>
                <textarea
                    id="keterangan"
                    name="keterangan"
                    class="form-control"
                    rows="3"
                    placeholder="Contoh: Jalan tergenang, warga mulai mengungsi..."
                ></textarea>
            </div>

            <button type="submit" class="btn btn-primary btn-block" style="margin-top:.5rem;">
                🚨 Kirim Laporan Sekarang
            </button>
        </form>
    </div>

    <div style="text-align:center; margin-top:1rem;">
        <a href="{{ route('laporbanjir.daftar') }}" class="btn btn-outline">
            📄 Lihat Daftar Laporan
        </a>
    </div>

</div>

@endsection

@push('scripts')
<script>
    // Highlight status hint sesuai nilai input
    document.getElementById('tinggi_genangan').addEventListener('input', function () {
        const val = parseInt(this.value, 10);
        const hints = this.parentElement.querySelectorAll('[style*="flex:1"]');
        hints.forEach(h => h.style.fontWeight = '700');
        if (!isNaN(val)) {
            hints.forEach(h => h.style.boxShadow = '');
            if (val < 30)       hints[0].style.boxShadow = '0 0 0 2px #ca8a04';
            else if (val <= 70) hints[1].style.boxShadow = '0 0 0 2px #ea580c';
            else                hints[2].style.boxShadow = '0 0 0 2px #dc2626';
        }
    });
</script>
@endpush
