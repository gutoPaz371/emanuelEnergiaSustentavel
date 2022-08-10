<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../template/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../template/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../template/assets/images/favicon.png" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../template/partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar" >

      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../template/partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row" >
          <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
            <a class="navbar-brand brand-logo-mini" href="../template/index.html"><img src="../template/assets/images/logo-mini.svg" alt="logo" /></a>
          </div>
          <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
              <span class="mdi mdi-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item dropdown">
                <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                  <div class="navbar-profile">
                    <img class="img-xs rounded-circle" src="../template/assets/images/faces/face15.jpg" alt="" hidden>
                    <p class="mb-0 d-none d-sm-block navbar-profile-name">Henry Klein</p>
                    <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                  <h6 class="p-3 mb-0">Configuração</h6>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item" href="./edit_crm.php">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-settings text-success"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Perfil</p>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-thumbnail">
                      <div class="preview-icon bg-dark rounded-circle">
                        <i class="mdi mdi-logout text-danger"></i>
                      </div>
                    </div>
                    <div class="preview-item-content">
                      <p class="preview-subject mb-1">Sair</p>
                    </div>
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
              <span class="mdi mdi-format-line-spacing"></span>
            </button>
          </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Informções do perfil</h3>
              
            </div><a href="<?php echo $_GET['pg']; ?>" type="button" class="btn btn-danger btn-lg">Voltar</a><br>
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Dados</h4>
                    <div class="table-responsive">
                      <table class="table">
                        
                        <tbody>
                          <tr>
                            <td>NOME:</td>
                            <td><input disabled id="nome" value="eqwdqdqws" class="form-control"/></td>
                            <td><button type="button" onclick="edit(0)" class="btn btn-info btn-rounded btn-icon"><i class="mdi mdi-border-color"></i></button>
                                <button type="button" class="btn btn-danger btn-rounded btn-icon"><i class="mdi mdi-minus-circle"></i>
                            </button></td>
                          </tr>
                          <tr>
                            <td>PASS:</td>
                            <td><input disabled id="pass" class="form-control"/></td>
                            <td><button onclick="edit(1)" type="button" class="btn btn-info btn-rounded btn-icon"><i class="mdi mdi-border-color"></i></button>
                                <button type="button" class="btn btn-danger btn-rounded btn-icon"><i class="mdi mdi-minus-circle"></i>
                            </button></td>
                          </tr>
                          <tr>
                            <td>KEY: </td>
                            <td><input disabled id="key" class="form-control"/></td>
                            <td><button type="button" onclick="edit(2)" class="btn btn-info btn-rounded btn-icon"><i class="mdi mdi-border-color"></i></button>
                                <button type="button" class="btn btn-danger btn-rounded btn-icon"><i class="mdi mdi-minus-circle"></i>
                            </button></td>
                          </tr>
                        </tbody>
                      </table>
                      
                    </div>
                  </div><button type="button" class="btn btn-success btn-lg">Atualizar</button>
                  
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <script>
          let st=true;
          let st1=true;
          let st2=true;
            function edit(x){
                let n=document.getElementById('nome');
                let p=document.getElementById('pass');
                let k=document.getElementById('key');
                
                if(!x){
                    if(st){
                        nome.disabled=false;
                        st=false;
                    }else{
                        nome.disabled=true;
                        st=true;
                    }
                }else if(x==1){
                    if(st1){
                        pass.disabled=false;
                        st1=false;
                    }else{
                        pass.disabled=true;
                        st1=true;
                    }
                }if(x==2){
                    if(st2){
                        key.disabled=false;
                        st2=false;
                    }else{
                        key.disabled=true;
                        st2=true;
                    }
                }
            }
          </script>
          <!-- partial:../template/partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../template/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../template/assets/js/off-canvas.js"></script>
    <script src="../template/assets/js/hoverable-collapse.js"></script>
    <script src="../template/assets/js/misc.js"></script>
    <script src="../template/assets/js/settings.js"></script>
    <script src="../template/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>