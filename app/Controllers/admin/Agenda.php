<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AgendaModel;

class Agenda extends BaseController
{
    function __construct()
    {   
        $this->m_agenda = new AgendaModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Agenda';
        $data['data'] = $this->m_agenda->list_agenda();
        return view('admin/agenda/index', $data);
    }
    
    public function tambah_agenda()
    {
        $data['title'] = 'Tambah Agenda';
        return view('admin/agenda/form_tambah', $data);
    }
        
    public function simpan_agenda()
    {
        if($this->request->getVar('berapa_hari') == '1')
        {   
            $this->rules->setRules([
                'nama_agenda' => ['label' => 'Nama Agenda', 'rules' => 'required|max_length[100]'],
                'berapa_hari' => ['label' => 'Berapa Hari', 'rules' => 'required|numeric'],
                'tgl' => ['label' => 'Tanggal', 'rules' => 'required|date'],
                'jam_mulai' => ['label' => 'Jam Mulai' , 'rules' => 'required'],
                'jam_selesai' => ['label' => 'Jam Selesai' , 'rules' => 'required'],
                'tempat' => ['label' => 'Tempat' , 'rules' => 'required|max_length[100]'],
                //'gambar' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,img/jpg,image/jpeg,image/png]',
            ]);
        }else
        {
            $this->rules->setRules([
                'nama_agenda' => ['label' => 'Nama Agenda', 'rules' => 'required|max_length[100]'],
                'berapa_hari' => ['label' => 'Berapa Hari', 'rules' => 'required|numeric'],
                'tgl_mulai' => ['label' => 'Tanggal Mulai', 'rules' => 'required|date'],
                'tgl_selesai' => ['label' => 'Tanggal Selesai', 'rules' => 'required|date'],
                'jam_mulai' => ['label' => 'Jam Mulai' , 'rules' => 'required'],
                'jam_selesai' => ['label' => 'Jam Selesai' , 'rules' => 'required'],
                'tempat' => ['label' => 'Tempat' , 'rules' => 'required|max_length[100]'],
            ]);
        }
            
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $gambar = $this->request->getFile('gambar');
        $nama_gambar = '';
        if($gambar != '')
        {
            $nama_gambar = $gambar->getRandomName();
            $gambar->move('uploads/img/agenda', $nama_gambar);
        }
            
        $data = [
            'nama_agenda' => esc($this->request->getVar('nama_agenda')),
            'berapa_hari' => esc($this->request->getVar('berapa_hari')),
            'tgl' => esc($this->request->getVar('tgl')),
            'tgl_mulai' => esc($this->request->getVar('tgl_mulai')),
            'tgl_selesai' => esc($this->request->getVar('tgl_selesai')),
            'jam_mulai' => esc($this->request->getVar('jam_mulai')),
            'jam_selesai' => esc($this->request->getVar('jam_selesai')),
            'keterangan' => esc($this->request->getVar('keterangan')),
            'tempat' => esc($this->request->getVar('tempat')),
            'gambar' => $nama_gambar,
            'slug' => slug(esc($this->request->getVar('nama_agenda'))),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_agenda->tambah_agenda($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/agenda'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    public function edit_agenda($id)
    {   
        $cek = $this->m_agenda->cek_agenda($id);
        if($cek)
        {
            $data['title'] = 'Edit Agenda';
            $data['data'] = $this->m_agenda->get_agenda($id);
            return view('admin/agenda/form_edit', $data);
        }else
        {
            show_404();
        }
    }

    public function update_agenda($id)
    {
        if($this->request->getVar('berapa_hari') == '1')
        {   
            $this->rules->setRules([
                'nama_agenda' => ['label' => 'Nama Agenda', 'rules' => 'required|max_length[100]'],
                'berapa_hari' => ['label' => 'Berapa Hari', 'rules' => 'required|numeric'],
                'tgl' => ['label' => 'Tanggal', 'rules' => 'required|date'],
                'jam_mulai' => ['label' => 'Jam Mulai' , 'rules' => 'required'],
                'jam_selesai' => ['label' => 'Jam Selesai' , 'rules' => 'required'],
                'tempat' => ['label' => 'Tempat' , 'rules' => 'required|max_length[100]'],
                //'gambar' => 'max_size[gambar,1024]|is_image[gambar]|mime_in[gambar,img/jpg,image/jpeg,image/png]',
            ]);
        }else
        {
            $this->rules->setRules([
                'nama_agenda' => ['label' => 'Nama Agenda', 'rules' => 'required|max_length[100]'],
                'berapa_hari' => ['label' => 'Berapa Hari', 'rules' => 'required|numeric'],
                'tgl_mulai' => ['label' => 'Tanggal Mulai', 'rules' => 'required|date'],
                'tgl_selesai' => ['label' => 'Tanggal Selesai', 'rules' => 'required|date'],
                'jam_mulai' => ['label' => 'Jam Mulai' , 'rules' => 'required'],
                'jam_selesai' => ['label' => 'Jam Selesai' , 'rules' => 'required'],
                'tempat' => ['label' => 'Tempat' , 'rules' => 'required|max_length[100]'],
            ]);
        }
            
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $get = $this->m_agenda->cek_agenda($id);
        $gambar = $this->request->getFile('gambar');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->gambar == '' OR $get->gambar == null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/agenda', $nama_gambar);
            }elseif($get->gambar != '' AND $get->gambar != null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/agenda', $nama_gambar);
                unlink("uploads/img/agenda/$get->gambar");
            }else
            {
                $nama_gambar = '';
            }
        }else
        {
            $nama_gambar = $get->gambar;
        }
        
        if($this->request->getVar('berapa_hari') == '1')
        {
            $data = [
                'nama_agenda' => esc($this->request->getVar('nama_agenda')),
                'berapa_hari' => esc($this->request->getVar('berapa_hari')),
                'tgl' => esc($this->request->getVar('tgl')),
                'tgl_mulai' => '',
                'tgl_selesai' => '',
                'jam_mulai' => esc($this->request->getVar('jam_mulai')),
                'jam_selesai' => esc($this->request->getVar('jam_selesai')),
                'keterangan' => esc($this->request->getVar('keterangan')),
                'tempat' => esc($this->request->getVar('tempat')),
                'gambar' => $nama_gambar,
                'slug' => slug(esc($this->request->getVar('nama_agenda'))),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }else
        {
            $data = [
                'nama_agenda' => esc($this->request->getVar('nama_agenda')),
                'berapa_hari' => esc($this->request->getVar('berapa_hari')),
                'tgl' => '',
                'tgl_mulai' => esc($this->request->getVar('tgl_mulai')),
                'tgl_selesai' => esc($this->request->getVar('tgl_selesai')),
                'jam_mulai' => esc($this->request->getVar('jam_mulai')),
                'jam_selesai' => esc($this->request->getVar('jam_selesai')),
                'keterangan' => esc($this->request->getVar('keterangan')),
                'tempat' => esc($this->request->getVar('tempat')),
                'gambar' => $nama_gambar,
                'slug' => slug(esc($this->request->getVar('nama_agenda'))),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        
        $this->m_agenda->edit_agenda($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/agenda'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function hapus_agenda($id)
    {   
        $cek = $this->m_agenda->cek_agenda($id);
        if($cek)
        {
            if($cek->gambar != '' AND file_exists("uploads/img/agenda/$cek->gambar"))
            {
                unlink("uploads/img/agenda/$cek->gambar");
            }
                
            $this->m_agenda->hapus_agenda($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/agenda'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/agenda'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}