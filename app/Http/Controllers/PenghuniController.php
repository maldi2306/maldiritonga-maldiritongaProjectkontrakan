<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penghuni;

class PenghuniController extends Controller
{
    public function index(Request $request)
    {
        // Query data dengan pencarian
        $query = Penghuni::query();
    
        if ($request->has('q')) {
            $query->where('nama', 'like', '%' . $request->q . '%')              // Kolom nama
                  ->orWhere('usia', 'like', '%' . $request->q . '%')           // Kolom usia
                  ->orWhere('status', 'like', '%' . $request->q . '%')         // Kolom status
                  ->orWhere('no_kamar', 'like', '%' . $request->q . '%')       // Kolom no_kamar
                  ->orWhere('no_telepon', 'like', '%' . $request->q . '%');    // Kolom no_telepon
        }
    
        // Ambil data dengan pagination
        $penghunis = $query->paginate(10);
    
        // Kirim data ke view
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
        
        if ($penghuni) {
            session()->flash('success', 'Data berhasil ditambahkan!');
        } else {
            session()->flash('error', 'Terjadi kesalahan, penghuni gagal dibuat!');
        }
        
        return redirect('/penghuni');

    
}

    public function edit($id)
    {
        $penghuni = Penghuni::findOrFail($id);
        return view('daftarpenghuni_edit', compact('penghuni'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string|max:255',
        'usia' => 'required|integer|min:1',
        'status' => 'required|string',
        'no_kamar' => 'required|string|max:10',
        'no_telepon' => 'required|string|max:15',
    ]);

    $penghuni = Penghuni::findOrFail($id);
    $penghuni->nama = $request->input('nama');
    $penghuni->usia = $request->input('usia');
    $penghuni->status = $request->input('status');
    $penghuni->no_kamar = $request->input('no_kamar');
    $penghuni->no_telepon = $request->input('no_telepon');
    $penghuni->save();

    return redirect()->route('penghuni.index')->with('success', 'Data penghuni berhasil diperbarui.');
}


public function destroy($id)
{
    $penghuni = Penghuni::find($id);

    // Pastikan penghuni ditemukan
    if ($penghuni) {
        $penghuni->delete();
        return redirect()->route('penghuni.index')->with('success', 'Data penghuni berhasil dihapus.');
    }

    return redirect()->route('penghuni.index')->with('error', 'Penghuni tidak ditemukan.');
}

}