<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\VisiMisiModel;

class VisiMisi extends BaseController
{
    function __construct()
    {   
        $this->m_visimisi = new VisiMisiModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Visi & Misi';
        $data['data'] = $this->m_visimisi->get_visimisi();
        return view('admin/visi_misi/index', $data);
    }

    public function edit_visi_misi()
    {
        $data['title'] = 'Edit Visi & Misi';
        $data['data'] = $this->m_visimisi->get_visimisi();
        return view('admin/visi_misi/form_visi_misi', $data);
    }

    public function update_visi_misi()
    {
        $this->rules->setRules([
            'isi' => ['label' => 'Isi', 'rules' => 'required'],
        ]);
        
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }
            
        $data = [
            'isi' => $this->request->getVar('isi'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_visimisi->edit_visimisi($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/visi-misi'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }
}