<?php 

namespace App\Controllers;

use App\Model\CodeModel;
use Core\BaseController;


class Code extends BaseController{
    public function Index(){
       echo $this->view->load('code/index');
    }
    public function Save(){
         $data = $this->request->post();
         $CodeModel = new CodeModel;
         $access = $CodeModel->newPassword($data);
         if ($access) {
            $status = 'success';
            $title = 'Başarılı';
            $msg = 'Doğru giriş';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title, 'redirect' => _link('giris')]);
           }else{
            $status = 'error';
            $title = 'Başarısız';
            $msg = 'Kayıtlı olduğunuz maili giriniz';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
           }
     }

}