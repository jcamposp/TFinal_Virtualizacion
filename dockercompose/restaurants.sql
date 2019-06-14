-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 09, 2019 at 05:49 PM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jcampos`
--

-- --------------------------------------------------------

--
-- Table structure for table `Comment`
--

CREATE TABLE `Comment` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  `dateTime` datetime NOT NULL,
  `isValidated` tinyint(1) NOT NULL DEFAULT '0',
  `userId` int(11) NOT NULL,
  `restaurantId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Comment`
--

INSERT INTO `Comment` (`id`, `comment`, `rating`, `dateTime`, `isValidated`, `userId`, `restaurantId`) VALUES
(1, 'AWESOME! Nice place to eat with kids and my grandmother. We all enjoy the food. We will come back!', 5, '2019-02-20 09:38:30', 1, 6, 5),
(2, 'I dinner here with my husband in my last day in Majorca. I enjoy the food, very tasty.\r\nThe only thing that I can say is that the service was a little slow, but I love the place.', 4, '2019-02-20 14:09:13', 1, 5, 2),
(3, 'GOOD FOOD!', 5, '2019-02-22 10:24:06', 1, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `CuisineType`
--

CREATE TABLE `CuisineType` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `CuisineType`
--

INSERT INTO `CuisineType` (`id`, `name`) VALUES
(1, 'African'),
(2, 'Albanian'),
(3, 'Algerian'),
(4, 'American'),
(5, 'Arabic'),
(6, 'Argentinean'),
(7, 'Armenian'),
(8, 'Asian'),
(9, 'Australian'),
(10, 'Austrian'),
(11, 'Bahamian'),
(12, 'Balti'),
(13, 'Bangladeshi'),
(14, 'Bar'),
(15, 'Barbecue'),
(16, 'Basque'),
(17, 'Belgian'),
(18, 'Brazilian'),
(19, 'Brew Pub'),
(20, 'British'),
(21, 'Cafe'),
(22, 'Cajun & Creole'),
(23, 'Cantonese'),
(24, 'Caribbean'),
(25, 'Central American'),
(26, 'Central Asian'),
(27, 'Central European'),
(28, 'Chinese'),
(29, 'Colombian'),
(30, 'Contemporary'),
(31, 'Cuban'),
(32, 'Danish'),
(33, 'Deli'),
(34, 'Diner'),
(35, 'Dutch'),
(36, 'Eastern European'),
(37, 'Ecuadorean'),
(38, 'European'),
(39, 'Fast Food'),
(40, 'Filipino'),
(41, 'French'),
(42, 'Fusion'),
(43, 'Gastropub'),
(44, 'German'),
(45, 'Greek'),
(46, 'Grill'),
(47, 'Hawaiian'),
(48, 'Healthy'),
(49, 'Hong Kong'),
(50, 'Imperial Chinese'),
(51, 'Indian'),
(52, 'Indonesian'),
(53, 'International'),
(54, 'Irish'),
(55, 'Israeli'),
(56, 'Italian'),
(57, 'Japanese'),
(58, 'Korean'),
(59, 'Latin'),
(60, 'Lebanese'),
(61, 'Mediterranean'),
(62, 'Mexican'),
(63, 'Middle Eastern'),
(64, 'Moroccan'),
(65, 'Nepali'),
(66, 'NorthEastern Chinese'),
(67, 'Pakistani'),
(68, 'Persian'),
(69, 'Peruvian'),
(70, 'Pizza'),
(71, 'Polish'),
(72, 'Portuguese'),
(73, 'Pub'),
(74, 'Scandinavian'),
(75, 'Seafood'),
(76, 'Shanghai'),
(77, 'Soups'),
(78, 'South American'),
(79, 'Spanish'),
(80, 'Steakhouse'),
(81, 'Street Food'),
(82, 'Sushi'),
(83, 'Swedish'),
(84, 'Swiss'),
(85, 'Szechuan'),
(86, 'Taiwanese'),
(87, 'Thai'),
(88, 'Tunisian'),
(89, 'Turkish'),
(90, 'Venezuelan'),
(91, 'Vietnamese'),
(92, 'Wine Bar');

-- --------------------------------------------------------

--
-- Table structure for table `Image`
--

CREATE TABLE `Image` (
  `id` int(11) NOT NULL,
  `filePath` varchar(500) NOT NULL,
  `restaurantId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Image`
--

INSERT INTO `Image` (`id`, `filePath`, `restaurantId`) VALUES
(1, 'https://media-cdn.tripadvisor.com/media/photo-f/05/ed/b9/95/terraza.jpg', 1),
(2, 'https://media-cdn.tripadvisor.com/media/photo-l/0f/6a/6b/21/millo-cocina-mestiza.jpg', 2),
(3, 'https://media-cdn.tripadvisor.com/media/photo-l/11/9e/8b/83/tim.jpg', 3),
(4, 'https://media-cdn.tripadvisor.com/media/photo-l/12/f6/4e/01/ceviche-con-dorada-estilo.jpg', 4),
(5, 'https://media-cdn.tripadvisor.com/media/photo-l/10/3b/56/bc/taller-de-mar.jpg', 5);

-- --------------------------------------------------------

--
-- Table structure for table `Restaurant`
--

CREATE TABLE `Restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text,
  `openingHours` varchar(200) DEFAULT NULL,
  `priceCategory` varchar(10) DEFAULT NULL,
  `locality` varchar(200) DEFAULT NULL,
  `route` varchar(200) DEFAULT NULL,
  `streetNumber` varchar(20) DEFAULT NULL,
  `postalCode` varchar(20) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `phoneNumber` varchar(200) DEFAULT NULL,
  `website` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `rating` float NOT NULL DEFAULT '0',
  `isTrending` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Restaurant`
--

INSERT INTO `Restaurant` (`id`, `name`, `description`, `openingHours`, `priceCategory`, `locality`, `route`, `streetNumber`, `postalCode`, `latitude`, `longitude`, `phoneNumber`, `website`, `email`, `rating`, `isTrending`) VALUES
(1, 'La Bottega de Michele', 'Description of La Bottega de Michele', 'Wed\r\n9:00 AM - 5:00 PM\r\nThu - Tue\r\n12:00 AM - 10:30 AM\r\n1:00 PM - 11:00 PM', '$$-$$$', 'Palma de Mallorca\r\n', 'Calle Fabrica', '17', '07013', 39.5721647, 2.6392585, '+34 971 45 48 92', 'http://www.labottegadimichele.com/', 'marmoreno76@yahoo.es', 4.5, 1),
(2, 'Millo Cocina Mestiza', 'Description of Millo Cocina Mestiza', 'Mon - Sat\r\n7:30 PM - 11:00 PM', '$$', 'Palma de Mallorca', 'Calle Caro', '30', '07013', 39.5731122, 2.6385228, '+34 871 04 04 13', 'https://www.millorestaurant.com/', 'restaurante-millo@hotmail.com', 4.98, 1),
(3, 'La Nueva Burguesa', 'Description of La Nueva Burguesa', 'Mon - Sat\r\n12:30 PM - 3:30 PM\r\n7:00 PM - 11:00 PM', '$$-$$$', 'Palma de Mallorca', 'Calle Sant Magi', '76', '07013', 39.5705883, 2.6361307, '+34 871 50 95 30', 'http://lanuevaburguesa.com/', NULL, 4.12, 1),
(4, 'Norice Palma', 'Description of Norice Palma', 'Sun\r\n9:00 AM - 11:30 PM\r\nMon - Sat\r\n12:30 PM - 4:00 PM\r\n7:30 PM - 11:30 PM', '$$', 'Palma de Mallorca', 'Plaça de Sant Antoni', '17', '07002', 39.5713068, 2.6559727, '+34 871 11 53 08', 'https://www.noricepalma.com', NULL, 3.98, 0),
(5, 'Taller de Mar', 'Description of Taller de Mar', NULL, '$$$', 'Palma de Mallorca', 'Calle Cotoner', '54', '07013', 39.570985, 2.6368594, '+34 971 28 93 75', 'http://www.tallerdemar.com', 'reservas@tallerdemar.com', 4.34, 1);

-- --------------------------------------------------------

--
-- Table structure for table `RestaurantCuisineType`
--

CREATE TABLE `RestaurantCuisineType` (
  `id` int(11) NOT NULL,
  `restaurantId` int(11) NOT NULL,
  `cuisineTypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `RestaurantCuisineType`
--

INSERT INTO `RestaurantCuisineType` (`id`, `restaurantId`, `cuisineTypeId`) VALUES
(1, 1, 56),
(2, 1, 61),
(3, 1, 38),
(4, 2, 59),
(5, 2, 42),
(6, 2, 53),
(7, 3, 46),
(8, 3, 48),
(9, 3, 53),
(10, 4, 8),
(11, 4, 87),
(12, 4, 42),
(13, 5, 57),
(14, 5, 56),
(15, 5, 61);

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`id`, `username`, `name`, `surname`, `email`, `password`) VALUES
(4, 'admin', 'Administrator', '', 'admin@iesfbmoll.org', '3f28c9e5f49efe2ce08c056ec6ecc5d1'),
(5, 'jsmith', 'John', 'Smith', 'jsmith@iesfbmoll.org', '25d55ad283aa400af464c76d713c07ad'),
(6, 'pjohnson', 'Peter', 'Johnson', 'pjohnson@iesfbmoll.org', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Comment`
--
ALTER TABLE `Comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurantId` (`restaurantId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `CuisineType`
--
ALTER TABLE `CuisineType`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Image`
--
ALTER TABLE `Image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurantId` (`restaurantId`);

--
-- Indexes for table `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `RestaurantCuisineType`
--
ALTER TABLE `RestaurantCuisineType`
  ADD PRIMARY KEY (`id`),
  ADD KEY `restaurantId` (`restaurantId`),
  ADD KEY `cuisineTypeId` (`cuisineTypeId`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Comment`
--
ALTER TABLE `Comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `CuisineType`
--
ALTER TABLE `CuisineType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `Image`
--
ALTER TABLE `Image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `Restaurant`
--
ALTER TABLE `Restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `RestaurantCuisineType`
--
ALTER TABLE `RestaurantCuisineType`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Comment`
--
ALTER TABLE `Comment`
  ADD CONSTRAINT `FK_Comment_Restaurant` FOREIGN KEY (`restaurantId`) REFERENCES `Restaurant` (`id`),
  ADD CONSTRAINT `FK_Comment_User` FOREIGN KEY (`userId`) REFERENCES `User` (`id`);

--
-- Constraints for table `Image`
--
ALTER TABLE `Image`
  ADD CONSTRAINT `FK_Image_Restaurant` FOREIGN KEY (`restaurantId`) REFERENCES `Restaurant` (`id`);

--
-- Constraints for table `RestaurantCuisineType`
--
ALTER TABLE `RestaurantCuisineType`
  ADD CONSTRAINT `FK_RestaurantCuisineType_CuisineType` FOREIGN KEY (`cuisineTypeId`) REFERENCES `CuisineType` (`id`),
  ADD CONSTRAINT `FK_RestaurantCuisineType_Restaurant` FOREIGN KEY (`restaurantId`) REFERENCES `Restaurant` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
