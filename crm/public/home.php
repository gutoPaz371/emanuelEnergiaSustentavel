<?php
    include '../../crud/config/conexao.php';
    session_start();
    $res=$cn->query("SELECT * FROM gestor");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ADM</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../template/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../template/assets/vendors/css/vendor.bundle.base.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End Plugin css for this page -->
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
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="../template/index.html"><img src="../template/assets/images/logo.svg" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="../template/index.html"><img src="../template/assets/images/logo-mini.svg" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
                <div class="count-indicator">
                  <img class="img-xs rounded-circle " src="../template/assets/images/faces/face15.jpg" alt="">
                  <span class="count bg-success"></span>
                </div>
                <div class="profile-name">
                  <h5 class="mb-0 font-weight-normal">Henry Klein</h5>
                  <span>Gold Member</span>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-primary"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Account settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-onepassword  text-info"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-calendar-today text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject ellipsis mb-1 text-small">To-do list</p>
                  </div>
                </a>
              </div>
            </div>
          </li>
          <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
          </li>
          <li class="nav-item menu-items active">
            <a class="nav-link" href="#">
              <span class="menu-icon">
                <i class="mdi mdi-account-multiple"></i>
              </span>
              <span class="menu-title">Gestores</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-icon">
                <i class="mdi mdi-laptop"></i>
              </span>
              <span class="menu-title">Basic UI Elements</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../template/pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="../template/pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="../template/pages/ui-features/typography.html">Typography</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pages/forms/basic_elements.html">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Form Elements</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pages/tables/basic-table.html">
              <span class="menu-icon">
                <i class="mdi mdi-table-large"></i>
              </span>
              <span class="menu-title">Tables</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pages/charts/chartjs.html">
              <span class="menu-icon">
                <i class="mdi mdi-chart-bar"></i>
              </span>
              <span class="menu-title">Charts</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="../template/pages/icons/mdi.html">
              <span class="menu-icon">
                <i class="mdi mdi-contacts"></i>
              </span>
              <span class="menu-title">Icons</span>
            </a>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
              <span class="menu-icon">
                <i class="mdi mdi-security"></i>
              </span>
              <span class="menu-title">User Pages</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="../template/pages/samples/blank-page.html"> Blank Page </a></li>
                <li class="nav-item"> <a class="nav-link" href="../template/pages/samples/error-404.html"> 404 </a></li>
                <li class="nav-item"> <a class="nav-link" href="../template/pages/samples/error-500.html"> 500 </a></li>
                <li class="nav-item"> <a class="nav-link" href="../template/pages/samples/login.html"> Login </a></li>
                <li class="nav-item"> <a class="nav-link" href="../template/pages/samples/register.html"> Register </a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item menu-items">
            <a class="nav-link" href="http://www.bootstrapdash.com/demo/corona-free/jquery/documentation/documentation.html">
              <span class="menu-icon">
                <i class="mdi mdi-file-document-box"></i>
              </span>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
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
        
        <script>
            
        </script>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
          <div id="alertDiv" class="alert" role="alert">
            <?php //var_dump($_SESSION); ?>
            
          </div>

            <div class="col-md-6 grid-margin stretch-card" id="avDel" hidden>
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Deletar gerente?</h4>
                        <div class="template-demo">
                            <form action="../crud/gestor/del_gerente.php" method="POST">
                                <input name="idUser" value="" id="sendId" hidden/>
                                <button type="submit" class="btn btn-danger btn-fw">Sim.</button>
                                <a onclick="delUser(-1)" class="btn btn-success btn-fw">Não.</a>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>

          <div class="col-lg-12 grid-margin stretch-card" id="form0" >
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Gestor</h4><a onclick="changForm(true)" type="button" class="btn btn-success btn-fw"><i class="mdi mdi-account-plus"></i></a><br>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th> # </th>
                            <th> NOME </th>
                            <th> EMAIL </th>
                            <th> AÇÃO </th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php while ($dado=$res->fetch_array()){ ?>
                          <tr>
                            <td> <?php echo $dado['id']; ?> </td>
                            <td> <?php echo $dado['nome']; ?> </td>
                            <td> <?php echo $dado['email']; ?> </td>
                            <td style="text-align:right ;"> 
                                <div class="dropdown">
                                    <button type="button" class="btn btn-dark dropdown-toggle" id="dropdownMenuIconButton7" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="mdi mdi-format-align-center"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuIconButton7">
                                        <a class="dropdown-item" href="./processos/gerente/login.php?id=<?php echo $dado['id']; ?>">Logar</a>
                                        <a class="dropdown-item" href="#">Editar</a>
                                        <a class="dropdown-item" href="#" onclick="delUser(<?php echo $dado['id']; ?>)">Deletar</a>
                                    </div>
                                </div>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-6 grid-margin stretch-card" id="form1" hidden>
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Cadastrar novo Gerente</h4><br>
                    <form class="forms-sample" action="../crud/gestor/add_gestor.php" method="POST">
                      <div class="form-group row">
                        <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Nome</label>
                        <div class="col-sm-9">
                          <input name="nome" type="text" class="form-control" id="exampleInputUsername2" placeholder="Username">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                          <input type="email" class="form-control" id="exampleInputEmail2" placeholder="Email">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                        <select name="status" class="form-control" id="exampleFormControlSelect2">
                        <option value="true">Ativado</option>
                        <option value="false">Desativado</option>
                      </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Senha</label>
                        <div class="col-sm-9">
                          <input onkeyup="veriPass(this)" type="password" class="form-control" id="pass0" name="pass" placeholder="Password">
                          <br>
                          <label id="av0" style="color:red;" hidden>Senha curta!!!</label>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Confirmar Senha</label>
                        <div class="col-sm-9">
                          <input onkeyup="veriPass(this)" type="password" class="form-control" id="pass1" placeholder="Password">
                          <br>
                          <label id="av1" style="color:red;" hidden>Não coicidem!!!</label>
                        </div>
                      </div>
                      <button id="btSV" type="submit" class="btn btn-primary mr-2" disabled>Salvar</button>
                      <a onclick="changForm(false)" class="btn btn-dark">Cancelar</a>
                    </form>
                  </div>
                </div>
              </div>
          </div>
          <script>
            function delUser(id){
                let sendId=document.getElementById('sendId');
                let avDel=document.getElementById('avDel');
                if(id==-1){
                    avDel.hidden=true;
                }else{
                    avDel.hidden=false;
                    sendId.value=id;
                }
                console.log(id);
            }
            function changForm(x){
                let f0=document.getElementById('form0');
                let f1=document.getElementById('form1');
                if(x){
                    f0.hidden=true;
                    f1.hidden=false;
                }else{
                    f0.hidden=false;
                    f1.hidden=true;
                }
            }
            function veriPass(){
                let pass0=document.getElementById('pass0');
                let av0=document.getElementById('av0');
                let pass1=document.getElementById('pass1');
                let av1=document.getElementById('av1');
                let bt=document.getElementById('btSV');
                if(pass0.value.length>=4){
                    av0.hidden=true;
                    if(pass0.value==pass1.value){
                        av1.hidden=true;
                        bt.disabled=false;
                    }else{
                        bt.disabled=true;
                        av1.hidden=false;
                    } 
                }else{
                    av0.hidden=false;
                    bt.disabled=true;
                }
                
                //console.log('ok'); 
                
            }
            <?php
              if(isset($_SESSION['err'])){
                  $cor=$_SESSION['err']['cor'];
                  $txt=$_SESSION['err']['txt'];
                  $st=$_SESSION['err']['st'];
              }else{
                $cor='';
                $txt='';
                $st=false;
              }
            ?>
            let cor='<?php echo $cor; ?>';
            let txt='<?php echo $txt; ?>';
            let st='<?php echo $st; ?>';
            let av=document.getElementById('alertDiv');
            function aviso(cor,txt){
                av.hidden=false;
                <?php $_SESSION['err']['st']=false; ?>
                console.log('-----------------')
                if(cor==0){
                  av.classList.add('alert-success');
                  av.innerHTML=txt;
                }else if(cor==1){
                  av.classList.add('alert-danger');
                  av.innerHTML=txt;
                }else if(cor=2){
                  av.classList.add('alert-dark');
                  av.innerHTML=txt;
                }
            }
            if(st){
              aviso(cor,txt);
            }else{
              av.hidden=true;
            }
          </script>
          <!-- content-wrapper ends -->
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->
  </body>
</html>