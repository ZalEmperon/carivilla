<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Villa;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Villa::factory()->create([
            'nama' => "",
            'slug' => "",
            'lokasi' => "",
            'harga_weekday' => "",
            'harga_weekend' => "",
            'nego_weekday' => "",
            'nego_weekend' => "",
            'kapasitas' => "",
            'kamar_tidur' => "",
            'kamar_mandi' => "",
            'foto_slider' => "",
            'fasilitas' => "",
            'map_embed' => "",
            'nomor_wa' => "",
            'nego_weekday' => "",
            'nego_weekend' => "",
            'foto_slider' => "",
            'fasilitas' => "",
        ]);
    }
}
