<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"> <i class="fas fa-cart-arrow-down  "> </i> Carrito</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle" id="tableListaCarrito">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-around mb-3">
                <h3 id="totalGeneral"> </h3>
                <?php  if (!empty($_SESSION['correoCliente'])) {?>
                <a class="btn btn-outline-primary" href="<?php echo BASE_URL . 'clientes'; ?>">Procesar pedido</a>
                <?php }else{  ?>
                <a class="btn btn-outline-primary" href="#" onclick="abrirModalLogin();">Login</a>
                <?php }?>                
            </div>
        </div>
    </div>
</div>


<!-- login directo-->
<div id="modalLogin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="titleLogin">Iniciar sesion</h5>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                </button>
            </div>
            <div class="modal-body m-3">
                <form method="get" action="">
                    <div class="text-center">
                        <img class="img-thumbnail rounded-star" src="<?php echo BASE_URL . 'assets/img/login.jpg'; ?>" alt="" width="100">
                    </div>
                    <div class="row">
                        <div class="col-md-12" id="frmLogin">
                            <div class="form-group mb-3">
                                <label for="correoLogin"> <i class="fas fa-envelope"> </i> Correo</label>
                                <input id="correoLogin" class="form-control" type="text" name="correoLogin" placeholder="correo Electronico">
                            </div>
                            <div class="form-group mb-3">
                                <label for="claveLogin"> <i class="fas fa-key"> </i> Contraseña</label>
                                <input id="claveLogin" class="form-control" type="password" name="claveLogin" placeholder="contraseña">
                            </div>
                            <a href="# " id="btnRegister" >No tiene una cuenta registrada</a>
                            <div class="float-end">
                                <button class="btn btn-primary btn-lg" type="button" id="login">Login</button>
                            </div>
                        </div>
                        <!-- Formulario de registro  -->
                        <div class="col-md-12 d-none" id="frmRegister">
                            <div class="form-group mb-3">
                                <label for="nombreRegistro"> <i class="fas fa-list"> </i> Nombre</label>
                                <input id="nombreRegistro" class="form-control" type="text" name="nombreRegistro" placeholder="Nombre completo">
                            </div>
                            <div class="form-group mb-3">
                                <label for="correoRegistro"> <i class="fas fa-key"> </i> Correo</label>
                                <input id="correoRegistro" class="form-control" type="text" name="correoRegistro" placeholder="Correo electronico">
                            </div>
                            <div class="form-group mb-3">
                                <label for="claveRegistro"> <i class="fas fa-envelope"> </i>Contraseña</label>
                                <input id="claveRegistro" class="form-control" type="password" name="claveRegistro" placeholder="Contraseña">
                            </div>
                            <a href="#" id="btnLogin">¿posees un cuenta?</a>
                            
                            <div class="float-end">
                                <button class="btn btn-primary btn-lg" type="button" id="registrarse">Registrarse</button>
                            </div>

                        </div>
                    </div>


                </form>
            </div>


        </div>
    </div>
</div>

<!-- Start Footer -->
<footer class="bg-dark" id="tempaltemo_footer" style="background-color: #2a4d69; color: white;">
    <div class="container">
        <div class="row">

            <div class="col-md-4 pt-5">
                <h2 class="h2 border-bottom pb-3 border-light logo">Pinturas y Accesorios R&R</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li>
                        <i class="fas fa-map-marker-alt fa-fw"></i>
                        Dirección: Mz. C Lt. 3 Virgen Guadalupe - Lurigancho Chosica y (Carapongo)
                    </li>
                    <li>
                        <i class="fa fa-phone fa-fw"></i>
                        <a class="text-decoration-none" href="#">989591378</a>
                    </li>
                    <li>
                        <i class="fa fa-envelope fa-fw"></i>
                        <a class="text-decoration-none" href="#">pinturasyacesriosRR@company.com</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Categorías</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Pinturas para interiores</a></li>
                    <li><a class="text-decoration-none" href="#">Pinturas para exteriores</a></li>
                    <li><a class="text-decoration-none" href="#">Accesorios para pintura</a></li>
                    <li><a class="text-decoration-none" href="#">Barnices y lacas</a></li>
                    <li><a class="text-decoration-none" href="#">Selladores y primers</a></li>
                    <li><a class="text-decoration-none" href="#">Equipos para pintura</a></li>
                    <li><a class="text-decoration-none" href="#">Colores personalizados</a></li>
                </ul>
            </div>

            <div class="col-md-4 pt-5">
                <h2 class="h2 text-light border-bottom pb-3 border-light">Información Adicional</h2>
                <ul class="list-unstyled text-light footer-link-list">
                    <li><a class="text-decoration-none" href="#">Inicio</a></li>
                    <li><a class="text-decoration-none" href="#">Sobre Nosotros</a></li>
                    <li><a class="text-decoration-none" href="#">Contactanos</a></li>
                    <li><a class="text-decoration-none" href="#">Tienda</a></li>
                    <li><a class="text-decoration-none" href="#">Carrito</a></li>
                    <li><a class="text-decoration-none" href="#">perfil</a></li>
                </ul>
            </div>

        </div>
    </div>
</footer>

<!-- End Footer -->

<!-- Start Script -->
<script src=" <?php echo BASE_URL; ?>assets/js/jquery-1.11.0.min.js"></script>
<script src=" <?php echo BASE_URL; ?>assets/js/jquery-migrate-1.2.1.min.js"></script>
<script src=" <?php echo BASE_URL; ?>assets/js/bootstrap.bundle.min.js"></script>
<script src=" <?php echo BASE_URL; ?>assets/js/templatemo.js"></script>
<script src=" <?php echo BASE_URL; ?>assets/js/custom.js"></script>

<script src=" <?php echo BASE_URL; ?>assets/js/sweetalert2.all.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script>
    const base_url = '<?php echo BASE_URL; ?>';
</script>

<!-- Scripts personalizados -->
<script src="<?php echo BASE_URL; ?>assets/js/es-ES.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/carrito.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/login.js"></script>
<!-- End Script -->