<?php
  include '../../crud/config/conexao.php';
  session_start();
  if(!isset($_SESSION['id_user_franqueado'])){
    header('location: ../../');
  }
  $res=$cn->query("SELECT * FROM cliente");
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
    <title>Emanuel | Leads</title>


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
        <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
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
              <div class="d-flex align-items-center py-3"><img class="me-2" src="../assets/img/icons/spot-illustrations/falcon.png" alt="" width="40"><span style="font-size:20px;" class="font-sans-serif">Emanuel</span>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content scrollbar">
              <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                
                <li class="nav-item">
                  <!-- label-->
                  <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                    <div class="col-auto navbar-vertical-label">App
                    </div>
                    <div class="col ps-0">
                      <hr class="mb-0 navbar-vertical-divider">
                    </div>
                  </div>
                  <!-- parent pages--><a class="nav-link" hidden href="loja.php" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><svg hidden="" class="svg-inline--fa fa-calendar-alt fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="calendar-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M0 464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V192H0v272zm320-196c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM192 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12h-40c-6.6 0-12-5.4-12-12v-40zM64 268c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zm0 128c0-6.6 5.4-12 12-12h40c6.6 0 12 5.4 12 12v40c0 6.6-5.4 12-12 12H76c-6.6 0-12-5.4-12-12v-40zM400 64h-48V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H160V16c0-8.8-7.2-16-16-16h-32c-8.8 0-16 7.2-16 16v48H48C21.5 64 0 85.5 0 112v48h448v-48c0-26.5-21.5-48-48-48z"></path></svg> <svg class="svg-inline--fa fa-shopping-bag fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="shopping-bag" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M352 160v-32C352 57.42 294.579 0 224 0 153.42 0 96 57.42 96 128v32H0v272c0 44.183 35.817 80 80 80h288c44.183 0 80-35.817 80-80V160h-96zm-192-32c0-35.29 28.71-64 64-64s64 28.71 64 64v32H160v-32zm160 120c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zm-192 0c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24z"></path></svg><!-- <span class="fas fa-shopping-bag"></span> Font Awesome fontawesome.com --></span><span class="nav-link-text ps-1">Loja</span>
                    </div>
                  </a>
                  <!-- parent pages--><a class="nav-link" href="./vendas_franqueados.php" role="button" data-bs-toggle="" aria-expanded="false">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><svg class="svg-inline--fa fa-comments fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comments" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg="" hidden=""><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"></path></svg><svg class="svg-inline--fa fa-money-bill-alt fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="money-bill-alt" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M352 288h-16v-88c0-4.42-3.58-8-8-8h-13.58c-4.74 0-9.37 1.4-13.31 4.03l-15.33 10.22a7.994 7.994 0 0 0-2.22 11.09l8.88 13.31a7.994 7.994 0 0 0 11.09 2.22l.47-.31V288h-16c-4.42 0-8 3.58-8 8v16c0 4.42 3.58 8 8 8h64c4.42 0 8-3.58 8-8v-16c0-4.42-3.58-8-8-8zM608 64H32C14.33 64 0 78.33 0 96v320c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V96c0-17.67-14.33-32-32-32zM48 400v-64c35.35 0 64 28.65 64 64H48zm0-224v-64h64c0 35.35-28.65 64-64 64zm272 192c-53.02 0-96-50.15-96-112 0-61.86 42.98-112 96-112s96 50.14 96 112c0 61.87-43 112-96 112zm272 32h-64c0-35.35 28.65-64 64-64v64zm0-224c-35.35 0-64-28.65-64-64h64v64z"></path></svg><!-- <span class="fas fa-money-bill-alt"></span> Font Awesome fontawesome.com --> </span><span class="nav-link-text ps-1">Vendas</span>
                    </div>
                  </a>
                  <!-- parent pages--><a class="nav-link" href="./list_treinamento.php" role="button" data-bs-toggle="" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chalkboard-teacher"></span></span><span class="nav-link-text ps-1">Treinamento</span>
                    </div>
                  </a>
                  <!-- parent pages--><a class="nav-link dropdown-indicator collapsed active" href="#email" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="email">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><svg class="svg-inline--fa fa-user-friends fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user-friends" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M192 256c61.9 0 112-50.1 112-112S253.9 32 192 32 80 82.1 80 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C51.6 288 0 339.6 0 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zM480 256c53 0 96-43 96-96s-43-96-96-96-96 43-96 96 43 96 96 96zm48 32h-3.8c-13.9 4.8-28.6 8-44.2 8s-30.3-3.2-44.2-8H432c-20.4 0-39.2 5.9-55.7 15.4 24.4 26.3 39.7 61.2 39.7 99.8v38.4c0 2.2-.5 4.3-.6 6.4H592c26.5 0 48-21.5 48-48 0-61.9-50.1-112-112-112z"></path></svg><!-- <span class="fas fa-user-friends"></span> Font Awesome fontawesome.com --></span><span class="nav-link-text ps-1">Leads</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="email" style="">
                    <li class="nav-item"><a class="nav-link active" href="./list_leads_franqueado.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Todos</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="./novos_leads_franqueados.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Novos</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="./processos/verif_franqueado_pro.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center">
                          <span class="nav-link-text ps-1">Leads Pro</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  </ul>
                  <!-- parent pages-->
                  <ul class="nav collapse" id="events">
                    <li class="nav-item"><a class="nav-link" href="app/events/create-an-event.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create an event</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/events/event-detail.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Event detail</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/events/event-list.php" data-bs-toggle="" aria-expanded="false">
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
                        <li class="nav-item"><a class="nav-link" href="app/e-commerce/product/product-list.php" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product list</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="app/e-commerce/product/product-grid.php" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Product grid</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="app/e-commerce/product/product-details.php" data-bs-toggle="" aria-expanded="false">
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
                        <li class="nav-item"><a class="nav-link" href="app/e-commerce/orders/order-list.php" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Order list</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                        <li class="nav-item"><a class="nav-link" href="app/e-commerce/orders/order-details.php" data-bs-toggle="" aria-expanded="false">
                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Order details</span>
                            </div>
                          </a>
                          <!-- more inner pages-->
                        </li>
                      </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/e-commerce/customers.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Customers</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/e-commerce/customer-details.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Customer details</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/e-commerce/shopping-cart.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Shopping cart</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/e-commerce/checkout.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Checkout</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/e-commerce/billing.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Billing</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/e-commerce/invoice.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Invoice</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  </ul>
                  <!-- parent pages-->
                  <!-- parent pages-->
                  <ul class="nav collapse" id="social">
                    <li class="nav-item"><a class="nav-link" href="app/social/feed.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Feed</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/social/activity-log.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Activity log</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/social/notifications.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Notifications</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                    <li class="nav-item"><a class="nav-link" href="app/social/followers.php" data-bs-toggle="" aria-expanded="false">
                        <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Followers</span>
                        </div>
                      </a>
                      <!-- more inner pages-->
                    </li>
                  </ul>
                </li>
                
                
                
              </ul>
              <div class="settings mb-3">
                <div class="card alert p-0 shadow-none" role="alert">
                  <div class="btn-close-falcon-container">
                    <div class="btn-close-falcon" aria-label="Close" data-bs-dismiss="alert"></div>
                  </div>
                  <div class="card-body text-center"><img src="../assets/img/icons/spot-illustrations/navbar-vertical.png" alt="" width="80">
                    <p class="fs--2 mt-2">Quer alavancar suas vendas? <br>Torne-se um pro</p>
                    <div class="d-grid"><a class="btn btn-outline-warning me-1 mb-1" href="#!"><svg class="svg-inline--fa fa-crown fa-w-20 me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="crown" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg=""><path fill="currentColor" d="M528 448H112c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h416c8.8 0 16-7.2 16-16v-32c0-8.8-7.2-16-16-16zm64-320c-26.5 0-48 21.5-48 48 0 7.1 1.6 13.7 4.4 19.8L476 239.2c-15.4 9.2-35.3 4-44.2-11.6L350.3 85C361 76.2 368 63 368 48c0-26.5-21.5-48-48-48s-48 21.5-48 48c0 15 7 28.2 17.7 37l-81.5 142.6c-8.9 15.6-28.9 20.8-44.2 11.6l-72.3-43.4c2.7-6 4.4-12.7 4.4-19.8 0-26.5-21.5-48-48-48S0 149.5 0 176s21.5 48 48 48c2.6 0 5.2-.4 7.7-.8L128 416h384l72.3-192.8c2.5.4 5.1.8 7.7.8 26.5 0 48-21.5 48-48s-21.5-48-48-48z"></path></svg><!-- <span class="fas fa-crown me-1"></span> Font Awesome fontawesome.com --><span>Go Pro</span></a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </nav>
        <div class="content">
          <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand navbar-glass-shadow">

                  <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                  <a class="navbar-brand me-1 me-sm-3" href="../../index.php">
                    <div class="d-flex align-items-center"><img class="me-2" src="../../../assets/img/icons/spot-illustrations/falcon.png" alt="" width="40"><span class="font-sans-serif">falcon</span>
                    </div>
                  </a>

                  <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
                  
                  
                  
                  
                  <li class="nav-item dropdown"><a class="nav-link pe-0 ps-2" id="navbarDropdownUser" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <div class="avatar avatar-xl">
                        <img class="rounded-circle" src="../assets/img/team/configuration.png" alt="">

                      </div>
                    </a>
                    <div class="dropdown-menu dropdown-caret dropdown-caret dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
                            <div class="bg-white dark__bg-1000 rounded-2 py-2">
                              <a class="dropdown-item" href="./config_franqueado.php?pg=list_leads_franqueado.php">Configurações</a>
                              <a class="dropdown-item" href="../sair.php">Sair</a>
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
                    <h1 class="display-4 mb-3" style="text-align:center;">TODOS OS LEADS</h1>
                        <div class="card-header border-bottom">
                            <div class="row flex-between-end">   
                                <div class="col-auto align-self-center">
                                    <h5 class="mb-0" data-anchor="data-anchor" id="responsive-table">Leads<a class="anchorjs-link " aria-label="Anchor" data-anchorjs-icon="#" href="#responsive-table" style="padding-left: 0.375em;"></a></h5>
                                </div>
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
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($dado = $res->fetch_array()){ ?>
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
                                            <a href="./edit_leads_franqueado.php?id_leads=<?php echo $dado['id'] ?>&nome=<?php echo $dado['nome']; ?>&email=<?php echo $dado['email']; ?>&numero=<?php echo $dado['numero']; ?>&st=<?php echo $dado['status']; ?>&pg=list_leads_franqueado.php" class="btn btn-light pe-2" type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><span class="fas fa-edit"></span></a>
                                              <input value="15" name="id_user_franqueado" hidden/>
                                              <button onclick="sendId(<?php echo $dado['id'] ?>)" class="btn btn-light ps-2" type="button" data-bs-toggle="modal" data-bs-target="#scrollinglongcontent" data-bs-placement="top" title="Delete"><span class="fas fa-trash-alt"></span></button>
                                          </div>
                                          <div>
                                            <?php
                                              $st=$dado['status'];
                                              if($st==0)$inf='Validando Documentação';
                                              elseif($st==1)$inf='Em Processo';
                                              elseif($st==2)$inf='Enviado';
                                              elseif($st==3)$inf='Aprovado';
                                              elseif($st==4)$inf='Compra Feita';
                                              elseif($st==5)$inf='Chegada do Sistema';
                                              elseif($st==6)$inf='Sistema Enviado';
                                              elseif($st==7)$inf='Finalizado';
                                            ?>
                                            <span class="badge badge rounded-pill d-block p-2 badge-soft-info"><?php echo $inf; ?></span>
                                          </div> 
                                          
                                    </td>
                    
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
                  <h5 class="modal-title" id="scrollinglongcontentLabel">DELETAR LEAD?</h5>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../../crud/users/del_leads_franqueado.php" method="POST">
                <div class="modal-footer">
                  <a class="btn btn-falcon-success me-1 mb-1" type="" data-bs-dismiss="modal">Não</a>
                  <button id="del" name="delId" value="" class="btn btn-danger me-1 mb-1" type="submit ">Sim</button>
                </div>
              </form>
              </div>
            </div>
          </div>
          <!--MODAL END-->
          <script>
            function sendId(id){
              let del=document.getElementById('del');
              del.value=id;
              console.log(id);
            }
          </script>
          <!--TABLE add USER start-->
          <div id="form2" class="col-lg-6 col-xl-12 col-xxl-6 h-100" hidden>
          <h1 class="display-4 mb-3" style="text-align:center;">CADASTRO FRANQUEADO</h1>
              
              <div class="card theme-wizard h-100 mb-5">
                <div class="card-header bg-light pt-3 pb-2">
                  <ul class="nav justify-content-between nav-wizard">
                    <li class="nav-item"><a class="nav-link active fw-semi-bold" href="#bootstrap-wizard-validation-tab1" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><svg class="svg-inline--fa fa-lock fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="lock" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M400 224h-24v-72C376 68.2 307.8 0 224 0S72 68.2 72 152v72H48c-26.5 0-48 21.5-48 48v192c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V272c0-26.5-21.5-48-48-48zm-104 0H152v-72c0-39.7 32.3-72 72-72s72 32.3 72 72v72z"></path></svg><!-- <span class="fas fa-lock"></span> Font Awesome fontawesome.com --></span></span><span class="d-none d-md-block mt-1 fs--1">Conta</span></a></li>
                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab2" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><svg hidden class="svg-inline--fa fa-user fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg><span class="fas fa-map-marker-alt"></span></span></span><span class="d-none d-md-block mt-1 fs--1">Endereçco</span></a></li>
                    <li class="nav-item"><a class="nav-link fw-semi-bold" href="#bootstrap-wizard-validation-tab4" data-bs-toggle="tab" data-wizard-step="data-wizard-step"><span class="nav-item-circle-parent"><span class="nav-item-circle"><svg class="svg-inline--fa fa-thumbs-up fa-w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="thumbs-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M104 224H24c-13.255 0-24 10.745-24 24v240c0 13.255 10.745 24 24 24h80c13.255 0 24-10.745 24-24V248c0-13.255-10.745-24-24-24zM64 472c-13.255 0-24-10.745-24-24s10.745-24 24-24 24 10.745 24 24-10.745 24-24 24zM384 81.452c0 42.416-25.97 66.208-33.277 94.548h101.723c33.397 0 59.397 27.746 59.553 58.098.084 17.938-7.546 37.249-19.439 49.197l-.11.11c9.836 23.337 8.237 56.037-9.308 79.469 8.681 25.895-.069 57.704-16.382 74.757 4.298 17.598 2.244 32.575-6.148 44.632C440.202 511.587 389.616 512 346.839 512l-2.845-.001c-48.287-.017-87.806-17.598-119.56-31.725-15.957-7.099-36.821-15.887-52.651-16.178-6.54-.12-11.783-5.457-11.783-11.998v-213.77c0-3.2 1.282-6.271 3.558-8.521 39.614-39.144 56.648-80.587 89.117-113.111 14.804-14.832 20.188-37.236 25.393-58.902C282.515 39.293 291.817 0 312 0c24 0 72 8 72 81.452z"></path></svg><!-- <span class="fas fa-thumbs-up"></span> Font Awesome fontawesome.com --></span></span><span class="d-none d-md-block mt-1 fs--1">Finalizado</span></a></li>
                  </ul>
                </div>
                <div class="card-body py-4" id="wizard-controller">
                  <div class="tab-content">
                    <div class="tab-pane active px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab1" id="bootstrap-wizard-validation-tab1">
                      <form  class="needs-validation" novalidate="novalidate" action="../crud/users/add_user_franqueado.php" method="post">
                        <div class="mb-3">
                          <label class="form-label" for="bootstrap-wizard-validation-wizard-name">Nome</label>
                          <input class="form-control" type="text" name="name" placeholder="Nome" id="bootstrap-wizard-validation-wizard-name">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="bootstrap-wizard-validation-wizard-email">Email*</label>
                          <input class="form-control" type="email" name="email" placeholder="exemplo@email.com" pattern="^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$" required="required" id="bootstrap-wizard-validation-wizard-email" data-wizard-validate-email="true">
                          <div class="invalid-feedback">Você precisa adicionar um email</div>
                        </div>
                        <div class="row g-2">
                          <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label" for="bootstrap-wizard-validation-wizard-password">Senha*</label>
                              <input onkeypress="pass(this)" class="form-control" type="password" name="password" placeholder="Senha" required="required" id="bootstrap-wizard-validation-wizard-password" data-wizard-validate-password="true">
                              <div class="invalid-feedback">Adicione uma senha</div>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="mb-3">
                              <label class="form-label" for="bootstrap-wizard-validation-wizard-confirm-password">Confirmar Senha*</label>
                              <input class="form-control" type="password" name="confirmPassword" placeholder="Confirmar Senha" required="required" id="bootstrap-wizard-validation-wizard-confirm-password" data-wizard-validate-confirm-password="true">
                              <div class="invalid-feedback">Confirme sua senha</div>
                            </div>
                          </div>
                        </div>
                      <script>
                        function pass(){
                          let pass1=document.getElementById('bootstrap-wizard-validation-wizard-password');
                          let pass2=document.getElementById('bootstrap-wizard-validation-wizard-confirm-password');
                          console.log(pass1.value);
                          
                        }
                      </script>
                    </div>
                    <div class="tab-pane px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab2" id="bootstrap-wizard-validation-tab2">
                      
                        <div class="mb-3">
                          <div class="row dz-clickable" data-dropzone="data-dropzone" data-options="{&quot;maxFiles&quot;:1,&quot;data&quot;:[{&quot;name&quot;:&quot;avatar.png&quot;,&quot;size&quot;:&quot;54kb&quot;,&quot;url&quot;:&quot;../../../assets/img/team&quot;}]}">
                            
                            <div class="col-md-auto">
                              <div class="dz-preview dz-preview-single"><div class="dz-preview-cover d-flex align-items-center justify-content-center mb-3 mb-md-0 dz-image-preview">                                  <div class="avatar avatar-4xl"><img class="rounded-circle" src="../../../assets/img/team/avatar.png" alt="avatar.png" data-dz-thumbnail="data-dz-thumbnail"></div>                                  <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress=""></span></div>                                </div></div>
                            </div>
                            <div class="col-md">
                            </div>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="bootstrap-wizard-validation-wizard-phone">Estado</label>
                          <input class="form-control" type="text" name="" placeholder="Estado" id="">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="bootstrap-wizard-validation-wizard-phone">Cidade</label>
                          <input class="form-control" type="text" name="" placeholder="Cidade" id="">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="bootstrap-wizard-validation-wizard-phone">Bairro</label>
                          <input class="form-control" type="text" name="" placeholder="Bairro" id="">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="bootstrap-wizard-validation-wizard-phone">Rua</label>
                          <input class="form-control" type="text" name="" placeholder="Rua" id="">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="bootstrap-wizard-validation-wizard-phone">Numero</label>
                          <input class="form-control" type="" name="" placeholder="Numero" id="">
                        </div>
                      
                    </div>
                    <div class="tab-pane text-center px-sm-3 px-md-5" role="tabpanel" aria-labelledby="bootstrap-wizard-validation-tab4" id="bootstrap-wizard-validation-tab4">
                      <div class="wizard-lottie-wrapper">
                        <div class="lottie wizard-lottie mx-auto my-3" data-options="{&quot;path&quot;:&quot;../../../assets/img/animated-icons/celebration.json&quot;}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 264 464" width="264" height="464" preserveAspectRatio="xMidYMid meet" style="width: 100%; height: 100%; transform: translate3d(0px, 0px, 0px);"><defs><clipPath id="__lottie_element_10"><rect width="264" height="464" x="0" y="0"></rect></clipPath></defs><g clip-path="url(#__lottie_element_10)"><g transform="matrix(1,0,0,1,132,232)" opacity="1" style="display: block;"><g opacity="1" transform="matrix(1,0,0,1,0,182)"><g opacity="1" transform="matrix(0.9993908405303955,0.034898724406957626,-0.034898724406957626,0.9993908405303955,3.3729324340820312,0.9645233154296875)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(203,240,248)" fill-opacity="1" d=" M-0.8989999890327454,80.08599853515625 C-0.7940000295639038,80.78700256347656 -0.7200000286102295,81.48899841308594 -0.6759999990463257,82.19000244140625 C-0.34200000762939453,87.56099700927734 -1.4980000257492065,93.02899932861328 -3.9690001010894775,97.80599975585938 C-5.301000118255615,100.37899780273438 -7.017000198364258,101.64800262451172 -10.517999649047852,102.7229995727539 C-11.420000076293945,105.37799835205078 -12.321000099182129,108.03399658203125 -13.111000061035156,109.33300018310547 C-13.656000137329102,110.42500305175781 -14.842000007629395,111.00900268554688 -15.972000122070312,110.91600036621094 C-17.53499984741211,110.55899810791016 -18.777999877929688,109.09200286865234 -18.628999710083008,107.28500366210938 C-18.628999710083008,107.28500366210938 -18.349000930786133,103.89600372314453 -18.349000930786133,103.89600372314453 C-20.174999237060547,103.97200012207031 -22.226999282836914,104.02999877929688 -24.260000228881836,103.86199951171875 C-25.840999603271484,103.73100280761719 -27.19700050354004,103.61900329589844 -28.760000228881836,103.26200103759766 C-28.760000228881836,103.26200103759766 -29.020999908447266,106.42500305175781 -29.020999908447266,106.42500305175781 C-29.170000076293945,108.23200225830078 -30.658000946044922,109.7020034790039 -32.23899841308594,109.57099914550781 C-33.36899948120117,109.47799682617188 -34.44200134277344,108.70700073242188 -34.79999923706055,107.54000091552734 C-35.36600112915039,106.12799835205078 -35.8390007019043,103.58699798583984 -36.31100082397461,101.0459976196289 C-37.946998596191406,100.31199645996094 -39.60300064086914,99.375 -40.85200119018555,98.06600189208984 C-42.0890007019043,96.76899719238281 -42.893001556396484,95.11699676513672 -43.507999420166016,93.45099639892578 C-45.91400146484375,86.9280014038086 -45.12699890136719,78.70800018310547 -41.91999816894531,72.60299682617188 C-38.14099884033203,65.40899658203125 -29.33300018310547,60.678001403808594 -20.74799919128418,61.38800048828125 C-15.503000259399414,61.821998596191406 -10.42300033569336,64.2509994506836 -6.7129998207092285,67.97000122070312 C-3.507999897003174,71.18299865722656 -1.5720000267028809,75.59100341796875 -0.8989999890327454,80.08599853515625z"></path></g></g><g opacity="1" transform="matrix(0.7431448101997375,-0.6691306233406067,0.6691306233406067,0.7431448101997375,-59.582176208496094,-5.867607116699219)"><path fill="rgb(203,240,248)" fill-opacity="1" d=" M-42.0629997253418,75.07499694824219 C-42.13100051879883,72.34600067138672 -43.540000915527344,62.6150016784668 -43.31999969482422,60.858001708984375 C-43.111000061035156,59.422000885009766 -42.117000579833984,58.492000579833984 -40.979000091552734,58.04999923706055 C-39.20000076293945,57.62900161743164 -37.465999603271484,58.4900016784668 -37.04499816894531,60.26900100708008 C-37.04499816894531,60.26900100708008 -33.599998474121094,71.36100006103516 -33.599998474121094,71.36100006103516"></path></g><g opacity="1" transform="matrix(0.6427876353263855,0.7660444378852844,-0.7660444378852844,0.6427876353263855,54.23332977294922,31.31224822998047)"><path fill="rgb(203,240,248)" fill-opacity="1" d=" M-1.7050000429153442,77.16000366210938 C-0.7760000228881836,74.59300231933594 1.805999994277954,67.54199981689453 2.1540000438690186,65.80599975585938 C2.4110000133514404,64.37699890136719 1.7619999647140503,63.180999755859375 0.8230000138282776,62.4010009765625 C-0.7300000190734863,61.4379997253418 -2.6480000019073486,61.70500183105469 -3.6110000610351562,63.257999420166016 C-3.6110000610351562,63.257999420166016 -9.840999603271484,71.70099639892578 -9.840999603271484,71.70099639892578"></path></g></g></g><g opacity="1" transform="matrix(1,0,0,0.7300000190734863,0,16.554397583007812)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(36,193,224)" fill-opacity="1" d=" M-18.285999298095703,71.75299835205078 C-18.694000244140625,71.70500183105469 -19.139999389648438,71.98400115966797 -19.187999725341797,72.39199829101562 C-19.22599983215332,72.71600341796875 -19.76300048828125,75.17500305175781 -22.716999053955078,74.87100219726562 C-25.66200065612793,74.48400115966797 -25.614999771118164,71.96800231933594 -25.57699966430664,71.64399719238281 C-25.52899932861328,71.23600006103516 -25.89900016784668,70.86199951171875 -26.30699920654297,70.81400299072266 C-26.71500015258789,70.76599884033203 -27.089000701904297,71.13600158691406 -27.136999130249023,71.54399871826172 C-27.22800064086914,73.02300262451172 -26.492000579833984,75.9219970703125 -22.899999618530273,76.34300231933594 C-22.895999908447266,76.34300231933594 -22.89299964904785,76.34400177001953 -22.888999938964844,76.34400177001953 C-22.88599967956543,76.34500122070312 -22.882999420166016,76.34600067138672 -22.878999710083008,76.34600067138672 C-19.28700065612793,76.76699829101562 -17.900999069213867,74.11499786376953 -17.64699935913086,72.65499877929688 C-17.599000930786133,72.24700164794922 -17.878000259399414,71.8010025024414 -18.285999298095703,71.75299835205078z M-16.341999053955078,65.36100006103516 C-15.125,65.50399780273438 -14.253000259399414,66.60600280761719 -14.395999908447266,67.822998046875 C-14.538999557495117,69.04000091552734 -15.642000198364258,69.91200256347656 -16.858999252319336,69.76899719238281 C-18.076000213623047,69.6259994506836 -18.94700050354004,68.52400207519531 -18.804000854492188,67.30699920654297 C-18.660999298095703,66.08999633789062 -17.55900001525879,65.21800231933594 -16.341999053955078,65.36100006103516z M-27.2810001373291,64.08000183105469 C-26.06399917602539,64.2229995727539 -25.191999435424805,65.32499694824219 -25.334999084472656,66.54199981689453 C-25.47800064086914,67.75900268554688 -26.579999923706055,68.63099670410156 -27.797000885009766,68.48799896240234 C-29.013999938964844,68.34500122070312 -29.88599967956543,67.24299621582031 -29.743000030517578,66.0260009765625 C-29.600000381469727,64.80899810791016 -28.49799919128418,63.9370002746582 -27.2810001373291,64.08000183105469z"></path></g></g></g><g opacity="1" transform="matrix(0.9876888990402222,-0.15643103420734406,0.15643103420734406,0.9876888990402222,-15.561237335205078,6.317344665527344)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(209,226,253)" fill-opacity="1" d=" M54.680999755859375,82.1780014038086 C54.84299850463867,82.86799621582031 54.97600173950195,83.56099700927734 55.07699966430664,84.25599670410156 C55.85300064086914,89.58100128173828 55.150001525878906,95.1259994506836 53.08100128173828,100.08999633789062 C51.965999603271484,102.76399993896484 50.361000061035156,104.1709976196289 46.96099853515625,105.53099822998047 C46.28099822998047,108.2509994506836 45.599998474121094,110.97100067138672 44.91999816894531,112.33100128173828 C44.46699905395508,113.46399688720703 43.33300018310547,114.1449966430664 42.20000076293945,114.1449966430664 C40.612998962402344,113.91799926757812 39.25299835205078,112.55899810791016 39.25299835205078,110.74500274658203 C39.25299835205078,110.74500274658203 39.25299835205078,107.34400177001953 39.25299835205078,107.34400177001953 C37.43899917602539,107.57099914550781 35.39899826049805,107.7979965209961 33.35900115966797,107.7979965209961 C31.77199935913086,107.7979965209961 30.41200065612793,107.7979965209961 28.825000762939453,107.57099914550781 C28.825000762939453,107.57099914550781 28.825000762939453,110.74500274658203 28.825000762939453,110.74500274658203 C28.825000762939453,112.55899810791016 27.46500015258789,114.1449966430664 25.878000259399414,114.1449966430664 C24.7450008392334,114.1449966430664 23.611000061035156,113.46399688720703 23.158000946044922,112.33100128173828 C22.47800064086914,110.97100067138672 21.797000885009766,108.47799682617188 21.117000579833984,105.98400115966797 C19.426000595092773,105.38700103759766 17.698999404907227,104.58999633789062 16.34600067138672,103.38800048828125 C15.005999565124512,102.1969985961914 14.069000244140625,100.61799621582031 13.319000244140625,99.00800323486328 C10.383999824523926,92.70500183105469 10.489999771118164,84.447998046875 13.182999610900879,78.0999984741211 C16.35700035095215,70.61900329589844 24.7450008392334,65.17900085449219 33.35900115966797,65.17900085449219 C38.62200164794922,65.17900085449219 43.88399887084961,67.18099975585938 47.88800048828125,70.58200073242188 C51.34700012207031,73.5199966430664 53.63999938964844,77.75399780273438 54.680999755859375,82.1780014038086z"></path></g></g><g opacity="1" transform="matrix(0.8571673035621643,-0.5150380730628967,0.5150380730628967,0.8571673035621643,-39.404170989990234,19.655147552490234)"><path fill="rgb(209,226,253)" fill-opacity="1" d=" M11.956000328063965,83.19000244140625 C11.663999557495117,80.47599792480469 9.456000328063965,70.89399719238281 9.531000137329102,69.125 C9.621000289916992,67.6760025024414 10.53499984741211,66.66899871826172 11.631999969482422,66.13400268554688 C13.369999885559082,65.56800079345703 15.170000076293945,66.28399658203125 15.736000061035156,68.02200317382812 C15.736000061035156,68.02200317382812 20.083999633789062,78.79199981689453 20.083999633789062,78.79199981689453"></path></g><g opacity="1" transform="matrix(0.8480480909347534,0.5299192667007446,-0.5299192667007446,0.8480480909347534,50.08690643310547,-13.999801635742188)"><path fill="rgb(209,226,253)" fill-opacity="1" d=" M54.70100021362305,82.08300018310547 C55.41600036621094,79.447998046875 57.40700149536133,72.20899963378906 57.611000061035156,70.44999694824219 C57.749000549316406,69.00499725341797 57.005001068115234,67.86599731445312 56.005001068115234,67.16600036621094 C54.37699890136719,66.33399963378906 52.48699951171875,66.75800323486328 51.654998779296875,68.38600158691406 C51.654998779296875,68.38600158691406 46.141998291015625,77.31300354003906 46.141998291015625,77.31300354003906"></path></g></g></g><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(66,133,244)" fill-opacity="1" d=" M29.184999465942383,74.53700256347656 C28.781999588012695,74.51599884033203 28.437999725341797,74.9020004272461 28.41699981689453,75.30500030517578 C28.42099952697754,76.76100158691406 29.323999404907227,79.55799865722656 32.87200164794922,79.74500274658203 C36.41999816894531,79.93199920654297 37.612998962402344,77.24600219726562 37.77000045776367,75.79900360107422 C37.85100173950195,75.3219985961914 37.6510009765625,74.98400115966797 37.24800109863281,74.96299743652344 C37.24800109863281,74.96299743652344 29.184999465942383,74.53700256347656 29.184999465942383,74.53700256347656z M38.86899948120117,69.66600036621094 C40.090999603271484,69.76300048828125 41.00299835205078,70.83100128173828 40.90599822998047,72.0530014038086 C40.808998107910156,73.2750015258789 39.74100112915039,74.18699645996094 38.51900100708008,74.08999633789062 C37.297000885009766,73.99299621582031 36.3849983215332,72.92500305175781 36.481998443603516,71.7030029296875 C36.57899856567383,70.48100280761719 37.64699935913086,69.56900024414062 38.86899948120117,69.66600036621094z M27.889999389648438,68.7959976196289 C29.11199951171875,68.89299774169922 30.02400016784668,69.96099853515625 29.927000045776367,71.18299865722656 C29.829999923706055,72.40499877929688 28.761999130249023,73.31700134277344 27.540000915527344,73.22000122070312 C26.31800079345703,73.12300109863281 25.4060001373291,72.05500030517578 25.503000259399414,70.83300018310547 C25.600000381469727,69.61100006103516 26.667999267578125,68.6989974975586 27.889999389648438,68.7959976196289z"></path></g></g></g><g opacity="1" transform="matrix(0.9612634181976318,-0.2756313979625702,0.2756313979625702,0.9612634181976318,-29.926433563232422,-17.766433715820312)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(209,226,253)" fill-opacity="1" d=" M-55.22200012207031,79.56400299072266 C-55.09600067138672,80.26100158691406 -55,80.96199798583984 -54.93600082397461,81.66100311279297 C-54.44200134277344,87.01899719238281 -55.435001373291016,92.51899719238281 -57.76300048828125,97.36699676513672 C-59.018001556396484,99.97899627685547 -60.69499969482422,101.29900360107422 -64.16200256347656,102.47799682617188 C-64.98400115966797,105.15899658203125 -65.80699920654297,107.83999633789062 -66.55799865722656,109.16200256347656 C-67.06999969482422,110.2699966430664 -68.23799896240234,110.88899993896484 -69.37000274658203,110.8290023803711 C-70.94300079345703,110.51899719238281 -72.2300033569336,109.08899688720703 -72.13400268554688,107.27799987792969 C-72.13400268554688,107.27799987792969 -71.95500183105469,103.88300323486328 -71.95500183105469,103.88300323486328 C-73.77799987792969,104.01399993896484 -75.8270034790039,104.13300323486328 -77.86399841308594,104.0250015258789 C-79.4489974975586,103.94100189208984 -80.80699920654297,103.87000274658203 -82.37999725341797,103.55999755859375 C-82.37999725341797,103.55999755859375 -82.5469970703125,106.72899627685547 -82.5469970703125,106.72899627685547 C-82.64299774169922,108.54000091552734 -84.08399963378906,110.0530014038086 -85.66899871826172,109.96900177001953 C-86.8010025024414,109.90899658203125 -87.89700317382812,109.1709976196289 -88.29000091552734,108.01499938964844 C-88.89700317382812,106.62100219726562 -89.44499969482422,104.09500122070312 -89.99299621582031,101.56900024414062 C-91.6500015258789,100.88400268554688 -93.33399963378906,99.99800109863281 -94.62100219726562,98.72599792480469 C-95.89600372314453,97.46600341796875 -96.75,95.83899688720703 -97.41400146484375,94.19200134277344 C-100.01300048828125,87.74299621582031 -99.47100067138672,79.50299835205078 -96.4469985961914,73.30599975585938 C-92.88300323486328,66.00299835205078 -84.22100067138672,61.01100158691406 -75.61900329589844,61.46500015258789 C-70.36299896240234,61.742000579833984 -65.21399688720703,64.0199966430664 -61.39400100708008,67.62699890136719 C-58.09400177001953,70.74299621582031 -56.02899932861328,75.09100341796875 -55.22200012207031,79.56400299072266z"></path></g></g><g opacity="1" transform="matrix(0.7313537001609802,-0.6819983720779419,0.6819983720779419,0.7313537001609802,-76.83961486816406,-44.260719299316406)"><path fill="rgb(209,226,253)" fill-opacity="1" d=" M-97.94100189208984,78.3239974975586 C-98.08999633789062,75.5979995727539 -99.79000091552734,65.91400146484375 -99.62200164794922,64.1510009765625 C-99.45600128173828,62.70899963378906 -98.48899841308594,61.750999450683594 -97.36499786376953,61.275001525878906 C-95.5999984741211,60.801998138427734 -93.83999633789062,61.611000061035156 -93.36699676513672,63.375999450683594 C-93.36699676513672,63.375999450683594 -89.59200286865234,74.36000061035156 -89.59200286865234,74.36000061035156"></path></g><g opacity="1" transform="matrix(0.7313537001609802,0.6819983720779419,-0.6819983720779419,0.7313537001609802,36.262020111083984,62.31349182128906)"><path fill="rgb(209,226,253)" fill-opacity="1" d=" M-55.196998596191406,79.47100067138672 C-54.345001220703125,76.87799835205078 -51.9739990234375,69.75299835205078 -51.678001403808594,68.00700378417969 C-51.4640007019043,66.57099914550781 -52.14699935913086,65.3949966430664 -53.10900115966797,64.64299774169922 C-54.689998626708984,63.72700119018555 -56.60100173950195,64.0510025024414 -57.516998291015625,65.63200378417969 C-57.516998291015625,65.63200378417969 -63.492000579833984,74.25599670410156 -63.492000579833984,74.25599670410156"></path></g></g></g><g opacity="1" transform="matrix(1,0,0,0.75,0,15.995750427246094)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(66,133,244)" fill-opacity="1" d=" M-80.1050033569336,63.73099899291992 C-81.23400115966797,63.55500030517578 -82.35199737548828,64.11599731445312 -82.88700103759766,65.1259994506836 C-82.9990005493164,65.33799743652344 -83.0009994506836,65.58499908447266 -82.89199829101562,65.802001953125 C-82.78199768066406,66.02200317382812 -82.57099914550781,66.17500305175781 -82.3290023803711,66.21299743652344 C-82.01499938964844,66.26200103759766 -81.70099639892578,66.1050033569336 -81.5469970703125,65.82099914550781 C-81.31099700927734,65.38600158691406 -80.82499694824219,65.1449966430664 -80.33699798583984,65.22100067138672 C-79.8489990234375,65.2969970703125 -79.45999908447266,65.67400360107422 -79.36799621582031,66.16000366210938 C-79.30699920654297,66.47699737548828 -79.05599975585938,66.7229995727539 -78.74199676513672,66.77200317382812 C-78.5,66.80999755859375 -78.25199890136719,66.72699737548828 -78.08100128173828,66.5510025024414 C-77.91100311279297,66.37699890136719 -77.83799743652344,66.14099884033203 -77.87999725341797,65.90499877929688 C-78.08200073242188,64.77999877929688 -78.97599792480469,63.90700149536133 -80.1050033569336,63.73099899291992z M-66.40899658203125,67.69200134277344 C-66.61100006103516,66.56700134277344 -67.50499725341797,65.69300079345703 -68.63400268554688,65.51699829101562 C-69.76300048828125,65.34100341796875 -70.87999725341797,65.9020004272461 -71.41500091552734,66.91200256347656 C-71.5270004272461,67.1240005493164 -71.52899932861328,67.37100219726562 -71.41999816894531,67.58799743652344 C-71.30999755859375,67.80799865722656 -71.0999984741211,67.96099853515625 -70.85800170898438,67.9990005493164 C-70.54399871826172,68.0479965209961 -70.2300033569336,67.89099884033203 -70.07599639892578,67.60700225830078 C-69.83999633789062,67.1719970703125 -69.35399627685547,66.93099975585938 -68.86599731445312,67.00700378417969 C-68.37799835205078,67.08300018310547 -67.98799896240234,67.45999908447266 -67.89600372314453,67.94599914550781 C-67.83499908447266,68.26300048828125 -67.58499908447266,68.50900268554688 -67.27100372314453,68.55799865722656 C-67.02899932861328,68.59600067138672 -66.78099822998047,68.51300048828125 -66.60900115966797,68.33699798583984 C-66.43900299072266,68.16300201416016 -66.36699676513672,67.9280014038086 -66.40899658203125,67.69200134277344z M-71.51799774169922,70.24299621582031 C-71.8489990234375,70.19200134277344 -72.15399932861328,70.41600036621094 -72.27200317382812,70.73600006103516 C-72.28199768066406,70.802001953125 -72.76399993896484,73.02899932861328 -75.2770004272461,72.63800048828125 C-77.7239990234375,72.25700378417969 -77.60299682617188,70.177001953125 -77.56199645996094,69.91200256347656 C-77.51100158691406,69.58100128173828 -77.80000305175781,69.26499938964844 -78.13099670410156,69.21399688720703 C-78.46199798583984,69.16300201416016 -78.77799987792969,69.45099639892578 -78.8290023803711,69.78199768066406 C-78.947998046875,70.98300170898438 -78.43900299072266,73.36499786376953 -75.52899932861328,73.81800079345703 C-72.61900329589844,74.27100372314453 -71.40899658203125,72.15699768066406 -71.15799713134766,70.97699737548828 C-70.9739990234375,70.66699981689453 -71.18699645996094,70.29399871826172 -71.51799774169922,70.24299621582031z"></path></g></g></g><g opacity="1" transform="matrix(0.9659273028373718,0.25881344079971313,-0.25881344079971313,0.9659273028373718,28.152835845947266,-19.568809509277344)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(203,240,248)" fill-opacity="1" d=" M106.04000091552734,74.5270004272461 C106.322998046875,75.1760025024414 106.5790023803711,75.83599853515625 106.8030014038086,76.5009994506836 C108.52200317382812,81.5999984741211 108.82599639892578,87.18099975585938 107.68199920654297,92.43599700927734 C107.06500244140625,95.26699829101562 105.73799896240234,96.93900299072266 102.63700103759766,98.88700103759766 C102.45600128173828,101.68499755859375 102.2760009765625,104.48300170898438 101.85099792480469,105.94300079345703 C101.60800170898438,107.13899993896484 100.61499786376953,108.01300048828125 99.5,108.21600341796875 C97.89800262451172,108.27799987792969 96.31700134277344,107.18399810791016 95.99099731445312,105.4000015258789 C95.99099731445312,105.4000015258789 95.37999725341797,102.05400085449219 95.37999725341797,102.05400085449219 C93.63700103759766,102.60299682617188 91.66999816894531,103.19200134277344 89.66300201416016,103.55799865722656 C88.10199737548828,103.84300231933594 86.76399993896484,104.08699798583984 85.16200256347656,104.14900207519531 C85.16200256347656,104.14900207519531 85.73200225830078,107.27100372314453 85.73200225830078,107.27100372314453 C86.05799865722656,109.05500030517578 85.00399780273438,110.86100006103516 83.44300079345703,111.14600372314453 C82.3280029296875,111.3489990234375 81.09100341796875,110.88400268554688 80.44200134277344,109.8499984741211 C79.52899932861328,108.63400268554688 78.41200256347656,106.3030014038086 77.29499816894531,103.97200012207031 C75.52400207519531,103.68800354003906 73.68099975585938,103.21499633789062 72.13500213623047,102.2750015258789 C70.60299682617188,101.34400177001953 69.39800262451172,99.95800018310547 68.37100219726562,98.50900268554688 C64.35199737548828,92.83599853515625 62.9739990234375,84.69300079345703 64.48400115966797,77.96499633789062 C66.26300048828125,70.03600311279297 73.53800201416016,63.178001403808594 82.01300048828125,61.63199996948242 C87.19100189208984,60.6870002746582 92.72599792480469,61.71200180053711 97.2760009765625,64.33899688720703 C101.20600128173828,66.60800170898438 104.22100067138672,70.36199951171875 106.04000091552734,74.5270004272461z"></path></g></g><g opacity="1" transform="matrix(0.5150380730628967,-0.8571673035621643,0.8571673035621643,0.5150380730628967,-34.378150939941406,95.98683166503906)"><path fill="rgb(203,240,248)" fill-opacity="1" d=" M64.19000244140625,83.19300079345703 C63.415000915527344,80.57499694824219 59.52399826049805,71.5459976196289 59.279998779296875,69.79199981689453 C59.10900115966797,68.35099792480469 59.82699966430664,67.19499969482422 60.81100082397461,66.47200012207031 C62.41899871826172,65.60299682617188 64.31800079345703,65.98400115966797 65.18699645996094,67.59200286865234 C65.18699645996094,67.59200286865234 71.39700317382812,77.40699768066406 71.39700317382812,77.40699768066406"></path></g><g opacity="1" transform="matrix(0.7547096014022827,0.6560590267181396,-0.6560590267181396,0.7547096014022827,72.00469970703125,-48.33330535888672)"><path fill="rgb(203,240,248)" fill-opacity="1" d=" M106.04299926757812,74.43099975585938 C106.27300262451172,71.71099853515625 106.93199920654297,64.23100280761719 106.81700134277344,62.4640007019043 C106.69400024414062,61.018001556396484 105.75599670410156,60.03200149536133 104.64700317382812,59.52199935913086 C102.89700317382812,58.99599838256836 101.11399841308594,59.75199890136719 100.58799743652344,61.50199890136719 C100.58799743652344,61.50199890136719 96.76699829101562,71.27400207519531 96.76699829101562,71.27400207519531"></path></g></g></g><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(36,193,224)" fill-opacity="1" d=" M85.03199768066406,68.8239974975586 C84.63999938964844,68.9469985961914 84.34600067138672,69.38400268554688 84.46900177001953,69.7760009765625 C84.56600189208984,70.08699798583984 85.08000183105469,72.5510025024414 82.25900268554688,73.47899627685547 C79.41300201416016,74.3270034790039 78.4280014038086,72.01000213623047 78.33100128173828,71.6989974975586 C78.20800018310547,71.30699920654297 77.71800231933594,71.11599731445312 77.32599639892578,71.23899841308594 C76.93399810791016,71.36199951171875 76.74299621582031,71.85199737548828 76.86599731445312,72.24400329589844 C77.38700103759766,73.63099670410156 79.24099731445312,75.97799682617188 82.69200134277344,74.89700317382812 C82.69599914550781,74.89600372314453 82.6989974975586,74.89399719238281 82.7020034790039,74.89299774169922 C82.70500183105469,74.89199829101562 82.70899963378906,74.89199829101562 82.71299743652344,74.89099884033203 C86.16400146484375,73.80999755859375 86.3479995727539,70.822998046875 85.98400115966797,69.38700103759766 C85.86100006103516,68.99500274658203 85.42400360107422,68.70099639892578 85.03199768066406,68.8239974975586z M84.61499786376953,63.027000427246094 C85.78399658203125,62.6609992980957 87.02999877929688,63.3120002746582 87.39600372314453,64.48100280761719 C87.76200103759766,65.6500015258789 87.11100006103516,66.89600372314453 85.94200134277344,67.26200103759766 C84.77300262451172,67.62799835205078 83.5270004272461,66.97699737548828 83.16100311279297,65.80799865722656 C82.79499816894531,64.63899993896484 83.44599914550781,63.393001556396484 84.61499786376953,63.027000427246094z M74.1050033569336,66.31999969482422 C75.27400207519531,65.9540023803711 76.52100372314453,66.6050033569336 76.88700103759766,67.77400207519531 C77.25299835205078,68.94300079345703 76.60099792480469,70.18900299072266 75.43199920654297,70.55500030517578 C74.26300048828125,70.9209976196289 73.01699829101562,70.2699966430664 72.6510009765625,69.10099792480469 C72.28500366210938,67.93199920654297 72.93599700927734,66.68599700927734 74.1050033569336,66.31999969482422z"></path></g></g></g></g><g opacity="1" transform="matrix(0.9816271662712097,0.1908089965581894,-0.1908089965581894,0.9816271662712097,2.9829235076904297,286.4787292480469)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(209,226,253)" fill-opacity="1" d=" M22.850000381469727,28.0939998626709 C22.364999771118164,28.86400032043457 21.849000930786133,29.608999252319336 21.30500030517578,30.327999114990234 C17.132999420166016,35.83599853515625 11.428000450134277,40.191001892089844 5.021999835968018,42.770999908447266 C1.5700000524520874,44.1609992980957 -1.1629999876022339,43.95899963378906 -5.4710001945495605,42.07400131225586 C-8.572999954223633,43.90299987792969 -11.673999786376953,45.731998443603516 -13.531000137329102,46.334999084472656 C-14.97599983215332,46.94200134277344 -16.621000289916992,46.518001556396484 -17.642000198364258,45.48099899291992 C-18.864999771118164,43.82500076293945 -18.844999313354492,41.35499954223633 -17.18600082397461,39.72100067138672 C-17.18600082397461,39.72100067138672 -14.076000213623047,36.65700149536133 -14.076000213623047,36.65700149536133 C-15.918000221252441,35.20199966430664 -17.964000701904297,33.540000915527344 -19.802000045776367,31.67300033569336 C-21.23200035095215,30.22100067138672 -22.457000732421875,28.976999282836914 -23.68000030517578,27.320999145507812 C-23.68000030517578,27.320999145507812 -26.58300018310547,30.180999755859375 -26.58300018310547,30.180999755859375 C-28.242000579833984,31.815000534057617 -30.920000076293945,32.000999450683594 -32.349998474121094,30.548999786376953 C-33.37099838256836,29.511999130249023 -33.77000045776367,27.86199951171875 -33.141998291015625,26.426000595092773 C-32.5099983215332,24.577999114990234 -30.840999603271484,21.708999633789062 -29.17300033569336,18.84000015258789 C-30.150999069213867,16.7549991607666 -30.979000091552734,14.456999778747559 -31.097999572753906,12.13599967956543 C-31.215999603271484,9.836999893188477 -30.615999221801758,7.556000232696533 -29.819000244140625,5.419000148773193 C-26.697999954223633,-2.946000099182129 -19.04800033569336,-10.288999557495117 -10.814000129699707,-13.545000076293945 C-1.1100000143051147,-17.382999420166016 11.425999641418457,-14.612000465393066 19.187999725341797,-6.730999946594238 C23.93000030517578,-1.9160000085830688 26.84000015258789,4.702000141143799 27.336999893188477,11.430000305175781 C27.766000747680664,17.242000579833984 25.958999633789062,23.155000686645508 22.850000381469727,28.0939998626709z"></path></g></g><g opacity="1" transform="matrix(0.5446390509605408,-0.838670551776886,0.838670551776886,0.5446390509605408,-5.69389533996582,-13.20799732208252)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(209,226,253)" fill-opacity="1" d=" M-7.302999973297119,-6.633999824523926 C-7.302999973297119,-6.633999824523926 -7.98199987411499,-21.533000946044922 -7.98199987411499,-21.533000946044922 C-7.927000045776367,-23.878999710083008 -9.803000450134277,-25.511999130249023 -12.14900016784668,-25.566999435424805 C-13.706000328063965,-25.386999130249023 -15.243000030517578,-24.55699920654297 -15.968999862670898,-22.84000015258789 C-16.812999725341797,-20.729000091552734 -18.22100067138672,-8.180000305175781 -19.023000717163086,-4.76800012588501 C-19.023000717163086,-4.76800012588501 -7.302999973297119,-6.633999824523926 -7.302999973297119,-6.633999824523926z"></path></g></g><g opacity="1" transform="matrix(0.7660444378852844,0.6427876353263855,-0.6427876353263855,0.7660444378852844,20.105682373046875,-9.287908554077148)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(209,226,253)" fill-opacity="1" d=" M22.694000244140625,16.281999588012695 C22.694000244140625,16.281999588012695 19.381999969482422,28.62700080871582 19.381999969482422,28.62700080871582 C22.832000732421875,29.24799919128418 32.314998626708984,30.990999221801758 34.5880012512207,31.055999755859375 C36.45199966430664,31.07200050354004 37.82500076293945,29.993000030517578 38.61000061035156,28.63599967956543 C39.49300003051758,26.461000442504883 38.742000579833984,24.090999603271484 36.56700134277344,23.20800018310547 C36.56700134277344,23.20800018310547 22.694000244140625,16.281999588012695 22.694000244140625,16.281999588012695"></path></g></g></g><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(66,133,244)" fill-opacity="1" d=" M-1.2269999980926514,-1.253999948501587 C-1.4980000257492065,-1.5800000429153442 -2.0429999828338623,-1.5700000524520874 -2.36899995803833,-1.2990000247955322 C-3.490000009536743,-0.25699999928474426 -5.004000186920166,2.437000036239624 -2.615999937057495,5.309999942779541 C-0.2280000001192093,8.182999610900879 2.697000026702881,7.188000202178955 3.927000045776367,6.276000022888184 C4.353000164031982,5.999000072479248 4.4710001945495605,5.6020002365112305 4.199999809265137,5.276000022888184 C4.199999809265137,5.276000022888184 -1.2269999980926514,-1.253999948501587 -1.2269999980926514,-1.253999948501587z"></path></g><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(25,118,210)" fill-opacity="1" d=" M-3.5950000286102295,0.5690000057220459 C-4.074999809265137,1.8559999465942383 -4.079999923706055,3.5480000972747803 -2.615999937057495,5.309999942779541 C-1.7510000467300415,6.349999904632568 -0.8180000185966492,6.879000186920166 0.0820000022649765,7.0920000076293945 C0.17299999296665192,6.692999839782715 0.22599999606609344,6.28000020980835 0.22599999606609344,5.853000164031982 C0.22599999606609344,3.3889999389648438 -1.3769999742507935,1.3020000457763672 -3.5950000286102295,0.5690000057220459z"></path></g><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(225,247,249)" fill-opacity="1" d=" M23.834999084472656,10.664999961853027 C23.23699951171875,10.83899974822998 22.854999542236328,11.383000373840332 22.93000030517578,12.010000228881836 C23.347999572753906,15.670000076293945 20.679000854492188,17.636999130249023 20.679000854492188,17.636999130249023 C20.040000915527344,18.038999557495117 19.944000244140625,18.823999404907227 20.34600067138672,19.46299934387207 C20.74799919128418,20.101999282836914 21.533000946044922,20.19700050354004 22.172000885009766,19.795000076293945 C22.341999053955078,19.636999130249023 26.09000015258789,16.923999786376953 25.565000534057617,11.781999588012695 C25.461000442504883,11.055999755859375 24.888999938964844,10.574000358581543 24.163000106811523,10.678000450134277 C24.034000396728516,10.607000350952148 23.934999465942383,10.63599967956543 23.834999084472656,10.664999961853027z"></path></g></g><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(255,167,38)" fill-opacity="1" d=" M19.1560001373291,9.093999862670898 C15.958999633789062,12.027999877929688 10.989999771118164,11.8149995803833 8.055999755859375,8.618000030517578 C5.122000217437744,5.421000003814697 5.335000038146973,0.4519999921321869 8.531999588012695,-2.4820001125335693 C11.729000091552734,-5.415999889373779 16.697999954223633,-5.203000068664551 19.631999969482422,-2.00600004196167 C22.56599998474121,1.190999984741211 22.35300064086914,6.159999847412109 19.1560001373291,9.093999862670898z M6.388999938964844,-4.816999912261963 C3.191999912261963,-1.8830000162124634 -1.7769999504089355,-2.0969998836517334 -4.710999965667725,-5.294000148773193 C-7.644999980926514,-8.491000175476074 -7.432000160217285,-13.460000038146973 -4.235000133514404,-16.393999099731445 C-1.0379999876022339,-19.327999114990234 3.930999994277954,-19.11400032043457 6.864999771118164,-15.916999816894531 C9.798999786376953,-12.720000267028809 9.586000442504883,-7.750999927520752 6.388999938964844,-4.816999912261963z M9.54699993133545,-0.1979999989271164 C9.54699993133545,-0.1979999989271164 4.315999984741211,-5.896999835968018 4.315999984741211,-5.896999835968018 C4.315999984741211,-5.896999835968018 6.343999862670898,-7.757999897003174 6.343999862670898,-7.757999897003174 C6.343999862670898,-7.757999897003174 11.574999809265137,-2.059000015258789 11.574999809265137,-2.059000015258789 C11.574999809265137,-2.059000015258789 9.54699993133545,-0.1979999989271164 9.54699993133545,-0.1979999989271164z M23.389999389648438,3.885999917984009 C23.389999389648438,4.690999984741211 22.73699951171875,5.343999862670898 21.93199920654297,5.343999862670898 C21.12700080871582,5.343999862670898 20.474000930786133,4.690999984741211 20.474000930786133,3.885999917984009 C20.474000930786133,3.0810000896453857 21.12700080871582,2.427999973297119 21.93199920654297,2.427999973297119 C22.73699951171875,2.427999973297119 23.389999389648438,3.0810000896453857 23.389999389648438,3.885999917984009z M2.13100004196167,-18.613000869750977 C2.13100004196167,-17.808000564575195 1.4780000448226929,-17.15399932861328 0.6729999780654907,-17.15399932861328 C-0.13199999928474426,-17.15399932861328 -0.7860000133514404,-17.808000564575195 -0.7860000133514404,-18.613000869750977 C-0.7860000133514404,-19.417999267578125 -0.13199999928474426,-20.070999145507812 0.6729999780654907,-20.070999145507812 C1.4780000448226929,-20.070999145507812 2.13100004196167,-19.417999267578125 2.13100004196167,-18.613000869750977z"></path></g><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(66,133,244)" fill-opacity="1" d=" M17.871000289916992,7.693999767303467 C15.446999549865723,9.918000221252441 11.680000305175781,9.756999969482422 9.456000328063965,7.333000183105469 C7.23199987411499,4.908999919891357 7.392000198364258,1.1410000324249268 9.815999984741211,-1.0829999446868896 C12.239999771118164,-3.306999921798706 16.007999420166016,-3.1459999084472656 18.23200035095215,-0.722000002861023 C20.45599937438965,1.7020000219345093 20.295000076293945,5.46999979019165 17.871000289916992,7.693999767303467z M5.104000091552734,-6.2170000076293945 C2.680000066757202,-3.993000030517578 -1.0870000123977661,-4.1539998054504395 -3.311000108718872,-6.578000068664551 C-5.534999847412109,-9.001999855041504 -5.374000072479248,-12.770000457763672 -2.950000047683716,-14.994000434875488 C-0.5260000228881836,-17.218000411987305 3.240999937057495,-17.05699920654297 5.465000152587891,-14.633000373840332 C7.689000129699707,-12.208999633789062 7.5279998779296875,-8.440999984741211 5.104000091552734,-6.2170000076293945z"></path></g><g opacity="0.3" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(255,255,255)" fill-opacity="1" d=" M-4.666999816894531,-9.097999572753906 C-4.427999973297119,-8.194000244140625 -4,-7.328000068664551 -3.3239998817443848,-6.591000080108643 C-2.74399995803833,-5.959000110626221 -2.053999900817871,-5.488999843597412 -1.315000057220459,-5.166999816894531 C-1.315000057220459,-5.166999816894531 6.163000106811523,-7.5920000076293945 6.163000106811523,-7.5920000076293945 C7.125999927520752,-9.21500015258789 7.263000011444092,-11.190999984741211 6.534999847412109,-12.920999526977539 C6.534999847412109,-12.920999526977539 -4.666999816894531,-9.097999572753906 -4.666999816894531,-9.097999572753906z M8.112000465393066,4.826000213623047 C8.35099983215332,5.730000019073486 8.779999732971191,6.5960001945495605 9.456000328063965,7.333000183105469 C10.03600025177002,7.965000152587891 10.725000381469727,8.435999870300293 11.46399974822998,8.758000373840332 C11.46399974822998,8.758000373840332 18.941999435424805,6.333000183105469 18.941999435424805,6.333000183105469 C19.905000686645508,4.710000038146973 20.04199981689453,2.7339999675750732 19.31399917602539,1.003999948501587 C19.31399917602539,1.003999948501587 8.112000465393066,4.826000213623047 8.112000465393066,4.826000213623047z"></path></g></g><g opacity="1" transform="matrix(0.05234536528587341,0.9986290335655212,-0.9986290335655212,0.05234536528587341,62.363155364990234,-54.05501937866211)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(203,240,248)" fill-opacity="1" d=" M46.28300094604492,-9.434000015258789 C46.28300094604492,-9.434000015258789 29.57900047302246,-8.812999725341797 29.57900047302246,-8.812999725341797 C29.1560001373291,-8.79699993133545 28.878000259399414,-8.366999626159668 29.03700065612793,-7.974999904632568 C29.03700065612793,-7.974999904632568 30.96500015258789,-3.2279999256134033 30.96500015258789,-3.2279999256134033 C30.96500015258789,-3.2279999256134033 31.507999420166016,-1.8919999599456787 31.507999420166016,-1.8919999599456787 C31.507999420166016,-1.8919999599456787 33.43600082397461,2.8519999980926514 33.43600082397461,2.8519999980926514 C33.59600067138672,3.244999885559082 34.095001220703125,3.359999895095825 34.409000396728516,3.075000047683716 C36.5880012512207,1.093999981880188 43.7140007019043,-5.385000228881836 46.79399871826172,-8.190999984741211 C47.2869987487793,-8.640999794006348 46.95000076293945,-9.458999633789062 46.28300094604492,-9.434000015258789z"></path></g><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(148,219,224)" fill-opacity="1" d=" M30.836999893188477,-3.5429999828338623 C30.836999893188477,-3.5429999828338623 38.24700164794922,-0.41499999165534973 38.24700164794922,-0.41499999165534973 C39.04600143432617,-1.1410000324249268 39.895999908447266,-1.9140000343322754 40.75199890136719,-2.693000078201294 C40.75199890136719,-2.693000078201294 29.20199966430664,-7.570000171661377 29.20199966430664,-7.570000171661377 C29.20199966430664,-7.570000171661377 30.836999893188477,-3.5429999828338623 30.836999893188477,-3.5429999828338623z"></path></g><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(148,219,224)" fill-opacity="1" d=" M34.09600067138672,-8.980999946594238 C34.09600067138672,-8.980999946594238 43.36399841308594,-5.067999839782715 43.36399841308594,-5.067999839782715 C44.27899932861328,-5.901000022888184 45.13399887084961,-6.678999900817871 45.86800003051758,-7.3470001220703125 C45.86800003051758,-7.3470001220703125 41.356998443603516,-9.25100040435791 41.356998443603516,-9.25100040435791 C41.356998443603516,-9.25100040435791 34.09600067138672,-8.980999946594238 34.09600067138672,-8.980999946594238z"></path></g></g><g opacity="1" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(148,219,224)" fill-opacity="1" d=" M50.084999084472656,-9.02400016784668 C49.917999267578125,-7.9670000076293945 48.92499923706055,-7.245999813079834 47.86800003051758,-7.413000106811523 C46.81100082397461,-7.579999923706055 46.09000015258789,-8.572999954223633 46.25699996948242,-9.630000114440918 C46.42399978637695,-10.687000274658203 47.41699981689453,-11.407999992370605 48.4739990234375,-11.241000175476074 C49.53099822998047,-11.074000358581543 50.25199890136719,-10.081000328063965 50.084999084472656,-9.02400016784668z"></path></g></g></g><g opacity="1" transform="matrix(1,0,0,1,0,147)"><g opacity="0" transform="matrix(1,0,0,1,-25,24)"><path fill="rgb(246,102,56)" fill-opacity="1" d=" M62.60100173950195,18.645999908447266 C60.78099822998047,23.586000442504883 56.1879997253418,24.972999572753906 56.1879997253418,24.972999572753906 C56.1879997253418,24.972999572753906 56.1879997253418,24.972999572753906 56.1879997253418,24.972999572753906 C56.1879997253418,24.972999572753906 56.1879997253418,24.972999572753906 56.1879997253418,24.972999572753906 C56.1879997253418,24.972999572753906 60.867000579833984,26.358999252319336 62.513999938964844,31.298999786376953 C64.33399963378906,26.358999252319336 68.83999633789062,24.972999572753906 68.83999633789062,24.972999572753906 C68.83999633789062,24.972999572753906 68.83999633789062,24.972999572753906 68.83999633789062,24.972999572753906 C68.83999633789062,24.972999572753906 68.83999633789062,24.972999572753906 68.83999633789062,24.972999572753906 C68.83999633789062,24.972999572753906 68.83999633789062,24.972999572753906 68.83999633789062,24.972999572753906 C68.83999633789062,24.972999572753906 68.83999633789062,24.972999572753906 68.83999633789062,24.972999572753906 C68.83999633789062,24.972999572753906 68.83999633789062,24.972999572753906 68.83999633789062,24.972999572753906 C68.83999633789062,24.972999572753906 68.83999633789062,24.972999572753906 68.83999633789062,24.972999572753906 C68.927001953125,24.972999572753906 64.24800109863281,23.586000442504883 62.60100173950195,18.645999908447266"></path></g><g opacity="0" transform="matrix(0.5150380730628967,0.8571673035621643,-0.8571673035621643,0.5150380730628967,12.08004379272461,76.05459594726562)"><path fill="rgb(253,202,64)" fill-opacity="1" d=" M-61.39899826049805,42.3129997253418 C-63.21900177001953,47.25299835205078 -67.81199645996094,48.638999938964844 -67.81199645996094,48.638999938964844 C-67.81199645996094,48.638999938964844 -67.81199645996094,48.638999938964844 -67.81199645996094,48.638999938964844 C-67.81199645996094,48.638999938964844 -67.81199645996094,48.638999938964844 -67.81199645996094,48.638999938964844 C-67.81199645996094,48.638999938964844 -63.132999420166016,50.0260009765625 -61.486000061035156,54.965999603271484 C-59.66600036621094,50.0260009765625 -55.15999984741211,48.638999938964844 -55.15999984741211,48.638999938964844 C-55.15999984741211,48.638999938964844 -55.15999984741211,48.638999938964844 -55.15999984741211,48.638999938964844 C-55.15999984741211,48.638999938964844 -55.15999984741211,48.638999938964844 -55.15999984741211,48.638999938964844 C-55.15999984741211,48.638999938964844 -55.15999984741211,48.638999938964844 -55.15999984741211,48.638999938964844 C-55.15999984741211,48.638999938964844 -55.15999984741211,48.638999938964844 -55.15999984741211,48.638999938964844 C-55.15999984741211,48.638999938964844 -55.15999984741211,48.638999938964844 -55.15999984741211,48.638999938964844 C-55.15999984741211,48.638999938964844 -55.15999984741211,48.638999938964844 -55.15999984741211,48.638999938964844 C-55.073001861572266,48.638999938964844 -59.75199890136719,47.25299835205078 -61.39899826049805,42.3129997253418"></path></g><g opacity="0" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(253,202,64)" fill-opacity="1" d=" M29.243999481201172,-37.02000045776367 C27.90399932861328,-33.38199996948242 24.520999908447266,-32.36000061035156 24.520999908447266,-32.36000061035156 C24.520999908447266,-32.36000061035156 24.520999908447266,-32.36000061035156 24.520999908447266,-32.36000061035156 C24.520999908447266,-32.36000061035156 24.520999908447266,-32.36000061035156 24.520999908447266,-32.36000061035156 C24.520999908447266,-32.36000061035156 27.966999053955078,-31.339000701904297 29.18000030517578,-27.701000213623047 C30.520000457763672,-31.339000701904297 33.84000015258789,-32.36000061035156 33.84000015258789,-32.36000061035156 C33.84000015258789,-32.36000061035156 33.84000015258789,-32.36000061035156 33.84000015258789,-32.36000061035156 C33.84000015258789,-32.36000061035156 33.84000015258789,-32.36000061035156 33.84000015258789,-32.36000061035156 C33.84000015258789,-32.36000061035156 33.84000015258789,-32.36000061035156 33.84000015258789,-32.36000061035156 C33.84000015258789,-32.36000061035156 33.84000015258789,-32.36000061035156 33.84000015258789,-32.36000061035156 C33.84000015258789,-32.36000061035156 33.84000015258789,-32.36000061035156 33.84000015258789,-32.36000061035156 C33.84000015258789,-32.36000061035156 33.84000015258789,-32.36000061035156 33.84000015258789,-32.36000061035156 C33.90399932861328,-32.36000061035156 30.457000732421875,-33.38199996948242 29.243999481201172,-37.02000045776367"></path></g><g opacity="0" transform="matrix(1,0,0,1,0,0)"><path fill="rgb(246,102,56)" fill-opacity="1" d=" M-54.15999984741211,-6.0269999504089355 C-55.42100143432617,-2.6040000915527344 -58.604000091552734,-1.6430000066757202 -58.604000091552734,-1.6430000066757202 C-58.604000091552734,-1.6430000066757202 -58.604000091552734,-1.6430000066757202 -58.604000091552734,-1.6430000066757202 C-58.604000091552734,-1.6430000066757202 -58.604000091552734,-1.6430000066757202 -58.604000091552734,-1.6430000066757202 C-58.604000091552734,-1.6430000066757202 -55.361000061035156,-0.6819999814033508 -54.220001220703125,2.740999937057495 C-52.95899963378906,-0.6819999814033508 -49.834999084472656,-1.6430000066757202 -49.834999084472656,-1.6430000066757202 C-49.834999084472656,-1.6430000066757202 -49.834999084472656,-1.6430000066757202 -49.834999084472656,-1.6430000066757202 C-49.834999084472656,-1.6430000066757202 -49.834999084472656,-1.6430000066757202 -49.834999084472656,-1.6430000066757202 C-49.834999084472656,-1.6430000066757202 -49.834999084472656,-1.6430000066757202 -49.834999084472656,-1.6430000066757202 C-49.834999084472656,-1.6430000066757202 -49.834999084472656,-1.6430000066757202 -49.834999084472656,-1.6430000066757202 C-49.834999084472656,-1.6430000066757202 -49.834999084472656,-1.6430000066757202 -49.834999084472656,-1.6430000066757202 C-49.834999084472656,-1.6430000066757202 -49.834999084472656,-1.6430000066757202 -49.834999084472656,-1.6430000066757202 C-49.775001525878906,-1.6430000066757202 -53.01900100708008,-2.6040000915527344 -54.15999984741211,-6.0269999504089355"></path></g><g opacity="0" transform="matrix(0.9131986498832703,-0.793831467628479,0.793831467628479,0.9131986498832703,-8.248411178588867,0.6842203140258789)"><path fill="rgb(255,255,255)" fill-opacity="1" d=" M-42.262001037597656,-30.163000106811523 C-41.54399871826172,-29.516000747680664 -41.487998962402344,-28.409000396728516 -42.1349983215332,-27.69099998474121 C-42.78200149536133,-26.972999572753906 -43.88800048828125,-26.91699981689453 -44.60599899291992,-27.56399917602539 M47.02899932861328,50.5369987487793 C48.38600158691406,49.99800109863281 49.92499923706055,50.6609992980957 50.4640007019043,52.018001556396484 C51.00299835205078,53.375 50.34000015258789,54.91299819946289 48.983001708984375,55.45199966430664"></path><path fill="rgb(255,213,79)" fill-opacity="1" d=" M47.02899932861328,50.5369987487793 C48.38600158691406,49.99800109863281 49.92499923706055,50.6609992980957 50.4640007019043,52.018001556396484 C51.00299835205078,53.375 50.34000015258789,54.91299819946289 48.983001708984375,55.45199966430664"></path></g><g opacity="0" transform="matrix(0.9612616896629333,0.27563735842704773,-0.27563735842704773,0.9612616896629333,0,0)"><path fill="rgb(255,213,79)" fill-opacity="1" d=" M73.93099975585938,-6.883999824523926 C74.88200378417969,-6.291999816894531 75.1719970703125,-5.040999889373779 74.58000183105469,-4.090000152587891 C73.98799896240234,-3.1389999389648438 72.73699951171875,-2.8480000495910645 71.78600311279297,-3.440000057220459"></path></g><g opacity="0" transform="matrix(1,0,0,1,0,-11)"><path fill="rgb(255,213,79)" fill-opacity="1" d=" M69.44400024414062,41.17900085449219 C69.44400024414062,42.18000030517578 68.63200378417969,42.992000579833984 67.63099670410156,42.992000579833984 C66.62999725341797,42.992000579833984 65.81800079345703,42.18000030517578 65.81800079345703,41.17900085449219 C65.81800079345703,40.178001403808594 66.62999725341797,39.36600112915039 67.63099670410156,39.36600112915039 C68.63200378417969,39.36600112915039 69.44400024414062,40.178001403808594 69.44400024414062,41.17900085449219z"></path></g><g opacity="0" transform="matrix(1,0,0,1,-14,-38)"><path fill="rgb(245,245,245)" fill-opacity="1" d=" M-53.305999755859375,27.448999404907227 C-53.305999755859375,28.450000762939453 -54.11800003051758,29.261999130249023 -55.11899948120117,29.261999130249023 C-56.119998931884766,29.261999130249023 -56.93199920654297,28.450000762939453 -56.93199920654297,27.448999404907227 C-56.93199920654297,26.447999954223633 -56.119998931884766,25.63599967956543 -55.11899948120117,25.63599967956543 C-54.11800003051758,25.63599967956543 -53.305999755859375,26.447999954223633 -53.305999755859375,27.448999404907227z"></path></g><g opacity="0" transform="matrix(0.9063078165054321,-0.4226182699203491,0.4226182699203491,0.9063078165054321,-1.9754083156585693,0.057509422302246094)"><path fill="rgb(52,168,83)" fill-opacity="1" d=" M-53.867000579833984,-20.260000228881836 C-53.867000579833984,-19.259000778198242 -54.67900085449219,-18.445999145507812 -55.68000030517578,-18.445999145507812 C-56.680999755859375,-18.445999145507812 -57.49300003051758,-19.259000778198242 -57.49300003051758,-20.260000228881836 C-57.49300003051758,-21.26099967956543 -56.680999755859375,-22.072999954223633 -55.68000030517578,-22.072999954223633 C-54.67900085449219,-22.072999954223633 -53.867000579833984,-21.26099967956543 -53.867000579833984,-20.260000228881836z M53.694000244140625,-25.40399932861328 C53.694000244140625,-24.402999877929688 52.88199996948242,-23.590999603271484 51.88100051879883,-23.590999603271484 C50.880001068115234,-23.590999603271484 50.06800079345703,-24.402999877929688 50.06800079345703,-25.40399932861328 C50.06800079345703,-26.405000686645508 50.880001068115234,-27.216999053955078 51.88100051879883,-27.216999053955078 C52.88199996948242,-27.216999053955078 53.694000244140625,-26.405000686645508 53.694000244140625,-25.40399932861328z"></path></g></g></g></g></svg></div>
                      </div>
                      <h4 class="mb-1">Quase tudo pronto</h4>
                      <p>Iremos cadastrar o novo Franqueados no banco</p><button class="btn btn-primary px-5 my-3" type="submit">Cadastrar</button>
                    </form>
                    </div>
                  </div>
                </div>
                <div class="card-footer bg-light">
                  <div class="px-sm-3 px-md-5">
                    <ul class="pager wizard list-inline mb-0">
                      <li class="previous">
                        <button class="btn btn-link ps-0 d-none" type="button"><svg class="svg-inline--fa fa-chevron-left fa-w-10 me-2" data-fa-transform="shrink-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="" style="transform-origin: 0.3125em 0.5em;"><g transform="translate(160 256)"><g transform="translate(0, 0)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z" transform="translate(-160 -256)"></path></g></g></svg><!-- <span class="fas fa-chevron-left me-2" data-fa-transform="shrink-3"></span> Font Awesome fontawesome.com -->Prev</button>
                      </li>
                      <li class="next">
                        <button class="btn btn-primary px-5 px-sm-6" type="submit">Proximo<svg class="svg-inline--fa fa-chevron-right fa-w-10 ms-2" data-fa-transform="shrink-3" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="" style="transform-origin: 0.3125em 0.5em;"><g transform="translate(160 256)"><g transform="translate(0, 0)  scale(0.8125, 0.8125)  rotate(0 0 0)"><path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z" transform="translate(-160 -256)"></path></g></g></svg><!-- <span class="fas fa-chevron-right ms-2" data-fa-transform="shrink-3"> </span> Font Awesome fontawesome.com --></button>
                      </li>
                    </ul>
                  </div>
                </div>
              </div><a class="btn btn-danger me-1 mb-1" onclick="x2(this)">Cancelar</a>
            </div>
          <!--TABLE add USER END-->
          <script>
            function x1(){
              document.getElementById('form1').hidden=true;
              document.getElementById('form2').hidden=false;
            }
            function x2(){
              document.getElementById('form1').hidden=false;
              document.getElementById('form2').hidden=true;
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
    <script src="../vendors/popper/popper.min.js"></script>
    <script src="../vendors/bootstrap/bootstrap.min.js"></script>
    <script src="../vendors/anchorjs/anchor.min.js"></script>
    <script src="../vendors/is/is.min.js"></script>
    <script src="../vendors/echarts/echarts.min.js"></script>
    <script src="../vendors/fontawesome/all.min.js"></script>
    <script src="../vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="../vendors/list.js/list.min.js"></script>
    <script src="../assets/js/theme.js"></script>

  </body>

</html>