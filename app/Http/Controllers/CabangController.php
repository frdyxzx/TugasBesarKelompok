<?php

namespace App\Http\Controllers;

use App\Models\Cabang;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function index()
    {
        $cabangs = Cabang::latest()->get();

        return view('owner.cabang.index', compact('cabangs'));
    }

    public function create()
    {
        return view('owner.cabang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_cabang' => 'required',
            'kota' => 'required',
            'alamat' => 'nullable',
            'telepon' => 'nullable',
        ]);

        Cabang::create($request->all());

        return redirect()->route('cabangs.index')->with('success', 'Data cabang berhasil ditambahkan.');
    }

    public function edit(Cabang $cabang)
    {
        return view('owner.cabang.edit', compact('cabang'));
    }

    public function update(Request $request, Cabang $cabang)
    {
        $request->validate([
            'nama_cabang' => 'required',
            'kota' => 'required',
            'alamat' => 'nullable',
            'telepon' => 'nullable',
        ]);

        $cabang->update($request->all());

        return redirect()->route('cabangs.index')->with('success', 'Data cabang berhasil diperbarui.');
    }

    public function destroy(Cabang $cabang)
    {
        $cabang->delete();

        return redirect()->route('cabangs.index')->with('success', 'Data cabang berhasil dihapus.');
    }
}
