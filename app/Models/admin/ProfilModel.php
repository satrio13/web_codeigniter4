<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class ProfilModel extends Model
{
    protected $table            = 'tb_profil';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function get_profil($select = '*')
    {
        return $this->select($select)->getWhere(['id' => 1])->getRow();
    }

    function update_profil($data)
    {
        $this->set($data)->where(['id' => 1])->update();
    }

}