<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('karanganbunga', function (Blueprint $table) {
            $table->id();
            $table->string('kode_karanganbunga')->unique();
            $table->string('nama_karanganbunga');
            $table->string('deskripsi');
            $table->string('pengirim');
            $table->string('gambar')->nullable();
            $table->string('status')->default('In Stock');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karanganbunga');
    }
};
