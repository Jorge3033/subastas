<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Aroma Shop - Home</title>
  <link rel="icon" href="img/Fevicon.png" type="image/png">
  <link rel="stylesheet" href="vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="vendors/nice-select/nice-select.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">

  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <!--================ Start Header Menu Area =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="/"><img src="img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active"><a class="nav-link" href="/">Home</a></li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Comprar</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="#">Categorias</a></li>
                  <li class="nav-item"><a class="nav-link" href="cart.html">Carrito</a></li>
                </ul>
              </li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Blog</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Acerca de</a></li>
                </ul>
              </li>
              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Mi cuenta</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="#">Login</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Register</a></li>
                  <li class="nav-item"><a class="nav-link" href="#">Perfil</a></li>
                </ul>
              </li>
              <li class="nav-item"><a class="nav-link" href="#">Contacto</a></li>
            </ul>

            <ul class="nav-shop">
              <li class="nav-item">
                  <input type="search" name="searchBar" class="btn btn-light" placeholder="Buscar">
                  <button type="submit" ><i class="ti-search"></i></button>
              </li>
              <li class="nav-item"><button><i class="ti-shopping-cart"></i><span class="nav-shop__circle">3</span></button> </li>
              <li class="nav-item"><a class="button button-header" href="#">Buy Now</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>
  <!--================ End Header Menu Area =================-->


  @yield('secitonPage')

  
  <!-- ================ Subscribe section start ================= --> 
    <section class="subscribe-position">
      <div class="container">
        <div class="subscribe text-center">
          <h3 class="subscribe__title">Tienes Dudas?</h3>
          <p>Envianos un correo </p>
          <div id="mc_embed_signup">
            <form target="_blank" action="" method="get" class="subscribe-form form-inline mt-5 pt-1">
              <div class="form-group ml-sm-auto">
                <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Escribe tu correo" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Escribe tu correo '" >
                <div class="info"></div>
              </div>
              <button class="button button-subscribe mr-auto mb-1" type="submit">Contactanos</button>
              <div style="position: absolute; left: -5000px;">
                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
              </div>

            </form>
          </div>
          
        </div>
      </div>
    </section>
    <!-- ================ Subscribe section end ================= --> 

  <!--================ Start footer Area  =================-->  
  <footer class="footer">
    <div class="footer-area">
      <div class="container">
        <div class="row section_gap">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="single-footer-widget tp_widgets">
              <h4 class="footer_title large_title">Mission</h4>
              <p>
                Mision 1
              </p>
              <p>
                Mision 2
              </p>
            </div>
          </div>
          <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
            <div class="single-footer-widget tp_widgets">
              <h4 class="footer_title">Accesos Rápidos</h4>
              <ul class="list">
                <li><a href="/">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Product</a></li>
                <li><a href="#">Brand</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6">
            <div class="single-footer-widget instafeed">
              <h4 class="footer_title">Gallery</h4>
              <ul class="list instafeed d-flex flex-wrap">
                <li><img src="img/gallery/r1.jpg" alt=""></li>
                <li><img src="img/gallery/r2.jpg" alt=""></li>
                <li><img src="img/gallery/r3.jpg" alt=""></li>
                <li><img src="img/gallery/r5.jpg" alt=""></li>
                <li><img src="img/gallery/r7.jpg" alt=""></li>
                <li><img src="img/gallery/r8.jpg" alt=""></li>
              </ul>
            </div>
          </div>
          <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
            <div class="single-footer-widget tp_widgets">
              <h4 class="footer_title">Contacto</h4>
              <div class="ml-40">
                <p class="sm-head">
                  <a href="#" style="color: #FFFFFF">
                  <span class="fa fa-location-arrow"></span>
                  Oficinas
                  </a>
                </p>
                <p><a href="#" style="color: #ABA8A8" >Dirrecion</a></p>
  
                <p class="sm-head">
                  <span class="fa fa-phone"></span>
                  Telefonos de Contacto
                </p>
                <p>
                  +52 7225518177 <br>
                  +52 7777777777 
                </p>
  
                <p class="sm-head">
                  <span class="fa fa-envelope"></span>
                  Correo
                </p>
                <p>
                  gmrCompany@atencion.com <br>
                  www.infogmrcompany
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">
        <div class="row d-flex">
          <p class="col-lg-12 footer-text text-center">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="#" target="_blank">GMR  Company</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
        </div>
      </div>
    </div>
  </footer>
  <!--================ End footer Area  =================-->



  <script src="vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="vendors/skrollr.min.js"></script>
  <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="vendors/jquery.ajaxchimp.min.js"></script>
  <script src="vendors/mail-script.js"></script>
  <script src="js/main.js"></script>
</body>
</html>