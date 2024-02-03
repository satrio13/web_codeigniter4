<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    public function tampil_profil()
    {
        return $this->db->table('tb_profil')->getWhere(['id' => 1])->getRow();
    }

    public function tampil_sejarah()
    {
        return $this->db->table('tb_sejarah')->getWhere(['id' => 1])->getRow();
    }

    public function tampil_visimisi()
    {
        return $this->db->table('tb_visimisi')->getWhere(['id' => 1])->getRow();
    }

    public function tampil_struktur_organisasi()
    {
        return $this->db->table('tb_struktur_organisasi')->getWhere(['id' => 1])->getRow();
    }

    public function tampil_sarpras()
    {
        return $this->db->table('tb_sarpras')->getWhere(['id' => 1])->getRow();
    }

    public function tampil_ekstrakurikuler()
    {
        return $this->db->table('tb_ekstrakurikuler')->orderBy('nama_ekstrakurikuler','asc')->get()->getResult();
    }

    public function cek_ekstrakurikuler($slug)
    {
        return $this->db->table('tb_ekstrakurikuler')->select('slug')->getWhere(['slug' => $slug])->getRow();
    }

    public function get_ekstrakurikuler($slug)
    {
        return $this->db->table('tb_ekstrakurikuler')->getWhere(['slug' => $slug])->getRow();
    }

}