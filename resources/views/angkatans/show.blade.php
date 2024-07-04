@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<h1>Tahun Angkatan: {{ $angkatan->tahun_angkatan }}</h1>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mahasiswas as $mahasiswa)
        <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $mahasiswa->nama }}</td>
            <td>{{ $mahasiswa->nim }}</td>
            <td>{{ $mahasiswa->kelas->nama_kelas }}</td>
            <td>
                <a href="{{ route('mahasiswas.show', $mahasiswa->id) }}" class="btn btn-info btn-sm">Detail Mahasiswa</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('angkatans.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
