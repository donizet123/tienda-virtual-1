<!DOCTYPE html>
<html lang="en">

<?php include_once 'Views/template/headerAdmin.php'; ?>


<div id="layoutSidenav_content">

    <main>
        <div class="d-flex justify-content-center mb-3 mt-3 ms-4">

            <span class="font-weight-bold text-primary">
               TABLA DE CATEGORIAS
            </span>

        </div>
        <!-- Texto con botón incrustado -->
        <div class="d-flex justify-content-start mb-3 mt-3 ms-4">

            <span>
                Agregar
                <button class="btn btn-primary mb-3" type="button" id="nuevo_registro">nueva</button>
                categoria
            </span>
        </div>



        <!-- Botón para abrir el modal -->

        <!-- Tabla de usuarios -->
        <div class="card mt-3">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblCategorias">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Imagen</th>
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
                            <input type="hidden" id="imagen_actual" name="imagen_actual">

                            <!-- Nombre -->
                            <div class="form-group mb-3">
                                <label for="categoria">Nombre</label>
                                <input id="categoria" class="form-control" type="text" name="categoria" placeholder="Categorias">
                            </div>
                            <div class="form-group">
                                <label for="imagen">imagen</label>
                                <input id="imagen" class="form-control-file" type="file" name="imagen">
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" id="btnaccion">Registrar</button>
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>



    <?php include_once 'Views/template/footerAdmin.php'; ?>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo BASE_URL . 'assets/DataTables/datatables.min.js'; ?>"></script>

    <script src="<?php echo BASE_URL . 'assets/js/modulos/categorias.js'; ?>"></script>

    <script src="<?php echo BASE_URL . 'assets/js/es-ES.js'; ?>"></script>

    </body>

</html>