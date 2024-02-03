<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table            = 'tb_siswa';
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

    function list_siswa()
    {
        return $this->db->table('tb_siswa s')->select('s.*,t.tahun')->join('tb_tahun t','s.id_tahun=t.id_tahun')->orderBy('s.id','desc')->get()->getResult();
    }

    function tambah_siswa($data)
    {
        $this->insert($data);
    }

    function edit_siswa($data, $id)
    {
        $this->set($data)->where(['id' => $id])->update();
    }

    function cek_siswa($id)
    {
        return $this->select('id')->getWhere(['id' => $id])->getRow();
    }

    function get_siswa($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    function hapus_siswa($id)
    {
        $this->delete(['id' => $id]);
    }

}