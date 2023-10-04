-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2023 a las 03:24:00
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
-- Base de datos: `db_pnp`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `actualizar_precio_producto` (IN `n_cantidad` INT, IN `n_precio` DECIMAL(10,2), IN `codigo` INT)   BEGIN
DECLARE nueva_existencia int;
DECLARE nuevo_total decimal(10,2);
DECLARE nuevo_precio decimal(10,2);

DECLARE cant_actual int;
DECLARE pre_actual decimal(10,2);

DECLARE actual_existencia int;
DECLARE actual_precio decimal(10,2);

SELECT precio, existencia INTO actual_precio, actual_existencia FROM producto WHERE codproducto = codigo;

SET nueva_existencia = actual_existencia + n_cantidad;
SET nuevo_total = n_precio;
SET nuevo_precio = nuevo_total;

UPDATE producto SET existencia = nueva_existencia, precio = nuevo_precio WHERE codproducto = codigo;

SELECT nueva_existencia, nuevo_precio;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_detalle_temp` (`codigo` INT, `cantidad` INT, `token_user` VARCHAR(50))   BEGIN
DECLARE precio_actual decimal(10,2);
SELECT precio INTO precio_actual FROM producto WHERE codproducto = codigo;
INSERT INTO detalle_temp(token_user, codproducto, cantidad, precio_venta) VALUES (token_user, codigo, cantidad, precio_actual);
SELECT tmp.correlativo, tmp.codproducto, p.descripcion, tmp.cantidad, tmp.precio_venta FROM detalle_temp tmp INNER JOIN producto p ON tmp.codproducto = p.codproducto WHERE tmp.token_user = token_user;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `data` ()   BEGIN
DECLARE usuarios int;
DECLARE clientes int;
DECLARE proveedores int;
DECLARE productos int;
DECLARE ventas int;
SELECT COUNT(*) INTO usuarios FROM usuario;
SELECT COUNT(*) INTO clientes FROM cliente;
SELECT COUNT(*) INTO proveedores FROM proveedor;
SELECT COUNT(*) INTO productos FROM producto;
SELECT COUNT(*) INTO ventas FROM factura WHERE fecha > CURDATE();

SELECT usuarios, clientes, proveedores, productos, ventas;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `del_detalle_temp` (`id_detalle` INT, `token` VARCHAR(50))   BEGIN
DELETE FROM detalle_temp WHERE correlativo = id_detalle;
SELECT tmp.correlativo, tmp.codproducto, p.descripcion, tmp.cantidad, tmp.precio_venta FROM detalle_temp tmp INNER JOIN producto p ON tmp.codproducto = p.codproducto WHERE tmp.token_user = token;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `procesar_venta` (IN `cod_usuario` INT, IN `cod_cliente` INT, IN `token` VARCHAR(50))   BEGIN
DECLARE factura INT;
DECLARE registros INT;
DECLARE total DECIMAL(10,2);
DECLARE nueva_existencia int;
DECLARE existencia_actual int;

DECLARE tmp_cod_producto int;
DECLARE tmp_cant_producto int;
DECLARE a int;
SET a = 1;

CREATE TEMPORARY TABLE tbl_tmp_tokenuser(
	id BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cod_prod BIGINT,
    cant_prod int);
SET registros = (SELECT COUNT(*) FROM detalle_temp WHERE token_user = token);
IF registros > 0 THEN
INSERT INTO tbl_tmp_tokenuser(cod_prod, cant_prod) SELECT codproducto, cantidad FROM detalle_temp WHERE token_user = token;
INSERT INTO factura (usuario,codcliente) VALUES (cod_usuario, cod_cliente);
SET factura = LAST_INSERT_ID();

INSERT INTO detallefactura(nofactura,codproducto,cantidad,precio_venta) SELECT (factura) AS nofactura, codproducto, cantidad,precio_venta FROM detalle_temp WHERE token_user = token;
WHILE a <= registros DO
	SELECT cod_prod, cant_prod INTO tmp_cod_producto,tmp_cant_producto FROM tbl_tmp_tokenuser WHERE id = a;
    SELECT existencia INTO existencia_actual FROM producto WHERE codproducto = tmp_cod_producto;
    SET nueva_existencia = existencia_actual - tmp_cant_producto;
    UPDATE producto SET existencia = nueva_existencia WHERE codproducto = tmp_cod_producto;
    SET a=a+1;
END WHILE;
SET total = (SELECT SUM(cantidad * precio_venta) FROM detalle_temp WHERE token_user = token);
UPDATE factura SET totalfactura = total WHERE nofactura = factura;
DELETE FROM detalle_temp WHERE token_user = token;
TRUNCATE TABLE tbl_tmp_tokenuser;
SELECT * FROM factura WHERE nofactura = factura;
ELSE
SELECT 0;
END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL,
  `dni` int(8) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` int(15) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idcliente`, `dni`, `nombre`, `telefono`, `direccion`, `usuario_id`) VALUES
(1, 123545, 'Pubico en general', 925491523, 'Lima', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `direccion` text NOT NULL,
  `igv` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `dni`, `nombre`, `razon_social`, `telefono`, `email`, `direccion`, `igv`) VALUES
(1, '20165465009', 'Comisaria de San Juan de Miraflores', 'POLICIA NACIONAL DEL PERU', 925491987, 'farfan.polo@pnpoficial.com', 'Lima - Perú', 1.18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallefactura`
--

CREATE TABLE `detallefactura` (
  `correlativo` bigint(20) NOT NULL,
  `nofactura` bigint(20) NOT NULL,
  `codproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_temp`
--

CREATE TABLE `detalle_temp` (
  `correlativo` int(11) NOT NULL,
  `token_user` varchar(50) NOT NULL,
  `codproducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_venta` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `correlativo` int(11) NOT NULL,
  `codproducto` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `nofactura` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `usuario` int(11) NOT NULL,
  `codcliente` int(11) NOT NULL,
  `totalfactura` decimal(10,2) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
(1, 'Firma_Lenín_Moreno_Garcés.png', 'file/20230925010426-Firma_Lenín_Moreno_Garcés.png', 'png', 'huella.jpg', 'file/20230925010426-huella.jpg', 'jpg', '44851548');

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
(1, 'Esteff veliz astete', '2023-09-26', 'San Juan De Miraflores', 'San Juan De Miraflores', 'Lima ', 'Lima', '43', 'DNI', '76455601', '', 1, 'Psicologa', 'no', 'ninguno', 'Castellano', 'no', 'mestizo', '44851548');

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
(1, '2023-09-27', '1', '44851548');

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
(1, 1, 0, 'asdsafasf', 0, 0, 3, ' ffcxcxc', 3, 3, 2, 2, 1, 1, 1, ' dfsdfsd', 1, 1, 1, 1, 1, 1, 1, 'dddddddd', '44851548');

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
(2, 'Si', 'No', 'Si piensa interponer demanda', 'No', 'opcion3', 'Sí, en cualquier otro ambito', 'No', 'No (si respondio no saltar las siguientes preguntas)', 'No (si respondio no saltar las siguientes preguntas)', 'No aplica porque no esta embarazada', '44851548');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `codproducto` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `proveedor` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `existencia` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`codproducto`, `descripcion`, `proveedor`, `precio`, `existencia`, `usuario_id`) VALUES
(1, 'Laptop lenovo', 1, 1560.00, 49, 2),
(2, 'Televisor', 1, 2500.00, 79, 1),
(6, 'Impresora', 1, 800.00, 0, 1),
(7, 'Gaseosa', 3, 1500.00, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `codproveedor` int(11) NOT NULL,
  `proveedor` varchar(100) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`codproveedor`, `proveedor`, `contacto`, `telefono`, `direccion`, `usuario_id`) VALUES
(1, 'Open Services', '965432143', 9645132, 'Lima', 2),
(3, 'Lineo', '25804', 9865412, 'Lima', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idrol` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idrol`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `correo`, `usuario`, `clave`, `rol`) VALUES
(1, 'Vida Informatico', 'vida@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(6, 'Maria Perez Miranda', 'maria@gmail.com', 'maria', '263bce650e68ab4e23f28263760b9fa5', 3),
(9, ' Comisario General Director Farfan Polo', 'farfan.polo@pnpoficial.com', 'Admin1', '263bce650e68ab4e23f28263760b9fa5', 1);

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
(1, '1', '740110', 44851548);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  ADD PRIMARY KEY (`correlativo`);

--
-- Indices de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  ADD PRIMARY KEY (`correlativo`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`correlativo`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`nofactura`);

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
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`codproducto`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`codproveedor`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idrol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

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
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idcliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detallefactura`
--
ALTER TABLE `detallefactura`
  MODIFY `correlativo` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_temp`
--
ALTER TABLE `detalle_temp`
  MODIFY `correlativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `correlativo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `nofactura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `file_admin`
--
ALTER TABLE `file_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `file_client`
--
ALTER TABLE `file_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `form1_datos_generales`
--
ALTER TABLE `form1_datos_generales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `form2_valoracion_riesgo`
--
ALTER TABLE `form2_valoracion_riesgo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `form3_vulnerabilidad`
--
ALTER TABLE `form3_vulnerabilidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `form4_caracteristicas`
--
ALTER TABLE `form4_caracteristicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `codproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `codproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `DNI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76455603;

--
-- AUTO_INCREMENT de la tabla `validator`
--
ALTER TABLE `validator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
