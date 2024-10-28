<?php
include 'template (layout)/cabecera.php';

?>
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos y lógica aquí...

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message'] = "Registro exitoso";
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
    }

    $conn->close();
    header("Location: register.php"); // Redirige de nuevo al formulario
    exit();
}

?>
<head>
<link rel="stylesheet" href="css/register.css">
</head>

<body>
    <div class="register-container">
        <h2>Registro</h2>
        <?php if (isset($_SESSION['message'])): ?>
            <p class="error"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
        <?php endif; ?>
        <form action="register.php" method="post" id="registerForm">
            <input type="text" name="firstname" placeholder="Nombres" required>
            <input type="text" name="lastname" placeholder="Apellidos" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="text" name="phone" placeholder="Teléfono" required>
            <input type="text" name="address" placeholder="Dirección" required>
            <button type="submit">Registrarse</button>
            <p class="error" id="errorMessage" style="display: none;">Error en el registro</p>
        </form>
    </div>
</body>
</html>
