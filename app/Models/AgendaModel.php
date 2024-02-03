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

    public function list_agenda($page)
    {
        return $this->orderBy('id','desc')->paginate($page);
    }

    public function list_agenda_cari($page, $keyword)
    {
        return $this->like('nama_agenda', $keyword)->orderBy('id','desc')->paginate($page);
    }

    public function cek_agenda($slug)
    {
        return $this->select('slug')->getWhere(['slug' => $slug])->getRow();
    }

    public function detail_agenda($slug)
    {
        return $this->getWhere(['slug' => $slug])->getRow();
    }

}