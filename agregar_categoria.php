<?php
include 'template (layout)/cabecera.php'; // Asegúrate de incluir la cabecera
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Categoría</title>
</head>
<body>
    <div class="container mt-4">
        <h1>Agregar Nueva Categoría</h1>
        <form action="guardar_categoria.php" method="POST">
            <div class="mb-3">
                <label for="nombre_categoria" class="form-label">Nombre de la Categoría:</label>
                <input type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Categoría</button>
        </form>
    </div>
</body>
</html>
