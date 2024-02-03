<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PrestasiSiswa extends Migration
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
                'constraint'     => 5,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint'     => 100,
            ],
            'prestasi' => [
                'type'       => 'VARCHAR',
                'constraint'     => 100,
            ],
            'nama_siswa' => [
                'type'       => 'VARCHAR',
                'constraint'     => 100,
            ],
            'kelas' => [
                'type'       => 'VARCHAR',
                'constraint'     => 6,
                'null' => TRUE,
            ],
            'tingkat' => [
                'type'       => 'INT',
                'constraint'     => 1,
            ],
            'jenis' => [
                'type'       => 'INT',
                'constraint'     => 1,
            ],
            'nama_siswa' => [
                'type'       => 'VARCHAR',
                'constraint'     => 100,
            ],
            'keterangan' => [
                'type'       => 'VARCHAR',
                'constraint'     => 100,
                'null' => TRUE,
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint'     => 250,
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
        $this->forge->createTable('tb_prestasi_siswa');
    }

    public function down()
    {
        $this->forge->dropTable('tb_prestasi_siswa');
    }
}