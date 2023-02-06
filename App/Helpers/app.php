<?php

function assest($assetName){
   return URL.$assetName;
}

function redirect($url){
    header('Location:'.URL.$url);
}

function _link($url = null){
    return URL.$url;
}
function sess($name){
   return $_SESSION[$name];
}