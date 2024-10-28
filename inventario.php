<?php
include 'getcomponents.php'; // Conexión a la base de datos

// Manejar la adición de un componente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_component'])) {
    $nombre = $_POST['nombre'];
    $query = "INSERT INTO tblproductos (nombre) VALUES ('$nombre')";
    $conn->query($query);
}

// Manejar la eliminación de un componente
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_component'])) {
    $id = $_POST['ID'];
    $query = "DELETE FROM tblproductos WHERE ID = '$id'";
    $conn->query($query);
}

// Obtener los componentes
$query = "SELECT * FROM tblproductos";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/inventario.css">
    <title>Dashboard</title>
</head>
<body>

<main class="main container mt-4">
    <h1 class="text-center mb-4">Dashboard</h1>

    <details class="add-component-section">
    <summary><h3>Agregar Componente</h3></summary>
    <form method="post">
        <input type="text" name="nombre" placeholder="Nombre del componente" required>
        <input type="text" name="descripcion" placeholder="Descripción" required>
        <input type="text" name="precio" placeholder="Precio" required>
        <input type="text" name="cantidad" placeholder="Cantidad" required>
        <input type="text" name="imagen" placeholder="URL de la imagen" required>
        <button type="submit" name="add_component">Agregar Componente</button>
    </form>
</details>

        <!-- Tabla de componentes -->
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row['ID']; ?></td>
                        <td><?php echo $row['Nombre']; ?></td>
                        <td><?php echo $row['Precio']; ?></td>
                        <td><?php echo $row['Descripcion']; ?></td>
                        <td><?php echo $row['Imagen']; ?></td>
                        <td>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
                                <button type="submit" name="delete_component">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>
</main>

</body>
</html>
