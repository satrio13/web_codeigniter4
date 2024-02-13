<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\ProfilModel;

class Profil extends BaseController
{
    function __construct()
    {   
        $this->m_profil = new ProfilModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Profil Website';
        $data['data'] = $this->m_profil->get_profil();
        return view('admin/profil/index', $data);
    }

    public function edit_profil_web()
    {
        $data['title'] = 'Edit Profil Website';
        $data['data'] = $this->m_profil->get_profil();
        return view('admin/profil/form_profil_web', $data);
    }

    public function update_profil_web()
    {
        $this->rules->setRules([
            'nama_web' =>  ['label' => 'Nama Website', 'rules' => 'required|max_length[100]'],
            'jenjang' =>  ['label' => 'Jenjang', 'rules' => 'required|numeric'],
            'meta_description' =>  ['label' => 'Meta Description', 'rules' => 'required|max_length[300]'],
            'meta_keyword' =>  ['label' => 'Meta Keyword', 'rules' => 'required|max_length[200]'],
            'alamat' =>  ['label' => 'Alamat', 'rules' => 'required|max_length[300]'],
            'email' =>  ['label' => 'Email', 'rules' => 'required|max_length[100]'],
            'telp' =>  ['label' => 'Telp', 'rules' => 'required|max_length[20]'],
            'fax' =>  ['label' => 'Fax', 'rules' => 'required|max_length[20]'],
            'whatsapp' =>  ['label' => 'Whatsapp', 'rules' => 'max_length[20]'],
            'akreditasi' =>  ['label' => 'Akreditasi', 'rules' => 'max_length[5]'],
            'kurikulum' =>  ['label' => 'Kurikulum', 'rules' => 'required|max_length[30]'],
            'nama_kepsek' =>  ['label' => 'Nama Kepsek', 'rules' => 'required|max_length[100]'],
            'nama_operator' =>  ['label' => 'Nama Operator', 'rules' => 'required|max_length[100]'],
            'instagram' =>  ['label' => 'Instagram', 'rules' => 'max_length[200]'],
            'facebook' =>  ['label' => 'Facebook', 'rules' => 'max_length[200]'],
            'twitter' =>  ['label' => 'Twitter', 'rules' => 'max_length[200]'],
            'youtube' =>  ['label' => 'Youtube', 'rules' => 'max_length[200]'],
        ]);
        
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }
    
        $data = [
            'nama_web' => esc($this->request->getVar('nama_web')),
            'jenjang' => esc($this->request->getVar('jenjang')),
            'meta_description' => esc($this->request->getVar('meta_description')),
            'meta_keyword' => esc($this->request->getVar('meta_keyword')),
            'profil' => esc($this->request->getVar('profil')),
            'alamat' => esc($this->request->getVar('alamat')),
            'email' => esc($this->request->getVar('email')),
            'telp' => esc($this->request->getVar('telp')),
            'fax' => esc($this->request->getVar('fax')),
            'whatsapp' => esc($this->request->getVar('whatsapp')),
            'akreditasi' => esc($this->request->getVar('akreditasi')),
            'kurikulum' => esc($this->request->getVar('kurikulum')),
            'nama_kepsek' => esc($this->request->getVar('nama_kepsek')),
            'nama_operator' => esc($this->request->getVar('nama_operator')),
            'instagram' => esc($this->request->getVar('instagram')),
            'facebook' => esc($this->request->getVar('facebook')),
            'twitter' => esc($this->request->getVar('twitter')),
            'youtube' => esc($this->request->getVar('youtube')),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_profil->update_profil($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/profil-web'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }

    public function logo_web()
    {
        $data['title'] = 'Edit Logo Website';
        $data['data'] = $this->m_profil->get_profil('logo_web');
        return view('admin/profil/form_logo_web', $data);
    }

    public function update_logo_web()
    {
        $get = $this->m_profil->get_profil('logo_web');
        $gambar = $this->request->getFile('logo_web');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->logo_web == '' OR $get->logo_web == null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/logo', $nama_gambar);
            }elseif($get->logo_web != '' AND $get->logo_web != null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/logo', $nama_gambar);
                if(file_exists("uploads/img/logo/$get->logo_web"))
                {
                    unlink("uploads/img/logo/$get->logo_web");
                }
            }else
            {
                $nama_gambar = '';
            }
        }else
        {
            return redirect()->back()->with('error', 'Anda belum memilih file yang akan diupload!');
        }
    
        $data = [
            'logo_web' => $nama_gambar
        ];
        
        $this->m_profil->update_profil($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/profil-web'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'File Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function favicon()
    {
        $data['title'] = 'Edit Favicon';
        $data['data'] = $this->m_profil->get_profil('favicon');
        return view('admin/profil/form_favicon', $data);
    }

    public function update_favicon()
    {
        $get = $this->m_profil->get_profil('favicon');
        $gambar = $this->request->getFile('favicon');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->favicon == '' OR $get->favicon == null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/logo', $nama_gambar);
            }elseif($get->favicon != '' AND $get->favicon != null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/logo', $nama_gambar);
                if(file_exists("uploads/img/logo/$get->favicon"))
                {
                    unlink("uploads/img/logo/$get->favicon");
                }
            }else
            {
                $nama_gambar = '';
            }
        }else
        {
            return redirect()->back()->with('error', 'Anda belum memilih file yang akan diupload!');
        }
    
        $data = [
            'favicon' => $nama_gambar
        ];
        
        $this->m_profil->update_profil($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/profil-web'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'File Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function logo_admin()
    {
        $data['title'] = 'Edit Logo Admin';
        $data['data'] = $this->m_profil->get_profil('logo_admin');
        return view('admin/profil/form_logo_admin', $data);
    }

    public function update_logo_admin()
    {
        $get = $this->m_profil->get_profil('logo_admin');
        $gambar = $this->request->getFile('logo_admin');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->logo_admin == '' OR $get->logo_admin == null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/logo', $nama_gambar);
            }elseif($get->logo_admin != '' AND $get->logo_admin != null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/logo', $nama_gambar);
                if(file_exists("uploads/img/logo/$get->logo_admin"))
                {
                    unlink("uploads/img/logo/$get->logo_admin");
                }
            }else
            {
                $nama_gambar = '';
            }
        }else
        {
            return redirect()->back()->with('error', 'Anda belum memilih file yang akan diupload!');
        }
    
        $data = [
            'logo_admin' => $nama_gambar
        ];
        
        $this->m_profil->update_profil($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/profil-web'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'File Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function gambar_profil()
    {
        $data['title'] = 'Edit Gambar Profil';
        $data['data'] = $this->m_profil->get_profil('gambar');
        return view('admin/profil/form_gambar', $data);
    }

    public function update_gambar_profil()
    {
        $get = $this->m_profil->get_profil('gambar');
        $gambar = $this->request->getFile('gambar');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->gambar == '' OR $get->gambar == null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/profil', $nama_gambar);
            }elseif($get->gambar != '' AND $get->gambar != null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/img/profil', $nama_gambar);
                if(file_exists("uploads/img/profil/$get->gambar"))
                {
                    unlink("uploads/img/profil/$get->gambar");
                }
            }else
            {
                $nama_gambar = '';
            }
        }else
        {
            return redirect()->back()->with('error', 'Anda belum memilih file yang akan diupload!');
        }
    
        $data = [
            'gambar' => $nama_gambar
        ];
        
        $this->m_profil->update_profil($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/profil-web'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'File Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function file()
    {
        $data['title'] = 'Edit File';
        $data['data'] = $this->m_profil->get_profil('file');
        return view('admin/profil/form_file', $data);
    }

    public function update_file()
    {
        $get = $this->m_profil->get_profil('file');
        $gambar = $this->request->getFile('file');
        $nama_gambar = '';
        if($gambar != '')
        {
            if($get->file == '' OR $get->file == null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/file', $nama_gambar);
            }elseif($get->file != '' AND $get->file != null)
            {
                $nama_gambar = $gambar->getRandomName();
                $gambar->move('uploads/file', $nama_gambar);
                if(file_exists("uploads/file/$get->file"))
                {
                    unlink("uploads/file/$get->file");
                }
            }else
            {
                $nama_gambar = '';
            }
        }else
        {
            return redirect()->back()->with('error', 'Anda belum memilih file yang akan diupload!');
        }
    
        $data = [
            'file' => $nama_gambar
        ];
        
        $this->m_profil->update_profil($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/profil-web'))->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'File Gagal Diupdate, silahkan coba lagi!');
        }
    }

}