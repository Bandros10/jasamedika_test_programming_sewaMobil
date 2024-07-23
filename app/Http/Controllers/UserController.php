<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        $id_user = auth()->user()->id;
        $user = DB::table('users')->join('clients','users.id','=','clients.user_id')->select('users.*','clients.*')->get();
        // dd($user);
        return view('user/index',compact('user'));
    }

    public function tambah(){
        return view('user.tambah');
    }

    public function create(Request $request){
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'email_verified_at' => now(),
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(10),
        ]);

        client::create([
            'telepon' => $request->telepon,
            'no_SIM' => $request->no_SIM,
            'alamat' => $request->alamat,
            'user_id' => $user->id
        ]);
        return redirect('/user')->with('sukses','data berhasil di tambah');
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('user.edit',compact('user'));
    }

    public function update(Request $request,$id){
        // if(!Hash::check($request->password, $id->password)){
        //     return back()->with("error", "Old Password Doesn't match!");
        // }
        $userupdate = User::findOrfail($id);
        $userupdate->update($request->all());
        $client = client::where('user_id','=',$userupdate->id)->first();
        $client->update([
            'telepon'=>$request->telepon,
            'no_SIM'=>$request->no_SIM,
            'alamat' =>$request->alamat
        ]);
        return redirect('user')->with('sukses','data berhasil di update');
    }

    public function delete($id){
        $userdelete = User::findOrfail($id);
        $userdelete->delete();
        return redirect()->back()->with('sukses','data berhasil di hapus');
        // $client = client::where('user_id','=',$userupdate->id)->first();
    }
}
