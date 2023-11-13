<?php
require_once 'config.php';
class modelCategoria{
    private $db;

    public function __construct(){
        $this->db = new PDO ('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB.';charset=utf8',MYSQL_USER, MYSQL_PASS);
    }

    function listarCategorias(){
        $query = $this->db->prepare('SELECT * FROM categorias');
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    public function addNuevaCategoria($tipoDeCategoria, $descripcion){
        $query = $this->db->prepare('INSERT INTO categorias (nombre, descripcion) VALUES (?,?)');
        $query->execute([$tipoDeCategoria, $descripcion]);
    }

    public function deleteTipoDeCategoria($tipoDeCategoria){
        $query = $this->db->prepare ('SELECT * FROM productos WHERE id_categoria = ?');
        $query->execute([$tipoDeCategoria]);
        $producto = $query->fetchAll(PDO::FETCH_OBJ);

        if(empty($producto)){
            $query = $this->db->prepare('DELETE FROM categorias WHERE id = ?');
            $query->execute([$tipoDeCategoria]);
        } else {
            return false;
        }
    }

    public function modificarCategoria($nuevoNombreDeLaCategoria, $descripcion, $id){
        $query = $this->db->prepare('UPDATE categorias SET nombre = ?, descripcion = ? WHERE id = ?');
        $query->execute([$nuevoNombreDeLaCategoria, $descripcion, $id]);
    }

    public function getCategoriaPorId($id){
        $query = $this->db->prepare('SELECT * FROM categorias WHERE id = ?');
        $query->execute([$id]);
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }
}
?>