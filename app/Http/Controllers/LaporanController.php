<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::all();
        return view('laporan.index', compact('laporan'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $laporan = new Laporan();
        $laporan->tanggal_laporan = $request->tanggal_laporan;
        $laporan->nama_pelapor = $request->nama_pelapor;
        $laporan->status = $request->status;
        $laporan->no_kamar_kontrakan = $request->no_kamar_kontrakan;
        $laporan->deskripsi_laporan = $request->deskripsi_laporan;
        $laporan->save();
        return redirect()->route('laporan.index');
    }

    public function show(Laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }

    public function edit(Laporan $laporan)
    {
        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $laporan->tanggal_laporan = $request->tanggal_laporan;
        $laporan->nama_pelapor = $request->nama_pelapor;
        $laporan->status = $request->status;
        $laporan->no_kamar_kontrakan = $request->no_kamar_kontrakan;
        $laporan->deskripsi_laporan = $request->deskripsi_laporan;
        $laporan->save();
        return redirect()->route('laporan.index');
    }

    public function destroy(Laporan $laporan)
    {
        $laporan->delete();
        return redirect()->route('laporan.index');
    }
}