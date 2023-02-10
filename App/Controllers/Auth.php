<?php 

namespace App\Controllers;

use App\Model\authModel;
use Core\BaseController;
use Core\Session;

class Auth extends BaseController{
    public function Index(){
       echo $this->view->load('auth/index');
    }
    public function Login(){
        $data = $this->request->post();
        $authModel = new authModel();
        $access = $authModel->userLogin($data);

        if ($access) {
            $status = 'success';
            $title = 'Başarılı';
            $msg = 'Doğru giriş';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title, 'redirect' => _link('')]);
        }else{
            $status = 'error';
            $title = 'Başarısız';
            $msg = 'yanlış giriş';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
        }
    }
    public function isLogin(){
        $login = Session::getSession('login');

        if (!$login) {
            session_destroy();
            session_reset();
            redirect('welcome');
        }
    }
    public function Logout(){
        Session::removeSession();
        redirect('giris');
    }
}