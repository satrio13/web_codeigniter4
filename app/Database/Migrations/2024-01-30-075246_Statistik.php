<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Statistik extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'ip' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'tanggal' => [
                'type'       => 'DATE',
            ],
            'hits' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'online' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ]
        ]);
            
        $this->forge->createTable('tb_statistik');
    }

    public function down()
    {
        $this->forge->dropTable('tb_statistik');
    }
}
