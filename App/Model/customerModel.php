<?php

namespace App\Model;

use Core\BaseModel;
use Core\Session;

class customerModel extends BaseModel{
    public function customerAdd($data){
        extract($data);
        $id = Session::getSession('id');
        $customer  = $this->db->connect->prepare('INSERT INTO customer SET users_id=?,name=?,surname=?,company=?,email=?,phone=?');
        $insert = $customer->execute([$id,$name,$surname,$company,$email,$phone]);
        if($insert){
            return true;
        }else{
            return false;
        }
    }
    public function getCustomers(){
        $id = Session::getSession('id');
        return $this->db->query("SELECT * FROM customer WHERE users_id ='$id' ",true);
    }
    public function updateCustomer($data){
        extract($data);
        $customer = $this->db->connect->prepare("UPDATE customer SET name=?,surname=?,company=?,email=?,phone=? WHERE id=?");
        $insert = $customer->execute([$name,$surname,$company,$email,$phone,$muşterid]);
        if($insert){
            return true;
        }else{
            return false;
        }
    }
    public function removeCustomer($data){
        extract($data);
        $customer = $this->db->connect->prepare("DELETE FROM customer WHERE id='$customer_id'");
        if($customer){
            return true;
        }else{
            return false;
        }
    }
}