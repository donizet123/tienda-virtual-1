<?php include_once 'Views/template/headerPrincipal.php'; ?>




<!-- Start Content -->
<div class="container py-5">
    <div class="row">

        <!-- agregado -->

        <div class="col-12 col-md-3 p-5 mt-3">
            <div class="row">
                <?php foreach ($data['categorias'] as $categoria) { ?>
                    <div class="col-12 mb-3"> <!-- Alineación por defecto a la izquierda -->
                        <h5>
                            <a href="<?php echo BASE_URL . 'principal/categorias/' . $categoria['id']; ?>"
                                style="text-decoration: none; color: black;">
                                <?php echo htmlspecialchars($categoria['categoria']); ?>
                            </a>
                        </h5>
                    </div>
                <?php } ?>
            </div>
        </div>
        <!-- fin -->

        <!-- nombre de las categorias de php -->

        <div class="col-lg-9">
            <div class="row">
                <div class="col-md-6">
                    <ul class="list-inline shop-top-menu pb-3 pt-1">
                        <li class="list-inline-item">
                            <a class="h3 text-dark text-decoration-none mr-3" href="#">
                                Productos de la categoría: <?php echo htmlspecialchars($data['nombre_categoria']['categoria']); ?>
                            </a>
                        </li>


                    </ul>
                </div>

            </div>
            <div class="row">
                <?php foreach ($data['productos'] as $producto) { ?>

                    <div class="col-md-4">
                        <div class="card mb-4 product-wap rounded-0">
                            <div class="card rounded-0">
                                <img class="card-img rounded-0 img-fluid" src="<?php echo $producto['imagen']; ?>">

                                <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a class="btn btn-util text-white btnAddDeseo" href="#" prod="<?php echo $producto['id']; ?>"><i class="far fa-heart"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-util text-white mt-2" href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>"><i class="far fa-eye"></i></a>
                                        </li>
                                        <li>
                                            <a class="btn btn-util text-white mt-2 btnAddCarrito" href="#" prod="<?php echo $producto['id']; ?>"><i class="fas fa-cart-plus"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>



                            <div class="card-body">
                                <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>" class="h3 text-decoration-none"><?php echo  $producto['nombre']; ?> </a>
                                <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">

                                    <li class="pt-2">
                                        <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                        <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                    </li>
                                </ul>

                                <p class="text-center mb-0"><?php echo MONEDA . ' ' . $producto['precio']; ?></p>
                            </div>




                        </div>
                    </div>

                <?php } ?>

            </div>
            <div div="row">

                <ul class="pagination pagination-lg justify-content-end">

                    <?php
                    $anterior = $data['pagina'] - 1;
                    $siguiente = $data['pagina'] + 1;
                    $url = BASE_URL . 'principal/categorias/' . $data['id_categoria'];
                    if ($data['pagina'] > 1) {
                        echo '<li class="page-item ">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="'  . $url . '/' .  $anterior . '" tabindex="-1">anterior</a>
                        </li>';
                    }
                    if ($data['total'] >= $siguiente) {
                        echo '<li class="page-item">
                            <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="' . $url . '/' . $siguiente . '">siguiente</a>
                        </li>';
                    }

                    ?>


                </ul>

            </div>
        </div>

    </div>

</div>
<!--   End Content -->




<?php include_once 'Views/template/footerPrincipal.php'; ?>

</body>

</html>