<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\IsiAlumniModel;

class Dashboard extends BaseController
{
    function __construct()
    {   
        $this->m_isialumni = new IsiAlumniModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    function index()
    {
        $data['title'] = 'Hasil Penelusuran Alumni';
        $data['data'] = $this->m_isialumni->list_isialumni();
        return view('admin/alumni/penelusuran', $data);
    }

}