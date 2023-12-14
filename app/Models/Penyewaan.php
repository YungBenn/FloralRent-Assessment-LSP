<?php

namespace App\Models;

use App\Models\KaranganBunga;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penyewaan extends Model
{
    use HasFactory;

    protected $table = "penyewaan";

    protected $fillable = [
        'users_id',
        'karanganbunga_id',
        'tanggal_sewa',
        'tanggal_wajib_kembali',
        'tanggal_pengembalian',
        'denda'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
    
    public function karangan_bunga() {
        return $this->belongsTo(KaranganBunga::class, 'karanganbunga_id', 'id');
    }
}