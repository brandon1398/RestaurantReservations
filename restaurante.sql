-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2021 a las 21:11:55
-- Versión del servidor: 8.0.24
-- Versión de PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restaurante`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int NOT NULL,
  `nombre_categoria` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Carnes'),
(2, 'Bebidas'),
(4, 'Postres'),
(6, 'Ensaladas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `id_detallePedido` int NOT NULL,
  `fk_id_plato` int NOT NULL,
  `fk_id_pedido` int NOT NULL,
  `cantidad_platos` int NOT NULL,
  `subtotal_plato` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id_menu` int NOT NULL,
  `nombre_menu` varchar(64) NOT NULL,
  `descripcion_menu` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menudetalle`
--

CREATE TABLE `menudetalle` (
  `id_menuDetalle` int NOT NULL,
  `fk_id_plato` int NOT NULL,
  `fk_id_menu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `id_mesa` int NOT NULL,
  `numero_mesa` int NOT NULL,
  `personas_mesa` int NOT NULL,
  `estado_mesa` varchar(64) NOT NULL DEFAULT 'Libre'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`id_mesa`, `numero_mesa`, `personas_mesa`, `estado_mesa`) VALUES
(3, 2, 3, 'Libre'),
(4, 1, 4, 'Libre'),
(5, 3, 5, 'Libre'),
(10, 4, 2, 'Libre'),
(13, 5, 4, 'Libre'),
(16, 6, 5, 'Ocupada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int NOT NULL,
  `fk_id_usuario` int NOT NULL,
  `fecha_pedido` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tiempoRealizar_pedido` int NOT NULL,
  `estado_pedido` varchar(64) DEFAULT NULL,
  `confirma_pedido` tinyint(1) NOT NULL DEFAULT '0',
  `total_pedido` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `id_plato` int NOT NULL,
  `nombre_plato` varchar(64) NOT NULL,
  `descripcion_plato` varchar(128) NOT NULL,
  `precio_plato` double NOT NULL,
  `imagen_plato` varchar(128) NOT NULL,
  `fk_id_categoria` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`id_plato`, `nombre_plato`, `descripcion_plato`, `precio_plato`, `imagen_plato`, `fk_id_categoria`) VALUES
(1, 'Lomo de res', 'Carne de lomo de res', 7.8, 'plato_3.jpg', 1),
(2, 'Lasaña', 'Lasaña de pollo', 4.35, 'plato1.jpg', 1),
(3, 'Mojito', 'Ron, limón, menta', 3.75, 'bebida1.jpg', 2),
(4, 'Choco Cake', 'Torta de chocolate con vainilla', 2.65, 'plato_2.jpg', 4),
(15, 'Chaulafan', 'Chaulafan', 6.85, 'Chaulafan.jpeg', 1),
(16, 'Camarones', 'Camarones apanados', 6.85, 'camarones.jpg', 1),
(17, 'Whisky', 'Whisky', 5.5, 'whisky.jpg', 2),
(19, 'Alitas BBQ', 'Alitas', 6.85, 'alitas_bbq.jpg', 1),
(20, 'Martini', 'Ginebra con un chorro de vermut', 4.95, 'martini.jpg', 2),
(21, 'Margarita', 'Tequila, triple sec y jugo de limón', 4.25, 'margarita.jpg', 2),
(25, 'Torta 3 leches', 'Torta de 3 leches', 2.75, '3leches.jpeg', 4),
(26, 'Ensaladas', 'Ensalada', 2.86, 'galeria3.jpg', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int NOT NULL,
  `fecha_reserva` date NOT NULL,
  `hora_reserva` time NOT NULL,
  `fk_id_usuario` int NOT NULL,
  `fk_id_mesa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`id_reserva`, `fecha_reserva`, `hora_reserva`, `fk_id_usuario`, `fk_id_mesa`) VALUES
(70, '2021-07-08', '14:00:00', 35, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int NOT NULL COMMENT 'id del rol',
  `nombre_rol` varchar(64) NOT NULL COMMENT 'nombre del rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int NOT NULL COMMENT 'id del usuario',
  `nombre_usuario` varchar(64) NOT NULL COMMENT 'nombre del usuario',
  `apellido_usuario` varchar(64) NOT NULL COMMENT 'apellido del usuario',
  `telefono_usuario` varchar(10) NOT NULL COMMENT 'teléfono del usuario',
  `email_usuario` varchar(64) NOT NULL COMMENT 'email del usuario',
  `password_usuario` varchar(128) NOT NULL COMMENT 'contraseña del usuario',
  `status_usuario` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'estado del usuario activo o inactivo',
  `id_rol_fk` int NOT NULL COMMENT 'clave foránea de la tabla rol'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `apellido_usuario`, `telefono_usuario`, `email_usuario`, `password_usuario`, `status_usuario`, `id_rol_fk`) VALUES
(1, 'Brand', 'Llivisaca', '0987654321', 'brando@gmail.com', '12345', 1, 1),
(26, 'Leonel', 'Messi', '0987465321', 'messi@gmail.com', '12345', 1, 2),
(33, 'Juan', 'Lopez', '0987654321', 'juan@gmail.com', '12345', 1, 2),
(34, 'Maria', 'Jose', '0987456321', 'maria@gmail.com', '12345', 1, 2),
(35, 'Catalina', 'Astudillo', '0987654321', 'caty@gmail.com', '12345', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`id_detallePedido`),
  ADD KEY `fk_id_plato` (`fk_id_plato`),
  ADD KEY `fk_id_pedido` (`fk_id_pedido`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indices de la tabla `menudetalle`
--
ALTER TABLE `menudetalle`
  ADD PRIMARY KEY (`id_menuDetalle`),
  ADD KEY `fk_id_plato` (`fk_id_plato`),
  ADD KEY `fk_id_menu` (`fk_id_menu`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`id_mesa`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`id_plato`),
  ADD KEY `fk_id_categoria` (`fk_id_categoria`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `fk_id_usuario` (`fk_id_usuario`),
  ADD KEY `fk_id_mesa` (`fk_id_mesa`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol_fk`),
  ADD KEY `id_rol_fk` (`id_rol_fk`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  MODIFY `id_detallePedido` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menudetalle`
--
ALTER TABLE `menudetalle`
  MODIFY `id_menuDetalle` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `id_mesa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pedido` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `id_plato` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int NOT NULL AUTO_INCREMENT COMMENT 'id del rol', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int NOT NULL AUTO_INCREMENT COMMENT 'id del usuario', AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`fk_id_pedido`) REFERENCES `pedido` (`id_pedido`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `detallepedido_ibfk_2` FOREIGN KEY (`fk_id_plato`) REFERENCES `platos` (`id_plato`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `menudetalle`
--
ALTER TABLE `menudetalle`
  ADD CONSTRAINT `menudetalle_ibfk_1` FOREIGN KEY (`fk_id_plato`) REFERENCES `platos` (`id_plato`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `menudetalle_ibfk_2` FOREIGN KEY (`fk_id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `platos`
--
ALTER TABLE `platos`
  ADD CONSTRAINT `platos_ibfk_1` FOREIGN KEY (`fk_id_categoria`) REFERENCES `categoria` (`id_categoria`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`fk_id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`fk_id_mesa`) REFERENCES `mesas` (`id_mesa`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol_fk`) REFERENCES `roles` (`id_rol`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
