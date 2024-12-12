<!DOCTYPE html>
<html lang="en">

<?php include_once 'Views/template/headerAdmin.php'; ?>
<div id="layoutSidenav_content">

    <main>

        <div class="d-flex justify-content-center mb-3 mt-3 ms-4">

            <span class="font-weight-bold text-primary">
                TABLA DE PRODUCTOS
            </span>

        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#listaProducto" type="button" role="tab" aria-controls="listaProducto" aria-selected="true">lista de productos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#nuevoProducto" type="button" role="tab" aria-controls="nuevoProducto" aria-selected="false">Nuevo</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="listaProducto" role="tabpanel" aria-labelledby="home-tab">
                <!-- Tabla de usuarios -->
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblProductos">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
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

            </div>
            <div class="tab-pane fade" id="nuevoProducto" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">
                    <div class="card-body">
                        <form id="frmRegistro">
                            <div class="row">
                                <input type="hidden" id="id" name="id">
                                <input type="hidden" id="imagen_actual" name="imagen_actual">

                                <div class="col-md 3">
                                    <!-- Nombre -->
                                    <div class="form-group mb-3">
                                        <label for="nombre">titulo</label>
                                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="nombre">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <!-- precio -->
                                    <div class="form-group mb-2">
                                        <label for="precio">precio</label>
                                        <input id="precio" class="form-control" type="text" name="precio" placeholder="precio">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <!-- cantidad -->
                                    <div class="form-group mb-2">
                                        <label for="cantidad">cantidad</label>
                                        <input id="cantidad" class="form-control" type="number" name="cantidad" placeholder="cantidad">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <!-- categoria -->
                                    <div class="form-group mb-3">
                                        <label for="categoria">categoria</label>
                                        <select id="categoria" class="form-control" name="categoria">
                                            <option value="">Seleccionar</option>
                                            <?php foreach ($data['categorias'] as $categoria) { ?>
                                                <option value="<?php echo $categoria['id'] ?>"> <?php echo $categoria['categoria'] ?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="descripcion">descripcion</label>
                                        <textarea id="descripcion" class="form-control" name="descripcion" rows="3" placeholder="descripcion"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="imagen">imagen</label>
                                        <input id="imagen" class="form-control-file" type="file" name="imagen">
                                    </div>

                                </div>

                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary" type="submit" id="btnaccion">Registrar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>





    </main>



    <?php include_once 'Views/template/footerAdmin.php'; ?>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo BASE_URL . 'assets/DataTables/datatables.min.js'; ?>"></script>

    <script src="<?php echo BASE_URL . 'assets/js/modulos/productos.js'; ?>"></script>

    <script src="<?php echo BASE_URL . 'assets/js/es-ES.js'; ?>"></script>

    </body>

</html>