<?php

namespace App\Models\Admin;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table            = 'tb_user';
    protected $primaryKey       = 'id_user';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    function list_users()
    {
        return $this->orderBy('id_user','desc')->get()->getResult();
    }

    function tambah_user($data)
    {
        $this->insert($data);
    }

    function edit_user($data, $id)
    {
        $this->set($data)->where(['id_user' => $id])->update();
    }

    function cek_user($id)
    {
        return $this->select('id_user')->getWhere(['id_user' => $id])->getRow();
    }

    function get_user($id)
    {
        return $this->getWhere(['id_user' => $id])->getRow();
    }

    function hapus_user($id)
    {
        $this->delete(['id_user' => $id]);
    }   

    function nama_user($id_user)
    {
        return $this->select('nama')->getWhere(['id_user' => $id_user])->getRow();
    }

    function level_user($id_user)
    {
        return $this->select('level')->getWhere(['id_user' => $id_user])->getRow();
    }

    function cek_username($username, $id_user)
    {
		$cek = $this->select('id_user')->getWhere(['username' => $username, 'id_user !=' => $id_user])->getRow();
		if($cek)
		{           
			return FALSE;
		}else
		{
			return TRUE;
		}
    }

    function cek_email($email, $id_user)
    {
		$cek = $this->select('id_user')->getWhere(['email' => $email, 'id_user !=' => $id_user])->getRow();
		if($cek)
		{           
			return FALSE;
		}else
		{
			return TRUE;
		}
    }

}