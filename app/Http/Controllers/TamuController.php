<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_tamu;
use App\M_tamu_inap;
use App\M_subscribe;
use App\Exports\TamuExport;
use Maatwebsite\Excel\Facades\Excel;

class TamuController extends Controller
{
    
    public function index(){
        $data_tamu = M_tamu::all();
        return view('admin.data-tamu',['alls'=>$data_tamu]);
    }

    public function kirim(Request $request){

        // dd($request);
        $post = new M_tamu();
        $post->nama = $request->nama;
        $post->check_in = $request->check_in;
        $post->check_out = $request->check_out;
        $post->pekerjaan = $request->pekerjaan;
        $post->alamat = $request->alamat;
        $post->no_hp = $request->no_hp;

        $post->save();
        return view('tamu/success');
    }

    public function kirim_no(Request $request){

        //fungsi save untuk menyimpan request
        $post = new M_subscribe();
        $post->no = $request->no;
        $post->save();
        return view('tamu/success');

    }

    public function filterTanggal(Request $request){

        // dd($request);

        $tanggal_awal = $request->tanggal1;
        $tanggal_akhir = $request->tanggal2;
        $data_tamu = M_tamu::whereDate('created_at','>=',$tanggal_awal)->whereDate('created_at','<=',$tanggal_akhir)->get();

        return view('admin.data-tamu',['alls'=>$data_tamu]);
        
    }

    public function indexAdmin(){
        $yesterday = date("Y-m-d", strtotime( '-1 days' ) );

        $tamu_hari_ini = M_tamu_inap::whereDate('created_at', date('Y-m-d'))->get()->count();
        $tamu_kemarin = M_tamu_inap::whereDate('created_at', $yesterday)->get()->count();
        $tamu_bulan_ini = M_tamu_inap::whereMonth('created_at', date('m'))->get()->count();
        $tamu_total = M_tamu_inap::all()->count();

        // pengambilnan data alamat untuk menampilkan pada chart
        $data_alamat = \DB::table('data_tamu_inap') // menggunakan data table disamping
             ->select(\DB::raw('count(alamat) as jumlah, alamat')) // mengambil data alamat dan menjumlah alamat yg ada pada table
             ->groupBy('alamat') // dengan melakukan pengklarifikasi / dijadikan per grup per alamat sehingga data alamat yg sama akat menjadi 1 data
             ->get();

        // dd($query);
        return view('admin/beranda')->with(compact('tamu_hari_ini', 'tamu_kemarin', 'tamu_bulan_ini', 'tamu_total', 'data_alamat'));
    }

    public function exportTamu(){
        return Excel::download(new TamuExport, 'List Tamu.xlsx');
    }

}
