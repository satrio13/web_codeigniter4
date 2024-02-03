<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AlumniModel;
use App\Models\Admin\IsiAlumniModel;

class Alumni extends BaseController
{
    function __construct()
    {   
        $this->m_alumni = new AlumniModel();
        $this->m_isialumni = new IsiAlumniModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Alumni';
        $data['data'] = $this->m_alumni->list_alumni();
        return view('admin/alumni/index', $data);
    }

    public function tambah_alumni()
    {
        $data['title'] = 'Tambah Alumni';
        $data['tahun'] = $this->db->table('tb_tahun')->select('*')->orderBy('tahun','desc')->get()->getResult();
        return view('admin/alumni/form_tambah', $data);
    }

    public function simpan_alumni()
    {
        $this->rules->setRules([
            'id_tahun' => ['label' => 'Tahun', 'rules' => 'required|numeric'],
            'jml_l' => ['label' => 'Jml Laki-Laki', 'rules' => 'required|numeric'],
            'jml_p' => ['label' => 'Jml Perempuan', 'rules' => 'required|numeric'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'id_tahun' => esc($this->request->getVar('id_tahun')),
            'jml_l' => esc($this->request->getVar('jml_l')),
            'jml_p' => esc($this->request->getVar('jml_p')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_alumni->tambah_alumni($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/alumni'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    public function edit_alumni($id)
    {   
        $cek = $this->m_alumni->cek_alumni($id);
        if($cek)
        {
            $data['title'] = 'Edit Alumni';
            $data['data'] = $this->m_alumni->get_alumni($id);
            $data['tahun'] = $this->db->table('tb_tahun')->select('*')->orderBy('tahun','desc')->get()->getResult();
            return view('admin/alumni/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    public function update_alumni($id)
    {
        $this->rules->setRules([
            'id_tahun' => ['label' => 'Tahun', 'rules' => 'required|numeric'],
            'jml_l' => ['label' => 'Jml Laki-Laki', 'rules' => 'required|numeric'],
            'jml_p' => ['label' => 'Jml Perempuan', 'rules' => 'required|numeric'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'id_tahun' => esc($this->request->getVar('id_tahun')),
            'jml_l' => esc($this->request->getVar('jml_l')),
            'jml_p' => esc($this->request->getVar('jml_p')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_alumni->edit_alumni($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/alumni'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function hapus_alumni($id)
    {
        $cek = $this->m_alumni->cek_alumni($id);
        if($cek)
        {
            $this->m_alumni->hapus_alumni($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/alumni'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/alumni'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

    public function penelusuran_alumni()
    {
        $data['title'] = 'Penelusuran Alumni';
        $data['data'] = $this->m_isialumni->list_isialumni();
        return view('admin/alumni/penelusuran', $data);
    }

    function lihat_alumni($id)
	{ 
        $data = $this->m_isialumni->get_isialumni($id);
        echo json_encode($data);
    }

    function status($id)
	{ 
        $data = $this->m_isialumni->get_isialumni($id);
        echo json_encode($data);
    }

    function save_status()
	{   
        $id = $this->request->getVar('id');
        
        $data = [
            'status' => esc($this->request->getVar('status'))
        ];

        $q = $this->m_isialumni->edit_status($data, $id);
        echo json_encode($q);	
    }

    public function hapus_penelusuran_alumni($id)
    {
        $cek = $this->m_isialumni->cek_isialumni($id);
        if($cek)
        {   
            if($cek->gambar != '' AND file_exists("uploads/img/alumni/$cek->gambar"))
            {
                unlink("uploads/img/alumni/$cek->gambar");
            }
            
            $this->m_isialumni->hapus_isialumni($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/penelusuran-alumni'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/penelusuran-alumni'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}