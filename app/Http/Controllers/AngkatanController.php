<?php

namespace App\Http\Controllers;

use App\Models\Angkatan;
use Illuminate\Http\Request;

class AngkatanController extends Controller
{
    public function index()
    {
        $angkatans = Angkatan::all();
        return view('angkatans.index', compact('angkatans'));
    }

    public function create()
    {
        return view('angkatans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_angkatan' => 'required|integer',
        ]);

        Angkatan::create($request->all());

        return redirect()->route('angkatans.index')->with('success', 'Angkatan berhasil ditambahkan.');
    }

    public function show(Angkatan $angkatan)
    {
        $mahasiswas = $angkatan->mahasiswas;
        return view('angkatans.show', compact('angkatan', 'mahasiswas'));
    }

    public function edit(Angkatan $angkatan)
    {
        return view('angkatans.edit', compact('angkatan'));
    }

    public function update(Request $request, Angkatan $angkatan)
    {
        $request->validate([
            'tahun_angkatan' => 'required|integer',
        ]);

        $angkatan->update($request->all());

        return redirect()->route('angkatans.index')->with('success', 'Angkatan berhasil diperbarui.');
    }

    public function destroy(Angkatan $angkatan)
    {
        $angkatan->delete();

        return redirect()->route('angkatans.index')->with('success', 'Angkatan berhasil dihapus.');
    }
}
