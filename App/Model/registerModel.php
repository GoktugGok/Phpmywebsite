<?php
namespace App\Model;

use Core\BaseModel;

class RegisterModel extends BaseModel{
    public function userRegister($data){
        extract($data);
       
        if (!$name) {
            $status = 'error';
            $title = 'isminizi giriniz';
            $msg = 'boş bırakmayın';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if (!$surname) {
            $status = 'error';
            $title = 'soyisminizi giriniz';
            $msg = 'boş bırakmayın';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if (!$email) {
            $status = 'error';
            $title = 'mailinizi giriniz';
            $msg = 'boş bırakmayın';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }
        if (!$phone) {
            $status = 'error';
            $title = 'telefon numaranızı giriniz';
            $msg = 'boş bırakmayın';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            exit();
        }

        $numara = $this->db->query("SELECT * FROM users WHERE phone = '$phone'");

        if($numara) {
            $status = 'error';
            $title = 'farklı numara giriniz';
            $msg = 'bu numara kayıtlı';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            return false;
            exit();
        }

        if (!$password) {
            $status = 'error';
            $title = 'şifrenizi giriniz';
            $msg = 'boş bırakmayın';   
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
        $hata = $this->db->query("SELECT * FROM users WHERE email = '$email'");

        if($hata) {
            $status = 'error';
            $title = 'farklı mail giriniz';
            $msg = 'bu mail kayıtlı';   
            echo json_encode(['status' => $status, 'msg' => $msg, 'title' => $title]);
            return false;
            exit();
        }
        
        
        $password = md5($password);
        $code = substr(str_shuffle("1234567890"),0,6);

        $register = $this->db->connect->prepare("INSERT INTO users SET
            users.name=?,
            users.surname=?,
            users.email=?,
            users.password=?,
            users.phone=?,
            users.code=?");

        $insert = $register->execute([
            $name,
            $surname,
            $email,
            $password,
            $phone, 
            $code]);

        if ($insert) {
            return true;
        }else{
            return false;
        }
    }
}