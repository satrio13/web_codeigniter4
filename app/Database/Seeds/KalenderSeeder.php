<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KalenderSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id' => '1',
            'kalender' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->table('tb_kalender')->insert($data);
    }
}