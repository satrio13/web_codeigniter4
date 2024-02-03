<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class RekapUN extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_un' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_kurikulum' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'tertinggi' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'terendah' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'rata' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'id_tahun' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null'       => true,
            ]
        ]);
            
        $this->forge->addKey('id_un', true);
        $this->forge->createTable('tb_rekap_un');
    }

    public function down()
    {
        $this->forge->dropTable('tb_rekap_un');
    }
}
