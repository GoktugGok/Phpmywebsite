<?php
namespace App\Model;

use Core\BaseModel;

class HomeModel extends BaseModel{
    public function users(){
       return $this->db->query("SELECT * FROM users",true);
    }
    public function toplam(){
        return $this->db->query("SELECT COUNT('id') as toplam FROM users",true);
     }
}