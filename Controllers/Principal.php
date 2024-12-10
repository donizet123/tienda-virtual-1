<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
class Principal extends Controller
{
    public function __construct() {
        parent::__construct();
        session_start();
    }
    
    // vista about
    public function about()
    {
        $data['perfil'] ='no';
        $data['title'] = 'Nosotros';
        $this->views->getView('principal', "about", $data);
    }
    // vista tienda
    public function shop($page)
    {
        $data['perfil'] ='no';
        $pagina = (empty($page)) ? 1 : $page;
        $porPagina = 9;
        $desde = ($pagina - 1) * $porPagina;
        $data['title'] = 'Nuestros productos';
        $data['productos'] = $this-> model->getProductos($desde, $porPagina);
        $data['pagina'] = $pagina;
        $total =$this->model -> getTotalProductos();
        $data['total'] = ceil($total['total'] / $porPagina);
        //$data['categorias'] = $this->model->getCategorias();
        $this->views->getView('principal', "shop", $data);
    }
    // vista detail
    public function detail($id_producto)
    {
        $data['perfil'] ='no';
        $data['producto']= $this->model->getProducto($id_producto);  
        $id_categoria = $data ['producto']['id_categoria'];      
        $data['relacionados']= $this->model->getAleatorios($id_categoria, $data ['producto']['id']);
        $data['title'] = $data['producto']['nombre'];
        $this->views->getView('principal', "detail", $data);
    }
   

    //vista categorias
    public function categorias($datos)
    {
        $data['perfil'] ='no';
        $id_categoria =1;
        $page=1;
        $array =explode(',', $datos);
        if (isset($array[0])) {
            if (!empty($array[0])) {
                $id_categoria=$array[0];
            }
        }
        if (isset($array[1])) {
            if (!empty($array[1])) {
                $id_categoria=$array[1];
            }
        }

        $pagina = (empty($page)) ? 1 : $page;
        $porPagina = 8 ;
        $desde = ($pagina - 1) * $porPagina;

        $data['pagina'] = $pagina;
        $total =$this->model -> getTotalProductosCat($id_categoria);
        $data['total'] = ceil($total['total'] / $porPagina);

        $data['productos']= $this->model->getProductosCat($id_categoria, $desde,$porPagina);
        $data['title'] = 'Categorias';
        $data['id_categoria'] = $id_categoria;
        //$data['categorias'] = $this->model->getCategorias();
       // $data['nombre_categoria'] = $this->model->getNombreCategoria($id_categoria);
        $this->views->getView('principal', "categorias", $data);
    }
 // vista contactos
 public function contact()
 {
    $data['perfil'] ='no';
     $data['title'] = 'Contactos';
     $this->views->getView('principal', "contact", $data);
 }

  // vista lista de deseos
  public function deseo()
  {
      $data['perfil'] ='no';
      $data['title'] = 'lista de deseo';
      $this->views->getView('principal', "deseo", $data);
  }
    
     //obtener producto a partir de la lista de carrito

  public function listaProductos() 
     {   
        $datos =file_get_contents('php://input');
        $json =json_decode($datos , true);
        $array ['productos']=array();
        $total = 0.00;
        if (!empty($json)) {
            foreach ($json as $producto) {
                $result =$this->model->getProducto($producto['idProducto']);
                $data['id']= $result['id'];
                $data['nombre']= $result['nombre'];
                $data['precio']= $result['precio'];
                $data['cantidad']= $producto['cantidad'];
                $data['imagen']=$result['imagen'];
                $subTotal = $result['precio'] * $producto['cantidad'];
                $data['subTotal']=number_format($subTotal, 2);
                array_push($array['productos'], $data);
                $total += $subTotal;
            }
        }
       
        $array['total'] = sprintf('%.2f', $total);
        $array['totalPaypal'] = sprintf('%.2f', $total);
        $array['moneda']=MONEDA; 
        echo json_encode($array, JSON_UNESCAPED_UNICODE);
        die();
     }

    public function busqueda($valor)
     {
        $data = $this->model->getBusqueda($valor);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
     }

     public function sendContactEmail()
    {
        if (isset($_POST['name'], $_POST['email'], $_POST['message'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            if (empty($name) || empty($email) || empty($message)) {
                $response = ['msg' => 'Todos los campos son requeridos', 'icono' => 'error'];
            } else {
                $mail = new PHPMailer(true);

                try {
                    // Configuración del servidor SMTP
                    $mail->SMTPDebug = 0;
                    $mail->isSMTP();
                    $mail->Host = HOST_SMTP;
                    $mail->SMTPAuth = true;
                    $mail->Username = USER_SMTP;
                    $mail->Password = PASS_SMTP;
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port = PUERTO_SMTP;

                    // Configuración del correo
                    $mail->setFrom(USER_SMTP, 'Formulario de Contacto');
                    $mail->addAddress(ADMIN_EMAIL); // Cambia esto al correo del administrador

                    $mail->isHTML(true);
                    $mail->Subject = "Nuevo mensaje de $name";
                    $mail->Body = "
                        <h2>Nuevo mensaje desde el formulario de contacto</h2>
                        <p><strong>Nombre:</strong> $name</p>
                        <p><strong>Correo:</strong> $email</p>
                        <p><strong>Mensaje:</strong></p>
                        <p>$message</p>
                    ";
                    $mail->AltBody = "Nombre: $name\nCorreo: $email\nMensaje: $message";

                    $mail->send();
                    $response = ['msg' => 'Correo enviado con éxito. Te responderemos pronto.', 'icono' => 'success'];
                } catch (Exception $e) {
                    $response = ['msg' => 'Error al enviar el correo: ' . $mail->ErrorInfo, 'icono' => 'error'];
                }
            }
        } else {
            $response = ['msg' => 'Petición inválida', 'icono' => 'error'];
        }

        echo json_encode($response, JSON_UNESCAPED_UNICODE);
        die();
    }
}
     

