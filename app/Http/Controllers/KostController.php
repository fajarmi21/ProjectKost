<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == '5') {

            $kost = Kost::all();
            return view('kost.index', ['kost' => $kost]);
        } elseif (Auth::user()->role_id == '1') {
            $kost = Kost::get();
            return view('kost.index', ['kost' => $kost]);
        } elseif (Auth::user()->role_id == '6') {
            $kost = Kost::where('statuskost','Tersedia')->get();
            return view('kost.indexkost', ['kost' => $kost]);
        }
        $kost = Kost::where('statuskost','Tersedia')->get();
        return view('kost.indexkost', ['kost' => $kost]);
    }
    public function indexkost()
    {
        $kost = Kost::where('statuskost','Tersedia')->paginate(8);

        return view('kost.indexkost', ['kost' => $kost]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();

        return view('kost.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $images = $request->file('fotokost');
        $imagefotokost = 'fotokost' . time() . '.' . $images->extension();
        $images->move(public_path('images'), $imagefotokost);
        if ($request->file('fotokost2') != null) {
            # code...
            $images = $request->file('fotokost2');
            $imagefotokost2 = 'fotokost2' . time() . '.' . $images->extension();
            $images->move(public_path('images'), $imagefotokost2);
        } elseif ($request->file('fotokost3') != null) {
            # code...
            $images = $request->file('fotokost3');
            $imagefotokost3 = 'fotokost3' . time() . '.' . $images->extension();
            $images->move(public_path('images'), $imagefotokost3);
        }

        $kost = new kost;
        $kost->nama_kost = $request->nama_kost;
        $kost->kategori_kost = $request->kategori_kost;
        $kost->fasilitas = $request->fasilitas;
        $kost->harga = $request->harga;
        $kost->keterangan = $request->keterangan;
        $kost->statuskost = $request->status;
        $kost->fotokost = $imagefotokost;
        if ($request->file('fotokost2') != null) {
        $kost->fotokost2 = $imagefotokost2;
        } elseif ($request->file('fotokost3') != null) {
        $kost->fotokost3 = $imagefotokost3;
        }
        $kost->save();

        return redirect('/kost')->with('toast_success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            $kost = Kost::where('id', $id)->first();
            return view('kost.show', ['kost' => $kost]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function edit(Kost $kost)
    {
        $user = User::all();

        return view('kost.edit', ['kost' => $kost, 'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kost $kost)
    {
        if (!empty($request->file('fotokost'))) {
            // unlink(public_path('images') . '/' . $kost->fotokost);
            $images = $request->file('fotokost');
            $imagefotokost = 'fotokost' . time() . '.' . $images->extension();
            $images->move(public_path('images'), $imagefotokost);

            Kost::where('id', $kost->id)
                ->update([
                    'nama_kost' => $request->nama_kost,
                    'kategori_kost' => $request->kategori_kost,
                    'fasilitas' => $request->fasilitas,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                    'fotokost' => $imagefotokost
                ]);
        }
        elseif (!empty($request->file('fotokost2'))) {
            // unlink(public_path('images') . '/' . $kost->fotokost);
            $images = $request->file('fotokost');
            $imagefotokost = 'fotokost' . time() . '.' . $images->extension();
            $images->move(public_path('images'), $imagefotokost);

            // unlink(public_path('images') . '/' . $kost->fotokost2);
            $images = $request->file('fotokost2');
            $imagefotokost2 = 'fotokost2' . time() . '.' . $images->extension();
            $images->move(public_path('images'), $imagefotokost2);

            Kost::where('id', $kost->id)
                ->update([
                    'nama_kost' => $request->nama_kost,
                    'kategori_kost' => $request->kategori_kost,
                    'fasilitas' => $request->fasilitas,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                    'fotokost' => $imagefotokost,
                    'fotokost2' => $imagefotokost2
                ]);
        }
        elseif (!empty($request->file('fotokost3'))) {
            // unlink(public_path('images') . '/' . $kost->fotokost);
            $images = $request->file('fotokost');
            $imagefotokost = 'fotokost' . time() . '.' . $images->extension();
            $images->move(public_path('images'), $imagefotokost);

            if (!empty($request->file('fotokost2'))) {
                # code...
                // unlink(public_path('images') . '/' . $kost->fotokost2);
                $images = $request->file('fotokost2');
                $imagefotokost2 = 'fotokost2' . time() . '.' . $images->extension();
                $images->move(public_path('images'), $imagefotokost2);
            }

            // unlink(public_path('images') . '/' . $kost->fotokost3);
            $images = $request->file('fotokost3');
            $imagefotokost3 = 'fotokost3' . time() . '.' . $images->extension();
            $images->move(public_path('images'), $imagefotokost3);

            if ($request->file('fotokost2') == null) {
                Kost::where('id', $kost->id)
                    ->update([
                        'nama_kost' => $request->nama_kost,
                        'kategori_kost' => $request->kategori_kost,
                        'fasilitas' => $request->fasilitas,
                        'harga' => $request->harga,
                        'keterangan' => $request->keterangan,
                        'fotokost' => $imagefotokost,
                        'fotokost2' => $imagefotokost3
                    ]);
            }

            Kost::where('id', $kost->id)
                ->update([
                    'nama_kost' => $request->nama_kost,
                    'kategori_kost' => $request->kategori_kost,
                    'fasilitas' => $request->fasilitas,
                    'harga' => $request->harga,
                    'keterangan' => $request->keterangan,
                    'fotokost' => $imagefotokost,
                    'fotokost2' => $imagefotokost2,
                    'fotokost3' => $imagefotokost3
                ]);
        }
        Kost::where('id', $kost->id)
            ->update([
                'nama_kost' => $request->nama_kost,
                'kategori_kost' => $request->kategori_kost,
                'fasilitas' => $request->fasilitas,
                'harga' => $request->harga,
                'keterangan' => $request->keterangan,
            ]);

        return redirect('/kost')->with('toast_info', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Kost::findOrFail($id);
        // unlink(public_path('images') . '/' . $data->fotokost);
        $data->delete();
        return redirect('/kost')->with('toast_info', 'Data berhasil dihapus!');
    }


    public function edit_data(Kost $kost)
    {
        // dd($masyarakat);
        return view('beranda.edit', ['kost' => $kost]);
    }
}
