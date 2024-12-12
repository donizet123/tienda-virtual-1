<?php require_once 'Controllers/Admin.php'; ?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title><?php echo TITLE . ' - ' . $data['title']; ?></title>

    <!-- Estilos principales -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="<?php echo BASE_URL; ?>assets/css/styles.css" rel="stylesheet" />

    <!-- Font Awesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Estilos adicionales -->
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/templatemo.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/custom.css">

    <!-- Estilos del DataTable -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/DataTables/datatables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>


<body class="sb-nav-fixed">

    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="<?php echo BASE_URL; ?>"><?php echo TITLE  ?></a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-10 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>

                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item"><?php echo $_SESSION['nombre_usuario']; ?></a></li>
                    <li><a class="dropdown-item"><?php echo $_SESSION['email']; ?></a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li> <!-- Línea separadora -->
                    <li><a class="dropdown-item" href="<?php echo BASE_URL . 'admin/salir'; ?>">SALIR</a></li>
                </ul>

            </li>




        </ul>
    </nav>



    <div id="layoutSidenav">

        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">CRUD</div>

                        <a class="nav-link" href="<?php echo BASE_URL . 'admin/home'; ?>">
                            <div class="sb-nav-link-icon"><i class="bx bx-home-circle"></i></div>
                            Dashboard
                        </a>

                        <a class="nav-link" href="<?php echo BASE_URL . 'usuarios'; ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            Usuarios
                        </a>

                        <a class="nav-link" href="<?php echo BASE_URL . 'categorias'; ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-tags"></i></div>
                            Categorias
                        </a>
                        <a class="nav-link" href="<?php echo BASE_URL . 'productos'; ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-list"></i></div>
                            Productos
                        </a>

                        <a class="nav-link" href="<?php echo BASE_URL . 'pedidos'; ?>">
                            <div class="sb-nav-link-icon"><i class="fas fa-bell"></i></div>
                            Pedidos
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    Start Bootstrap
                </div>
            </nav>


        </div>