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
     Ejemplo: http://localhost/tpeapi/api/productos/categoria/1 (1 equivale a "tops"
   
   

