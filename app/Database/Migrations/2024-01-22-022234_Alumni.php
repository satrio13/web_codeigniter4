<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Alumni extends Migration
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
            'id_tahun' => [
                'type'       => 'INT',
                'constraint' => '5',
            ],
            'jml_l' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'jml_p' => [
                'type'       => 'INT',
                'constraint' => '11',
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
        $this->forge->createTable('tb_alumni');
    }

    public function down()
    {
        $this->forge->dropTable('tb_alumni');
    }
}
