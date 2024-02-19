<?php

namespace App\Models;

use CodeIgniter\Model;

class HomeModel extends Model
{
    function berita_populer($slug)
    {
        return $this->db->table('tb_berita')->select('id,nama,gambar,dibaca,is_active,hari,updated_at,slug')->where('is_active', 1)->where('slug !=', $slug)->orderBy('dibaca','desc')->limit(3,0)->get()->getResult(); 
    }

    function link_terkait()
    {
        return $this->db->table('tb_link')->where('is_active', 1)->orderBy('id','desc')->get()->getResult(); 
    }

}