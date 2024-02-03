<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class KurikulumModel extends Model
{
    protected $table            = 'tb_kurikulum';
    protected $primaryKey       = 'id_kurikulum';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function list_kurikulum()
    {
        return $this->orderBy('id_kurikulum','desc')->get()->getResult();
    }

    function tambah_kurikulum($data)
    {
        $this->insert($data);
    }

    function edit_kurikulum($data, $id)
    {
        $this->set($data)->where(['id_kurikulum' => $id])->update();
    }

    function cek_kurikulum($id)
    {
        return $this->select('id_kurikulum')->getWhere(['id_kurikulum' => $id])->getRow();
    }

    function get_kurikulum($id)
    {
        return $this->getWhere(['id_kurikulum' => $id])->getRow();
    }

    function hapus_kurikulum($id)
    {
        $this->delete(['id_kurikulum' => $id]);
    }   
    
}