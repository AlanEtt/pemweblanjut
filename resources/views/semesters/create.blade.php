@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h1>Tambah Semester</h1>
    <form action="{{ route('semesters.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tahun_akademik">Tahun Akademik:</label>
            <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik" required>
        </div>
        <div class="form-group">
            <label for="semester">Semester:</label>
            <input type="text" class="form-control" id="semester" name="semester" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
