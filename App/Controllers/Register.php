<?php 

namespace App\Controllers;


use App\Model\registerModel;
use Core\BaseController;
use Core\Session;

class Register extends BaseController{
    public function Index(){
       echo $this->view->load('register/index');
    }
    public function Register(){
        $data = $this->request->post();

        $RegisterModel = new RegisterModel();
        $access = $RegisterModel->userRegister($data);

        if ($access) {
            $status = 'success';
            $title = 'Başarılı';
            $msg = 'Doğru giriş';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title, 'redirect' => _link('giris')]);
        }
      
            

    }
}