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
        <div class="row ">
          <div class="col-md-6 d-flex  align-items-start mt-2">
            <div class="container-fluid mt-4 ">
              <h2 class="mt-5 ms-4 text-center ">Kayıtlı tuttunuz <br> müşterileriniz burda güvenli.</h2>
              <div class="d-flex justify-content-center mt-5">
                <a href="<?= _link('musteri/ekle')?>" class="btn btn-primary btn-lg  align-end" type="button">Müşteri Ekle</a>
              </div>
              
            </div>
          </div>
          <div class="col-md-6 d-flex justify-content-center align-items-center mt-5 ">
            <img src="App/image/müşteri-1.png" class="img-fluid " alt="">
          </div>
        </div>
      </div>
      <footer class="pt-3 mt-4 text-muted border-top">
       
      </footer>
      <div class="row align-items-md-stretch">
        <div class="col-12">
          <div class="px-2 py-5 bg-white rounded-3">
            <h1 class="text-center mb-3">Liste</h1>
            <div class="table-responsive">
            <table class="table border table-striped">
            <thead>
              <tr>
                  <th></th>
                  <th scope="col">İsim</th>
                  <th scope="col">Soyisim</th>
                  <th scope="col">Şirket İsmi</th>
                  <th scope="col">Mail</th>
                  <th scope="col">Telefon</th>
                  <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                <?php $count = 1; ?>
                <?php foreach($data['customers'] as $key  => $value): ?>
              <tr>
              <td scope="row"><?= $count++ ?>. </td>
                  <td><?=$value['name']?></td>
                  <td><?=$value['surname']?></td>
                  <td><?=$value['company']?></td>
                  <td><?=$value['email']?></td>
                  <td><?=$value['phone']?></td>
                  <td>
                    <div class="btn-group btn-group-sm d-flex justify-content-center">
                      <button class="btn btn-sm btn-danger" onclick="removeCustomer('<?= $value['id'] ?>')" >Sil</button>
                      <a href="<?=_link('musteri/guncelle/'.$value['id'])?>" class="btn btn-sm btn-info">Düzenle</a>
                    </div>
                  </td>
              </tr>
            </tbody>
              <?php endforeach; ?>
            </table>
            </div>
          </div>
        </div>
      </div>

      
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.2.3/axios.min.js" integrity="sha512-L4lHq2JI/GoKsERT8KYa72iCwfSrKYWEyaBxzJeeITM9Lub5vlTj8tufqYk056exhjo2QDEipJrg6zen/DDtoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    function removeCustomer(id){
      let customer_id = id;

      let formData = new FormData();
      formData.append('customer_id',customer_id);
      
      axios.post('<?= _link('musteri/sil')?>',formData)
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
        .catch((err) => {console.log(err)});
        
    }

  
</script>
</body>
</html>