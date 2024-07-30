<?php
// Verifica si los datos del formulario se enviaron mediante el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera los datos del formulario
    $username = $_POST["username"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm-password"];
    
    // Verifica si las contraseñas coinciden
    if ($password !== $confirmPassword) {
        echo '<script>alert("Las contraseñas no coinciden");</script>';
        exit; // Detiene la ejecución del script si las contraseñas no coinciden
    }

    // Encripta la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

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

    // Prepara la consulta SQL para insertar el usuario en la tabla de usuarios
    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

    // Ejecuta la consulta SQL
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Usuario registrado exitosamente");</script>';
        // Redirecciona al usuario después de registrar exitosamente
        header("Location: linicio.php");
        exit(); // Asegúrate de detener la ejecución del script después de redireccionar
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cierra la conexión con la base de datos
    $conn->close();
}
?>
