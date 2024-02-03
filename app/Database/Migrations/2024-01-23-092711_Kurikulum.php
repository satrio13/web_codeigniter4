<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kurikulum extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kurikulum' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'mapel' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'alokasi' => [
                'type'       => 'int',
                'constraint' => '5',
            ],
            'kelompok' => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'no_urut' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'is_active' => [
                'type'       => 'INT',
                'constraint' => '1',
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
            
        $this->forge->addKey('id_kurikulum', true);
        $this->forge->createTable('tb_kurikulum');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kurikulum');
    }
}