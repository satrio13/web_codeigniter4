<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kalender extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 1,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kalender' => [
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
            
        $this->forge->addKey('id', true);
        $this->forge->createTable('tb_kalender');
    }

    public function down()
    {
        $this->forge->dropTable('tb_kalender');
    }
}
