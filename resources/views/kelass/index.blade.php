@extends('layouts.app')

@section('content')
    <h1>Daftar Kelas (data tetap)</h1>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <a href="{{ route('kelass.create') }}" class="btn btn-primary mb-3">Tambah Kelas</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelass as $kelas)
                <tr>
                    <td>{{ $kelas->id }}</td>
                    <td>{{ $kelas->nama_kelas }}</td>
                    <td>
                        <a href="{{ route('kelass.edit', $kelas->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('kelass.destroy', $kelas->id) }}" method="POST" style="display:inline;">
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
