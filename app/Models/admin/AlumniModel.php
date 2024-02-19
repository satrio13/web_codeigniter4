<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AlumniModel extends Model
{
    protected $table            = 'tb_alumni';
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

    function list_alumni()
    {
        return $this->db->table('tb_alumni a')->select('a.*,t.tahun')->join('tb_tahun t','a.id_tahun=t.id_tahun')->orderBy('a.id','desc')->get()->getResult();
    }

    function tambah_alumni($data)
    {
        $this->insert($data);
    }

    function edit_alumni($data, $id)
    {
        $this->set($data)->where(['id' => $id])->update();
    }

    function cek_alumni($id)
    {
        return $this->select('id')->getWhere(['id' => $id])->getRow();
    }

    function get_alumni($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    function hapus_alumni($id)
    {
        $this->delete(['id' => $id]);
    }

}