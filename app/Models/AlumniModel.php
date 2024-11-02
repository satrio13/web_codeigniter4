<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{
    function list_isialumni()
    {
        return $this->db->table('tb_isialumni')->where('status', 1)->orderBy('created_at','desc')->get()->getResult();
    }

    function list_alumni()
    {
        return $this->db->table('tb_alumni a')->select('a.*,t.tahun')->join('tb_tahun t','a.id_tahun=t.id_tahun')->orderBy('t.tahun','desc')->get()->getResult();
    }

    function simpan_penelusuran_alumni($data)
    {
        return $this->db->table('tb_isialumni')->insert($data);
    }
    
}
