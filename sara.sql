-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2019 a las 23:54:59
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sara`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesorios`
--

CREATE TABLE `accesorios` (
  `id_accesorios` int(11) NOT NULL,
  `Codigo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Compra` date DEFAULT NULL,
  `Duracion` int(11) DEFAULT NULL,
  `Fecha_Cambio` date DEFAULT NULL,
  `Costo` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `accesorios`
--

INSERT INTO `accesorios` (`id_accesorios`, `Codigo`, `Nombre`, `Fecha_Compra`, `Duracion`, `Fecha_Cambio`, `Costo`, `Cantidad`) VALUES
(1, '90794-46910', 'filtro separador gasolina ', NULL, NULL, '1970-01-01', 2592, 10),
(2, '692-26301-03', 'CHICOTE DE ACELERADOR  UNIVERSAL ', NULL, NULL, '1970-01-01', 1120, 3),
(3, 'CC33212', 'JGO.CHICOTES DE CONTROL 12', NULL, NULL, '1970-01-01', 985, 4),
(4, '90430-08003', 'SELLOS CAMBIO ACEITE', NULL, NULL, '1970-01-01', 40, 83),
(5, '6G1-24305-05', 'CONECTORES', NULL, NULL, '1970-01-01', 450, 5),
(6, '69W-82575-00', 'APAGADORES', NULL, NULL, '1970-01-01', 1450, 5),
(7, '90386-22M15', 'BUJE ESTANDAR', NULL, NULL, '1970-01-01', 150, 20),
(8, '663-15739-00', 'laina de plastico', NULL, NULL, '1970-01-01', 120, 8),
(9, '65W452510000', 'ANODO. 50FT,60FT,60HP', NULL, NULL, '1970-01-01', 300, 8),
(10, '6y1243605200', 'PERILLA', NULL, NULL, '1970-01-01', 460, 20),
(11, 'PruebaPollo', 'Pollito', NULL, NULL, '1970-01-01', 24, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE `accesos` (
  `id_acceso` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contraseña` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Acceso` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `accesos`
--

INSERT INTO `accesos` (`id_acceso`, `usuario`, `contraseña`, `Acceso`) VALUES
(13, 'Usuario', '$2y$10$HJoHErRpBchSV0PjLdEPgO7OOCBDXRgSMbjNF7Xhh//2yI0JMH9g2', ''),
(14, 'Admin', '$2y$10$j4FLHYnJFHRlS5.erx2qVO46u51YmwsjFbr03mMao6DiHGwfByWWe', 'Admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bujias`
--

CREATE TABLE `bujias` (
  `id_BUJIAS` int(11) NOT NULL,
  `Codigo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Compra` date DEFAULT NULL,
  `Duracion` int(11) DEFAULT NULL,
  `Fecha_Cambio` date DEFAULT NULL,
  `Costo` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `bujias`
--

INSERT INTO `bujias` (`id_BUJIAS`, `Codigo`, `Nombre`, `Fecha_Compra`, `Duracion`, `Fecha_Cambio`, `Costo`, `Cantidad`) VALUES
(1, '94701-00160', 'Bujia B8HS-10 M 60-200HP', NULL, NULL, '1970-01-01', 45, 200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `icono` varchar(200) NOT NULL,
  `campo` varchar(200) NOT NULL,
  `tipo` varchar(200) NOT NULL,
  `longitud` varchar(200) NOT NULL,
  `nulo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `icono`, `campo`, `tipo`, `longitud`, `nulo`) VALUES
(9, 'RefaccionesMotor50', 'fas fa-laptop', 'Nombre', 'Varchar', '150', 'Not Null'),
(10, 'RefaccionesMotor50', 'fas fa-laptop', 'Codigo', 'Varchar', '150', 'Not Null'),
(11, 'RefaccionesMotor50', 'fas fa-laptop', 'Costo', 'Float', '11', 'Null'),
(12, 'RefaccionesMotor50', 'fas fa-laptop', 'Cantidad', 'Int', '11', 'Null'),
(13, 'REFACCIONESDEMOTOR60FT', 'fas fa-laptop', 'Nombre', 'Varchar', '150', 'Not Null'),
(14, 'REFACCIONESDEMOTOR60FT', 'fas fa-laptop', 'Codigo', 'Varchar', '150', 'Not Null'),
(15, 'REFACCIONESDEMOTOR60FT', 'fas fa-laptop', 'Costo', 'Float', '11', 'Null'),
(16, 'REFACCIONESDEMOTOR60FT', 'fas fa-laptop', 'Cantidad', 'Int', '11', 'Null'),
(17, 'REFACCIONESMOTOR48HP', 'fas fa-laptop', 'Nombre', 'Varchar', '150', 'Not Null'),
(18, 'REFACCIONESMOTOR48HP', 'fas fa-laptop', 'Codigo', 'Varchar', '150', 'Not Null'),
(19, 'REFACCIONESMOTOR48HP', 'fas fa-laptop', 'Costo', 'Float', '11', 'Null'),
(20, 'REFACCIONESMOTOR48HP', 'fas fa-laptop', 'Cantidad', 'Int', '11', 'Null'),
(21, 'RefaccionesMotor60HP', 'fas fa-laptop', 'Nombre', 'Varchar', '150', 'Not Null'),
(22, 'RefaccionesMotor60HP', 'fas fa-laptop', 'Codigo', 'Varchar', '150', 'Not Null'),
(23, 'RefaccionesMotor60HP', 'fas fa-laptop', 'Costo', 'Float', '11', 'Null'),
(24, 'RefaccionesMotor60HP', 'fas fa-laptop', 'Cantidad', 'Int', '11', 'Null'),
(25, 'RefaccionesMotor75HP', 'fas fa-laptop', 'Nombre', 'Varchar', '150', 'Not Null'),
(26, 'RefaccionesMotor75HP', 'fas fa-laptop', 'Codigo', 'Varchar', '150', 'Not Null'),
(27, 'RefaccionesMotor75HP', 'fas fa-laptop', 'Costo', 'Float', '11', 'Null'),
(28, 'RefaccionesMotor75HP', 'fas fa-laptop', 'Cantidad', 'Int', '11', 'Null'),
(29, 'accesorios', 'fas fa-laptop', 'Nombre', 'Varchar', '150', 'Not Null'),
(30, 'accesorios', 'fas fa-laptop', 'Codigo', 'Varchar', '150', 'Not Null'),
(31, 'accesorios', 'fas fa-laptop', 'Costo', 'Float', '11', 'Null'),
(32, 'accesorios', 'fas fa-laptop', 'Cantidad', 'Int', '11', 'Null'),
(33, 'BUJIAS', 'fas fa-laptop', 'Nombre', 'Varchar', '150', 'Not Null'),
(34, 'BUJIAS', 'fas fa-laptop', 'Codigo', 'Varchar', '150', 'Not Null'),
(35, 'BUJIAS', 'fas fa-laptop', 'Costo', 'Float', '11', 'Null'),
(36, 'BUJIAS', 'fas fa-laptop', 'Cantidad', 'Int', '11', 'Null'),
(37, 'REFACCIONESM40HP', 'fas fa-laptop', 'Nombre', 'Varchar', '150', 'Not Null'),
(38, 'REFACCIONESM40HP', 'fas fa-laptop', 'Codigo', 'Varchar', '150', 'Not Null'),
(39, 'REFACCIONESM40HP', 'fas fa-laptop', 'Costo', 'Float', '11', 'Null'),
(40, 'REFACCIONESM40HP', 'fas fa-laptop', 'Cantidad', 'Int', '11', 'Null'),
(41, 'RefaccionesMotor115', 'fas fa-laptop', 'Nombre', 'Varchar', '150', 'Not Null'),
(42, 'RefaccionesMotor115', 'fas fa-laptop', 'Codigo', 'Varchar', '150', 'Not Null'),
(43, 'RefaccionesMotor115', 'fas fa-laptop', 'Costo', 'Float', '11', 'Null'),
(44, 'RefaccionesMotor115', 'fas fa-laptop', 'Cantidad', 'Int', '11', 'Null'),
(45, 'Prueba_sara', 'fas fa-laptop', 'Nombre', 'Varchar', '150', 'Not Null'),
(46, 'Prueba_sara', 'fas fa-laptop', 'Codigo', 'Varchar', '150', 'Not Null'),
(47, 'Prueba_sara', 'fas fa-laptop', 'Costo', 'Float', '11', 'Null'),
(48, 'Prueba_sara', 'fas fa-laptop', 'Cantidad', 'Int', '11', 'Null');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigos`
--

CREATE TABLE `codigos` (
  `id_codigos` int(11) NOT NULL,
  `Codigo` varchar(150) NOT NULL,
  `Tabla` varchar(150) NOT NULL,
  `eliminado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `codigos`
--

INSERT INTO `codigos` (`id_codigos`, `Codigo`, `Tabla`, `eliminado`) VALUES
(1, '62Y-46241-00', 'RefaccionesMotor50', NULL),
(2, '62Y-46241-00', 'RefaccionesMotor50', NULL),
(3, '93332-000UE', 'RefaccionesMotor50', NULL),
(4, '93102-43M42', 'RefaccionesMotor50', NULL),
(5, '62Y11636-10', 'RefaccionesMotor50', NULL),
(6, '6BG-41134-00', 'RefaccionesMotor50', NULL),
(7, '6C5-11650-10', 'RefaccionesMotor50', NULL),
(8, '93102-37M40', 'RefaccionesMotor50', NULL),
(9, '62Y-14384-30', 'RefaccionesMotor50', NULL),
(10, '6D8-45631-00', 'RefaccionesMotor50', NULL),
(11, '6D8-45631-00', 'RefaccionesMotor50', NULL),
(12, '93101-35002', 'RefaccionesMotor50', NULL),
(13, '93210-35M86', 'RefaccionesMotor50', NULL),
(14, '93450-17129', 'RefaccionesMotor50', NULL),
(15, '93103-18011', 'RefaccionesMotor50', NULL),
(16, '62Y11181-00', 'RefaccionesMotor50', NULL),
(17, '6BG-11351-00', 'RefaccionesMotor50', NULL),
(18, '62Y-11356-00', 'RefaccionesMotor50', NULL),
(19, 'CBG-114OA-2O', 'RefaccionesMotor50', NULL),
(20, 'CBG-1140A-10', 'RefaccionesMotor50', NULL),
(21, 'CBG-114OA-30', 'RefaccionesMotor50', NULL),
(22, 'CBG-1140A-00', 'RefaccionesMotor50', NULL),
(23, '6CJ-11656-00', 'RefaccionesMotor50', NULL),
(24, '6CJ-11656-30', 'RefaccionesMotor50', NULL),
(25, '6CJ-11656-20', 'RefaccionesMotor50', NULL),
(26, '6CJ-11656-10', 'RefaccionesMotor50', NULL),
(27, '93332-00095', 'RefaccionesMotor50', NULL),
(28, '64J45560-00', 'RefaccionesMotor50', NULL),
(29, '67F-45571-00', 'RefaccionesMotor50', NULL),
(30, '663-44551-02-8D', 'RefaccionesMotor50', NULL),
(31, '62Y-11631-10-96', 'RefaccionesMotor50', NULL),
(32, '62Y-44514-10', 'RefaccionesMotor50', NULL),
(33, '62Y-11633-00', 'RefaccionesMotor50', NULL),
(34, '90185-10027', 'RefaccionesMotor50', NULL),
(35, '62Y-14392-00', 'RefaccionesMotor50', NULL),
(36, '90109-08229', 'RefaccionesMotor50', NULL),
(37, '67F-45371-00', 'REFACCIONESDEMOTOR60FT', NULL),
(38, '6C5-41114-10', 'REFACCIONESDEMOTOR60FT', NULL),
(39, '6C5-41114-00', 'REFACCIONESDEMOTOR60FT', NULL),
(40, '64J-11603-01', 'REFACCIONESDEMOTOR60FT', NULL),
(41, '64J-11605-01', 'REFACCIONESDEMOTOR60FT', NULL),
(42, '6C5-46241-00', 'REFACCIONESDEMOTOR60FT', NULL),
(43, '6C5-41135-00', 'REFACCIONESDEMOTOR60FT', NULL),
(44, '6C5-15312-01', 'REFACCIONESDEMOTOR60FT', NULL),
(45, '6C5-41134-00', 'REFACCIONESDEMOTOR60FT', NULL),
(46, '6C5-111-81-01', 'REFACCIONESDEMOTOR60FT', NULL),
(47, '90185-10027', 'REFACCIONESDEMOTOR60FT', NULL),
(48, '663-44341-00', 'REFACCIONESDEMOTOR60FT', NULL),
(49, '6D8-44341-01-CA', 'REFACCIONESDEMOTOR60FT', NULL),
(50, '90794-46911', 'REFACCIONESDEMOTOR60FT', NULL),
(51, '90101-10041', 'REFACCIONESDEMOTOR60FT', NULL),
(52, '6GH-3440-70', 'REFACCIONESDEMOTOR60FT', NULL),
(53, '6L2-14385-00', 'REFACCIONESDEMOTOR60FT', NULL),
(54, '663-41114-A0', 'REFACCIONESMOTOR48HP', NULL),
(55, '697-11181-A2', 'REFACCIONESMOTOR48HP', NULL),
(56, '696-45113-A0', 'REFACCIONESMOTOR48HP', NULL),
(57, '663-11193-A0', 'REFACCIONESMOTOR48HP', NULL),
(58, '679-45371-00', 'REFACCIONESMOTOR48HP', NULL),
(59, '663-13621-A0', 'REFACCIONESMOTOR48HP', NULL),
(60, '663-13622-A0', 'REFACCIONESMOTOR48HP', NULL),
(61, '93102-27131', 'REFACCIONESMOTOR48HP', NULL),
(62, '93101-23070', 'REFACCIONESMOTOR48HP', NULL),
(63, '93101-22067', 'REFACCIONESMOTOR48HP', NULL),
(64, '93311-6331', 'REFACCIONESMOTOR48HP', NULL),
(65, '663-24411-00', 'REFACCIONESMOTOR48HP', NULL),
(66, '648-24435', 'REFACCIONESMOTOR48HP', NULL),
(67, '692-24411', 'REFACCIONESMOTOR48HP', NULL),
(68, '663-44315-44315A0', 'REFACCIONESMOTOR48HP', NULL),
(69, '663-44316-A0', 'REFACCIONESMOTOR48HP', NULL),
(70, '692-26301-03', 'REFACCIONESMOTOR48HP', NULL),
(72, '670-44514-00', 'REFACCIONESMOTOR48HP', NULL),
(73, '90250-06023', 'REFACCIONESMOTOR48HP', NULL),
(74, '93315-3224', 'REFACCIONESMOTOR48HP', NULL),
(75, '663-45631-01', 'REFACCIONESMOTOR48HP', NULL),
(76, '697-45560-00', 'REFACCIONESMOTOR48HP', NULL),
(77, '697-45571-00', 'REFACCIONESMOTOR48HP', NULL),
(78, '93332-00003', 'REFACCIONESMOTOR48HP', NULL),
(79, '93306-00702', 'REFACCIONESMOTOR48HP', NULL),
(80, '93332-00001', 'REFACCIONESMOTOR48HP', NULL),
(81, '697-45384-02', 'REFACCIONESMOTOR48HP', NULL),
(82, '90185-08018', 'REFACCIONESMOTOR48HP', NULL),
(83, '663-15739-00', 'REFACCIONESMOTOR48HP', NULL),
(84, '697-45551-00', 'REFACCIONESMOTOR48HP', NULL),
(85, '6H345113A000', 'RefaccionesMotor60HP', NULL),
(86, '6K5455510000', 'RefaccionesMotor60HP', NULL),
(87, '6K5455600000', 'RefaccionesMotor60HP', NULL),
(88, '6H311181A200', 'RefaccionesMotor60HP', NULL),
(89, '6H341111011S', 'RefaccionesMotor60HP', NULL),
(90, '931023000900', 'RefaccionesMotor60HP', NULL),
(91, '931061800100', 'RefaccionesMotor60HP', NULL),
(92, '93332000UE00', 'RefaccionesMotor60HP', NULL),
(93, '93310527W100', 'RefaccionesMotor60HP', NULL),
(94, '6K5116010200', 'RefaccionesMotor60HP', NULL),
(95, '6K5116360300', 'RefaccionesMotor60HP', NULL),
(96, '6K5116310395', 'RefaccionesMotor60HP', NULL),
(97, '6H311193A100', 'RefaccionesMotor60HP', NULL),
(98, '6H313622A100', 'RefaccionesMotor60HP', NULL),
(99, '6H313621A100', 'RefaccionesMotor60HP', NULL),
(100, '93306306V100', 'RefaccionesMotor60HP', NULL),
(102, '6H345114A100', 'RefaccionesMotor60HP', NULL),
(103, '6H34434101CA', 'RefaccionesMotor60HP', NULL),
(104, '93311636U600', 'RefaccionesMotor60HP', NULL),
(105, '9360318M0900', 'RefaccionesMotor60HP', NULL),
(106, '902092701100', 'RefaccionesMotor60HP', NULL),
(107, '6K5116510000', 'RefaccionesMotor60HP', NULL),
(108, '6H3116330000', 'RefaccionesMotor60HP', NULL),
(109, '6H3825102100', 'RefaccionesMotor60HP', NULL),
(110, '69D455011000', 'RefaccionesMotor60HP', NULL),
(111, '936032111100', 'RefaccionesMotor75HP', NULL),
(112, '9310230M0500', 'RefaccionesMotor75HP', NULL),
(113, '93310730V800', 'RefaccionesMotor75HP', NULL),
(114, '9310420M0200', 'RefaccionesMotor75HP', NULL),
(115, '68845114A100', 'RefaccionesMotor75HP', NULL),
(116, '663116330000', 'RefaccionesMotor75HP', NULL),
(117, '688445140000', 'RefaccionesMotor75HP', NULL),
(118, '902012041700', 'RefaccionesMotor75HP', NULL),
(119, '688116340000', 'RefaccionesMotor75HP', NULL),
(120, '688116310394', 'RefaccionesMotor75HP', NULL),
(121, '688116360300', 'RefaccionesMotor75HP', NULL),
(122, '68811603A000', 'RefaccionesMotor75HP', NULL),
(123, '68811605A000', 'RefaccionesMotor75HP', NULL),
(124, '93306206U500', 'RefaccionesMotor75HP', NULL),
(125, '93310835U800', 'RefaccionesMotor75HP', NULL),
(126, '93310636U400', 'RefaccionesMotor75HP', NULL),
(127, '688116500300', 'RefaccionesMotor75HP', NULL),
(128, '68841111001S', 'RefaccionesMotor75HP', NULL),
(129, '688455600000', 'RefaccionesMotor75HP', NULL),
(130, '688455710100', 'RefaccionesMotor75HP', NULL),
(131, '688455510100', 'RefaccionesMotor75HP', NULL),
(132, '9017016M0100', 'RefaccionesMotor75HP', NULL),
(133, '9028004M0400', 'RefaccionesMotor75HP', NULL),
(134, '688443520300', 'RefaccionesMotor75HP', NULL),
(135, '93315325V100', 'RefaccionesMotor75HP', NULL),
(136, '9025007M0200', 'RefaccionesMotor75HP', NULL),
(137, '9017016M0100', 'RefaccionesMotor75HP', NULL),
(138, '696157160000', 'RefaccionesMotor75HP', NULL),
(139, '663441510000', 'RefaccionesMotor75HP', NULL),
(140, '68844315A000', 'RefaccionesMotor75HP', NULL),
(141, '68844324A000', 'RefaccionesMotor75HP', NULL),
(142, '68811181A200', 'RefaccionesMotor75HP', NULL),
(143, '68841114A000', 'RefaccionesMotor75HP', NULL),
(144, '68841112A000', 'RefaccionesMotor75HP', NULL),
(145, '68845113A000', 'RefaccionesMotor75HP', NULL),
(146, '68813621A100', 'RefaccionesMotor75HP', NULL),
(147, '93332000W700', 'RefaccionesMotor75HP', NULL),
(148, '93332000U300', 'RefaccionesMotor75HP', NULL),
(149, '5GH134407000', 'RefaccionesMotor50', NULL),
(150, '6H313621A100', 'RefaccionesMotor60HP', NULL),
(151, '931022813500', 'REFACCIONESMOTOR48HP', NULL),
(152, '947010004000', 'REFACCIONESMOTOR48HP', NULL),
(153, '947020041800', 'REFACCIONESDEMOTOR60FT', NULL),
(154, '947010037500', 'RefaccionesMotor50', NULL),
(155, '947010016000', 'RefaccionesMotor75HP', NULL),
(156, '6CJ-11656-00', 'RefaccionesMotor50', NULL),
(157, '670-44514-00', 'REFACCIONESMOTOR48HP', NULL),
(158, '93101-23070', 'RefaccionesMotor50', NULL),
(159, '90185-10027', 'RefaccionesMotor50', NULL),
(160, '90794-46910', 'accesorios', NULL),
(161, '94701-00160', 'BUJIAS', NULL),
(162, '692-26301-03', 'accesorios', NULL),
(163, 'CC33212', 'accesorios', NULL),
(164, '697-45114-AO', 'REFACCIONESMOTOR48HP', NULL),
(165, '688-45635-00', 'RefaccionesMotor75HP', NULL),
(166, '90280-03M03', 'REFACCIONESMOTOR48HP', NULL),
(167, '93102-28135', 'REFACCIONESMOTOR48HP', NULL),
(168, '6H9-45551-00', 'REFACCIONESM40HP', NULL),
(169, '93306-00702', 'REFACCIONESM40HP', NULL),
(170, '93317-22204', 'REFACCIONESM40HP', NULL),
(171, '93315-3224', 'REFACCIONESM40HP', NULL),
(172, '679-45560-00', 'REFACCIONESM40HP', NULL),
(173, '90430-08003', 'accesorios', NULL),
(174, '6G1-24305-05', 'accesorios', NULL),
(175, '69W-82575-00', 'accesorios', NULL),
(176, '688-44352-03', 'RefaccionesMotor60HP', NULL),
(177, '6H3-44352-00', 'RefaccionesMotor50', NULL),
(178, '90386-30M77', 'RefaccionesMotor75HP', NULL),
(179, '90386-30048', 'REFACCIONESMOTOR48HP', NULL),
(180, '64J-45501-30', 'RefaccionesMotor50', NULL),
(181, '90386-22M15', 'accesorios', NULL),
(182, '93317-325U0', 'REFACCIONESMOTOR48HP', NULL),
(183, '93306-207U0', 'RefaccionesMotor75HP', NULL),
(184, '93315-32224', 'REFACCIONESMOTOR48HP', NULL),
(185, '93310-730V8', 'RefaccionesMotor75HP', NULL),
(186, '6H3-45113-A0', 'REFACCIONESDEMOTOR60FT', NULL),
(187, '64J-45551-00', 'RefaccionesMotor50', NULL),
(188, '93104-20M02', 'REFACCIONESDEMOTOR60FT', NULL),
(189, '64J-15311-02-9S', 'RefaccionesMotor50', NULL),
(190, '62Y-44555-00', 'RefaccionesMotor60HP', NULL),
(191, '670-44514-00', 'REFACCIONESMOTOR48HP', NULL),
(192, '43104-18049', 'REFACCIONESMOTOR48HP', NULL),
(193, '6H3-44352-00', 'RefaccionesMotor50', NULL),
(194, 'PRUEBA1048', 'RefaccionesMotor75HP', NULL),
(195, 'CUÑA 75HP', 'RefaccionesMotor75HP', NULL),
(196, '688-41112-A0', 'RefaccionesMotor75HP', NULL),
(197, '688-41114-A0', 'RefaccionesMotor75HP', NULL),
(198, '60V-12411-00', 'RefaccionesMotor50', NULL),
(199, '62Y-11325-00', 'RefaccionesMotor50', NULL),
(200, '663-15739-00', 'accesorios', NULL),
(201, '688-45113-A0', 'RefaccionesMotor75HP', NULL),
(202, '93102-30M05', 'RefaccionesMotor75HP', NULL),
(203, '90280-04M05', 'RefaccionesMotor115', NULL),
(204, '65W-45251-00', 'accesorios', NULL),
(205, '901850801800', 'RefaccionesMotor50', NULL),
(208, '931024801700', 'RefaccionesMotor115', NULL),
(209, '931014800200', 'RefaccionesMotor115', NULL),
(210, '931023800800', 'RefaccionesMotor115', NULL),
(211, '6D8114181000', 'RefaccionesMotor115', NULL),
(212, '68V113510000', 'RefaccionesMotor115', NULL),
(213, '67F111810300', 'RefaccionesMotor115', NULL),
(214, '6C5411140000', 'RefaccionesMotor50', NULL),
(215, '6Y1243605200', 'accesorios', NULL),
(216, '69W263010000', 'REFACCIONESDEMOTOR60FT', NULL),
(217, '67C483211100', 'REFACCIONESDEMOTOR60FT', NULL),
(220, '6H341112A000', 'RefaccionesMotor60HP', NULL),
(221, 'PruebaPollo', 'accesorios', NULL),
(222, 'Prueba1c', 'Prueba_sara', NULL),
(223, 'prueba2c', 'Prueba_sara', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantia`
--

CREATE TABLE `garantia` (
  `id_garantia` int(11) NOT NULL,
  `Codigo` varchar(150) COLLATE utf8_bin NOT NULL,
  `Expiracion` date NOT NULL,
  `Proveedor` varchar(150) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generales`
--

CREATE TABLE `generales` (
  `id_generales` int(11) NOT NULL,
  `Codigo` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `descripcion` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `precio` float DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `tabla` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `generales`
--

INSERT INTO `generales` (`id_generales`, `Codigo`, `descripcion`, `precio`, `cantidad`, `tabla`) VALUES
(1, '62Y-46241-00', 'Banda', 1205, 3, 'RefaccionesMotor50'),
(2, '62Y-46241-00', 'Banda', 1205, 3, 'RefaccionesMotor50'),
(3, '93332-000UE', 'BALERO', 1712, 1, 'RefaccionesMotor50'),
(4, '93102-43M42', 'SELLO', 150, 6, 'RefaccionesMotor50'),
(5, '62Y11636-10', 'PISTON', 1288, 4, 'RefaccionesMotor50'),
(6, '6BG-41134-00', 'JUNTA', 140, 4, 'RefaccionesMotor50'),
(7, '6C5-11650-10', 'BIELA', 4130, 4, 'RefaccionesMotor50'),
(8, '93102-37M40', 'SELLO', 170, 5, 'RefaccionesMotor50'),
(9, '62Y-14384-30', 'LIGA DE CARBURADOR 50FT', 160, 0, 'RefaccionesMotor50'),
(10, '6D8-45631-00', 'EMBRAGE DE GARRA', 2313, 1, 'RefaccionesMotor50'),
(11, '6D8-45631-00', 'EMBRAGE DE GARRA', 2313, 2, 'RefaccionesMotor50'),
(12, '93101-35002', 'SELLOS ', 415, 3, 'RefaccionesMotor50'),
(13, '93210-35M86', 'LIGA', 50, 4, 'RefaccionesMotor50'),
(14, '93450-17129', 'SEGUROS', 15, 10, 'RefaccionesMotor50'),
(15, '93103-18011', 'SELLOS', 750, 2, 'RefaccionesMotor50'),
(16, '62Y11181-00', 'JUNTA DE CABEZA', 1150, 2, 'RefaccionesMotor50'),
(17, '6BG-11351-00', 'JUNTA DE ASIENTO', 1320, 4, 'RefaccionesMotor50'),
(18, '62Y-11356-00', 'EMPAQUE', 230, 3, 'RefaccionesMotor50'),
(19, 'CBG-114OA-2O', 'METAL', 140, 4, 'RefaccionesMotor50'),
(20, 'CBG-1140A-10', 'METAL', 140, 4, 'RefaccionesMotor50'),
(21, 'CBG-114OA-30', 'METAL', 140, 4, 'RefaccionesMotor50'),
(22, 'CBG-1140A-00', 'METAL', 140, 4, 'RefaccionesMotor50'),
(23, '6CJ-11656-00', 'METAL', 8, 135, 'RefaccionesMotor50'),
(24, '6CJ-11656-30', 'METAL', 135, 8, 'RefaccionesMotor50'),
(25, '6CJ-11656-20', 'METAL', 135, 8, 'RefaccionesMotor50'),
(26, '6CJ-11656-10', 'METAL', 135, 8, 'RefaccionesMotor50'),
(27, '93332-00095', 'balero', 2950, 2, 'RefaccionesMotor50'),
(28, '64J45560-00', 'ENGRANE', 3641, 1, 'RefaccionesMotor50'),
(29, '67F-45571-00', 'EMGRANE', 1955, 1, 'RefaccionesMotor50'),
(30, '663-44551-02-8D', 'YUGO', 1690, 1, 'RefaccionesMotor50'),
(31, '62Y-11631-10-96', 'PISTON', 1160, 4, 'RefaccionesMotor50'),
(32, '62Y-44514-10', 'AMORTIGUADOR', 1524, 4, 'RefaccionesMotor50'),
(33, '62Y-11633-00', 'PERNO', 200, 4, 'RefaccionesMotor50'),
(34, '90185-10027', 'TUERCA', 50, 8, 'RefaccionesMotor50'),
(35, '62Y-14392-00', 'AGUJAS DE CARBULADOR', 524, 5, 'RefaccionesMotor50'),
(36, '90109-08229', 'TORNILLO', 379, 4, 'RefaccionesMotor50'),
(37, '67F-45371-00', 'ANODO', 686, 10, 'REFACCIONESDEMOTOR60FT'),
(38, '6C5-41114-10', 'JUNTA ', 750, 4, 'REFACCIONESDEMOTOR60FT'),
(39, '6C5-41114-00', 'JUNTA LUMBRERA', 450, 4, 'REFACCIONESDEMOTOR60FT'),
(40, '64J-11603-01', 'ANILLO', 1022, 2, 'REFACCIONESDEMOTOR60FT'),
(41, '64J-11605-01', 'ANILLO ', 1232, 1, 'REFACCIONESDEMOTOR60FT'),
(42, '6C5-46241-00', 'BANDA', 1166, 2, 'REFACCIONESDEMOTOR60FT'),
(43, '6C5-41135-00', 'JUNTA', 275, 2, 'REFACCIONESDEMOTOR60FT'),
(44, '6C5-15312-01', 'JUNTA DE ASIENTO', 1025, 3, 'REFACCIONESDEMOTOR60FT'),
(45, '6C5-41134-00', 'JUNTA', 420, 2, 'REFACCIONESDEMOTOR60FT'),
(46, '6C5-111-81-01', 'JUNTA DE CABEZA', 1222, 2, 'REFACCIONESDEMOTOR60FT'),
(47, '90185-10027', 'TUERCA', 50, 4, 'REFACCIONESDEMOTOR60FT'),
(48, '663-44341-00', 'BOMBA DE AGUA', 950, 2, 'REFACCIONESDEMOTOR60FT'),
(49, '6D8-44341-01-CA', 'BOMBA DE AGUA', 1550, 2, 'REFACCIONESDEMOTOR60FT'),
(50, '90794-46911', 'Filtro', 450, 6, 'REFACCIONESDEMOTOR60FT'),
(51, '90101-10041', 'TORNILLO', 375, 4, 'REFACCIONESDEMOTOR60FT'),
(52, '6GH-3440-70', 'FILTROS', 170, 2, 'REFACCIONESDEMOTOR60FT'),
(53, '6L2-14385-00', 'FLOTADORES', 310, 8, 'REFACCIONESDEMOTOR60FT'),
(54, '663-41114-A0', 'JUNTA LUMBRERA', 90, 4, 'REFACCIONESMOTOR48HP'),
(55, '697-11181-A2', 'JUNTA DE CABEZA', 850, 2, 'REFACCIONESMOTOR48HP'),
(56, '696-45113-A0', 'JUNTA DE ASIENTO', 460, 2, 'REFACCIONESMOTOR48HP'),
(57, '663-11193-A0', 'JUNTA', 115, 1, 'REFACCIONESMOTOR48HP'),
(58, '679-45371-00', 'ANODO 48HP', 310, 4, 'REFACCIONESMOTOR48HP'),
(59, '663-13621-A0', 'JUNTA ', 80, 3, 'REFACCIONESMOTOR48HP'),
(60, '663-13622-A0', 'JUNTA', 80, 1, 'REFACCIONESMOTOR48HP'),
(61, '93102-27131', 'SELLOS', 210, 3, 'REFACCIONESMOTOR48HP'),
(62, '93101-23070', 'SELLOS', 100, 12, 'REFACCIONESMOTOR48HP'),
(63, '93101-22067', 'SELLOS 40HP 48HP', 110, 25, 'REFACCIONESMOTOR48HP'),
(64, '93311-6331', 'BALERO', 1575, 4, 'REFACCIONESMOTOR48HP'),
(65, '663-24411-00', 'DIAFRAGMA', 110, 2, 'REFACCIONESMOTOR48HP'),
(66, '648-24435', 'DIAFRAGMA', 90, 16, 'REFACCIONESMOTOR48HP'),
(67, '692-24411', 'DIAFRAGMA', 200, 5, 'REFACCIONESMOTOR48HP'),
(68, '663-44315-44315A0', 'BOMBA DE AGUA', 80, 4, 'REFACCIONESMOTOR48HP'),
(69, '663-44316-A0', 'BOMBA DE AGUA', 80, 2, 'REFACCIONESMOTOR48HP'),
(70, '692-26301-03', 'CHICOTE DE ACELERADOR ', 1120, 2, 'REFACCIONESMOTOR48HP'),
(73, '90250-06023', 'PERNO', 70, 4, 'REFACCIONESMOTOR48HP'),
(74, '93315-3224', 'BALEROS DE ABUJA ', 630, 3, 'REFACCIONESMOTOR48HP'),
(75, '663-45631-01', 'EMBRAGE DE GARRA', 1265, 2, 'REFACCIONESMOTOR48HP'),
(76, '697-45560-00', 'EMBRANE', 2645, 2, 'REFACCIONESMOTOR48HP'),
(77, '697-45571-00', 'ENGRANE', 1870, 1, 'REFACCIONESMOTOR48HP'),
(78, '93332-00003', 'BALERO DE FLECHA 48HP', 1200, 5, 'REFACCIONESMOTOR48HP'),
(79, '93306-00702', 'BALERO', 330, 1, 'REFACCIONESMOTOR48HP'),
(80, '93332-00001', 'BALERO 40,48hp', 900, 5, 'REFACCIONESMOTOR48HP'),
(81, '697-45384-02', 'TUERCAS NUCLEO 48HP', 370, 5, 'REFACCIONESMOTOR48HP'),
(82, '90185-08018', 'TUERCA', 50, 4, 'REFACCIONESMOTOR48HP'),
(83, '663-15739-00', 'LAINA', 70, 2, 'REFACCIONESMOTOR48HP'),
(84, '697-45551-00', 'PIÑON', 1670, 1, 'REFACCIONESMOTOR48HP'),
(85, '6h345113a000', 'JUNTA DE ASIENTO', 300, 2, 'RefaccionesMotor60HP'),
(86, '6k5455510000', 'PIÑON', 1907, 2, 'RefaccionesMotor60HP'),
(87, '6k5455600000', 'ENGRANE', 2910, 2, 'RefaccionesMotor60HP'),
(88, '6h311181a200', 'JUNTA DE CABEZA', 840, 4, 'RefaccionesMotor60HP'),
(89, '6h341111011s', 'PLACA', 781, 2, 'RefaccionesMotor60HP'),
(90, '931023000900', 'SELLOS', 210, 6, 'RefaccionesMotor60HP'),
(92, '93332000ue00', 'BALERO', 1712, 1, 'RefaccionesMotor60HP'),
(93, '93310527w100', 'CANASTILLAS', 470, 12, 'RefaccionesMotor60HP'),
(94, '6k5116010200', 'ANILLOS', 570, 3, 'RefaccionesMotor60HP'),
(95, '6k5116360300', 'PISTON', 785, 5, 'RefaccionesMotor60HP'),
(97, '6h311193a100', 'JUNTA DE CABEZOTE', 480, 1, 'RefaccionesMotor60HP'),
(98, '6h313622a100', 'JUNTA DE CARBURADORES ', 315, 3, 'RefaccionesMotor60HP'),
(100, '93306306v100', 'BALERO DE ABAJO', 870, 2, 'RefaccionesMotor60HP'),
(101, '6h341112a000', 'JUNTA LUMBRERA', 292, 3, 'RefaccionesMotor60HP'),
(102, '6h345114a100', 'JUNTA DE MOFLE', 255, 3, 'RefaccionesMotor60HP'),
(103, '6h34434101ca', 'CAJA BOMBA DE AGUA ', 1200, 1, 'RefaccionesMotor60HP'),
(104, '93311636u600', 'BALERO DE ARRIBA', 1270, 2, 'RefaccionesMotor60HP'),
(105, '9360318m0900', 'RODILLOS ', 25, 255, 'RefaccionesMotor60HP'),
(106, '902092701100', 'ARANDELA', 330, 16, 'RefaccionesMotor60HP'),
(107, '6k5116510000', 'VIELA', 1002, 3, 'RefaccionesMotor60HP'),
(108, '6h3116330000', 'PERNO', 180, 3, 'RefaccionesMotor60HP'),
(109, '6h3825102100', 'APAGADOR', 3972, 1, 'RefaccionesMotor60HP'),
(110, '69d455011000', 'FLECHA', 6020, 1, 'RefaccionesMotor60HP'),
(111, '936032111100', 'RODILLO', 25, 165, 'RefaccionesMotor75HP'),
(112, '9310230m0500', 'SELLO', 110, 3, 'RefaccionesMotor75HP'),
(113, '93310730v800', 'CANASTILLA', 1500, 3, 'RefaccionesMotor75HP'),
(114, '9310420m0200', 'SELLO', 90, 1, 'RefaccionesMotor75HP'),
(115, '68845114a100', 'JUNTA MOFLE', 330, 2, 'RefaccionesMotor75HP'),
(116, '663116330000', 'PERNO', 130, 6, 'RefaccionesMotor75HP'),
(117, '688445140000', 'AMORTIGUADOR', 800, 2, 'RefaccionesMotor75HP'),
(118, '902012041700', 'ARANDELA', 40, 7, 'RefaccionesMotor75HP'),
(119, '688116340000', 'SEGURO', 30, 12, 'RefaccionesMotor75HP'),
(120, '688116310394', 'PISTON', 1095, 3, 'RefaccionesMotor75HP'),
(121, '688116360300', 'PISTON', 1030, 12, 'RefaccionesMotor75HP'),
(122, '68811603a000', 'ANILLO', 455, 3, 'RefaccionesMotor75HP'),
(123, '68811605a000', 'ANILLO', 460, 6, 'RefaccionesMotor75HP'),
(124, '93306206u500', 'BALERO', 1150, 4, 'RefaccionesMotor75HP'),
(125, '93310835u800', 'BALERO', 1800, 12, 'RefaccionesMotor75HP'),
(126, '93310636u400', 'BALERO', 1490, 4, 'RefaccionesMotor75HP'),
(127, '688116500300', 'BIELA', 3330, 3, 'RefaccionesMotor75HP'),
(128, '68841111001s', 'PLACA', 850, 2, 'RefaccionesMotor75HP'),
(129, '688455600000', 'ENGRANE', 1750, 2, 'RefaccionesMotor75HP'),
(130, '688455710100', 'ENGRANE', 1009, 2, 'RefaccionesMotor75HP'),
(131, '688455510100', 'PIÑON', 1470, 2, 'RefaccionesMotor75HP'),
(132, '9017016m0100', 'TUERCA DE PIÑON', 80, 1, 'RefaccionesMotor75HP'),
(133, '9028004m0400', 'CUÑA', 100, 3, 'RefaccionesMotor75HP'),
(134, '688443520300', 'IMPULSOR', 370, 1, 'RefaccionesMotor75HP'),
(135, '93315325v100', 'BALERO DE FLECHA', 1000, 4, 'RefaccionesMotor75HP'),
(136, '9025007m0200', 'PERNO', 70, 5, 'RefaccionesMotor75HP'),
(137, '9017016m0100', 'ARANDELA', 90, 2, 'RefaccionesMotor75HP'),
(138, '696157160000', 'PLACA DE GARRA', 330, 1, 'RefaccionesMotor75HP'),
(139, '663441510000', 'LEVA DE CAMBIO ', 405, 3, 'RefaccionesMotor75HP'),
(140, '68844315a000', 'JUNTA DE BOMBA DE AGUA ', 60, 3, 'RefaccionesMotor75HP'),
(141, '68844324a000', 'JUNTA DE BOMBA DE AGUA ', 60, 3, 'RefaccionesMotor75HP'),
(142, '68811181a200', 'JUNTA DE CABEZA', 985, 1, 'RefaccionesMotor75HP'),
(143, '68841114a000', 'JUNTA LUMBRERA', 360, 10, 'RefaccionesMotor75HP'),
(144, '68841112a000', 'junta de lumbrera', 300, 10, 'RefaccionesMotor75HP'),
(145, '68845113a000', 'JUNTA DE ASIENTO', 400, 4, 'RefaccionesMotor75HP'),
(146, '68813621a100', 'JUNTA CARBURADORES ', 90, 4, 'RefaccionesMotor75HP'),
(147, '93332000w700', 'BALERO', 1530, 2, 'RefaccionesMotor75HP'),
(148, '93332000u300', 'BALERO', 530, 3, 'RefaccionesMotor75HP'),
(149, '5gh134407000', 'Filtro', 170, 65, 'RefaccionesMotor50'),
(151, '931022813500', 'SELLO ESTOPERO', 210, 2, 'REFACCIONESMOTOR48HP'),
(152, '947010004000', 'BUJIA', 45, 99, 'REFACCIONESMOTOR48HP'),
(153, '947020041800', 'BUJIA', 45, 96, 'REFACCIONESDEMOTOR60FT'),
(154, '947010037500', 'BUJIA', 45, 72, 'RefaccionesMotor50'),
(155, '947010016000', 'BUJIA', 45, 0, 'RefaccionesMotor75HP'),
(156, '6CJ-11656-00', 'METAL ', 135, 8, 'RefaccionesMotor50'),
(157, '670-44514-00', 'AMORTIGUADOR SUPERIOR', 920, 0, 'REFACCIONESMOTOR48HP'),
(158, '93101-23070', 'sellos de aceite FLECHA|-3', 100, 10, 'RefaccionesMotor50'),
(159, '90185-10027', 'TUERCA AUTOBLOCANTE(24)', 50, 8, 'RefaccionesMotor50'),
(160, '90794-46910', 'filtro separador gasolina ', 2592, 10, 'accesorios'),
(161, '94701-00160', 'Bujia B8HS-10 M 60-200HP', 45, 200, 'BUJIAS'),
(162, '692-26301-03', 'CHICOTE DE ACELERADOR  UNIVERSAL ', 1120, 3, 'accesorios'),
(163, 'CC33212', 'JGO.CHICOTES DE CONTROL 12', 985, 4, 'accesorios'),
(164, '697-45114-AO', 'JUNTA  DE MOFLE 48hp', 300, 5, 'REFACCIONESMOTOR48HP'),
(165, '688-45635-00', 'embolo 48,60,75HP..50ft', 350, 4, 'RefaccionesMotor75HP'),
(166, '90280-03m03', 'CUÑA 48hp,50ft', 150, 8, 'REFACCIONESMOTOR48HP'),
(167, '93102-28135', 'SELLO  ESTOPERO 48hp', 220, 10, 'REFACCIONESMOTOR48HP'),
(168, '6H9-45551-00', 'PIÑON 40HP', 1500, 1, 'REFACCIONESM40HP'),
(169, '93306-00702', 'BALERO FLECHA 40HP', 350, 5, 'REFACCIONESM40HP'),
(170, '93317-22204', 'BALERO 40HP', 200, 6, 'REFACCIONESM40HP'),
(171, '93315-3224', 'BALERO FLECHA 40HP', 630, 1, 'REFACCIONESM40HP'),
(172, '679-45560-00', 'ENGRANE 40HP', 2400, 1, 'REFACCIONESM40HP'),
(173, '90430-08003', 'SELLOS CAMBIO ACEITE', 40, 83, 'accesorios'),
(174, '6G1-24305-05', 'CONECTORES', 450, 5, 'accesorios'),
(175, '69W-82575-00', 'APAGADORES', 1450, 5, 'accesorios'),
(176, '688-44352-03', 'IMPULSOR 60FT,75HP', 380, 5, 'RefaccionesMotor60HP'),
(177, '6H3-44352-00', 'IMPULSOR 50,60FT', 400, 6, 'RefaccionesMotor50'),
(178, '90386-30M77', 'BUJE 75HP,60HP', 180, 4, 'RefaccionesMotor75HP'),
(179, '90386-30048', 'BUJE 48HP,60HP,75HP', 180, 46, 'REFACCIONESMOTOR48HP'),
(180, '64J-45501-30', 'FLECHA 50FT', 5100, 1, 'RefaccionesMotor50'),
(181, '90386-22M15', 'BUJE ESTANDAR', 150, 20, 'accesorios'),
(182, '93317-325U0', 'BALERO 48HP', 250, 3, 'REFACCIONESMOTOR48HP'),
(183, '93306-207U0', 'BALERO REVER4SA 60HP,75HP,50FT,60FT', 400, 3, 'RefaccionesMotor75HP'),
(184, '93315-32224', 'BALERO  DE LA FLECHA 48HP', 700, 4, 'REFACCIONESMOTOR48HP'),
(185, '93310-730V8', 'CANASTILLA 48HP,75HP', 1500, 8, 'RefaccionesMotor75HP'),
(186, '6H3-45113-A0', 'JUN5TA DE ASIENTO 60HP', 420, 3, 'REFACCIONESDEMOTOR60FT'),
(187, '64J-45551-00', 'PIÑON 50FT', 2290, 3, 'RefaccionesMotor50'),
(188, '93104-20M02', 'SELLLO FLECHA L 48HP', 100, 20, 'REFACCIONESDEMOTOR60FT'),
(189, '64J-15311-02-9S', 'CARTER 50FT', 4995, 2, 'RefaccionesMotor50'),
(190, '62Y-44555-00', 'AMORTIGUADOR 60HP', 800, 1, 'RefaccionesMotor60HP'),
(191, '670-44514-00', 'AMORTIGUADOR SUPERIOR 48HP', 1000, 6, 'REFACCIONESMOTOR48HP'),
(192, '43104-18049', 'SELLO  ESTOPERO 48hp', 250, 10, 'REFACCIONESMOTOR48HP'),
(193, '6H3-44352-00', 'IMPULSOR 50,60FT Y 48HP', 400, 6, 'RefaccionesMotor50'),
(194, 'Prueba1048', 'Prueba2', 10, 1, 'RefaccionesMotor75HP'),
(195, 'cuña 75hp', 'cuñaa', 100, 0, 'RefaccionesMotor75HP'),
(196, '688-41112-a0', 'junta de lumbrera', 230, 0, 'RefaccionesMotor75HP'),
(197, '688-41114-a0', 'junta de lumbrera  2', 330, 1, 'RefaccionesMotor75HP'),
(198, '60V-12411-00', 'termostato', 1220, 1, 'RefaccionesMotor50'),
(199, '62Y-11325-00', 'ANODO', 150, 5, 'RefaccionesMotor50'),
(200, '663-15739-00', 'laina de plastico', 120, 8, 'accesorios'),
(201, '688-45113-A0', 'JUNTA DE ASIENTO', 400, 4, 'RefaccionesMotor75HP'),
(202, '93102-30M05', 'SELLO', 110, 12, 'RefaccionesMotor75HP'),
(203, '90280-04M05', 'CUÑA', 220, 2, 'RefaccionesMotor115'),
(204, '65W-45251-00', 'ANODO. 50FT,60FT,60HP', 300, 8, 'accesorios'),
(205, '901850801800', 'tuerca de amortiguador', 50, 4, 'RefaccionesMotor50'),
(207, '6H341112A000', 'junta de lumbrera', 291, 1, 'RefaccionesMotor60HP'),
(208, '931024801700', 'sello aceite', 300, 0, 'RefaccionesMotor115'),
(209, '931014800200', 'SELLO', 500, 0, 'RefaccionesMotor115'),
(210, '931023800800', 'sello', 425, 0, 'RefaccionesMotor115'),
(211, '6D8114181000', 'cojiete', 810, 0, 'RefaccionesMotor115'),
(212, '68V113510000', 'EMPAQUE', 1050, 0, 'RefaccionesMotor115'),
(213, '67F111810300', 'EMPAQUE', 2315, 0, 'RefaccionesMotor115'),
(214, '6c5411140000', 'JUNTA LUMBRERA', 500, 9, 'RefaccionesMotor50'),
(215, '6y1243605200', 'PERILLA', 460, 20, 'accesorios'),
(216, '69w263010000', 'CHICOTE DE ACELERADOR ', 1570, 2, 'REFACCIONESDEMOTOR60FT'),
(217, '67c483211100', 'CHICOTE', 1650, 2, 'REFACCIONESDEMOTOR60FT'),
(219, '6h341112a000', 'JUNTA LUMBRERA', 292, 3, 'RefaccionesMotor60HP'),
(220, '6H341112A000', 'JUNTA  LUMBRERA', 292, 3, 'RefaccionesMotor60HP'),
(221, 'PruebaPollo', 'Pollito', 24, 5, 'accesorios'),
(222, 'Prueba1c', 'Prueba1', 10, 10, 'Prueba_sara'),
(223, 'prueba2c', 'prueba2', 10, 10, 'Prueba_sara');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `num_serie`
--

CREATE TABLE `num_serie` (
  `historial` int(11) UNSIGNED ZEROFILL NOT NULL,
  `resguardo_general` int(11) UNSIGNED ZEROFILL NOT NULL,
  `resguardo_celular` int(11) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba_sara`
--

CREATE TABLE `prueba_sara` (
  `id_Prueba_sara` int(11) NOT NULL,
  `Codigo` varchar(150) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Fecha_Compra` date DEFAULT NULL,
  `Duracion` int(11) DEFAULT NULL,
  `Fecha_Cambio` date DEFAULT NULL,
  `Costo` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prueba_sara`
--

INSERT INTO `prueba_sara` (`id_Prueba_sara`, `Codigo`, `Nombre`, `Fecha_Compra`, `Duracion`, `Fecha_Cambio`, `Costo`, `Cantidad`) VALUES
(1, 'Prueba1c', 'Prueba1', NULL, NULL, '1970-01-01', 10, 10),
(2, 'prueba2c', 'prueba2', NULL, NULL, '1970-01-01', 10, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refaccionesdemotor60ft`
--

CREATE TABLE `refaccionesdemotor60ft` (
  `id_REFACCIONESDEMOTOR60FT` int(11) NOT NULL,
  `Codigo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Compra` date DEFAULT NULL,
  `Duracion` int(11) DEFAULT NULL,
  `Fecha_Cambio` date DEFAULT NULL,
  `Costo` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `refaccionesdemotor60ft`
--

INSERT INTO `refaccionesdemotor60ft` (`id_REFACCIONESDEMOTOR60FT`, `Codigo`, `Nombre`, `Fecha_Compra`, `Duracion`, `Fecha_Cambio`, `Costo`, `Cantidad`) VALUES
(1, '67F-45371-00', 'ANODO', NULL, NULL, '1970-01-01', 686, 10),
(2, '6c5411141000', 'JUNTA LUMBRERA', NULL, NULL, '1970-01-01', 790, 9),
(4, '64J-11603-01', 'ANILLO', NULL, NULL, '1970-01-01', 1022, 4),
(5, '64J-11605-01', 'ANILLO ', NULL, NULL, '1970-01-01', 1232, 2),
(6, '6c5462410000', 'BANDA', NULL, NULL, '1970-01-01', 1275, 4),
(7, '6C5-41135-00', 'JUNTA', NULL, NULL, '1970-01-01', 275, 2),
(8, '6C5-15312-01', 'JUNTA DE ASIENTO', NULL, NULL, '1970-01-01', 1025, 3),
(9, '6C5-41134-00', 'JUNTA', NULL, NULL, '1970-01-01', 420, 2),
(10, '6c5111810100', 'JUNTA DE CABEZA', NULL, NULL, '1970-01-01', 1340, 7),
(12, '663-44341-00', 'BOMBA DE AGUA', NULL, NULL, '1970-01-01', 950, 2),
(13, '6D8-44341-01-CA', 'BOMBA DE AGUA', NULL, NULL, '1970-01-01', 1550, 2),
(14, '90794-46911', 'Filtro', NULL, NULL, '1970-01-01', 450, 6),
(15, '90101-10041', 'TORNILLO', NULL, NULL, '1970-01-01', 375, 4),
(16, '5GH-13440-70', 'FILTROS', NULL, NULL, '1970-01-01', 170, 26),
(17, '6L2-14385-00', 'FLOTADORES', NULL, NULL, '1970-01-01', 310, 8),
(18, '947020041800', 'BUJIA', NULL, NULL, '1970-01-01', 45, 96),
(19, '6H3-45113-A0', 'JUN5TA DE ASIENTO 60HP', NULL, NULL, '1970-01-01', 420, 3),
(20, '93104-20M02', 'SELLLO FLECHA L 48HP', NULL, NULL, '1970-01-01', 100, 20),
(21, '6H345114A100', 'JUNTA DE MOFLE', NULL, NULL, '1970-01-01', 255, 2),
(22, '6H341112A000', 'junta de lumbrera', NULL, NULL, '1970-01-01', 291, 1),
(23, '69w263010000', 'CHICOTE DE ACELERADOR ', NULL, NULL, '1970-01-01', 1570, 2),
(24, '67c483211100', 'CHICOTE', NULL, NULL, '1970-01-01', 1650, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refaccionesm40hp`
--

CREATE TABLE `refaccionesm40hp` (
  `id_REFACCIONESM40HP` int(11) NOT NULL,
  `Codigo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Compra` date DEFAULT NULL,
  `Duracion` int(11) DEFAULT NULL,
  `Fecha_Cambio` date DEFAULT NULL,
  `Costo` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `refaccionesm40hp`
--

INSERT INTO `refaccionesm40hp` (`id_REFACCIONESM40HP`, `Codigo`, `Nombre`, `Fecha_Compra`, `Duracion`, `Fecha_Cambio`, `Costo`, `Cantidad`) VALUES
(1, '6H9-45551-00', 'PIÑON 40HP', NULL, NULL, '1970-01-01', 1500, 1),
(2, '93306-00702', 'BALERO FLECHA 40HP', NULL, NULL, '1970-01-01', 350, 5),
(3, '93317-22204', 'BALERO 40HP', NULL, NULL, '1970-01-01', 200, 6),
(4, '93315-3224', 'BALERO FLECHA 40HP', NULL, NULL, '1970-01-01', 630, 1),
(5, '679-45560-00', 'ENGRANE 40HP', NULL, NULL, '1970-01-01', 2400, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refaccionesmotor48hp`
--

CREATE TABLE `refaccionesmotor48hp` (
  `id_REFACCIONESMOTOR48HP` int(11) NOT NULL,
  `Codigo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Compra` date DEFAULT NULL,
  `Duracion` int(11) DEFAULT NULL,
  `Fecha_Cambio` date DEFAULT NULL,
  `Costo` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `refaccionesmotor48hp`
--

INSERT INTO `refaccionesmotor48hp` (`id_REFACCIONESMOTOR48HP`, `Codigo`, `Nombre`, `Fecha_Compra`, `Duracion`, `Fecha_Cambio`, `Costo`, `Cantidad`) VALUES
(1, '663-41114-A0', 'JUNTA LUMBRERA', NULL, NULL, '1970-01-01', 90, 4),
(2, '697-11181-A2', 'JUNTA DE CABEZA', NULL, NULL, '1970-01-01', 850, 2),
(3, '696-45113-A0', 'JUNTA DE ASIENTO', NULL, NULL, '1970-01-01', 460, 2),
(4, '663-11193-A0', 'JUNTA', NULL, NULL, '1970-01-01', 115, 1),
(5, '679-45371-00', 'ANODO 48HP', NULL, NULL, '1970-01-01', 310, 4),
(6, '663-13621-A0', 'JUNTA ', NULL, NULL, '1970-01-01', 80, 3),
(7, '663-13622-A0', 'JUNTA', NULL, NULL, '1970-01-01', 80, 1),
(8, '93102-27131', 'SELLOS', NULL, NULL, '1970-01-01', 210, 3),
(10, '93101-22067', 'SELLOS 40HP 48HP', NULL, NULL, '1970-01-01', 110, 25),
(11, '93311-6331', 'BALERO', NULL, NULL, '1970-01-01', 1575, 4),
(12, '663-24411-00', 'DIAFRAGMA', NULL, NULL, '1970-01-01', 110, 2),
(13, '648-24435', 'DIAFRAGMA', NULL, NULL, '1970-01-01', 90, 16),
(14, '692-24411', 'DIAFRAGMA', NULL, NULL, '1970-01-01', 200, 5),
(15, '663-44315-44315A0', 'BOMBA DE AGUA', NULL, NULL, '1970-01-01', 80, 4),
(16, '663-44316-A0', 'BOMBA DE AGUA', NULL, NULL, '1970-01-01', 80, 2),
(20, '90250-06023', 'PERNO', NULL, NULL, '1970-01-01', 70, 4),
(21, '93315-3224', 'BALEROS DE ABUJA ', NULL, NULL, '1970-01-01', 630, 3),
(22, '663-45631-01', 'EMBRAGE DE GARRA', NULL, NULL, '1970-01-01', 1265, 2),
(23, '697-45560-00', 'EMBRANE', NULL, NULL, '1970-01-01', 2645, 2),
(24, '697-45571-00', 'ENGRANE', NULL, NULL, '1970-01-01', 1870, 1),
(25, '93332-00003', 'BALERO DE FLECHA 48HP', NULL, NULL, '1970-01-01', 1200, 5),
(26, '93306-00702', 'BALERO', NULL, NULL, '1970-01-01', 330, 1),
(27, '93332-00001', 'BALERO 40,48hp', NULL, NULL, '1970-01-01', 900, 5),
(28, '697-45384-02', 'TUERCAS NUCLEO 48HP', NULL, NULL, '1970-01-01', 370, 5),
(29, '90185-08018', 'TUERCA', NULL, NULL, '1970-01-01', 50, 4),
(30, '663-15739-00', 'LAINA', NULL, NULL, '1970-01-01', 70, 2),
(31, '697-45551-00', 'PIÑON', NULL, NULL, '1970-01-01', 1670, 1),
(32, '931022813500', 'SELLO ESTOPERO', NULL, NULL, '1970-01-01', 210, 2),
(33, '947010004000', 'BUJIA', NULL, NULL, '1970-01-01', 45, 99),
(34, '670-44514-001', 'AMORTIGUADOR SUPERIOR 48HP', NULL, NULL, '1970-01-01', 920, 6),
(35, '697-45114-AO', 'JUNTA  DE MOFLE 48hp', NULL, NULL, '1970-01-01', 300, 5),
(36, '90280-03m03', 'CUÑA 48hp,50ft', NULL, NULL, '1970-01-01', 150, 8),
(37, '93102-28135', 'SELLO  ESTOPERO 48hp', NULL, NULL, '1970-01-01', 220, 10),
(38, '90386-30048', 'BUJE 48HP,60HP,75HP', NULL, NULL, '1970-01-01', 180, 46),
(39, '93317-325U0', 'BALERO 48HP', NULL, NULL, '1970-01-01', 250, 3),
(40, '93315-32224', 'BALERO  DE LA FLECHA 48HP', NULL, NULL, '1970-01-01', 700, 4),
(41, '670-44514-00', 'AMORTIGUADOR SUPERIOR 48HP', NULL, NULL, '1970-01-01', 1000, 6),
(42, '43104-18049', 'SELLO  ESTOPERO 48hp', NULL, NULL, '1970-01-01', 250, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refaccionesmotor50`
--

CREATE TABLE `refaccionesmotor50` (
  `id_RefaccionesMotor50` int(11) NOT NULL,
  `Codigo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Compra` date DEFAULT NULL,
  `Duracion` int(11) DEFAULT NULL,
  `Fecha_Cambio` date DEFAULT NULL,
  `Costo` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `refaccionesmotor50`
--

INSERT INTO `refaccionesmotor50` (`id_RefaccionesMotor50`, `Codigo`, `Nombre`, `Fecha_Compra`, `Duracion`, `Fecha_Cambio`, `Costo`, `Cantidad`) VALUES
(1, '62y462410000', 'Banda', NULL, NULL, '1970-01-01', 1250, 5),
(2, '93332-000UE', 'BALERO', NULL, NULL, '1970-01-01', 1712, 1),
(3, '93102-43M42', 'SELLO', NULL, NULL, '1970-01-01', 150, 6),
(4, '62Y11636-10', 'PISTON', NULL, NULL, '1970-01-01', 1288, 4),
(5, '6bg411340000', 'JUNTA', NULL, NULL, '1970-01-01', 150, 9),
(6, '6C5-11650-10', 'BIELA', NULL, NULL, '1970-01-01', 4130, 4),
(7, '93102-37M40', 'SELLO', NULL, NULL, '1970-01-01', 170, 5),
(8, '62Y-14384-30', 'LIGA DE CARBURADOR 50FT', NULL, NULL, '1970-01-01', 160, 0),
(10, '6D8-45631-00', 'EMBRAGE DE GARRA', NULL, NULL, '1970-01-01', 2313, 2),
(11, '93101-35002', 'SELLOS ', NULL, NULL, '1970-01-01', 415, 3),
(12, '93210-35M86', 'LIGA', NULL, NULL, '1970-01-01', 50, 4),
(13, '93450-17129', 'SEGUROS', NULL, NULL, '1970-01-01', 15, 10),
(14, '931031801100', 'SELLOS', NULL, NULL, '1970-01-01', 820, 12),
(15, '62y111810000', 'JUNTA DE CABEZA', NULL, NULL, '1970-01-01', 1260, 7),
(16, '6bg113510000', 'JUNTA DE ASIENTO', NULL, NULL, '1970-01-01', 1450, 9),
(17, '62Y-11356-00', 'EMPAQUE', NULL, NULL, '1970-01-01', 230, 3),
(18, 'CBG-114OA-2O', 'METAL', NULL, NULL, '1970-01-01', 140, 4),
(19, 'CBG-1140A-10', 'METAL', NULL, NULL, '1970-01-01', 140, 4),
(20, 'CBG-114OA-30', 'METAL', NULL, NULL, '1970-01-01', 140, 4),
(21, 'CBG-1140A-00', 'METAL', NULL, NULL, '1970-01-01', 140, 4),
(22, '6CJ-11656-00', 'METAL', NULL, NULL, '1970-01-01', 8, 135),
(23, '6CJ-11656-30', 'METAL', NULL, NULL, '1970-01-01', 135, 8),
(24, '6CJ-11656-20', 'METAL', NULL, NULL, '1970-01-01', 135, 8),
(25, '6CJ-11656-10', 'METAL', NULL, NULL, '1970-01-01', 135, 8),
(26, '93332-00095', 'balero', NULL, NULL, '1970-01-01', 2950, 2),
(27, '64J45560-00', 'ENGRANE', NULL, NULL, '1970-01-01', 3641, 1),
(28, '67F-45571-00', 'EMGRANE', NULL, NULL, '1970-01-01', 1955, 1),
(29, '663-44551-02-8D', 'YUGO', NULL, NULL, '1970-01-01', 1690, 1),
(30, '62Y-11631-10-96', 'PISTON', NULL, NULL, '1970-01-01', 1160, 4),
(31, '62Y-44514-10', 'AMORTIGUADOR', NULL, NULL, '1970-01-01', 1524, 4),
(32, '62Y-11633-00', 'PERNO', NULL, NULL, '1970-01-01', 200, 4),
(34, '62Y-14392-00', 'AGUJAS DE CARBULADOR', NULL, NULL, '1970-01-01', 524, 5),
(35, '90109-08229', 'TORNILLO', NULL, NULL, '1970-01-01', 379, 4),
(36, '5gh134407000', 'Filtro', NULL, NULL, '1970-01-01', 170, 65),
(37, '947010037500', 'BUJIA', NULL, NULL, '1970-01-01', 45, 72),
(38, '6CJ-11656-00', 'METAL ', NULL, NULL, '1970-01-01', 135, 8),
(39, '931012307000', 'sellos de aceite FLECHA|-3', NULL, NULL, '1970-01-01', 110, 17),
(40, '901851002700', 'TUERCA AUTOBLOCANTE(24)', NULL, NULL, '1970-01-01', 50, 6),
(41, '6h3443520000', 'IMPULSOR 50,60FT', NULL, NULL, '1970-01-01', 450, 13),
(42, '64J-45501-30', 'FLECHA 50FT', NULL, NULL, '1970-01-01', 5100, 1),
(43, '64J-45551-00', 'PIÑON 50FT', NULL, NULL, '1970-01-01', 2290, 3),
(44, '64J-15311-02-9S', 'CARTER 50FT', NULL, NULL, '1970-01-01', 4995, 2),
(45, '6H3-44352-00', 'IMPULSOR 50,60FT Y 48HP', NULL, NULL, '1970-01-01', 400, 6),
(46, '60V-12411-00', 'termostato', NULL, NULL, '1970-01-01', 1220, 1),
(47, '62Y113250000', 'ANODO', NULL, NULL, '1970-01-01', 150, 5),
(48, '901850801800', 'tuerca de amortiguador', NULL, NULL, '1970-01-01', 50, 4),
(49, '6c5411140000', 'JUNTA LUMBRERA', NULL, NULL, '1970-01-01', 500, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refaccionesmotor60hp`
--

CREATE TABLE `refaccionesmotor60hp` (
  `id_RefaccionesMotor60HP` int(11) NOT NULL,
  `Codigo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Compra` date DEFAULT NULL,
  `Duracion` int(11) DEFAULT NULL,
  `Fecha_Cambio` date DEFAULT NULL,
  `Costo` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `refaccionesmotor60hp`
--

INSERT INTO `refaccionesmotor60hp` (`id_RefaccionesMotor60HP`, `Codigo`, `Nombre`, `Fecha_Compra`, `Duracion`, `Fecha_Cambio`, `Costo`, `Cantidad`) VALUES
(1, '6h345113a000', 'JUNTA DE ASIENTO', NULL, NULL, '1970-01-01', 300, 2),
(2, '6k5455510000', 'PIÑON', NULL, NULL, '1970-01-01', 1907, 2),
(3, '6k5455600000', 'ENGRANE', NULL, NULL, '1970-01-01', 2910, 2),
(4, '6h311181a200', 'JUNTA DE CABEZA', NULL, NULL, '1970-01-01', 840, 4),
(5, '6h341111011s', 'PLACA', NULL, NULL, '1970-01-01', 781, 2),
(6, '931023000900', 'SELLOS', NULL, NULL, '1970-01-01', 210, 6),
(7, '931061800100', 'SELLOS', NULL, NULL, '1970-01-01', 80, 6),
(8, '93332000ue00', 'BALERO', NULL, NULL, '1970-01-01', 1712, 1),
(9, '93310527w100', 'CANASTILLAS', NULL, NULL, '1970-01-01', 470, 12),
(10, '6k5116010200', 'ANILLOS', NULL, NULL, '1970-01-01', 570, 3),
(11, '6k5116360300', 'PISTON', NULL, NULL, '1970-01-01', 785, 5),
(12, '6k5116310395', 'PISTON', NULL, NULL, '1970-01-01', 912, 4),
(13, '6h311193a100', 'JUNTA DE CABEZOTE', NULL, NULL, '1970-01-01', 480, 2),
(14, '6h313622a100', 'JUNTA DE CARBURADORES ', NULL, NULL, '1970-01-01', 315, 3),
(15, '6h313621a100', 'JUNTA DE CARBURADORES ', NULL, NULL, '1970-01-01', 110, 3),
(16, '93306306v100', 'BALERO DE ABAJO', NULL, NULL, '1970-01-01', 870, 2),
(18, '6h345114a100', 'JUNTA DE MOFLE', NULL, NULL, '1970-01-01', 255, 3),
(19, '6h34434101ca', 'CAJA BOMBA DE AGUA ', NULL, NULL, '1970-01-01', 1200, 1),
(20, '93311636u600', 'BALERO DE ARRIBA', NULL, NULL, '1970-01-01', 1270, 2),
(21, '9360318m0900', 'RODILLOS ', NULL, NULL, '1970-01-01', 25, 255),
(22, '902092701100', 'ARANDELA', NULL, NULL, '1970-01-01', 330, 16),
(23, '6k5116510000', 'VIELA', NULL, NULL, '1970-01-01', 1002, 3),
(24, '6h3116330000', 'PERNO', NULL, NULL, '1970-01-01', 180, 3),
(25, '6h3825102100', 'APAGADOR', NULL, NULL, '1970-01-01', 3972, 1),
(26, '69d455011000', 'FLECHA', NULL, NULL, '1970-01-01', 6020, 1),
(27, '688-44352-03', 'IMPULSOR 60FT,75HP', NULL, NULL, '1970-01-01', 380, 5),
(28, '62Y-44555-00', 'AMORTIGUADOR 60HP', NULL, NULL, '1970-01-01', 800, 1),
(30, '6h341112a000', 'JUNTA LUMBRERA', NULL, NULL, '1970-01-01', 292, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refaccionesmotor75hp`
--

CREATE TABLE `refaccionesmotor75hp` (
  `id_RefaccionesMotor75HP` int(11) NOT NULL,
  `Codigo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Compra` date DEFAULT NULL,
  `Duracion` int(11) DEFAULT NULL,
  `Fecha_Cambio` date DEFAULT NULL,
  `Costo` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `refaccionesmotor75hp`
--

INSERT INTO `refaccionesmotor75hp` (`id_RefaccionesMotor75HP`, `Codigo`, `Nombre`, `Fecha_Compra`, `Duracion`, `Fecha_Cambio`, `Costo`, `Cantidad`) VALUES
(1, '936032111100', 'RODILLO', NULL, NULL, '1970-01-01', 25, 165),
(2, '9310125m0300', 'SELLO', NULL, NULL, '1970-01-01', 110, 13),
(3, '93310730v800', 'CANASTILLA', NULL, NULL, '1970-01-01', 1500, 3),
(4, '9310420m0200', 'SELLO', NULL, NULL, '1970-01-01', 90, 1),
(5, '68845114a100', 'JUNTA MOFLE', NULL, NULL, '1970-01-01', 330, 2),
(6, '663116330000', 'PERNO', NULL, NULL, '1970-01-01', 130, 6),
(7, '688445140000', 'AMORTIGUADOR', NULL, NULL, '1970-01-01', 800, 2),
(8, '902012041700', 'ARANDELA', NULL, NULL, '1970-01-01', 40, 7),
(9, '688116340000', 'SEGURO', NULL, NULL, '1970-01-01', 30, 12),
(10, '688116310394', 'PISTON', NULL, NULL, '1970-01-01', 1095, 3),
(11, '688116360300', 'PISTON', NULL, NULL, '1970-01-01', 1030, 12),
(12, '68811603a000', 'ANILLO', NULL, NULL, '1970-01-01', 455, 3),
(13, '68811605a000', 'ANILLO', NULL, NULL, '1970-01-01', 460, 6),
(14, '93306206u500', 'BALERO', NULL, NULL, '1970-01-01', 1150, 4),
(15, '93310835u800', 'BALERO', NULL, NULL, '1970-01-01', 1800, 12),
(16, '93310636u400', 'BALERO', NULL, NULL, '1970-01-01', 1490, 4),
(17, '688116500300', 'BIELA', NULL, NULL, '1970-01-01', 3330, 3),
(18, '68841111001s', 'PLACA', NULL, NULL, '1970-01-01', 850, 2),
(19, '688455600000', 'ENGRANE', NULL, NULL, '1970-01-01', 1750, 2),
(20, '688455710100', 'ENGRANE', NULL, NULL, '1970-01-01', 1009, 2),
(21, '688455510100', 'PIÑON', NULL, NULL, '1970-01-01', 1470, 2),
(22, '9017016m0100', 'TUERCA DE PIÑON', NULL, NULL, '1970-01-01', 80, 1),
(24, '688443520300', 'IMPULSOR', NULL, NULL, '1970-01-01', 370, 1),
(25, '93315325v100', 'BALERO DE FLECHA', NULL, NULL, '1970-01-01', 1000, 4),
(26, '9025007m0200', 'PERNO', NULL, NULL, '1970-01-01', 70, 5),
(27, '9017016m0100', 'ARANDELA', NULL, NULL, '1970-01-01', 90, 2),
(28, '696157160000', 'PLACA DE GARRA', NULL, NULL, '1970-01-01', 330, 1),
(29, '663441510000', 'LEVA DE CAMBIO ', NULL, NULL, '1970-01-01', 405, 3),
(30, '68844315a000', 'JUNTA DE BOMBA DE AGUA ', NULL, NULL, '1970-01-01', 60, 3),
(31, '68844324a000', 'JUNTA DE BOMBA DE AGUA ', NULL, NULL, '1970-01-01', 60, 3),
(32, '68811181a200', 'JUNTA DE CABEZA', NULL, NULL, '1970-01-01', 985, 1),
(33, '68841114a000', 'JUNTA LUMBRERA', NULL, NULL, '1970-01-01', 360, 10),
(35, '68845113a000', 'JUNTA DE ASIENTO', NULL, NULL, '1970-01-01', 400, 4),
(36, '68813621a100', 'JUNTA CARBURADORES ', NULL, NULL, '1970-01-01', 90, 4),
(37, '93332000w700', 'BALERO', NULL, NULL, '1970-01-01', 1530, 2),
(38, '93332000u300', 'BALERO', NULL, NULL, '1970-01-01', 530, 3),
(40, '947010016000', 'BUJIA', NULL, NULL, '1970-01-01', 45, 0),
(41, '688-45635-00', 'embolo 48,60,75HP..50ft', NULL, NULL, '1970-01-01', 350, 4),
(42, '9038630M7700', 'BUJE 75HP,60HP', NULL, NULL, '1970-01-01', 180, 10),
(43, '93306-207U0', 'BALERO REVER4SA 60HP,75HP,50FT,60FT', NULL, NULL, '1970-01-01', 400, 3),
(44, '93310-730V8', 'CANASTILLA 48HP,75HP', NULL, NULL, '1970-01-01', 1500, 8),
(46, '90280-04m04', 'cuñaa 75hp', NULL, NULL, '1970-01-01', 150, 10),
(47, '68841112a000', 'junta de lumbrera', NULL, NULL, '1970-01-01', 300, 10),
(50, '93102-30M05', 'SELLO', NULL, NULL, '1970-01-01', 110, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `refaccionesmotor115`
--

CREATE TABLE `refaccionesmotor115` (
  `id_RefaccionesMotor115` int(11) NOT NULL,
  `Codigo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Nombre` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `Fecha_Compra` date DEFAULT NULL,
  `Duracion` int(11) DEFAULT NULL,
  `Fecha_Cambio` date DEFAULT NULL,
  `Costo` float DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `refaccionesmotor115`
--

INSERT INTO `refaccionesmotor115` (`id_RefaccionesMotor115`, `Codigo`, `Nombre`, `Fecha_Compra`, `Duracion`, `Fecha_Cambio`, `Costo`, `Cantidad`) VALUES
(1, '90280-04M05', 'CUÑA', NULL, NULL, '1970-01-01', 220, 2),
(2, '931024801700', 'sello aceite', NULL, NULL, '1970-01-01', 300, 0),
(3, '931014800200', 'SELLO', NULL, NULL, '1970-01-01', 500, 0),
(4, '931023800800', 'sello', NULL, NULL, '1970-01-01', 425, 0),
(5, '6D8114181000', 'cojiete', NULL, NULL, '1970-01-01', 810, 0),
(6, '68V113510000', 'EMPAQUE', NULL, NULL, '1970-01-01', 1050, 0),
(7, '67F111810300', 'EMPAQUE', NULL, NULL, '1970-01-01', 2315, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `id_salidas` int(11) NOT NULL,
  `codigo` varchar(150) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`id_salidas`, `codigo`, `cantidad`, `total`, `fecha`) VALUES
(1, '696-45113-A0', 1, 460, '2019-06-05'),
(2, '931022813500', 1, 210, '2019-06-05'),
(7, '697-45384-02', 1, 370, '2019-06-07'),
(13, '696-45113-A0', 1, 460, '2019-06-08'),
(14, '679-45371-00', 1, 300, '2019-06-08'),
(18, '697-45384-02', 1, 370, '2019-06-10'),
(19, '5GH134407000', 1, 170, '2019-06-10'),
(20, '67F-45371-00', 1, 686, '2019-06-11'),
(21, '947010037500', 4, 180, '2019-06-11'),
(22, '6GH-3440-70', 1, 170, '2019-06-11'),
(23, '947010016000', 51, 2295, '2019-06-11'),
(24, '90280-03M03', 1, 150, '2019-06-18'),
(25, '90430-08003', 5, 200, '2019-06-18'),
(28, '90430-08003', 2, 80, '2019-06-18'),
(29, '663-15739-00', 1, 70, '2019-06-19'),
(32, '6GH-3440-70', 1, 170, '2019-06-19'),
(33, '62Y-14384-30', 1, 160, '2019-06-20'),
(34, '68845114A100', 1, 330, '2019-06-20'),
(35, '68845113A000', 1, 200, '2019-06-20'),
(36, '90430-08003', 2, 80, '2019-06-20'),
(37, '947020041800', 4, 180, '2019-06-20'),
(49, '90386-30M77', 2, 360, '2019-06-21'),
(50, '90386-30M77', 2, 360, '2019-06-21'),
(51, 'CUÑA 75HP', 1, 100, '2019-06-21'),
(52, '688-41112-A0', 1, 230, '2019-06-21'),
(53, '688-44352-03', 1, 380, '2019-06-21'),
(55, '93101-22067', 1, 110, '2019-06-21'),
(56, '688445140000', 2, 1600, '2019-06-28'),
(57, '90386-30048', 2, 360, '2019-06-28'),
(60, '68845113A000', 1, 200, '2019-07-13'),
(61, '6BG-11351-00', 1, 1320, '2019-07-13'),
(62, '90386-30M77', 2, 360, '2019-07-13'),
(63, '90185-10027', 2, 100, '2019-07-13'),
(64, '688445140000', 2, 1600, '2019-07-13'),
(65, '6H3-44352-00', 2, 800, '2019-07-13'),
(66, '6H3-44352-00', 2, 800, '2019-07-13'),
(67, '62Y-14384-30', 7, 1120, '2019-07-13'),
(68, '68841114A000', 1, 330, '2019-07-13'),
(69, '62Y-14392-00', 3, 1572, '2019-07-13'),
(70, '90430-08003', 8, 320, '2019-07-13'),
(71, '6GH-3440-70', 2, 340, '2019-07-13'),
(72, '663441510000', 1, 405, '2019-07-13'),
(73, '688-45635-00', 1, 350, '2019-07-13'),
(74, '6D8114181000', 1, 810, '2019-07-17'),
(75, '67F111810300', 1, 2315, '2019-07-17'),
(76, '68V113510000', 1, 1050, '2019-07-17'),
(77, '931014800200', 1, 500, '2019-07-17'),
(78, '931023800800', 2, 850, '2019-07-17'),
(79, '931024801700', 1, 300, '2019-07-17'),
(82, '692-26301-03', 1, 1120, '2019-11-15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  ADD PRIMARY KEY (`id_accesorios`);

--
-- Indices de la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`id_acceso`);

--
-- Indices de la tabla `bujias`
--
ALTER TABLE `bujias`
  ADD PRIMARY KEY (`id_BUJIAS`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `codigos`
--
ALTER TABLE `codigos`
  ADD PRIMARY KEY (`id_codigos`);

--
-- Indices de la tabla `garantia`
--
ALTER TABLE `garantia`
  ADD PRIMARY KEY (`id_garantia`);

--
-- Indices de la tabla `generales`
--
ALTER TABLE `generales`
  ADD PRIMARY KEY (`id_generales`);

--
-- Indices de la tabla `prueba_sara`
--
ALTER TABLE `prueba_sara`
  ADD PRIMARY KEY (`id_Prueba_sara`);

--
-- Indices de la tabla `refaccionesdemotor60ft`
--
ALTER TABLE `refaccionesdemotor60ft`
  ADD PRIMARY KEY (`id_REFACCIONESDEMOTOR60FT`);

--
-- Indices de la tabla `refaccionesm40hp`
--
ALTER TABLE `refaccionesm40hp`
  ADD PRIMARY KEY (`id_REFACCIONESM40HP`);

--
-- Indices de la tabla `refaccionesmotor48hp`
--
ALTER TABLE `refaccionesmotor48hp`
  ADD PRIMARY KEY (`id_REFACCIONESMOTOR48HP`);

--
-- Indices de la tabla `refaccionesmotor50`
--
ALTER TABLE `refaccionesmotor50`
  ADD PRIMARY KEY (`id_RefaccionesMotor50`);

--
-- Indices de la tabla `refaccionesmotor60hp`
--
ALTER TABLE `refaccionesmotor60hp`
  ADD PRIMARY KEY (`id_RefaccionesMotor60HP`);

--
-- Indices de la tabla `refaccionesmotor75hp`
--
ALTER TABLE `refaccionesmotor75hp`
  ADD PRIMARY KEY (`id_RefaccionesMotor75HP`);

--
-- Indices de la tabla `refaccionesmotor115`
--
ALTER TABLE `refaccionesmotor115`
  ADD PRIMARY KEY (`id_RefaccionesMotor115`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`id_salidas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesorios`
--
ALTER TABLE `accesorios`
  MODIFY `id_accesorios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `accesos`
--
ALTER TABLE `accesos`
  MODIFY `id_acceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `bujias`
--
ALTER TABLE `bujias`
  MODIFY `id_BUJIAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `codigos`
--
ALTER TABLE `codigos`
  MODIFY `id_codigos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT de la tabla `garantia`
--
ALTER TABLE `garantia`
  MODIFY `id_garantia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generales`
--
ALTER TABLE `generales`
  MODIFY `id_generales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT de la tabla `prueba_sara`
--
ALTER TABLE `prueba_sara`
  MODIFY `id_Prueba_sara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `refaccionesdemotor60ft`
--
ALTER TABLE `refaccionesdemotor60ft`
  MODIFY `id_REFACCIONESDEMOTOR60FT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `refaccionesm40hp`
--
ALTER TABLE `refaccionesm40hp`
  MODIFY `id_REFACCIONESM40HP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `refaccionesmotor48hp`
--
ALTER TABLE `refaccionesmotor48hp`
  MODIFY `id_REFACCIONESMOTOR48HP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `refaccionesmotor50`
--
ALTER TABLE `refaccionesmotor50`
  MODIFY `id_RefaccionesMotor50` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `refaccionesmotor60hp`
--
ALTER TABLE `refaccionesmotor60hp`
  MODIFY `id_RefaccionesMotor60HP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `refaccionesmotor75hp`
--
ALTER TABLE `refaccionesmotor75hp`
  MODIFY `id_RefaccionesMotor75HP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `refaccionesmotor115`
--
ALTER TABLE `refaccionesmotor115`
  MODIFY `id_RefaccionesMotor115` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `id_salidas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
