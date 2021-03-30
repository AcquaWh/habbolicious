-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2021 a las 09:15:09
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hbx1_habbolicious`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_ban`
--

CREATE TABLE `hb_ban` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `ip` varchar(500) NOT NULL,
  `motivo` longtext NOT NULL,
  `tiempo` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_blogs`
--

CREATE TABLE `hb_blogs` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `cuerpo` longtext NOT NULL,
  `portada` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_comentarios_blog`
--

CREATE TABLE `hb_comentarios_blog` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_blog` int(11) NOT NULL,
  `cuerpo` longtext CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_comentarios_eventos`
--

CREATE TABLE `hb_comentarios_eventos` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_eventos` int(11) NOT NULL,
  `cuerpo` longtext CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_comentarios_noticias`
--

CREATE TABLE `hb_comentarios_noticias` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_noticias` int(11) NOT NULL,
  `cuerpo` longtext CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_comentarios_perfil`
--

CREATE TABLE `hb_comentarios_perfil` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `cuerpo` longtext CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_djs`
--

CREATE TABLE `hb_djs` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_rol` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_equipo`
--

CREATE TABLE `hb_equipo` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_rol` int(11) NOT NULL,
  `srol` varchar(255) NOT NULL,
  `orden` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hb_equipo`
--

INSERT INTO `hb_equipo` (`id`, `id_user`, `id_rol`, `srol`, `orden`) VALUES
(1, 62, 5, 'Programación', NULL),
(2, 62, 2, 'am', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_eventos`
--

CREATE TABLE `hb_eventos` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cuerpo` longtext CHARACTER SET utf8mb4 NOT NULL,
  `fecha` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `portada` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_home`
--

CREATE TABLE `hb_home` (
  `id` int(11) NOT NULL,
  `titulo_tema` varchar(255) DEFAULT NULL,
  `portada` varchar(300) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `footer_color` varchar(255) DEFAULT NULL,
  `footer_letras_color` varchar(255) DEFAULT NULL,
  `img_movimiento` varchar(300) DEFAULT NULL,
  `menu_letras_color` varchar(255) DEFAULT NULL,
  `logo` varchar(300) DEFAULT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_horario`
--

CREATE TABLE `hb_horario` (
  `id` int(11) NOT NULL,
  `hora` varchar(255) NOT NULL,
  `domingo` varchar(255) DEFAULT NULL,
  `lunes` varchar(255) DEFAULT NULL,
  `martes` varchar(255) DEFAULT NULL,
  `miercoles` varchar(255) DEFAULT NULL,
  `jueves` varchar(255) DEFAULT NULL,
  `viernes` varchar(255) DEFAULT NULL,
  `sabado` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_like_dj`
--

CREATE TABLE `hb_like_dj` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_dj` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_like_perfil`
--

CREATE TABLE `hb_like_perfil` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_loteria`
--

CREATE TABLE `hb_loteria` (
  `id` int(11) NOT NULL,
  `estatus` varchar(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_loteria_registros`
--

CREATE TABLE `hb_loteria_registros` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `numero_loteria` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_normas`
--

CREATE TABLE `hb_normas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `cuerpo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_noticias`
--

CREATE TABLE `hb_noticias` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `cuerpo` longtext CHARACTER SET utf8mb4 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `portada` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_panel`
--

CREATE TABLE `hb_panel` (
  `id` int(11) NOT NULL,
  `titulo_tema` varchar(255) NOT NULL,
  `color_menu` varchar(255) DEFAULT NULL,
  `color_fondo` varchar(255) DEFAULT NULL,
  `color_barra` varchar(255) DEFAULT NULL,
  `color_texto_barra` varchar(255) DEFAULT NULL,
  `color_titulos` varchar(255) DEFAULT NULL,
  `cuadro1_fondo` varchar(255) DEFAULT NULL,
  `cuadro2_fondo` varchar(255) DEFAULT NULL,
  `cuadro3_fondo` varchar(255) DEFAULT NULL,
  `cuadro4_fondo` varchar(255) DEFAULT NULL,
  `cuadro1_texto` varchar(255) DEFAULT NULL,
  `cuadro2_texto` varchar(255) DEFAULT NULL,
  `cuadro3_texto` varchar(255) DEFAULT NULL,
  `cuadro4_texto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `ip` varchar(500) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_perfil`
--

CREATE TABLE `hb_perfil` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `foto` varchar(300) DEFAULT NULL,
  `portada` varchar(300) DEFAULT NULL,
  `video_youtube` varchar(255) DEFAULT NULL,
  `sobremi` longtext CHARACTER SET utf8mb4 DEFAULT NULL,
  `cumple` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hb_perfil`
--

INSERT INTO `hb_perfil` (`id`, `id_user`, `twitter`, `foto`, `portada`, `video_youtube`, `sobremi`, `cumple`, `created_at`, `updated_at`) VALUES
(1, 62, NULL, NULL, NULL, NULL, NULL, NULL, '2020-01-13 07:41:34', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_peticiones`
--

CREATE TABLE `hb_peticiones` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `fecha` timestamp NULL DEFAULT current_timestamp(),
  `cancion` varchar(255) NOT NULL,
  `ip` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_placas`
--

CREATE TABLE `hb_placas` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `img_placa` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_placas_usuarios`
--

CREATE TABLE `hb_placas_usuarios` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_placa` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_roles`
--

CREATE TABLE `hb_roles` (
  `id` int(11) NOT NULL,
  `nombre_rango` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hb_roles`
--

INSERT INTO `hb_roles` (`id`, `nombre_rango`) VALUES
(1, 'Administración'),
(2, 'Coordinación'),
(3, 'Desarrollo'),
(4, 'Información'),
(5, 'Radio'),
(6, 'Concursos'),
(7, 'Marketing'),
(8, 'Eventos'),
(9, 'Guías'),
(10, 'Diseño'),
(11, 'Moderación'),
(12, 'Catálogo'),
(13, 'Helpers'),
(14, 'Habbolicious');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_sweets`
--

CREATE TABLE `hb_sweets` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `hb_sweets`
--

INSERT INTO `hb_sweets` (`id`, `id_user`, `cantidad`, `created_at`, `updated_at`) VALUES
(1, 62, 1, '2020-01-13 07:48:28', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_terminos`
--

CREATE TABLE `hb_terminos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `cuerpo` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_vacantes_formulario`
--

CREATE TABLE `hb_vacantes_formulario` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `cuerpo` longtext NOT NULL,
  `pregunta1` varchar(255) DEFAULT NULL,
  `pregunta2` varchar(255) DEFAULT NULL,
  `pregunta3` varchar(255) DEFAULT NULL,
  `pregunta4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_vacantes_registro`
--

CREATE TABLE `hb_vacantes_registro` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `pregunta1` varchar(255) DEFAULT NULL,
  `pregunta2` varchar(255) DEFAULT NULL,
  `pregunta3` varchar(255) DEFAULT NULL,
  `pregunta4` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hb_votos_perfil`
--

CREATE TABLE `hb_votos_perfil` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `habbo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `habbo`, `email`, `email_verified_at`, `password`, `remember_token`, `ip`, `created_at`, `updated_at`) VALUES
(62, 'AcquaWh', '0acqua0', 'acquawh@hostedred.com', '2019-11-12 23:00:00', '$2y$10$BS.sA0YZODqXriNq1JXi.O/V/dW9WYheOtplJM0MrcFiAG.AZzFD6', NULL, '189.192.26.215', '2019-11-27 14:08:48', '2019-11-27 14:08:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hb_ban`
--
ALTER TABLE `hb_ban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_blogs`
--
ALTER TABLE `hb_blogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_comentarios_blog`
--
ALTER TABLE `hb_comentarios_blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_blog` (`id_blog`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_comentarios_eventos`
--
ALTER TABLE `hb_comentarios_eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_eventos` (`id_eventos`);

--
-- Indices de la tabla `hb_comentarios_noticias`
--
ALTER TABLE `hb_comentarios_noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_noticias` (`id_noticias`);

--
-- Indices de la tabla `hb_comentarios_perfil`
--
ALTER TABLE `hb_comentarios_perfil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_perfil` (`id_perfil`);

--
-- Indices de la tabla `hb_djs`
--
ALTER TABLE `hb_djs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `hb_djs_ibfk_1` (`id_user`);

--
-- Indices de la tabla `hb_equipo`
--
ALTER TABLE `hb_equipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hb_equipo_ibfk_1` (`id_rol`),
  ADD KEY `hb_equipo_ibfk_2` (`id_user`);

--
-- Indices de la tabla `hb_eventos`
--
ALTER TABLE `hb_eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_home`
--
ALTER TABLE `hb_home`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_horario`
--
ALTER TABLE `hb_horario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hb_like_dj`
--
ALTER TABLE `hb_like_dj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dj` (`id_dj`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_like_perfil`
--
ALTER TABLE `hb_like_perfil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_perfil` (`id_perfil`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_loteria`
--
ALTER TABLE `hb_loteria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hb_loteria_registros`
--
ALTER TABLE `hb_loteria_registros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_normas`
--
ALTER TABLE `hb_normas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hb_noticias`
--
ALTER TABLE `hb_noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_panel`
--
ALTER TABLE `hb_panel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_perfil`
--
ALTER TABLE `hb_perfil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_peticiones`
--
ALTER TABLE `hb_peticiones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_placas`
--
ALTER TABLE `hb_placas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hb_placas_usuarios`
--
ALTER TABLE `hb_placas_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_placa` (`id_placa`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_roles`
--
ALTER TABLE `hb_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hb_sweets`
--
ALTER TABLE `hb_sweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_terminos`
--
ALTER TABLE `hb_terminos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hb_vacantes_formulario`
--
ALTER TABLE `hb_vacantes_formulario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hb_vacantes_registro`
--
ALTER TABLE `hb_vacantes_registro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `hb_votos_perfil`
--
ALTER TABLE `hb_votos_perfil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_perfil` (`id_perfil`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_ban`
--
ALTER TABLE `hb_ban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_blogs`
--
ALTER TABLE `hb_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_comentarios_blog`
--
ALTER TABLE `hb_comentarios_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_comentarios_eventos`
--
ALTER TABLE `hb_comentarios_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_comentarios_noticias`
--
ALTER TABLE `hb_comentarios_noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_comentarios_perfil`
--
ALTER TABLE `hb_comentarios_perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_djs`
--
ALTER TABLE `hb_djs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_equipo`
--
ALTER TABLE `hb_equipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `hb_eventos`
--
ALTER TABLE `hb_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_home`
--
ALTER TABLE `hb_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_horario`
--
ALTER TABLE `hb_horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_like_dj`
--
ALTER TABLE `hb_like_dj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_like_perfil`
--
ALTER TABLE `hb_like_perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_loteria`
--
ALTER TABLE `hb_loteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_loteria_registros`
--
ALTER TABLE `hb_loteria_registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_normas`
--
ALTER TABLE `hb_normas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_noticias`
--
ALTER TABLE `hb_noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_panel`
--
ALTER TABLE `hb_panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_perfil`
--
ALTER TABLE `hb_perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `hb_peticiones`
--
ALTER TABLE `hb_peticiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_placas`
--
ALTER TABLE `hb_placas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_placas_usuarios`
--
ALTER TABLE `hb_placas_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_roles`
--
ALTER TABLE `hb_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `hb_sweets`
--
ALTER TABLE `hb_sweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `hb_terminos`
--
ALTER TABLE `hb_terminos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_vacantes_formulario`
--
ALTER TABLE `hb_vacantes_formulario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_vacantes_registro`
--
ALTER TABLE `hb_vacantes_registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hb_votos_perfil`
--
ALTER TABLE `hb_votos_perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hb_ban`
--
ALTER TABLE `hb_ban`
  ADD CONSTRAINT `hb_ban_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `hb_blogs`
--
ALTER TABLE `hb_blogs`
  ADD CONSTRAINT `hb_blogs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `hb_comentarios_blog`
--
ALTER TABLE `hb_comentarios_blog`
  ADD CONSTRAINT `hb_comentarios_blog_ibfk_1` FOREIGN KEY (`id_blog`) REFERENCES `hb_blogs` (`id`),
  ADD CONSTRAINT `hb_comentarios_blog_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `hb_comentarios_eventos`
--
ALTER TABLE `hb_comentarios_eventos`
  ADD CONSTRAINT `hb_comentarios_eventos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `hb_comentarios_eventos_ibfk_2` FOREIGN KEY (`id_eventos`) REFERENCES `hb_eventos` (`id`);

--
-- Filtros para la tabla `hb_comentarios_noticias`
--
ALTER TABLE `hb_comentarios_noticias`
  ADD CONSTRAINT `hb_comentarios_noticias_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hb_comentarios_noticias_ibfk_2` FOREIGN KEY (`id_noticias`) REFERENCES `hb_noticias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hb_comentarios_perfil`
--
ALTER TABLE `hb_comentarios_perfil`
  ADD CONSTRAINT `hb_comentarios_perfil_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hb_comentarios_perfil_ibfk_2` FOREIGN KEY (`id_perfil`) REFERENCES `hb_perfil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hb_djs`
--
ALTER TABLE `hb_djs`
  ADD CONSTRAINT `hb_djs_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hb_djs_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `hb_roles` (`id`);

--
-- Filtros para la tabla `hb_equipo`
--
ALTER TABLE `hb_equipo`
  ADD CONSTRAINT `hb_equipo_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `hb_roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hb_equipo_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hb_eventos`
--
ALTER TABLE `hb_eventos`
  ADD CONSTRAINT `hb_eventos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `hb_home`
--
ALTER TABLE `hb_home`
  ADD CONSTRAINT `hb_home_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `hb_like_dj`
--
ALTER TABLE `hb_like_dj`
  ADD CONSTRAINT `hb_like_dj_ibfk_1` FOREIGN KEY (`id_dj`) REFERENCES `hb_djs` (`id`),
  ADD CONSTRAINT `hb_like_dj_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `hb_like_perfil`
--
ALTER TABLE `hb_like_perfil`
  ADD CONSTRAINT `hb_like_perfil_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `hb_perfil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hb_like_perfil_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `hb_loteria_registros`
--
ALTER TABLE `hb_loteria_registros`
  ADD CONSTRAINT `hb_loteria_registros_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `hb_noticias`
--
ALTER TABLE `hb_noticias`
  ADD CONSTRAINT `hb_noticias_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hb_panel`
--
ALTER TABLE `hb_panel`
  ADD CONSTRAINT `hb_panel_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `hb_perfil`
--
ALTER TABLE `hb_perfil`
  ADD CONSTRAINT `hb_perfil_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hb_peticiones`
--
ALTER TABLE `hb_peticiones`
  ADD CONSTRAINT `hb_peticiones_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `hb_placas_usuarios`
--
ALTER TABLE `hb_placas_usuarios`
  ADD CONSTRAINT `hb_placas_usuarios_ibfk_1` FOREIGN KEY (`id_placa`) REFERENCES `hb_placas` (`id`),
  ADD CONSTRAINT `hb_placas_usuarios_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `hb_sweets`
--
ALTER TABLE `hb_sweets`
  ADD CONSTRAINT `hb_sweets_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hb_vacantes_registro`
--
ALTER TABLE `hb_vacantes_registro`
  ADD CONSTRAINT `hb_vacantes_registro_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `hb_votos_perfil`
--
ALTER TABLE `hb_votos_perfil`
  ADD CONSTRAINT `hb_votos_perfil_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `hb_perfil` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hb_votos_perfil_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
