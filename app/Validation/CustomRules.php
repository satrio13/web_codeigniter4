<?php
namespace App\Validation;
use App\Models\Admin\UserModel;

class CustomRules
{
    public function cek_username($username, $id_user)
    {
        $user = new UserModel();
        $isExists = $user->cek_username($username, $id_user);
        return $isExists;
    }  

    public function cek_email($email, $id_user)
    {
        $user = new UserModel();
        $isExists = $user->cek_email($email, $id_user);
        return $isExists;
    }  
}