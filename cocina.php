<?php
  require 'config/database.php';
  require 'config/config.php';

  $db = new Database();
  $con = $db->conectar();
  
  $sql = $con->prepare("SELECT * FROM productos WHERE id_categoria=4");
  $sql->execute();
  $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
<title>Palacio del Mueble</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="site-wrap">

    

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    

  <!-- ======= Header ======= -->
  <div class="site-navbar-wrap js-site-navbar bg-white">
      
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="row align-items-center">
            <div class="col-4">
              <h2 class="mb-0 site-logo"><a href="index.php" class="font-weight-bold text-uppercase">Palacio del Mueble</a></h2>
            </div>
            <div class="col-8">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">
                  <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                  <ul class="site-menu js-clone-nav d-none d-lg-block">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="mascota.php">Mascotas</a></li>
          <li><a href="cocina.php">Cocina</a></li>                    
          <li><a href="iluminacion.php">Iluminacion</a></li>  
          <li><a href="mascota.php">MASCOTAS</a></li>    
          <li><a href="contact.php">Contacto</a></li>

          <span> &nbsp|&nbsp </span>

          <?php if (isset($_SESSION['user_id'])): ?>
              <li class="nav-item">
                  <a class="nav-link" href="#">Hola, <?php echo htmlspecialchars($_SESSION['username']); ?></a>
              </li>
              <li>
                <a href="checkout.php" class="d-inline-block bg-primary text-white btn btn-primary">
                  Carrito &nbsp   
                </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#" onclick="logout()">Cerrar sesión</a>
              </li>
          <?php else: ?>
              <li class="nav-item">
                  <a class="nav-link" href="login.html">Iniciar sesión</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="register.html">Registrarse</a>
              </li>
          <?php endif; ?>

          
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-blocks-cover inner-page overlay" style="background-image: url(images/bannerCocina.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="row align-items-center justify-content-center">
        <div class="col-md-5 text-center" data-aos="fade">
          <h1 class="text-uppercase">Cocina</h1>
          <span class="caption d-block text-white">Los Mejores Productos<a href="#">Palacio de Mueble</a></span>
        </div>
      </div>
    </div> 
  </header><!-- End Header -->
<br>
<br>
  <main id="main">


    <!-- ======= Productos Section ======= -->
    <div class="row">
    <?php foreach($resultado as $row) { 
        $id = $row['id'];
        $imagen = "assets/img/productos/" . $id . "/principal2.jpg";

        if(!file_exists($imagen)) {
            $imagen = "assets/img/productos/no-photo.jpg";
        }
    ?>
        <div class="col-md-4 mb-5">
            <div class="media-image">
                <a href="details.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>">
                    <img src="<?php echo $imagen ?>" class="img-fluid" alt="Image">
                </a>
                <div class="media-image-body">
                    <h2 class="font-secondary text-uppercase"><?php echo $row['nombre'] ?></h2>
                    <span class="d-block mb-3"><?php echo number_format($row['precio'], 2, '.', ',') ?> <span>MXN</span></span>
                    
                    <br>
                    <p>
                        <a href="details.php?id=<?php echo $row['id']; ?>&token=<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>" class="btn btn-primary text-white px-4">Detalles</a>
                        <a class="btn btn-primary text-white px-4" type="button" onclick="addProducto(<?php echo $row['id']; ?>, '<?php echo hash_hmac('sha1', $row['id'], KEY_TOKEN); ?>')">AÑADIR</a>
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>
</div><!-- End Pricing Section -->

  </main><!-- End #main -->
<br>
<br>
  <footer class="site-footer bg-dark">
      <div class="container">
        

        <div class="row">
          <div class="col-md-5 mb-6 mb-md-0">
            <h3 class="footer-heading mb-4 text-white">La Vision de Palacio de Mueble</h3>
            <p>Es darle a todas las familias mexicanas el mejor lugar para relizar sus compras para el hogar & diseñarlas al agrado de cada familia para su comodidad.</p>
          
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14926366.212089406!2d-121.50878906250001!3d24.026396666017327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x869bb79549f3bd9b%3A0x19f117f075be4f31!2sEl%20Palacio%20Del%20Mueble!5e0!3m2!1ses-419!2smx!4v1659143980430!5m2!1ses-419!2smx" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

          </div>


          <div class="col-md-7">
            <div class="row mb-6">
              
              <div class="col-md-3">
                <h3 class="footer-heading mb-8 text-white">Menu Rapido</h3>
                  <ul class="list-unstyled">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="mascota.php">MASCOTAS</a></li> 
                    <li><a href="iluminacion.php">ILUMINACION</a></li>
                    <li><a href="cocina.php">COCINA</a></li>
                  </ul>
              </div>
              <div class="col-md-6">
                <h3 class="footer-heading mb-2 text-white">Contacto Palacio del Mueble</h3>
                  <ul class="list-unstyled">
                    <li><strong>Horario Tienda:</strong> 9:00am a 9:00pm</li>
                   
                    <li><strong>Telefono:</strong>449 370 3498</li>
                    <li><strong>Whatsapp:</strong>449 212 9994 </li>
                    <li><strong>Horario de Atencion:</strong> Lun-Vie 9:00 am a 5:00 pm </li>
                  </ul>
              </div>
            </div>



          <br>
          <div class="col-md-4">
            
            <div class="row">

          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
             &copy;<script>document.write(new Date().getFullYear());</script> Palacio del Mueble |  Muebles | Textiles | Decoración
            Empresa 100% Mexicana  | 
            <p>Los precios publicados en este sitio web, catálogo digital, así como en cualquier otro medio, son sujetos a cambio sin previo aviso y se encuentran en pesos mexicanos.</p>
            <i class="icon-heart text-danger" aria-hidden="true"></i> <a href="index.html" target="_blank" >PALACIO DEL MUEBLE</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>

            
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>

  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
    
    function addProducto(id, token){
        let url = 'clases/carrito.php';
        let formData = new FormData();
        formData.append('id', id);
        formData.append('token', token);

        fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
        .then(data => {
          if(data.ok){
             let elemento = document.getElementById("num_cart");
             elemento.innerHTML = data.numero;
          }
        })
    }
  </script>

</body>

</html>