<?php
class Admin extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
        
    }
    public function index()
    {
        $data['title'] = 'Acceso al sistema';
        $this->views->getView('admin', "login", $data);
        
    }
    
    public function Validar() 
    {
        if (isset($_POST['email']) && isset($_POST['clave'])) {
           if (empty($_POST['email']) || empty($_POST['clave'])) {
            $respuesta =array ('msg'=> 'todo los campos son requeridos','icono' =>'warning');

        }else{
            $data = $this->model->getUsuario(($_POST['email']) );
            if (empty($data)) {
                $respuesta =array ('msg'=> 'el correo  no existe','icono' =>'warning');
            }else{
                if (password_verify($_POST['clave'], $data['clave'])) {
                    $_SESSION['email']= $data['correo'];
                    $_SESSION['nombre_usuario']= $data['nombres'];
                    $respuesta =array ('msg'=> 'Bienvenido','icono' =>'success');
                }else{
                $respuesta =array ('msg'=> 'contraseña incorrecta','icono' =>'warning');

                }
            }
        }
       }else{
        $respuesta =array ('msg'=> 'error error error error','icono' =>'error');
       }
       echo json_encode($respuesta, JSON_UNESCAPED_UNICODE);
       die();
        
    }

    public function home() 
    {
        $data['title'] = 'INTERFAS ADMINISTRATIVO';
        $this->views->getView('admin/Administracion', "index", $data);
    }
    public function salir() 
    {
       session_destroy();
       header('location: '. BASE_URL);
    }

}