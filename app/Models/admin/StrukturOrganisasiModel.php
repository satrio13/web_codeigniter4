<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class StrukturOrganisasiModel extends Model
{
    protected $table            = 'tb_struktur_organisasi';
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
    
    function get_struktur_organisasi()
    {
        return $this->getWhere(['id' => 1])->getRow();
    }

    function edit_struktur_organisasi($data)
    {
        $this->set($data)->where(['id' => 1])->update();
    }
    
}