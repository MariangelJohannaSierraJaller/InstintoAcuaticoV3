# InstintoAcuaticoa

![Instinto Acutico](https://instintoacuatico.herokuapp.com/assets/img/hero-img.png)

### Base de Datos 
---
    SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
    START  TRANSACTION;
    SET time_zone = "+00:00";
    
    CREATE  TABLE  `usuarios` (
    `id`  int(11) NOT  NULL,
    `email`  varchar(60) COLLATE utf8mb4_unicode_ci NOT  NULL,
    `name`  varchar(30) COLLATE utf8mb4_unicode_ci NOT  NULL,
    `lastname`  varchar(60) COLLATE utf8mb4_unicode_ci NOT  NULL,
    `phone`  varchar(12) COLLATE utf8mb4_unicode_ci NOT  NULL,
    `direction`  varchar(60) COLLATE utf8mb4_unicode_ci NOT  NULL,
    `password`  varchar(120) COLLATE utf8mb4_unicode_ci NOT  NULL,
    `type`  int(11) NOT  NULL COMMENT '0:default 1:Administrador'
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
    
    ALTER  TABLE  `usuarios`
    ADD  PRIMARY  KEY (`id`);
    
    ALTER  TABLE  `usuarios`
    MODIFY  `id`  int(11) NOT  NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
    COMMIT;

 ### Instrucciones
---

 1. Copiar el codigo y guardarlo con la Extension ***SQL***
 2. Iniciar los servicios de Apache y MySQL en XAMPP
 3. Ir a el localhost: http://localhost/phpmyadmin/
 4. Seleccionar **Nueva** en el panel lateral de ***phpMyAdmin***
 5. Colocar los siguientes Datos: 
--		       **Nombre de la base de Datos:** instintoacuatico
--		       **Cotejamiento:** utf8mb4_unicode_ci
 5. Le damos en **Crear**
 6. Abrimos la Base de Datos
 7. Le damo en Importar
 8. Seleccionar Archivo y Subes el archivo
 9. En la parte inferior dar click en continuar
 
 *Listo, ya puedes ejecutar localmente esta pagina web*

 ### Informacion de la Base de Datos
 ---
 -- phpMyAdmin SQL Dump
 
-- version 5.1.1

-- [https://www.phpmyadmin.net/](https://www.phpmyadmin.net/)

-- Servidor: 127.0.0.1

-- Tiempo de generación: 23-07-2021 a las 00:36:41

-- Versión del servidor: 10.4.20-MariaDB

-- Versión de PHP: 8.0.8


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

---
-- Base de datos: `instintoacuatico`

-- Estructura de tabla para la tabla `usuarios`

-- Índices para tablas volcadas

-- Indices de la tabla `usuarios`

-- AUTO_INCREMENT de las tablas volcadas

-- AUTO_INCREMENT de la tabla `usuarios`

---
 /*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/*hola*/
/*hi*/

