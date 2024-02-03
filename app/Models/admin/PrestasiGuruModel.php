<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class PrestasiGuruModel extends Model
{
    protected $table            = 'tb_prestasi_guru';
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

    function list_prestasi_guru()
    {
        return $this->db->table('tb_prestasi_guru s')->select('s.*,t.tahun')->join('tb_tahun t','s.id_tahun=t.id_tahun')->orderBy('s.id','desc')->get()->getResult();
    }

    function tambah_prestasi_guru($data)
    {
        $this->insert($data);
    }

    function edit_prestasi_guru($data, $id)
    {
        $this->set($data)->where(['id' => $id])->update();
    }

    function cek_prestasi_guru($id)
    {
        return $this->select('id,gambar')->getWhere(['id' => $id])->getRow();
    }

    function get_prestasi_guru($id)
    {
        return $this->getWhere(['id' => $id])->getRow();
    }

    function hapus_prestasi_guru($id)
    {
        $this->delete(['id' => $id]);
    }
    
}