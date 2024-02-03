<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PengaduanModel extends Model
{
    protected $table            = 'tb_pengaduan';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $afterDelete    = [];
    
    function list_pengaduan()
    {
        return $this->orderBy('id','desc')->get()->getResult();
    }

    function cek_pengaduan($id)
    {
        return $this->select('id')->getWhere(['id' => $id])->getRow();
    }

    function get_pengaduan($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    function hapus_pengaduan($id)
    {
        $this->where(['id' => $id])->delete();
    }

}