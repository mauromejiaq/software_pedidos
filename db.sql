-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 10.1.2.122:3306
-- Tiempo de generación: 10-05-2020 a las 21:04:37
-- Versión del servidor: 10.2.31-MariaDB
-- Versión de PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u531912783_TjNY5`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Lácteos', 'Leche, Yogurt...', '2020-05-10 04:24:01', '2020-05-10 04:24:01'),
(2, 'Carnes', NULL, '2020-05-10 04:24:08', '2020-05-10 04:24:08'),
(3, 'Verduras', NULL, '2020-05-10 04:44:24', '2020-05-10 04:44:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'null',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bogotá', NULL, NULL),
(2, 'Manizales', NULL, NULL),
(3, 'Medellin', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documents`
--

INSERT INTO `documents` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Cédula', NULL, NULL),
(2, 'Cédula de extranjería', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_05_10_015212_create_categories_table', 1),
(4, '2020_05_10_0152122_create_categories_table', 2),
(5, '2020_05_10_01521_create_categories_table', 3),
(6, '2020_05_10_033403_create_products_table', 4),
(7, '2020_05_10_015211_create_categories_table', 5),
(8, '2020_05_10_0334033_create_products_table', 6),
(9, '2020_05_10_152621_create_orders_table', 7),
(10, '2020_05_10_1538_cities', 8),
(11, '2020_05_10_1526212_create_orders_table', 9),
(12, '2020_05_10_174840_create_documents_table', 10),
(13, '2020_05_10_15262122_create_orders_table', 11),
(14, '2020_05_10_181237_create_order_items_table', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_type` bigint(20) UNSIGNED DEFAULT NULL,
  `document_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_city` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `document_type`, `document_number`, `customer_firstname`, `customer_lastname`, `customer_address`, `customer_city`, `customer_email`, `created_at`, `updated_at`) VALUES
(1, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', NULL, 1, 'mauromejiaq@gmail.com', '2020-05-10 18:05:40', '2020-05-10 18:05:40'),
(2, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', NULL, 1, 'mauromejiaq@gmail.com', '2020-05-10 18:06:57', '2020-05-10 18:06:57'),
(3, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sur #70-90', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:07:34', '2020-05-10 18:07:34'),
(4, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sur #70-90', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:08:25', '2020-05-10 18:08:25'),
(5, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sur #70-90', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:08:49', '2020-05-10 18:08:49'),
(6, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sur #70-90', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:22:32', '2020-05-10 18:22:32'),
(7, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sur #70-90', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:22:55', '2020-05-10 18:22:55'),
(8, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sUR', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:23:58', '2020-05-10 18:23:58'),
(9, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sUR', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:24:22', '2020-05-10 18:24:22'),
(10, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sUR', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:24:28', '2020-05-10 18:24:28'),
(11, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sUR', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:25:07', '2020-05-10 18:25:07'),
(12, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sUR', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:25:23', '2020-05-10 18:25:23'),
(13, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sur #70-90', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:26:12', '2020-05-10 18:26:12'),
(14, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sur #70-90', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:26:40', '2020-05-10 18:26:40'),
(15, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sur #70-90', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:30:48', '2020-05-10 18:30:48'),
(16, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sur #70-90', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:37:29', '2020-05-10 18:37:29'),
(17, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sur #70-90', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:38:52', '2020-05-10 18:38:52'),
(18, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sur #70-90', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:39:13', '2020-05-10 18:39:13'),
(19, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sur #70-90', 1, 'mauromejiaq@gmail.com', '2020-05-10 18:44:24', '2020-05-10 18:44:24'),
(20, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sur #70-90', 1, 'mauromejiaq@gmail.com', '2020-05-10 19:27:23', '2020-05-10 19:27:23'),
(21, 1, '101321654', 'Mayra Alejandra', 'Velasquez', 'Calle 60 sur #70-90', 1, 'mayraalejandra@gmail.com', '2020-05-10 19:33:09', '2020-05-10 19:33:09'),
(22, 1, '1059786460', 'Andrés Mauricio', 'Quintero Mejía', 'Calle 60 sur #70-90', 1, 'mauromejiaq@gmail.com', '2020-05-10 20:38:46', '2020-05-10 20:38:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `qty`, `price`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 4, 3, 20000.00, 12, '2020-05-10 18:25:23', '2020-05-10 18:25:23'),
(2, 4, 3, 20000.00, 13, '2020-05-10 18:26:12', '2020-05-10 18:26:12'),
(3, 4, 3, 20000.00, 14, '2020-05-10 18:26:40', '2020-05-10 18:26:40'),
(4, 4, 3, 20000.00, 15, '2020-05-10 18:30:48', '2020-05-10 18:30:48'),
(5, 2, 10, 2000.00, 15, '2020-05-10 18:30:48', '2020-05-10 18:30:48'),
(6, 2, 1, 2000.00, 16, '2020-05-10 18:37:29', '2020-05-10 18:37:29'),
(7, 3, 3, 1000.00, 17, '2020-05-10 18:38:52', '2020-05-10 18:38:52'),
(8, 3, 3, 1000.00, 18, '2020-05-10 18:39:13', '2020-05-10 18:39:13'),
(9, 2, 1, 2000.00, 19, '2020-05-10 18:44:24', '2020-05-10 18:44:24'),
(10, 3, 4, 1000.00, 20, '2020-05-10 19:27:23', '2020-05-10 19:27:23'),
(11, 4, 4, 20000.00, 20, '2020-05-10 19:27:23', '2020-05-10 19:27:23'),
(12, 4, 5, 20000.00, 21, '2020-05-10 19:33:09', '2020-05-10 19:33:09'),
(13, 3, 1, 1000.00, 21, '2020-05-10 19:33:09', '2020-05-10 19:33:09'),
(14, 4, 1, 20000.00, 22, '2020-05-10 20:38:46', '2020-05-10 20:38:46'),
(15, 3, 1, 1000.00, 22, '2020-05-10 20:38:46', '2020-05-10 20:38:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(2, 'Leche 1 litro', 'Prueba de una descripción', 1, 2000.00, 0, '2020-05-10 04:43:32', '2020-05-10 18:44:24'),
(3, 'Tomates', 'Prueba de una descripción para tomates', 3, 1000.00, 1, '2020-05-10 04:44:30', '2020-05-10 20:38:46'),
(4, 'Pollo Congelado', 'Prueba de una descripción', 2, 20000.00, 20, '2020-05-10 17:02:23', '2020-05-10 20:38:46');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_city_foreign` (`customer_city`),
  ADD KEY `orders_document_type_foreign` (`document_type`);

--
-- Indices de la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_city_foreign` FOREIGN KEY (`customer_city`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `orders_document_type_foreign` FOREIGN KEY (`document_type`) REFERENCES `documents` (`id`);

--
-- Filtros para la tabla `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
