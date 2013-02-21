-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-08-2012 a las 05:00:00
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cotizador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `betunes`
--

CREATE TABLE IF NOT EXISTS `betunes` (
  `id_betun` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_betun`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `betunes`
--

INSERT INTO `betunes` (`id_betun`, `nombre`, `descripcion`, `imagen`) VALUES
(000001, 'CHANTILLY', 'BETÚN ELABORADO CON CREMA CHANTILLY', 'chantilly.png'),
(000002, 'CHANTILLY CHOCOLATE', 'BETÚN ELABORADO CON CREMA CHANTILLY SABOR CHOCOLATE', 'chantillychoco.png'),
(000003, 'LIMON', 'BETÚN ELABORADO CON JUGO DE LIMÓN NATURAL', 'limon.png'),
(000004, 'CHOCOLATE', 'BETÚN ELABORADO CON COCOA', 'chocolate.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decorados`
--

CREATE TABLE IF NOT EXISTS `decorados` (
  `id_decorado` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id_decorado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla decorados en el pastel' AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `decorados`
--

INSERT INTO `decorados` (`id_decorado`, `nombre`, `precio`) VALUES
(000001, 'FOTOGRAFIA', 50),
(000002, 'FIGURA', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE IF NOT EXISTS `estatus` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id`, `nombre`) VALUES
(000001, 'PENDIENTE'),
(000002, 'PAGADO'),
(000003, 'EN ENTREGA'),
(000004, 'ENTREGADO'),
(000005, 'CANCELADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `figuras`
--

CREATE TABLE IF NOT EXISTS `figuras` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para almacenar los diferentes tipos de figuras en los pasteles' AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `figuras`
--

INSERT INTO `figuras` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'SPIDERMAN', 'ESTAMPADO A MANO', 'spiderman.jpg'),
(2, 'HULK', 'ESTAMPADO A MANO', 'hulk.jpg'),
(3, 'SUPERMAN', 'ESTAMPADO A MANO', 'superman.jpg'),
(4, 'BATMAN', '', 'batman.jpg'),
(5, 'SPIDERMAN COPIA', '', 'spiderman - copia.jpg'),
(6, 'HULK COPIA', '', 'hulk - copia.jpg'),
(7, 'SUPERMAN COPIA', '', 'superman - copia.jpg'),
(8, 'BATMAN COPIA', '', 'batman - copia.jpg'),
(9, 'ROBIN', '', 'robin.jpg'),
(10, 'AQUAMAN', '', 'aquaman.jpg'),
(11, 'WOLVERINE', '', 'wolverine.jpg'),
(12, 'IRON MAN', '', 'ironman.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasteles`
--

CREATE TABLE IF NOT EXISTS `pasteles` (
  `id_pastel` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(256) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_tipo` int(6) NOT NULL,
  `id_sabor` int(6) NOT NULL,
  `id_betun` int(6) NOT NULL,
  `id_relleno` int(6) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id_pastel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `pasteles`
--

INSERT INTO `pasteles` (`id_pastel`, `nombre`, `imagen`, `detalle`, `id_tipo`, `id_sabor`, `id_betun`, `id_relleno`, `precio`) VALUES
(000001, 'PASTEL DE PRUEBA', 'pastel.jpg', 'plancha, chocolate, chantilly chocolate, mermelada de fresa', 2, 2, 2, 2, 1555.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `fecha_pedido` datetime NOT NULL,
  `id_estatus` int(6) unsigned zerofill NOT NULL,
  `id_cliente` int(6) unsigned zerofill NOT NULL,
  `id_pastel` int(6) unsigned zerofill NOT NULL,
  `precio_cotizado` float NOT NULL,
  `fotografia` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `id_figura` int(6) unsigned NOT NULL,
  `dom_entrega` text COLLATE utf8_spanish_ci NOT NULL,
  `latitud` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `longitud` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_entrega` date NOT NULL,
  `observaciones` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `id_tienda` int(6) unsigned zerofill NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recovery`
--

CREATE TABLE IF NOT EXISTS `recovery` (
  `id` int(12) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para almacenar los códigos de recuperación de contraseña' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rellenos`
--

CREATE TABLE IF NOT EXISTS `rellenos` (
  `id_relleno` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_relleno`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `rellenos`
--

INSERT INTO `rellenos` (`id_relleno`, `nombre`, `descripcion`, `imagen`) VALUES
(000001, 'SIN RELLENO', 'PASTEL SIN RELLENO', 'sinrelleno.png'),
(000002, 'MERMELADA DE FRESA', 'PREPARADA CON MERMELADA DE FRESA', 'mermfresa.png'),
(000003, 'MERMELADA DE CHABACANO', 'PREPARADA CON MERMELADA DE CHABACANO', 'mermchabacano.png'),
(000004, 'MERMELADA DE PIÑA', 'PREPARADA CON MERMELADA DE PIÑA', 'mermpina.png'),
(000005, 'MERMELADA DE NARANJA', 'PREPARADA CON MERMELADA DE NARANJA', 'mermnaranja.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sabores`
--

CREATE TABLE IF NOT EXISTS `sabores` (
  `id_sabor` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_sabor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `sabores`
--

INSERT INTO `sabores` (`id_sabor`, `nombre`, `descripcion`, `imagen`) VALUES
(000001, 'VAINILLA', 'TORTA CON SABOR VAINILLA', 'vainilla.png'),
(000002, 'CHOCOLATE', 'TORTA CON SABOR A CHOCOLATE', 'chocolate.png'),
(000003, 'ESPONJA VAINILLA', 'TORTA SABOR VAINILLA CON PREPARACIÓN PARA BAÑO DE 3 LECHES', 'esponjavainilla.png'),
(000004, 'ESPONJA CHOCOLATE', 'TORTA SABOR CHOCOLATE CON PREPARACIÓN PARA BAÑO DE 3 LECHES', 'esponjachocolate.png'),
(000005, 'PIÑA', 'TORTA CON SABOR PIÑA', 'pina.png'),
(000006, 'NUEZ', 'TORTA CON SABOR NUEZ', 'nuez.png'),
(000007, 'ALMENDRA', 'TORTA CON SABOR ALMENDRA', 'almendra.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE IF NOT EXISTS `servicios` (
  `id_servicio` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id_servicio`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tablas de servicios a domicilio' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicio`, `nombre`, `precio`) VALUES
(000001, 'SERVICIO A DOMICILIO', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiendas`
--

CREATE TABLE IF NOT EXISTS `tiendas` (
  `id` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `sucursal` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para almacenar las tiendas monchys' AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tiendas`
--

INSERT INTO `tiendas` (`id`, `sucursal`, `correo`, `ubicacion`) VALUES
(000001, 'SUCURSAL 5 DE FEBRERO', 'm5feb@monchys.com', ''),
(000002, 'SUCURSAL LIBERTAD', 'mlibertad@monchys.com', ''),
(000003, 'SUCURSAL CUAHUTÉMOC', 'mfatima@monchys.com', ''),
(000004, 'SUCURSAL PASEO DURANGO', 'mpaseo@monchys.com', ''),
(000005, 'SUCURSAL LA SALLE', 'mlasalle@monchys.com', ''),
(000006, 'SUCURSAL MINA', 'mmina@monchys.com', ''),
(000007, 'SUCURSAL CIRCUITO INTERIOR', 'mcircuito@monchys.com', ''),
(000008, 'SUCURSAL DOLORES DEL RIO', 'mdolores@monchys.com', ''),
(000009, 'SUCURSAL DOMINGO ARRIETA', 'mdarrieta@monchys.com', ''),
(000010, 'SUCURSAL VENDIMIA', 'mvendimia@monchys.com', ''),
(000011, 'SUCURSAL POTASIO', 'msantafe@monchys.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos` (
  `id_tipo` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id_tipo`, `nombre`, `descripcion`, `detalle`, `imagen`) VALUES
(000001, 'MEDIA PLANCHA', 'TORTA DE 44x33 CMS. DE TAMAÑO', '', 'mediaplancha.png'),
(000002, 'PLANCHA', 'TORTA DE 64x44 CMS. DE TAMAÑO', '', 'plancha.png'),
(000003, 'CASCADA', '1 TORTA 18, 1 TORTA 22, 5 TORTAS 26', '', 'cascada.png'),
(000005, 'HERRERIA', '1 TORTA 22, 1 TORTA 28, 1 TORTA 34, 1 TORTA 42', '', 'herreria.png'),
(000006, 'FUENTE', '1 TORTA 22, 3 TORTAS 26, 5 TORTAS 34', '', 'fuente.png'),
(000007, 'PASTEL 18', 'TORTA DE 18 CMS. DE DIAMETRO', '', '18.png'),
(000008, 'PASTEL 22', 'TORTA DE 22 CMS. DE DIAMETRO', '', '22.png'),
(000009, 'PASTEL 26', 'TORTA DE 26 CMS. DE DIAMETRO', '', '26.png'),
(000010, 'PASTEL 34', 'TORTA DE 34 CMS. DE DIAMETRO', '', '34.png'),
(000011, 'PASTEL 42', 'TORTA DE 42 CMS. DE DIAMETRO', '', '42.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_cliente` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `correo` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `paterno` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `materno` varchar(256) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nacimiento` date NOT NULL,
  `sexo` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(256) COLLATE utf8_spanish_ci NOT NULL,
  `calle` varchar(256) COLLATE utf8_spanish_ci DEFAULT NULL,
  `numero` varchar(256) COLLATE utf8_spanish_ci DEFAULT NULL,
  `colonia` varchar(256) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_pos` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
