<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\BeritaModel;

class Berita extends BaseController
{
    function __construct()
    {   
        $this->m_berita = new BeritaModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {
        $data['title'] = 'Berita';
        $data['data'] = $this->m_berita->list_berita();
        return view('admin/berita/index', $data);
    }

    function tambah_berita()
    {
        $data['title'] = 'Tambah Berita';
        return view('admin/berita/form_tambah', $data);
    }

    function simpan_berita()
    {
        $this->rules->setRules([
            'nama' => ['label' => 'Nama', 'rules' => 'required|max_length[100]'],
            'isi' =>  ['label' => 'Isi', 'rules' => 'required'],
            'is_active' =>  ['label' => 'Status', 'rules' => 'required'],
            //'gambar' => ['label' => 'Gambar', 'rules' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,img/jpg,image/jpeg,image/png]'],
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
            $gambar->move('uploads/img/berita', $nama_gambar);
        }
            
        $data = [
            'nama' => esc($this->request->getVar('nama')),
            'isi' => $this->request->getVar('isi'),
            'gambar' => $nama_gambar,
            'dibaca' => 0,
            'id_user' => session('id_user'),
            'is_active' => esc($this->request->getVar('is_active')),
            'hari' => hari_ini_indo(),
            'tgl' => tgl_jam_simpan_sekarang(),
            'slug' => slug(esc($this->request->getVar('nama')))
        ];

        $this->m_berita->tambah_berita($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/berita'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    function edit_berita($id)
    {   
        $cek = $this->m_berita->cek_berita($id);
        if($cek)
        {
            $data['title'] = 'Edit Berita';
            $data['data'] = $this->m_berita->get_berita($id);
            return view('admin/berita/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    function update_berita($id)
    {
        $this->rules->setRules([
            'nama' => ['label' => 'Nama', 'rules' => 'required|max_length[100]'],
            'isi' =>  ['label' => 'Isi', 'rules' => 'required'],
            'is_active' =>  ['label' => 'Status', 'rules' => 'required'],
            //'gambar' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,img/jpg,image/jpeg,image/png]',
        ]);
            
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $get = $this->m_berita->cek_berita($id);
        $gambar = $this->request->getFile('gambar');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->gambar == '' OR $get->gambar == null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/berita', $nama_gambar);
            }elseif($get->gambar != '' AND $get->gambar != null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/berita', $nama_gambar);
                unlink("uploads/img/berita/$get->gambar");
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
            'isi' => $this->request->getVar('isi'),
            'gambar' => $nama_gambar,
            'id_user' => session('id_user'),
            'is_active' => esc($this->request->getVar('is_active')),
            'hari' => hari_ini_indo(),
            'tgl' => tgl_jam_simpan_sekarang(),
            'slug' => slug(esc($this->request->getVar('nama')))
        ];
        
        $this->m_berita->edit_berita($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/berita'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    function hapus_berita($id)
    {   
        $cek = $this->m_berita->cek_berita($id);
        if($cek)
        {
            if($cek->gambar != '' AND file_exists("uploads/img/berita/$cek->gambar"))
            {
                unlink("uploads/img/berita/$cek->gambar");
            }
                
            $this->m_berita->hapus_berita($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/berita'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/berita'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }
    
}