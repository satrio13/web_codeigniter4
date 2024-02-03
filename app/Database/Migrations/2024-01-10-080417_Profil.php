<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Profil extends Migration
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
            'nama_web' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'jenjang' => [
                'type'       => 'INT',
                'constraint' => '1',
            ],
            'logo_web' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'logo_admin' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'favicon' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'meta_description' => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
            ],
            'meta_keyword' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'profil' => [
                'type'       => 'TEXT',
            ],
            'alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '300',
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'telp' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'fax' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'whatsapp' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
            ],
            'akreditasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '5',
            ],
            'kurikulum' => [
                'type'       => 'VARCHAR',
                'constraint' => '30',
            ],
            'file' => [
                'type'       => 'VARCHAR',
                'constraint' => '250',
            ],
            'nama_kepsek' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'nama_operator' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'instagram' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'facebook' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'twitter' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'youtube' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
            ],
            'gambar' => [
                'type'       => 'VARCHAR',
                'constraint' => '200',
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
        $this->forge->createTable('tb_profil');
    }

    public function down()
    {
        $this->forge->dropTable('tb_profil');
    }
}