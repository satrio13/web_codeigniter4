<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\SarprasModel;

class Sarpras extends BaseController
{
    function __construct()
    {   
        $this->m_sarpras = new SarprasModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {
        $data['title'] = 'Sarana & Prasarana';
        $data['data'] = $this->m_sarpras->get_sarpras();
        return view('admin/sarpras/index', $data);
    }

    function edit_sarpras()
    {
        $data['title'] = 'Edit Sarana & Prasarana';
        $data['data'] = $this->m_sarpras->get_sarpras();
        return view('admin/sarpras/form_sarpras', $data);
    }

    function update_sarpras()
    {
        $this->rules->setRules([
            'isi' => ['label' => 'Isi', 'rules' => 'required'],
        ]);
        
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }
            
        $data = [
            'isi' => $this->request->getVar('isi')
        ];

        $this->m_sarpras->edit_sarpras($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/sarpras'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }
}