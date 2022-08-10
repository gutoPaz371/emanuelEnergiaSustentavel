<?php
  include '../crud/config/conexao.php';
  session_start();
  if(!isset($_SESSION['id_user_gerente'])){
    header('location:./login/');
  }
  $idG=$_SESSION['id_user_gerente'];
  $res=mysqli_fetch_assoc($cn->query("SELECT nome,email FROM gestor WHERE id='$idG'"));
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Falcon | Dashboard &amp; Web App Template</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="./assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="./assets/img/favicons/favicon.ico">
    <link rel="manifest" href="./assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="./assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="./assets/js/config.js"></script>
    <script src="./vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="./vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="./vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="./assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="./assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="./assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="./assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <script>
      var isRTL = JSON.parse(localStorage.getItem('isRTL'));
      if (isRTL) {
        var linkDefault = document.getElementById('style-default');
        var userLinkDefault = document.getElementById('user-style-default');
        linkDefault.setAttribute('disabled', true);
        userLinkDefault.setAttribute('disabled', true);
        document.querySelector('html').setAttribute('dir', 'rtl');
      } else {
        var linkRTL = document.getElementById('style-rtl');
        var userLinkRTL = document.getElementById('user-style-rtl');
        linkRTL.setAttribute('disabled', true);
        userLinkRTL.setAttribute('disabled', true);
      }
    </script>
  </head>


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        
        <div class="content">
          <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

            <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="./index.php">
              <div class="d-flex align-items-center py-3"><img class="me-2" src="assets/img/icons/spot-illustrations/falcon.png" alt="" width="40"><span style="font-size:20px;" class="font-sans-serif">Emanuel</span>
              </div>
            </a>
            
            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
              
              
              
              
              <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <div class="avatar avatar-xl">
                    <img class="rounded-circle" src="./assets/img/team/configuration.png" alt="">

                  </div>
                </a>
                <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                  <div class="bg-white dark__bg-1000 rounded-2 py-2">
                    <a class="dropdown-item" href="#">Configurações</a>
                    <a class="dropdown-item" href="./sair.php">Sair</a>
                  </div>
                </div>
              </li>
            </ul>
          </nav>
          <!--AVISO ALERT START-->
          <?php 
            if(isset($_SESSION['err']) and strlen($_SESSION['err'])>0 ){
              $err=$_SESSION['err'];
              $cor=$_SESSION['cor'];
              if($cor=='green'){
                $green='';
                $blue='hidden';
                $orange='hidden';
                $red='hidden';
              }else if($cor='orange'){
                $green='hidden';
                $blue='hidden';
                $orange='';
                $red='hidden';
              }
            }else{
              $err='';
              $green='hidden';
              $blue='hidden';
              $orange='hidden';
              $red='hidden';
            }
            
          ?>
          <div <?php echo $green; ?>>
            <div class="alert alert-success border-2 d-flex align-items-center" role="alert" >
              <div class="bg-success me-3 icon-item"><span class="fas fa-check-circle text-white fs-3"></span></div>
              <p class="mb-0 flex-1"><?php echo $err;$_SESSION['err']='';?></p>
              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
          <div hidden>
            <div class="alert alert-info border-2 d-flex align-items-center" role="alert" hidden>
              <div class="bg-info me-3 icon-item"><span class="fas fa-info-circle text-white fs-3"></span></div>
              <p class="mb-0 flex-1"></p>
              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
          <div <?php echo $orange; ?>>
            <div class="alert alert-warning border-2 d-flex align-items-center" role="alert" hidden>
              <div class="bg-warning me-3 icon-item"><span class="fas fa-exclamation-circle text-white fs-3"></span></div>
              <p class="mb-0 flex-1"><?php echo $err;$_SESSION['err']='';?></p>
              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>
          <div hidden>
            <div class="alert alert-danger border-2 d-flex align-items-center" role="alert" hidden>
              <div class="bg-danger me-3 icon-item"><span class="fas fa-times-circle text-white fs-3"></span></div>
              <p class="mb-0 flex-1">A simple danger alert—check it out!</p>
              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>


          <!--AVISO ALERT END-->
          <div class="row g-0">
            <div class="col-lg-8 pe-lg-2">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0">Seus dados</h5>
                </div>
                <div class="card-body bg-light">
                  <form class="row g-3" action="../crud/users/edit_user_gerente.php" method="POST">
                    
                    <input name="pg" value="<?php echo $_GET['pg']; ?>" hidden/>
                    <div class="col-lg-12">
                      <label class="form-label" for="first-name">Nome</label>
                      <input name="nome" value="<?php echo $res['nome']; ?>" class="form-control" id="first-name" type="text">
                    </div>
                    <div class="col-lg-12">
                      <label class="form-label" for="email1">Email</label>
                      <input name="email" class="form-control" id="email1" type="text" value="<?php echo $res['email']; ?>">
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                      <button value="0" name="tipo" class="btn btn-primary" type="submit">Salvar</button>
                    </div>
                  </form>
                </div>
              </div>
              
              
            </div>
            <div class="col-lg-4 ps-lg-2">
              <div class="sticky-sidebar">
                
                
                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="mb-0">Trocar senha</h5>
                  </div>
                  <div class="card-body bg-light">
                    <form class="row g-3" action="../crud/users/edit_user_gerente.php" method="post">
                      
                      <input name="pg" value="<?php echo $_GET['pg']; ?>" hidden/>
                      <input name="id_gerente" value="<?php echo $_SESSION['id_user_gerente'] ?>" hidden />
                      <div class="mb-3">
                        <label class="form-label" for="old-password">Senha</label>
                        <input name="passO" class="form-control" id="old-password" type="password">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="new-password">Nova Senha</label>
                        <input onkeyup="passVerif(this)" name="passN" class="form-control" id="new-password" type="password">
                        <label id="av0" hidden for="" style="color:red;">Senha muito curta!</label>
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="confirm-password">Confirmar Senha</label>
                        <input onkeyup="passVerif(this)" class="form-control" id="confirm-password" type="password">
                        <label id="av1" hidden for="" style="color:red;">Senhas não coicidem!</label>
                      </div>
                      <button value="1" name="tipo" id="btPass" class="btn btn-primary d-block w-100" type="submit" disabled>Salvar</button>
                    </form>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <a class="btn btn-falcon-danger me-1 mb-1" href="./<?php echo $_GET['pg'];if(isset($_GET['id_venda']))echo '?id_venda='.$_GET['id_venda']; ?>" type="button">Voltar</a>
            <script>
              function passVerif(){
                let pass1=document.getElementById('new-password');
                let pass2=document.getElementById('confirm-password');
                let av0=document.getElementById('av0');
                let av1=document.getElementById('av1');
                let bt=document.getElementById('btPass');
                if(pass1.value.length>=5){
                  av0.hidden=true;
                  if(pass1.value==pass2.value){
                    av1.hidden=true;
                    bt.disabled=false;
                  }else{
                    av1.hidden=false;
                  }
                }else{
                  av0.hidden=false;
                }
              }
            </script>
          <footer class="footer">
          <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
            <div class="col-12 col-sm-auto text-center">
              <p class="mb-0 text-600">Melhor serviço para uma energia limpa<span class="d-none d-sm-inline-block">| </span><br class="d-sm-none"> 2022 © <a href="https://www.emanuelenergiasustentavel.com.br/" target="_blank">Emanuel</a></p>
            </div>
            <div class="col-12 col-sm-auto text-center">
              <p class="mb-0 text-600">v1.0</p>
            </div>
          </div>
        </footer>
        </div>
        <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
          <div class="modal-dialog mt-6" role="document">
            <div class="modal-content border-0">
              <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
                <div class="position-relative z-index-1 light">
                  <h4 class="mb-0 text-white" id="authentication-modal-label">Register</h4>
                  <p class="fs--1 mb-0 text-white">Please create your free Falcon account</p>
                </div>
                <button class="btn-close btn-close-white position-absolute top-0 end-0 mt-2 me-2" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body py-4 px-5">
                
                <div class="position-relative mt-5">
                  <hr class="bg-300">
                  <div class="divider-content-center">or register with</div>
                </div>
                <div class="row g-2 mt-2">
                  <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><svg class="svg-inline--fa fa-google-plus-g fa-w-20 me-2" data-fa-transform="grow-8" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google-plus-g" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="" style="transform-origin: 0.625em 0.5em;"><g transform="translate(320 256)"><g transform="translate(0, 0)  scale(1.5, 1.5)  rotate(0 0 0)"><path fill="currentColor" d="M386.061 228.496c1.834 9.692 3.143 19.384 3.143 31.956C389.204 370.205 315.599 448 204.8 448c-106.084 0-192-85.915-192-192s85.916-192 192-192c51.864 0 95.083 18.859 128.611 50.292l-52.126 50.03c-14.145-13.621-39.028-29.599-76.485-29.599-65.484 0-118.92 54.221-118.92 121.277 0 67.056 53.436 121.277 118.92 121.277 75.961 0 104.513-54.745 108.965-82.773H204.8v-66.009h181.261zm185.406 6.437V179.2h-56.001v55.733h-55.733v56.001h55.733v55.733h56.001v-55.733H627.2v-56.001h-55.733z" transform="translate(-320 -256)"></path></g></g></svg><!-- <span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> Font Awesome fontawesome.com --> google</a></div>
                  <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><svg class="svg-inline--fa fa-facebook-square fa-w-14 me-2" data-fa-transform="grow-8" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="" style="transform-origin: 0.4375em 0.5em;"><g transform="translate(224 256)"><g transform="translate(0, 0)  scale(1.5, 1.5)  rotate(0 0 0)"><path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z" transform="translate(-224 -256)"></path></g></g></svg><!-- <span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> Font Awesome fontawesome.com --> facebook</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->


    


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="./vendors/popper/popper.min.js"></script>
    <script src="./vendors/bootstrap/bootstrap.min.js"></script>
    <script src="./vendors/anchorjs/anchor.min.js"></script>
    <script src="./vendors/is/is.min.js"></script>
    <script src="./assets/js/flatpickr.js"></script><div class="flatpickr-calendar animate" tabindex="-1"><div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-month"><div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month" tabindex="-1"><option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option><option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option><option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option><option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option><option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option><option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option><option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option><option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option><option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option><option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option><option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option><option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option></select><div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1" aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div></div></div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays"><div class="flatpickr-weekdaycontainer">
      <span class="flatpickr-weekday">
        Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
      </span>
      </div></div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="May 29, 2022" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="May 30, 2022" tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="May 31, 2022" tabindex="-1">31</span><span class="flatpickr-day " aria-label="June 1, 2022" tabindex="-1">1</span><span class="flatpickr-day " aria-label="June 2, 2022" tabindex="-1">2</span><span class="flatpickr-day " aria-label="June 3, 2022" tabindex="-1">3</span><span class="flatpickr-day " aria-label="June 4, 2022" tabindex="-1">4</span><span class="flatpickr-day " aria-label="June 5, 2022" tabindex="-1">5</span><span class="flatpickr-day " aria-label="June 6, 2022" tabindex="-1">6</span><span class="flatpickr-day " aria-label="June 7, 2022" tabindex="-1">7</span><span class="flatpickr-day " aria-label="June 8, 2022" tabindex="-1">8</span><span class="flatpickr-day " aria-label="June 9, 2022" tabindex="-1">9</span><span class="flatpickr-day " aria-label="June 10, 2022" tabindex="-1">10</span><span class="flatpickr-day " aria-label="June 11, 2022" tabindex="-1">11</span><span class="flatpickr-day " aria-label="June 12, 2022" tabindex="-1">12</span><span class="flatpickr-day " aria-label="June 13, 2022" tabindex="-1">13</span><span class="flatpickr-day " aria-label="June 14, 2022" tabindex="-1">14</span><span class="flatpickr-day today" aria-label="June 15, 2022" aria-current="date" tabindex="-1">15</span><span class="flatpickr-day " aria-label="June 16, 2022" tabindex="-1">16</span><span class="flatpickr-day " aria-label="June 17, 2022" tabindex="-1">17</span><span class="flatpickr-day " aria-label="June 18, 2022" tabindex="-1">18</span><span class="flatpickr-day " aria-label="June 19, 2022" tabindex="-1">19</span><span class="flatpickr-day " aria-label="June 20, 2022" tabindex="-1">20</span><span class="flatpickr-day " aria-label="June 21, 2022" tabindex="-1">21</span><span class="flatpickr-day " aria-label="June 22, 2022" tabindex="-1">22</span><span class="flatpickr-day " aria-label="June 23, 2022" tabindex="-1">23</span><span class="flatpickr-day " aria-label="June 24, 2022" tabindex="-1">24</span><span class="flatpickr-day " aria-label="June 25, 2022" tabindex="-1">25</span><span class="flatpickr-day " aria-label="June 26, 2022" tabindex="-1">26</span><span class="flatpickr-day " aria-label="June 27, 2022" tabindex="-1">27</span><span class="flatpickr-day " aria-label="June 28, 2022" tabindex="-1">28</span><span class="flatpickr-day " aria-label="June 29, 2022" tabindex="-1">29</span><span class="flatpickr-day " aria-label="June 30, 2022" tabindex="-1">30</span><span class="flatpickr-day nextMonthDay" aria-label="July 1, 2022" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="July 2, 2022" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="July 3, 2022" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="July 4, 2022" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="July 5, 2022" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="July 6, 2022" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay" aria-label="July 7, 2022" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay" aria-label="July 8, 2022" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay" aria-label="July 9, 2022" tabindex="-1">9</span></div></div></div></div></div><div class="flatpickr-calendar animate" tabindex="-1"><div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-month"><div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month" tabindex="-1"><option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option><option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option><option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option><option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option><option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option><option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option><option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option><option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option><option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option><option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option><option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option><option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option></select><div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1" aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div></div></div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays"><div class="flatpickr-weekdaycontainer">
      <span class="flatpickr-weekday">
        Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
      </span>
      </div></div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="May 29, 2022" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="May 30, 2022" tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="May 31, 2022" tabindex="-1">31</span><span class="flatpickr-day " aria-label="June 1, 2022" tabindex="-1">1</span><span class="flatpickr-day " aria-label="June 2, 2022" tabindex="-1">2</span><span class="flatpickr-day " aria-label="June 3, 2022" tabindex="-1">3</span><span class="flatpickr-day " aria-label="June 4, 2022" tabindex="-1">4</span><span class="flatpickr-day " aria-label="June 5, 2022" tabindex="-1">5</span><span class="flatpickr-day " aria-label="June 6, 2022" tabindex="-1">6</span><span class="flatpickr-day " aria-label="June 7, 2022" tabindex="-1">7</span><span class="flatpickr-day " aria-label="June 8, 2022" tabindex="-1">8</span><span class="flatpickr-day " aria-label="June 9, 2022" tabindex="-1">9</span><span class="flatpickr-day " aria-label="June 10, 2022" tabindex="-1">10</span><span class="flatpickr-day " aria-label="June 11, 2022" tabindex="-1">11</span><span class="flatpickr-day " aria-label="June 12, 2022" tabindex="-1">12</span><span class="flatpickr-day " aria-label="June 13, 2022" tabindex="-1">13</span><span class="flatpickr-day " aria-label="June 14, 2022" tabindex="-1">14</span><span class="flatpickr-day today" aria-label="June 15, 2022" aria-current="date" tabindex="-1">15</span><span class="flatpickr-day " aria-label="June 16, 2022" tabindex="-1">16</span><span class="flatpickr-day " aria-label="June 17, 2022" tabindex="-1">17</span><span class="flatpickr-day " aria-label="June 18, 2022" tabindex="-1">18</span><span class="flatpickr-day " aria-label="June 19, 2022" tabindex="-1">19</span><span class="flatpickr-day " aria-label="June 20, 2022" tabindex="-1">20</span><span class="flatpickr-day " aria-label="June 21, 2022" tabindex="-1">21</span><span class="flatpickr-day " aria-label="June 22, 2022" tabindex="-1">22</span><span class="flatpickr-day " aria-label="June 23, 2022" tabindex="-1">23</span><span class="flatpickr-day " aria-label="June 24, 2022" tabindex="-1">24</span><span class="flatpickr-day " aria-label="June 25, 2022" tabindex="-1">25</span><span class="flatpickr-day " aria-label="June 26, 2022" tabindex="-1">26</span><span class="flatpickr-day " aria-label="June 27, 2022" tabindex="-1">27</span><span class="flatpickr-day " aria-label="June 28, 2022" tabindex="-1">28</span><span class="flatpickr-day " aria-label="June 29, 2022" tabindex="-1">29</span><span class="flatpickr-day " aria-label="June 30, 2022" tabindex="-1">30</span><span class="flatpickr-day nextMonthDay" aria-label="July 1, 2022" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="July 2, 2022" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="July 3, 2022" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="July 4, 2022" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="July 5, 2022" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="July 6, 2022" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay" aria-label="July 7, 2022" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay" aria-label="July 8, 2022" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay" aria-label="July 9, 2022" tabindex="-1">9</span></div></div></div></div></div><div class="flatpickr-calendar animate" tabindex="-1"><div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-month"><div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month" tabindex="-1"><option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option><option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option><option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option><option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option><option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option><option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option><option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option><option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option><option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option><option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option><option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option><option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option></select><div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1" aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div></div></div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays"><div class="flatpickr-weekdaycontainer">
      <span class="flatpickr-weekday">
        Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
      </span>
      </div></div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="May 29, 2022" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="May 30, 2022" tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="May 31, 2022" tabindex="-1">31</span><span class="flatpickr-day " aria-label="June 1, 2022" tabindex="-1">1</span><span class="flatpickr-day " aria-label="June 2, 2022" tabindex="-1">2</span><span class="flatpickr-day " aria-label="June 3, 2022" tabindex="-1">3</span><span class="flatpickr-day " aria-label="June 4, 2022" tabindex="-1">4</span><span class="flatpickr-day " aria-label="June 5, 2022" tabindex="-1">5</span><span class="flatpickr-day " aria-label="June 6, 2022" tabindex="-1">6</span><span class="flatpickr-day " aria-label="June 7, 2022" tabindex="-1">7</span><span class="flatpickr-day " aria-label="June 8, 2022" tabindex="-1">8</span><span class="flatpickr-day " aria-label="June 9, 2022" tabindex="-1">9</span><span class="flatpickr-day " aria-label="June 10, 2022" tabindex="-1">10</span><span class="flatpickr-day " aria-label="June 11, 2022" tabindex="-1">11</span><span class="flatpickr-day " aria-label="June 12, 2022" tabindex="-1">12</span><span class="flatpickr-day " aria-label="June 13, 2022" tabindex="-1">13</span><span class="flatpickr-day " aria-label="June 14, 2022" tabindex="-1">14</span><span class="flatpickr-day today" aria-label="June 15, 2022" aria-current="date" tabindex="-1">15</span><span class="flatpickr-day " aria-label="June 16, 2022" tabindex="-1">16</span><span class="flatpickr-day " aria-label="June 17, 2022" tabindex="-1">17</span><span class="flatpickr-day " aria-label="June 18, 2022" tabindex="-1">18</span><span class="flatpickr-day " aria-label="June 19, 2022" tabindex="-1">19</span><span class="flatpickr-day " aria-label="June 20, 2022" tabindex="-1">20</span><span class="flatpickr-day " aria-label="June 21, 2022" tabindex="-1">21</span><span class="flatpickr-day " aria-label="June 22, 2022" tabindex="-1">22</span><span class="flatpickr-day " aria-label="June 23, 2022" tabindex="-1">23</span><span class="flatpickr-day " aria-label="June 24, 2022" tabindex="-1">24</span><span class="flatpickr-day " aria-label="June 25, 2022" tabindex="-1">25</span><span class="flatpickr-day " aria-label="June 26, 2022" tabindex="-1">26</span><span class="flatpickr-day " aria-label="June 27, 2022" tabindex="-1">27</span><span class="flatpickr-day " aria-label="June 28, 2022" tabindex="-1">28</span><span class="flatpickr-day " aria-label="June 29, 2022" tabindex="-1">29</span><span class="flatpickr-day " aria-label="June 30, 2022" tabindex="-1">30</span><span class="flatpickr-day nextMonthDay" aria-label="July 1, 2022" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="July 2, 2022" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="July 3, 2022" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="July 4, 2022" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="July 5, 2022" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="July 6, 2022" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay" aria-label="July 7, 2022" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay" aria-label="July 8, 2022" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay" aria-label="July 9, 2022" tabindex="-1">9</span></div></div></div></div></div><div class="flatpickr-calendar animate" tabindex="-1"><div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-month"><div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month" tabindex="-1"><option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option><option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option><option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option><option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option><option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option><option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option><option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option><option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option><option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option><option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option><option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option><option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option></select><div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1" aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div></div></div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays"><div class="flatpickr-weekdaycontainer">
      <span class="flatpickr-weekday">
        Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
      </span>
      </div></div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="May 29, 2022" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="May 30, 2022" tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="May 31, 2022" tabindex="-1">31</span><span class="flatpickr-day " aria-label="June 1, 2022" tabindex="-1">1</span><span class="flatpickr-day " aria-label="June 2, 2022" tabindex="-1">2</span><span class="flatpickr-day " aria-label="June 3, 2022" tabindex="-1">3</span><span class="flatpickr-day " aria-label="June 4, 2022" tabindex="-1">4</span><span class="flatpickr-day " aria-label="June 5, 2022" tabindex="-1">5</span><span class="flatpickr-day " aria-label="June 6, 2022" tabindex="-1">6</span><span class="flatpickr-day " aria-label="June 7, 2022" tabindex="-1">7</span><span class="flatpickr-day " aria-label="June 8, 2022" tabindex="-1">8</span><span class="flatpickr-day " aria-label="June 9, 2022" tabindex="-1">9</span><span class="flatpickr-day " aria-label="June 10, 2022" tabindex="-1">10</span><span class="flatpickr-day " aria-label="June 11, 2022" tabindex="-1">11</span><span class="flatpickr-day " aria-label="June 12, 2022" tabindex="-1">12</span><span class="flatpickr-day " aria-label="June 13, 2022" tabindex="-1">13</span><span class="flatpickr-day " aria-label="June 14, 2022" tabindex="-1">14</span><span class="flatpickr-day today" aria-label="June 15, 2022" aria-current="date" tabindex="-1">15</span><span class="flatpickr-day " aria-label="June 16, 2022" tabindex="-1">16</span><span class="flatpickr-day " aria-label="June 17, 2022" tabindex="-1">17</span><span class="flatpickr-day " aria-label="June 18, 2022" tabindex="-1">18</span><span class="flatpickr-day " aria-label="June 19, 2022" tabindex="-1">19</span><span class="flatpickr-day " aria-label="June 20, 2022" tabindex="-1">20</span><span class="flatpickr-day " aria-label="June 21, 2022" tabindex="-1">21</span><span class="flatpickr-day " aria-label="June 22, 2022" tabindex="-1">22</span><span class="flatpickr-day " aria-label="June 23, 2022" tabindex="-1">23</span><span class="flatpickr-day " aria-label="June 24, 2022" tabindex="-1">24</span><span class="flatpickr-day " aria-label="June 25, 2022" tabindex="-1">25</span><span class="flatpickr-day " aria-label="June 26, 2022" tabindex="-1">26</span><span class="flatpickr-day " aria-label="June 27, 2022" tabindex="-1">27</span><span class="flatpickr-day " aria-label="June 28, 2022" tabindex="-1">28</span><span class="flatpickr-day " aria-label="June 29, 2022" tabindex="-1">29</span><span class="flatpickr-day " aria-label="June 30, 2022" tabindex="-1">30</span><span class="flatpickr-day nextMonthDay" aria-label="July 1, 2022" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="July 2, 2022" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="July 3, 2022" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="July 4, 2022" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="July 5, 2022" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="July 6, 2022" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay" aria-label="July 7, 2022" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay" aria-label="July 8, 2022" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay" aria-label="July 9, 2022" tabindex="-1">9</span></div></div></div></div></div>
    <script src="./vendors/fontawesome/all.min.js"></script>
    <script src="./vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="./vendors/list.js/list.min.js"></script>
    <script src="./assets/js/theme.js"></script>

  

</body>

</html>