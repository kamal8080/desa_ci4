<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PemberitahuanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul' => 'Pemberitahuan Pertama',
                'slug'  => 'pemberitahuan-pertama',
                'isi'   => 'Ini adalah isi pemberitahuan pertama.',
            ],
            [
                'judul' => 'Pemberitahuan Kedua',
                'slug'  => 'pemberitahuan-kedua',
                'isi'   => 'Ini adalah isi pemberitahuan kedua.',
            ],
            // Tambahkan data dummy sesuai kebutuhan
        ];

        $this->db->table('pemberitahuan')->insertBatch($data);
    }
}
