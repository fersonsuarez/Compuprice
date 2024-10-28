<?php

include 'template (layout)/cabecera.php';
?>

<body class="d-flex flex-column min-vh-100"> <!-- Flex container -->

    <div class="container my-4"> <!-- Contenedor con márgenes verticales -->
        <h3 class="text-center">Lista del Carrito</h3> <!-- Título centrado -->

        <?php if (!empty($_SESSION['CARRITO'])) { ?>
        
        <div class="table-responsive w-75 mx-auto"> <!-- Tabla centrada con un ancho de 75% -->
            <table class="table table-light table-bordered">
                <thead>
                    <tr>
                        <th width="40%">Descripción</th>
                        <th width="15%" class="text-center">Cantidad</th>
                        <th width="20%" class="text-center">Precio</th>
                        <th width="20%" class="text-center">Total</th>
                        <th width="5%">--</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $total = 0;

                // Recorre los productos del carrito almacenado en la sesión
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                ?>
                <tr>
                    <!-- Mostrar el nombre del producto -->
                    <td width="40%"><?php echo $producto['NOMBRE']; ?></td>
                    
                    <!-- Mostrar la cantidad del producto -->
                    <td width="15%" class="text-center"><?php echo $producto['CANTIDAD']; ?></td>
                    
                    <!-- Mostrar el precio del producto -->
                    <td width="20%" class="text-center">$<?php echo $producto['PRECIO']; ?></td>
                    
                    <!-- Mostrar el subtotal (precio * cantidad) formateado a 2 decimales -->
                    <td width="20%" class="text-center">
                        $<?php echo number_format($producto['PRECIO'] * $producto['CANTIDAD'], 2); ?>
                    </td>
                    
                    <!-- Botón para eliminar el producto, con formulario -->
                    <td width="5%">
                    <form method="post" action="">
                        <!-- El ID del producto encriptado -->
                        <input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
                        <!-- Botón para eliminar el producto -->
                        <button class="btn btn-danger" name="btnAccion" value="Eliminar" type="submit">Eliminar</button>
                    </form>
                    </td>
                 </tr>
                 <?php
                    // Sumar al total el precio por cantidad del producto
                    $total += ($producto['PRECIO'] * $producto['CANTIDAD']);
                }
                ?>
                <tr>
                    <!-- Mostrar el total acumulado -->
                    <td colspan="3" align="right"><h3>Total</h3></td>
                    <td align="right">
                        <h3>$<?php echo number_format($total, 2); ?></h3>
                    </td>
                    <td></td>
                </tr>

                </tbody>
            </table>
            
            <!-- Botón para proceder al pago -->
            <div class="text-center">
                <form method="post" action="vistaPagar.php">
                    <!-- Enviar el total del carrito como un campo oculto -->
                    <input type="hidden" name="total" value="<?php echo $total; ?>">
                    <button class="btn btn-success" type="submit">Proceder al pago</button>
                </form>
            </div>

        <?php 
        } else { ?>
            <div class="alert alert-success">
                No hay productos en el carrito...
            </div>
        <?php } ?>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-auto">
        <!-- Footer pegajoso -->
    </footer>

</body>
</html>

<?php 
include 'template (layout)/pie.php'; // Añadir el punto y coma faltante
?>
