<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PendidikanModel;
use App\Models\Admin\TahunModel;

class Pendidikan extends BaseController
{
    function __construct()
    {   
        $this->m_pendidikan = new PendidikanModel();
        $this->m_tahun = new TahunModel();
    }

    public function index()
    {
        show_404();
    }

    public function kurikulum()
    {
		$data['titleweb'] = 'Pendidikan - '.title();
		$data['title'] = 'Pendidikan';
        $data['kelompok_a'] = $this->m_pendidikan->tampil_kurikulum_a();
        $data['kelompok_b'] = $this->m_pendidikan->tampil_kurikulum_b();
        $data['kelompok_c'] = $this->m_pendidikan->tampil_kurikulum_c();
        return view('pendidikan/kurikulum', $data);
    }

    public function kalender()
    {
		$data['titleweb'] = 'Kalender Akademik - '.title();
		$data['title'] = 'Kalender Akademik';
        $data['data'] = $this->m_pendidikan->tampil_kalender();
        return view('pendidikan/kalender', $data);
    }

    public function rekap_us()
    {
		if(jenjang() == 1 OR jenjang() == 2)
        { 
            $jenis = 'Sekolah';
        }else
        {
            $jenis = 'Madrasah';
        }
        
        $data['titleweb'] = "Rekap Ujian $jenis - ".title();
        $data['title'] = "Rekap Ujian $jenis";
        $data['tahun'] = $this->m_tahun->list_tahun();
        $data['submit'] = $this->request->getVar('submit');
        $data['data'] = $this->m_pendidikan->cari_rekap_us($this->request->getVar('id_tahun'));
        return view('pendidikan/rekap_us', $data);
    }

}