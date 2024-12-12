<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghuni;

class PenghuniController extends Controller
{
    public function index()
    {
        $penghunis = Penghuni::paginate(10);
        return view('daftarpenghuni', compact('penghunis'));
    }

    public function create()
    {
        return view('create_penghuni');
    }

    public function store(Request $request)
    {
        $penghuni = new Penghuni();
        $penghuni->nama = $request->input('nama');
        $penghuni->usia = $request->input('usia');
        $penghuni->status = $request->input('status');
        $penghuni->no_kamar = $request->input('no_kamar');
        $penghuni->no_telepon = $request->input('no_telepon');
        $penghuni->save();
        return redirect('/penghuni');
    }

    public function edit($id)
    {
        $penghuni = Penghuni::find($id);
        return view('penghuni.edit', compact('penghuni'));
    }

    public function update(Request $request, $id)
    {
        $penghuni = Penghuni::find($id);
        $penghuni->nama = $request->input('nama');
        $penghuni->usia = $request->input('usia');
        $penghuni->status = $request->input('status');
        $penghuni->no_kamar = $request->input('no_kamar');
        $penghuni->no_telepon = $request->input('no_telepon');
        $penghuni->save();
        return redirect()->route('penghuni.index');
    }

    public function destroy($id)
    {
        $penghuni = Penghuni::find($id);
        $penghuni->delete();
        return redirect()->route('penghuni.index');
    }
}