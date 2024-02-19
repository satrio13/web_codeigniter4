<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PrestasiModel;

class Prestasi extends BaseController
{
    function __construct()
    {   
        $this->m_prestasi = new PrestasiModel();
    }

    function prestasi_siswa()
    {
		$data['titleweb'] = 'Prestasi Siswa - '.title();
		$data['title'] = 'Prestasi Siswa';
        $data['data'] = $this->m_prestasi->list_prestasi_siswa();
        return view('prestasi/prestasi_siswa', $data);
    }

    function prestasi_madrasah()
    {
        if(jenjang() == 3 OR jenjang() == 4)
        {
            $data['titleweb'] = 'Prestasi Madrasah - '.title();
            $data['title'] = 'Prestasi Madrasah';
            $data['data'] = $this->m_prestasi->list_prestasi_sekolah();
            return view('prestasi/prestasi_sekolah', $data);
        }else
        {
            show_404();
        }
    }

    function prestasi_sekolah()
    {
        if(jenjang() == 1 OR jenjang() == 2)
        {
            $data['titleweb'] = 'Prestasi Sekolah - '.title();
            $data['title'] = 'Prestasi Sekolah';
            $data['data'] = $this->m_prestasi->list_prestasi_sekolah();
            return view('prestasi/prestasi_sekolah', $data);
        }else
        {
            show_404();
        }
    }

    function prestasi_guru()
    {
		$data['titleweb'] = 'Prestasi Guru - '.title();
		$data['title'] = 'Prestasi Guru';
        $data['data'] = $this->m_prestasi->list_prestasi_guru();
        return view('prestasi/prestasi_guru', $data);
    }

}