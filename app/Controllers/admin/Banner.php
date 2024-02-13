<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\BannerModel;

class Banner extends BaseController
{   
    function __construct()
    {   
        $this->m_banner = new BannerModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Banner';
        $data['data'] = $this->m_banner->list_banner();
        return view('admin/banner/index', $data);
    }

    public function tambah_banner()
    {
        $data['title'] = 'Tambah Banner';
        return view('admin/banner/form_tambah', $data);
    }

    public function simpan_banner()
    {
        $this->rules->setRules([
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
            $gambar->move('uploads/img/banner', $nama_gambar);
        }else
        {
            return redirect()->back()->with('error', 'File Gagal Diupdate, silahkan coba lagi!');
        }
    
        $data = [
            'gambar' => $nama_gambar,
            'judul' => esc($this->request->getVar('judul')),
            'keterangan' => esc($this->request->getVar('keterangan')),
            'link' => esc($this->request->getVar('link')),
            'button' => esc($this->request->getVar('button')),
            'is_active' => esc($this->request->getVar('is_active')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        $this->m_banner->tambah_banner($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/banner'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function edit_banner($id)
    {   
        $cek = $this->m_banner->cek_banner($id);
        if($cek)
        {
            $data['title'] = 'Edit Banner';
            $data['data'] = $this->m_banner->get_banner($id);
            return view('admin/banner/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    public function update_banner($id)
    {
        $this->rules->setRules([
            'is_active' =>  ['label' => 'Status', 'rules' => 'required'],
            //'gambar' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,img/jpg,image/jpeg,image/png]',
        ]);
                    
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $get = $this->m_banner->cek_banner($id);
        $gambar = $this->request->getFile('gambar');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->gambar == '' OR $get->gambar == null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/banner', $nama_gambar);
            }elseif($get->gambar != '' AND $get->gambar != null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/banner', $nama_gambar);
                unlink("uploads/img/banner/$get->gambar");
            }else
            {
                $nama_gambar = '';
            }
        }else
        {
            $nama_gambar = $get->gambar;
        }
    
        $data = [
            'gambar' => $nama_gambar,
            'judul' => esc($this->request->getVar('judul')),
            'keterangan' => esc($this->request->getVar('keterangan')),
            'link' => esc($this->request->getVar('link')),
            'button' => esc($this->request->getVar('button')),
            'is_active' => esc($this->request->getVar('is_active')),
            'updated_at' => date('Y-m-d H:i:s')
        ];
        
        $this->m_banner->edit_banner($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/banner'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function hapus_banner($id)
    {   
        $cek = $this->m_banner->cek_banner($id);
        if($cek)
        {
            if($cek->gambar != '' AND file_exists("uploads/img/banner/$cek->gambar"))
            {
                unlink("uploads/img/banner/$cek->gambar");
            }
                
            $this->m_banner->hapus_banner($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/banner'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/banner'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}