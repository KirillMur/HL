-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 19 2021 г., 14:21
-- Версия сервера: 10.4.16-MariaDB
-- Версия PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eshop`
--
CREATE DATABASE IF NOT EXISTS `eshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `eshop`;

-- --------------------------------------------------------

--
-- Структура таблицы `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `class`
--

INSERT INTO `class` (`id`, `name`) VALUES
(1, 'SUV'),
(2, 'Larger (D)'),
(3, 'Executive (E)'),
(4, 'Luxury (F)'),
(5, 'Medium (C)');

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `address` varchar(120) NOT NULL,
  `gender` varchar(60) NOT NULL,
  `contact` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `gender`, `contact`) VALUES
(101, 'name1', 'addr1', 'Он', 'ctct1'),
(102, 'name1', 'addr1', 'Он', 'ctct1'),
(103, 'name1', 'addr1', 'Он', 'ctct1'),
(104, 'name2', 'addr2', 'Он', 'ctct2'),
(105, 'bmw', 'addr', 'Он', 'ctc'),
(106, 'awawaw', '', 'Он', ''),
(107, 'awawaw', '', 'Он', ''),
(108, 'nm1', 'add1', 'Он', 'ct1'),
(109, 'nm2', 'add2', 'Он', 'ct2'),
(110, 'nm3', 'add3', 'Он', ''),
(111, 'awawaw', '', 'Он', ''),
(112, 'awawaw', '', 'Он', ''),
(113, 'tststst', 'addrd', 'Он', ''),
(114, '1112', '222', 'Он', '3322233232323'),
(115, '111', '222', 'Он', '333'),
(116, '', '', 'Он', ''),
(117, '', '', 'Он', ''),
(118, '', '', 'Он', ''),
(119, '', '', 'Он', ''),
(120, 'ann', '', 'Он', ''),
(121, 'ttt', '', 'Он', ''),
(122, 'ttt', '', 'Он', ''),
(123, 'ttt', '', 'Он', ''),
(124, '', '', 'Он', ''),
(125, 'yy', '', 'Он', ''),
(126, '', '', 'Он', ''),
(127, '', '', 'Он', ''),
(128, '', '', 'Он', ''),
(129, '', '', 'Он', ''),
(130, 'ttttt', '', 'Он', ''),
(131, 'uyuy', 'uyuy', 'Он', ''),
(132, '', '', 'Он', ''),
(133, '', '', 'Он', ''),
(134, 'oioioioi', '', 'Он', '');

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturer`
--

CREATE TABLE `manufacturer` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`) VALUES
(3, 'BMW'),
(6, 'Honda'),
(8, 'Infiniti'),
(2, 'Mercedes'),
(1, 'Mitsubishi');

-- --------------------------------------------------------

--
-- Структура таблицы `model`
--

CREATE TABLE `model` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `modification` varchar(120) NOT NULL,
  `class_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `model`
--

INSERT INTO `model` (`id`, `name`, `brand_id`, `modification`, `class_id`) VALUES
(1, 'Lancer', 1, 'Invite 1.6 FWD', 5),
(2, 'Lancer', 1, 'Intense 2.4 AWD', 5),
(3, 'Outlander III', 1, 'Intense+ 2.0 CVT FWD', 1),
(4, 'Outlander III', 1, 'Instyle 2.4 CVT AWD', 1),
(5, 'ASX', 1, 'Instyle 2.0 CVT AWD', 1),
(11, 'S-Klasse', 2, 'S500 4Matic', 4),
(12, 'S-Klasse', 2, 'S400d 4Matic', 4),
(13, 'E-Klasse', 2, 'E43 (AMG)', 3),
(14, 'E-Klasse', 2, 'E63S (AMG)', 3),
(15, 'CLA-Klasse', 2, 'CLA 180 ', 5),
(16, 'CLA-Klasse', 2, 'CLA 220 4MATIC ', 5),
(17, '5 series', 3, '530i xDrive ', 3),
(18, '5 series', 3, 'B525d ', 3),
(19, '7 series', 3, '750Li xDrive', 4),
(20, '7 series', 3, '745Le xDrive', 4),
(24, 'Q50', 8, '2.0T RWD', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `amount`, `client_id`) VALUES
(15, 472508, 101),
(16, 472508, 102),
(17, 472508, 103),
(18, 472508, 104),
(19, 100500, 105),
(20, 100500, 106),
(21, 100500, 107),
(22, 124002, 109),
(23, 372004, 110),
(24, 100500, 111),
(25, 100500, 112),
(26, 124002, 113),
(27, 124001, 114),
(28, 124001, 115),
(29, 248002, 116),
(30, 248002, 117),
(31, 248002, 118),
(32, 248002, 119),
(33, 800502, 120),
(34, 124001, 121),
(35, 124001, 122),
(36, 124001, 123),
(37, 248002, 124),
(38, 110500, 125),
(39, 100504, 126),
(40, 100504, 127),
(41, 100500, 128),
(42, 124001, 129),
(43, 348506, 130),
(44, 224505, 131),
(45, 124002, 132),
(46, 372004, 133),
(47, 224506, 134);

-- --------------------------------------------------------

--
-- Структура таблицы `order_info`
--

CREATE TABLE `order_info` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `cost` double DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `order_info`
--

INSERT INTO `order_info` (`id`, `order_id`, `count`, `cost`, `amount`, `stock_id`) VALUES
(24, 15, 1, 100504, 100504, 4),
(25, 15, 2, 124001, 248002, 1),
(26, 15, 1, 124002, 124002, 2),
(27, 16, 1, 100504, 100504, 4),
(28, 16, 2, 124001, 248002, 1),
(29, 16, 1, 124002, 124002, 2),
(30, 17, 1, 100504, 100504, 4),
(31, 17, 2, 124001, 248002, 1),
(32, 17, 1, 124002, 124002, 2),
(33, 18, 1, 100504, 100504, 4),
(34, 18, 2, 124001, 248002, 1),
(35, 18, 1, 124002, 124002, 2),
(36, 19, 1, 100500, 100500, 3),
(37, 20, 1, 100500, 100500, 3),
(38, 21, 1, 100500, 100500, 3),
(39, 22, 1, 124002, 124002, 2),
(40, 23, 1, 124002, 124002, 2),
(41, 23, 2, 124001, 248002, 1),
(42, 24, 1, 100500, 100500, 3),
(43, 25, 1, 100500, 100500, 3),
(44, 26, 1, 124002, 124002, 2),
(45, 27, 1, 124001, 124001, 1),
(46, 28, 1, 124001, 124001, 1),
(47, 29, 2, 124001, 248002, 1),
(48, 30, 2, 124001, 248002, 1),
(49, 31, 2, 124001, 248002, 1),
(50, 32, 2, 124001, 248002, 1),
(51, 33, 2, 124001, 248002, 1),
(52, 33, 5, 110500, 552500, 5),
(53, 34, 1, 124001, 124001, 1),
(54, 35, 1, 124001, 124001, 1),
(55, 36, 1, 124001, 124001, 1),
(56, 37, 2, 124001, 248002, 1),
(57, 38, 1, 110500, 110500, 5),
(58, 39, 1, 100504, 100504, 4),
(59, 40, 1, 100504, 100504, 4),
(60, 41, 1, 100500, 100500, 3),
(61, 42, 1, 124001, 124001, 1),
(62, 43, 2, 124001, 248002, 1),
(63, 43, 1, 100504, 100504, 4),
(64, 44, 1, 100504, 100504, 4),
(65, 44, 1, 124001, 124001, 1),
(66, 45, 1, 124002, 124002, 2),
(67, 46, 1, 124002, 124002, 2),
(68, 46, 2, 124001, 248002, 1),
(69, 47, 1, 100504, 100504, 4),
(70, 47, 1, 124002, 124002, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `color` varchar(60) NOT NULL,
  `count` int(11) NOT NULL,
  `cost` float NOT NULL,
  `model_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `stock`
--

INSERT INTO `stock` (`id`, `brand_id`, `color`, `count`, `cost`, `model_id`) VALUES
(1, 2, 'silver', 2, 124001, 11),
(2, 2, 'black', 1, 124002, 11),
(3, 3, 'black', 1, 100500, 20),
(4, 2, 'Gray', 1, 100504, 11),
(5, 3, 'Purple Gray', 5, 110500, 20),
(6, 8, 'Gray', 3, 31500, 24);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `login` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `access_type` varchar(60) NOT NULL DEFAULT 'user',
  `hash` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `login`, `password`, `access_type`, `hash`) VALUES
(1, 'Admin_name', 'lastname', 'admin', '5636y54645', 'admin', '356534353657658679o7078766456456456454'),
(2, 'user_name', '', 'user', '123', 'user', '$2y$10$3EgR84rdhd47Q95isept4.iPC/kPMSR57lZLdWkeg6y3v9AdbpeAi');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `model`
--
ALTER TABLE `model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_id` (`client_id`);

--
-- Индексы таблицы `order_info`
--
ALTER TABLE `order_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_id` (`stock_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Индексы таблицы `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `model_id` (`model_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT для таблицы `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `model`
--
ALTER TABLE `model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT для таблицы `order_info`
--
ALTER TABLE `order_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT для таблицы `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `model`
--
ALTER TABLE `model`
  ADD CONSTRAINT `model_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `model_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `manufacturer` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `customers` (`id`);

--
-- Ограничения внешнего ключа таблицы `order_info`
--
ALTER TABLE `order_info`
  ADD CONSTRAINT `order_info_ibfk_1` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_info_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `manufacturer` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
