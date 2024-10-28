-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2024 a las 09:28:17
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
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `ID` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`ID`, `Descripcion`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`ID`, `Nombre`) VALUES
(3, 'Seguridad Informática'),
(4, 'Redes y Comunicaciones'),
(5, 'Impresión y Escaneo'),
(6, 'Equipos de Oficina'),
(7, 'Equipos para el Sector Médico'),
(8, 'Soluciones para Arquitectura e Ingeniería'),
(9, 'Almacenamiento y Backup'),
(10, 'Software Corporativo'),
(11, 'Hardware Especializado'),
(12, 'Soluciones Audiovisuales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `idProveedor` int(11) NOT NULL,
  `nombreProveedor` varchar(255) NOT NULL,
  `telefonoProveedor` varchar(255) NOT NULL,
  `direccionProveedor` varchar(255) NOT NULL,
  `correoProveedor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`idProveedor`, `nombreProveedor`, `telefonoProveedor`, `direccionProveedor`, `correoProveedor`) VALUES
(110, 'Asus', '601123456', 'Bogota', 'asus12@gmail.com'),
(114, 'Hewlett-Packard', '601650326', 'Bogota', 'hp@gmail.com'),
(115, 'Foxcom', '602156321', 'Bogota', 'Foxcom@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductos`
--

CREATE TABLE `tblproductos` (
  `ID` int(11) NOT NULL,
  `categoria_ID` int(11) DEFAULT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Precio` decimal(20,0) NOT NULL,
  `Descripcion` text NOT NULL,
  `Imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblproductos`
--

INSERT INTO `tblproductos` (`ID`, `categoria_ID`, `Nombre`, `Precio`, `Descripcion`, `Imagen`) VALUES
(1, 11, 'Rog Strix G35ca', 9000000, 'PC de escritorio para gaming de alto rendimiento de ASUS en su línea ROG.', 'https://dlcdnwebimgs.asus.com/gain/D932F4E5-11FA-4D52-A04E-D487535E15B8'),
(2, 8, 'Estación de trabajo HP Z8 G4', 4000000, 'Ideal para modelado 3D, CAD y renderizado de alta calidad, adecuada para arquitectura y diseño gráfico.', 'https://www.uli-ludwig.de/media/image/product/4036/lg/hp-z8-fury-g5-workstation-36-core-intel-xeon-w9-3475x-max-480ghz-512gb-ddr5-2tb-m2-ssd-4-x-nvidia-quadro-rtx-a6000-ada-48gb-win-10-pro-ovp-renew.jpg'),
(3, NULL, 'Laptop Dell Precision 7750', 4500000, 'Estación de trabajo móvil diseñada para ingenieros que requieren alta potencia para simulaciones y CAD.', 'https://www.tradeinn.com/f/13822/138225002/dell-portatil-precision-7750-17.3-i7-10850h-16gb-512gb-ssd-nvidia-quadro-rtx-3000.webp'),
(4, NULL, 'Firewall Fortinet FortiGate 100F', 8000000, 'Proporciona seguridad de red con firewall de próxima generación y prevención de amenazas, ideal para ciberseguridad.', 'https://cdn.uvation.com/uvationmarketplace/catalog/product/7/6/761_576yfguhjkml.png'),
(5, NULL, 'Fujitsu fi-7160', 2500000, 'Escáner eficiente para digitalizar documentos, ideal para bufetes de abogados y entidades financieras.', 'https://www.simpapel.com/wp-content/uploads/2019/02/FI-7160.jpg'),
(6, NULL, 'Impresora 3D Ultimaker S5', 5000000, 'Impresora 3D de alto rendimiento para crear prototipos y modelos con precisión.', 'https://cdnx.jumpseller.com/3d-wid-online-store/image/49346622/resize/540/540?1717286421'),
(7, NULL, 'UltraWide LG 34WK95U-W', 1500000, 'Monitor ultrapanorámico de 34\" con resolución 5K, ideal para multitarea en diseño y programación.', 'https://media.us.lg.com/transform/b67ef1b7-9962-4495-99b7-8c84f9d7c871/Monitor_Nano_high-dynamic-range-2_features_900x600'),
(8, NULL, 'NAS Synology DS220+', 1600000, 'Sistema NAS para gestión y acceso seguro a archivos, ideal para almacenamiento y respaldo de datos.', 'https://http2.mlstatic.com/D_NQ_NP_766937-MCO46873913297_072021-O.webp'),
(9, NULL, 'Hamster', 300000, 'hamster ruso bolaboil', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTi38-bqNYd6tjE3FSdQ4kbw-UEdzi-NqHrCA&s');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Usuario` varchar(255) NOT NULL,
  `Apellido` varchar(255) NOT NULL,
  `Correo` varchar(255) NOT NULL,
  `Telefono` varchar(255) NOT NULL,
  `Direccion` varchar(255) NOT NULL,
  `Contraseña` varchar(255) NOT NULL,
  `ID_cargo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Usuario`, `Apellido`, `Correo`, `Telefono`, `Direccion`, `Contraseña`, `ID_cargo`) VALUES
(1, 'Angel', 'Angel', 'Navarrete', 'Anav@gmail.com', '3132571871', 'mihouse', '1234', 1),
(2, 'Camila', 'Camila', 'Correa', 'acami@gmail.com', '321547854', 'Casadeangel', '1234', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProveedor`);

--
-- Indices de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `categoria_ID` (`categoria_ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_cargo` (`ID_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD CONSTRAINT `tblproductos_ibfk_1` FOREIGN KEY (`categoria_ID`) REFERENCES `categorias` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`ID_cargo`) REFERENCES `cargo` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
