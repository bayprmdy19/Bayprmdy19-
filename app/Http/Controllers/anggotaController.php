<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Anggota;
use App\Models\Bidang;

class anggotaController extends Controller
{

    public function index()
    {
        $anggotas = Anggota::with('bidang') 
                    ->orderBy('nama', 'asc')
                    ->paginate(10); 
        return view('admin.anggota.index', compact('anggotas'));
    }

    public function create()
    {
        return view('admin.anggota.create',[
            'bidangs' => Bidang::orderBy('nama')->get()
            ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'bidang_id' => 'required|exists:bidang,id'
        ]);

        Anggota::create($request->all());

        return redirect()->route('admin.anggota.index')
                        ->with('success', 'Anggota created successfully.');
    }

    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        $bidangs = Bidang::orderBy('nama')->get();
        return view('admin.anggota.edit', compact('anggota', 'bidangs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'bidang_id' => 'required|exists:bidang,id'
        ]);

        $anggota = Anggota::findOrFail($id);
        $anggota->update($request->all());

        return redirect()->route('admin.anggota.index')
                        ->with('success', 'Anggota updated successfully.');
    }

    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('admin.anggota.index')
                        ->with('success', 'Anggota deleted successfully.');
    }
}
