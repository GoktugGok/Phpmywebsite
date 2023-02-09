<?php
namespace App\Model;

use Core\BaseModel;

class UserModel extends BaseModel{
    public function users($id){
       return $this->db->query("SELECT * FROM users WHERE id='$id' ",false);
    }

}