<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Pengumuman extends Migration
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
            'isi' => [
                'type'       => 'TEXT',
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
            ],
            'dibaca' => [
                'type' => 'INT',
                'constraint' => '11',
            ],
            'id_user' => [
                'type' => 'INT',
                'constraint' => '5',
            ],
            'is_active' => [
                'type' => 'INT',
                'constraint' => '1',
            ],            
            'hari' => [
                'type' => 'VARCHAR',
                'constraint' => '10',
            ],
            'tgl' => [
                'type'       => 'DATE',
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
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
        $this->forge->createTable('tb_pengumuman');
    }

    public function down()
    {
        $this->forge->dropTable('tb_pengumuman');
    }
}
