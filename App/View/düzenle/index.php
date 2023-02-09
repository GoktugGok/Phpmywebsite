<?php

use Core\Session;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>My Website</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/jumbotron/">
    <link href="<?=URL?>public/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
      .nav-logo{
        box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;
      }
    </style>   
  </head>
  <body class="bg-dark">
  <main>
    <div class="container py-4 ">
      <header class="pb-3 mb-4 border-bottom ">
      <nav class="navbar navbar-expand-lg bg-body-tertiary rounded-4">
        <div class="container-fluid">
          <a class="navbar-brand bg-info p-3 rounded-4 text-white nav-logo rounded " href="<?= _link('')?>">My Website</a>
          <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ms-3">
              <ul  class="navbar-nav  mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page " href="#">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Project</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= _link('musteri')?>">Customer</a>
                </li>
              </ul>
            </div>
            <div class="navbar-nav ms-auto ">
            <div class="dropdown-center ">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 " role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <li class="nav-item me-auto p-2 px-3 rounded-4 ">
                    <a class="nav-link text-dark border p-3 rounded-4  border-info" href="#"><?=sess('name')?></a>
                  </li>
                </ul>
                <ul class="dropdown-menu">
                  <div class="row d-flex justify-content-center">
                      <div class="col-9 text-center bg-info p-2 mb-1"><a href="<?= _link('profil')?>" class="nav-link">Profil</a></div>
                  </div>
                  <div class="row d-flex justify-content-center">
                      <div class="col-9 text-center bg-info p-2 mb-1"><a href="<?= _link('welcome')?>" class="nav-link">Çıkış Yap</a></div>
                  </div>
                </ul>
            </div>
              
          </div>
          </div>
        </div>
      </nav>
      </header>

      <div class="p-5 mb-4 bg-light rounded-3">
        <form class=" row g-3 m-auto rounded-2 " style="width: 100%;" id="profil">
          <div class="col-md-6">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" value="<?= sess('name') ?>">
          </div>
          <div class="col-md-6">
            <label for="surname" class="form-label">Surname</label>
            <input type="text" class="form-control" id="surname" value="<?= sess('surname') ?>">
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" value="<?= sess('email') ?>">
          </div>
          <div class="col-md-6">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" pattern="[0-9]{10}" title="Telefon numaranızı doğru giriniz" maxlength="10" class="form-control" id="phone" value="<?= sess('phone') ?>">
            <div class="d-flex justify-content-start pt-2">
              <p class="fs-6 fst-italic font-monospace border border-danger rounded-3 w-70 h-0 px-2 ">5554443322 şeklinde girin</p> 
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit "  style="width: 100%; " class="btn btn-primary">Düzenle</button>
          </div>
        </form>
      </div>
      <div class="p-5 mb-4 bg-light rounded-3">
        <form class=" row g-3 m-auto rounded-2 " style="width: 100%;" id="image">
          <div class="user-image mb-3 text-center">
              <div style="width: 100px; height: 100px; overflow: hidden; background: #cccccc; margin: 0 auto">
                <img src="App/image/<?=sess('image')?>"  class="figure-img img-fluid rounded" id="imgPlaceholder" alt="">
              </div>
          </div>
          <div class="custom-file">
            <div class=" mb-3">
              <label for="chooseFile" class="form-label">Image</label>
              <input type="file"  class="form-control" id="chooseFile">
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit "  style="width: 100%; " class="btn btn-primary">Düzenle</button>
          </div>
          </form>
      </div>
      <div class="p-5 mb-4 bg-light rounded-3">
        <form class=" row g-3 m-auto rounded-2 " style="width: 100%;" id="passwords">
          <div class="col-md-6">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" >
          </div>
          <div class="col-md-6">
            <label for="newpassword" class="form-label">New Password</label>
            <input type="password" class="form-control" id="newpassword" >
          </div>
          <div class="col-md-6">
            <label for="againpassword" class="form-label">Again Password</label>
            <input type="password" class="form-control" id="againpassword">
          </div>
          <div class="col-12">
            <p class="fs-6 fst-italic font-monospace text-center border border-danger rounded-4">Şifreniz en az altı haneli en az bir büyük harf en az bir sayı olmalı</p> 
          </div>
          <div class="col-md-12">
            <button type="submit "  style="width: 100%; " class="btn btn-primary">Düzenle</button>
          </div>
        </form>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.3/axios.min.js" integrity="sha512-L4lHq2JI/GoKsERT8KYa72iCwfSrKYWEyaBxzJeeITM9Lub5vlTj8tufqYk056exhjo2QDEipJrg6zen/DDtoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

 <script>
    const profil = document.getElementById('profil');

    profil.addEventListener('submit',(e)=>{
      let name = document.getElementById('name').value;
      let surname = document.getElementById('surname').value;
      let email = document.getElementById('email').value;
      let phone = document.getElementById('phone').value;

      let formData = new FormData();
      formData.append('name',name);
      formData.append('surname',surname);
      formData.append('email',email);
      formData.append('phone',phone);
      
      axios.post('<?= _link('/düzenle/guncelle')?>',formData)
        .then(res => {
          if (res.data.redirect) {
              window.location.href = res.data.redirect;
            }
            Swal.fire(
            res.data.title,
            res.data.msg,
            res.data.status
          )
        })
        .catch((err) => {console.log(err)})
      e.preventDefault();
    });

    const image = document.getElementById('image');

    image.addEventListener('submit',(e)=>{
      let chooseFile = document.getElementById('chooseFile').value;

      let formData = new FormData();
      formData.append('chooseFile',chooseFile);
      console.log(chooseFile);
      axios.post('<?= _link('/düzenle/img')?>',formData)
        .then(res => {
          if (res.data.redirect) {
              window.location.href = res.data.redirect;
            }
            Swal.fire(
            res.data.title,
            res.data.msg,
            res.data.status
          )
        })
        .catch((err) => {console.log(err)})
      e.preventDefault();
    });

    const passwords = document.getElementById('passwords');

    passwords.addEventListener('submit',(e)=>{
      let password = document.getElementById('password').value;
      let newpassword = document.getElementById('newpassword').value;
      let againpassword = document.getElementById('againpassword').value;

      let formData = new FormData();
      formData.append('password',password);
      formData.append('newpassword',newpassword);
      formData.append('againpassword',againpassword);
      
      axios.post('<?= _link('/düzenle/sifre')?>',formData)
        .then(res => {
          if (res.data.redirect) {
              window.location.href = res.data.redirect;
            }
            Swal.fire(
            res.data.title,
            res.data.msg,
            res.data.status
          )
        })
        .catch((err) => {console.log(err)})
      e.preventDefault();
    });
  
</script>
</body>
</html>