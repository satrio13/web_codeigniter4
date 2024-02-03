<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ekstrakurikuler extends Migration
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
            'nama_ekstrakurikuler' => [
                'type'       => 'VARCHAR',
                'constraint'     => '100',
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint'     => '200',
            ],
            'keterangan' => [
                'type'       => 'TEXT',
            ],
            'slug' => [
                'type'       => 'VARCHAR',
                'constraint'     => '120',
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
        $this->forge->createTable('tb_ekstrakurikuler');
    }

    public function down()
    {
        $this->forge->dropTable('tb_ekstrakurikuler');
    }
}