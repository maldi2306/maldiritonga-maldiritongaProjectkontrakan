<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontrakan;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $query = Kontrakan::query();

        if ($request->has('q')) {
            $query->where('no', 'like', '%' . $request->q . '%')
                  ->orWhere('no_kamar', 'like', '%' . $request->q . '%')
                  ->orWhere('deskripsi', 'like', '%' . $request->q . '%');
        }

        // Ambil data dengan pagination
        $kontrakans = $query->paginate(10);

        // Kirim data ke view
        return view('Dasboard', compact('kontrakans'));
    }
}
