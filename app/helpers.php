<?php

use App\Models\Pembayaran;
use App\Models\Fasilitas;
use App\Models\PFasilitas;
use Illuminate\Support\Facades\DB;

function listFasilitas($tgl_booking)
{
    $data = Pembayaran::join('fasilitas', 'fasilitas.id', '=', 'pembayaran.fas_id')
        ->where('pembayaran.tgl_booking', $tgl_booking)
        ->select('pembayaran.*', 'fasilitas.fasilitas', 'fasilitas.harga')->get();
    return $data;
}

function listsFasilitas($tgl_bayar)
{
    $data = Pembayaran::join('fasilitas', 'fasilitas.id', '=', 'pembayaran.fas_id')
        ->where('pembayaran.tgl_bayar', $tgl_bayar)
        ->select('pembayaran.*', 'fasilitas.fasilitas', 'fasilitas.harga')->get();
    return $data;
}

function getFasilitas($id_pembayaran)
{
    $data = Pembayaran::join('p_fasilitas', 'p_fasilitas.id_pembayaran', '=', 'pembayaran.id')
        ->join('fasilitas', 'fasilitas.id', '=', 'p_fasilitas.id_fasilitas')
        ->where('pembayaran.id', $id_pembayaran)
        ->select('pembayaran.*', 'fasilitas.fasilitas', 'fasilitas.harga')->get();
    return $data;
}

function getsFasilitas($id_pembayaran)
{
    $data = PFasilitas::join('fasilitas', 'fasilitas.id', '=', 'p_fasilitas.id_fasilitas')
        ->where('p_fasilitas.id_pembayaran', $id_pembayaran)
        ->select('p_fasilitas.id_pembayaran', 'fasilitas.fasilitas', 'fasilitas.harga')->get();
    return $data;
}

function getMFasilitas($id_pembayaran)
{
    $data = DB::select('SELECT GROUP_CONCAT(fasilitas.fasilitas, ":", cnt, ":", fasilitas.harga) cnt
    FROM (
        SELECT id_fasilitas, COUNT(*) cnt
        FROM p_fasilitas
            WHERE p_fasilitas.id_pembayaran IN (' . $id_pembayaran . ')
        GROUP BY id_fasilitas
    ) p_fasilitas
    JOIN fasilitas ON p_fasilitas.id_fasilitas = fasilitas.id')[0];
    return $data;
}

function status($status_bayar)
{
    $list = collect(['Sudah Transfer(Booking)', 'Ditolak(Booking)', 'Booking']);
    // $list->contains($status_bayar);
    $data = Pembayaran::where('status_bayar', $list->contains($status_bayar))->first();
    return $data;
}
