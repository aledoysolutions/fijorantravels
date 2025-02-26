-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 26, 2025 at 12:29 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `title` varchar(150) NOT NULL,
  `content` blob NOT NULL,
  `location` varchar(80) NOT NULL,
  `blog_img` varchar(80) NOT NULL,
  `date_posted` date NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;
