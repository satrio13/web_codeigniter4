<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PrestasiGuruModel;
use App\Models\Admin\TahunModel;

class PrestasiGuru extends BaseController
{
    function __construct()
    {   
        $this->m_prestasi_guru = new PrestasiGuruModel();
        $this->m_tahun = new TahunModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {
        $data['title'] = 'Prestasi Guru';
        $data['data'] = $this->m_prestasi_guru->list_prestasi_guru();
        return view('admin/prestasi_guru/index', $data);
    }

    function tambah_prestasi_guru()
    {
        $data['title'] = 'Tambah Prestasi Guru';
        $data['tahun'] = $this->m_tahun->list_tahun();
        return view('admin/prestasi_guru/form_tambah', $data);
    }

    function simpan_prestasi_guru()
    {
        $this->rules->setRules([
            'id_tahun' => ['label' => 'Tahun', 'rules' => 'required|numeric'],
            'jenis' => ['label' => 'Jenis', 'rules' => 'required|numeric'],
            'nama' =>  ['label' => 'Nama Lomba', 'rules' => 'required|max_length[100]'],
            'prestasi' =>  ['label' => 'Prestasi', 'rules' => 'required|max_length[100]'],
            'nama_guru' =>  ['label' => 'Nama Guru', 'rules' => 'max_length[100]'],
            'tingkat' =>  ['label' => 'Tingkat', 'rules' => 'required|numeric'],
            'keterangan' =>  ['label' => 'Keterangan', 'rules' => 'max_length[100]'],
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
            $gambar->move('uploads/img/prestasi/guru', $nama_gambar);
        }
            
        $data = [
            'id_tahun' => esc($this->request->getVar('id_tahun')),
            'nama' => esc($this->request->getVar('nama')),
            'prestasi' => esc($this->request->getVar('prestasi')),
            'nama_guru' => esc($this->request->getVar('nama_guru')),
            'tingkat' => esc($this->request->getVar('tingkat')),
            'jenis' => esc($this->request->getVar('jenis')),
            'keterangan' => esc($this->request->getVar('keterangam')),
            'gambar' => $nama_gambar
        ];

        $this->m_prestasi_guru->tambah_prestasi_guru($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/prestasi-guru'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    function edit_prestasi_guru($id)
    {   
        $cek = $this->m_prestasi_guru->cek_prestasi_guru($id);
        if($cek)
        {
            $data['title'] = 'Edit Prestasi Guru';
            $data['data'] = $this->m_prestasi_guru->get_prestasi_guru($id);
            $data['tahun'] = $this->m_tahun->list_tahun();
            return view('admin/prestasi_guru/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    function update_prestasi_guru($id)
    {
        $this->rules->setRules([
            'id_tahun' => ['label' => 'Tahun', 'rules' => 'required|numeric'],
            'jenis' => ['label' => 'Jenis', 'rules' => 'required|numeric'],
            'nama' =>  ['label' => 'Nama Lomba', 'rules' => 'required|max_length[100]'],
            'prestasi' =>  ['label' => 'Prestasi', 'rules' => 'required|max_length[100]'],
            'nama_guru' =>  ['label' => 'Nama Guru', 'rules' => 'max_length[100]'],
            'tingkat' =>  ['label' => 'Tingkat', 'rules' => 'required|numeric'],
            'keterangan' =>  ['label' => 'Keterangan', 'rules' => 'max_length[100]'],
            //'gambar' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,img/jpg,image/jpeg,image/png]',
        ]);
        
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $get = $this->m_prestasi_guru->cek_prestasi_guru($id);
        $gambar = $this->request->getFile('gambar');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->gambar == '' OR $get->gambar == null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/prestasi/guru', $nama_gambar);
            }elseif($get->gambar != '' AND $get->gambar != null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/prestasi/guru', $nama_gambar);
                unlink("uploads/img/prestasi/guru/$get->gambar");
            }else
            {
                $nama_gambar = '';
            }
        }else
        {
            $nama_gambar = $get->gambar;
        }
    
        $data = [
            'id_tahun' => esc($this->request->getVar('id_tahun')),
            'nama' => esc($this->request->getVar('nama')),
            'prestasi' => esc($this->request->getVar('prestasi')),
            'nama_guru' => esc($this->request->getVar('nama_guru')),
            'tingkat' => esc($this->request->getVar('tingkat')),
            'jenis' => esc($this->request->getVar('jenis')),
            'keterangan' => esc($this->request->getVar('keterangam')),
            'gambar' => $nama_gambar
        ];

        $this->m_prestasi_guru->edit_prestasi_guru($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/prestasi-guru'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    function hapus_prestasi_guru($id)
    {   
        $cek = $this->m_prestasi_guru->cek_prestasi_guru($id);
        if($cek)
        {
            if($cek->gambar != '' AND file_exists("uploads/img/prestasi/guru/$cek->gambar"))
            {
                unlink("uploads/img/prestasi/guru/$cek->gambar");
            }
                
            $this->m_prestasi_guru->hapus_prestasi_guru($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/prestasi-guru'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/prestasi-guru'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}