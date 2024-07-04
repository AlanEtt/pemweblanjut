<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $nilais = Nilai::query();

        // Tambahkan filter berdasarkan semester
        if ($request->filled('semester_id')) {
            $nilais->where('id_semester', $request->semester_id);
        }

        // Tambahkan filter berdasarkan mata kuliah
        if ($request->filled('mata_kuliah_id')) {
            $nilais->where('id_matkul', $request->mata_kuliah_id);
        }

        // Tambahkan filter berdasarkan kelas
        if ($request->filled('kelas_id')) {
            $nilais->whereHas('mahasiswa', function($query) use ($request) {
                $query->where('id_kelas', $request->kelas_id);
            });
        }

        return view('nilais.index', ['nilais' => $nilais->get()]);
    }

    public function create()
    {
        return view('nilais.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_semester' => 'required',
            'id_mahasiswa' => 'required',
            'id_matkul' => 'required',
            'nilai' => 'required|in:A,AB,B,BC,C,CD,D,E',
        ]);

        Nilai::create($request->all());

        return redirect()->route('nilais.index')->with('success', 'Nilai berhasil ditambahkan.');
    }

    public function edit(Nilai $nilai)
    {
        return view('nilais.edit', compact('nilai'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'id_semester' => 'required',
            'id_mahasiswa' => 'required',
            'id_matkul' => 'required',
            'nilai' => 'required|in:A,AB,B,BC,C,CD,D,E',
        ]);

        $nilai->update($request->all());

        return redirect()->route('nilais.index')->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('nilais.index')->with('success', 'Nilai berhasil dihapus.');
    }

    public function show($id)
    {
        $nilai = Nilai::with(['mahasiswa', 'semester', 'mataKuliah'])->findOrFail($id);
        return view('nilais.show', compact('nilai'));
    }
}
