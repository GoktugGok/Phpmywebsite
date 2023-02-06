<?php
namespace App\Model;

use Core\BaseModel;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


class SaveModel extends BaseModel{
    public function  userSave($data){
        extract($data);
        $user = $this->db->query("SELECT * FROM users WHERE email = '$email' ");
        if ($user){
            $code = rand(1,9000)."_".rand(1,9000);
            $sorgu = $this->db->connect->prepare("UPDATE users SET code = ? where email = ? ");
           
            $sonuc = $sorgu->execute([$code,$email]);
            
            if ($sonuc) {
                require BASEDIR.'/vendor/autoload.php';
                $mail = new PHPMailer (true);

                try {
                    $mail->isSMTP();
                    $mail->SMTPKeepAlive = true;
                    $mail->SMTPAuth   = true;                      //Enable verbose debug output
                    $mail->SMTPSecure = 'tls'; 

                    $mail->Port = 587;  
                    $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through

                    $mail->Username   = 'gokgoktug0@gmail.com';                     //SMTP username
                    $mail->Password   = 'iszqwxueqnbpmigo';                               //SMTP password

                    $mail->setLanguage('tr','PHPMailer/language');
                    $mail->setFrom('gokgoktug0@gmail.com', 'Mailer');
                    $mail->addAddress($user['email'], $user['name'].' '.$user['surname']);     //Add a recipient

                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'MyWebsite';
                    $mail->Body    = 'Şifreniz : '.$code;

                    $mail->send();
                    
                    return true;       
                    echo 'Message has been sent';
                        
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: ";
                        return false;
                    }    
                    
            }else{
                echo 'çalışmadı';    
            }
        }else{
            return false;
        }
    }
}