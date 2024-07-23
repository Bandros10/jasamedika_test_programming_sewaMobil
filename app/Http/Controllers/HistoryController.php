<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\history;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index(){
        $data_keluar = history::where('status','=','keluar')->get();
        $data_kembali = history::where('status','=','masuk')->get();
        return view('history.all_data',compact('data_keluar','data_kembali'));
    }
}
