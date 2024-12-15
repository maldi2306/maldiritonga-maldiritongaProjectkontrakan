<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontrakan;
use Illuminate\Support\Facades\Storage;

class daftarkontrakan extends Controller
{
    
    public function index(Request $request)
    {
        // Query data dengan pencarian (opsional)
        $query = Kontrakan::query();
    
        if ($request->has('q')) {
            $query->where('no_kamar', 'like', '%' . $request->q . '%')  // kolom 'no_kamar'
                  ->orWhere('status', 'like', '%' . $request->q . '%')   // kolom 'status'
                  ->orWhere('keterangan', 'like', '%' . $request->q . '%') // kolom 'keterangan'
                  ->orWhere('harga', 'like', '%' . $request->q . '%')    // kolom 'harga'
                  ->orWhere('deskripsi', 'like', '%' . $request->q . '%'); // kolom 'deskripsi'
        }
    
        // Ambil data dengan pagination
        $kontrakans = $query->paginate(10);
    
        // Kirim data ke view
        return view('daftarkontrakan', compact('kontrakans'));
    }
    


    public function create()
    {
        return view('create_kontrakan');
    }

    public function store(Request $request)
{
    $requestData = $request->validate([
        'no_kamar' => 'required|numeric',
        'status' => 'required|in:terisi,kosong',
        'keterangan' => 'required|in:kontrakan,kos',
        'harga' => 'required|numeric',
        'deskripsi' => 'nullable',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi file gambar
    ]);

    // Proses upload foto jika ada
    if ($request->hasFile('foto')) {
        $requestData['foto'] = $request->file('foto')->store('kontrakan_fotos', 'public');
    }

    // Simpan data ke dalam model
    $kontrakan = new Kontrakan();
    $kontrakan->fill($requestData);
    $kontrakan->save();
    if ($kontrakan) {
        session()->flash('success', 'Data berhasil ditambahkan!');
    } else {
        session()->flash('error', 'Terjadi kesalahan, kontrakan gagal dibuat!');
}
    
    return redirect()->route('daftar.index');
}
public function edit($id)
{
    // Ambil data kontrakan berdasarkan ID
    $kontrakan = Kontrakan::findOrFail($id);

    // Kirim data ke view edit_kontrakan
    return view('daftarkontrakan_edit', compact('kontrakan'));
}
public function update(Request $request, $id)
{
    $requestData = $request->validate([
        'no_kamar' => 'required|numeric',
        'status' => 'required|in:terisi,kosong',
        'keterangan' => 'required|in:kontrakan,kos',
        'harga' => 'required|numeric',
        'deskripsi' => 'nullable',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $kontrakan = Kontrakan::findOrFail($id);

    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($kontrakan->foto && Storage::exists($kontrakan->foto)) {
            Storage::delete($kontrakan->foto);
        }
        // Upload foto baru
        $requestData['foto'] = $request->file('foto')->store('kontrakan_fotos', 'public');
    }

    // Update data
    $kontrakan->update($requestData);

    return redirect()->route('daftar.index')->with('success', 'Data berhasil diperbarui.');
}
public function destroy($id)
{
    // Cari data berdasarkan ID
    $kontrakan = Kontrakan::findOrFail($id);

    // Hapus foto jika ada
    if ($kontrakan->foto && Storage::exists($kontrakan->foto)) {
        Storage::delete($kontrakan->foto);
    }

    // Hapus data
    $kontrakan->delete();
    

    // Redirect dengan pesan sukses
    return redirect()->route('daftar.index')->with('success', 'Data berhasil dihapus.');
}


}
