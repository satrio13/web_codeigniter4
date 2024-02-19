<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class KalenderModel extends Model
{
    protected $table            = 'tb_kalender';
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

    function get_kalender()
    {
        return $this->getWhere(['id' => 1])->getRow();
    }

    function edit_kalender($data)
    {
        $this->set($data)->where(['id' => 1])->update();
    }
    
}