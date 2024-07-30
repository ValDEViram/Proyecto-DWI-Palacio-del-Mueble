<?php
  require 'config/database.php';
  require 'config/config.php';
  $db = new Database();
  $con = $db->conectar();

  $id = isset($_GET['id']) ? $_GET['id'] : '';
  $token = isset($_GET['token']) ? $_GET['token'] : '';

  if ($id== '' || $token == ''){
      echo 'Error al procesar la petición';
      exit;
  }else{

        $token_tmp = hash_hmac('sha1',$id, KEY_TOKEN);

        if($token == $token_tmp){

            $sql = $con->prepare("SELECT count(id) FROM productos WHERE id=? AND activo=1");
            $sql->execute([$id]);
            if ($sql->fetchColumn()>0){
                
                $sql = $con->prepare("SELECT * FROM productos WHERE id=? AND activo=1");
                $sql->execute([$id]);
                $row = $sql->fetch(PDO::FETCH_ASSOC);
                $nombre = $row['nombre'];
                $descripcion = $row['descripcion'];
                $precio = $row['precio'];
                $descuento = $row['descuento'];

                $precio_desc = $precio - (($precio * $descuento) / 100);
                $dir_images = 'assets/img/productos/'. $id .'/';

                $rutaImg = $dir_images. 'principal2.jpg';
                
                if (!file_exists($rutaImg)){
                    $rutaImg = 'assets/img/productos/no-photo.jpg';
                }
                else
                {
                    $imagenes = array();
                    $dir = dir($dir_images);
                    
                    while(($archivo = $dir->read()) != false)
                    {
                        if($archivo != 'principal2.jpg' && (strpos($archivo,'jpg') || strpos($archivo,'jepg')))
                        {                           
                            $imagenes[] = $dir_images . $archivo;
                        } 
                    }
                    $dir->close();
                }

            }         

        }else{
            echo "Error! Token Incorrecto! ";
            exit;
        }
      
  }
  
  $sql = $con->prepare("SELECT * FROM productos WHERE activo=1");
  $sql->execute();
  $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pricing - Eterna Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
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
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Eterna - v4.7.0
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
   <!--paypal--><script src = "https://www.paypal.com/sdk/js?client-id=AUqjpRO1dFFL-jBYV3P23jjmw9wBy4ga6VzNh7TEaruXOyp9Mbquy9lnG40V0_Gj9ZS-t4WgphCJAGim&currency=MXN"></script>
</head>

<body>

  <!-- ======= Header ======= -->
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
        <div class="col-2">
          <h2 class="mb-0 site-logo"><a href="index.php" class="font-weight-bold text-uppercase">Palacio del Mueble</a></h2>
        </div>
        <div class="col-10">
          <nav class="site-navigation text-right" role="navigation">
            <div class="container">
              <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active"><a href="index.php">Home</a></li>
                <li><a href="mascota.php">Mascotas</a></li>
          <li><a href="cocina.php">Cocina</a></li>                    
          <li><a href="iluminacion.php">Iluminacion</a></li>    
          <li><a href="contact.php">Contacto</a></li>

      <span> &nbsp|&nbsp </span>
      <a href="checkout.php" class="d-inline-block bg-primary text-white btn btn-primary">
        Carrito &nbsp 
      </a>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

  <main id="main">


<br>
<br>
<br>
    <!-- ======= Producto Detalle ======= -->

    <?php ?>
    <main>
      <div class="container">

          <div class="row mb-3">
              <!-- Inicio Columna de Carrusel de Imágenes -->  
                <div class="col-md-6 order-md-1"> 
                
                    <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                          <div class="carousel-item active">
                              <img src="<?php echo $rutaImg; ?>" class="d-block w-100" alt="...">
                          </div>
                         
                          <?php foreach($imagenes as $img){ ?>
                              <div class="carousel-item">                                 
                                 
                                  <img src="<?php echo $img; ?>" class="d-block w-100">
                                  
                              </div>
                          <?php }?>
                        
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselImages" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselImages" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>

                </div>
                <!-- Fin Columna de Carrusel de Imágenes --> 

                <div class="col-md-6 order-md-2 text-center" >
                    <h1><?php echo $nombre?></h2>

                    
                    <?php if ($descuento >0){ ?>      
                        <h4 style="color:brown;"><del> <b>Precio: </b>$<?php echo number_format($precio,2,'.',',')?></del> </h2>
                        <h4 class="text-danger"><b>Descuento: </b><?php echo number_format($descuento,2,'.',',')?>% </h2>
                        <h2 style="color:brown;"><b>Total: </b>$<?php echo number_format($precio_desc,2,'.',',')?> </h2>
                    <?php } else{ ?>
                      <h2 style="color:brown;"><b>Precio: </b>   $<?php echo number_format($precio,2,'.',',')?> </h2>
                    <?php } ?>

                    <p class="lead"><?php echo $descripcion?></p>
                    <div class="d-grid gap-3 col-10 mx-auto">
                    <button class="btn btn-outline-warning" type="button" onclick="addProducto( <?php echo $id; ?>, '<?php echo $token_tmp; ?>' )">AÑADIR A CARRITO</button>
                    <div id="paypal-button-container"></div>    
                    <script>
                      paypal.Buttons({
                        createOrder: function(data, actions){
                        return actions.order.create({
                          purchase_units:[{
                            amount:{
                              value: 399
                            }
                          }]
                        });
                    },
                    onApprove: function(data, actions){
                      actions.order.capture().then(function (detalles){
                        window.location.href="index.php"
                      });
                    },
                    onCancel: function(data){
                      alert("Pago cancelado");
                      console.log(data);
                    }
                      }).render('#paypal-button-container');
                    </script>
                        
                    </div>

                </div>
          </div>

      </div>
    </main>
   

  </main><!-- End #main -->
  <br>
<br>
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

  <script src="js/main.js"></script><!-- End Footer -->

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