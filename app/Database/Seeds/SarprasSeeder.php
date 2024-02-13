<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SarprasSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id' => '1',
            'isi' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->table('tb_sarpras')->insert($data);
    }
}