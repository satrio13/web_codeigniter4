<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class IsiAlumniModel extends Model
{
    protected $table            = 'tb_isialumni';
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
 
    function list_isialumni()
    {
        return $this->orderBy('id','desc')->get()->getResult();
    }

    function edit_status($data, $id)
    {
        $this->db->table('tb_isialumni')->where(['id' => $id])->update($data);
    }

    function cek_isialumni($id)
    {
        return $this->select('id,gambar')->getWhere(['id' => $id])->getRow();
    }

    function get_isialumni($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    function hapus_isialumni($id)
    {
        $this->where(['id' => $id])->delete();
    }
    
}