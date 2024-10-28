<?php

include 'template (layout)/cabecera.php';
include 'template (layout)/barra_admin.php'

?>

<main class="col-md-9 col-lg-10 px-md-4 main-content">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-outline-secondary d-md-none" id="sidebarToggle">
                        <i class="bi bi-list"></i>
                    </button>
                    <div class="btn-group ms-2">
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-bell"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-outline-secondary">
                            <i class="bi bi-person"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
                <!-- Tarjetas del dashboard -->
                <div class="col">
                    <div class="card dashboard-card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Usuarios</h5>
                            <p class="card-text display-4">4</p>
                            <p class="card-text"><small class="text-muted">Usuarios registrados</small></p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="#usuarios" class="btn btn-primary w-100">Gestionar Usuarios</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card dashboard-card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Pedidos</h5>
                            <p class="card-text display-4">2</p>
                            <p class="card-text"><small class="text-muted">Pedidos Pendientes</small></p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="#usuarios" class="btn btn-primary w-100">Gestionar Pedidos</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card dashboard-card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Inventario</h5>
                            <p class="card-text display-4">15</p>
                            <p class="card-text"><small class="text-muted">Productos registrados</small></p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="componentes.php" class="btn btn-primary w-100">Gestionar Productos</a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card dashboard-card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Configuraciones</h5>
                            <p class="card-text display-4">3</p>
                            <p class="card-text"><small class="text-muted">Configuraciones Disponibles</small></p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="#usuarios" class="btn btn-primary w-100">Configuraciones</a>
                        </div>
                    </div>
                </div>

                

                

                <!-- Repite las otras tarjetas aquí... -->
            </div>
        </main>
    </div>
</div>

    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebarToggle = document.getElementById('sidebarToggle');
            var sidebar = document.getElementById('sidebar');

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('show');
            });
        });
    </script>
</body>
</html>