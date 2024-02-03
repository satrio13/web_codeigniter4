<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProfilSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'id' => '1',
            'nama_web' => 'MAN 3 KEBUMEN',
            'jenjang' => '4',
            'logo_web' => '',
            'logo_admin' => '',
            'favicon' => '',
            'meta_description' => 'Selamat datang di website MAN 3 KEBUMEN',
            'meta_keyword' => 'MAN 3 KEBUMEN',
            'profil' => '',
            'alamat' => 'Jalan Pencil Nomor 47, Kutowinangun, Kec. Kebumen, Kabupaten Kebumen, Jawa Tengah 54393',
            'email' => 'mankutowinangun@kemenag.go.id',
            'telp' => '(0287) 661119',
            'fax' => '-',
            'whatsapp' => '',
            'akreditasi' => 'A',
            'kurikulum' => 'Kurikulum 2013',
            'file' => '',
            'nama_kepsek' => '-',
            'nama_operator' => '-',
            'instagram' => 'https://www.instagram.com/man3kebumen/',
            'facebook' => 'https://web.facebook.com/man3kebumen/',
            'twitter' => ' ',
            'youtube' => 'https://www.youtube.com/channel/UC_gRTrFE-s6ox-NeaLIC9LA',
            'gambar' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->db->table('tb_profil')->insert($data);
    }
}