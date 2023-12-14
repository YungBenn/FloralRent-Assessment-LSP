<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Laravel\Sanctum\HasApiTokens;
class Kategori extends Model
{
    use HasFactory;

    protected $table = "kategori";
    protected $fillable =[
        'nama'
    ];

    public function kategori_karangan_bunga()
    {
        return $this->belongsToMany(KaranganBunga::class,'kategori_karangan_bunga','kategori_id','karanganbunga_id');
    }

}
