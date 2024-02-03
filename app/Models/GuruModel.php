<?php

namespace App\Models;

use CodeIgniter\Model;

class GuruModel extends Model
{
    protected $table            = 'tb_guru';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    public function list_guru()
    {
        return $this->orderBy('nama','asc')->get()->getResult();
    }

    public function cek_guru($id)
    {
        return $this->select('id')->getWhere(['id' => $id])->getRow();
    }

    public function detail_guru($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

}