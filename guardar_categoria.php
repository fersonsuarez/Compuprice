<?php
include 'global/config.php';
include 'global/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el nombre de la categoría del formulario
    $nombre_categoria = $_POST['nombre_categoria'];

    // Preparar y ejecutar la inserción
    $sql = "INSERT INTO categorias (nombre) VALUES (:nombre)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':nombre', $nombre_categoria);

    if ($stmt->execute()) {
        echo "<script>alert('Categoría agregada con éxito.'); window.location.href='categoria.php';</script>";
    } else {
        echo "<script>alert('Error al agregar la categoría.'); window.history.back();</script>";
    }
}
?>
