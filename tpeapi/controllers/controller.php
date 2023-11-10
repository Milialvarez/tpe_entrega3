<?php
require_once 'apiController.php';
require_once 'views/view.php';
require_once 'models/modelProducto.php';
require_once 'helpers/authHelper.php';

class Controller extends apiController{
    private $authHelper;
    public function __construct(){
        parent::__construct();
        $this->authHelper = new AuthHelper();
        $this->model = new modelProducto();
    }

    public function listarProductos($params = []){
        if(isset($_GET['order']) && isset($_GET['sort'])){
            $order = $_GET['order'];
            $sort = $_GET['sort'];
            $productos = $this->model->getProductosOrdenados($order, $sort);
            if($productos){
                $this->view->response($productos, 200);
            } else {
                $this->view->response('Error', 404);
            } 
        } else if(isset($_GET['precio'])){
            $precio = $_GET['precio'];
            $productos = $this->model->getProductosDeDeterminadoPrecio($precio);
            if($productos){
                $this->view->response($productos, 200);
            } else {
                $this->view->response('No existen productos con dicho precio', 404);
            }
        }   else if($_GET != ['precio'] ||$_GET != ['order'] || $_GET != ['sort']){
            $this->view->response('no existe el campo enviado, envíe un campo válido', 401);
        } else{
            $productos = $this->model->getProductos();
            if($productos){
                $this->view->response($productos, 200);
            } else {
                $this->view->response('Error', 404);
            }
        }
    }


    public function listarProductoId($params = []){
        $id = $params[':ID'];
        $productoId = $this->model->getProductoParticularId($id);
        if($productoId){
            $this->view->response($productoId, 200);  
        } else {
            $this->view->response('No existe el producto con dicho id', 404);
        }
    }

    public function listarProductosEnOferta($params = []){
        if(empty($params)){
            $productos = $this->model->getProductosEnOferta();
            if($productos){
                $this->view->response($productos, 200);
            } else {
                $this->view->response('Error', 404);
            } 
        } else {
            $id = $params[':ID'];
            $productoId = $this->model->getProductoIdEnOferta($id);
            if($productoId){
                $this->view->response($productoId, 200);  
            } else {
                $this->view->response('El producto con ese Id no está en oferta', 404);
            }
        }
    }

    public function listarProductosEnTendencia($params = []){
        if(empty($params)){
            $productos = $this->model->getProductosEnTendencia();
            if($productos){
                $this->view->response($productos, 200);
            } else {
                $this->view->response('Error', 404);
            } 
        } else {
            $id = $params[':ID'];
            $productoId = $this->model->getProductoIdEnTendencia($id);
            if($productoId){
                $this->view->response($productoId, 200);  
            } else {
                $this->view->response('El producto con dicho id no está en tendencia', 404);
            }
        }
    }

    public function listarStock($params = []){
        $id = $params[':ID'];
        $productoId = $this->model->getProductoIdEnStock($id);
        if($productoId){
            $this->view->response($productoId, 200);  
        } else {
            $this->view->response('El producto con el id ' . $id . ' no está en stock', 404);
        }
    }

    public function modificarProducto($params = []){
        $user = $this->authHelper->currentUser();
        if(!$user) {
            $this->view->response('Unauthorized', 401);
            return;
        }

        if($user->admin != 1){
            $this->view->response('Forbidden', 403);
            return;
        }
        $id = $params[':ID'];
        $id = intval( $id, 10);

        $producto = $this->model->getProductoParticularId($id);
        
        if($producto){
            $data = $this->getData();

            $stock = $data->stock;
            $precio = $data->precio;
            $proveedor = $data->proveedor;
            $oferta = $data->oferta;
            $tendencia = $data->tendencia;

            if (!empty($stock) && !empty($precio) && !empty($proveedor) && isset($oferta) && isset($tendencia)){
                $this->model->updateProducto($stock, $precio, $proveedor, $oferta, $tendencia, $id);
                $this->view->response('Se ha modificado con éxito', 200);
            } else {
                $this->view->response('Error al modificar', 404);
            }
        }
    }

    public function agregarProducto($params = []){
        $user = $this->authHelper->currentUser();
        if(!$user) {
            $this->view->response('Unauthorized', 401);
            return;
        }

        if($user->admin != 1){
            $this->view->response('Forbidden', 403);
            return;
        }
        $data = $this->getData();

        $producto = $data->producto;
        $stock = $data->stock;
        $id_categoria = $data->id_categoria;
        $precio = $data->precio;
        $proveedor = $data->proveedor;
        $descripcion = $data->descripcion;
        $imagen = $data->imagen;
        $oferta = $data->oferta;            
        $tendencia = $data->tendencia;


        if (!empty($producto) && !empty($id_categoria) && !empty($stock) && !empty($precio) && !empty($proveedor) && !empty($descripcion) && !empty($imagen) && !empty($oferta) && !empty($tendencia) && isset($oferta) && isset($tendencia)){
            $this->model->addNuevoProducto($producto, $id_categoria, $stock, $precio, $proveedor, $descripcion, $imagen, $oferta, $tendencia);
            $this->view->response('Se ha agregado con éxito', 200);
        } else {
            $this->view->response('Error al agregar', 404);
        }
    }

    public function eliminarProducto($params = []){
        $user = $this->authHelper->currentUser();
        if(!$user) {
            $this->view->response('Unauthorized', 401);
            return;
        }

        if($user->admin != 1){
            $this->view->response('Forbidden', 403);
            return;
        }
        $id = $params[':ID'];

        $productoId = $this->model->getProductoParticularId($id);

        if($productoId){
            $this->model->deleteProducto($id);
            $this->view->response('Se pudo eliminar el producto con el id ' . $id, 200);
        } else {
            $this->view->response('No se pudo eliminar el producto con el id ' . $id, 404);
        }
    }

    public function listarProductosPrecio($params = []){
        $precio1 = $params[':n1'];
        $precio2 = $params[':n2'];

        $productos = $this->model->getProductosPorPrecio($precio1, $precio2);
        if ($productos) {
            $this->view->response($productos, 200);
        } else {
            $this->view->response('No disponemos de productos entre esos valores', 404);
        }
    }

    public function getProductosCategoria($params=[]){
        if(!empty($params)){
            $idCategoria = $params[':idCategoria'];

            $existe = $this->model->getCategoriaId($idCategoria);
            if($existe){
                $productos = $this->model->getProductosCategoria($idCategoria);
                if(!empty($productos)){
                    $this->view->response($productos, 200);
                } else {
                    $this->view->response("no existen productos de esa categoría", 404);
                }
            } else {
                $this->view->response("no existe la categoría enviada", 400);
            }
        } else {
            $this->view->response("complete todos los campos", 400);
        }
    }

    public function filtrarPorPrecio($params = []){
        $orden = $_GET['orden'];

        if($orden == 'ascendente'){
            $productosPorPrecio = $this->model->getProductosPorPrecioAscendente();
            if($productosPorPrecio){
                $this->view->response($productosPorPrecio, 200);
            } else {
                $this->view->response('Error interno', 500);
            }
        } else if($orden == 'descendente'){
            $productosPorPrecio = $this->model->getProductosPorPrecioDescendiente();
            if($productosPorPrecio){
                $this->view->response($productosPorPrecio, 200);
            } else {
                $this->view->response('Error interno', 500);
            }
        } else {
            $this->view->response('Ingrese el orden', 404);
        }
    }
}
?>