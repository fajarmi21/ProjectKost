<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('/pengunjung');
    }

    public function indexhome()
    {
        $kost = Kost::where('statuskost', 'Tersedia')->paginate(8);
        $fas = Fasilitas::all();

        return view('halamanutama.index', ['kost' => $kost, 'fas' => $fas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kost = Kost::where('id', $id)->first();
        return view('halamanutama.show', ['kost' => $kost]);
    }
}
