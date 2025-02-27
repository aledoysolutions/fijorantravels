-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2025 at 05:10 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `fijorant_travels`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
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
  `dateModified` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `firstname`, `lastname`, `email`, `phone`, `username`, `privilege`, `password`, `salt`, `status`, `token`, `dateCreated`, `dateModified`) VALUES
(1, 'John', 'Akerele', 'akerelejohn6@gmail.com', '08130619499', 'akerelejohn6@gmail.com', 'Super Admin', '$2y$10$xbcrhcf6rDkzcjaP1yTvreN21kQ5qUmIlr/Rvt6FYBICPjpepnjiC', '$2y$10$cAt5NIwPPWJF.rFcYf9ENuzStKxKlpVrzHomLfHEGzIkF78.kQrmO', 'active', '$2y$10$thDjYH9d9YU/r.znp/J8Oesbvisxhdjwi735PWOOjFkJlNyNIKoJq', '2023-07-27', '2024-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(10) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `blog_location` varchar(80) NOT NULL,
  `blog_img` varchar(80) NOT NULL,
  `date_posted` date NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `token`, `title`, `content`, `blog_location`, `blog_img`, `date_posted`, `date_created`) VALUES
(1, '$2y$10$TKq8fAgIGZDS3fC8r2dCpOJ80JI7x1k7oXex1RbKMXLre1ELox.J6', 'Canada 5 days free visa', '<p>canada is giving a free visa</p>', 'canada', 'uploads/blog_image/img1.jpg', '2002-02-17', '2025-02-26 15:14:23'),
(2, '$2y$10$wSs49P1tLdHZjHy91q/k1.cQpmlpnFRq8jdy2E43Q4QBeO9jHL1uK', 'PHP', '<p>Aledoy has started its tech talent</p>', 'Aledoy', 'uploads/blog_image/img2.jpg', '2000-02-19', '2025-02-26 15:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(100) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `destinationLocation` varchar(50) DEFAULT NULL,
  `image_path` varchar(100) DEFAULT NULL,
  `image_path2` varchar(100) DEFAULT NULL,
  `image_path3` varchar(100) DEFAULT NULL,
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `destination`, `price`, `destinationLocation`, `image_path`, `image_path2`, `image_path3`, `token`) VALUES
(6, 'Maldives Beach', '70000', '<p>Labuan Bajo, United Kingdom</p>', 'uploads/product_form_image/img6.png', 'uploads/product_form_image/img26.png', 'uploads/product_form_image/img36.png', '$2y$10$/uzSbQTD/roWcxby3ubmMuwPI5kpySiQljnxlDFN8V1d00qu/8Hs.'),
(7, 'Medina', '350000', '<p>Doha</p>', 'uploads/product_form_image/img7.png', NULL, NULL, '$2y$10$UlnKMEk0JDS..Dr6nfYUE.AN/I41Gn3jBIxzvF32HA1UhkJSZnab6'),
(8, 'Jeddha', '245000', '<p>Jeddha</p>', 'uploads/product_form_image/img8.png', NULL, NULL, '$2y$10$KfehHLNQEFVe3erOsfGQe.R84Qah3THS7GgIPTpgcN0VZxZv1HHsC'),
(9, '5 nights in Dubai', '250000', '<p>fvwsdfvsdfvsdf</p>', 'uploads/product_form_image/img9.jpg', NULL, NULL, '$2y$10$4VVDJj.xcDWnsMO/qWBTKO.NxIWYI5Wy1y1CdFEBP2Qlx0MoRxwhG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;
