<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('user.index', ['user'=> $user]);
    }
    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();
        return redirect('user')->with('success','Berhasil Menghapus Data User');
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt('12345678'),
            'role_id' => '1'
        ]);
        $user->remember_token = Str::random(60);
        $user->save();
        return redirect('/user')->with('success','Berhasil Menambah Data User');
    }
    public function search(Request $request){

        $cari = $request->cari;

        $user = User::where('name', 'like', "%".$cari."%")->paginate(5);

        session()->flashInput($request->input());

        return view('user.index', ['user' => $user]);
    }
}
