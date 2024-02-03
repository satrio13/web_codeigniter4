<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    public function berita_populer($slug)
    {
        return $this->db->table('tb_berita')->select('id,nama,gambar,dibaca,is_active,hari,updated_at,slug')->where('is_active', 1)->where('slug !=', $slug)->orderBy('dibaca','desc')->limit(3,0)->get()->getResult(); 
    }

    public function link_terkait()
    {
        return $this->db->table('tb_link')->select('*')->where('is_active', 1)->orderBy('id','desc')->get()->getResult(); 
    }

}