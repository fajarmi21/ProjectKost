<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pemilik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemilik = Pemilik::all();

        return view('pemilik.index', ['pemilik'=>$pemilik]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();

        return view('pemilik.create', ['user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = $request->file('ktp');
        $imageKTP = 'ktp'.time().'.'.$images->extension();
        $images->move(public_path('images'),$imageKTP);

        $pemilik = new Pemilik;
        $pemilik->user_id = $request->user_id;
        $pemilik->ktp = $imageKTP;
        $pemilik->jenis_kelamin = $request->jenis_kelamin;
        $pemilik->alamat = $request->alamat;
        $pemilik->no_hp = $request->no_hp;
        $pemilik->tgl_lahir = $request->tgl_lahir;

        $pemilik->save();

        return redirect('/pemilik')->with('toast_success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function show(Pemilik $pemilik)
    {
        return view('pemilik.show', ['pemilik' => $pemilik]);
    }

    public function persyaratan()
    {
        $pemilik = Auth::user()->id;

        $data = Pemilik::where('user_id', $pemilik)->first();
// dd($datas);
        return view('berandapemilik.inputprofil', ['pemilik'=>$data]);
    }
    public function persyaratanbank()
    {
        $pemilik = Auth::user()->id;

        $data = Pemilik::where('user_id', $pemilik)->first();
// dd($datas);
        return view('berandapemilik.inputbank', ['pemilik'=>$data]);
    }

    public function inputprofil(Request $request)
    {
        $images = $request->file('ktp');
        $imageKTP = 'ktp'.time().'.'.$images->extension();
        $images->move(public_path('images'),$imageKTP);

        $pemilik = new Pemilik();

        $pemilik->user_id = $request->user_id;
        $pemilik->ktp = $imageKTP;
        $pemilik->jenis_kelamin = $request->jenis_kelamin;
        $pemilik->alamat = $request->alamat;
        $pemilik->no_hp = $request->no_hp;
        $pemilik->tgl_lahir = $request->tgl_lahir;

        $pemilik->save();

        return redirect('/inputprofil')->with('success', 'Data berhasil dikirim!');
    }


    public function edit(Pemilik $pemilik)
    {
        $user = User::all();

        return view('pemilik.edit',['pemilik'=>$pemilik, 'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemilik $pemilik)
    {
        if(!empty($request->file('ktp')))
        {
            unlink(public_path('images').'/'.$pemilik->ktp);
            $images = $request->file('ktp');
            $imageKTP = 'ktp'.time().'.'.$images->extension();
            $images->move(public_path('images'),$imageKTP);

            Pemilik::where('id', $pemilik->id)
            ->update([
            'user_id' =>$request->user_id,
            'ktp' =>$imageKTP,
            'jenis_kelamin' =>$request->jenis_kelamin,
            'alamat' =>$request->alamat,
            'no_hp' =>$request->no_hp,
            'tgl_lahir' =>$request->tgl_lahir           
            ]);
        }
            Pemilik::where('id', $pemilik->id)
            ->update([
            'user_id' => $request->user_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'tgl_lahir' => $request->tgl_lahir
        ]);
        
        return redirect('/pemilik')->with('toast_info', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemilik  $pemilik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemilik $pemilik)
    {
        unlink(public_path('images').'/'.$pemilik->ktp);

        Pemilik::destroy($pemilik->id);
        
        return redirect('/pemilik');
    }

    public function edit_data(Pemilik $pemilik){
        // dd($pemilik);
        return view('berandapemilik.edit', ['pemilik'=>$pemilik]);
    }
}
