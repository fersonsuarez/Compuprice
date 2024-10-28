
<?php

include 'template (layout)/cabecera.php';
include 'template (layout)/barra_admin.php'

?>


<?php

// Añadir componentes
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_component'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];
    $query = "INSERT INTO tblproductos (nombre, descripcion, precio, imagen) VALUES (:nombre, :descripcion, :precio, :imagen)";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':imagen', $imagen);
    $stmt->execute();
}

// Eliminar componentes
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_component'])) {
    $id = $_POST['ID'];
    $query = "DELETE FROM tblproductos WHERE ID = :id";
    
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

// Obtener los componentes
$query = "SELECT * FROM tblproductos";
$result = $pdo->query($query);
?>
    <link rel="stylesheet" href="css/componentes.css";>
    <title>Dashboard</title>
</head>

<body>


    <details class="add-component-section">
        <summary><h5>Agregar Componente</h5></summary>
        <form action="componentes.php" method="post">
            <input type="text" name="nombre" placeholder="Nombre del componente" required>
            <input type="text" name="descripcion" placeholder="Descripción" required>
            <input type="text" name="precio" placeholder="Precio" required>
            <input type="text" name="cantidad" placeholder="Cantidad" required>
            <input type="text" name="imagen" placeholder="URL de la imagen" required>
            <button type="submit" name="add_component">Agregar Componente</button>
        </form>
    </details>

    <!-- Tabla de componentes -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $row['ID']; ?></td>
                    <td><?php echo $row['Nombre']; ?></td>
                    <td><?php echo $row['Precio']; ?></td>
                    <td><?php echo $row['Descripcion']; ?></td>
                    <td><?php echo $row['Imagen']; ?></td>
                    <td>
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="ID" value="<?php echo $row['ID']; ?>">
                            <button type="submit" name="delete_component" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</main>