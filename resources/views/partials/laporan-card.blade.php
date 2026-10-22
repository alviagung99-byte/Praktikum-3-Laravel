{{--
    Partial: laporan-card.blade.php
    Menerima variabel $laporan berupa object Eloquent (dari database).
    Dipanggil dengan: @include('partials.laporan-card', ['laporan' => $item])
--}}
<div style="background:#fff; border-radius:14px; border:1.5px solid #e0f2fe; padding:1.25rem 1.5rem; margin-bottom:1rem;">

    {{-- Baris atas: nama pelapor & badge status --}}
    <div style="display:flex; align-items:flex-start; justify-content:space-between; gap:1rem; margin-bottom:.75rem;">
        <div>
            <h3 style="font-size:1rem; font-weight:700; color:#0c4a6e; margin-bottom:.2rem;">
                👤 {{ $laporan->nama_pelapor }}
            </h3>
            <p style="font-size:.83rem; color:#64748b;">
                📍 {{ $laporan->lokasi }}
            </p>
        </div>

        {{-- Badge status berdasarkan tinggi genangan (sesuai ketentuan tugas) --}}
        @if ($laporan->tinggi_genangan < 30)
            <span class="badge badge-waspada">🟡 Waspada</span>
        @elseif ($laporan->tinggi_genangan <= 70)
            <span class="badge badge-siaga">🟠 Siaga</span>
        @else
            <span class="badge badge-awas">🔴 Awas</span>
        @endif
    </div>

    {{-- Detail genangan --}}
    <div style="display:flex; gap:1.5rem; flex-wrap:wrap; font-size:.85rem; color:#475569;">
        <span>🌊 <strong>{{ $laporan->tinggi_genangan }} cm</strong></span>
        <span>📅 <strong>{{ \Carbon\Carbon::parse($laporan->tanggal_kejadian)->translatedFormat('d M Y') }}</strong></span>
        <span>🆔 <strong>#{{ str_pad($laporan->id, 6, '0', STR_PAD_LEFT) }}</strong></span>
    </div>

    {{-- Keterangan (jika ada) --}}
    @if (!empty($laporan->keterangan))
    <p style="margin-top:.75rem; font-size:.85rem; color:#64748b; border-top:1px solid #f1f5f9; padding-top:.75rem;">
        📝 {{ $laporan->keterangan }}
    </p>
    @endif

</div>
