<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class RekapUNModel extends Model
{
    protected $table            = 'tb_rekap_un';
    protected $primaryKey       = 'id_un';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function list_rekap_un()
    {
        return $this->db->table('tb_rekap_un u')->select('u.*,k.mapel,t.tahun')->join('tb_kurikulum k','u.id_kurikulum=k.id_kurikulum')->join('tb_tahun t','u.id_tahun=t.id_tahun')->orderBy('u.id_un','desc')->get()->getResult();
    }

    function tambah_rekap_un($data)
    {
        $this->insert($data);
    }

    function edit_rekap_un($data, $id)
    {
        $this->set($data)->where(['id_un' => $id])->update();
    }

    function cek_rekap_un($id)
    {
        return $this->select('id_un')->getWhere(['id_un' => $id])->getRow();
    }

    function get_rekap_un($id)
    {
        return $this->getWhere(['id_un' => $id])->getRow();
    }

    function hapus_rekap_un($id)
    {
        $this->delete(['id_un' => $id]);
    }   

}