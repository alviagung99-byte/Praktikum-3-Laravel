<div class="card" style="padding:1.5rem;">
    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:.875rem;">
        <span style="font-size:.78rem; font-weight:700; color:#2563eb; text-transform:uppercase; letter-spacing:.05em;">
            {{ $materi['mapel'] }}
        </span>
        @if ($materi['status'] === 'Selesai')
            <span class="badge badge-green">✅ Selesai</span>
        @else
            <span class="badge badge-orange">📖 Belum</span>
        @endif
    </div>

    <h3 style="font-weight:700; margin-bottom:.5rem;">{{ $materi['judul'] }}</h3>
    <p style="font-size:.82rem; color:#94a3b8;">{{ $materi['halaman'] }} halaman</p>

    <div style="margin-top:1rem; padding-top:1rem; border-top:1px solid #f1f5f9;">
        <a href="{{ route('siswa.materi.detail', $materi['kode']) }}" class="btn btn-primary" style="width:100%; font-size:.85rem; padding:.6rem;">
            {{ $materi['status'] === 'Selesai' ? '🔄 Baca Ulang' : '▶️ Mulai Belajar' }}
        </a>
    </div>
</div>
