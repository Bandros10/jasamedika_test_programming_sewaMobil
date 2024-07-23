<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index(){
        $mobil = Mobil::all();
        return view('mobil.index',compact('mobil'));
    }

    public function tambah(){
        return view('mobil.tambah');
    }

    public function create(Request $request){
        $mobilCreate = Mobil::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('foto/',$request->file('foto')->getClientOriginalName());
            $mobilCreate->foto = $request->file('foto')->getClientOriginalName();
            $mobilCreate->save();
        }
        return redirect('/mobil')->with('sukses','data berhasil di tambah');
    }

    public function edit($id){
        $mobil = Mobil::findOrFail($id);
        return view('mobil.edit',compact('mobil'));
    }

    public function update(Request $request,$id){
        $mobilupdate = mobil::findOrFail($id);
        $mobilupdate->update($request->all());
        return redirect('/mobil')->with('sukses','data berhasil di update');
    }

    public function delete($id){
        $mobildelete = Mobil::findOrFail($id);
        $mobildelete->delete();
        return redirect()->back()->with('sukses','data mobil berhasil di hapus');
    }
}
