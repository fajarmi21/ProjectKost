<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\User;
use App\Models\Kost;
use App\Models\Fasilitas;
use App\Models\PFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role_id == '6') {
            $pembayaran = Pembayaran::where('user_id', Auth::user()->id)
                ->Where('status_bayar', '!=', 'Diterima(Booking)')->get();
            $ids = Pembayaran::where('user_id', Auth::user()->id)->latest('tenggat')->latest()->limit(1)->first();
            // dd($ids);
            return view('pembayaran.index', compact('pembayaran', 'ids'));
        } elseif (Auth::user()->role_id == '1') {
            $pembayaran = Pembayaran::where('status_bayar', 'Diterima')
                ->orWhere('status_bayar', 'Sudah Transfer')
                ->orwhere('status_bayar', 'Ditolak')
                ->orwhere('status_bayar', 'Menunggu Konfirmasi')->get();
            return view('pembayarans.index', ['pembayaran' => $pembayaran]);
        }
    }

    public function NotaPembayaran($id)
    {
        $no = random_int(100000, 999999);
        $nama = Auth::user()->name;
        $pembayaran = Pembayaran::join('kost', 'kost.id', '=', 'pembayaran.kost_id')
            ->where('pembayaran.id', $id)
            ->select('pembayaran.*', 'kost.nama_kost')->first();

        // $fasilitas = PFasilitas::join(fasilitas, 'fasilitas.id', '=', 'p_fasilitas.id_fasilitas')
        //     ->where('p_fasilitas.id_pembayaran', $id)
        //     ->select('p_fasilitas.id_pembayaran', 'fasilitas.fasilitas', 'fasilitas.harga')->get();
        // $cek = Pembayaran::find($id);
        // if (empty($cek->fas_id)) {
        //     $pembayaran = Pembayaran::join('kost','kost.id','=','pembayaran.kost_id')
        //     ->where('pembayaran.id',$cek->id)
        //     ->select('pembayaran.*', 'kost.nama_kost')->first();
        // } else {
        //     $pembayaran = Pembayaran::join('kost','kost.id','=','pembayaran.kost_id')
        //     ->join('fasilitas','fasilitas.id','=','pembayaran.fas_id')
        //     ->join('p_fasilitas', 'fasilitas.id', '=', 'pembayaran.fas_id')
        //     ->where('pembayaran.id',$cek->id)
        //     ->select('pembayaran.*', 'kost.nama_kost','fasilitas.fasilitas','fasilitas.harga')->first();
        // }
        $customPaper = array(0, 0, 155.90551181, 250.92913386);
        $pdf = PDF::loadview('pembayaran.cetak', ['no' => $no, 'nama' => $nama, 'pembayaran' => $pembayaran])->setPaper($customPaper, 'portrait');
        return $pdf->download('Nota Pembayaran ' . $nama . ' Bulan ' . $pembayaran->bulan . '.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $cek = Pembayaran::findorfail($id);
        if (empty($cek->fas_id)) {
            $Idfasilitas = [];
            $pembayaran =  DB::table('pembayaran')
                ->join('kost', 'kost.id', '=', 'pembayaran.kost_id')
                ->where('pembayaran.id', $cek->id)
                ->select('pembayaran.*', 'kost.nama_kost', 'kost.harga as kharga')->first();
            $fasilitas = Fasilitas::all();
            $user = User::all();
            $kost = Kost::all();
            return view('pembayaran.create', compact('user', 'pembayaran', 'kost', 'fasilitas', 'Idfasilitas'));
        } else {
            $Idfasilitas = [];
            $pembayaran =  DB::table('pembayaran')
                ->join('fasilitas', 'fasilitas.id', '=', 'pembayaran.fas_id')
                ->join('kost', 'kost.id', '=', 'pembayaran.kost_id')
                ->where('pembayaran.id', $cek->id)
                ->select('pembayaran.*', 'fasilitas.harga', 'fasilitas.fasilitas', 'kost.nama_kost', 'kost.harga as kharga')->first();
            $fasilitas = Fasilitas::all();
            $user = User::all();
            $kost = Kost::all();
            foreach (listsFasilitas($pembayaran->tgl_bayar) as $key) {
                $Idfasilitas[] = $key->fas_id;
            }
            return view('pembayaran.create', compact('user', 'pembayaran', 'kost', 'fasilitas', 'Idfasilitas'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fas = $request->fas;
        for ($i = 0; $i < $request->bulan; $i++) {
            Carbon::useMonthsOverflow(false);
            $pembayaran = new Pembayaran;
            $pembayaran->user_id = $request->user_id;
            $pembayaran->kost_id = $request->kost_id;
            $pembayaran->nama_penyewa = $request->nama_penyewa;
            $pembayaran->tgl_masuk = $request->tgl_masuk;
            $pembayaran->tgl_booking = $request->tgl_booking;
            $pembayaran->status_bayar = "Menunggu Konfirmasi";
            $pembayaran->tgl_bayar = Carbon::now()->toDateTimeString();
            $pembayaran->bulan = Carbon::now()->addMonth($i)->isoFormat('MM');
            $pembayaran->save();
            foreach ($fas as $key => $value) {
                if ($value != "0") {
                    $idx[] = PFasilitas::insertGetId([
                        'id_pembayaran' => $pembayaran->id,
                        'id_fasilitas' => $key
                    ]);
                    $fas[$key] -= 1;
                }
            }
        }
        // if (empty($input['fas_id'])) {
        //     $pembayaran = new Pembayaran;
        //     $pembayaran->user_id = $request->user_id;
        //     $pembayaran->kost_id = $request->kost_id;
        //     $pembayaran->nama_penyewa = $request->nama_penyewa;
        //     $pembayaran->tgl_masuk = $request->tgl_masuk;
        //     $pembayaran->tgl_booking = $request->tgl_booking;
        //     $pembayaran->status_bayar = "Menunggu Konfirmasi";
        //     $pembayaran->tgl_bayar = Carbon::now()->toDateString();
        //     $pembayaran->save();
        //     $pembayaran->id;
        // } else {
        //     $ids = Pembayaran::insertGetId($request->except(['fas_id', '_token', 'tenggat', 'bukti', 'tgl_bayar']) + [
        //         'status_bayar' => 'Menunggu Konfirmasi',
        //         'tgl_bayar' => Carbon::now()->toDateString(),
        //         'created_at' => Carbon::now()->toDateTimeString()
        //     ]);
        //     for($i = 0; $i < count($input['fas_id']); $i++){
        //         $idx[] = PFasilitas::insertGetId([
        //             'id_pembayaran' => $ids,
        //             'id_fasilitas' => $input['fas_id'][$i]
        //         ]);
        //     }
        // }
        // dd('x');
        $pembayaran = Pembayaran::where(['user_id' => $request->user_id, 'status_bayar' => 'Menunggu Konfirmasi'])->groupBy('user_id')->select('pembayaran.*', DB::raw('group_concat(pembayaran.bulan) as bulan'))->first();
        return redirect()->route('pembayaran.showBln', ['id' => $pembayaran, 'bln' => $request->mp])->with('toast_success', 'Segera Lakukan Pembayaran!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function show($id, $bln = null)
    {
        if (Auth::user()->role_id == '6') {
            $cek = Pembayaran::find($id);
            if ($bln != null) {
                $pembayaran = DB::table('pembayaran')
                    ->select('nama_kost', 'harga', 'nama_penyewa', 'status_bayar', 'bukti')
                    ->selectRaw('substring_index(group_concat(pembayaran.id SEPARATOR ", "), ", ", ?) as id', [$bln])
                    ->selectRaw('substring_index(group_concat(pembayaran.bulan SEPARATOR ", "), ", ", ?) as bulan', [$bln])
                    ->join('kost', 'kost.id', '=', 'pembayaran.kost_id')
                    ->where('status_bayar', 'Menunggu Konfirmasi')
                    ->where('user_id', $cek->user_id)
                    ->first();
                // dd($pembayaran);
            } else{
                $pembayaran = Pembayaran::join('kost', 'kost.id', '=', 'pembayaran.kost_id')
                    ->where('pembayaran.id', $cek->id)
                    ->select('pembayaran.*', 'kost.nama_kost', 'kost.harga')->first();
                // $pembayaran = Pembayaran::join('kost', 'kost.id', '=', 'pembayaran.kost_id')
                //     ->join('fasilitas', 'fasilitas.id', '=', 'pembayaran.fas_id')
                //     ->where('pembayaran.id', $cek->id)
                //     ->select('pembayaran.*', 'kost.nama_kost', 'fasilitas.fasilitas', 'fasilitas.harga')->first();
            }
            return view('pembayaran.show', compact('pembayaran', 'cek'));
        } elseif (Auth::user()->role_id == '1') {
            $cek = Pembayaran::find($id);
            $pembayaran = Pembayaran::join('kost', 'kost.id', '=', 'pembayaran.kost_id')
            ->where('pembayaran.id', $cek->id)
            ->select('pembayaran.*', 'kost.nama_kost', 'kost.harga')->first();
            return view('pembayaran.show', compact('pembayaran', 'cek'));
        }
    }

    public function showbulan($bln)
    {
        $pembayaran = Pembayaran::where('bulan', $bln)->paginate();
        return view('pembayarans.bulan', compact('pembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembayaran = Pembayaran::join('fasilitas', 'fasilitas.id', '=', 'pembayaran.fas_id')
            ->where('pembayaran.id', $id)
            ->select('pembayaran.*', 'fasilitas.fasilitas', 'fasilitas.harga')->first();
        $user = User::all();
        $fasilitas = Fasilitas::all();
        return view('pembayaran.edit', ['pembayaran' => $pembayaran, 'user' => $user, 'fasilitas' => $fasilitas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Pembayaran::where('id', $id)
            ->update([
                'nama_penyewa' => $request->nama_penyewa,
                'tgl_bayar' => $request->tgl_bayar,
                'bulan' => $request->bulan,
                'fas_id' => $request->fasilitas

            ]);

        return redirect('/pembayaran')->with('toast_info', 'Data berhasil diubah!');
    }

    public function konfirmasi(Request $request, $id)
    {
        $images = $request->file('bukti');
        $imagebukti = 'bukti' . time() . '.' . $images->extension();
        $images->move(public_path('images'), $imagebukti);

        foreach (explode(',', $id) as $key => $value) {
            Pembayaran::where('id', $value)
            ->update([
                'bukti' => $imagebukti,
                'status_bayar' => $request->status

            ]);
        }
        return redirect('/pembayaran')->with('toast_info', 'Berhasil Melakukan Pembayaran!!');
    }

    public function konfirmasiadmin(Request $request, $id)
    {
        Carbon::useMonthsOverflow(false);
        if ($request->status == 'Ditolak') {
            Pembayaran::where('id', $id)
                ->update([
                    'status_bayar' => $request->status
                ]);
            return redirect('/pembayaran')->with('toast_danger', 'Pembayaran Ditolak!');
        } elseif ($request->status == 'Diterima(Booking)') {
            Pembayaran::where('id', $id)
                ->update([
                    'status_bayar' => $request->status
                ]);
            return redirect('/booking')->with('toast_success', 'Booking Diterima!');
        } elseif ($request->status == 'Ditolak(Booking)') {
            Pembayaran::where('id', $id)
                ->update([
                    'status_bayar' => $request->status
                ]);
            return redirect('/booking')->with('toast_danger', 'Booking Ditolak!');
        } else {
            $tgl_bayar = Carbon::now();
            Pembayaran::where('id', $id)
                ->update([
                    'status_bayar' => $request->status,
                    'tgl_bayar' => $tgl_bayar->toDateTimeString(),
                    // 'bulan' => $tgl_bayar->isoFormat('MMMM'),
                    'tenggat' => $tgl_bayar->month($request->bulan)->addMonth()->toDateTimeString()
                ]);
            return redirect('/pembayaran')->with('toast_success', 'Pembayaran Diterima!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembayaran  $pembayaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembayaran $pembayaran)
    {
        unlink(public_path('images') . '/' . $pembayaran->bukti);

        Pembayaran::destroy($pembayaran->id);

        return redirect('/pembayaran');
    }
    public function edit_data(Pembayaran $pembayaran)
    {
        // dd($penyewa);
        return view('beranda.edit', ['pembayaran' => $pembayaran]);
    }
}
