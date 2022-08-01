<?php

namespace App\Http\Controllers;

use App\Models\Penyewa;
use App\Models\Pemilik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kost;
use App\Models\Pembayaran;
use App\Models\Seleksi;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role_id == '6') {
            $pembayaran = Pembayaran::where('user_id', Auth::user()->id)
            ->whereNotIn('status_bayar', ['Menunggu Konfirmasi', 'Sudah Transfer'])
            ->orderBy('id', 'DESC')
            ->first();
            return view('beranda.index', ['pembayaran' => $pembayaran]);
        } elseif (Auth::user()->role_id == '5') {
            $penyewa = Penyewa::where('status', 'sewa')->count();
            $pengunjung = Penyewa::where('status', 'belum')->count();
            $kost = Kost::count();
            return view('berandapemilik.index',compact('penyewa','pengunjung','kost'));
        } elseif (Auth::user()->role_id == '1') {
            $penyewa = Penyewa::where('status', 'sewa')->count();
            $pengunjung = Penyewa::where('status', 'belum')->count();
            $kost = Kost::count();
            return view('berandapemilik.index',compact('penyewa','pengunjung','kost'));
        }
    }
    public function seleksi()
    {
        $seleksi = Seleksi::where('keputusan', 0)->paginate(5);
        return view('seleksi.index', ['seleksi' => $seleksi]);
    }
    public function lolos()
    {
        $seleksi = Seleksi::where('keputusan', 2)->paginate(5);
        return view('seleksi.lolos_seleksi', ['seleksi' => $seleksi]);
    }
    public function tidak_lolos()
    {
        $seleksi = Seleksi::where('keputusan', 1)->paginate(5);
        return view('seleksi.tidak_lolos_seleksi', ['seleksi' => $seleksi]);
    }
    public function seleksi_detail(Seleksi $seleksi)
    {
        return view('seleksi.show', ['seleksi' => $seleksi]);
    }
}
