<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GuruModel;

class Guru extends BaseController
{
    function __construct()
    {   
        $this->m_guru = new GuruModel();
    }

    public function index()
    {
		$data['titleweb'] = 'Guru - '.title();
		$data['title'] = 'Guru';
        $data['data'] = $this->m_guru->list_guru();
        return view('guru/index', $data);
    }

    public function detail($id)
    {   
        $cek = $this->m_guru->cek_guru($id);
        if($cek)
        {
            $data['titleweb'] = 'Detail Guru - '.title();
            $data['title'] = 'Detail Guru';
            $data['data'] = $this->m_guru->detail_guru($id);
            return view('guru/detail', $data);
        }else
        {
            show_404();
        }
    }

}