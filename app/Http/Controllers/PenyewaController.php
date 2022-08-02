<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kost;
use App\Models\Penyewa;
use App\Models\Pembayaran;
use App\Models\Role_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenyewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyewa = Penyewa::all();
        $kamar = DB::select('SELECT tabungans.id, tabungans.saldo_tabungan, users.nama, users.email, users.id as idn
            FROM users
					 LEFT JOIN tabungans ON tabungans.id_nasabah = users.id
                        WHERE users.id_level = "1"
												GROUP BY users.nama
						UNION 
						SELECT t1.id, t1.saldo_tabungan, u.nama, u.email, u.id as idn
            FROM tabungans t1
            INNER JOIN
            (
                SELECT max(created_at) created, id_nasabah
                FROM tabungans
                GROUP BY id_nasabah
            ) t2
            ON t1.id_nasabah = t2.id_nasabah
						JOIN users u ON t1.id_nasabah = u.id
            AND u.id_level = "1"
            GROUP BY t1.id_nasabah');
        return view('penyewa.index', ['penyewa'=>$penyewa,'kamar'=>$kamar]);
    }

    public function pengunjung()
    {
        $penyewa = User::all();

        return view('halamanutama.pengunjung', ['penyewa'=>$penyewa]);
    }

    public function indexpengunjung()
    {
        $pengunjung = User::join('penyewa','penyewa.user_id','=','users.id')
        ->where('role_id','4')
        ->select('users.*','penyewa.alamat')->get();
        return view('penyewa.indexpengunjung',compact('pengunjung'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();

        return view('penyewa.create', ['user'=>$user]);
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

        $penyewa = new Penyewa;
        $penyewa->user_id = $request->user_id;
        $penyewa->ktp = $imageKTP;
        $penyewa->jenis_kelamin = $request->jk;
        $penyewa->alamat = $request->alamat;
        $penyewa->no_hp = $request->telp;
        $penyewa->tgl_lahir = $request->tgl_lahir;

        $penyewa->save();

        return redirect('/')->with('toast_success', 'Berhasil Mendaftar! Tunggu konfirmasi Admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show = Penyewa::where('user_id',$id)->first();
        $user = User::where('id',$id)->first();
        return view('penyewa.show', ['show' => $show,'user' => $user]);
    }

    public function konfirmasi(Request $request, $id)
    {
        User::where('id', $id)
            ->update([
                'role_id' => $request->role
            ]);
        Penyewa::where('user_id', $id)
            ->update([
                'status' => 'belum'
            ]);
        return redirect('/indexpengunjung')->with('success', 'Data berhasil diubah!!');
    }


    public function persyaratan()
    {
        $penyewa = Auth::user()->id;

        $data = Penyewa::where('user_id', $penyewa)->first();
// dd($datas);
        return view('beranda.updateprofil', ['penyewa'=>$data]);
    }

    public function updateprofil(Request $request)
    {
        $images = $request->file('ktp');
        $imageKTP = 'ktp'.time().'.'.$images->extension();
        $images->move(public_path('images'),$imageKTP);

        $penyewa = new Penyewa();

        $penyewa->user_id = $request->user_id;
        $penyewa->ktp = $imageKTP;
        $penyewa->jenis_kelamin = $request->jenis_kelamin;
        $penyewa->alamat = $request->alamat;
        $penyewa->no_hp = $request->no_hp;
        $penyewa->tgl_lahir = $request->tgl_lahir;

        $penyewa->save();

        return redirect('/updateprofil')->with('success', 'Data berhasil dikirim!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyewa $penyewa)
    {
        $user = User::all();

        return view('penyewa.edit',['penyewa'=>$penyewa, 'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyewa $penyewa)
    {
        if(!empty($request->file('ktp')))
        {
            unlink(public_path('images').'/'.$penyewa->ktp);
            $images = $request->file('ktp');
            $imageKTP = 'ktp'.time().'.'.$images->extension();
            $images->move(public_path('images'),$imageKTP);

            Penyewa::where('id', $penyewa->id)
            ->update([
            'user_id' =>$request->user_id,
            'ktp' =>$imageKTP,
            'jenis_kelamin' =>$request->jenis_kelamin,
            'alamat' =>$request->alamat,
            'no_hp' =>$request->no_hp,
            'tgl_lahir' =>$request->tgl_lahir
            ]);
        }
            Penyewa::where('id', $penyewa->id)
            ->update([
            'user_id' => $request->user_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'tgl_lahir' => $request->tgl_lahir
        ]);

        return redirect('/penyewa')->with('toast_info', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyewa  $penyewa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = Penyewa::where('user_id', $id)->first();
        if ($ids->status == 'sewa') {
            $cek = Pembayaran::where('user_id', $ids->user_id)->latest()->limit(1)->first();
            Kost::where('id', $cek->kost_id)
            ->update([
            'statuskost' => 'Tersedia'
            ]);
            Penyewa::where('user_id', $id)
            ->update([
                'status' => 'belum'
            ]);
            return redirect('/penyewa')->with('toast_danger', 'Data berhasil dihapus!');
        } else {
            $ids->delete();
            return redirect()->back()->with('toast_danger', 'Data berhasil dihapus!');
        }
    }

    public function edit_data(Penyewa $penyewa){
        // dd($penyewa);
        return view('beranda.edit', ['penyewa'=>$penyewa]);
    }
}
