<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class LinkModel extends Model
{
    protected $table            = 'tb_link';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function list_link()
    {
        return $this->orderBy('id','desc')->get()->getResult();
    }

    function tambah_link($data)
    {
        $this->insert($data);
    }

    function edit_link($data, $id)
    {
        $this->set($data)->where(['id' => $id])->update();
    }

    function cek_link($id)
    {
        return $this->select('id')->getWhere(['id' => $id])->getRow();
    }

    function get_link($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    function hapus_link($id)
    {
        $this->delete(['id' => $id]);
    }

}