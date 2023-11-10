Alumnas: 
Milagros Alvarez milagrosalvarez2604@gmail.com
Ana Bellinzona anabellinzona@gmail.com

Endpoints de nuestro trabajo:
 - Listado de todos los productos: permite obtener un listado de todos los productos y sus características en formato de objeto 
    JSON.
     Ejemplo: http://localhost/tpeapi/api/productos
 - Listado de un producto en particular (por id): se ingresa el id del producto del cual se quiere ver su información y se lista 
   ese producto en particular.
    Ejemplo: http://localhost/tpeapi/api/productos/7
 - Listado de productos dados dos precios determinados: se pasan por parámetro dos precios y se devuelve un objeto JSON con todos 
    los productos que se encuentran entre ese rango.
     Ejemplo: http://localhost/tpeapi/api/productos/precio/10000/16000
  - Listado de todos los productos según una categoría: dado el id de una categoría se listan todos los productos de la misma.
     Ejemplo: http://localhost/tpeapi/api/productos/categoria/1 (1 equivale a "tops").

     Aclaración: para usar las funciones de agregar, modificar y eliminar un producto o una categoría, primero se debe usar el endpoint http://localhost/tpeapi/api/user/token . La misma permite obtener el token que autoriza a realizar esas funciones (user: webadmin y password: admin).
  - Agregar un nuevo producto: se completan todos los campos requeridos en la sección 'body' y se agrega un producto.
     Ejemplo: http://localhost/tpeapi/api/productos
     Ejemplo de lo que va en el body:
       {
         "producto": "prueba de un vestido nuevo",
          "stock": 11,
          "id_categoria": 1,
          "precio": 9000,
          "proveedor": "milagrosalvarez2604@gmail.com",
          "descripcion": "prueba de un producto nuevo",
          "imagen": "https://www.distritomoda.com.ar/sites/default/files/styles/producto_interior/public/imagenes/whatsapp_image_2022-10-    04_at_10.55.57_am_1664904151.jpeg?itok=vYkqCex-",
          "oferta": 1,     
          "tendencia": 1
        }
   
   

