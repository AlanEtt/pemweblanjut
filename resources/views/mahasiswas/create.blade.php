@extends('layouts.app')

@section('content')
    <h1>Tambah Mahasiswa</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <form action="{{ route('mahasiswas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>
        <!-- Tambahkan input untuk NIM, alamat, email, dan angkatan -->
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" class="form-control" id="nim" name="nim" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="id_angkatan">Angkatan:</label>
            <select class="form-control" id="id_angkatan" name="id_angkatan" required>
                @foreach(App\Models\Angkatan::all() as $angkatan)
                    <option value="{{ $angkatan->id }}">{{ $angkatan->tahun_angkatan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_kelas">Kelas:</label>
            <select class="form-control" id="id_kelas" name="id_kelas" required>
                @foreach(App\Models\Kelas::all() as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
                <option value="tidak diketahui">Tidak Diketahui</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
