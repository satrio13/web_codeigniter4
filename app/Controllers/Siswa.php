<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SiswaModel;

class Siswa extends BaseController
{
    function __construct()
    {   
        $this->m_siswa = new SiswaModel();
    }

    function index()
    {
		$data['titleweb'] = 'Peserta Didik - '.title();
		$data['title'] = 'Peserta Didik';
        $data['data'] = $this->m_siswa->list_siswa();
        return view('siswa/index', $data);
    }

}