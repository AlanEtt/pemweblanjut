@extends('layouts.app')

@section('content')
    <h1>Edit Kelas</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <form action="{{ route('kelass.update', ['kelas' => $kelas->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_kelas">Nama Kelas:</label>
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ $kelas->nama_kelas }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
