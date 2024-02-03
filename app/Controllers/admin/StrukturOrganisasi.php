<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\StrukturOrganisasiModel;

class StrukturOrganisasi extends BaseController
{
    function __construct()
    {   
        $this->m_struktur_organisasi = new StrukturOrganisasiModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Struktur Organisasi';
        $data['data'] = $this->m_struktur_organisasi->get_struktur_organisasi();
        return view('admin/struktur_organisasi/index', $data);
    }

    public function edit_struktur_organisasi()
    {
        $data['title'] = 'Edit Struktur Organisasi';
        $data['data'] = $this->m_struktur_organisasi->get_struktur_organisasi();
        return view('admin/struktur_organisasi/form_struktur', $data);
    }

    public function update_struktur_organisasi()
    {
        $get = $this->db->table('tb_struktur_organisasi')->select('isi')->getWhere(['id' => 1])->getRow();
        $gambar = $this->request->getFile('struktur');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->isi == '' OR $get->isi == null)
            {
                $nama_gambar = $gambar->getName();
                $gambar->move('uploads/img/struktur', $nama_gambar);
            }elseif($get->isi != '' AND $get->isi != null)
            {
                $nama_gambar = $gambar->getName();
                $gambar->move('uploads/img/struktur', $nama_gambar);
                if(file_exists("uploads/img/struktur/$get->isi"))
                {
                    unlink("uploads/img/struktur/$get->isi");
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
            'isi' => $nama_gambar
        ];
        
        $this->m_struktur_organisasi->edit_struktur_organisasi($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/struktur-organisasi'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'File Gagal Diupdate, silahkan coba lagi!');
        }
    }
}