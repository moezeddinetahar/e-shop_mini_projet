-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 23 mai 2024 à 14:14
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mz_shoop`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `pid` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(800) NOT NULL,
  `price` int NOT NULL,
  `quantity` int NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `pid`, `name`, `description`, `price`, `quantity`, `image`) VALUES
(28, 3, 10, 'phone', 'iphone', 1000, 1, 'phone.png'),
(29, 3, 11, 'camera', 'nikon', 2000, 1, 'nikon.png');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` varchar(12) NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 0, 'test', 'test@test.com', '999', 'test');

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `name` varchar(20) NOT NULL,
  `number` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `method` varchar(50) NOT NULL,
  `address` varchar(500) NOT NULL,
  `total_products` varchar(1000) NOT NULL,
  `total_price` int NOT NULL,
  `placed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `payment_status` varchar(20) NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `number`, `email`, `method`, `address`, `total_products`, `total_price`, `placed_on`, `payment_status`) VALUES
(8, 3, '', '', 'test@test.com', 'cash on delivery', 'test', 'yu (123 x 5) - name99 (100 x 1) - camera (2000 x 1) - phone (1000 x 8) - ', 10715, '2024-04-22 21:00:59', 'completed'),
(9, 3, 'test', '999', 'test@test.com', 'credit card', 'test', 'yu (123 x 1) - ', 123, '2024-04-22 21:02:48', 'pending'),
(10, 3, 'test', '999', 'test@test.com', 'credit card', 'test', 'yu (123 x 1) - camera (2000 x 1) - ', 2123, '2024-04-23 11:35:31', 'pending'),
(12, 3, 'test', '999', 'test@test.com', 'cash on delivery', 'test', 'phone (1000 x 2) - ', 2000, '2024-04-23 12:45:44', 'completed'),
(13, 3, 'test', '999', 'test@test.com', 'paytm', 'test', 'phone (1000 x 10) - ', 10000, '2024-04-28 12:02:48', 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `price` int NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` varchar(800) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`, `description`) VALUES
(10, 'phone', 'Mobile Phone', 1000, 'phone.png', 'iphone'),
(11, 'camera', 'Cameras', 2000, 'nikon.png', 'nikon');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_german2_ci DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_german2_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `address_line1` varchar(50) COLLATE utf8mb4_german2_ci DEFAULT NULL,
  `address_line2` varchar(50) COLLATE utf8mb4_german2_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_german2_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8mb4_german2_ci DEFAULT NULL,
  `postcode` varchar(20) COLLATE utf8mb4_german2_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_german2_ci DEFAULT NULL,
  `additional_info` text COLLATE utf8mb4_german2_ci,
  `home_phone` varchar(20) COLLATE utf8mb4_german2_ci DEFAULT NULL,
  `mobile_phone` varchar(20) COLLATE utf8mb4_german2_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(500) COLLATE utf8mb4_german2_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `title`, `first_name`, `last_name`, `email`, `password`, `dob`, `address_line1`, `address_line2`, `city`, `state`, `postcode`, `country`, `additional_info`, `home_phone`, `mobile_phone`, `created_at`, `address`) VALUES
(1, '', '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '0000-00-00', '', '', '', NULL, '', '', 'Additional information', '', '', '2024-04-19 22:43:34', ''),
(2, '1', 'm', 'm', 'm', '6b0d31c0d563223024da45691584643ac78c96e8', '1940-01-02', 'm', 'm', 'm', NULL, 'm', '1', 'Additional information', '7', '8', '2024-04-19 22:47:52', ''),
(3, '1', 'test', 'test', 'test@test.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '1940-01-01', 'test', 'test', 'test', NULL, 'test', '1', 'test', '999', '999', '2024-04-20 19:36:08', 'l, l, ll, l, l, l, l - 1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
