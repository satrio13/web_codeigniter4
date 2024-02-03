<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\UserModel;

class User extends BaseController
{
    function __construct()
    {   
        $this->m_user = new UserModel();
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        if(session('level') == 'superadmin')
        {
            $data['title'] = 'Users';
            $data['data'] = $this->m_user->list_users();
            return view('admin/user/index', $data);
        }else
        {
            show_404();
        }
    }

    public function tambah_user()
    {
        if(session('level') == 'superadmin')
        {
            $data['title'] = 'Tambah User';
            return view('admin/user/form_tambah', $data);
        }else
        {
            show_404();
        }
    }
   
    public function simpan_user()
    {
        if(session('level') == 'superadmin')
        {
            $this->rules->setRules([
                'nama' => ['label' => 'Nama', 'rules' => 'required|max_length[100]'],
                'username' =>  ['label' => 'Username', 'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[30]|is_unique[tb_user.username]'],
                'password1' => ['label' => 'Password', 'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[30]'],
                'password2' => ['label' => 'Konfirmasi Password', 'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[30]|matches[password1]'],
                'email' =>  ['label' => 'Email', 'rules' => 'required|trim|max_length[100]|is_unique[tb_user.email]'],
                'is_active' =>  ['label' => 'Status', 'rules' => 'required|numeric'],
            ]);
            
            if(!$this->rules->withRequest($this->request)->run())
            {
                return redirect()->back()->withInput()->with('validation', $this->rules);
            }
                
            $data = [
                'nama' => esc($this->request->getVar('nama')),
                'username' => esc($this->request->getVar('username')),
                'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT),
                'email' => esc($this->request->getVar('email')),
                'level' => 'admin',
                'is_active' => esc($this->request->getVar('is_active')),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->m_user->tambah_user($data);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/users'))->with('success', 'Data Berhasil Ditambahkan');
            }else
            {
                return redirect()->back()->with('error', 'Data Gagal Ditambahkan, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }

    public function edit_user($id)
    {   
        if(session('level') == 'superadmin')
        {
            $cek = $this->m_user->cek_user($id);
            if($cek)
            {
                $data['title'] = 'Edit User';
                $data['data'] = $this->m_user->get_user($id);
                return view('admin/user/form_edit', $data);
            }else
            {
                show_404();
            }
        }else
        {
            show_404();
        }
    }

    public function update_user($id)
    {
        if(session('level') == 'superadmin')
        {
            if(!empty($this->request->getVar('password')))
            {
                $this->rules->setRules([
                    'nama' => ['label' => 'Nama', 'rules' => 'required|max_length[100]'],
                    'username' =>  [
                        'label' => 'Username', 
                        'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[30]|cek_username['.$id.']',
                        'errors' => [
                            'cek_username' => 'Username already exist'
                        ]
                    ],
                    'password' => ['label' => 'Password', 'rules' => 'trim|alpha_numeric|min_length[5]|max_length[30]'],
                    'email' =>  [
                        'label' => 'Email', 
                        'rules' => 'required|trim|max_length[100]|cek_email['.$id.']',
                        'errors' => [
                            'cek_email' => 'Email already exist'
                        ]
                    ],
                    'is_active' =>  ['label' => 'Status', 'rules' => 'required|numeric'],
                ]);
                
                if(!$this->rules->withRequest($this->request)->run())
                {
                    return redirect()->back()->withInput()->with('validation', $this->rules);
                }

                $data = [
                    'nama' => esc($this->request->getVar('nama')),
                    'username' => esc($this->request->getVar('username')),
                    'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                    'email' => esc($this->request->getVar('email')),
                    'level' => 'admin',
                    'is_active' => esc($this->request->getVar('is_active')),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
            }else
            {
                $this->rules->setRules([
                    'nama' => ['label' => 'Nama', 'rules' => 'required|max_length[100]'],
                    'username' =>  [
                        'label' => 'Username', 
                        'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[30]|cek_username['.$id.']',
                        'errors' => [
                            'cek_username' => 'Username already exist'
                        ]
                    ],
                    'email' =>  [
                        'label' => 'Email', 
                        'rules' => 'required|trim|max_length[100]|cek_email['.$id.']',
                        'errors' => [
                            'cek_email' => 'Email already exist'
                        ]
                    ],
                    'is_active' =>  ['label' => 'Status', 'rules' => 'required|numeric'],
                ]);
                
                if(!$this->rules->withRequest($this->request)->run())
                {
                    return redirect()->back()->withInput()->with('validation', $this->rules);
                }

                $data = [
                    'nama' => $this->request->getVar('nama'),
                    'username' => $this->request->getVar('username'),
                    'email' => $this->request->getVar('email'),
                    'level' => 'admin',
                    'is_active' => $this->request->getVar('is_active'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
            }

            $this->m_user->edit_user($data, $id);
            if($this->db->affectedRows() > 0)
            {
                return redirect()->to(base_url('backend/users'))->with('success', 'Data Berhasil Diupdate');
            }else
            {
                return redirect()->back()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
            }
        }else
        {
            show_404();
        }
    }
    
    public function hapus_user($id)
    {   
        if(session('level') == 'superadmin')
        {
            $cek = $this->m_user->cek_user($id);
            if($cek)
            {                
                $this->m_user->hapus_user($id);
                if($this->db->affectedRows() > 0)
                {
                    return redirect()->to(base_url('backend/users'))->with('success', 'Data Berhasil Dihapus');
                }else
                {
                    return redirect()->to(base_url('backend/users'))->with('error', 'Data Gagal Dihapus, silahkan coba lagi!');
                }
            }else
            {
                show_404();
            }
        }else
        {
            show_404();
        }
    }

    public function edit_profil()
    {   
        $id = session('id_user');
        $data['title'] = 'Edit Profil';
        $data['data'] = $this->m_user->get_user($id);
        return view('admin/user/form_profil', $data);
    }

    public function update_profil()
    {
        $id = session('id_user');
        $this->rules->setRules([
            'nama' => ['label' => 'Nama', 'rules' => 'required|max_length[100]'],
            'username' =>  [
                'label' => 'Username', 
                'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[30]|cek_username['.$id.']',
                'errors' => [
                    'cek_username' => 'Username already exist'
                ]
            ],
            'email' =>  [
                'label' => 'Email', 
                'rules' => 'required|trim|max_length[100]|cek_email['.$id.']',
                'errors' => [
                    'cek_email' => 'Email already exist'
                ]
            ],
        ]);
            
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        $data = [
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $this->m_user->edit_user($data, $id);
        if($this->db->affectedRows() > 0)
        {
            return redirect()->back()->with('success', 'Data Berhasil Diupdate');
        }else
        {
            return redirect()->back()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
        }
    }

    public function ganti_password()
    {   
        $id = session('id_user');
        $get = $this->m_user->get_user($id);
        $data['title'] = 'Ganti Password';
        $data['username'] = $get->username;
        return view('admin/user/ganti_password', $data);
    }

    public function update_password()
    {   
        $id = session('id_user');
        $get = $this->m_user->get_user($id);
        
        $this->rules->setRules([
            'password1' => ['label' => 'Password Baru', 'rules' => 'required|trim|alpha_numeric|min_length[5]|max_length[30]'],
            'password2' => ['label' => 'Ketik Ulang Password Baru', 'rules' => 'required|matches[password1]'],
            'password3' => ['label' => 'Password Lama', 'rules' => 'required|trim'],
        ]);
            
        if(!$this->rules->withRequest($this->request)->run())
        {
            return redirect()->back()->withInput()->with('validation', $this->rules);
        }

        if(!password_verify($this->request->getVar('password3'), $get->password))
        {
            return redirect()->back()->with('error', 'Password lama yang anda inputkan salah!');
        }elseif(password_verify($this->request->getVar('password1'), $get->password))
        {
            return redirect()->back()->with('error', 'Password baru yang anda inputkan sama dengan password lama!');
        }else
        {   
            $data = [
                'password' => password_hash($this->request->getVar('password1'), PASSWORD_DEFAULT)
            ];

            $this->m_user->edit_user($data, $id);
            if($this->db->affectedRows() > 0)
            {
                echo '<script type="text/javascript">alert("Password berhasil dirubah");window.location.replace("'.base_url().'auth/logout")</script>';
            }else
            {
                return redirect()->back()->with('error', 'Data Gagal Diupdate, silahkan coba lagi!');
            }   
        }
    }

}