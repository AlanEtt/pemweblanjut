@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h1>Tambah Mata Kuliah</h1>
    <form action="{{ route('mata_kuliahs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode_matkul">Kode Mata Kuliah:</label>
            <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" required>
        </div>
        <div class="form-group">
            <label for="nama_matkul">Nama Mata Kuliah:</label>
            <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" required>
        </div>
        <div class="form-group">
            <label for="sks">SKS:</label>
            <input type="number" class="form-control" id="sks" name="sks" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
