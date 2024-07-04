@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h1>Daftar Mata Kuliah</h1>
    <a href="{{ route('mata_kuliahs.create') }}" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Mata Kuliah</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mataKuliahs as $mataKuliah)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $mataKuliah->kode_matkul }}</td>
                    <td>{{ $mataKuliah->nama_matkul }}</td>
                    <td>{{ $mataKuliah->sks }}</td>
                    <td>
                        <a href="{{ route('mata_kuliahs.edit', $mataKuliah->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('mata_kuliahs.destroy', $mataKuliah->id) }}" method="POST"
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
