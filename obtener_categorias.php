<?php

include 'global/conexion.php';
?>
<?php
function obtenerCategorias() {
    global $conn; // Asume que $conn es tu conexión a la base de datos

    $categorias = array();
    $sql = "SELECT id, nombre FROM categorias ORDER BY nombre";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $categorias[] = $row;
        }
    }

    return $categorias;
}