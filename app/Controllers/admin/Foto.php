<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\FotoModel;
use App\Models\Admin\AlbumModel;

class Foto extends BaseController
{
    function __construct()
    {   
        $this->m_foto = new FotoModel();
        $this->m_album = new AlbumModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title'] = 'Foto';
        $data['data'] = $this->m_foto->list_foto();
        $data['album'] = $this->m_album->list_album_order_by_name_asc();
        return view('admin/foto/index', $data);
    }

    public function simpan_foto()
    {
        $gambar = $this->request->getFileMultiple('files');
        if(!empty($gambar))
        {
            foreach($gambar as $file)
            {
                $nama_gambar = $file->getRandomName();
                $file->move('uploads/img/foto', $nama_gambar);
                
                $data = [
                    'id_album' => esc($this->request->getVar('id_album')),
                    'foto' => $nama_gambar,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s') 
                ];

                $this->m_foto->tambah_foto($data);
            }

            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/foto'))->with('success', 'File Berhasil Diupload');
            }else
            {
                return redirect()->back()->with('error', 'File gagal diupload, silahkan coba lagi!');
            }
        }else
        {
            return redirect()->back()->with('error', 'File gagal diupload! periksa kembali format dan ukuran file anda..');
        }
    }

    public function hapus_foto($id)
    {   
        $cek = $this->m_foto->cek_foto($id);
        if($cek)
        {
            if($cek->foto != '' AND file_exists("uploads/img/foto/$cek->foto"))
            {
                unlink("uploads/img/foto/$cek->foto");
            }
                
            $this->m_foto->hapus_foto($id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/foto'))->with('success', 'Data Berhasil Dihapus');
            }else
            {
                return redirect()->to(base_url('backend/foto'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

}