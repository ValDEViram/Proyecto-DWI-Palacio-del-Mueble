<!DOCTYPE html>
<html lang="en">
<?php
require 'config/config.php';
?>

<head>
<title>Palacio del Mueble</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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
    <script>
        // Función para establecer una cookie
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

        // Función para obtener una cookie
        function getCookie(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
            }
            return null;
        }

        // Función para verificar si el usuario está logueado y actualizar el menú
        function checkLogin() {
            var loggedIn = getCookie('logged_in');
            if (loggedIn) {
                document.getElementById('login-menu').style.display = 'none';
                document.getElementById('logout-menu').style.display = 'block';
            } else {
                document.getElementById('login-menu').style.display = 'block';
                document.getElementById('logout-menu').style.display = 'none';
            }
        }

        // Llamar a la función checkLogin al cargar la página
        window.onload = checkLogin;
    </script>
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
                  <a class="nav-link" href="linicio.php">Iniciar sesión</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="registrar.php">Registrarse</a>
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

  <div class="slide-one-item home-slider owl-carousel">
      
      <div class="site-blocks-cover inner-page overlay" style="background-image: url(images/imgD&H.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-6 text-center" data-aos="fade">
              <h1 class="font-secondary  font-weight-bold text-uppercase">Diseño & Hogar</h1>
            </div>
          </div>
        </div>
      </div>  

      <div class="site-blocks-cover inner-page overlay" style="background-image: url(images/imgD&M.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1 class="font-secondary font-weight-bold text-uppercase">Decoracion & Mas</h1>
            </div>
          </div>
        </div>
      </div> 
    </div>

    <br>
    <br>

    
  <div class="site-half">
    <div class="img-bg-1" style="background-image: url('images/Nuevomueble.png');" data-aos="fade"></div>
    <div class="container">
      <div class="row no-gutters align-items-stretch">
        <div class="col-lg-5 ml-lg-auto py-5">
          <span class="caption d-block mb-2 font-secondary font-weight-bold">Nuevo en Muebles</span>
          <h2 class="site-section-heading text-uppercase font-secondary mb-5">SALA CHAD DER</h2>
          <p> <strong>Informacion del producto</strong> 
            Sala Chad derecha "DER" diseñada en un acabado nogal con tela color café de (296 x 232 cm de largo) x 100 cm de ancho x 85 cm de alto, fabricado en tela poli piel y vinil..</p>

          <p><strong>POLÍTICA DE ENVÍO:</strong>


            El tiempo de entrega es de 5 a 8 días hábiles.
            
            El servicio de paquetería entrega únicamente en primer piso, de lo contrario pregunta por el costo adicional. 
            
            Los muebles se envían desarmados. Incluye instructivo y tornillería, contáctanos si deseas asesoría en el armado.</p>  
        </div>
      </div>
    </div>
  </div>

  <div class="site-half block">
    <div class="img-bg-1 right" style="background-image: url('images/Nuevococina.png');" data-aos="fade"></div>
    <div class="container">
      <div class="row no-gutters align-items-stretch">
        <div class="col-lg-5 mr-lg-auto py-5">
          <span class="caption d-block mb-2 font-secondary font-weight-bold">Nuevo en Cocinas</span>
          <h2 class="site-section-heading text-uppercase font-secondary mb-5">Comedor Campeche </h2>
          <p><strong>Informacion del producto:</strong> 
            
Comedor campeche para 6 personas.

Fabricado en mdf y patas de acero.

Este comedor completo incluye:

Mesa: 120 x 75 x 75 cm
Banco: 47 x 40 x 90 cm
Silla: 33 x 98 x 45 cm
Ideal para el comedor de tu hogar.</p>

          <p><strong>Politica de Envio:</strong>
            El tiempo de entrega es de 5 a 8 días hábiles.

El servicio de paquetería entrega únicamente en primer piso, de lo contrario pregunta por el costo adicional. 

Los muebles se envían desarmados. Incluye instructivo y tornillería, contáctanos si deseas asesoría en el armado.</p>  
        </div>
      </div>
    </div>
  </div>
    

  <div class="site-section ">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <span class="caption d-block mb-2 font-secondary font-weight-bold">Productos &amp; Catalogos</span>
            <h2 id="catalogo" class="site-section-heading text-uppercase text-center font-secondary">CATALOGOS</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 block-13 nav-direction-white">
            <div class="nonloop-block-13 owl-carousel">
              
              
              <div class="media-image">
                <img src="images/imagen iluminacion catalogo2.jpg" alt="Image" class="img-fluid">
                <div class="media-image-body">
                  <h2 class="font-secondary text-uppercase">Iluminacion</h2>
                  <p><strong>COMPRAR AHORA</strong></p>
                  <p><a href="iluminacion.php" class="btn btn-primary text-white px-4">Ver Catalogo</a></p>
                </div>
              </div>
              <div class="media-image">
                <img src="images/imagen cocina catalogo1.jpg" alt="Image" class="img-fluid">
                <div class="media-image-body">
                  <h2 class="font-secondary text-uppercase">Cocina</h2>
                  <p><strong>COMPRAR AHORA</strong></p>
                  <p><a href="cocina.php" class="btn btn-primary text-white px-4">Ver Catalogo</a></p>
                </div>
              </div>
              
              <div class="media-image">
                <img src="images/imagen para tu mascota catalogo3.jpg" alt="Image" class="img-fluid">
                <div class="media-image-body">
                  <h2 class="font-secondary text-uppercase">Para tu Mascota</h2>
                  <p><strong>COMPRAR AHORA</strong></p>
                  <p><a href="mascota.php" class="btn btn-primary text-white px-4">Ver Catalogo</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    

    
    <div class="site-section section-counter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <p class="mb-5"><img src="images/productomasvendido.jpg" alt="Image" class="img-fluid"></p>
          </div>
          <div class="col-lg-5 ml-auto">
            <h2 class="site-section-heading mb-3 font-secondary text-uppercase">El producto de hogar mas vendido</h2>
            <p class="mb-5">DIVAN MICHIGAN BRAZO DER</p>
            <p><strong>Informacion del producto:</strong>
               Ideal para tu hogar, hace juego con esquinero michigan, sillón michigan y love seat michigan. Se venden por separado.</p>

            <div class="row">
              <div class="col-lg-6">
                <div class="counter">
                  <span class="caption">Ventas</span>
                  <br>
                  <br>
                  <span class="number" data-number="49020">0</span>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="counter">
                  <span class="caption">nuestros clientes lo prefieren.</span>
                  <span class="number" data-number="20075">0</span>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>

    
    <div class="site-section block-14 nav-direction-white">

      <div class="container">
        
        <div class="row mb-5">
          <div class="col-md-12">
            <h2 class="site-section-heading text-center text-uppercase">Testimonios de clientes satisfecho</h2>
          </div>
        </div>

        <div class="nonloop-block-14 owl-carousel">
          

            <div class="d-block block-testimony mx-auto text-center">
              <div class="person w-25 mx-auto mb-4">
                <img src="images/person_1.jpg" alt="Image" class="img-fluid rounded-circle w-25 mx-auto">
              </div>
              <div>
                <h2 class="h5 mb-4">Sebastian Zarco</h2>
                <blockquote>&ldquo;"Los productos mencionados son de muy buena calidad llevo años comprando en esta pagina y es excelente en el mercado."&rdquo;</blockquote>
              </div>
            </div>

            <div class="d-block block-testimony mx-auto text-center">
              <div class="person w-25 mx-auto mb-4">
                <img src="images/person_2.jpg" alt="Image" class="img-fluid rounded-circle w-25 mx-auto">
              </div>
              <div>
                <h2 class="h5 mb-4">Mike Ortiz</h2>
                <blockquote>&ldquo;"tiene un excelente servicio al cliente & me ayudaron con mis compras para mi hogar."&rdquo;</blockquote>
              </div>
            </div>

            <div class="d-block block-testimony mx-auto text-center">
              <div class="person w-25 mx-auto mb-4">
                <img src="images/person_3.jpg" alt="Image" class="img-fluid rounded-circle w-25 mx-auto">
              </div>
              <div>
                <h2 class="h5 mb-4">Francisco Villa</h2>
                <blockquote>&ldquo;"La mejor compra que he hecho tiene los productos que encontraba."&rdquo;</blockquote>
              </div>
            </div>

            <div class="d-block block-testimony mx-auto text-center">
              <div class="person w-25 mx-auto mb-4">
                <img src="images/person_4.jpg" alt="Image" class="img-fluid rounded-circle w-25 mx-auto">
              </div>
              <div>
                <h2 class="h5 mb-4">Mark Leniss</h2>
                <blockquote>&ldquo;"Tiene productos exportados de Italia & Japon sin duda la mejor opcion."&rdquo;</blockquote>
              </div>
            </div>

        </div>

      </div>
      
    </div>

    <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12" data-aos="fade">
            <h2 class="site-section-heading text-center text-uppercase">Marcas Asociadas & Diseñadores a "PALACIO DEL MUEBLE."</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="100">
            <div class="media-image">
              <a href="single.html"><img src="images/compañia socia 1.jpg" alt="Image" class="img-fluid"></a>
              <div class="media-image-body">
                <h2 class="font-secondary text-uppercase"><a href="single.html">Louis Deniot</a></h2>
                <span class="d-block mb-3">Jean-Louis Deniot &mdash; @JLDeniot / Twitter</span>
                <p>con su particular estilo, está considerado una de las promesas de futuro del diseño de interiores francés.</p>

              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="200">
            <div class="media-image">
              <a href="single.html"><img src="images/compañia socia 2.jpg" alt="Image" class="img-fluid"></a>
              <div class="media-image-body">
                <br>
                <br>
                <br>
              
                <h2 class="font-secondary text-uppercase"><a href="single.html">Marcel Wanders</a></h2>
                <span class="d-block mb-3">Marcel Wanders &mdash; 1963, Boxtel, Brabante Septentrional, Países Bajos</span>
                <p>es un diseñador holandés que está abogando por un pensamiento más romántico y humanista dentro del mundo del diseño.</p>
             
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-5" data-aos="fade-up" data-aos-delay="300">
            <div class="media-image">
              <a href="single.html"><img src="images/compañia socia 3.jpeg" alt="Image" class="img-fluid"></a>
              <div class="media-image-body">
                <h2 class="font-secondary text-uppercase"><a href="single.html">Ralph Starck</a></h2>
                <span class="d-block mb-3">Philippe Starck &mdash; París, 1949</span>
                <p>Este es uno de los diseñadores más famosos en la lista por tener una trayectoria inigualable en el mundo del diseño de mobiliario e interiorismo.</p>
            
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="py-5 bg-primary">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6 text-center mb-3 mb-md-0">
            <h2 class="text-uppercase text-white mb-4" data-aos="fade-up">Para Mayor Informacion</h2>
            <a href="contact.php" class="btn btn-bg-primary font-secondary text-uppercase" data-aos="fade-up" data-aos-delay="100">Contactanos</a>
          </div>
        </div>
      </div>
    </div>


    

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
            <i class="icon-heart text-danger" aria-hidden="true"></i> <a href="index.php" target="_blank" >PALACIO DEL MUEBLE</a>
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
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>
  <script>
      function logout() {
          fetch('logout.php')
              .then(response => {
                  if (response.ok) {
                      window.location.reload();
                  } else {
                      alert('Error al cerrar sesión.');
                  }
              })
              .catch(error => {
                  console.error('Error:', error);
              });
      }
  </script>

</body>

</html>