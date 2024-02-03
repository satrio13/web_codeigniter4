<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class SejarahModel extends Model
{
    protected $table            = 'tb_sejarah';
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

    function get_sejarah()
    {
        return $this->getWhere(['id' => 1])->getRow();
    }

    function edit_sejarah($data)
    {
        $this->set($data)->where(['id' => 1])->update();
    }

}