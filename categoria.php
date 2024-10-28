<?php
// Incluye archivos de configuración y conexión


include 'template (layout)/cabecera.php'
?>
<?php
// Verifica que el ID de la categoría esté presente en la URL
if (isset($_GET['ID'])) {
    $categoria_id = $_GET['ID'];

    // Consulta SQL para obtener los productos por categoría
    $sql = "SELECT * FROM tblproductos WHERE categoria_ID = :categoria_ID";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':categoria_ID', $categoria_id, PDO::PARAM_INT);  // Asegúrate de que la variable coincide
    $stmt->execute();
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    echo "Categoría no seleccionada.";
    exit;
}
?>

<!-- Cubículos de productos -->
<div class="container">
  <div class="row">
    <!-- Verifica si hay productos para mostrar -->
    <?php if (!empty($productos)): ?>
        <?php foreach ($productos as $producto): ?>
        <!-- Tarjeta de producto -->
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
          <div class="card h-100" style="width: 100%;">

            <!-- Imagen con popover para la descripción -->
            <img src="<?php echo htmlspecialchars($producto['Imagen']); ?>" class="card-img-top" alt="Imagen del producto" 
            style="object-fit: cover; height: 250px;" data-bs-toggle="popover" data-bs-trigger="hover" 
            data-bs-content="<?php echo htmlspecialchars($producto['Descripcion']); ?>" data-bs-placement="auto">

            <div class="card-body d-flex flex-column">
              <!-- Nombre del producto -->
              <h4><?php echo htmlspecialchars($producto["Nombre"]); ?></h4>
              
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
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay productos disponibles en esta categoría.</p>
    <?php endif; ?>
  </div>
</div>
<?php
include 'template (layout)/pie.php'

?>