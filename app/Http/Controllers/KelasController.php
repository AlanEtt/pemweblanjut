<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelass = Kelas::all();
        return view('kelass.index', compact('kelass'));
    }

    public function create()
    {
        return view('kelass.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
        ]);

        Kelas::create($request->all());

        return redirect()->route('kelass.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kelas)
    {
        return view('kelass.edit', compact('kelas'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_kelas' => 'required',
        ]);

        $kelas->update($request->all());

        return redirect()->route('kelass.index')->with('success', 'Kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return redirect()->route('kelass.index')->with('success', 'Kelas berhasil dihapus.');
    }

    public function show(Kelas $kelas)
    {
        $kelas->load('mahasiswa');
        return view('kelass.show', compact('kelas'));
    }
}
