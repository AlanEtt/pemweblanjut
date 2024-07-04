@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h1>Daftar Angkatan</h1>
    <a href="{{ route('angkatans.create') }}" class="btn btn-primary mb-3">Tambah Angkatan</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Tahun Angkatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($angkatans as $angkatan)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $angkatan->tahun_angkatan }}</td>
                    <td>
                        <a href="{{ route('angkatans.edit', $angkatan->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <a href="{{ route('angkatans.show', $angkatan->id) }}" class="btn btn-info btn-sm">Detail</a>
                        <form action="{{ route('angkatans.destroy', $angkatan->id) }}" method="POST"
                            style="display:inline;">
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
