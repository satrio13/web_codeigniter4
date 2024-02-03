<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Banner extends Migration
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
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
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
                'constraint' => '300',
            ],
            'button' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
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
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_banner');
    }

    public function down()
    {
        $this->forge->dropTable('tb_banner');
    }
}