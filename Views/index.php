<?php include_once 'Views/template/headerPrincipal.php'; ?>



<!-- Start Banner Hero -->
<div id="template-mo-zay-hero-carousel" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="1"></li>
        <li data-bs-target="#template-mo-zay-hero-carousel" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid w-100 h-auto" src=" <?php echo BASE_URL; ?>assets/img/banner_img_01.jpg" alt="">
                    </div>

                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left align-self-center">
                            <h1 class="h1 text-success"><b>Pinturas y Accesorios</b> eCommerce</h1>
                            <h3 class="h2">Todo lo que necesitas para tus proyectos</h3>
                            <p>
                                Bienvenido a Pinturas y Accesorios, tu tienda en línea especializada en productos de calidad para decoración y proyectos de pintura.
                                Aquí encontrarás una amplia variedad de pinturas, herramientas y accesorios ideales para renovar tus espacios.
                                Ofrecemos productos cuidadosamente seleccionados para garantizar los mejores resultados en cada proyecto.
                                Gracias por elegirnos como tu aliado en decoración.
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/img/banner_img_02.jpg" alt="Pinturas y accesorios">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Pinturas y Accesorios</h1>
                            <h3 class="h2">Transforma tus espacios con estilo</h3>
                            <p>
                                En nuestra tienda encontrarás una amplia variedad de pinturas, herramientas y accesorios de alta calidad
                                para dar vida a tus proyectos de decoración. Descubre todo lo que necesitas para renovar y embellecer tus espacios,
                                con productos pensados para cumplir tus expectativas.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="carousel-item">
            <div class="container">
                <div class="row p-5">
                    <div class="mx-auto col-md-8 col-lg-6 order-lg-last">
                        <img class="img-fluid" src="<?php echo BASE_URL; ?>assets/img/banner_img_03.jpg" alt="Pinturas y Accesorios">
                    </div>
                    <div class="col-lg-6 mb-0 d-flex align-items-center">
                        <div class="text-align-left">
                            <h1 class="h1">Calidad y Variedad</h1>
                            <h3 class="h2">Todo lo que necesitas para tus proyectos</h3>
                            <p>
                                En Pinturas y Accesorios ofrecemos productos especializados para decoración y mantenimiento.
                                Encuentra pinturas, herramientas y complementos diseñados para hacer realidad tus ideas, con la calidad que mereces.
                                Nuestra misión es ayudarte a transformar tus espacios con productos confiables y al mejor precio.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <a class="carousel-control-prev text-decoration-none w-auto ps-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="prev">
        <i class="fas fa-chevron-left"></i>
    </a>
    <a class="carousel-control-next text-decoration-none w-auto pe-3" href="#template-mo-zay-hero-carousel" role="button" data-bs-slide="next">
        <i class="fas fa-chevron-right"></i>
    </a>
</div>
<!-- End Banner Hero -->


<!-- Start Categories of The Month -->
<section class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Categorías</h1>
            <p>
                Explora nuestras categorías y encuentra todo lo que necesitas para tus proyectos de pintura y decoración.
                Desde herramientas especializadas hasta pinturas de alta calidad, tenemos lo que buscas.
            </p>
        </div>
    </div>
    <div class="row">
        <?php foreach ($data['categorias'] as $categoria) { ?>

            <div class="col-12 col-md-3 p-5 mt-3">
                <a href="<?php echo BASE_URL . 'principal/categorias/' . $categoria['id']; ?>">
                    <img src="<?php echo $categoria['imagen']; ?>" class=" img-fluid border" alt="<?php echo $categoria['categoria']; ?>">
                </a>
                <h5 class="text-center mt-3 mb-3"><?php echo $categoria['categoria']; ?></h5>
                <p class="text-center">
                    <a href="<?php echo BASE_URL . 'principal/categorias/' . $categoria['id']; ?>" class="btn btn-success">Ir a la tienda</a>
                </p>
            </div>
        <?php } ?>
    </div>
</section>

<!-- End Categories of The Month -->


<!-- Start Featured Product -->
<section class="bg-light">
    <div class="container py-5">
        <div class="row text-center py-3">
            <div class="col-lg-6 m-auto">
                <h1 class="h1">Productos Destacados</h1>
                <p>
                    Descubre nuestros productos más destacados, seleccionados especialmente para ayudarte en tus proyectos de pintura y decoración.
                    Calidad, variedad y diseño al alcance de tus manos.
                </p>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data['nuevoproductos'] as $producto) { ?>
                <div class="col-12 col-md-4 mb-4">
                    <div class="card h-100">
                        <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>">
                            <img src="<?php echo $producto['imagen']; ?>" class="card-img-top" alt="<?php echo $producto['nombre']; ?>">
                        </a>
                        <div class="card-body">
                            <ul class="list-unstyled d-flex justify-content-between">
                                <li class="text-muted text-right"><?php echo MONEDA . ' ' . $producto['precio']; ?></li>
                            </ul>
                            <a href="<?php echo BASE_URL . 'principal/detail/' . $producto['id']; ?>" class="h2 text-decoration-none text-dark">
                                <?php echo $producto['nombre']; ?>
                            </a>
                            <p class="card-text">
                                <?php echo $producto['descripcion']; ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<!-- End Featured Product -->


<?php include_once 'Views/template/footerPrincipal.php'; ?>



</body>

</html>