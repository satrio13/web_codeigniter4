<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProfilModel;
use App\Models\HomeModel;

class Profil extends BaseController
{
    function __construct()
    {   
        $this->m_profil = new ProfilModel();
        $this->m_home = new HomeModel();
    }

    function index()
    {
        if(jenjang() == 1 OR jenjang() == 2)
        {
            $data['titleweb'] = 'Profil Sekolah - '.title();
            $data['title'] = 'Profil Sekolah';
        }else
        {
            $data['titleweb'] = 'Profil Madrasah - '.title();
            $data['title'] = 'Profil Madrasah';
        }
     
        $data['data'] = $this->m_profil->tampil_profil();
        return view('profil/index', $data);
    }

    function sejarah()
    {
        $data['titleweb'] = 'Sejarah - '.title();
        $data['title'] = 'Sejarah';
        $data['data'] = $this->m_profil->tampil_sejarah();
        return view('profil/sejarah', $data);
    }

    function visimisi()
    {
        $data['titleweb'] = 'Visi & Misi - '.title();
        $data['title'] = 'Visi & Misi';
        $data['data'] = $this->m_profil->tampil_visimisi();
        return view('profil/visimisi', $data);
    }

    function struktur_organisasi()
    {
        $data['titleweb'] = 'Struktur Organisasi - '.title();
        $data['title'] = 'Struktur Organisasi';
        $data['data'] = $this->m_profil->tampil_struktur_organisasi();
        return view('profil/struktur_organisasi', $data);
    }

    function sarpras()
    {
        $data['titleweb'] = 'Sarana & Prasarana - '.title();
        $data['title'] = 'Sarana & Prasarana';
        $data['data'] = $this->m_profil->tampil_sarpras();
        return view('profil/sarpras', $data);
    }

    function ekstrakurikuler()
    {
        $data['titleweb'] = 'Ekstrakurikuler - '.title();
        $data['title'] = 'Ekstrakurikuler';
        $data['data'] = $this->m_profil->tampil_ekstrakurikuler();
        return view('profil/ekstrakurikuler', $data);
    }

    function detail_ekstrakurikuler($slug)
    {
        $cek = $this->m_profil->cek_ekstrakurikuler($slug);
        if($cek)
        {   
            $get = $this->m_profil->get_ekstrakurikuler($slug);
            $data['titleweb'] = $get->nama_ekstrakurikuler.' - '.title();
            $data['title'] = $get->nama_ekstrakurikuler;
            $data['data'] = $get;
            $data['berita_populer'] = $this->m_home->berita_populer($slug);
            $data['link_terkait'] = $this->m_home->link_terkait();
            return view('profil/detail_ekstrakurikuler', $data);
        }else
        {
            show_404();
        }
    }

}