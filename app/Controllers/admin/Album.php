<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AlbumModel;

class Album extends BaseController
{
    function __construct()
    {   
        $this->m_album = new AlbumModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Album';
        $data['data'] = $this->m_album->list_album();
        return view('admin/album/index', $data);
    }

    public function tambah_album()
    {
        $data['title'] = 'Tambah Album';
        return view('admin/album/form_tambah', $data);
    }

    public function simpan_album()
    {
        $this->rules->setRules([
            'album' => ['label' => 'Nama Album', 'rules' => 'required|max_length[50]'],
            'is_active' => ['label' => 'Status', 'rules' => 'required'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'album' => esc($this->request->getVar('album')),
            'is_active' => esc($this->request->getVar('is_active')),
            'slug' => slug(esc($this->request->getVar('album'))),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_album->tambah_album($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/album'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    public function edit_album($id)
    {   
        $cek = $this->m_album->cek_album($id);
        if($cek)
        {
            $data['title'] = 'Edit Album';
            $data['data'] = $this->m_album->get_album($id);
            return view('admin/album/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    public function update_album($id)
    {
        $this->rules->setRules([
            'album' => ['label' => 'Nama Album', 'rules' => 'required|max_length[50]'],
            'is_active' => ['label' => 'Status', 'rules' => 'required'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'album' => esc($this->request->getVar('album')),
            'is_active' => esc($this->request->getVar('is_active')),
            'slug' => slug(esc($this->request->getVar('album'))),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_album->edit_album($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/album'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function hapus_album($id)
    {
        $cek = $this->m_album->cek_album($id);
        if($cek)
        {
            $this->m_album->hapus_album($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/album'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/album'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}