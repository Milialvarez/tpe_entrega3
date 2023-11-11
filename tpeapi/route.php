<?php
require_once 'libs/Router.php';
require_once 'controllers/controller.php';
require_once 'controllers/controllerC.php';
require_once 'controllers/authController.php';


$router = new Router();


$router->addRoute('productos', 'GET', 'Controller', 'listarProductos'); // obtiene un listado de productos, pueden ser simples, ordenados por cualquier campo o filtrado por un precio en específico.

$router->addRoute('productos/:ID', 'GET', 'Controller', 'listarProductoId'); // obtiene un producto de un id específico.

$router->addRoute('oferta', 'GET', 'Controller', 'listarProductosEnOferta'); // obtiene aquellos productos que están en oferta.

$router->addRoute('tendencia', 'GET', 'Controller', 'listarProductosEnTendencia'); // obtiene aquellos productos que están en tendencia.

$router->addRoute('productos/:ID', 'PUT', 'Controller', 'modificarProducto'); // dado el id de un producto y los requerimientos del body se modifica un producto específico. Se requiere estar autorizado.

$router->addRoute('productos', 'POST', 'Controller', 'agregarProducto'); // crea un nuevo producto, se requiere estar autorizado y completar el body con los requerimientos del producto.

$router->addRoute('productos/:ID', 'DELETE', 'Controller', 'eliminarProducto'); // dado un id se elimina el producto de ese id.

$router->addRoute('productos/precio/:n1/:n2', 'GET', 'Controller', 'listarProductosPrecio'); // dados dos precios, se traen todos los productos entre esos precios.

$router->addRoute('productos/categoria/:idCategoria', 'GET', 'Controller', 'getProductosCategoria'); // dado el id de una categoría válida se obtienen todos los productos de la misma.

$router->addRoute('user/token', 'GET', 'authController', 'getToken'); // permite obtener el token de validación para realizar las funciones de crear, modificar y eliminar productos y categorías.



$router->addRoute('categoria', 'GET', 'ControllerCategorias', 'listarCategoria'); // permite listar todas las categorías existentes.

$router->addRoute('categoria/:ID', 'PUT', 'ControllerCategorias', 'modificarCategoria'); // dado un id permite modificar una categoría

$router->addRoute('categoria', 'POST', 'ControllerCategorias', 'agregarCategoria'); // completando los campos permite agregar una categoría

$router->addRoute('categoria/:ID', 'DELETE', 'ControllerCategorias', 'eliminarCategoria'); // dado un id permite eliminar una categoría.



$router->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);
