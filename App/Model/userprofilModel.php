<?php 
namespace App\Model;

use Core\BaseModel;
use Core\Session;

class userprofilModel extends BaseModel{
    public function profilDüzelt($data){
        extract($data);
        $id = Session::getSession('id');
        $user = $this->db->connect->prepare("UPDATE users SET  name=?,surname=?,email=?,phone=? WHERE id=?");
        $sonuc = $user->execute([$name,$surname,$email,$phone,$id]);
        if ($sonuc) {
            return true;
        }else{
            return false;
        }
    }
    public function sifreDüzelt($data){
       extract($data);
        if(!$password){   
            $status = 'error';
            $title = 'Başarısız';
            $msg = 'Kayıtlı şifrenizi boş bırakmayın';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if(md5($password) !== Session::getSession('password')){
            $status = 'error';
            $title = 'Başarısız';
            $msg = 'Kayıtlı şifrenizi yanlış girdiniz';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if(!$newpassword){
            $status = 'error';
            $title = 'Başarısız';
            $msg = 'yeni şifrenizi boş bırakmayın';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if(strlen($newpassword) < 6) {
            $status = 'error';
            $title = 'Şifreniz Düzeltiniz';
            $msg = 'şifreniz en az 6 harf olmalı';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if(!preg_match('/[A-Z]/', $newpassword)) {
            $status = 'error';
            $title = 'Şifrenizi Düzeltiniz';
            $msg = 'Şifre en az bir büyük harf içermelidir.';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if(!preg_match('/[0-9]/', $newpassword)) {
            $status = 'error';
            $title = 'Şifrenizi Düzeltiniz';
            $msg = 'Şifre en az bir sayı içermelidir.';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if(!$againpassword){
            $status = 'error';
            $title = 'Başarız';
            $msg = 'Şifrenizi tekrar giriniz';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if($newpassword !== $againpassword){
            $status = 'error';
            $title = 'Başarız';
            $msg = 'Şifreniz tekrar girdinizle aynı olmalı';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
       $id = Session::getSession('id');
       $newpassword = md5($newpassword);
       $user = $this->db->connect->prepare("UPDATE users SET password=? WHERE id=?");
       $sonuc = $user->execute([$newpassword,$id]);
       if ($sonuc) {
        Session::setSession('password',$newpassword);
        return true;
    }else{
        return false;
    }
    }

    public function resimDüzelt($data){
        extract($data);
        $id = Session::getSession('id');
        $chooseFile = str_replace(trim('C:\fakepath\ '),'',$chooseFile);
        $user = $this->db->connect->prepare("UPDATE users SET image=? WHERE id=?");
        $sonuc = $user->execute([$chooseFile,$id]);
        if ($sonuc) {
            Session::setSession('image', $chooseFile);
            return true;
        }else{
            return false;
        }
        
    }
}