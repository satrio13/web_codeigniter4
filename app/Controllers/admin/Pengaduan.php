<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PengaduanModel;

class Pengaduan extends BaseController
{
    function __construct()
    {   
        $this->m_pengaduan = new PengaduanModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Pengaduan';
        $data['data'] = $this->m_pengaduan->list_pengaduan();
        return view('admin/pengaduan/index', $data);
    }

    public function detail_pengaduan($id)
    {   
        $cek = $this->m_pengaduan->cek_pengaduan($id);
        if($cek)
        {
            $data['title'] = 'Detail Pengaduan';
            $data['data'] = $this->m_pengaduan->get_pengaduan($id);
            return view('admin/pengaduan/detail', $data);
        }else
        {
            show_404();
        }
    }

    function lihat_pengaduan($id)
	{ 
        $data = $this->m_pengaduan->get_pengaduan($id);
        echo json_encode($data);
    }

    public function hapus_pengaduan($id)
    {   
        $cek = $this->m_pengaduan->cek_pengaduan($id);
        if($cek)
        {
            $this->m_pengaduan->hapus_pengaduan($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/pengaduan'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/pengaduan'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}