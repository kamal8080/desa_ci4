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
            'jumlah_penduduk' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'laki_laki' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'perempuan' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'jumlah_kepala_keluarga' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'jumlah_rt' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'jumlah_rw' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'jumlah_sekolah' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'jumlah_puskesmas' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'jumlah_balaidesa' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'jumlah_tempat_ibadah' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'jumlah_pasar_desa' => [
                'type'       => 'INT',
                'constraint' => 11,
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
