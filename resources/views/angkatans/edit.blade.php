@extends('layouts.app')

@section('content')
    <h1>Edit Angkatan</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <form action="{{ route('angkatans.update', $angkatan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="tahun_angkatan">Tahun Angkatan:</label>
            <input type="number" class="form-control" id="tahun_angkatan" name="tahun_angkatan" value="{{ $angkatan->tahun_angkatan }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
