@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h1>Edit Semester</h1>
    <form action="{{ route('semesters.update', $semester->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tahun_akademik">Tahun Akademik:</label>
            <input type="text" class="form-control" id="tahun_akademik" name="tahun_akademik"
                value="{{ $semester->tahun_akademik }}" required>
        </div>
        <div class="form-group">
            <label for="semester">Semester:</label>
            <input type="text" class="form-control" id="semester" name="semester" value="{{ $semester->semester }}"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
