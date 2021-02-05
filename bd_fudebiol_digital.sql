-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2021 a las 20:29:50
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_fudebiol_digital`
--
CREATE DATABASE IF NOT EXISTS `bd_fudebiol_digital` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bd_fudebiol_digital`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_actividades_imagenes`
--

CREATE TABLE `fudebiol_actividades_imagenes` (
  `FAI_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de la imágen de la actividad o servicio.',
  `FAI_SERVICIO_ACTIVIDAD_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) del  del servicio o actividad. ',
  `FAI_IMAGEN_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) de la imágen.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_administradores`
--

CREATE TABLE `fudebiol_administradores` (
  `FA_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del administrador. \r\n',
  `FA_EMAIL` varchar(60) NOT NULL COMMENT 'Email del administrador. \r\n',
  `FA_USUARIO` varchar(20) NOT NULL COMMENT 'Nombre de usuario del administrador.\r\n',
  `FA_NICK` varchar(20) NOT NULL COMMENT 'Nombre del administrador.\r\n',
  `FA_CONTRASENA` varchar(12) NOT NULL COMMENT 'Contraseña del administrador.\r\n',
  `FA_ROL` varchar(1) NOT NULL COMMENT 'Rol del administrador: A: administrador publicaciones, R:administrador de reforestación.\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_arboles`
--

CREATE TABLE `fudebiol_arboles` (
  `FA_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del árbol.\r\n',
  `FA_NOMBRE_CIENTIFICO` varchar(30) NOT NULL COMMENT 'Nombre científico del árbol.\r\n',
  `FA_JIFFYS` int(11) NOT NULL COMMENT 'Cantidad de Jiffys. \r\n',
  `FA_BOLSAS` int(11) NOT NULL COMMENT 'Cantidad de bolsas.',
  `FA_ELEVACION_MINIMA` int(11) NOT NULL COMMENT 'Elevación en metros sobre el nivel del mar (msnm) mínima.',
  `FA_ELEVACION_MAXIMA` int(11) NOT NULL COMMENT 'Elevación en metros sobre el nivel del mar (msnm) máxima.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fudebiol_arboles`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_arboles_img`
--

CREATE TABLE `fudebiol_arboles_img` (
  `FAI_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de la imágen de un árbol.',
  `FAI_ARBOL_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) del árbol.',
  `FAI_FORMATO` varchar(15) NOT NULL COMMENT 'Formato de la imagen del árbol.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_arboles_lote`
--

CREATE TABLE `fudebiol_arboles_lote` (
  `FAL_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del árbol en un lote.',
  `FAL_ARBOL_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) del árbol.',
  `FAL_LOTE_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) del lote.',
  `FAL_COORDENADA_W` varchar(20) NOT NULL COMMENT 'Coordenadas Oeste (W) del árbol.',
  `FAL_COORDENADA_N` varchar(20) NOT NULL COMMENT 'Coordenadas norte del árbol.',
  `FAL_FILA` int(11) NOT NULL COMMENT 'Fila en la que se ubica el árbol.',
  `FAL_COLUMNA` int(11) NOT NULL COMMENT 'Columna en la que se ubica el árbol.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_bloques`
--

CREATE TABLE `fudebiol_bloques` (
  `FB_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del bloque.',
  `FB_PUBLICACION_ID` int(11) NOT NULL COMMENT 'Identificador (foránea) de la publicación.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_bloques_galerias`
--

CREATE TABLE `fudebiol_bloques_galerias` (
  `FBG_BLOQUE_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de la galería del bloque.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_bloques_galerias_imagenes`
--

CREATE TABLE `fudebiol_bloques_galerias_imagenes` (
  `FBGI_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de las imágenes de la  galería de un bloque.',
  `FBGI_BLOQUES_GALERIA_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) de la galería del  bloque.',
  `FBGI_IMAGEN_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) de la imágen.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_bloques_textos`
--

CREATE TABLE `fudebiol_bloques_textos` (
  `FBT_BLOQUE_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del bloque.',
  `FBT_TEXTO` varchar(5000) NOT NULL COMMENT 'Texto del bloque.',
  `FBT_TIPO` int(11) NOT NULL COMMENT 'Tipo del bloque. ',
  `FBT_ALINEACION` int(11) NOT NULL COMMENT 'Alineación del bloque.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_contactos`
--

CREATE TABLE `fudebiol_contactos` (
  `FC_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del contacto Coordenada oeste(W) de la dirección de la fundación.',
  `FC_DESCRIPCION` varchar(200) NOT NULL COMMENT 'Descripcion del tipo de contancto, ej. correo, teléfono,',
  `FC_CONTACTO` varchar(250) NOT NULL COMMENT 'Contacto de la fundación.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_galeria`
--

CREATE TABLE `fudebiol_galeria` (
  `FG_IMAGEN_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) de la imagen de una galería.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_imagenes`
--

CREATE TABLE `fudebiol_imagenes` (
  `FI_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de la imagen.',
  `FI_DESCRIPCION` varchar(1000) NOT NULL COMMENT 'Descripción de la imagen.',
  `FI_FORMATO` varchar(5) NOT NULL COMMENT 'Formato de la imagen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_informacion_general`
--

CREATE TABLE `fudebiol_informacion_general` (
  `FIG_HISTORIA` varchar(1000) NOT NULL COMMENT 'Historia de la fundación.',
  `FIG_DIRECCION` varchar(500) NOT NULL COMMENT 'Dirección de la fundación.',
  `FIG_COORDENADA_W` varchar(20) NOT NULL COMMENT 'Coordenada oeste(W) de la dirección de la fundación.',
  `FIG_COORDENADA_N` varchar(20) NOT NULL COMMENT 'Coordenada norte (N) de la dirección de la fundación.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_instituciones`
--

CREATE TABLE `fudebiol_instituciones` (
  `FI_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de la institución.',
  `FI_NOMBRE` varchar(100) NOT NULL COMMENT 'Nombre de la institución.',
  `FI_SIGLAS` varchar(10) DEFAULT NULL COMMENT 'Siglas de la institución.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_investigaciones`
--

CREATE TABLE `fudebiol_investigaciones` (
  `FI_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de la investigación.',
  `FI_TITULO` varchar(100) NOT NULL COMMENT 'Título de la investigación.',
  `FI_ENLACE` varchar(500) NOT NULL COMMENT 'Enlace a  la investigación.',
  `FI_RESUMEN` varchar(500) NOT NULL COMMENT 'Resumen de la investigación.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_investigaciones_autores`
--

CREATE TABLE `fudebiol_investigaciones_autores` (
  `FIA_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de autores por  investigación.',
  `FIA_INVESTIGACION_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) de la investigación.',
  `FIA_NOMBRE` varchar(30) NOT NULL COMMENT 'Nombre del autor.',
  `FIA_APELLIDO1` varchar(30) NOT NULL COMMENT 'Primer apellido del autor.',
  `FIA_APELLIDO2` varchar(30) NOT NULL COMMENT 'Segundo apellido del autor.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_investigaciones_conclusiones`
--

CREATE TABLE `fudebiol_investigaciones_conclusiones` (
  `FIC_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de la conclusión de la investigación.',
  `FIC_INVESTIGACION_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) de la investigación.',
  `FIC_DESCRIPCION` varchar(1000) NOT NULL COMMENT 'Descripción (contenido) de la conclusión de la investigación.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_investigaciones_imagenes`
--

CREATE TABLE `fudebiol_investigaciones_imagenes` (
  `FII_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de las imágenes de la investigación.',
  `FII_INVESTIGACION_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) de la investigación.',
  `FII_IMAGEN_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) de la imágen.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_investigaciones_instituciones`
--

CREATE TABLE `fudebiol_investigaciones_instituciones` (
  `FII_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de la institución por investigación.',
  `FII_INVESTIGACION_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) de la investigación.',
  `FII_INSTITUCION_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) de la institución.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_investigaciones_objetivos`
--

CREATE TABLE `fudebiol_investigaciones_objetivos` (
  `FIO_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del objetivo de la investigación.',
  `FIO_INVESTIGACION_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) de la investigación.',
  `FIO_DESCRIPCION` varchar(1000) NOT NULL COMMENT 'Descripción (contenido) del objetivo de la investigación.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_investigaciones_resultados`
--

CREATE TABLE `fudebiol_investigaciones_resultados` (
  `FIR_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del resultado de la investigación.',
  `FIR_INVESTIGACION_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) de la investigación.',
  `FIR_DESCRIPCION` varchar(1000) NOT NULL COMMENT 'Descripción(contenido) del resultado de la investigación.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_lotes`
--

CREATE TABLE `fudebiol_lotes` (
  `FL_ID` int(10) UNSIGNED NOT NULL COMMENT 'Indentificador del lote.',
  `FL_NOMBRE` varchar(10) NOT NULL COMMENT 'Nombre del lote. Ej: lote 1\r\n',
  `FL_TAMANO` int(11) NOT NULL COMMENT 'Tamaño en metros cuadrados del lote. ',
  `FL_FILAS` int(11) NOT NULL COMMENT 'Cantidad de filas del lote.',
  `FL_COLUMNAS` int(11) NOT NULL COMMENT 'Cantidad de columnas del lote.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fudebiol_lotes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_mensajes`
--

CREATE TABLE `fudebiol_mensajes` (
  `FM_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del mensaje.',
  `FM_CORREO` varchar(250) DEFAULT NULL COMMENT 'Correo de quien envía el mensaje.',
  `FM_TELEFONO` varchar(30) DEFAULT NULL COMMENT 'Teléfono de quien envía el mensaje.',
  `FM_TEXTO` varchar(1000) NOT NULL COMMENT 'Texto (contenido) del mensaje.',
  `FM_ESTADO` int(11) NOT NULL COMMENT 'Estado del mensaje: 0: leído, 1: no leído.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_nombres_comunes`
--

CREATE TABLE `fudebiol_nombres_comunes` (
  `FNC_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del nombre común de un árbol.',
  `FNC_ARBOL_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) del árbol.\r\n',
  `FNC_NOMBRE` varchar(30) NOT NULL COMMENT 'Nombre común del árbol.\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_notificaciones`
--

CREATE TABLE `fudebiol_notificaciones` (
  `FN_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador de la notificación.',
  `FN_FECHA` date NOT NULL COMMENT 'Fecha de la notificación.',
  `FN_DESCRIPCION` varchar(300) NOT NULL COMMENT 'Descripcion (contenido) de la notificación.',
  `FN_TIPO` int(11) NOT NULL COMMENT 'Tipo de notificación.',
  `FN_ESTADO` int(11) NOT NULL COMMENT 'Estado de la notificación: 0: leída, 1: no leída.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_objetivos`
--

CREATE TABLE `fudebiol_objetivos` (
  `FO_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del objetivo de la fundación.',
  `FO_DESCRIPCION` varchar(500) NOT NULL COMMENT 'Descripción del objetivo de la fundación.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_padrinos`
--

CREATE TABLE `fudebiol_padrinos` (
  `FP_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del padrino (quien adopta un árbol). ',
  `FP_CEDULA` varchar(30) NOT NULL COMMENT 'Número de cédula del padrino.',
  `FP_NOMBRE1` varchar(30) NOT NULL COMMENT 'Primer nombre del padrino.',
  `FP_NOMBRE2` varchar(30) DEFAULT NULL COMMENT 'Segundo nombre del padrino.',
  `FP_APELLIDO1` varchar(30) DEFAULT NULL COMMENT 'Primer apellido del padrino.',
  `FP_APELLIDO2` varchar(30) DEFAULT NULL COMMENT 'Segundo apellido del padrino.',
  `FP_TIPO` varchar(1) NOT NULL COMMENT 'Tipo de padrino: P: persona, E: empresa, O: otro.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_padrinos_arboles`
--

CREATE TABLE `fudebiol_padrinos_arboles` (
  `FPA_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del padrino de un árbol.\r\n',
  `FPA_PADRINO_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) del padrino.\r\n',
  `FPA_ARBOL_LOTE_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador (foránea) del árbol de un lote.\r\n',
  `FPA_FECHA_ADOPCION` date NOT NULL COMMENT 'Fecha de la adopción.\r\n',
  `FPA_ESTADO` varchar(1) NOT NULL COMMENT 'Estado de la adopción: A: activa, C: completa. '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_publicaciones`
--

CREATE TABLE `fudebiol_publicaciones` (
  `FP_ID` int(11) NOT NULL COMMENT 'Identificador de la publicación.',
  `FP_TITULO` varchar(200) NOT NULL COMMENT 'Título  de la publicación.',
  `FP_DESCRIPCION` varchar(1000) NOT NULL COMMENT 'Descripción  de la publicación.',
  `FP_FECHA` date NOT NULL COMMENT 'Fecha  de la publicación.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fudebiol_servicios_actividades`
--

CREATE TABLE `fudebiol_servicios_actividades` (
  `FSA_ID` int(10) UNSIGNED NOT NULL COMMENT 'Identificador del servicio o actividad. ',
  `FSA_DESCRIPCION` varchar(200) NOT NULL COMMENT 'Descripción  del servicio o actividad. '
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fudebiol_actividades_imagenes`
--
ALTER TABLE `fudebiol_actividades_imagenes`
  ADD PRIMARY KEY (`FAI_ID`),
  ADD KEY `FK_ACTIVIDADES_IMAGENES_IMAGEN` (`FAI_IMAGEN_ID`),
  ADD KEY `FK_ACTIVIDADES_IMAGENES_SERVICIO_ACTIVIDAD` (`FAI_SERVICIO_ACTIVIDAD_ID`);

--
-- Indices de la tabla `fudebiol_administradores`
--
ALTER TABLE `fudebiol_administradores`
  ADD PRIMARY KEY (`FA_ID`),
  ADD UNIQUE KEY `UQ_FA_USUARIO` (`FA_USUARIO`);

--
-- Indices de la tabla `fudebiol_arboles`
--
ALTER TABLE `fudebiol_arboles`
  ADD PRIMARY KEY (`FA_ID`);

--
-- Indices de la tabla `fudebiol_arboles_img`
--
ALTER TABLE `fudebiol_arboles_img`
  ADD PRIMARY KEY (`FAI_ID`),
  ADD KEY `FK_ARBOLES_IMG_ARBOL` (`FAI_ARBOL_ID`);

--
-- Indices de la tabla `fudebiol_arboles_lote`
--
ALTER TABLE `fudebiol_arboles_lote`
  ADD PRIMARY KEY (`FAL_ID`),
  ADD KEY `FK_ARBOLES_LOTE_ARBOL` (`FAL_ARBOL_ID`),
  ADD KEY `FK_ARBOLES_LOTE_LOTE` (`FAL_LOTE_ID`);

--
-- Indices de la tabla `fudebiol_bloques`
--
ALTER TABLE `fudebiol_bloques`
  ADD PRIMARY KEY (`FB_ID`),
  ADD KEY `FK_BLOQUES_PUBLICACION` (`FB_PUBLICACION_ID`);

--
-- Indices de la tabla `fudebiol_bloques_galerias`
--
ALTER TABLE `fudebiol_bloques_galerias`
  ADD PRIMARY KEY (`FBG_BLOQUE_ID`),
  ADD KEY `FK_BLOQUES_GALERIAS_BLOQUE` (`FBG_BLOQUE_ID`);

--
-- Indices de la tabla `fudebiol_bloques_galerias_imagenes`
--
ALTER TABLE `fudebiol_bloques_galerias_imagenes`
  ADD PRIMARY KEY (`FBGI_ID`),
  ADD KEY `FK_BLOQUES_GALERIAS_IMAGENES_BLOQUES_GALERIA` (`FBGI_BLOQUES_GALERIA_ID`),
  ADD KEY `FK_BLOQUES_GALERIAS_IMAGENES_IMAGEN` (`FBGI_IMAGEN_ID`);

--
-- Indices de la tabla `fudebiol_bloques_textos`
--
ALTER TABLE `fudebiol_bloques_textos`
  ADD PRIMARY KEY (`FBT_BLOQUE_ID`),
  ADD KEY `FK_BLOQUES_TEXTOS_BLOQUE` (`FBT_BLOQUE_ID`);

--
-- Indices de la tabla `fudebiol_contactos`
--
ALTER TABLE `fudebiol_contactos`
  ADD PRIMARY KEY (`FC_ID`);

--
-- Indices de la tabla `fudebiol_galeria`
--
ALTER TABLE `fudebiol_galeria`
  ADD KEY `FK_GALERIA_IMAGEN` (`FG_IMAGEN_ID`);

--
-- Indices de la tabla `fudebiol_imagenes`
--
ALTER TABLE `fudebiol_imagenes`
  ADD PRIMARY KEY (`FI_ID`);

--
-- Indices de la tabla `fudebiol_instituciones`
--
ALTER TABLE `fudebiol_instituciones`
  ADD PRIMARY KEY (`FI_ID`);

--
-- Indices de la tabla `fudebiol_investigaciones`
--
ALTER TABLE `fudebiol_investigaciones`
  ADD PRIMARY KEY (`FI_ID`);

--
-- Indices de la tabla `fudebiol_investigaciones_autores`
--
ALTER TABLE `fudebiol_investigaciones_autores`
  ADD PRIMARY KEY (`FIA_ID`),
  ADD KEY `FK_INVESTIGACIONES_AUTORES_INVESTIGACION` (`FIA_INVESTIGACION_ID`);

--
-- Indices de la tabla `fudebiol_investigaciones_conclusiones`
--
ALTER TABLE `fudebiol_investigaciones_conclusiones`
  ADD PRIMARY KEY (`FIC_ID`),
  ADD KEY `IX_Relationship32` (`FIC_INVESTIGACION_ID`);

--
-- Indices de la tabla `fudebiol_investigaciones_imagenes`
--
ALTER TABLE `fudebiol_investigaciones_imagenes`
  ADD PRIMARY KEY (`FII_ID`),
  ADD KEY `FK_INVESTIGACIONES_IMAGENES_INVESTIGACION` (`FII_INVESTIGACION_ID`),
  ADD KEY `FK_INVESTIGACIONES_IMAGENES_IMAGEN` (`FII_IMAGEN_ID`);

--
-- Indices de la tabla `fudebiol_investigaciones_instituciones`
--
ALTER TABLE `fudebiol_investigaciones_instituciones`
  ADD PRIMARY KEY (`FII_ID`),
  ADD KEY `FK_INVESTIGACIONES_INSTITUCIONES_INSVESTIGACION` (`FII_INVESTIGACION_ID`),
  ADD KEY `FK_INVESTIGACIONES_INSTITUCIONES_INSTITUCION` (`FII_INSTITUCION_ID`);

--
-- Indices de la tabla `fudebiol_investigaciones_objetivos`
--
ALTER TABLE `fudebiol_investigaciones_objetivos`
  ADD PRIMARY KEY (`FIO_ID`),
  ADD KEY `FK_INVESTIGACIONES_OBJETIVOS_INVESTIGACION` (`FIO_INVESTIGACION_ID`);

--
-- Indices de la tabla `fudebiol_investigaciones_resultados`
--
ALTER TABLE `fudebiol_investigaciones_resultados`
  ADD PRIMARY KEY (`FIR_ID`),
  ADD KEY `FK_INVESTIGACIONES_RESULTADOS_INVESTIGACION` (`FIR_INVESTIGACION_ID`);

--
-- Indices de la tabla `fudebiol_lotes`
--
ALTER TABLE `fudebiol_lotes`
  ADD PRIMARY KEY (`FL_ID`),
  ADD UNIQUE KEY `UQ_FL_NOMBRE` (`FL_NOMBRE`);

--
-- Indices de la tabla `fudebiol_mensajes`
--
ALTER TABLE `fudebiol_mensajes`
  ADD PRIMARY KEY (`FM_ID`);

--
-- Indices de la tabla `fudebiol_nombres_comunes`
--
ALTER TABLE `fudebiol_nombres_comunes`
  ADD PRIMARY KEY (`FNC_ID`),
  ADD KEY `FK_NOMBRES_COMUNES_ARBOL` (`FNC_ARBOL_ID`);

--
-- Indices de la tabla `fudebiol_notificaciones`
--
ALTER TABLE `fudebiol_notificaciones`
  ADD PRIMARY KEY (`FN_ID`);

--
-- Indices de la tabla `fudebiol_objetivos`
--
ALTER TABLE `fudebiol_objetivos`
  ADD PRIMARY KEY (`FO_ID`);

--
-- Indices de la tabla `fudebiol_padrinos`
--
ALTER TABLE `fudebiol_padrinos`
  ADD PRIMARY KEY (`FP_ID`),
  ADD UNIQUE KEY `FP_CEDULA` (`FP_CEDULA`);

--
-- Indices de la tabla `fudebiol_padrinos_arboles`
--
ALTER TABLE `fudebiol_padrinos_arboles`
  ADD PRIMARY KEY (`FPA_ID`),
  ADD KEY `FK_PADRINOS_ARBOLES_ARBOL_LOTE` (`FPA_ARBOL_LOTE_ID`),
  ADD KEY `FK_PADRINOS_ARBOLES_PADRINO` (`FPA_PADRINO_ID`);

--
-- Indices de la tabla `fudebiol_publicaciones`
--
ALTER TABLE `fudebiol_publicaciones`
  ADD PRIMARY KEY (`FP_ID`);

--
-- Indices de la tabla `fudebiol_servicios_actividades`
--
ALTER TABLE `fudebiol_servicios_actividades`
  ADD PRIMARY KEY (`FSA_ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fudebiol_actividades_imagenes`
--
ALTER TABLE `fudebiol_actividades_imagenes`
  MODIFY `FAI_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la imágen de la actividad o servicio.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_administradores`
--
ALTER TABLE `fudebiol_administradores`
  MODIFY `FA_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador del administrador. \r\n';

--
-- AUTO_INCREMENT de la tabla `fudebiol_arboles`
--
ALTER TABLE `fudebiol_arboles`
  MODIFY `FA_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador del árbol.\r\n', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fudebiol_arboles_img`
--
ALTER TABLE `fudebiol_arboles_img`
  MODIFY `FAI_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la imágen de un árbol.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_arboles_lote`
--
ALTER TABLE `fudebiol_arboles_lote`
  MODIFY `FAL_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador del árbol en un lote.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_bloques`
--
ALTER TABLE `fudebiol_bloques`
  MODIFY `FB_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador del bloque.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_bloques_galerias_imagenes`
--
ALTER TABLE `fudebiol_bloques_galerias_imagenes`
  MODIFY `FBGI_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador de las imágenes de la  galería de un bloque.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_contactos`
--
ALTER TABLE `fudebiol_contactos`
  MODIFY `FC_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador del contacto Coordenada oeste(W) de la dirección de la fundación.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_imagenes`
--
ALTER TABLE `fudebiol_imagenes`
  MODIFY `FI_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la imagen.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_instituciones`
--
ALTER TABLE `fudebiol_instituciones`
  MODIFY `FI_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la institución.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_investigaciones`
--
ALTER TABLE `fudebiol_investigaciones`
  MODIFY `FI_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la investigación.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_investigaciones_autores`
--
ALTER TABLE `fudebiol_investigaciones_autores`
  MODIFY `FIA_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador de autores por  investigación.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_investigaciones_conclusiones`
--
ALTER TABLE `fudebiol_investigaciones_conclusiones`
  MODIFY `FIC_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la conclusión de la investigación.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_investigaciones_imagenes`
--
ALTER TABLE `fudebiol_investigaciones_imagenes`
  MODIFY `FII_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador de las imágenes de la investigación.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_investigaciones_instituciones`
--
ALTER TABLE `fudebiol_investigaciones_instituciones`
  MODIFY `FII_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la institución por investigación.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_investigaciones_objetivos`
--
ALTER TABLE `fudebiol_investigaciones_objetivos`
  MODIFY `FIO_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador del objetivo de la investigación.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_investigaciones_resultados`
--
ALTER TABLE `fudebiol_investigaciones_resultados`
  MODIFY `FIR_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador del resultado de la investigación.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_lotes`
--
ALTER TABLE `fudebiol_lotes`
  MODIFY `FL_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Indentificador del lote.', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fudebiol_mensajes`
--
ALTER TABLE `fudebiol_mensajes`
  MODIFY `FM_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador del mensaje.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_nombres_comunes`
--
ALTER TABLE `fudebiol_nombres_comunes`
  MODIFY `FNC_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador del nombre común de un árbol.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_notificaciones`
--
ALTER TABLE `fudebiol_notificaciones`
  MODIFY `FN_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la notificación.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_objetivos`
--
ALTER TABLE `fudebiol_objetivos`
  MODIFY `FO_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador del objetivo de la fundación.';

--
-- AUTO_INCREMENT de la tabla `fudebiol_padrinos`
--
ALTER TABLE `fudebiol_padrinos`
  MODIFY `FP_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador del padrino (quien adopta un árbol). ';

--
-- AUTO_INCREMENT de la tabla `fudebiol_padrinos_arboles`
--
ALTER TABLE `fudebiol_padrinos_arboles`
  MODIFY `FPA_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador del padrino de un árbol.\r\n';

--
-- AUTO_INCREMENT de la tabla `fudebiol_servicios_actividades`
--
ALTER TABLE `fudebiol_servicios_actividades`
  MODIFY `FSA_ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identificador del servicio o actividad. ';

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fudebiol_actividades_imagenes`
--
ALTER TABLE `fudebiol_actividades_imagenes`
  ADD CONSTRAINT `Relationship37` FOREIGN KEY (`FAI_IMAGEN_ID`) REFERENCES `fudebiol_imagenes` (`FI_ID`),
  ADD CONSTRAINT `Relationship38` FOREIGN KEY (`FAI_SERVICIO_ACTIVIDAD_ID`) REFERENCES `fudebiol_servicios_actividades` (`FSA_ID`);

--
-- Filtros para la tabla `fudebiol_arboles_img`
--
ALTER TABLE `fudebiol_arboles_img`
  ADD CONSTRAINT `Relationship16` FOREIGN KEY (`FAI_ARBOL_ID`) REFERENCES `fudebiol_arboles` (`FA_ID`);

--
-- Filtros para la tabla `fudebiol_arboles_lote`
--
ALTER TABLE `fudebiol_arboles_lote`
  ADD CONSTRAINT `Relationship17` FOREIGN KEY (`FAL_ARBOL_ID`) REFERENCES `fudebiol_arboles` (`FA_ID`),
  ADD CONSTRAINT `Relationship18` FOREIGN KEY (`FAL_LOTE_ID`) REFERENCES `fudebiol_lotes` (`FL_ID`);

--
-- Filtros para la tabla `fudebiol_bloques`
--
ALTER TABLE `fudebiol_bloques`
  ADD CONSTRAINT `Relationship21` FOREIGN KEY (`FB_PUBLICACION_ID`) REFERENCES `fudebiol_publicaciones` (`FP_ID`);

--
-- Filtros para la tabla `fudebiol_bloques_galerias`
--
ALTER TABLE `fudebiol_bloques_galerias`
  ADD CONSTRAINT `Relationship23` FOREIGN KEY (`FBG_BLOQUE_ID`) REFERENCES `fudebiol_bloques` (`FB_ID`);

--
-- Filtros para la tabla `fudebiol_bloques_galerias_imagenes`
--
ALTER TABLE `fudebiol_bloques_galerias_imagenes`
  ADD CONSTRAINT `Relationship24` FOREIGN KEY (`FBGI_BLOQUES_GALERIA_ID`) REFERENCES `fudebiol_bloques_galerias` (`FBG_BLOQUE_ID`),
  ADD CONSTRAINT `Relationship25` FOREIGN KEY (`FBGI_IMAGEN_ID`) REFERENCES `fudebiol_imagenes` (`FI_ID`);

--
-- Filtros para la tabla `fudebiol_bloques_textos`
--
ALTER TABLE `fudebiol_bloques_textos`
  ADD CONSTRAINT `Relationship22` FOREIGN KEY (`FBT_BLOQUE_ID`) REFERENCES `fudebiol_bloques` (`FB_ID`);

--
-- Filtros para la tabla `fudebiol_galeria`
--
ALTER TABLE `fudebiol_galeria`
  ADD CONSTRAINT `Relationship36` FOREIGN KEY (`FG_IMAGEN_ID`) REFERENCES `fudebiol_imagenes` (`FI_ID`);

--
-- Filtros para la tabla `fudebiol_investigaciones_autores`
--
ALTER TABLE `fudebiol_investigaciones_autores`
  ADD CONSTRAINT `Relationship29` FOREIGN KEY (`FIA_INVESTIGACION_ID`) REFERENCES `fudebiol_investigaciones` (`FI_ID`);

--
-- Filtros para la tabla `fudebiol_investigaciones_conclusiones`
--
ALTER TABLE `fudebiol_investigaciones_conclusiones`
  ADD CONSTRAINT `Relationship32` FOREIGN KEY (`FIC_INVESTIGACION_ID`) REFERENCES `fudebiol_investigaciones` (`FI_ID`);

--
-- Filtros para la tabla `fudebiol_investigaciones_imagenes`
--
ALTER TABLE `fudebiol_investigaciones_imagenes`
  ADD CONSTRAINT `Relationship33` FOREIGN KEY (`FII_INVESTIGACION_ID`) REFERENCES `fudebiol_investigaciones` (`FI_ID`),
  ADD CONSTRAINT `Relationship35` FOREIGN KEY (`FII_IMAGEN_ID`) REFERENCES `fudebiol_imagenes` (`FI_ID`);

--
-- Filtros para la tabla `fudebiol_investigaciones_instituciones`
--
ALTER TABLE `fudebiol_investigaciones_instituciones`
  ADD CONSTRAINT `Relationship26` FOREIGN KEY (`FII_INVESTIGACION_ID`) REFERENCES `fudebiol_investigaciones` (`FI_ID`),
  ADD CONSTRAINT `Relationship28` FOREIGN KEY (`FII_INSTITUCION_ID`) REFERENCES `fudebiol_instituciones` (`FI_ID`);

--
-- Filtros para la tabla `fudebiol_investigaciones_objetivos`
--
ALTER TABLE `fudebiol_investigaciones_objetivos`
  ADD CONSTRAINT `Relationship30` FOREIGN KEY (`FIO_INVESTIGACION_ID`) REFERENCES `fudebiol_investigaciones` (`FI_ID`);

--
-- Filtros para la tabla `fudebiol_investigaciones_resultados`
--
ALTER TABLE `fudebiol_investigaciones_resultados`
  ADD CONSTRAINT `Relationship31` FOREIGN KEY (`FIR_INVESTIGACION_ID`) REFERENCES `fudebiol_investigaciones` (`FI_ID`);

--
-- Filtros para la tabla `fudebiol_nombres_comunes`
--
ALTER TABLE `fudebiol_nombres_comunes`
  ADD CONSTRAINT `Relationship4` FOREIGN KEY (`FNC_ARBOL_ID`) REFERENCES `fudebiol_arboles` (`FA_ID`);

--
-- Filtros para la tabla `fudebiol_padrinos_arboles`
--
ALTER TABLE `fudebiol_padrinos_arboles`
  ADD CONSTRAINT `Relationship19` FOREIGN KEY (`FPA_ARBOL_LOTE_ID`) REFERENCES `fudebiol_arboles_lote` (`FAL_ID`),
  ADD CONSTRAINT `Relationship20` FOREIGN KEY (`FPA_PADRINO_ID`) REFERENCES `fudebiol_padrinos` (`FP_ID`);
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
