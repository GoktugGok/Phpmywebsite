<?php
namespace App\Model;

use Core\BaseModel;
use Core\Session;

class authModel extends BaseModel{
    public function userLogin($data){
        extract($data);
        $password = md5($password);

        $user = $this->db->query("SELECT * FROM users WHERE email = '$email' && password = '$password' ",false);

        if ($user) {
            Session::setSession('login',true);
            Session::setSession('id', $user['id']);
            Session::setSession('name', $user['name']);
            Session::setSession('surname', $user['surname']);
            Session::setSession('email', $user['email']);
            Session::setSession('password', $user['password']);
            Session::setSession('phone', $user['phone']);
            Session::setSession('tarih', $user['created_date']);
            Session::setSession('image', $user['image']);
            return true;
        }else{
            return false;
        }
    }
}