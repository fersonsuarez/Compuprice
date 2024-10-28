<?php

include 'template (layout)/cabecera.php';

?>

<!-- Panel de presentación de productos -->
<div class="container">
    <h1 class="my-4 text-center">Bienvenido a nuestra Tienda</h1>
    <p class="text-center">Encuentra la mejor solucion tecnologica para tu empresa. ¡Explora y disfruta de tus compras!</p>
</div>

<!-- Mensaje de alerta carrito -->
<div class="container">
    <br>
    <div class="alert alert-success">
    <?php echo $mensaje;?>
    <a href="mostrarCarrito.php" class="badge bg-success">Ver carrito</a> 
</div>
</div>

<!-- Cubículos de productos -->
<div class="container">
  <div class="row">
    <?php
      $sentencia = $pdo->prepare("SELECT * FROM `tblproductos`");
      $sentencia->execute();
      $listaProductos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <?php foreach($listaProductos as $producto){ ?>
    <!-- Tarjeta de producto -->
    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
      <div class="card h-100" style="width: 100%;">

        <!-- Imagen con popover para la descripción -->
        <img src="<?php echo $producto["Imagen"]; ?>" class="card-img-top" alt="Imagen del producto" 
        style="object-fit: cover; height: 250px;" data-bs-toggle="popover" data-bs-trigger="hover" 
        data-bs-content="<?php echo $producto['Descripcion']; ?>" data-bs-placement="auto">

        <div class="card-body d-flex flex-column">
          <!-- Nombre del producto -->
          <h4><?php echo $producto["Nombre"]; ?></h4>
          
          <!-- Precio formateado -->
          <h5 class="card-price">$<?php echo number_format($producto["Precio"], 2, ',', '.'); ?></h5>
          
         <!-- Botón de acción -->
         <form action="index.php" method="post">
    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'], COD, KEY); ?>">
    <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['Nombre'], COD, KEY); ?>">
    <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['Precio'], COD, KEY); ?>">

    <!-- Campo para ingresar la cantidad -->
    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad" id="cantidad" value="1" min="1" class="form-control">

    <!-- Botón de agregar al carrito -->
    <button class="btn btn-primary mt-auto" name="btnAccion" value="Agregar" type="submit">Agregar al carrito</button>
</form>

        </div>
      </div>
    </div>

    <?php } ?>
  </div>
</div>



<!-- Script para inicializar los popovers -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl, {
            placement: 'auto',   // Popper.js calculará la mejor posición
            boundary: 'window',  // Mantiene el popover dentro de la ventana del navegador
            trigger: 'hover',    // Popover se mostrará al pasar el cursor
            html: true           // Permitir HTML dentro del contenido del popover
        });
    });
});
</script>

<?php

include "template (layout)/pie.php"

?>