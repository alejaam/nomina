-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2018 a las 07:51:16
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nomina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `idArea` int(6) NOT NULL,
  `nombreArea` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`idArea`, `nombreArea`) VALUES
(1, 'Director General'),
(2, 'Auxiliar Administrativo'),
(3, 'Administración'),
(4, 'Recursos Humanos'),
(5, 'Finanzas y Contabilidad'),
(6, 'Publicidad y Mercadotecni'),
(7, 'Informática'),
(8, 'Produccion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deducciones`
--

CREATE TABLE `deducciones` (
  `idDeducciones` int(6) NOT NULL COMMENT ' ',
  `faltas` int(6) NOT NULL,
  `isr` float NOT NULL,
  `infonavit` float NOT NULL,
  `imss` float NOT NULL,
  `retardos` int(6) NOT NULL,
  `prestamos` float NOT NULL,
  `contadorPrestamo` int(6) NOT NULL,
  `totalDeduccion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `deducciones`
--

INSERT INTO `deducciones` (`idDeducciones`, `faltas`, `isr`, `infonavit`, `imss`, `retardos`, `prestamos`, `contadorPrestamo`, `totalDeduccion`) VALUES
(1, 1, 50, 120, 200, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `numTel` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `idPuesto` int(11) NOT NULL,
  `idArea` int(6) NOT NULL,
  `tipoNomina` char(1) COLLATE utf8_spanish2_ci NOT NULL COMMENT '"Q" = Quincenal, "S" = Semanal',
  `direccion` varchar(70) COLLATE utf8_spanish2_ci NOT NULL,
  `rfc` varchar(13) COLLATE utf8_spanish2_ci NOT NULL,
  `nss` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `genero` char(1) COLLATE utf8_spanish2_ci NOT NULL COMMENT '"H" = Hombre, "M" = Mujer, "O" = Otro',
  `fechaIngreso` date NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `nombre`, `numTel`, `email`, `idPuesto`, `idArea`, `tipoNomina`, `direccion`, `rfc`, `nss`, `genero`, `fechaIngreso`, `activo`) VALUES
(1, 'Javier Alejandro', '5533534481', 'ale.jaam21@gmail.com', 1, 1, 'Q', 'Ferrocarril de cintura #160 int 101 B', 'AAMJ970928HDF', '2147483609', '', '2018-01-15', 1),
(2, 'Pedro Navaja', '5523498734', 'nebai@miempresa.com.mx', 1, 4, 'Q', 'Av. Siempre Viva #202 Colonia Buen Vivir', 'UISN980402MDF', '394050001', '', '2018-11-29', 0),
(3, 'Andres Zuñiga Ortiz', '5566702517', 'andrezu@miempresa.com.mx', 5, 5, 'S', 'Labradores #23 Colonia Morelos', 'RFEM960221HDF', '121312334', 'H', '2018-11-29', 1),
(20, 'Andrés Garcia Pliego', '557898329', 'ale.jaam7@gmail.com', 6, 3, 'S', 'Calle 2 #8 Colonia Mexico, CDMX', '19884756637', '10010100101', 'H', '2018-12-03', 1),
(21, 'Yanni Joseph Servin Martinez', '5557021824', 'joseph@gmail.com', 5, 5, 'Q', 'Ferrocarril de cintura 160 int 101 B', '010100000', '000101010101', '', '2018-12-06', 1),
(22, 'Nebai Uriarte Samaniego', '5533534481', 'nebai@gmail.com', 8, 4, 'Q', 'Av. 515 #8 , San juan de aragón primera seccion, GAM', 'UISN980402MDF', '0010100010', 'M', '2014-12-01', 1),
(24, 'Ernesto Calderon Martínez', '57021824', 'erny@gmail.com', 5, 5, 'Q', 'Paileros 29, col 20 de noviembre', 'ECMA970327HDF', '122147412321', 'H', '2018-12-07', 1),
(25, 'i', '21', 'isaac@gmmaol.com', 1, 1, 'S', 'fe', 'fe34', '23', 'H', '2018-12-07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomina`
--

CREATE TABLE `nomina` (
  `idNomina` int(10) NOT NULL,
  `idEmpleado` int(5) NOT NULL,
  `nominaNeto` float NOT NULL,
  `concepto` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `tipoNomina` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `fondoAhorro` float NOT NULL,
  `valesDespensa` float NOT NULL,
  `ayudaGasolina` float NOT NULL,
  `primaVacacional` float NOT NULL,
  `totalPercepcion` float NOT NULL,
  `totalDeduccion` float NOT NULL,
  `isr` float NOT NULL,
  `infonavit` float NOT NULL,
  `imss` float NOT NULL,
  `faltas` int(5) NOT NULL,
  `retardos` int(5) NOT NULL,
  `bonoProductividad` float NOT NULL,
  `aguinaldo` float NOT NULL,
  `tiempoExtra` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `nomina`
--

INSERT INTO `nomina` (`idNomina`, `idEmpleado`, `nominaNeto`, `concepto`, `fecha`, `tipoNomina`, `fondoAhorro`, `valesDespensa`, `ayudaGasolina`, `primaVacacional`, `totalPercepcion`, `totalDeduccion`, `isr`, `infonavit`, `imss`, `faltas`, `retardos`, `bonoProductividad`, `aguinaldo`, `tiempoExtra`) VALUES
(1, 1, 20000, 'Nomina', '2018-11-30', 'Q', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 1, 2300, 'Nomina', '2018-12-07', 'Q', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 1, 2300, 'Nomina', '2018-12-07', 'Q', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 1, 343, 'Pago de Nomina', '2018-12-07', 'Q', 1600, 353.44, 150, 0, 2103.44, 343.44, 0, 960, 800, 0, 0, 0, 0, 0),
(5, 21, 413, 'Pago de Nomina', '2018-12-07', 'Q', 900, 353.44, 150, 0, 0, 990, 0, 540, 450, 0, 0, 0, 0, 0),
(8, 0, 413, 'Pago de Nomina', '2018-12-07', 'Q', 900, 353.44, 150, 0, 1403.44, 990, 0, 540, 450, 0, 0, 0, 0, 0),
(9, 20, 307, 'Pago de Nomina', '2018-12-07', 'S', 200, 176.72, 150, 0, 526.72, 220, 0, 120, 100, 0, 0, 0, 0, 0),
(10, 3, 282, 'Pago de Nomina', '2018-12-07', 'S', 450, 176.72, 150, 0, 776.72, 495, 0, 270, 225, 0, 0, 0, 0, 0),
(17, 1, 1500, 'Pago de Nomina', '2018-12-07', 'Q', 1600, 353.44, 150, 0, 2103.44, 1760, 0, 960, 800, 0, 0, 1500, 0, 0),
(18, 2, 0, 'Pago de Nomina', '2018-12-07', 'Q', 1600, 353.44, 150, 0, 2103.44, 1760, 0, 960, 800, 0, 0, 0, 0, 0),
(19, 22, 0, 'Pago de Nomina', '2018-12-07', 'Q', 600, 353.44, 150, 900, 5003.44, 2309.1, 0, 1259.51, 1049.59, 0, 0, 0, 0, 0),
(20, 20, 306.72, 'Pago de Nomina', '2018-12-07', 'S', 200, 176.72, 150, 0, 526.72, 220, 0, 120, 100, 0, 0, 0, 0, 0),
(21, 2, 0, 'Pago de Nomina', '2018-12-07', 'Q', 1600, 353.44, 150, 0, 2103.44, 1760, 0, 960, 800, 0, 0, 0, 0, 0),
(22, 25, 0, 'Pago de Nomina', '2018-12-07', 'S', 800, 176.72, 150, 0, 1126.72, 880, 0, 480, 400, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `percepciones`
--

CREATE TABLE `percepciones` (
  `idPercepcion` int(6) NOT NULL,
  `tiempoExtra` int(5) NOT NULL,
  `bonoProductividad` float NOT NULL,
  `fondoAhorro` int(11) NOT NULL,
  `valesDespensa` float NOT NULL,
  `ayudaGasolina` float NOT NULL,
  `primaVacacional` float NOT NULL,
  `aguinaldo` float NOT NULL,
  `totalPercepcion` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `percepciones`
--

INSERT INTO `percepciones` (`idPercepcion`, `tiempoExtra`, `bonoProductividad`, `fondoAhorro`, `valesDespensa`, `ayudaGasolina`, `primaVacacional`, `aguinaldo`, `totalPercepcion`) VALUES
(1, 6, 600, 300, 700, 200, 20, 20, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `idPuesto` int(6) NOT NULL,
  `nombrePuesto` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `sueldoBase` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`idPuesto`, `nombrePuesto`, `sueldoBase`) VALUES
(1, 'Director General', 32000),
(2, 'Jefe', 16000),
(3, 'Gerente', 14000),
(4, 'Administrador Jr', 8000),
(5, 'Contador', 18000),
(6, 'Ejecutivo', 8000),
(7, 'Reclutador', 10000),
(8, 'Capacitador', 12000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre_usuario` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(25) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre_usuario`, `password`) VALUES
('', 'd7c2b7fecb0d75588af35c58b'),
('ale_jaam', 'd7c2b7fecb0d75588af35c58b'),
('pruebas', 'ee2ec3cc66427bb4228944950'),
('prueba', 'prueba');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`idArea`);

--
-- Indices de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  ADD PRIMARY KEY (`idDeducciones`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `idPuesto` (`idPuesto`),
  ADD KEY `idArea` (`idArea`);

--
-- Indices de la tabla `nomina`
--
ALTER TABLE `nomina`
  ADD PRIMARY KEY (`idNomina`),
  ADD KEY `FK_nomina_empleado` (`idEmpleado`);

--
-- Indices de la tabla `percepciones`
--
ALTER TABLE `percepciones`
  ADD PRIMARY KEY (`idPercepcion`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`idPuesto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `area`
--
ALTER TABLE `area`
  MODIFY `idArea` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `deducciones`
--
ALTER TABLE `deducciones`
  MODIFY `idDeducciones` int(6) NOT NULL AUTO_INCREMENT COMMENT ' ', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `nomina`
--
ALTER TABLE `nomina`
  MODIFY `idNomina` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `percepciones`
--
ALTER TABLE `percepciones`
  MODIFY `idPercepcion` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `idPuesto` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`idArea`) REFERENCES `area` (`idArea`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
