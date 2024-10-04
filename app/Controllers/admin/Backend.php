<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Backend extends BaseController
{
    function index()
    {   
        if(!session('id_user'))
        {
            return redirect()->to(base_url('auth/login'));   
        }else
        {
            return redirect()->to(base_url('backend/dashboard'));
        }
    }
    
}
