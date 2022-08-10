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
    <title>Emanuel Energia Sustentavel</title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="./public/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/assets/img/favicons/favicon-16x16.png">
    <link rel="shortcut icon" type="image/x-icon" href="./public/assets/img/favicons/favicon.ico">
    <link rel="manifest" href="./public/assets/img/favicons/manifest.json">
    <meta name="msapplication-TileImage" content="./public/assets/img/favicons/mstile-150x150.png">
    <meta name="theme-color" content="#ffffff">
    <script src="./public/assets/js/config.js"></script>
    <script src="./public/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="./public/vendors/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <link href="./public/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="./public/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="./public/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="./public/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="./public/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
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
      
      <nav class="navbar navbar-standard navbar-expand-lg fixed-top navbar-light" data-navbar-darken-on-scroll="data-navbar-darken-on-scroll" style="background-image: none; transition: none 0s ease 0s;">
        <div class="container"><a class="navbar-brand" href="./public/index.php"><span class="text-blue dark__text-blue">Emanuel Energia Sustentavel</span></a>
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarStandard" aria-controls="navbarStandard" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse scrollbar" id="navbarStandard">
            
            <ul class="navbar-nav ms-auto">
              
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="navbarDropdownLogin" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Entrar</a>
                <div class="dropdown-menu dropdown-caret dropdown-menu-end dropdown-menu-card" aria-labelledby="navbarDropdownLogin">
                  <div class="card shadow-none navbar-card-login">
                    <div class="card-body fs--1 p-4 fw-normal">
                      <div class="row text-start justify-content-between align-items-center mb-2">
                        <div class="col-auto">
                          <h5 class="mb-0">Entrar</h5>
                        </div>
                      </div>
                      <form action="./public/login/process_login.php" method="POST">
                        <input name="tipo_conta" value="0" hidden/><!--DEFINIR TIPO DE CONTA COMO FRANQUEADO-->
                        <div class="mb-3">
                          <input name="email" class="form-control" type="email" placeholder="Email">
                        </div>
                        <div class="mb-3">
                          <input name="pass" class="form-control" type="password" placeholder="Senha">
                        </div>
                        <div class="row flex-between-center" hidden>
                          <div class="col-auto"><a class="fs--1" href="#">Forgot Password?</a></div>
                        </div>
                        <div class="mb-3">
                          <button class="btn btn-primary d-block w-100 mt-3" type="submit">Entrar</button>
                        </div>
                      </form>
                      
                    </div>
                  </div>
                </div>
              </li>
              <li class="nav-item"><a class="nav-link" href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal">Registrar-se</a></li>
            </ul>
          </div>
        </div>
      </nav>


     
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body p-4">
              <div class="row text-start justify-content-between align-items-center mb-2">
                <div class="col-auto">
                  <h5 id="modalLabel">Registrar-se</h5>
                </div>
              </div>
              <form action="./crud/users/add_leads_franqueado.php" method="POST">
                <div class="mb-3">
                  <input name="nome" class="form-control" type="text" placeholder="Nome" />
                </div>
                <div class="mb-3">
                  <input name="email" class="form-control" type="email" placeholder="Email" require />
                </div>
                <div class="mb-3">
                  <input name="number" onkeypress="number(this)" id="Number" class="form-control" type="" maxlength="16" placeholder="(99) 9 9999-9999" />
                </div>
                <div class="row gx-2">
                  <div class="mb-3 col-sm-6">
                    <input id="pass0" onkeyup="verifPass(this)" name="pass" class="form-control" type="password" placeholder="Senha" />
                    <span id="av0" hidden style="color: red;">Senha muito curta!</span>
                  </div>
                  <div class="mb-3 col-sm-6">
                    <input id="pass1" onkeyup="verifPass(this)" class="form-control" type="password" autocomplete="on" placeholder="Confirmar Senha" />
                    <span id="av1" hidden style="color: red;">Senhas não coicidem!</span>
                  </div>
                </div>
                <div class="mb-3">
                  <button id="bt" class="btn btn-primary d-block w-100 mt-3" type="submit" name="submit" disabled>Registrar-se</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <script>
        function number(){
          let n = document.getElementById('Number');
          nn=n.value.length;
          if(nn==0){
            n.value="("+n.value;
          }if(nn==3){
            n.value=n.value+") ";
          }if(nn==6){
            n.value=n.value+" ";
          }if(nn==11){
            n.value=n.value+"-";
          }
        }
        function verifPass(){
          let pass0=document.getElementById('pass0');
          let av0=document.getElementById('av0');
          let pass1=document.getElementById('pass1');
          let av1=document.getElementById('av1');
          let bt=document.getElementById('bt');
          if(pass0.value.length<=4){
            av0.hidden=false;
          }else{
            av0.hidden=true;
            if(pass0.value!=pass1.value){
              av1.hidden=false;
            }else{
              av1.hidden=true;
              bt.disabled=false;
            }
          }
          
        }
      </script>

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0 overflow-hidden light" id="banner">

        <div class="bg-holder overlay" style="background-image:url(./public/assets/img/generic/bg-1.jpg);background-position: center bottom;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row flex-center pt-8 pt-lg-10 pb-lg-9 pb-xl-0">
            <div class="col-md-11 col-lg-8 col-xl-4 pb-7 pb-xl-9 text-center text-xl-start"><img style="width: 30%;" src="./public/assets/img/icons/lampada.png" alt=""><a hidden class="btn btn-outline-danger mb-4 fs--1 border-2 rounded-pill" href="#!"><span class="me-2" role="img" aria-label="Gift">🎁</span>Become a pro</a>
              <h1 class="text-white fw-light">Energia <br>     <span class="typed-text fw-bold" data-typed-text='["renovavel","sustentavel","limpa","inovavel"]'></span><br />você encontra aqui.</h1>
              <p class="lead text-white opacity-75"></p><a hidden class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2" href="#!">Conheça nossos planos<span class="fas fa-play ms-2" data-fa-transform="shrink-6 down-1"></span></a>
            </div>
            <div class="col-xl-7 offset-xl-1 align-self-end mt-4 mt-xl-0"><a class="img-landing-banner rounded" href="https://www.emanuelenergiasustentavel.com.br/projetos.html" target="_blank"><img class="img-fluid" src="./public/assets/img/generic/dashboard-alt.png" alt="" /></a></div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-3 bg-light shadow-sm">

        <div class="container">
          <div class="row flex-center">
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="40" src="./public/assets/img/logos/b&amp;w/6.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="45" src="./public/assets/img/logos/b&amp;w/11.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="30" src="./public/assets/img/logos/b&amp;w/2.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="30" src="./public/assets/img/logos/b&amp;w/4.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="35" src="./public/assets/img/logos/b&amp;w/1.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="40" src="./public/assets/img/logos/b&amp;w/10.png" alt="" /></div>
            <div class="col-3 col-sm-auto my-1 my-sm-3 px-card"><img class="landing-cta-img" height="40" src="./public/assets/img/logos/b&amp;w/12.png" alt="" /></div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section>

        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
              <h1 class="fs-2 fs-sm-4 fs-md-5">Ganhe sem muito esforços.</h1>
              <p class="lead">Aqui você so presisa vender nossos produtos, conhecendo o minimo de energia solar. </p>
            </div>
          </div>
          <div class="row flex-center mt-8">
            <div class="col-md col-lg-5 col-xl-4 ps-lg-6"><img class="img-fluid px-6 px-md-0" src="./public/assets/img/icons/spot-illustrations/50.png" alt="" /></div>
            <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
              <h5 class="text-danger"><span class="far fa-lightbulb me-2"></span>PLANEJAMENTO</h5>
              <h3>Orçamento &amp; Sistema </h3>
              <p>Faça o orçamento do cliente e apresente o melhor sistema voltaico para sua residencia ou comercio.</p>
            </div>
          </div>
          <div class="row flex-center mt-7">
            <div class="col-md col-lg-5 col-xl-4 pe-lg-6 order-md-2"><img class="img-fluid px-6 px-md-0" src="./public/assets/img/icons/spot-illustrations/49.png" alt="" /></div>
            <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
              <h5 class="text-info"> <span class="far fa-object-ungroup me-2"></span>MONTAGEM</h5>
              <h3>Deixe a burocracia com a gente</h3>
              <p>Apenas nos envie toda documentação necessaria para a instalação que nos fazemos o resto para você</p>
            </div>
          </div>
          <div class="row flex-center mt-7">
            <div class="col-md col-lg-5 col-xl-4 ps-lg-6"><img class="img-fluid px-6 px-md-0" src="./public/assets/img/icons/spot-illustrations/48.png" alt="" /></div>
            <div class="col-md col-lg-5 col-xl-4 mt-4 mt-md-0">
              <h5 class="text-success"><span class="far fa-paper-plane me-2"></span>MONITORAMENTO</h5>
              <h3>Revisão &amp; Monitoramento</h3>
              <p>Apos a montagem e satisfação de nossos clientes, damos garantia de 1 ano de bom funcionamento monitorando os nossos sistemas.</p>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-light text-center">

        <div class="container">
          <div class="row">
            <div class="col">
              <h1 class="fs-2 fs-sm-4 fs-md-5">Tipos de sistemas</h1>
              <p class="lead">Aqui nos temos inovação.</p>
            </div>
          </div>
          <div class="row mt-6">
            <div class="col-lg-4">
              <div class="card card-span h-100">
                <div class="card-span-img"><img src="./public/assets/img/icons/ongrid.png" alt=""></div>
                <div class="card-body pt-6 pb-4">
                  <h5 class="mb-2">Sistema OnGrid</h5>
                  <p>Uma geração de paineis inserida diretamente na rede elétrica, transferindo o excesso de energia gerada para a distribuidora e economizando até 95% da conta de luz.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-6 mt-lg-0">
              <div class="card card-span h-100">
                <div class="card-span-img"><img src="./public/assets/img/icons/offgrid.png" alt=""></div>
                <div class="card-body pt-6 pb-4">
                  <h5 class="mb-2">Sistema OffGrid</h5>
                  <p>Esse sistema tem como principal característica o “autossustento”, ou seja, é um sistema não conectado à rede elétrica, que armazena a energia solar excedente em baterias para ser utilizada quando não houver produção.</p>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-6 mt-lg-0">
              <div class="card card-span h-100">
                <div class="card-span-img"><img src="./public/assets/img/icons/bombadagua.png" alt=""></div>
                <div class="card-body pt-6 pb-4">
                  <h5 class="mb-2">Sistema Bomba Solar</h5>
                  <p>Solar Pump System inclui painel fotovoltaico, Electronic Device e AC Motor. Electronic Device é uma combinação de inversor, MPPT e CSC. Ele usa a energia gerada a partir PV e converte na forma exigida para AC Motor. A energia solar que é abundante na terra pode ser aproveitado para esta finalidade</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-200 text-center">

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-9 col-xl-8">
              <div class="swiper-container theme-slider" data-swiper='{"autoplay":true,"spaceBetween":5,"loop":true,"loopedSlides":5,"slideToClickedSlide":true}'>
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <div class="px-5 px-sm-6">
                      <p class="fs-sm-1 fs-md-2 fst-italic text-dark">Falcon is the best option if you are looking for a theme built with Bootstrap. On top of that, Falcon&apos;s creators and support staff are very brilliant and attentive to users&apos; needs.</p>
                      <p class="fs-0 text-600">- Scott Tolinski, Web Developer</p><img class="w-auto mx-auto" src="./public/assets/img/logos/google.png" alt="" height="45" />
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="px-5 px-sm-6">
                      <p class="fs-sm-1 fs-md-2 fst-italic text-dark">We&apos;ve become fanboys! Easy to change the modular design, great dashboard UI, enterprise-class support, fast loading time. What else do you want from a Bootstrap Theme?</p>
                      <p class="fs-0 text-600">- Jeff Escalante, Developer</p><img class="w-auto mx-auto" src="./public/assets/img/logos/netflix.png" alt="" height="30" />
                    </div>
                  </div>
                  <div class="swiper-slide">
                    <div class="px-5 px-sm-6">
                      <p class="fs-sm-1 fs-md-2 fst-italic text-dark">When I first saw Falcon, I was totally blown away by the care taken in the interface. It felt like something that I&apos;d really want to use and something I could see being a true modern replacement to the current class of Bootstrap themes.</p>
                      <p class="fs-0 text-600">- Liam Martens, Designer</p><img class="w-auto mx-auto" src="./public/assets/img/logos/paypal.png" alt="" height="45" />
                    </div>
                  </div>
                </div>
                <div class="swiper-nav">
                  <div class="swiper-button-next swiper-button-white"></div>
                  <div class="swiper-button-prev swiper-button-white"> </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="light">

        <div class="bg-holder overlay" style="background-image:url(./public/assets/img/generic/bg-2.jpg);background-position: center top;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row justify-content-center text-center">
            <div class="col-lg-8">
              <p class="fs-3 fs-sm-4 text-white">Join our community of 20,000+ developers and content creators on their mission to build better sites and apps.</p>
              <button class="btn btn-outline-light border-2 rounded-pill btn-lg mt-4 fs-0 py-2" type="button">Start your webapp</button>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-dark pt-8 pb-4 light">

        <div class="container">
          <div class="position-absolute btn-back-to-top bg-dark"><a class="text-600" href="#banner" data-bs-offset-top="0" data-scroll-to="#banner"><span class="fas fa-chevron-up" data-fa-transform="rotate-45"></span></a></div>
          <div class="row">
            <div class="col-lg-4">
              <h5 class="text-uppercase text-white opacity-85 mb-3">Our Mission</h5>
              <p class="text-600">Falcon enables front end developers to build custom streamlined user interfaces in a matter of hours, while it gives backend developers all the UI elements they need to develop their web app.And it's rich design can be easily integrated with backends whether your app is based on ruby on rails, laravel, express or any other server side system.</p>
              <div class="icon-group mt-4"><a class="icon-item bg-white text-facebook" href="#!"><span class="fab fa-facebook-f"></span></a><a class="icon-item bg-white text-twitter" href="#!"><span class="fab fa-twitter"></span></a><a class="icon-item bg-white text-google-plus" href="#!"><span class="fab fa-google-plus-g"></span></a><a class="icon-item bg-white text-linkedin" href="#!"><span class="fab fa-linkedin-in"></span></a><a class="icon-item bg-white" href="#!"><span class="fab fa-medium-m"></span></a></div>
            </div>
            <div class="col ps-lg-6 ps-xl-8">
              <div class="row mt-5 mt-lg-0">
                <div class="col-6 col-md-3">
                  <h5 class="text-uppercase text-white opacity-85 mb-3">Company</h5>
                  <ul class="list-unstyled">
                    <li class="mb-1"><a class="link-600" href="./public/sobrenos/">About</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Contact</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Careers</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Blog</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Terms</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Privacy</a></li>
                    <li><a class="link-600" href="#!">Imprint</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-3">
                  <h5 class="text-uppercase text-white opacity-85 mb-3">Product</h5>
                  <ul class="list-unstyled">
                    <li class="mb-1"><a class="link-600" href="#!">Features</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Roadmap</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Changelog</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Pricing</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Docs</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">System Status</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Agencies</a></li>
                    <li class="mb-1"><a class="link-600" href="#!">Enterprise</a></li>
                  </ul>
                </div>
                <div class="col mt-5 mt-md-0">
                  <h5 class="text-uppercase text-white opacity-85 mb-3">From the Blog</h5>
                  <ul class="list-unstyled">
                    <li>
                      <h5 class="fs-0 mb-0"><a class="link-600" href="#!"> Interactive graphs and charts</a></h5>
                      <p class="text-600 opacity-50">Jan 15 &bull; 8min read </p>
                    </li>
                    <li>
                      <h5 class="fs-0 mb-0"><a class="link-600" href="#!"> Lifetime free updates</a></h5>
                      <p class="text-600 opacity-50">Jan 5 &bull; 3min read &starf;</p>
                    </li>
                    <li>
                      <h5 class="fs-0 mb-0"><a class="link-600" href="#!"> Merry Christmas From us</a></h5>
                      <p class="text-600 opacity-50">Dec 25 &bull; 2min read</p>
                    </li>
                    <li>
                      <h5 class="fs-0 mb-0"><a class="link-600" href="#!"> The New Falcon Theme</a></h5>
                      <p class="text-600 opacity-50">Dec 23 &bull; 10min read </p>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->




      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0 bg-dark light">

        <div>
          <hr class="my-0 text-600 opacity-25" />
          <div class="container py-3">
            <div class="row justify-content-between fs--1">
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600 opacity-85">Thank you for creating with Falcon <span class="d-none d-sm-inline-block">| </span><br class="d-sm-none" /> 2022 &copy; <a class="text-white opacity-85" href="https://themewagon.com">Themewagon</a></p>
              </div>
              <div class="col-12 col-sm-auto text-center">
                <p class="mb-0 text-600 opacity-85">v3.9.0</p>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <div class="modal fade" id="authentication-modal" tabindex="-1" role="dialog" aria-labelledby="authentication-modal-label" aria-hidden="true">
        <div class="modal-dialog mt-6" role="document">
          <div class="modal-content border-0">
            <div class="modal-header px-5 position-relative modal-shape-header bg-shape">
              <div class="position-relative z-index-1 light">
                <h4 class="mb-0 text-white" id="authentication-modal-label">Registrar-se</h4>
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
                  <button class="btn btn-primary d-block w-100 mt-3" type="submit">Registrar-se</button>
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
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->
                  

    


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="./public/vendors/popper/popper.min.js"></script>
    <script src="./public/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="./public/vendors/anchorjs/anchor.min.js"></script>
    <script src="./public/vendors/is/is.min.js"></script>
    <script src="./public/vendors/swiper/swiper-bundle.min.js"> </script>
    <script src="./public/vendors/typed.js/typed.js"></script>
    <script src="./public/vendors/fontawesome/all.min.js"></script>
    <script src="./public/vendors/lodash/lodash.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="./public/vendors/list.js/list.min.js"></script>
    <script src="./public/assets/js/theme.js"></script>

  </body>

</html>