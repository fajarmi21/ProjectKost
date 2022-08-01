<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Kost;
use App\Models\Fasilitas;
use App\Models\Pembayaran;
use App\Models\Penyewa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use PDF;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $booking = Pembayaran::where('status_bayar', 'Diterima(Booking)')
            ->orWhere('status_bayar', 'Sudah Transfer(Booking)')
            ->orwhere('status_bayar', 'Ditolak(Booking)')
            ->orwhere('status_bayar', 'Booking')->get();
            return view('booking.index', ['booking' => $booking]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $kost = Kost::where('id', $id)->first();
        $fasilitas = Fasilitas::all();
        return view('booking.create', ['kost' => $kost, 'fasilitas' => $fasilitas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        // $images = $request->file('bukti_dp');
        // $imagebukti_dp = 'bukti_dp' . time() . '.' . $images->extension();
        // $images->move(public_path('images'), $imagebukti_dp);

        Kost::where('id', $id)
            ->update([
                'statuskost' => $request->statuskost
            ]);
        Penyewa::where('user_id', Auth::user()->id)
            ->update([
                'status' => 'sewa'
            ]);
        $input = $request->all();
        if (empty($input['fas_id'])) {
            $pembayaran = new Pembayaran;
            $pembayaran->user_id = $request->user_id;
            $pembayaran->kost_id = $request->kost_id;
            $pembayaran->nama_penyewa = $request->nama_penyewa;
            $pembayaran->tgl_masuk = $request->tgl_masuk;
            $pembayaran->tgl_booking = $request->tgl_booking;
            $pembayaran->status_bayar = $request->status_bayar;
            $pembayaran->tgl_bayar = $request->tgl_booking;
            $pembayaran->save();
            $pembayaran->id;
        } else {
            for($i = 0; $i < count($input['fas_id']); $i++){
                $ids[] = Pembayaran::insertGetId($request->except(['fas_id','_token','statuskost'])+[
                    'fas_id' => $input['fas_id'][$i],
                    'tgl_bayar' => $request->tgl_booking
                ]);
            }
            $pembayaran = Pembayaran::whereIn('id', $ids)->first();
        }
        return redirect()->route('booking.show', $pembayaran  )->with('toast_success', 'Terima Kasih telah melakukan pemesanan dirumah kost Bu Tik!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
            $cek = Pembayaran::findorfail($id);
            if (empty($cek->fas_id)) {
                $pembayaran = Pembayaran::join('kost','kost.id','=','pembayaran.kost_id')
                ->where('pembayaran.id',$cek->id)
                ->select('pembayaran.*', 'kost.nama_kost')->first();
            } else {
                $pembayaran = Pembayaran::join('kost','kost.id','=','pembayaran.kost_id')
                ->join('fasilitas','fasilitas.id','=','pembayaran.fas_id')
                ->where('pembayaran.id',$cek->id)
                ->select('pembayaran.*', 'kost.nama_kost','fasilitas.fasilitas','fasilitas.harga')->first();
            }
            return view('booking.show', compact('pembayaran','cek'));
    }
    public function NotaBooking(Request $request, $id)
    {
        $no = random_int(100000, 999999);
        $nama = Auth::user()->name;
        $kost = Kost::where('id',$id)->select('kost.nama_kost')->first();
        $customPaper = array(0, 0,127.55905512,155.90551181);
        $pdf = PDF::loadview('booking.cetak',['no' => $no, 'nama' => $nama,'kost' => $kost])->setPaper($customPaper,'portrait');
        return $pdf->download('Nota-Booking-'.$nama.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kost = Kost::where('id', $id)->first();
        $booking = Booking::where('id', $id)->first();
        return view('booking.edit', ['booking' => $booking, 'kost' => $kost]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {

        Booking::where('id', $booking->id)
            ->update([
                'user_id' => Auth::user()->id,
                'kost_id' => $request->kost_id,
                'nama_penyewa' => $request->nama_penyewa,
                'tgl_masuk' => $request->tgl_masuk,
                'tgl_booking' => $request->tgl_booking
            ]);

        return redirect('/booking')->with('success', 'Data berhasil diubah!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        Booking::destroy($booking->id);

        return redirect('/booking');
    }
}
