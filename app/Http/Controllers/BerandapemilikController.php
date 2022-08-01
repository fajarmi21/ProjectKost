<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandapemilikController extends Controller
{
    public function index()
{
    return view('berandapemilik.index');
}
    public function update()
{
    return view('berandapemilik.inputprofil');
}
}
