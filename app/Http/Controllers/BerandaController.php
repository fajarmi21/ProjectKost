<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        return view('beranda.index');
    }
    public function profil($id)
    {
        $user = User::join('roles', 'roles.id', '=', 'users.role_id')
            ->where('users.id', $id)
            ->select('users.*', 'roles.display_name')->first();
        return view('beranda.profil', ['user' => $user]);
    }
    public function password($id)
    {
        $user = User::findOrFail($id);
        return view('beranda.gantipass', ['user' => $user]);
    }
    public function gantipassword(Request $request, $id)
    {
        User::where('id', $id)
            ->update(['password' => Hash::make($request->password)]);
        Auth::logout();
        return redirect('/login')->with('toast_succes', 'Password Anda telah diperbarui!');
    }
}
