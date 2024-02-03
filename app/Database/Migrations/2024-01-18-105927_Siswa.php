<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Siswa extends Migration
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
                'constraint'     => 3,
            ],
            'jml1pa' => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
            'jml1pi' => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
            'jml2pa' => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
            'jml2pi' => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
            'jml3pa' => [
                'type'       => 'INT',
                'constraint'     => 5,
            ],
            'jml3pi' => [
                'type'       => 'INT',
                'constraint'     => 5,
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
        $this->forge->createTable('tb_siswa');
    }

    public function down()
    {
        $this->forge->dropTable('tb_siswa');
    }
}