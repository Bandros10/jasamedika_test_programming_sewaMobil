<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboarController extends Controller
{
    public function index(){
        $Tersedia = DB::table('mobils')->where('status',true)->get();
        $mobil_keluar = DB::table('mobils')->where('status',false)->get();
        $data_client = DB::table('clients')->get();
        return view('dashboard.index',compact('Tersedia','mobil_keluar','data_client'));
    }

    public function index_keluar($id){
        $data_all_keluar = DB::table('mobils')->join('bookings','mobils.id','=','bookings.mobil_id')->where('client_id','=',$id)->select('mobils.*','bookings.*')->get();
        return view('dashboard.keluar_index',compact('data_all_keluar'));
    }

    public function index_masuk($id){
        $data_all_masuk = DB::table('pengembalians')->where('client_id',$id)->select('pengembalians.*')->get();
        // dd($databook_masuk);
        return view('dashboard.masuk_index',compact('data_all_masuk'));
    }
}
