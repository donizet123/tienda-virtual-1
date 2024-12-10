<?php
class Productos extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();
    }
    public function index()
    {
        $data['title'] = 'productos';
        $data['categorias'] = $this->model->getCategorias();
        $this->views->getView('admin/productos', "index", $data);
    }
    public function listar()
    {
        $data = $this->model->getProductos(1);
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['imagen'] = '<img class="img-thumbnail" src="' . ($data[$i]['imagen']) . '" alt="' . ($data[$i]['nombre']) . '" width="100">';
            $data[$i]['accion'] = '<div class="d-flex">
                <button class="btn btn-primary" type="button" onclick="editPro(' . ($data[$i]['id']) . ')"><i class="fa fa-edit"></i></button>
                <button class="btn btn-danger" type="button" onclick="eliminarPro(' . ($data[$i]['id']) . ')"><i class="fa fa-trash"></i></button>
            </div>';
        }
        echo json_encode($data);
        die();
    }


    public function registrar()
    {
        if (isset($_POST['nombre']) && isset($_POST['precio'])) {
            $nombre = $_POST['nombre'];
            $precio = $_POST['precio'];
            $cantidad = $_POST['cantidad'];
            $descripcion = $_POST['descripcion'];
            $categoria = $_POST['categoria'];

            $imagen = $_FILES['imagen'];
            $tmp_name = $imagen['tmp_name'];
            $id = $_POST['id'];
            $ruta = 'assets/img/productos/';
            $nombreImg = date('YmdHis');
            if (empty($nombre) || empty($precio) || empty($cantidad)) { // Cerrado el paréntesis que faltaba
                $respuesta = array('msg' => 'Todos los campos son requeridos', 'icono' => 'warning');
            } else {
                if (!empty($imagen['name'])) {
                    $destino = $ruta . $nombreImg . '.png'; // Añadido el punto antes de la extensión
                } else if (!empty($_POST['imagen_actual']) && empty($imagen['name'])) {
                    $destino = $_POST['imagen_actual'];
                } else {
                    $destino = $ruta . 'default.png';
                }

                if (empty($id)) {
                    $data = $this->model->registrar($nombre, $descripcion, $precio, $cantidad, $destino, $categoria);
                    if ($data > 0) {

                        if (!empty($imagen['name'])) { // Corregido el acceso a la variable de $_FILES
                            move_uploaded_file($tmp_name, $destino);
                        }

                        $respuesta = array('msg' => 'producto registrado', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al registrar', 'icono' => 'error');
                    }
                } else {
                    $data = $this->model->modificar($nombre, $descripcion, $precio, $cantidad, $destino, $categoria, $id);

                    if ($data == 1) {
                        if (!empty($imagen['name'])) { // Corregido el acceso a la variable de $_FILES
                            move_uploaded_file($tmp_name, $destino);
                        }
                        $respuesta = array('msg' => 'Producto modificado', 'icono' => 'success');
                    } else {
                        $respuesta = array('msg' => 'Error al modificar', 'icono' => 'error');
                    }
                }
            }
            echo json_encode($respuesta);
        }
        die();
    }




    //eliminar pro
    public function delete($idPro)
    {
        if (is_numeric($idPro)) {
            $data = $this->model->eliminar($idPro);
            if ($data == 1) {
                $respuesta = array('msg' => 'Productos eliminado', 'icono' => 'success');
            } else {
                $respuesta  = array('msg' => 'Error al eliminar', 'icono' => 'error');
            }
        } else {
            $respuesta  = array('msg' => 'Error erro error error', 'icono' => 'error');
        }
        echo json_encode($respuesta);
        die();
    }

    public function edit($idPro)
    {
        if (is_numeric($idPro)) {
            $data = $this->model->getProducto($idPro);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
