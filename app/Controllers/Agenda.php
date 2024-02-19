<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AgendaModel;
use App\Models\HomeModel;

class Agenda extends BaseController
{
    function __construct()
    {   
        $this->m_agenda = new AgendaModel();
        $this->m_home = new HomeModel();
    }

    function index()
    {
		$data['titleweb'] = 'Agenda - '.title();
		$data['title'] = 'Agenda';
        $curent_page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        $keyword = $this->request->getVar('q');
        if($keyword)
        {
            $data['data'] = $this->m_agenda->list_agenda_cari(6, $keyword);
        }else
        {
            $data['data'] = $this->m_agenda->list_agenda(6);
        }
        $data['pager'] = $this->m_agenda->pager;
        $data['cari'] = $keyword;
        return view('agenda/index', $data);
    }

    function detail($slug)
    {
        $cek = $this->m_agenda->cek_agenda($slug);
        if($cek)
        {   
            $get = $this->m_agenda->detail_agenda($slug);
            $data['titleweb'] = $get->nama_agenda.' - '.title();
			$data['title'] = $get->nama_agenda;
			$data['data'] = $get;
            $data['berita_populer'] = $this->m_home->berita_populer($slug);
            $data['link_terkait'] = $this->m_home->link_terkait();
            return view('agenda/detail', $data);
        }else
        {
            show_404();
        }
    }

}