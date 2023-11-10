<?php
require_once 'libs/Router.php';
require_once 'controllers/controller.php';
require_once 'controllers/controllerC.php';
require_once 'controllers/authController.php';


$router = new Router();


$router->addRoute('productos', 'GET', 'Controller', 'listarProductos'); // //

$router->addRoute('productos/:ID', 'GET', 'Controller', 'listarProductoId'); // //

$router->addRoute('oferta', 'GET', 'Controller', 'listarProductosEnOferta'); // //

$router->addRoute('tendencia', 'GET', 'Controller', 'listarProductosEnTendencia'); // //

$router->addRoute('productos/:ID', 'PUT', 'Controller', 'modificarProducto'); // //

$router->addRoute('productos', 'POST', 'Controller', 'agregarProducto'); // //

$router->addRoute('productos/:ID', 'DELETE', 'Controller', 'eliminarProducto'); // //

$router->addRoute('productos/precio/:n1/:n2', 'GET', 'Controller', 'listarProductosPrecio'); // //

$router->addRoute('productos/categoria/:idCategoria', 'GET', 'Controller', 'getProductosCategoria'); // //

$router->addRoute('user/token', 'GET', 'authController', 'getToken');




$router->addRoute('categoria', 'GET', 'ControllerCategorias', 'listarCategoria'); // //

$router->addRoute('categoria/:ID', 'GET', 'ControllerCategorias', 'listarCategoria'); // //

$router->addRoute('categoria/:ID', 'PUT', 'ControllerCategorias', 'modificarCategoria'); // //

$router->addRoute('categoria', 'POST', 'ControllerCategorias', 'agregarCategoria'); // //

$router->addRoute('categoria/:ID', 'DELETE', 'ControllerCategorias', 'eliminarCategoria'); // //



$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
