<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\HomeModel;

class Berita extends BaseController
{
    function __construct()
    {   
        $this->m_berita = new BeritaModel();
        $this->m_home = new HomeModel();
    }

    function index()
    {
		$data['titleweb'] = 'Berita - '.title();
		$data['title'] = 'Berita';
        $curent_page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $keyword = $this->request->getVar('q');
        if($keyword)
        {
            $data['data'] = $this->m_berita->list_berita_cari(8, $keyword);
        }else
        {
            $data['data'] = $this->m_berita->list_berita(8);
        }
        $data['pager'] = $this->m_berita->pager;
        $data['cari'] = $keyword;
        return view('berita/index', $data);
    }

    function detail($slug)
    {
        $cek = $this->m_berita->cek_berita($slug);
        if($cek)
        {
            $get = $this->m_berita->detail_berita($slug);
            $data['titleweb'] = $get->nama.' - '.title();
			$data['title'] = $get->nama;

            $upd = [
                'dibaca' => $cek->dibaca + 1
            ];
            
            $this->m_berita->update_dibaca($upd, $slug);
            $data['data'] = $get;
            $data['berita_populer'] = $this->m_home->berita_populer($slug);
            $data['link_terkait'] = $this->m_home->link_terkait();
            return view('berita/detail', $data);
        }else
        {
            show_404();
        }
    }

}