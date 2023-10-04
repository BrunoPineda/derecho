-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2023 a las 03:24:05
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
-- Base de datos: `db_derecho`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file_admin`
--

CREATE TABLE `file_admin` (
  `id` int(11) NOT NULL,
  `name_dni` varchar(255) DEFAULT NULL,
  `url_dni` varchar(255) DEFAULT NULL,
  `type_dni` varchar(255) DEFAULT NULL,
  `name_huella` varchar(255) DEFAULT NULL,
  `url_huella` varchar(255) DEFAULT NULL,
  `type_huella` varchar(255) DEFAULT NULL,
  `cod_identiti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file_client`
--

CREATE TABLE `file_client` (
  `id` int(11) NOT NULL,
  `name_dni` varchar(255) DEFAULT NULL,
  `url_dni` varchar(255) DEFAULT NULL,
  `type_dni` varchar(255) DEFAULT NULL,
  `name_huella` varchar(255) DEFAULT NULL,
  `url_huella` varchar(255) DEFAULT NULL,
  `type_huella` varchar(255) DEFAULT NULL,
  `cod_identiti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `file_client`
--

INSERT INTO `file_client` (`id`, `name_dni`, `url_dni`, `type_dni`, `name_huella`, `url_huella`, `type_huella`, `cod_identiti`) VALUES
(1, 'Firma_Lenín_Moreno_Garcés.png', 'file/20230925010426-Firma_Lenín_Moreno_Garcés.png', 'png', 'huella.jpg', 'file/20230925010426-huella.jpg', 'jpg', '44851548'),
(2, '', 'file/20230930040032-', '', '', 'file/20230930040032-', '', '44312533'),
(3, 'Firma_Lenín_Moreno_Garcés.png', 'file/20230930230609-Firma_Lenín_Moreno_Garcés.png', 'png', 'huella.jpg', 'file/20230930230609-huella.jpg', 'jpg', '43039068');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form1_datos_generales`
--

CREATE TABLE `form1_datos_generales` (
  `id` int(11) NOT NULL,
  `apellidos_nombre` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `institucion` varchar(255) DEFAULT NULL,
  `distrito` varchar(255) DEFAULT NULL,
  `provincia` varchar(255) DEFAULT NULL,
  `departamento` varchar(255) DEFAULT NULL,
  `rango_edad` varchar(255) DEFAULT NULL,
  `documento_identidad` varchar(255) DEFAULT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `extranjero` varchar(255) DEFAULT NULL,
  `numero_hijos` int(11) DEFAULT NULL,
  `ocupacion_victima` varchar(255) DEFAULT NULL,
  `discapacidad` varchar(255) DEFAULT NULL,
  `tipo_discapacidad` varchar(255) DEFAULT NULL,
  `lengua_materna` varchar(255) DEFAULT NULL,
  `lenguaje_senas` varchar(255) DEFAULT NULL,
  `identidad_etnica` varchar(255) DEFAULT NULL,
  `cod_identiti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `form1_datos_generales`
--

INSERT INTO `form1_datos_generales` (`id`, `apellidos_nombre`, `fecha`, `institucion`, `distrito`, `provincia`, `departamento`, `rango_edad`, `documento_identidad`, `dni`, `extranjero`, `numero_hijos`, `ocupacion_victima`, `discapacidad`, `tipo_discapacidad`, `lengua_materna`, `lenguaje_senas`, `identidad_etnica`, `cod_identiti`) VALUES
(1, 'Esteff veliz astete', '2023-09-26', 'San Juan De Miraflores', 'San Juan De Miraflores', 'Lima ', 'Lima', '43', 'DNI', '76455601', '', 1, 'Psicologa', 'no', 'ninguno', 'Castellano', 'no', 'mestizo', '44851548'),
(2, 'Esteff veliz astete', '2023-09-13', 'San Juan De Miraflores', 'San Juan De Miraflores', 'Lima ', 'Lima', '21', 'DNI', '44312533', '', 2, 'Psicologa', 'no', 'visual', 'Castellano', 'no', 'mestizo', '44312533'),
(3, 'Esteff veliz astete', '2023-09-30', 'Carabayllo', 'Carabayllo', 'Lima ', 'Lima', '21', 'DNI', '44312533', '', 1, 'Psicologa', 'no', 'ninguno', 'Castellano', 'no', 'mestizo', '43039068');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form2_valoracion_riesgo`
--

CREATE TABLE `form2_valoracion_riesgo` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `nivelAgresion` varchar(255) DEFAULT NULL,
  `cod_identiti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `form2_valoracion_riesgo`
--

INSERT INTO `form2_valoracion_riesgo` (`id`, `fecha`, `nivelAgresion`, `cod_identiti`) VALUES
(1, '2023-09-27', '1', '44851548'),
(2, '2023-09-30', '1', '44312533'),
(3, '2023-09-30', '2', '43039068');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form3_vulnerabilidad`
--

CREATE TABLE `form3_vulnerabilidad` (
  `id` int(11) NOT NULL,
  `pregunta_1` int(11) DEFAULT NULL,
  `pregunta_2` int(11) DEFAULT NULL,
  `pregunta_2a` varchar(255) DEFAULT NULL,
  `pregunta_3` int(11) DEFAULT NULL,
  `pregunta_4` int(11) DEFAULT NULL,
  `pregunta_5` int(11) DEFAULT NULL,
  `pregunta_5a` varchar(255) DEFAULT NULL,
  `pregunta_6` int(11) DEFAULT NULL,
  `pregunta_7` int(11) DEFAULT NULL,
  `pregunta_8` int(11) DEFAULT NULL,
  `pregunta_9` int(11) DEFAULT NULL,
  `pregunta_10` int(11) DEFAULT NULL,
  `pregunta_11` int(11) DEFAULT NULL,
  `pregunta_12` int(11) DEFAULT NULL,
  `pregunta_12a` varchar(255) DEFAULT NULL,
  `pregunta_13` int(11) DEFAULT NULL,
  `pregunta_14` int(11) DEFAULT NULL,
  `pregunta_15` int(11) DEFAULT NULL,
  `pregunta_16` int(11) DEFAULT NULL,
  `pregunta_17` int(11) DEFAULT NULL,
  `pregunta_18` int(11) DEFAULT NULL,
  `pregunta_19` int(11) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `cod_identiti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `form3_vulnerabilidad`
--

INSERT INTO `form3_vulnerabilidad` (`id`, `pregunta_1`, `pregunta_2`, `pregunta_2a`, `pregunta_3`, `pregunta_4`, `pregunta_5`, `pregunta_5a`, `pregunta_6`, `pregunta_7`, `pregunta_8`, `pregunta_9`, `pregunta_10`, `pregunta_11`, `pregunta_12`, `pregunta_12a`, `pregunta_13`, `pregunta_14`, `pregunta_15`, `pregunta_16`, `pregunta_17`, `pregunta_18`, `pregunta_19`, `observaciones`, `cod_identiti`) VALUES
(1, 1, 0, 'asdsafasf', 0, 0, 3, ' ffcxcxc', 3, 3, 2, 2, 1, 1, 1, ' dfsdfsd', 1, 1, 1, 1, 1, 1, 1, 'dddddddd', '44851548'),
(2, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', '44851548'),
(3, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', '44851548'),
(4, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', '44851548'),
(5, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', '44851548'),
(6, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', '44851548'),
(7, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', '44851548'),
(8, 0, 0, '', 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, '', '44851548'),
(9, 0, 5, 's', 0, 0, 3, ' as', 3, 3, 2, 2, 1, 1, 1, ' a ', 1, 1, 1, 1, 1, 1, 1, ' sa', '44312533'),
(10, 1, 5, 'X', 0, 0, 3, 'X', 0, 3, 2, 0, 0, 1, 1, 'X', 1, 1, 1, 0, 1, 0, 1, 'X', '43039068');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `form4_caracteristicas`
--

CREATE TABLE `form4_caracteristicas` (
  `id` int(11) NOT NULL,
  `pregunta1` varchar(200) DEFAULT NULL,
  `pregunta2` varchar(200) DEFAULT NULL,
  `pregunta3` varchar(200) DEFAULT NULL,
  `pregunta4` varchar(200) DEFAULT NULL,
  `pregunta5` varchar(200) DEFAULT NULL,
  `pregunta6` varchar(200) DEFAULT NULL,
  `pregunta7` varchar(200) DEFAULT NULL,
  `pregunta8` varchar(200) DEFAULT NULL,
  `pregunta9` varchar(200) DEFAULT NULL,
  `pregunta10` varchar(200) DEFAULT NULL,
  `cod_identiti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `form4_caracteristicas`
--

INSERT INTO `form4_caracteristicas` (`id`, `pregunta1`, `pregunta2`, `pregunta3`, `pregunta4`, `pregunta5`, `pregunta6`, `pregunta7`, `pregunta8`, `pregunta9`, `pregunta10`, `cod_identiti`) VALUES
(2, 'Si', 'No', 'Si piensa interponer demanda', 'No', 'opcion3', 'Sí, en cualquier otro ambito', 'No', 'No (si respondio no saltar las siguientes preguntas)', 'No (si respondio no saltar las siguientes preguntas)', 'No aplica porque no esta embarazada', '44851548'),
(3, 'Compartimos Gastos', 'No', 'Si, ya interpuso demanda', 'No', 'opcion2', 'Sí, en cualquier otro ambito', 'Si', 'Si', 'Si', 'Si', '09283900');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `DNI` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidoPaterno` varchar(255) NOT NULL,
  `apellidoMaterno` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`DNI`, `correo`, `nombre`, `apellidoPaterno`, `apellidoMaterno`) VALUES
(9283900, 'brunoreto27@gmail.com', 'AMELIA', 'FLORES', 'SOTO'),
(43039068, 'brunoreto27@gmail.com', 'JAVIER HUMBERTO', 'PEREZ', 'YUPAN'),
(44312533, 'brunoreto27@gmail.com', 'HECTOR', 'CONDORI', 'PAITAN'),
(44851548, 'brunoreto27@gmail.com', 'DIEGO EDUARDO', 'VEGA', 'SAMAME');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `validator`
--

CREATE TABLE `validator` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `validator`
--

INSERT INTO `validator` (`id`, `status`, `token`, `usuario_id`) VALUES
(1, '1', '740110', 44851548),
(2, '1', '709800', 44312533),
(5, '1', '381267', 43039068),
(6, '1', '918070', 9283900);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `file_admin`
--
ALTER TABLE `file_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `file_client`
--
ALTER TABLE `file_client`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `form1_datos_generales`
--
ALTER TABLE `form1_datos_generales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `form2_valoracion_riesgo`
--
ALTER TABLE `form2_valoracion_riesgo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `form3_vulnerabilidad`
--
ALTER TABLE `form3_vulnerabilidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `form4_caracteristicas`
--
ALTER TABLE `form4_caracteristicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`DNI`);

--
-- Indices de la tabla `validator`
--
ALTER TABLE `validator`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `file_admin`
--
ALTER TABLE `file_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `file_client`
--
ALTER TABLE `file_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `form1_datos_generales`
--
ALTER TABLE `form1_datos_generales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `form2_valoracion_riesgo`
--
ALTER TABLE `form2_valoracion_riesgo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `form3_vulnerabilidad`
--
ALTER TABLE `form3_vulnerabilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `form4_caracteristicas`
--
ALTER TABLE `form4_caracteristicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `DNI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77237471;

--
-- AUTO_INCREMENT de la tabla `validator`
--
ALTER TABLE `validator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `validator`
--
ALTER TABLE `validator`
  ADD CONSTRAINT `validator_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`DNI`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
