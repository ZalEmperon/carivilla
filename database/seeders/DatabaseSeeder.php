<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Villa;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $imageSourceDir = database_path('seeders\\images');
        $fotoSliderImages = [
            'mawar1.jpg',
            'mawar2.jpg',
            'mawar3.jpg',
            'sentul1.jpg',
            'sentul2.jpg',
            'sentul3.jpg',
            'hijau1.jpg',
            'hijau2.jpg',
            'hijau3.jpg',
            'bambu1.jpg',
            'bambu2.jpg',
            'bambu3.jpg'
        ];
        $fasilitasImages = [
            'pool.jpg',
            'wifi.jpg',
            'kitchen.jpg',
            'bbq.jpg',
            'firepit.jpg',
            'mountain-view.jpg',
            'parking.jpg',
            'garden.jpg',
            'cookware.jpg',
            'bamboo-interior.jpg',
            'infinity-pool.jpg',
            'massage.jpg'
        ];
        foreach ($fotoSliderImages as $file) {
            File::copy($imageSourceDir . '\\' . $file, public_path('storage\\uploads\\villas\\' . $file));
        }

        foreach ($fasilitasImages as $file) {
            File::copy($imageSourceDir . '\\' . $file, public_path('storage\\uploads\\fasilitas\\' . $file));
        }
        $data = [
            [
                'nama' => 'Villa Mawar Lembang',
                'slug' => 'villa-mawar-lembang',
                'lokasi' => 'Lembang, Bandung',
                'harga_weekday' => 1500000,
                'harga_weekend' => 2000000,
                'nego_weekday' => true,
                'nego_weekend' => false,
                'kapasitas' => 10,
                'kamar_tidur' => 4,
                'kamar_mandi' => 3,
                'foto_slider' => ['mawar1.jpg', 'mawar2.jpg', 'mawar3.jpg'],
                'fasilitas' => [
                    ['nama' => 'Kolam Renang', 'foto' => 'pool.jpg'],
                    ['nama' => 'WiFi', 'foto' => 'wifi.jpg'],
                    ['nama' => 'Dapur', 'foto' => 'kitchen.jpg'],
                    ['nama' => 'Barbecue', 'foto' => 'bbq.jpg'],
                ],
                'map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d383.6517369638483!2d107.62485862517444!3d-6.8175389202421695!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e0e3af74d64b%3A0x3a12937213a8fd8f!2sVilla%20Nuansa%20Alam!5e1!3m2!1sen!2sus!4v1753699913708!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'nomor_wa' => '6281234567890',
            ],
            [
                'nama' => 'Villa Gunung Sentul',
                'slug' => 'villa-gunung-sentul',
                'lokasi' => 'Sentul, Bogor',
                'harga_weekday' => 1800000,
                'harga_weekend' => 2200000,
                'nego_weekday' => true,
                'nego_weekend' => true,
                'kapasitas' => 8,
                'kamar_tidur' => 4,
                'kamar_mandi' => 2,
                'foto_slider' => ['sentul1.jpg', 'sentul2.jpg', 'sentul3.jpg'],
                'fasilitas' => [
                    ['nama' => 'Pemandangan Pegunungan', 'foto' => 'mountain-view.jpg'],
                    ['nama' => 'Tempat Api Unggun', 'foto' => 'firepit.jpg'],
                    ['nama' => 'Parkir Luas', 'foto' => 'parking.jpg'],
                ],
                'map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24568.707033775572!2d106.83067917073114!3d-6.518306443655199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c110cc5bf807%3A0x103e7355c8f7ba3c!2sSentul%2C%20Babakan%20Madang%2C%20Bogor%20Regency%2C%20West%20Java%2C%20Indonesia!5e1!3m2!1sen!2sus!4v1753700333780!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'nomor_wa' => '628876543210',
            ],
            [
                'nama' => 'Villa Hijau Yogyakarta',
                'slug' => 'villa-hijau-yogyakarta',
                'lokasi' => 'Kasihan, Bantul',
                'harga_weekday' => 1200000,
                'harga_weekend' => 1700000,
                'nego_weekday' => true,
                'nego_weekend' => false,
                'kapasitas' => 5,
                'kamar_tidur' => 2,
                'kamar_mandi' => 1,
                'foto_slider' => ['hijau1.jpg', 'hijau2.jpg', 'hijau3.jpg'],
                'fasilitas' => [
                    ['nama' => 'Taman Luas', 'foto' => 'garden.jpg'],
                    ['nama' => 'Peralatan Masak', 'foto' => 'cookware.jpg'],
                ],
                'map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3062.135620491794!2d110.33529497368585!3d-7.845687677960703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a5751f087e275%3A0x4fba76cedd0446ee!2sKalipura%20Villa!5e1!3m2!1sen!2sus!4v1753700538893!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'nomor_wa' => '6289991112233',
            ],
            [
                'nama' => 'Villa Bambu Ubud',
                'slug' => 'villa-bambu-ubud',
                'lokasi' => 'Ubud, Bali',
                'harga_weekday' => 3000000,
                'harga_weekend' => 3500000,
                'nego_weekday' => false,
                'nego_weekend' => false,
                'kapasitas' => 4,
                'kamar_tidur' => 2,
                'kamar_mandi' => 2,
                'foto_slider' => ['bambu1.jpg', 'bambu2.jpg', 'bambu3.jpg'],
                'fasilitas' => [
                    ['nama' => 'Interior Bambu', 'foto' => 'bamboo-interior.jpg'],
                    ['nama' => 'Kolam Infinity', 'foto' => 'infinity-pool.jpg'],
                    ['nama' => 'Pijat Tradisional', 'foto' => 'massage.jpg'],
                ],
                'map_embed' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3057.4092170539093!2d115.25550317369722!3d-8.463332185564624!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd223e3db6095cf%3A0xc1f54555976a661!2sPuca%20gavi%20ubud!5e1!3m2!1sen!2sus!4v1753700687821!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
                'nomor_wa' => '6288123456789',
            ],
        ];
        foreach ($data as $villa) {
            \App\Models\Villa::create($villa);
        }
    }
}
