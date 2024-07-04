@extends('layouts.app')

@section('content')
    <h1>Edit Mahasiswa</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <form action="{{ route('mahasiswas.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $mahasiswa->nama }}" required>
        </div>
        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" class="form-control" id="nim" name="nim" value="{{ $mahasiswa->nim }}" required>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $mahasiswa->alamat }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->email }}" required>
        </div>
        <div class="form-group">
            <label for="id_angkatan">Angkatan:</label>
            <select class="form-control" id="id_angkatan" name="id_angkatan" required>
                @foreach(App\Models\Angkatan::all() as $angkatan)
                    <option value="{{ $angkatan->id }}" {{ $mahasiswa->id_angkatan == $angkatan->id ? 'selected' : '' }}>{{ $angkatan->tahun_angkatan }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_kelas">Kelas:</label>
            <select class="form-control" id="id_kelas" name="id_kelas" required>
                @foreach(App\Models\Kelas::all() as $kelas)
                    <option value="{{ $kelas->id }}" {{ $mahasiswa->id_kelas == $kelas->id ? 'selected' : '' }}>{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="laki-laki" {{ $mahasiswa->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="perempuan" {{ $mahasiswa->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                <option value="tidak diketahui" {{ $mahasiswa->jenis_kelamin == 'tidak diketahui' ? 'selected' : '' }}>Tidak Diketahui</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
