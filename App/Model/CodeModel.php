<?php
namespace App\Model;

use App\Controllers\Email;
use Core\BaseModel;



class CodeModel extends BaseModel{
    public function  newPassword($data){
        extract($data);
        if (!$email) {
            $status = 'error';
            $title = 'Başarısız';
            $msg = 'Email boş bırakmayınız';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        $emailK = $this->db->query("SELECT * FROM users WHERE email = '$email'");
        if(!$emailK){
            $status = 'error';
            $title = 'Başarısız';
            $msg = 'Kayıtlı Email değil';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if (!$code) {
            $status = 'error';
            $title = 'Başarısız';
            $msg = 'Kodu boş bırakmayın';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        $codeK = $this->db->query("SELECT * FROM users WHERE email = '$email' && code = '$code'");
        if(!$codeK){
            $status = 'error';
            $title = 'Başarısız';
            $msg = 'Mailinize gelen kodu girmelisiniz';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if (!$password) {
            $status = 'error';
            $title = 'Başarısız';
            $msg = 'şifreyi boş bırakmayın';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if(strlen($password) < 6) {
            $status = 'error';
            $title = 'Şifreniz Düzeltiniz';
            $msg = 'şifreniz en az 6 harf olmalı';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if(!preg_match('/[A-Z]/', $password)) {
            $status = 'error';
            $title = 'Şifrenizi Düzeltiniz';
            $msg = 'Şifre en az bir büyük harf içermelidir.';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if(!preg_match('/[0-9]/', $password)) {
            $status = 'error';
            $title = 'Şifrenizi Düzeltiniz';
            $msg = 'Şifre en az bir sayı içermelidir.';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if (!$againpassword) {
            $status = 'error';
            $title = 'şfirenizi tekrar giriniz';
            $msg = 'boş bırakmayın';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if ($password != $againpassword) {
            $status = 'error';
            $title = 'şifreleriniz yanlış';
            $msg = 'şifreleriniz aynı olmalı';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        $user = $this->db->query("SELECT * FROM users WHERE email = '$email' ");
        if ($user) {
            $password = md5($password);
            $sorgu = $this->db->connect->prepare("UPDATE users SET password = ? where email = ? ");
            $sonuc = $sorgu->execute([$password,$email]);
            if ($sonuc) {
                return true;
            }else{
                return false;
            }
        }
       
        
       
    }
}