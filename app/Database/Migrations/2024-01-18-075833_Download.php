<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Download extends Migration
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
            'nama_file' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'file' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'hits' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'id_user' => [
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
        
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_download');
    }

    public function down()
    {
        $this->forge->dropTable('tb_download');
    }
}
