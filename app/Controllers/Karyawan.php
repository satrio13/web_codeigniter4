<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\KaryawanModel;

class Karyawan extends BaseController
{
    function __construct()
    {   
        $this->m_karyawan = new KaryawanModel();
    }

    public function index()
    {
		$data['titleweb'] = 'Karyawan - '.title();
		$data['title'] = 'Karyawan';
        $data['data'] = $this->m_karyawan->list_karyawan();
        return view('karyawan/index', $data);
    }

    public function detail($id)
    {   
        $cek = $this->m_karyawan->cek_karyawan($id);
        if($cek)
        {
            $data['titleweb'] = 'Detail Karyawan - '.title();
            $data['title'] = 'Detail Karyawan';
            $data['data'] = $this->m_karyawan->detail_karyawan($id);
            return view('karyawan/detail', $data);
        }else
        {
            show_404();
        }
    }

}