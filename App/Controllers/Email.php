<?php 

namespace App\Controllers;

use App\Model\SaveModel;
use Core\BaseController;
use Core\Session;

class Email extends BaseController{
    public function Index(){
       echo $this->view->load('email/index');
    }
    public function Save(){
       $data = $this->request->post();
        
       $SaveModel = new SaveModel();
       $access = $SaveModel->userSave($data);

       if ($access) {
        $status = 'success';
        $title = 'Başarılı';
        $msg = 'Doğru giriş';   
        echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title, 'redirect' => _link('Sifre')]);
       }else{
        $status = 'error';
        $title = 'Başarısız';
        $msg = 'Kayıtlı olduğunuz maili giriniz';   
        echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
       }
     }

}