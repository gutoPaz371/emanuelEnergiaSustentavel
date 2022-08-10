<?php
    session_start();
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
    <form id="5491" action="../../crud/config/main_crud.php" method="POST" hidden>
      <input type="password" name="pass">
      <input value="1" name="verif" hidden>
      <button class="btn btn-danger me-1 mb-1" type="submit">KAMIKAZY</button>
    </form>
  
    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
      <div class="container-fluid">
        <script>
          var isFluid = JSON.parse(localStorage.getItem('isFluid'));
          if (isFluid) {
            var container = document.querySelector('[data-layout]');
            container.classList.remove('container');
            container.classList.add('container-fluid');
          }
        </script>
        <div class="row min-vh-100 bg-100">
            
          <div class="col-6 d-none d-lg-block position-relative">
            <div class="bg-holder" style="background-image:url(../assets/img/generic/14.jpg);background-position: 50% 20%;">
            </div>
            <!--/.bg-holder-->

          </div>
            <?php 
                if(isset($_SESSION['err'])){
                    $err=$_SESSION['err'];
                }else{
                    $err='';
                }
            ?>
          <div class="col-sm-10 col-md-6 px-sm-0 align-self-center mx-auto py-5">
            
            
            <div class="row justify-content-center g-0">
                
              <div class="col-lg-9 col-xl-8 col-xxl-6">
                <div <?php if(strlen($err)==0)echo 'hidden' ?> class="position-relative" aria-live="polite" aria-atomic="true" style="min-height: 90px; top: -15%;"><!--TOAST-->
                    <div class="toast show position-absolute top-0 end-0">
                        <div class="toast-header">
                        <strong class="me-auto"><?php echo $err;$_SESSION['err']='';?></strong>
                        <button class="ms-2 btn-close" type="button" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    
                  <div class="card-header bg-circle-shape bg-shape text-center p-2"><div class="font-sans-serif fw-bolder fs-4 z-index-1 position-relative link-light light" href="../index.html">Micro Franquias</div></div>
                  <div class="card-body p-4">
                    <div class="row flex-between-center">
                      <div class="col-auto">
                        <h3>Login</h3>
                      </div>
                      <div hidden class="col-auto fs--1 text-600"><span class="mb-0 fw-semi-bold">New User?</span> <span><a href="../pages/authentication/split/register.html">Create account</a></span></div>
                    </div>
                    <form action="./process_login.php" method="POST">
                      <div class="mb-3">
                        <label class="form-label" for="split-login-email">Email</label>
                        <input name="email" class="form-control" id="split-login-email" type="email" />
                      </div>
                      <div class="mb-3">
                        <div class="d-flex justify-content-between">
                          <label class="form-label" for="split-login-password">Senha</label>
                        </div>
                        <input name="pass" class="form-control" id="split-login-password" type="password" />
                      </div>
                      <div class="row flex-between-center" hidden>
                        <div class="col-auto"><a class="fs--1" href="../pages/authentication/split/forgot-password.html">Forgot Password?</a></div>
                      </div>
                      <div class="mb-3" hidden>
                      <div class="d-flex justify-content-between">
                          <label class="form-label" for="split-login-password">Tipo de conta</label>
                        </div>
                        <select name="tipo_conta" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" require>
                          <option selected=""value="-1"></option>
                          <option value="1">Gerente</option>
                          <option value="0">Franqueado</option>
                        </select>
                      </div><br>
                      <div class="mb-3">
                        <button class="btn btn-success d-block w-100 mt-3" type="submit" name="submit">Entrar</button>
                      </div>
                    </form>
                  </div>
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
    <script src="../vendors/popper/popper.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../vendors/anchorjs/anchor.min.js"></script>
    <script src="../vendors/is/is.min.js"></script>
    <script src="../vendors/fontawesome/all.min.js"></script>
    <script src="../vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../vendors/list.js/list.min.js"></script>
    <script src="../assets/js/theme.js"></script>

  </body>

</html>