@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h1>Tambah Nilai</h1>
    <form action="{{ route('nilais.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="id_semester">Semester:</label>
            <select class="form-control" id="id_semester" name="id_semester" required>
                @foreach (App\Models\Semester::all() as $semester)
                    <option value="{{ $semester->id }}">{{ $semester->tahun_akademik }} - {{ $semester->semester }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_mahasiswa">Mahasiswa:</label>
            <select class="form-control" id="id_mahasiswa" name="id_mahasiswa" required>
                @foreach (App\Models\Mahasiswa::all() as $mahasiswa)
                    <option value="{{ $mahasiswa->id }}">{{ $mahasiswa->angkatan->tahun_angkatan }} - {{ $mahasiswa->kelas->nama_kelas }} - {{ $mahasiswa->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="id_matkul">Mata Kuliah:</label>
            <select class="form-control" id="id_matkul" name="id_matkul" required>
                @foreach (App\Models\MataKuliah::all() as $mataKuliah)
                    <option value="{{ $mataKuliah->id }}">{{ $mataKuliah->nama_matkul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nilai">Nilai:</label>
            <select class="form-control" id="nilai" name="nilai" required>
                <option value="A">A</option>
                <option value="AB">AB</option>
                <option value="B">B</option>
                <option value="BC">BC</option>
                <option value="C">C</option>
                <option value="CD">CD</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
