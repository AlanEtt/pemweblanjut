@extends('layouts.app')

@section('content')
    <h1>Tambah Angkatan</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <form action="{{ route('angkatans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tahun_angkatan">Tahun Angkatan:</label>
            <input type="number" class="form-control" id="tahun_angkatan" name="tahun_angkatan" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
