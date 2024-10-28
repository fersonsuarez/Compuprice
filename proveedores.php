<?php
include 'template (layout)/cabecera.php'; 
include 'template (layout)/barra_admin.php';

// Manejar la adición de un proveedor
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_proveedor'])) {
    $numeroId = $_POST['numeroId'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $correo = $_POST['correo'];
    
    $query = "INSERT INTO proveedores (numeroId, nombreProveedor, telefonoProveedor, direccionProveedor, correoProveedor) VALUES (:nombre, :telefono, :direccion, :correo)";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':telefono', $telefono);
    $stmt->bindParam(':direccion', $direccion);
    $stmt->bindParam(':correo', $correo);
    $stmt->execute();
}

// Manejar la eliminación de un proveedor
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_proveedor'])) {
    $id = $_POST['idProveedor'];
    
    $query = "DELETE FROM proveedores WHERE idProveedor = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// Obtener los proveedores
$query = "SELECT * FROM proveedores";
$result = $pdo->query($query);
?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/componentes.css";>
    <title>Dashboard</title>
</head>

<body>
<main class="main container mt-4">
    
    <details class="add-component-section">
        <summary><h5>Agregar Proveedor</h5></summary>

        <form method="post">

            <input type="text" name="numeroId" placeholder="NIT o CC" required>
            <input type="text" name="nombre" placeholder="Nombre del proveedor" required>
            <input type="text" name="telefono" placeholder="Teléfono" required>
            <input type="text" name="direccion" placeholder="Dirección" required>
            <input type="text" name="correo" placeholder="Correo electrónico" required>
            <button type="submit" name="add_proveedor">Agregar proveedor</button>
        </form>
    </details>

    <!-- Tabla de proveedores -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIT</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Correo electrónico</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $row['idProveedor']; ?></td>
                    <td><?php echo $row['numeroId']; ?></td>
                    <td><?php echo $row['nombreProveedor']; ?></td>
                    <td><?php echo $row['telefonoProveedor']; ?></td>
                    <td><?php echo $row['direccionProveedor']; ?></td>
                    <td><?php echo $row['correoProveedor']; ?></td>
                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="idProveedor" value="<?php echo $row['idProveedor']; ?>">
                            <button type="submit" name="delete_proveedor" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>

</body>
</html>
