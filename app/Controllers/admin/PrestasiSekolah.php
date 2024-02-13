<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PrestasiSekolahModel;
use App\Models\Admin\TahunModel;

class PrestasiSekolah extends BaseController
{
    function __construct()
    {   
        $this->m_prestasi_sekolah = new PrestasiSekolahModel();
        $this->m_tahun = new TahunModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Prestasi Sekolah';
        $data['data'] = $this->m_prestasi_sekolah->list_prestasi_sekolah();
        return view('admin/prestasi_sekolah/index', $data);
    }

    public function tambah_prestasi_sekolah()
    {
        $data['title'] = 'Tambah Prestasi Sekolah';
        $data['tahun'] = $this->m_tahun->list_tahun();
        return view('admin/prestasi_sekolah/form_tambah', $data);
    }

    public function simpan_prestasi_sekolah()
    {
        $this->rules->setRules([
            'id_tahun' => ['label' => 'Tahun', 'rules' => 'required|numeric'],
            'jenis' => ['label' => 'Jenis', 'rules' => 'required|numeric'],
            'nama' =>  ['label' => 'Nama Lomba', 'rules' => 'required|max_length[100]'],
            'prestasi' =>  ['label' => 'Prestasi', 'rules' => 'required|max_length[100]'],
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
            $gambar->move('uploads/img/prestasi/sekolah', $nama_gambar);
        }
            
        $data = [
            'id_tahun' => esc($this->request->getVar('id_tahun')),
            'nama' => esc($this->request->getVar('nama')),
            'prestasi' => esc($this->request->getVar('prestasi')),
            'tingkat' => esc($this->request->getVar('tingkat')),
            'jenis' => esc($this->request->getVar('jenis')),
            'keterangan' => esc($this->request->getVar('keterangam')),
            'gambar' => $nama_gambar,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_prestasi_sekolah->tambah_prestasi_sekolah($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/prestasi-sekolah'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    public function edit_prestasi_sekolah($id)
    {   
        $cek = $this->m_prestasi_sekolah->cek_prestasi_sekolah($id);
        if($cek)
        {
            $data['title'] = 'Edit Prestasi Sekolah';
            $data['data'] = $this->m_prestasi_sekolah->get_prestasi_sekolah($id);
            $data['tahun'] = $this->m_tahun->list_tahun();
            return view('admin/prestasi_sekolah/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    public function update_prestasi_sekolah($id)
    {
        $this->rules->setRules([
            'id_tahun' => ['label' => 'Tahun', 'rules' => 'required|numeric'],
            'jenis' => ['label' => 'Jenis', 'rules' => 'required|numeric'],
            'nama' =>  ['label' => 'Nama Lomba', 'rules' => 'required|max_length[100]'],
            'prestasi' =>  ['label' => 'Prestasi', 'rules' => 'required|max_length[100]'],
            'tingkat' =>  ['label' => 'Tingkat', 'rules' => 'required|numeric'],
            'keterangan' =>  ['label' => 'Keterangan', 'rules' => 'max_length[100]'],
            //'gambar' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,img/jpg,image/jpeg,image/png]',
        ]);
                    
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $get = $this->m_prestasi_sekolah->cek_prestasi_sekolah($id);
        $gambar = $this->request->getFile('gambar');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->gambar == '' OR $get->gambar == null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/prestasi/sekolah', $nama_gambar);
            }elseif($get->gambar != '' AND $get->gambar != null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/prestasi/sekolah', $nama_gambar);
                unlink("uploads/img/prestasi/sekolah/$get->gambar");
            }else
            {
                $nama_gambar = '';
            }
        }else
        {
            $nama_gambar = $get->gambar;
        }
    
        $data = [
            'id_tahun' => $this->request->getVar('id_tahun'),
            'nama' => $this->request->getVar('nama'),
            'prestasi' => $this->request->getVar('prestasi'),
            'tingkat' => $this->request->getVar('tingkat'),
            'jenis' => $this->request->getVar('jenis'),
            'keterangan' => $this->request->getVar('keterangam'),
            'gambar' => $nama_gambar,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        $this->m_prestasi_sekolah->edit_prestasi_sekolah($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/prestasi-sekolah'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function hapus_prestasi_sekolah($id)
    {   
        $cek = $this->m_prestasi_sekolah->cek_prestasi_sekolah($id);
        if($cek)
        {
            if($cek->gambar != '' AND file_exists("uploads/img/prestasi/sekolah/$cek->gambar"))
            {
                unlink("uploads/img/prestasi/sekolah/$cek->gambar");
            }
                
            $this->m_prestasi_sekolah->hapus_prestasi_sekolah($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/prestasi-sekolah'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/prestasi-sekolah'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}