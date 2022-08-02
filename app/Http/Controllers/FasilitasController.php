<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas = Fasilitas::all();

        return view('fasilitas.index', compact('fasilitas'));
    }

    public function indexfas()
    {
        $fas = Fasilitas::all();

        return view('beranda.fasilitas', compact('fas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("fasilitas.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama = $request->fasilitas;
        $keterangan = $request->ket_fas;
        $images = $request->file('foto');
        $imagefasilitas = $nama . '.' . $images->extension();
        $images->move(public_path('images'), $imagefasilitas);
        Fasilitas::create($request->except(['foto']) + [
            'foto' => $imagefasilitas
        ]);
        return redirect('fasilitas')->with('success', 'Berhasil Menambah Data Fasilitas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fasilitas = Fasilitas::where('id', $id)->first();
        return view('fasilitas.show', ['fasilitas' => $fasilitas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fasilitas = fasilitas::find($id);
        return view("fasilitas.edit", compact("fasilitas"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fasilitas = fasilitas::find($id);
        if ($request->file('foto') == "") {
            $fasilitas->foto = $fasilitas->foto;
        } else {
            $nama = $request->fasilitas;
            $images = $request->file('foto');
            $imagefasilitas = $nama . time() . '.' . $images->extension();
            $images->move(public_path('images'), $imagefasilitas);
            $fasilitas->foto = $imagefasilitas;
        }
        $fasilitas->fasilitas = $request->fasilitas;
        $fasilitas->harga = $request->harga;
        $fasilitas->ket_fas = $request->ket_fas;
        $fasilitas->save();
        return redirect('fasilitas')->with('success', 'Berhasil Mengubah Data Fasilitas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Fasilitas::findOrFail($id);
        $data->delete();
        // Fasilitas::destroy($fasilitas->id);
        return redirect('fasilitas')->with('success', 'Berhasil Menghapus Data Fasilitas');
    }
}
