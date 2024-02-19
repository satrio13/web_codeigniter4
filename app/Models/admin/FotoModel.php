<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class FotoModel extends Model
{
    protected $table            = 'tb_foto';
    protected $primaryKey       = 'id_foto';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function list_foto()
    {
        return $this->db->table('tb_foto f')->select('f.*,a.album')->join('tb_album a','f.id_album=a.id_album')->orderBy('f.id_foto','desc')->get()->getResult();
    }

    function cek_foto($id)
    {
        return $this->select('id_foto,foto')->getWhere(['id_foto' => $id])->getRow();
    }

    function tambah_foto($data)
    {
        $this->insert($data);
    }

    function hapus_foto($id)
    {
        $this->delete(['id_foto' => $id]);
    }   

}
