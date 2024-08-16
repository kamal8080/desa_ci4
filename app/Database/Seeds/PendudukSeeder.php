<?php 
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory as Faker;

class PendudukSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID'); 
        $data = [];
        $jenis_kelamin = ['Laki-laki', 'Perempuan'];
        $agama = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha', 'Konghucu'];

        for ($i = 0; $i < 20000; $i++) {
            $data[] = [
                'nama'        => $faker->firstName,
                'nik'         => $faker->nik,
                'no_kk'       => $faker->numerify('################'),
                'nama_ayah'   => $faker->firstNameMale,
                'nama_ibu'    => $faker->firstNameFemale,
                'alamat'      => $faker->address,
                'dusun'       => $faker->randomElement(['Dusun Melati', 'Dusun Anggrek', 'Dusun Mawar', 'Dusun Dahlia']),
                'rw'          => $faker->numberBetween(1, 10),
                'rt'          => $faker->numberBetween(1, 20),
                'umur'        => $faker->numberBetween(1, 80),
                'pekerjaan'   => $faker->jobTitle,
                'jenis_kelamin' => $faker->randomElement($jenis_kelamin),
                'agama'       => $faker->randomElement($agama),
            ];
        }

        $this->db->table('penduduk')->insertBatch($data);
    }
}
