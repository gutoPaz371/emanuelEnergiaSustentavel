<?php
  include '../crud/config/main_consultas.php';
  $nivel=1;//NIVEL DE USUARIO (SHOW AND HIDDEN LOG)
  session_start();
  if(!isset($_SESSION['id_user_gerente'])){
    header('location:./login/');
  }
  #var_dump($_SESSION);
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
    <title>Emanuel | CRM</title>


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
  <div class="container-fluid" data-layout="container">
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
              <!-- parent pages--><a class="nav-link" href="./list_user.php" role="button" data-bs-toggle="" aria-expanded="false">
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
              <!-- parent pages--><a class="nav-link" href="./treinamento.php" role="button" data-bs-toggle="" aria-expanded="false">
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
      <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

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
              <a class="dropdown-item" href="./edit_user_gerente.php?pg=index.php">Configurações</a>
              <a class="dropdown-item" href="./sair.php">Sair</a>
            </div>
          </div>
          </li>
        </ul>
      </nav><h1 class="display-4 mb-3" style="text-align:center;">CRM</h1>
      <div class="row g-3 mb-3">
        <div class="col-sm-6 col-md-4">
          <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
          </div>
            <!--/.bg-holder-->

          <div class="card-body position-relative">
              <h6>Franqueados</h6>
              <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif"><?php echo contF(); ?></div>
            </div>
          </div>
          
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
          </div>
            <!--/.bg-holder-->

          <div class="card-body position-relative">
              <h6>Produtos Cadastrados</h6>
              <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif"><?php echo contP(); ?></div>
            </div>
          </div>
          
        </div>
        
      <div class="col-sm-6 col-md-4">
          <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
          </div>
            <!--/.bg-holder-->

          <div class="card-body position-relative" hidden>
              <h6>Valor das Inscrições</h6>
              <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info">R$190.000,00</div>
            </div>
          </div>
          
        </div></div>
      
      
      
      
        
      <div class="row g-3 mb-3">
        <div class="col-sm-6 col-md-4">
          <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
          </div>
          
            <!--/.bg-holder-->

          <div class="card-body position-relative">
              <h6>Franqueados Ativos</h6>
              <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"><?php echo contFA(); ?></div>
            </div>
          </div>
          
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
          </div>
            <!--/.bg-holder-->

          <div class="card-body position-relative" hidden>
              <h6>Produtos Vendidos</h6>
              <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info">350</div>
            </div>
          </div>
          
        </div>
        
      <div class="col-sm-6 col-md-4">
          <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
          </div>
            <!--/.bg-holder-->

          <div class="card-body position-relative" hidden>
              <h6>Valor das Vendas</h6>
              <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info">R$958.415,68</div>
            </div>
          </div>
          
        </div></div><div class="row g-3 mb-3">
        <div class="col-sm-6 col-md-4">
          <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
          </div>
            <!--/.bg-holder-->

          <div class="card-body position-relative">
              <h6>Franqueados Desativados</h6>
              <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"><?php echo contFD(); ?></div>
            </div>
          </div>
          
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
          </div>
            <!--/.bg-holder-->

          <div class="card-body position-relative">
              <h6>Produtos Ativado</h6>
              <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-info"><?php echo contPA(); ?></div>
            </div>
          </div>
          
        </div>
        
      <div class="col-sm-6 col-md-4">
          <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
          </div>
            <!--/.bg-holder-->
          
        </div></div>
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
        <div class="row g-3 mb-3">
        <div class="col-sm-6 col-md-4">
          <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
          </div>
            <!--/.bg-holder-->

          <div class="card-body position-relative" hidden>
              <h6></h6>
              <div></div>
            </div>
          </div>
          
        </div>
        <div class="col-sm-6 col-md-4">
          <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
          </div>
            <!--/.bg-holder-->

          <div class="card-body position-relative">
              <h6>Produtos Desativado</h6>
              <div class="display-4 fs-4 mb-2 fw-normal font-sans-serif text-warning"><?php echo contPD(); ?></div>
            </div>
          </div>
          
        </div>
        
        <div class="col-sm-6 col-md-4">
          <div class="card overflow-hidden" style="min-width: 12rem">
            <div class="bg-holder bg-card" style="background-image:url(assets/img/icons/spot-illustrations/corner-1.png);">
          </div>
            <!--/.bg-holder-->
          
        </div></div>
    </div><div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
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
</div></main>
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