<?php

namespace Core;

use PDO;

class Database
{
    public $connect;
    public function __construct()
    {
        $this->connect = new \PDO('mysql:host=localhost;dbname=mywebsite','root','');
    }
    public function query($sql,$multi = false){
        if ($multi) {
            return $this->connect->query($sql,PDO::FETCH_ASSOC)->fetchAll();
        }else{
            return $this->connect->query($sql,PDO::FETCH_ASSOC)->fetch();
        }
    }
}