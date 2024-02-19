<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\SiswaModel;
use App\Models\Admin\TahunModel;

class Siswa extends BaseController
{
    function __construct()
    {   
        $this->m_siswa = new SiswaModel();
        $this->m_tahun = new TahunModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {
        $data['title'] = 'Peserta Didik';
        $data['data'] = $this->m_siswa->list_siswa();
        return view('admin/siswa/index', $data);
    }

    function tambah_siswa()
    {
        $data['title'] = 'Tambah Peserta Didik';
        $data['tahun'] = $this->m_tahun->list_tahun();
        $data['profil'] = profil_web();
        return view('admin/siswa/form_tambah', $data);
    }
    
    function simpan_siswa()
    {
        $this->rules->setRules([
            'id_tahun' => ['label' => 'Tahun', 'rules' => 'required|numeric'],
            'jml1pa' => ['label' => 'Jumlah', 'rules' => 'required|numeric'],
            'jml1pi' => ['label' => 'Jumlah', 'rules' => 'required|numeric'],
            'jml2pa' => ['label' => 'Jumlah', 'rules' => 'required|numeric'],
            'jml2pi' => ['label' => 'Jumlah', 'rules' => 'required|numeric'],
            'jml3pa' => ['label' => 'Jumlah', 'rules' => 'required|numeric'],
            'jml3pi' => ['label' => 'Jumlah', 'rules' => 'required|numeric'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'id_tahun' => esc($this->request->getVar('id_tahun')),
            'jml1pa' => esc($this->request->getVar('jml1pa')),
            'jml1pi' => esc($this->request->getVar('jml1pi')),            
            'jml2pa' => esc($this->request->getVar('jml2pa')),
            'jml2pi' => esc($this->request->getVar('jml2pi')),
            'jml3pa' => esc($this->request->getVar('jml3pa')),
            'jml3pi' => esc($this->request->getVar('jml3pi'))
        ];

        $this->m_siswa->tambah_siswa($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/siswa'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    function edit_siswa($id)
    {   
        $cek = $this->m_siswa->cek_siswa($id);
        if($cek)
        {
            $data['title'] = 'Edit Peserta Didik';
            $data['data'] = $this->m_siswa->get_siswa($id);
            $data['tahun'] = $this->m_tahun->list_tahun();
            $data['profil'] = profil_web();
            return view('admin/siswa/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    function update_siswa($id)
    {
        $this->rules->setRules([
            'id_tahun' => ['label' => 'Tahun', 'rules' => 'required|numeric'],
            'jml1pa' => ['label' => 'Jumlah', 'rules' => 'required|numeric'],
            'jml1pi' => ['label' => 'Jumlah', 'rules' => 'required|numeric'],
            'jml2pa' => ['label' => 'Jumlah', 'rules' => 'required|numeric'],
            'jml2pi' => ['label' => 'Jumlah', 'rules' => 'required|numeric'],
            'jml3pa' => ['label' => 'Jumlah', 'rules' => 'required|numeric'],
            'jml3pi' => ['label' => 'Jumlah', 'rules' => 'required|numeric'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'id_tahun' => esc($this->request->getVar('id_tahun')),
            'jml1pa' => esc($this->request->getVar('jml1pa')),
            'jml1pi' => esc($this->request->getVar('jml1pi')),            
            'jml2pa' => esc($this->request->getVar('jml2pa')),
            'jml2pi' => esc($this->request->getVar('jml2pi')),
            'jml3pa' => esc($this->request->getVar('jml3pa')),
            'jml3pi' => esc($this->request->getVar('jml3pi'))
        ];

        $this->m_siswa->edit_siswa($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/siswa'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    function hapus_siswa($id)
    {
        $cek = $this->m_siswa->cek_siswa($id);
        if($cek)
        {
            $this->m_siswa->hapus_siswa($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/siswa'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/siswa'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}