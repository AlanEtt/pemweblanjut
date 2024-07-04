@extends('layouts.app')

@section('content')
    <h1>Daftar Mahasiswa</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Tambahkan di bagian atas file, sebelum tabel mahasiswa -->
    <form action="{{ route('mahasiswas.index') }}" method="GET">
        @csrf
        <div class="form-group">
            <label for="angkatan_id">Angkatan:</label>
            <select name="angkatan_id" class="form-control">
                <option value="">Pilih Angkatan</option>
                @foreach(App\Models\Angkatan::all() as $angkatan)
                    <option value="{{ $angkatan->id }}">{{ $angkatan->tahun_angkatan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="kelas_id">Kelas:</label>
            <select name="kelas_id" class="form-control">
                <option value="">Pilih Kelas</option>
                @foreach(App\Models\Kelas::all() as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Cari</button>
        <a href="{{ route('mahasiswas.index') }}" class="btn btn-danger">Reset Pencarian</a>
    </form>

    <a href="{{ route('mahasiswas.create') }}" class="btn btn-primary mb-3" style="margin-top: 20px;">Tambah Mahasiswa</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Jenis Kelamin</th>
                <th>Email</th>
                <th>Angkatan</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mahasiswas as $mahasiswa)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->jenis_kelamin }}</td>
                    <td>{{ $mahasiswa->email }}</td>
                    <td>{{ $mahasiswa->angkatan->tahun_angkatan }}</td>
                    <td>{{ $mahasiswa->kelas->nama_kelas }}</td>
                    <td>
                        <a href="{{ route('mahasiswas.show', $mahasiswa->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('mahasiswas.edit', $mahasiswa->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <!-- Tambahkan tombol untuk hapus -->
                        <form action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
