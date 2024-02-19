<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\VideoModel;

class Video extends BaseController
{
    function __construct()
    {   
        $this->m_video = new VideoModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {
        $data['title'] = 'Video';
        $data['data'] = $this->m_video->list_video();
        return view('admin/video/index', $data);
    }

    function tambah_video()
    {
        $data['title'] = 'Tambah Video';
        return view('admin/video/form_tambah', $data);
    }

    function simpan_video()
    {
        $this->rules->setRules([
            'judul' => ['label' => 'Judul', 'rules' => 'required|max_length[100]'],
            'keterangan' => ['label' => 'Keterangan', 'rules' => 'max_length[200]'],
            'link' => ['label' => 'Link', 'rules' => 'required|max_length[100]'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'judul' => esc($this->request->getVar('judul')),
            'keterangan' => esc($this->request->getVar('keterangan')),
            'link' => esc($this->request->getVar('link'))
        ];

        $this->m_video->tambah_video($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/video'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    function edit_video($id)
    {   
        $cek = $this->m_video->cek_video($id);
        if($cek)
        {
            $data['title'] = 'Edit Video';
            $data['data'] = $this->m_video->get_video($id);
            return view('admin/video/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    function update_video($id)
    {
        $this->rules->setRules([
            'judul' => ['label' => 'Judul', 'rules' => 'required|max_length[100]'],
            'keterangan' => ['label' => 'Keterangan', 'rules' => 'max_length[200]'],
            'link' => ['label' => 'Link', 'rules' => 'required|max_length[100]'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'judul' => esc($this->request->getVar('judul')),
            'keterangan' => esc($this->request->getVar('keterangan')),
            'link' => esc($this->request->getVar('link'))
        ];

        $this->m_video->edit_video($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/video'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    function hapus_video($id)
    {
        $cek = $this->m_video->cek_video($id);
        if($cek)
        {
            $this->m_video->hapus_video($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/video'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/video'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}