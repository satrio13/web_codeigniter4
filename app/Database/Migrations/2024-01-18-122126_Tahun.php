<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Tahun extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_tahun' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'tahun' => [
                'type'       => 'VARCHAR',
                'constraint'     => 10,
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
        
        $this->forge->addKey('id_tahun', true);
        $this->forge->createTable('tb_tahun');
    }

    public function down()
    {
        $this->forge->dropTable('tb_tahun');
    }
}