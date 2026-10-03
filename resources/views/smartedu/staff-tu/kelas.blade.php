@extends('layouts.dashboard')

@section('title', 'Manajemen Kelas')
@section('sidebar-subtitle', 'Admin Panel')
@section('page-title', 'Manajemen Kelas')
@section('user-initials', 'TU')

@section('sidebar-menu')
    <a href="{{ route('staff-tu.dashboard') }}">🏠 Beranda</a>
    <a href="{{ route('staff-tu.pengguna') }}">👥 Manajemen Pengguna</a>
    <a href="{{ route('staff-tu.kelas') }}" class="active">🏫 Manajemen Kelas</a>
    <a href="{{ route('staff-tu.mapel') }}">📚 Manajemen Mapel</a>
@endsection

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;flex-wrap:wrap;gap:1rem;">
    <div>
        <h2 style="font-size:1.6rem;font-weight:800;">🏫 Manajemen Kelas</h2>
        <p style="color:#64748b;margin-top:.25rem;">Kelola daftar kelas yang tersedia di sekolah.</p>
    </div>
    <button class="btn btn-primary" onclick="alert('Fitur tambah kelas tersedia di versi database.')">➕ Tambah Kelas</button>
</div>

<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Kode Kelas</th>
                    <th>Nama Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelas as $k)
                <tr>
                    <td><code style="font-size:.85rem;background:#f1f5f9;padding:.25rem .6rem;border-radius:5px;font-weight:700;">{{ $k['kode'] }}</code></td>
                    <td><strong>{{ $k['nama'] }}</strong></td>
                    <td>
                        <a href="#" style="color:#2563eb;font-weight:600;font-size:.85rem;margin-right:.75rem;">✏️ Edit</a>
                        <a href="#" style="color:#dc2626;font-weight:600;font-size:.85rem;" onclick="return confirm('Hapus kelas ini?')">🗑️ Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
