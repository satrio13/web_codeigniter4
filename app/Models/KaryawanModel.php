<?php

namespace App\Models;

use CodeIgniter\Model;

class KaryawanModel extends Model
{
    protected $table            = 'tb_karyawan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    function list_karyawan()
    {
        return $this->orderBy('nama','asc')->get()->getResult();
    }

    function cek_karyawan($id)
    {
        return $this->select('id')->getWhere(['id' => $id])->getRow();
    }

    function detail_karyawan($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

}