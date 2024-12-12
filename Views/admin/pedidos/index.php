<!DOCTYPE html>
<html lang="en">

<?php include_once 'Views/template/headerAdmin.php'; ?>


<div id="layoutSidenav_content">

    <main>

        <div class="d-flex justify-content-center mb-3 mt-3 ms-4">

            <span class="font-weight-bold text-primary">
                TABLA DE PEDIDOS 
            </span>

        </div>

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#listaPedidos" type="button" role="tab" aria-controls="listaPedidos" aria-selected="true">lista de pedidos</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#pedidosFinalizados" type="button" role="tab" aria-controls="pedidosFinalizados" aria-selected="false">pedidos completados</button>
            </li>
        </ul>

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="listaPedidos" role="tabpanel" aria-labelledby="home-tab">
                <!-- Tabla de usuarios -->
                <div class="card mt-3">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblPendientes">
                                <thead>
                                    <tr>
                                        <th>Id Transaccion</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Correo</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Direccion</th>
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
            <div class="tab-pane fade" id="pedidosFinalizados" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover align-middle" style="width: 100%;" id="tblFinalizados">
                                <thead>
                                    <tr>
                                        <th>Id Transaccion</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                        <th>Fecha</th>
                                        <th>Correo</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Direccion</th>
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
        </div>





    </main>



    <?php include_once 'Views/template/footerAdmin.php'; ?>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="<?php echo BASE_URL . 'assets/DataTables/datatables.min.js'; ?>"></script>

    <script src="<?php echo BASE_URL . 'assets/js/modulos/pedidos.js'; ?>"></script>

    <script src="<?php echo BASE_URL . 'assets/js/es-ES.js'; ?>"></script>

    </body>

</html>