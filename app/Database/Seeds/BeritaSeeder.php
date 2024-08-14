<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul_berita' => 'Berita Pertama',
                'slug_berita'  => 'berita-pertama',
                'isi_berita'   => 'Ini adalah isi berita pertama.',
                'gambar'       => 'gambar1.jpg',
            ],
            [
                'judul_berita' => 'Berita Kedua',
                'slug_berita'  => 'berita-kedua',
                'isi_berita'   => 'Ini adalah isi berita kedua.',
                'gambar'       => 'gambar2.jpg',
            ],
            // Tambahkan data dummy sesuai kebutuhan
        ];

        // Menggunakan Query Builder untuk insert data
        $this->db->table('berita')->insertBatch($data);
    }
}
