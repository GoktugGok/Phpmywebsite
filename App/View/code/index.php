<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
<link href="public/css/bootstrap.min.css" rel="stylesheet">

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
    </style>

    
    <!-- Custom styles for this template -->
    <link href="public/css/sign-in.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
  <form class=" row g-3 m-auto shadow p-5 rounded-5 " style="width: 500px; " id="NewSifre">
      <div class="col-12">
        <label for="email" class="form-label "><h5>Email</h5></label>
        <input type="email" class="form-control" id="email" placeholder="">
      </div>
      <div class="col-12">
        <label for="code" class="form-label"><h5>Yenileme Kodu</h5></label>
        <input type="text" pattern="{9}" maxlength="9" class="form-control" id="code" placeholder="">
      </div>
      <div class="col-12">
        <label for="password" class="form-label"><h5>Password</h5></label>
        <input type="password" class="form-control" id="password" placeholder="">
      </div>
      <div class="col-12">
        <label for="againpassword" class="form-label"><h5>Again Password</h5></label>
        <input type="password" class="form-control" id="againpassword" placeholder="">
      </div>
      <div class="col-12">
        <p class="fs-6 fst-italic font-monospace text-center border border-danger rounded-4">Şifreniz en az altı haneli en az bir büyük harf en az bir sayı olmalı</p> 
      </div>
      <div class="col-12">
        <button type="submit "  style="width: 100%; " class="btn btn-primary">Şifre Yenile</button>
      </div>
      
    </form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.3/axios.min.js" integrity="sha512-L4lHq2JI/GoKsERT8KYa72iCwfSrKYWEyaBxzJeeITM9Lub5vlTj8tufqYk056exhjo2QDEipJrg6zen/DDtoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

      const NewSifre = document.getElementById('NewSifre');

      NewSifre.addEventListener('submit',(e) =>{
        let email = document.getElementById('email').value;
        let code = document.getElementById('code').value;
        let password = document.getElementById('password').value;
        let againpassword = document.getElementById('againpassword').value;
        


        let formData = new FormData();
        formData.append('email',email);
        formData.append('code',code);
        formData.append('password',password);
        formData.append('againpassword',againpassword);

        
        axios.post('<?= _link('Sifre')?>',formData)
        .then(res => {
          setInterval(function() {
            if (res.data.redirect) {
              window.location.href = res.data.redirect;
            }
          }, 3000);
          
            Swal.fire(
            res.data.title,
            res.data.msg,
            res.data.status
          )
        })
        .catch((err) => {console.log(err)})

        e.preventDefault();
      })
              
    </script>
  </body>
</html>