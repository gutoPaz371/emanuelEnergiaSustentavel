<?php
  include '../../crud/config/conexao.php';
  session_start();
  if(!isset($_SESSION['id_user_franqueado'])){
    header('location: ../../');
  }
  var_dump($_SESSION);
  $id=$_SESSION['id_user_franqueado'];
  $res=mysqli_fetch_assoc($cn->query("SELECT * FROM franqueado WHERE id='$id'"));
  $idEnd=$res['id_endereco'];
  $end=mysqli_fetch_assoc($cn->query("SELECT * FROM endereco WHERE id='$idEnd'"));
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
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicons/favicon.ico">
    <link rel="manifest" href="../assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="../assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="../assets/js/config.js"></script>
    <script src="../vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="../vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="../vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="../assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="../assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="../assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="../assets/css/user.min.css" rel="stylesheet" id="user-style-default">
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
      <div class="container" data-layout="container">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl"></nav>
        <div class="content">
        <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">
            <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="../index.php">
              <div class="d-flex align-items-center"><img class="me-2" src="../assets/img/icons/spot-illustrations/falcon.png" alt="" width="40"><span class="font-sans-serif">falcon</span>
              </div>
            </a>

            <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">




            <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="avatar avatar-xl">
                  <img class="rounded-circle" src="../assets/img/team/configuration.png" alt="">

                </div>
              </a>
              <div class="dropdown-menu dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                <div class="bg-white dark__bg-1000 rounded-2 py-2">
                  <a class="dropdown-item" href="#">Configura????es</a>
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
              <p class="mb-0 flex-1">A simple danger alert???check it out!</p>
              <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          </div>


          <!--AVISO ALERT END-->
        <a href="./<?php echo $_GET['pg']; ?>?pg2=<?php if(isset($_GET['pg2']))echo $_GET['pg2']; ?>" class="btn btn-falcon-info me-1 mb-1" type="button"><i class="fas fa-arrow-left"></i></a>
          <div class="row">
            <div class="col-12">
              <div class="card mb-3 btn-reveal-trigger" hidden>
                <div class="card-header position-relative min-vh-25 mb-8">
                  <div class="cover-image">
                    <div class="bg-holder rounded-3 rounded-bottom-0" style="background-image:url(../assets/img/generic/4.jpg);">
                    </div>
                    <!--/.bg-holder-->

                    <input class="d-none" id="upload-cover-image" type="file">
                    <label class="cover-image-file-input" for="upload-cover-image"><svg class="svg-inline--fa fa-camera fa-w-16 me-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="camera" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"></path></svg><!-- <span class="fas fa-camera me-2"></span> Font Awesome fontawesome.com --><span>Change cover photo</span></label>
                  </div>
                  <div class="avatar avatar-5xl avatar-profile shadow-sm img-thumbnail rounded-circle">
                    <div class="h-100 w-100 rounded-circle overflow-hidden position-relative"> <img src="../assets/img/team/2.jpg" width="200" alt="" data-dz-thumbnail="data-dz-thumbnail">
                      <input class="d-none" id="profile-image" type="file">
                      <label class="mb-0 overlay-icon d-flex flex-center" for="profile-image"><span class="bg-holder overlay overlay-0"></span><span class="z-index-1 text-white dark__text-white text-center fs--1"><svg class="svg-inline--fa fa-camera fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="camera" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"></path></svg><!-- <span class="fas fa-camera"></span> Font Awesome fontawesome.com --><span class="d-block">Update</span></span></label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row g-0">
          <div class="col-lg-8 pe-lg-2">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0">Endere??o</h5>
                </div>
                <div class="card-body bg-light">
                  <form class="row g-3" action="./processos/edit_franqueado.php" method="POST">
                    <input name="tipo"value="0" hidden />
                    <input name="pg_get" value="<?php echo $_GET['pg']; ?>" hidden/>
                    <input name="pg2" value="<?php if(isset($_GET['pg2']))echo $_GET['pg2'] ?>" hidden/>
                    <div class="col-lg-6">
                      <label class="form-label" for="first-name">Estado</label>
                      <input class="form-control" id="first-name" type="text" value="<?php echo $end['estado'] ?>">
                    </div>
                    <div class="col-lg-6">
                      <label class="form-label" for="email1">Cidade</label>
                      <input class="form-control" id="email1" type="text">
                    </div>
                    <div class="col-lg-6">
                      <label class="form-label" for="email2">Rua</label>
                      <input class="form-control" type="text" maxlength="16">
                    </div>
                    <div class="col-lg-2">
                      <label class="form-label" for="email2">Numero</label>
                      <input class="form-control" type="text" maxlength="16">
                    </div>
                    <div class="col-lg-3">
                      <label class="form-label" for="email2">CEP</label>
                      <input class="form-control" type="text" maxlength="16">
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                      <button class="btn btn-success" type="submit">Atualizar</button>
                    </div>
                  </form>
                </div>
              </div>
              
              
            </div>
            
            <div class="col-lg-8 pe-lg-2">
              <div class="card mb-3">
                <div class="card-header">
                  <h5 class="mb-0">Seus Dados</h5>
                </div>
                <div class="card-body bg-light">
                  <form class="row g-3" action="./processos/edit_franqueado.php" method="POST">
                    <input name="tipo"value="1" hidden />
                    <input name="pg_get" value="<?php echo $_GET['pg']; ?>" hidden/>
                    <input name="pg2" value="<?php if(isset($_GET['pg2']))echo $_GET['pg2'] ?>" hidden/>               
                    <div class="col-lg-6">
                      <label class="form-label" for="first-name">Nome</label>
                      <input class="form-control" id="first-name" type="text" value="<?php echo $res['nome'] ?>">
                    </div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                      <label class="form-label" for="email1">Email</label>
                      <input class="form-control" id="email1" type="text" value="<?php echo $res['email'] ?>">
                    </div>
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6">
                      <label class="form-label" for="email2">Telefone</label>
                      <input onkeypress="phonumber(this)" id="number" class="form-control" value="<?php echo $res['numero'] ?>" type="text" maxlength="16">
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                      <button class="btn btn-success" type="submit">Atualizar</button>
                    </div>
                  </form>
                </div>
              </div>
              
              
            </div>
            
            <div class="col-lg-4 ps-lg-2">
              <div class="sticky-sidebar">
                
                
                <div class="card mb-3">
                  <div class="card-header">
                    <h5 class="mb-0">Change Password</h5>
                  </div>
                  <div class="card-body bg-light">
                    <form action="./processos/edit_franqueado.php" method="POST">
                      <input name="tipo"value="2" hidden />
                      <input name="pg_get" value="<?php echo $_GET['pg']; ?>" hidden/>
                      <input name="pg2" value="<?php if(isset($_GET['pg2']))echo $_GET['pg2'] ?>" hidden/>
                      <div class="mb-3">
                        <label class="form-label" for="old-password">Senha Antiga</label>
                        <input class="form-control" id="old-password" type="password">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="new-password">Nova Senha</label>
                        <input class="form-control" id="new-password" type="password">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="confirm-password">Confirmar Nova Senha</label>
                        <input class="form-control" id="confirm-password" type="password">
                      </div>
                      <button class="btn btn-warning d-block w-100" type="submit">Alterar senha</button>
                    </form>
                  </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h5 class="mb-0">Geral</h5>
                  </div>
                  <div class="card-body bg-light">
                    <h5 class="fs-0" id="old0">Deletar essa conta?</h5>
                    <p class="fs--1" id="old1">Voce tem ate 2 m??s para recuperar sua conta de volta!</p>
                    <form action="./processos/edit_franqueado.php" method="POST">
                      <div id="passWord" hidden>
                        <label class="form-label" for="customDatalist">Digite Sua Senha:</label>
                        <input class="form-control" type="text"><br>
                        <label class="form-label" for="customDatalist">Deseja mesmo deletar sua conta?</label>
                        <button class="btn btn-falcon-danger d-block">SIM</button><br>
                        <a onclick="pass2(this)" class="btn btn-falcon-success d-block">N??O</a>
                      </div>
                      <input name="tipo" value="3" hidden/>
                      <input name="pg_get" value="<?php echo $_GET['pg']; ?>" hidden/>
                      <input name="pg2" value="<?php if(isset($_GET['pg2']))echo $_GET['pg2'] ?>" hidden/>
                      <div id="old2">
                        <a class="btn btn-falcon-danger d-block" onclick="pass(this)">Deletar Conta</a>
                      </div>
                      
                    </form>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <script>
            
            function pass(){
              let old0=document.getElementById('old0');
              let old1=document.getElementById('old1');
              let old2=document.getElementById('old2');
              let pass=document.getElementById('passWord');
              pass.hidden=false;
              old0.hidden=true;
              //old1.hidden=true;
              old2.hidden=true;
            }function pass2(){
              let old0=document.getElementById('old0');
              let old1=document.getElementById('old1');
              let old2=document.getElementById('old2');
              let pass=document.getElementById('passWord');
              pass.hidden=true;
              old0.hidden=false;
              //old1.hidden=true;
              old2.hidden=false;
            }
            
            
            
          </script>
          <footer class="footer">
            <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
            <div class="col-12 col-sm-auto text-center">
              <p class="mb-0 text-600">Melhor servi??o para uma energia limpa<span class="d-none d-sm-inline-block">| </span><br class="d-sm-none"> 2022 ?? <a href="https://www.emanuelenergiasustentavel.com.br/" target="_blank">Emanuel</a></p>
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
                <form>
                  <div class="mb-3">
                    <label class="form-label" for="modal-auth-name">Name</label>
                    <input class="form-control" type="text" autocomplete="on" id="modal-auth-name">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="modal-auth-email">Email address</label>
                    <input class="form-control" type="email" autocomplete="on" id="modal-auth-email">
                  </div>
                  <div class="row gx-2">
                    <div class="mb-3 col-sm-6">
                      <label class="form-label" for="modal-auth-password">Password</label>
                      <input class="form-control" type="password" autocomplete="on" id="modal-auth-password">
                    </div>
                    <div class="mb-3 col-sm-6">
                      <label class="form-label" for="modal-auth-confirm-password">Confirm Password</label>
                      <input class="form-control" type="password" autocomplete="on" id="modal-auth-confirm-password">
                    </div>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="modal-auth-register-checkbox">
                    <label class="form-label" for="modal-auth-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                  </div>
                  <div class="mb-3">
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Register</button>
                  </div>
                </form>
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


    <div class="offcanvas offcanvas-end settings-panel border-0" id="settings-offcanvas" tabindex="-1" aria-labelledby="settings-offcanvas">
      <div class="offcanvas-header settings-panel-header bg-shape">
        <div class="z-index-1 py-1 light">
          <div class="d-flex justify-content-between align-items-center mb-1">
            <h5 class="text-white mb-0 me-2"><svg class="svg-inline--fa fa-palette fa-w-16 me-2 fs-0" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="palette" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M204.3 5C104.9 24.4 24.8 104.3 5.2 203.4c-37 187 131.7 326.4 258.8 306.7 41.2-6.4 61.4-54.6 42.5-91.7-23.1-45.4 9.9-98.4 60.9-98.4h79.7c35.8 0 64.8-29.6 64.9-65.3C511.5 97.1 368.1-26.9 204.3 5zM96 320c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm32-128c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128-64c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32zm128 64c-17.7 0-32-14.3-32-32s14.3-32 32-32 32 14.3 32 32-14.3 32-32 32z"></path></svg><!-- <span class="fas fa-palette me-2 fs-0"></span> Font Awesome fontawesome.com -->Settings</h5>
            <button class="btn btn-primary btn-sm rounded-pill mt-0 mb-0" data-theme-control="reset" style="font-size:12px"> <svg class="svg-inline--fa fa-redo-alt fa-w-16 me-1" data-fa-transform="shrink-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="redo-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;"><g transform="translate(256 256)"><g transform="translate(0, 0)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M256.455 8c66.269.119 126.437 26.233 170.859 68.685l35.715-35.715C478.149 25.851 504 36.559 504 57.941V192c0 13.255-10.745 24-24 24H345.941c-21.382 0-32.09-25.851-16.971-40.971l41.75-41.75c-30.864-28.899-70.801-44.907-113.23-45.273-92.398-.798-170.283 73.977-169.484 169.442C88.764 348.009 162.184 424 256 424c41.127 0 79.997-14.678 110.629-41.556 4.743-4.161 11.906-3.908 16.368.553l39.662 39.662c4.872 4.872 4.631 12.815-.482 17.433C378.202 479.813 319.926 504 256 504 119.034 504 8.001 392.967 8 256.002 7.999 119.193 119.646 7.755 256.455 8z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="fas fa-redo-alt me-1" data-fa-transform="shrink-3"></span> Font Awesome fontawesome.com -->Reset</button>
          </div>
          <p class="mb-0 fs--1 text-white opacity-75"> Set your own customized style</p>
        </div>
        <button class="btn-close btn-close-white z-index-1 mt-0" type="button" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body scrollbar-overlay px-card os-host os-theme-dark os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition" id="themeController"><div class="os-resize-observer-host observed"><div class="os-resize-observer" style="left: 0px; right: auto;"></div></div><div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;"><div class="os-resize-observer"></div></div><div class="os-content-glue" style="margin: -16px -20px;"></div><div class="os-padding"><div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;"><div class="os-content" style="padding: 16px 20px; height: 100%; width: 100%;">
        <h5 class="fs-0">Color Scheme</h5>
        <p class="fs--1">Choose the perfect color mode for your app.</p>
        <div class="btn-group d-block w-100 btn-group-navbar-style">
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="themeSwitcherLight" name="theme-color" type="radio" value="light" data-theme-control="theme">
              <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherLight"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../assets/img/generic/falcon-mode-default.jpg" alt=""></span><span class="label-text">Light</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="themeSwitcherDark" name="theme-color" type="radio" value="dark" data-theme-control="theme" checked="true">
              <label class="btn d-inline-block btn-navbar-style fs--1" for="themeSwitcherDark"> <span class="hover-overlay mb-2 rounded d-block"><img class="img-fluid img-prototype mb-0" src="../assets/img/generic/falcon-mode-dark.jpg" alt=""></span><span class="label-text"> Dark</span></label>
            </div>
          </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-start"><img class="me-2" src="../assets/img/icons/left-arrow-from-left.svg" width="20" alt="">
            <div class="flex-1">
              <h5 class="fs-0">RTL Mode</h5>
              <p class="fs--1 mb-0">Switch your language direction </p><a class="fs--1" href="../documentation/customization/configuration.html">RTL Documentation</a>
            </div>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input ms-0" id="mode-rtl" type="checkbox" data-theme-control="isRTL">
          </div>
        </div>
        <hr>
        <div class="d-flex justify-content-between">
          <div class="d-flex align-items-start"><img class="me-2" src="../assets/img/icons/arrows-h.svg" width="20" alt="">
            <div class="flex-1">
              <h5 class="fs-0">Fluid Layout</h5>
              <p class="fs--1 mb-0">Toggle container layout system </p><a class="fs--1" href="../documentation/customization/configuration.html">Fluid Documentation</a>
            </div>
          </div>
          <div class="form-check form-switch">
            <input class="form-check-input ms-0" id="mode-fluid" type="checkbox" data-theme-control="isFluid">
          </div>
        </div>
        <hr>
        <div class="d-flex align-items-start"><img class="me-2" src="../assets/img/icons/paragraph.svg" width="20" alt="">
          <div class="flex-1">
            <h5 class="fs-0 d-flex align-items-center">Navigation Position </h5>
            <p class="fs--1 mb-2">Select a suitable navigation system for your web application </p>
            <div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="option-navbar-vertical" type="radio" name="navbar" value="vertical" data-page-url="../modules/components/navs-and-tabs/vertical-navbar.html" data-theme-control="navbarPosition" checked="true">
                <label class="form-check-label" for="option-navbar-vertical">Vertical</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" id="option-navbar-top" type="radio" name="navbar" value="top" data-page-url="../modules/components/navs-and-tabs/top-navbar.html" data-theme-control="navbarPosition">
                <label class="form-check-label" for="option-navbar-top">Top</label>
              </div>
              <div class="form-check form-check-inline me-0">
                <input class="form-check-input" id="option-navbar-combo" type="radio" name="navbar" value="combo" data-page-url="../modules/components/navs-and-tabs/combo-navbar.html" data-theme-control="navbarPosition">
                <label class="form-check-label" for="option-navbar-combo">Combo</label>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <h5 class="fs-0 d-flex align-items-center">Vertical Navbar Style</h5>
        <p class="fs--1 mb-0">Switch between styles for your vertical navbar </p>
        <p> <a class="fs--1" href="../modules/components/navs-and-tabs/vertical-navbar.html#navbar-styles">See Documentation</a></p>
        <div class="btn-group d-block w-100 btn-group-navbar-style">
          <div class="row gx-2">
            <div class="col-6">
              <input class="btn-check" id="navbar-style-transparent" type="radio" name="navbarStyle" value="transparent" data-theme-control="navbarStyle" checked="true">
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-transparent"> <img class="img-fluid img-prototype" src="../assets/img/generic/default.png" alt=""><span class="label-text"> Transparent</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbar-style-inverted" type="radio" name="navbarStyle" value="inverted" data-theme-control="navbarStyle">
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-inverted"> <img class="img-fluid img-prototype" src="../assets/img/generic/inverted.png" alt=""><span class="label-text"> Inverted</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbar-style-card" type="radio" name="navbarStyle" value="card" data-theme-control="navbarStyle">
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-card"> <img class="img-fluid img-prototype" src="../assets/img/generic/card.png" alt=""><span class="label-text"> Card</span></label>
            </div>
            <div class="col-6">
              <input class="btn-check" id="navbar-style-vibrant" type="radio" name="navbarStyle" value="vibrant" data-theme-control="navbarStyle">
              <label class="btn d-block w-100 btn-navbar-style fs--1" for="navbar-style-vibrant"> <img class="img-fluid img-prototype" src="../assets/img/generic/vibrant.png" alt=""><span class="label-text"> Vibrant</span></label>
            </div>
          </div>
        </div>
        <div class="text-center mt-5"><img class="mb-4" src="../assets/img/icons/spot-illustrations/47.png" alt="" width="120">
          <h5>Like What You See?</h5>
          <p class="fs--1">Get Falcon now and create beautiful dashboards with hundreds of widgets.</p><a class="mb-3 btn btn-primary" href="https://themes.getbootstrap.com/product/falcon-admin-dashboard-webapp-template/" target="_blank">Purchase</a>
        </div>
      </div></div></div><div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden"><div class="os-scrollbar-track os-scrollbar-track-off"><div class="os-scrollbar-handle" style="height: 56.8685%; transform: translate(0px, 0px);"></div></div></div><div class="os-scrollbar-corner"></div></div>
    </div><a class="card setting-toggle" href="#settings-offcanvas" data-bs-toggle="offcanvas">
      <div class="card-body d-flex align-items-center py-md-2 px-2 py-1">
        <div class="bg-soft-primary position-relative rounded-start" style="height:34px;width:28px">
          <div class="settings-popover"><span class="ripple"><span class="fa-spin position-absolute all-0 d-flex flex-center"><span class="icon-spin position-absolute all-0 d-flex flex-center">
                  <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.7369 12.3941L19.1989 12.1065C18.4459 11.7041 18.0843 10.8487 18.0843 9.99495C18.0843 9.14118 18.4459 8.28582 19.1989 7.88336L19.7369 7.59581C19.9474 7.47484 20.0316 7.23291 19.9474 7.03131C19.4842 5.57973 18.6843 4.28943 17.6738 3.20075C17.5053 3.03946 17.2527 2.99914 17.0422 3.12011L16.393 3.46714C15.6883 3.84379 14.8377 3.74529 14.1476 3.3427C14.0988 3.31422 14.0496 3.28621 14.0002 3.25868C13.2568 2.84453 12.7055 2.10629 12.7055 1.25525V0.70081C12.7055 0.499202 12.5371 0.297594 12.2845 0.257272C10.7266 -0.105622 9.16879 -0.0653007 7.69516 0.257272C7.44254 0.297594 7.31623 0.499202 7.31623 0.70081V1.23474C7.31623 2.09575 6.74999 2.8362 5.99824 3.25599C5.95774 3.27861 5.91747 3.30159 5.87744 3.32493C5.15643 3.74527 4.26453 3.85902 3.53534 3.45302L2.93743 3.12011C2.72691 2.99914 2.47429 3.03946 2.30587 3.20075C1.29538 4.28943 0.495411 5.57973 0.0322686 7.03131C-0.051939 7.23291 0.0322686 7.47484 0.242788 7.59581L0.784376 7.8853C1.54166 8.29007 1.92694 9.13627 1.92694 9.99495C1.92694 10.8536 1.54166 11.6998 0.784375 12.1046L0.242788 12.3941C0.0322686 12.515 -0.051939 12.757 0.0322686 12.9586C0.495411 14.4102 1.29538 15.7005 2.30587 16.7891C2.47429 16.9504 2.72691 16.9907 2.93743 16.8698L3.58669 16.5227C4.29133 16.1461 5.14131 16.2457 5.8331 16.6455C5.88713 16.6767 5.94159 16.7074 5.99648 16.7375C6.75162 17.1511 7.31623 17.8941 7.31623 18.7552V19.2891C7.31623 19.4425 7.41373 19.5959 7.55309 19.696C7.64066 19.7589 7.74815 19.7843 7.85406 19.8046C9.35884 20.0925 10.8609 20.0456 12.2845 19.7729C12.5371 19.6923 12.7055 19.4907 12.7055 19.2891V18.7346C12.7055 17.8836 13.2568 17.1454 14.0002 16.7312C14.0496 16.7037 14.0988 16.6757 14.1476 16.6472C14.8377 16.2446 15.6883 16.1461 16.393 16.5227L17.0422 16.8698C17.2527 16.9907 17.5053 16.9504 17.6738 16.7891C18.7264 15.7005 19.4842 14.4102 19.9895 12.9586C20.0316 12.757 19.9474 12.515 19.7369 12.3941ZM10.0109 13.2005C8.1162 13.2005 6.64257 11.7893 6.64257 9.97478C6.64257 8.20063 8.1162 6.74905 10.0109 6.74905C11.8634 6.74905 13.3792 8.20063 13.3792 9.97478C13.3792 11.7893 11.8634 13.2005 10.0109 13.2005Z" fill="#2A7BE4"></path>
                  </svg></span></span></span></div>
        </div><small class="text-uppercase text-primary fw-bold bg-soft-primary py-2 pe-2 ps-1 rounded-end">customize</small>
      </div>
    </a>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="../vendors/popper/popper.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../vendors/anchorjs/anchor.min.js"></script>
    <script src="../vendors/is/is.min.js"></script>
    <script src="../assets/js/flatpickr.js"></script><div class="flatpickr-calendar animate" tabindex="-1"><div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-month"><div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month" tabindex="-1"><option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option><option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option><option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option><option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option><option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option><option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option><option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option><option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option><option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option><option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option><option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option><option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option></select><div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1" aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div></div></div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays"><div class="flatpickr-weekdaycontainer">
      <span class="flatpickr-weekday">
        Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
      </span>
      </div></div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="May 29, 2022" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="May 30, 2022" tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="May 31, 2022" tabindex="-1">31</span><span class="flatpickr-day " aria-label="June 1, 2022" tabindex="-1">1</span><span class="flatpickr-day " aria-label="June 2, 2022" tabindex="-1">2</span><span class="flatpickr-day " aria-label="June 3, 2022" tabindex="-1">3</span><span class="flatpickr-day " aria-label="June 4, 2022" tabindex="-1">4</span><span class="flatpickr-day " aria-label="June 5, 2022" tabindex="-1">5</span><span class="flatpickr-day " aria-label="June 6, 2022" tabindex="-1">6</span><span class="flatpickr-day " aria-label="June 7, 2022" tabindex="-1">7</span><span class="flatpickr-day " aria-label="June 8, 2022" tabindex="-1">8</span><span class="flatpickr-day " aria-label="June 9, 2022" tabindex="-1">9</span><span class="flatpickr-day " aria-label="June 10, 2022" tabindex="-1">10</span><span class="flatpickr-day " aria-label="June 11, 2022" tabindex="-1">11</span><span class="flatpickr-day " aria-label="June 12, 2022" tabindex="-1">12</span><span class="flatpickr-day " aria-label="June 13, 2022" tabindex="-1">13</span><span class="flatpickr-day " aria-label="June 14, 2022" tabindex="-1">14</span><span class="flatpickr-day " aria-label="June 15, 2022" tabindex="-1">15</span><span class="flatpickr-day " aria-label="June 16, 2022" tabindex="-1">16</span><span class="flatpickr-day " aria-label="June 17, 2022" tabindex="-1">17</span><span class="flatpickr-day " aria-label="June 18, 2022" tabindex="-1">18</span><span class="flatpickr-day " aria-label="June 19, 2022" tabindex="-1">19</span><span class="flatpickr-day " aria-label="June 20, 2022" tabindex="-1">20</span><span class="flatpickr-day today" aria-label="June 21, 2022" aria-current="date" tabindex="-1">21</span><span class="flatpickr-day " aria-label="June 22, 2022" tabindex="-1">22</span><span class="flatpickr-day " aria-label="June 23, 2022" tabindex="-1">23</span><span class="flatpickr-day " aria-label="June 24, 2022" tabindex="-1">24</span><span class="flatpickr-day " aria-label="June 25, 2022" tabindex="-1">25</span><span class="flatpickr-day " aria-label="June 26, 2022" tabindex="-1">26</span><span class="flatpickr-day " aria-label="June 27, 2022" tabindex="-1">27</span><span class="flatpickr-day " aria-label="June 28, 2022" tabindex="-1">28</span><span class="flatpickr-day " aria-label="June 29, 2022" tabindex="-1">29</span><span class="flatpickr-day " aria-label="June 30, 2022" tabindex="-1">30</span><span class="flatpickr-day nextMonthDay" aria-label="July 1, 2022" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="July 2, 2022" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="July 3, 2022" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="July 4, 2022" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="July 5, 2022" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="July 6, 2022" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay" aria-label="July 7, 2022" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay" aria-label="July 8, 2022" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay" aria-label="July 9, 2022" tabindex="-1">9</span></div></div></div></div></div><div class="flatpickr-calendar animate" tabindex="-1"><div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-month"><div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month" tabindex="-1"><option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option><option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option><option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option><option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option><option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option><option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option><option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option><option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option><option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option><option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option><option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option><option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option></select><div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1" aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div></div></div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays"><div class="flatpickr-weekdaycontainer">
      <span class="flatpickr-weekday">
        Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
      </span>
      </div></div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="May 29, 2022" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="May 30, 2022" tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="May 31, 2022" tabindex="-1">31</span><span class="flatpickr-day " aria-label="June 1, 2022" tabindex="-1">1</span><span class="flatpickr-day " aria-label="June 2, 2022" tabindex="-1">2</span><span class="flatpickr-day " aria-label="June 3, 2022" tabindex="-1">3</span><span class="flatpickr-day " aria-label="June 4, 2022" tabindex="-1">4</span><span class="flatpickr-day " aria-label="June 5, 2022" tabindex="-1">5</span><span class="flatpickr-day " aria-label="June 6, 2022" tabindex="-1">6</span><span class="flatpickr-day " aria-label="June 7, 2022" tabindex="-1">7</span><span class="flatpickr-day " aria-label="June 8, 2022" tabindex="-1">8</span><span class="flatpickr-day " aria-label="June 9, 2022" tabindex="-1">9</span><span class="flatpickr-day " aria-label="June 10, 2022" tabindex="-1">10</span><span class="flatpickr-day " aria-label="June 11, 2022" tabindex="-1">11</span><span class="flatpickr-day " aria-label="June 12, 2022" tabindex="-1">12</span><span class="flatpickr-day " aria-label="June 13, 2022" tabindex="-1">13</span><span class="flatpickr-day " aria-label="June 14, 2022" tabindex="-1">14</span><span class="flatpickr-day " aria-label="June 15, 2022" tabindex="-1">15</span><span class="flatpickr-day " aria-label="June 16, 2022" tabindex="-1">16</span><span class="flatpickr-day " aria-label="June 17, 2022" tabindex="-1">17</span><span class="flatpickr-day " aria-label="June 18, 2022" tabindex="-1">18</span><span class="flatpickr-day " aria-label="June 19, 2022" tabindex="-1">19</span><span class="flatpickr-day " aria-label="June 20, 2022" tabindex="-1">20</span><span class="flatpickr-day today" aria-label="June 21, 2022" aria-current="date" tabindex="-1">21</span><span class="flatpickr-day " aria-label="June 22, 2022" tabindex="-1">22</span><span class="flatpickr-day " aria-label="June 23, 2022" tabindex="-1">23</span><span class="flatpickr-day " aria-label="June 24, 2022" tabindex="-1">24</span><span class="flatpickr-day " aria-label="June 25, 2022" tabindex="-1">25</span><span class="flatpickr-day " aria-label="June 26, 2022" tabindex="-1">26</span><span class="flatpickr-day " aria-label="June 27, 2022" tabindex="-1">27</span><span class="flatpickr-day " aria-label="June 28, 2022" tabindex="-1">28</span><span class="flatpickr-day " aria-label="June 29, 2022" tabindex="-1">29</span><span class="flatpickr-day " aria-label="June 30, 2022" tabindex="-1">30</span><span class="flatpickr-day nextMonthDay" aria-label="July 1, 2022" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="July 2, 2022" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="July 3, 2022" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="July 4, 2022" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="July 5, 2022" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="July 6, 2022" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay" aria-label="July 7, 2022" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay" aria-label="July 8, 2022" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay" aria-label="July 9, 2022" tabindex="-1">9</span></div></div></div></div></div><div class="flatpickr-calendar animate" tabindex="-1"><div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-month"><div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month" tabindex="-1"><option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option><option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option><option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option><option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option><option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option><option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option><option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option><option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option><option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option><option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option><option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option><option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option></select><div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1" aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div></div></div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays"><div class="flatpickr-weekdaycontainer">
      <span class="flatpickr-weekday">
        Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
      </span>
      </div></div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="May 29, 2022" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="May 30, 2022" tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="May 31, 2022" tabindex="-1">31</span><span class="flatpickr-day " aria-label="June 1, 2022" tabindex="-1">1</span><span class="flatpickr-day " aria-label="June 2, 2022" tabindex="-1">2</span><span class="flatpickr-day " aria-label="June 3, 2022" tabindex="-1">3</span><span class="flatpickr-day " aria-label="June 4, 2022" tabindex="-1">4</span><span class="flatpickr-day " aria-label="June 5, 2022" tabindex="-1">5</span><span class="flatpickr-day " aria-label="June 6, 2022" tabindex="-1">6</span><span class="flatpickr-day " aria-label="June 7, 2022" tabindex="-1">7</span><span class="flatpickr-day " aria-label="June 8, 2022" tabindex="-1">8</span><span class="flatpickr-day " aria-label="June 9, 2022" tabindex="-1">9</span><span class="flatpickr-day " aria-label="June 10, 2022" tabindex="-1">10</span><span class="flatpickr-day " aria-label="June 11, 2022" tabindex="-1">11</span><span class="flatpickr-day " aria-label="June 12, 2022" tabindex="-1">12</span><span class="flatpickr-day " aria-label="June 13, 2022" tabindex="-1">13</span><span class="flatpickr-day " aria-label="June 14, 2022" tabindex="-1">14</span><span class="flatpickr-day " aria-label="June 15, 2022" tabindex="-1">15</span><span class="flatpickr-day " aria-label="June 16, 2022" tabindex="-1">16</span><span class="flatpickr-day " aria-label="June 17, 2022" tabindex="-1">17</span><span class="flatpickr-day " aria-label="June 18, 2022" tabindex="-1">18</span><span class="flatpickr-day " aria-label="June 19, 2022" tabindex="-1">19</span><span class="flatpickr-day " aria-label="June 20, 2022" tabindex="-1">20</span><span class="flatpickr-day today" aria-label="June 21, 2022" aria-current="date" tabindex="-1">21</span><span class="flatpickr-day " aria-label="June 22, 2022" tabindex="-1">22</span><span class="flatpickr-day " aria-label="June 23, 2022" tabindex="-1">23</span><span class="flatpickr-day " aria-label="June 24, 2022" tabindex="-1">24</span><span class="flatpickr-day " aria-label="June 25, 2022" tabindex="-1">25</span><span class="flatpickr-day " aria-label="June 26, 2022" tabindex="-1">26</span><span class="flatpickr-day " aria-label="June 27, 2022" tabindex="-1">27</span><span class="flatpickr-day " aria-label="June 28, 2022" tabindex="-1">28</span><span class="flatpickr-day " aria-label="June 29, 2022" tabindex="-1">29</span><span class="flatpickr-day " aria-label="June 30, 2022" tabindex="-1">30</span><span class="flatpickr-day nextMonthDay" aria-label="July 1, 2022" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="July 2, 2022" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="July 3, 2022" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="July 4, 2022" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="July 5, 2022" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="July 6, 2022" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay" aria-label="July 7, 2022" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay" aria-label="July 8, 2022" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay" aria-label="July 9, 2022" tabindex="-1">9</span></div></div></div></div></div><div class="flatpickr-calendar animate" tabindex="-1"><div class="flatpickr-months"><span class="flatpickr-prev-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-month"><div class="flatpickr-current-month"><select class="flatpickr-monthDropdown-months" aria-label="Month" tabindex="-1"><option class="flatpickr-monthDropdown-month" value="0" tabindex="-1">January</option><option class="flatpickr-monthDropdown-month" value="1" tabindex="-1">February</option><option class="flatpickr-monthDropdown-month" value="2" tabindex="-1">March</option><option class="flatpickr-monthDropdown-month" value="3" tabindex="-1">April</option><option class="flatpickr-monthDropdown-month" value="4" tabindex="-1">May</option><option class="flatpickr-monthDropdown-month" value="5" tabindex="-1">June</option><option class="flatpickr-monthDropdown-month" value="6" tabindex="-1">July</option><option class="flatpickr-monthDropdown-month" value="7" tabindex="-1">August</option><option class="flatpickr-monthDropdown-month" value="8" tabindex="-1">September</option><option class="flatpickr-monthDropdown-month" value="9" tabindex="-1">October</option><option class="flatpickr-monthDropdown-month" value="10" tabindex="-1">November</option><option class="flatpickr-monthDropdown-month" value="11" tabindex="-1">December</option></select><div class="numInputWrapper"><input class="numInput cur-year" type="number" tabindex="-1" aria-label="Year"><span class="arrowUp"></span><span class="arrowDown"></span></div></div></div><span class="flatpickr-next-month"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays"><div class="flatpickr-weekdaycontainer">
      <span class="flatpickr-weekday">
        Sun</span><span class="flatpickr-weekday">Mon</span><span class="flatpickr-weekday">Tue</span><span class="flatpickr-weekday">Wed</span><span class="flatpickr-weekday">Thu</span><span class="flatpickr-weekday">Fri</span><span class="flatpickr-weekday">Sat
      </span>
      </div></div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="May 29, 2022" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="May 30, 2022" tabindex="-1">30</span><span class="flatpickr-day prevMonthDay" aria-label="May 31, 2022" tabindex="-1">31</span><span class="flatpickr-day " aria-label="June 1, 2022" tabindex="-1">1</span><span class="flatpickr-day " aria-label="June 2, 2022" tabindex="-1">2</span><span class="flatpickr-day " aria-label="June 3, 2022" tabindex="-1">3</span><span class="flatpickr-day " aria-label="June 4, 2022" tabindex="-1">4</span><span class="flatpickr-day " aria-label="June 5, 2022" tabindex="-1">5</span><span class="flatpickr-day " aria-label="June 6, 2022" tabindex="-1">6</span><span class="flatpickr-day " aria-label="June 7, 2022" tabindex="-1">7</span><span class="flatpickr-day " aria-label="June 8, 2022" tabindex="-1">8</span><span class="flatpickr-day " aria-label="June 9, 2022" tabindex="-1">9</span><span class="flatpickr-day " aria-label="June 10, 2022" tabindex="-1">10</span><span class="flatpickr-day " aria-label="June 11, 2022" tabindex="-1">11</span><span class="flatpickr-day " aria-label="June 12, 2022" tabindex="-1">12</span><span class="flatpickr-day " aria-label="June 13, 2022" tabindex="-1">13</span><span class="flatpickr-day " aria-label="June 14, 2022" tabindex="-1">14</span><span class="flatpickr-day " aria-label="June 15, 2022" tabindex="-1">15</span><span class="flatpickr-day " aria-label="June 16, 2022" tabindex="-1">16</span><span class="flatpickr-day " aria-label="June 17, 2022" tabindex="-1">17</span><span class="flatpickr-day " aria-label="June 18, 2022" tabindex="-1">18</span><span class="flatpickr-day " aria-label="June 19, 2022" tabindex="-1">19</span><span class="flatpickr-day " aria-label="June 20, 2022" tabindex="-1">20</span><span class="flatpickr-day today" aria-label="June 21, 2022" aria-current="date" tabindex="-1">21</span><span class="flatpickr-day " aria-label="June 22, 2022" tabindex="-1">22</span><span class="flatpickr-day " aria-label="June 23, 2022" tabindex="-1">23</span><span class="flatpickr-day " aria-label="June 24, 2022" tabindex="-1">24</span><span class="flatpickr-day " aria-label="June 25, 2022" tabindex="-1">25</span><span class="flatpickr-day " aria-label="June 26, 2022" tabindex="-1">26</span><span class="flatpickr-day " aria-label="June 27, 2022" tabindex="-1">27</span><span class="flatpickr-day " aria-label="June 28, 2022" tabindex="-1">28</span><span class="flatpickr-day " aria-label="June 29, 2022" tabindex="-1">29</span><span class="flatpickr-day " aria-label="June 30, 2022" tabindex="-1">30</span><span class="flatpickr-day nextMonthDay" aria-label="July 1, 2022" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay" aria-label="July 2, 2022" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay" aria-label="July 3, 2022" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="July 4, 2022" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="July 5, 2022" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="July 6, 2022" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay" aria-label="July 7, 2022" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay" aria-label="July 8, 2022" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay" aria-label="July 9, 2022" tabindex="-1">9</span></div></div></div></div></div>
    <script src="../vendors/fontawesome/all.min.js"></script>
    <script src="../vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../vendors/list.js/list.min.js"></script>
    <script src="../assets/js/theme.js"></script>

  

  </body>

</html>