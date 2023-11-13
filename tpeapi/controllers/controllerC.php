<?php
require_once 'apiController.php';
require_once 'models/modelCategoria.php';
require_once 'helpers/authHelper.php';
class ControllerCategorias extends apiController{
    private $authHelper;
    public function __construct(){
        parent::__construct();
        $this->model = new modelCategoria();
        $this->authHelper = new AuthHelper();
    }

    public function listarCategoria($params =[]){
            $categorias = $this->model->listarCategorias();
            if($categorias){
                $this->view->response($categorias, 200);
            } else {
                $this->view->response('Error interno', 500);
            } 
    }

    public function modificarCategoria($params = []){
        $user = $this->authHelper->currentUser();
        if(!$user) {
            $this->view->response('Unauthorized', 401);
            return;
        }

        if($user->admin!=1){
            $this->view->response('Forbidden', 403);
            return;
        }
        $id = $params[':ID'];

        $categoriaID = $this->model->getCategoriaPorId($id);
        
        if($categoriaID){
            $data = $this->getData();

            $nombre = $data->nombre;
            $descripcion = $data->descripcion;

            if (!empty($nombre) && !empty($descripcion)){
                $this->model->modificarCategoria($nombre, $descripcion, $id);
                $this->view->response('Se ha modificado con éxito', 204);
            } else {
                $this->view->response('Complete los campos', 400);
            }
        } else {
            $this->view->response('No existe categoria con ese id', 404);
        }
    }

    public function agregarCategoria($params = []){
        $user = $this->authHelper->currentUser();
        if(!$user) {
            $this->view->response('Unauthorized', 401);
            return;
        }

        if($user->admin!=1){
            $this->view->response('Forbidden', 403);
            return;
        }
        $data = $this->getData();

        $nombre = $data->nombre;
        $descripcion = $data->descripcion;

        if ($nombre && $descripcion){
            $this->model->addNuevaCategoria($nombre, $descripcion);
            $this->view->response('Se ha agregado la categoría con éxito', 201);
        } else {
            $this->view->response('Error al agregar', 400);
        }
    }

    public function eliminarCategoria($params = []){
        $user = $this->authHelper->currentUser();
        if(!$user) {
            $this->view->response('Unauthorized', 401);
            return;
        }

        if($user->admin!=1){
            $this->view->response('Forbidden', 403);
            return;
        }
        $id = $params[':ID'];

        $productoId = $this->model->getCategoriaPorId($id);

        if($productoId){
            $exito = $this->model->deleteTipoDeCategoria($id);
            if($exito){
                $this->view->response('Se pudo eliminar la categoria con el id ' . $id, 200);
            } else {
                $this->view->response('No se pudo eliminar la categoria ya que contiene productos', 500);
            }
        } else {
            $this->view->response('No se pudo eliminar ya que no existe la categoria con el id' . $id, 404);
        }
    }
}
?>