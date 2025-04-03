-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 27, 2025 at 05:31 PM
-- Server version: 5.7.39-- PHP Version: 7.4.33

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
  `token` varchar(100) DEFAULT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `blog_category` varchar(80) NOT NULL,
  `blog_img` varchar(80) DEFAULT NULL,
  `date_posted` date NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `token`, `title`, `content`, `blog_category`, `blog_img`, `date_posted`, `date_created`) VALUES
(3, '$2y$10$sBSIu.cul87deEs0vdvc.OYRzweVIFbPq5d8/g9smAWe6pA/6cLEu', 'Faruq is a student with Visa', '<p><strong>Top 10 Travel Destinations for Nigerians in 2025</strong></p><p>Traveling is an exciting experience that broadens the mind, introduces new cultures, and creates lifelong memories. For Nigerians looking to explore the world in 2025, there are several destinations that offer breathtaking landscapes, rich history, and unforgettable experiences. Whether you seek adventure, relaxation, or cultural immersion, this list of the <strong>top 10 travel destinations for Nigerians in 2025</strong> will help you plan your next getaway.</p><h2>1. <strong>United Arab Emirates (Dubai &amp; Abu Dhabi)</strong></h2><p>Dubai remains a favorite destination for Nigerians due to its luxury shopping, towering skyscrapers, and vibrant nightlife. In 2025, it continues to be an excellent choice for those looking for adventure and relaxation. From the <strong>Burj Khalifa</strong> to the <strong>Dubai Mall</strong> and the mesmerizing <strong>Desert Safari</strong>, Dubai offers a mix of modern and traditional experiences. Abu Dhabi, home to the stunning <strong>Sheikh Zayed Grand Mosque</strong>, offers a more cultural side of the UAE.</p><p><strong>Travel Tip:</strong> Nigerians can apply for a UAE visa through tour operators or directly online.</p><h2>2. <strong>United Kingdom (London, Manchester, Birmingham)</strong></h2><p>The UK is one of the most visited destinations by Nigerians, thanks to its historical landmarks, prestigious universities, and vibrant multicultural atmosphere. London, with attractions like <strong>Buckingham Palace, Big Ben, and the London Eye</strong>, is a top choice. For football lovers, Manchester and Birmingham offer the chance to experience live football matches.</p><p><strong>Travel Tip:</strong> Ensure you start your UK visa application early as processing times can vary.</p><h2>3. <strong>Ghana (Accra, Cape Coast, Kumasi)</strong></h2><p>For Nigerians looking for a close-to-home getaway, Ghana offers warm hospitality and rich history. Accra’s beaches, Cape Coast’s historical sites like <strong>Elmina Castle</strong>, and Kumasi’s <strong>cultural heritage of the Ashanti Kingdom</strong> make Ghana an attractive destination.</p><p><strong>Travel Tip:</strong> Nigerians do not need a visa to visit Ghana, making it an easy and affordable choice.</p><h2>4. <strong>South Africa (Cape Town, Johannesburg, Durban)</strong></h2><p>&nbsp;</p>', 'Adventure', 'uploads/blog_image/img3.png', '2025-02-14', '2025-02-27 16:39:51'),
(4, '$2y$10$B1qEEgBJuUse23ij47VTV.kSck7n9yizHJJgpCX1dxRFILYiV7zSK', 'Emmanuel the JJC', '<p><strong>Travel Tip:</strong> Ensure you start your UK visa application early as processing times can vary.</p><h2>3. <strong>Ghana (Accra, Cape Coast, Kumasi)</strong></h2><p>For Nigerians looking for a close-to-home getaway, Ghana offers warm hospitality and rich history. Accra’s beaches, Cape Coast’s historical sites like <strong>Elmina Castle</strong>, and Kumasi’s <strong>cultural heritage of the Ashanti Kingdom</strong> make Ghana an attractive destination.</p><p><strong>Travel Tip:</strong> Nigerians do not need a visa to visit Ghana, making it an easy and affordable choice.</p><h2>4. <strong>South Africa (Cape Town, Johannesburg, Durban)</strong></h2><p>&nbsp;</p><p>\', \'Adventure\',\'2025-02-14\', \'$2y$10$1E2eYPXNnIPBVWHV88lcRuX/TaCNjzwKc4ab7IZ414lm687j5gAWK\')</p>', 'Adventure', 'uploads/blog_image/img4.png', '2025-02-27', '2025-02-27 16:40:30'),
(5, '$2y$10$LBOoovZTpU/42QMAsbIOLe0tGjJeWyKvdyGXbSr3pT0ByFbbe7x2m', 'Top Travel in Nigeria 2', '<h2>1. <strong>United Arab Emirates (Dubai &amp; Abu Dhabi)</strong></h2><p>Dubai remains a favorite destination for Nigerians due to its luxury shopping, towering skyscrapers, and vibrant nightlife. In 2025, it continues to be an excellent choice for those looking for adventure and relaxation. From the <strong>Burj Khalifa</strong> to the <strong>Dubai Mall</strong> and the mesmerizing <strong>Desert Safari</strong>, Dubai offers a mix of modern and traditional experiences. Abu Dhabi, home to the stunning <strong>Sheikh Zayed Grand Mosque</strong>, offers a more cultural side of the UAE.</p><p><strong>Travel Tip:</strong> Nigerians can apply for a UAE visa through tour operators or directly online.</p><h2>2. <strong>United Kingdom (London, Manchester, Birmingham)</strong></h2><p>The UK is one of the most visited destinations by Nigerians, thanks to its historical landmarks, prestigious universities, and vibrant multicultural atmosphere. London, with attractions like <strong>Buckingham Palace, Big Ben, and the London Eye</strong>, is a top choice. For football lovers, Manchester and Birmingham offer the chance to experience live football matches.</p><p><strong>Travel Tip:</strong> Ensure you start your UK visa application early as processing times can vary.</p><h2>3. <strong>Ghana (Accra, Cape Coast, Kumasi)</strong></h2><p>For Nigerians looking for a close-to-home getaway, Ghana offers warm hospitality and rich history. Accra’s beaches, Cape Coast’s historical sites like <strong>Elmina Castle</strong>, and Kumasi’s <strong>cultural heritage of the Ashanti Kingdom</strong> make Ghana an attractive destination.</p><p><strong>Travel Tip:</strong> Nigerians do not need a visa to visit Ghana, making it an easy and affordable choice.</p><h2>4. <strong>South Africa (Cape Town, Johannesburg, Durban)</strong></h2><p>&nbsp;</p>', 'Cultural', 'uploads/blog_image/img.png', '2025-03-01', '2025-02-27 16:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(100) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `date_created`) VALUES
(1, 'Adventure', '2025-02-27 16:25:17'),
(2, 'Destination', '2025-02-27 16:25:22'),
(3, 'Cultural', '2025-02-27 16:25:32'),
(4, 'Solo Travel', '2025-02-27 16:25:36'),
(5, 'Holidays', '2025-02-27 16:31:58');

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
(8, 'Jeddha', '245000', '<p>Jeddha</p>', 'uploads/product_form_image/img8.png', NULL, NULL, '$2y$10$KfehHLNQEFVe3erOsfGQe.R84Qah3THS7GgIPTpgcN0VZxZv1HHsC');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;
