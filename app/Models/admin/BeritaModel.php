<?php

namespace App\Models\Admin;

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

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function list_berita()
    {
        return $this->db->table('tb_berita p')->select('p.*,u.nama AS nama_operator')->join('tb_user u','p.id_user=u.id_user')->orderBy('p.id','desc')->get()->getResult();
    }

    function tambah_berita($data)
    {
        $this->insert($data);
    }

    function edit_berita($data, $id)
    {
        $this->set($data)->where(['id' => $id])->update();
    }

    function cek_berita($id)
    {
        return $this->select('id,gambar')->getWhere(['id' => $id])->getRow();
    }

    function get_berita($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    function hapus_berita($id)
    {
        $this->delete(['id' => $id]);
    }
    
}