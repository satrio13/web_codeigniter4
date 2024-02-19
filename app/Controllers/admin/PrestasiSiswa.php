<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PrestasiSiswaModel;
use App\Models\Admin\TahunModel;

class PrestasiSiswa extends BaseController
{
    function __construct()
    {   
        $this->m_prestasi_siswa = new PrestasiSiswaModel();
        $this->m_tahun = new TahunModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {
        $data['title'] = 'Prestasi Siswa';
        $data['data'] = $this->m_prestasi_siswa->list_prestasi_siswa();
        return view('admin/prestasi_siswa/index', $data);
    }

    function tambah_prestasi_siswa()
    {
        $data['title'] = 'Tambah Prestasi Siswa';
        $data['tahun'] = $this->m_tahun->list_tahun();
        return view('admin/prestasi_siswa/form_tambah', $data);
    }

    function simpan_prestasi_siswa()
    {
        $this->rules->setRules([
            'id_tahun' => ['label' => 'Tahun', 'rules' => 'required|numeric'],
            'jenis' => ['label' => 'Jenis', 'rules' => 'required|numeric'],
            'nama' =>  ['label' => 'Nama Lomba', 'rules' => 'required|max_length[100]'],
            'prestasi' =>  ['label' => 'Prestasi', 'rules' => 'required|max_length[100]'],
            'nama_siswa' =>  ['label' => 'Nama Siswa', 'rules' => 'required|max_length[100]'],
            'kelas' =>  ['label' => 'Kelas', 'rules' => 'max_length[6]'],
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
            $gambar->move('uploads/img/prestasi/siswa', $nama_gambar);
        }
            
        $data = [
            'id_tahun' => esc($this->request->getVar('id_tahun')),
            'nama' => esc($this->request->getVar('nama')),
            'prestasi' => esc($this->request->getVar('prestasi')),
            'nama_siswa' => esc($this->request->getVar('nama_siswa')),
            'kelas' => esc($this->request->getVar('kelas')),
            'tingkat' => esc($this->request->getVar('tingkat')),
            'jenis' => esc($this->request->getVar('jenis')),
            'keterangan' => esc($this->request->getVar('keterangam')),
            'gambar' => $nama_gambar
        ];

        $this->m_prestasi_siswa->tambah_prestasi_siswa($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/prestasi-siswa'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    function edit_prestasi_siswa($id)
    {   
        $cek = $this->m_prestasi_siswa->cek_prestasi_siswa($id);
        if($cek)
        {
            $data['title'] = 'Edit Prestasi Siswa';
            $data['data'] = $this->m_prestasi_siswa->get_prestasi_siswa($id);
            $data['tahun'] = $this->m_tahun->list_tahun();
            return view('admin/prestasi_siswa/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    function update_prestasi_siswa($id)
    {
        $this->rules->setRules([
            'id_tahun' => ['label' => 'Tahun', 'rules' => 'required|numeric'],
            'jenis' => ['label' => 'Jenis', 'rules' => 'required|numeric'],
            'nama' =>  ['label' => 'Nama Lomba', 'rules' => 'required|max_length[100]'],
            'prestasi' =>  ['label' => 'Prestasi', 'rules' => 'required|max_length[100]'],
            'nama_siswa' =>  ['label' => 'Nama Siswa', 'rules' => 'required|max_length[100]'],
            'kelas' =>  ['label' => 'Kelas', 'rules' => 'max_length[6]'],
            'tingkat' =>  ['label' => 'Tingkat', 'rules' => 'required|numeric'],
            'keterangan' =>  ['label' => 'Keterangan', 'rules' => 'max_length[100]'],
            //'gambar' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,img/jpg,image/jpeg,image/png]',
        ]);
                    
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $get = $this->m_prestasi_siswa->cek_prestasi_siswa($id);
        $gambar = $this->request->getFile('gambar');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->gambar == '' OR $get->gambar == null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/prestasi/siswa', $nama_gambar);
            }elseif($get->gambar != '' AND $get->gambar != null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/prestasi/siswa', $nama_gambar);
                unlink("uploads/img/prestasi/siswa/$get->gambar");
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
            'nama_siswa' => esc($this->request->getVar('nama_siswa')),
            'kelas' => esc($this->request->getVar('kelas')),
            'tingkat' => esc($this->request->getVar('tingkat')),
            'jenis' => esc($this->request->getVar('jenis')),
            'keterangan' => esc($this->request->getVar('keterangam')),
            'gambar' => $nama_gambar
        ];
        
        $this->m_prestasi_siswa->edit_prestasi_siswa($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/prestasi-siswa'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    function hapus_prestasi_siswa($id)
    {   
        $cek = $this->m_prestasi_siswa->cek_prestasi_siswa($id);
        if($cek)
        {
            if($cek->gambar != '' AND file_exists("uploads/img/prestasi/siswa/$cek->gambar"))
            {
                unlink("uploads/img/prestasi/siswa/$cek->gambar");
            }
                
            $this->m_prestasi_siswa->hapus_prestasi_siswa($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/prestasi-siswa'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/prestasi-siswa'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}