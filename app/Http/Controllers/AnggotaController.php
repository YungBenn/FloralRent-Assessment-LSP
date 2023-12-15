<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('admin.anggota-tampil', [
            'user' => $user,
            'title' => 'Anggota'
        ]);
    }
    
    public function create()
    {
        return view('admin.anggota-tambah', [
            'title' => 'Tambah Anggota'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'=> 'required|min:3|max:255',
            'email'=> 'required|max:255',
            'no_telp'=> 'required|max:20',
            'role'=> 'required|max:20',
            'password'=> 'required|min:5|max:255'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        User::create($validated)->id;
     
        return redirect('/admin/anggota');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);     
        return view('admin.anggota-edit', [
            'user' => $user,
            'title' => 'Edit User'
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $request->validate(
            [
                'name' => 'required',
                'email' => 'required',
                'no_telp' => 'required',
                'role' => 'required',
                'password' => 'required',
            ]
        );

        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_telp = $request->no_telp;
        $user->role = $request->role;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect("/admin/anggota")->with('success', 'Anggota updated successfully');
    }

    public function delete(User $id){
        User::where('id', $id->id)->delete();

        return redirect("/admin/anggota")->with('success', 'Anggota deleted successfully');
    }
}
