<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\KaranganBunga;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use App\Models\Penyewaan;

class PenyewaanController extends Controller
{
    public function create()
    {
        // $iduser = Auth::id();
        $karanganbunga = KaranganBunga::where('status','In Stock')->get();
        $user = User::all();

        return view('admin.addpenyewaan',[
            'title'=>'Tambah Penyewaan',
            'user'=>$user,
            'karanganbunga'=>$karanganbunga,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'users_id'=>'required',
                'karanganbunga_id'=>'required'
            ],
            [
                'users_id.required'=> 'Harap Masukan Nama Peminjam',
                'karanganbunga_id.required'=> 'Masukan karangan bunga yang akan disewa'
            ]
        );
        $request['tanggal_sewa'] = Carbon::now()->toDateString();
        $request['tanggal_wajib_kembali'] = Carbon::now()->addDay(5)->toDateString();

        $karanganbunga = KaranganBunga::findOrFail($request->karanganbunga_id)->only('status');

        $count = Penyewaan::where('users_id', $request->users_id)->where('tanggal_pengembalian', null)->count();

        if($count > 2) {
            Alert::warning('Gagal', 'User telah mencapai limit untuk menyewa karangan bunga');
            return redirect('/guruternak/addpenyewaan');
        }
        else {
            try {
                DB::beginTransaction();
                // Proses insert tabel riwayat_pinjam
                Penyewaan::create($request->all());
                // Proses update tabel buku
                $karanganbunga = KaranganBunga::findOrFail($request->karanganbunga_id);
                $karanganbunga->status = 'disewa';
                $karanganbunga->save();
                DB::commit();

                Alert::success('Berhasil', 'Berhasil Menyewa Karangan Bunga');
                return redirect('/guruternak/inbox');
            } catch (\Throwable $th) {
                DB::rollback();
                Log::error('Error in PenyewaanController@store: ' . $th->getMessage());
                return redirect('/guruternak/addpenyewaan')->with('error', 'Something went wrong: ' . $th->getMessage());
            }
        }
    }
}
