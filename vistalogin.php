
<?php
include 'template (layout)/cabecera.php';
?>

<head>
<link rel="stylesheet" href="css/login.css">
</head>
<body>
    
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="post" id="loginForm">
            <input type="text" id="email" placeholder="Correo o número de celular" required>
            <input type="password" id="password" placeholder="Contraseña" required>
            <button type="submit">Entrar</button>
            <p class="error" id="errorMessage" style="display: none;">Usuario o contraseña incorrectos</p>
            <div class="links">
                <a href="#" id="forgotPassword">¿Olvidaste tu contraseña?</a>
                <a href="/register" id="register">Regístrate</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;

            // Aquí puedes agregar tu lógica de autenticación
            if (username === 'admin' && password === 'admin') {
                alert('Inicio de sesión exitoso');
            } else {
                document.getElementById('errorMessage').style.display = 'block';
            }
        });
    </script>
</body>
</html>