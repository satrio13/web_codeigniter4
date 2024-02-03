<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class EkstrakurikulerModel extends Model
{
    protected $table            = 'tb_ekstrakurikuler';
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

    function list_ekstrakurikuler()
    {
        return $this->orderBy('id','desc')->get()->getResult();
    }

    function tambah_ekstrakurikuler($data)
    {
        $this->insert($data);
    }

    function edit_ekstrakurikuler($data, $id)
    {
        $this->set($data)->where(['id' => $id])->update();
    }

    function cek_ekstrakurikuler($id)
    {
        return $this->select('id,gambar')->getWhere(['id' => $id])->getRow();
    }

    function get_ekstrakurikuler($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    function hapus_ekstrakurikuler($id)
    {
        $this->delete(['id' => $id]);
    }   

}