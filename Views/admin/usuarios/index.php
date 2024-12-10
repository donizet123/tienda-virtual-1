<!DOCTYPE html>
<html lang="en">

<?php include_once 'Views/template/headerAdmin.php'; ?>


<div id="layoutSidenav_content">

    <main>
        <!-- Botón para abrir el modal -->
        <button class="btn btn-primary mb-3" type="button" id="nuevo_registro">Nuevo</button>

        <!-- Tabla de usuarios -->
        <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" style="width: 100%;" id="tblUsuarios">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Correos</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Aquí se rellenan los datos dinámicamente -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

       

        <!-- Modal para registro de usuarios -->
        <div id="nuevoModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title" id="titleModal">Nuevo Registro</h5>
                        <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="frmRegistro">
                        <div class="modal-body">
                            <input type="hidden" id="id" name="id">
                            <!-- Nombre -->
                            <div class="form-group mb-3">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombres">
                            </div>
                            <!-- Apellido -->
                            <div class="form-group mb-3">
                                <label for="apellido">Apellido</label>
                                <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellidos" >
                            </div>
                            <!-- Correo -->
                            <div class="form-group mb-3">
                                <label for="correo">Correo</label>
                                <input id="correo" class="form-control" type="email" name="correo" placeholder="Correo electronico">
                            </div>
                            <!-- Contraseña -->
                            <div class="form-group mb-3">
                                <label for="clave">Contraseña</label>
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="Contraseña" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" id="btnaccion">Registrar</button>
                            <button class="btn btn-danger" type="button" data-bs-dismiss= "modal" >Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>



    <?php include_once 'Views/template/footerAdmin.php'; ?>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo BASE_URL . 'assets/DataTables/datatables.min.js'; ?>"></script>

    <script src="<?php echo BASE_URL . 'assets/js/modulos/usuarios.js'; ?>"></script>

    <script src="<?php echo BASE_URL . 'assets/js/es-ES.js'; ?>"></script>

    </body>

</html>