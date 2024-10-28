
<?php

include 'template (layout)/cabecera.php';

// Recuperar el total enviado por el carrito
$total_pagar = isset($_POST['total']) ? $_POST['total'] : 0;

if ($total_pagar == 0) {
    echo "<div class='alert alert-danger'>No hay un total válido para pagar.</div>";
    exit();
}
?>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Formulario de Pago</h2>
                    </div>
                    <div class="card-body">
                        <form action="procesar_pago.php" method="POST">
                            <!-- Datos del usuario -->
                            <input type="hidden" name="user_id" value="1"> <!-- ID dinámico del usuario -->

                            <!-- Mostrar el total del carrito -->
                            <div class="mb-3">
                                <label class="form-label">Monto a pagar:</label>
                                <p class="h5">$<?= number_format($total_pagar, 2) ?></p> <!-- Muestra el monto sin campo de entrada -->
                            </div>

                            <!-- Número de tarjeta -->
                            <div class="mb-3">
                                <label for="card_number" class="form-label">Número de tarjeta</label>
                                <input type="text" class="form-control" id="card_number" name="card_number" placeholder="1111 2222 3333 4444" required>
                            </div>

                            <!-- Fecha de vencimiento -->
                            <div class="mb-3">
                                <label for="expiry_date" class="form-label">Fecha de vencimiento</label>
                                <input type="month" class="form-control" id="expiry_date" name="expiry_date" required>
                            </div>

                            <!-- CVV -->
                            <div class="mb-3">
                                <label for="cvv" class="form-label">CVV</label>
                                <input type="text" class="form-control" id="cvv" name="cvv" maxlength="3" placeholder="Ej. 123" required>
                            </div>

                            <!-- Botón de pago -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-block">Pagar</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <small class="text-muted">Transacciones seguras </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

