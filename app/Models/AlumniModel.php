<?php

namespace App\Models;

use CodeIgniter\Model;

class AlumniModel extends Model
{
    public function list_isialumni()
    {
        return $this->db->table('tb_isialumni')->where('status', 1)->orderBy('updated_at','desc')->get()->getResult();
    }

    public function list_alumni()
    {
        return $this->db->table('tb_alumni a')->select('a.*,t.tahun')->join('tb_tahun t','a.id_tahun=t.id_tahun')->orderBy('t.tahun','desc')->get()->getResult();
    }

    public function simpan_penelusuran_alumni($data)
    {
        return $this->db->table('tb_isialumni')->insert($data);
    }
    
}