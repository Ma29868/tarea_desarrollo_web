-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2025 a las 06:41:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro_usuario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `clase` varchar(100) NOT NULL,
  `cedula` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fecha_inscripcion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`clase`, `cedula`, `fecha_inscripcion`) VALUES
('Mate', '0106102593', '2025-05-18'),
('Mate', '0106102595', '2025-05-18'),
('Mate', '4578962531', '2025-05-18'),
('Mate', '4578962531', '2025-05-18'),
('Mate', '4578962531', '2025-05-18'),
('Mate', '0106102593', '2025-05-18'),
('Mate', '0106102593', '2025-05-18'),
('Mate', '0106102593', '2025-05-18'),
('ingles', '0106102593', '2025-05-18'),
('ingles', '0106102593', '2025-05-18'),
('ingles', '0106102599', '2025-05-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `edad` int(2) DEFAULT NULL,
  `correo` varchar(100) NOT NULL,
  `fecha_inscripcion` date NOT NULL DEFAULT current_timestamp(),
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedula`, `nombre`, `edad`, `correo`, `fecha_inscripcion`, `contraseña`) VALUES
(17, '0106102591', 'mari', 20, 'mariacaridad319@gmail.com', '2025-05-18', ''),
(1, '0106102593', 'AVENDAÑO DOMINGUEZ MARIA CARIDAD ', 20, 'mariacaridad319@gmail.com', '2025-05-18', ''),
(24, '0106102595', 'María Caridad', 34, 'luis@gmail.com', '2025-05-18', '$2y$10$86aDMlRwUrNpPq5BEKnqB.WXjfhujlCnUNfEsFFLm2UWP5pv5BCbG'),
(26, '0106102599', 'María Caridad', 56, 'juan@gmail.com', '2025-05-18', '$2y$10$B2qPqv8KHnSLw2V6D7G6QuPYOB/JR0W8XnaOBLk3HPtVA6TcsbFoq'),
(8, '0106102645', 'AVENDAÑO DOMINGUEZ MARIA CARIDAD ', 25, 'juan@gmail.com', '2025-05-18', ''),
(16, '0106102648', 'Luis Perez', 22, 'luis@gmail.com', '2025-05-18', ''),
(9, '0139102645', 'AVENDAÑO DOMINGUEZ MARIA CARIDAD ', 25, 'juan@gmail.com', '2025-05-18', ''),
(25, '1245638591', 'Anthonela Lopez', 20, 'luis4@gmail.com', '2025-05-18', '$2y$10$ZegVW8znSeMoBBwt/9CBMegAD9ngwU83Akb6N/6STrLhsFGAPzPI.'),
(20, '1456259763', 'luis', 34, 'luis4@gmail.com', '2025-05-18', ''),
(18, '2564789125', 'javi', 25, 'javi@gmail.com', '2025-05-18', ''),
(11, '4574892531', 'Liza', 12, '9@gmail.com', '2025-05-18', ''),
(4, '4578962531', 'Liza', 20, '9@gmail.com', '2025-05-18', ''),
(14, '4578962538', '22', 15, '9@gmail.com', '2025-05-18', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
