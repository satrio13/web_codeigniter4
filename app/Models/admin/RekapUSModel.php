<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class RekapUSModel extends Model
{
    protected $table            = 'tb_rekap_us';
    protected $primaryKey       = 'id_us';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function list_rekap_us()
    {
        return $this->db->table('tb_rekap_us u')->select('u.*,k.mapel,t.tahun')->join('tb_kurikulum k','u.id_kurikulum=k.id_kurikulum')->join('tb_tahun t','u.id_tahun=t.id_tahun')->orderBy('u.id_us','desc')->get()->getResult();
    }

    function tambah_rekap_us($data)
    {
        $this->insert($data);
    }

    function edit_rekap_us($data, $id)
    {
        $this->set($data)->where(['id_us' => $id])->update();
    }

    function cek_rekap_us($id)
    {
        return $this->select('id_us')->getWhere(['id_us' => $id])->getRow();
    }

    function get_rekap_us($id)
    {
        return $this->getWhere(['id_us' => $id])->getRow();
    }

    function hapus_rekap_us($id)
    {
        $this->delete(['id_us' => $id]);
    }   
    
}