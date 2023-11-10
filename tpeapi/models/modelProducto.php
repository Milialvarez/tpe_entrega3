<?php
require_once 'config.php';
class modelProducto{
    private $db;

    public function __construct(){
        $this->db = new PDO ('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB.';charset=utf8',MYSQL_USER, MYSQL_PASS);
    }

    public function getProductos(){
        $query = $this->db->prepare('SELECT * FROM productos');
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

    function getProductosCategoria($categorias){
        $query = $this->db->prepare('SELECT * FROM productos WHERE id_categoria = ?');
        $query->execute([$categorias]);
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

    public function getProductoParticularId($id){
        $query = $this->db->prepare('SELECT * FROM productos WHERE id = ?');
        $query->execute([$id]);
        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }

    public function addNuevoProducto($producto, $id_categoria, $stock, $precio, $proveedor, $descripcion, $imagen, $oferta, $tendencia){
        $query = $this->db->prepare('INSERT INTO productos (producto, id_categoria, stock, precio, proveedor, descripcion, imagen, oferta, tendencia) VALUES (?,?,?,?,?,?,?,?,?)');
        $query->execute([$producto, $id_categoria, $stock, $precio, $proveedor, $descripcion, $imagen, $oferta, $tendencia]);
    }

    public function deleteProducto($producto){
        $query = $this->db->prepare('DELETE FROM productos WHERE id = ?');
        $query->execute([$producto]);
    }

    public function updateProducto($stock, $precio, $proveedor, $oferta, $tendencia, $id){
        $query = $this->db->prepare('UPDATE productos SET precio = ?, stock = ?, proveedor = ? , oferta = ?, tendencia = ? WHERE id = ?');
        $query->execute([$precio, $stock, $proveedor, $oferta, $tendencia, $id]);
    }

    public function getProductosEnOferta(){
        $query = $this->db->prepare('SELECT * FROM productos WHERE oferta = ?');
        $query->execute([true]);
        $producto = $query->fetchAll(PDO::FETCH_OBJ);
        return $producto;
    }

    public function getProductoIdEnStock($id){
        $query = $this->db->prepare('SELECT * FROM productos WHERE stock = ?');
        $query->execute([$id]);
        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }

    public function getProductoIdEnOferta($id){
        $query = $this->db->prepare('SELECT * FROM productos WHERE oferta = ? AND id = ?');
        $query->execute([true, $id]);
        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }

    public function getProductosEnTendencia(){
        $query = $this->db->prepare('SELECT * FROM productos WHERE tendencia = ?');
        $query->execute([true]);
        $producto = $query->fetchAll(PDO::FETCH_OBJ);
        return $producto;
    }

    public function getProductoIdEnTendencia($id){
        $query = $this->db->prepare('SELECT * FROM productos WHERE tendencia = ? AND id = ?');
        $query->execute([true, $id]);
        $producto = $query->fetch(PDO::FETCH_OBJ);
        return $producto;
    }

    public function getProductosPorPrecio($precio1, $precio2){
        $query = $this->db->prepare('SELECT * FROM productos WHERE (precio > ?) AND (precio < ?)');
        $query->execute([$precio1, $precio2]);
        $producto = $query->fetchAll(PDO::FETCH_OBJ);
        return $producto;
    }

    public function getCategoriaId($id){
        $query = $this->db->prepare('SELECT * FROM categorias WHERE id = ?');
        $query->execute([$id]);
        $categoria = $query->fetchAll(PDO::FETCH_OBJ);
        return $categoria;
    }

    public function getProductosPorPrecioAscendente(){
        $query = $this->db->prepare('SELECT * FROM productos ORDER BY precio ASC');
        $query->execute();
        $producto = $query->fetchAll(PDO::FETCH_OBJ);
        return $producto;
    }
    
    public function getProductosPorPrecioDescendente(){
        $query = $this->db->prepare('SELECT * FROM productos ORDER BY precio DESC');
        $query->execute();
        $producto = $query->fetchAll(PDO::FETCH_OBJ);
        return $producto;
    }

    public function getProductosOrdenados($order, $sort){
        $query = $this->db->prepare("SELECT * FROM productos ORDER BY $sort $order");
        $query->execute();
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
    public function getProductosDeDeterminadoPrecio($precio){
        $query = $this->db->prepare('SELECT * FROM productos WHERE precio = ?');
        $query->execute([$precio]);
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
}
?>