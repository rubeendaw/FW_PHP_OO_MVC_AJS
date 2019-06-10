-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2019 at 08:48 AM
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
(2, 2, 'Europeo', '', '', 'Venecia', 'Italia', 'parking,', 601, 5, 'venecia.jpg', 3),
(13, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Paris', 'Francia', 'Parking', 500, 5, 'paris.jpg', 10),
(14, 4, 'Europeo', NULL, NULL, 'Praga', 'República Checa', NULL, 900, NULL, 'praga.jpg', 12),
(15, 5, 'Nacional', NULL, NULL, 'Sevilla', 'España', NULL, 100, NULL, 'sevilla.jpg', 14),
(16, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Paris', 'Francia', 'Parking', 500, 5, 'paris.jpg', 5),
(17, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Paris', 'Francia', 'Parking', 500, 5, 'paris.jpg', 5),
(18, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Paris', 'Francia', 'Parking', 500, 5, 'paris.jpg', 5),
(19, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Paris', 'Francia', 'Parking', 500, 5, 'paris.jpg', 5),
(20, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Paris', 'Francia', 'Parking', 500, 5, 'paris.jpg', 5),
(21, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Paris', 'Francia', 'Parking', 500, 5, 'paris.jpg', 5),
(22, 3, 'Europeo', '2019-01-18', '2019-01-25', 'Rennes', 'Francia', 'Parking', 500, 5, 'paris.jpg', 5),
(23, 25, 'Internacional', '2019-02-13', '2019-02-28', 'Brisbane', 'Australia', 'Parking, Wifi', 900, 10, 'paris.jpg', 3),
(26, 234, 'Europeo', '0000-00-00', '0000-00-00', 'fgdf', 'fgdfg', '', 234, 15, 'venecia.jpg', 0),
(29, 1235, 'Nacional', '03/28/2019 ', ' 04/03/2019', 'La X', 'Fortnite', '', 1234, 15, 'venecia.jpg', 0);

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
(3, '', 'ruamsa1', '$2y$10$JHTDXoHrwev2cfRia6CrYe0D/APfv9Q.4oUChdkn22HhwpmUdf5La', '', '', 'ruamsa1@hotmail.com', 2, 'Ruben', 675443432, 'ES', '46', 'Bocairent', 'https://api.adorable.io/avatars/25/ruamsa1@hotmail.com.png', 0),
(14, '', 'ruben', '$2y$10$HtME2AjOghpaB/lZorYTFOufWFhNFYY2U.H270DwRWADOB8aw4eey', '', '', 'ruamsasdadsd1@mail.com', 1, 'Rub', 657890909, '', '', '', 'ruamsa1', 0),
(15, '', 'admin', '$2y$10$flzEs4Z5jI2txv5FdXRh7.TOZ75ecoZpIGblpvFlsS55vNECzrT9a', '', '', 'admin@admin.com', 1, '', 0, '', '', '', 'https://api.adorable.io/avatars/25/admin@admin.com.png', 0),
(16, '', 'user', '$2y$10$TmdHfZHbUbk8IeyB6LvX0ObDjnW7jFQ1slhn2Zxj83jKQM7fi5VnS', '', '', 'user@user.com', 2, '', 0, '', '', '', 'https://api.adorable.io/avatars/25/user@user.com.png', 0),
(17, '', 'eladri', '$2y$10$cvLChzFYNmCDQOUFt5xrneqcK.qm2fj0m..LwufM5FuF2jhl9wqxO', '', '', 'eladri@gmail.es', 2, '', 0, '', '', '', 'https://api.adorable.io/avatars/25/eladri@gmail.es.png', 0),
(22, 'ruamsaruub', 'ruamsaruub', '$2y$10$C.YJlRs4tRhfZibWYmMPbuoKvkFcC0GXW4/fgger0v5slbjA6MpaW', 'b4cb425ca557dfbae022', '5f7c5ed50bc346297e13', 'rubeendaw@gmail.com', 1, 'Juanana', 56465, 'Spain', 'Ciudad Real', 'Alcoba De Los Montes', 'http://localhost/www/FW_PHP_OO_MVC_AJS/Andiamo/frontend/view/assets/images/profile/flowers.png', 1),
(34, 'juanan', 'juanan', '$2y$10$wdO4X7NhIwiX1XbKexVd7u3YbvJ4gmJ42clwH4wlUIiBO7IyxOwe2', 'c1321d8cbe7d77e6e9a6', 'f5bc959411122db98487', 'rubeendaw@gmail.com', 1, 'Juanana', 56465, 'Spain', 'Ciudad Real', 'Alcoba De Los Montes', 'http://localhost/www/FW_PHP_OO_MVC_AJS/Andiamo/frontend/view/assets/images/profile/flowers.png', 1),
(35, 'userrub', 'userrub', '$2y$10$D.F1Bnh8yO.XyaO.ukcs9.cNtU0CoPdEm9JshKXiucHJ9yQtAjuT6', '338eacab72998ffdb35c', 'eyJ0eXAiOiJKV1QiLCAiYWxnIjoiSFMyNTYifQ.MzYwMCIsDQoJCQkibmFtZSI6dXNlcnJ1Yg0KCQl9.MZflQuf_tilUVCB8K7hs_WeBIw4GdBqvDn5V0Dv4tMA', 'rubeendaw@gmail.com', 1, 'ruub', 56465631, 'Spain', 'Valencia', 'Bocairent', 'http://localhost/www/FW_PHP_OO_MVC_AJS/Andiamo/frontend/view/assets/images/profile/flowers.png', 1),
(50, 'goo_rubeendaw', 'goo_rubeendaw', '', '', 'eyJ0eXAiOiJKV1QiLCAiYWxnIjoiSFMyNTYifQ.MzYwMCIsDQoJCQkibmFtZSI6Z29vX3J1YmVlbmRhdw0KCQl9.wRDktRUojrDSQQpBeuo6GaMs48FUocxlh777Yp908K4', 'rubeendaw@gmail.com', 1, 'Ruben Amezcua', 0, 'Spain', 'Valencia', 'Bocairent', 'http://localhost/www/FW_PHP_OO_MVC_AJS/Andiamo/frontend/view/assets/images/profile/prueba.jpeg', 1),
(51, 'juanan_pam', 'juanan_pam', '$2y$10$.QEcFttfWGYxVOmc0YUM9OfieSeR1mCcIAeggxupTo.8lL8a3vXsu', 'ee70b75fc8be5f09c6dd', '', 'rubeendaw@gmail.com', 1, 'Juanana', 56465, 'Spain', 'Ciudad Real', 'Alcoba De Los Montes', 'http://localhost/www/FW_PHP_OO_MVC_AJS/Andiamo/frontend/view/assets/images/profile/flowers.png', 0),
(52, 'git_rubeendaw', 'git_rubeendaw', '', '', 'eyJ0eXAiOiJKV1QiLCAiYWxnIjoiSFMyNTYifQ.MzYwMCIsDQoJCQkibmFtZSI6Z2l0X3J1YmVlbmRhdw0KCQl9.F7PC2B7IMcEMnz1odbKE2atdKruovo4jY9jJ3yt-5xU', '', 1, 'rubeendaw', 0, 'Spain', '', '', 'https://avatars2.githubusercontent.com/u/35238442?v=4', 1),
(53, 'userrub2', 'userrub2', '$2y$10$4y5jZvAaRldVSK3fpOowaePP2Dh2LERo2PK016Ab0Lj8eCJ2ort9y', '0dbea8c846e522072c5b', 'eyJ0eXAiOiJKV1QiLCAiYWxnIjoiSFMyNTYifQ.MzYwMCIsDQoJCQkibmFtZSI6dXNlcnJ1YjINCgkJfQ.98qOH3jwmlCCCu3GUTBAeVsjHNV13LOSfh-joxSDlCI', 'rubeendaw@gmail.com', 1, '', 0, '', '', '', 'https://api.adorable.io/avatars/25/rubeendaw@gmail.com.png', 1),
(54, 'ruamsa', 'ruamsa', '$2y$10$8hGBZ8CEQdCpKmavJQU6RetNtrgepeVDhesHAsVHoacqRQMg0IsFe', 'e3770d87621bf973130e', '', '', 1, '', 0, '', '', '', 'https://api.adorable.io/avatars/25/.png', 0),
(66, 'pepita', 'pepita', '$2y$10$87fXTp36uKcqbO2/29XCT.VAYakmkuDdgQSp/tWijjkk46J4oAUFe', '35324c669d0642f882ca', 'eyJ0eXAiOiJKV1QiLCAiYWxnIjoiSFMyNTYifQ.MzYwMCIsDQoJCQkibmFtZSI6cGVwaXRhDQoJCX0.v6c9mZi8I21eIbjTgS2MIKt0NcFU5-XOuTZ3-bXKOKw', 'rubeendaw@gmail.com', 1, '', 0, '', '', '', 'https://api.adorable.io/avatars/25/rubeendaw@gmail.com.png', 1);

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
