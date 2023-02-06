<?php

namespace App\Controllers;

use Core\BaseController;
use Core\Session;

class Newhome extends BaseController{
    public function Index(){
        $users = [
            'isim' => 'göktuğ',
            'soyisim' => 'gök',
            'yas' => 18
        ];
        
        echo $this->view->load('new-home/index',compact('users'));
    }
}