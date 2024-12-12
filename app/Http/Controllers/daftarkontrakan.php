<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontrakan;

class daftarkontrakan extends Controller
{
    
    public function index(Request $request)
    {
        // Query data dengan pencarian (opsional)
        $query = Kontrakan::query();

        if ($request->has('q')) {
            $query->where('no', 'like', '%' . $request->q . '%')
                  ->orWhere('no_kamar', 'like', '%' . $request->q . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->q . '%');
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

    
    return redirect()->route('daftar.index');
}

}
