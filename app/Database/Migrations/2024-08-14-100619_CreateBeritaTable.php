<?php 

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBeritaTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_berita' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'judul_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'slug_berita' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'isi_berita' => [
                'type' => 'MEDIUMTEXT',
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
        ]);
        $this->forge->addKey('id_berita', true);
        $this->forge->createTable('berita');
    }

    public function down()
    {
        $this->forge->dropTable('berita');
    }
}
