@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <h1>Daftar Nilai</h1>
    <a href="{{ route('nilais.create') }}" class="btn btn-primary mb-3">Tambah Nilai</a>
    <!-- Tambahkan form filter di sini -->
    <form action="{{ route('nilais.index') }}" method="GET">
        <div class="form-group">
            <label for="semester_id">Semester:</label>
            <select class="form-control" id="semester_id" name="semester_id">
                <option value="">Semua Semester</option>
                @foreach(App\Models\Semester::all() as $semester)
                    <option value="{{ $semester->id }}">{{ $semester->tahun_akademik }} - {{ $semester->semester }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="mata_kuliah_id">Mata Kuliah:</label>
            <select class="form-control" id="mata_kuliah_id" name="mata_kuliah_id">
                <option value="">Semua Mata Kuliah</option>
                @foreach(App\Models\MataKuliah::all() as $mataKuliah)
                    <option value="{{ $mataKuliah->id }}">{{ $mataKuliah->nama_matkul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="kelas_id">Kelas:</label>
            <select class="form-control" id="kelas_id" name="kelas_id">
                <option value="">Semua Kelas</option>
                @foreach(App\Models\Kelas::all() as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Filter</button>
    </form>
    <!-- Form filter berakhir di sini -->
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>TA - Semester</th>
                <th>Kelas</th>
                <th>Nama Mahasiswa</th>
                <th>Nama Mata Kuliah</th>
                <th>SKS</th>
                <th>Nilai</th>
                <th>Bobot Nilai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilais as $nilai)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $nilai->semester->tahun_akademik }} - {{ $nilai->semester->semester }}</td>
                    <td>{{ $nilai->mahasiswa->kelas->nama_kelas }}</td>
                    <td>{{ $nilai->mahasiswa->nama }}</td>
                    <td>{{ $nilai->mataKuliah->nama_matkul }}</td>
                    <td>{{ $nilai->mataKuliah->sks }}</td>
                    <td>{{ $nilai->nilai }}</td>
                    <td>{{ $nilai->bobotNilai }}</td>
                    <td>
                        <a href="{{ route('nilais.edit', $nilai->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('nilais.destroy', $nilai->id) }}" method="POST" style="display:inline;">
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
