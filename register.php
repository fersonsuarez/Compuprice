<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "localhost"; // Cambia si es necesario
    $username = "root"; // Tu usuario de la base de datos
    $password = ""; // Tu contraseña de la base de datos
    $dbname = "compuprice"; // Nombre de tu base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener datos del formulario
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    // Insertar datos en la base de datos
    $sql = "INSERT INTO usuarios (firstname, lastname, email, password, phone, address)
            VALUES ('$firstname', '$lastname', '$email', '$password', '$phone', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
        // Aquí puedes redirigir a otra página o mostrar un mensaje
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
