<?php
  require 'config/database.php';
  require 'config/config.php';

  $db = new Database();
  $con = $db->conectar();
  
  $productos = isset($_SESSION['carrito']['productos']) ? $_SESSION['carrito']['productos'] : null;
  
  $lista_carrito = array(); //Creación de arreglo para almancenar N productos
  if($productos != null) //Si carrito no está vacío
  {
        foreach ( $productos as $clave => $cantidad )
        {
            $sql = $con->prepare("SELECT *, $cantidad AS cantidad FROM productos WHERE id=? AND activo=1 ");
            $sql->execute([$clave]);
            $lista_carrito[] = $sql->fetch(PDO::FETCH_ASSOC);
        }
  }

?>


<!DOCTYPE html>
<html lang="en">

<head>
<title>Palacio del Mueble</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
<!--paypal--><script src = "https://www.paypal.com/sdk/js?client-id=AUqjpRO1dFFL-jBYV3P23jjmw9wBy4ga6VzNh7TEaruXOyp9Mbquy9lnG40V0_Gj9ZS-t4WgphCJAGim&currency=MXN"></script>
</head>
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

  <main id="main">

<br>
<br>
<br>
<br>

   <div class="container">
       <div class="table-responsive">
           <table class="table">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                    <tbody>
                        <?php
                            if ($lista_carrito == null){
                                echo '<tr> <td colspan="5" class="text-center"><b>Lista Vacía </b></td> </tr>';
                            }
                            else{
                                
                                    $total= 0;
                                    foreach ($lista_carrito as $fila)
                                    {
                                            $_id =       $fila['id'];
                                            $nombre =    $fila['nombre'];
                                            $precio =    $fila['precio'];
                                            $descuento = $fila['descuento'];
                                            $cantidad = $fila['cantidad'];
                                            $precio_desc = $precio - (($precio * $descuento) / 100);
                                            $subtotal = $cantidad * $precio_desc;
                                            $total = $total + $subtotal;
                                    ?>

                                    <tr>
                                        <td>  <?php echo $nombre; ?> </td>
                                        <td> $<?php echo number_format($precio_desc,2,'.',','); ?> </td>
                                        <td> 
                                            <input type="number" min="1" max="10" step="1" value="<?php echo $cantidad; ?>" size="5" id=cantidad_<?php echo $_id; ?> onchange="actualizarCantidad( this.value, <?php echo $_id; ?> )" >    
                                        </td>
                                        <td> 
                                            <div id="subtotal_<?php echo $_id; ?>" name="subtotal[]">
                                                $<?php echo number_format($subtotal,2,'.',','); ?>
                                            </div>
                                        </td> 
                                        <td>
                                            <a href="#" id="eliminar" class="btn btn-outline-danger btn-sm" data-bs-id="<?php echo $_id; ?>" data-bs-toggle="modal" data-bs-target="#eliminaModal"> Eliminar </a>
                                        </td>                                       
                                    </tr>

                        <?php
                                    }                                
                        ?>  
                    
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">
                                            <p class="h3" id="total">
                                                $<?php echo number_format($total,2,'.',','); ?>
                                            </p>
                                        </td>
                                    </tr>
                </tbody>

                    <?php
                            }                                
                        ?> 
                </thead>
           </table>
       </div>

       <div class="row mb-3">
           <div class="col-md-6 offset-md-6 d-grid gap-2">
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

  </main><!-- End #main -->


  <!-- Modal para Eliminar -->
<div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminaModalLabel">Advertencia</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Desea Eliminar el Producto del Carrito?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal"> Cancelar </button>
        <button id="btn-elimina" type="button" class="btn btn-outline-danger" onclick="eliminar()"> Eliminar </button>
      </div>
    </div>
  </div>
</div>

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

  <script src="js/main.js"></script>

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


    let eliminaModal = document.getElementById('eliminaModal');
    eliminaModal.addEventListener('show.bs.modal', function(event){
        let button = event.relatedTarget;
        let id = button.getAttribute('data-bs-id');
        let buttonElimina = eliminaModal.querySelector('.modal-footer #btn-elimina');
        buttonElimina.value = id;
    })
    
    function actualizarCantidad(cantidad, id)
    {
        let url = 'clases/actualizar_carrito.php';
        let formData = new FormData();
        formData.append('action', 'agregar');
        formData.append('id', id);
        formData.append('cantidad', cantidad);

        fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
        .then(data => {
          if(data.ok){

              let divsubtotal = document.getElementById('subtotal_' + id);
              divsubtotal.innerHTML = data.sub;

              let total = 0.00;
              let list = document.getElementsByName('subtotal[]');

              for (let i=0; i<list.length; i++)
              {
                  total = total + parseFloat(list[i].innerHTML.replace(/[$,]/g, ''));
              }

              total = new Intl.NumberFormat('en-US',{
                minimumFractionDigits: 2
              }).format(total);

              document.getElementById('total').innerHTML = '$' + total;

          }
        })
    }


    function eliminar()
    {
        let botonElimina = document.getElementById ('btn-elimina');
        let id = botonElimina.value;

        let url = 'clases/actualizar_carrito.php';
        let formData = new FormData();
        formData.append('action', 'eliminar');
        formData.append('id', id);
 
        fetch(url, {
          method: 'POST',
          body: formData,
          mode: 'cors'
        }).then(response => response.json())
        .then(data => {
          if(data.ok)
          {
              location.reload();
          }
        })
    }
  </script>

</body>

</html>