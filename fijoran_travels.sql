-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2025 at 03:46 PM
-- Server version: 8.3.0
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fijorant_travels`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

DROP TABLE IF EXISTS `admin_login`;
CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `privilege` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `salt` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `token` text NOT NULL,
  `dateCreated` date NOT NULL,
  `dateModified` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `firstname`, `lastname`, `email`, `phone`, `username`, `privilege`, `password`, `salt`, `status`, `token`, `dateCreated`, `dateModified`) VALUES
(1, 'John', 'Akerele', 'akerelejohn6@gmail.com', '08130619499', 'akerelejohn6@gmail.com', 'Super Admin', '$2y$10$xbcrhcf6rDkzcjaP1yTvreN21kQ5qUmIlr/Rvt6FYBICPjpepnjiC', '$2y$10$cAt5NIwPPWJF.rFcYf9ENuzStKxKlpVrzHomLfHEGzIkF78.kQrmO', 'active', '$2y$10$thDjYH9d9YU/r.znp/J8Oesbvisxhdjwi735PWOOjFkJlNyNIKoJq', '2023-07-27', '2024-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `destination` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `destinationLocation` varchar(50) DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  `image_path2` varchar(100) DEFAULT NULL,
  `image_path3` varchar(100) DEFAULT NULL,
  `token` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `destination`, `price`, `destinationLocation`, `image_path`, `image_path2`, `image_path3`, `token`) VALUES
(6, 'Maldives Beach', '70000', '<p>Labuan Bajo, United Kingdom</p>', 'uploads/product_form_image/img6.png', 'uploads/product_form_image/img26.png', 'uploads/product_form_image/img36.png', '$2y$10$/uzSbQTD/roWcxby3ubmMuwPI5kpySiQljnxlDFN8V1d00qu/8Hs.'),
(7, 'Medina', '350000', '<p>Doha</p>', 'uploads/product_form_image/img7.png', NULL, NULL, '$2y$10$UlnKMEk0JDS..Dr6nfYUE.AN/I41Gn3jBIxzvF32HA1UhkJSZnab6'),
(8, 'Jeddha', '245000', '<p>Jeddha</p>', 'uploads/product_form_image/img8.png', NULL, NULL, '$2y$10$KfehHLNQEFVe3erOsfGQe.R84Qah3THS7GgIPTpgcN0VZxZv1HHsC');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
