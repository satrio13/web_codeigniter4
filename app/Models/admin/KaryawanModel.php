<?php

namespace App\Models\Admin;

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

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function list_karyawan()
    {
        return $this->orderBy('id','desc')->get()->getResult();
    }

    function tambah_karyawan($data)
    {
        $this->insert($data);
    }

    function edit_karyawan($data, $id)
    {
        $this->set($data)->where(['id' => $id])->update();
    }

    function cek_karyawan($id)
    {
        return $this->select('id,gambar')->getWhere(['id' => $id])->getRow();
    }

    function get_karyawan($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    function hapus_karyawan($id)
    {
        $this->delete(['id' => $id]);
    }   

}