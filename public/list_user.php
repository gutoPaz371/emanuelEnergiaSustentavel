<?php
  include '../crud/config/main_crud.php';
  session_start();
  if(!isset($_SESSION['id_user_gerente'])){
    header('location:./login/');
  }
  $res=$cn->query("SELECT * FROM franqueado");
  
  $nivel=1;//NIVEL DE USUARIO (SHOW AND HIDDEN LOG)
  
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
    <title>Emanuel | Franqueados</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicons/favicon.ico">
    <link rel="manifest" href="assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="assets/js/config.js"></script>
    <script src="vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="assets/css/user.min.css" rel="stylesheet" id="user-style-default">
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
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl navbar-inverted">
          <script>
            var navbarStyle = localStorage.getItem("navbarStyle");
            if (navbarStyle && navbarStyle !== 'transparent') {
              document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
            }
          </script>
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">

              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Toggle Navigation" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

            </div><a class="navbar-brand" href="index.php">
              <div class="d-flex align-items-center py-3"><img class="me-2" src="assets/img/icons/spot-illustrations/falcon.png" alt="" width="40"><span style="font-size:20px;" class="font-sans-serif">Emanuel</span>
            </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                
                <li class="nav-item">
                  <!-- label-->
                  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">Geral
                    </div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider">
                    </div>
                  </div>
                  <!-- parent pages--><a hidden class="nav-link" href="./list_produtos.php" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><svg class="svg-inline--fa fa-folder-open fa-w-18" aria-hidden="true" focusable="false" data-prefix="far" data-icon="folder-open" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M527.9 224H480v-48c0-26.5-21.5-48-48-48H272l-64-64H48C21.5 64 0 85.5 0 112v288c0 26.5 21.5 48 48 48h400c16.5 0 31.9-8.5 40.7-22.6l79.9-128c20-31.9-3-73.4-40.7-73.4zM48 118c0-3.3 2.7-6 6-6h134.1l64 64H426c3.3 0 6 2.7 6 6v42H152c-16.8 0-32.4 8.8-41.1 23.2L48 351.4zm400 282H72l77.2-128H528z"></path></svg><!-- <span class="far fa-folder-open"></span> Font Awesome fontawesome.com --></span><span class="nav-link-text ps-1">Produtos</span>
                    </div>
                  </a>
                  <!-- parent pages--><a class="nav-link active" href="#" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><svg class="svg-inline--fa fa-users fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></svg><!-- <span class="fas fa-users"></span> Font Awesome fontawesome.com --></span><span class="nav-link-text ps-1">Franqueados</span>
                    </div>
                  </a>
                  <!-- parent pages--><a class="nav-link" href="./list_user_pro.php" role="button" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-icon"><svg hidden class="svg-inline--fa fa-users fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="users" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M96 224c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm448 0c35.3 0 64-28.7 64-64s-28.7-64-64-64-64 28.7-64 64 28.7 64 64 64zm32 32h-64c-17.6 0-33.5 7.1-45.1 18.6 40.3 22.1 68.9 62 75.1 109.4h66c17.7 0 32-14.3 32-32v-32c0-35.3-28.7-64-64-64zm-256 0c61.9 0 112-50.1 112-112S381.9 32 320 32 208 82.1 208 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C179.6 288 128 339.6 128 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zm-223.7-13.4C161.5 263.1 145.6 256 128 256H64c-35.3 0-64 28.7-64 64v32c0 17.7 14.3 32 32 32h65.9c6.3-47.4 34.9-87.3 75.2-109.4z"></path></svg> <span class="far fa-gem"></span> </span><span class="nav-link-text ps-1">Franqueados Pro</span>
                    </div>
                  </a>
                  <!-- parent pages--><a class="nav-link" href="./vendas.php" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><svg class="svg-inline--fa fa-sellcast fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="sellcast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M353.4 32H94.7C42.6 32 0 74.6 0 126.6v258.7C0 437.4 42.6 480 94.7 480h258.7c52.1 0 94.7-42.6 94.7-94.6V126.6c0-52-42.6-94.6-94.7-94.6zm-50 316.4c-27.9 48.2-89.9 64.9-138.2 37.2-22.9 39.8-54.9 8.6-42.3-13.2l15.7-27.2c5.9-10.3 19.2-13.9 29.5-7.9 18.6 10.8-.1-.1 18.5 10.7 27.6 15.9 63.4 6.3 79.4-21.3 15.9-27.6 6.3-63.4-21.3-79.4-17.8-10.2-.6-.4-18.6-10.6-24.6-14.2-3.4-51.9 21.6-37.5 18.6 10.8-.1-.1 18.5 10.7 48.4 28 65.1 90.3 37.2 138.5zm21.8-208.8c-17 29.5-16.3 28.8-19 31.5-6.5 6.5-16.3 8.7-26.5 3.6-18.6-10.8.1.1-18.5-10.7-27.6-15.9-63.4-6.3-79.4 21.3s-6.3 63.4 21.3 79.4c0 0 18.5 10.6 18.6 10.6 24.6 14.2 3.4 51.9-21.6 37.5-18.6-10.8.1.1-18.5-10.7-48.2-27.8-64.9-90.1-37.1-138.4 27.9-48.2 89.9-64.9 138.2-37.2l4.8-8.4c14.3-24.9 52-3.3 37.7 21.5z"></path></svg><!-- <span class="fab fa-sellcast"></span> Font Awesome fontawesome.com --></span><span class="nav-link-text ps-1">Vendas</span>
                    </div>
                  </a>
                  <!-- parent pages--><a class="nav-link " href="./treinamento.php" role="button" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-icon"><svg hidden class="svg-inline--fa fa-sellcast fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="sellcast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M353.4 32H94.7C42.6 32 0 74.6 0 126.6v258.7C0 437.4 42.6 480 94.7 480h258.7c52.1 0 94.7-42.6 94.7-94.6V126.6c0-52-42.6-94.6-94.7-94.6zm-50 316.4c-27.9 48.2-89.9 64.9-138.2 37.2-22.9 39.8-54.9 8.6-42.3-13.2l15.7-27.2c5.9-10.3 19.2-13.9 29.5-7.9 18.6 10.8-.1-.1 18.5 10.7 27.6 15.9 63.4 6.3 79.4-21.3 15.9-27.6 6.3-63.4-21.3-79.4-17.8-10.2-.6-.4-18.6-10.6-24.6-14.2-3.4-51.9 21.6-37.5 18.6 10.8-.1-.1 18.5 10.7 48.4 28 65.1 90.3 37.2 138.5zm21.8-208.8c-17 29.5-16.3 28.8-19 31.5-6.5 6.5-16.3 8.7-26.5 3.6-18.6-10.8.1.1-18.5-10.7-27.6-15.9-63.4-6.3-79.4 21.3s-6.3 63.4 21.3 79.4c0 0 18.5 10.6 18.6 10.6 24.6 14.2 3.4 51.9-21.6 37.5-18.6-10.8.1.1-18.5-10.7-48.2-27.8-64.9-90.1-37.1-138.4 27.9-48.2 89.9-64.9 138.2-37.2l4.8-8.4c14.3-24.9 52-3.3 37.7 21.5z"></path></svg><span class="fas fa-file-video"></span></span><span class="nav-link-text ps-1">Treinamento</span>
                      </div>
                    </a>
                  <!-- parent pages--><a class="nav-link" hidden href="./log.php" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><svg class="svg-inline--fa fa-file-alt fa-w-12" aria-hidden="true" focusable="false" data-prefix="far" data-icon="file-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M288 248v28c0 6.6-5.4 12-12 12H108c-6.6 0-12-5.4-12-12v-28c0-6.6 5.4-12 12-12h168c6.6 0 12 5.4 12 12zm-12 72H108c-6.6 0-12 5.4-12 12v28c0 6.6 5.4 12 12 12h168c6.6 0 12-5.4 12-12v-28c0-6.6-5.4-12-12-12zm108-188.1V464c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V48C0 21.5 21.5 0 48 0h204.1C264.8 0 277 5.1 286 14.1L369.9 98c9 8.9 14.1 21.2 14.1 33.9zm-128-80V128h76.1L256 51.9zM336 464V176H232c-13.3 0-24-10.7-24-24V48H48v416h288z"></path></svg><!-- <span class="far fa-file-alt"></span> Font Awesome fontawesome.com --></span><span class="nav-link-text ps-1">Log</span>
                    </div>
                  </a>
                  <!-- parent pages-->
                  <!-- parent pages-->
                  <!-- parent pages-->
                  
                  <!-- parent pages-->
                  <ul class="nav collapse" id="events">
                    <li class="nav-item"><a class="nav-link" href="app/events/create-an-event.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create an event</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/events/event-detail.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event detail</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/events/event-list.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event list</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  </ul>
                  <!-- parent pages-->
                  <ul class="nav collapse" id="e-commerce">
                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#product" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                      <ul class="nav collapse" id="product">
                        <li class="nav-item"><a class="nav-link" href="app/e-commerce/product/product-list.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product list</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="app/e-commerce/product/product-grid.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product grid</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="app/e-commerce/product/product-details.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product details</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                      </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link dropdown-indicator" href="#orders" data-bs-toggle="collapse" aria-expanded="false" aria-controls="e-commerce">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Orders</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                      <ul class="nav collapse" id="orders">
                        <li class="nav-item"><a class="nav-link" href="app/e-commerce/orders/order-list.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Order list</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="app/e-commerce/orders/order-details.html" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Order details</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                      </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/e-commerce/customers.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Customers</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/e-commerce/customer-details.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Customer details</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/e-commerce/shopping-cart.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Shopping cart</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/e-commerce/checkout.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Checkout</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/e-commerce/billing.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Billing</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/e-commerce/invoice.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Invoice</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  </ul>
                  <!-- parent pages-->
                  <!-- parent pages-->
                  <ul class="nav collapse" id="social">
                    <li class="nav-item"><a class="nav-link" href="app/social/feed.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Feed</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/social/activity-log.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Activity log</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/social/notifications.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Notifications</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/social/followers.html" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Followers</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  </ul>
                </li>
                
                
                
              </ul>
              
            </div>
          </div>
        </nav>
        <div class="content">
        <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand navbar-glass-shadow">

                            <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                            <a class="navbar-brand me-1 me-sm-3" href="../../index.php">
                              <div class="d-flex align-items-center"><img class="me-2" src="../../assets/img/icons/spot-illustrations/falcon.png" alt="" width="40"><span class="font-sans-serif">falcon</span>
                      </div>
                    </a>

                    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
                      
                      
                      
                      
                      <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <div class="avatar avatar-xl">
                            <img class="rounded-circle" src="assets/img/team/configuration.png" alt="">

              </div>
            </a>
            <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                    <div class="bg-white dark__bg-1000 rounded-2 py-2">
                      <a class="dropdown-item" href="./edit_user_gerente.php?pg=list_user.php">Configurações</a>
                      <a class="dropdown-item" href="./sair.php">Sair</a>
                    </div>
                  </div>
          </li>
        </ul>
</nav>
          <!--AVISO ALERT START-->
          <?php 
            if(strlen($_SESSION['err'])>0){
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
          <!--TABLE USER START-->
                    <div id="form1" class="table-responsive scrollbar">
                    <h1 class="display-4 mb-3" style="text-align:center;">FRANQUEADOS</h1>
                        <div class="card-header border-bottom">
                            <div class="row flex-between-end">   
                                <div class="col-auto align-self-center">
                                    <h5 class="mb-0" data-anchor="data-anchor" id="responsive-table">Franqueados<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#responsive-table" style="padding-left: 0.375em;"></a></h5>
                                </div><button onclick="x1(this)" style="width: 10%;" class="btn btn-outline-success me-1 mb-1" type="button">
                            <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>ADD</button>
                            </div>
                        </div>
                        <table class="table table-hover table-striped overflow-hidden">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Numero</th>
                                    <th scope="col">Status</th>
                                    <th class="text-end" scope="col">Vendas</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php while($dado = $res->fetch_array()){ ?>
                              <tr class="align-middle hover-actions-trigger">
                                      <td class="text-nowrap"># <?php echo $dado['id']; ?></td>
                                      <td class="text-nowrap">
                                          <div class="d-flex align-items-center">
                                              <div class="ms-2"><?php echo $dado['nome']; ?></div>
                                          </div>
                                      </td>
                                      <td class="text-nowrap"><?php echo $dado['email']; ?></td>
                                      <td class="text-nowrap"><?php echo $dado['numero']; ?></td>
                                      <td class="w-auto">
                                          <div class="btn-group btn-group hover-actions end-0 me-4">
                                              <a href="./edit_users.php?nome=<?php echo $dado['nome']; ?>&email=<?php echo $dado['email']; ?>&numero=<?php echo $dado['numero']; ?>&st=<?php echo $dado['status']; ?>&id_endereco=<?php echo $dado['id_endereco']; ?>&venda=R$xx,00&pg=list_user.php&id_user=<?php echo $dado['id']; ?>" class="btn btn-light pe-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a>
                                              
                                                <input value="15" name="id_user_franqueado" hidden/>
                                                <button onclick="sendIdDel(<?php echo $dado['id'] ?>)" id="idDelFran" class="btn btn-light ps-2" type="button" data-bs-toggle="modal" data-bs-target="#scrollinglongcontent" data-bs-placement="top" title="Delete"><span class="fas fa-trash-alt"></span></button>
                                                <a href="./docs_franqueado.php" class="btn btn-light pe-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Documentação"><span class="fas fa-file-alt"></span></a>
                                              
                                            </div>
                                            <?php $st_user=$dado['status']; ?>
                                            <div <?php if(!$st_user)echo 'hidden';?>>
                                              <span class="badge badge rounded-pill d-block p-2 badge-soft-success">Ativado<span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span>
                                            </div> 
                                            <div <?php if($st_user)echo 'hidden';?>>
                                              <span class="badge badge rounded-pill d-block p-2 badge-soft-secondary">Desativado<span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>
                                            </div>
                                            
                                      </td>
                                      <td class="text-end">R$99,00</td>
                      
                              </tr>
                            <?php } ?>

                            </tbody>
                        </table>
                    </div>
                 
          <!--TABLE USER END-->
          <!--MODAL START-->
          <div class="modal fade" id="scrollinglongcontent" data-keyboard="false" tabindex="-1" aria-labelledby="scrollinglongcontentLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="scrollinglongcontentLabel">DELETAR FRANQUEADO?</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
               <form action="../crud/users/del_user_franqueado.php" method="POST">
                <div class="modal-footer">
                  <a class="btn btn-falcon-success me-1 mb-1" type="" data-bs-dismiss="modal">Não</a>
                  <button id="modelDel" name="idDel" value="" class="btn btn-danger me-1 mb-1" type="submit ">Sim</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!--MODAL END-->

          <script>
            function sendIdDel(id){
              let model=document.getElementById('modelDel');
              model.value=id;
              //console.log(btDel.value);
              console.log(id);

            }
          </script>

         <div id="form2" hidden>
         <div class="col-lg-12 mb-3">
                  <div class="card h-100">
                    <div class="card-header">
                      <h5 class="mb-0">Cadastrar Franqueado</h5>
                    </div>
                    <div class="card-body bg-light pb-0">
                      <div class="collapse show" id="experience-form">
                        <form class="row" action="../crud/users/add_user_franqueado.php" method="POST">
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="company">Tipo de conta*</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input name="tipo_franqueado" class="form-check-input" id="inlineRadio1" type="radio" name="inlineRadioOptions" value="0" />
                            <label class="form-check-label" for="inlineRadio1">Normal </label>
                            <input  name="tipo_franqueado" class="form-check-input" id="inlineRadio2" type="radio" name="inlineRadioOptions" value="1" />
                            <label class="form-check-label" for="inlineRadio2">Pro</label>
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="company">Nome*</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input name="nome" required class="form-control form-control-sm" id="company" type="text">
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="position">Email*</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input name="email" required class="form-control form-control-sm" id="position" type="text">
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="city">Numero* </label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input name="telefone" required class="form-control form-control-sm" id="city" type="text">
                          </div>
                          <div class="col-3 mb-7 text-lg-end">
                            <label class="form-label" for="city">Senha*</label>
                          </div>
                          <div class="col-9 col-sm-3 mb-3">
                            <input name="pass1" required id="pass1" onkeyup="verific_pass(this)" class="form-control form-control-sm" type="password">
                            <br><span id="aviso_01" style="font-size:15px;" hidden></span>
                          </div>
                          <div class="col-9 col-sm-3 mb-3">
                            <input name="pass2" id="pass2" onkeyup="verific_pass(this)" class="form-control form-control-sm" type="password">
                            <br><span id="aviso_02" style="font-size:15px;"></span>
                          </div>
                          <div class="card-header">
                            <h5 class="mb-0" style="text-align:center;">Endereço</h5>
                          </div>

                          <br><div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="company">Estado</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input name="estado" class="form-control form-control-sm" id="company" type="text">
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="position">Cidade</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input name="cidade" class="form-control form-control-sm" id="position" type="text">
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="city">Bairro</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input name="bairro" class="form-control form-control-sm" id="city" type="text">
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="city">Rua</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input name="rua" class="form-control form-control-sm" id="city" type="text">
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="city">Numero</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input name="numero" class="form-control form-control-sm" id="city" type="text">
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="city">Cep</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <input name="cep" class="form-control form-control-sm" id="city" type="text">
                          </div>
                          <div class="col-3 mb-3 text-lg-end">
                            <label class="form-label" for="city">Complemento</label>
                          </div>
                          <div class="col-9 col-sm-7 mb-3">
                            <textarea name="complemento" class="form-control form-control-sm" id="city" type="text"></textarea>
                          </div>                           
                          <div class="col-9 col-sm-7 offset-3">
                            <button id="bt_save" class="btn btn-success" type="submit" disabled>Save</button>
                            <button onclick="x2(this)" class="btn btn-danger" type="button">Cancelar</button>
                          </div>
                        </form>
                        <div class="border-dashed-bottom my-4"></div>
                      </div>
                    </div>
                  </div>
                </div>
         </div>
         <script>
            let f1=document.getElementById('form1');
            let f2=document.getElementById('form2');
            function x1(){
              f1.hidden=true;
              f2.hidden=false;
            }
            function x2(){
              f1.hidden=false;
              f2.hidden=true;
            }
            function verific_pass(){
              let av1=document.getElementById('aviso_01');
              let av2=document.getElementById('aviso_02');
              let ps1=document.getElementById('pass1');
              let ps2=document.getElementById('pass2');
              let bt=document.getElementById('bt_save');
              if(ps1.value.length<=4){
                av1.innerHTML='Seja maior que 4 digitos.';
                av1.style.color='red';
                av1.hidden=false;
                bt.disabled=true;
              }else{
                av1.hidden=true;
                bt.disabled=false;
              }if(ps1.value!=ps2.value){
                av2.innerHTML='Senhas não coicidem.';
                av2.style.color='red';
                bt.disabled=true;
              }else{
                bt.disabled=false;
                av2.hidden=true;
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
                  <hr class="bg-300" />
                  <div class="divider-content-center">or register with</div>
                </div>
                <div class="row g-2 mt-2">
                  <div class="col-sm-6"><a class="btn btn-outline-google-plus btn-sm d-block w-100" href="#"><span class="fab fa-google-plus-g me-2" data-fa-transform="grow-8"></span> google</a></div>
                  <div class="col-sm-6"><a class="btn btn-outline-facebook btn-sm d-block w-100" href="#"><span class="fab fa-facebook-square me-2" data-fa-transform="grow-8"></span> facebook</a></div>
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
    <script src="vendors/popper/popper.min.js"></script>
    <script src="vendors/bootstrap/bootstrap.min.js"></script>
    <script src="vendors/anchorjs/anchor.min.js"></script>
    <script src="vendors/is/is.min.js"></script>
    <script src="vendors/echarts/echarts.min.js"></script>
    <script src="vendors/fontawesome/all.min.js"></script>
    <script src="vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="vendors/list.js/list.min.js"></script>
    <script src="assets/js/theme.js"></script>

  </body>

</html>