<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Video extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_video' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'judul' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'link' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
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
            
        $this->forge->addKey('id_video', true);
        $this->forge->createTable('tb_video');
    }

    public function down()
    {
        $this->forge->dropTable('tb_video');
    }
}