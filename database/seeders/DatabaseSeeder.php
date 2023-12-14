<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Guru;
use App\Models\Kategori;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'=> 'Admin',
            'email'=>'admin@gmail.com',
            'no_telp'=>'08123123123',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
        ]);

        User::create([
            'name'=> 'Ahmad',
            'email'=>'ahmad@gmail.com',
            'no_telp'=>'08123123123',
            'password' => Hash::make('ahmad123'),
            'role' => 'user',
        ]);

        User::create([
            'name'=> 'Adit',
            'email'=>'adit@gmail.com',
            'no_telp'=>'08123123123',
            'password' => Hash::make('adit123'),
            'role' => 'user',
        ]);
        
        User::create([
            'name'=> 'Budi',
            'email'=>'budi@gmail.com',
            'no_telp'=>'08123123123',
            'password' => Hash::make('budi123'),
            'role' => 'user',
        ]);

        Kategori::create([
            'nama'=>'Papan Bunga Berduka Cita',
        ]);
    
        Kategori::create([
            'nama'=>'Papan Bunga Ucapan Selamat',
        ]);
        
        Kategori::create([
            'nama'=>'Papan Bunga Ucapan Pernikahan',
        ]);
    }
}
