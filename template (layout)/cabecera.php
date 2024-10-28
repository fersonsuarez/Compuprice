<?php
// Iniciar la sesión antes de cualquier salida

// Incluye tus archivos de configuración y conexión
include 'global/config.php';
include 'global/conexion.php';
include 'carrito.php';
try {
    // Consulta para obtener las categorías
    $sql = "SELECT * FROM categorias";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $categorias = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener categorías: " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>

    <!-- Links de Bootstrap y Font Awesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>



<!-- Logo y menú de navegación -->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="home.php" style="margin-left: 1cm;">
        <img src="img/logo.png" alt="Logo" width="150" height="50" class="d-inline-block align-text-top img-fluid">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
        
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link text-white" href="home.php">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="index.php">Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Servicios</a>
            </li>
            <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle text-white" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categorías</a>
    <div class="dropdown-menu" aria-labelledby="dropdownId">
        <?php foreach ($categorias as $categoria): ?>
            <a class="dropdown-item" href="categoria.php?ID=<?php echo $categoria['ID']; ?>"><?php echo htmlspecialchars($categoria['Nombre']); ?></a>
        <?php endforeach; ?>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="agregar_categoria.php">Agregar Categoría</a>
    </div>
</li>


        </ul>

        <!-- Botones de inicio de sesión y registro -->
        <div class="d-flex me-3" style="margin-left: -10px;">
            <button class="btn btn-outline-light btn-m me-2" link href= type="button">Iniciar Sesión</button>
           </div> <button class="btn btn-primary btn-m" type="button">Registrarse</button>
        </div>

        <!-- Carrito de compras con icono y cantidad -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" href="mostrarCarrito.php">
                    <i class="fas fa-shopping-cart fa-2x"></i>
                    <span class="badge bg-danger" id="cart-count"><?php echo isset($_SESSION['CARRITO']) ? count($_SESSION['CARRITO']) : 0; ?></span>
                </a>
            </li>
        </ul>

        <!-- Icono de perfil y menú desplegable -->
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="sessionDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user-circle fa-2x"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sessionDropdown">
                    <a class="dropdown-item" href="#">Perfil</a>
                    <a class="dropdown-item" href="dashboard.php">DashBoard</a>
                    <a class="dropdown-item" href="#">Configuraciones</a>
                    <a class="dropdown-item" href="#">Cerrar Sesión</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!-- Estilos para el hover interactivo -->
<style>
    .navbar-nav .nav-link { 
        color: white !important;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .navbar-nav .nav-link:hover { 
        background-color: #0056b3; /* Color más oscuro */
        color: aqua;
        border-radius: 8px;
    }
    .dropdown-item {
        transition: background-color 0.1s ease;
    }
    .dropdown-item:hover {
        background-color: #0056b3; /* Color más oscuro */
        color: white;
    }
</style>


</body>
</html>
