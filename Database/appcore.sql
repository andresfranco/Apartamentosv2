-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2015 a las 22:56:39
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `appcore`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `generatestatement`( IN varyear int(4) ,IN varmonth int(2),IN towerid int (11))
BEGIN
-- Payment
Select 
p.paymentdate as processdate,
p.paymentmethod as paymentmethod,
p.depositor as depositor,
p.amount as amount ,
'C' as debitcredit,
(select number from apartment where id = p.apartmentid  and towerid =towerid limit 1 )as apartment,
(select id from paymentinvoice where paymentid= p.id limit 1) as invoicenumber,
p.description as description
from payment p
Inner join apartment a ON a.id =p.apartmentid and a.towerid =towerid
where year(p.paymentdate)=varyear and month(p.paymentdate)=varmonth
UNION
-- Income 
Select 
i.incomedate as processdate,
i.paymentmethod as paymentmethod,
i.depositor as depositor,
i.amount as amount,
'C' as debitocredito,
'' as apartment,
'' as invoicenumber,
i.description as description
from income i
where year(i.incomedate)=varyear and month(i.incomedate)=varmonth and i.towerid =towerid

UNION
-- Expense
Select 
e.expensedate as processdate,
e.paymentmethod  as paymentmethod,
(select name from provider where providerid =e.providerid limit 1) as depositor,
e.amount as amount,
'D' as debitocredito,
'' as apartment,
'' as invoicenumber,
e.description as description
from expense e
where year(e.expensedate)=varyear and month(e.expensedate)=varmonth and e.towerid=towerid;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getactionsbyuserid`(IN iduser INT(11))
BEGIN
select ra.actionid ,a.actionname 
     from roleaction ra , action a 
     where ra.actionid=a.id
     and ra.roleid in (select  roleid from userrole where userid = iduser);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `statementexcel`( IN varyear int(4) ,IN varmonth int(2),IN towerid int (11))
BEGIN
-- Payment
Select 
p.paymentdate as processdate,
p.paymentmethod as paymentmethod,
p.depositor as depositor,
p.amount as credit,
'' as debit,
(select number from apartment where id = p.apartmentid  and towerid =towerid limit 1 )as apartment,
(select id from paymentinvoice where paymentid= p.id limit 1) as invoicenumber,
p.description as description
from payment p
Inner join apartment a ON a.id =p.apartmentid and a.towerid =towerid
where year(p.paymentdate)=varyear and month(p.paymentdate)=varmonth
UNION
-- Income 
Select 
i.incomedate as processdate,
i.paymentmethod as paymentmethod,
i.depositor as depositor,
i.amount as credit,
'' as debit,
'' as apartment,
'' as invoicenumber,
i.description as description
from income i
where year(i.incomedate)=varyear and month(i.incomedate)=varmonth and i.towerid =towerid

UNION
-- Expense
Select 
e.expensedate as processdate,
e.paymentmethod  as paymentmethod,
(select name from provider where providerid =e.providerid limit 1) as depositor,
'' as credit,
e.amount as debit,
'' as apartment,
'' as invoicenumber,
e.description as description
from expense e
where year(e.expensedate)=varyear and month(e.expensedate)=varmonth and e.towerid=towerid;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abssenceday`
--

CREATE TABLE IF NOT EXISTS `abssenceday` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `absencedate` date DEFAULT NULL,
  `reason` varchar(45) DEFAULT NULL,
  `employeeid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_abssenceday_employee1_idx` (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `balance` float(18,2) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL,
  `bankid` int(11) NOT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_account_bank1_idx` (`bankid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `account`
--

INSERT INTO `account` (`id`, `name`, `balance`, `number`, `bankid`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 'Cuenta Corriente Green Bay torre2', 3000.00, '121341', 3, NULL, 'admin', NULL, '2014-11-25 13:37:08'),
(2, 'Cuenta de Ahorros', 345343.00, '3434444', 4, 'admin', 'admin', '2014-11-25 13:36:31', '2014-11-25 13:36:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actionname` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Volcado de datos para la tabla `action`
--

INSERT INTO `action` (`id`, `actionname`, `description`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(2, 'Create User', 'Permiso para crear usuarios', 'admin', 'admin', '2014-12-05 14:42:46', '2014-12-05 14:42:46'),
(3, 'Edit User', 'Permite cambiar los datos del usuario', 'admin', 'admin', '2014-12-09 16:09:56', '2014-12-09 16:09:56'),
(4, 'Delete User', 'Permite eliminar usuarios', 'admin', 'admin', '2014-12-09 16:10:21', '2014-12-09 16:10:21'),
(5, 'Create Role', 'Permite crear roles', 'admin', 'admin', '2014-12-10 09:47:50', '2014-12-10 09:47:50'),
(6, 'Edit Role', 'Permite editar roles', 'admin', 'admin', '2014-12-10 09:48:19', '2014-12-10 09:48:19'),
(7, 'Delete Role', 'Permite eliminar roles', 'admin', 'admin', '2014-12-10 09:48:53', '2014-12-10 09:48:53'),
(8, 'Create Translation', 'Permite editar las traducciones del sistema', 'admin', 'admin', '2014-12-10 09:50:00', '2014-12-10 09:50:00'),
(9, 'Configure Action', 'Permite configurar las acciones de seguridad', 'admin', 'admin', '2014-12-10 09:50:33', '2014-12-10 09:50:33'),
(10, 'Create Condo', 'Permite crear condominios', 'admin', 'admin', '2014-12-10 09:51:42', '2014-12-10 09:51:42'),
(11, 'Edit Condo', 'Permite editar condominios', 'admin', 'admin', '2014-12-10 09:52:13', '2014-12-10 09:52:13'),
(12, 'Delete Condo', 'Permite eliminar condominios', 'admin', 'admin', '2014-12-10 09:52:46', '2014-12-10 09:52:46'),
(13, 'Create Tower', 'Permite crear torres', 'admin', 'admin', '2014-12-10 09:53:12', '2014-12-10 09:53:12'),
(14, 'Edit Tower', 'Permite editar torres', 'admin', 'admin', '2014-12-10 09:53:33', '2014-12-10 09:53:33'),
(15, 'Delete Tower', 'Permite eliminar torres', 'admin', 'admin', '2014-12-10 09:53:56', '2014-12-10 09:53:56'),
(16, 'Create Apartment', 'Permite crear apartamentos', 'admin', 'admin', '2014-12-10 09:54:25', '2014-12-10 09:54:25'),
(17, 'Edit Apartment', 'Permite editar apartamentos', 'admin', 'admin', '2014-12-10 09:54:53', '2014-12-10 09:54:53'),
(18, 'Delete Apartment', 'Permite eliminar apartamentos', 'admin', 'admin', '2014-12-10 09:55:17', '2014-12-10 09:55:17'),
(19, 'Create Employee', 'Permite crear empleados', 'admin', 'admin', '2014-12-10 09:56:40', '2014-12-10 09:56:40'),
(20, 'Edit Employee', 'Permite editar empleados', 'admin', 'admin', '2014-12-10 09:57:17', '2014-12-10 09:57:17'),
(21, 'Delete Employee', 'Permite eliminar empleados', 'admin', 'admin', '2014-12-10 09:57:39', '2014-12-10 09:57:39'),
(22, 'Create Provider', 'Permite crear proveedores', 'admin', 'admin', '2014-12-10 09:58:11', '2014-12-10 09:58:11'),
(23, 'Edit Provider', 'Permite editar proveedores', 'admin', 'admin', '2014-12-10 09:58:42', '2014-12-10 09:58:42'),
(24, 'Delete Provider', 'Permite eliminar proveedores', 'admin', 'admin', '2014-12-10 10:00:00', '2014-12-10 10:00:00'),
(25, 'Create Ccompany', 'Permite crear constructoras', 'admin', 'admin', '2014-12-10 10:00:45', '2014-12-10 10:00:45'),
(26, 'Edit Ccompany', 'Permite editar constructoras', 'admin', 'admin', '2014-12-10 10:04:15', '2014-12-10 10:04:15'),
(27, 'Delete Ccompany', 'Permite eliminar constructoras', 'admin', 'admin', '2014-12-10 10:05:08', '2014-12-10 10:05:08'),
(28, 'Create Resident', 'Permite crear residentes', 'admin', 'admin', '2014-12-10 10:05:38', '2014-12-10 10:05:38'),
(29, 'Edit Resident', 'Permite editar residentes', 'admin', 'admin', '2014-12-10 10:06:08', '2014-12-10 10:06:08'),
(30, 'Delete Resident', 'Permite eliminar residentes', 'admin', 'admin', '2014-12-10 10:06:36', '2014-12-10 10:06:36'),
(31, 'Create Vehicle', 'Permite crear vehiculos', 'admin', 'admin', '2014-12-10 10:08:36', '2014-12-10 10:08:36'),
(32, 'Edit Vehicle', 'Permite editar vehiculos', 'admin', 'admin', '2014-12-10 10:09:36', '2014-12-10 10:09:36'),
(33, 'Delete Vehicle', 'Permite eliminar vehiculos', 'admin', 'admin', '2014-12-10 10:10:03', '2014-12-10 10:10:03'),
(34, 'Create Color', 'Permite crear un color', 'admin', 'admin', '2014-12-10 10:11:05', '2014-12-10 10:11:05'),
(35, 'Edit Color', 'Permite editar un color', 'admin', 'admin', '2014-12-10 10:11:26', '2014-12-10 10:11:26'),
(36, 'Delete Color', 'Permite eliminar colores', 'admin', 'admin', '2014-12-10 10:11:52', '2014-12-10 10:11:52'),
(37, 'Create Brand', 'Permite crear marcas', 'admin', 'admin', '2014-12-16 10:47:59', '2014-12-16 10:47:59'),
(38, 'Edit Brand', 'Permite editar marcas', 'admin', 'admin', '2014-12-10 10:12:34', '2014-12-10 10:12:34'),
(39, 'Delete Brand', 'Permite eliminar marcas', 'admin', 'admin', '2014-12-10 10:12:57', '2014-12-10 10:12:57'),
(40, 'Create Parking', 'Permite crear estacionamientos', 'admin', 'admin', '2014-12-10 10:13:54', '2014-12-10 10:13:54'),
(41, 'Edit Parking', 'Permite editar estacionamientos', 'admin', 'admin', '2014-12-10 10:14:14', '2014-12-10 10:14:14'),
(42, 'Delete Parking', 'Permite eliminar estacionamientos', 'admin', 'admin', '2014-12-10 10:14:33', '2014-12-10 10:14:33'),
(43, 'Create Location', 'Permite crear localizaciones', 'admin', 'admin', '2014-12-10 10:15:12', '2014-12-10 10:15:12'),
(44, 'Edit Location', 'Permite editar localizaciones', 'admin', 'admin', '2014-12-10 10:15:36', '2014-12-10 10:15:36'),
(45, 'Delete Location', 'Permite eliminar localizaciones', 'admin', 'admin', '2014-12-10 10:16:39', '2014-12-10 10:16:39'),
(46, 'Create Causetype', 'Permite crear tipos de causas', 'admin', 'admin', '2014-12-10 10:17:16', '2014-12-10 10:17:16'),
(47, 'Edit Causetype', 'Permite editar tipos de causas', 'admin', 'admin', '2014-12-10 10:17:40', '2014-12-10 10:17:40'),
(48, 'Delete Causetype', 'Permite eliminar tipos de causas', 'admin', 'admin', '2014-12-10 10:18:05', '2014-12-10 10:18:05'),
(49, 'Create Cause', 'Permite crear causas', 'admin', 'admin', '2014-12-10 10:19:16', '2014-12-10 10:19:16'),
(50, 'Edit Cause', 'Permite editar causas', 'admin', 'admin', '2014-12-10 10:19:35', '2014-12-10 10:19:35'),
(51, 'Delete Cause', 'Permite eliminar causas', 'admin', 'admin', '2014-12-10 10:19:58', '2014-12-10 10:19:58'),
(52, 'Create Expense', 'Permite crear gastos', 'admin', 'admin', '2014-12-10 10:21:30', '2014-12-10 10:21:30'),
(53, 'Edit Expense', 'Permite editar gastos', 'admin', 'admin', '2014-12-10 10:22:25', '2014-12-10 10:22:25'),
(54, 'Delete Expense', 'Permite eliminar gastos', 'admin', 'admin', '2014-12-10 10:22:46', '2014-12-10 10:22:46'),
(55, 'Create Income', 'Permite crear ingresos', 'admin', 'admin', '2014-12-10 10:23:12', '2014-12-10 10:23:12'),
(56, 'Edit Income', 'Permite editar ingresos', 'admin', 'admin', '2014-12-10 10:23:36', '2014-12-10 10:23:36'),
(57, 'Delete Income', 'Permite eliminar ingresos', 'admin', 'admin', '2014-12-10 10:23:54', '2014-12-10 10:23:54'),
(58, 'Create Bank', 'Permite crear bancos', 'admin', 'admin', '2014-12-10 10:25:13', '2014-12-10 10:25:13'),
(59, 'Edit Bank', 'Permite editar bancos', 'admin', 'admin', '2014-12-10 10:25:35', '2014-12-10 10:25:35'),
(60, 'Delete Bank', 'Permite eliminar bancos', 'admin', 'admin', '2014-12-10 10:26:00', '2014-12-10 10:26:00'),
(61, 'Create Account', 'Permite crear cuentas', 'admin', 'admin', '2014-12-10 10:27:10', '2014-12-10 10:27:10'),
(62, 'Edit Account', 'Permite editar cuentas', 'admin', 'admin', '2014-12-10 10:27:30', '2014-12-10 10:27:30'),
(63, 'Delete Account', 'Permite eliminar cuentas', 'admin', 'admin', '2014-12-10 10:27:54', '2014-12-10 10:27:54'),
(64, 'Create Payment', 'Permite crear pagos', 'admin', 'admin', '2014-12-10 10:28:23', '2014-12-10 10:28:23'),
(65, 'Edit Payment', 'Permite editar pagos', 'admin', 'admin', '2014-12-10 10:28:45', '2014-12-10 10:28:45'),
(66, 'Delete Payment', 'Permite eliminar pagos', 'admin', 'admin', '2014-12-10 10:29:04', '2014-12-10 10:29:04'),
(67, 'View Statement', 'Permite ver el estado de cuenta', 'admin', 'admin', '2014-12-10 10:30:09', '2014-12-10 10:30:09'),
(68, 'Generate Statement PDF', 'Permite generar el estado de cuenta en pdf', 'admin', 'admin', '2014-12-10 10:30:40', '2014-12-10 10:30:40'),
(69, 'Generate Statement EXCEL', 'Permite generar el estado de cuenta en excel', 'admin', 'admin', '2014-12-10 10:31:08', '2014-12-10 10:31:08'),
(70, 'Create Residenttype', 'Permite crear tipos de residentes', 'admin', 'admin', '2014-12-16 10:16:41', '2014-12-16 10:16:41'),
(71, 'Edit Residenttype', 'Permite editar tipos de residente', 'admin', 'admin', '2014-12-16 10:17:08', '2014-12-16 10:17:08'),
(72, 'Delete Residenttype', 'Permite eliminar tipos de residente', 'admin', 'admin', '2014-12-16 10:18:28', '2014-12-16 10:18:28'),
(73, 'Create ExpenseDocument', 'Permite agregar documentos a un gasto', 'admin', 'admin', '2014-12-16 11:53:54', '2014-12-16 11:53:54'),
(74, 'Edit ExpenseDocument', 'Permite editar los datos de los documentos de un gasto', 'admin', 'admin', '2014-12-16 11:54:24', '2014-12-16 11:54:24'),
(75, 'Delete ExpenseDocument', 'permite eliminar documentos de un gasto', 'admin', 'admin', '2014-12-16 11:54:56', '2014-12-16 11:54:56'),
(76, 'Change User Password', 'Permite cambiar la contraseña del usuario', 'admin', 'admin', '2015-01-04 17:06:23', '2015-01-04 17:06:23'),
(77, 'Add Role Actions', 'Permite asociar acciones a un rol', 'admin', 'admin', '2015-01-04 17:16:30', '2015-01-04 17:16:30'),
(78, 'Create Security Action', 'Permite crear acciones de seguridad', 'admin', 'admin', '2015-01-04 17:20:50', '2015-01-04 17:20:50'),
(79, 'Edit Security Action', 'Permite editar acciones de seguridad', 'admin', 'admin', '2015-01-04 17:21:15', '2015-01-04 17:21:15'),
(80, 'Delete Security Action', 'Permite eliminar acciones de seguridad', 'admin', 'admin', '2015-01-04 17:21:34', '2015-01-04 17:21:34'),
(81, 'Edit Translation', 'Permite editar las traducciones del sistema', 'admin', 'admin', '2015-01-04 17:31:47', '2015-01-04 17:31:47'),
(82, 'Delete Transaltion', 'Permite Borrar las traducciones del sistema', 'admin', 'admin', '2015-01-04 17:32:06', '2015-01-04 17:32:06'),
(83, 'Create Sysparam', 'Permite crear parametros del sistema', 'admin', 'admin', '2015-01-09 15:27:34', '2015-01-09 15:27:34'),
(84, 'Edit Sysparam', 'Permite editar parámetros del sistema', 'admin', 'admin', '2015-01-09 15:27:55', '2015-01-09 15:27:55'),
(85, 'Delete Sysparam', 'Permite eliminar parámetros del sistema', 'admin', 'admin', '2015-01-09 15:28:18', '2015-01-09 15:28:18'),
(86, 'Create Reservation', 'Permite crear reservaciones', 'admin', 'admin', '2015-01-09 19:58:00', '2015-01-09 19:58:00'),
(87, 'Edit Reservation', 'Permite editar reservaciones', 'admin', 'admin', '2015-01-09 19:58:16', '2015-01-09 19:58:29'),
(88, 'Delete Reservation', 'Permite eliminar reservaciones', 'admin', 'admin', '2015-01-09 19:59:01', '2015-01-09 19:59:01'),
(89, 'Create Multiparam', 'Permite crear parametros multiples', 'admin', 'admin', '2015-01-11 13:51:17', '2015-01-11 13:51:17'),
(90, 'Edit Multiparam', 'Permite editar parámetros con multiples valores', 'admin', 'admin', '2015-01-11 20:05:05', '2015-01-11 20:05:05'),
(91, 'Delete Multiparam', 'Permite eliminar parámetros con multiples valores', 'admin', 'admin', '2015-01-11 20:05:36', '2015-01-11 20:05:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_roles`
--

CREATE TABLE IF NOT EXISTS `admin_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_rolescol` varchar(45) DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `nombre`, `admin_rolescol`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 'ROLE_ADMIN', NULL, NULL, NULL, NULL, NULL),
(2, 'ROLE_USER', NULL, NULL, NULL, NULL, NULL),
(5, 'Company Admin', NULL, NULL, NULL, NULL, NULL),
(14, 'Director', NULL, 'admin', 'admin', '2014-12-10 09:45:59', '2014-12-10 09:45:59'),
(15, 'Resident', NULL, 'admin', 'admin', '2014-12-10 09:46:33', '2014-12-10 09:46:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Companyid` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_admin_user_Company1_idx` (`Companyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`, `salt`, `Companyid`, `name`, `email`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(2, 'admin', 'lNOC+MQFaUf6O2zM4I/nWi2WI2G+M4nexVIG75JCKoihYXpi+MiqgEiMlgBWkdL8mC6+lGXIx7mRksPDjUcEfw==', '4d6a64b5578293fbbe685b7c1edf44e0', 1, 'Andres Franco', 'andresfranco@cableonda.net', NULL, NULL, NULL, NULL),
(3, 'secretaria', 'B11VG5aFr1MIlrvp73HR/5MhJhqr3y2wzBs184shwOhJLBkRomEu0l1azBlBGLDjfS1YXyR6JfD4m0Rx2PQKyQ==', '9e8bd7284509d95039d668781a44fe63', 1, NULL, NULL, NULL, NULL, NULL, NULL),
(32, 'usuario', 'EHWbarVUNLzo96gedfETcXgiIU3QRiiu61QLOJUwZFuTCz6X6AUjwbLfJ3Vli92WbOEzBv21gkqL4nP1h9Izew==', 'aa200b64aa59869c2bb31d6eb99b29c0', 1, 'usuario2', NULL, NULL, 'admin', NULL, '2014-11-25 14:57:26'),
(35, 'test', 'pVGFMJOxB/U+fZkxwrpCJneEc76yAm93fzHOtIOHHUXJiOTzolkfQngh2iXulBdd/ch1RWKJf+PJ1YQ1Iq1P0g==', 'c242b5fff2b7699b5db6765b4cd70a44', 1, 'test', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `advertisement`
--

CREATE TABLE IF NOT EXISTS `advertisement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apartment`
--

CREATE TABLE IF NOT EXISTS `apartment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(10) DEFAULT NULL,
  `towerid` int(11) DEFAULT NULL,
  `phone` varchar(35) DEFAULT NULL,
  `area` int(11) DEFAULT NULL,
  `numberresidents` int(11) DEFAULT NULL,
  `floornumber` int(11) DEFAULT NULL,
  `rooms` int(11) DEFAULT NULL,
  `hasmade` varchar(1) DEFAULT NULL,
  `hasbabysitting` varchar(1) DEFAULT NULL,
  `haspet` varchar(1) DEFAULT NULL,
  `hasmaderoom` varchar(1) DEFAULT NULL,
  `haskids` varchar(1) DEFAULT NULL,
  `numberofkids` int(11) DEFAULT NULL,
  `petkind` varchar(30) DEFAULT NULL,
  `petnumber` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_apartment_tower1_idx` (`towerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `apartment`
--

INSERT INTO `apartment` (`id`, `number`, `towerid`, `phone`, `area`, `numberresidents`, `floornumber`, `rooms`, `hasmade`, `hasbabysitting`, `haspet`, `hasmaderoom`, `haskids`, `numberofkids`, `petkind`, `petnumber`, `createdate`, `modifydate`, `createuser`, `modifyuser`) VALUES
(3, '8D', 1, '2342342', 100, 5, 8, 3, 'N', 'S', 'S', 'S', 'S', 2, 'Perros', '2', '2014-11-24 12:59:48', '2014-11-24 13:01:18', 'admin', 'admin'),
(4, '16D', 2, '12131212', 100, 3, 1, 3, 'N', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '16C', 2, '121212', NULL, 1, 16, NULL, 'N', 'N', 'N', 'N', 'N', 0, NULL, '0', NULL, NULL, NULL, NULL),
(9, '1A', 4, '2323232', NULL, 1, 1, NULL, 'N', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '1B', 1, '2323232', NULL, 3, 1, NULL, 'N', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '1C', 1, '2323232', NULL, 3, 1, NULL, 'N', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, '1D', 1, '232323', NULL, 2, 1, NULL, 'N', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2A', 1, '2323232', NULL, 1, 2, NULL, 'N', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '12A', 3, '1221212121', 123, 1, 12, 2, 'N', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, '1A', 6, '1221221', 120, 1, 1, 2, 'N', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(16, '1B', 3, '2323', 120, 2, 1, 2, 'N', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '13B', 1, '2323232', 120, 2, 13, 2, 'N', 'N', 'N', 'N', 'N', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '2C', 2, '2342323', NULL, 2, 2, NULL, 'N', 'N', 'N', 'N', 'N', NULL, NULL, NULL, '2014-11-24 12:56:59', '2014-11-24 12:56:59', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `architect`
--

CREATE TABLE IF NOT EXISTS `architect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `const_companyid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_architect_const_company1_idx` (`const_companyid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bank`
--

CREATE TABLE IF NOT EXISTS `bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `bank`
--

INSERT INTO `bank` (`id`, `name`, `address`, `phone`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(3, 'City Bank', 'sdsdsd', '3434343', NULL, 'admin', NULL, '2014-11-25 12:16:52'),
(4, 'Banco General', 'asas', '34232323', 'admin', 'admin', '2014-11-25 12:17:09', '2014-11-25 12:17:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(45) DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `brand`
--

INSERT INTO `brand` (`id`, `brand`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(2, 'Mazda', NULL, 'admin', NULL, '2014-11-25 10:21:29'),
(3, 'Ford', 'admin', 'admin', '2014-11-25 10:20:48', '2014-11-25 10:20:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cause`
--

CREATE TABLE IF NOT EXISTS `cause` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cause` varchar(60) DEFAULT NULL,
  `causetypeid` int(11) NOT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cause_causetype1_idx` (`causetypeid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cause`
--

INSERT INTO `cause` (`id`, `cause`, `causetypeid`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(2, 'Pago a Proveedor', 1, NULL, 'admin', NULL, '2014-11-25 11:50:08'),
(3, 'Pago de multa', 2, NULL, NULL, NULL, NULL),
(4, 'Otro', 2, 'admin', 'admin', '2014-11-25 11:49:40', '2014-11-25 11:49:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `causetype`
--

CREATE TABLE IF NOT EXISTS `causetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `causetype` varchar(45) DEFAULT NULL,
  `causetypecol` varchar(45) DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `causetype`
--

INSERT INTO `causetype` (`id`, `causetype`, `causetypecol`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 'Gastos', NULL, NULL, 'admin', NULL, '2014-11-25 11:47:44'),
(2, 'Ingresos', NULL, NULL, NULL, NULL, NULL),
(3, 'Otro', NULL, 'admin', 'admin', '2014-11-25 11:43:28', '2014-11-25 11:43:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Color` varchar(50) DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `color`
--

INSERT INTO `color` (`id`, `Color`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(17, 'Amarillo', NULL, 'admin', NULL, '2014-11-25 10:17:52'),
(18, 'Azul', 'admin', 'admin', '2014-11-25 10:17:00', '2014-11-25 10:17:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color_translations`
--

CREATE TABLE IF NOT EXISTS `color_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_id` int(11) DEFAULT NULL,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lookup_unique_idx` (`locale`,`object_id`,`field`),
  KEY `IDX_CF7DEFD1232D562B` (`object_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `color_translations`
--

INSERT INTO `color_translations` (`id`, `object_id`, `locale`, `field`, `content`) VALUES
(1, 17, 'en', 'color', 'Yelow');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `Companycode` varchar(60) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `const_companyid` int(11) DEFAULT NULL,
  `website` varchar(300) DEFAULT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Company_const_company1_idx` (`const_companyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `company`
--

INSERT INTO `company` (`id`, `name`, `phone`, `address`, `Companycode`, `email`, `const_companyid`, `website`, `createdate`, `modifydate`, `createuser`, `modifyuser`) VALUES
(1, 'GreenBay', '2342323', 'COSTA DEL ESTE', 'ABCD1234', NULL, 1, NULL, '2014-10-13 10:18:44', '2014-10-13 10:18:44', 'admin', 'admin'),
(2, 'pacific hills', '23452', 'el dorado', 'dcba321', NULL, 1, NULL, '2014-10-13 10:18:44', '2014-10-13 10:18:44', 'admin', 'admin'),
(4, 'prueba', '22233', 'assas', '769e3b5659d033', NULL, 1, NULL, '2014-10-13 10:18:44', '2014-10-13 10:18:44', 'admin', 'admin'),
(8, 'Emp', '21122112', 'Obarrio', '888d5a5dbd1631', NULL, 1, NULL, '2014-10-13 19:05:52', '2014-10-13 19:09:35', 'admin', 'prueba'),
(11, 'test3445', '2323223', 'dssddd', '09cc5c03f13fc0', NULL, 1, NULL, '2014-10-14 20:50:50', '2014-10-14 20:55:17', 'admin', 'prueba'),
(12, 'saasas', '23232', 'sdsdds', '861ef3aec01116', NULL, 1, NULL, '2014-10-14 21:07:25', '2014-10-14 21:07:25', 'prueba', 'prueba'),
(13, 'qqqq', '232222', 'aaaa', 'ff6aca60b4c0ac', NULL, 1, NULL, '2014-10-14 21:09:24', '2014-10-14 21:09:24', 'prueba', 'prueba'),
(14, 'rrrr', '2222', 'rrrr', 'abd3f9b8724858', NULL, 1, NULL, '2014-10-14 14:22:49', '2014-10-14 14:22:49', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `const_company`
--

CREATE TABLE IF NOT EXISTS `const_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `const_company`
--

INSERT INTO `const_company` (`id`, `name`, `address`, `phone`, `email`, `createdate`, `modifydate`, `createuser`, `modifyuser`) VALUES
(1, 'Grupo Corcione', 'Costa el Este Avenida Principal, Green Plaza - Planta Baja', '2150012', 'ventas@grupocorcione.com', NULL, '2014-11-24 15:24:06', NULL, 'admin'),
(2, 'Bern', NULL, '3434345', NULL, '2014-11-24 15:25:14', '2014-11-24 15:33:42', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `day`
--

CREATE TABLE IF NOT EXISTS `day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `daycol` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `completename` varchar(45) DEFAULT NULL,
  `idnumber` varchar(45) DEFAULT NULL,
  `Companyid` int(11) DEFAULT NULL,
  `salaryamount` float(18,2) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employee_Company1_idx` (`Companyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `employee`
--

INSERT INTO `employee` (`id`, `completename`, `idnumber`, `Companyid`, `salaryamount`, `position`, `createdate`, `modifydate`, `createuser`, `modifyuser`) VALUES
(15, 'Juan Perez', '8-6526', 1, 400.00, 'Conserje', NULL, '2014-11-24 14:38:51', NULL, 'admin'),
(16, 'Pedro Perez', '1212', 1, 1212.00, 'assa', NULL, '2014-11-24 14:42:00', NULL, 'admin'),
(17, 'asasa', '232323', 1, 2323.00, 'sasdds', '2014-11-24 14:44:00', '2014-11-24 14:44:00', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee_schedule`
--

CREATE TABLE IF NOT EXISTS `employee_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `employeeid` int(11) DEFAULT NULL,
  `dayid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employee_schedule_employee1_idx` (`employeeid`),
  KEY `fk_employee_schedule_day1_idx` (`dayid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee_tower`
--

CREATE TABLE IF NOT EXISTS `employee_tower` (
  `employee_id` int(11) NOT NULL,
  `tower_id` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`,`tower_id`),
  KEY `fk_employee_tower_employee1_idx` (`employee_id`),
  KEY `fk_employee_tower_tower1_idx` (`tower_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `employee_tower`
--

INSERT INTO `employee_tower` (`employee_id`, `tower_id`) VALUES
(15, 2),
(16, 2),
(16, 3),
(17, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employee_vacation`
--

CREATE TABLE IF NOT EXISTS `employee_vacation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startdate` date DEFAULT NULL,
  `enddate` date DEFAULT NULL,
  `totaldays` int(11) DEFAULT NULL,
  `totaldaymissing` int(11) DEFAULT NULL,
  `employeeid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_employee_vacation_employee1_idx` (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expensedate` date DEFAULT NULL,
  `amount` float(18,2) DEFAULT NULL,
  `towerid` int(11) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `causeid` int(11) DEFAULT NULL,
  `accountid` int(11) NOT NULL,
  `paymentmethod` varchar(45) DEFAULT NULL,
  `providerid` int(11) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_expense_tower1_idx` (`towerid`),
  KEY `fk_expense_cause1_idx` (`causeid`),
  KEY `fk_expense_account1_idx` (`accountid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `expense`
--

INSERT INTO `expense` (`id`, `expensedate`, `amount`, `towerid`, `description`, `causeid`, `accountid`, `paymentmethod`, `providerid`, `createdate`, `modifydate`, `createuser`, `modifyuser`) VALUES
(1, '2014-05-17', 233200.00, 2, '566tttt', 2, 1, 'Cheque', 6, NULL, '2014-11-25 12:10:31', NULL, 'admin'),
(2, '2014-01-02', 343400.00, 1, 'fdfdf', 2, 1, 'Efectivo', 8, NULL, NULL, NULL, NULL),
(12, '2014-11-05', 2323.00, 2, '23233', 2, 1, 'Efectivo', 6, NULL, NULL, NULL, NULL),
(13, '2014-11-07', 34455.00, 2, 'sdsd', 2, 1, 'Efectivo', 6, '2014-11-25 12:11:44', '2014-11-25 12:11:44', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expenseinvoice`
--

CREATE TABLE IF NOT EXISTS `expenseinvoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `expenseid` int(11) DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_expense_invoice_expense1_idx` (`expenseid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `expenseinvoice`
--

INSERT INTO `expenseinvoice` (`id`, `description`, `name`, `path`, `expenseid`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(7, 'prueba23', 'prueba31', 'prueba.png', 2, NULL, NULL, NULL, NULL),
(8, 'saas', 'asas', 'asas.png', NULL, NULL, NULL, NULL, NULL),
(9, 'bank', 'bank', 'bank.png', NULL, NULL, NULL, NULL, NULL),
(10, 'test2', 'test2', 'test2.png', 2, NULL, NULL, NULL, NULL),
(11, 'asas', 'assa', 'assa.png', 2, NULL, NULL, NULL, NULL),
(13, 'Factura de Digicel de Septiembre', 'Facturadigicel2', 'Factura digicel.pdf', 2, NULL, NULL, NULL, NULL),
(15, 'alala', 'lala', 'lala.png', 2, NULL, NULL, NULL, NULL),
(16, 'saas', '4566', '1234.png', 12, 'admin', 'admin', '2014-11-25 12:07:10', '2014-11-25 12:08:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_log_entries`
--

CREATE TABLE IF NOT EXISTS `ext_log_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `logged_at` datetime NOT NULL,
  `object_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` int(11) NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci COMMENT '(DC2Type:array)',
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `log_class_lookup_idx` (`object_class`),
  KEY `log_date_lookup_idx` (`logged_at`),
  KEY `log_user_lookup_idx` (`username`),
  KEY `log_version_lookup_idx` (`object_id`,`object_class`,`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext_translations`
--

CREATE TABLE IF NOT EXISTS `ext_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `object_class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `field` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `foreign_key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `lookup_unique_idx` (`locale`,`object_class`,`field`,`foreign_key`),
  KEY `translations_lookup_idx` (`locale`,`object_class`,`foreign_key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ext_translations`
--

INSERT INTO `ext_translations` (`id`, `locale`, `object_class`, `field`, `foreign_key`, `content`) VALUES
(1, 'en', 'Apartamentos\\ApartamentosBundle\\Entity\\Color', 'color', '10', 'Orange2'),
(2, 'en', 'Apartamentos\\ApartamentosBundle\\Entity\\Color', 'color', '12', 'Red'),
(3, 'en', 'Apartamentos\\ApartamentosBundle\\Entity\\Color', 'color', '14', 'Green'),
(4, 'en', 'Apartamentos\\ApartamentosBundle\\Entity\\Color', 'color', '15', 'Gray');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `incomedate` date DEFAULT NULL,
  `amount` float(18,2) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `towerid` int(11) DEFAULT NULL,
  `causeid` int(11) DEFAULT NULL,
  `accountid` int(11) NOT NULL,
  `paymentmethod` varchar(45) DEFAULT NULL,
  `depositor` varchar(45) DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_income_tower1_idx` (`towerid`),
  KEY `fk_income_cause1_idx` (`causeid`),
  KEY `fk_income_account1_idx` (`accountid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `income`
--

INSERT INTO `income` (`id`, `incomedate`, `amount`, `description`, `towerid`, `causeid`, `accountid`, `paymentmethod`, `depositor`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(2, '2014-10-01', 600.00, 'prueba45', 2, 3, 1, 'Efectivo', 'asas', NULL, 'admin', NULL, '2014-11-25 13:47:37'),
(4, '2014-10-01', 0.00, 'prueba', 2, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(10, '2014-10-02', 688.99, 'test', 2, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(11, '2014-10-02', 699.89, 'pruebatest', 2, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(13, '2014-10-07', 678.99, 'pruebadesc2', 1, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '2014-11-10', 33.00, 'sdds', 3, 3, 1, 'Efectivo', 'sd', NULL, NULL, NULL, NULL),
(15, '2014-11-06', 2333.00, 'ddd', 2, 3, 1, 'Efectivo', 'sdds', 'admin', 'admin', '2014-11-25 13:48:03', '2014-11-25 13:48:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `income_invoice`
--

CREATE TABLE IF NOT EXISTS `income_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  `incomeid` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_income_invoice_income1_idx` (`incomeid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lexik_translation_file`
--

CREATE TABLE IF NOT EXISTS `lexik_translation_file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `extention` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hash_idx` (`hash`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `lexik_translation_file`
--

INSERT INTO `lexik_translation_file` (`id`, `domain`, `locale`, `extention`, `path`, `hash`) VALUES
(1, 'messages', 'en', 'yml', '../src/Apartamentos/ApartamentosBundle/Resources/translations', '741982d306c2db52c1e8053a946a878c'),
(2, 'messages', 'es', 'yml', '../src/Apartamentos/ApartamentosBundle/Resources/translations', 'c2ec8aae6cbf616c3f4115f81c66c9a5'),
(3, 'validators', 'en', 'yml', '../src/Apartamentos/ApartamentosBundle/Resources/translations', '8eb18aa52137add59fb37a545ad98981'),
(4, 'messages', 'en', 'yml', 'Resources/translations', 'fc74f6a74137e00463e84910ddb3e44e'),
(5, 'messages', 'es', 'yml', 'Resources/translations', 'd50c2026170e82881f4e8b6f87b63800'),
(6, 'validators', 'en', 'yml', 'Resources/translations', 'e2d4ac91c2f28e7339b317adc186d1e7'),
(7, 'validators', 'es', 'yml', 'Resources/translations', 'd3175f1a2739aed80701e38542ec962d'),
(8, 'messages', 'es', 'yml', '../app\\../src/Apartamentos/ApartamentosBundle/Resources/translations', '460eb0dbdd61c2b7cea83bf8b781a162');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lexik_trans_unit`
--

CREATE TABLE IF NOT EXISTS `lexik_trans_unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key_domain_idx` (`key_name`,`domain`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=576 ;

--
-- Volcado de datos para la tabla `lexik_trans_unit`
--

INSERT INTO `lexik_trans_unit` (`id`, `key_name`, `domain`, `created_at`, `updated_at`) VALUES
(1, 'Estacionamientos', 'messages', '2014-05-16 17:13:32', '2014-11-27 10:42:50'),
(2, 'Nuevo Estacionamiento', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(3, 'Debe seleccionar una localización', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(4, 'Número de estacionamiento', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(5, 'Colores', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(6, 'Nuevo Color', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(7, 'Editar Color', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(8, 'número', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(9, 'Buscar', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(10, 'Usuario', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(11, 'Usuarios', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(12, 'Guardar', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(13, 'Actualizar', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(14, 'Debe Ingresar un Color', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(15, 'Salir', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(16, 'Pagina', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(17, 'Azul', 'messages', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(18, 'Debe seleccionar un tipo de estacionamiento', 'validators', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(19, 'Debe Ingresar una localización', 'validators', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(20, 'Torres', 'messages', '2014-05-16 18:18:41', '2014-05-16 18:18:41'),
(21, 'translations.grid_caption', 'messages', '2014-05-16 18:20:16', '2014-05-16 18:20:16'),
(22, 'Key', 'messages', '2014-05-19 18:31:45', '2014-05-19 18:31:45'),
(23, 'Domain', 'messages', '2014-05-19 18:33:02', '2014-05-19 18:33:02'),
(24, 'en Content', 'messages', '2014-05-19 18:36:06', '2014-05-19 18:36:06'),
(25, 'Content', 'messages', '2014-05-19 18:38:19', '2014-05-19 18:38:19'),
(26, 'Roles', 'messages', '2014-05-19 20:25:33', '2014-05-19 20:25:33'),
(27, 'Condominio', 'messages', '2014-05-19 20:30:18', '2014-05-19 20:30:18'),
(28, 'Residentes', 'messages', '2014-05-19 20:30:39', '2014-05-19 20:30:39'),
(29, 'Apartamentos', 'messages', '2014-05-19 20:31:27', '2014-05-19 20:31:27'),
(30, 'Empeados', 'messages', '2014-05-19 20:33:27', '2014-05-19 20:33:27'),
(31, 'Proveedores', 'messages', '2014-05-19 20:34:11', '2014-05-19 20:34:11'),
(32, 'Tipo de Residentes', 'messages', '2014-05-19 20:35:19', '2014-05-19 20:35:19'),
(33, 'Marcas', 'messages', '2014-05-19 20:36:30', '2014-05-19 20:36:30'),
(34, 'Autos', 'messages', '2014-05-19 20:37:05', '2014-05-19 20:37:05'),
(35, 'Localización', 'messages', '2014-05-19 20:38:23', '2014-05-19 20:38:23'),
(36, 'Manejo de Presupuesto', 'messages', '2014-05-19 20:39:37', '2014-05-19 20:39:37'),
(37, 'Causa', 'messages', '2014-05-19 20:44:23', '2014-05-19 20:44:23'),
(38, 'Gastos', 'messages', '2014-05-19 20:44:52', '2014-05-19 20:44:52'),
(39, 'Traducciones', 'messages', '2014-05-19 20:45:26', '2014-05-19 20:45:26'),
(40, 'Etiquetas', 'messages', '2014-05-19 20:45:59', '2014-05-19 20:45:59'),
(41, 'username', 'messages', '2014-05-19 21:08:31', '2014-05-19 21:08:31'),
(42, 'User Name', 'messages', '2014-05-19 21:10:21', '2014-05-19 21:10:21'),
(43, 'Password', 'messages', '2014-05-19 21:12:11', '2014-05-19 21:12:11'),
(44, 'Nuevo Usuario', 'messages', '2014-05-19 21:18:24', '2014-05-19 21:18:24'),
(45, 'username.validate', 'messages', '2014-05-19 21:36:00', '2014-05-19 21:36:00'),
(46, 'password.validate', 'messages', '2014-05-19 21:38:19', '2014-05-19 21:38:19'),
(47, 'lenghtpassword', 'messages', '2014-05-19 21:40:15', '2014-05-19 21:40:15'),
(48, 'Editar Usuarios', 'messages', '2014-05-19 21:46:00', '2014-05-19 21:46:00'),
(49, 'Detalles del Usuario', 'messages', '2014-05-19 21:54:35', '2014-05-19 21:54:35'),
(50, 'Lista de Usuarios', 'messages', '2014-05-19 21:55:19', '2014-05-19 21:55:19'),
(51, 'Eliminar Usuario', 'messages', '2014-05-19 21:55:42', '2014-05-19 21:55:42'),
(52, 'userdelete.question', 'messages', '2014-05-19 21:57:25', '2014-05-19 21:57:25'),
(53, 'user.id.show', 'messages', '2014-05-19 22:03:43', '2014-05-19 22:03:43'),
(54, 'user.username.show', 'messages', '2014-05-19 22:04:02', '2014-05-19 22:04:02'),
(55, 'user.password.show', 'messages', '2014-05-19 22:04:24', '2014-05-19 22:04:24'),
(56, 'user.salt.show', 'messages', '2014-05-19 22:04:44', '2014-05-19 22:04:44'),
(57, 'user.roles.show', 'messages', '2014-05-19 22:05:15', '2014-05-19 22:05:15'),
(58, 'Rol', 'messages', '2014-05-19 22:10:34', '2014-05-19 22:10:34'),
(59, 'Nuevo Rol', 'messages', '2014-05-19 22:19:10', '2014-05-19 22:19:10'),
(60, 'validate.username', 'validators', '2014-05-19 22:49:09', '2014-05-19 22:49:09'),
(61, 'validate.password', 'validators', '2014-05-19 22:49:45', '2014-05-19 22:49:45'),
(62, 'validate.lenghtpassword', 'validators', '2014-05-19 22:52:36', '2014-05-19 22:52:36'),
(63, 'validate.selectrole', 'validators', '2014-05-19 22:53:21', '2014-05-19 22:53:21'),
(64, 'validate.existusername', 'validators', '2014-05-20 16:24:46', '2014-05-20 16:24:46'),
(65, 'validate.role', 'validators', '2014-05-20 16:32:13', '2014-05-20 16:32:13'),
(66, 'validate.existrole', 'validators', '2014-05-20 16:33:12', '2014-05-20 16:33:12'),
(67, 'role.validate', 'messages', '2014-05-20 17:46:46', '2014-05-20 17:46:46'),
(68, 'Editar Roles', 'messages', '2014-05-20 17:49:09', '2014-05-20 17:49:09'),
(69, 'Aceptar', 'messages', '2014-05-20 17:58:34', '2014-05-20 17:58:34'),
(70, 'Cancelar', 'messages', '2014-05-20 17:58:51', '2014-05-20 17:58:51'),
(71, 'delete.rol.question', 'messages', '2014-05-20 18:00:01', '2014-05-20 18:00:01'),
(72, 'Detalle de Roles', 'messages', '2014-05-20 18:02:42', '2014-05-20 18:02:42'),
(73, 'Eliminar Rol', 'messages', '2014-05-20 18:03:04', '2014-05-20 18:03:04'),
(74, 'Lista de Roles', 'messages', '2014-05-20 18:06:08', '2014-05-20 18:06:08'),
(75, 'nombre', 'messages', '2014-05-21 18:10:27', '2014-05-21 18:10:27'),
(76, 'teléfono', 'messages', '2014-05-21 18:10:52', '2014-05-21 18:10:52'),
(77, 'Constructoras', 'messages', '2014-05-21 18:14:44', '2014-05-21 18:14:44'),
(78, 'constcompany.title', 'messages', '2014-05-21 18:25:48', '2014-05-21 18:25:48'),
(79, 'dirección', 'messages', '2014-05-21 18:45:28', '2014-05-21 18:45:28'),
(80, 'name.constcompany.validate', 'validators', '2014-05-21 21:32:49', '2014-05-21 21:32:49'),
(81, 'constcompany.vaidate.name', 'messages', '2014-05-21 21:33:22', '2014-05-21 21:33:22'),
(82, 'phone.constcompany.validate', 'validators', '2014-05-21 21:35:42', '2014-05-21 21:35:42'),
(83, 'name.constcompany.exist', 'validators', '2014-05-21 21:37:06', '2014-05-21 21:37:06'),
(84, 'constcompany.required.phone', 'messages', '2014-05-21 21:38:52', '2014-05-21 21:38:52'),
(85, 'constcompany.digits.phone', 'messages', '2014-05-21 21:39:23', '2014-05-21 21:39:23'),
(86, 'Editar constructora', 'messages', '2014-05-21 21:53:14', '2014-05-21 21:53:14'),
(87, 'Detalles de la constructora', 'messages', '2014-05-21 22:31:29', '2014-05-21 22:31:29'),
(88, 'Eliminar constructora', 'messages', '2014-05-21 22:32:08', '2014-05-21 22:32:08'),
(89, 'delete.constcompany.question', 'messages', '2014-05-21 22:35:50', '2014-05-21 22:35:50'),
(90, 'código', 'messages', '2014-05-21 23:20:53', '2014-05-21 23:20:53'),
(91, 'Página web', 'messages', '2014-05-21 23:27:48', '2014-05-21 23:27:48'),
(92, 'Constructora', 'messages', '2014-05-21 23:28:57', '2014-05-21 23:28:57'),
(93, 'company.validate.name', 'messages', '2014-05-22 22:34:24', '2014-05-22 22:34:24'),
(94, 'company.required.phone', 'messages', '2014-05-22 22:35:18', '2014-05-22 22:35:18'),
(95, 'company.digits.phone', 'messages', '2014-05-22 22:36:14', '2014-05-22 22:36:14'),
(96, 'constcompany.validate.address', 'messages', '2014-05-22 22:37:34', '2014-05-22 22:37:34'),
(97, 'company.validate.companycode', 'messages', '2014-05-22 22:38:11', '2014-05-22 22:38:11'),
(98, 'name.company.validate', 'validators', '2014-05-22 22:49:59', '2014-05-22 22:49:59'),
(99, 'phone.company.validate', 'validators', '2014-05-22 22:51:32', '2014-05-22 22:51:32'),
(100, 'companycode.company.validate', 'validators', '2014-05-22 22:52:00', '2014-05-22 22:52:00'),
(101, 'name.company.exist', 'validators', '2014-05-22 22:53:28', '2014-05-22 22:53:28'),
(102, 'email.validate', 'messages', '2014-05-22 23:06:41', '2014-05-22 23:06:41'),
(103, 'Nuevo Condominio', 'messages', '2014-05-22 23:26:07', '2014-05-22 23:26:07'),
(104, 'Editar Condominio', 'messages', '2014-05-22 23:26:22', '2014-05-22 23:26:22'),
(105, 'Condominios', 'messages', '2014-05-22 23:26:50', '2014-05-22 23:26:50'),
(106, 'Eliminar condominio', 'messages', '2014-05-22 23:27:17', '2014-05-22 23:27:17'),
(107, 'delete.company.question', 'messages', '2014-05-22 23:28:12', '2014-05-22 23:28:12'),
(108, 'Detalles del condominio', 'messages', '2014-05-22 23:28:52', '2014-05-22 23:28:52'),
(109, 'Seleccione un condominio', 'messages', '2014-05-23 16:08:06', '2014-05-23 16:08:06'),
(110, 'Nueva Torre', 'messages', '2014-05-23 16:30:51', '2014-05-23 16:30:51'),
(111, 'Número de apartamentos', 'messages', '2014-05-23 16:33:43', '2014-05-23 16:33:43'),
(112, 'Número de depósitos', 'messages', '2014-05-23 17:43:29', '2014-05-23 17:43:29'),
(113, 'Número de estacionamientos', 'messages', '2014-05-23 17:43:51', '2014-05-23 17:43:51'),
(114, 'Cantidad de apartamentos por piso', 'messages', '2014-05-23 17:44:18', '2014-05-23 17:44:18'),
(115, 'validate.tower.name', 'validators', '2014-05-23 21:16:06', '2014-05-23 21:16:06'),
(116, 'validate.tower.email', 'validators', '2014-05-23 21:21:17', '2014-05-23 21:21:17'),
(117, 'validate.tower.numberapartments', 'validators', '2014-05-23 21:22:38', '2014-05-23 21:22:38'),
(118, 'validate.tower.numberstorerooms', 'validators', '2014-05-23 21:25:00', '2014-05-23 21:25:00'),
(119, 'validate.tower.numberparkings', 'validators', '2014-05-23 21:25:44', '2014-05-23 21:25:44'),
(120, 'validate.tower.numberaptperfloor', 'validators', '2014-05-23 21:26:14', '2014-05-23 21:26:14'),
(121, 'validate.tower.exist.name', 'validators', '2014-05-23 21:26:45', '2014-05-23 21:26:45'),
(122, 'validate.tower.exist.email', 'validators', '2014-05-23 21:27:18', '2014-05-23 21:27:18'),
(123, 'validate.tower.companyid', 'validators', '2014-05-23 21:33:34', '2014-05-23 21:33:34'),
(124, 'tower.validate.companyid', 'messages', '2014-05-23 21:54:19', '2014-05-23 21:54:19'),
(125, 'tower.validate.name', 'messages', '2014-05-23 21:55:10', '2014-05-23 21:55:10'),
(126, 'tower.validate.email', 'messages', '2014-05-23 21:57:06', '2014-05-23 21:57:06'),
(127, 'tower.validate.numberapartments', 'messages', '2014-05-23 21:57:40', '2014-05-23 21:57:40'),
(128, 'tower.validate.numberstorerooms', 'messages', '2014-05-23 21:58:03', '2014-05-23 21:58:03'),
(129, 'tower.validate.numberparkings', 'messages', '2014-05-23 21:58:30', '2014-05-23 21:58:30'),
(130, 'tower.validate.numberaptperfloor', 'messages', '2014-05-23 21:58:57', '2014-05-23 21:58:57'),
(131, 'Editar Torre', 'messages', '2014-05-23 22:03:16', '2014-05-23 22:03:16'),
(132, 'Lista de torres', 'messages', '2014-05-23 22:15:24', '2014-05-23 22:15:24'),
(133, 'Eliminar torre', 'messages', '2014-05-23 22:15:46', '2014-05-23 22:15:46'),
(134, 'Detalles', 'messages', '2014-05-23 22:26:25', '2014-05-23 22:26:25'),
(135, 'Empleados', 'messages', '2014-05-23 22:27:52', '2014-05-23 22:27:52'),
(136, 'delete.tower.question', 'messages', '2014-05-23 22:30:10', '2014-05-23 22:30:10'),
(137, 'validate.companyid', 'validators', '2014-05-26 18:07:51', '2014-05-26 18:07:51'),
(138, 'companyid.validate', 'messages', '2014-05-26 18:12:42', '2014-05-26 18:12:42'),
(139, 'validate.apartment.towerid', 'validators', '2014-05-29 16:00:54', '2014-05-29 16:00:54'),
(140, 'validate.apartment.phone', 'validators', '2014-05-29 16:01:28', '2014-05-29 16:01:28'),
(141, 'validate.apartment.numberresidents', 'validators', '2014-05-29 16:01:53', '2014-05-29 16:01:53'),
(142, 'validate.apartment.floornumber', 'validators', '2014-05-29 16:02:27', '2014-05-29 16:02:27'),
(143, 'apartment.number.validate', 'validators', '2014-05-29 16:02:57', '2014-05-29 16:02:57'),
(144, 'apartment.phone.required', 'messages', '2014-05-29 16:03:55', '2014-05-29 16:03:55'),
(145, 'apartment.phone.digits', 'messages', '2014-05-29 16:05:28', '2014-05-29 16:05:28'),
(146, 'apartment.number.required', 'messages', '2014-05-29 16:06:14', '2014-05-29 16:06:14'),
(147, 'validate.apartment.name', 'validators', '2014-05-29 16:06:36', '2014-05-29 16:06:36'),
(148, 'apartment.numberresidents.required', 'messages', '2014-05-29 16:07:13', '2014-05-29 16:07:13'),
(149, 'apartment.floornumber.required', 'messages', '2014-05-29 16:07:43', '2014-05-29 16:07:43'),
(150, 'apartment.floornumber.digits', 'messages', '2014-05-29 16:08:13', '2014-05-29 16:08:13'),
(151, 'apartment.petkind.required', 'messages', '2014-05-29 16:08:48', '2014-05-29 16:08:48'),
(152, 'apartment.petnumber.required', 'messages', '2014-05-29 16:09:20', '2014-05-29 16:09:20'),
(153, 'apartment.petnumber.digits', 'messages', '2014-05-29 16:10:00', '2014-05-29 16:10:00'),
(154, 'apartment.numberofkids.required', 'messages', '2014-05-29 16:10:31', '2014-05-29 16:10:31'),
(155, 'apartment.numberofkids.digits', 'messages', '2014-05-29 16:11:16', '2014-05-29 16:11:16'),
(156, 'apartment.companyid.required', 'messages', '2014-05-29 16:11:51', '2014-11-27 11:08:15'),
(157, 'aparment.towerid.required', 'messages', '2014-05-29 16:12:21', '2014-05-29 16:12:21'),
(158, 'Nuevo Apartamento', 'messages', '2014-05-29 16:28:46', '2014-05-29 16:28:46'),
(159, 'Torre', 'messages', '2014-05-29 16:29:06', '2014-05-29 16:29:06'),
(160, 'Número de apartamento', 'messages', '2014-05-29 16:29:29', '2014-05-29 16:29:29'),
(161, 'Numero de teléfono', 'messages', '2014-05-29 16:30:02', '2014-05-29 16:30:02'),
(162, 'Cantidad de residentes', 'messages', '2014-05-29 16:30:54', '2014-05-29 16:30:54'),
(163, 'Número de piso', 'messages', '2014-05-29 16:31:27', '2014-05-29 16:31:27'),
(164, 'Area', 'messages', '2014-05-29 16:33:24', '2014-05-29 16:33:24'),
(165, 'Cantidad de habitaciones', 'messages', '2014-05-29 16:34:18', '2014-05-29 16:34:18'),
(166, '¿Tiene empleada?', 'messages', '2014-05-29 16:35:34', '2014-05-29 16:35:34'),
(167, '¿Tiene niñera?', 'messages', '2014-05-29 16:37:07', '2014-05-29 16:37:07'),
(168, 'Tipo de mascota', 'messages', '2014-05-29 16:37:42', '2014-05-29 16:37:42'),
(169, 'Cantidad de mascotas', 'messages', '2014-05-29 16:38:04', '2014-05-29 16:38:04'),
(170, '¿Tiene mascotas?', 'messages', '2014-05-29 16:39:52', '2014-05-29 16:39:52'),
(171, '¿Tiene cuarto de empleada?', 'messages', '2014-05-29 16:40:41', '2014-05-29 16:40:41'),
(172, '¿Hay niños viviendo ahi?', 'messages', '2014-05-29 16:41:22', '2014-05-29 16:41:22'),
(173, 'Cantida de niños', 'messages', '2014-05-29 16:42:12', '2014-05-29 16:42:12'),
(174, 'SI', 'messages', '2014-05-29 16:47:10', '2014-05-29 16:47:10'),
(175, 'Seleccione una torre', 'messages', '2014-05-29 16:48:19', '2014-05-29 16:48:19'),
(176, 'Editar Apartamento', 'messages', '2014-05-29 18:38:49', '2014-05-29 18:38:49'),
(177, 'cédula', 'messages', '2014-05-29 19:26:14', '2014-05-29 19:26:14'),
(178, 'cargo', 'messages', '2014-05-29 19:26:56', '2014-05-29 19:26:56'),
(179, 'Detalles del Apartamento', 'messages', '2014-05-29 19:44:21', '2014-05-29 19:44:21'),
(180, 'Lista de Apartamentos', 'messages', '2014-05-29 19:44:47', '2014-05-29 19:44:47'),
(181, 'Eliminar Apartamento', 'messages', '2014-05-29 19:45:14', '2014-05-29 19:45:14'),
(182, 'delete.apartment.question', 'messages', '2014-05-29 19:46:57', '2014-05-29 19:46:57'),
(183, 'Num Identificación', 'messages', '2014-05-29 19:50:15', '2014-05-29 19:50:15'),
(184, 'employee.validate.companyid', 'messages', '2014-06-02 18:13:03', '2014-06-02 18:13:03'),
(185, 'Salario', 'messages', '2014-06-02 21:19:09', '2014-06-02 21:19:09'),
(186, 'Puesto', 'messages', '2014-06-02 21:21:59', '2014-06-02 21:21:59'),
(187, 'Torres en las que trabaja', 'messages', '2014-06-02 21:24:08', '2014-06-02 21:24:08'),
(188, 'employee.required.completename', 'messages', '2014-06-02 21:27:38', '2014-06-02 21:27:38'),
(189, 'employee.required.idnumber', 'messages', '2014-06-02 21:28:07', '2014-06-02 21:28:07'),
(190, 'employee.required.salaryamount', 'messages', '2014-06-02 21:29:02', '2014-06-02 21:29:02'),
(191, 'employee.number.salaryamount', 'messages', '2014-06-02 21:29:32', '2014-06-02 21:29:32'),
(192, 'employee.required.position', 'messages', '2014-06-02 21:29:59', '2014-06-02 21:29:59'),
(193, 'Nuevo Empleado', 'messages', '2014-06-02 21:33:56', '2014-06-02 21:33:56'),
(194, 'Editar Empleado', 'messages', '2014-06-02 22:40:39', '2014-06-02 22:40:39'),
(195, 'Detalles del Empleado', 'messages', '2014-06-02 22:48:57', '2014-06-02 22:48:57'),
(196, 'employee.delete.question', 'messages', '2014-06-02 22:50:01', '2014-06-02 22:50:01'),
(197, 'Eliminar empleado', 'messages', '2014-06-02 22:50:19', '2014-06-02 22:50:19'),
(198, 'validate.employee.companyid', 'validators', '2014-06-02 23:37:47', '2014-06-02 23:37:47'),
(199, 'validate.employee.completename', 'validators', '2014-06-02 23:38:49', '2014-06-02 23:38:49'),
(200, 'validate.employee.idnumber', 'validators', '2014-06-02 23:39:22', '2014-06-02 23:39:22'),
(201, 'validate.employee.tower', 'validators', '2014-06-02 23:40:06', '2014-06-02 23:40:06'),
(202, 'Nuevo Proveedor', 'messages', '2014-06-04 17:11:05', '2014-06-04 17:11:05'),
(203, 'validate.provider.companyid', 'validators', '2014-06-04 17:39:01', '2014-06-04 17:39:01'),
(204, 'validate.provider.name', 'validators', '2014-06-04 17:41:46', '2014-06-04 17:41:46'),
(205, 'validate.provider.email', 'validators', '2014-06-04 17:43:22', '2014-06-04 17:43:22'),
(206, 'validate.provider.phone', 'validators', '2014-06-04 17:43:46', '2014-06-04 17:43:46'),
(207, 'provider.required.companyid', 'messages', '2014-06-04 22:22:50', '2014-06-04 22:22:50'),
(208, 'provider.required.name', 'messages', '2014-06-04 22:24:20', '2014-06-04 22:24:20'),
(209, 'provider.email', 'messages', '2014-06-04 22:25:22', '2014-06-04 22:25:22'),
(210, 'provider.required.phone', 'messages', '2014-06-04 22:26:13', '2014-06-04 22:26:13'),
(211, 'provider.number.phone', 'messages', '2014-06-04 22:26:52', '2014-06-04 22:26:52'),
(212, 'Editar Proveedor', 'messages', '2014-06-04 22:33:44', '2014-06-04 22:33:44'),
(213, 'Detalles del proveedor', 'messages', '2014-06-04 23:36:04', '2014-06-04 23:36:04'),
(214, 'Lista de proveedores', 'messages', '2014-06-04 23:37:16', '2014-06-04 23:37:16'),
(215, 'Eliminar proveedor', 'messages', '2014-06-04 23:37:35', '2014-06-04 23:37:35'),
(216, 'provider.delete.question', 'messages', '2014-06-04 23:39:05', '2014-06-04 23:39:05'),
(217, 'Nueva constructora', 'messages', '2014-06-04 23:48:54', '2014-06-04 23:48:54'),
(218, 'companyid.constcompany.validate', 'validators', '2014-06-05 16:34:47', '2014-06-05 16:34:47'),
(219, 'Tipo de residente', 'messages', '2014-06-05 16:44:48', '2014-06-05 16:44:48'),
(220, 'Nuevo tipo de residente', 'messages', '2014-06-05 16:47:49', '2014-06-05 16:47:49'),
(221, 'residenttype.required.type', 'messages', '2014-06-05 16:51:27', '2014-06-05 16:51:27'),
(222, 'validate.residentype.type', 'validators', '2014-06-05 16:53:36', '2014-06-05 16:53:36'),
(223, 'Editar tipo de residente', 'messages', '2014-06-05 16:59:11', '2014-06-05 16:59:11'),
(224, 'Detalles del tipo de residente', 'messages', '2014-06-05 17:13:10', '2014-06-05 17:13:10'),
(225, 'Tipos de residente', 'messages', '2014-06-05 17:13:38', '2014-06-05 17:13:38'),
(226, 'Eliminar tipo de residente', 'messages', '2014-06-05 17:14:16', '2014-06-05 17:14:16'),
(227, 'residenttype.delete.question', 'messages', '2014-06-05 17:15:12', '2014-06-05 17:15:12'),
(228, 'validate.apartment.exist.number', 'validators', '2014-06-05 17:23:48', '2014-06-05 17:23:48'),
(229, 'validate.employee.exist.idnumber', 'validators', '2014-06-05 17:25:17', '2014-06-05 17:25:17'),
(230, 'validate.provider.exist.name', 'validators', '2014-06-05 17:26:30', '2014-06-05 17:26:30'),
(231, 'validate.residentype.exist.type', 'validators', '2014-06-05 17:29:32', '2014-06-05 17:29:32'),
(232, 'resident.required.companyid', 'messages', '2014-06-09 19:05:56', '2014-06-09 19:05:56'),
(233, 'resident.required.name', 'messages', '2014-06-09 19:06:28', '2014-06-09 19:06:28'),
(234, 'resident.required.idnumber', 'messages', '2014-06-09 19:06:56', '2014-06-09 19:06:56'),
(235, 'resident.required.idnumbertype', 'messages', '2014-06-09 19:08:04', '2014-06-09 19:08:04'),
(236, 'resident.required.apartmentid', 'messages', '2014-06-09 19:08:35', '2014-06-09 19:08:35'),
(237, 'resident.required.towerid', 'messages', '2014-06-09 19:08:58', '2014-06-09 19:08:58'),
(238, 'resident.required.residenttypeid', 'messages', '2014-06-09 19:09:36', '2014-06-09 19:09:36'),
(239, 'Nuevo Residente', 'messages', '2014-06-09 19:13:00', '2014-06-09 19:13:00'),
(240, 'Número de identificación', 'messages', '2014-06-09 19:13:18', '2014-06-09 19:13:18'),
(241, 'Tipo de identificación', 'messages', '2014-06-09 19:13:33', '2014-06-09 19:13:33'),
(242, '¿Es titular?', 'messages', '2014-06-09 19:14:48', '2014-06-09 19:14:48'),
(243, 'Apartamento', 'messages', '2014-06-09 19:23:25', '2014-06-09 19:23:25'),
(244, 'Seleccione un apartamento', 'messages', '2014-06-09 19:32:06', '2014-06-09 19:32:06'),
(245, 'Seleccione un tipo de identificación', 'messages', '2014-06-09 19:32:32', '2014-06-09 19:32:32'),
(246, 'Seleccione un tipo de residente', 'messages', '2014-06-09 19:32:55', '2014-06-09 19:32:55'),
(247, 'Pasaporte', 'messages', '2014-06-09 19:46:36', '2014-06-09 19:46:36'),
(248, 'Otros', 'messages', '2014-06-09 19:46:55', '2014-06-09 19:46:55'),
(249, 'Editar Residente', 'messages', '2014-06-09 19:49:48', '2014-06-09 19:49:48'),
(250, 'Detalles del residente', 'messages', '2014-06-09 19:54:25', '2014-06-09 19:54:25'),
(251, 'Lista de residentes', 'messages', '2014-06-09 19:54:40', '2014-06-09 19:54:40'),
(252, 'Eliminar residente', 'messages', '2014-06-09 19:55:37', '2014-06-09 19:55:37'),
(253, 'resident.delete.question', 'messages', '2014-06-09 19:56:49', '2014-06-09 19:56:49'),
(254, 'color.required.color', 'messages', '2014-06-09 20:59:13', '2014-06-09 20:59:13'),
(255, 'Eliminar color', 'messages', '2014-06-09 21:12:53', '2014-06-09 21:12:53'),
(256, 'color.delete.question', 'messages', '2014-06-09 21:13:30', '2014-06-09 21:13:30'),
(257, 'Marca', 'messages', '2014-06-11 16:31:10', '2014-06-11 16:31:10'),
(258, 'brand.required.brand', 'messages', '2014-06-11 16:33:51', '2014-06-11 16:33:51'),
(259, 'validate.brand.brand', 'validators', '2014-06-11 16:39:40', '2014-06-11 16:39:40'),
(260, 'Editar Marca', 'messages', '2014-06-11 16:44:17', '2014-06-11 16:44:17'),
(261, 'validate.brand.exist', 'validators', '2014-06-11 16:46:54', '2014-06-11 16:46:54'),
(262, 'Eliminar marca', 'messages', '2014-06-11 16:53:25', '2014-06-11 16:53:25'),
(263, 'brand.delete.question', 'messages', '2014-06-11 16:54:35', '2014-06-11 16:54:35'),
(264, 'Nueva Marca', 'messages', '2014-06-11 16:56:27', '2014-06-11 16:56:27'),
(265, 'Detalles la Marca', 'messages', '2014-06-11 16:56:45', '2014-06-11 16:56:45'),
(266, 'resident.name.exist', 'validators', '2014-06-11 17:05:27', '2014-06-11 17:05:27'),
(267, 'validate.resident.name', 'validators', '2014-06-11 17:07:15', '2014-06-11 17:07:15'),
(268, 'validate.resident.idnumbertype', 'validators', '2014-06-11 17:08:13', '2014-06-11 17:08:13'),
(269, 'validate.resident.idnumber', 'validators', '2014-06-11 17:12:11', '2014-06-11 17:12:11'),
(270, 'validate.resident.apartmentid', 'validators', '2014-06-11 17:12:47', '2014-06-11 17:12:47'),
(271, 'Placa', 'messages', '2014-06-11 17:26:56', '2014-06-11 17:26:56'),
(272, 'Estacionamiento', 'messages', '2014-06-11 17:27:20', '2014-06-11 17:27:20'),
(273, 'validate.car.companyid', 'validators', '2014-06-11 18:50:15', '2014-06-11 18:50:15'),
(274, 'validate.car.towerid', 'validators', '2014-06-11 18:50:47', '2014-06-11 18:50:47'),
(275, 'validate.car.apartmentid', 'validators', '2014-06-11 18:51:19', '2014-06-11 18:51:19'),
(276, 'validate.car.residentid', 'validators', '2014-06-11 18:52:19', '2014-06-11 18:52:19'),
(277, 'validate.car.platenumber', 'validators', '2014-06-11 18:53:56', '2014-06-11 18:53:56'),
(278, 'validate.car.brandid', 'validators', '2014-06-11 18:54:26', '2014-06-11 18:54:26'),
(279, 'validate.car.colorid', 'validators', '2014-06-11 18:55:09', '2014-06-11 18:55:09'),
(280, 'car.platenumber.exist', 'validators', '2014-06-11 18:57:02', '2014-06-11 18:57:02'),
(281, 'validate.color.color', 'validators', '2014-06-11 20:11:06', '2014-06-11 20:11:06'),
(282, 'validate.color.exist', 'validators', '2014-06-11 20:12:26', '2014-06-11 20:12:26'),
(283, 'car.required.companyid', 'messages', '2014-06-11 20:35:52', '2014-06-11 20:35:52'),
(284, 'car.required.towerid', 'messages', '2014-06-11 20:37:58', '2014-06-11 20:37:58'),
(285, 'car.required.apartmentid', 'messages', '2014-06-11 20:38:37', '2014-06-11 20:38:37'),
(286, 'car.required.residentid', 'messages', '2014-06-11 20:39:18', '2014-06-11 20:39:18'),
(287, 'car.required.platenumber', 'messages', '2014-06-11 20:40:10', '2014-06-11 20:40:10'),
(288, 'car.required.brand', 'messages', '2014-06-11 20:40:41', '2014-06-11 20:40:41'),
(289, 'car.required.color', 'messages', '2014-06-11 20:41:07', '2014-06-11 20:41:07'),
(290, 'Número de Placa', 'messages', '2014-06-11 21:13:08', '2014-06-11 21:13:08'),
(291, 'Propietario', 'messages', '2014-06-11 21:13:36', '2014-06-11 21:13:36'),
(292, 'Nuevo Auto', 'messages', '2014-06-11 21:14:45', '2014-06-11 21:14:45'),
(293, 'Tipo', 'messages', '2014-06-12 21:35:06', '2014-06-12 21:35:06'),
(294, 'Vehículos', 'messages', '2014-06-12 21:55:21', '2014-06-12 21:55:21'),
(295, 'Nuevo vehículo', 'messages', '2014-06-12 21:56:00', '2014-06-12 21:56:00'),
(296, 'Seleccione un propietario', 'messages', '2014-06-13 17:56:03', '2014-06-13 17:56:03'),
(297, 'Seleccione una marca', 'messages', '2014-06-13 17:56:23', '2014-06-13 17:56:23'),
(298, 'Seleccione un color', 'messages', '2014-06-13 17:56:45', '2014-06-13 17:56:45'),
(299, 'Carro', 'messages', '2014-06-13 17:56:58', '2014-06-13 17:56:58'),
(300, 'Moto', 'messages', '2014-06-13 17:57:45', '2014-06-13 17:57:45'),
(301, 'Bicicleta', 'messages', '2014-06-13 17:58:33', '2014-06-13 17:58:33'),
(302, 'Otro', 'messages', '2014-06-13 17:58:57', '2014-06-13 17:58:57'),
(303, 'Editar vehículo', 'messages', '2014-06-13 18:58:29', '2014-06-13 18:58:29'),
(304, 'Detalles del vehículo', 'messages', '2014-06-13 19:07:15', '2014-06-13 19:07:15'),
(305, 'Eliminar vehículo', 'messages', '2014-06-13 19:07:32', '2014-06-13 19:07:32'),
(306, 'vehicle.delete.question', 'messages', '2014-06-13 19:08:48', '2014-06-13 19:08:48'),
(307, 'validate.vehicle.exist.parkingid', 'validators', '2014-06-13 21:37:42', '2014-06-13 21:37:42'),
(308, 'Tipo de Estacionamiento', 'messages', '2014-06-24 16:20:50', '2014-06-24 16:20:50'),
(309, 'Seleccione una localización', 'messages', '2014-06-24 16:25:36', '2014-06-24 16:25:36'),
(310, 'Seleccione un Tipo', 'messages', '2014-06-24 16:25:51', '2014-06-24 16:25:51'),
(311, 'Propio', 'messages', '2014-06-24 16:33:14', '2014-06-24 16:33:14'),
(312, 'Alquilado', 'messages', '2014-06-24 16:33:34', '2014-06-24 16:33:34'),
(313, 'Prestado', 'messages', '2014-06-24 16:34:09', '2014-06-24 16:34:09'),
(314, 'apartment.select', 'validators', '2014-06-24 16:55:32', '2014-06-24 16:55:32'),
(315, 'tower.select', 'validators', '2014-06-24 16:56:01', '2014-06-24 16:56:01'),
(316, 'condo.select', 'validators', '2014-06-24 16:56:35', '2014-06-24 16:56:35'),
(317, 'location.select', 'validators', '2014-06-24 16:58:51', '2014-06-24 16:58:51'),
(318, 'validate.parking.number', 'validators', '2014-06-24 17:00:51', '2014-06-24 17:00:51'),
(319, 'validate.parking.type', 'validators', '2014-06-24 17:01:56', '2014-06-24 17:01:56'),
(320, 'parking.number.exist', 'validators', '2014-06-24 18:19:07', '2014-06-24 18:19:07'),
(321, 'parking.required.companyid', 'messages', '2014-06-24 18:23:21', '2014-06-24 18:23:21'),
(322, 'parking.required.towerid', 'messages', '2014-06-24 18:23:56', '2014-06-24 18:23:56'),
(323, 'parking.required.apartmentid', 'messages', '2014-06-24 18:24:24', '2014-06-24 18:24:24'),
(324, 'parking.required.locationid', 'messages', '2014-06-24 18:24:53', '2014-06-24 18:24:53'),
(325, 'parking.required.number', 'messages', '2014-06-24 18:26:00', '2014-06-24 18:26:00'),
(326, 'parking.required.type', 'messages', '2014-06-24 18:26:38', '2014-06-24 18:26:38'),
(327, 'Editar Estacionamiento', 'messages', '2014-06-24 20:57:04', '2014-06-24 20:57:04'),
(328, 'Detalles del estacionamiento', 'messages', '2014-06-24 22:25:04', '2014-06-24 22:25:04'),
(329, 'Eliminar estacionamiento', 'messages', '2014-06-24 22:26:28', '2014-06-24 22:26:28'),
(330, 'parking.delete.question', 'messages', '2014-06-24 22:27:40', '2014-06-24 22:27:40'),
(331, 'Descripción', 'messages', '2014-06-25 21:42:28', '2014-06-25 21:42:28'),
(332, 'Nueva Localización', 'messages', '2014-06-25 21:44:12', '2014-06-25 21:44:12'),
(333, 'validate.location.location', 'validators', '2014-06-25 21:47:09', '2014-06-25 21:47:09'),
(334, 'location.required.location', 'messages', '2014-06-25 21:49:34', '2014-06-25 21:49:34'),
(335, 'location.location.exist', 'validators', '2014-06-25 22:00:01', '2014-06-25 22:00:01'),
(336, 'Editar Localización', 'messages', '2014-06-25 22:02:30', '2014-06-25 22:02:30'),
(337, 'Detalles la localización', 'messages', '2014-06-25 22:05:34', '2014-06-25 22:05:34'),
(338, 'Localizaciones', 'messages', '2014-06-25 22:05:54', '2014-06-25 22:05:54'),
(339, 'Eliminar Localización', 'messages', '2014-06-25 22:06:13', '2014-06-25 22:06:13'),
(340, 'location.delete.question', 'messages', '2014-06-25 22:06:58', '2014-06-25 22:06:58'),
(341, 'Causas', 'messages', '2014-06-25 22:33:04', '2014-06-25 22:33:04'),
(342, 'Nueva Causa', 'messages', '2014-06-25 22:37:13', '2014-06-25 22:37:13'),
(343, 'Editar Causa', 'messages', '2014-06-25 22:37:34', '2014-06-25 22:37:34'),
(344, 'Eliminar causa', 'messages', '2014-06-25 22:37:56', '2014-06-25 22:37:56'),
(345, 'validate.cause.cause', 'validators', '2014-06-25 22:45:42', '2014-06-25 22:45:42'),
(346, 'cause.cause.exist', 'validators', '2014-06-25 22:46:36', '2014-06-25 22:46:36'),
(347, 'cause.required.cause', 'messages', '2014-06-25 22:49:46', '2014-06-25 22:49:46'),
(348, 'Detalles de la causa', 'messages', '2014-06-25 22:54:10', '2014-06-25 22:54:10'),
(349, 'cause.delete.question', 'messages', '2014-06-25 22:56:02', '2014-06-25 22:56:02'),
(350, 'Monto', 'messages', '2014-06-25 23:34:42', '2014-06-25 23:34:42'),
(351, 'Fecha', 'messages', '2014-06-25 23:34:58', '2014-06-25 23:34:58'),
(352, 'Fecha del gasto', 'messages', '2014-06-25 23:38:34', '2014-06-25 23:38:34'),
(353, 'Seleccione una causa', 'messages', '2014-06-25 23:40:04', '2014-06-25 23:40:04'),
(354, 'Nuevo Gasto', 'messages', '2014-06-26 15:57:13', '2014-06-26 15:57:13'),
(355, 'validate.expense.description', 'validators', '2014-06-26 16:40:02', '2014-06-26 16:40:02'),
(356, 'validate.expense.cause', 'validators', '2014-06-26 16:40:41', '2014-06-26 16:40:41'),
(357, 'validate.expense.amount', 'validators', '2014-06-26 16:41:11', '2014-06-26 16:41:11'),
(358, 'validate.amount.numeric', 'validators', '2014-06-26 16:42:13', '2014-06-26 16:42:13'),
(359, 'validate.expense.date', 'validators', '2014-06-26 16:42:39', '2014-06-26 16:42:39'),
(360, 'validate.expense.exist.description', 'validators', '2014-06-26 16:43:34', '2014-06-26 16:43:34'),
(361, 'expense.required.companyid', 'messages', '2014-06-26 16:53:28', '2014-06-26 16:53:28'),
(362, 'expense.required.towerid', 'messages', '2014-06-26 16:55:28', '2014-06-26 16:55:28'),
(363, 'expense.required.description', 'messages', '2014-06-26 16:56:43', '2014-06-26 16:56:43'),
(364, 'expense.required.causeid', 'messages', '2014-06-26 16:57:06', '2014-06-26 16:57:06'),
(365, 'expense.required.amount', 'messages', '2014-06-26 16:57:33', '2014-06-26 16:57:33'),
(366, 'expense.number.amount', 'messages', '2014-06-26 16:58:14', '2014-06-26 16:58:14'),
(367, 'expense.required.expensedate', 'messages', '2014-06-26 16:58:42', '2014-06-26 16:58:42'),
(368, 'expense.date.expensedate', 'messages', '2014-06-26 16:59:33', '2014-06-26 16:59:33'),
(369, 'Editar Gasto', 'messages', '2014-06-26 17:04:22', '2014-06-26 17:04:22'),
(370, 'Detalles del gasto', 'messages', '2014-06-26 17:23:55', '2014-06-26 17:23:55'),
(371, 'Eliminar Gasto', 'messages', '2014-06-26 17:24:16', '2014-06-26 17:24:16'),
(372, 'expense.delete.question', 'messages', '2014-06-26 17:24:57', '2014-06-26 17:24:57'),
(373, 'delete.condo.dbaexception', 'messages', '2014-06-26 18:40:06', '2014-06-26 18:40:06'),
(374, 'Pagina no encontrada, por favor verifique', 'messages', '2014-06-26 23:30:02', '2014-06-26 23:30:02'),
(375, 'delete.role.exception', 'messages', '2014-06-27 16:26:26', '2014-06-27 16:26:26'),
(376, 'delete.tower.dbaexception', 'messages', '2014-06-27 16:46:55', '2014-06-27 16:46:55'),
(377, 'delete.apartment.dbaexception', 'messages', '2014-06-27 17:13:38', '2014-06-27 17:13:38'),
(378, 'delete.constcompany.dbaexception', 'messages', '2014-06-27 17:34:03', '2014-06-27 17:34:03'),
(379, 'delete.residenttype.dbaexception', 'messages', '2014-06-27 18:07:54', '2014-06-27 18:07:54'),
(380, 'delete.resident.dbaexception', 'messages', '2014-06-27 18:20:06', '2014-06-27 18:20:06'),
(381, 'delete.color.dbaexception', 'messages', '2014-06-27 18:38:28', '2014-06-27 18:38:28'),
(382, 'delete.brand.dbaexception', 'messages', '2014-06-27 18:44:35', '2014-06-27 18:44:35'),
(383, 'delete.parking.dbaexception', 'messages', '2014-06-27 20:24:07', '2014-06-27 20:24:07'),
(384, 'delete.location.dbaexception', 'messages', '2014-06-27 20:29:55', '2014-06-27 20:29:55'),
(385, 'delete.cause.dbaexception', 'messages', '2014-06-27 20:37:25', '2014-06-27 20:37:25'),
(386, 'Detalles de la torre', 'messages', '2014-06-27 23:47:46', '2014-06-27 23:47:46'),
(387, 'bank.required.name', 'messages', '2014-08-20 22:16:56', '2014-08-20 22:16:56'),
(388, 'name.bank.validate', 'validators', '2014-08-20 22:29:23', '2014-08-20 22:29:23'),
(389, 'bank.digits.phone', 'messages', '2014-08-20 22:32:15', '2014-08-20 22:32:15'),
(390, 'name.bank.exist', 'validators', '2014-08-20 22:41:17', '2014-08-20 22:41:17'),
(391, 'bank.delete.question', 'messages', '2014-08-20 23:13:17', '2014-08-20 23:13:17'),
(392, 'Bancos', 'messages', '2014-08-20 23:24:44', '2014-08-20 23:24:44'),
(393, 'Nuevo Banco', 'messages', '2014-08-20 23:28:30', '2014-08-20 23:28:30'),
(394, 'Editar Banco', 'messages', '2014-08-20 23:28:58', '2014-08-20 23:28:58'),
(395, 'Eliminar banco', 'messages', '2014-08-20 23:29:31', '2014-08-20 23:29:31'),
(396, 'delete.bank.dbaexception', 'messages', '2014-08-20 23:32:07', '2014-08-20 23:32:07'),
(397, 'Detalles del Banco', 'messages', '2014-08-20 23:33:49', '2014-08-20 23:33:49'),
(398, 'config.roleusers.title', 'messages', '2014-08-26 20:23:33', '2014-08-26 20:23:33'),
(399, 'configure.condo.title', 'messages', '2014-08-26 20:24:16', '2014-08-26 20:24:16'),
(400, 'config.residents.title', 'messages', '2014-08-26 20:24:57', '2014-08-26 20:24:57'),
(401, 'manage.budget.title', 'messages', '2014-08-26 20:25:39', '2014-08-26 20:25:39'),
(402, 'config.system.title', 'messages', '2014-08-26 20:26:32', '2014-08-26 20:26:32'),
(403, 'INICIO', 'messages', '2014-08-26 20:30:16', '2014-08-26 20:30:16'),
(404, 'number.account.validate', 'validators', '2014-08-27 23:35:46', '2014-08-27 23:35:46'),
(405, 'number.account.exist', 'validators', '2014-08-27 23:36:55', '2014-08-27 23:36:55'),
(406, 'account.required.number', 'messages', '2014-08-28 00:00:14', '2014-08-28 00:00:14'),
(407, 'account.required.bankid', 'messages', '2014-08-28 00:00:43', '2014-08-28 00:00:43'),
(408, 'account.required.balance', 'messages', '2014-08-28 00:01:30', '2014-08-28 00:01:30'),
(409, 'account.required.name', 'messages', '2014-08-28 00:02:06', '2014-08-28 00:02:06'),
(410, 'banco', 'messages', '2014-08-28 00:06:01', '2014-08-28 00:06:01'),
(411, 'Saldo', 'messages', '2014-08-28 00:06:24', '2014-08-28 00:06:24'),
(412, 'Seleccione un banco', 'messages', '2014-08-28 00:13:19', '2014-08-28 00:13:19'),
(413, 'Nueva Cuenta', 'messages', '2014-08-28 00:13:50', '2014-08-28 00:13:50'),
(414, 'Cuentas', 'messages', '2014-08-28 00:14:08', '2014-08-28 00:14:08'),
(415, 'Editar Cuenta', 'messages', '2014-08-28 00:14:32', '2014-08-28 00:14:32'),
(416, 'Eliminar cuenta', 'messages', '2014-08-28 00:15:11', '2014-08-28 00:15:11'),
(417, 'account.delete.question', 'messages', '2014-08-28 00:17:53', '2014-08-28 00:17:53'),
(418, 'Detalles de la cuenta', 'messages', '2014-08-28 00:18:25', '2014-08-28 00:18:25'),
(419, 'delete.account.dbaexception', 'messages', '2014-08-28 00:20:22', '2014-08-28 00:20:22'),
(420, 'Documentos', 'messages', '2014-09-23 21:52:03', '2014-09-23 21:52:03'),
(421, 'Documentos de Gastos', 'messages', '2014-09-23 21:54:38', '2014-09-23 21:54:38'),
(422, 'Descripción del gasto', 'messages', '2014-09-23 22:00:41', '2014-09-23 22:00:41'),
(423, 'Archivo', 'messages', '2014-09-23 22:04:32', '2014-09-23 22:04:32'),
(424, 'Nuevo Documento', 'messages', '2014-09-23 22:07:38', '2014-09-23 22:07:38'),
(425, 'Editar Documento', 'messages', '2014-09-23 22:09:04', '2014-09-23 22:09:04'),
(426, 'Detalles del documento', 'messages', '2014-09-23 22:16:43', '2014-09-23 22:16:43'),
(427, 'Eliminar Documento', 'messages', '2014-09-23 22:17:04', '2014-09-23 22:17:04'),
(428, 'Ver imagen', 'messages', '2014-09-23 22:18:43', '2014-09-23 22:18:43'),
(429, 'Descargar', 'messages', '2014-09-23 22:19:00', '2014-09-23 22:19:00'),
(430, 'expenseinvoice.delete.question', 'messages', '2014-09-23 22:19:44', '2014-09-23 22:19:44'),
(431, 'Please select a file.', 'validators', '2014-09-25 18:58:03', '2014-09-25 18:58:03'),
(432, 'name.expenseinvoice.validate', 'validators', '2014-09-25 20:57:05', '2014-09-25 20:57:05'),
(433, 'name.expenseinvoice.exist', 'validators', '2014-09-25 21:03:12', '2014-09-25 21:03:12'),
(434, 'expenseinvoice.required.file', 'messages', '2014-09-30 20:49:08', '2014-09-30 20:49:08'),
(435, 'expenseinvoice.required.name', 'messages', '2014-09-30 20:50:07', '2014-09-30 20:50:07'),
(436, 'expense.required.accountid', 'messages', '2014-09-30 22:08:54', '2014-09-30 22:08:54'),
(437, 'Seleccione una cuenta bancaria', 'messages', '2014-09-30 22:09:51', '2014-09-30 22:09:51'),
(438, 'validate.expense.accountid', 'validators', '2014-09-30 23:18:51', '2014-09-30 23:18:51'),
(439, 'validate.cause.causetype', 'validators', '2014-10-07 18:17:15', '2014-10-07 18:17:15'),
(440, 'Tipo de causa', 'messages', '2014-10-07 20:20:59', '2014-10-07 20:20:59'),
(441, 'Tipos de Causa', 'messages', '2014-10-07 21:42:50', '2014-10-07 21:42:50'),
(442, 'Nuevo tipo de causa', 'messages', '2014-10-07 21:48:34', '2014-10-07 21:48:34'),
(443, 'cause.required.causetype', 'messages', '2014-10-07 21:49:17', '2014-10-07 21:49:17'),
(444, 'causetype.causetype.validate', 'validators', '2014-10-07 21:50:37', '2014-10-07 21:50:37'),
(445, 'causetype.causetype.exist', 'validators', '2014-10-07 21:54:02', '2014-10-07 21:54:02'),
(446, 'Editar tipo de causa', 'messages', '2014-10-07 21:58:48', '2014-10-07 21:58:48'),
(447, 'Detalles del tipo de causa', 'messages', '2014-10-07 22:02:27', '2014-10-07 22:02:27'),
(448, 'Eliminar tipo de causa', 'messages', '2014-10-07 22:03:32', '2014-10-07 22:03:32'),
(449, 'causetype.delete.question', 'messages', '2014-10-07 22:04:30', '2014-10-07 22:04:30'),
(450, 'validate.existuserrole', 'validators', '2014-10-23 11:11:38', '2014-10-23 11:11:38'),
(451, 'userrole.roleid.validate', 'messages', '2014-10-23 11:12:30', '2014-10-23 11:12:30'),
(452, 'Roles del usuario', 'messages', '2014-10-23 11:15:29', '2014-10-23 11:15:29'),
(453, 'Roles del usuario / ', 'messages', '2014-10-23 11:18:57', '2014-10-23 11:18:57'),
(454, 'Nuevo rol del usuario / ', 'messages', '2014-10-23 11:25:40', '2014-10-23 11:25:40'),
(455, 'Seleccione un rol', 'messages', '2014-10-23 11:26:15', '2014-10-23 11:26:15'),
(456, 'Detalles del rol  /  ', 'messages', '2014-10-23 11:33:53', '2014-10-23 11:33:53'),
(457, 'Quitar rol', 'messages', '2014-10-23 11:40:23', '2014-10-23 11:40:23'),
(458, 'delete.userrole.question', 'messages', '2014-10-23 11:45:18', '2014-10-23 11:45:18'),
(459, 'Detalles del Usuario / ', 'messages', '2014-10-23 11:54:23', '2014-10-23 11:54:23'),
(460, 'Ingresos', 'messages', '2014-10-23 13:38:14', '2014-10-23 13:38:14'),
(461, 'income.required.companyid', 'messages', '2014-10-27 10:46:53', '2014-10-27 10:46:53'),
(462, 'income.required.towerid', 'messages', '2014-10-27 10:47:22', '2014-10-27 10:47:22'),
(463, 'income.required.accountid', 'messages', '2014-10-27 10:47:52', '2014-10-27 10:47:52'),
(464, 'income.required.causeid', 'messages', '2014-10-27 10:48:20', '2014-10-27 10:48:20'),
(465, 'income.required.description', 'messages', '2014-10-27 10:49:44', '2014-10-27 10:49:44'),
(466, 'income.required.amount', 'messages', '2014-10-27 10:50:13', '2014-10-27 10:50:13'),
(467, 'income.required.incomedate', 'messages', '2014-10-27 10:51:18', '2014-10-27 10:51:18'),
(468, 'companyid.income.validate', 'validators', '2014-10-27 10:56:30', '2014-10-27 10:56:30'),
(469, 'towerid.income.validate', 'validators', '2014-10-27 10:56:58', '2014-10-27 10:56:58'),
(470, 'accountid.income.validate', 'validators', '2014-10-27 10:57:26', '2014-10-27 10:57:26'),
(471, 'causeid.income.validate', 'validators', '2014-10-27 10:58:36', '2014-10-27 10:58:36'),
(472, 'description.income.validate', 'validators', '2014-10-27 11:00:15', '2014-10-27 11:00:15'),
(473, 'amount.income.validate', 'validators', '2014-10-27 11:00:53', '2014-10-27 11:00:53'),
(474, 'incomedate.income.validate', 'validators', '2014-10-27 11:01:48', '2014-10-27 11:01:48'),
(475, 'Create', 'messages', '2014-10-27 11:28:43', '2014-10-27 11:28:43'),
(476, 'Update', 'messages', '2014-10-27 11:29:04', '2014-10-27 11:29:04'),
(477, 'Nuevo Ingreso', 'messages', '2014-10-27 11:30:54', '2014-10-27 11:30:54'),
(478, 'Editar Ingreso', 'messages', '2014-10-27 11:32:12', '2014-10-27 11:32:12'),
(479, 'Cuenta Bancaria', 'messages', '2014-10-27 11:33:30', '2014-10-27 11:33:30'),
(480, 'Fecha del ingreso', 'messages', '2014-10-27 11:34:39', '2014-10-27 11:34:39'),
(481, 'Eliminar Ingreso', 'messages', '2014-10-27 12:02:25', '2014-10-27 12:02:25'),
(482, 'income.delete.question', 'messages', '2014-10-27 12:05:28', '2014-10-27 12:05:28'),
(483, 'Detalles del ingreso', 'messages', '2014-10-27 12:07:53', '2014-10-27 12:07:53'),
(484, 'changepassword.message', 'validators', '2014-10-29 15:35:51', '2014-10-29 15:35:51'),
(485, 'Cambiar contraseña', 'messages', '2014-10-29 15:54:12', '2014-10-29 15:54:12'),
(486, 'Contraseña', 'messages', '2014-10-29 15:56:31', '2014-10-29 15:56:31'),
(487, 'Confirmar Contraseña', 'messages', '2014-10-29 15:56:59', '2014-10-29 15:56:59'),
(488, 'confirmpassword.validate', 'messages', '2014-10-30 11:20:45', '2014-10-30 11:20:45'),
(489, 'confirmpassword.equal', 'messages', '2014-10-30 11:40:29', '2014-10-30 11:40:29'),
(490, 'description.validate', 'validators', '2014-11-06 13:09:04', '2014-11-06 13:09:04'),
(491, 'noblank.amount.validate', 'validators', '2014-11-06 13:09:44', '2014-11-06 13:09:44'),
(492, 'zero.amount.validate', 'validators', '2014-11-06 13:10:40', '2014-11-06 13:10:40'),
(493, 'date.empty', 'validators', '2014-11-06 13:13:23', '2014-11-06 13:13:23'),
(494, 'account.select', 'validators', '2014-11-06 13:15:52', '2014-11-06 13:15:52'),
(495, 'towerid.validate', 'messages', '2014-11-06 15:09:28', '2014-11-06 15:09:28'),
(496, 'apartmentid.validate', 'messages', '2014-11-06 15:10:43', '2014-11-06 15:10:43'),
(497, 'required.description', 'messages', '2014-11-06 15:11:19', '2014-11-06 15:11:19'),
(498, 'required.amount', 'messages', '2014-11-06 15:11:59', '2014-11-06 15:11:59'),
(499, 'required.date', 'messages', '2014-11-06 15:12:48', '2014-11-06 15:12:48'),
(500, 'date.date', 'messages', '2014-11-06 15:13:17', '2014-11-06 15:13:17'),
(501, 'required.accountid', 'messages', '2014-11-06 15:13:58', '2014-11-06 15:13:58'),
(502, 'Pagos', 'messages', '2014-11-06 15:16:17', '2014-11-06 15:16:17'),
(503, 'Nuevo Pago', 'messages', '2014-11-06 15:16:43', '2014-11-06 15:16:43'),
(504, 'Editar Pago', 'messages', '2014-11-06 15:18:10', '2014-11-06 15:18:10'),
(505, 'Detalles del pago', 'messages', '2014-11-06 15:23:44', '2014-11-06 15:23:44'),
(506, 'Eliminar Pago', 'messages', '2014-11-06 15:24:12', '2014-11-06 15:24:12'),
(507, 'Cuenta', 'messages', '2014-11-06 15:24:40', '2014-11-06 15:24:40'),
(508, 'payment.delete.question', 'messages', '2014-11-06 15:27:19', '2014-11-06 15:27:19'),
(509, 'method.paymentmethod.validate', 'validators', '2014-11-07 13:24:02', '2014-11-07 13:24:02'),
(510, 'method.paymentmethod.exist', 'validators', '2014-11-07 13:25:11', '2014-11-07 13:25:11'),
(511, 'paymentmethod.validate', 'validators', '2014-11-07 13:57:03', '2014-11-07 13:57:03'),
(512, 'Tipo de Pago', 'messages', '2014-11-07 14:06:34', '2014-11-07 14:06:34'),
(513, 'Efectivo', 'messages', '2014-11-07 14:09:40', '2014-11-07 14:09:40'),
(514, 'Cheque', 'messages', '2014-11-07 14:10:00', '2014-11-07 14:10:00'),
(515, 'Banca en línea', 'messages', '2014-11-07 14:10:38', '2014-11-07 14:10:38'),
(516, 'Tarjeta', 'messages', '2014-11-07 14:11:15', '2014-11-07 14:11:15'),
(517, 'Seleccione un Tipo de pago', 'messages', '2014-11-07 14:17:30', '2014-11-07 14:17:30'),
(518, 'required.paymentmethod', 'messages', '2014-11-07 14:32:10', '2014-11-07 14:32:10'),
(519, 'amount.number', 'messages', '2014-11-11 09:42:48', '2014-11-11 09:42:48'),
(520, 'provider.select', 'validators', '2014-11-11 10:58:56', '2014-11-11 10:58:56'),
(521, 'required.providerid', 'messages', '2014-11-11 11:00:47', '2014-11-11 11:00:47'),
(522, 'Depositante', 'messages', '2014-11-11 13:54:33', '2014-11-11 13:54:33'),
(523, 'depositor.validate', 'validators', '2014-11-11 15:06:48', '2014-11-11 15:06:48'),
(524, 'required.depositor', 'messages', '2014-11-11 15:13:17', '2014-11-11 15:13:17'),
(525, 'Identificador', 'messages', '2014-11-27 14:39:50', '2014-11-27 14:41:05'),
(526, 'Traducción', 'messages', '2014-11-27 14:42:16', '2014-11-27 14:42:16'),
(527, 'translation.key.validate', 'messages', '2014-11-27 15:47:10', '2014-11-27 15:47:10'),
(528, 'Estado de Cuenta', 'messages', '2014-12-03 12:17:52', '2014-12-03 12:18:42'),
(529, 'Mes', 'messages', '2014-12-03 12:19:45', '2014-12-03 12:19:45'),
(530, 'Año', 'messages', '2014-12-03 12:20:07', '2014-12-03 12:20:07'),
(531, 'Ver Detalle', 'messages', '2014-12-03 15:13:37', '2014-12-03 15:13:37'),
(532, 'Seleccione un Mes', 'messages', '2014-12-03 15:18:06', '2014-12-03 15:18:06'),
(533, 'Seleccione un Año', 'messages', '2014-12-03 15:18:40', '2014-12-03 15:18:40'),
(534, 'Enero', 'messages', '2014-12-03 15:23:35', '2014-12-03 15:23:35'),
(535, 'Febrero', 'messages', '2014-12-03 15:24:01', '2014-12-03 15:24:01'),
(536, 'Marzo', 'messages', '2014-12-03 15:24:23', '2014-12-03 15:24:23'),
(537, 'Abril', 'messages', '2014-12-03 15:30:43', '2014-12-03 15:30:43'),
(538, 'Mayo', 'messages', '2014-12-03 15:31:11', '2014-12-03 15:31:11'),
(539, 'Junio', 'messages', '2014-12-03 15:31:38', '2014-12-03 15:31:38'),
(540, 'Julio', 'messages', '2014-12-03 15:32:06', '2014-12-03 15:32:06'),
(541, 'Agosto', 'messages', '2014-12-03 15:32:37', '2014-12-03 15:32:37'),
(542, 'Septiembre', 'messages', '2014-12-03 15:33:15', '2014-12-03 15:33:15'),
(543, 'Octubre', 'messages', '2014-12-03 15:33:44', '2014-12-03 15:33:44'),
(544, 'Noviembre', 'messages', '2014-12-03 15:34:20', '2014-12-03 15:34:20'),
(545, 'Diciembre', 'messages', '2014-12-03 15:34:50', '2014-12-03 15:34:50'),
(546, 'Clase', 'messages', '2014-12-03 15:46:34', '2014-12-03 15:46:34'),
(547, 'Crédito', 'messages', '2014-12-03 15:47:04', '2014-12-03 15:47:04'),
(548, 'Débito', 'messages', '2014-12-03 15:47:33', '2014-12-03 15:47:33'),
(549, 'Recibo', 'messages', '2014-12-03 15:50:34', '2014-12-03 15:50:34'),
(550, 'Detalle', 'messages', '2014-12-03 15:51:52', '2014-12-03 15:51:52'),
(551, 'Consultar', 'messages', '2014-12-04 10:37:43', '2014-12-04 10:37:43'),
(552, 'Total Créditos', 'messages', '2014-12-04 10:41:55', '2014-12-04 10:41:55'),
(553, 'Total Débitos', 'messages', '2014-12-04 10:46:21', '2014-12-04 10:46:21'),
(554, 'No data', 'messages', '2014-12-04 15:11:34', '2014-12-04 15:11:34'),
(555, 'validate.actionname', 'validators', '2014-12-05 08:50:15', '2014-12-05 08:50:15'),
(556, 'validate.exist.actionname', 'validators', '2014-12-05 08:54:33', '2014-12-05 08:54:33'),
(557, 'actionname.validate', 'messages', '2014-12-05 14:20:13', '2014-12-05 14:20:13'),
(558, 'Acciones de Seguridad', 'messages', '2014-12-05 14:52:10', '2014-12-05 14:55:33'),
(559, 'Nueva Acción', 'messages', '2014-12-05 14:52:57', '2014-12-05 14:52:57'),
(560, 'Editar Acción', 'messages', '2014-12-05 14:53:22', '2014-12-05 14:53:22'),
(561, 'Detalle de la Acción', 'messages', '2014-12-05 14:56:40', '2014-12-05 14:56:40'),
(562, 'Eliminar Acción', 'messages', '2014-12-05 14:58:12', '2014-12-05 14:58:12'),
(563, 'Acciones', 'messages', '2014-12-05 15:08:34', '2014-12-05 15:08:34'),
(564, 'delete.action.question', 'messages', '2014-12-05 15:09:52', '2014-12-05 15:09:52'),
(565, 'Nueva acción del rol', 'messages', '2014-12-09 15:27:13', '2014-12-09 15:27:13'),
(566, 'action.select', 'validators', '2014-12-09 15:28:21', '2014-12-09 15:28:21'),
(567, 'validate.exist.actionrole', 'validators', '2014-12-09 15:29:54', '2014-12-09 15:29:54'),
(568, 'Editar acción del rol', 'messages', '2014-12-09 15:33:23', '2014-12-09 15:33:23'),
(569, 'Acción', 'messages', '2014-12-09 15:34:32', '2014-12-09 15:34:32'),
(570, 'Seleccione una Acción', 'messages', '2014-12-09 15:35:36', '2014-12-09 15:35:36'),
(571, 'roleaction.actionid.validate', 'messages', '2014-12-09 16:25:42', '2014-12-09 16:25:42'),
(572, 'Quitar Acción', 'messages', '2014-12-10 09:17:28', '2014-12-10 09:17:28'),
(573, 'delete.roleaction.question', 'messages', '2014-12-10 09:20:15', '2014-12-10 09:20:15'),
(574, 'ADMINISTRATION', 'messages', '2015-02-05 13:22:39', '2015-02-05 13:22:39'),
(575, 'Bad credentials.', 'validators', '2015-02-05 14:41:43', '2015-02-05 14:41:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lexik_trans_unit_translations`
--

CREATE TABLE IF NOT EXISTS `lexik_trans_unit_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) DEFAULT NULL,
  `trans_unit_id` int(11) DEFAULT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `trans_unit_locale_idx` (`trans_unit_id`,`locale`),
  KEY `IDX_B0AA394493CB796C` (`file_id`),
  KEY `IDX_B0AA3944C3C583C9` (`trans_unit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1133 ;

--
-- Volcado de datos para la tabla `lexik_trans_unit_translations`
--

INSERT INTO `lexik_trans_unit_translations` (`id`, `file_id`, `trans_unit_id`, `locale`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'en', 'Parking', '2014-05-16 17:13:32', '2014-11-27 10:42:38'),
(2, 1, 2, 'en', 'New Parking', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(3, 1, 3, 'en', 'You must select a location', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(4, 1, 4, 'en', 'Parking number', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(5, 1, 5, 'en', 'Colors', '2014-05-16 17:13:32', '2014-05-19 20:35:42'),
(6, 1, 6, 'en', 'New Color', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(7, 1, 7, 'en', 'Edit Color', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(8, 1, 8, 'en', 'Number', '2014-05-16 17:13:32', '2014-08-28 00:12:29'),
(9, 1, 9, 'en', 'Search', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(10, 1, 10, 'en', 'User', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(11, 1, 11, 'en', 'Users', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(12, 1, 12, 'en', 'Create', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(13, 1, 13, 'en', 'Update', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(14, 1, 14, 'en', 'Color is required', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(15, 1, 15, 'en', 'Log Out', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(16, 1, 16, 'en', 'Page', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(17, 1, 17, 'en', 'Blue5', '2014-05-16 17:13:32', '2014-05-16 17:28:30'),
(18, 3, 18, 'en', 'You must select a parking type', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(19, 3, 19, 'en', 'You must select a location', '2014-05-16 17:13:32', '2014-05-16 17:13:32'),
(20, 4, 20, 'en', 'Towers', '2014-05-16 18:18:41', '2014-05-16 18:18:41'),
(21, 5, 20, 'es', 'Torres', '2014-05-16 18:18:41', '2014-05-16 18:18:41'),
(22, 4, 21, 'en', 'Translation Messages', '2014-05-16 18:20:16', '2014-05-16 18:20:16'),
(23, 5, 21, 'es', 'Traducción de Mensajes', '2014-05-16 18:20:16', '2014-05-16 18:20:16'),
(24, 4, 22, 'en', 'Key', '2014-05-19 18:31:45', '2014-05-19 18:31:45'),
(25, 5, 22, 'es', 'Llave', '2014-05-19 18:31:45', '2014-05-19 18:31:45'),
(26, 4, 23, 'en', 'Domain', '2014-05-19 18:33:02', '2014-05-19 18:33:02'),
(27, 5, 23, 'es', 'Tipo de Mensaje', '2014-05-19 18:33:02', '2014-05-19 18:33:02'),
(28, 4, 24, 'en', 'English content', '2014-05-19 18:36:06', '2014-05-19 18:36:06'),
(29, 5, 24, 'es', 'Contenido en Ingles', '2014-05-19 18:36:06', '2014-05-19 18:36:06'),
(30, 4, 25, 'en', 'Content', '2014-05-19 18:38:19', '2014-05-19 18:38:19'),
(31, 5, 25, 'es', 'Contenido', '2014-05-19 18:38:19', '2014-05-19 18:38:19'),
(32, 4, 26, 'en', 'Roles', '2014-05-19 20:25:33', '2014-05-19 20:25:33'),
(33, 5, 26, 'es', 'Roles', '2014-05-19 20:25:33', '2014-05-19 20:25:33'),
(34, 4, 27, 'en', 'Condominium', '2014-05-19 20:30:18', '2014-05-19 20:30:18'),
(35, 5, 27, 'es', 'Condominio', '2014-05-19 20:30:18', '2014-05-19 20:30:18'),
(36, 4, 28, 'en', 'Residents', '2014-05-19 20:30:39', '2014-05-19 20:30:39'),
(37, 5, 28, 'es', 'Residentes', '2014-05-19 20:30:39', '2014-05-19 20:30:39'),
(38, 4, 29, 'en', 'Apartments', '2014-05-19 20:31:27', '2014-05-23 22:26:54'),
(39, 5, 29, 'es', 'Apartamentos', '2014-05-19 20:31:27', '2014-05-19 20:31:27'),
(40, 4, 30, 'en', 'Employees', '2014-05-19 20:33:27', '2014-05-19 20:33:27'),
(41, 5, 30, 'es', 'Empleados', '2014-05-19 20:33:27', '2014-05-19 20:33:27'),
(42, 4, 31, 'en', 'Providers', '2014-05-19 20:34:11', '2014-05-19 20:34:11'),
(43, 5, 31, 'es', 'Proveedores', '2014-05-19 20:34:11', '2014-05-19 20:34:11'),
(44, 4, 32, 'en', 'Type of Residents', '2014-05-19 20:35:19', '2014-05-19 20:35:19'),
(45, 5, 32, 'es', 'Tipo de Residentes', '2014-05-19 20:35:19', '2014-05-19 20:35:19'),
(46, 4, 33, 'en', 'Brands', '2014-05-19 20:36:30', '2014-05-19 20:36:30'),
(47, 5, 33, 'es', 'Marcas', '2014-05-19 20:36:30', '2014-05-19 20:36:30'),
(48, 4, 34, 'en', 'Cars', '2014-05-19 20:37:05', '2014-05-19 20:37:40'),
(49, 5, 34, 'es', 'Autos', '2014-05-19 20:37:05', '2014-05-19 20:37:05'),
(50, 4, 35, 'en', 'Location', '2014-05-19 20:38:23', '2014-05-19 20:38:23'),
(51, 5, 35, 'es', 'Localización', '2014-05-19 20:38:23', '2014-05-19 20:38:23'),
(52, 4, 36, 'en', 'Budget Management', '2014-05-19 20:39:37', '2014-05-19 20:39:37'),
(53, 5, 36, 'es', 'Manejo de Presupuesto', '2014-05-19 20:39:37', '2014-05-19 20:39:37'),
(54, 4, 37, 'en', 'Cause', '2014-05-19 20:44:23', '2014-05-19 20:44:23'),
(55, 5, 37, 'es', 'Causa', '2014-05-19 20:44:23', '2014-05-19 20:44:23'),
(56, 4, 38, 'en', 'Expenses', '2014-05-19 20:44:52', '2014-05-19 20:44:52'),
(57, 5, 38, 'es', 'Gastos', '2014-05-19 20:44:52', '2014-05-19 20:44:52'),
(58, 4, 39, 'en', 'Translations', '2014-05-19 20:45:26', '2014-05-19 20:45:26'),
(59, 5, 39, 'es', 'Traducciones', '2014-05-19 20:45:26', '2014-05-19 20:45:26'),
(60, 4, 40, 'en', 'Tags', '2014-05-19 20:45:59', '2014-05-19 20:45:59'),
(61, 5, 40, 'es', 'Etiquetas', '2014-05-19 20:45:59', '2014-05-19 20:45:59'),
(62, 4, 41, 'en', 'username', '2014-05-19 21:08:31', '2014-05-19 21:08:31'),
(63, 5, 41, 'es', 'Usuario', '2014-05-19 21:08:31', '2014-05-19 21:08:31'),
(64, 4, 42, 'en', 'User Name', '2014-05-19 21:10:21', '2014-05-19 21:10:21'),
(65, 5, 42, 'es', 'Usuario', '2014-05-19 21:10:21', '2014-05-19 21:11:21'),
(66, 4, 43, 'en', 'Password', '2014-05-19 21:12:11', '2014-05-19 21:12:11'),
(67, 5, 43, 'es', 'Contraseña', '2014-05-19 21:12:11', '2014-05-19 21:12:11'),
(68, 4, 44, 'en', 'New User', '2014-05-19 21:18:24', '2014-05-19 21:18:24'),
(69, 5, 44, 'es', 'Nuevo Usuario', '2014-05-19 21:18:24', '2014-05-19 21:18:24'),
(70, 4, 45, 'en', 'Must enter a username', '2014-05-19 21:36:00', '2014-05-19 21:36:00'),
(71, 5, 45, 'es', 'Debe ingresar un usuario', '2014-05-19 21:36:00', '2014-05-19 21:36:00'),
(72, 4, 46, 'en', 'Must enter a password', '2014-05-19 21:38:19', '2014-05-19 21:38:19'),
(73, 5, 46, 'es', 'Debe ingresar una contraseña', '2014-05-19 21:38:19', '2014-05-19 21:38:19'),
(74, 4, 47, 'en', 'The password must be at least 6 characters', '2014-05-19 21:40:15', '2014-05-19 21:40:15'),
(75, 5, 47, 'es', 'La contraseña debe contener mínimo 6 caracteres', '2014-05-19 21:40:15', '2014-05-19 21:40:15'),
(76, 4, 48, 'en', 'Edit Users', '2014-05-19 21:46:00', '2014-05-19 21:46:00'),
(77, 5, 48, 'es', 'Editar Usuarios', '2014-05-19 21:46:00', '2014-05-19 21:46:00'),
(78, 4, 49, 'en', 'User Details', '2014-05-19 21:54:35', '2014-05-19 21:54:35'),
(79, 5, 49, 'es', 'Detalles del Usuario', '2014-05-19 21:54:35', '2014-05-19 21:54:35'),
(80, 4, 50, 'en', 'User List', '2014-05-19 21:55:19', '2014-05-19 21:55:19'),
(81, 5, 50, 'es', 'Lista de Usuarios', '2014-05-19 21:55:19', '2014-05-19 21:55:19'),
(82, 4, 51, 'en', 'Delete User', '2014-05-19 21:55:42', '2014-05-19 21:55:42'),
(83, 5, 51, 'es', 'Eliminar Usuario', '2014-05-19 21:55:42', '2014-05-19 21:55:42'),
(84, 4, 52, 'en', 'Are you sure you want to delete this user', '2014-05-19 21:57:25', '2014-05-19 21:57:25'),
(85, 5, 52, 'es', 'Esta seguro que desea eliminar este usuario', '2014-05-19 21:57:25', '2014-05-19 21:57:25'),
(86, 4, 53, 'en', 'ID', '2014-05-19 22:03:43', '2014-05-19 22:03:43'),
(87, 5, 53, 'es', 'ID', '2014-05-19 22:03:43', '2014-05-19 22:03:43'),
(88, 4, 54, 'en', 'UserName', '2014-05-19 22:04:02', '2014-05-19 22:04:02'),
(89, 5, 54, 'es', 'Usuario', '2014-05-19 22:04:02', '2014-05-19 22:04:02'),
(90, 4, 55, 'en', 'Password', '2014-05-19 22:04:24', '2014-05-19 22:04:24'),
(91, 5, 55, 'es', 'Contraseña', '2014-05-19 22:04:24', '2014-05-19 22:04:24'),
(92, 4, 56, 'en', 'Salt', '2014-05-19 22:04:44', '2014-05-19 22:04:44'),
(93, 5, 56, 'es', 'Salt', '2014-05-19 22:04:44', '2014-05-19 22:04:44'),
(94, 4, 57, 'en', 'Roles', '2014-05-19 22:05:15', '2014-05-19 22:05:15'),
(95, 5, 57, 'es', 'Roles', '2014-05-19 22:05:15', '2014-05-19 22:05:15'),
(96, 4, 58, 'en', 'Role', '2014-05-19 22:10:34', '2014-05-19 22:10:34'),
(97, 5, 58, 'es', 'Rol', '2014-05-19 22:10:34', '2014-05-19 22:10:34'),
(98, 4, 59, 'en', 'New Role', '2014-05-19 22:19:10', '2014-05-19 22:19:10'),
(99, 5, 59, 'es', 'Nuevo Rol', '2014-05-19 22:19:10', '2014-05-19 22:19:10'),
(100, 6, 60, 'en', 'Must enter a username', '2014-05-19 22:49:09', '2014-05-19 22:49:09'),
(101, 7, 60, 'es', 'Debe ingresar un usuario', '2014-05-19 22:49:09', '2014-05-19 22:49:09'),
(102, 6, 61, 'en', 'Must enter a password', '2014-05-19 22:49:45', '2014-05-19 22:49:45'),
(103, 7, 61, 'es', 'Debe ingresar una contraseña', '2014-05-19 22:49:45', '2014-10-29 16:32:08'),
(104, 4, 62, 'en', 'The password must be at least 6 characters', '2014-05-19 22:52:36', '2014-05-19 22:52:36'),
(105, 5, 62, 'es', 'La contraseña debe tener mínimo 6 caracteres', '2014-05-19 22:52:36', '2014-05-19 22:52:36'),
(106, 6, 63, 'en', 'You must select a role', '2014-05-19 22:53:21', '2014-05-19 22:53:21'),
(107, 7, 63, 'es', 'Debe seleccionar un rol', '2014-05-19 22:53:21', '2014-05-19 22:53:21'),
(108, 6, 64, 'en', 'The username you have entered already exists, please enter a different username', '2014-05-20 16:24:46', '2014-05-20 16:24:46'),
(109, 7, 64, 'es', 'El usuario que ha ingresado ya existe , por favor ingrese un username distinto', '2014-05-20 16:24:46', '2014-05-20 16:27:09'),
(110, 6, 65, 'en', 'You must enter a role', '2014-05-20 16:32:13', '2014-05-20 16:32:13'),
(111, 7, 65, 'es', 'Debe Ingresar un rol', '2014-05-20 16:32:13', '2014-05-20 16:32:13'),
(112, 6, 66, 'en', 'The role you have entered already exists, please enter a different role', '2014-05-20 16:33:12', '2014-05-20 16:33:12'),
(113, 7, 66, 'es', 'El rol que ha ingresado ya existe , por favor ingrese un rol distinto', '2014-05-20 16:33:12', '2014-05-20 16:33:12'),
(114, 4, 67, 'en', 'You must enter a role', '2014-05-20 17:46:46', '2014-05-20 17:46:46'),
(115, 5, 67, 'es', 'Debe Ingresar un rol', '2014-05-20 17:46:46', '2014-05-20 17:46:46'),
(116, 4, 68, 'en', 'Edit Roles', '2014-05-20 17:49:09', '2014-05-20 17:49:09'),
(117, 5, 68, 'es', 'Editar Roles', '2014-05-20 17:49:09', '2014-05-20 17:49:09'),
(118, 4, 69, 'en', 'Accept', '2014-05-20 17:58:34', '2014-05-20 17:58:34'),
(119, 5, 69, 'es', 'Aceptar', '2014-05-20 17:58:34', '2014-05-20 17:58:34'),
(120, 4, 70, 'en', 'Cancel', '2014-05-20 17:58:51', '2014-05-20 17:58:51'),
(121, 5, 70, 'es', 'Cancelar', '2014-05-20 17:58:51', '2014-05-20 17:58:51'),
(122, 4, 71, 'en', 'Are you sure you want to delete this role', '2014-05-20 18:00:01', '2014-05-20 18:00:01'),
(123, 5, 71, 'es', 'Esta seguro que desea eliminar este rol', '2014-05-20 18:00:01', '2014-05-20 18:00:01'),
(124, 4, 72, 'en', 'Roles Detail', '2014-05-20 18:02:42', '2014-05-20 18:02:42'),
(125, 5, 72, 'es', 'Detalle de Roles', '2014-05-20 18:02:42', '2014-05-20 18:02:42'),
(126, 4, 73, 'en', 'Delete Role', '2014-05-20 18:03:04', '2014-05-20 18:03:04'),
(127, 5, 73, 'es', 'Eliminar Rol', '2014-05-20 18:03:04', '2014-05-20 18:03:04'),
(128, 4, 74, 'en', 'Role List', '2014-05-20 18:06:08', '2014-05-20 18:06:08'),
(129, 5, 74, 'es', 'Lista de Roles', '2014-05-20 18:06:08', '2014-05-20 18:06:08'),
(130, 4, 75, 'en', 'Name', '2014-05-21 18:10:27', '2014-05-21 18:44:35'),
(131, 5, 75, 'es', 'Nombre', '2014-05-21 18:10:27', '2014-05-21 18:44:35'),
(132, 4, 76, 'en', 'Phone', '2014-05-21 18:10:52', '2014-05-21 18:44:47'),
(133, 5, 76, 'es', 'Teléfono', '2014-05-21 18:10:52', '2014-05-21 18:44:47'),
(134, 4, 77, 'en', 'C.Companies', '2014-05-21 18:14:44', '2014-05-21 18:27:13'),
(135, 5, 77, 'es', 'Constructoras', '2014-05-21 18:14:44', '2014-05-21 18:14:44'),
(136, 4, 78, 'en', 'Construction Companies', '2014-05-21 18:25:48', '2014-05-21 18:25:48'),
(137, 5, 78, 'es', 'Constructoras', '2014-05-21 18:25:48', '2014-05-21 18:25:48'),
(138, 4, 79, 'en', 'Address', '2014-05-21 18:45:28', '2014-05-21 18:45:28'),
(139, 5, 79, 'es', 'Dirección', '2014-05-21 18:45:28', '2014-05-21 18:45:28'),
(140, 6, 80, 'en', 'You must enter a name', '2014-05-21 21:32:49', '2014-05-21 21:32:49'),
(141, 7, 80, 'es', 'Debe ingresar un nombre', '2014-05-21 21:32:49', '2014-05-21 21:32:49'),
(142, 4, 81, 'en', 'You must enter a name', '2014-05-21 21:33:22', '2014-05-21 21:33:22'),
(143, 5, 81, 'es', 'Debe ingresar un nombre', '2014-05-21 21:33:22', '2014-05-21 21:33:22'),
(144, 6, 82, 'en', 'You must enter a phone number', '2014-05-21 21:35:42', '2014-05-21 21:35:42'),
(145, 7, 82, 'es', 'Debe ingresar un número de teléfono', '2014-05-21 21:35:42', '2014-05-21 21:35:42'),
(146, 6, 83, 'en', 'That name already exists, please check', '2014-05-21 21:37:06', '2014-05-21 21:37:06'),
(147, 7, 83, 'es', 'Ya existe ese nombre,por favor verifique', '2014-05-21 21:37:06', '2014-05-21 21:37:06'),
(148, 4, 84, 'en', 'You must enter a phone number', '2014-05-21 21:38:52', '2014-05-21 21:38:52'),
(149, 5, 84, 'es', 'Debe ingresar un número de teléfono', '2014-05-21 21:38:52', '2014-05-21 21:38:52'),
(150, 4, 85, 'en', 'The phone must be numeric', '2014-05-21 21:39:23', '2014-05-21 21:39:23'),
(151, 5, 85, 'es', 'El teléfono debe ser numérico', '2014-05-21 21:39:23', '2014-05-21 21:39:23'),
(152, 4, 86, 'en', 'Edit construction company', '2014-05-21 21:53:14', '2014-06-04 23:53:21'),
(153, 5, 86, 'es', 'Editar constructora', '2014-05-21 21:53:14', '2014-06-04 23:53:21'),
(154, 4, 87, 'en', 'Construct Company Details', '2014-05-21 22:31:29', '2014-05-21 22:31:29'),
(155, 5, 87, 'es', 'Detalles de la constructora', '2014-05-21 22:31:29', '2014-05-21 22:31:29'),
(156, 4, 88, 'en', 'Delete construct company', '2014-05-21 22:32:08', '2014-05-21 22:32:08'),
(157, 5, 88, 'es', 'Eliminar constructora', '2014-05-21 22:32:08', '2014-05-21 22:32:08'),
(158, 4, 89, 'en', 'Are you sure you want to delete this construction company', '2014-05-21 22:35:50', '2014-05-21 22:35:50'),
(159, 5, 89, 'es', 'Esta seguro que desea eliminar esta constructora', '2014-05-21 22:35:50', '2014-05-21 22:35:50'),
(160, 4, 90, 'en', 'Code', '2014-05-21 23:20:53', '2014-05-21 23:20:53'),
(161, 5, 90, 'es', 'Código', '2014-05-21 23:20:53', '2014-05-21 23:20:53'),
(162, 4, 91, 'en', 'Website', '2014-05-21 23:27:48', '2014-05-21 23:27:48'),
(163, 5, 91, 'es', 'Página web', '2014-05-21 23:27:48', '2014-05-21 23:27:48'),
(164, 4, 92, 'en', 'Construction Company', '2014-05-21 23:28:57', '2014-05-21 23:28:57'),
(165, 5, 92, 'es', 'Constructora', '2014-05-21 23:28:57', '2014-05-21 23:28:57'),
(166, 4, 93, 'en', 'You must enter a name', '2014-05-22 22:34:24', '2014-05-22 22:34:24'),
(167, 5, 93, 'es', 'Debe ingresar un nombre', '2014-05-22 22:34:24', '2014-05-22 22:34:24'),
(168, 4, 94, 'en', 'You must enter a phone', '2014-05-22 22:35:18', '2014-05-22 22:35:18'),
(169, 5, 94, 'es', 'Debe ingresar un teléfono', '2014-05-22 22:35:18', '2014-05-22 22:35:18'),
(170, 4, 95, 'en', 'The phone must be numeric', '2014-05-22 22:36:14', '2014-05-22 22:36:14'),
(171, 5, 95, 'es', 'El teléfono debe ser numérico', '2014-05-22 22:36:14', '2014-05-22 22:36:14'),
(172, 4, 96, 'en', 'You must enter an address', '2014-05-22 22:37:34', '2014-05-22 22:37:34'),
(173, 5, 96, 'es', 'Debe ingresar una dirección', '2014-05-22 22:37:34', '2014-05-22 22:37:34'),
(174, 4, 97, 'en', 'You must enter a code', '2014-05-22 22:38:11', '2014-05-22 22:38:11'),
(175, 5, 97, 'es', 'Debe ingresar un código', '2014-05-22 22:38:11', '2014-05-22 22:38:11'),
(176, 4, 98, 'en', 'You must enter a name', '2014-05-22 22:49:59', '2014-05-22 22:49:59'),
(177, 5, 98, 'es', 'Debe ingresar un nombre', '2014-05-22 22:49:59', '2014-05-22 22:49:59'),
(178, 4, 99, 'en', 'You must enter a phone number', '2014-05-22 22:51:32', '2014-05-22 22:51:32'),
(179, 5, 99, 'es', 'Debe ingresar un teléfono', '2014-05-22 22:51:32', '2014-05-22 22:51:32'),
(180, 4, 100, 'en', 'You must enter a code', '2014-05-22 22:52:00', '2014-05-22 22:52:00'),
(181, 5, 100, 'es', 'Debe ingresar un código', '2014-05-22 22:52:00', '2014-05-22 22:52:00'),
(182, 4, 101, 'en', 'There is already a condo with that name, please check', '2014-05-22 22:53:28', '2014-05-22 22:53:28'),
(183, 5, 101, 'es', 'Ya existe un condominio con ese nombre,por favor verifique', '2014-05-22 22:53:28', '2014-05-22 22:53:28'),
(184, 4, 102, 'en', 'The data entered does not correspond to a valid email address', '2014-05-22 23:06:41', '2014-05-22 23:06:41'),
(185, 5, 102, 'es', 'Los datos ingresados no corresponde a un email válido', '2014-05-22 23:06:41', '2014-05-22 23:06:41'),
(186, 4, 103, 'en', 'New Condo', '2014-05-22 23:26:07', '2014-05-22 23:26:07'),
(187, 5, 103, 'es', 'Nuevo Condominio', '2014-05-22 23:26:07', '2014-05-22 23:26:07'),
(188, 4, 104, 'en', 'Edit Condo', '2014-05-22 23:26:22', '2014-05-22 23:26:22'),
(189, 5, 104, 'es', 'Editar Condominio', '2014-05-22 23:26:22', '2014-05-22 23:26:22'),
(190, 4, 105, 'en', 'Condominiums', '2014-05-22 23:26:50', '2014-05-22 23:26:50'),
(191, 5, 105, 'es', 'Condominios', '2014-05-22 23:26:50', '2014-05-22 23:26:50'),
(192, 4, 106, 'en', 'Delete Condo', '2014-05-22 23:27:17', '2014-05-22 23:27:17'),
(193, 5, 106, 'es', 'Eliminar condominio', '2014-05-22 23:27:17', '2014-05-22 23:27:17'),
(194, 4, 107, 'en', 'Are you sure you want to delete this condominium', '2014-05-22 23:28:12', '2014-05-22 23:28:12'),
(195, 5, 107, 'es', 'Esta seguro que desea eliminar este condominio', '2014-05-22 23:28:12', '2014-05-22 23:28:12'),
(196, 4, 108, 'en', 'Condominium details', '2014-05-22 23:28:52', '2014-05-22 23:28:52'),
(197, 5, 108, 'es', 'Detalles del condominio', '2014-05-22 23:28:52', '2014-05-22 23:28:52'),
(198, 4, 109, 'en', 'Select a condominium', '2014-05-23 16:08:06', '2014-05-23 16:08:06'),
(199, 5, 109, 'es', 'Seleccione un condominio', '2014-05-23 16:08:06', '2014-05-23 16:08:06'),
(200, 4, 110, 'en', 'New Tower', '2014-05-23 16:30:51', '2014-05-23 16:30:51'),
(201, 5, 110, 'es', 'Nueva Torre', '2014-05-23 16:30:51', '2014-05-23 16:30:51'),
(202, 4, 111, 'en', 'Number of apartments', '2014-05-23 16:33:43', '2014-05-23 16:33:43'),
(203, 5, 111, 'es', 'Número de apartamentos', '2014-05-23 16:33:43', '2014-05-23 16:33:43'),
(204, 4, 112, 'en', 'Number of deposits', '2014-05-23 17:43:29', '2014-05-23 17:43:29'),
(205, 5, 112, 'es', 'Número de depósitos', '2014-05-23 17:43:29', '2014-05-23 17:43:29'),
(206, 4, 113, 'en', 'Number of parking', '2014-05-23 17:43:51', '2014-05-23 17:43:51'),
(207, 5, 113, 'es', 'Número de estacionamientos', '2014-05-23 17:43:51', '2014-05-23 17:43:51'),
(208, 4, 114, 'en', 'Number of apartments per floor', '2014-05-23 17:44:18', '2014-05-23 17:44:18'),
(209, 5, 114, 'es', 'Cantidad de apartamentos por piso', '2014-05-23 17:44:18', '2014-05-23 17:44:18'),
(210, 4, 115, 'en', 'You must enter a name tower', '2014-05-23 21:16:06', '2014-05-23 21:16:06'),
(211, 5, 115, 'es', 'Debe Ingresar un nombre de torre', '2014-05-23 21:16:06', '2014-05-23 21:16:06'),
(212, 4, 116, 'en', 'You must enter a valid email address', '2014-05-23 21:21:17', '2014-05-23 21:21:17'),
(213, 5, 116, 'es', 'Debe ingresar un email válido', '2014-05-23 21:21:17', '2014-05-23 21:21:17'),
(214, 6, 117, 'en', 'The number of apartments must be an integer', '2014-05-23 21:22:38', '2014-05-23 21:22:38'),
(215, 7, 117, 'es', 'El número de apartamentos debe ser un número entero', '2014-05-23 21:22:38', '2014-05-23 21:22:38'),
(216, 6, 118, 'en', 'The number of deposits must be an integer', '2014-05-23 21:25:00', '2014-05-23 21:25:00'),
(217, 7, 118, 'es', 'El número de depósitos debe ser un número entero', '2014-05-23 21:25:00', '2014-05-23 21:25:00'),
(218, 6, 119, 'en', 'The number of parking spaces must be an integer', '2014-05-23 21:25:44', '2014-05-23 21:25:44'),
(219, 7, 119, 'es', 'El número de estacionamientos debe ser un número entero', '2014-05-23 21:25:44', '2014-05-23 21:25:44'),
(220, 6, 120, 'en', 'The number of apartments per floor must be an integer', '2014-05-23 21:26:14', '2014-05-23 21:26:14'),
(221, 7, 120, 'es', 'La cantidad de apartamentos por piso debe ser un número entero', '2014-05-23 21:26:14', '2014-05-23 21:26:14'),
(222, 6, 121, 'en', 'There is already a tower with that name, please enter a different name', '2014-05-23 21:26:45', '2014-05-23 21:26:45'),
(223, 7, 121, 'es', 'Ya existe una torre con ese nombre , por favor ingrese un nombre distinto', '2014-05-23 21:26:45', '2014-05-23 21:26:45'),
(224, 4, 122, 'en', 'There is already a tower with this email, please enter a different email', '2014-05-23 21:27:18', '2014-05-23 21:27:18'),
(225, 5, 122, 'es', 'Ya existe una torre con ese email , por favor ingrese un email distinto', '2014-05-23 21:27:18', '2014-05-23 21:27:18'),
(226, 6, 123, 'en', 'You must select a condo', '2014-05-23 21:33:34', '2014-05-23 21:33:34'),
(227, 7, 123, 'es', 'Debe seleccionar un condominio', '2014-05-23 21:33:34', '2014-05-23 21:33:34'),
(228, 4, 124, 'en', 'You must select a condo', '2014-05-23 21:54:19', '2014-05-23 21:54:19'),
(229, 5, 124, 'es', 'Debe seleccionar un condominio', '2014-05-23 21:54:19', '2014-05-23 21:54:19'),
(230, 4, 125, 'en', 'You must enter a name', '2014-05-23 21:55:10', '2014-05-23 21:55:10'),
(231, 5, 125, 'es', 'Debe Ingresar un Nombre', '2014-05-23 21:55:10', '2014-05-23 21:55:10'),
(232, 4, 126, 'en', 'You must enter a valid email address', '2014-05-23 21:57:06', '2014-05-23 21:57:06'),
(233, 5, 126, 'es', 'Debe ingresar un email válido', '2014-05-23 21:57:06', '2014-05-23 21:57:06'),
(234, 4, 127, 'en', 'The number of apartments must be an integer', '2014-05-23 21:57:40', '2014-05-23 21:57:40'),
(235, 5, 127, 'es', 'El número de apartamentos debe ser un número entero', '2014-05-23 21:57:40', '2014-05-23 21:57:40'),
(236, 4, 128, 'en', 'The number of deposits must be an integer', '2014-05-23 21:58:03', '2014-05-23 21:58:03'),
(237, 5, 128, 'es', 'El número de depósitos debe ser un número entero', '2014-05-23 21:58:03', '2014-05-23 21:58:03'),
(238, 4, 129, 'en', 'The number of parking spaces must be an integer', '2014-05-23 21:58:30', '2014-05-23 21:58:30'),
(239, 5, 129, 'es', 'El número de estacionamientos debe ser un número entero', '2014-05-23 21:58:30', '2014-05-23 21:58:30'),
(240, 4, 130, 'en', 'the number of apartments per floor must be an integer', '2014-05-23 21:58:57', '2014-05-23 21:58:57'),
(241, 5, 130, 'es', 'la cantidad de apartamentos por piso debe ser un número entero', '2014-05-23 21:58:57', '2014-05-23 21:58:57'),
(242, 4, 131, 'en', 'Edit Tower', '2014-05-23 22:03:16', '2014-05-23 22:03:16'),
(243, 5, 131, 'es', 'Editar Torre', '2014-05-23 22:03:16', '2014-05-23 22:03:16'),
(244, 4, 132, 'en', 'List of towers', '2014-05-23 22:15:24', '2014-05-23 22:15:24'),
(245, 5, 132, 'es', 'Lista de torres', '2014-05-23 22:15:24', '2014-05-23 22:15:24'),
(246, 4, 133, 'en', 'Delete tower', '2014-05-23 22:15:46', '2014-05-23 22:15:46'),
(247, 5, 133, 'es', 'Eliminar torre', '2014-05-23 22:15:46', '2014-05-23 22:15:46'),
(248, 4, 134, 'en', 'Details', '2014-05-23 22:26:25', '2014-05-23 22:26:25'),
(249, 5, 134, 'es', 'Detalles', '2014-05-23 22:26:25', '2014-05-23 22:26:25'),
(250, 4, 135, 'en', 'Employees', '2014-05-23 22:27:52', '2014-05-23 22:27:52'),
(251, 5, 135, 'es', 'Empleados', '2014-05-23 22:27:52', '2014-05-23 22:27:52'),
(252, 4, 136, 'en', 'Are you sure you want to delete this tower', '2014-05-23 22:30:10', '2014-05-23 22:30:10'),
(253, 5, 136, 'es', 'Esta seguro que desea eliminar esta Torre', '2014-05-23 22:30:10', '2014-05-23 22:30:10'),
(254, 6, 137, 'en', 'You must select a condo', '2014-05-26 18:07:51', '2014-05-26 18:07:51'),
(255, 7, 137, 'es', 'Debe seleccionar un condominio', '2014-05-26 18:07:51', '2014-05-26 18:07:51'),
(256, 4, 138, 'en', 'You must select a condo', '2014-05-26 18:12:42', '2014-05-26 18:12:42'),
(257, 5, 138, 'es', 'Debe seleccionar un condominio', '2014-05-26 18:12:42', '2014-05-26 18:12:42'),
(258, 6, 139, 'en', 'You must select a tower', '2014-05-29 16:00:54', '2014-05-29 16:00:54'),
(259, 7, 139, 'es', 'Debe seleccionar una torre', '2014-05-29 16:00:54', '2014-05-29 16:00:54'),
(260, 6, 140, 'en', 'You must enter a phone number', '2014-05-29 16:01:28', '2014-05-29 16:01:28'),
(261, 7, 140, 'es', 'Debe ingresar un número telefónico', '2014-05-29 16:01:28', '2014-05-29 16:01:28'),
(262, 6, 141, 'en', 'You must enter a number of residents', '2014-05-29 16:01:53', '2014-05-29 16:01:53'),
(263, 7, 141, 'es', 'Debe ingresar un número de residentes', '2014-05-29 16:01:53', '2014-05-29 16:01:53'),
(264, 6, 142, 'en', 'You must enter a number of flat', '2014-05-29 16:02:27', '2014-05-29 16:02:27'),
(265, 7, 142, 'es', 'Debe ingresar un número de piso', '2014-05-29 16:02:27', '2014-05-29 16:02:27'),
(266, 6, 143, 'en', 'There is already an apartment with that number for the selected tower', '2014-05-29 16:02:57', '2014-05-29 16:02:57'),
(267, 7, 143, 'es', 'Ya existe un apartamento con ese número, para la torre seleccionada', '2014-05-29 16:02:57', '2014-05-29 16:02:57'),
(268, 4, 144, 'en', 'You must enter a phone number', '2014-05-29 16:03:55', '2014-05-29 16:03:55'),
(269, 5, 144, 'es', 'Debe ingresar un número de teléfono', '2014-05-29 16:03:55', '2014-05-29 16:03:55'),
(270, 4, 145, 'en', 'The phone number must be numeric', '2014-05-29 16:05:28', '2014-05-29 16:05:28'),
(271, 5, 145, 'es', 'El número de teléfono debe ser numerico', '2014-05-29 16:05:28', '2014-05-29 16:05:28'),
(272, 4, 146, 'en', 'You must enter an apartment number', '2014-05-29 16:06:14', '2014-05-29 16:06:14'),
(273, 5, 146, 'es', 'Debe ingresar un número de apartamento', '2014-05-29 16:06:14', '2014-05-29 16:06:14'),
(274, 6, 147, 'en', 'You must enter an apartment number', '2014-05-29 16:06:36', '2014-05-29 16:06:36'),
(275, 7, 147, 'es', 'Debe ingresar un número de apartamento', '2014-05-29 16:06:36', '2014-05-29 16:06:36'),
(276, 4, 148, 'en', 'Please enter quantity of residentes', '2014-05-29 16:07:13', '2014-05-29 16:07:13'),
(277, 5, 148, 'es', 'Debe ingresar la cantidad de residentes', '2014-05-29 16:07:13', '2014-05-29 16:07:13'),
(278, 4, 149, 'en', 'You must enter the number of flat', '2014-05-29 16:07:43', '2014-05-29 16:07:43'),
(279, 5, 149, 'es', 'Debe ingresar el número de piso', '2014-05-29 16:07:43', '2014-05-29 16:07:43'),
(280, 4, 150, 'en', 'The floor number must be numeric', '2014-05-29 16:08:13', '2014-05-29 16:08:13'),
(281, 5, 150, 'es', 'El número de piso debe ser numérico', '2014-05-29 16:08:13', '2014-05-29 16:08:13'),
(282, 4, 151, 'en', 'You must enter a pet type', '2014-05-29 16:08:48', '2014-05-29 16:08:48'),
(283, 5, 151, 'es', 'Debe ingresar un tipo de mascota', '2014-05-29 16:08:48', '2014-05-29 16:08:48'),
(284, 4, 152, 'en', 'You must enter the number of pets', '2014-05-29 16:09:20', '2014-05-29 16:09:20'),
(285, 5, 152, 'es', 'Debe ingresar la cantidad de mascotas', '2014-05-29 16:09:20', '2014-05-29 16:09:20'),
(286, 4, 153, 'en', 'The number of pets must be numeric', '2014-05-29 16:10:00', '2014-05-29 16:10:00'),
(287, 5, 153, 'es', 'La cantidad de mascotas debe ser un valor numérico', '2014-05-29 16:10:00', '2014-05-29 16:10:00'),
(288, 4, 154, 'en', 'You must enter the number of children', '2014-05-29 16:10:31', '2014-05-29 16:10:31'),
(289, 5, 154, 'es', 'Debe ingresar la cantidad de niños', '2014-05-29 16:10:31', '2014-05-29 16:10:31'),
(290, 4, 155, 'en', 'The number of children must be a numeric value', '2014-05-29 16:11:16', '2014-05-29 16:11:16'),
(291, 5, 155, 'es', 'La cantidad de niños debe ser un valor numérico', '2014-05-29 16:11:16', '2014-05-29 16:11:16'),
(292, 4, 156, 'en', 'You must select a condo', '2014-05-29 16:11:51', '2014-11-27 11:08:15'),
(293, 5, 156, 'es', 'Debe seleccionar un condominio', '2014-05-29 16:11:51', '2014-11-27 11:08:15'),
(294, 4, 157, 'en', 'You must select a tower', '2014-05-29 16:12:21', '2014-05-29 16:12:21'),
(295, 5, 157, 'es', 'Debe seleccionar una torre', '2014-05-29 16:12:21', '2014-05-29 16:12:21'),
(296, 4, 158, 'en', 'New Apartment', '2014-05-29 16:28:46', '2014-05-29 16:28:46'),
(297, 5, 158, 'es', 'Nuevo Apartamento', '2014-05-29 16:28:46', '2014-05-29 16:28:46'),
(298, 4, 159, 'en', 'Tower', '2014-05-29 16:29:06', '2014-05-29 16:29:06'),
(299, 5, 159, 'es', 'Torre', '2014-05-29 16:29:06', '2014-05-29 16:29:06'),
(300, 4, 160, 'en', 'Apartment number', '2014-05-29 16:29:29', '2014-05-29 16:29:29'),
(301, 5, 160, 'es', 'Número de apartamento', '2014-05-29 16:29:29', '2014-05-29 16:29:29'),
(302, 4, 161, 'en', 'Phone Number', '2014-05-29 16:30:02', '2014-05-29 16:30:02'),
(303, 5, 161, 'es', 'Numero de teléfono', '2014-05-29 16:30:02', '2014-05-29 16:30:02'),
(304, 4, 162, 'en', 'Number of residents', '2014-05-29 16:30:54', '2014-05-29 16:30:54'),
(305, 5, 162, 'es', 'Cantidad de residentes', '2014-05-29 16:30:54', '2014-05-29 16:30:54'),
(306, 4, 163, 'en', 'Number of floor', '2014-05-29 16:31:27', '2014-05-29 16:31:27'),
(307, 5, 163, 'es', 'Número de piso', '2014-05-29 16:31:27', '2014-05-29 16:31:27'),
(308, 4, 164, 'en', 'Area', '2014-05-29 16:33:24', '2014-05-29 16:33:24'),
(309, 5, 164, 'es', 'Area', '2014-05-29 16:33:24', '2014-05-29 16:33:24'),
(310, 4, 165, 'en', 'Number of rooms', '2014-05-29 16:34:18', '2014-05-29 16:34:18'),
(311, 5, 165, 'es', 'Cantidad de habitaciones', '2014-05-29 16:34:18', '2014-05-29 16:34:18'),
(312, 4, 166, 'en', '¿Do yo have a made?', '2014-05-29 16:35:34', '2014-05-29 16:35:34'),
(313, 5, 166, 'es', '¿Tiene empleada?', '2014-05-29 16:35:34', '2014-05-29 16:35:34'),
(314, 4, 167, 'en', '¿Do you have babysitter?', '2014-05-29 16:37:07', '2014-05-29 16:37:07'),
(315, 5, 167, 'es', '¿Tiene niñera?', '2014-05-29 16:37:07', '2014-05-29 16:37:07'),
(316, 4, 168, 'en', 'Pet type', '2014-05-29 16:37:42', '2014-05-29 16:37:42'),
(317, 5, 168, 'es', 'Tipo de mascota', '2014-05-29 16:37:42', '2014-05-29 16:37:42'),
(318, 4, 169, 'en', 'Number of pets', '2014-05-29 16:38:04', '2014-05-29 16:38:04'),
(319, 5, 169, 'es', 'Cantidad de mascotas', '2014-05-29 16:38:04', '2014-05-29 16:38:04'),
(320, 4, 170, 'en', '¿Do you have pets?', '2014-05-29 16:39:52', '2014-05-29 16:39:52'),
(321, 5, 170, 'es', '¿Tiene mascotas?', '2014-05-29 16:39:52', '2014-05-29 16:39:52'),
(322, 4, 171, 'en', '¿Do you have a made room?', '2014-05-29 16:40:41', '2014-05-29 16:40:41'),
(323, 5, 171, 'es', '¿Tiene cuarto de empleada?', '2014-05-29 16:40:41', '2014-05-29 16:40:41'),
(324, 4, 172, 'en', '¿Are there children living there?', '2014-05-29 16:41:22', '2014-05-29 16:41:22'),
(325, 5, 172, 'es', '¿Hay niños viviendo ahi?', '2014-05-29 16:41:22', '2014-05-29 16:41:22'),
(326, 4, 173, 'en', 'Number of kids', '2014-05-29 16:42:12', '2014-05-29 16:42:12'),
(327, 5, 173, 'es', 'Cantida de niños', '2014-05-29 16:42:12', '2014-05-29 16:42:12'),
(328, 4, 174, 'en', 'YES', '2014-05-29 16:47:10', '2014-05-29 16:47:10'),
(329, 5, 174, 'es', 'SI', '2014-05-29 16:47:10', '2014-05-29 16:47:10'),
(330, 4, 175, 'en', 'Select a tower', '2014-05-29 16:48:19', '2014-05-29 16:48:19'),
(331, 5, 175, 'es', 'Seleccione una torre', '2014-05-29 16:48:19', '2014-05-29 16:48:19'),
(332, 4, 176, 'en', 'Edit Apartment', '2014-05-29 18:38:49', '2014-05-29 18:38:49'),
(333, 5, 176, 'es', 'Editar Apartamento', '2014-05-29 18:38:49', '2014-05-29 18:38:49'),
(334, 4, 177, 'en', 'Id number', '2014-05-29 19:26:14', '2014-05-29 19:26:14'),
(335, 5, 177, 'es', 'cédula', '2014-05-29 19:26:14', '2014-05-29 19:26:14'),
(336, 4, 178, 'en', 'position', '2014-05-29 19:26:56', '2014-05-29 19:26:56'),
(337, 5, 178, 'es', 'cargo', '2014-05-29 19:26:56', '2014-05-29 19:26:56'),
(338, 4, 179, 'en', 'Apartment Details', '2014-05-29 19:44:21', '2014-05-29 19:44:21'),
(339, 5, 179, 'es', 'Detalles del Apartamento', '2014-05-29 19:44:21', '2014-05-29 19:44:21'),
(340, 4, 180, 'en', 'Aparment list', '2014-05-29 19:44:47', '2014-05-29 19:44:47'),
(341, 5, 180, 'es', 'Lista de apartamentos', '2014-05-29 19:44:47', '2014-05-29 19:44:47'),
(342, 4, 181, 'en', 'Delete apartment', '2014-05-29 19:45:14', '2014-05-29 19:45:14'),
(343, 5, 181, 'es', 'Eliminar apartamento', '2014-05-29 19:45:14', '2014-05-29 19:45:14'),
(344, 4, 182, 'en', 'Are you sure you want to delete this Apartment', '2014-05-29 19:46:57', '2014-05-29 19:46:57'),
(345, 5, 182, 'es', 'Esta seguro que desea eliminar este Apartamento', '2014-05-29 19:46:57', '2014-05-29 19:46:57'),
(346, 4, 183, 'en', 'Id Number', '2014-05-29 19:50:15', '2014-05-29 19:50:15'),
(347, 5, 183, 'es', 'Num Identificación', '2014-05-29 19:50:15', '2014-05-29 19:50:15'),
(348, 4, 184, 'en', 'You must select a condo', '2014-06-02 18:13:03', '2014-06-02 18:13:03'),
(349, 5, 184, 'es', 'Debe seleccionar un condominio', '2014-06-02 18:13:03', '2014-06-02 18:13:03'),
(350, 4, 185, 'en', 'Salary', '2014-06-02 21:19:09', '2014-06-02 21:19:09'),
(351, 5, 185, 'es', 'Salario', '2014-06-02 21:19:09', '2014-06-02 21:19:09'),
(352, 4, 186, 'en', 'Position', '2014-06-02 21:21:59', '2014-06-02 21:21:59'),
(353, 5, 186, 'es', 'Puesto', '2014-06-02 21:21:59', '2014-06-02 21:21:59'),
(354, 4, 187, 'en', 'Working on towers', '2014-06-02 21:24:08', '2014-06-02 21:24:08'),
(355, 5, 187, 'es', 'Torres en las que trabaja', '2014-06-02 21:24:08', '2014-06-02 21:24:08'),
(356, 4, 188, 'en', 'You must enter the name of the employee', '2014-06-02 21:27:38', '2014-06-02 21:27:38'),
(357, 5, 188, 'es', 'Debe Ingresar el nombre del empleado', '2014-06-02 21:27:38', '2014-06-02 21:27:38'),
(358, 4, 189, 'en', 'You must enter the employee ID number', '2014-06-02 21:28:07', '2014-06-02 21:28:07'),
(359, 5, 189, 'es', 'Debe ingresar el número de cédula del empleado', '2014-06-02 21:28:07', '2014-06-02 21:28:07'),
(360, 4, 190, 'en', 'You must enter the employee''s salary', '2014-06-02 21:29:02', '2014-06-02 21:29:02'),
(361, 5, 190, 'es', 'Debe ingresar el salario del empleado', '2014-06-02 21:29:02', '2014-06-02 21:29:02'),
(362, 4, 191, 'en', 'The salary of the employee must be a number', '2014-06-02 21:29:32', '2014-06-02 21:29:32'),
(363, 5, 191, 'es', 'El salario del empleado debe ser un número', '2014-06-02 21:29:32', '2014-06-02 21:29:32'),
(364, 4, 192, 'en', 'You must enter the employee''s position', '2014-06-02 21:29:59', '2014-06-02 21:31:11'),
(365, 5, 192, 'es', 'Debe ingresar el puesto del empleado', '2014-06-02 21:29:59', '2014-06-02 21:32:31'),
(366, 4, 193, 'en', 'New Employee', '2014-06-02 21:33:56', '2014-06-02 21:33:56'),
(367, 5, 193, 'es', 'Nuevo Empleado', '2014-06-02 21:33:56', '2014-06-02 21:33:56'),
(368, 4, 194, 'en', 'Edit Employee', '2014-06-02 22:40:39', '2014-06-02 22:40:39'),
(369, 5, 194, 'es', 'Editar Empleado', '2014-06-02 22:40:39', '2014-06-02 22:40:39'),
(370, 4, 195, 'en', 'Employee Detail', '2014-06-02 22:48:57', '2014-06-02 22:48:57'),
(371, 5, 195, 'es', 'Detalles del Empleado', '2014-06-02 22:48:57', '2014-06-02 22:48:57'),
(372, 4, 196, 'en', 'Are you sure you want to delete this employee', '2014-06-02 22:50:01', '2014-06-02 22:50:01'),
(373, 5, 196, 'es', 'Esta seguro que desea eliminar este empleado', '2014-06-02 22:50:01', '2014-06-02 22:50:01'),
(374, 4, 197, 'en', 'Delete employee', '2014-06-02 22:50:19', '2014-06-02 22:50:19'),
(375, 5, 197, 'es', 'Eliminar empleado', '2014-06-02 22:50:19', '2014-06-02 22:50:19'),
(376, 6, 198, 'en', 'You must select a condo', '2014-06-02 23:37:47', '2014-06-02 23:37:47'),
(377, 7, 198, 'es', 'Debe seleccionar un condominio', '2014-06-02 23:37:47', '2014-06-02 23:37:47'),
(378, 6, 199, 'en', 'You must enter a name', '2014-06-02 23:38:49', '2014-06-02 23:38:49'),
(379, 7, 199, 'es', 'Debe ingresar un nombre', '2014-06-02 23:38:49', '2014-06-02 23:38:49'),
(380, 6, 200, 'en', 'You must enter a Id number', '2014-06-02 23:39:22', '2014-06-02 23:39:22'),
(381, 7, 200, 'es', 'Debe ingresar un número de cédula', '2014-06-02 23:39:22', '2014-06-02 23:39:22'),
(382, 6, 201, 'en', 'You must select a tower', '2014-06-02 23:40:06', '2014-06-02 23:40:06'),
(383, 7, 201, 'es', 'Debe seleccionar una torre', '2014-06-02 23:40:06', '2014-06-02 23:40:06'),
(384, 4, 202, 'en', 'New Provider', '2014-06-04 17:11:05', '2014-06-04 17:11:05'),
(385, 5, 202, 'es', 'Nuevo Proveedor', '2014-06-04 17:11:05', '2014-06-04 17:11:05'),
(386, 6, 203, 'en', 'You must select a condo', '2014-06-04 17:39:01', '2014-06-04 17:39:01'),
(387, 7, 203, 'es', 'Debe seleccionar un condominio', '2014-06-04 17:39:01', '2014-06-04 17:39:01'),
(388, 6, 204, 'en', 'You must enter a name', '2014-06-04 17:41:46', '2014-06-04 17:41:46'),
(389, 7, 204, 'es', 'Debe ingresar un nombre', '2014-06-04 17:41:46', '2014-06-04 17:41:46'),
(390, 6, 205, 'en', 'The email must be valid', '2014-06-04 17:43:22', '2014-06-04 17:43:22'),
(391, 7, 205, 'es', 'El email debe ser valido', '2014-06-04 17:43:22', '2014-06-04 17:43:22'),
(392, 6, 206, 'en', 'You must enter a phone number', '2014-06-04 17:43:46', '2014-06-04 17:43:46'),
(393, 7, 206, 'es', 'Debe ingresar un número telefónico', '2014-06-04 17:43:46', '2014-06-04 17:43:46'),
(394, 4, 207, 'en', 'You must select a condo', '2014-06-04 22:22:50', '2014-06-04 22:22:50'),
(395, 5, 207, 'es', 'Debe seleccionar un condominio', '2014-06-04 22:22:50', '2014-06-04 22:22:50'),
(396, 4, 208, 'en', 'You must enter a name', '2014-06-04 22:24:20', '2014-06-04 22:24:20'),
(397, 5, 208, 'es', 'Debe ingresar un nombre', '2014-06-04 22:24:20', '2014-06-04 22:24:20'),
(398, 4, 209, 'en', 'The email must be valid', '2014-06-04 22:25:22', '2014-06-04 22:25:22'),
(399, 5, 209, 'es', 'El email debe ser válido', '2014-06-04 22:25:22', '2014-06-04 22:25:22'),
(400, 4, 210, 'en', 'You must enter a phone number', '2014-06-04 22:26:13', '2014-06-04 22:26:13'),
(401, 5, 210, 'es', 'Debe ingresar un número telefónico', '2014-06-04 22:26:13', '2014-06-04 22:26:13'),
(402, 4, 211, 'en', 'The phone must be a number', '2014-06-04 22:26:52', '2014-06-04 22:26:52'),
(403, 5, 211, 'es', 'El teléfono debe ser un número', '2014-06-04 22:26:52', '2014-06-04 22:26:52'),
(404, 4, 212, 'en', 'Edit Provider', '2014-06-04 22:33:44', '2014-06-04 22:33:44'),
(405, 5, 212, 'es', 'Editar Proveedor', '2014-06-04 22:33:44', '2014-06-04 22:33:44'),
(406, 4, 213, 'en', 'Provider details', '2014-06-04 23:36:04', '2014-06-04 23:36:04'),
(407, 5, 213, 'es', 'Detalles del proveedor', '2014-06-04 23:36:04', '2014-06-04 23:36:04'),
(408, 4, 214, 'en', 'Providers list', '2014-06-04 23:37:16', '2014-06-04 23:37:16'),
(409, 5, 214, 'es', 'Lista de proveedores', '2014-06-04 23:37:16', '2014-06-04 23:37:16'),
(410, 4, 215, 'en', 'Delete provider', '2014-06-04 23:37:35', '2014-06-04 23:37:35'),
(411, 5, 215, 'es', 'Eliminar proveedor', '2014-06-04 23:37:35', '2014-06-04 23:37:35'),
(412, 4, 216, 'en', 'Are you sure you want to delete this provider', '2014-06-04 23:39:05', '2014-06-04 23:39:05'),
(413, 5, 216, 'es', 'Esta seguro que desea eliminar este proveedor', '2014-06-04 23:39:05', '2014-06-04 23:39:05'),
(414, 4, 217, 'en', 'New construction company', '2014-06-04 23:48:54', '2014-06-04 23:48:54'),
(415, 5, 217, 'es', 'Nueva constructora', '2014-06-04 23:48:54', '2014-06-04 23:48:54'),
(416, 6, 218, 'en', 'You must select a condo', '2014-06-05 16:34:47', '2014-06-05 16:34:47'),
(417, 7, 218, 'es', 'Debe seleccionar un condominio', '2014-06-05 16:34:47', '2014-06-05 16:34:47'),
(418, 4, 219, 'en', 'Resident type', '2014-06-05 16:44:48', '2014-06-05 16:44:48'),
(419, 5, 219, 'es', 'Tipo de residente', '2014-06-05 16:44:48', '2014-06-05 16:44:48'),
(420, 4, 220, 'en', 'New resident type', '2014-06-05 16:47:49', '2014-06-05 16:47:49'),
(421, 5, 220, 'es', 'Nuevo tipo de residente', '2014-06-05 16:47:49', '2014-06-05 16:47:49'),
(422, 4, 221, 'en', 'You must enter a resident type', '2014-06-05 16:51:27', '2014-06-05 16:51:27'),
(423, 5, 221, 'es', 'Debe ingresar el tipo de residente', '2014-06-05 16:51:27', '2014-06-05 16:51:27'),
(424, 4, 222, 'en', 'You must enter a resident type', '2014-06-05 16:53:36', '2014-06-05 16:53:36'),
(425, 5, 222, 'es', 'Debe ingresar el tipo de residente', '2014-06-05 16:53:36', '2014-06-05 16:53:36'),
(426, 4, 223, 'en', 'Edit resident type', '2014-06-05 16:59:11', '2014-06-05 16:59:11'),
(427, 5, 223, 'es', 'Editar tipo de residente', '2014-06-05 16:59:11', '2014-06-05 16:59:11'),
(428, 4, 224, 'en', 'Resident type details', '2014-06-05 17:13:10', '2014-06-05 17:13:10'),
(429, 5, 224, 'es', 'Detalles del tipo de residente', '2014-06-05 17:13:10', '2014-06-05 17:13:10'),
(430, 4, 225, 'en', 'Resident types', '2014-06-05 17:13:38', '2014-06-05 17:13:38'),
(431, 5, 225, 'es', 'Tipos de residente', '2014-06-05 17:13:38', '2014-06-05 17:13:38'),
(432, 4, 226, 'en', 'Delete resident type', '2014-06-05 17:14:16', '2014-06-05 17:14:16'),
(433, 5, 226, 'es', 'Eliminar tipo de residente', '2014-06-05 17:14:16', '2014-06-05 17:14:16'),
(434, 4, 227, 'en', 'Are you sure you want to remove this type of resident', '2014-06-05 17:15:12', '2014-06-05 17:15:12'),
(435, 5, 227, 'es', 'Esta seguro que desea eliminar este tipo de residente', '2014-06-05 17:15:12', '2014-06-05 17:15:12'),
(436, 6, 228, 'en', 'There is already an apartment with this number for the selected tower', '2014-06-05 17:23:48', '2014-06-05 17:23:48'),
(437, 7, 228, 'es', 'Ya existe un apartamento con ese númer para la torre seleccionada', '2014-06-05 17:23:48', '2014-06-05 17:23:48'),
(438, 6, 229, 'en', 'There is already an employee with this id number, please check', '2014-06-05 17:25:17', '2014-06-05 17:25:17'),
(439, 7, 229, 'es', 'Ya existe un empleado con esa cédula , por favor verifique', '2014-06-05 17:25:17', '2014-06-05 17:25:17'),
(440, 6, 230, 'en', 'Provider already exists with that name, please check', '2014-06-05 17:26:30', '2014-06-05 17:26:30'),
(441, 7, 230, 'es', 'Ya existe un proveedor con ese nombre, por favor verifique', '2014-06-05 17:26:30', '2014-06-05 17:26:30'),
(442, 6, 231, 'en', 'There is already such a resident, please check', '2014-06-05 17:29:32', '2014-06-05 17:29:32'),
(443, 7, 231, 'es', 'Ya existe ese tipo de residente, por favor verifique', '2014-06-05 17:29:32', '2014-06-05 17:29:32'),
(444, 4, 232, 'en', 'You must select a condo', '2014-06-09 19:05:56', '2014-06-09 19:05:56'),
(445, 5, 232, 'es', 'Debe seleccionar un condominio', '2014-06-09 19:05:56', '2014-06-09 19:05:56'),
(446, 4, 233, 'en', 'You must enter a resident name', '2014-06-09 19:06:28', '2014-06-09 19:06:28'),
(447, 5, 233, 'es', 'Debe Ingresar el nombre del residente', '2014-06-09 19:06:28', '2014-06-09 19:06:28'),
(448, 4, 234, 'en', 'You must enter an id number', '2014-06-09 19:06:56', '2014-06-09 19:06:56'),
(449, 5, 234, 'es', 'Debe ingresar un número de identificación', '2014-06-09 19:06:56', '2014-06-09 19:06:56'),
(450, 4, 235, 'en', 'You must enter an id type', '2014-06-09 19:08:04', '2014-06-09 19:08:04'),
(451, 5, 235, 'es', 'Debe ingresar un tipo de indentificación', '2014-06-09 19:08:04', '2014-06-09 19:08:04'),
(452, 4, 236, 'en', 'You must select an apartment', '2014-06-09 19:08:35', '2014-06-09 19:08:35'),
(453, 5, 236, 'es', 'Debe seleccionar un apartamento', '2014-06-09 19:08:35', '2014-06-09 19:08:35'),
(454, 4, 237, 'en', 'You must select a tower', '2014-06-09 19:08:58', '2014-06-09 19:08:58'),
(455, 5, 237, 'es', 'Debe seleccionar una torre', '2014-06-09 19:08:58', '2014-06-09 19:08:58'),
(456, 4, 238, 'en', 'You must select a resident type', '2014-06-09 19:09:36', '2014-06-09 19:09:36'),
(457, 5, 238, 'es', 'Debe seleccionar un tipo de residente', '2014-06-09 19:09:36', '2014-06-09 19:09:36'),
(458, 4, 239, 'en', 'New Resident', '2014-06-09 19:13:00', '2014-06-09 19:13:00'),
(459, 5, 239, 'es', 'Nuevo Residente', '2014-06-09 19:13:00', '2014-06-09 19:13:00'),
(460, 4, 240, 'en', 'Id number', '2014-06-09 19:13:18', '2014-06-09 19:13:18'),
(461, 5, 240, 'es', 'Número de identificación', '2014-06-09 19:13:18', '2014-06-09 19:13:18'),
(462, 4, 241, 'en', 'Id type', '2014-06-09 19:13:33', '2014-06-09 19:13:33'),
(463, 5, 241, 'es', 'Tipo de identificación', '2014-06-09 19:13:33', '2014-06-09 19:13:33'),
(464, 4, 242, 'en', '¿Is holder?', '2014-06-09 19:14:48', '2014-06-09 19:14:48'),
(465, 5, 242, 'es', '¿Es titular?', '2014-06-09 19:14:48', '2014-06-09 19:14:48'),
(466, 4, 243, 'en', 'Apartment', '2014-06-09 19:23:25', '2014-06-09 19:23:25'),
(467, 5, 243, 'es', 'Apartamento', '2014-06-09 19:23:25', '2014-06-09 19:23:25'),
(468, 4, 244, 'en', 'Select an apartment', '2014-06-09 19:32:06', '2014-06-09 19:32:06'),
(469, 5, 244, 'es', 'Seleccione un apartamento', '2014-06-09 19:32:06', '2014-06-09 19:32:06'),
(470, 4, 245, 'en', 'Select an id type', '2014-06-09 19:32:32', '2014-06-09 19:32:32'),
(471, 5, 245, 'es', 'Seleccione un tipo de identificación', '2014-06-09 19:32:32', '2014-06-09 19:32:32'),
(472, 4, 246, 'en', 'Select a resident type', '2014-06-09 19:32:55', '2014-06-09 19:32:55'),
(473, 5, 246, 'es', 'Seleccione un tipo de residente', '2014-06-09 19:32:55', '2014-06-09 19:32:55'),
(474, 4, 247, 'en', 'Passport', '2014-06-09 19:46:36', '2014-06-09 19:46:36'),
(475, 5, 247, 'es', 'Pasaporte', '2014-06-09 19:46:36', '2014-06-09 19:46:36'),
(476, 4, 248, 'en', 'Others', '2014-06-09 19:46:55', '2014-06-09 19:46:55'),
(477, 5, 248, 'es', 'Otros', '2014-06-09 19:46:55', '2014-06-09 19:46:55'),
(478, 4, 249, 'en', 'Edit Resident', '2014-06-09 19:49:48', '2014-06-09 19:49:48'),
(479, 5, 249, 'es', 'Editar Residente', '2014-06-09 19:49:48', '2014-06-09 19:49:48'),
(480, 4, 250, 'en', 'Resident details', '2014-06-09 19:54:25', '2014-06-09 19:54:25'),
(481, 5, 250, 'es', 'Detalles del residente', '2014-06-09 19:54:25', '2014-06-09 19:54:25'),
(482, 4, 251, 'en', 'Resident list', '2014-06-09 19:54:40', '2014-06-09 19:54:40'),
(483, 5, 251, 'es', 'Lista de residentes', '2014-06-09 19:54:40', '2014-06-09 19:54:40'),
(484, 4, 252, 'en', 'Delete resident', '2014-06-09 19:55:37', '2014-06-09 19:55:37'),
(485, 5, 252, 'es', 'Eliminar residente', '2014-06-09 19:55:37', '2014-06-09 19:55:37'),
(486, 4, 253, 'en', 'Are you sure you want to delete this resident', '2014-06-09 19:56:49', '2014-06-09 19:56:49'),
(487, 5, 253, 'es', 'Esta seguro que desea eliminar este residente', '2014-06-09 19:56:49', '2014-06-09 19:56:49'),
(488, 4, 254, 'en', 'You must enter a color', '2014-06-09 20:59:13', '2014-06-09 20:59:13'),
(489, 5, 254, 'es', 'Debe ingresar un color', '2014-06-09 20:59:13', '2014-06-09 20:59:13'),
(490, 4, 255, 'en', 'Delete color', '2014-06-09 21:12:53', '2014-06-09 21:12:53'),
(491, 5, 255, 'es', 'Eliminar color', '2014-06-09 21:12:53', '2014-06-09 21:12:53'),
(492, 4, 256, 'en', 'Are you sure you want to delete this color', '2014-06-09 21:13:30', '2014-06-09 21:13:30'),
(493, 5, 256, 'es', 'Esta seguro que desea eliminar este color', '2014-06-09 21:13:30', '2014-06-09 21:13:30'),
(494, 4, 257, 'en', 'Brand', '2014-06-11 16:31:10', '2014-06-11 16:31:10'),
(495, 5, 257, 'es', 'Marca', '2014-06-11 16:31:10', '2014-06-11 16:31:10'),
(496, 4, 258, 'en', 'You must enter a brand', '2014-06-11 16:33:51', '2014-06-11 16:33:51'),
(497, 5, 258, 'es', 'Debe Ingresar una marca', '2014-06-11 16:33:51', '2014-06-11 16:33:51'),
(498, 6, 259, 'en', 'You must enter a brand', '2014-06-11 16:39:40', '2014-06-11 16:39:40'),
(499, 7, 259, 'es', 'Debe ingresar una marca', '2014-06-11 16:39:40', '2014-06-11 16:39:40'),
(500, 4, 260, 'en', 'Edit Brand', '2014-06-11 16:44:17', '2014-06-11 16:44:17'),
(501, 5, 260, 'es', 'Editar Marca', '2014-06-11 16:44:17', '2014-06-11 16:44:17'),
(502, 6, 261, 'en', 'That brand already exists, please check', '2014-06-11 16:46:54', '2014-06-11 16:46:54'),
(503, 7, 261, 'es', 'Ya existe esa marca,por favor verifique', '2014-06-11 16:46:54', '2014-06-11 16:46:54'),
(504, 4, 262, 'en', 'Delete brand', '2014-06-11 16:53:25', '2014-06-11 16:53:25'),
(505, 5, 262, 'es', 'Eliminar marca', '2014-06-11 16:53:25', '2014-06-11 16:53:25'),
(506, 4, 263, 'en', 'Are you sure you want to delete this brand', '2014-06-11 16:54:35', '2014-06-11 16:54:35'),
(507, 5, 263, 'es', 'Esta seguro que desea eliminar esta marca', '2014-06-11 16:54:35', '2014-06-11 16:54:35'),
(508, 4, 264, 'en', 'New Brand', '2014-06-11 16:56:27', '2014-06-11 16:56:27'),
(509, 5, 264, 'es', 'Nueva Marca', '2014-06-11 16:56:27', '2014-06-11 16:56:27'),
(510, 4, 265, 'en', 'Brand details', '2014-06-11 16:56:45', '2014-06-11 16:56:45'),
(511, 5, 265, 'es', 'Detalles la Marca', '2014-06-11 16:56:45', '2014-06-11 16:56:45'),
(512, 6, 266, 'en', 'There is already a resident of that name, please check', '2014-06-11 17:05:27', '2014-06-11 17:05:27'),
(513, 7, 266, 'es', 'Ya existe un residente con ese nombre, por favor verifique', '2014-06-11 17:05:27', '2014-06-11 17:05:27'),
(514, 6, 267, 'en', 'You must enter a name', '2014-06-11 17:07:15', '2014-06-11 17:07:15'),
(515, 7, 267, 'es', 'Debe ingresar el nombre', '2014-06-11 17:07:15', '2014-06-11 17:07:15'),
(516, 6, 268, 'en', 'You must select an id type', '2014-06-11 17:08:13', '2014-06-11 17:08:13'),
(517, 7, 268, 'es', 'Debe Ingresar un tipo de identificación', '2014-06-11 17:08:13', '2014-06-11 17:08:13'),
(518, 6, 269, 'en', 'You must enter an id number', '2014-06-11 17:12:11', '2014-06-11 17:12:11'),
(519, 7, 269, 'es', 'Debe ingresar un número de identificación', '2014-06-11 17:12:11', '2014-06-11 17:12:11'),
(520, 6, 270, 'en', 'You must select an apartment', '2014-06-11 17:12:47', '2014-06-11 17:12:47'),
(521, 7, 270, 'es', 'Debe seleccionar un apartamento', '2014-06-11 17:12:47', '2014-06-11 17:12:47'),
(522, 4, 271, 'en', 'Plate number', '2014-06-11 17:26:56', '2014-06-11 17:26:56'),
(523, 5, 271, 'es', 'Placa', '2014-06-11 17:26:56', '2014-06-11 17:26:56'),
(524, 4, 272, 'en', 'Parking number', '2014-06-11 17:27:20', '2014-06-11 17:27:20'),
(525, 5, 272, 'es', 'Estacionamiento', '2014-06-11 17:27:20', '2014-06-11 17:27:20'),
(526, 6, 273, 'en', 'You must select a condo', '2014-06-11 18:50:15', '2014-06-11 18:50:15'),
(527, 7, 273, 'es', 'Debe seleccionar un condominio', '2014-06-11 18:50:15', '2014-06-11 18:50:15'),
(528, 6, 274, 'en', 'You must select a tower', '2014-06-11 18:50:47', '2014-06-11 18:50:47'),
(529, 7, 274, 'es', 'Debe seleccionar una torre', '2014-06-11 18:50:47', '2014-06-11 18:50:47'),
(530, 6, 275, 'en', 'You must select an apartment', '2014-06-11 18:51:19', '2014-06-11 18:51:19'),
(531, 7, 275, 'es', 'Debe seleccionar un apartamento', '2014-06-11 18:51:19', '2014-06-11 18:51:19'),
(532, 6, 276, 'en', 'You must select a car owner', '2014-06-11 18:52:19', '2014-06-11 18:52:19'),
(533, 7, 276, 'es', 'Debe seleccionar un propietario del auto', '2014-06-11 18:52:19', '2014-06-11 18:52:19'),
(534, 6, 277, 'en', 'You must enter a plate number', '2014-06-11 18:53:56', '2014-06-11 18:53:56'),
(535, 7, 277, 'es', 'Debe ingresar un número de placa', '2014-06-11 18:53:56', '2014-06-11 18:53:56'),
(536, 6, 278, 'en', 'You must select a brand', '2014-06-11 18:54:26', '2014-06-11 18:54:26'),
(537, 7, 278, 'es', 'Debe seleccionar una marca', '2014-06-11 18:54:26', '2014-06-11 18:54:26'),
(538, 6, 279, 'en', 'You must select a color', '2014-06-11 18:55:09', '2014-06-11 18:55:09'),
(539, 7, 279, 'es', 'Debe seleccionar un color', '2014-06-11 18:55:09', '2014-06-11 18:55:09'),
(540, 6, 280, 'en', 'This plate number already exist, please verify', '2014-06-11 18:57:02', '2014-06-11 18:57:02');
INSERT INTO `lexik_trans_unit_translations` (`id`, `file_id`, `trans_unit_id`, `locale`, `content`, `created_at`, `updated_at`) VALUES
(541, 7, 280, 'es', 'Ya existe este número de placa , por favor verifique', '2014-06-11 18:57:02', '2014-06-11 18:57:02'),
(542, 6, 281, 'en', 'Yo must enter a color', '2014-06-11 20:11:06', '2014-06-11 20:11:06'),
(543, 7, 281, 'es', 'Debe ingresar un color', '2014-06-11 20:11:06', '2014-06-11 20:11:06'),
(544, 6, 282, 'en', 'There is already a color with that name', '2014-06-11 20:12:26', '2014-06-11 20:12:26'),
(545, 7, 282, 'es', 'Ya existe un color con ese nombre', '2014-06-11 20:12:26', '2014-06-11 20:12:26'),
(546, 4, 283, 'en', 'You must select a condo', '2014-06-11 20:35:52', '2014-06-11 20:35:52'),
(547, 5, 283, 'es', 'Debe seleccionar un condominio', '2014-06-11 20:35:52', '2014-06-11 20:35:52'),
(548, 4, 284, 'en', 'You must select a tower', '2014-06-11 20:37:58', '2014-06-11 20:37:58'),
(549, 5, 284, 'es', 'Debe seleccionar una torre', '2014-06-11 20:37:58', '2014-06-11 20:37:58'),
(550, 4, 285, 'en', 'You must select an apartment', '2014-06-11 20:38:37', '2014-06-11 20:38:37'),
(551, 5, 285, 'es', 'Debe seleccionar un apartamento', '2014-06-11 20:38:37', '2014-06-11 20:38:37'),
(552, 4, 286, 'en', 'You must select a owner', '2014-06-11 20:39:18', '2014-06-11 20:39:18'),
(553, 5, 286, 'es', 'Debe seleccionar un propietario', '2014-06-11 20:39:18', '2014-06-11 20:39:18'),
(554, 4, 287, 'en', 'You must enter a plate number', '2014-06-11 20:40:10', '2014-06-11 20:40:10'),
(555, 5, 287, 'es', 'Debe ingresar un número de placa', '2014-06-11 20:40:10', '2014-06-11 20:40:10'),
(556, 4, 288, 'en', 'You must select a brand', '2014-06-11 20:40:41', '2014-06-11 20:40:41'),
(557, 5, 288, 'es', 'Debe seleccionar una marca', '2014-06-11 20:40:41', '2014-06-11 20:40:41'),
(558, 4, 289, 'en', 'You must select a color', '2014-06-11 20:41:07', '2014-06-11 20:41:07'),
(559, 5, 289, 'es', 'Debe seleccionar un color', '2014-06-11 20:41:07', '2014-06-11 20:41:07'),
(560, 4, 290, 'en', 'Plate number', '2014-06-11 21:13:08', '2014-06-11 21:13:08'),
(561, 5, 290, 'es', 'Número de Placa', '2014-06-11 21:13:08', '2014-06-11 21:13:08'),
(562, 4, 291, 'en', 'Owner', '2014-06-11 21:13:36', '2014-06-12 18:32:44'),
(563, 5, 291, 'es', 'Propietario', '2014-06-11 21:13:36', '2014-06-11 21:13:36'),
(564, 4, 292, 'en', 'New Car', '2014-06-11 21:14:45', '2014-06-11 21:14:45'),
(565, 5, 292, 'es', 'Nuevo Auto', '2014-06-11 21:14:45', '2014-06-11 21:14:45'),
(566, 4, 293, 'en', 'Type', '2014-06-12 21:35:06', '2014-06-12 21:35:06'),
(567, 5, 293, 'es', 'Tipo', '2014-06-12 21:35:06', '2014-06-12 21:35:06'),
(568, 4, 294, 'en', 'Vehicles', '2014-06-12 21:55:21', '2014-06-12 21:55:21'),
(569, 5, 294, 'es', 'Vehículos', '2014-06-12 21:55:21', '2014-06-12 21:55:21'),
(570, 4, 295, 'en', 'New vehicle', '2014-06-12 21:56:00', '2014-06-12 21:56:00'),
(571, 5, 295, 'es', 'Nuevo vehículo', '2014-06-12 21:56:00', '2014-06-12 21:56:00'),
(572, 4, 296, 'en', 'Select an owner', '2014-06-13 17:56:03', '2014-06-13 17:56:03'),
(573, 5, 296, 'es', 'Seleccione un propietario', '2014-06-13 17:56:03', '2014-06-13 17:56:03'),
(574, 4, 297, 'en', 'Select a brand', '2014-06-13 17:56:23', '2014-06-13 17:56:23'),
(575, 5, 297, 'es', 'Seleccione una marca', '2014-06-13 17:56:23', '2014-06-13 17:56:23'),
(576, 4, 298, 'en', 'Select a color', '2014-06-13 17:56:45', '2014-06-13 17:56:45'),
(577, 5, 298, 'es', 'Seleccione un color', '2014-06-13 17:56:45', '2014-06-13 17:56:45'),
(578, 4, 299, 'en', 'Car', '2014-06-13 17:56:58', '2014-06-13 17:56:58'),
(579, 5, 299, 'es', 'Carro', '2014-06-13 17:56:58', '2014-06-13 17:56:58'),
(580, 4, 300, 'en', 'Motorbike', '2014-06-13 17:57:45', '2014-06-13 17:57:45'),
(581, 5, 300, 'es', 'Moto', '2014-06-13 17:57:45', '2014-06-13 17:57:45'),
(582, 4, 301, 'en', 'Bicycle', '2014-06-13 17:58:33', '2014-06-13 17:58:33'),
(583, 5, 301, 'es', 'Bicicleta', '2014-06-13 17:58:33', '2014-06-13 17:58:33'),
(584, 4, 302, 'en', 'Other', '2014-06-13 17:58:57', '2014-06-13 17:58:57'),
(585, 5, 302, 'es', 'Otro', '2014-06-13 17:58:57', '2014-06-13 17:58:57'),
(586, 4, 303, 'en', 'Edit vehicle', '2014-06-13 18:58:29', '2014-06-13 18:58:29'),
(587, 5, 303, 'es', 'Editar vehículo', '2014-06-13 18:58:29', '2014-06-13 18:58:29'),
(588, 4, 304, 'en', 'Vehicle details', '2014-06-13 19:07:15', '2014-06-13 19:07:15'),
(589, 5, 304, 'es', 'Detalles del vehículo', '2014-06-13 19:07:15', '2014-06-13 19:07:15'),
(590, 4, 305, 'en', 'Delete vehicle', '2014-06-13 19:07:32', '2014-06-13 19:07:32'),
(591, 5, 305, 'es', 'Eliminar vehículo', '2014-06-13 19:07:32', '2014-06-13 19:07:32'),
(592, 4, 306, 'en', 'Are you sure you want to remove this vehicle', '2014-06-13 19:08:48', '2014-06-13 19:08:48'),
(593, 5, 306, 'es', 'Esta seguro que desea eliminar este vehículo', '2014-06-13 19:08:48', '2014-06-13 19:08:48'),
(594, 6, 307, 'en', 'There is already a vehicle occupying the parking, please check', '2014-06-13 21:37:42', '2014-06-13 21:37:42'),
(595, 7, 307, 'es', 'Ya existe un vehiculo ocupando ese estacionamiento , por favor verifique', '2014-06-13 21:37:42', '2014-06-13 21:37:42'),
(596, 4, 308, 'en', 'Parking Type', '2014-06-24 16:20:50', '2014-06-24 16:20:50'),
(597, 5, 308, 'es', 'Tipo de Estacionamiento', '2014-06-24 16:20:50', '2014-06-24 16:20:50'),
(598, 4, 309, 'en', 'Select a location', '2014-06-24 16:25:36', '2014-06-24 16:25:36'),
(599, 5, 309, 'es', 'Seleccione una localización', '2014-06-24 16:25:36', '2014-06-24 16:25:36'),
(600, 4, 310, 'en', 'Select a Type', '2014-06-24 16:25:51', '2014-06-24 16:25:51'),
(601, 5, 310, 'es', 'Seleccione un Tipo', '2014-06-24 16:25:51', '2014-06-24 16:25:51'),
(602, 4, 311, 'en', 'Own', '2014-06-24 16:33:14', '2014-06-24 16:33:14'),
(603, 5, 311, 'es', 'Propio', '2014-06-24 16:33:14', '2014-06-24 16:33:14'),
(604, 4, 312, 'en', 'Rented', '2014-06-24 16:33:34', '2014-06-24 16:33:34'),
(605, 5, 312, 'es', 'Alquilado', '2014-06-24 16:33:34', '2014-06-24 16:33:34'),
(606, 4, 313, 'en', 'Borrowed', '2014-06-24 16:34:09', '2014-06-24 16:34:09'),
(607, 5, 313, 'es', 'Prestado', '2014-06-24 16:34:09', '2014-06-24 16:34:09'),
(608, 6, 314, 'en', 'You must select an apartment', '2014-06-24 16:55:32', '2014-06-24 16:55:32'),
(609, 7, 314, 'es', 'Debe seleccionar un apartamento', '2014-06-24 16:55:32', '2014-06-24 16:55:32'),
(610, 6, 315, 'en', 'You must select a tower', '2014-06-24 16:56:01', '2014-06-24 16:56:01'),
(611, 7, 315, 'es', 'Debe seleccionar una torre', '2014-06-24 16:56:01', '2014-06-24 16:56:01'),
(612, 6, 316, 'en', 'You must select a condominium', '2014-06-24 16:56:35', '2014-06-24 16:56:35'),
(613, 7, 316, 'es', 'Debe seleccionar un condominio', '2014-06-24 16:56:35', '2014-06-24 16:56:35'),
(614, 6, 317, 'en', 'You must select a location', '2014-06-24 16:58:51', '2014-06-24 16:58:51'),
(615, 7, 317, 'es', 'Debe seleccionar una localización', '2014-06-24 16:58:51', '2014-06-24 16:58:51'),
(616, 6, 318, 'en', 'You must enter a parking number', '2014-06-24 17:00:51', '2014-06-24 17:00:51'),
(617, 7, 318, 'es', 'Debe Ingresar un numero de estacionamiento', '2014-06-24 17:00:51', '2014-06-24 17:00:51'),
(618, 6, 319, 'en', 'You must select a parking number', '2014-06-24 17:01:56', '2014-06-24 17:01:56'),
(619, 7, 319, 'es', 'Debe seleccionar un número de estacionamiento', '2014-06-24 17:01:56', '2014-06-24 17:01:56'),
(620, 6, 320, 'en', 'There is already a parking with this number', '2014-06-24 18:19:07', '2014-06-24 18:19:07'),
(621, 7, 320, 'es', 'Ya existe un estacionamiento con ese número', '2014-06-24 18:19:07', '2014-06-24 18:19:07'),
(622, 4, 321, 'en', 'You must select a condominium', '2014-06-24 18:23:21', '2014-06-24 18:23:21'),
(623, 5, 321, 'es', 'Debe seleccionar un condominio', '2014-06-24 18:23:21', '2014-06-24 18:23:21'),
(624, 4, 322, 'en', 'You must select a tower', '2014-06-24 18:23:56', '2014-06-24 18:23:56'),
(625, 5, 322, 'es', 'Debe seleccionar una torre', '2014-06-24 18:23:56', '2014-06-24 18:23:56'),
(626, 4, 323, 'en', 'You must select an apartment', '2014-06-24 18:24:24', '2014-06-24 18:24:24'),
(627, 5, 323, 'es', 'Debe seleccionar un apartamento', '2014-06-24 18:24:24', '2014-06-24 18:24:24'),
(628, 4, 324, 'en', 'You must select a location', '2014-06-24 18:24:53', '2014-06-24 18:24:53'),
(629, 5, 324, 'es', 'Debe seleccionar una localización', '2014-06-24 18:24:53', '2014-06-24 18:24:53'),
(630, 4, 325, 'en', 'You must enter a parking number', '2014-06-24 18:26:00', '2014-06-24 18:26:00'),
(631, 5, 325, 'es', 'Debe ingresar un número de estacionamiento', '2014-06-24 18:26:00', '2014-06-24 18:26:00'),
(632, 4, 326, 'en', 'You must select a parking type', '2014-06-24 18:26:38', '2014-06-24 18:26:38'),
(633, 5, 326, 'es', 'Debe seleccionar un tipo de estacionamiento', '2014-06-24 18:26:38', '2014-06-24 18:26:38'),
(634, 4, 327, 'en', 'Edit Parking', '2014-06-24 20:57:04', '2014-06-24 20:57:04'),
(635, 5, 327, 'es', 'Editar Estacionamiento', '2014-06-24 20:57:04', '2014-06-24 20:57:04'),
(636, 4, 328, 'en', 'Parking details', '2014-06-24 22:25:04', '2014-06-24 22:25:04'),
(637, 5, 328, 'es', 'Detalles del estacionamiento', '2014-06-24 22:25:04', '2014-06-24 22:25:04'),
(638, 4, 329, 'en', 'Delete parking', '2014-06-24 22:26:28', '2014-06-24 22:26:28'),
(639, 5, 329, 'es', 'Eliminar estacionamiento', '2014-06-24 22:26:28', '2014-06-24 22:26:28'),
(640, 4, 330, 'en', 'Are you sure you want to delete this parking', '2014-06-24 22:27:40', '2014-06-24 22:27:40'),
(641, 5, 330, 'es', 'Esta seguro que desea eliminar este estacionamiento', '2014-06-24 22:27:40', '2014-06-24 22:27:40'),
(642, 4, 331, 'en', 'Description', '2014-06-25 21:42:28', '2014-06-25 21:42:28'),
(643, 5, 331, 'es', 'Descripción', '2014-06-25 21:42:28', '2014-06-25 21:42:28'),
(644, 4, 332, 'en', 'New Location', '2014-06-25 21:44:12', '2014-06-25 21:44:12'),
(645, 5, 332, 'es', 'Nueva Localización', '2014-06-25 21:44:12', '2014-06-25 21:44:12'),
(646, 6, 333, 'en', 'You must enter a location', '2014-06-25 21:47:09', '2014-06-25 21:47:09'),
(647, 7, 333, 'es', 'Debe ingresar una localización', '2014-06-25 21:47:09', '2014-06-25 21:47:09'),
(648, 4, 334, 'en', 'You must enter a location', '2014-06-25 21:49:34', '2014-06-25 21:49:34'),
(649, 5, 334, 'es', 'Debe ingresar una localización', '2014-06-25 21:49:34', '2014-06-25 21:49:34'),
(650, 6, 335, 'en', 'Location already exists with that name', '2014-06-25 22:00:01', '2014-06-25 22:00:01'),
(651, 7, 335, 'es', 'Ya existe una localización con ese nombre', '2014-06-25 22:00:01', '2014-06-25 22:00:01'),
(652, 4, 336, 'en', 'Edit Location', '2014-06-25 22:02:30', '2014-06-25 22:02:30'),
(653, 5, 336, 'es', 'Editar Localización', '2014-06-25 22:02:30', '2014-06-25 22:02:30'),
(654, 4, 337, 'en', 'Location details', '2014-06-25 22:05:34', '2014-06-25 22:05:34'),
(655, 5, 337, 'es', 'Detalles la localización', '2014-06-25 22:05:34', '2014-06-25 22:05:34'),
(656, 4, 338, 'en', 'Locations', '2014-06-25 22:05:54', '2014-06-25 22:05:54'),
(657, 5, 338, 'es', 'Localizaciones', '2014-06-25 22:05:54', '2014-06-25 22:05:54'),
(658, 4, 339, 'en', 'Delete Location', '2014-06-25 22:06:13', '2014-06-25 22:06:13'),
(659, 5, 339, 'es', 'Eliminar Localización', '2014-06-25 22:06:13', '2014-06-25 22:06:13'),
(660, 4, 340, 'en', 'Are you sure you want to delete this location', '2014-06-25 22:06:58', '2014-06-25 22:06:58'),
(661, 5, 340, 'es', 'Esta seguro que quiere eliminar esta localización', '2014-06-25 22:06:58', '2014-06-25 22:06:58'),
(662, 4, 341, 'en', 'Causes', '2014-06-25 22:33:04', '2014-06-25 22:33:04'),
(663, 5, 341, 'es', 'Causas', '2014-06-25 22:33:04', '2014-06-25 22:33:04'),
(664, 4, 342, 'en', 'New Cause', '2014-06-25 22:37:13', '2014-06-25 22:37:13'),
(665, 5, 342, 'es', 'Nueva Causa', '2014-06-25 22:37:13', '2014-06-25 22:37:13'),
(666, 4, 343, 'en', 'Edit Cause', '2014-06-25 22:37:34', '2014-06-25 22:37:34'),
(667, 5, 343, 'es', 'Editar Causa', '2014-06-25 22:37:34', '2014-06-25 22:37:34'),
(668, 4, 344, 'en', 'Delete cause', '2014-06-25 22:37:56', '2014-06-25 22:37:56'),
(669, 5, 344, 'es', 'Eliminar causa', '2014-06-25 22:37:56', '2014-06-25 22:37:56'),
(670, 6, 345, 'en', 'You must enter a cause', '2014-06-25 22:45:42', '2014-06-25 22:45:42'),
(671, 7, 345, 'es', 'Debe ingresar una causa', '2014-06-25 22:45:42', '2014-06-25 22:45:42'),
(672, 6, 346, 'en', 'There is already a cause with that name', '2014-06-25 22:46:36', '2014-06-25 22:46:36'),
(673, 7, 346, 'es', 'Ya existe una causa con ese nombre', '2014-06-25 22:46:36', '2014-06-25 22:46:36'),
(674, 4, 347, 'en', 'You must enter a cause', '2014-06-25 22:49:46', '2014-06-25 22:49:46'),
(675, 5, 347, 'es', 'Debe ingresar una causa', '2014-06-25 22:49:46', '2014-06-25 22:49:46'),
(676, 4, 348, 'en', 'Cause details', '2014-06-25 22:54:10', '2014-06-25 22:54:10'),
(677, 5, 348, 'es', 'Detalles de la causa', '2014-06-25 22:54:10', '2014-06-25 22:54:10'),
(678, 4, 349, 'en', 'Are you sure you want to delete this cause', '2014-06-25 22:56:02', '2014-06-25 22:56:02'),
(679, 5, 349, 'es', 'Esta seguro que desea eliminar esta causa', '2014-06-25 22:56:02', '2014-06-25 22:56:02'),
(680, 4, 350, 'en', 'Amount', '2014-06-25 23:34:42', '2014-06-25 23:34:42'),
(681, 5, 350, 'es', 'Monto', '2014-06-25 23:34:42', '2014-06-25 23:34:42'),
(682, 4, 351, 'en', 'Date', '2014-06-25 23:34:58', '2014-06-25 23:34:58'),
(683, 5, 351, 'es', 'Fecha', '2014-06-25 23:34:58', '2014-06-25 23:34:58'),
(684, 4, 352, 'en', 'Expense date', '2014-06-25 23:38:34', '2014-06-25 23:38:34'),
(685, 5, 352, 'es', 'Fecha del gasto', '2014-06-25 23:38:34', '2014-06-25 23:38:34'),
(686, 4, 353, 'en', 'Select a cause', '2014-06-25 23:40:04', '2014-06-25 23:40:04'),
(687, 5, 353, 'es', 'Seleccione una causa', '2014-06-25 23:40:04', '2014-06-25 23:40:04'),
(688, 4, 354, 'en', 'New Expense', '2014-06-26 15:57:13', '2014-06-26 15:57:13'),
(689, 5, 354, 'es', 'Nuevo Gasto', '2014-06-26 15:57:13', '2014-06-26 15:57:13'),
(690, 6, 355, 'en', 'You must enter a description', '2014-06-26 16:40:02', '2014-06-26 16:40:02'),
(691, 7, 355, 'es', 'Debe ingresar una descripción', '2014-06-26 16:40:02', '2014-06-26 16:40:02'),
(692, 6, 356, 'en', 'You must select a cause', '2014-06-26 16:40:41', '2014-06-26 16:40:41'),
(693, 7, 356, 'es', 'Debe seleccionar una causa', '2014-06-26 16:40:41', '2014-06-26 16:40:41'),
(694, 6, 357, 'en', 'you must enter an amount', '2014-06-26 16:41:11', '2014-06-26 16:41:11'),
(695, 7, 357, 'es', 'Debe ingresar un monto', '2014-06-26 16:41:11', '2014-06-26 16:41:11'),
(696, 6, 358, 'en', 'The amount must be numeric', '2014-06-26 16:42:13', '2014-06-26 16:42:13'),
(697, 7, 358, 'es', 'El monto debe ser numérico', '2014-06-26 16:42:13', '2014-06-26 16:42:13'),
(698, 6, 359, 'en', 'You must enter a date', '2014-06-26 16:42:39', '2014-06-26 16:42:39'),
(699, 7, 359, 'es', 'Debe ingresar una fecha', '2014-06-26 16:42:39', '2014-06-26 16:42:39'),
(700, 6, 360, 'en', 'There is already a expense with this description', '2014-06-26 16:43:34', '2014-06-26 16:43:34'),
(701, 7, 360, 'es', 'Ya existe un gasto con esta descripción', '2014-06-26 16:43:34', '2014-06-26 16:43:34'),
(702, 4, 361, 'en', 'You must select a condominium', '2014-06-26 16:53:28', '2014-06-26 16:53:28'),
(703, 5, 361, 'es', 'Debe seleccionar un condominio', '2014-06-26 16:53:28', '2014-06-26 16:53:28'),
(704, 4, 362, 'en', 'You must select a tower', '2014-06-26 16:55:28', '2014-06-26 16:55:28'),
(705, 5, 362, 'es', 'Debe seleccionar una torre', '2014-06-26 16:55:28', '2014-06-26 16:55:28'),
(706, 4, 363, 'en', 'You must enter a description', '2014-06-26 16:56:43', '2014-06-26 16:56:43'),
(707, 5, 363, 'es', 'Debe ingresar una descripción', '2014-06-26 16:56:43', '2014-06-26 16:56:43'),
(708, 4, 364, 'en', 'You must select a cause', '2014-06-26 16:57:06', '2014-06-26 16:57:06'),
(709, 5, 364, 'es', 'Debe seleccionar una causa', '2014-06-26 16:57:06', '2014-06-26 16:57:06'),
(710, 4, 365, 'en', 'You must enter an amount', '2014-06-26 16:57:33', '2014-06-26 16:57:33'),
(711, 5, 365, 'es', 'Debe ingresar un monto', '2014-06-26 16:57:33', '2014-06-26 16:57:33'),
(712, 4, 366, 'en', 'The amount must be numeric', '2014-06-26 16:58:14', '2014-06-26 16:58:14'),
(713, 5, 366, 'es', 'El monto debe ser numérico', '2014-06-26 16:58:14', '2014-06-26 16:58:14'),
(714, 4, 367, 'en', 'You must enter a date', '2014-06-26 16:58:42', '2014-06-26 16:58:42'),
(715, 5, 367, 'es', 'Debe ingresar una fecha', '2014-06-26 16:58:42', '2014-06-26 16:58:42'),
(716, 4, 368, 'en', 'You must enter a vaid date', '2014-06-26 16:59:33', '2014-06-26 16:59:33'),
(717, 5, 368, 'es', 'Debe ingresar una fecha válida', '2014-06-26 16:59:33', '2014-06-26 16:59:33'),
(718, 4, 369, 'en', 'Edit Expense', '2014-06-26 17:04:22', '2014-06-26 17:04:22'),
(719, 5, 369, 'es', 'Editar Gasto', '2014-06-26 17:04:22', '2014-06-26 17:04:22'),
(720, 4, 370, 'en', 'Expense details', '2014-06-26 17:23:55', '2014-06-26 17:23:55'),
(721, 5, 370, 'es', 'Detalles del gasto', '2014-06-26 17:23:55', '2014-06-26 17:23:55'),
(722, 4, 371, 'en', 'Delete Expense', '2014-06-26 17:24:16', '2014-06-26 17:24:16'),
(723, 5, 371, 'es', 'Eliminar Gasto', '2014-06-26 17:24:16', '2014-06-26 17:24:16'),
(724, 4, 372, 'en', 'Are you sure you want to remove this expense', '2014-06-26 17:24:57', '2014-06-26 17:24:57'),
(725, 5, 372, 'es', 'Esta seguro que desea eliminar este gasto', '2014-06-26 17:24:57', '2014-06-26 17:24:57'),
(726, 4, 373, 'en', 'Can not delete this condo because it has associated records', '2014-06-26 18:40:06', '2014-06-26 18:40:06'),
(727, 5, 373, 'es', 'No se puede eliminar este condominio ya que tiene registros asociados', '2014-06-26 18:40:06', '2014-06-26 18:40:06'),
(728, 4, 374, 'en', 'Page not found, please check', '2014-06-26 23:30:02', '2014-06-26 23:30:02'),
(729, 5, 374, 'es', 'Pagina no encontrada, por favor verifique', '2014-06-26 23:30:02', '2014-06-26 23:30:02'),
(730, 4, 375, 'en', 'Can not delete this role, it has associated records', '2014-06-27 16:26:26', '2014-06-27 16:32:38'),
(731, 5, 375, 'es', 'No se puede eliminar este Rol ya que tiene registros asociados', '2014-06-27 16:26:26', '2014-06-27 16:26:26'),
(732, 4, 376, 'en', 'Can not delete this tower because it has associated records', '2014-06-27 16:46:55', '2014-06-27 16:46:55'),
(733, 5, 376, 'es', 'No se puede eliminar esta torre ya que tiene registros asociados', '2014-06-27 16:46:55', '2014-06-27 16:46:55'),
(734, 4, 377, 'en', 'Can not delete this apartment because it has associated records', '2014-06-27 17:13:38', '2014-06-27 17:13:38'),
(735, 5, 377, 'es', 'No se puede eliminar este apartamento ya que tiene registros asociados', '2014-06-27 17:13:38', '2014-06-27 17:13:38'),
(736, 4, 378, 'en', 'Can not delete this construct company because it has associated records', '2014-06-27 17:34:03', '2014-06-27 17:40:27'),
(737, 5, 378, 'es', 'No se puede eliminar esta constructora ya que tiene registros asociados', '2014-06-27 17:34:03', '2014-06-27 17:34:03'),
(738, 4, 379, 'en', 'Can not delete this resident type because it has associated records', '2014-06-27 18:07:54', '2014-06-27 18:07:54'),
(739, 5, 379, 'es', 'No se puede eliminar este tipo de residente ya que tiene registros asociados', '2014-06-27 18:07:54', '2014-06-27 18:07:54'),
(740, 4, 380, 'en', 'Can not delete this resident because it has associated records', '2014-06-27 18:20:06', '2014-06-27 18:20:06'),
(741, 5, 380, 'es', 'No se puede eliminar este residente ya que tiene registros asociados', '2014-06-27 18:20:06', '2014-06-27 18:20:06'),
(742, 4, 381, 'en', 'Can not delete this color because it has associated records', '2014-06-27 18:38:28', '2014-06-27 18:38:28'),
(743, 5, 381, 'es', 'No se puede eliminar este color ya que tiene registros asociados', '2014-06-27 18:38:28', '2014-06-27 18:38:28'),
(744, 4, 382, 'en', 'Can not delete this brand because it has associated records', '2014-06-27 18:44:35', '2014-06-27 18:44:35'),
(745, 5, 382, 'es', 'No se puede eliminar esta marca ya que tiene registros asociados', '2014-06-27 18:44:35', '2014-06-27 18:44:35'),
(746, 4, 383, 'en', 'Can not delete this parking because it has associated records', '2014-06-27 20:24:07', '2014-06-27 20:24:07'),
(747, 5, 383, 'es', 'No se puede eliminar este estacionamiento ya que tiene registros asociados', '2014-06-27 20:24:07', '2014-06-27 20:24:07'),
(748, 4, 384, 'en', 'Can not delete this location because it has associated records', '2014-06-27 20:29:55', '2014-06-27 20:29:55'),
(749, 5, 384, 'es', 'No se puede eliminar esta localización ya que tiene registros asociados', '2014-06-27 20:29:55', '2014-06-27 20:29:55'),
(750, 4, 385, 'en', 'Can not delete this cause because it has associated records', '2014-06-27 20:37:25', '2014-06-27 20:37:25'),
(751, 5, 385, 'es', 'No se puede eliminar esta causa ya que tiene registros asociados', '2014-06-27 20:37:25', '2014-06-27 20:37:25'),
(752, 4, 386, 'en', 'Tower details', '2014-06-27 23:47:46', '2014-06-27 23:47:46'),
(753, 5, 386, 'es', 'Detalles de la torre', '2014-06-27 23:47:46', '2014-06-27 23:47:46'),
(754, 4, 387, 'en', 'You must enter a name', '2014-08-20 22:16:56', '2014-08-20 22:16:56'),
(755, 5, 387, 'es', 'Debe ingresar un nombre', '2014-08-20 22:16:56', '2014-08-20 22:16:56'),
(756, 6, 388, 'en', 'you must enter a name', '2014-08-20 22:29:23', '2014-08-20 22:29:23'),
(757, 7, 388, 'es', 'Debe ingresar un nombre2', '2014-08-20 22:29:23', '2014-08-20 22:44:03'),
(758, 4, 389, 'en', 'The phone number must be numeric', '2014-08-20 22:32:15', '2014-08-20 22:32:15'),
(759, 5, 389, 'es', 'El teléfono debe ser numérico', '2014-08-20 22:32:15', '2014-08-20 22:32:15'),
(760, 6, 390, 'en', 'A bank with that name already exists', '2014-08-20 22:41:17', '2014-08-20 22:41:17'),
(761, 7, 390, 'es', 'Ya existe un banco con ese nombre', '2014-08-20 22:41:17', '2014-08-20 22:41:17'),
(762, 4, 391, 'en', 'Are you sure you want to delete this bank', '2014-08-20 23:13:17', '2014-08-20 23:13:17'),
(763, 5, 391, 'es', 'Esta seguro que desea eliminar este banco', '2014-08-20 23:13:17', '2014-08-20 23:13:17'),
(764, 4, 392, 'en', 'Banks', '2014-08-20 23:24:44', '2014-08-20 23:24:44'),
(765, 5, 392, 'es', 'Bancos', '2014-08-20 23:24:44', '2014-08-20 23:24:44'),
(766, 4, 393, 'en', 'New Bank', '2014-08-20 23:28:30', '2014-08-20 23:28:30'),
(767, 5, 393, 'es', 'Nuevo Banco', '2014-08-20 23:28:30', '2014-08-20 23:28:30'),
(768, 4, 394, 'en', 'Edit Bank', '2014-08-20 23:28:58', '2014-08-20 23:28:58'),
(769, 5, 394, 'es', 'Editar Banco', '2014-08-20 23:28:58', '2014-08-20 23:28:58'),
(770, 4, 395, 'en', 'Delete Bank', '2014-08-20 23:29:31', '2014-08-20 23:29:31'),
(771, 5, 395, 'es', 'Eliminar banco', '2014-08-20 23:29:31', '2014-08-20 23:29:31'),
(772, 4, 396, 'en', 'Can not delete this bank because there are related records', '2014-08-20 23:32:07', '2014-08-20 23:32:07'),
(773, 5, 396, 'es', 'No se puede eliminar este banco ya que existen registros relacionados', '2014-08-20 23:32:07', '2014-08-20 23:32:07'),
(774, 4, 397, 'en', 'Bank Details', '2014-08-20 23:33:49', '2014-08-20 23:33:49'),
(775, 5, 397, 'es', 'Detalles del Banco', '2014-08-20 23:33:49', '2014-08-20 23:33:49'),
(776, 4, 398, 'en', 'Configure Roles and Users', '2014-08-26 20:23:33', '2014-08-26 20:23:33'),
(777, 5, 398, 'es', 'Configure los Roles y los Usuarios', '2014-08-26 20:23:33', '2014-08-26 20:23:33'),
(778, 4, 399, 'en', 'Configure Condominiums', '2014-08-26 20:24:16', '2014-08-26 20:24:16'),
(779, 5, 399, 'es', 'Configure los Condominios', '2014-08-26 20:24:16', '2014-08-26 20:24:16'),
(780, 4, 400, 'en', 'Configure Residents', '2014-08-26 20:24:57', '2014-08-26 20:24:57'),
(781, 5, 400, 'es', 'Configure los Residentes', '2014-08-26 20:24:57', '2014-08-26 20:24:57'),
(782, 4, 401, 'en', 'Manage your budget', '2014-08-26 20:25:39', '2014-08-26 20:25:39'),
(783, 5, 401, 'es', 'Maneje su presupuesto', '2014-08-26 20:25:39', '2014-08-26 20:25:39'),
(784, 4, 402, 'en', 'System Setup', '2014-08-26 20:26:32', '2014-08-26 20:26:32'),
(785, 5, 402, 'es', 'Configuración del Sistema', '2014-08-26 20:26:32', '2014-10-02 21:20:14'),
(786, 4, 403, 'en', 'HOME', '2014-08-26 20:30:16', '2014-08-26 20:30:16'),
(787, 5, 403, 'es', 'INICIO', '2014-08-26 20:30:16', '2014-08-26 20:30:16'),
(788, 6, 404, 'en', 'You must enter an account number', '2014-08-27 23:35:46', '2014-08-27 23:35:46'),
(789, 7, 404, 'es', 'Debe ingresar un número de cuenta', '2014-08-27 23:35:46', '2014-08-27 23:35:46'),
(790, 6, 405, 'en', 'An account already exists with that number, please check', '2014-08-27 23:36:55', '2014-08-27 23:36:55'),
(791, 7, 405, 'es', 'Ya existe una cuenta con ese número,por favor verifique', '2014-08-27 23:36:55', '2014-08-27 23:36:55'),
(792, 4, 406, 'en', 'You must enter an account number', '2014-08-28 00:00:14', '2014-08-28 00:00:14'),
(793, 5, 406, 'es', 'Debe ingresar un número de cuenta', '2014-08-28 00:00:14', '2014-08-28 00:00:14'),
(794, 4, 407, 'en', 'You must select a bank', '2014-08-28 00:00:43', '2014-08-28 00:00:43'),
(795, 5, 407, 'es', 'Debe seleccionar un banco', '2014-08-28 00:00:43', '2014-08-28 00:00:43'),
(796, 4, 408, 'en', 'You must enter the account balance', '2014-08-28 00:01:30', '2014-08-28 00:01:30'),
(797, 5, 408, 'es', 'Debe ingresar el saldo de la cuenta', '2014-08-28 00:01:30', '2014-08-28 00:01:30'),
(798, 4, 409, 'en', 'You must enter the account name', '2014-08-28 00:02:06', '2014-08-28 00:02:06'),
(799, 5, 409, 'es', 'Debe ingresar el nombre de la cuenta', '2014-08-28 00:02:06', '2014-08-28 00:02:06'),
(800, 4, 410, 'en', 'Bank', '2014-08-28 00:06:01', '2014-08-28 00:06:01'),
(801, 5, 410, 'es', 'Banco', '2014-08-28 00:06:01', '2014-08-28 00:06:01'),
(802, 4, 411, 'en', 'Balance', '2014-08-28 00:06:24', '2014-08-28 00:06:24'),
(803, 5, 411, 'es', 'Saldo', '2014-08-28 00:06:24', '2014-08-28 00:06:24'),
(804, 8, 8, 'es', 'Número', '2014-08-28 00:11:20', '2014-08-28 00:11:20'),
(805, 4, 412, 'en', 'Select a bank', '2014-08-28 00:13:19', '2014-08-28 00:13:19'),
(806, 5, 412, 'es', 'Seleccione un banco', '2014-08-28 00:13:19', '2014-08-28 00:13:19'),
(807, 4, 413, 'en', 'New Account', '2014-08-28 00:13:50', '2014-08-28 00:13:50'),
(808, 5, 413, 'es', 'Nueva Cuenta', '2014-08-28 00:13:50', '2014-08-28 00:13:50'),
(809, 4, 414, 'en', 'Accounts', '2014-08-28 00:14:08', '2014-08-28 00:14:08'),
(810, 5, 414, 'es', 'Cuentas', '2014-08-28 00:14:08', '2014-08-28 00:14:08'),
(811, 4, 415, 'en', 'Edit Account', '2014-08-28 00:14:32', '2014-08-28 00:14:32'),
(812, 5, 415, 'es', 'Editar Cuenta', '2014-08-28 00:14:32', '2014-08-28 00:14:32'),
(813, 4, 416, 'en', 'Delete account', '2014-08-28 00:15:11', '2014-08-28 00:15:11'),
(814, 5, 416, 'es', 'Eliminar cuenta', '2014-08-28 00:15:11', '2014-08-28 00:15:11'),
(815, 4, 417, 'en', 'Are you sure you want to delete this account', '2014-08-28 00:17:53', '2014-08-28 00:17:53'),
(816, 5, 417, 'es', 'Esta seguro que desea eliminar esta cuenta', '2014-08-28 00:17:53', '2014-08-28 00:17:53'),
(817, 4, 418, 'en', 'Account Details', '2014-08-28 00:18:25', '2014-08-28 00:18:25'),
(818, 5, 418, 'es', 'Detalles de la cuenta', '2014-08-28 00:18:25', '2014-08-28 00:18:25'),
(819, 4, 419, 'en', 'Can not delete this account because it has associated records', '2014-08-28 00:20:22', '2014-08-28 00:20:22'),
(820, 5, 419, 'es', 'No se puede eliminar esta cuenta  ya que tiene registros asociados', '2014-08-28 00:20:22', '2014-08-28 00:20:22'),
(821, 4, 420, 'en', 'Documents', '2014-09-23 21:52:03', '2014-09-23 21:52:03'),
(822, 5, 420, 'es', 'Documentos', '2014-09-23 21:52:03', '2014-09-23 21:52:03'),
(823, 4, 421, 'en', 'Records of Expenses', '2014-09-23 21:54:38', '2014-09-23 21:54:38'),
(824, 5, 421, 'es', 'Documentos de Gastos', '2014-09-23 21:54:38', '2014-09-23 21:54:38'),
(825, 4, 422, 'en', 'Description of expense', '2014-09-23 22:00:41', '2014-09-23 22:00:41'),
(826, 5, 422, 'es', 'Descripción del gasto', '2014-09-23 22:00:41', '2014-09-23 22:00:41'),
(827, 4, 423, 'en', 'File', '2014-09-23 22:04:32', '2014-09-23 22:04:32'),
(828, 5, 423, 'es', 'Archivo', '2014-09-23 22:04:32', '2014-09-23 22:04:32'),
(829, 4, 424, 'en', 'New Document', '2014-09-23 22:07:38', '2014-09-23 22:07:38'),
(830, 5, 424, 'es', 'Nuevo Documento', '2014-09-23 22:07:38', '2014-09-23 22:07:38'),
(831, 4, 425, 'en', 'Edit Document', '2014-09-23 22:09:04', '2014-09-23 22:09:04'),
(832, 5, 425, 'es', 'Editar Documento', '2014-09-23 22:09:04', '2014-09-23 22:09:04'),
(833, 4, 426, 'en', 'Document Details', '2014-09-23 22:16:43', '2014-09-23 22:16:43'),
(834, 5, 426, 'es', 'Detalles del documento', '2014-09-23 22:16:43', '2014-09-23 22:16:43'),
(835, 4, 427, 'en', 'Delete Document', '2014-09-23 22:17:04', '2014-09-23 22:17:04'),
(836, 5, 427, 'es', 'Eliminar Documento', '2014-09-23 22:17:04', '2014-09-23 22:17:04'),
(837, 4, 428, 'en', 'See image', '2014-09-23 22:18:43', '2014-09-23 22:18:43'),
(838, 5, 428, 'es', 'Ver imagen', '2014-09-23 22:18:43', '2014-09-23 22:18:43'),
(839, 4, 429, 'en', 'Download', '2014-09-23 22:19:00', '2014-09-23 22:19:00'),
(840, 5, 429, 'es', 'Descargar', '2014-09-23 22:19:00', '2014-09-23 22:19:00'),
(841, 4, 430, 'en', 'Are you sure you want to delete this document', '2014-09-23 22:19:44', '2014-09-23 22:19:44'),
(842, 5, 430, 'es', 'Esta seguro que desea eliminar este documento', '2014-09-23 22:19:44', '2014-09-23 22:19:44'),
(843, 6, 431, 'en', 'Please select a file.', '2014-09-25 18:58:03', '2014-09-25 18:58:03'),
(844, 7, 431, 'es', 'Por favor seleccione un archivo', '2014-09-25 18:58:03', '2014-09-25 18:58:03'),
(845, 6, 432, 'en', 'You must enter a name', '2014-09-25 20:57:05', '2014-09-25 20:57:05'),
(846, 7, 432, 'es', 'Debe ingresar un nombre', '2014-09-25 20:57:05', '2014-09-25 20:57:05'),
(847, 6, 433, 'en', 'A file already exists with that name', '2014-09-25 21:03:12', '2014-09-25 21:03:12'),
(848, 7, 433, 'es', 'Ya existe un archivo con ese nombre', '2014-09-25 21:03:12', '2014-09-25 21:03:12'),
(849, 4, 434, 'en', 'You must select a file', '2014-09-30 20:49:08', '2014-09-30 20:49:08'),
(850, 5, 434, 'es', 'Debe seleccionar un archivo', '2014-09-30 20:49:08', '2014-09-30 20:49:08'),
(851, 4, 435, 'en', 'You must enter a name', '2014-09-30 20:50:07', '2014-09-30 20:50:07'),
(852, 5, 435, 'es', 'Debe ingresar un nombre', '2014-09-30 20:50:07', '2014-09-30 20:50:07'),
(853, 4, 436, 'en', 'You must select a bank account', '2014-09-30 22:08:54', '2014-09-30 22:08:54'),
(854, 5, 436, 'es', 'Debe seleccionar una cuenta bancaria', '2014-09-30 22:08:54', '2014-09-30 22:08:54'),
(855, 4, 437, 'en', 'Select a bank account', '2014-09-30 22:09:51', '2014-09-30 22:09:51'),
(856, 5, 437, 'es', 'Seleccione una cuenta bancaria', '2014-09-30 22:09:51', '2014-09-30 22:09:51'),
(857, 6, 438, 'en', 'You must select a bank account', '2014-09-30 23:18:51', '2014-09-30 23:18:51'),
(858, 7, 438, 'es', 'Debe seleccionar una cuenta bancaria', '2014-09-30 23:18:51', '2014-09-30 23:18:51'),
(859, 6, 439, 'en', 'You must select a cause type', '2014-10-07 18:17:15', '2014-10-07 18:17:15'),
(860, 7, 439, 'es', 'Debe seleccionar un tipo de causa', '2014-10-07 18:17:15', '2014-10-07 18:17:15'),
(861, 4, 440, 'en', 'Cause type', '2014-10-07 20:20:59', '2014-10-07 20:20:59'),
(862, 5, 440, 'es', 'Tipo de causa', '2014-10-07 20:20:59', '2014-10-07 20:20:59'),
(863, 4, 441, 'en', 'Cause Types', '2014-10-07 21:42:50', '2014-10-07 21:42:50'),
(864, 5, 441, 'es', 'Tipos de Causa', '2014-10-07 21:42:50', '2014-10-07 21:42:50'),
(865, 4, 442, 'en', 'New Cause type', '2014-10-07 21:48:34', '2014-10-07 21:48:34'),
(866, 5, 442, 'es', 'Nuevo tipo de causa', '2014-10-07 21:48:34', '2014-10-07 21:48:34'),
(867, 4, 443, 'en', 'You must enter a cause type', '2014-10-07 21:49:17', '2014-10-07 21:49:17'),
(868, 5, 443, 'es', 'Debe ingresar un tipo de causa', '2014-10-07 21:49:17', '2014-10-07 21:49:17'),
(869, 6, 444, 'en', 'You must enter a cause type', '2014-10-07 21:50:37', '2014-10-07 21:50:37'),
(870, 7, 444, 'es', 'Debe ingresar un tipo de causa', '2014-10-07 21:50:37', '2014-10-07 21:50:37'),
(871, 6, 445, 'en', 'There is already such a cause type', '2014-10-07 21:54:02', '2014-10-07 21:54:02'),
(872, 7, 445, 'es', 'Ya existe ese tipo de causa', '2014-10-07 21:54:02', '2014-10-07 21:54:02'),
(873, 4, 446, 'en', 'Edit cause type', '2014-10-07 21:58:48', '2014-10-07 21:58:48'),
(874, 5, 446, 'es', 'Editar tipo de causa', '2014-10-07 21:58:48', '2014-10-07 21:58:48'),
(875, 4, 447, 'en', 'Cause type Details', '2014-10-07 22:02:27', '2014-10-07 22:02:27'),
(876, 5, 447, 'es', 'Detalles del tipo de causa', '2014-10-07 22:02:27', '2014-10-07 22:02:27'),
(877, 4, 448, 'en', 'Delete cause type', '2014-10-07 22:03:32', '2014-10-07 22:03:32'),
(878, 5, 448, 'es', 'Eliminar tipo de causa', '2014-10-07 22:03:32', '2014-10-07 22:03:32'),
(879, 4, 449, 'en', 'Are you sure you want to delete this cause type', '2014-10-07 22:04:30', '2014-10-07 22:04:30'),
(880, 5, 449, 'es', 'Esta seguro que desea eliminar este tipo de causa', '2014-10-07 22:04:30', '2014-10-07 22:04:30'),
(881, 6, 450, 'en', 'Already have associated this role , please check', '2014-10-23 11:11:38', '2014-10-23 11:11:38'),
(882, 7, 450, 'es', 'Ya se tiene asociado este rol , por favor verifique', '2014-10-23 11:11:38', '2014-10-23 11:11:38'),
(883, 4, 451, 'en', 'You must select a role', '2014-10-23 11:12:30', '2014-10-23 11:12:30'),
(884, 5, 451, 'es', 'Debe seleccionar un rol', '2014-10-23 11:12:30', '2014-10-23 11:12:30'),
(885, 4, 452, 'en', 'User Roles', '2014-10-23 11:15:29', '2014-10-23 11:15:29'),
(886, 5, 452, 'es', 'Roles del usuario', '2014-10-23 11:15:29', '2014-10-23 11:15:29'),
(887, 4, 453, 'en', 'User Roles /', '2014-10-23 11:18:57', '2014-10-23 11:18:57'),
(888, 5, 453, 'es', 'Roles del usuario / ', '2014-10-23 11:18:57', '2014-10-23 11:18:57'),
(889, 4, 454, 'en', 'New User role /', '2014-10-23 11:25:40', '2014-10-23 11:25:40'),
(890, 5, 454, 'es', 'Nuevo rol del usuario /', '2014-10-23 11:25:40', '2014-10-23 11:25:40'),
(891, 4, 455, 'en', 'Select a role', '2014-10-23 11:26:15', '2014-10-23 11:26:15'),
(892, 5, 455, 'es', 'Seleccione un rol', '2014-10-23 11:26:15', '2014-10-23 11:26:15'),
(893, 4, 456, 'en', 'Role details /', '2014-10-23 11:33:53', '2014-10-23 11:33:53'),
(894, 5, 456, 'es', 'Detalles del rol /', '2014-10-23 11:33:53', '2014-10-23 11:33:53'),
(895, 4, 457, 'en', 'Remove role', '2014-10-23 11:40:23', '2014-10-23 11:40:23'),
(896, 5, 457, 'es', 'Quitar rol', '2014-10-23 11:40:23', '2014-10-23 11:40:23'),
(897, 4, 458, 'en', 'Do you want to remove this role', '2014-10-23 11:45:18', '2014-10-23 11:45:18'),
(898, 5, 458, 'es', 'Desea quitar este rol', '2014-10-23 11:45:18', '2014-10-23 11:45:18'),
(899, 4, 459, 'en', 'User Details /', '2014-10-23 11:54:23', '2014-10-23 11:54:23'),
(900, 5, 459, 'es', 'Detalles del Usuario /', '2014-10-23 11:54:23', '2014-10-23 11:54:23'),
(901, 4, 460, 'en', 'Income', '2014-10-23 13:38:14', '2014-10-23 13:38:14'),
(902, 5, 460, 'es', 'Ingresos', '2014-10-23 13:38:14', '2014-10-23 13:38:14'),
(903, 4, 461, 'en', 'You must select a condo', '2014-10-27 10:46:53', '2014-10-27 10:46:53'),
(904, 5, 461, 'es', 'Debe seleccionar un condominio', '2014-10-27 10:46:53', '2014-10-27 10:46:53'),
(905, 4, 462, 'en', 'You must select a tower', '2014-10-27 10:47:22', '2014-10-27 10:47:22'),
(906, 5, 462, 'es', 'Debe seleccionar una torre', '2014-10-27 10:47:22', '2014-10-27 10:47:22'),
(907, 4, 463, 'en', 'You must select a bank account', '2014-10-27 10:47:52', '2014-10-27 10:47:52'),
(908, 5, 463, 'es', 'Debe seleccionar una cuenta', '2014-10-27 10:47:52', '2014-10-27 10:47:52'),
(909, 4, 464, 'en', 'You must select a cause', '2014-10-27 10:48:20', '2014-10-27 10:48:20'),
(910, 5, 464, 'es', 'Debe seleccionar una causa', '2014-10-27 10:48:20', '2014-10-27 10:48:20'),
(911, 4, 465, 'en', 'You must select a description', '2014-10-27 10:49:44', '2014-10-27 10:49:44'),
(912, 5, 465, 'es', 'Debe ingresar una descripción', '2014-10-27 10:49:44', '2014-10-27 10:49:44'),
(913, 4, 466, 'en', 'You must enter an amount', '2014-10-27 10:50:13', '2014-10-27 10:50:13'),
(914, 5, 466, 'es', 'Debe ingresar un monto', '2014-10-27 10:50:13', '2014-10-27 10:50:13'),
(915, 4, 467, 'en', 'You must enter a date', '2014-10-27 10:51:18', '2014-10-27 10:51:18'),
(916, 5, 467, 'es', 'Debe ingresar una fecha', '2014-10-27 10:51:18', '2014-10-27 10:51:18'),
(917, 6, 468, 'en', 'You must select a condo', '2014-10-27 10:56:30', '2014-10-27 10:56:30'),
(918, 7, 468, 'es', 'Debe seleccionar un condominio', '2014-10-27 10:56:30', '2014-10-27 10:56:30'),
(919, 6, 469, 'en', 'You must select a tower', '2014-10-27 10:56:58', '2014-10-27 10:56:58'),
(920, 7, 469, 'es', 'Debe seleccionar una torre', '2014-10-27 10:56:58', '2014-10-27 10:56:58'),
(921, 6, 470, 'en', 'You must select a bank account', '2014-10-27 10:57:26', '2014-10-27 10:57:26'),
(922, 7, 470, 'es', 'Debe seleccionar una cuenta', '2014-10-27 10:57:26', '2014-10-27 10:57:26'),
(923, 6, 471, 'en', 'You must select a cause', '2014-10-27 10:58:36', '2014-10-27 10:58:36'),
(924, 7, 471, 'es', 'Debe seleccionar una causa', '2014-10-27 10:58:36', '2014-10-27 10:58:36'),
(925, 6, 472, 'en', 'You must enter a description', '2014-10-27 11:00:15', '2014-10-27 11:00:15'),
(926, 7, 472, 'es', 'Debe ingresar una descripción', '2014-10-27 11:00:15', '2014-10-27 11:00:15'),
(927, 6, 473, 'en', 'You must enter an amount', '2014-10-27 11:00:53', '2014-10-27 11:00:53'),
(928, 7, 473, 'es', 'Debe ingresar un monto', '2014-10-27 11:00:53', '2014-10-27 11:00:53'),
(929, 6, 474, 'en', 'you must enter a date', '2014-10-27 11:01:48', '2014-10-27 11:01:48'),
(930, 7, 474, 'es', 'Debe ingresar una fecha', '2014-10-27 11:01:48', '2014-10-27 11:01:48'),
(931, 4, 475, 'en', 'Create', '2014-10-27 11:28:43', '2014-10-27 11:28:43'),
(932, 5, 475, 'es', 'Guardar', '2014-10-27 11:28:43', '2014-10-27 11:28:43'),
(933, 4, 476, 'en', 'Update', '2014-10-27 11:29:04', '2014-10-27 11:29:04'),
(934, 5, 476, 'es', 'Actualizar', '2014-10-27 11:29:04', '2014-10-27 11:29:04'),
(935, 4, 477, 'en', 'New Income', '2014-10-27 11:30:54', '2014-10-27 11:30:54'),
(936, 5, 477, 'es', 'Nuevo Ingreso', '2014-10-27 11:30:54', '2014-10-27 11:30:54'),
(937, 4, 478, 'en', 'Edit Income', '2014-10-27 11:32:12', '2014-10-27 11:32:12'),
(938, 5, 478, 'es', 'Editar Ingreso', '2014-10-27 11:32:12', '2014-10-27 11:32:12'),
(939, 4, 479, 'en', 'Bank Account', '2014-10-27 11:33:30', '2014-10-27 11:33:30'),
(940, 5, 479, 'es', 'Cuenta Bancaria', '2014-10-27 11:33:30', '2014-10-27 11:33:30'),
(941, 4, 480, 'en', 'Income Date', '2014-10-27 11:34:39', '2014-10-27 11:34:39'),
(942, 5, 480, 'es', 'Fecha del ingreso', '2014-10-27 11:34:39', '2014-10-27 11:34:39'),
(943, 4, 481, 'en', 'Delete Income', '2014-10-27 12:02:25', '2014-10-27 12:02:25'),
(944, 5, 481, 'es', 'Eliminar Ingreso', '2014-10-27 12:02:25', '2014-10-27 12:02:25'),
(945, 4, 482, 'en', 'Do you want to delete this icome', '2014-10-27 12:05:28', '2014-10-27 12:05:28'),
(946, 5, 482, 'es', 'Desea eliminar este ingreso', '2014-10-27 12:05:28', '2014-10-27 12:05:28'),
(947, 4, 483, 'en', 'Income Details', '2014-10-27 12:07:53', '2014-10-27 12:07:53'),
(948, 5, 483, 'es', 'Detalles del ingreso', '2014-10-27 12:07:53', '2014-10-27 12:07:53'),
(949, 4, 484, 'en', 'The password fields must match', '2014-10-29 15:35:51', '2014-10-29 15:35:51'),
(950, 5, 484, 'es', 'Los valores de Contraseña y Confirmar contraseña deben ser iguales', '2014-10-29 15:35:51', '2014-10-29 15:35:51'),
(951, 4, 485, 'en', 'Change password', '2014-10-29 15:54:12', '2014-10-29 15:54:12'),
(952, 5, 485, 'es', 'Cambiar contraseña', '2014-10-29 15:54:12', '2014-10-29 15:54:12'),
(953, 4, 486, 'en', 'Password', '2014-10-29 15:56:31', '2014-10-29 15:56:31'),
(954, 5, 486, 'es', 'Contraseña', '2014-10-29 15:56:31', '2014-10-29 15:56:31'),
(955, 4, 487, 'en', 'Confirm Password', '2014-10-29 15:56:59', '2014-10-29 15:56:59'),
(956, 5, 487, 'es', 'Confirmar Contraseña', '2014-10-29 15:56:59', '2014-10-29 15:56:59'),
(957, 4, 488, 'en', 'You must enter a password confirmation', '2014-10-30 11:20:45', '2014-10-30 11:20:45'),
(958, 5, 488, 'es', 'Debe ingresar la confirmación de la contraseña', '2014-10-30 11:20:45', '2014-10-30 11:20:45'),
(959, 4, 489, 'en', 'The password fields must match', '2014-10-30 11:40:29', '2014-10-30 11:40:29'),
(960, 5, 489, 'es', 'Los valores de Contraseña y Confirmar contraseña deben ser iguales', '2014-10-30 11:40:29', '2014-10-30 11:40:29'),
(961, 6, 490, 'en', 'You must enter a description', '2014-11-06 13:09:04', '2014-11-06 13:09:04'),
(962, 7, 490, 'es', 'Debe ingresar una descripción', '2014-11-06 13:09:04', '2014-11-06 13:09:04'),
(963, 6, 491, 'en', 'You must enter an amount', '2014-11-06 13:09:44', '2014-11-06 13:09:44'),
(964, 7, 491, 'es', 'Debe ingresar un monto', '2014-11-06 13:09:44', '2014-11-06 13:09:44'),
(965, 6, 492, 'en', 'The amount must be greater than 0', '2014-11-06 13:10:40', '2014-11-06 13:10:40'),
(966, 7, 492, 'es', 'El monto debe ser mayor que 0', '2014-11-06 13:10:40', '2014-11-06 13:10:40'),
(967, 6, 493, 'en', 'You must select a date', '2014-11-06 13:13:23', '2014-11-06 13:13:23'),
(968, 7, 493, 'es', 'Debe seleccionar una fecha', '2014-11-06 13:13:23', '2014-11-06 13:13:23'),
(969, 6, 494, 'en', 'You must select a bank account', '2014-11-06 13:15:52', '2014-11-06 13:15:52'),
(970, 7, 494, 'es', 'Debe seleccionar una cuenta', '2014-11-06 13:15:52', '2014-11-06 13:15:52'),
(971, 4, 495, 'en', 'You must select a tower', '2014-11-06 15:09:28', '2014-11-06 15:09:28'),
(972, 5, 495, 'es', 'Debe seleccionar una torre', '2014-11-06 15:09:28', '2014-11-06 15:09:28'),
(973, 4, 496, 'en', 'You must select an apartment', '2014-11-06 15:10:43', '2014-11-06 15:10:43'),
(974, 5, 496, 'es', 'Debe seleccionar un apartamento', '2014-11-06 15:10:43', '2014-11-06 15:10:43'),
(975, 4, 497, 'en', 'You must enter a description', '2014-11-06 15:11:19', '2014-11-06 15:11:19'),
(976, 5, 497, 'es', 'Debe ingresar una descripción', '2014-11-06 15:11:19', '2014-11-06 15:11:19'),
(977, 4, 498, 'en', 'You must enter an amount', '2014-11-06 15:11:59', '2014-11-06 15:11:59'),
(978, 5, 498, 'es', 'Debe ingresar un monto', '2014-11-06 15:11:59', '2014-11-06 15:11:59'),
(979, 4, 499, 'en', 'You must enter a date', '2014-11-06 15:12:48', '2014-11-06 15:12:48'),
(980, 5, 499, 'es', 'Debe ingresar una fecha', '2014-11-06 15:12:48', '2014-11-06 15:12:48'),
(981, 4, 500, 'en', 'You must enter a valid date', '2014-11-06 15:13:17', '2014-11-06 15:13:17'),
(982, 5, 500, 'es', 'Debe ingresar una fecha válida', '2014-11-06 15:13:17', '2014-11-06 15:13:17'),
(983, 4, 501, 'en', 'You must select a bank account', '2014-11-06 15:13:58', '2014-11-06 15:13:58'),
(984, 5, 501, 'es', 'Debe seleccionar una cuenta', '2014-11-06 15:13:58', '2014-11-06 15:13:58'),
(985, 4, 502, 'en', 'Payments', '2014-11-06 15:16:17', '2014-11-06 15:16:17'),
(986, 5, 502, 'es', 'Pagos', '2014-11-06 15:16:17', '2014-11-06 15:16:17'),
(987, 4, 503, 'en', 'New Payment', '2014-11-06 15:16:43', '2014-11-06 15:16:43'),
(988, 5, 503, 'es', 'Nuevo Pago', '2014-11-06 15:16:43', '2014-11-06 15:16:43'),
(989, 4, 504, 'en', 'Edit Payment', '2014-11-06 15:18:10', '2014-11-06 15:18:10'),
(990, 5, 504, 'es', 'Editar Pago', '2014-11-06 15:18:10', '2014-11-06 15:18:10'),
(991, 4, 505, 'en', 'Payment details', '2014-11-06 15:23:44', '2014-11-06 15:23:44'),
(992, 5, 505, 'es', 'Detalles del pago', '2014-11-06 15:23:44', '2014-11-06 15:23:44'),
(993, 4, 506, 'en', 'Delete Payment', '2014-11-06 15:24:12', '2014-11-06 15:24:12'),
(994, 5, 506, 'es', 'Eliminar Pago', '2014-11-06 15:24:12', '2014-11-06 15:24:12'),
(995, 4, 507, 'en', 'Bank Account', '2014-11-06 15:24:40', '2014-11-06 15:24:40'),
(996, 5, 507, 'es', 'Cuenta', '2014-11-06 15:24:40', '2014-11-06 15:24:40'),
(997, 4, 508, 'en', 'Are you sure you want to delete this payment', '2014-11-06 15:27:19', '2014-11-06 15:27:19'),
(998, 5, 508, 'es', 'Esta seguro que quiere eliminar este pago', '2014-11-06 15:27:19', '2014-11-06 15:27:19'),
(999, 6, 509, 'en', 'You must enter a payment method', '2014-11-07 13:24:02', '2014-11-07 13:24:02'),
(1000, 7, 509, 'es', 'Debe ingresar un tipo de pago', '2014-11-07 13:24:02', '2014-11-07 13:24:02'),
(1001, 6, 510, 'en', 'The method already exists', '2014-11-07 13:25:11', '2014-11-07 13:25:11'),
(1002, 7, 510, 'es', 'Ya existe ese metodo', '2014-11-07 13:25:11', '2014-11-07 13:25:11'),
(1003, 6, 511, 'en', 'You must select a payment method', '2014-11-07 13:57:03', '2014-11-07 13:57:03'),
(1004, 7, 511, 'es', 'Debe seleccionar un tipo de pago', '2014-11-07 13:57:03', '2014-11-07 13:57:03'),
(1005, 4, 512, 'en', 'Payment Method', '2014-11-07 14:06:34', '2014-11-07 14:06:34'),
(1006, 5, 512, 'es', 'Tipo de Pago', '2014-11-07 14:06:34', '2014-11-07 14:06:34'),
(1007, 4, 513, 'en', 'Cash', '2014-11-07 14:09:40', '2014-11-07 14:09:40'),
(1008, 5, 513, 'es', 'Efectivo', '2014-11-07 14:09:40', '2014-11-07 14:09:40'),
(1009, 4, 514, 'en', 'Check', '2014-11-07 14:10:00', '2014-11-07 14:10:00'),
(1010, 5, 514, 'es', 'Cheque', '2014-11-07 14:10:00', '2014-11-07 14:10:00'),
(1011, 4, 515, 'en', 'E-Banking', '2014-11-07 14:10:38', '2014-11-07 14:10:38'),
(1012, 5, 515, 'es', 'Banca en línea', '2014-11-07 14:10:38', '2014-11-07 14:10:38'),
(1013, 4, 516, 'en', 'Card', '2014-11-07 14:11:15', '2014-11-07 14:11:15'),
(1014, 5, 516, 'es', 'Tarjeta', '2014-11-07 14:11:15', '2014-11-07 14:11:15'),
(1015, 4, 517, 'en', 'Select a Payment method', '2014-11-07 14:17:30', '2014-11-07 14:17:30'),
(1016, 5, 517, 'es', 'Seleccione un Tipo de pago', '2014-11-07 14:17:30', '2014-11-07 14:17:30'),
(1017, 4, 518, 'en', 'You must select a payment method', '2014-11-07 14:32:10', '2014-11-07 14:32:10'),
(1018, 5, 518, 'es', 'Debe seleccionar el tipo de pago', '2014-11-07 14:32:10', '2014-11-07 14:32:10'),
(1019, 4, 519, 'en', 'The amount must be a number', '2014-11-11 09:42:48', '2014-11-11 09:42:48'),
(1020, 5, 519, 'es', 'El monto debe ser un número', '2014-11-11 09:42:48', '2014-11-11 09:42:48'),
(1021, 6, 520, 'en', 'You must select a provider', '2014-11-11 10:58:56', '2014-11-11 10:58:56'),
(1022, 7, 520, 'es', 'Debe seleccionar un proveedor', '2014-11-11 10:58:56', '2014-11-11 10:58:56'),
(1023, 4, 521, 'en', 'You must select a provider', '2014-11-11 11:00:47', '2014-11-11 11:00:47'),
(1024, 5, 521, 'es', 'Debe seleccionar un proveedor', '2014-11-11 11:00:47', '2014-11-11 11:00:47'),
(1025, 4, 522, 'en', 'Depositor', '2014-11-11 13:54:33', '2014-11-11 13:54:33'),
(1026, 5, 522, 'es', 'Depositante', '2014-11-11 13:54:33', '2014-11-11 13:54:33'),
(1027, 6, 523, 'en', 'You must enter a depositor', '2014-11-11 15:06:48', '2014-11-11 15:06:48'),
(1028, 7, 523, 'es', 'Debe ingresar un depositante', '2014-11-11 15:06:48', '2014-11-11 15:06:48'),
(1029, 4, 524, 'en', 'You must enter a depositor', '2014-11-11 15:13:17', '2014-11-11 15:13:17'),
(1030, 5, 524, 'es', 'Debe ingresar un depositante', '2014-11-11 15:13:17', '2014-11-11 15:13:17'),
(1031, 4, 525, 'en', 'Key', '2014-11-27 14:39:50', '2014-11-27 14:41:05'),
(1032, 5, 525, 'es', 'Identificador', '2014-11-27 14:39:50', '2014-11-27 14:41:05'),
(1033, 4, 526, 'en', 'Translation', '2014-11-27 14:42:16', '2014-11-27 14:42:16'),
(1034, 5, 526, 'es', 'Traducción', '2014-11-27 14:42:16', '2014-11-27 14:42:16'),
(1035, 4, 527, 'en', 'You must enter a key', '2014-11-27 15:47:10', '2014-11-27 15:47:10'),
(1036, 5, 527, 'es', 'Debe ingresar un identificador', '2014-11-27 15:47:10', '2014-11-27 15:47:10'),
(1037, 4, 528, 'en', 'Statement of Account', '2014-12-03 12:17:52', '2014-12-03 12:18:42'),
(1038, 5, 528, 'es', 'Estado de Cuenta', '2014-12-03 12:17:52', '2014-12-03 12:17:52'),
(1039, 4, 529, 'en', 'Month', '2014-12-03 12:19:45', '2014-12-03 12:19:45'),
(1040, 5, 529, 'es', 'Mes', '2014-12-03 12:19:45', '2014-12-03 12:19:45'),
(1041, 4, 530, 'en', 'Year', '2014-12-03 12:20:07', '2014-12-03 12:20:07'),
(1042, 5, 530, 'es', 'Año', '2014-12-03 12:20:07', '2014-12-03 12:20:07'),
(1043, 4, 531, 'en', 'View Detail', '2014-12-03 15:13:37', '2014-12-03 15:13:37'),
(1044, 5, 531, 'es', 'Ver Detalle', '2014-12-03 15:13:37', '2014-12-03 15:13:37'),
(1045, 4, 532, 'en', 'Select a Month', '2014-12-03 15:18:06', '2014-12-03 15:18:06'),
(1046, 5, 532, 'es', 'Seleccione un Mes', '2014-12-03 15:18:06', '2014-12-03 15:18:06'),
(1047, 4, 533, 'en', 'Select a Year', '2014-12-03 15:18:40', '2014-12-03 15:18:40'),
(1048, 5, 533, 'es', 'Seleccione un Año', '2014-12-03 15:18:40', '2014-12-03 15:18:40'),
(1049, 4, 534, 'en', 'January', '2014-12-03 15:23:35', '2014-12-03 15:23:35'),
(1050, 5, 534, 'es', 'Enero', '2014-12-03 15:23:35', '2014-12-03 15:23:35'),
(1051, 4, 535, 'en', 'February', '2014-12-03 15:24:01', '2014-12-03 15:24:01'),
(1052, 5, 535, 'es', 'Febrero', '2014-12-03 15:24:01', '2014-12-03 15:24:01'),
(1053, 4, 536, 'en', 'March', '2014-12-03 15:24:23', '2014-12-03 15:24:23'),
(1054, 5, 536, 'es', 'Marzo', '2014-12-03 15:24:23', '2014-12-03 15:24:23'),
(1055, 4, 537, 'en', 'April', '2014-12-03 15:30:43', '2014-12-03 15:30:43'),
(1056, 5, 537, 'es', 'Abril', '2014-12-03 15:30:43', '2014-12-03 15:30:43'),
(1057, 4, 538, 'en', 'May', '2014-12-03 15:31:11', '2014-12-03 15:31:11'),
(1058, 5, 538, 'es', 'Mayo', '2014-12-03 15:31:11', '2014-12-03 15:31:11'),
(1059, 4, 539, 'en', 'June', '2014-12-03 15:31:38', '2014-12-03 15:31:38'),
(1060, 5, 539, 'es', 'Junio', '2014-12-03 15:31:38', '2014-12-03 15:31:38'),
(1061, 4, 540, 'en', 'July', '2014-12-03 15:32:06', '2014-12-03 15:32:06'),
(1062, 5, 540, 'es', 'Julio', '2014-12-03 15:32:06', '2014-12-03 15:32:06'),
(1063, 4, 541, 'en', 'August', '2014-12-03 15:32:37', '2014-12-03 15:32:37'),
(1064, 5, 541, 'es', 'Agosto', '2014-12-03 15:32:37', '2014-12-03 15:32:37'),
(1065, 4, 542, 'en', 'September', '2014-12-03 15:33:15', '2014-12-03 15:33:15'),
(1066, 5, 542, 'es', 'Septiembre', '2014-12-03 15:33:15', '2014-12-03 15:33:15'),
(1067, 4, 543, 'en', 'October', '2014-12-03 15:33:44', '2014-12-03 15:33:44'),
(1068, 5, 543, 'es', 'Octubre', '2014-12-03 15:33:44', '2014-12-03 15:33:44'),
(1069, 4, 544, 'en', 'November', '2014-12-03 15:34:20', '2014-12-03 15:34:20'),
(1070, 5, 544, 'es', 'Noviembre', '2014-12-03 15:34:20', '2014-12-03 15:34:20'),
(1071, 4, 545, 'en', 'December', '2014-12-03 15:34:50', '2014-12-03 15:34:50'),
(1072, 5, 545, 'es', 'Diciembre', '2014-12-03 15:34:50', '2014-12-03 15:34:50'),
(1073, 4, 546, 'en', 'Type', '2014-12-03 15:46:34', '2014-12-03 15:46:34'),
(1074, 5, 546, 'es', 'Clase', '2014-12-03 15:46:34', '2014-12-03 15:46:34'),
(1075, 4, 547, 'en', 'Credit', '2014-12-03 15:47:04', '2014-12-03 15:47:04'),
(1076, 5, 547, 'es', 'Crédito', '2014-12-03 15:47:04', '2014-12-03 15:47:04'),
(1077, 4, 548, 'en', 'Debit', '2014-12-03 15:47:33', '2014-12-03 15:47:33'),
(1078, 5, 548, 'es', 'Débito', '2014-12-03 15:47:33', '2014-12-03 15:47:33'),
(1079, 4, 549, 'en', 'Invoice Number', '2014-12-03 15:50:34', '2014-12-03 15:50:34'),
(1080, 5, 549, 'es', 'Recibo', '2014-12-03 15:50:34', '2014-12-03 15:50:34');
INSERT INTO `lexik_trans_unit_translations` (`id`, `file_id`, `trans_unit_id`, `locale`, `content`, `created_at`, `updated_at`) VALUES
(1081, 4, 550, 'en', 'Detail', '2014-12-03 15:51:52', '2014-12-03 15:51:52'),
(1082, 5, 550, 'es', 'Detalle', '2014-12-03 15:51:52', '2014-12-03 15:51:52'),
(1083, 4, 551, 'en', 'Consult', '2014-12-04 10:37:43', '2014-12-04 10:37:43'),
(1084, 5, 551, 'es', 'Consultar', '2014-12-04 10:37:43', '2014-12-04 10:37:43'),
(1085, 4, 552, 'en', 'Total Credits', '2014-12-04 10:41:55', '2014-12-04 10:41:55'),
(1086, 5, 552, 'es', 'Total Créditos', '2014-12-04 10:41:55', '2014-12-04 10:41:55'),
(1087, 4, 553, 'en', 'Total Debt', '2014-12-04 10:46:21', '2014-12-04 10:46:21'),
(1088, 5, 553, 'es', 'Total Débitos', '2014-12-04 10:46:21', '2014-12-04 10:46:21'),
(1089, 4, 554, 'en', 'No data', '2014-12-04 15:11:34', '2014-12-04 15:11:34'),
(1090, 5, 554, 'es', 'No hay datos', '2014-12-04 15:11:34', '2014-12-04 15:11:34'),
(1091, 6, 555, 'en', 'You must enter an action name', '2014-12-05 08:50:15', '2014-12-05 08:50:15'),
(1092, 7, 555, 'es', 'Debe ingresar el nombre de la acción', '2014-12-05 08:50:15', '2014-12-05 08:50:15'),
(1093, 6, 556, 'en', 'There is already an action that name', '2014-12-05 08:54:33', '2014-12-05 08:54:33'),
(1094, 7, 556, 'es', 'Ya existe una acción con ese nombre', '2014-12-05 08:54:33', '2014-12-05 08:54:33'),
(1095, 4, 557, 'en', 'You must enter an action name', '2014-12-05 14:20:13', '2014-12-05 14:20:13'),
(1096, 5, 557, 'es', 'Debe ingresar el nombre de la acción', '2014-12-05 14:20:13', '2014-12-05 14:20:13'),
(1097, 4, 558, 'en', 'Security Actions', '2014-12-05 14:52:10', '2014-12-05 14:52:10'),
(1098, 5, 558, 'es', 'Acciones de Seguridad', '2014-12-05 14:52:10', '2014-12-05 14:52:10'),
(1099, 4, 559, 'en', 'New Action', '2014-12-05 14:52:57', '2014-12-05 14:52:57'),
(1100, 5, 559, 'es', 'Nueva Acción', '2014-12-05 14:52:57', '2014-12-05 14:52:57'),
(1101, 4, 560, 'en', 'Edit Action', '2014-12-05 14:53:22', '2014-12-05 14:53:22'),
(1102, 5, 560, 'es', 'Editar Acción', '2014-12-05 14:53:22', '2014-12-05 14:53:22'),
(1103, 4, 561, 'en', 'Action Detail', '2014-12-05 14:56:40', '2014-12-05 14:56:40'),
(1104, 5, 561, 'es', 'Detalle de la Acción', '2014-12-05 14:56:40', '2014-12-05 14:56:40'),
(1105, 4, 562, 'en', 'Delete Action', '2014-12-05 14:58:12', '2014-12-05 14:58:12'),
(1106, 5, 562, 'es', 'Eliminar Acción', '2014-12-05 14:58:12', '2014-12-05 14:58:12'),
(1107, 4, 563, 'en', 'Actions', '2014-12-05 15:08:34', '2014-12-05 15:08:34'),
(1108, 5, 563, 'es', 'Acciones', '2014-12-05 15:08:34', '2014-12-05 15:08:34'),
(1109, 4, 564, 'en', 'Are you sure you want to delete this action', '2014-12-05 15:09:52', '2014-12-05 15:09:52'),
(1110, 5, 564, 'es', 'Esta seguro que desea eliminar esta acción', '2014-12-05 15:09:52', '2014-12-05 15:09:52'),
(1111, 4, 565, 'en', 'New role action', '2014-12-09 15:27:13', '2014-12-09 15:27:13'),
(1112, 5, 565, 'es', 'Nueva acción del rol', '2014-12-09 15:27:13', '2014-12-09 15:27:13'),
(1113, 6, 566, 'en', 'You must select an action', '2014-12-09 15:28:21', '2014-12-09 15:28:21'),
(1114, 7, 566, 'es', 'Debe seleccionar una acción', '2014-12-09 15:28:21', '2014-12-09 15:28:21'),
(1115, 6, 567, 'en', 'This action is already linked to the role', '2014-12-09 15:29:54', '2014-12-09 15:29:54'),
(1116, 7, 567, 'es', 'Ya esta asociada esta accion para el rol', '2014-12-09 15:29:54', '2014-12-09 15:29:54'),
(1117, 4, 568, 'en', 'Edit role action', '2014-12-09 15:33:23', '2014-12-09 15:33:23'),
(1118, 5, 568, 'es', 'Editar acción del rol', '2014-12-09 15:33:23', '2014-12-09 15:33:23'),
(1119, 4, 569, 'en', 'Action', '2014-12-09 15:34:32', '2014-12-09 15:34:32'),
(1120, 5, 569, 'es', 'Acción', '2014-12-09 15:34:32', '2014-12-09 15:34:32'),
(1121, 4, 570, 'en', 'Select an Action', '2014-12-09 15:35:36', '2014-12-09 15:35:36'),
(1122, 5, 570, 'es', 'Seleccione una Acción', '2014-12-09 15:35:36', '2014-12-09 15:35:36'),
(1123, 4, 571, 'en', 'You must select an action', '2014-12-09 16:25:42', '2014-12-09 16:25:42'),
(1124, 5, 571, 'es', 'Debe seleccionar una acción', '2014-12-09 16:25:42', '2014-12-09 16:25:42'),
(1125, 4, 572, 'en', 'Remove Action', '2014-12-10 09:17:28', '2014-12-10 09:17:28'),
(1126, 5, 572, 'es', 'Quitar Acción', '2014-12-10 09:17:28', '2014-12-10 09:17:28'),
(1127, 4, 573, 'en', 'Are you sure you want to remove this action role', '2014-12-10 09:20:15', '2014-12-10 09:20:15'),
(1128, 5, 573, 'es', 'Esta seguro que desea quitar esa accion del rol', '2014-12-10 09:20:15', '2014-12-10 09:20:15'),
(1129, 4, 574, 'en', 'ADMINISTRATION', '2015-02-05 13:22:39', '2015-02-05 13:22:39'),
(1130, 5, 574, 'es', 'ADMINISTRACIÓN', '2015-02-05 13:22:39', '2015-02-05 13:22:39'),
(1131, 6, 575, 'en', 'The username or password are incorrect', '2015-02-05 14:41:43', '2015-02-05 14:41:43'),
(1132, 7, 575, 'es', 'El usuario o password son incorrectos', '2015-02-05 14:41:43', '2015-02-05 14:41:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(10) DEFAULT NULL,
  `description` varchar(60) DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `location`
--

INSERT INTO `location` (`id`, `location`, `description`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 'PB', 'Planta Baja 2', NULL, 'admin', NULL, '2014-11-25 11:07:18'),
(2, '1', 'Primer Piso', NULL, NULL, NULL, NULL),
(3, 'E1', 'E1', NULL, NULL, NULL, NULL),
(5, 'E2', 'E2', NULL, NULL, NULL, NULL),
(6, 'E3', 'E3', 'admin', 'admin', '2014-11-25 11:07:35', '2014-11-25 11:07:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multiparam`
--

CREATE TABLE IF NOT EXISTS `multiparam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(1000) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL,
  `sysparamid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_multiparam_sysparam1_idx` (`sysparamid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parking`
--

CREATE TABLE IF NOT EXISTS `parking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `apartmentid` int(11) DEFAULT NULL,
  `locationid` int(11) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_parking_apartment1_idx` (`apartmentid`),
  KEY `fk_parking_location1_idx` (`locationid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `parking`
--

INSERT INTO `parking` (`id`, `number`, `type`, `apartmentid`, `locationid`, `createdate`, `modifydate`, `createuser`, `modifyuser`) VALUES
(3, '16D', 'Alquilado', 4, 1, NULL, '2014-11-25 10:26:25', NULL, 'admin'),
(4, '1C', 'Propio', 11, 1, NULL, NULL, NULL, NULL),
(5, '8C', 'Propio', 4, 1, '2014-11-25 10:50:01', '2014-11-25 10:50:01', 'admin', 'admin'),
(6, '8D', 'Propio', 15, 2, '2014-11-25 10:52:46', '2014-11-25 10:53:09', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paymentdate` date DEFAULT NULL,
  `amount` float(18,2) DEFAULT NULL,
  `apartmentid` int(11) DEFAULT NULL,
  `description` varchar(60) DEFAULT NULL,
  `accountid` int(11) NOT NULL,
  `paymentmethod` varchar(45) DEFAULT NULL,
  `depositor` varchar(45) DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_payment_apartment1_idx` (`apartmentid`),
  KEY `fk_payment_account1_idx` (`accountid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `payment`
--

INSERT INTO `payment` (`id`, `paymentdate`, `amount`, `apartmentid`, `description`, `accountid`, `paymentmethod`, `depositor`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, '2014-11-12', 2002.00, 4, 'Prueba factura', 1, 'Efectivo', 'Andres Franco', NULL, 'admin', NULL, '2014-11-25 13:53:38'),
(2, '2014-11-11', 300.00, 3, 'Prueba2', 1, 'Efectivo', 'Prueba', NULL, NULL, NULL, NULL),
(3, '2014-11-06', 500.00, 4, 'as', 1, 'Efectivo', 'assss', 'admin', 'admin', '2014-11-25 13:54:12', '2014-11-25 13:54:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paymentinvoice`
--

CREATE TABLE IF NOT EXISTS `paymentinvoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(45) DEFAULT NULL,
  `paymentid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_paymentinvoice_payment1_idx` (`paymentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `paymentinvoice`
--

INSERT INTO `paymentinvoice` (`id`, `description`, `paymentid`) VALUES
(2, 'Prueba factura', 1),
(3, 'Prueba2', 2),
(4, 'as', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provider`
--

CREATE TABLE IF NOT EXISTS `provider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `address` varchar(400) DEFAULT NULL,
  `companyid` int(11) DEFAULT NULL,
  `towerid` int(11) NOT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_provider_company1_idx` (`companyid`),
  KEY `fk_provider_tower1_idx` (`towerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `provider`
--

INSERT INTO `provider` (`id`, `name`, `phone`, `email`, `address`, `companyid`, `towerid`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(6, 'Electra', '2323232', NULL, NULL, 1, 2, NULL, 'admin', NULL, '2014-11-24 15:05:35'),
(7, 'Tropigas', '232322', NULL, NULL, 1, 2, NULL, NULL, NULL, NULL),
(8, 'Idaan', '232323', NULL, NULL, 2, 1, NULL, NULL, NULL, NULL),
(9, 'assss', '232323', NULL, NULL, 1, 2, 'admin', 'admin', '2014-11-24 15:07:26', '2014-11-24 15:07:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provider_employee`
--

CREATE TABLE IF NOT EXISTS `provider_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT NULL,
  `idnumber` varchar(32) DEFAULT NULL,
  `phone` varchar(32) DEFAULT NULL,
  `providerid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_provider_employee_provider1_idx` (`providerid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provider_schedule`
--

CREATE TABLE IF NOT EXISTS `provider_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `starttime` time DEFAULT NULL,
  `endtime` time DEFAULT NULL,
  `provideremployeeid` int(11) DEFAULT NULL,
  `dayid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_provider_schedule_provider_employee1_idx` (`provideremployeeid`),
  KEY `fk_provider_schedule_day1_idx` (`dayid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservename` varchar(45) DEFAULT NULL,
  `reason` varchar(45) DEFAULT NULL,
  `reservationdate` date DEFAULT NULL,
  `hourfrom` time DEFAULT NULL,
  `hourto` time DEFAULT NULL,
  `apartmentid` int(11) NOT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reservation_apartment1_idx` (`apartmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservecalendar`
--

CREATE TABLE IF NOT EXISTS `reservecalendar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `allday` varchar(255) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `reservecalendar`
--

INSERT INTO `reservecalendar` (`id`, `title`, `start`, `end`, `url`, `allday`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 'test', '2014-11-07 00:00:00', '2014-11-07 01:00:00', 'www.google.com', 'test', 'admin', 'admin', '2015-02-06 09:53:12', '2015-02-06 09:53:12'),
(2, 'test2', '2014-12-07 00:00:00', '2014-12-07 01:00:00', 'www.google.com', 'test2', 'admin', 'admin', '2015-02-06 09:53:12', '2015-02-06 09:53:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resident`
--

CREATE TABLE IF NOT EXISTS `resident` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idnumber` varchar(80) DEFAULT NULL,
  `name` varchar(60) DEFAULT NULL,
  `idnumbertype` varchar(45) DEFAULT NULL,
  `holder` varchar(1) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(35) DEFAULT NULL,
  `apartmentid` int(11) DEFAULT NULL,
  `residenttypeid` int(11) DEFAULT NULL,
  `towerid` int(11) DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Resident_apartment1_idx` (`apartmentid`),
  KEY `fk_resident_residenttype1_idx` (`residenttypeid`),
  KEY `fk_resident_tower1_idx` (`towerid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `resident`
--

INSERT INTO `resident` (`id`, `idnumber`, `name`, `idnumbertype`, `holder`, `email`, `phone`, `apartmentid`, `residenttypeid`, `towerid`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(8, '8-12-3444', 'Juan Perez', 'Cedula', 'S', NULL, NULL, 4, 1, 2, NULL, 'admin', NULL, '2014-11-24 16:03:23'),
(9, 'assasa', 'Prueba', 'Cedula', 'S', NULL, NULL, 3, 2, 1, NULL, NULL, NULL, NULL),
(10, 'ewewewewe', 'weweewew', 'Cedula', 'S', NULL, NULL, 4, 2, 2, 'admin', 'admin', '2014-11-24 16:04:02', '2014-11-24 16:04:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residenttype`
--

CREATE TABLE IF NOT EXISTS `residenttype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `residenttype`
--

INSERT INTO `residenttype` (`id`, `type`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 'Propietario', NULL, 'admin', NULL, '2014-11-24 16:11:08'),
(2, 'Inquilino', NULL, NULL, NULL, NULL),
(3, 'Otro', 'admin', 'admin', '2014-11-24 16:10:54', '2014-11-24 16:10:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roleaction`
--

CREATE TABLE IF NOT EXISTS `roleaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roleid` int(11) NOT NULL,
  `actionid` int(11) NOT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_roleaction_admin_roles1_idx` (`roleid`),
  KEY `fk_roleaction_action1_idx` (`actionid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=97 ;

--
-- Volcado de datos para la tabla `roleaction`
--

INSERT INTO `roleaction` (`id`, `roleid`, `actionid`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(3, 5, 58, 'admin', 'admin', '2014-12-10 10:35:02', '2014-12-10 10:35:02'),
(4, 5, 59, 'admin', 'admin', '2014-12-10 10:35:20', '2014-12-10 10:35:20'),
(5, 5, 60, 'admin', 'admin', '2014-12-10 10:35:44', '2014-12-10 10:35:44'),
(6, 1, 58, 'admin', 'admin', '2014-12-15 11:55:41', '2014-12-15 11:55:41'),
(7, 1, 59, 'admin', 'admin', '2014-12-15 11:56:06', '2014-12-15 11:56:06'),
(8, 1, 60, 'admin', 'admin', '2014-12-15 11:56:25', '2014-12-15 11:56:25'),
(11, 1, 2, 'admin', 'admin', '2014-12-15 13:38:03', '2014-12-15 13:38:03'),
(12, 1, 3, 'admin', 'admin', '2014-12-15 13:38:17', '2014-12-15 13:38:17'),
(13, 1, 4, 'admin', 'admin', '2014-12-15 13:40:23', '2014-12-15 13:40:23'),
(14, 1, 10, 'admin', 'admin', '2014-12-15 14:28:54', '2014-12-15 14:28:54'),
(15, 1, 11, 'admin', 'admin', '2014-12-15 14:29:21', '2014-12-15 14:29:21'),
(16, 1, 12, 'admin', 'admin', '2014-12-15 14:36:18', '2014-12-15 14:36:18'),
(17, 1, 13, 'admin', 'admin', '2014-12-15 15:21:05', '2014-12-15 15:21:05'),
(18, 1, 14, 'admin', 'admin', '2014-12-15 15:23:12', '2014-12-15 15:23:12'),
(19, 1, 15, 'admin', 'admin', '2014-12-15 15:23:25', '2014-12-15 15:23:25'),
(20, 1, 16, 'admin', 'admin', '2014-12-16 09:31:07', '2014-12-16 09:31:07'),
(21, 1, 17, 'admin', 'admin', '2014-12-16 09:31:31', '2014-12-16 09:31:31'),
(22, 1, 18, 'admin', 'admin', '2014-12-16 09:31:47', '2014-12-16 09:31:47'),
(23, 1, 19, 'admin', 'admin', '2014-12-16 09:40:44', '2014-12-16 09:40:44'),
(24, 1, 20, 'admin', 'admin', '2014-12-16 09:41:08', '2014-12-16 09:41:08'),
(25, 1, 21, 'admin', 'admin', '2014-12-16 09:41:31', '2014-12-16 09:41:31'),
(26, 1, 22, 'admin', 'admin', '2014-12-16 09:54:03', '2014-12-16 09:54:03'),
(27, 1, 23, 'admin', 'admin', '2014-12-16 09:54:18', '2014-12-16 09:54:18'),
(28, 1, 24, 'admin', 'admin', '2014-12-16 09:54:32', '2014-12-16 09:54:32'),
(29, 1, 25, 'admin', 'admin', '2014-12-16 10:04:20', '2014-12-16 10:04:20'),
(30, 1, 26, 'admin', 'admin', '2014-12-16 10:04:46', '2014-12-16 10:04:46'),
(31, 1, 27, 'admin', 'admin', '2014-12-16 10:05:01', '2014-12-16 10:05:01'),
(32, 1, 28, 'admin', 'admin', '2014-12-16 10:11:21', '2014-12-16 10:11:21'),
(33, 1, 29, 'admin', 'admin', '2014-12-16 10:12:01', '2014-12-16 10:12:01'),
(34, 1, 30, 'admin', 'admin', '2014-12-16 10:12:18', '2014-12-16 10:12:18'),
(35, 1, 70, 'admin', 'admin', '2014-12-16 10:22:51', '2014-12-16 10:22:51'),
(36, 1, 71, 'admin', 'admin', '2014-12-16 10:23:04', '2014-12-16 10:23:04'),
(37, 1, 72, 'admin', 'admin', '2014-12-16 10:23:16', '2014-12-16 10:23:16'),
(38, 1, 34, 'admin', 'admin', '2014-12-16 10:40:31', '2014-12-16 10:40:31'),
(39, 1, 35, 'admin', 'admin', '2014-12-16 10:40:47', '2014-12-16 10:40:47'),
(40, 1, 36, 'admin', 'admin', '2014-12-16 10:41:04', '2014-12-16 10:41:04'),
(41, 1, 37, 'admin', 'admin', '2014-12-16 10:45:43', '2014-12-16 10:45:43'),
(42, 1, 38, 'admin', 'admin', '2014-12-16 10:46:01', '2014-12-16 10:46:01'),
(43, 1, 39, 'admin', 'admin', '2014-12-16 10:46:18', '2014-12-16 10:46:18'),
(44, 1, 31, 'admin', 'admin', '2014-12-16 10:54:23', '2014-12-16 10:54:23'),
(45, 1, 32, 'admin', 'admin', '2014-12-16 10:54:35', '2014-12-16 10:54:35'),
(46, 1, 33, 'admin', 'admin', '2014-12-16 10:55:10', '2014-12-16 10:55:10'),
(47, 1, 40, 'admin', 'admin', '2014-12-16 11:05:25', '2014-12-16 11:05:25'),
(48, 1, 41, 'admin', 'admin', '2014-12-16 11:05:41', '2014-12-16 11:05:41'),
(49, 1, 42, 'admin', 'admin', '2014-12-16 11:06:05', '2014-12-16 11:06:05'),
(50, 1, 43, 'admin', 'admin', '2014-12-16 11:13:27', '2014-12-16 11:13:27'),
(51, 1, 44, 'admin', 'admin', '2014-12-16 11:13:44', '2014-12-16 11:13:44'),
(52, 1, 45, 'admin', 'admin', '2014-12-16 11:14:01', '2014-12-16 11:14:01'),
(53, 1, 46, 'admin', 'admin', '2014-12-16 11:40:28', '2014-12-16 11:40:28'),
(54, 1, 47, 'admin', 'admin', '2014-12-16 11:40:50', '2014-12-16 11:40:50'),
(55, 1, 48, 'admin', 'admin', '2014-12-16 11:42:15', '2014-12-16 11:42:15'),
(56, 1, 49, 'admin', 'admin', '2014-12-16 11:45:59', '2014-12-16 11:45:59'),
(57, 1, 50, 'admin', 'admin', '2014-12-16 11:46:19', '2014-12-16 11:46:19'),
(58, 1, 51, 'admin', 'admin', '2014-12-16 11:46:39', '2014-12-16 11:46:39'),
(59, 1, 52, 'admin', 'admin', '2014-12-16 11:51:47', '2014-12-16 11:51:47'),
(60, 1, 53, 'admin', 'admin', '2014-12-16 11:52:01', '2014-12-16 11:52:01'),
(61, 1, 54, 'admin', 'admin', '2014-12-16 11:52:17', '2014-12-16 11:52:17'),
(62, 1, 73, 'admin', 'admin', '2014-12-18 16:30:29', '2014-12-18 16:30:29'),
(63, 1, 74, 'admin', 'admin', '2014-12-18 16:30:45', '2014-12-18 16:30:45'),
(64, 1, 75, 'admin', 'admin', '2014-12-18 16:31:01', '2014-12-18 16:31:01'),
(65, 1, 61, 'admin', 'admin', '2014-12-18 16:40:57', '2014-12-18 16:40:57'),
(66, 1, 62, 'admin', 'admin', '2014-12-18 16:41:15', '2014-12-18 16:41:15'),
(67, 1, 63, 'admin', 'admin', '2014-12-18 16:41:32', '2014-12-18 16:41:32'),
(68, 1, 64, 'admin', 'admin', '2015-01-04 15:58:47', '2015-01-04 15:58:47'),
(69, 1, 65, 'admin', 'admin', '2015-01-04 15:58:56', '2015-01-04 15:58:56'),
(70, 1, 66, 'admin', 'admin', '2015-01-04 15:59:06', '2015-01-04 15:59:06'),
(71, 1, 68, 'admin', 'admin', '2015-01-04 16:15:04', '2015-01-04 16:15:04'),
(72, 1, 69, 'admin', 'admin', '2015-01-04 16:15:13', '2015-01-04 16:15:13'),
(73, 1, 2, 'admin', 'admin', '2015-01-04 17:05:22', '2015-01-04 17:05:22'),
(74, 1, 3, 'admin', 'admin', '2015-01-04 17:05:26', '2015-01-04 17:05:26'),
(75, 1, 4, 'admin', 'admin', '2015-01-04 17:05:31', '2015-01-04 17:05:31'),
(76, 1, 76, 'admin', 'admin', '2015-01-04 17:08:54', '2015-01-04 17:08:54'),
(77, 1, 5, 'admin', 'admin', '2015-01-04 17:19:22', '2015-01-04 17:19:22'),
(78, 1, 6, 'admin', 'admin', '2015-01-04 17:19:26', '2015-01-04 17:19:26'),
(79, 1, 7, 'admin', 'admin', '2015-01-04 17:19:31', '2015-01-04 17:19:31'),
(80, 1, 77, 'admin', 'admin', '2015-01-04 17:19:39', '2015-01-04 17:19:39'),
(81, 1, 78, 'admin', 'admin', '2015-01-04 17:29:56', '2015-01-04 17:29:56'),
(82, 1, 79, 'admin', 'admin', '2015-01-04 17:30:04', '2015-01-04 17:30:04'),
(83, 1, 80, 'admin', 'admin', '2015-01-04 17:30:11', '2015-01-04 17:30:11'),
(84, 1, 8, 'admin', 'admin', '2015-01-04 17:38:37', '2015-01-04 17:38:37'),
(85, 1, 81, 'admin', 'admin', '2015-01-04 17:38:45', '2015-01-04 17:38:45'),
(86, 1, 82, 'admin', 'admin', '2015-01-04 17:38:57', '2015-01-04 17:38:57'),
(87, 1, 83, 'admin', 'admin', '2015-01-09 15:28:45', '2015-01-09 15:28:45'),
(88, 1, 84, 'admin', 'admin', '2015-01-09 16:11:13', '2015-01-09 16:11:13'),
(89, 1, 85, 'admin', 'admin', '2015-01-09 16:19:16', '2015-01-09 16:19:16'),
(90, 1, 86, 'admin', 'admin', '2015-01-09 20:05:03', '2015-01-09 20:05:03'),
(91, 1, 89, 'admin', 'admin', '2015-01-11 13:51:46', '2015-01-11 13:51:46'),
(92, 1, 90, 'admin', 'admin', '2015-01-11 20:05:51', '2015-01-11 20:05:51'),
(93, 1, 91, 'admin', 'admin', '2015-01-11 20:05:59', '2015-01-11 20:05:59'),
(94, 1, 73, 'admin', 'admin', '2015-01-11 20:24:51', '2015-01-11 20:24:51'),
(95, 1, 74, 'admin', 'admin', '2015-01-11 20:25:12', '2015-01-11 20:25:12'),
(96, 1, 75, 'admin', 'admin', '2015-01-11 20:25:20', '2015-01-11 20:25:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sysparam`
--

CREATE TABLE IF NOT EXISTS `sysparam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `value` varchar(200) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `createuser` varchar(45) NOT NULL,
  `modifyuser` varchar(45) NOT NULL,
  `createdate` datetime NOT NULL,
  `modifydate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tower`
--

CREATE TABLE IF NOT EXISTS `tower` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `Companyid` int(11) DEFAULT NULL,
  `numberapartments` int(11) DEFAULT NULL,
  `numberstorerooms` int(11) DEFAULT NULL,
  `numberparkings` int(11) DEFAULT NULL,
  `numberaptperfloor` int(11) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tower_Company1_idx` (`Companyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tower`
--

INSERT INTO `tower` (`id`, `name`, `Companyid`, `numberapartments`, `numberstorerooms`, `numberparkings`, `numberaptperfloor`, `email`, `createdate`, `modifydate`, `createuser`, `modifyuser`) VALUES
(1, 'Torre2', 2, 3, NULL, NULL, NULL, 'torre2@torre2.com', NULL, '2014-11-24 11:38:01', NULL, 'admin'),
(2, 'Torre1', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'asas', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Torre3', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'prueba2', 1, 4, 4, 5, 645, NULL, NULL, NULL, NULL, NULL),
(6, 'torre1', 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'assas', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Torre4', 1, NULL, NULL, NULL, NULL, NULL, '2014-11-24 11:39:36', '2014-11-24 11:39:36', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tower_advertisement`
--

CREATE TABLE IF NOT EXISTS `tower_advertisement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `towerid` int(11) DEFAULT NULL,
  `advertisementid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tower_advertisement_tower1_idx` (`towerid`),
  KEY `fk_tower_advertisement_advertisement1_idx` (`advertisementid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userrole`
--

CREATE TABLE IF NOT EXISTS `userrole` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `roleid` int(11) NOT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_userrole_admin_user1_idx` (`userid`),
  KEY `fk_userrole_admin_roles1_idx` (`roleid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `userrole`
--

INSERT INTO `userrole` (`id`, `userid`, `roleid`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(1, 2, 1, NULL, NULL, NULL, NULL),
(8, 32, 5, NULL, NULL, NULL, NULL),
(21, 3, 2, NULL, NULL, NULL, NULL),
(32, 35, 2, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `platenumber` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `residentid` int(11) NOT NULL,
  `colorid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `parkingid` int(11) NOT NULL,
  `createuser` varchar(45) DEFAULT NULL,
  `modifyuser` varchar(45) DEFAULT NULL,
  `createdate` datetime DEFAULT NULL,
  `modifydate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_vehicle_resident1_idx` (`residentid`),
  KEY `fk_vehicle_color1_idx` (`colorid`),
  KEY `fk_vehicle_brand1_idx` (`brandid`),
  KEY `fk_vehicle_parking1_idx` (`parkingid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `vehicle`
--

INSERT INTO `vehicle` (`id`, `platenumber`, `type`, `residentid`, `colorid`, `brandid`, `parkingid`, `createuser`, `modifyuser`, `createdate`, `modifydate`) VALUES
(7, '23423223', 'Carro', 8, 17, 2, 3, 'admin', 'admin', '2014-11-24 16:18:02', '2014-11-24 16:18:02'),
(8, '34343444', 'Carro', 8, 17, 2, 4, 'admin', 'admin', '2014-11-24 16:19:10', '2014-11-24 16:19:10');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `abssenceday`
--
ALTER TABLE `abssenceday`
  ADD CONSTRAINT `fk_abssenceday_employee1` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `fk_account_bank1` FOREIGN KEY (`bankid`) REFERENCES `bank` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `admin_user`
--
ALTER TABLE `admin_user`
  ADD CONSTRAINT `fk_admin_user_Company1` FOREIGN KEY (`Companyid`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `apartment`
--
ALTER TABLE `apartment`
  ADD CONSTRAINT `fk_apartment_tower1` FOREIGN KEY (`towerid`) REFERENCES `tower` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `architect`
--
ALTER TABLE `architect`
  ADD CONSTRAINT `fk_architect_const_company1` FOREIGN KEY (`const_companyid`) REFERENCES `const_company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cause`
--
ALTER TABLE `cause`
  ADD CONSTRAINT `fk_cause_causetype1` FOREIGN KEY (`causetypeid`) REFERENCES `causetype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `color_translations`
--
ALTER TABLE `color_translations`
  ADD CONSTRAINT `FK_CF7DEFD1232D562B` FOREIGN KEY (`object_id`) REFERENCES `color` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `fk_Company_const_company1` FOREIGN KEY (`const_companyid`) REFERENCES `const_company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `fk_employee_Company1` FOREIGN KEY (`Companyid`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `employee_schedule`
--
ALTER TABLE `employee_schedule`
  ADD CONSTRAINT `fk_employee_schedule_day1` FOREIGN KEY (`dayid`) REFERENCES `day` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_schedule_employee1` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `employee_tower`
--
ALTER TABLE `employee_tower`
  ADD CONSTRAINT `fk_employee_tower_employee1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_employee_tower_tower1` FOREIGN KEY (`tower_id`) REFERENCES `tower` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `employee_vacation`
--
ALTER TABLE `employee_vacation`
  ADD CONSTRAINT `fk_employee_vacation_employee1` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `expense`
--
ALTER TABLE `expense`
  ADD CONSTRAINT `fk_expense_account1` FOREIGN KEY (`accountid`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_expense_cause1` FOREIGN KEY (`causeid`) REFERENCES `cause` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_expense_tower1` FOREIGN KEY (`towerid`) REFERENCES `tower` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `expenseinvoice`
--
ALTER TABLE `expenseinvoice`
  ADD CONSTRAINT `fk_expense_invoice_expense1` FOREIGN KEY (`expenseid`) REFERENCES `expense` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `fk_income_account1` FOREIGN KEY (`accountid`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_income_cause1` FOREIGN KEY (`causeid`) REFERENCES `cause` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_income_tower1` FOREIGN KEY (`towerid`) REFERENCES `tower` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `income_invoice`
--
ALTER TABLE `income_invoice`
  ADD CONSTRAINT `fk_income_invoice_income1` FOREIGN KEY (`incomeid`) REFERENCES `income` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lexik_trans_unit_translations`
--
ALTER TABLE `lexik_trans_unit_translations`
  ADD CONSTRAINT `FK_B0AA394493CB796C` FOREIGN KEY (`file_id`) REFERENCES `lexik_translation_file` (`id`),
  ADD CONSTRAINT `FK_B0AA3944C3C583C9` FOREIGN KEY (`trans_unit_id`) REFERENCES `lexik_trans_unit` (`id`);

--
-- Filtros para la tabla `multiparam`
--
ALTER TABLE `multiparam`
  ADD CONSTRAINT `fk_multiparam_sysparam1` FOREIGN KEY (`sysparamid`) REFERENCES `sysparam` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `parking`
--
ALTER TABLE `parking`
  ADD CONSTRAINT `fk_parking_apartment1` FOREIGN KEY (`apartmentid`) REFERENCES `apartment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_parking_location1` FOREIGN KEY (`locationid`) REFERENCES `location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_account1` FOREIGN KEY (`accountid`) REFERENCES `account` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payment_apartment1` FOREIGN KEY (`apartmentid`) REFERENCES `apartment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paymentinvoice`
--
ALTER TABLE `paymentinvoice`
  ADD CONSTRAINT `fk_paymentinvoice_payment1` FOREIGN KEY (`paymentid`) REFERENCES `payment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provider`
--
ALTER TABLE `provider`
  ADD CONSTRAINT `fk_provider_company1` FOREIGN KEY (`companyid`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_provider_tower1` FOREIGN KEY (`towerid`) REFERENCES `tower` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provider_employee`
--
ALTER TABLE `provider_employee`
  ADD CONSTRAINT `fk_provider_employee_provider1` FOREIGN KEY (`providerid`) REFERENCES `provider` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provider_schedule`
--
ALTER TABLE `provider_schedule`
  ADD CONSTRAINT `fk_provider_schedule_day1` FOREIGN KEY (`dayid`) REFERENCES `day` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_provider_schedule_provider_employee1` FOREIGN KEY (`provideremployeeid`) REFERENCES `provider_employee` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_reservation_apartment1` FOREIGN KEY (`apartmentid`) REFERENCES `apartment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `resident`
--
ALTER TABLE `resident`
  ADD CONSTRAINT `fk_Resident_apartment1` FOREIGN KEY (`apartmentid`) REFERENCES `apartment` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resident_residenttype1` FOREIGN KEY (`residenttypeid`) REFERENCES `residenttype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resident_tower1` FOREIGN KEY (`towerid`) REFERENCES `tower` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `roleaction`
--
ALTER TABLE `roleaction`
  ADD CONSTRAINT `fk_roleaction_action1` FOREIGN KEY (`actionid`) REFERENCES `action` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_roleaction_admin_roles1` FOREIGN KEY (`roleid`) REFERENCES `admin_roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tower`
--
ALTER TABLE `tower`
  ADD CONSTRAINT `fk_tower_Company1` FOREIGN KEY (`Companyid`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tower_advertisement`
--
ALTER TABLE `tower_advertisement`
  ADD CONSTRAINT `fk_tower_advertisement_advertisement1` FOREIGN KEY (`advertisementid`) REFERENCES `advertisement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tower_advertisement_tower1` FOREIGN KEY (`towerid`) REFERENCES `tower` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `userrole`
--
ALTER TABLE `userrole`
  ADD CONSTRAINT `fk_userrole_admin_roles1` FOREIGN KEY (`roleid`) REFERENCES `admin_roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_userrole_admin_user1` FOREIGN KEY (`userid`) REFERENCES `admin_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `fk_vehicle_brand1` FOREIGN KEY (`brandid`) REFERENCES `brand` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vehicle_color1` FOREIGN KEY (`colorid`) REFERENCES `color` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vehicle_parking1` FOREIGN KEY (`parkingid`) REFERENCES `parking` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_vehicle_resident1` FOREIGN KEY (`residentid`) REFERENCES `resident` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
