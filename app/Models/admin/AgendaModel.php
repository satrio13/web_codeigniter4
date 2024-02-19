<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table            = 'tb_agenda';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function list_agenda()
    {
        return $this->orderBy('id','desc')->get()->getResult();
    }

    function tambah_agenda($data)
    {
        $this->insert($data);
    }

    function edit_agenda($data, $id)
    {
        $this->set($data)->where(['id' => $id])->update();
    }

    function cek_agenda($id)
    {
        return $this->select('id,gambar')->getWhere(['id' => $id])->getRow();
    }

    function get_agenda($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    function hapus_agenda($id)
    {
        $this->delete(['id' => $id]);
    }
    
}