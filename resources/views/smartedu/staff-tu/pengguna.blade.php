@extends('layouts.dashboard')

@section('title', 'Manajemen Pengguna')
@section('sidebar-subtitle', 'Admin Panel')
@section('page-title', 'Manajemen Pengguna')
@section('user-initials', 'TU')

@section('sidebar-menu')
    <a href="{{ route('staff-tu.dashboard') }}">🏠 Beranda</a>
    <a href="{{ route('staff-tu.pengguna') }}" class="active">👥 Manajemen Pengguna</a>
    <a href="{{ route('staff-tu.kelas') }}">🏫 Manajemen Kelas</a>
    <a href="{{ route('staff-tu.mapel') }}">📚 Manajemen Mapel</a>
@endsection

@section('content')
<div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:1.5rem;flex-wrap:wrap;gap:1rem;">
    <div>
        <h2 style="font-size:1.6rem;font-weight:800;">👥 Manajemen Pengguna</h2>
        <p style="color:#64748b;margin-top:.25rem;">Kelola akun Staff TU, guru, siswa, dan orang tua.</p>
    </div>
    <a href="{{ route('pendaftaran.form') }}" class="btn btn-primary">➕ Tambah Pengguna</a>
</div>

<div class="card">
    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>ID / NIP / NISN</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengguna as $user)
                <tr>
                    <td><code style="font-size:.82rem;background:#f1f5f9;padding:.2rem .5rem;border-radius:5px;">{{ $user['id'] }}</code></td>
                    <td><strong>{{ $user['nama'] }}</strong></td>
                    <td style="color:#64748b;">{{ $user['email'] }}</td>
                    <td>
                        @php
                            $roleColors = ['Staff TU' => 'badge-blue', 'Guru' => 'badge-green', 'Siswa' => 'badge-orange', 'Orang Tua' => 'badge-yellow'];
                        @endphp
                        <span class="badge {{ $roleColors[$user['role']] ?? 'badge-blue' }}">{{ $user['role'] }}</span>
                    </td>
                    <td>
                        <a href="#" style="color:#2563eb;font-weight:600;font-size:.85rem;margin-right:.75rem;">✏️ Edit</a>
                        <a href="#" style="color:#dc2626;font-weight:600;font-size:.85rem;" onclick="return confirm('Hapus pengguna ini?')">🗑️ Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
