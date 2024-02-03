<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class TahunModel extends Model
{
    protected $table            = 'tb_tahun';
    protected $primaryKey       = 'id_tahun';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function list_tahun()
    {
        return $this->orderBy('id_tahun','desc')->get()->getResult();
    }

    function tambah_tahun($data)
    {
        $this->insert($data);
    }

    function edit_tahun($data, $id)
    {
        $this->set($data)->where(['id_tahun' => $id])->update();
    }

    function cek_tahun($id)
    {
        return $this->select('id_tahun')->getWhere(['id_tahun' => $id])->getRow();
    }

    function get_tahun($id)
    {
        return $this->getWhere(['id_tahun' => $id])->getRow();
    }

    function hapus_tahun($id)
    {
        $this->delete(['id_tahun' => $id]);
    }
 
}