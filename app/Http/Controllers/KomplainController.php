<?php

namespace App\Http\Controllers;

use App\Models\Komplain;
use App\Models\Kost;
use App\Models\User;
use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KomplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == '6') {

            $komplain = Komplain::where('user_id', Auth::user()->id)->get();
        } elseif (Auth::user()->role_id == '5') {
            $komplain = Komplain::join('users','users.id','=','komplain.user_id')
            ->select('komplain.*','users.name')->get();
        }

        return view('komplain.index', ['komplain' => $komplain]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $komplain = Pembayaran::join('kost','kost.id','=','pembayaran.kost_id')
            ->where('pembayaran.user_id', Auth::user()->id)
            ->select('pembayaran.*', 'kost.nama_kost')->first();
        $user = User::all();
        $kost = Kost::all();
        return view('komplain.create', ['user' => $user, 'kost' => $kost, 'komplain' => $komplain]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = $request->file('gambar_ket');
        $imagegambar_ket = 'gambar_ket' . time() . '.' . $images->extension();
        $images->move(public_path('images'), $imagegambar_ket);

        $komplain = new Komplain;
        $komplain->user_id = $request->user_id;
        $komplain->kost_id = $request->kost_id;
        $komplain->tgl_komplain = Carbon::now()->toDateString();
        $komplain->deskripsi = $request->deskripsi;
        $komplain->status = $request->status;
        $komplain->gambar_ket = $imagegambar_ket;

        $komplain->save();

        return redirect('/komplain')->with('toast_success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Komplain  $komplain
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $komplain = Komplain::join('users','users.id','=','komplain.user_id')
        ->join('kost','kost.id','=','komplain.kost_id')
        ->where('komplain.id',$id)
        ->select('komplain.*','users.name','kost.nama_kost')->first();
        return view('komplain.show', ['komplain' => $komplain]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Komplain  $komplain
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::all();
        $komplain = Komplain::join('kost','kost.id','=','komplain.kost_id')
        ->join('users','users.id','=','komplain.user_id')
        ->where('komplain.id', $id)
        ->select('komplain.*', 'kost.nama_kost','users.name')->first();
        return view('komplain.edit', ['komplain' => $komplain, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Komplain  $komplain
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cek = Komplain::findorfail($id);
        if (!empty($request->file('gambar_ket'))) {
            unlink(public_path('images') . '/' . $cek->gambar_ket);
            $images = $request->file('gambar_ket');
            $imagegambar_ket = 'gambar_ket' . time() . '.' . $images->extension();
            $images->move(public_path('images'), $imagegambar_ket);

            Komplain::where('id', $cek->id)
                ->update([
                    'tgl_komplain' => $request->tgl_komplain,
                    'deskripsi' => $request->deskripsi,
                    'gambar_ket' => $imagegambar_ket
                ]);
        }
        Komplain::where('id', $cek->id)
            ->update([
                'tgl_komplain' => $request->tgl_komplain,
                'deskripsi' => $request->deskripsi
            ]);

        return redirect('/komplain')->with('toast_info', 'Data berhasil diubah!');
    }

    public function konfirmasi(Request $request, $id)
    {
        Komplain::where('id', $id)
            ->update([
                'status' => $request->status
            ]);
        return redirect('/komplain')->with('toast_info','Komplain Telah Terkonfirmasi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Komplain  $komplain
     * @return \Illuminate\Http\Response
     */
    public function destroy(Komplain $komplain)
    {
        unlink(public_path('images') . '/' . $komplain->gambar_ket);

        Komplain::destroy($komplain->id);

        return redirect('/komplain')->with('toast_danger','Data berhasil dihapus!');
    }
    public function edit_data(Komplain $komplain)
    {
        // dd($penyewa);
        return view('beranda.edit', ['komplain' => $komplain]);
    }
}
