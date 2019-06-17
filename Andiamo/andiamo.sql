-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2019 at 10:53 AM
-- Server version: 5.6.38
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `andiamo`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `user` varchar(70) NOT NULL,
  `destination` varchar(70) NOT NULL,
  `price` varchar(70) NOT NULL,
  `quantity` varchar(70) NOT NULL,
  `total` varchar(70) NOT NULL,
  `date` varchar(11) DEFAULT 'TIMESTAMP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `user`, `destination`, `price`, `quantity`, `total`, `date`) VALUES
(25, 'admin', 'Sevilla', '100', '1', '100', '2019-03-12 '),
(26, 'admin', 'Praga', '900', '1', '900', '2019-03-12 '),
(27, 'admin', 'Sevilla', '100', '1', '100', '2019-03-12 '),
(28, 'admin', 'Praga', '900', '1', '900', '2019-03-12 '),
(29, 'admin', 'Paris', '500', '1', '500', '2019-03-12 '),
(30, 'admin', 'Praga', '900', '1', '900', '2019-03-12 '),
(31, 'ruamsa1', 'Sevilla', '100', '2', '200', '2019-03-30 '),
(32, 'ruamsa1', 'Venecia', '100', '2', '200', '2019-03-29'),
(33, 'ruamsa1', 'Paris', '200', '2', '400', '2019-03-30 ');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `travel` int(5) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`travel`, `username`) VALUES
(1, 'ruamsa1'),
(2, 'pepita'),
(2, 'prueba_recover'),
(13, 'admin'),
(13, 'pepita'),
(14, 'admin'),
(14, 'ruamsa1'),
(15, 'admin'),
(15, 'ruamsa1'),
(15, 'ruamsa2');

-- --------------------------------------------------------

--
-- Table structure for table `travels`
--

CREATE TABLE `travels` (
  `id` int(11) NOT NULL,
  `ref` int(11) NOT NULL,
  `type` varchar(100) DEFAULT NULL,
  `check_in` varchar(15) DEFAULT NULL,
  `check_out` varchar(15) DEFAULT NULL,
  `destination` varchar(150) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `services` varchar(500) DEFAULT NULL,
  `price` int(20) DEFAULT NULL,
  `discount` int(20) DEFAULT NULL,
  `img` varchar(150) DEFAULT NULL,
  `likes` int(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `travels`
--

INSERT INTO `travels` (`id`, `ref`, `type`, `check_in`, `check_out`, `destination`, `country`, `services`, `price`, `discount`, `img`, `likes`) VALUES
(2, 2, 'Europeo', '2019-01-18', '2019-04-29', 'Venecia', 'Italia', 'Parking, Wifi, Piscina, Desayuno', 625, 5, 'venecia.jpg', 7),
(13, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Paris', 'Francia', 'Parking, Wifi', 500, 5, 'paris.jpg', 10),
(14, 4, 'Europeo', '2019-01-18', '2019-01-28', 'Praga', 'República Checa', 'Desayuno', 900, 15, 'praga.jpg', 12),
(15, 5, 'Nacional', '2019-02-13', '2019-02-28', 'Sevilla', 'España', 'Piscina, Desayuno', 100, 25, 'sevilla.jpg', 14),
(16, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Paris', 'Francia', 'Parking', 580, 5, 'paris.jpg', 5),
(17, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Paris', 'Francia', 'Parking, Wifi', 710, 5, 'paris.jpg', 5),
(18, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Paris', 'Francia', 'Parking', 423, 5, 'paris.jpg', 5),
(19, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Paris', 'Francia', 'Parking', 914, 5, 'paris.jpg', 5),
(20, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Paris', 'Francia', 'Parking, Piscina, Desayuno', 210, 5, 'paris.jpg', 5),
(21, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Paris', 'Francia', 'Parking', 823, 5, 'paris.jpg', 5),
(22, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Rennes', 'Francia', 'Wifi', 505, 5, 'paris.jpg', 5),
(23, 25, 'Internacional', '2019-02-13', '2019-02-28', 'Brisbane', 'Australia', 'Parking, Wifi', 992, 10, 'paris.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `IDuser` varchar(110) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `token` varchar(110) NOT NULL,
  `tokenlog` varchar(300) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(100) NOT NULL,
  `type` int(1) NOT NULL,
  `name` varchar(40) NOT NULL,
  `phone` int(9) NOT NULL,
  `country` varchar(20) CHARACTER SET utf32 NOT NULL,
  `province` varchar(30) NOT NULL,
  `city` varchar(50) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `activate` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `IDuser`, `username`, `password`, `token`, `tokenlog`, `email`, `type`, `name`, `phone`, `country`, `province`, `city`, `avatar`, `activate`) VALUES
(22, 'ruamsaruub', 'ruamsaruub', '$2y$10$C.YJlRs4tRhfZibWYmMPbuoKvkFcC0GXW4/fgger0v5slbjA6MpaW', 'b4cb425ca557dfbae022', '5f7c5ed50bc346297e13', 'rubeendaw@gmail.com', 1, 'Juanana', 56465, 'Spain', 'Ciudad Real', 'Alcoba De Los Montes', 'http://localhost/www/FW_PHP_OO_MVC_AJS/Andiamo/frontend/view/assets/images/profile/flowers.png', 1),
(34, 'juanan', 'juanan', '$2y$10$wdO4X7NhIwiX1XbKexVd7u3YbvJ4gmJ42clwH4wlUIiBO7IyxOwe2', 'c1321d8cbe7d77e6e9a6', 'f5bc959411122db98487', 'rubeendaw@gmail.com', 1, 'Juanana', 56465, 'Spain', 'Ciudad Real', 'Alcoba De Los Montes', 'http://localhost/www/FW_PHP_OO_MVC_AJS/Andiamo/frontend/view/assets/images/profile/flowers.png', 1),
(35, 'userrub', 'userrub', '$2y$10$D.F1Bnh8yO.XyaO.ukcs9.cNtU0CoPdEm9JshKXiucHJ9yQtAjuT6', '338eacab72998ffdb35c', 'eyJ0eXAiOiJKV1QiLCAiYWxnIjoiSFMyNTYifQ.MzYwMCIsDQoJCQkibmFtZSI6dXNlcnJ1Yg0KCQl9.MZflQuf_tilUVCB8K7hs_WeBIw4GdBqvDn5V0Dv4tMA', 'rubeendaw@gmail.com', 1, 'ruub', 56465631, 'Spain', 'Valencia', 'Bocairent', 'http://localhost/www/FW_PHP_OO_MVC_AJS/Andiamo/frontend/view/assets/images/profile/flowers.png', 1),
(50, 'goo_rubeendaw', 'goo_rubeendaw', '', '', 'eyJ0eXAiOiJKV1QiLCAiYWxnIjoiSFMyNTYifQ.MzYwMCIsDQoJCQkibmFtZSI6Z29vX3J1YmVlbmRhdw0KCQl9.wRDktRUojrDSQQpBeuo6GaMs48FUocxlh777Yp908K4', 'rubeendaw@gmail.com', 1, 'Ruben Amezcua', 0, 'Spain', 'Valencia', 'Bocairent', 'http://localhost/www/FW_PHP_OO_MVC_AJS/Andiamo/frontend/view/assets/images/profile/prueba.jpeg', 1),
(52, 'git_rubeendaw', 'git_rubeendaw', '', '', 'eyJ0eXAiOiJKV1QiLCAiYWxnIjoiSFMyNTYifQ.MzYwMCIsDQoJCQkibmFtZSI6Z2l0X3J1YmVlbmRhdw0KCQl9.F7PC2B7IMcEMnz1odbKE2atdKruovo4jY9jJ3yt-5xU', '', 1, 'rubeendaw', 0, 'Spain', '', '', 'https://avatars2.githubusercontent.com/u/35238442?v=4', 1),
(53, 'userrub2', 'userrub2', '$2y$10$4y5jZvAaRldVSK3fpOowaePP2Dh2LERo2PK016Ab0Lj8eCJ2ort9y', '0dbea8c846e522072c5b', 'eyJ0eXAiOiJKV1QiLCAiYWxnIjoiSFMyNTYifQ.MzYwMCIsDQoJCQkibmFtZSI6dXNlcnJ1YjINCgkJfQ.98qOH3jwmlCCCu3GUTBAeVsjHNV13LOSfh-joxSDlCI', 'rubeendaw@gmail.com', 1, '', 0, '', '', '', 'https://api.adorable.io/avatars/25/rubeendaw@gmail.com.png', 1),
(54, 'ruamsa', 'ruamsa', '$2y$10$8hGBZ8CEQdCpKmavJQU6RetNtrgepeVDhesHAsVHoacqRQMg0IsFe', 'e3770d87621bf973130e', '', '', 1, '', 0, '', '', '', 'https://api.adorable.io/avatars/25/.png', 0),
(67, 'prueba_recover', 'prueba_recover', '$2y$10$QVOgZafvVzpva7hPuHgUCexlbGlbFa45XS6USbujQQLGXXpwiVy62', '129b111e5d09cb99bbc7', 'eyJ0eXAiOiJKV1QiLCAiYWxnIjoiSFMyNTYifQ.MzYwMCIsDQoJCQkibmFtZSI6cHJ1ZWJhX3JlY292ZXINCgkJfQ.RPzQmsPTbpH8CVHT6B1jVuXvWAt-L-2XF3ZgoW3zeu0', 'rubeendaw@gmail.com', 1, '', 67522803, 'Spain', 'Alicante', 'Daimes', 'http://localhost/www/FW_PHP_OO_MVC_AJS/Andiamo/frontend/view/assets/images/profile/flowers.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`travel`,`username`);

--
-- Indexes for table `travels`
--
ALTER TABLE `travels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `travels`
--
ALTER TABLE `travels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
