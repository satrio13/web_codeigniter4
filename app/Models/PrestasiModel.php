<?php

namespace App\Models;

use CodeIgniter\Model;

class PrestasiModel extends Model
{
    function list_prestasi_siswa()
    {
        return $this->db->table('tb_prestasi_siswa p')->select('p.*,t.tahun')->join('tb_tahun t','p.id_tahun=t.id_tahun')->orderBy('p.id','desc')->get()->getResult();
    }

    function list_prestasi_guru()
    {
        return $this->db->table('tb_prestasi_guru p')->select('p.*,t.tahun')->join('tb_tahun t','p.id_tahun=t.id_tahun')->orderBy('p.id','desc')->get()->getResult();
    }

    function list_prestasi_sekolah()
    {
        return $this->db->table('tb_prestasi_sekolah p')->select('p.*,t.tahun')->join('tb_tahun t','p.id_tahun=t.id_tahun')->orderBy('p.id','desc')->get()->getResult();
    }
    
}