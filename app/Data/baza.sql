-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2020 at 11:01 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php2prvisajt`
--

-- --------------------------------------------------------

--
-- Table structure for table `activitycruid`
--

CREATE TABLE `activitycruid` (
  `idActivityCRUID` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tableName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cruid` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activitycruid`
--

INSERT INTO `activitycruid` (`idActivityCRUID`, `name`, `date`, `tableName`, `cruid`) VALUES
(1, 'Marko Milivojevic', '2020/02/11', 'Products', 'Insert'),
(2, 'Marko Milivojevic', '2020/02/11', 'Products', 'Insert'),
(3, 'Marko Milivojevic', '2020/02/11', 'Products', 'Insert'),
(4, 'Marko Milivojevic', '2020/02/11', 'Products', 'Insert'),
(5, 'Marko Milivojevic', '2020/02/11', 'Products', 'Insert'),
(6, 'Marko Milivojevic', '2020/02/11', 'Products', 'Insert'),
(7, 'Marko Milivojevic', '2020/02/11', 'Products', 'Insert'),
(8, 'Marko Milivojevic', '2020/02/11', 'Products', 'Delete'),
(9, 'Marko Milivojevic', '2020/02/11', 'Contact', 'Delete'),
(10, 'Marko Milivojevic', '2020/02/11', 'products', 'Delete'),
(11, 'Marko Milivojevic', '2020/02/11', 'users', 'Delete'),
(12, 'Marko Milivojevic', '2020/02/11', 'contact', 'Delete'),
(13, 'Marko Milivojevic', '2020/02/11', 'contact', 'Delete'),
(14, 'Marko Milivojevic', '2020/02/11', 'users', 'Delete'),
(15, 'Marko Milivojevic', '2020/02/11', 'contact', 'Delete'),
(16, 'Marko Milivojevic', '2020/02/11', 'contact', 'Delete'),
(17, 'Marko Milivojevic', '2020/02/11', 'contact', 'Delete'),
(18, 'Marko Milivojevic', '2020/02/11', 'contact', 'Delete'),
(19, 'Marko Milivojevic', '2020/02/11', 'users', 'Delete'),
(20, 'Marko Milivojevic', '2020/02/11', 'contact', 'Delete'),
(21, 'Marko Milivojevic', '2020/02/11', 'contact', 'Delete'),
(22, 'Marko Milivojevic', '2020/02/11', 'products', 'Delete'),
(23, 'Marko Milivojevic', '2020/02/11', 'users', 'Delete');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `idCategories` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`idCategories`, `name`) VALUES
(1, 'Food'),
(2, 'Drink'),
(3, 'Dessert');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `idContact` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `text` varchar(2000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`idContact`, `name`, `email`, `phone`, `text`) VALUES
(21, 'Marko Milivojevic', 'markoczv314@gmail.com', '0631632894', 'deny');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `idImages` int(255) NOT NULL,
  `idProducts` int(255) DEFAULT NULL,
  `path` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `pathOld` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`idImages`, `idProducts`, `path`, `pathOld`, `alt`) VALUES
(41, 79, 'app/Assets/Images/users/nova_1581377488Website-Menu-Image.jpg', 'app/Assets/Images/users/1581377488Website-Menu-Image.jpg', 'Proba slike'),
(42, 80, 'app/Assets/Images/users/nova_1581377603slider-1.jpg', 'app/Assets/Images/users/1581377603slider-1.jpg', 'Iphone XS'),
(43, 81, 'app/Assets/Images/users/nova_1581377702Website-menu-page-1-1200x1228.jpg', 'app/Assets/Images/users/1581377702Website-menu-page-1-1200x1228.jpg', 'ipad'),
(44, 82, 'app/Assets/Images/users/nova_1581378159bg2.jpg', 'app/Assets/Images/users/1581378159bg2.jpg', 'Iphone XS'),
(45, 83, 'app/Assets/Images/users/nova_1581378314download.png', 'app/Assets/Images/users/1581378314download.png', 'test'),
(46, 84, 'app/Assets/Images/users/nova_1581379600300px-Ct-internals.jpg', 'app/Assets/Images/users/1581379600300px-Ct-internals.jpg', 'Iphone XS'),
(47, 85, 'app/Assets/Images/users/nova_1581379737300px-Ct-internals.jpg', 'app/Assets/Images/users/1581379737300px-Ct-internals.jpg', 'fffff'),
(48, 86, 'app/Assets/Images/users/nova_1581379825300px-Ct-internals.jpg', 'app/Assets/Images/users/1581379825300px-Ct-internals.jpg', 'dadad');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `idProducts` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `textProduct` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `idCategories` int(255) NOT NULL,
  `idUsers` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`idProducts`, `name`, `price`, `textProduct`, `idCategories`, `idUsers`) VALUES
(79, 'Proba slike', 6666, 'Proba slike', 1, 2),
(80, 'dfgdf', 6666, 'daa', 1, 2),
(81, 'sss', 6666, 'daa', 2, 2),
(82, 'xxxx', 6666, 'aaaaaa aaaaaaaa ddddddddddd cd', 3, 2),
(83, 'test', 6666, 'tezt', 3, 2),
(84, 'ggg', 444, 'ASFadsgsdghdhdgfjfgykftktdjrfjhtdfgdf gdg dfgdhdfghjf hjdgh dgh ', 1, 2),
(85, 'ffffff', 444, 'ASFadsgsdghdhdgfjfgykftktdjrfjhtdfgdf gdg dfgdhdfghjf hjdgh dgh ', 2, 2),
(86, 'dadadad', 6666, 'sssw', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `userlevel`
--

CREATE TABLE `userlevel` (
  `idUserLevel` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `userlevel`
--

INSERT INTO `userlevel` (`idUserLevel`, `name`) VALUES
(1, 'Users'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `idUsers` int(255) NOT NULL,
  `Name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `idUserLevel` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `Name`, `lastName`, `email`, `password`, `idUserLevel`) VALUES
(1, 'Marko', 'Milivojevic', 'marko@gmail.com', '663a0e04d8d3fb7d0ac2e56bc2791b1b', 2),
(2, 'Marko', 'Milivojevic', 'marko.milivojevic.167.17@ict.edu.rs', '663a0e04d8d3fb7d0ac2e56bc2791b1b', 2),
(10, 'Marko', 'Milivojevic', 'markoczv314@gmail.com', 'c1d909f63d2921992073a676d4e9a0d4', 1),
(17, 'Marko Milivojevic', 'Milivojevic', 'markoczv314@gmail.com', 'c1d909f63d2921992073a676d4e9a0d4', 1),
(18, 'Marko Milivojevic', 'Milivojevic Asdsa', 'markoczv314@gmail.com', 'c1d909f63d2921992073a676d4e9a0d4', 1),
(19, 'Pera', 'Peric', 'pera@gmail.com', '9521ec202babf7d6539038da6da81959', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitycruid`
--
ALTER TABLE `activitycruid`
  ADD PRIMARY KEY (`idActivityCRUID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategories`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idContact`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`idImages`),
  ADD KEY `idProducts` (`idProducts`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProducts`),
  ADD KEY `idCategories` (`idCategories`,`idUsers`),
  ADD KEY `idUsers` (`idUsers`);

--
-- Indexes for table `userlevel`
--
ALTER TABLE `userlevel`
  ADD PRIMARY KEY (`idUserLevel`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`),
  ADD KEY `idUserLevel` (`idUserLevel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitycruid`
--
ALTER TABLE `activitycruid`
  MODIFY `idActivityCRUID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategories` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `idContact` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `idImages` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `idProducts` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `userlevel`
--
ALTER TABLE `userlevel`
  MODIFY `idUserLevel` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`idProducts`) REFERENCES `products` (`idProducts`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`idCategories`) REFERENCES `categories` (`idCategories`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`idUsers`) REFERENCES `users` (`idUsers`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idUserLevel`) REFERENCES `userlevel` (`idUserLevel`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
