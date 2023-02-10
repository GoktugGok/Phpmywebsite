<?php

namespace App\Controllers;

use App\Model\UserModel;
use Core\BaseController;
use Core\Session;

class Users extends BaseController{
    public function Index($id){
        $UserModel = new UserModel();
        $data['users'] = $UserModel->users($id);

        echo $this->view->load('users/index',compact('data'));
    }
    public function Like(){
        $data = $this->request->post();
    }
}