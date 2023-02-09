<?php
$cms->router->before('GET|POST', '/', 'Controllers\Auth@isLogin');

$cms->router->get('/', 'Controllers\Home@Index');
$cms->router->get('/welcome', 'Controllers\Newhome@Index');

$cms->router->get('/profil', 'Controllers\Profile@Index');

//profil Düzenleme
$cms->router->get('/düzenle', 'Controllers\Düzenleme@Index');
$cms->router->post('/düzenle/guncelle', 'Controllers\Düzenleme@SaveK');
$cms->router->post('/düzenle/sifre', 'Controllers\Düzenleme@SaveS');
$cms->router->post('/düzenle/img', 'Controllers\Düzenleme@SaveI');

//Emailden Mesaj 
$cms->router->get('/kurtarma', 'Controllers\Email@Index');
$cms->router->post('/kurtarma', 'Controllers\Email@Save');

//Sifre
$cms->router->get('/Sifre', 'Controllers\Code@Index');
$cms->router->post('/Sifre', 'Controllers\Code@Save');

//Hesap oluşturma
$cms->router->get('/register', 'Controllers\Register@Index');
$cms->router->post('/register', 'Controllers\Register@Register');

//login
$cms->router->get('/giris', 'Controllers\Auth@Index');
$cms->router->post('/giris', 'Controllers\Auth@Login');
$cms->router->get('/cikis', 'Controllers\Auth@Logout');

$cms->router->mount('/musteri', function() use ($cms){

    $cms->router->get('/', 'Controllers\Customer@Index');
    $cms->router->get('/ekle', 'Controllers\Customer@Add');
    $cms->router->post('/ekle', 'Controllers\Customer@Save');
    $cms->router->post('/sil', 'Controllers\Customer@Remove');

    $cms->router->get('/guncelle/(\d+)', 'Controllers\Customer@Edit');
    $cms->router->post('/guncelle', 'Controllers\Customer@UpdateCustomer');
});

$cms->router->mount('/proje', function() use ($cms){

    $cms->router->get('/', 'Controllers\Project@Index');
    $cms->router->get('/ekle', 'Controllers\Project@Add');
    $cms->router->get('/guncelle/([0-9]+)', 'Controllers\Project@Edit');
});

$cms->router->get('/kullanıcı/(\d+)', 'Controllers\Users@Index');

$cms->router->post('/begendi', 'Controllers\Users@Like');