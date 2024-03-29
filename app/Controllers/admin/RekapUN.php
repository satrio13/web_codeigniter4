<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\RekapUNModel;
use App\Models\Admin\TahunModel;
use App\Models\Admin\KurikulumModel;

class RekapUN extends BaseController
{
    function __construct()
    {   
        $this->m_un = new RekapUNModel();
        $this->m_tahun = new TahunModel();
        $this->m_kurikulum = new KurikulumModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {
        $data['title'] = 'Rekap UN';
        $data['data'] = $this->m_un->list_rekap_un();
        return view('admin/rekap_un/index', $data);
    }

    function tambah_rekap_un()
    {
        $data['title'] = 'Tambah Rekap UN';
        $data['tahun'] = $this->m_tahun->list_tahun();
        $data['mapel'] = $this->m_kurikulum->list_kurikulum_order_by_mapel_asc();
        return view('admin/rekap_un/form_tambah', $data);
    }

    function simpan_rekap_un()
    {
        $this->rules->setRules([
            'id_tahun' => ['label' => 'Tahun Pelajaran', 'rules' => 'required|numeric'],
            'id_kurikulum' => ['label' => 'Mata Pelajaran', 'rules' => 'required|numeric'],
            'tertinggi' => ['label' => 'Tertinggi', 'rules' => 'required|numeric'],
            'terendah' => ['label' => 'Terendah', 'rules' => 'required|numeric'],
            'rata' => ['label' => 'Rata-Rata', 'rules' => 'required|numeric'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'id_tahun' => esc($this->request->getVar('id_tahun')),
            'id_kurikulum' => esc($this->request->getVar('id_kurikulum')),
            'tertinggi' => esc($this->request->getVar('tertinggi')),
            'terendah' => esc($this->request->getVar('terendah')),
            'rata' => esc($this->request->getVar('rata'))
        ];

        $this->m_un->tambah_rekap_un($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/rekap-un'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    function edit_rekap_un($id)
    {   
        $cek = $this->m_un->cek_rekap_un($id);
        if($cek)
        {
            $data['title'] = 'Edit Rekap UN';
            $data['data'] = $this->m_un->get_rekap_un($id);
            $data['tahun'] = $this->m_tahun->list_tahun();
            $data['mapel'] = $this->m_kurikulum->list_kurikulum_order_by_mapel_asc();
            return view('admin/rekap_un/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    function update_rekap_un($id)
    {
        $this->rules->setRules([
            'id_tahun' => ['label' => 'Tahun Pelajaran', 'rules' => 'required|numeric'],
            'id_kurikulum' => ['label' => 'Mata Pelajaran', 'rules' => 'required|numeric'],
            'tertinggi' => ['label' => 'Tertinggi', 'rules' => 'required|numeric'],
            'terendah' => ['label' => 'Terendah', 'rules' => 'required|numeric'],
            'rata' => ['label' => 'Rata-Rata', 'rules' => 'required|numeric'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'id_tahun' => esc($this->request->getVar('id_tahun')),
            'id_kurikulum' => esc($this->request->getVar('id_kurikulum')),
            'tertinggi' => esc($this->request->getVar('tertinggi')),
            'terendah' => esc($this->request->getVar('terendah')),
            'rata' => esc($this->request->getVar('rata'))
        ];

        $this->m_un->edit_rekap_un($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/rekap-un'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    function hapus_rekap_un($id)
    {
        $cek = $this->m_un->cek_rekap_un($id);
        if($cek)
        {
            $this->m_un->hapus_rekap_un($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/rekap-un'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/rekap-un'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }
}