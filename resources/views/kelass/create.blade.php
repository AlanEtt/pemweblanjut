@extends('layouts.app')

@section('content')
    <h1>Tambah Kelas</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <form action="{{ route('kelass.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_kelas">Nama Kelas:</label>
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
