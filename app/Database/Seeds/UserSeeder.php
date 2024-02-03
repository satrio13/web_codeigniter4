<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            'id_user' => '1',
            'nama' => 'admin',
            'username' => 'admin',
            'password' => password_hash('123456', PASSWORD_BCRYPT),
            'email' => 'admin@gmail.com',
            'username' => 'admin',
            'level' => 'superadmin',
            'is_active' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->table('tb_user')->insert($data);
    }
}