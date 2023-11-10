-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-11-2023 a las 00:01:17
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `indumentariafemenina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Tops', ''),
(2, 'Vestidos', ''),
(3, 'Remeras', ''),
(4, 'Blusas', ''),
(6, 'Polleras', 'prenda que proviene de los bastidores de alambre y palos usados para guardar las formas del vestido español del siglo XVI o XVII'),
(7, 'Jeans', ''),
(8, 'Shorts', ''),
(9, 'zapatillas', 'las zapatillas son...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `producto` varchar(45) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `oferta` tinyint(1) NOT NULL,
  `tendencia` tinyint(1) NOT NULL,
  `proveedor` varchar(45) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `producto`, `id_categoria`, `stock`, `precio`, `oferta`, `tendencia`, `proveedor`, `descripcion`, `imagen`) VALUES
(1, 'Top negro', 1, 23, 23000, 1, 0, 'milagrosalvarez2604@gmail.com', 'Top strapless con corte cruzado disponible en colores negro, azul, blanco y lila', 'https://www.distritomoda.com.ar/sites/default/files/styles/producto_interior/public/imagenes/diseno_sin_titulo_-_2023-05-19t121153.395_1684509123.jpg?itok=dLUjDmLl'),
(2, 'Vestido orange', 2, 11, 17000, 0, 0, 'anabellinzona@gmail.com', 'Vestido modelo asimétrico en color naranja\r\n', 'https://i.pinimg.com/736x/99/e5/39/99e5390c6cc491b96264df2c1ecb2531.jpg'),
(3, 'Vestido ani', 2, 5, 10000, 1, 1, 'maguicejas@gmail.com', 'Vestido manga larga y cuello polera color rosa', 'https://www.distritomoda.com.ar/sites/default/files/styles/producto_interior/public/imagenes/img_4487-rotated_1676296400.jpeg?itok=wqUqS30H'),
(4, 'Vestido katy', 2, 11, 14000, 0, 0, 'luisinaaguilera@gmail.com', 'Vestido con tela de lentejuelas y tirantes espalda abierta disponible en negro y plateado', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSN3U4dwb9Ub4XlFdr5UYGCe-_8cp4h_JuCFQ&usqp=CAU'),
(5, 'top asimetrico black', 1, 14, 9000, 0, 0, 'luisinaaguilera@gmail.com', 'Top asimetrico con cuello polera', 'https://i0.wp.com/domenicoshop.cl/wp-content/uploads/2022/07/WhatsApp-Image-2022-08-03-at-3.36.31-PM.jpeg?fit=1242%2C1538&ssl=1'),
(6, 'Vestido chocolate', 2, 7, 40000, 1, 0, 'anabellinzona@gmail.com', 'Vestido de fiesta en satén, color chocolate', 'https://www.distritomoda.com.ar/sites/default/files/styles/producto_interior/public/imagenes/whatsapp_image_2022-01-19_at_09.34.23_1642597580.jpeg?itok=r3kenquk'),
(10, 'Cargo beige', 7, 11, 19000, 0, 1, 'maguicejas@gmail.com', 'Jean cargo color beige disponible en talles 40 y 42', 'https://acdn.mitiendanube.com/stores/001/147/209/products/img_51141-28913eeaf324fdfe0716842461099324-640-0.jpeg'),
(11, 'Mini tableada', 6, 8, 8000, 0, 0, 'anabellinzona@gmail.com', 'Mini tableada de jean en talles 38 y 40', 'https://d22fxaf9t8d39k.cloudfront.net/d992ab15ccd88ae571c72b09ff7e6d28e9f9d98e7bb345455f1b35829dedb10885285.jpeg'),
(12, 'Mini jean roturas', 6, 23, 11000, 1, 1, 'anabellinzona@gmail.com', 'Mini de jean con roturas super cancheras, talles 36, 38, 40.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTHURPIa9Yy50OfD54WKWO91Yn_JBQ1-Z6Ng&usqp=CAU'),
(13, 'Reme Mica', 3, 23, 12000, 0, 0, 'luisinaaguilera@gmail.com', 'Remera basica blanca de algodon con estampado verde', 'https://luleamindful.com/wp-content/uploads/2023/04/10.4-REMERA-OVERSIZE-NO-GENDER-DESCENDIENTES.jpg'),
(14, 'Reme DBDS', 3, 11, 5500, 0, 0, 'romanmeclazcke@gmail.com', 'Remera de algodon disponible en blanco y negro con espalda estampada en colores neon', 'https://d22fxaf9t8d39k.cloudfront.net/2c4a1453fa1f0375c6c3579379bc41304433be39dfcf0b4bc53514afee7618137239.jpg'),
(15, 'Short de jean', 8, 11, 17000, 0, 0, 'luisinaaguilera@gmail.com', 'Short de jean tiro medio disponible en talles 36 38 y 40', 'https://d2r9epyceweg5n.cloudfront.net/stores/001/645/978/products/img_27741-5a7a4389954cebee5416934874562557-480-0.jpg'),
(16, 'Short kim largo', 8, 6, 16000, 1, 0, 'anabellinzona@gmail.com', 'Short largo tiro alto disponible en colores jean, blanco y gris. Talles 38, 40 y 42', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQU87eFA_3r0h9ho6pqPZpuShsvcpwo_wd1Og&usqp=CAU'),
(19, 'hola', 1, 5, 15000, 1, 1, 'anabellinzona@gmail.com', 'descripcion', 'href...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `admin`) VALUES
(1, 'webadmin', '$2y$10$3x.ebGkSoUVUOg1T74vHhersrep2Oyb.JQj9OOjlfLSUOlDyvSFEG', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_productos_categorias` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
