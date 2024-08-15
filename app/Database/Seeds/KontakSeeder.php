<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KontakSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'alamat'     => 'Jl. Sukamaju No. 1',
                'telepon'    => '081234567890',
                'email'      => 'kontak@sukamaju.com',
                'lokasi_map' => 'https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1%20Grafton%20Street,%20Dublin,%20Ireland+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed',
            ],
            // Tambahkan data dummy sesuai kebutuhan
        ];

        $this->db->table('kontak')->insertBatch($data);
    }
}

