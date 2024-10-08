<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\AuthModel;

class Auth extends BaseController
{
    function __construct()
    {   
        $this->m_auth = new AuthModel();
    }

    function login()
    {
        if(session('id_user'))
        {
            return redirect()->to(base_url('backend/dashboard'));  
        }

        return view('admin/auth/login');
    }

    function proses_login()
    {
        $post = $this->request->getPost();
        $user = $this->m_auth->cek_user($post['username']);
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
                    return redirect()->back()->withInput()->with('error','Password Salah!');  
                }
            }else
            {
                return redirect()->back()->withInput()->with('error','Akun tidak aktif!');
            }
        }else
        {
            return redirect()->back()->withInput()->with('error','Username tidak terdaftar!');
        }
    }

    function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('auth/login'));  
    }

    function cek_session()
    {
        if(!session('id_user'))
        {
            echo json_encode(['session_active' => false]);   
        }else
        {
            echo json_encode(['session_active' => true]);
        }     
    }

}
