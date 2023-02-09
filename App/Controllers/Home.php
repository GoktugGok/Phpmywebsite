<?php

namespace App\Controllers;

use App\Model\HomeModel;
use Core\BaseController;
use Core\Session;

class Home extends BaseController{
    public function Index(){
        $homeModel = new HomeModel();
        $data['users'] = $homeModel->users();
        $data['toplam'] = $homeModel->toplam();

        echo $this->view->load('home/index',compact('data'));
    }
}