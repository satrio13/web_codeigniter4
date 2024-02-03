<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\SejarahModel;

class Sejarah extends BaseController
{
    function __construct()
    {   
        $this->m_sejarah = new SejarahModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Sejarah';
        $data['data'] = $this->m_sejarah->get_sejarah();
        return view('admin/sejarah/index', $data);
    }

    public function edit_sejarah()
    {
        $data['title'] = 'Edit Sejarah';
        $data['data'] = $this->m_sejarah->get_sejarah();
        return view('admin/sejarah/form_sejarah', $data);
    }

    public function update_sejarah()
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

        $this->m_sejarah->edit_sejarah($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('backend/sejarah'))->with('success', 'Data Berhasil Ditambahkan');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
        }
    }
}