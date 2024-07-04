@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h1>Daftar Semester</h1>
    <a href="{{ route('semesters.create') }}" class="btn btn-primary mb-3">Tambah Semester</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tahun Akademik</th>
                <th>Semester</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($semesters as $semester)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $semester->tahun_akademik }}</td>
                    <td>{{ $semester->semester }}</td>
                    <td>
                        <a href="{{ route('semesters.edit', $semester->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('semesters.destroy', $semester->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
