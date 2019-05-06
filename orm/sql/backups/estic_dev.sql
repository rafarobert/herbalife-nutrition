-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-05-2019 a las 17:47:57
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.14

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
-- Estructura de tabla para la tabla `es_cities`
--

CREATE TABLE `es_cities` (
  `id_city` int(10) UNSIGNED NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL COMMENT '{"validate":0}',
  `abbreviation` varchar(200) DEFAULT NULL COMMENT '{"validate":0}',
  `id_capital` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0,"selectBy":"name","filterBy":{"tipo":"capital"}}',
  `id_region` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0,"selectBy":"name","filterBy":{"tipo":"region"}}',
  `lat` decimal(10,6) DEFAULT NULL COMMENT '{"validate":0}',
  `lng` decimal(10,6) DEFAULT NULL COMMENT '{"validate":0}',
  `area` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `nro_municipios` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `surface` decimal(10,0) DEFAULT NULL COMMENT '{"validate":0}',
  `ids_files` varchar(490) DEFAULT NULL COMMENT '{"validate":0,"input":"file"}',
  `id_cover_picture` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0,"input":"hidden"}',
  `height` decimal(10,0) DEFAULT NULL COMMENT '{"validate":0}',
  `tipo` varchar(490) DEFAULT NULL COMMENT '{"validate":0,"input":"radios","options":["region","ciudad","capital"]}',
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `es_cities`
--

INSERT INTO `es_cities` (`id_city`, `name`, `description`, `abbreviation`, `id_capital`, `id_region`, `lat`, `lng`, `area`, `nro_municipios`, `surface`, `ids_files`, `id_cover_picture`, `height`, `tipo`, `status`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1, 'La Paz', '', '', NULL, NULL, '-16.502030', '-68.135440', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(2, 'El Alto', '', '', 1, 1, '-16.502001', '-68.167885', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(3, 'Caranavi', '', '', 1, 1, '-15.833792', '-67.566800', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(4, 'Cochabamba', '', '', NULL, NULL, '-17.385080', '-66.152936', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(5, 'Villa Tunari', '', '', 4, 4, '-16.974408', '-65.422817', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(6, 'Santa Cruz', '', '', NULL, NULL, '-17.781730', '-63.168031', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(7, 'Puerto Suarez', '', '', 6, 6, '-18.965916', '-57.799305', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(8, 'Potosi', '', '', NULL, NULL, '-19.582703', '-65.756872', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(9, 'Llallagua', '', '', 8, 8, '-18.421985', '-66.584639', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(10, 'Chuquisaca', '', '', NULL, NULL, '-19.053640', '-65.263682', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(11, 'Monteagudo', '', '', 10, 10, '-19.807883', '-63.958317', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(12, 'Beni', '', '', NULL, NULL, '-14.829896', '-64.905096', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(13, 'Riberalta', '', '', 12, 12, '-10.999493', '-66.068168', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(14, 'Tarija', '', '', NULL, NULL, '-21.531417', '-64.739233', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(15, 'Yacuiba', '', '', 14, 14, '-22.018384', '-63.680627', NULL, NULL, NULL, NULL, NULL, NULL, 'ciudad', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(16, 'Pando', '', '', NULL, NULL, '-11.017662', '-68.752586', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46'),
(17, 'Oruro', '', '', NULL, NULL, '-17.970334', '-67.114256', NULL, NULL, NULL, NULL, NULL, NULL, 'region', 'ENABLED', 0, 1, 1, '2018-11-26 15:14:45', '2018-11-26 15:14:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_domains`
--

CREATE TABLE `es_domains` (
  `id_domain` int(11) NOT NULL,
  `host` varchar(450) DEFAULT NULL,
  `hostname` varchar(450) DEFAULT NULL,
  `protocol` varchar(10) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `origin` varchar(450) DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_files`
--

CREATE TABLE `es_files` (
  `id_file` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL COMMENT '{"validate":0}',
  `url` varchar(450) DEFAULT NULL COMMENT '{"validate":0}',
  `ext` varchar(100) DEFAULT NULL COMMENT '{"validate":0}',
  `raw_name` varchar(400) DEFAULT NULL COMMENT '{"validate":0}',
  `full_path` varchar(400) DEFAULT NULL COMMENT '{"validate":0}',
  `path` varchar(400) DEFAULT NULL COMMENT '{"validate":0}',
  `width` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `height` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `size` decimal(10,0) DEFAULT NULL COMMENT '{"validate":0}',
  `library` varchar(20) DEFAULT NULL COMMENT '{"validate":0}',
  `nro_thumbs` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `id_parent` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0,"filterBy":{"thumb_marker":""}}',
  `thumb_marker` varchar(200) DEFAULT NULL COMMENT '{"validate":0}',
  `type` varchar(100) DEFAULT NULL COMMENT '{"validate":0,"input":"radios","options":["gif","jpg","png","jpeg","pdf","docx","xlsx","zip","mp4","mp3"]}',
  `x` decimal(20,10) DEFAULT NULL COMMENT '{"validate":0}',
  `y` decimal(20,10) DEFAULT NULL COMMENT '{"validate":0}',
  `fix_width` decimal(20,10) DEFAULT NULL COMMENT '{"validate":0}',
  `fix_height` decimal(20,10) DEFAULT NULL COMMENT '{"validate":0}',
  `status` varchar(15) DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_logs`
--

CREATE TABLE `es_logs` (
  `id_log` int(11) NOT NULL,
  `heading` varchar(499) DEFAULT NULL,
  `message` text,
  `action` varchar(499) DEFAULT NULL,
  `code` varchar(200) DEFAULT NULL,
  `level` int(11) DEFAULT NULL COMMENT '{"options":{1:"Error",2:"Warning",4:"Parsing Error",8:"Notice",16:"Core Error",32:"Core Warning",64:"Compile Error",128:"Compile Warnig",256:"User Error",512:"User Warning",1024:"User Notice",2048:"Runtime Error"}}',
  `file` varchar(1000) DEFAULT NULL,
  `line` int(11) DEFAULT NULL,
  `trace` text,
  `previous` varchar(499) DEFAULT NULL,
  `xdebug_message` text,
  `type` int(11) DEFAULT NULL,
  `post` varchar(1000) DEFAULT NULL,
  `severity` varchar(400) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `es_logs`
--

INSERT INTO `es_logs` (`id_log`, `heading`, `message`, `action`, `code`, `level`, `file`, `line`, `trace`, `previous`, `xdebug_message`, `type`, `post`, `severity`, `status`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1116, 'An Error Was Encountered', 'La tabla hbf_empleados no se encuentra en la base de datos', 'estic/logs', '500', 2, NULL, NULL, NULL, NULL, NULL, NULL, '|', NULL, 'ENABLED', 0, 1, 1, '2019-05-04 11:45:11', '2019-05-04 11:45:11'),
(1117, 'An Error Was Encountered', 'La tabla hbf_empleados no se encuentra en la base de datos', 'estic/users', '500', 2, NULL, NULL, NULL, NULL, NULL, NULL, '|', NULL, 'ENABLED', 0, 1, 1, '2019-05-04 11:45:15', '2019-05-04 11:45:15'),
(1118, NULL, 'Call to undefined method Model_Users::getCellphoneNumber1()', NULL, '0', 2, '/Applications/XAMPP/xamppfiles/htdocs/estic/proyects/herbalife-nutrition/app/modules/estic/users/views/index.php', 77, '#0 /Applications/XAMPP/xamppfiles/htdocs/estic/proyects/herbalife-nutrition/isys/third_party/MX/Loader.php(455): include()\n#1 /Applications/XAMPP/xamppfiles/htdocs/estic/proyects/herbalife-nutrition/isys/third_party/MX/Loader.php(362): MX_Loader->_ci_load(Array, false, \'\')\n#2 /Applications/XAMPP/xamppfiles/htdocs/estic/proyects/herbalife-nutrition/app/layouts/backend/_subLayout.php(188): MX_Loader->view(\'index\')\n#3 /Applications/XAMPP/xamppfiles/htdocs/estic/proyects/herbalife-nutrition/isys/third_party/MX/Loader.php(455): include(\'/Applications/X...\')\n#4 /Applications/XAMPP/xamppfiles/htdocs/estic/proyects/herbalife-nutrition/isys/third_party/MX/Loader.php(362): MX_Loader->_ci_load(Array, false, \'\')\n#5 /Applications/XAMPP/xamppfiles/htdocs/estic/proyects/herbalife-nutrition/app/layouts/backend/_layout.php(106): MX_Loader->view(\'_subLayout\')\n#6 /Applications/XAMPP/xamppfiles/htdocs/estic/proyects/herbalife-nutrition/isys/third_party/MX/Loader.php(455): include(\'/Applications/X...\')\n#7 /Applications/XAMPP/xamppfiles/htdocs/estic/proyects/herbalife-nutrition/isys/third_party/MX/Loader.php(362): MX_Loader->_ci_load(Array, false, \'\')\n#8 /Applications/XAMPP/xamppfiles/htdocs/estic/proyects/herbalife-nutrition/isys/core/CodeIgniter.php(1245): MX_Loader->view(\'_layout\', Array)\n#9 /Applications/XAMPP/xamppfiles/htdocs/estic/proyects/herbalife-nutrition/index.php(87): require_once(\'/Applications/X...\')\n#10 {main}', NULL, NULL, NULL, '|', NULL, 'ENABLED', 0, 1, 1, '2019-05-04 11:45:15', '2019-05-04 11:45:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_modules`
--

CREATE TABLE `es_modules` (
  `id_module` int(10) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `es_modules`
--

INSERT INTO `es_modules` (`id_module`, `name`, `description`, `status`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1, 'Administrador del sistema estic', 'Modulo para la administracion del nucleo del sistema', 'ENABLED', 0, 1, 1, '2018-09-06 13:00:58', '2018-09-06 12:47:30'),
(2, 'Administrador del sistema admin', 'Modulo para la administracion del sistema Herbalife Nutrition', 'ENABLED', 0, 1, 1, '2018-09-06 12:48:32', '2018-09-06 12:48:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_provincias`
--

CREATE TABLE `es_provincias` (
  `id_provincia` int(10) UNSIGNED NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `area` varchar(900) DEFAULT NULL COMMENT '{"validate":0}',
  `lat` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `lng` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `id_municipio` int(11) UNSIGNED DEFAULT NULL COMMENT '{"validate":0}',
  `id_ciudad` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0}',
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_roles`
--

CREATE TABLE `es_roles` (
  `id_role` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL COMMENT '{"validate":0}',
  `write` varchar(10) DEFAULT NULL COMMENT '{"input":"radios","options":["on","off"]}',
  `read` varchar(10) DEFAULT NULL COMMENT '{"input":"radios","options":["on","off"]}',
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED DEFAULT NULL,
  `id_user_created` int(11) UNSIGNED DEFAULT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `es_roles`
--

INSERT INTO `es_roles` (`id_role`, `name`, `description`, `write`, `read`, `status`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1, 'Administrador nivel desarrollador ', 'Administrador con todos los privilegios', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-08-29 09:45:30', '2018-08-29 09:45:30'),
(2, 'Administrador del area de sistemas', '<p>Administrador del Sistema</p>', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-09-14 17:11:41', '2018-09-14 17:11:41'),
(3, 'Administrador para las configuraciones del sistema', 'Funcionarios encargados de la administracion de las denuncias que presentan las personas', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-11-08 00:01:10', '2018-11-08 00:01:14'),
(4, 'Defensor del pueblo', 'Rol para el defensor del pueblo', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-11-08 00:06:37', '2018-11-08 00:06:41'),
(5, 'Delegado Adjunto', 'Rol para delegados adjuntos', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-11-08 00:07:42', '2018-11-08 00:07:44'),
(6, 'Jefe de unidad', 'Rol para jefes de unidad', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-11-08 00:10:08', '2018-11-08 00:10:09'),
(7, 'Jefe de area', 'Rol para los jefes de area', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-11-08 00:11:27', '2018-11-08 00:11:28'),
(8, 'Jefe de delegacion estic departamental', 'Rol para los jefes de delegaciones departamentales', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-11-08 00:11:27', '2018-11-08 00:11:28'),
(9, 'Funcionario de estic', 'Rol para funcionarios', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-09-14 17:11:41', '2018-09-14 17:11:41'),
(100, 'Persona natural', 'Rol para la poblacion en general', NULL, NULL, 'ENABLED', 0, 1, 1, '2018-09-14 17:11:41', '2018-09-14 17:11:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_sessions`
--

CREATE TABLE `es_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL COMMENT '{"label":"Datos en sesion","input":"textarea"}',
  `last_activity` datetime DEFAULT '0000-00-00 00:00:00',
  `id_user` int(11) UNSIGNED DEFAULT NULL COMMENT '{"label":"Nombre del Usuario","selectBy":["name","lastname"]}',
  `lng` int(11) DEFAULT NULL,
  `lat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='{"title":"Sesiones del Sistema","indexFields":["ip_address","timestamp","last_activity","id_user"],"numListed":4}';

--
-- Volcado de datos para la tabla `es_sessions`
--

INSERT INTO `es_sessions` (`id`, `ip_address`, `timestamp`, `data`, `last_activity`, `id_user`, `lng`, `lat`) VALUES
('0a1a4d5a639da49c43b34db151f4ab2c', '127.0.0.1', 1556984715, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535363938343539393b61646d696e5f6c6f67676564696e7c613a383a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a31393a2272616661656c4065737469632e636f6d2e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a393a226964735f726f6c6573223b613a313a7b693a303b643a313b7d733a383a226c6f67676564696e223b623a313b7d69645f757365727c643a313b, '2019-05-04 11:43:19', 1, NULL, NULL),
('14d9e2320c1af47237b47c3d4f4b7e33', '127.0.0.1', 1556946904, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535363934363633313b, '2019-05-04 01:10:31', NULL, NULL, NULL),
('1dcca554f857f864474eb834ef04617e', '127.0.0.1', 1556983995, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535363938333939353b, '2019-05-04 10:51:00', NULL, NULL, NULL),
('719274b68340e2cea4f0feace8451540', '127.0.0.1', 1556983321, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535363938333332313b61646d696e5f6c6f67676564696e7c613a383a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a31393a2272616661656c4065737469632e636f6d2e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a393a226964735f726f6c6573223b613a313a7b693a303b643a313b7d733a383a226c6f67676564696e223b623a313b7d69645f757365727c643a313b, '2019-05-04 11:14:04', 1, NULL, NULL),
('7e15eeb379d37f2bc92227b156896cb3', '127.0.0.1', 1556983806, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535363938333830363b61646d696e5f6c6f67676564696e7c613a383a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a31393a2272616661656c4065737469632e636f6d2e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a393a226964735f726f6c6573223b613a313a7b693a303b643a313b7d733a383a226c6f67676564696e223b623a313b7d69645f757365727c643a313b, '2019-05-04 11:24:22', 1, NULL, NULL),
('816b99a9fe57fd399cd38d44a99b13a3', '127.0.0.1', 1556982844, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535363938323834343b, '2019-05-04 10:56:35', NULL, NULL, NULL),
('ac51c4b894a826d90d7ba14f370b24e9', '127.0.0.1', 1556983963, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535363938333830363b61646d696e5f6c6f67676564696e7c613a383a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a31393a2272616661656c4065737469632e636f6d2e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a393a226964735f726f6c6573223b613a313a7b693a303b643a313b7d733a383a226c6f67676564696e223b623a313b7d69645f757365727c643a313b, '2019-05-04 11:32:35', 1, NULL, NULL),
('be7ea711fbf9c4170cd3b45b350b168a', '127.0.0.1', 1556984599, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535363938343539393b61646d696e5f6c6f67676564696e7c613a383a7b733a373a2269645f75736572223b733a313a2231223b733a353a22656d61696c223b733a31393a2272616661656c4065737469632e636f6d2e626f223b733a383a2270617373776f7264223b733a3132383a223335626236623232393263353433613362656134373936303665363735356139303334616361336664306133626530323138303839306164356561363733613333346465633832666563333836383830623730313061636537346534393537643962626636653763306539313832363438383936613566643939346631306134223b733a373a2269645f726f6c65223b733a313a2231223b733a343a226e616d65223b733a363a2252616661656c223b733a383a226c6173746e616d65223b733a393a2247757469657272657a223b733a393a226964735f726f6c6573223b613a313a7b693a303b643a313b7d733a383a226c6f67676564696e223b623a313b7d69645f757365727c643a313b, '2019-05-04 11:33:15', 1, NULL, NULL),
('f15496f6ff36efb68aff94ad985a7912', '127.0.0.1', 1556946631, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535363934363633313b, '2019-05-04 00:45:34', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_tables`
--

CREATE TABLE `es_tables` (
  `id_table` int(11) UNSIGNED NOT NULL,
  `id_module` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Modulo","input":"select","selectBy":["name"]}',
  `id_role` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Roles Admitidos","input":"radios"}',
  `title` varchar(100) NOT NULL,
  `table_name` varchar(255) DEFAULT NULL COMMENT '{"label":"Tablas","input":"select","options":"db_tabs"}',
  `listed` varchar(15) NOT NULL DEFAULT 'ENABLED' COMMENT '{"input":"radios","options":{"ENABLED":"enabled","DISABLED":"disabled"}}',
  `description` text COMMENT '{"validate":0}',
  `icon` varchar(200) NOT NULL COMMENT '{"validate":0}',
  `url` varchar(400) NOT NULL,
  `url_edit` varchar(450) DEFAULT NULL,
  `url_index` varchar(450) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `es_tables`
--

INSERT INTO `es_tables` (`id_table`, `id_module`, `id_role`, `title`, `table_name`, `listed`, `description`, `icon`, `url`, `url_edit`, `url_index`, `status`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(101, 1, 1, 'Cities', 'es_cities', 'enabled', '', '', 'estic/cities', 'estic/cities/edit', 'estic/cities/index', 'enabled', 1, 1, 1, '2019-05-02 02:12:20', '2019-05-02 00:33:57'),
(102, 1, 1, 'Logs', 'es_logs', 'enabled', '', '', 'estic/logs', 'estic/logs/edit', 'estic/logs/index', 'enabled', 1, 1, 1, '2019-05-02 02:12:21', '2019-05-02 00:33:57'),
(103, 1, 1, 'Domains', 'es_domains', 'enabled', '', '', 'estic/domains', 'estic/domains/edit', 'estic/domains/index', 'enabled', 1, 1, 1, '2019-05-02 02:12:21', '2019-05-02 00:33:57'),
(104, 1, 1, 'Users Roles', 'es_users_roles', 'enabled', '', '', 'estic/users_roles', 'estic/users_roles/edit', 'estic/users_roles/index', 'enabled', 1, 1, 1, '2019-05-02 02:12:21', '2019-05-02 00:33:57'),
(105, 1, 1, 'Users', 'es_users', 'enabled', '', '', 'estic/users', 'estic/users/edit', 'estic/users/index', 'enabled', 1, 1, 1, '2019-05-02 02:12:22', '2019-05-02 00:33:57'),
(106, 1, 1, 'Tables Roles', 'es_tables_roles', 'enabled', '', '', 'estic/tables_roles', 'estic/tables_roles/edit', 'estic/tables_roles/index', 'enabled', 1, 1, 1, '2019-05-02 02:12:22', '2019-05-02 00:33:57'),
(107, 1, 1, 'Tables', 'es_tables', 'enabled', '', '', 'estic/tables', 'estic/tables/edit', 'estic/tables/index', 'enabled', 1, 1, 1, '2019-05-02 02:12:23', '2019-05-02 00:33:57'),
(108, 1, 1, 'Sesiones del Sistema', 'es_sessions', 'enabled', '', '', 'estic/sessions', 'estic/sessions/edit', 'estic/sessions/index', 'enabled', 2, 1, 1, '2019-05-02 02:12:23', '2019-05-02 00:33:57'),
(109, 1, 1, 'Roles', 'es_roles', 'enabled', '', '', 'estic/roles', 'estic/roles/edit', 'estic/roles/index', 'enabled', 2, 1, 1, '2019-05-02 02:12:23', '2019-05-02 00:33:57'),
(110, 1, 1, 'Provincias', 'es_provincias', 'enabled', '', '', 'estic/provincias', 'estic/provincias/edit', 'estic/provincias/index', 'enabled', 2, 1, 1, '2019-05-02 02:12:24', '2019-05-02 00:33:57'),
(111, 1, 1, 'Modules', 'es_modules', 'enabled', '', '', 'estic/modules', 'estic/modules/edit', 'estic/modules/index', 'enabled', 2, 1, 1, '2019-05-02 02:12:24', '2019-05-02 00:33:57'),
(112, 1, 1, 'Files', 'es_files', 'enabled', '', '', 'estic/files', 'estic/files/edit', 'estic/files/index', 'enabled', 2, 1, 1, '2019-05-02 02:12:24', '2019-05-02 00:33:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_tables_roles`
--

CREATE TABLE `es_tables_roles` (
  `id_table_role` int(11) NOT NULL,
  `id_table` int(10) UNSIGNED DEFAULT NULL,
  `id_role` int(10) UNSIGNED DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `es_tables_roles`
--

INSERT INTO `es_tables_roles` (`id_table_role`, `id_table`, `id_role`, `estado`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(101, 101, 1, 'ENABLED', 0, 1, 1, '2019-05-02 02:12:20', '2019-05-02 02:12:20'),
(102, 102, 1, 'ENABLED', 0, 1, 1, '2019-05-02 02:12:21', '2019-05-02 02:12:21'),
(103, 103, 1, 'ENABLED', 0, 1, 1, '2019-05-02 02:12:21', '2019-05-02 02:12:21'),
(104, 104, 1, 'ENABLED', 0, 1, 1, '2019-05-02 02:12:21', '2019-05-02 02:12:21'),
(105, 105, 1, 'ENABLED', 0, 1, 1, '2019-05-02 02:12:22', '2019-05-02 02:12:22'),
(106, 106, 1, 'ENABLED', 0, 1, 1, '2019-05-02 02:12:22', '2019-05-02 02:12:22'),
(107, 107, 1, 'ENABLED', 0, 1, 1, '2019-05-02 02:12:23', '2019-05-02 02:12:23'),
(108, 108, 1, 'ENABLED', 3, 1, 1, '2019-05-02 02:12:23', '2019-05-02 01:44:29'),
(109, 109, 1, 'ENABLED', 3, 1, 1, '2019-05-02 02:12:23', '2019-05-02 01:44:30'),
(110, 110, 1, 'ENABLED', 3, 1, 1, '2019-05-02 02:12:24', '2019-05-02 01:44:30'),
(111, 111, 1, 'ENABLED', 3, 1, 1, '2019-05-02 02:12:24', '2019-05-02 01:44:30'),
(112, 112, 1, 'ENABLED', 3, 1, 1, '2019-05-02 02:12:24', '2019-05-02 01:44:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_users`
--

CREATE TABLE `es_users` (
  `id_user` int(11) UNSIGNED NOT NULL,
  `name` varchar(256) DEFAULT NULL,
  `lastname` varchar(256) DEFAULT NULL COMMENT '{"validate":0}',
  `username` varchar(250) DEFAULT NULL COMMENT '{"validate":0}',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '{"validate":["email"]}',
  `address` varchar(500) DEFAULT NULL COMMENT '{"label":"Domicilio","validate":0}',
  `password` varchar(128) NOT NULL DEFAULT '' COMMENT '{"validate":["password"],"input":"password"}',
  `birthdate` date DEFAULT NULL COMMENT '{"validate":0,"input":"date"}',
  `age` int(11) DEFAULT NULL COMMENT '{"validate":0}',
  `carnet` varchar(30) DEFAULT NULL COMMENT '{"label":"Carnet de Identidad","validate":0}',
  `sexo` varchar(15) DEFAULT NULL COMMENT '{"input":"radios","options":["Masculino","Femenino"],"validate":0}',
  `phone_1` varchar(20) DEFAULT NULL COMMENT '{"label":"Telefono 1","validate":0}',
  `phone_2` varchar(20) DEFAULT NULL COMMENT '{"label":"Telefono 2","validate":0}',
  `cellphone_1` varchar(20) DEFAULT NULL COMMENT '{"label":"Celular 1","validate":0}',
  `cellphone_2` varchar(20) DEFAULT NULL COMMENT '{"label":"Celular 2","validate":0}',
  `ids_files` varchar(450) DEFAULT NULL COMMENT '{"label":"Foto de perfil","input":"file","validate":0}',
  `id_cover_picture` int(10) UNSIGNED DEFAULT NULL COMMENT '{"input":"hidden","validate":0}',
  `id_city` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0}',
  `id_provincia` int(10) UNSIGNED DEFAULT NULL COMMENT '{"validate":0}',
  `id_role` int(10) UNSIGNED DEFAULT NULL COMMENT '{"label":"Role","input":"radios","selectBy":"name"}',
  `signin_method` varchar(100) DEFAULT NULL COMMENT '{"validate":0}',
  `uid` varchar(499) DEFAULT NULL COMMENT '{"validate":0}',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `status` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='{"indexFields":["name","lastname","sexo","cellphone_1"],"numListed":5}';

--
-- Volcado de datos para la tabla `es_users`
--

INSERT INTO `es_users` (`id_user`, `name`, `lastname`, `username`, `email`, `address`, `password`, `birthdate`, `age`, `carnet`, `sexo`, `phone_1`, `phone_2`, `cellphone_1`, `cellphone_2`, `ids_files`, `id_cover_picture`, `id_city`, `id_provincia`, `id_role`, `signin_method`, `uid`, `change_count`, `status`, `date_modified`, `date_created`) VALUES
(1, 'Rafael', 'Gutierrez', '', 'rafael@estic.com.bo', '', '35bb6b2292c543a3bea479606e6755a9034aca3fd0a3be02180890ad5ea673a334dec82fec386880b7010ace74e4957d9bbf6e7c0e9182648896a5fd994f10a4', '0000-00-00', 0, '', 'masculino', '', '', '', '', '', NULL, NULL, NULL, 1, '', NULL, 1, 'ENABLED', '2018-11-28 21:46:42', '2018-08-29 09:45:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `es_users_roles`
--

CREATE TABLE `es_users_roles` (
  `id_user_role` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED DEFAULT NULL,
  `id_role` int(10) UNSIGNED DEFAULT NULL,
  `estado` varchar(15) NOT NULL DEFAULT 'ENABLED',
  `change_count` int(11) NOT NULL DEFAULT '0',
  `id_user_modified` int(11) UNSIGNED NOT NULL,
  `id_user_created` int(11) UNSIGNED NOT NULL,
  `date_modified` datetime NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `es_users_roles`
--

INSERT INTO `es_users_roles` (`id_user_role`, `id_user`, `id_role`, `estado`, `change_count`, `id_user_modified`, `id_user_created`, `date_modified`, `date_created`) VALUES
(1, 1, 1, 'ENABLED', 0, 1, 1, '2018-11-28 21:46:42', '2018-11-28 21:46:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(112);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `es_cities`
--
ALTER TABLE `es_cities`
  ADD PRIMARY KEY (`id_city`),
  ADD UNIQUE KEY `es_cities_id_city_uindex` (`id_city`),
  ADD KEY `es_cities_ibfk_1` (`id_user_created`),
  ADD KEY `es_cities_ibfk_2` (`id_user_modified`),
  ADD KEY `es_cities_ibfk_3` (`id_capital`),
  ADD KEY `es_cities_ibfk_4` (`id_region`),
  ADD KEY `es_cities_ibfk_5` (`id_cover_picture`);

--
-- Indices de la tabla `es_domains`
--
ALTER TABLE `es_domains`
  ADD PRIMARY KEY (`id_domain`),
  ADD UNIQUE KEY `es_domains_id_domain_uindex` (`id_domain`),
  ADD KEY `es_domains_ibfk_1` (`id_user_created`),
  ADD KEY `es_domains_ibfk_2` (`id_user_modified`);

--
-- Indices de la tabla `es_files`
--
ALTER TABLE `es_files`
  ADD PRIMARY KEY (`id_file`),
  ADD UNIQUE KEY `es_files_id_file_uindex` (`id_file`),
  ADD KEY `es_files_ibfk_1` (`id_user_created`),
  ADD KEY `es_files_ibfk_2` (`id_user_modified`),
  ADD KEY `es_files_ibfk_3` (`id_parent`);

--
-- Indices de la tabla `es_logs`
--
ALTER TABLE `es_logs`
  ADD PRIMARY KEY (`id_log`),
  ADD UNIQUE KEY `es_logs_id_log_uindex` (`id_log`);

--
-- Indices de la tabla `es_modules`
--
ALTER TABLE `es_modules`
  ADD PRIMARY KEY (`id_module`),
  ADD UNIQUE KEY `es_modules_id_module_uindex` (`id_module`),
  ADD KEY `es_modules_ibfk_1` (`id_user_modified`),
  ADD KEY `es_modules_ibfk_2` (`id_user_created`);

--
-- Indices de la tabla `es_provincias`
--
ALTER TABLE `es_provincias`
  ADD PRIMARY KEY (`id_provincia`),
  ADD UNIQUE KEY `es_provincias_id_provincia_uindex` (`id_provincia`),
  ADD KEY `es_provincias_ibfk_1` (`id_user_created`),
  ADD KEY `es_provincias_ibfk_2` (`id_user_modified`),
  ADD KEY `es_provincias_ibfk_3` (`id_ciudad`),
  ADD KEY `es_provincias_ibfk_4` (`id_municipio`);

--
-- Indices de la tabla `es_roles`
--
ALTER TABLE `es_roles`
  ADD PRIMARY KEY (`id_role`),
  ADD UNIQUE KEY `es_roles_id_role_uindex` (`id_role`),
  ADD KEY `es_roles_ibfk_1` (`id_user_created`),
  ADD KEY `es_roles_ibfk_2` (`id_user_modified`);

--
-- Indices de la tabla `es_sessions`
--
ALTER TABLE `es_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `es_sessions_ibfk_1` (`id_user`);

--
-- Indices de la tabla `es_tables`
--
ALTER TABLE `es_tables`
  ADD PRIMARY KEY (`id_table`),
  ADD UNIQUE KEY `es_tables_id_table_uindex` (`id_table`),
  ADD KEY `es_tables_ibfk_4` (`id_module`),
  ADD KEY `id_user_created` (`id_user_created`),
  ADD KEY `id_user_modified` (`id_user_modified`),
  ADD KEY `es_tables_ibfk_3` (`id_role`);

--
-- Indices de la tabla `es_tables_roles`
--
ALTER TABLE `es_tables_roles`
  ADD PRIMARY KEY (`id_table_role`),
  ADD UNIQUE KEY `es_tables_roles_id_table_role_uindex` (`id_table_role`),
  ADD KEY `es_tables_roles_ibfk_1` (`id_user_created`),
  ADD KEY `es_tables_roles_ibfk_2` (`id_user_modified`),
  ADD KEY `es_tables_roles_ibfk_3` (`id_table`),
  ADD KEY `es_tables_roles_ibfk_4` (`id_role`);

--
-- Indices de la tabla `es_users`
--
ALTER TABLE `es_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `es_users_id_user_uindex` (`id_user`),
  ADD KEY `es_users_ibfk_1` (`id_role`),
  ADD KEY `es_users_ibfk_2` (`id_provincia`),
  ADD KEY `es_users_ibfk_3` (`id_cover_picture`),
  ADD KEY `es_users_ibfk_4` (`id_city`);

--
-- Indices de la tabla `es_users_roles`
--
ALTER TABLE `es_users_roles`
  ADD PRIMARY KEY (`id_user_role`),
  ADD UNIQUE KEY `dfa_usuarios_roles_id_usuario_role_uindex` (`id_user_role`),
  ADD KEY `dfa_usuarios_roles_ibfk_1` (`id_user_created`),
  ADD KEY `dfa_usuarios_roles_ibfk_2` (`id_user_modified`),
  ADD KEY `dfa_usuarios_roles_ibfk_3` (`id_user`),
  ADD KEY `dfa_usuarios_roles_ibfk_4` (`id_role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `es_cities`
--
ALTER TABLE `es_cities`
  MODIFY `id_city` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `es_domains`
--
ALTER TABLE `es_domains`
  MODIFY `id_domain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `es_files`
--
ALTER TABLE `es_files`
  MODIFY `id_file` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=573;

--
-- AUTO_INCREMENT de la tabla `es_logs`
--
ALTER TABLE `es_logs`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1119;

--
-- AUTO_INCREMENT de la tabla `es_modules`
--
ALTER TABLE `es_modules`
  MODIFY `id_module` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `es_provincias`
--
ALTER TABLE `es_provincias`
  MODIFY `id_provincia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `es_roles`
--
ALTER TABLE `es_roles`
  MODIFY `id_role` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `es_tables_roles`
--
ALTER TABLE `es_tables_roles`
  MODIFY `id_table_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1127;

--
-- AUTO_INCREMENT de la tabla `es_users`
--
ALTER TABLE `es_users`
  MODIFY `id_user` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `es_users_roles`
--
ALTER TABLE `es_users_roles`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `es_cities`
--
ALTER TABLE `es_cities`
  ADD CONSTRAINT `es_cities_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_cities_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_cities_ibfk_3` FOREIGN KEY (`id_capital`) REFERENCES `es_cities` (`id_city`),
  ADD CONSTRAINT `es_cities_ibfk_4` FOREIGN KEY (`id_region`) REFERENCES `es_cities` (`id_city`),
  ADD CONSTRAINT `es_cities_ibfk_5` FOREIGN KEY (`id_cover_picture`) REFERENCES `es_files` (`id_file`);

--
-- Filtros para la tabla `es_domains`
--
ALTER TABLE `es_domains`
  ADD CONSTRAINT `es_domains_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_domains_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`);

--
-- Filtros para la tabla `es_files`
--
ALTER TABLE `es_files`
  ADD CONSTRAINT `es_files_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_files_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_files_ibfk_3` FOREIGN KEY (`id_parent`) REFERENCES `es_files` (`id_file`);

--
-- Filtros para la tabla `es_modules`
--
ALTER TABLE `es_modules`
  ADD CONSTRAINT `es_modules_ibfk_1` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_modules_ibfk_2` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`);

--
-- Filtros para la tabla `es_provincias`
--
ALTER TABLE `es_provincias`
  ADD CONSTRAINT `es_provincias_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_provincias_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_provincias_ibfk_3` FOREIGN KEY (`id_ciudad`) REFERENCES `es_cities` (`id_city`),
  ADD CONSTRAINT `es_provincias_ibfk_4` FOREIGN KEY (`id_municipio`) REFERENCES `es_provincias` (`id_provincia`);

--
-- Filtros para la tabla `es_roles`
--
ALTER TABLE `es_roles`
  ADD CONSTRAINT `es_roles_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_roles_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`);

--
-- Filtros para la tabla `es_sessions`
--
ALTER TABLE `es_sessions`
  ADD CONSTRAINT `es_sessions_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `es_users` (`id_user`);

--
-- Filtros para la tabla `es_tables`
--
ALTER TABLE `es_tables`
  ADD CONSTRAINT `es_tables_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_tables_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_tables_ibfk_3` FOREIGN KEY (`id_role`) REFERENCES `es_roles` (`id_role`),
  ADD CONSTRAINT `es_tables_ibfk_4` FOREIGN KEY (`id_module`) REFERENCES `es_modules` (`id_module`);

--
-- Filtros para la tabla `es_tables_roles`
--
ALTER TABLE `es_tables_roles`
  ADD CONSTRAINT `es_tables_roles_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_tables_roles_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_tables_roles_ibfk_3` FOREIGN KEY (`id_table`) REFERENCES `es_tables` (`id_table`),
  ADD CONSTRAINT `es_tables_roles_ibfk_4` FOREIGN KEY (`id_role`) REFERENCES `es_roles` (`id_role`);

--
-- Filtros para la tabla `es_users`
--
ALTER TABLE `es_users`
  ADD CONSTRAINT `es_users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `es_roles` (`id_role`),
  ADD CONSTRAINT `es_users_ibfk_2` FOREIGN KEY (`id_provincia`) REFERENCES `es_provincias` (`id_provincia`),
  ADD CONSTRAINT `es_users_ibfk_3` FOREIGN KEY (`id_cover_picture`) REFERENCES `es_files` (`id_file`),
  ADD CONSTRAINT `es_users_ibfk_4` FOREIGN KEY (`id_city`) REFERENCES `es_cities` (`id_city`);

--
-- Filtros para la tabla `es_users_roles`
--
ALTER TABLE `es_users_roles`
  ADD CONSTRAINT `es_users_roles_ibfk_1` FOREIGN KEY (`id_user_created`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_users_roles_ibfk_2` FOREIGN KEY (`id_user_modified`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_users_roles_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `es_users` (`id_user`),
  ADD CONSTRAINT `es_users_roles_ibfk_4` FOREIGN KEY (`id_role`) REFERENCES `es_roles` (`id_role`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
