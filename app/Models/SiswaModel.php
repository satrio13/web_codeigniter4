<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table            = 'tb_siswa';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    function list_siswa()
    {
        return $this->db->table('tb_siswa s')->select('s.*,t.tahun')->join('tb_tahun t','s.id_tahun=t.id_tahun')->orderBy('t.tahun','desc')->get()->getResult();
    }

}