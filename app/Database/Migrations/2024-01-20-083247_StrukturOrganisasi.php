<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class StrukturOrganisasi extends Migration
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
            'isi' => [
                'type'       => 'TEXT',
                'constraint'     => '400',
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
        $this->forge->createTable('tb_struktur_organisasi');
    }

    public function down()
    {
        $this->forge->dropTable('tb_struktur_organisasi');
    }
}