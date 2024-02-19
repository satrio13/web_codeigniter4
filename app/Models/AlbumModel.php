<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumModel extends Model
{
    protected $table            = 'tb_album';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    function list_album($page)
    {
        return $this->where('is_active', 1)->orderBy('updated_at','desc')->paginate($page);
    }

    function cek_album($slug)
    {
        return $this->select('slug')->getWhere(['slug' => $slug, 'is_active' => 1])->getRow();
    }

    function get_album($slug)
    {
        return $this->getWhere(['slug' => $slug, 'is_active' => 1])->getRow();
    }

    function tampil_foto($slug)
    {
        return $this->db->table('tb_foto f')->select('f.id_foto,f.id_album,f.foto,f.updated_at,a.album,a.updated_at,a.is_active,a.slug')->join('tb_album a','f.id_album=a.id_album')->where('a.is_active',1)->where('a.slug',$slug)->orderBy('f.updated_at','desc')->get()->getResult();
    }

}