<?php 

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateDesaProfilesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'nama_desa' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'tentang_desa' => [
                'type' => 'TEXT',
            ],
            'visi' => [
                'type' => 'TEXT',
            ],
            'misi' => [
                'type' => 'TEXT',
            ],
            'gambar_desa' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
                'default'    => null,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('desa_profiles');
    }

    public function down()
    {
        $this->forge->dropTable('desa_profiles');
    }
}
