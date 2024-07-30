<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
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

    <div class="container mt-5">
        <h2 class="text-center">Iniciar Sesión</h2>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="username">Nombre de usuario</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mb-5">Iniciar Sesión</button>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        function setCookie(name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        }

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

        function login(event) {
            event.preventDefault(); 
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;

            // Validar entrada
            if (!validateInput(username) || !validateInput(password)) {
                alert('Entrada inválida');
                return;
            }

            setCookie('logged_in', 'true', 1); 
            alert('Inicio de sesión exitoso');
            window.location.href = 'index.php'; 
        }

        function logout() {
            setCookie('logged_in', '', -1);
            checkLogin();
            alert('Has cerrado sesión correctamente.');
        }

        function validateInput(input) {
            var regex = /^[a-zA-Z0-9]+$/;
            return regex.test(input);
        }

        window.onload = checkLogin;
    </script>
</html>