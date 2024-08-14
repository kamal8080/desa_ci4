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
                'lokasi_map' => '<iframe src="https://maps.google.com"></iframe>',
            ],
            [
                'alamat'     => 'Jl. Mekarjaya No. 2',
                'telepon'    => '081234567891',
                'email'      => 'kontak@mekarjaya.com',
                'lokasi_map' => '<iframe src="https://maps.google.com"></iframe>',
            ],
            // Tambahkan data dummy sesuai kebutuhan
        ];

        $this->db->table('kontak')->insertBatch($data);
    }
}

