<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo TITLE . ' - ' . $data['title']; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href=" <?php echo BASE_URL; ?>assets/img/apple-icon.png">

    <link rel="shortcut icon" type="image/x-icon" href=" <?php echo BASE_URL; ?>assets/img/favicon.ico">


    <link rel="stylesheet" href=" <?php echo BASE_URL; ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href=" <?php echo BASE_URL; ?>assets/css/templatemo.css">
    <link rel="stylesheet" href=" <?php echo BASE_URL; ?>assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href=" <?php echo BASE_URL; ?>assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/slick-theme.css">

    <!-- ESTILOS CSS DEL DATATABLE-->
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/DataTables/datatables.min.css">

    <!-- Load map styles -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!--agregado para las alertas -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">





    <!-- pasarela de pago izipay link-->

    <script src="https://sandbox-checkout.izipay.pe/payments/v1/js/index.js"></script>

    <!-- Include the PayPal JavaScript SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=<?php echo CLIENT_ID; ?>"></script>





</head>

<body>
    <!-- Start Top Nav -->
    <!-- Start Top Nav -->
<nav class="navbar navbar-expand-lg navbar-light d-none d-lg-block" id="templatemo_nav_top" style="background-color: #2a4d69; color: white;">
    <div class="container text-light">
        <div class="w-100 d-flex justify-content-between align-items-center">
            <div>
                <i class="fa fa-envelope mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:rodriguezairafrank@gmail.com">rodriguezairafrank@gmail.com</a>
                <i class="fa fa-phone mx-2"></i>
                <a class="navbar-sm-brand text-light text-decoration-none" href="tel:989591376">989591376</a>
            </div>
            <div>
                <!--<a class="text-light mx-2" href="https://www.facebook.com/" target="_blank">
                <i class="fab fa-facebook-f fa-sm fa-fw"></i>
                </a>-->
            </div>
        </div>
    </div>
</nav>
<!-- Close Top Nav -->

<!-- Header -->
<nav class="navbar navbar-expand-lg navbar-light shadow" style="background-color: #2a4d69;">
    <div class="container d-flex justify-content-between align-items-center">

        <!-- Logo -->
        <a class="navbar-brand text-white logo h5 align-self-center" href="<?php echo BASE_URL; ?>">
            <?php echo TITLE; ?>
        </a>

        <!-- Toggler Button -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navigation Links -->
        <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
            <div class="flex-fill">
                <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?php echo BASE_URL . 'principal/about' ?>">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?php echo BASE_URL . 'principal/contact' ?>">Contactanos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="<?php echo BASE_URL . 'principal/shop' ?>">Tienda</a>
                    </li>
                </ul>
            </div>
            <div class="navbar align-self-center d-flex">

                <!-- Mobile Search -->
                <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                        <div class="input-group-text">
                            <i class="fa fa-fw fa-search"></i>
                        </div>
                    </div>
                </div>

                <!-- Search Icon -->
                <a class="nav-icon d-none d-lg-inline text-light" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                    <i class="fa fa-fw fa-search"></i>
                </a>

                <!-- Cart Icon -->
                <a class="nav-icon position-relative text-decoration-none <?php echo ($data['perfil'] == 'no') ? '' : 'd-none'; ?>" href="#" id="verCarrito">
                    <i class="fa fa-fw fa-cart-arrow-down text-light"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark" id="btnCantidadCarrito">0</span>
                </a>

                <!-- Wishlist Icon -->
                <a class="nav-icon position-relative text-decoration-none <?php echo ($data['perfil'] == 'no') ? '' : 'd-none'; ?>" href="<?php echo BASE_URL . 'Principal/deseo' ?>">
                    <i class="fa fa-fw fa-heart text-light"></i>
                    <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark" id="btnCantidadDeseo">0</span>
                </a>

                <!-- User Icon -->
                <?php if (!empty($_SESSION['correoCliente'])) { ?>
                    <a class="nav-icon position-relative text-decoration-none" href="<?php echo BASE_URL . 'clientes' ?>">
                        <img class="img-thumbnail" src="<?php echo BASE_URL . 'assets/img/default.png' ?>" alt="-LOGO-CLIENTE" width="30">
                    </a>
                <?php } else { ?>
                    <a class="nav-icon position-relative text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#modalLogin">
                        <i class="fa fa-fw fa-user text-light"></i>
                    </a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>

    <!-- Close Header -->

    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
                <div class="row" id="resultBusqueda">

                </div>
            </div>

        </div>
    </div>