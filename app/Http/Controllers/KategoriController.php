<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
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
     
        return redirect('/guruternak/inbox');
    }
}
