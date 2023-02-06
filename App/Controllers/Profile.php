<?php
namespace App\Controllers;

use Core\BaseController;
use Core\Session;

class Profile extends BaseController{
    public function Index(){
        
        echo $this->view->load('profile/index');
    }
}