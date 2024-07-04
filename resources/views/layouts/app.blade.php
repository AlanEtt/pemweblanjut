<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project MahasiswaApp</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Tambahkan CSS Bootstrap -->

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        @auth

            <a class="navbar-brand" href="{{ route('mahasiswas.index') }}">Mahasiswa App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->routeIs('mahasiswas.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('mahasiswas.index') }}">Mahasiswa</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('nilais.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('nilais.index') }}">Nilai</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('mata_kuliahs.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('mata_kuliahs.index') }}">Mata Kuliah</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('angkatans.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('angkatans.index') }}">Angkatan</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('semesters.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('semesters.index') }}">Semester</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('kelass.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('kelass.index') }}">Kelas</a>
                    </li>
                </ul>
            </div>
            <div class="ml-auto">
                <span class="navbar-text mr-3">{{ Auth::user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-danger" style="color: white;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        @endauth
    </nav>

    <!-- Tempat untuk menampilkan konten halaman -->
    @yield('content')

    <!-- Tambahkan JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>


