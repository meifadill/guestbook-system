<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\M_tamu_inap;
use App\M_subscribe;
//ini untuk memanggil file tamu inap
use App\Exports\TamuInapExport;
use Maatwebsite\Excel\Facades\Excel;

class TamuInapController extends Controller
{
    
    public function index(){
        $data_tamu_inap = M_tamu_inap::all();
        return view('admin.data-tamu-inap',['alls'=>$data_tamu_inap]);
    }

    public function simpan(Request $request){

        // dd($request->subscribe);
        $post = new M_tamu_inap();
        $post->nama = $request->nama;
        $post->check_in = $request->check_in;
        $post->check_out = $request->check_out;
        $post->pekerjaan = $request->pekerjaan;
        $post->alamat = $request->alamat;
        $post->alamat_lengkap = $request->alamat_lengkap;
        $post->no_hp = $request->no_hp;
        $post->save();

        // save nomor juga ke broadcast
        // cari nomor sudah pernah daftar apa belum
        // cek apakah tamu menginginkan pesan broadcast, jika cekbox tidak dicentang maka akan mengirimkan value null
        if ($request->subscribe != null) { // jadi jika dicentang maka value tidak bernilai null, lalu jalankan perintah bawahnya untuk proses menyimpan data nomer
            $cekNomor = M_subscribe::where('no', $request->no_hp)->first();
            if(!$cekNomor){
                $simpan = new M_subscribe();
                $simpan->no = $request->no_hp;
                $simpan->nama = $request->nama;
                $simpan->save();
            }
        }
        

        return redirect()->back();        
    }

    public function edit(Request $request){

        // dd($request);
        M_tamu_inap::where('id_tamu',$request->id_tamu)
        ->update([
           'nama' => $request->nama,
           'check_in' => $request->check_in,
           'check_out' => $request->check_out,
           'pekerjaan' => $request->pekerjaan,
           'alamat' => $request->alamat,
           'alamat_lengkap' => $request->alamat_lengkap,
           'no_hp' => $request->no_hp
         ]);

        return redirect()->back();

    }

    public function filterTanggal(Request $request){

        // dd($request);

        $tanggal_awal = $request->tanggal1;
        $tanggal_akhir = $request->tanggal2;
        $data_tamu_inap = M_tamu_inap::whereDate('created_at','>=',$tanggal_awal)->whereDate('created_at','<=',$tanggal_akhir)->get();

        return view('admin.data-tamu-inap',['alls'=>$data_tamu_inap]);
        
    }
    //fungsi ekspor memanggil file tamuinapeksport pada folder eksport dan hasil downloadnya akan bernama list tamu reservasi
    public function exportTamuInap(){
        return Excel::download(new TamuInapExport, 'List Tamu Reservasi.xlsx');
    }

    public function deleteTamuInap($id)
    {
        M_tamu_inap::where('id_tamu',$id)->delete();
        return redirect()->back();
    }

}
