-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-05-2018 a las 07:58:39
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `herbalife_dev`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hbf_clubs`
--

CREATE TABLE `hbf_clubs` (
                           `id_club` int(10) UNSIGNED NOT NULL,
                           `nombre` varchar(100) NOT NULL,
                           `email` varchar(100) NOT NULL,
                           `direccion` varchar(200) NOT NULL,
                           `licencia` varchar(100) NOT NULL,
                           `direccion_gps` varchar(100) NOT NULL COMMENT '{"validate":0,"input":"hidden"}',
                           `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
                           `change_count` int(11) NOT NULL DEFAULT '0',
                           `id_user_modified` int(11) UNSIGNED NOT NULL,
                           `id_user_created` int(11) UNSIGNED NOT NULL,
                           `date_modified` datetime NOT NULL,
                           `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hbf_clubs`
--

INSERT INTO `hbf_clubs` (`id_club`, `nombre`, `email`, `direccion`, `licencia`, `direccion_gps`, `estado`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1, 'Club Fer', 'fernando@herbalife.com', 'C. Socabaya', '123123', '', 'ENABLED', 0, 1, 1, '2018-03-22 02:08:36', '2018-03-22 02:08:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hbf_comandas`
--

CREATE TABLE `hbf_comandas` (
                              `id_comanda` int(10) UNSIGNED NOT NULL,
                              `id_club` int(10) UNSIGNED NOT NULL COMMENT '{"label":"Nombre del Club","selectBy":"nombre"}',
                              `id_turno` int(10) UNSIGNED NOT NULL COMMENT '{"label":"Turno de","selectBy":"id_asociado"}',
                              `id_sesion` int(11) UNSIGNED NOT NULL COMMENT '{"label":"Sesion de","selectBy":"id_encargado"}',
                              `id_cliente` int(10) UNSIGNED NOT NULL COMMENT '{"label":"Nombre del Cliente","selectBy":["name","lastname"]}',
                              `ids_vasos` varchar(250) DEFAULT NULL COMMENT '{"label":"Agregar Vasos","input":"button","action":"modal","content":"vasos"}',
                              `costo` decimal(10,0) DEFAULT NULL,
                              `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
                              `change_count` int(11) NOT NULL DEFAULT '0',
                              `id_user_modified` int(11) UNSIGNED NOT NULL,
                              `id_user_created` int(11) UNSIGNED NOT NULL,
                              `date_modified` datetime NOT NULL,
                              `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hbf_ingresos`
--

CREATE TABLE `hbf_ingresos` (
                              `id_ingreso` int(11) UNSIGNED NOT NULL,
                              `id_cliente` int(11) UNSIGNED DEFAULT NULL COMMENT '{"label":"Nombre del Cliente","selectBy":["name","lastname"]}',
                              `id_comanda` int(11) UNSIGNED DEFAULT NULL COMMENT '{"label":"Comanda","selectBy":["id_cliente"]}',
                              `id_prepago` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Prepago","selectBy":["id_prepago"]}',
                              `id_producto` int(11) UNSIGNED DEFAULT NULL COMMENT '{"label":"Producto","selectBy":["nombre","descripcion"]}',
                              `estado` varchar(15) DEFAULT 'ENABLED',
                              `id_user_modified` int(10) UNSIGNED NOT NULL,
                              `id_user_created` int(10) UNSIGNED NOT NULL,
                              `date_modified` datetime NOT NULL,
                              `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hbf_options`
--

CREATE TABLE `hbf_asociados` (
                               `id_asociado` int(10) UNSIGNED NOT NULL,
                               `id_person` int(11) unsigned not null comment '{"selectBy":["name","lastname"]}',
                               `id_tipo_asociado` int(11) unsigned not null comment '{"selectBy":["nombre"]}',
                               `id_nivel_asociado` int(11) unsigned not null comment '{"selectBy":["nombre"]}',
                               `estado` varchar(15) DEFAULT 'ENABLED',
                               `id_user_modified` int(10) UNSIGNED NOT NULL,
                               `id_user_created` int(10) UNSIGNED NOT NULL,
                               `date_modified` datetime NOT NULL,
                               `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='{"title":"Opciones","tableOptions":true}';

--
-- Estructura de tabla para la tabla `hbf_tipos_asociados`
--

CREATE TABLE `hbf_tipos_asociados` (
                                     `id_tipo_asociado` int(10) UNSIGNED NOT NULL,
                                     `nombre` varchar(300) default null,
                                     `descripcion` varchar(490) default null,
                                     `estado` varchar(15) DEFAULT 'ENABLED',
                                     `id_user_modified` int(10) UNSIGNED NOT NULL,
                                     `id_user_created` int(10) UNSIGNED NOT NULL,
                                     `date_modified` datetime NOT NULL,
                                     `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='{"title":"Opciones","tableOptions":true}';

--
-- Estructura de tabla para la tabla `hbf_niveles_asociados`
--

CREATE TABLE `hbf_niveles_asociados` (
                                       `id_nivel_asociado` int(10) UNSIGNED NOT NULL,
                                       `nombre` varchar(300) default null,
                                       `descripcion` varchar(490) default null,
                                       `estado` varchar(15) DEFAULT 'ENABLED',
                                       `id_user_modified` int(10) UNSIGNED NOT NULL,
                                       `id_user_created` int(10) UNSIGNED NOT NULL,
                                       `date_modified` datetime NOT NULL,
                                       `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='{"title":"Opciones","tableOptions":true}';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hbf_porciones`
--

CREATE TABLE `hbf_porciones` (
                               `id_porcion` int(10) UNSIGNED NOT NULL,
                               `id_vaso` int(10) UNSIGNED NOT NULL COMMENT '{"label":"Porcion del vaso","selectBy":"id_comanda"}',
                               `id_producto` int(10) UNSIGNED NOT NULL COMMENT '{"label":"Productos","selectBy":["nombre","descripcion"]}',
                               `id_comanda` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Comanda del cliente","selectBy":["id_cliente"]}',
                               `cantidad` int(11) NOT NULL,
                               `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
                               `change_count` int(11) NOT NULL DEFAULT '0',
                               `id_user_modified` int(11) UNSIGNED NOT NULL,
                               `id_user_created` int(11) UNSIGNED NOT NULL,
                               `date_modified` datetime NOT NULL,
                               `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hbf_prepagos`
--

CREATE TABLE `hbf_prepagos` (
                              `id_prepago` int(10) UNSIGNED NOT NULL,
                              `id_cliente` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Cliente","selectBy":["name","lastname"]}',
                              `id_tipo_prepago` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Tipos de Prepago","selectBy":["nombre","descripcion"]}}',
                              `num_fichas` int(11) DEFAULT NULL,
                              `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
                              `change_count` int(11) NOT NULL DEFAULT '0',
                              `id_user_modified` int(11) UNSIGNED NOT NULL,
                              `id_user_created` int(11) UNSIGNED NOT NULL,
                              `date_modified` datetime NOT NULL,
                              `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Estructura de tabla para la tabla `hbf_tipos_prepagos`
--

CREATE TABLE `hbf_tipos_prepagos` (
                                    `id_tipo_prepago` int(10) UNSIGNED NOT NULL,
                                    `nombre` varchar(300) DEFAULT NULL,
                                    `descripcion` varchar(490) DEFAULT NULL,
                                    `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
                                    `change_count` int(11) NOT NULL DEFAULT '0',
                                    `id_user_modified` int(11) UNSIGNED NOT NULL,
                                    `id_user_created` int(11) UNSIGNED NOT NULL,
                                    `date_modified` datetime NOT NULL,
                                    `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hbf_productos`
--

CREATE TABLE `hbf_productos` (
                               `id_producto` int(10) UNSIGNED NOT NULL,
                               `nombre` varchar(100) NOT NULL,
                               `descripcion` text NOT NULL,
                               `id_categoria_producto` int(10) UNSIGNED NOT NULL COMMENT '{"label":"Categorias de Productos","selectBy":["nombre","descripcion"]}',
                               `id_tipo_producto` int(10) UNSIGNED NOT NULL COMMENT '{"label":"Tipos de Productos","selectBy":["nombre","descripcion"]}',
                               `foto_producto` varchar(500) DEFAULT NULL COMMENT '{"label":"Imagen del producto","input":"image", "validate":0}',
                               `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
                               `change_count` int(11) NOT NULL DEFAULT '0',
                               `id_user_modified` int(11) UNSIGNED NOT NULL,
                               `id_user_created` int(11) UNSIGNED NOT NULL,
                               `date_modified` int(11) NOT NULL,
                               `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `hbf_categorias_productos`
--

CREATE TABLE `hbf_categorias_productos` (
                                          `id_categoria_producto` int(10) UNSIGNED NOT NULL,
                                          `nombre` varchar(100) NOT NULL,
                                          `descripcion` varchar(490) NOT NULL,
                                          `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
                                          `change_count` int(11) NOT NULL DEFAULT '0',
                                          `id_user_modified` int(11) UNSIGNED NOT NULL,
                                          `id_user_created` int(11) UNSIGNED NOT NULL,
                                          `date_modified` int(11) NOT NULL,
                                          `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Estructura de tabla para la tabla `hbf_categorias_productos`
--

CREATE TABLE `hbf_tipos_productos` (
                                     `id_tipo_producto` int(10) UNSIGNED NOT NULL,
                                     `nombre` varchar(100) NOT NULL,
                                     `descripcion` text NOT NULL,
                                     `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
                                     `change_count` int(11) NOT NULL DEFAULT '0',
                                     `id_user_modified` int(11) UNSIGNED NOT NULL,
                                     `id_user_created` int(11) UNSIGNED NOT NULL,
                                     `date_modified` int(11) NOT NULL,
                                     `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hbf_sesiones`
--

CREATE TABLE `hbf_sesiones` (
                              `id_sesion` int(11) UNSIGNED NOT NULL,
                              `id_encargado` int(11) UNSIGNED NOT NULL COMMENT '{"label":"Sesion a cargo de","selectBy":"nombre"}',
                              `fec_Sesion` datetime NOT NULL COMMENT '{"label":"Fecha"}',
                              `detalle` varchar(400) DEFAULT '',
                              `caja_inicial` float DEFAULT NULL COMMENT '{"label":"Monto inicial en caja"}',
                              `caja_final` float DEFAULT NULL COMMENT '{"label":"Monto final en caja"}',
                              `total` float DEFAULT NULL COMMENT '{"label":"Monto total en caja"}',
                              `num_consumos` float DEFAULT NULL COMMENT '{"label":"Cantidad de consumos del dia"}',
                              `total_ingresos` float DEFAULT NULL COMMENT '{"label":"Total ingresos"}',
                              `total_egresos` float DEFAULT NULL COMMENT '{"label":"Total egresos"}',
                              `total_deben` float DEFAULT NULL COMMENT '{"label":"Total deudas de clientes"}',
                              `total_sobra` float DEFAULT NULL COMMENT '{"label":"Total dinero sobrante"}',
                              `total_falta` float DEFAULT NULL COMMENT '{"label":"Total dinero faltante"}',
                              `sobre_rojo` float DEFAULT NULL COMMENT '{"label":"Dinero al sobre rojo"}',
                              `sobre_verde` float DEFAULT NULL COMMENT '{"label":"Dinero al sobre verde"}',
                              `deposito` float DEFAULT NULL COMMENT '{"label":"Dinero depositado"}',
                              `observaciones` varchar(400) DEFAULT '',
                              `id_club` int(11) UNSIGNED NOT NULL COMMENT '{"label":"Nombre del club,"selectBy":"nombre"}',
                              `id_turno` int(11) UNSIGNED NOT NULL COMMENT '{"label":"Turno de","selectBy":"id_asociado"}',
                              `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
                              `change_count` int(11) NOT NULL DEFAULT '0',
                              `id_user_modified` int(11) UNSIGNED NOT NULL,
                              `id_user_created` int(11) UNSIGNED NOT NULL,
                              `date_modified` datetime NOT NULL,
                              `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hbf_turnos`
--

CREATE TABLE `hbf_turnos` (
                            `id_turno` int(10) UNSIGNED NOT NULL,
                            `id_asociado` int(10) UNSIGNED NOT NULL COMMENT '{"label":"Asociado a cargo","selectBy":["name","lastname"]}',
                            `id_club` int(10) UNSIGNED NOT NULL COMMENT '{"label":"Nombre del Club","selectBy":"nombre"}',
                            `descripcion` text,
                            `fec_inicio` date NOT NULL COMMENT '{"label":"Fecha de Inicio"}',
                            `fec_fin` date DEFAULT NULL COMMENT '{"label":"Fecha de Cierre"}',
                            `horario_desde` time NOT NULL COMMENT '{"label":"hora de inicio"}',
                            `horario_hasta` time NOT NULL COMMENT '{"label":"hora de cierre"}',
                            `total_consumos` int(11) NOT NULL DEFAULT '0' COMMENT '{"label":"Total de consumos"}',
                            `change_count` int(11) NOT NULL DEFAULT '0',
                            `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
                            `id_user_modified` int(11) UNSIGNED NOT NULL,
                            `id_user_created` int(11) UNSIGNED NOT NULL,
                            `date_modified` datetime NOT NULL,
                            `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hbf_turnos`
--

INSERT INTO `hbf_turnos` (`id_turno`, `id_asociado`, `id_club`, `descripcion`, `fec_inicio`, `fec_fin`, `horario_desde`, `horario_hasta`, `total_consumos`, `change_count`, `estado`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1, 1, 1, '<p>Turno matutino</p>', '0000-00-00', '0000-00-00', '08:00:00', '12:00:00', 9, 0, 'ENABLED', 1, 1, '2018-04-10 01:05:35', '2018-04-10 01:05:35'),
(2, 1, 1, '<p>des 1</p>', '0000-00-00', '0000-00-00', '08:00:00', '12:00:00', 10, 0, 'ENABLED', 1, 1, '2018-04-10 03:06:14', '2018-04-10 03:06:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hbf_vasos`
--

CREATE TABLE `hbf_vasos` (
                           `id_vaso` int(10) UNSIGNED NOT NULL,
                           `id_comanda` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Comanda del Cliente","selectBy":["id_cliente"]}',
                           `cantidad` varchar(250) DEFAULT NULL COMMENT '{"label":"Cantidad (0% - 100%)"}',
                           `temperatura` varchar(250) DEFAULT NULL COMMENT '{"label":"Temperatura (Frio - Tibio - Caliente)"}',
                           `consistencia` varchar(250) DEFAULT NULL COMMENT '{"label":"Consistencia (Cremoso - Al jugo)"}',
                           `id_tipo_producto` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Tipos de Productos","input":"radios","selectBy":["nombre"],"filterBy":{"tipo":"tipo_producto"}}',
                           `ids_productos` varchar(250) DEFAULT NULL COMMENT '{"label":"Agregar Productos","input":"button","action":"panel","content":"productos"}',
                           `icono` varchar(100) NOT NULL,
                           `observaciones` text,
                           `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
                           `change_count` int(11) NOT NULL DEFAULT '0',
                           `id_user_modified` int(11) UNSIGNED NOT NULL,
                           `id_user_created` int(11) UNSIGNED NOT NULL,
                           `date_modified` datetime NOT NULL,
                           `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `hbf_clubs`
--
ALTER TABLE `hbf_clubs`
  ADD PRIMARY KEY (`id_club`),
  ADD KEY `hbf_clubs_ibfk_2` (`id_user_modified`),
  ADD KEY `hbf_clubs_ibfk_3` (`id_user_created`);

--
-- Indices de la tabla `hbf_comandas`
--
ALTER TABLE `hbf_comandas`
  ADD PRIMARY KEY (`id_comanda`),
  ADD KEY `hbf_comandas_ibfk_1` (`id_club`),
  ADD KEY `hbf_comandas_ibfk_2` (`id_turno`),
  ADD KEY `hbf_comandas_ibfk_3` (`id_sesion`),
  ADD KEY `hbf_comandas_ibfk_5` (`id_cliente`),
  ADD KEY `hbf_comandas_ibfk_6` (`id_user_modified`),
  ADD KEY `hbf_comandas_ibfk_7` (`id_user_created`);

--
-- Indices de la tabla `hbf_ingresos`
--
ALTER TABLE `hbf_ingresos`
  ADD PRIMARY KEY (`id_ingreso`),
  ADD UNIQUE KEY `hbf_ingresos_id_ingreso_uindex` (`id_ingreso`),
  ADD KEY `hbf_ingresos_ibfk_3` (`id_cliente`),
  ADD KEY `hbf_ingresos_ibfk_5` (`id_comanda`),
  ADD KEY `hbf_ingresos_ibfk_6` (`id_prepago`),
  ADD KEY `hbf_ingresos_ibfk_4` (`id_producto`),
  ADD KEY `hbf_ingresos_ibfk_1` (`id_user_modified`),
  ADD KEY `hbf_ingresos_ibfk_2` (`id_user_created`);

--
-- Indices de la tabla `hbf_porciones`
--
ALTER TABLE `hbf_porciones`
  ADD PRIMARY KEY (`id_porcion`),
  ADD KEY `id_user_modified` (`id_user_modified`),
  ADD KEY `id_user_created` (`id_user_created`),
  ADD KEY `id_vaso` (`id_vaso`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `hbf_porciones_ibfk_5` (`id_comanda`);

--
-- Indices de la tabla `hbf_prepagos`
--
ALTER TABLE `hbf_prepagos`
  ADD PRIMARY KEY (`id_prepago`),
  ADD KEY `hbf_prepago_ibfk_1` (`id_cliente`),
  ADD KEY `hbf_prepagos_ibfk_4` (`id_tipo_prepago`),
  ADD KEY `hbf_prepago_ibfk_2` (`id_user_modified`),
  ADD KEY `hbf_prepago_ibfk_3` (`id_user_created`);

--
-- Indices de la tabla `hbf_tipos_prepagos`
--
ALTER TABLE `hbf_tipos_prepagos`
  ADD PRIMARY KEY (`id_tipo_prepago`),
  ADD KEY `hbf_prepago_ibfk_2` (`id_user_modified`),
  ADD KEY `hbf_prepago_ibfk_3` (`id_user_created`);

--
-- Indices de la tabla `hbf_productos`
--
ALTER TABLE `hbf_productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `hbf_productos_ibfk_1` (`id_user_modified`),
  ADD KEY `hbf_productos_ibfk_2` (`id_user_created`),
  ADD KEY `hbf_productos_ibfk_3` (`id_categoria_producto`),
  ADD KEY `hbf_productos_ibfk_4` (`id_tipo_producto`);

--
-- Indices de la tabla `hbf_sesiones`
--
ALTER TABLE `hbf_sesiones`
  ADD PRIMARY KEY (`id_sesion`),
  ADD KEY `id_encargado` (`id_encargado`),
  ADD KEY `id_club` (`id_club`),
  ADD KEY `id_turno` (`id_turno`),
  ADD KEY `id_user_modified` (`id_user_modified`),
  ADD KEY `id_user_created` (`id_user_created`);

--
-- Indices de la tabla `hbf_turnos`
--
ALTER TABLE `hbf_turnos`
  ADD PRIMARY KEY (`id_turno`),
  ADD KEY `id_asociado` (`id_asociado`),
  ADD KEY `id_club` (`id_club`),
  ADD KEY `id_user_modified` (`id_user_modified`),
  ADD KEY `id_user_created` (`id_user_created`);

--
-- Indices de la tabla `hbf_vasos`
--
ALTER TABLE `hbf_vasos`
  ADD PRIMARY KEY (`id_vaso`),
  ADD KEY `hbf_vasos_ibfk_1` (`id_user_modified`),
  ADD KEY `hbf_vasos_ibfk_2` (`id_user_created`),
  ADD KEY `hbf_vasos_ibfk_3` (`id_comanda`),
  ADD KEY `hbf_vasos_ibfk_4` (`id_tipo_producto`);

--
-- Indices de la tabla `hbf_vasos`
--
ALTER TABLE `hbf_asociados`
  ADD PRIMARY KEY (`id_asociado`),
  ADD KEY `hbf_vasos_ibfk_1` (`id_user_modified`),
  ADD KEY `hbf_vasos_ibfk_2` (`id_user_created`),
  ADD KEY `hbf_vasos_ibfk_3` (`id_person`),
  ADD KEY `hbf_vasos_ibfk_4` (`id_tipo_asociado`),
  ADD KEY `hbf_vasos_ibfk_5` (`id_nivel_asociado`);

--
-- Indices de la tabla `hbf_tipos_asociados`
--
ALTER TABLE `hbf_tipos_asociados`
  ADD PRIMARY KEY (`id_tipo_asociado`),
  ADD KEY `hbf_vasos_ibfk_1` (`id_user_modified`),
  ADD KEY `hbf_vasos_ibfk_2` (`id_user_created`);

--
-- Indices de la tabla `hbf_niveles_asociados`
--
ALTER TABLE `hbf_niveles_asociados`
  ADD PRIMARY KEY (`id_nivel_asociado`),
  ADD KEY `hbf_vasos_ibfk_1` (`id_user_modified`),
  ADD KEY `hbf_vasos_ibfk_2` (`id_user_created`);

--
-- Indices de la tabla `hbf_categorias_productos`
--
ALTER TABLE `hbf_categorias_productos`
  ADD PRIMARY KEY (`id_categoria_producto`),
  ADD KEY `hbf_categorias_productos_ibfk_1` (`id_user_modified`),
  ADD KEY `hbf_categorias_productos_ibfk_2` (`id_user_created`);

--
-- Indices de la tabla `hbf_tipos_productos`
--
ALTER TABLE `hbf_tipos_productos`
  ADD PRIMARY KEY (`id_tipo_producto`),
  ADD KEY `hbf_tipos_productos_ibfk_1` (`id_user_modified`),
  ADD KEY `hbf_tipos_productos_ibfk_2` (`id_user_created`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `hbf_clubs`
--
ALTER TABLE `hbf_clubs`
  MODIFY `id_club` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `hbf_comandas`
--
ALTER TABLE `hbf_comandas`
  MODIFY `id_comanda` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hbf_ingresos`
--
ALTER TABLE `hbf_ingresos`
  MODIFY `id_ingreso` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hbf_porciones`
--
ALTER TABLE `hbf_porciones`
  MODIFY `id_porcion` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hbf_prepago`
--
ALTER TABLE `hbf_prepagos`
  MODIFY `id_prepago` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hbf_prepagos`
--
ALTER TABLE `hbf_prepagos`
  MODIFY `id_prepago` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hbf_productos`
--
ALTER TABLE `hbf_productos`
  MODIFY `id_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `hbf_turnos`
--
ALTER TABLE `hbf_turnos`
  MODIFY `id_turno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `hbf_vasos`
--
ALTER TABLE `hbf_vasos`
  MODIFY `id_vaso` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `hbf_vasos`
--
ALTER TABLE `hbf_asociados`
  MODIFY `id_asociado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `hbf_vasos`
--
ALTER TABLE `hbf_tipos_asociados`
  MODIFY `id_tipo_asociado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT de la tabla `hbf_vasos`
--
ALTER TABLE `hbf_niveles_asociados`
  MODIFY `id_nivel_asociado` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hbf_clubs`
--
ALTER TABLE `hbf_clubs`
  ADD CONSTRAINT `hbf_clubs_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hbf_clubs_ibfk_3` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hbf_comandas`
--
ALTER TABLE `hbf_comandas`
  ADD CONSTRAINT `hbf_comandas_ibfk_1` FOREIGN KEY (`id_club`) REFERENCES `hbf_clubs` (`id_club`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hbf_comandas_ibfk_2` FOREIGN KEY (`id_turno`) REFERENCES `hbf_turnos` (`id_turno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hbf_comandas_ibfk_3` FOREIGN KEY (`id_sesion`) REFERENCES `hbf_sesiones` (`id_sesion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hbf_comandas_ibfk_5` FOREIGN KEY (`id_cliente`) REFERENCES `es_persons` (`id_person`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hbf_comandas_ibfk_6` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hbf_comandas_ibfk_7` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hbf_ingresos`
--
ALTER TABLE `hbf_ingresos`
  ADD CONSTRAINT `hbf_ingresos_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `hbf_ingresos_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `hbf_ingresos_ibfk_3` FOREIGN KEY (`id_cliente`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `hbf_ingresos_ibfk_4` FOREIGN KEY (`id_producto`) REFERENCES `hbf_productos` (`id_producto`),
  ADD CONSTRAINT `hbf_ingresos_ibfk_5` FOREIGN KEY (`id_comanda`) REFERENCES `hbf_comandas` (`id_comanda`),
  ADD CONSTRAINT `hbf_ingresos_ibfk_6` FOREIGN KEY (`id_prepago`) REFERENCES `hbf_prepagos` (`id_prepago`);

--
-- Filtros para la tabla `hbf_porciones`
--
ALTER TABLE `hbf_porciones`
  ADD CONSTRAINT `hbf_porciones_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `hbf_porciones_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `hbf_porciones_ibfk_3` FOREIGN KEY (`id_vaso`) REFERENCES `hbf_vasos` (`id_vaso`),
  ADD CONSTRAINT `hbf_porciones_ibfk_4` FOREIGN KEY (`id_producto`) REFERENCES `hbf_productos` (`id_producto`),
  ADD CONSTRAINT `hbf_porciones_ibfk_5` FOREIGN KEY (`id_comanda`) REFERENCES `hbf_comandas` (`id_comanda`);

--
-- Filtros para la tabla `hbf_prepagos`
--
ALTER TABLE `hbf_prepagos`
  ADD CONSTRAINT `hbf_prepagos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `hbf_prepagos_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `hbf_prepagos_ibfk_3` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `hbf_prepagos_ibfk_4` FOREIGN KEY (`id_tipo_prepago`) REFERENCES `hbf_tipos_prepagos` (`id_tipo_prepago`);

--
-- Filtros para la tabla `hbf_prepagos`
--
ALTER TABLE `hbf_tipos_prepagos`
  ADD CONSTRAINT `hbf_tipos_prepagos_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `hbf_tipos_prepagos_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`);

--
-- Filtros para la tabla `hbf_productos`
--
ALTER TABLE `hbf_productos`
  ADD CONSTRAINT `hbf_productos_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hbf_productos_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hbf_productos_ibfk_3` FOREIGN KEY (`id_categoria_producto`) REFERENCES `hbf_categorias_productos` (`id_categoria_producto`),
  ADD CONSTRAINT `hbf_productos_ibfk_4` FOREIGN KEY (`id_tipo_producto`) REFERENCES `hbf_tipos_productos` (`id_tipo_producto`);

--
-- Filtros para la tabla `hbf_sesiones`
--
ALTER TABLE `hbf_sesiones`
  ADD CONSTRAINT `hbf_sesiones_ibfk_1` FOREIGN KEY (`id_encargado`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `hbf_sesiones_ibfk_2` FOREIGN KEY (`id_club`) REFERENCES `hbf_clubs` (`id_club`),
  ADD CONSTRAINT `hbf_sesiones_ibfk_3` FOREIGN KEY (`id_turno`) REFERENCES `hbf_turnos` (`id_turno`),
  ADD CONSTRAINT `hbf_sesiones_ibfk_4` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `hbf_sesiones_ibfk_5` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`);

--
-- Filtros para la tabla `hbf_turnos`
--
ALTER TABLE `hbf_turnos`
  ADD CONSTRAINT `hbf_turnos_ibfk_1` FOREIGN KEY (`id_asociado`) REFERENCES `es_persons` (`id_person`),
  ADD CONSTRAINT `hbf_turnos_ibfk_2` FOREIGN KEY (`id_club`) REFERENCES `hbf_clubs` (`id_club`),
  ADD CONSTRAINT `hbf_turnos_ibfk_3` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `hbf_turnos_ibfk_4` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`);

--
-- Filtros para la tabla `hbf_vasos`
--
ALTER TABLE `hbf_vasos`
  ADD CONSTRAINT `hbf_vasos_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hbf_vasos_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hbf_vasos_ibfk_3` FOREIGN KEY (`id_comanda`) REFERENCES `hbf_comandas` (`id_comanda`),
  ADD CONSTRAINT `hbf_vasos_ibfk_4` FOREIGN KEY (`id_tipo_producto`) REFERENCES `hbf_tipos_productos` (`id_tipo_producto`);
COMMIT;

--
-- Filtros para la tabla `hbf_asociados`
--
ALTER TABLE `hbf_asociados`
  ADD CONSTRAINT `hbf_asociados_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hbf_asociados_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hbf_asociados_ibfk_3` FOREIGN KEY (`id_tipo_asociado`) REFERENCES `hbf_tipos_asociados` (`id_tipo_asociado`),
  ADD CONSTRAINT `hbf_asociados_ibfk_4` FOREIGN KEY (`id_nivel_asociado`) REFERENCES `hbf_niveles_asociados` (`id_nivel_asociado`);
COMMIT;

--
-- Filtros para la tabla `hbf_tipos_asociados`
--
ALTER TABLE `hbf_tipos_asociados`
  ADD CONSTRAINT `hbf_tipos_asociados_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hbf_tipos_asociados_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

--
-- Filtros para la tabla `hbf_niveles_asociados`
--
ALTER TABLE `hbf_niveles_asociados`
  ADD CONSTRAINT `hbf_niveles_asociados_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hbf_niveles_asociados_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
