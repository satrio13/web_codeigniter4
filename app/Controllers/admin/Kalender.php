<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\KalenderModel;

class Kalender extends BaseController
{
    function __construct()
    {   
        $this->m_kalender = new KalenderModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Kalender Akademik';
        $data['data'] = $this->m_kalender->get_kalender();
        return view('admin/kalender/index', $data);
    }

    public function update_kalender()
    {
        $get = $this->m_kalender->get_kalender();
        $gambar = $this->request->getFile('file');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->kalender == '' OR $get->kalender == null)
            {
                $nama_gambar = $gambar->getName();
                $gambar->move('uploads/img/kalender', $nama_gambar);
            }elseif($get->kalender != '' AND $get->kalender != null)
            {
                $nama_gambar = $gambar->getName();
                $gambar->move('uploads/img/kalender', $nama_gambar);
                if(file_exists("uploads/img/kalender/$get->kalender"))
                {
                    unlink("uploads/img/kalender/$get->kalender");
                }
            }else
            {
                $nama_gambar = '';
            }
        }else
        {
            return redirect()->back()->with('error', 'Anda belum memilih file yang akan diupload!');
        }
    
        $data = [
            'kalender' => $nama_gambar
        ];
        
        $this->m_kalender->edit_kalender($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/kalender'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'File Gagal Diupdate, silahkan coba lagi!');
        }
    }
}