<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table            = 'tb_berita';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    function list_berita($page)
    {
        return $this->where('is_active', 1)->orderBy('id','desc')->paginate($page);
    }

    function list_berita_cari($page, $keyword)
    {
        return $this->where('is_active', 1)->like('nama', $keyword)->orderBy('id','desc')->paginate($page);
    }

    function cek_berita($slug)
    {
        return $this->select('slug,dibaca')->getWhere(['slug' => $slug])->getRow();
    }

    function detail_berita($slug)
    {
        return $this->getWhere(['slug' => $slug])->getRow();
    }

    function update_dibaca($data, $slug)
    {
        $this->set($data)->where(['slug' => $slug])->update();
    }

}