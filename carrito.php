<?php

session_start();

$mensaje = "";

if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {

        // Agregar producto al carrito
        case 'Agregar':

            // Verificar si el ID es numérico después de desencriptarlo
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
               // $mensaje .= "ID correcto: " . $ID . "<br/>";
            } else {
                $mensaje .= "ID incorrecto" . "<br/>";
                break;
            }

            // Verificar si el nombre es una cadena válida
            if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
                $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
                $mensaje .= "Acabas de Agregar :  " . $NOMBRE . "<br/>";
            } else {
                $mensaje .= "Error en el nombre" . "<br/>";
                break;
            }

            // Verificar si la cantidad es numérica
            if (is_numeric($_POST['cantidad'])) {
                $CANTIDAD = $_POST['cantidad'];
               // $mensaje .= "Cantidad: " . $CANTIDAD . "<br/>";
            } else {
                $mensaje .= "Error en la cantidad" . "<br/>";
                break;
            }

            // Verificar si el precio es numérico después de desencriptarlo
            if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
              //  $mensaje .= "Precio: " . $PRECIO . "<br/>";
            } else {
                $mensaje .= "Error en el precio" . "<br/>";
                break;
            }

            // Lógica para agregar el producto al carrito
            if (!isset($_SESSION['CARRITO'])) {
                // Si no existe el carrito, crearlo
                $producto = array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO
                );
                $_SESSION['CARRITO'][0] = $producto;
                
            } else {
                // Si ya existe el carrito, añadir el producto
                $NumeroProductos = count($_SESSION['CARRITO']);
                $producto = array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO
                );
                $_SESSION['CARRITO'][$NumeroProductos] = $producto;
                
            }

            $mensaje .= "Producto agregado al carrito.<br/>";

            break;

        // Eliminar producto del carrito
        case 'Eliminar':
            // Verificar si el ID es numérico después de desencriptarlo
            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);

                // Recorrer el carrito para encontrar y eliminar el producto
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    if ($producto['ID'] == $ID) {
                        unset($_SESSION['CARRITO'][$indice]); // Eliminar producto
                        // Reindexar el array para evitar problemas con índices faltantes
                        $_SESSION['CARRITO'] = array_values($_SESSION['CARRITO']); 

                        echo "<script>alert('Producto Eliminado Correctamente.');</script>";
                        break; // Salir del loop una vez eliminado
                    }
                }
            } else {
                $mensaje .= "ID incorrecto" . "<br/>";
            }
            break;

    }
}
