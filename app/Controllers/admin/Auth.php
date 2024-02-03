<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class Auth extends BaseController
{
    public function index()
    {
        return redirect()->to(site_url('login'));
    }

    public function login()
    {
        if(session('id_user'))
        {
            return redirect()->to(base_url('dashboard'));  
        }

        return view('admin/auth/login');
    }

    public function proses_login()
    {
        $post = $this->request->getPost();
        $q = $this->db->table('tb_user')->getWhere(['username' => $post['username']]);
        $user = $q->getRow();
        if($user)
        {   
            if($user->is_active == '1')
            {
                if(password_verify($post['password'], $user->password))
                {
                    $params = [
                        'id_user' => $user->id_user,
                        'nama' => $user->nama,
                        'username' => $user->username,
                        'email' => $user->email,
                        'level' => $user->level
                    ];

                    session()->set($params);
                    return redirect()->to(base_url('backend/dashboard'));  
                }else
                {
                    return redirect()->back()->with('error','Password Salah!');  
                }
            }else
            {
                return redirect()->back()->with('error','Akun tidak aktif!');
            }
        }else
        {
            return redirect()->back()->with('error','Username tidak terdaftar!');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth/login'));  
    }

}