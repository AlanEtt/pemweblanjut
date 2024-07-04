<?php

namespace App\Http\Controllers;


use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MahasiswaController extends Controller
{
    public function index(Request $request)
    {
        $mahasiswas = Mahasiswa::query();

        if ($request->filled('angkatan_id')) {
            $mahasiswas->whereHas('angkatan', function($query) use ($request) {
                $query->where('id', $request->angkatan_id);
            });
        }
        if ($request->filled('kelas_id')) {
            $mahasiswas->whereHas('kelas', function($query) use ($request) {
                $query->where('id', $request->kelas_id);
            });
        }

        return view('mahasiswas.index', ['mahasiswas' => $mahasiswas->get()]);
    }

    public function create()
    {
        return view('mahasiswas.create');
    }

    public function store(Request $request)
    {
        Log::info('Request Data', $request->all());
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas',
            'alamat' => 'required',
            'email' => 'required|unique:mahasiswas',
            'id_angkatan' => 'required',
            'id_kelas' => 'required',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        if (!$mahasiswa) {
            return redirect()->route('mahasiswas.index')->with('error', 'Mahasiswa tidak ditemukan.');
        }
        return view('mahasiswas.show', compact('mahasiswa'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswas.edit', compact('mahasiswa'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nama' => 'required',
            'nim' => 'required|unique:mahasiswas,nim,'.$mahasiswa->id,
            'alamat' => 'required',
            'email' => 'required|unique:mahasiswas,email,'.$mahasiswa->id,
            'jenis_kelamin' => 'required|in:laki-laki,perempuan,tidak diketahui',
            'id_angkatan' => 'required',
            'id_kelas' => 'required',
        ]);

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswas.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    public function search(Request $request)
    {
        $mahasiswas = Mahasiswa::whereHas('angkatan', function($query) use ($request) {
            $query->where('id', $request->angkatan_id);
        })->whereHas('kelas', function($query) use ($request) {
            $query->where('id', $request->kelas_id);
        })->get();

        return view('mahasiswas.index', compact('mahasiswas'));
    }
}
