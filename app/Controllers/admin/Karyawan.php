<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\KaryawanModel;

class Karyawan extends BaseController
{
    function __construct()
    {   
        $this->m_karyawan = new KaryawanModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {
        $data['title'] = 'Karyawan';
        $data['data'] = $this->m_karyawan->list_karyawan();
        return view('admin/karyawan/index', $data);
    }

    function tambah_karyawan()
    {
        $data['title'] = 'Tambah Karyawan';
        return view('admin/karyawan/form_tambah', $data);
    }

    function simpan_karyawan()
    {
        $this->rules->setRules([
            'nama' => ['label' => 'Nama Lengkap', 'rules' => 'required|max_length[100]'],
            'tmp_lahir' =>  ['label' => 'Tempat Lahir', 'rules' => 'required|max_length[50]'],
            'tgl_lahir' =>  ['label' => 'Tgl Lahir', 'rules' => 'required'],
            'jk' =>  ['label' => 'Jenis Kelamin', 'rules' => 'required'],
            'statuspeg' =>  ['label' => 'Status Pegawai', 'rules' => 'required|max_length[5]'],
            'status' =>  ['label' => 'Status', 'rules' => 'required|max_length[10]'],
            'email' =>  ['label' => 'Email', 'rules' => 'trim|max_length[100]'],
            //'gambar' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,img/jpg,image/jpeg,image/png]',
        ]);
        
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $gambar = $this->request->getFile('gambar');
        $nama_gambar = '';
        if($gambar != '')
        {
            $nama_gambar = $gambar->getRandomName();
            $gambar->move('uploads/img/karyawan', $nama_gambar);
        }
            
        $data = [
            'nama' => esc($this->request->getVar('nama')),
            'nip' => esc($this->request->getVar('nip')),
            'duk' => esc($this->request->getVar('duk')),
            'niplama' => esc($this->request->getVar('niplama')),
            'nuptk' => esc($this->request->getVar('nuptk')),
            'nokarpeg' => esc($this->request->getVar('nokarpeg')),
            'golruang' => esc($this->request->getVar('golruang')),
            'statuspeg' => esc($this->request->getVar('statuspeg')),
            'tmp_lahir' => esc($this->request->getVar('tmp_lahir')),
            'tgl_lahir' => esc($this->request->getVar('tgl_lahir')),
            'tmt_cpns' => esc($this->request->getVar('tmt_cpns')),
            'tmt_pns' => esc($this->request->getVar('tmt_pns')),
            'jk' => esc($this->request->getVar('jk')),
            'agama' => esc($this->request->getVar('agama')),
            'alamat' => esc($this->request->getVar('alamat')),
            'pt' => esc($this->request->getVar('pt')),
            'tingkat_pt' => esc($this->request->getVar('tingkat_pt')),
            'prodi' => esc($this->request->getVar('prodi')),
            'th_lulus' => esc($this->request->getVar('th_lulus')),
            'status' => esc($this->request->getVar('status')),
            'email' => esc($this->request->getVar('email')),
            'tugas' => esc($this->request->getVar('tugas')),
            'gambar' => $nama_gambar
        ];        

        $this->m_karyawan->tambah_karyawan($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/karyawan'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    function edit_karyawan($id)
    {   
        $cek = $this->m_karyawan->cek_karyawan($id);
        if($cek)
        {
            $data['title'] = 'Edit Karyawan';
            $data['data'] = $this->m_karyawan->get_karyawan($id);
            return view('admin/karyawan/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    function update_karyawan($id)
    {
        $this->rules->setRules([
            'nama' => ['label' => 'Nama Lengkap', 'rules' => 'required|max_length[100]'],
            'tmp_lahir' =>  ['label' => 'Tempat Lahir', 'rules' => 'required|max_length[50]'],
            'tgl_lahir' =>  ['label' => 'Tgl Lahir', 'rules' => 'required'],
            'jk' =>  ['label' => 'Jenis Kelamin', 'rules' => 'required'],
            'statuspeg' =>  ['label' => 'Status Pegawai', 'rules' => 'required|max_length[5]'],
            'status' =>  ['label' => 'Status', 'rules' => 'required|max_length[10]'],
            'email' =>  ['label' => 'Email', 'rules' => 'trim|max_length[100]'],
            //'gambar' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,img/jpg,image/jpeg,image/png]',
        ]);
                    
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $get = $this->m_karyawan->cek_karyawan($id);
        $gambar = $this->request->getFile('gambar');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->gambar == '' OR $get->gambar == null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/karyawan', $nama_gambar);
            }elseif($get->gambar != '' AND $get->gambar != null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/karyawan', $nama_gambar);
                unlink("uploads/img/karyawan/$get->gambar");
            }else
            {
                $nama_gambar = '';
            }
        }else
        {
            $nama_gambar = $get->gambar;
        }
    
        $data = [
            'nama' => esc($this->request->getVar('nama')),
            'nip' => esc($this->request->getVar('nip')),
            'duk' => esc($this->request->getVar('duk')),
            'niplama' => esc($this->request->getVar('niplama')),
            'nuptk' => esc($this->request->getVar('nuptk')),
            'nokarpeg' => esc($this->request->getVar('nokarpeg')),
            'golruang' => esc($this->request->getVar('golruang')),
            'statuspeg' => esc($this->request->getVar('statuspeg')),
            'tmp_lahir' => esc($this->request->getVar('tmp_lahir')),
            'tgl_lahir' => esc($this->request->getVar('tgl_lahir')),
            'tmt_cpns' => esc($this->request->getVar('tmt_cpns')),
            'tmt_pns' => esc($this->request->getVar('tmt_pns')),
            'jk' => esc($this->request->getVar('jk')),
            'agama' => esc($this->request->getVar('agama')),
            'alamat' => esc($this->request->getVar('alamat')),
            'pt' => esc($this->request->getVar('pt')),
            'tingkat_pt' => esc($this->request->getVar('tingkat_pt')),
            'prodi' => esc($this->request->getVar('prodi')),
            'th_lulus' => esc($this->request->getVar('th_lulus')),
            'status' => esc($this->request->getVar('status')),
            'email' => esc($this->request->getVar('email')),
            'tugas' => esc($this->request->getVar('tugas')),
            'gambar' => $nama_gambar
        ];        
        
        $this->m_karyawan->edit_karyawan($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/karyawan'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    function hapus_karyawan($id)
    {   
        $cek = $this->m_karyawan->cek_karyawan($id);
        if($cek)
        {
            if($cek->gambar != '' AND file_exists("uploads/img/karyawan/$cek->gambar"))
            {
                unlink("uploads/img/karyawan/$cek->gambar");
            }
                
            $this->m_karyawan->hapus_karyawan($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/karyawan'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/karyawan'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

    function lihat_karyawan($id)
    {   
        $cek = $this->m_karyawan->cek_karyawan($id);
        if($cek)
        {
            $data = $this->m_karyawan->get_karyawan($id);
            echo json_encode($data);
        }else
        {
            show_404();
        }
    }

}