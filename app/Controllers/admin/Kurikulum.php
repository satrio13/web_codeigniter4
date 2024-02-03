<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\KurikulumModel;

class Kurikulum extends BaseController
{
    function __construct()
    {   
        $this->m_kurikulum = new KurikulumModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Kurikulum';
        $data['data'] = $this->m_kurikulum->list_kurikulum();
        return view('admin/kurikulum/index', $data);
    }

    public function tambah_kurikulum()
    {
        $data['title'] = 'Tambah Kurikulum';
        return view('admin/kurikulum/form_tambah', $data);
    }

    public function simpan_kurikulum()
    {
        $this->rules->setRules([
            'mapel' => ['label' => 'Mata Pelajaran', 'rules' => 'required|max_length[50]'],
            'alokasi' => ['label' => 'Alokasi', 'rules' => 'required|numeric'],
            'kelompok' => ['label' => 'Kelompok', 'rules' => 'required|max_length[5]'],
            'no_urut' => ['label' => 'No Urut', 'rules' => 'required|numeric'],
            'is_active' => ['label' => 'Status', 'rules' => 'required|numeric'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'mapel' => esc($this->request->getVar('mapel')),
            'alokasi' => esc($this->request->getVar('alokasi')),
            'kelompok' => esc($this->request->getVar('kelompok')),
            'no_urut' => esc($this->request->getVar('no_urut')),
            'is_active' => esc($this->request->getVar('is_active')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_kurikulum->tambah_kurikulum($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/kurikulum'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    public function edit_kurikulum($id)
    {   
        $cek = $this->m_kurikulum->cek_kurikulum($id);
        if($cek)
        {
            $data['title'] = 'Edit Kurikulum';
            $data['data'] = $this->m_kurikulum->get_kurikulum($id);
            return view('admin/kurikulum/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    public function update_kurikulum($id)
    {
        $this->rules->setRules([
            'mapel' => ['label' => 'Mata Pelajaran', 'rules' => 'required|max_length[50]'],
            'alokasi' => ['label' => 'Alokasi', 'rules' => 'required|numeric'],
            'kelompok' => ['label' => 'Kelompok', 'rules' => 'required|max_length[5]'],
            'no_urut' => ['label' => 'No Urut', 'rules' => 'required|numeric'],
            'is_active' => ['label' => 'Status', 'rules' => 'required|numeric'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'mapel' => esc($this->request->getVar('mapel')),
            'alokasi' => esc($this->request->getVar('alokasi')),
            'kelompok' => esc($this->request->getVar('kelompok')),
            'no_urut' => esc($this->request->getVar('no_urut')),
            'is_active' => esc($this->request->getVar('is_active')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_kurikulum->edit_kurikulum($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/kurikulum'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function hapus_kurikulum($id)
    {
        $cek = $this->m_kurikulum->cek_kurikulum($id);
        if($cek)
        {
            $this->m_kurikulum->hapus_kurikulum($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/kurikulum'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/kurikulum'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}