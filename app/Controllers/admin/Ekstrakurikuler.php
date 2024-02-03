<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\EkstrakurikulerModel;

class Ekstrakurikuler extends BaseController
{
    function __construct()
    {   
        $this->m_ekstrakurikuler = new EkstrakurikulerModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Ekstrakurikuler';
        $data['data'] = $this->m_ekstrakurikuler->list_ekstrakurikuler();
        return view('admin/ekstrakurikuler/index', $data);
    }

    public function tambah_ekstrakurikuler()
    {
        $data['title'] = 'Tambah Ekstrakurikuler';
        return view('admin/ekstrakurikuler/form_tambah', $data);
    }

    public function simpan_ekstrakurikuler()
    {
        $this->rules->setRules([
            'nama_ekstrakurikuler' => ['label' => 'Nama Ekstrakurikuler', 'rules' => 'required|max_length[100]'],
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
            $gambar->move('uploads/img/ekstrakurikuler', $nama_gambar);
        }
            
        $data = [
            'nama_ekstrakurikuler' => esc($this->request->getVar('nama_ekstrakurikuler')),
            'keterangan' => esc($this->request->getVar('keterangan')),
            'gambar' => $nama_gambar,
            'slug' => slug(esc($this->request->getVar('nama_ekstrakurikuler'))),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_ekstrakurikuler->tambah_ekstrakurikuler($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/ekstrakurikuler'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    public function edit_ekstrakurikuler($id)
    {   
        $cek = $this->m_ekstrakurikuler->cek_ekstrakurikuler($id);
        if($cek)
        {
            $data['title'] = 'Edit Ekstrakurikuler';
            $data['data'] = $this->m_ekstrakurikuler->get_ekstrakurikuler($id);
            return view('admin/ekstrakurikuler/form_edit', $data);
        }else
        {
            show_404();
        }
    }
    
    public function update_ekstrakurikuler($id)
    {
        $this->rules->setRules([
            'nama_ekstrakurikuler' => ['label' => 'Nama Ekstrakurikuler', 'rules' => 'required|max_length[100]'],
            //'gambar' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,img/jpg,image/jpeg,image/png]',
        ]);
                    
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $get = $this->m_ekstrakurikuler->cek_ekstrakurikuler($id);
        $gambar = $this->request->getFile('gambar');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->gambar == '' OR $get->gambar == null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/ekstrakurikuler', $nama_gambar);
            }elseif($get->gambar != '' AND $get->gambar != null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/ekstrakurikuler', $nama_gambar);
                unlink("uploads/img/ekstrakurikuler/$get->gambar");
            }else
            {
                $nama_gambar = '';
            }
        }else
        {
            $nama_gambar = $get->gambar;
        }
    
        $data = [
            'nama_ekstrakurikuler' => esc($this->request->getVar('nama_ekstrakurikuler')),
            'keterangan' => esc($this->request->getVar('keterangan')),
            'gambar' => $nama_gambar,
            'slug' => slug(esc($this->request->getVar('nama_ekstrakurikuler'))),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        $this->m_ekstrakurikuler->edit_ekstrakurikuler($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/ekstrakurikuler'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function hapus_ekstrakurikuler($id)
    {   
        $cek = $this->m_ekstrakurikuler->cek_ekstrakurikuler($id);
        if($cek)
        {
            if($cek->gambar != '' AND file_exists("uploads/img/ekstrakurikuler/$cek->gambar"))
            {
                unlink("uploads/img/ekstrakurikuler/$cek->gambar");
            }
                
            $this->m_ekstrakurikuler->hapus_ekstrakurikuler($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/ekstrakurikuler'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/ekstrakurikuler'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}