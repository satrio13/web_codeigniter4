<?php

namespace App\Models;

use CodeIgniter\Model;

class PendidikanModel extends Model
{
    function tampil_kurikulum_a()
    {
        return $this->db->table('tb_kurikulum')->where('is_active', 1)->where('kelompok', 'A')->orderBy('no_urut','asc')->get()->getResult(); 
    }

    function tampil_kurikulum_b()
    {
        return $this->db->table('tb_kurikulum')->where('is_active', 1)->where('kelompok', 'B')->orderBy('no_urut','asc')->get()->getResult(); 
    }

    function tampil_kurikulum_c()
    {
        return $this->db->table('tb_kurikulum')->where('is_active', 1)->where('kelompok', 'C')->orderBy('no_urut','asc')->get()->getResult(); 
    }

    function tampil_kalender()
    {
        return $this->db->table('tb_kalender')->getWhere(['id' => 1])->getRow(); 
    }

    function cari_rekap_us($id_tahun)
    {
        return $this->db->table('tb_rekap_us u')->select('u.id_us,u.id_kurikulum,u.tertinggi,u.terendah,u.rata,u.id_tahun,m.mapel,m.is_active,t.tahun')->join('tb_kurikulum m','u.id_kurikulum=m.id_kurikulum')->join('tb_tahun t','u.id_tahun=t.id_tahun')->where('u.id_tahun', $id_tahun)->orderBy('m.mapel','asc')->get()->getResult();
    }

}