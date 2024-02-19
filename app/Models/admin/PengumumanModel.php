<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PengumumanModel extends Model
{
    protected $table            = 'tb_pengumuman';
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

    function list_pengumuman()
    {
        return $this->db->table('tb_pengumuman p')->select('p.*,u.nama AS nama_operator')->join('tb_user u','p.id_user=u.id_user')->orderBy('p.id','desc')->get()->getResult();
    }

    function tambah_pengumuman($data)
    {
        $this->insert($data);
    }

    function edit_pengumuman($data, $id)
    {
        $this->set($data)->where(['id' => $id])->update();
    }

    function cek_pengumuman($id)
    {
        return $this->select('id,gambar')->getWhere(['id' => $id])->getRow();
    }

    function get_pengumuman($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    function hapus_pengumuman($id)
    {
        $this->delete(['id' => $id]);
    }

}