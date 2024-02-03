<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Agenda extends Migration
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
            'nama_agenda' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'berapa_hari' => [
                'type'       => 'INT',
                'constraint' => '3',
            ],
            'tgl' => [
                'type'       => 'DATE',
            ],
            'tgl_mulai' => [
                'type'       => 'DATE',
            ],
            'tgl_selesai' => [
                'type' => 'DATE',
            ],
            'jam_mulai' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'jam_selesai' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
            ],
            'keterangan' => [
                'type' => 'TEXT',
            ],
            'tempat' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'gambar' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
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
        $this->forge->createTable('tb_agenda');
    }

    public function down()
    {
        $this->forge->dropTable('tb_agenda');
    }
}
