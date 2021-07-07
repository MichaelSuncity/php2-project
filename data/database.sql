-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 01 2021 г., 18:28
-- Версия сервера: 5.7.25
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `database`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `itemPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `product_id`, `itemPrice`) VALUES
(100, 'h2gc4feb3pjh01rosq08kjudciejqnd5', 24, 100),
(102, 'h2gc4feb3pjh01rosq08kjudciejqnd5', 24, 150),
(104, 'h2gc4feb3pjh01rosq08kjudciejqnd5', 27, 100),
(106, '54r9j5k23ki47hkr4s0ndspgbqp6b34k', 77, 100),
(107, '54r9j5k23ki47hkr4s0ndspgbqp6b34k', 78, 125),
(108, '54r9j5k23ki47hkr4s0ndspgbqp6b34k', 63, 100),
(113, '28j4ri0ckatgeelrr56h4c9f90of25ko', 2, 123),
(114, '28j4ri0ckatgeelrr56h4c9f90of25ko', 2, 123),
(116, '28j4ri0ckatgeelrr56h4c9f90of25ko', 2, 123),
(125, '1b8kbgbis4kngpjkdclr78bic9l23uhg', 1, 142),
(126, '1b8kbgbis4kngpjkdclr78bic9l23uhg', 2, 123),
(127, '1b8kbgbis4kngpjkdclr78bic9l23uhg', 24, 50),
(128, '1b8kbgbis4kngpjkdclr78bic9l23uhg', 25, 321),
(129, 'bdlcukp1pmnhofmmekmv4d9gpvukgspp', 80, 125),
(137, 'gi7f46kk7ieqmrcl1f9dv0ogq2670ljv', 26, 324),
(138, 'gi7f46kk7ieqmrcl1f9dv0ogq2670ljv', 65, 100),
(141, 'qc74os7u37rc09kq600rij6fcpe2u3qg', 24, 50),
(142, 'qc74os7u37rc09kq600rij6fcpe2u3qg', 24, 50),
(143, 'qc74os7u37rc09kq600rij6fcpe2u3qg', 24, 50),
(144, 'qc74os7u37rc09kq600rij6fcpe2u3qg', 24, 50),
(145, 'qc74os7u37rc09kq600rij6fcpe2u3qg', 24, 50),
(146, 'qc74os7u37rc09kq600rij6fcpe2u3qg', 24, 50),
(147, 'qc74os7u37rc09kq600rij6fcpe2u3qg', 24, 50),
(148, 'qc74os7u37rc09kq600rij6fcpe2u3qg', 24, 50),
(149, 'qc74os7u37rc09kq600rij6fcpe2u3qg', 24, 50),
(150, 'qc74os7u37rc09kq600rij6fcpe2u3qg', 24, 50),
(189, 'a5a33av780alo0q6kuuvk2ik0rb6n3vo', 2, 123),
(190, 'a5a33av780alo0q6kuuvk2ik0rb6n3vo', 63, 100),
(192, '2talrsdqaarrfgjouu3mc5vvadddhoeq', 2, 123),
(193, '2talrsdqaarrfgjouu3mc5vvadddhoeq', 77, 100),
(194, '2talrsdqaarrfgjouu3mc5vvadddhoeq', 77, 100),
(195, '2talrsdqaarrfgjouu3mc5vvadddhoeq', 80, 125),
(214, 'a16crsaa059dt5rgpnc3qjb41jkql4hk', 78, 125),
(215, 'a16crsaa059dt5rgpnc3qjb41jkql4hk', 78, 125),
(216, 'a16crsaa059dt5rgpnc3qjb41jkql4hk', 78, 125),
(217, 'tg66s7djc5sv2vtnsa5hvsfqfm9k5a12', 79, 125),
(218, 'tg66s7djc5sv2vtnsa5hvsfqfm9k5a12', 79, 125),
(219, 'tg66s7djc5sv2vtnsa5hvsfqfm9k5a12', 79, 125),
(221, 'c9sd21th080utosvtkpe6kol2nrqkn89', 2, 123),
(222, 'c9sd21th080utosvtkpe6kol2nrqkn89', 25, 321);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `clientName` text NOT NULL,
  `phone` int(11) NOT NULL,
  `statusOrder` varchar(128) NOT NULL DEFAULT 'Заказ оформлен',
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `session_id`, `clientName`, `phone`, `statusOrder`, `total`, `user_id`) VALUES
(34, 'h2gc4feb3pjh01rosq08kjudciejqnd5', 'Михаил', 777, 'Оплачен', 350, 0),
(35, '54r9j5k23ki47hkr4s0ndspgbqp6b34k', 'Наталья', 123321, 'В работе', 325, 0),
(44, '1b8kbgbis4kngpjkdclr78bic9l23uhg', 'Иван', 5555, 'Оплачен', 636, 0),
(45, 'bdlcukp1pmnhofmmekmv4d9gpvukgspp', 'Эйфель', 123, 'Заказ оформлен', 125, 3),
(46, 'gi7f46kk7ieqmrcl1f9dv0ogq2670ljv', 'Слон', 1111, 'Заказ оформлен', 424, 3),
(47, 'qc74os7u37rc09kq600rij6fcpe2u3qg', 'Медный', 111, 'Заказ оформлен', 500, 2),
(48, 'a5a33av780alo0q6kuuvk2ik0rb6n3vo', 'test', 11, 'В работе', 223, 2),
(49, '2talrsdqaarrfgjouu3mc5vvadddhoeq', 'Yoyo', 555, 'Обработан', 448, 2),
(50, 'a16crsaa059dt5rgpnc3qjb41jkql4hk', 'Марио', 555, 'В работе', 375, 0),
(51, 'tg66s7djc5sv2vtnsa5hvsfqfm9k5a12', 'Китайская стена', 1111, 'В работе', 375, 3),
(52, 'c9sd21th080utosvtkpe6kol2nrqkn89', 'юзер 3', 111, 'Оплачен', 444, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL DEFAULT 'товар',
  `description` varchar(128) NOT NULL DEFAULT 'впр воар ы пвфылвд вп ав вап лваоплавопд ыва выло аывао цкоуок',
  `price` int(11) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`) VALUES
(1, 'Зонт', 'описание', 142),
(2, 'Кувалда', 'описание', 123),
(24, 'Медь', 'описание', 50),
(25, 'Гвозди', 'описание', 321),
(26, 'Лыжи', 'описание', 324),
(27, 'товар', 'описание', 100),
(28, 'товар', 'описание', 100),
(30, 'Корабль', 'описание', 424),
(63, 'товар', 'описание', 100),
(65, 'товар', 'описание', 100),
(76, 'Пицца', 'описание', 125),
(77, 'Пирожок', 'описание', 100),
(78, 'Пицца', 'описание', 125),
(79, 'Пицца', 'описание', 125),
(80, 'Пицца', 'описание', 125);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  `hash` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$WX6aujl2Au53HFOX4kK/F.BImh5gq4W/cgxMgBm4Aty7QwmbBjUq.', '131499955608d7143dc93e9.15787584'),
(2, 'user', '$2y$10$WX6aujl2Au53HFOX4kK/F.BImh5gq4W/cgxMgBm4Aty7QwmbBjUq.', '2049591366608d4996149373.90463718'),
(3, 'user2', '$2y$10$WX6aujl2Au53HFOX4kK/F.BImh5gq4W/cgxMgBm4Aty7QwmbBjUq.', '90040316608d732922b1e2.47343150'),
(4, 'user3', '$2y$10$ZNv.dyXX6LCeT2MFo6ufme84GQbnT2eT.TwpoV8u4q3lS4b5OM3cq', '1682675469608d6d49d605b5.20070296');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
