<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\KaranganBunga;
use App\Models\Kategori;
use App\Models\Penyewaan;
use App\Models\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $iduser = Auth::id();
        $penyewaan = Penyewaan::with(['user','karangan_bunga'])->orderBy('updated_at','desc')->get();
        $penyewaanUser = Penyewaan::where('users_id',$iduser)->get();
        $user = User::all();
        return view('admin/guru-myinbox-polosan',[
            'title' => 'My Inbox Order',
            'penyewaan'=>$penyewaan,
            'penyewaanUser'=>$penyewaanUser,
            'user'=> $user
        ]);
    }

    public function displaykaranganbunga(){
        $karanganbunga = KaranganBunga::all();
        return view('admin/karanganbunga-tampil', [
            'karanganbunga' => $karanganbunga,
            'title' => 'Display Karangan Bunga'
        ]);
    }


    public function tambahkaranganbunga(){
        $kategori = Kategori::all();
        $karanganbunga = KaranganBunga::all();
        return view('admin/karanganbunga-tambah', [
            'karanganbunga' => $karanganbunga,
            'kategori'=>$kategori,
            'title' => 'Tambah Karangan Bunga'
        ]);
    }

    public function editkaranganbunga($id){
        $karanganbunga = KaranganBunga::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin/karanganbunga-edit', [
            'karanganbunga' => $karanganbunga,
            'kategori' => $kategori,
            'title' => 'Edit Karangan Bunga'
        ]);
    }

    public function updatekaranganbunga(Request $request, $id){
        $karanganbunga = KaranganBunga::find($id);
        // $kategori= Kategori::find($id);
        $request->validate(
            [
                'nama_karanganbunga' => 'nullable',
                'kode_karanganbunga' => 'nullable',
                'deskripsi' => 'nullable',
                'pengirim' => 'nullable',
                'gambar' => 'nullable|mimes:jpg,jpeg,png|max:2048',
            ]
        );

        if ($request->file('gambar')) {
            $gambar = explode('.', $request->file('gambar')->getClientOriginalName())[0];
            $gambar = $gambar . '-' . time() . '.' . $request->file('gambar')->extension();
            $request->gambar->move(public_path('asset/gambar'), $gambar);
            $karanganbunga->gambar = $gambar;
        }
        $karanganbunga->nama_karanganbunga = $request->nama_karanganbunga;
        $karanganbunga->kode_karanganbunga = $request->kode_karanganbunga;
        $karanganbunga->deskripsi = $request->deskripsi;
        $karanganbunga->pengirim = $request->pengirim;
        $karanganbunga->kategori_karanganbunga()->sync($request->kategori);
        $karanganbunga->save();

        return redirect("/floralrent/karanganbunga")->with('success', 'Karangan Bunga updated successfully');
    }

    public function deletekaranganbunga(KaranganBunga $id){
        KaranganBunga::where('id', $id->id)->delete();

        return redirect("/floralrent/karanganbunga")->with('success', 'Karangan Bunga deleted successfully');
    }

    public function setting(){
        return view('admin/setting-guru', [
            'title' => 'Setting Profile'
        ]);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @param  \App\Models\Guru  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->password == null) {
            User::where('id', $user->id)->update(
                [
                    'name' => $request->name,
                    'no_telp' => $request->no_telp,
                ]
            );
            $request->session()->flash('success', 'data berhasil diubah gan');
        } else {
            $validated = $request->validate([
                'password' => 'required|min:5'
            ]);

            User::where('id', $user->id)->update([
                'name' => $request->name,
                'no_telp' => $request->no_telp,
                'password' => Hash::make($validated['password'])
            ]);
            $request->session()->flash('success', 'data berhasil diubah gan');
        }

        return redirect("/admin/setting");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @param  \App\Models\Guru  $user
     * @return \Illuminate\Http\Response
     */

    public function update_status(Request $request, Order $order){
        $order->update([
            'status' => $request->status
        ]);
        $request->session()->flash('success', 'data berhasil diubah gan');
        return redirect("/admin/inbox");
    }

    // public function update_status2(Request $request, Order $order){
    //     $order->update([
    //         'status' => 'Rejected'
    //     ]);
    //     $request->session()->flash('success', 'data berhasil diubah gan');
    //     return redirect("/gurutani/inbox");
    // }


    // public function authenticate(Request $request){
    //     $credentials= $request->validate([
    //         'username'=>'required',
    //         'password'=>'required'
    //     ]);

    //     if(Auth::guard('gurutani')->attempt($credentials)){
    //         $request->session()->regenerate();
    //         return redirect()->intended('/');
    //     }

    //     return back()->with('loginError', 'Login gagal, gan!'); 
    // }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        // withOutCookie()
        return redirect('/');
    }
    // login guru
}