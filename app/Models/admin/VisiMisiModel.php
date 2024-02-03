<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class VisiMisiModel extends Model
{
    protected $table            = 'tb_visimisi';
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

    function get_visimisi()
    {
        return $this->getWhere(['id' => 1])->getRow();
    }

    function edit_visimisi($data)
    {
        $this->set($data)->where(['id' => 1])->update();
    }

}