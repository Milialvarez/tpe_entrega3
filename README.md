Alumnas: 
Milagros Alvarez milagrosalvarez2604@gmail.com
Ana Bellinzona anabellinzona@gmail.com

Endpoints de nuestro trabajo:
 - Listado de todos los productos: permite obtener un listado de todos los productos y sus características en formato de objeto 
    JSON. HTTP METHOD: GET.
     Ejemplo para obtener todos los productos de forma normal: http://localhost/tpeapi/api/productos
     Ejemplo para obtener los productos dado un campo de la tabla y un tipo de orden: http://localhost/tpeapi/api/productos/?sort=precio&order=desc
     Ejemplo 2 para obtener los productos dado un campo de la tabla y un tipo de orden: http://localhost/tpeapi/api/productos/?sort=stock&order=asc
     Ejemplo para obtener todos los productos filtrando por precio: 
 - Listado de un producto en particular (por id): se ingresa el id del producto del cual se quiere ver su información y se lista 
   ese producto en particular. HTTP METHOD: GET
    Ejemplo: http://localhost/tpeapi/api/productos/7
 - Listado de productos dados dos precios determinados: se pasan por parámetro dos precios y se devuelve un objeto JSON con todos 
    los productos que se encuentran entre ese rango. HTTP METHOD: GET.
     Ejemplo: http://localhost/tpeapi/api/productos/precio/10000/16000
  - Listado de todos los productos según una categoría: dado el id de una categoría se listan todos los productos de la misma.
     Ejemplo: http://localhost/tpeapi/api/productos/categoria/1 (1 equivale a "tops"). HTTP METHOD: GET.
  - Listado de productos en tendencia: obtiene todos los productos en tendencia: HTTP METHOD: GET Ejemplo: http://localhost/tpeapi/api/tendencia
  - Listado de productos en oferta: obtiene todos los productos en oferta: HTTP METHOD: GET, ejemplo: http://localhost/tpeapi/api/oferta
    

     Aclaración: para usar las funciones de agregar, modificar y eliminar un producto o una categoría, primero se debe usar el endpoint http://localhost/tpeapi/api/user/token . El mismo permite obtener el token que autoriza a realizar esas funciones (user: webadmin y password: admin). HTTP METHOD: GET. Se debe ir a Authorization y completar los requerimientos en Basic Auth.
  - Agregar un nuevo producto: se completan todos los campos requeridos en la sección 'body' y se agrega un producto.
     Ejemplo: http://localhost/tpeapi/api/productos   METHOD: POST
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
    Ejemplo de lo que va en Authorization (Bearer token): eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwidXN1YXJpbyI6IndlYmFkbWluIiwicGFzc3dvcmQiOiIkMnkkMTAkeU54d2N2SUxkWVMzaHB2bzZkY3NidXNpeXVLdHRrM0RUUFhodHZLLmt2dUJFdG84aUJaMzYiLCJhZG1pbiI6MX0.DxYTiLh2zp2Rej0NiGo0NitATkcK8yG5htNaMnyfOgw

   -Modificar un producto: permite, si se está autorizado, modificar un producto dado su id y completando los campos requeridos. HTTP METHOD: PUT
   Ejemplo: http://localhost/tpeapi/api/productos/5
   Ejemplo del body: 
      {
            "stock": 2,
            "precio": 20000,
            "proveedor": "milagrosalvarez2604@gmail.com",
            "oferta": 1,
            "tendencia": 0
       }
     Ejemplo de lo que va en Authorization (Bearer token): eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwidXN1YXJpbyI6IndlYmFkbWluIiwicGFzc3dvcmQiOiIkMnkkMTAkeU54d2N2SUxkWVMzaHB2bzZkY3NidXNpeXVLdHRrM0RUUFhodHZLLmt2dUJFdG84aUJaMzYiLCJhZG1pbiI6MX0.DxYTiLh2zp2Rej0NiGo0NitATkcK8yG5htNaMnyfOgw

    - Eliminar un producto: permite dado un id y si se está autorizado, eliminar un producto. METHOD: DELETE
     Ejemplo: http://localhost/tpeapi/api/productos/18
     Ejemplo de lo que va en Authorization (Bearer token): eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwidXN1YXJpbyI6IndlYmFkbWluIiwicGFzc3dvcmQiOiIkMnkkMTAkeU54d2N2SUxkWVMzaHB2bzZkY3NidXNpeXVLdHRrM0RUUFhodHZLLmt2dUJFdG84aUJaMzYiLCJhZG1pbiI6MX0.DxYTiLh2zp2Rej0NiGo0NitATkcK8yG5htNaMnyfOgw

     Modificar categorías: igual a modificar un producto, se requiere el id de la categoría. METHOD: PUT
     Ejemplo: http://localhost/tpeapi/api/categoria/8
     En el body: 
     {
     "nombre": "shorts",
     "descripcion": "descripcion de prueba"
    }
    Ejemplo de lo que va en Authorization (Bearer token): eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwidXN1YXJpbyI6IndlYmFkbWluIiwicGFzc3dvcmQiOiIkMnkkMTAkeU54d2N2SUxkWVMzaHB2bzZkY3NidXNpeXVLdHRrM0RUUFhodHZLLmt2dUJFdG84aUJaMzYiLCJhZG1pbiI6MX0.DxYTiLh2zp2Rej0NiGo0NitATkcK8yG5htNaMnyfOgw

    Eliminar una categoría: METHOD: DELETE Ejemplo: http://localhost/tpeapi/api/categoria/eliminar/8
     Ejemplo de lo que va en Authorization (Bearer token): eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwidXN1YXJpbyI6IndlYmFkbWluIiwicGFzc3dvcmQiOiIkMnkkMTAkeU54d2N2SUxkWVMzaHB2bzZkY3NidXNpeXVLdHRrM0RUUFhodHZLLmt2dUJFdG84aUJaMzYiLCJhZG1pbiI6MX0.DxYTiLh2zp2Rej0NiGo0NitATkcK8yG5htNaMnyfOgw

Agregar una categoría: METHOD: POST Ejemplo: http://localhost/tpeapi/api/categoria
En el body:
{
    "nombre": "zapatillas",
    "descripcion": "zapatillas deportivas, urbanas. Multiples talles, marcas y diseños"
}
Ejemplo de lo que va en Authorization (Bearer token): eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6MSwidXN1YXJpbyI6IndlYmFkbWluIiwicGFzc3dvcmQiOiIkMnkkMTAkeU54d2N2SUxkWVMzaHB2bzZkY3NidXNpeXVLdHRrM0RUUFhodHZLLmt2dUJFdG84aUJaMzYiLCJhZG1pbiI6MX0.DxYTiLh2zp2Rej0NiGo0NitATkcK8yG5htNaMnyfOgw
    

