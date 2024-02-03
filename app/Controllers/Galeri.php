<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use App\Models\VideoModel;

class Galeri extends BaseController
{
    function __construct()
    {   
        $this->m_album = new AlbumModel();
        $this->m_video = new VideoModel();
    }

    public function index()
    {
        show_404();
    }

    public function foto()
    {
        $data['titleweb'] = 'Galeri Foto - '.title();
		$data['title'] = 'Foto';
        $data['data'] = $this->m_album->list_album(8);
        $data['pager'] = $this->m_album->pager;
        return view('galeri/foto', $data);
    }

    public function album($slug)
    {
        $cek = $this->m_album->cek_album($slug);
        if($cek)
        {
            $get = $this->m_album->get_album($slug);
            $data['titleweb'] = $get->album.' - '.title();
            $data['title'] = $get->album;
            $data['data'] = $this->m_album->tampil_foto($slug);
            return view('galeri/album', $data);
        }else
        {
            show_404();
        }   
    }

    public function video()
    {
        $data['titleweb'] = 'Galeri Video - '.title();
		$data['title'] = 'Video';
        $data['data'] = $this->m_video->list_video(8);
        $data['pager'] = $this->m_video->pager;
        return view('galeri/video', $data);
    }

}