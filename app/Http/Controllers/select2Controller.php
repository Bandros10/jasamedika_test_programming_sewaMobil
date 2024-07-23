<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class select2Controller extends Controller
{
    public function mobilSelect(){
        $mobil = DB::table('mobils')->where('status',true)->select('mobils.*')->get();
        return response()->json($mobil);
    }

    public function mobilmasuk(){
        $databoking = auth()->user()->client->id;
        $mobil_masuk = DB::table('bookings')->where('client_id',$databoking)->select('mobil','nomor_plat')->get();
        return response()->json($mobil_masuk);
    }

    public function tarif($plat){
        $infocarbook = DB::table('mobils')->leftJoin('bookings','mobils.id','=','bookings.mobil_id')->where('mobils.Nomor_plat','=',$plat)->first();
        return response()->json($infocarbook);
    }
}
