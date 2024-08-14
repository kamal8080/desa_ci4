<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'     => 'Admin',
                'email'    => 'admin@example.com',
                'password' => password_hash('admin', PASSWORD_BCRYPT),
                'level'    => 1,
            ],
            [
                'nama'     => 'User',
                'email'    => 'user@example.com',
                'password' => password_hash('user', PASSWORD_BCRYPT),
                'level'    => 2,
            ],
            // Tambahkan data dummy sesuai kebutuhan
        ];

        $this->db->table('users')->insertBatch($data);
    }
}

