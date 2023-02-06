<?php
namespace App\Controllers;

use App\Model\userprofilModel;
use Core\BaseController;
use Core\Session;

class Düzenleme extends BaseController{
    public function Index(){
        echo $this->view->load('düzenle/index');
    }
    public function SaveK(){
        $data = $this->request->post();
        $userprofilModel = new userprofilModel();
        $access = $userprofilModel->profilDüzelt($data);
        if ($access) {
            Session::setSession('name',$data['name']);
            Session::setSession('surname',$data['surname']);
            Session::setSession('email',$data['email']);
            Session::setSession('phone',$data['phone']);
            $status = 'success';
            $title = 'Başarılı';
            $msg = 'Doğru giriş';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title , 'redirect' => _link('profil')]);
           }else{
            $status = 'error';
            $title = 'Başarısız';
            $msg = 'Kayıtlı olduğunuz maili giriniz';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
           }
    }
    public function SaveS(){
        $data = $this->request->post();
        $userprofilModel = new userprofilModel();
        $access = $userprofilModel->sifreDüzelt($data);
        if ($access) {
            $status = 'success';
            $title = 'Başarılı';
            $msg = 'Doğru giriş';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title , 'redirect' => _link('/düzenle')]);
           }else{
            $status = 'error';
            $title = 'Başarısız';
            $msg = 'hata';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
           }
    }
    public function SaveI(){
        $data = $this->request->post();
        $userprofilModel = new userprofilModel();
        $access = $userprofilModel->resimDüzelt($data);
        if ($access) {
            $status = 'success';
            $title = 'Başarılı';
            $msg = 'Doğru giriş';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title , 'redirect' => _link('/düzenle')]);
           }else{
            $status = 'error';
            $title = 'Başarısız';
            $msg = 'hata';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
           }
    }
}