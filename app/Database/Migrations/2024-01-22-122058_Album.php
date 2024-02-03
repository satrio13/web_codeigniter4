<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Album extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_album' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'album' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'is_active' => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint' => '70',
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
            
        $this->forge->addKey('id_album', true);
        $this->forge->createTable('tb_album');
    }

    public function down()
    {
        $this->forge->dropTable('tb_album');
    }
}
