<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class KaranganBunga extends Model
{
    use HasFactory;

    protected $table = "karanganbunga";
    protected $fillable = [
        'kode_karanganbunga',
        'nama_karanganbunga',
        'deskripsi',
        'pengirim',
        'gambar'
    ];

    /**
     * The roles that belong to the Buku
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function kategori_karanganbunga():BelongsToMany
    {
        return $this->belongsToMany(Kategori::class, 'kategori_karanganbunga', 'karanganbunga_id', 'kategori_id');
    }
}