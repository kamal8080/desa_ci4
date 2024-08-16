<?php 

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePendudukTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nik' => [
                'type'       => 'CHAR',
                'constraint' => 16,
                'unique'     => true,
            ],
            'no_kk' => [
                'type'       => 'CHAR',
                'constraint' => 16,
            ],
            'nama_ayah' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_ibu' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'alamat' => [
                'type'       => 'TEXT',
            ],
            'dusun' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'rw' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
            ],
            'rt' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
            ],
            'umur' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'pekerjaan' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'jenis_kelamin' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'null'       => true,
            ],
            'agama' => [
                'type'       => 'VARCHAR',
                'constraint' => 20,
                'null'       => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('penduduk');
    }

    public function down()
    {
        $this->forge->dropTable('penduduk');
    }
}
