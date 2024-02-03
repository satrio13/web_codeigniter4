<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Main extends BaseController
{
    public function index()
    {
        $data['titleweb'] = title();
        $data['banner'] = $this->db->table('tb_banner')->select('*')->where('is_active',1)->orderBy('id','desc')->get()->getResult();
        $data['agenda'] = $this->db->table('tb_agenda')->select('*')->orderBy('id','desc')->limit(3,0)->get()->getResult();  
        $data['pengumuman'] = $this->db->table('tb_pengumuman')->select('*')->where('is_active',1)->orderBy('id','desc')->limit(4,0)->get()->getResult(); 
        $data['berita'] = $this->db->table('tb_berita')->select('*')->where('is_active',1)->orderBy('id','desc')->limit(4,0)->get()->getResult(); 
        $data['download'] = $this->db->table('tb_download')->select('*')->where('is_active',1)->orderBy('id','desc')->limit(5,0)->get()->getResult(); 
        $data['link'] = $this->db->table('tb_link')->select('*')->where('is_active',1)->orderBy('id','desc')->get()->getResult(); 
        $data['ekstrakurikuler'] = $this->db->table('tb_ekstrakurikuler')->select('*')->orderBy('id','desc')->limit(5,0)->get()->getResult(); 
        $data['album'] = $this->db->table('tb_album')->select('*')->where('is_active',1)->orderBy('created_at','desc')->limit(2,0)->get()->getResult(); 
        $data['video'] = $this->db->table('tb_video')->select('*')->orderBy('created_at','desc')->limit(2,0)->get()->getResult(); 
        $data['alumni'] = $this->db->table('tb_isialumni')->select('*')->where('status',1)->where('kesan !=', '')->where('gambar !=', '')->orderBy('id','desc')->limit(6,0)->get()->getResult(); 
        return view('home', $data);
    }

}