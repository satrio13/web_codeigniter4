<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\LinkModel;

class Link extends BaseController
{
    function __construct()
    {   
        $this->m_link = new LinkModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {
        $data['title'] = 'Link Terkait';
        $data['data'] = $this->m_link->list_link();
        return view('admin/link/index', $data);
    }

    function tambah_link()
    {
        $data['title'] = 'Tambah Link Terkait';
        return view('admin/link/form_tambah', $data);
    }

    function simpan_link()
    {
        $this->rules->setRules([
            'nama' => ['label' => 'Nama', 'rules' => 'required|max_length[100]'],
            'link' => ['label' => 'Link', 'rules' => 'required|valid_url'],
            'is_active' => ['label' => 'Status', 'rules' => 'required'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'nama' => esc($this->request->getVar('nama')),
            'link' => esc($this->request->getVar('link')),
            'is_active' => esc($this->request->getVar('is_active'))
        ];

        $this->m_link->tambah_link($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/link-terkait'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    function edit_link($id)
    {   
        $cek = $this->m_link->cek_link($id);
        if($cek)
        {
            $data['title'] = 'Edit Link Terkait';
            $data['data'] = $this->m_link->get_link($id);
            return view('admin/link/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    function update_link($id)
    {
        $this->rules->setRules([
            'nama' => ['label' => 'Nama', 'rules' => 'required|max_length[100]'],
            'link' => ['label' => 'Link', 'rules' => 'required|valid_url'],
            'is_active' => ['label' => 'Status', 'rules' => 'required'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'nama' => esc($this->request->getVar('nama')),
            'link' => esc($this->request->getVar('link')),
            'is_active' => esc($this->request->getVar('is_active'))
        ];

        $this->m_link->edit_link($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/link-terkait'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    function hapus_link($id)
    {
        $cek = $this->m_link->cek_link($id);
        if($cek)
        {
            $this->m_link->hapus_link($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/link-terkait'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/link-terkait'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}