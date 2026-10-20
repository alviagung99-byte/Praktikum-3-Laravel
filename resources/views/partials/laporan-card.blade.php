<div style="background:#fff; border-radius:14px; border:1.5px solid #e0f2fe; padding:1.25rem 1.5rem; margin-bottom:1rem; transition: box-shadow .15s;">

    {{-- Baris atas: nama & status --}}
    <div style="display:flex; align-items:flex-start; justify-content:space-between; gap:1rem; margin-bottom:.75rem;">
        <div>
            <h3 style="font-size:1rem; font-weight:700; color:#0c4a6e; margin-bottom:.2rem;">
                👤 {{ $laporan['nama'] }}
            </h3>
            <p style="font-size:.83rem; color:#64748b;">
                📍 {{ $laporan['lokasi'] }}
            </p>
        </div>

        {{-- Badge status berdasarkan tinggi genangan --}}
        @if ($laporan['tinggi_genangan'] < 30)
            <span class="badge badge-waspada">🟡 Waspada</span>
        @elseif ($laporan['tinggi_genangan'] <= 70)
            <span class="badge badge-siaga">🟠 Siaga</span>
        @else
            <span class="badge badge-awas">🔴 Awas</span>
        @endif
    </div>

    {{-- Detail genangan --}}
    <div style="display:flex; gap:1.5rem; flex-wrap:wrap; font-size:.85rem; color:#475569;">
        <span>🌊 <strong>{{ $laporan['tinggi_genangan'] }} cm</strong></span>
        <span>📅 <strong>{{ $laporan['tanggal'] }}</strong></span>
        <span>🆔 <strong>#{{ $laporan['nomor'] }}</strong></span>
    </div>

    {{-- Keterangan (jika ada) --}}
    @if (!empty($laporan['keterangan']) && $laporan['keterangan'] !== '-')
    <p style="margin-top:.75rem; font-size:.85rem; color:#64748b; border-top:1px solid #f1f5f9; padding-top:.75rem;">
        📝 {{ $laporan['keterangan'] }}
    </p>
    @endif

</div>
