-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-08-2017 a las 21:10:07
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_tecnobook`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `id` int(255) NOT NULL,
  `nombreLibro` varchar(50) NOT NULL,
  `nombreEstudiante` varchar(50) NOT NULL,
  `fechaPedido` date NOT NULL,
  `fechaEntrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`id`, `nombreLibro`, `nombreEstudiante`, `fechaPedido`, `fechaEntrega`) VALUES
(6, 'Holi', 'Pepe', '2017-08-08', '2017-08-22'),
(13, 'fuera', 'elio', '2017-08-01', '2017-08-15'),
(14, 'IO', 'IO', '2017-08-24', '2017-09-07'),
(15, 'Luna de Plutón', 'AZOFROTAMARILL', '2017-08-24', '2017-09-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `categoria` varchar(50) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `editorial` varchar(30) NOT NULL,
  `inscripcion` varchar(30) NOT NULL,
  `fechaPublicacion` date NOT NULL,
  `lugarPublicacion` varchar(30) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `contenido` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`titulo`, `autor`, `categoria`, `codigo`, `editorial`, `inscripcion`, `fechaPublicacion`, `lugarPublicacion`, `isbn`, `contenido`) VALUES
('Don Quijote de la Mancha', 'Miguel de Cervantes', 'Novela', '123', 'San Isidro S.A.', '2458641', '2007-01-01', 'España', '486asd48', 'Un viejo loco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(255) NOT NULL,
  `nombreLibro` varchar(50) NOT NULL,
  `nombreEstudiante` varchar(50) NOT NULL,
  `fechaPedido` date NOT NULL,
  `fechaEntrega` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id`, `nombreLibro`, `nombreEstudiante`, `fechaPedido`, `fechaEntrega`) VALUES
(11, 'Sueños de Acero y Neón', 'Juan Pérez Pérez', '2017-07-20', '2017-08-03'),
(15, 'Harry Potter', 'IO', '2017-08-25', '2017-08-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombreUsuario` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` int(20) NOT NULL,
  `seccion` varchar(10) NOT NULL,
  `tipoUsuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombreUsuario`, `password`, `nombre`, `cedula`, `correo`, `telefono`, `seccion`, `tipoUsuario`) VALUES
('io', 'e74899d4689fac931a51c94845c0f28e', 'TU GFA', '123456789', '123@gmail.com', 12345678, '12-3', 1),
('juan', '1c041e20965a241031ab087c828f6ae7', 'Juan Pérez Pérez', '2-0808-0865', 'juanperez@gmail.com', 88888888, '11-4', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`nombreUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
