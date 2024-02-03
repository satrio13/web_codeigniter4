<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Isialumni extends Migration
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
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'th_lulus' => [
                'type'       => 'VARCHAR',
                'constraint' => '4',
            ],
            'sma' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],          
            'pt' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'instansi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamatins' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'hp' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'kesan' => [
                'type'       => 'TEXT',
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'status' => [
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
        $this->forge->createTable('tb_isialumni');
    }

    public function down()
    {
        $this->forge->dropTable('tb_isialumni');
    }
}
