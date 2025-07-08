-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2024 a las 01:50:23
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12
CREATE DATABASE IF NOT EXISTS db_djr;
USE db_djr;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_djr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` bigint(20) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `portada` varchar(100) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `ruta` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nombre`, `descripcion`, `portada`, `datecreated`, `ruta`, `status`) VALUES
(1, 'Semi Hilo', 'Transforma tus noches', 'slider1.jpeg', '2021-08-20 03:04:04', 'semi-hilo', 1),
(2, 'Baby Doll', 'Cómoda, Sexy... Irremplazable.', 'slider5.jpeg', '2021-08-21 00:47:10', 'baby-doll', 1),
(3, 'Conjunto Interior', 'Realza tu belleza', 'slider3.jpeg', '2023-11-20 12:56:37', 'conjunto-interior', 1),
(7, 'Polo', 'Vistete bien', 'slider6.jpg', '2024-06-20 00:21:15', 'polo', 1),
(8, 'Casaca', 'Para el invierno', 'slider7.png', '2024-06-20 00:57:54', 'casaca', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` bigint(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `numerotelefono` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mensaje` text NOT NULL,
  `ip` varchar(15) NOT NULL,
  `dispositivo` varchar(25) NOT NULL,
  `useragent` text NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `numerotelefono`, `email`, `mensaje`, `ip`, `dispositivo`, `useragent`, `datecreated`) VALUES
(1, 'Fernando Herrera', 9101020, 'toolsfordeveloper@gmail.com', 'Mensaje del primer suscriptor!', '127.0.0.1', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:91.0) Gecko/20100101 Firefox/91.0', '2021-08-20 04:06:18'),
(2, 'Julio', 917390964, 'julio@gmail.com', 'Necesito compras un producto navideño', '::1', 'PC', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', '2023-11-21 15:21:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` bigint(20) NOT NULL,
  `pedidoid` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id`, `pedidoid`, `productoid`, `precio`, `cantidad`) VALUES
(4, 3, 86, 35.00, 2),
(5, 4, 112, 40.00, 6),
(6, 4, 111, 55.00, 1),
(7, 4, 115, 40.00, 1);

INSERT INTO `detalle_pedido` (`id`, `pedidoid`, `productoid`, `precio`, `cantidad`)
VALUES
    (1, 132, FLOOR(RAND() * 100) + 1, 750.00, FLOOR(RAND() * 6) + 2),
    (2, 134, FLOOR(RAND() * 100) + 1, 115.00, FLOOR(RAND() * 6) + 2),
    (3, 135, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (4, 139, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (5, 144, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (6, 146, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (7, 147, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (8, 148, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (9, 157, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (10, 158, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (11, 166, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (12, 167, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (13, 177, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (14, 179, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (15, 182, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (16, 189, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (17, 191, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (18, 201, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (19, 203, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (20, 206, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (21, 207, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (22, 210, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (23, 211, FLOOR(RAND() * 100) + 1, 90.00, FLOOR(RAND() * 6) + 2),
    (24, 212, FLOOR(RAND() * 100) + 1, 100.00, FLOOR(RAND() * 6) + 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `id` bigint(20) NOT NULL,
  `personaid` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `transaccionid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` bigint(20) NOT NULL,
  `productoid` bigint(20) NOT NULL,
  `img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `productoid`, `img`) VALUES
(139, 104, 'pro_8bbb7840c210d2b06916ea9c433ba49b.jpg'),
(156, 105, 'pro_83ff8c69ce3eba3a7bb189d9d5c17c7a.jpg'),
(157, 106, 'pro_19ceab74b3cfa453d67bec7ee6bc1492.jpg'),
(160, 106, 'pro_5e7c69492ca041ac34250ca75ed3aefa.jpg'),
(161, 105, 'pro_5d0d48b733ca3da4ef69bbe06893e1b0.jpg'),
(162, 103, 'pro_f55efe3a86a1faf692c49c383d79daea.jpg'),
(163, 103, 'pro_55922634d57da0fd14fed7863b34cb48.jpg'),
(164, 102, 'pro_cb2f9a0b77c6c11d662539ae98b3cef6.jpg'),
(165, 102, 'pro_8d00943df07b296990e0e6b3a4df4fc0.jpg'),
(166, 101, 'pro_9787c0c5df90f40d96f2e5dbc179b0f6.jpg'),
(167, 101, 'pro_0edd26213705761a123b825decc2d507.jpg'),
(168, 100, 'pro_ea1c2ab506d64a9e2de44e75135269a3.jpg'),
(169, 100, 'pro_9662d8d72f0a70d79572a44d3da21e9b.jpg'),
(170, 99, 'pro_e9ef9b39a07402800d228ead9284b6ce.jpg'),
(171, 99, 'pro_b5d242b4880d52f916ebeecaa2086651.jpg'),
(173, 98, 'pro_31ebdbeb3f02751eb726e54c527f3be8.jpg'),
(174, 98, 'pro_1116e252048baf624eaf9afbca06aa12.jpg'),
(175, 97, 'pro_819f4458116464921d205d514b0c42f8.jpg'),
(176, 97, 'pro_04e85a35e88561f2a91cb08b29f2c309.jpg'),
(177, 96, 'pro_31f601253ad8ecfc17cb0a3d32d1c1c9.jpg'),
(178, 96, 'pro_717cd0ce7a29061b009852747eb74955.jpg'),
(179, 95, 'pro_d24c07c5a4b40b01e05175cb0bca0ac9.jpg'),
(180, 95, 'pro_d419e808904cb63b95ad2810c753697f.jpg'),
(181, 94, 'pro_417f217c067cc29abb253849c38f85da.jpg'),
(182, 94, 'pro_f1efe6c5468f642f038318e0c18dbe99.jpg'),
(183, 93, 'pro_21208187046e06a178209b21a12df205.jpg'),
(184, 93, 'pro_8257af4ed192e4c46e6c0f01c7ec0c9e.jpg'),
(185, 92, 'pro_689c2e6f186b3571985e893b904007f0.jpg'),
(186, 92, 'pro_5cf16ba6e0e330677bc72ae7f1461bdc.jpg'),
(187, 91, 'pro_a54b7d41f033d7c4336e5d3372ee8317.jpg'),
(188, 91, 'pro_e628d65094833c0d70ec9419ed3c4add.jpg'),
(189, 89, 'pro_d97f0475d50905a6bcaffa14c98d1cc1.jpg'),
(190, 89, 'pro_117e1cdab721224715768f76a6d6c0ad.jpg'),
(191, 88, 'pro_b348872f04339268920faa7d61319049.jpg'),
(192, 88, 'pro_4577c493a96c5495f0c3164a022498c7.jpg'),
(193, 87, 'pro_3d76edd8c510e1758d3243fa06e25327.jpg'),
(194, 87, 'pro_079a70f92dd10782daa10fcefccb609c.jpg'),
(195, 86, 'pro_8c83ede068d14d8334224810a3d14353.jpg'),
(196, 86, 'pro_c68a58ba75120f32862a2eb356c19fac.jpg'),
(197, 107, 'pro_1e07caae922962b100c02eec662c00b6.jpg'),
(198, 107, 'pro_1ccf60f345c9b556c2aa32be03948301.jpg'),
(199, 108, 'pro_45b896668426a103f91b5aaee523e7a4.jpg'),
(200, 108, 'pro_7fadebfaad2cd6df9c195f04f8211856.jpg'),
(201, 109, 'pro_e0664709b7fd35d85355374b6f29cda3.jpg'),
(202, 109, 'pro_0af1d9f9b946855fbc9b4ed39e11c3b7.jpg'),
(203, 110, 'pro_feb06460eb11cc7a66bac6ff737f330d.jpg'),
(204, 110, 'pro_3a55bdae2da4c73e4252b6da7ece10d4.jpg'),
(205, 111, 'pro_291b025863982f37be17bceb8398d12e.jpg'),
(206, 111, 'pro_f2150a28acddaf86efe4de73b9c2d44a.jpg'),
(207, 112, 'pro_2594ab06616cd961bb70e9b2b4371c59.jpg'),
(208, 113, 'pro_82a4f5a233cc14cd1bea063180804fd1.jpg'),
(209, 114, 'pro_ef9bd3fa90f8785b001514657aec1f78.jpg'),
(210, 115, 'pro_5f576852778f58d1c5b8d471c869513d.jpg'),
(211, 116, 'pro_bfdd7d7f0c887b0302091c126cac8cdd.jpg'),
(212, 117, 'pro_bb0d01489be6656636c1276f11af046f.jpg'),
(214, 118, 'pro_cce82723a8f266bf9e9fce27be035241.jpg'),
(215, 118, 'pro_5593f83b998a18bacce7f3a2f6a5d43d.jpg'),
(216, 119, 'pro_d46c666617a60fbc2365ab4ce7b92c9c.jpg'),
(217, 120, 'pro_fb293455cd9373a6d78088ef4dac42ca.jpg'),
(218, 121, 'pro_30a3e8a76db3cb95905c60aa14d2d6bb.jpg'),
(219, 122, 'pro_32fcaee1e2284a751654df867876171f.jpg'),
(220, 123, 'pro_db58a0c8cd7734b28803d69c17312a49.jpg'),
(221, 124, 'pro_1a82f3967b017ab558f2e9d6b66947d0.jpg'),
(222, 125, 'pro_a2a8099a36886102134c859849974d45.jpg'),
(223, 126, 'pro_c54cb4e55ac37e78fd3cc19254d06e15.jpg'),
(224, 127, 'pro_afc1f731448a64a556da4f560507859f.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `idmodulo` bigint(20) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`idmodulo`, `titulo`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard', 1),
(2, 'Usuarios', 'Usuarios del sistema', 1),
(3, 'Clientes', 'Clientes de tienda', 1),
(4, 'Productos', 'Todos los productos', 1),
(5, 'Pedidos', 'Pedidos', 1),
(6, 'Caterogías', 'Caterogías Productos', 1),
(7, 'Suscriptores', 'Suscriptores del sitio web', 1),
(8, 'Contactos', 'Mensajes del formulario contacto', 1),
(9, 'Páginas', 'Páginas del sitio web', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idpedido` bigint(20) NOT NULL,
  `referenciacobro` varchar(255) DEFAULT NULL,
  `idtransaccionpaypal` varchar(255) DEFAULT NULL,
  `datospaypal` text DEFAULT NULL,
  `personaid` bigint(20) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `costo_envio` decimal(10,2) NOT NULL DEFAULT 0.00,
  `monto` decimal(11,2) NOT NULL,
  `tipopagoid` bigint(20) NOT NULL,
  `direccion_envio` text NOT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idpedido`, `referenciacobro`, `idtransaccionpaypal`, `datospaypal`, `personaid`, `fecha`, `costo_envio`, `monto`, `tipopagoid`, `direccion_envio`, `status`) VALUES
(1, '4561654687', NULL, NULL, 3, '2024-05-03 03:41:57', 50.00, 450.00, 3, 'Antigua Guatemala, Antigua Guatemala', 'Completo'),
(2, NULL, '8XD37465755620710', '{\"id\":\"4S6284553D668511R\",\"intent\":\"CAPTURE\",\"status\":\"COMPLETED\",\"purchase_units\":[{\"reference_id\":\"default\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"350.00\"},\"payee\":{\"email_address\":\"sb-6z0da4580133@business.example.com\",\"merchant_id\":\"ULNZF7CTTE748\"},\"description\":\"Compra de artículos en Tienda Virtual por $350 \",\"soft_descriptor\":\"PAYPAL *JOHNDOESTES\",\"shipping\":{\"name\":{\"full_name\":\"John Doe\"},\"address\":{\"address_line_1\":\"Free Trade Zone\",\"admin_area_2\":\"Guatemala City\",\"admin_area_1\":\"Guatemala City\",\"postal_code\":\"01001\",\"country_code\":\"GT\"}},\"payments\":{\"captures\":[{\"id\":\"8XD37465755620710\",\"status\":\"COMPLETED\",\"amount\":{\"currency_code\":\"USD\",\"value\":\"350.00\"},\"final_capture\":true,\"seller_protection\":{\"status\":\"ELIGIBLE\",\"dispute_categories\":[\"ITEM_NOT_RECEIVED\",\"UNAUTHORIZED_TRANSACTION\"]},\"create_time\":\"2021-08-20T09:48:38Z\",\"update_time\":\"2021-08-20T09:48:38Z\"}]}}],\"payer\":{\"name\":{\"given_name\":\"John\",\"surname\":\"Doe\"},\"email_address\":\"sb-iimwo4579006@personal.example.com\",\"payer_id\":\"ZTA3QXTY5JS6Q\",\"address\":{\"country_code\":\"GT\"}},\"create_time\":\"2021-08-20T09:46:25Z\",\"update_time\":\"2021-08-20T09:48:38Z\",\"links\":[{\"href\":\"https://api.sandbox.paypal.com/v2/checkout/orders/4S6284553D668511R\",\"rel\":\"self\",\"method\":\"GET\"}]}', 3, '2024-05-03 03:41:57', 50.00, 350.00, 1, 'Guatemala, Guatemala', 'Completo'),
(3, NULL, NULL, NULL, 5, '2024-05-14 04:03:42', 5.00, 75.00, 2, 'San Vicente, Cañete', 'Pendiente'),
(4, NULL, NULL, NULL, 1, '2024-06-11 09:30:42', 5.00, 340.00, 3, 'San Vicente, ima', 'Pendiente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idpermiso` bigint(20) NOT NULL,
  `rolid` bigint(20) NOT NULL,
  `moduloid` bigint(20) NOT NULL,
  `r` int(11) NOT NULL DEFAULT 0,
  `w` int(11) NOT NULL DEFAULT 0,
  `u` int(11) NOT NULL DEFAULT 0,
  `d` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idpermiso`, `rolid`, `moduloid`, `r`, `w`, `u`, `d`) VALUES
(3, 1, 1, 1, 1, 1, 1),
(4, 1, 2, 1, 1, 1, 1),
(5, 1, 3, 1, 1, 1, 1),
(6, 1, 4, 1, 1, 1, 1),
(7, 1, 5, 1, 1, 1, 1),
(8, 1, 6, 1, 1, 1, 1),
(9, 1, 7, 1, 1, 1, 1),
(10, 1, 8, 1, 1, 1, 1),
(11, 1, 9, 1, 1, 1, 1),
(12, 2, 1, 1, 1, 1, 1),
(13, 2, 2, 0, 0, 0, 0),
(14, 2, 3, 1, 1, 1, 0),
(15, 2, 4, 1, 1, 1, 0),
(16, 2, 5, 1, 1, 1, 0),
(17, 2, 6, 1, 1, 1, 0),
(18, 2, 7, 1, 0, 0, 0),
(19, 2, 8, 1, 0, 0, 0),
(20, 2, 9, 1, 1, 1, 1),
(21, 3, 1, 0, 0, 0, 0),
(22, 3, 2, 0, 0, 0, 0),
(23, 3, 3, 0, 0, 0, 0),
(24, 3, 4, 0, 0, 0, 0),
(25, 3, 5, 1, 0, 0, 0),
(26, 3, 6, 0, 0, 0, 0),
(27, 3, 7, 0, 0, 0, 0),
(28, 3, 8, 0, 0, 0, 0),
(29, 3, 9, 0, 0, 0, 0),
(30, 4, 1, 1, 0, 0, 0),
(31, 4, 2, 0, 0, 0, 0),
(32, 4, 3, 1, 1, 1, 0),
(33, 4, 4, 1, 0, 0, 0),
(34, 4, 5, 1, 0, 1, 0),
(35, 4, 6, 0, 0, 0, 0),
(36, 4, 7, 1, 0, 0, 0),
(37, 4, 8, 1, 0, 0, 0),
(38, 4, 9, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idpersona` bigint(20) NOT NULL,
  `identificacion` varchar(30) DEFAULT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` bigint(20) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `password` varchar(75) NOT NULL,
  `nit` varchar(20) DEFAULT NULL,
  `nombrefiscal` varchar(80) DEFAULT NULL,
  `direccionfiscal` varchar(100) DEFAULT NULL,
  `token` varchar(100) DEFAULT NULL,
  `rolid` bigint(20) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idpersona`, `identificacion`, `nombres`, `apellidos`, `telefono`, `email_user`, `password`, `nit`, `nombrefiscal`, `direccionfiscal`, `token`, `rolid`, `datecreated`, `status`) VALUES
(1, '1234567', 'Jorge Enrique', 'Caceres Hernandez', 921737608, 'admin@djr.com', '67c888af8ad80f0232832431fb0bbb478f12740ff8b451d8d4ce0238a2d8b63a', 'CF', 'JECH', 'Cañete', NULL, 1, '2024-04-03 01:34:15', 1),
(2, '1234560', 'Jose', 'Gil', 936811239, 'gil@djr.com', '02423ab2e61297b8262449c93e19be42fb5bbb275860a7d93b1ebdc7b6535ed7', NULL, NULL, NULL, NULL, 2, '2024-04-03 01:34:15', 1),
(3, '87654321', 'Nayzeth', 'Bautista', 923506216, 'nayzeth@djr.com', 'c31e649c34f6dab81a8f24ea572b19b106990a5fda235e92c7e0680ccc221cfd', '468798', 'Tamara', 'Chincha', NULL, 3, '2024-04-03 01:34:15', 1),
(4, '3156166', 'Fernando', 'Yovera', 940466753, 'fer@djr.com', '56976bf24998ca63e35fe4f1e2469b5751d1856003e8d16fef0aafef496ed044', NULL, NULL, NULL, NULL, 4, '2024-04-03 01:34:15', 1),
(5, '236574', 'Carlos', 'Moran Tello', 916277310, 'moran@djr.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', NULL, NULL, NULL, NULL, 3, '2024-05-14 04:03:14', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `idpost` bigint(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `contenido` text NOT NULL,
  `portada` varchar(100) DEFAULT NULL,
  `datecreate` datetime NOT NULL DEFAULT current_timestamp(),
  `ruta` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`idpost`, `titulo`, `contenido`, `portada`, `datecreate`, `ruta`, `status`) VALUES
(1, 'Inicio', '<div class=\"p-t-80\"> <h3 class=\"ltext-103 cl5\">Marcas</h3> </div> <div> <p>Trabajamos con los mejores</p> </div> <div class=\"row\"> <div class=\"col-md-3\"><img src=\"Assets/images/marcas (1).png\" alt=\"Delia\" width=\"200\" height=\"200\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/marcas (2).png\" alt=\"Boston\" width=\"200\" height=\"200\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/marcas (3).png\" alt=\"D\'Lirio\" width=\"200\" height=\"200\" /></div> <div class=\"col-md-3\"><img src=\"Assets/images/marcas (4).png\" alt=\"Jacky Form\" width=\"200\" height=\"200\" /></div> <div class=\"col-md-3\">&nbsp;</div> <div class=\"col-md-3\">&nbsp;</div> <div class=\"col-md-3\">&nbsp;</div> <div class=\"col-md-3\">&nbsp;</div> </div>', '', '2021-07-20 02:40:15', 'inicio', 1),
(2, 'Tienda', '<p>Contenido p&aacute;gina!</p>', '', '2021-08-06 01:21:27', 'tienda', 1),
(3, 'Carrito', '<p>Contenido p&aacute;gina!</p>', '', '2021-08-06 01:21:52', 'carrito', 1),
(4, 'Nosotros', '<section class=\"bg0 p-t-75 p-b-120\"> <div class=\"container\"><! Sección de Historia > <div class=\"row p-b-148\"> <div class=\"col-md-7 col-lg-8\"> <div class=\"p-t-7 p-r-85 p-r-15-lg p-r-0-md\"> <h3 class=\"mtext-111 cl2 p-b-16\">Historia</h3> <p>En el pintoresco pueblo de San Vicente, ubicado en la encantadora regi&oacute;n de Ca&ntilde;ete, viv&iacute;a una joven emprendedora llamada Daniela. Desde temprana edad, Daniela mostraba un gran inter&eacute;s por la moda y siempre destacaba por su estilo &uacute;nico y su habilidad para combinar prendas de forma creativa. A medida que Daniela crec&iacute;a, se dio cuenta de que en San Vicente hab&iacute;a una demanda creciente de ropa &iacute;ntima femenina elegante y sofisticada. Observ&oacute; que muchas mujeres compart&iacute;an su pasi&oacute;n por la moda y buscaban prendas que les permitieran sentirse seguras y hermosas. Decidida a satisfacer esta necesidad, Daniela decidi&oacute; iniciar su propio negocio de ropa &iacute;ntima femenina, al que llam&oacute; Glamour Secrets DJR. Con un enfoque en la calidad y el dise&ntilde;o exclusivo, Daniela se propuso ofrecer una selecci&oacute;n diversa de lencer&iacute;a, pijamas y ropa de dormir que reflejara las &uacute;ltimas tendencias en moda &iacute;ntima. Aunque inicialmente comenz&oacute; peque&ntilde;o, vendiendo prendas desde su propio hogar y a trav&eacute;s de las redes sociales, Daniela pronto se dio cuenta del potencial de su negocio y decidi&oacute; expandirse. Abri&oacute; una peque&ntilde;a tienda en el centro de San Vicente, donde las mujeres pod&iacute;an encontrar una variedad de prendas &iacute;ntimas a precios accesibles. Con su pasi&oacute;n por la moda y su habilidad para entender las necesidades de su p&uacute;blico objetivo, Daniela logr&oacute; hacer crecer r&aacute;pidamente su negocio. Se asoci&oacute; con diferentes marcas de renombre y se convirti&oacute; en un punto de referencia para las mujeres de San Vicente que buscaban las &uacute;ltimas tendencias en ropa &iacute;ntima. Con el tiempo, Daniela se convirti&oacute; en un pilar en la comunidad de San Vicente, no solo como una exitosa emprendedora, sino tambi&eacute;n como un modelo a seguir para otras mujeres que so&ntilde;aban con iniciar sus propios negocios. Su historia inspir&oacute; a muchas a perseguir sus pasiones y a creer en el poder de la determinaci&oacute;n y el trabajo arduo para alcanzar el &eacute;xito en la vida.</p> </div> </div> <div class=\"col-11 col-md-5 col-lg-4 m-lr-auto\"> <div class=\"how-bor1\"> <div class=\"hov-img0\"><img src=\"https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849825_1280.jpg\" alt=\"IMG\" width=\"500\" height=\"333\" /></div> </div> </div> </div> <! Fin de la Sección de Historia > <! Sección de Nuestra Misión y Nuestra Visión > <div class=\"row\"> <div class=\"col-md-7 col-lg-8 p-b-30\"> <div class=\"p-t-7 p-l-85 p-l-15-lg p-l-0-md\"><! Nuestra Misión > <h2 class=\"mtext-111 cl2 p-b-16\"><span style=\"color: #236fa1;\">Nuestra Misi&oacute;n</span></h2> <p class=\"stext-113 cl6 p-b-26\">Comercializar ropa &iacute;ntima de excelente calidad y a precios accesibles, asegurando la disponibilidad y el servicio, manteniendo costos competitivos a trav&eacute;s del aprovechamiento de nuestros recursos. Bas&aacute;ndonos en principios de &eacute;tica, generando relaciones duraderas y de confianza con nuestras clientas, proveedores y empleados. Todo esto cumpliendo cabalmente con obligaciones sociales y el medio ambiente.</p> <! Nuestra Visión > <h2 class=\"mtext-111 cl2 p-b-16\"><span style=\"color: #236fa1;\">Nuestra Visi&oacute;n</span></h2> <p class=\"stext-113 cl6 p-b-26\">Para el a&ntilde;o 2024, Para el a&ntilde;o 2024, Glamour Secrets DJR se consolidar&aacute; como la tienda l&iacute;der de ropa &iacute;ntima femenina en San Vicente. Ampliaremos nuestras instalaciones a un espacioso y moderno local en el mismo centro comercial, lo que permitir&aacute; aumentar significativamente nuestros espacios de exhibici&oacute;n y optimizar la experiencia de compra de nuestras clientas. Con esta expansi&oacute;n, proyectamos incrementar nuestras ventas en un 50%, al tiempo que seguimos ofreciendo productos de alta calidad y dise&ntilde;o exclusivo. Nos comprometemos a seguir innovando en nuestras colecciones y a fortalecer nuestras relaciones con marcas de renombre, asegurando que cada mujer que visite nuestra tienda se sienta segura, hermosa y a la vanguardia de la moda &iacute;ntima.</p> <div class=\"bor16 p-l-29 p-b-9 m-t-22\">&nbsp;</div> </div> </div> <div class=\"col-11 col-md-5 col-lg-4 m-lr-auto p-b-30\"> <div class=\"how-bor2\"> <div class=\"hov-img0\"><img src=\"https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849822_1280.jpg\" alt=\"IMG\" width=\"500\" height=\"333\" /></div> </div> </div> </div> <! Fin de la Sección de Nuestra Misión y Nuestra Visión ></div> </section>', '', '2021-08-09 03:09:44', 'nosotros', 1),
(5, 'Contacto', '<div class=\"map\">&nbsp;</div>', '', '2021-08-09 03:11:08', 'contacto', 1),
(6, 'Preguntas frecuentes', '<ol> <li><strong>&iquest;Cu&aacute;l es el tiempo de entrega de los producto? <br /></strong> El tiempo de entrega var&iacute;a seg&uacute;n la ubicaci&oacute;n, generalmente entre 3 y 7 d&iacute;as h&aacute;biles.</li> <li><strong>&iquest;C&oacute;mo es la forma de env&iacute;o de los productos?</strong> <br />Utilizamos servicios de mensajer&iacute;a reconocidos para asegurar una entrega r&aacute;pida y segura.</li> <li><strong>&iquest;Cu&aacute;l es el tiempo m&aacute;ximo para solicitar un reembolso?</strong> <br />Puedes solicitar un reembolso hasta 30 d&iacute;as despu&eacute;s de la compra.</li> </ol> <p>&nbsp;</p> <p>Otras preguntas</p> <ul> <li><strong>&iquest;Qu&eacute; formas de pago aceptan? <br /></strong><span style=\"color: #666666; font-family: Arial, sans-serif; font-size: 15px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: left; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Aceptamos tarjetas de cr&eacute;dito, d&eacute;bito, PayPal y transferencias bancarias.</span></li> </ul>', 'img_e7def548ec29bb3007e160c297d6e43b.jpg', '2021-08-11 01:24:19', 'preguntas-frecuentes', 1),
(7, 'Términos y Condiciones', '<p>A continuaci&oacute;n se describen los t&eacute;rmino y condiciones de la Tienda Virtual!</p> <ol> <li>Pol&iacute;tica uno</li> <li>Termino dos</li> <li>Condici&oacute;n tres</li> </ol> <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis sunt, corrupti hic aspernatur cumque alias, ipsam omnis iure ipsum, nostrum labore obcaecati natus repellendus consequatur est nemo sapiente dolorem dicta. Lorem, ipsum dolor sit amet consectetur adipisicing elit. Commodi, voluptas, consectetur iusto delectus quaerat ullam nesciunt! Quae doloribus deserunt qui fugit illo nobis ipsum, accusamus eius perferendis beatae culpa molestias!</p>', '', '2021-08-11 01:51:06', 'terminos-y-condiciones', 1),
(8, 'Sucursales', '<section class=\"py-5 text-center\"> <div class=\"container\"> <p>Visitanos y obten los mejores precios del mercado, cualquier art&iacute;culo que necestas para vivir mejor</p> <a class=\"btn btn-info\" href=\"../../tienda_virtual/tienda\">VER PRODUCTOS</a></div> </section> <div class=\"py-5 bg-light\"> <div class=\"container\"> <div class=\"row\"> <div class=\"col-md-4\"> <div class=\"card mb-4 box-shadow hov-img0\"><img src=\"https://abelosh.com/tienda_virtual/Assets/images/s1.jpg\" alt=\"Tienda Uno\" width=\"100%\" height=\"100%\" /> <div class=\"card-body\"> <p class=\"card-text\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat necessitatibus eligendi, soluta ipsa natus, at earum qui enim, illum doloremque, accusantium autem nemo est esse nulla neque eaque repellendus amet.</p> <p>Direcci&oacute;n: Antigua Gautemala <br />Tel&eacute;fono: 4654645 <br />Correo: info@abelosh.com</p> </div> </div> </div> <div class=\"col-md-4\"> <div class=\"card mb-4 box-shadow hov-img0\"><img src=\"https://abelosh.com/tienda_virtual/Assets/images/s2.jpg\" alt=\"Sucural dos\" width=\"100%\" height=\"100%\" /> <div class=\"card-body\"> <p class=\"card-text\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat necessitatibus eligendi, soluta ipsa natus, at earum qui enim, illum doloremque, accusantium autem nemo est esse nulla neque eaque repellendus amet.</p> <p>Direcci&oacute;n: Antigua Gautemala <br />Tel&eacute;fono: 4654645 <br />Correo: info@abelosh.com</p> </div> </div> </div> <div class=\"col-md-4\"> <div class=\"card mb-4 box-shadow hov-img0\"><img src=\"https://abelosh.com/tienda_virtual/Assets/images/s3.jpg\" alt=\"Sucural tres\" width=\"100%\" height=\"100%\" /> <div class=\"card-body\"> <p class=\"card-text\">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat necessitatibus eligendi, soluta ipsa natus, at earum qui enim, illum doloremque, accusantium autem nemo est esse nulla neque eaque repellendus amet.</p> <p>Direcci&oacute;n: Antigua Gautemala <br />Tel&eacute;fono: 4654645 <br />Correo: info@abelosh.com</p> </div> </div> </div> </div> </div> </div>', 'img_d72cb5712933863e051dc9c7fac5e253.jpg', '2021-08-11 02:26:45', 'sucursales', 1),
(9, 'Not Found', '<h1>Error 404: P&aacute;gina no encontrada</h1> <p>No se encuentra la p&aacute;gina que ha solicitado.</p>', '', '2021-08-12 02:30:49', 'not-found', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idproducto` bigint(20) NOT NULL,
  `categoriaid` bigint(20) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(11,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp(),
  `ruta` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idproducto`, `categoriaid`, `codigo`, `nombre`, `descripcion`, `precio`, `stock`, `imagen`, `datecreated`, `ruta`, `status`) VALUES
(86, 2, '20001', 'Baby Doll Rojo Tirante', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 85% Poli&eacute;ster, 15% Spandex</li> <li>Detalles: Encaje floral, lazo de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, el&aacute;stico en la cintura</li> <li>Tallas: S, M, L, XL</li> </ul>', 35.00, 25, NULL, '2024-05-14 03:53:47', 'baby-doll-rojo-tirante', 1),
(87, 2, '20002', 'Baby Doll Negro Tirante', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 85% Poli&eacute;ster, 15% Spandex</li> <li>Detalles: Encaje floral, lazo de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, el&aacute;stico en la cintura</li> <li>Tallas: S, M, L, XL</li> </ul>', 37.00, 25, NULL, '2024-05-14 03:54:20', 'baby-doll-negro-tirante', 1),
(88, 2, '1000011', 'Baby Doll Rojo Rubí', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 85% Poli&eacute;ster, 15% Spandex</li> <li>Detalles: Encaje floral, lazo de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, el&aacute;stico en la cintura</li> <li>Tallas: S, M, L, XL</li> </ul>', 40.00, 25, NULL, '2024-05-14 03:42:24', 'baby-doll-rojo-rubi', 1),
(89, 2, '1000012', 'Baby Doll Negro', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 85% Poli&eacute;ster, 15% Spandex</li> <li>Detalles: Encaje floral, lazo de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, el&aacute;stico en la cintura</li> <li>Tallas: S, M, L, XL</li> </ul>', 40.00, 20, NULL, '2024-05-14 03:57:23', 'baby-doll-negro', 1),
(91, 2, '1000013', 'Baby Doll Rojo', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 85% Poli&eacute;ster, 15% Spandex</li> <li>Detalles: Encaje floral, lazo de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, el&aacute;stico en la cintura</li> <li>Tallas: S, M, L, XL</li> </ul>', 40.00, 20, NULL, '2024-05-14 03:58:20', 'baby-doll-rojo', 1),
(92, 2, '1000014', 'Baby Doll Rosado', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 85% Poli&eacute;ster, 15% Spandex</li> <li>Detalles: Encaje floral, lazo de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, el&aacute;stico en la cintura</li> <li>Tallas: S, M, L, XL</li> </ul>', 40.00, 20, NULL, '2024-05-14 03:59:21', 'baby-doll-rosado', 1),
(93, 2, '1000015', 'Baby Doll Negro Mariposa', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 85% Poli&eacute;ster, 15% Spandex</li> <li>Detalles: Encaje floral, lazo de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, el&aacute;stico en la cintura</li> <li>Tallas: S, M, L, XL</li> </ul>', 40.00, 10, NULL, '2024-05-14 04:00:22', 'baby-doll-negro-mariposa', 1),
(94, 2, '1000016', 'Baby Doll Rojo Pasión', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 85% Poli&eacute;ster, 15% Spandex</li> <li>Detalles: Encaje floral, lazo de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, el&aacute;stico en la cintura</li> <li>Tallas: S, M, L, XL</li> </ul>', 40.00, 10, NULL, '2024-05-14 04:05:26', 'baby-doll-rojo-pasion', 1),
(95, 1, '1000017', 'Semi Hilo Negro Sin Moño', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 90% Poliamida, 10% Elastano</li> <li>Detalles: Encaje delicado en los bordes</li> <li>Ajuste: Cintura el&aacute;stica, corte semi hilo</li> <li>Tallas: S, M, L, XL</li> </ul>', 35.00, 10, NULL, '2024-05-14 04:05:57', 'semi-hilo-negro-sin-mono', 1),
(96, 1, '1000018', 'Semi Hilo Rosado', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 90% Poliamida, 10% Elastano</li> <li>Detalles: Encaje delicado en los bordes</li> <li>Ajuste: Cintura el&aacute;stica, corte semi hilo</li> <li>Tallas: S, M, L, XL</li> </ul>', 40.00, 10, NULL, '2024-05-14 04:06:33', 'semi-hilo-rosado', 1),
(97, 1, '1000019', 'Semi Hilo Celeste', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 90% Poliamida, 10% Elastano</li> <li>Detalles: Encaje delicado en los bordes</li> <li>Ajuste: Cintura el&aacute;stica, corte semi hilo</li> <li>Tallas: S, M, L, XL</li> </ul>', 45.00, 10, NULL, '2024-05-14 04:07:08', 'semi-hilo-celeste', 1),
(98, 1, '1000020', 'Semi Hilo Tiras Negras', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 90% Poliamida, 10% Elastano</li> <li>Detalles: Encaje delicado en los bordes</li> <li>Ajuste: Cintura el&aacute;stica, corte semi hilo</li> <li>Tallas: S, M, L, XL</li> </ul>', 50.00, 10, NULL, '2024-05-14 04:11:52', 'semi-hilo-tiras-negras', 1),
(99, 1, '1000021', 'Semi Hilo Azul Noche', '<p>S-M-L</p>', 45.00, 15, NULL, '2024-05-14 04:14:25', 'semi-hilo-azul-noche', 1),
(100, 1, '1000022', 'Semi Hilo Jaguar', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 90% Poliamida, 10% Elastano</li> <li>Detalles: Encaje delicado en los bordes</li> <li>Ajuste: Cintura el&aacute;stica, corte semi hilo</li> <li>Tallas: S, M, L, XL</li> </ul>', 40.00, 15, NULL, '2024-05-14 04:15:05', 'semi-hilo-jaguar', 1),
(101, 1, '1000023', 'Semi Hilo Rojo', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 90% Poliamida, 10% Elastano</li> <li>Detalles: Encaje delicado en los bordes</li> <li>Ajuste: Cintura el&aacute;stica, corte semi hilo</li> <li>Tallas: S, M, L, XL</li> </ul>', 40.00, 15, NULL, '2024-05-14 04:15:52', 'semi-hilo-rojo', 1),
(102, 1, '1000024', 'Semi Hilo Negro', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 90% Poliamida, 10% Elastano</li> <li>Detalles: Encaje delicado en los bordes</li> <li>Ajuste: Cintura el&aacute;stica, corte semi hilo</li> <li>Tallas: S, M, L, XL</li> </ul>', 40.00, 15, NULL, '2024-05-14 04:16:12', 'semi-hilo-negro', 1),
(103, 1, '1000025', 'Semi Hilo Rosado Pastel', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 90% Poliamida, 10% Elastano</li> <li>Detalles: Encaje delicado en los bordes</li> <li>Ajuste: Cintura el&aacute;stica, corte semi hilo</li> <li>Tallas: S, M, L, XL</li> </ul>', 60.00, 15, NULL, '2024-05-14 04:16:46', 'semi-hilo-rosado-pastel', 1),
(104, 1, '1000026', 'SHORT BOARSHORT PARADISE Azul Raya', '<p><strong>Tallas:</strong> S-M-XL</p>', 60.00, 15, NULL, '2024-05-14 04:21:00', 'short-boarshort-paradise-azul-raya', 0),
(105, 1, '12345', 'Semi Hilo Con Moño', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 90% Poliamida, 10% Elastano</li> <li>Detalles: Encaje delicado en los bordes</li> <li>Ajuste: Cintura el&aacute;stica, corte semi hilo</li> <li>Tallas: S, M, L, XL</li> </ul>', 20.00, 10, NULL, '2024-06-10 23:38:46', 'semi-hilo-con-mono', 1),
(106, 1, '123456', 'Semi Hilo Rosa', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 90% Poliamida, 10% Elastano</li> <li>Detalles: Encaje delicado en los bordes</li> <li>Ajuste: Cintura el&aacute;stica, corte semi hilo</li> <li>Tallas: S, M, L, XL</li> </ul>', 25.00, 10, NULL, '2024-06-10 23:42:55', 'semi-hilo-rosa', 1),
(107, 2, '1000111', 'Baby Doll Blanco', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 85% Poli&eacute;ster, 15% Spandex</li> <li>Detalles: Encaje floral, lazo de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, el&aacute;stico en la cintura</li> <li>Tallas: S, M, L, XL</li> </ul>', 37.00, 25, NULL, '2024-06-11 00:56:44', 'baby-doll-blanco', 1),
(108, 3, '1000112', 'Conjunto Interior Jaguar', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 80% Poli&eacute;ster, 20% Elastano</li> <li>Detalles: Encaje floral, copas de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, cierre trasero de gancho</li> <li>Tallas: 32B, 34B, 36B, 38B</li> </ul>', 40.00, 20, NULL, '2024-06-11 01:12:55', 'conjunto-interior-jaguar', 1),
(109, 3, '1000113', 'Conjunto Interior Negro', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 80% Poli&eacute;ster, 20% Elastano</li> <li>Detalles: Encaje floral, copas de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, cierre trasero de gancho</li> <li>Tallas: 32B, 34B, 36B, 38B</li> </ul>', 45.00, 25, NULL, '2024-06-11 01:14:16', 'conjunto-interior-negro', 1),
(110, 3, '1000114', 'Conjunto Interior Rojo', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 80% Poli&eacute;ster, 20% Elastano</li> <li>Detalles: Encaje floral, copas de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, cierre trasero de gancho</li> <li>Tallas: 32B, 34B, 36B, 38B</li> </ul>', 40.00, 20, NULL, '2024-06-11 01:18:13', 'conjunto-interior-rojo', 1),
(111, 3, '1000115', 'Conjunto Interior Negro Tira', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 80% Poli&eacute;ster, 20% Elastano</li> <li>Detalles: Encaje floral, copas de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, cierre trasero de gancho</li> <li>Tallas: 32B, 34B, 36B, 38B</li> </ul>', 55.00, 10, NULL, '2024-06-11 01:21:01', 'conjunto-interior-negro-tira', 1),
(112, 3, '1000117', 'Conjunto Interior Blanco Negro', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 80% Poli&eacute;ster, 20% Elastano</li> <li>Detalles: Encaje floral, copas de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, cierre trasero de gancho</li> <li>Tallas: 32B, 34B, 36B, 38B</li> </ul>', 40.00, 15, NULL, '2024-06-11 01:34:49', 'conjunto-interior-blanco-negro', 1),
(113, 3, '1000116', 'Conjunto Interior Blanco', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 80% Poli&eacute;ster, 20% Elastano</li> <li>Detalles: Encaje floral, copas de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, cierre trasero de gancho</li> <li>Tallas: 32B, 34B, 36B, 38B</li> </ul> <p>&nbsp;</p>', 40.00, 3, NULL, '2024-06-11 01:38:00', 'conjunto-interior-blanco', 1),
(114, 1, '1000118', 'Conjunto Interior Rojo Negro', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 80% Poli&eacute;ster, 20% Elastano</li> <li>Detalles: Encaje floral, copas de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, cierre trasero de gancho</li> <li>Tallas: 32B, 34B, 36B, 38B</li> </ul>', 40.00, 15, NULL, '2024-06-11 01:39:02', 'conjunto-interior-rojo-negro', 1),
(115, 3, '1000119', 'Conjunto Interior Rosado', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 80% Poli&eacute;ster, 20% Elastano</li> <li>Detalles: Encaje floral, copas de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, cierre trasero de gancho</li> <li>Tallas: 32B, 34B, 36B, 38B</li> </ul>', 40.00, 20, NULL, '2024-06-11 01:41:16', 'conjunto-interior-rosado', 1),
(116, 3, '1000121', 'Conjunto Interior Negro Basico', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 80% Poli&eacute;ster, 20% Elastano</li> <li>Detalles: Encaje floral, copas de sat&eacute;n</li> <li>Ajuste: Tirantes ajustables, cierre trasero de gancho</li> <li>Tallas: 32B, 34B, 36B, 38B</li> </ul>', 40.00, 10, NULL, '2024-06-11 01:45:59', 'conjunto-interior-negro-basico', 1),
(117, 1, '44123', 'Nay', '<p>nay</p>', 20.00, 1, NULL, '2024-06-11 11:34:06', 'nay', 0),
(118, 1, '122456', 'Semi Hilo Rosa Estilo Tanga', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 90% Poliamida, 10% Elastano</li> <li>Detalles: Encaje delicado en los bordes</li> <li>Ajuste: Cintura el&aacute;stica, corte semi hilo</li> <li>Tallas: S, M, L, XL</li> </ul>', 45.00, 5, NULL, '2024-06-19 22:42:09', 'semi-hilo-rosa-estilo-tanga', 1),
(119, 1, '55643', 'Semi Hilo Completo Rosado', '<p>S-M-L</p>', 40.00, 5, NULL, '2024-06-19 22:44:14', 'semi-hilo-completo-rosado', 1),
(120, 7, '333333', 'Polo Oscuro Juvenil', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 100% Poliuretano (cuero sint&eacute;tico)</li> <li>Detalles: Cremallera asim&eacute;trica, bolsillos laterales con cremallera</li> <li>Ajuste: Corte ajustado</li> <li>Tallas: XS, S, M, L, XL</li> <li>Colores: Negro, Marr&oacute;n, Rojo</li> </ul>', 45.00, 15, NULL, '2024-06-20 00:29:23', 'polo-oscuro-juvenil', 1),
(121, 7, '443322', 'Polo Manga Larga Oscuro', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 100% Poliuretano (cuero sint&eacute;tico)</li> <li>Detalles: Cremallera asim&eacute;trica, bolsillos laterales con cremallera</li> <li>Ajuste: Corte ajustado</li> <li>Tallas: XS, S, M, L, XL</li> <li>Colores: Negro, Marr&oacute;n, Rojo</li> </ul>', 45.00, 5, NULL, '2024-06-20 00:45:16', 'polo-manga-larga-oscuro', 1),
(122, 1, '122331', 'Polo Manga Larga Rosado', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 100% Poliuretano (cuero sint&eacute;tico)</li> <li>Detalles: Cremallera asim&eacute;trica, bolsillos laterales con cremallera</li> <li>Ajuste: Corte ajustado</li> <li>Tallas: XS, S, M, L, XL</li> <li>Colores: Negro, Marr&oacute;n, Rojo</li> </ul>', 45.00, 10, NULL, '2024-06-20 00:51:42', 'polo-manga-larga-rosado', 1),
(123, 1, '443355', 'Polo Manga Larga Crema', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 100% Poliuretano (cuero sint&eacute;tico)</li> <li>Detalles: Cremallera asim&eacute;trica, bolsillos laterales con cremallera</li> <li>Ajuste: Corte ajustado</li> <li>Tallas: XS, S, M, L, XL</li> <li>Colores: Negro, Marr&oacute;n, Rojo</li> </ul>', 45.00, 5, NULL, '2024-06-20 00:52:17', 'polo-manga-larga-crema', 1),
(124, 7, '445623', 'Polo Rojo', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 100% Poliuretano (cuero sint&eacute;tico)</li> <li>Detalles: Cremallera asim&eacute;trica, bolsillos laterales con cremallera</li> <li>Ajuste: Corte ajustado</li> <li>Tallas: XS, S, M, L, XL</li> <li>Colores: Negro, Marr&oacute;n, Rojo</li> </ul>', 45.00, 10, NULL, '2024-06-20 00:54:08', 'polo-rojo', 1),
(125, 1, '124322', 'Polo Manga Larga Turquesa', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 100% Poliuretano (cuero sint&eacute;tico)</li> <li>Detalles: Cremallera asim&eacute;trica, bolsillos laterales con cremallera</li> <li>Ajuste: Corte ajustado</li> <li>Tallas: XS, S, M, L, XL</li> <li>Colores: Negro, Marr&oacute;n, Rojo</li> </ul>', 45.00, 10, NULL, '2024-06-20 00:55:02', 'polo-manga-larga-turquesa', 1),
(126, 8, '556644', 'Casaca Jean', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 100% Poliuretano (cuero sint&eacute;tico)</li> <li>Detalles: Cremallera asim&eacute;trica, bolsillos laterales con cremallera</li> <li>Ajuste: Corte ajustado</li> <li>Tallas: XS, S, M, L, XL</li> <li>Colores: Negro, Marr&oacute;n, Rojo</li> </ul>', 55.00, 10, NULL, '2024-06-20 00:58:37', 'casaca-jean', 1),
(127, 8, '332243', 'Casaca Crema', '<p><strong>Caracter&iacute;sticas:</strong></p> <ul> <li>Material: 100% Poliuretano (cuero sint&eacute;tico)</li> <li>Detalles: Cremallera asim&eacute;trica, bolsillos laterales con cremallera</li> <li>Ajuste: Corte ajustado</li> <li>Tallas: XS, S, M, L, XL</li> <li>Colores: Negro, Marr&oacute;n, Rojo</li> </ul>', 45.00, 10, NULL, '2024-06-20 01:00:42', 'casaca-crema', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reembolso`
--

CREATE TABLE `reembolso` (
  `id` bigint(20) NOT NULL,
  `pedidoid` bigint(20) NOT NULL,
  `idtransaccion` varchar(255) NOT NULL,
  `datosreembolso` text NOT NULL,
  `observacion` text NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` bigint(20) NOT NULL,
  `nombrerol` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `observaciones` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `nombrerol`, `descripcion`, `observaciones`, `status`) VALUES
(1, 'Administrador', 'Acceso a todo el sistema', 'Como administrador tiene privilegios superiores a diferencia de cualquier usuario.', 1),
(2, 'Supervisor', 'Supervisor de tiendas', 'Como supervisor tiene acceso a diferentes funcionalidades solo para ver, más no para editar.', 1),
(3, 'Cliente', 'Clientes en general', 'Permisos simples, no tienen acceso a funcionalidades de los trabajadores de la Tienda Virtual', 1),
(4, 'Vendedor', 'Operador de tienda', 'Maneja funcionalidades de acuerdo a su rol', 1),
(5, 'Javier', 'Calidad de productos', 'Verifica al dia que tal estan los productos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_data`
--

CREATE TABLE `sales_data` (
  `id` bigint(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `monto` decimal(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `sales_data`
--

INSERT INTO `sales_data` (`id`, `fecha`, `monto`) VALUES
(1, '2024-01-01 00:00:00', 100.00),
(2, '2024-01-02 00:00:00', 150.00),
(3, '2024-01-03 00:00:00', 200.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripciones`
--

CREATE TABLE `suscripciones` (
  `idsuscripcion` bigint(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `datecreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `suscripciones`
--

INSERT INTO `suscripciones` (`idsuscripcion`, `nombre`, `email`, `datecreated`) VALUES
(1, 'Roberto', 'toolsfordeveloper@gmail.com', '2021-08-20 04:05:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopago`
--

CREATE TABLE `tipopago` (
  `idtipopago` bigint(20) NOT NULL,
  `tipopago` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Volcado de datos para la tabla `tipopago`
--

INSERT INTO `tipopago` (`idtipopago`, `tipopago`, `status`) VALUES
(1, 'PayPal', 1),
(2, 'Efectivo', 1),
(3, 'Tarjeta', 1),
(4, 'Cheque', 1),
(5, 'Despósito Bancario', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidoid` (`pedidoid`),
  ADD KEY `productoid` (`productoid`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`),
  ADD KEY `personaid` (`personaid`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productoid` (`productoid`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`idmodulo`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idpedido`),
  ADD KEY `personaid` (`personaid`),
  ADD KEY `tipopagoid` (`tipopagoid`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idpermiso`),
  ADD KEY `rolid` (`rolid`),
  ADD KEY `moduloid` (`moduloid`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idpersona`),
  ADD KEY `rolid` (`rolid`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idproducto`),
  ADD KEY `categoriaid` (`categoriaid`);

--
-- Indices de la tabla `reembolso`
--
ALTER TABLE `reembolso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidoid` (`pedidoid`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `sales_data`
--
ALTER TABLE `sales_data`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  ADD PRIMARY KEY (`idsuscripcion`);

--
-- Indices de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  ADD PRIMARY KEY (`idtipopago`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `idmodulo` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idpedido` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idpermiso` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idpersona` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `idpost` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idproducto` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `reembolso`
--
ALTER TABLE `reembolso`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sales_data`
--
ALTER TABLE `sales_data`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `suscripciones`
--
ALTER TABLE `suscripciones`
  MODIFY `idsuscripcion` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipopago`
--
ALTER TABLE `tipopago`
  MODIFY `idtipopago` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_pedido_ibfk_1` FOREIGN KEY (`pedidoid`) REFERENCES `pedido` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_pedido_ibfk_2` FOREIGN KEY (`productoid`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD CONSTRAINT `detalle_temp_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`productoid`) REFERENCES `producto` (`idproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`personaid`) REFERENCES `persona` (`idpersona`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`tipopagoid`) REFERENCES `tipopago` (`idtipopago`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permisos_ibfk_2` FOREIGN KEY (`moduloid`) REFERENCES `modulo` (`idmodulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`rolid`) REFERENCES `rol` (`idrol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`categoriaid`) REFERENCES `categoria` (`idcategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reembolso`
--
ALTER TABLE `reembolso`
  ADD CONSTRAINT `reembolso_ibfk_1` FOREIGN KEY (`pedidoid`) REFERENCES `pedido` (`idpedido`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
