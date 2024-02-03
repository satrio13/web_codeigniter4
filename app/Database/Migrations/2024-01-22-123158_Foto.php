<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Foto extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_foto' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'id_album' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'foto' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
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
            
        $this->forge->addKey('id_foto', true);
        $this->forge->createTable('tb_foto');
    }

    public function down()
    {
        $this->forge->dropTable('tb_foto');
    }
}