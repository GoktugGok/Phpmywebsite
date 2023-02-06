<?php
namespace App\Controllers;

use Core\BaseController;

class Customer extends BaseController{
    public function Index(){
        $users = [
            'isim' => 'göktuğ',
            'soyisim' => 'gök',
            'yas' => 18
        ];

        echo $this->view->load('home/index');
    }
    public function Add(){
        $users = [
            'isim' => 'göktuğ',
            'soyisim' => 'gök',
            'yas' => 18
        ];

        echo $this->view->load('home/index');
    }
    public function Edit(){
        $users = [
            'isim' => 'göktuğ',
            'soyisim' => 'gök',
            'yas' => 18
        ];
        echo $this->view->load('home/index');
    }
}