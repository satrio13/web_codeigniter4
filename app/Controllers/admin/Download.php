<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\DownloadModel;

class Download extends BaseController
{
    function __construct()
    {   
        $this->m_download = new DownloadModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {
        $data['title'] = 'Download';
        $data['data'] = $this->m_download->list_download();
        return view('admin/download/index', $data);
    }

    function tambah_download()
    {
        $data['title'] = 'Tambah Download';
        return view('admin/download/form_tambah', $data);
    }

    function simpan_download()
    {
        $this->rules->setRules([
            'nama_file' => ['label' => 'Nama', 'rules' => 'required|max_length[100]'],
            'is_active' =>  ['label' => 'Status', 'rules' => 'required'],
            //'gambar' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,img/jpg,image/jpeg,image/png]',
        ]);
        
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $file = $this->request->getFile('file');
        $nama_file = '';
        if($file != '')
        {
            $nama_file = $file->getName();
            $file->move('uploads/file', $nama_file);
        }
            
        $data = [
            'nama_file' => esc($this->request->getVar('nama_file')),
            'file' => $nama_file,
            'hits' => 0,
            'id_user' => session('id_user'),
            'is_active' => esc($this->request->getVar('is_active'))
        ];

        $this->m_download->tambah_download($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/download'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    function edit_download($id)
    {   
        $cek = $this->m_download->cek_download($id);
        if($cek)
        {
            $data['title'] = 'Edit Download';
            $data['data'] = $this->m_download->get_download($id);
            return view('admin/download/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    function update_download($id)
    {
        $this->rules->setRules([
            'nama_file' => ['label' => 'Nama', 'rules' => 'required|max_length[100]'],
            'is_active' =>  ['label' => 'Status', 'rules' => 'required'],
            //'gambar' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,img/jpg,image/jpeg,image/png]',
        ]);
            
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $get = $this->m_download->cek_download($id);
        $file = $this->request->getFile('file');
        $nama_file = '';
        if($file != '')
        {
            if($get->file == '' OR $get->file == null)
            {
                $nama_file = $file->getName();
                $file->move('uploads/file', $nama_file);
            }elseif($get->file != '' AND $get->file != null)
            {
                $nama_file = $file->getName();
                $file->move('uploads/file', $nama_file);
                unlink("uploads/file/$get->file");
            }else
            {
                $nama_file = '';
            }
        }else
        {
            $nama_file = $get->file;
        }
    
        $data = [
            'nama_file' => esc($this->request->getVar('nama_file')),
            'file' => $nama_file,
            'hits' => 0,
            'id_user' => session('id_user'),
            'is_active' => esc($this->request->getVar('is_active'))
        ];
        
        $this->m_download->edit_download($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/download'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    function hapus_download($id)
    {   
        $cek = $this->m_download->cek_download($id);
        if($cek)
        {
            if($cek->file != '' AND file_exists("uploads/file/$cek->file"))
            {
                unlink("uploads/file/$cek->file");
            }
                
            $this->m_download->hapus_download($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/download'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/download'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}