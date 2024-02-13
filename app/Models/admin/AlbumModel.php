<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AlbumModel extends Model
{
    protected $table            = 'tb_album';
    protected $primaryKey       = 'id_album';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function list_album()
    {
        return $this->orderBy('id_album','desc')->get()->getResult();
    }
    
    function list_album_order_by_name_asc()
    {
        return $this->orderBy('album','asc')->get()->getResult();
    }

    function tambah_album($data)
    {
        $this->insert($data);
    }

    function edit_album($data, $id)
    {
        $this->set($data)->where(['id_album' => $id])->update();
    }

    function cek_album($id)
    {
        return $this->select('id_album')->getWhere(['id_album' => $id])->getRow();
    }

    function get_album($id)
    {
        return $this->getWhere(['id_album' => $id])->getRow();
    }

    function hapus_album($id)
    {
        $this->delete(['id_album' => $id]);
    }

}