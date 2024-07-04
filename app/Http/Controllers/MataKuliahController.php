<?php

namespace App\Http\Controllers;

use App\Models\MataKuliah;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    public function index()
    {
        $mataKuliahs = MataKuliah::all();
        return view('mata_kuliahs.index', compact('mataKuliahs'));
    }

    public function create()
    {
        return view('mata_kuliahs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'sks' => 'required|integer|min:1',
        ]);

        MataKuliah::create($request->all());

        return redirect()->route('mata_kuliahs.index')->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    public function edit(MataKuliah $mataKuliah)
    {
        return view('mata_kuliahs.edit', compact('mataKuliah'));
    }

    public function update(Request $request, MataKuliah $mataKuliah)
    {
        $request->validate([
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'sks' => 'required|integer|min:1',
        ]);

        $mataKuliah->update($request->all());

        return redirect()->route('mata_kuliahs.index')->with('success', 'Mata Kuliah berhasil diperbarui.');
    }

    public function destroy(MataKuliah $mataKuliah)
    {
        $mataKuliah->delete();

        return redirect()->route('mata_kuliahs.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}
