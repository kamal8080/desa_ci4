<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DesaProfilesSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_desa'   => 'Desa Sukamaju',
                'tentang_desa' => 'Desa Sukamaju adalah desa yang terletak di daerah pedesaan dengan pemandangan indah.',
                'visi'        => 'Menjadi desa maju yang mandiri.',
                'misi'        => '["Meningkatkan kualitas hidup masyarakat","Mendorong pertumbuhan ekonomi desa","Mendorong pertumbuhan ekonomi desa","Meningkatkan kualitas hidup masyarakat","Meningkatkan kualitas hidup masyarakat","Meningkatkan kualitas hidup masyarakat","Meningkatkan kualitas hidup masyarakat","Meningkatkan kualitas hidup masyarakat"]',
                'gambar_desa' => 'sukamaju.jpg',
            ],
            // Tambahkan data dummy sesuai kebutuhan
        ];

        $this->db->table('desa_profiles')->insertBatch($data);
    }
}

