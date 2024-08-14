<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class PendudukSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'jumlah_penduduk' => 5000,
                'laki_laki'       => 2500,
                'perempuan'       => 2500,
                'jumlah_kepala_keluarga' => 1000,
                'jumlah_rt'       => 50,
                'jumlah_rw'       => 10,
                'jumlah_sekolah'  => 5,
                'jumlah_puskesmas'=> 1,
                'jumlah_balaidesa'=> 1,
                'jumlah_tempat_ibadah' => 3,
                'jumlah_pasar_desa' => 1,
            ],
            // Tambahkan data dummy sesuai kebutuhan
        ];

        // Menggunakan insertBatch untuk beberapa data
        $this->db->table('penduduk')->insertBatch($data);
    }
}


