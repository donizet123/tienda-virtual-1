<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class Clientes extends Controller
{
    public function __construct()
    {
        parent::__construct();
        session_start();   
        
    }
    public function index()
    {
        if (empty($_SESSION['correoCliente'])) {
            header('location: ' . BASE_URL);
        }
        $data['perfil'] ='si';
        $data['title'] = 'Tu perfil';
        $data['verificar'] = $this->model->getVerificar($_SESSION['correoCliente']);

        $this->views->getView('principal', "perfil", $data);
    }

    public function registroDirecto()
    {

        if (isset($_POST['nombre']) && isset($_POST['clave'])) {
            if (empty($_POST['nombre']) || empty($_POST['correo'])  || empty($_POST['clave'])) {
                $mensaje =  array('msg' => 'todos los campos son recorridos', 'icono' => 'error');
            } else {
                $nombre = $_POST['nombre'];
                $correo = $_POST['correo'];
                $clave = $_POST['clave'];
                $verificar = $this->model->getVerificar($correo);
                if (empty($verificar)) {
                    $token = md5($correo);
                    $hash = password_hash($clave, PASSWORD_DEFAULT);
                    $data = $this->model->registroDirecto($nombre, $correo, $hash, $token);
                    if ($data > 0) {
                        $_SESSION['correoCliente'] = $correo;
                        $_SESSION['nombreCliente'] = $nombre;

                        $mensaje =  array('msg' => 'registrado con exito', 'icono' => 'success', 'token' => $token);
                    } else {
                        $mensaje =  array('msg' => 'error al registrarse', 'icono' => 'error');
                    }
                } else {
                    $mensaje =  array('msg' => 'ya tienes una cuenta registrada', 'icono' => 'warning');
                }
            }

            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    public function enviarCorreo()
    {
        if (isset($_POST['correo']) && isset($_POST['token'])) {
            $mail = new PHPMailer(true);
            try {
                //Server settings
                $mail->SMTPDebug = 0;
                $mail->isSMTP();
                $mail->Host       = HOST_SMTP;
                $mail->SMTPAuth   = true;
                $mail->Username   = USER_SMTP;
                $mail->Password   = PASS_SMTP;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = PUERTO_SMTP;

                //Recipients
                $mail->setFrom('rodriguezairafrank@gmail.com', TITLE);
                $mail->addAddress($_POST['correo']);

                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Mensaje desde la: ' . TITLE;
                $mail->Body    = 'Para verificar tu correo en nuestra tienda <a href="' . BASE_URL . 'clientes/verificarCorreo/' . $_POST['token'] . '">HAS CLICK AQUI</a>';
                $mail->AltBody = 'GRACIAS POR LA ELECCION';

                $mail->send();
                $mensaje =  array('msg' => 'correo enviado REVIDA TU BANDEJA DE ENTRADA O SPAN ', 'icono' => 'success');
            } catch (Exception $e) {
                $mensaje =  array('msg' => 'CORREO NO LOGRADO EN ENVIAR: ' . $mail->ErrorInfo, 'icono' => 'error');
            }
        } else {
            $mensaje =  array('msg' => 'ERROR SUCIDATE TSMR CARAJOO: ', 'icono' => 'error');
        }
        echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function verificarCorreo($token)
    {
        $verificar = $this->model->getToken($token);
        if (!empty($verificar)) {
            $data = $this->model->actualizarVerify($verificar['id']);
            print_r($data);
            header('location: ' . BASE_URL . 'clientes');
        }
    }

    //login directo :)

    public function loginDirecto()
    {

        if (isset($_POST['correoLogin']) && isset($_POST['claveLogin'])) {
            if (empty($_POST['correoLogin']) || empty($_POST['claveLogin'])) {
                $mensaje =  array('msg' => 'todos los campos son recorridos', 'icono' => 'error');
            } else {
                
                $correo = $_POST['correoLogin'];
                $clave = $_POST['claveLogin'];
                $verificar = $this->model->getVerificar($correo);
                if (!empty($verificar)) {
                    if (password_verify($clave, $verificar['clave'])) {
                        $_SESSION['correoCliente'] = $verificar['correo'];
                        $_SESSION['nombreCliente'] = $verificar['nombre'];

                        $mensaje =  array('msg' => 'esta bien', 'icono' => 'success');
                    } else {
                        $mensaje =  array('msg' => 'Contraseña Incorrecta', 'icono' => 'error');
                    }
                } else {
                    $mensaje =  array('msg' => 'El correo mencionado no existe', 'icono' => 'warning');
                }
            }

            echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
            die();
        }
    }

    //registrar pedidos
    public function registrarPedido()  
    {
        $datos =file_get_contents('php://input');
        $json =json_decode($datos , true);
        $pedidos = $json['pedidos'];
        $productos = $json['productos'];
        if (is_array($pedidos) && is_array($productos)) {
            $id_transaccion = $pedidos['id'];
            $monto =$pedidos['purchase_units'][0]['amount']['value'];
            $estado =$pedidos['status'];
            $fecha =date('Y-m-d H:i:s');
            $email =$pedidos['payer']['email_address'];
            $nombre =$pedidos['payer']['name']['given_name']; 
            $apellido =$pedidos['payer']['name']['surname'];
            $direccion =$pedidos['purchase_units'][0]['shipping']['address']['address_line_1'];
            $ciudad =$pedidos['purchase_units'][0]['shipping']['address']['admin_area_2'];
            $email_user = $_SESSION['correoCliente'];
            $data = $this->model->registrarPedido($id_transaccion,$monto,$estado,$fecha,$email,$nombre,$apellido,$direccion,$ciudad,$email_user);
            if ($data >0) {
                foreach ($productos as $producto) {
                   $temp=$this->model->getProducto($producto['idProducto']);
                   $this ->model-> registrarDetalle($data, $temp['nombre'],$temp['precio'],$producto['cantidad'] );
                }
                $mensaje =array('msg' => 'pedido registrado correctamente' ,'icono' => 'success');

            } else {
               $mensaje =array('msg' => 'error al registrar el pedido' ,'icono' => 'error');
            }
            
        }else{
          $mensaje =array('msg' => 'ERROR ERROR ERROR ERROR ERROR ERROR F' ,'icono' => 'error');
        }
        echo json_encode($mensaje);
        die();
    }

    //listar productos pendientes

    public function listarPendientes() 
    {
        $data = $this->model->getPedidos(0);
        echo json_encode($data);
        die();
    }

    public function salir()  
    {
        session_destroy();
        header('location: '.BASE_URL);
    }

}

