<?php
session_start(); // Inicia la sesión si aún no se ha iniciado

// Verifica si los datos del formulario se enviaron mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    // Establece la conexión con la base de datos utilizando MySQLi
    $servername = "localhost"; // Cambia esto según la configuración de tu servidor
    $username_db = "root"; // Cambia esto según la configuración de tu servidor
    $password_db = ""; // Cambia esto según la configuración de tu servidor
    $dbname = "tienda_online"; // Cambia esto según la configuración de tu servidor

    // Crea la conexión
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    // Verifica si la conexión fue exitosa
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Prepara la consulta SQL para verificar las credenciales del usuario
    $sql = "SELECT * FROM users WHERE username='$username'";
    
    // Ejecuta la consulta SQL
    $result = $conn->query($sql);

    // Verifica si se encontró un usuario con el nombre de usuario proporcionado
    if ($result->num_rows == 1) {
        // Recupera la fila del resultado
        $row = $result->fetch_assoc();
        // Verifica la contraseña utilizando password_verify
        if (password_verify($password, $row['password'])) {
            // Inicia la sesión y establece variables de sesión para el usuario
            $_SESSION['user_id'] = $row['id']; // Supone que tienes un campo id en tu tabla de usuarios
            $_SESSION['username'] = $username;
            // Redirecciona al usuario después de iniciar sesión exitosamente
            header("Location: index.php");
            exit(); // Asegúrate de detener la ejecución del script después de redireccionar
        } else {
            echo '<script>alert("Nombre de usuario o contraseña incorrectos");</script>';
        }
    } else {
        echo '<script>alert("Nombre de usuario o contraseña incorrectos");</script>';
    }

    // Cierra la conexión con la base de datos
    $conn->close();
}
?>
