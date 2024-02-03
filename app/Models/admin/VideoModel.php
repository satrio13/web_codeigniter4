<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class VideoModel extends Model
{
    protected $table            = 'tb_video';
    protected $primaryKey       = 'id_video';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function list_video()
    {
        return $this->orderBy('id_video','desc')->get()->getResult();
    }

    function tambah_video($data)
    {
        $this->insert($data);
    }

    function edit_video($data, $id)
    {
        $this->set($data)->where(['id_video' => $id])->update();
    }

    function cek_video($id)
    {
        return $this->select('id_video')->getWhere(['id_video' => $id])->getRow();
    }

    function get_video($id)
    {
        return $this->getWhere(['id_video' => $id])->getRow();
    }

    function hapus_video($id)
    {
        $this->delete(['id_video' => $id]);
    }

}
