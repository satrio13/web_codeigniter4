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

    function index()
    {
        $data['title'] = 'Struktur Organisasi';
        $data['data'] = $this->m_struktur_organisasi->get_struktur_organisasi();
        return view('admin/struktur_organisasi/index', $data);
    }

    function edit_struktur_organisasi()
    {
        $data['title'] = 'Edit Struktur Organisasi';
        $data['data'] = $this->m_struktur_organisasi->get_struktur_organisasi();
        return view('admin/struktur_organisasi/form_struktur', $data);
    }

    function update_struktur_organisasi()
    {
        $get = $this->m_struktur_organisasi->get_struktur_organisasi();
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
            return redirect()->back()->withInput()->with('error', 'Anda belum memilih file yang akan diupload!');
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