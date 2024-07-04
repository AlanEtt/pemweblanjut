@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h1>Edit Nilai</h1>
    <form action="{{ route('nilais.update', $nilai->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="id_semester">Semester:</label>
            <select class="form-control" id="id_semester" name="id_semester" required>
                @foreach (App\Models\Semester::all() as $semester)
                    <option value="{{ $semester->id }}" {{ $nilai->id_semester == $semester->id ? 'selected' : '' }}>{{ $semester->tahun_akademik }} - {{ $semester->semester }}</option>
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
                    <option value="{{ $mataKuliah->id }}" {{ $nilai->id_matkul == $mataKuliah->id ? 'selected' : '' }}>{{ $mataKuliah->nama_matkul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nilai">Nilai:</label>
            <select class="form-control" id="nilai" name="nilai" required>
                <option value="A" {{ $nilai->nilai == 'A' ? 'selected' : '' }}>A</option>
                <option value="AB" {{ $nilai->nilai == 'AB' ? 'selected' : '' }}>AB</option>
                <option value="B" {{ $nilai->nilai == 'B' ? 'selected' : '' }}>B</option>
                <option value="BC" {{ $nilai->nilai == 'BC' ? 'selected' : '' }}>BC</option>
                <option value="C" {{ $nilai->nilai == 'C' ? 'selected' : '' }}>C</option>
                <option value="CD" {{ $nilai->nilai == 'CD' ? 'selected' : '' }}>CD</option>
                <option value="D" {{ $nilai->nilai == 'D' ? 'selected' : '' }}>D</option>
                <option value="E" {{ $nilai->nilai == 'E' ? 'selected' : '' }}>E</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
