@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <div class="container mt-4">
        <div class="card">
            <div class="card-header">
                <h1>Detail Mahasiswa</h1>
            </div>
            <div class="card-body">
                <p><strong>Nama:</strong> {{ $mahasiswa->nama }}</p>
                <p><strong>NIM:</strong> {{ $mahasiswa->nim }}</p>
                <p><strong>Jenis Kelamin:</strong> {{ $mahasiswa->jenis_kelamin }}</p>
                <p><strong>Alamat:</strong> {{ $mahasiswa->alamat }}</p>
                <p><strong>Email:</strong> {{ $mahasiswa->email }}</p>
                <p><strong>Kelas:</strong> {{ $mahasiswa->kelas->nama_kelas }}</p>
                <p><strong>Angkatan:</strong> {{ $mahasiswa->angkatan->tahun_angkatan }}</p>
                <!-- Tampilkan informasi nilai jika ada -->
                @if ($mahasiswa->nilai->count() > 0)
                    <div class="mt-3">
                        <h3>Nilai:</h3>
                        <ul>
                            @foreach ($mahasiswa->nilai as $nilai)
                                <li> <strong> {{ $nilai->mataKuliah->nama_matkul }}: {{ $nilai->nilai }} </strong> <em>  (Semester: {{ $nilai->semester->tahun_akademik }}  - {{ $nilai->semester->semester }}) </em></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
        <a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
