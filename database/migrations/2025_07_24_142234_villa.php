<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('villas', function (Blueprint $table) {
            $table->id(); 
            $table->string('nama'); 
            $table->string('slug')->unique(); 
            $table->string('lokasi');
            $table->integer('harga_weekday');
            $table->integer('harga_weekend');
            $table->boolean('nego_weekday'); 
            $table->boolean('nego_weekend'); 
            $table->integer('kapasitas'); 
            $table->integer('kamar_tidur'); 
            $table->integer('kamar_mandi'); 
            $table->json('foto_slider'); 
            $table->json('fasilitas'); 
            $table->text('map_embed'); 
            $table->string('nomor_wa', 20); 
            $table->timestamps(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('villas');
    }
};