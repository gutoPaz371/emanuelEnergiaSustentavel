<?php
  include '../crud/config/conexao.php';
  session_start();
  if(!isset($_SESSION['id_user_gerente'])){
    header('location:./login/');
  }
  $nivel=1;//NIVEL DE USUARIO (SHOW AND HIDDEN LOG)

  $res=$cn->query("SELECT * FROM produto");
  $count=mysqli_fetch_assoc($cn->query("SELECT count(*) as count from produto"));
  $count=$count['count'];
  $vendaCount=mysqli_fetch_assoc($cn->query("SELECT count(*) as countVendas from vendas"));
  $vendaCount=$vendaCount['countVendas'];

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
    <title>Emanuel | Estoque</title>


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
                  <!-- parent pages--><a class="nav-link active" href="#" role="button" data-bs-toggle="" aria-expanded="false">
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
                  <!-- parent pages--><a class="nav-link " href="./treinamento.php" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><svg hidden class="svg-inline--fa fa-sellcast fa-w-14" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="sellcast" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M353.4 32H94.7C42.6 32 0 74.6 0 126.6v258.7C0 437.4 42.6 480 94.7 480h258.7c52.1 0 94.7-42.6 94.7-94.6V126.6c0-52-42.6-94.6-94.7-94.6zm-50 316.4c-27.9 48.2-89.9 64.9-138.2 37.2-22.9 39.8-54.9 8.6-42.3-13.2l15.7-27.2c5.9-10.3 19.2-13.9 29.5-7.9 18.6 10.8-.1-.1 18.5 10.7 27.6 15.9 63.4 6.3 79.4-21.3 15.9-27.6 6.3-63.4-21.3-79.4-17.8-10.2-.6-.4-18.6-10.6-24.6-14.2-3.4-51.9 21.6-37.5 18.6 10.8-.1-.1 18.5 10.7 48.4 28 65.1 90.3 37.2 138.5zm21.8-208.8c-17 29.5-16.3 28.8-19 31.5-6.5 6.5-16.3 8.7-26.5 3.6-18.6-10.8.1.1-18.5-10.7-27.6-15.9-63.4-6.3-79.4 21.3s-6.3 63.4 21.3 79.4c0 0 18.5 10.6 18.6 10.6 24.6 14.2 3.4 51.9-21.6 37.5-18.6-10.8.1.1-18.5-10.7-48.2-27.8-64.9-90.1-37.1-138.4 27.9-48.2 89.9-64.9 138.2-37.2l4.8-8.4c14.3-24.9 52-3.3 37.7 21.5z"></path></svg><span class="fas fa-file-video"></span></span><span class="nav-link-text ps-1">Treinamento</span>
                      </div>
                    </a>
                  <!-- parent pages--><a class="nav-link" href="./log.php" role="button" data-bs-toggle="" aria-expanded="false">
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
        <div class="content"><nav class="navbar navbar-light navbar-glass navbar-top navbar-expand navbar-glass-shadow">

<button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
<a class="navbar-brand me-1 me-sm-3" href="../../index.php">
  <div class="d-flex align-items-center"><img class="me-2" src="../../assets/img/icons/spot-illustrations/falcon.png" alt="" width="40"><span class="font-sans-serif">falcon</span>
  </div>
</a>

<ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
  <li class="nav-item">
    <div class="theme-control-toggle fa-icon-wait px-2">
      <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" checked="true">
      <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="" data-bs-original-title="Switch to dark theme" aria-label="Switch to dark theme"><svg class="svg-inline--fa fa-moon fa-w-16 fs-0" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="moon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z"></path></svg><!-- <span class="fas fa-moon fs-0"></span> Font Awesome fontawesome.com --></label>
    </div>
  </li>
  
  
  
  <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div class="avatar avatar-xl">
        <img class="rounded-circle" src="assets/img/team/configuration.png" alt="">

      </div>
    </a>
    <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
            <div class="bg-white dark__bg-1000 rounded-2 py-2">
              <a class="dropdown-item" href="./edit_user_gerente.php?pg=list_produtos.php">Configurações</a>
              <a class="dropdown-item" href="./sair.php">Sair</a>
            </div>
          </div>
  </li>
</ul>
</nav>
          <div class="row g-3 mb-3">
            <div class="col-md-6 col-xxl-3">
              <div class="card h-md-100 ecommerce-card-min-width">
                <div class="card-header pb-0">
                  <h6 class="mb-0 mt-2 d-flex align-items-center">Produtos Cadastrados<span class="ms-1 text-400" data-bs-toggle="tooltip" data-bs-placement="top" title="Quantidade de produtos cadastrado no estoque."><span class="far fa-question-circle" data-fa-transform="shrink-1"></span></span></h6>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                  <div class="row">
                    <div class="col">
                      <p class="font-sans-serif lh-1 mb-1 fs-4"><?php echo $count; ?></p>
                    </div>
                    <div class="col-auto ps-0">
                      <div class="echart-bar-weekly-sales h-100"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-xxl-3">
              <div class="card h-md-100">
                <div class="card-header pb-0">
                  <h6 class="mb-0 mt-2">Total Vendidos</h6>
                </div>
                <div class="card-body d-flex flex-column justify-content-end">
                  <div class="row justify-content-between">
                    <div class="col-auto align-self-end">
                      <div class="fs-4 fw-normal font-sans-serif text-700 lh-1 mb-1"><?php echo $vendaCount ?></div><span class="badge rounded-pill fs--2 bg-200 text-primary"></span>
                    </div>
                    <div class="col-auto ps-0 mt-n4">
                        <div class="echart-default-total-order" data-echarts='{"tooltip":{"trigger":"axis","formatter":"{b0} : {c0}"},"xAxis":{"data":["Week 4","Week 5","Week 6","Week 7"]},"series":[{"type":"line","data":[20,40,100,120],"smooth":true,"lineStyle":{"width":3}}],"grid":{"bottom":"2%","top":"2%","right":"10px","left":"10px"}}' data-echart-responsive="true"></div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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

          <!--TABLE START-->
           
        <div id="form1" hidden>
          <h1 class="display-4 mb-3" style="text-align:center;">ESTOQUE</h1><br>
          <a style="width: 10%;" class="btn btn-outline-success me-1 mb-1" onclick="x1(this)" >
            <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>ADD</a><br><br>
            <div id="tableExample3" data-list='{"valueNames":["id","nome","valor","potencia","status","acao"],"filter":true}'>
                <div class="table-responsive scrollbar">
                <table class="table table-sm table-striped fs--1 mb-0 overflow-hidden">
                    <thead class="bg-200 text-900">
                    <tr>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="id">ID</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="nome">NOME</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="valor">VALOR</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="potencia">POTENCIA</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="status">STATUS</th>
                        <th class="sort pe-1 align-middle white-space-nowrap" data-sort="acao">AÇÃO</th>
                        
                    </tr>
                    </thead>
                    <tbody class="list" id="table-purchase-body">
                    <?php while($dado = $res->fetch_array()){ ?>
                      <tr class="btn-reveal-trigger">
                          <th >#<?php echo $dado['id']; ?></th>
                          <td class="align-middle text-nowrap">
                              <div class="d-flex align-items-center">
                                  <div class="avatar avatar-2xl">
                                      <img type="button" data-bs-toggle="modal" data-bs-target="#scrollinglongcontent" class="rounded-soft" src="assets/img/sistemas/1.jpeg" alt="">
                                      <div class="modal fade" id="scrollinglongcontent" data-keyboard="false" tabindex="-1" aria-labelledby="scrollinglongcontentLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="scrollinglongcontentLabel">Imagem</h5>
                                                      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body modal-dialog modal-dialog-scrollable mt-0">
                                                      <img class="rounded-soft" src="assets/img/sistemas/1.jpeg" alt="">
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Fechar</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>  
                                  </div>
                              <div class="ms-2"><h6><?php echo $dado['nome']; ?></h6></div>
                              </div>
                          </td>
                          <td><h5 class="mb-3"><?php echo $dado['valor']; ?></h5></td>
                          <td><?php echo $dado['potencia']; ?></td>
                          <td class=""> 
                              <?php $st_produto=$dado['status'];?>
                              <span <?php if(!$st_produto)echo 'hidden'; ?> class="badge badge rounded-pill badge-soft-success">Ativo<svg class="svg-inline--fa fa-check fa-w-16 ms-1" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;"><g transform="translate(256 256)"><g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)"><path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com --></span>
                            
                            <div>
                              <span <?php if($st_produto)echo 'hidden'; ?> class="badge badge rounded-pill badge-soft-warning">Desativado<svg class="svg-inline--fa fa-stream fa-w-16 ms-1" data-fa-transform="shrink-2" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="stream" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="" style="transform-origin: 0.5em 0.5em;"><g transform="translate(256 256)"><g transform="translate(0, 0)  scale(0.875, 0.875)  rotate(0 0 0)"><path fill="currentColor" d="M16 128h416c8.84 0 16-7.16 16-16V48c0-8.84-7.16-16-16-16H16C7.16 32 0 39.16 0 48v64c0 8.84 7.16 16 16 16zm480 80H80c-8.84 0-16 7.16-16 16v64c0 8.84 7.16 16 16 16h416c8.84 0 16-7.16 16-16v-64c0-8.84-7.16-16-16-16zm-64 176H16c-8.84 0-16 7.16-16 16v64c0 8.84 7.16 16 16 16h416c8.84 0 16-7.16 16-16v-64c0-8.84-7.16-16-16-16z" transform="translate(-256 -256)"></path></g></g></svg><!-- <span class="ms-1 fas fa-stream" data-fa-transform="shrink-2"></span> Font Awesome fontawesome.com --></span>
                            
                            <th>
                              <a href="./edit_produtos.php?id=<?php echo $dado['id']; ?>&status=<?php echo $dado['status']; ?>&nome=<?php echo $dado['nome']; ?>&valor=<?php echo $dado['valor']; ?>&potencia=<?php echo $dado['potencia']; ?>&descricao=<?php echo $dado['descricao']; ?>&img=assets/img/sistemas/1.jpeg" class="btn btn-falcon-warning me-1 mb-1" type="button"><i class="fas fa-edit"></i>
                              </a>
                              
                                <a class="btn btn-falcon-danger me-1 mb-1" type="button" data-bs-toggle="modal" data-bs-target="#error-modal"><i class="far fa-trash-alt"></i>
                                </a>
                                
                                <!--MODAL DEL START-->
                                <div class="modal fade" id="error-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                  <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px">
                                    <div class="modal-content position-relative">
                                      <div class="position-absolute top-0 end-0 mt-2 me-2 z-index-1">
                                        <button class="btn-close btn btn-sm btn-circle d-flex flex-center transition-base" data-bs-dismiss="modal" aria-label="Close"></button>
                                      </div>
                                      <div class="modal-body p-0">
                                        <div class="rounded-top-lg py-3 ps-4 pe-6 bg-light">
                                          <h4 class="mb-1" id="modalExampleDemoLabel">DELETAR PRODUTO ?</h4>
                                        </div>
                                        <div class="p-4 pb-0">
                                          <form action="../crud/estoque/del_produto.php" method="post">
                                              </div>
                                            </div>
                                            <div class="modal-footer">
                                              <a class="btn btn-falcon-success me-1 mb-1" type="button" data-bs-dismiss="modal">Cancelar</a>
                                              <button value="<?php echo $dado['id']; ?>" name="IdDelProduto" class="btn btn-falcon-warning me-1 mb-1" type="submit">Deletar</button>
                                            </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                              
                                        <!--MODAL DEL END-->
                                  </th>
                          
                          
                          
                      </tr>
                    <?php } ?>
                    
                    </tbody>
                </table>
                </div>
            </div>
            <!--TABLE END-->
        </div>

        
        
          <!--TABLE ADD START-->
          <form id="form2" action="../crud/estoque/add_produto.php" method="post" hidden>
            <h1 class="display-4 mb-3" style="text-align:center;">CADASTRAR PRODUTO</h1>
            <div class="card mb-3">
                <div class="card-header">
                  <div class="row flex-between-end">
                    <div class="col-auto align-self-center">
                      <h5 class="mb-0" data-anchor="data-anchor" id="sizing">Cadastrar Produtos<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#sizing" style="padding-left: 0.375em;"></a></h5>
                    </div>
                  </div><br>
                    <div class="form-check form-switch">
                        <input name="ativar_produto" class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" checked="" />
                        <label class="form-check-label" for="flexSwitchCheckChecked">Ativar Produto?</label>
                    </div>
                </div>
                <div class="card-body bg-light" >
                  <div class="tab-content">
                    <div style="width: auto" class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-854ceb64-e84d-40c6-8a9d-c4a09b6af124" id="dom-854ceb64-e84d-40c6-8a9d-c4a09b6af124">
                        <div class="input-group input-group-sm mb-3 col-lg-6"><span class="input-group-text" id="inputGroup-sizing-sm">Nome</span>
                          <input name="nome" class="form-control" type="text" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    <div style="width: auto" class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-854ceb64-e84d-40c6-8a9d-c4a09b6af124" id="dom-854ceb64-e84d-40c6-8a9d-c4a09b6af124">
                      <div class="input-group input-group-sm mb-3"><span class="input-group-text" id="inputGroup-sizing-sm">Potencia</span>
                        <input name="potencia" style="float: right;" class="form-control" type="text" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                      </div>
                    </div>
                    <div style="width: auto" class="tab-pane preview-tab-pane active" role="tabpanel" aria-labelledby="tab-dom-854ceb64-e84d-40c6-8a9d-c4a09b6af124" id="dom-854ceb64-e84d-40c6-8a9d-c4a09b6af124">
                        <div class="input-group input-group-sm mb-3"><span class="input-group-text" id="inputGroup-sizing-sm">Valor</span>
                          <input name="valor" class="form-control" type="text" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" value="R$">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="exampleFormControlTextarea1">Descrição</label>
                        <textarea name="descricao" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="customFile">Imagem</label>
                      <input name="img" accept="image/*" id="img-input" class="form-control" id="customFile" type="file" />
                      <img id="preview" class="rounded-1 float-start w-25 mt-3" src="" alt=""/>
                    </div>
                </div>
              </div>
              <a class="btn btn-outline-danger me-1 mb-1" type="button" onclick="x2(this)">Cancelar</a>
              <button class="btn btn-outline-success me-1 mb-1" type="submit">Cadastrar</button>
            
          </form>
          <!--TABLE ADD END-->
            <script>
                document.getElementById('form1').hidden=false;
                //document.getElementById('form2').hidden=false;
                function x1(){
                    document.getElementById('form1').hidden=true;
                    document.getElementById('form2').hidden=false;
                }
                function x2(){
                    document.getElementById('form1').hidden=false;
                    document.getElementById('form2').hidden=true;
                }
                function readImage() {
                  if (this.files && this.files[0]) {
                    var file = new FileReader();
                    file.onload = function(e) {
                      document.getElementById("preview").src = e.target.result;
                    };       
                    file.readAsDataURL(this.files[0]);
                  }
                }
                document.getElementById("img-input").addEventListener("change", readImage, false);
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
                <form>
                  <div class="mb-3">
                    <label class="form-label" for="modal-auth-name">Name</label>
                    <input class="form-control" type="text" autocomplete="on" id="modal-auth-name" />
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="modal-auth-email">Email address</label>
                    <input class="form-control" type="email" autocomplete="on" id="modal-auth-email" />
                  </div>
                  <div class="row gx-2">
                    <div class="mb-3 col-sm-6">
                      <label class="form-label" for="modal-auth-password">Password</label>
                      <input class="form-control" type="password" autocomplete="on" id="modal-auth-password" />
                    </div>
                    <div class="mb-3 col-sm-6">
                      <label class="form-label" for="modal-auth-confirm-password">Confirm Password</label>
                      <input class="form-control" type="password" autocomplete="on" id="modal-auth-confirm-password" />
                    </div>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="modal-auth-register-checkbox" />
                    <label class="form-label" for="modal-auth-register-checkbox">I accept the <a href="#!">terms </a>and <a href="#!">privacy policy</a></label>
                  </div>
                  <div class="mb-3">
                    <button class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit">Register</button>
                  </div>
                </form>
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