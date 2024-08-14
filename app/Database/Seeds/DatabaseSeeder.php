<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call('BeritaSeeder');
        $this->call('KontakSeeder');
        $this->call('PemberitahuanSeeder');
        $this->call('PendudukSeeder');
        $this->call('UsersSeeder');
        $this->call('DesaProfilesSeeder');
    }
}

