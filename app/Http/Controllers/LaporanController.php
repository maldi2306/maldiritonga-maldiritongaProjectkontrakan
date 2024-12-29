<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::simplePaginate(10);
    // atau
    $laporans = Laporan::paginate(10);
    return view('laporan', compact('laporans'));
    }

    public function create()
    {
        return view('create_laporan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pelaporan' => 'required|date',
            'nama_pelapor' => 'nullable',
            'no_kamar' => 'required|string',
            'status' => 'required|string',
            'deskripsi' => 'required|string',
        ]);
        $request['nama_pelapor'] = auth()->id();

        Laporan::create($request->all());
        
        return back()->with('success', 'Laporan berhasil ditambahkan!');
    }

    public function show($id)
    {
        $laporan = Laporan::find($id);
        return view('laporan.show', compact('laporan'));
    }

    public function edit($id)
    {
        $laporan = Laporan::find($id);
        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_pelaporan' => 'required|date',
            'nama_pelapor' => 'required|string',
            'no_kamar' => 'required|string',
            'status' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $laporan = Laporan::find($id);
        $laporan->update($request->all());
        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil diupdate!');
    }

    public function destroy($id)
{
    $laporan = Laporan::find($id);

    // Pastikan penghuni ditemukan
    if ($laporan) {
        $laporan->delete();
        return redirect()->route('laporan.index')->with('success', 'Laporan berhasil dihapus.');
    }

    return redirect()->route('laporan.index')->with('error', 'Penghuni tidak ditemukan.');
}

}