<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori-tampil', [
            'kategori' => $kategori,
            'title' => 'Kategori'
        ]);
    }
    
    public function create()
    {
        return view('admin.admin-addkategori', [
            'title' => 'Tambah Kategori'
        ]);
    }

    public function store(Request $request)
    {
        Kategori::create([
            'nama'=> $request->nama,
        ]);
     
        return redirect('/admin/kategori');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);     
        return view('admin.kategori-edit', [
            'kategori' => $kategori,
            'title' => 'Edit Kategori'
        ]);
    }
    
    public function update(Request $request, $id)
    {
        $kategori = Kategori::find($id);
        $request->validate(
            [
                'nama' => 'required',
            ]
        );

        $kategori->nama = $request->nama;
        $kategori->save();

        return redirect("/admin/kategori")->with('success', 'Kategori updated successfully');
    }

    public function delete(Kategori $id){
        Kategori::where('id', $id->id)->delete();

        return redirect("/admin/kategori")->with('success', 'Kategori Bunga deleted successfully');
    }
}
