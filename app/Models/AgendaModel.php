<?php

namespace App\Models;

use CodeIgniter\Model;

class AgendaModel extends Model
{
    protected $table            = 'tb_agenda';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    function list_agenda($page)
    {
        return $this->orderBy('id','desc')->paginate($page);
    }

    function list_agenda_cari($page, $keyword)
    {
        return $this->like('nama_agenda', $keyword)->orderBy('id','desc')->paginate($page);
    }

    function cek_agenda($slug)
    {
        return $this->select('slug')->getWhere(['slug' => $slug])->getRow();
    }

    function detail_agenda($slug)
    {
        return $this->getWhere(['slug' => $slug])->getRow();
    }

}