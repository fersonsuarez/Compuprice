<?php

include 'template (layout)/cabecera.php';

?>

<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    

    try {
        // Obtener datos del formulario
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // Preparar la consulta
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $email, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verificar si se encontró el usuario
        if ($user) {
            // Verificar la contraseña
            if (password_verify($password, $user['password'])) {
                // Iniciar sesión
                $_SESSION['user_id'] = $user['id']; // Guarda el ID del usuario en la sesión
                $_SESSION['user_role'] = $user['role']; // Guarda el rol del usuario en la sesión
                
                // Redirigir según el rol
                if ($_SESSION['user_role'] === 'Administrador') {
                    header("Location: dashboard.php");
                } elseif ($_SESSION['user_role'] === 'Cliente') {
                    header("Location: catalogo.php");
                }
                exit();
            } else {
                // Contraseña incorrecta
                $_SESSION['message'] = "Usuario o contraseña incorrectos";
            }
        } else {
            // Usuario no encontrado
            $_SESSION['message'] = "Usuario o contraseña incorrectos";
        }

    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
?>
