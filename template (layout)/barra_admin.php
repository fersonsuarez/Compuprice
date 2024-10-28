

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        .sidebar {
            height: 100vh;
            background-color: #f8f9fa;
            border-right: 1px solid #dee2e6;
        }
        .sidebar .nav-link {
            color: #333;
        }
        .sidebar .nav-link:hover {
            background-color: #e9ecef;
        }
        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: white;
        }
        .main-content {
            padding: 20px; /* Espaciado interior del contenido */
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky pt-3">
                    <h2 class="h5 px-3 py-3 border-bottom">Mi Dashboard</h2>
                    <ul class="nav flex-column">


                    <li class="nav-item">
                            <a class="nav-link" href="dashboard.php">
                            <i class="bi bi-house"></i>
                                Inicio
                            </a>
                        <li class="nav-item">
                            <a class="nav-link active" href="#usuarios">
                                <i class="bi bi-people me-2"></i>
                                Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#pedidos">
                                <i class="bi bi-cart me-2"></i>
                                Pedidos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="componentes.php">
                                <i class="bi bi-box me-2"></i>
                                Productos
                            </a>
                        </li>
                    
                            </a>
                            <li class="nav-item">
                            <a class="nav-link" href="Proveedores.php">
                             <i class="bi bi-truck"></i>
                                Proveedores
                            </a>

                            <li class="nav-item">
                            <a class="nav-link" href="#configuraciones">
                                <i class="bi bi-gear me-2"></i>
                                Configuraciones
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 main-content">
                <div class="container">
       
   
</body>
</html>

