<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\Penyewaan;
use App\Models\KaranganBunga;

class PengembalianController extends Controller
{
    public function index(){
        $karanganbunga = KaranganBunga::where('status', 'disewa')->get();
        $user = User::all();
        $penyewaanUserIds = Penyewaan::where('tanggal_pengembalian', null)->pluck('users_id');
        $penyewa = User::whereIn('id', $penyewaanUserIds)->get();
    
        return view('admin.pengembalian',[
            'title'=>'Pengembalian',
            'penyewa'=>$penyewa,
            'user'=>$user,
            'karanganbunga'=>$karanganbunga,
        ]);
    }

    public function store(Request $request ){
        $penyewaan = Penyewaan::where('users_id', $request->users_id)
            ->where('karanganbunga_id',$request->karanganbunga_id)
            ->where('tanggal_pengembalian', null);
        $dataPenyewaan = $penyewaan->first();
        // $count = $penyewaan->count();

        // if($count == 1){
            try {
                DB::beginTransaction();
                //update data tanggal pengembalian
                $dataPenyewaan->tanggal_pengembalian = Carbon::now()->toDateString();

                if (Carbon::parse($dataPenyewaan->tanggal_pengembalian)->gt(Carbon::parse($dataPenyewaan->tanggal_wajib_kembali))) {
                    $dataPenyewaan->denda = "10000";
                }
                else {
                    $dataPenyewaan->denda = "0";
                    $dataPenyewaan->save();
                    //update status buku
                    $karanganbunga = KaranganBunga::findOrFail($request->karanganbunga_id);
                    $karanganbunga->status = 'In Stock';
                    
                    $karanganbunga->save();
                    DB::commit();
                    Alert::success('Berhasil', 'Berhasil Mengembalikan Karangan Bunga');
                    return redirect('/admin/inbox');
                }

            } catch (\Throwable $th) {
                DB::rollback();
                Log::error('Error in pengembalian@pengembalian: ' . $th->getMessage());
            }
        // }
        // else {
        //     Alert::warning('Gagal', 'Karangan bunga yang disewa salah atau tidak ada');
        //     return redirect('/admin/pengembalian');
        // }

    }

}
