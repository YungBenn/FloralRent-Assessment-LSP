<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\KaranganBunga;
use App\Models\Kategori;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class KaranganbungaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karanganbunga = KaranganBunga::all();
        return view('course', [
            'title' => 'KaranganBunga',
            'karanganbunga' => $karanganbunga
        ]);
    }

    public function searchKaranganBunga()
    {
        $karanganbunga = KaranganBunga::latest();
        if(request('search')) {
            $karanganbunga->where('nama_karanganbunga', 'like', '%' . request('search') . '%');
        }

        return view('course', [
            'title' => 'KaranganBunga',
            'karanganbunga' => $karanganbunga->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $karanganbunga = KaranganBunga::all();
        $iduser = Auth::id();
        $profile = Profile::where('users_id', $iduser)->first();
        return view('karangan_bunga.tambah', ['karanganbunga' => $karanganbunga, 'profile' => $profile, 'kategori'=>$kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $gambar = explode('.', $request->file('gambar')->getClientOriginalName())[0];
        $gambar = $gambar . '-' . time() . '.' . $request->file('gambar')->extension();
        $request->gambar->move(public_path('asset/gambar'), $gambar);

        $karanganbunga = KaranganBunga::create([
            'nama_karanganbunga'=> $request->nama_karanganbunga,
            'kode_karanganbunga'=> $request->kode_karanganbunga,
            'deskripsi'=> $request->deskripsi,
            'pengirim'=> $request->pengirim,
            'gambar' => $gambar
        ]);
        $karanganbunga->kategori_karanganbunga()->sync($request->kategori);
     
        return redirect('/floralrent/karanganbunga');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    
    public function show(string $id)
    {
        $course = Course::with('guruternak')->where('id', $id)->firstOrFail();
        $courseother = Course::where('id', '!=', $id)->first();
        $username = $course->guruternak->username;
        if ($courseother) {
        return view ('course-detail', [
            'title' => 'Course Detail',
            'course' => $course,
            'username' => $username,
            'courseother' => $courseother
        ]);
    }else{
        return view ('course-detail', [
            'title' => 'Course Detail',
            'course' => $course,
            'username' => $username

        ]);
    }
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Course $course)
    {
        if ($request->price > 0 ) {
            Course::where('id', $course->id)
            ->update([
                'title'=> $request->title,
                'skillLevel'=> $request->skillLevel,
                'description'=> $request->description,
                'price'=> $request->price,
                'title' => $request->title,
                'video' => $request->video,
                'type' => "premium",
            ]);
            if ($request-> file('thumbnail')) {
                // image
                $thumbnail = explode('.', $request->file('thumbnail')->getClientOriginalName())[0];
                $thumbnail = $thumbnail . '-' . time() . '.' . $request->file('thumbnail')->extension();
                $request->thumbnail->move(public_path('asset/thumbnails'), $thumbnail);
                Course::where('id', $course->id)
                ->update([
                    'thumbnail' => $thumbnail
                ]);
            }
        } else {
            Course::where('id', $course->id)
            ->update([
                'title'=> $request->title,
                'skillLevel'=> $request->skillLevel,
                'description'=> $request->description,
                'price'=> $request->price,
                'title' => $request->title,
                'video' => $request->video,
                'type' => "free",
            ]);
            if ($request-> file('thumbnail')) 
            {
                // image
                $thumbnail = explode('.', $request->file('thumbnail')->getClientOriginalName())[0];
                $thumbnail = $thumbnail . '-' . time() . '.' . $request->file('thumbnail')->extension();
                $request->thumbnail->move(public_path('asset/thumbnails'), $thumbnail);
                Course::where('id', $course->id)
                ->update([
                    'thumbnail' => $thumbnail
                ]);
            }
        }
        return redirect('/admin/myclass');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $id)
    {
        Course::where('id', $id->id)->delete();

        return redirect('/admin/myclass');
    }
}