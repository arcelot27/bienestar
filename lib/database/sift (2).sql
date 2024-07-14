-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2024 a las 17:11:14
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
-- Base de datos: `sift`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `id_apre` int(11) NOT NULL,
  `name_apre` varchar(100) NOT NULL,
  `ape_apre` varchar(100) NOT NULL,
  `tipo_docu_apre` varchar(20) NOT NULL,
  `dni_apre` varchar(20) NOT NULL,
  `edad_apre` int(11) NOT NULL,
  `esta_civil_apre` varchar(50) NOT NULL,
  `sexo_apre` varchar(20) NOT NULL,
  `iden_gene_apre` varchar(50) DEFAULT NULL,
  `grup_etn_apre` varchar(50) NOT NULL,
  `grup_etn_cual_apre` varchar(100) DEFAULT NULL,
  `estr_apre` int(11) NOT NULL,
  `zona_resi_apre` varchar(100) NOT NULL,
  `lugar_resi_apre` varchar(100) NOT NULL,
  `vivie_apre` varchar(50) NOT NULL,
  `servicios_publicos_apre` text DEFAULT NULL,
  `tiempo_libre_apre` text DEFAULT NULL,
  `hijos_apre` int(11) NOT NULL,
  `embarazo_apre` varchar(10) NOT NULL,
  `control_prenatal_apre` varchar(10) DEFAULT NULL,
  `diag_medico_apre` varchar(100) DEFAULT NULL,
  `diag_medico_cual_apre` varchar(100) DEFAULT NULL,
  `medica_apre` varchar(100) DEFAULT NULL,
  `medica_cual_apre` varchar(100) DEFAULT NULL,
  `limitaciones_apre` text DEFAULT NULL,
  `antecedentes_familiares_apre` text DEFAULT NULL,
  `antecedentes_familiares_otro_apre` text DEFAULT NULL,
  `numero_celular_apre` varchar(20) NOT NULL,
  `correo_apre` varchar(100) NOT NULL,
  `numero_ficha_apre` varchar(20) NOT NULL,
  `jornada_apre` varchar(50) NOT NULL,
  `contac_emergen_apre` varchar(100) NOT NULL,
  `numero_contac_emergen_apre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `aprendiz`
--

INSERT INTO `aprendiz` (`id_apre`, `name_apre`, `ape_apre`, `tipo_docu_apre`, `dni_apre`, `edad_apre`, `esta_civil_apre`, `sexo_apre`, `iden_gene_apre`, `grup_etn_apre`, `grup_etn_cual_apre`, `estr_apre`, `zona_resi_apre`, `lugar_resi_apre`, `vivie_apre`, `servicios_publicos_apre`, `tiempo_libre_apre`, `hijos_apre`, `embarazo_apre`, `control_prenatal_apre`, `diag_medico_apre`, `diag_medico_cual_apre`, `medica_apre`, `medica_cual_apre`, `limitaciones_apre`, `antecedentes_familiares_apre`, `antecedentes_familiares_otro_apre`, `numero_celular_apre`, `correo_apre`, `numero_ficha_apre`, `jornada_apre`, `contac_emergen_apre`, `numero_contac_emergen_apre`) VALUES
(1, 'Esteban', 'Cordoba', 'CC', '1081393980', 19, 'SOLTERO(A)', 'MASCULINO', 'Amo supremo del mundo', 'SI', 'Esclavo', 0, 'URBANA', 'La Plata-Huila', 'PROPIA', 'ENERGIA,GAS,AGUA,ALCANTARILLADO,INTERNET', 'PASAR TIEMPO EN FAMILIA,ESTUDIAR,JUGAR', 0, 'NO', 'NO', 'SI', 'Amor', 'NO', 'EX', 'NINGUNO', 'NINGUNA', 'AS', '3105508404', 'calderonestebanwf@gmail.com', '2502636', 'Mañana', 'Mama', '3105508404'),
(2, 'Arturo', 'Cordoba', 'CC', '1075791343', 19, 'SOLTERO(A)', 'MASCULINO', 'Amo supremo del mundo', 'SI', 'Esclavo', 0, 'URBANA', 'La Plata-Huila', 'PROPIA', 'ENERGIA,GAS,AGUA,ALCANTARILLADO,INTERNET', 'PASAR TIEMPO EN FAMILIA,ESTUDIAR,JUGAR', 0, 'NO', 'NO', 'SI', 'Amor', 'NO', 'EX', 'NINGUNO', 'NINGUNA', 'AS', '3105508404', 'calderonestebanwf@gmail.com', '2901350', 'tarde', 'Mama', '3105508404'),
(3, 'Esteban', 'Cordoba', 'CC', '1081393980', 19, 'SOLTERO(A)', 'MASCULINO', 'Amo supremo del mundo', 'SI', 'Esclavo', 0, 'URBANA', 'La Plata-Huila', 'PROPIA', 'ENERGIA,GAS,AGUA,ALCANTARILLADO,INTERNET', 'PASAR TIEMPO EN FAMILIA,ESTUDIAR,JUGAR', 0, 'NO', 'NO', 'SI', 'Amor', 'NO', 'EX', 'NINGUNO', 'NINGUNA', 'AS', '3105508404', 'calderonestebanwf@gmail.com', '2502636', 'noche', 'Mama', '3105508404'),
(4, 'Esteban', 'Cordoba', 'CC', '1081393980', 19, 'SOLTERO(A)', 'MASCULINO', 'Amo supremo del mundo', 'SI', 'Esclavo', 0, 'URBANA', 'La Plata-Huila', 'PROPIA', 'ENERGIA,GAS,AGUA,ALCANTARILLADO,INTERNET', 'PASAR TIEMPO EN FAMILIA,ESTUDIAR,JUGAR', 0, 'NO', 'NO', 'SI', 'Amor', 'NO', 'EX', 'NINGUNO', 'NINGUNA', 'AS', '3105508404', 'calderonestebanwf@gmail.com', '2502636', 'Mañana', 'Mama', '3105508404');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delegados`
--

CREATE TABLE `delegados` (
  `id_del_pk` int(11) NOT NULL,
  `user_del` varchar(25) NOT NULL,
  `pasw_del` varchar(25) NOT NULL,
  `roll_del` int(6) NOT NULL,
  `name_del` varchar(25) NOT NULL,
  `apelli_del` varchar(25) NOT NULL,
  `tipo_documen_del` varchar(25) NOT NULL,
  `dni_del` int(10) NOT NULL,
  `tel_del` int(10) NOT NULL,
  `email_del` varchar(25) NOT NULL,
  `email_inst_del` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `delegados`
--

INSERT INTO `delegados` (`id_del_pk`, `user_del`, `pasw_del`, `roll_del`, `name_del`, `apelli_del`, `tipo_documen_del`, `dni_del`, `tel_del`, `email_del`, `email_inst_del`) VALUES
(1, 'admin123', 'admin123', 8, 'arturo', '', '', 0, 0, '', ''),
(2, 'enfe123', 'enfe123', 4, 'Yesica', 'as', '', 0, 2132454545, 'dasdas@dsadas', 'sadasda@gasda.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamiz_psico`
--

CREATE TABLE `tamiz_psico` (
  `id_taz` int(11) NOT NULL,
  `id_apre` int(11) NOT NULL,
  `sustancias_psicoactivas_taz` enum('SI','NO') NOT NULL,
  `sustancias_psicoactivas_cual_taz` varchar(100) DEFAULT NULL,
  `bebidas_alcoholicas_taz` enum('SI','NO','EN OCASIONES') NOT NULL,
  `enfermedad_mental_taz` enum('SI','NO') NOT NULL,
  `triste_ultimo_mes_taz` enum('SI','NO') NOT NULL,
  `triste_ultimo_mes_por_que_taz` varchar(255) DEFAULT NULL,
  `con_quien_vive_taz` enum('FAMILIA NUCLEARES','FAMILIA EXTENSOS','FAMILIA COMPUESTA','FAMILIARES SIN NÚCLEO','HOGARES NO FAMILIARES SIN NÚCLEO') NOT NULL,
  `relacion_personas_taz` enum('BUENA','MALA','REGULAR') DEFAULT NULL,
  `medio_transporte_taz` enum('MOTOCICLETA','BICICLETA','CAMINANDO','SERVICIO PUBLICO','OTRO') NOT NULL,
  `medio_transporte_otro_taz` varchar(100) DEFAULT NULL,
  `origen_ingresos_taz` enum('PADRES','TRABAJO','PROGRAMAS DEL ESTADO','NINGUNO','OTRO') NOT NULL,
  `origen_ingresos_otro_taz` varchar(100) DEFAULT NULL,
  `apoyo_familiar_taz` enum('SI','NO') NOT NULL,
  `tipo_apoyo_taz` set('ECONOMICO','EMOCIONAL','ACADEMICO','NINGUNO') DEFAULT NULL,
  `dificultad_ultimo_mes_taz` enum('SI','NO') NOT NULL,
  `dificultad_ultimo_mes_cual_taz` varchar(100) DEFAULT NULL,
  `ayuda_problema_taz` enum('PADRES','ALGUN FAMILIAR','AMIGO O AMIGA','PAREJA','NADIE','OTRO') NOT NULL,
  `ayuda_problema_otro_taz` varchar(100) DEFAULT NULL,
  `aprobacion_padres_taz` enum('SI','NO') NOT NULL,
  `satisfaccion_titulacion_taz` enum('SI','NO') NOT NULL,
  `satisfaccion_titulacion_por_que_taz` varchar(255) DEFAULT NULL,
  `dificultad_adaptarse_taz` enum('SI','NO') NOT NULL,
  `interrelacion_instructores_taz` enum('BUENA','MALA','REGULAR') NOT NULL,
  `relacion_compañeros_taz` enum('BUENA','MALA','REGULAR') NOT NULL,
  `observaciones_taz` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamiz_salud`
--

CREATE TABLE `tamiz_salud` (
  `id_taz` int(11) NOT NULL,
  `name_taz` varchar(50) NOT NULL,
  `id_apre` int(11) NOT NULL,
  `ult_examen_fisico_taz` varchar(30) NOT NULL,
  `cirugia_taz` enum('SI','NO') NOT NULL,
  `cirugia_cual_taz` varchar(100) DEFAULT NULL,
  `sintomas_inusuales_taz` enum('SI','NO') NOT NULL,
  `sintomas_inusuales_cual_taz` varchar(100) DEFAULT NULL,
  `convulsiones_taz` enum('SI','NO') NOT NULL,
  `sustancias_psicoactivas_taz` enum('SI','NO') NOT NULL,
  `sustancias_psicoactivas_cual_taz` varchar(100) DEFAULT NULL,
  `bebidas_alcoholicas_taz` enum('SI','NO','EN OCASIONES') NOT NULL,
  `presion_arterial_taz` varchar(20) NOT NULL,
  `frecuencia_cardiaca_taz` varchar(20) NOT NULL,
  `frecuencia_respiratoria_taz` varchar(20) NOT NULL,
  `saturacion_taz` varchar(20) NOT NULL,
  `temperatura_taz` varchar(20) NOT NULL,
  `peso_taz` varchar(20) NOT NULL,
  `talla_taz` varchar(20) NOT NULL,
  `observaciones_taz` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tamiz_salud`
--

INSERT INTO `tamiz_salud` (`id_taz`, `name_taz`, `id_apre`, `ult_examen_fisico_taz`, `cirugia_taz`, `cirugia_cual_taz`, `sintomas_inusuales_taz`, `sintomas_inusuales_cual_taz`, `convulsiones_taz`, `sustancias_psicoactivas_taz`, `sustancias_psicoactivas_cual_taz`, `bebidas_alcoholicas_taz`, `presion_arterial_taz`, `frecuencia_cardiaca_taz`, `frecuencia_respiratoria_taz`, `saturacion_taz`, `temperatura_taz`, `peso_taz`, `talla_taz`, `observaciones_taz`) VALUES
(2, 'prueba', 2, 'CUATRO A SEIS MESES', 'NO', '', 'NO', '', 'NO', 'NO', '', 'EN OCASIONES', '20', '20', '20', '20', '30', '30', '7', 'sa'),
(3, 'prueba', 2, 'CUATRO A SEIS MESES', 'NO', '', 'NO', '', 'NO', 'NO', '', 'EN OCASIONES', '20', '20', '20', '20', '30', '30', '7', 'sa'),
(4, 'prueba', 2, 'CUATRO A SEIS MESES', 'NO', '', 'NO', '', 'NO', 'NO', '', 'EN OCASIONES', '20', '20', '20', '20', '30', '30', '7', 'sa'),
(5, 'prueba', 2, 'CUATRO A SEIS MESES', 'NO', '', 'NO', '', 'NO', 'NO', '', 'EN OCASIONES', '20', '20', '20', '20', '30', '30', '7', 'sa'),
(6, 'prueba', 2, 'CUATRO A SEIS MESES', 'NO', '', 'NO', '', 'NO', 'NO', '', 'EN OCASIONES', '20', '20', '20', '20', '30', '30', '7', 'sa'),
(7, 'prueba', 2, 'CUATRO A SEIS MESES', 'NO', '', 'NO', '', 'NO', 'NO', '', 'EN OCASIONES', '20', '20', '20', '20', '30', '30', '7', 'sa'),
(8, 'prueba', 2, 'CUATRO A SEIS MESES', 'NO', '', 'NO', '', 'NO', 'NO', '', 'EN OCASIONES', '20', '20', '20', '20', '30', '30', '7', 'sa'),
(9, 'prueba', 2, 'CUATRO A SEIS MESES', 'NO', '', 'NO', '', 'NO', 'NO', '', 'EN OCASIONES', '20', '20', '20', '20', '30', '30', '7', 'sa'),
(10, 'prueba2', 2, 'HACE MENOS DE UN MES', 'NO', '', 'NO', '', 'NO', 'NO', '', 'EN OCASIONES', '20', '20', '20', '20', '30', '30', '7', 'w');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`id_apre`);

--
-- Indices de la tabla `delegados`
--
ALTER TABLE `delegados`
  ADD PRIMARY KEY (`id_del_pk`);

--
-- Indices de la tabla `tamiz_psico`
--
ALTER TABLE `tamiz_psico`
  ADD PRIMARY KEY (`id_taz`),
  ADD KEY `id_apre` (`id_apre`);

--
-- Indices de la tabla `tamiz_salud`
--
ALTER TABLE `tamiz_salud`
  ADD PRIMARY KEY (`id_taz`),
  ADD KEY `id_apre` (`id_apre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  MODIFY `id_apre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `delegados`
--
ALTER TABLE `delegados`
  MODIFY `id_del_pk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tamiz_psico`
--
ALTER TABLE `tamiz_psico`
  MODIFY `id_taz` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tamiz_salud`
--
ALTER TABLE `tamiz_salud`
  MODIFY `id_taz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tamiz_psico`
--
ALTER TABLE `tamiz_psico`
  ADD CONSTRAINT `tamiz_psico_ibfk_1` FOREIGN KEY (`id_apre`) REFERENCES `aprendiz` (`id_apre`);

--
-- Filtros para la tabla `tamiz_salud`
--
ALTER TABLE `tamiz_salud`
  ADD CONSTRAINT `tamiz_salud_ibfk_1` FOREIGN KEY (`id_apre`) REFERENCES `aprendiz` (`id_apre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
