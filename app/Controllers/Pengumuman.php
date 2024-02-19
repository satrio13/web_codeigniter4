<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengumumanModel;
use App\Models\HomeModel;

class Pengumuman extends BaseController
{
    function __construct()
    {   
        $this->m_pengumuman = new PengumumanModel();
        $this->m_home = new HomeModel();
    }

    function index()
    {
		$data['titleweb'] = 'Pengumuman - '.title();
		$data['title'] = 'Pengumuman';
        $curent_page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $keyword = $this->request->getVar('q');
        if($keyword)
        {
            $data['data'] = $this->m_pengumuman->list_pengumuman_cari(8, $keyword);
        }else
        {
            $data['data'] = $this->m_pengumuman->list_pengumuman(8);
        }
        $data['pager'] = $this->m_pengumuman->pager;
        $data['cari'] = $keyword;
        return view('pengumuman/index', $data);
    }

    function detail($slug)
    {
        $cek = $this->m_pengumuman->cek_pengumuman($slug);
        if($cek)
        {
            $get = $this->m_pengumuman->detail_pengumuman($slug);
            $data['titleweb'] = $get->nama.' - '.title();
			$data['title'] = $get->nama;

            $upd = [
                'dibaca' => $cek->dibaca + 1
            ];
            
            $this->m_pengumuman->update_dibaca($upd, $slug);
            $data['data'] = $get;
            $data['berita_populer'] = $this->m_home->berita_populer($slug);
            $data['link_terkait'] = $this->m_home->link_terkait();
            return view('pengumuman/detail', $data);
        }else
        {
            show_404();
        }
    }

}