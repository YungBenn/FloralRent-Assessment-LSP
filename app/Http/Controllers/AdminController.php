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
        // $order = Penyewaan::where('guruTernak_id', auth()->user()->id)->get();
        // $user = User::all();
        // return view('admin/guru-myinbox-polosan', [
        //     'title' => 'My Inbox Order',
        //     // 'order'=> $order,
        //     'user'=> $user
        // ]);

        $iduser = Auth::id();
        // $profile = Profile::where('users_id',$iduser)->first();
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
        $karanganBunga = KaranganBunga::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin/karanganbunga-edit', [
            'karanganBunga' => $karanganBunga,
            'kategori' => $kategori,
            'title' => 'Edit Karangan Bunga'
        ]);
    }

    public function updatekaranganbunga(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'category' => 'required|exists:kategoris,id',
            // Add validation rules for other fields if needed
        ]);
        $karanganBunga = KaranganBunga::findOrFail($id);
        $karanganBunga->update([
            'name' => $request->name,
            'kategori_id' => $request->category,
            // Update other fields as needed
        ]);
        return redirect("/floralrent/karanganbunga")->with('success', 'Karangan Bunga updated successfully');
    }



    public function setting(){
        return view('admin/setting-guru', [
            'title' => 'Setting Profile'
        ]);
    }


    // login guru
    public function loginGuru(){
        return view('admin/login-guru', [
            'title' => 'Login Guru Ternak'
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
    // public function update(Request $request, User $user)
    // {
    //     if($request->password==null){
    //         User::where('id', $user->id)->update(
    //             [   
    //                 'username'=>$request->username,
    //             ]
    //             );
    //         Gurutani::where('id', $user->id)->update(
    //             [   
    //                 'username'=>$request->username,
    //             ]
    //             );
    //     $request->session()->flash('success', 'data berhasil diubah gan');

    //     } else {
    //         User::where('id', $user->id)->update(
    //             [   
    //                 'username'=>$request->username,
    //                 'password'=>$request->password
    //             ]
    //             );
    //         Gurutani::where('id', $user->id)->update(
    //             [   
    //                 'username'=>$request->username,
    //                 'password'=>$request->password
    //             ]
    //             );
    //     $request->session()->flash('success', 'data berhasil diubah gan');
            
    //     }

    //     return redirect("/gurutani/setting");
    // }

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
        return redirect("/guruternak/inbox");
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