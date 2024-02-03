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

    public function list_karyawan()
    {
        return $this->orderBy('nama','asc')->get()->getResult();
    }

    public function cek_karyawan($id)
    {
        return $this->select('id')->getWhere(['id' => $id])->getRow();
    }

    public function detail_karyawan($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

}