<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlumniModel;

class Alumni extends BaseController
{
    function __construct()
    {   
        $this->m_alumni = new AlumniModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {
        $data['titleweb'] = 'Alumni - '.title();
		$data['title'] = 'Alumni';
        $data['data'] = $this->m_alumni->list_alumni();
        return view('alumni/index', $data);
    }

    function penelusuran_alumni()
    {
        $data['titleweb'] = 'Penelusuran Alumni - '.title();
		$data['title'] = 'Penelusuran Alumni';
        $data['data'] = $this->m_alumni->list_isialumni();
        return view('alumni/penelusuran', $data);
    }

    function simpan_penelusuran_alumni()
    {
        $this->rules->setRules([
            'nama' => ['label' => 'Nama', 'rules' => 'required|max_length[100]'],
            'th_lulus' => ['label' => 'Tahun Lulus', 'rules' => 'required|min_length[4]|max_length[4]'],
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
            $gambar->move('uploads/img/alumni', $nama_gambar);
        }

        $data = [
            'nama' => esc($this->request->getVar('nama')),
            'th_lulus' => esc($this->request->getVar('th_lulus')),
            'sma' => esc($this->request->getVar('sma')),
            'pt' => esc($this->request->getVar('pt')),
            'instansi' => esc($this->request->getVar('instansi')),
            'alamatins' => esc($this->request->getVar('alamatins')),
            'hp' => esc($this->request->getVar('hp')),
            'email' => esc($this->request->getVar('alamat')),
            'alamat' => esc($this->request->getVar('email')),
            'kesan' => esc($this->request->getVar('kesan')),
            'gambar' => $nama_gambar,
            'status' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_alumni->simpan_penelusuran_alumni($data);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->to(base_url('alumni/penelusuran-alumni'))->with('success', 'TERIMAKASIH, DATA BERHASIL DIKIRIM');
        }else
        {
            return redirect()->back()->withInput()->with('error', 'Data Gagal Disimpan, silahkan coba lagi!');
        }
    }

}
