<?php

namespace App\Models\Admin;

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

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function list_guru()
    {
        return $this->orderBy('id','desc')->get()->getResult();
    }

    function tambah_guru($data)
    {
        $this->insert($data);
    }

    function edit_guru($data, $id)
    {
        $this->set($data)->where(['id' => $id])->update();
    }

    function cek_guru($id)
    {
        return $this->select('id,gambar')->getWhere(['id' => $id])->getRow();
    }

    function get_guru($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    function hapus_guru($id)
    {
        $this->delete(['id' => $id]);
    }   

}