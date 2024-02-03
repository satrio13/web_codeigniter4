<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PengumumanModel;

class Pengumuman extends BaseController
{
    function __construct()
    {   
        $this->m_pengumuman = new PengumumanModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Pengumuman';
        $data['data'] = $this->m_pengumuman->list_pengumuman();
        return view('admin/pengumuman/index', $data);
    }

    public function tambah_pengumuman()
    {
        $data['title'] = 'Tambah Pengumuman';
        return view('admin/pengumuman/form_tambah', $data);
    }

    public function simpan_pengumuman()
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

        $gambar = $this->request->getFile('gambar');
        $nama_gambar = '';
        if($gambar != '')
        {
            $nama_gambar = $gambar->getRandomName();
            $gambar->move('uploads/img/pengumuman', $nama_gambar);
        }
            
        $data = [
            'nama' => esc($this->request->getVar('nama')),
            'isi' => esc($this->request->getVar('isi')),
            'gambar' => $nama_gambar,
            'dibaca' => 0,
            'id_user' => session('id_user'),
            'is_active' => esc($this->request->getVar('is_active')),
            'hari' => hari_ini_indo(),
            'tgl' => tgl_jam_simpan_sekarang(),
            'slug' => slug(esc($this->request->getVar('nama'))),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_pengumuman->tambah_pengumuman($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/pengumuman'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    public function edit_pengumuman($id)
    {   
        $cek = $this->m_pengumuman->cek_pengumuman($id);
        if($cek)
        {
            $data['title'] = 'Edit Pengumuman';
            $data['data'] = $this->m_pengumuman->get_pengumuman($id);
            return view('admin/pengumuman/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    public function update_pengumuman($id)
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

        $get = $this->m_pengumuman->cek_pengumuman($id);
        $gambar = $this->request->getFile('gambar');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->gambar == '' OR $get->gambar == null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/pengumuman', $nama_gambar);
            }elseif($get->gambar != '' AND $get->gambar != null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/pengumuman', $nama_gambar);
                unlink("uploads/img/pengumuman/$get->gambar");
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
            'isi' => esc($this->request->getVar('isi')),
            'gambar' => $nama_gambar,
            'id_user' => session('id_user'),
            'is_active' => esc($this->request->getVar('is_active')),
            'hari' => hari_ini_indo(),
            'tgl' => tgl_jam_simpan_sekarang(),
            'slug' => slug(esc($this->request->getVar('nama'))),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        $this->m_pengumuman->edit_pengumuman($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/pengumuman'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function hapus_pengumuman($id)
    {   
        $cek = $this->m_pengumuman->cek_pengumuman($id);
        if($cek)
        {
            if($cek->gambar != '' AND file_exists("uploads/img/pengumuman/$cek->gambar"))
            {
                unlink("uploads/img/pengumuman/$cek->gambar");
            }
                
            $this->m_pengumuman->hapus_pengumuman($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/pengumuman'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/pengumuman'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}