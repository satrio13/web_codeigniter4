<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Sejarah extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'isi' => [
                'type'       => 'TEXT',
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
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_sejarah');
    }

    public function down()
    {
        $this->forge->dropTable('tb_sejarah');
    }
}
