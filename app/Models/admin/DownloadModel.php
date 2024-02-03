<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class DownloadModel extends Model
{
    protected $table            = 'tb_download';
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

    function list_download()
    {
        return $this->db->table('tb_download d')->select('d.*,u.nama')->join('tb_user u', 'd.id_user=u.id_user')->orderBy('d.id','desc')->get()->getResult();
    }

    function tambah_download($data)
    {
        $this->insert($data);
    }

    function edit_download($data, $id)
    {
        $this->set($data)->where(['id' => $id])->update();
    }

    function cek_download($id)
    {
        return $this->select('id,file')->getWhere(['id' => $id])->getRow();
    }

    function get_download($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    function hapus_download($id)
    {
        $this->delete(['id' => $id]);
    }

}