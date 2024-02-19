<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\TahunModel;

class Tahun extends BaseController
{
    function __construct()
    {   
        $this->m_tahun = new TahunModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {
        $data['title'] = 'Tahun Akademik';
        $data['data'] = $this->m_tahun->list_tahun();
        return view('admin/tahun/index', $data);
    }

    function tambah_tahun()
    {
        $data['title'] = 'Tambah Tahun Akademik';
        return view('admin/tahun/form_tambah', $data);
    }

    function simpan_tahun()
    {
        $this->rules->setRules([
            'tahun' => ['label' => 'Tahun Akademik', 'rules' => 'required|max_length[10]'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'tahun' => esc($this->request->getVar('tahun'))
        ];

        $this->m_tahun->tambah_tahun($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/tahun'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    function edit_tahun($id)
    {   
        $cek = $this->m_tahun->cek_tahun($id);
        if($cek)
        {
            $data['title'] = 'Edit Tahun Akademik';
            $data['data'] = $this->m_tahun->get_tahun($id);
            return view('admin/tahun/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    function update_tahun($id)
    {
        $this->rules->setRules([
            'tahun' => ['label' => 'Tahun Akademik', 'rules' => 'required|max_length[10]'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'tahun' => esc($this->request->getVar('tahun'))
        ];

        $this->m_tahun->edit_tahun($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/tahun'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    function hapus_tahun($id)
    {
        $cek = $this->m_tahun->cek_tahun($id);
        if($cek)
        {
            $this->m_tahun->hapus_tahun($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/tahun'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/tahun'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}