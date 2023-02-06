<?php

namespace App\Controllers;

use Core\BaseController;
use Core\Session;

class Home extends BaseController{
    public function Index(){
        $users = [
            'isim' => 'göktuğ',
            'soyisim' => 'gök',
            'yas' => 18
        ];
        
        echo $this->view->load('home/index',compact('users'));
    }
}