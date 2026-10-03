@extends('layouts.dashboard')

@section('title', 'Manajemen Mata Pelajaran')
@section('sidebar-subtitle', 'Admin Panel')
@section('page-title', 'Manajemen Mata Pelajaran')
@section('user-initials', 'TU')

@section('sidebar-menu')
    <a href="{{ route('staff-tu.dashboard') }}">🏠 Beranda</a>
    <a href="{{ route('staff-tu.pengguna') }}">👥 Manajemen Pengguna</a>
    <a href="{{ route('staff-tu.kelas') }}">🏫 Manajemen Kelas</a>
    <a href="{{ route('staff-tu.mapel') }}" class="active">📚 Manajemen Mapel</a>
@endsection

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;flex-wrap:wrap;gap:1rem;">
    <div>
        <h2 style="font-size:1.6rem;font-weight:800;">📚 Manajemen Mata Pelajaran</h2>
        <p style="color:#64748b;margin-top:.25rem;">Kelola mata pelajaran yang diajarkan di sekolah.</p>
    </div>
    <button class="btn btn-primary" onclick="alert('Fitur tambah mapel tersedia di versi database.')">➕ Tambah Mapel</button>
</div>

<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Kode Mapel</th>
                    <th>Nama Mata Pelajaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mapel as $m)
                <tr>
                    <td><code style="font-size:.85rem;background:#f1f5f9;padding:.25rem .6rem;border-radius:5px;font-weight:700;">{{ $m['kode'] }}</code></td>
                    <td><strong>{{ $m['nama'] }}</strong></td>
                    <td>
                        <a href="#" style="color:#2563eb;font-weight:600;font-size:.85rem;margin-right:.75rem;">✏️ Edit</a>
                        <a href="#" style="color:#dc2626;font-weight:600;font-size:.85rem;" onclick="return confirm('Hapus mapel ini?')">🗑️ Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
