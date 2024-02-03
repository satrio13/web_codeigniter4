<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengaduanModel;

class Pengaduan extends BaseController
{
    function __construct()
    {   
        $this->m_pengaduan = new PengaduanModel();
    }

    public function index()
    {
        $data['titleweb'] = 'Layanan Pengaduan - '.title();
		$data['title'] = 'Layanan Pengaduan';
        return view('pengaduan/index', $data);
    }

    function simpan_pengaduan()
    {
        $this->rules->setRules([
            'nama' => ['label' => 'Nama', 'rules' => 'required|max_length[50]'],
            'status' => ['label' => 'Status', 'rules' => 'required|numeric'],
            'isi' => ['label' => 'Isi', 'rules' => 'required'],
        ]);

        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'nama' => esc($this->request->getVar('nama')),
            'status' => esc($this->request->getVar('status')),
            'isi' => esc($this->request->getVar('isi')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_pengaduan->simpan_pengaduan($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('pengaduan'))->with('success', 'TERIMAKASIH, DATA BERHASIL DIKIRIM');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Disimpan, silahkan coba lagi!');
        }
    }
    
}