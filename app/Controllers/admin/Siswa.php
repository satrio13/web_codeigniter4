<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\SiswaModel;

class Siswa extends BaseController
{
    function __construct()
    {   
        $this->m_siswa = new SiswaModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Peserta Didik';
        $data['data'] = $this->m_siswa->list_siswa();
        return view('admin/siswa/index', $data);
    }

    public function tambah_siswa()
    {
        $data['title'] = 'Tambah Peserta Didik';
        $data['tahun'] = $this->db->table('tb_tahun')->select('*')->orderBy('tahun','desc')->get()->getResult();
        $data['profil'] = profil_web();
        return view('admin/siswa/form_tambah', $data);
    }
    
    public function simpan_siswa()
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
            'jml3pi' => esc($this->request->getVar('jml3pi')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_siswa->tambah_siswa($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/siswa'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    public function edit_siswa($id)
    {   
        $cek = $this->m_siswa->cek_siswa($id);
        if($cek)
        {
            $data['title'] = 'Edit Peserta Didik';
            $data['data'] = $this->m_siswa->get_siswa($id);
            $data['tahun'] = $this->db->table('tb_tahun')->select('*')->orderBy('tahun','desc')->get()->getResult();
            $data['profil'] = profil_web();
            return view('admin/siswa/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    public function update_siswa($id)
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
            'jml3pi' => esc($this->request->getVar('jml3pi')),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_siswa->edit_siswa($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/siswa'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function hapus_siswa($id)
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