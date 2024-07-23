<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Mobil;
use App\Models\Booking;
use App\Models\history;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SewaController extends Controller
{
    public function index(){
        $T = DB::table('mobils')->where('status',true)->get();
        $AV = DB::table('mobils')->where('status',false)->get();
        return view('sewa.index',compact('T','AV'));
    }

    public function create($id){
        $client = User::findOrFail($id);
        $car = DB::table('mobils')->where('status',true)->get();
        return view('sewa.create',compact('client','car'));
    }

    public function keluar(Request $request,$id){
        $data_plat = explode("-",$request->mobil);
        $client_id = user::findOrFail($id);
        $mobil_id = Mobil::where('Nomor_plat',$data_plat[1])->first();

        if (!empty($request->tanggal_keluar)) {
            Booking::create([
                'client_id' => $client_id->client->id,
                'mobil_id' => $mobil_id->id,
                'name' => $request->name,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'mobil' => $data_plat[0],
                'tanggal_keluar' => $request->tanggal_keluar,
                'tanggal_masuk' => $request->tanggal_masuk,
                'nomor_plat' =>$data_plat[1]
            ]);
            history::create([
                'name'=>$request->name,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'mobil' => $data_plat[0],
                'plat' =>$data_plat[1],
                'tanggal_keluar' => $request->tanggal_keluar,
                'tanggal_masuk' => $request->tanggal_masuk,
                'status' => 'keluar'
            ]);
        } else {
            Booking::create([
                'client_id' => $client_id->client->id,
                'mobil_id' => $mobil_id->id,
                'name' => $request->name,
                'alamat' => $request->alamat,
                'telepon' => $request->telepon,
                'mobil' => $data_plat[0],
                'tanggal_keluar' => now()->format('Y-m-d'),
                'tanggal_masuk' => now()->format('Y-m-d'),
                'nomor_plat' =>$data_plat[1]
            ]);
        }
        DB::table('mobils')->where('Nomor_plat',$data_plat[1])->update(['status' => false]);
        return redirect('dashoard')->with('sukses','telah melakukan booking kendaraan,silahkan cek sewa berjalan');
    }

    public function pengembalian($id){
        if (!empty(Booking::where('client_id','=',$id)->first())) {
            $booking= Booking::where('client_id','=',$id)->first();
            return view('sewa.pengembalian',compact('booking'));
        } else {
            return redirect()->back();
        }

    }

    public function pengembalian_store(Request $request){
        $data_plat = explode("-",$request->mobil_masuk);
        $client_id = Booking::where('Nomor_plat','=',$data_plat[1])->select('client_id')->first();
        Pengembalian::create([
            'client_id' => $client_id->client_id,
            'name' => $request->name,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'mobil' => $data_plat[0],
            'tanggal_keluar' => $request->tanggal_keluar,
            'tanggal_masuk' => $request->tanggal_masuk,
            'nomor_plat' =>$data_plat[1],
            'tarif' => $request->tarif
        ]);
        history::create([
            'name'=>$request->name,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'mobil' => $data_plat[0],
            'plat' =>$data_plat[1],
            'tanggal_keluar' => $request->tanggal_keluar,
            'tanggal_masuk' => $request->tanggal_masuk,
            'status' => 'masuk'
        ]);
        DB::table('mobils')->where('Nomor_plat',$data_plat[1])->update(['status' => true]);
        $mobil_back = DB::table('bookings')->where('Nomor_plat',$data_plat[1])->delete();
        return redirect('dashoard')->with('sukses','telah melakukan pengembalian kendaraan');
    }
}
