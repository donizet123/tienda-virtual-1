<?php
class PrincipalModel extends Query{
 
    public function __construct()
    {
        parent::__construct();
    }

    //funcion  para facilitar la busqueda de productos

    public function getallCategorias()
    {
        $sql ="SELECT * FROM  categorias";
        return $this->selectall($sql);
    }

    public function getProducto($id_producto)
    {
        $sql ="SELECT p.*, c.categoria FROM productos p INNER JOIN categorias c ON p.id_categoria =c.id WHERE p.id = $id_producto";
        return $this->select($sql);
    }

    public function getProductos($desde, $porPagina)
    {
        $sql= "SELECT * FROM productos LIMIT $desde , $porPagina";
        return $this->selectAll($sql);

    }

    //obtiene el total de productos
    public function getTotalProductos()
    {
        $sql= "SELECT COUNT(*) AS total FROM productos ";
        return $this->select($sql);

    }

    //productos relacinados con la categoria
    public function getProductosCat($id_categoria, $desde, $porPagina)
    {
        $sql= "SELECT * FROM productos WHERE id_categoria = $id_categoria LIMIT $desde , $porPagina";
        return $this->selectAll($sql);

    }

    //obtener total de productos relacionados con la categoria
    public function getTotalProductosCat($id_categoria)
    {
        $sql= "SELECT COUNT(*) AS total FROM productos WHERE id_categoria = $id_categoria";
        return $this->select($sql);

    }

    //productos relacinados con la aleatorios
    public function getAleatorios($id_categoria, $id_producto)
    {
        $sql= "SELECT * FROM productos WHERE id_categoria =$id_categoria AND id !=$id_producto  ORDER BY RAND() LIMIT 15";
        return $this->selectAll($sql);

    }

    //busqueda de productos
    public function getBusqueda($valor)
    {
        $sql ="SELECT * FROM productos WHERE nombre LIKE '%".$valor."%' OR descripcion LIKE '%".$valor."%' LIMIT 6";
        return $this->selectAll($sql);
    }



//funciona para la los nombres de los productos :c tmr no saleeeeeeeee
    public function getNombreCategoria($id_categoria) {
        $sql = "SELECT categoria FROM categorias WHERE id = $id_categoria"; // Aquí usas la concatenación
        return $this->select($sql); // Asumiendo que `select` devuelve un solo resultado
    }
    
}
 
?>