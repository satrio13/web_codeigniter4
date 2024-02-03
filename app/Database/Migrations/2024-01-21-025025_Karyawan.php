<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Karyawan extends Migration
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
            'nip' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
            ],
            'duk' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'niplama' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
            ],
            'nuptk' => [
                'type'       => 'VARCHAR',
                'constraint' => '25',
            ],
            'nokarpeg' => [
                'type'       => 'VARCHAR',
                'constraint' => '12',
            ],
            'golruang' => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'statuspeg' => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tmp_lahir' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'tgl_lahir' => [
                'type'       => 'DATE',
            ],
            'tmt_cpns' => [
                'type'       => 'DATE',
            ],
            'tmt_pns' => [
                'type'       => 'DATE',
            ],
            'jk' => [
                'type'       => 'CHAR',
                'constraint' => '1',
            ],
            'agama' => [
                'type'       => 'CHAR',
                'constraint' => '1',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'pt' => [
                'type'       => 'VARCHAR',
                'constraint' => '60',
                'null' => TRUE
            ],
            'tingkat_pt' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'prodi' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'th_lulus' => [
                'type'       => 'VARCHAR',
                'constraint' => '4',
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'tugas' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
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
        $this->forge->createTable('tb_karyawan');
    }

    public function down()
    {
        $this->forge->dropTable('tb_karyawan');
    }
}