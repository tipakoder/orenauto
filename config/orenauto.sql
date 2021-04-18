-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 19 2021 г., 00:11
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `orenauto`
--

-- --------------------------------------------------------

--
-- Структура таблицы `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `firstname` varchar(120) NOT NULL,
  `lastname` varchar(120) NOT NULL,
  `middlename` varchar(120) NOT NULL,
  `type` enum('admin','moderator','user') NOT NULL DEFAULT 'user',
  `login` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `account`
--

INSERT INTO `account` (`id`, `firstname`, `lastname`, `middlename`, `type`, `login`, `password`) VALUES
(1, 'Александр', 'Александров', 'Александрович', 'admin', 'root', '$2y$10$Al8qseTczIyN23V0jZkdEemaa8Ims.v3CFDhWu8dUWexVuVUkqqkS');

-- --------------------------------------------------------

--
-- Структура таблицы `account_session`
--

CREATE TABLE `account_session` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `session_key` varchar(255) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `closed` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `account_session`
--

INSERT INTO `account_session` (`id`, `account_id`, `session_key`, `ip`, `closed`) VALUES
(3, 1, '46a15b190afc825235518018c804ff9354146f7ad4434db42ae771e2fef43e05', '127.0.0.1', 0),
(5, 1, '1fafd53df16e2e0a2fd933bd7b09a0962069834a7db37c0c834d33381150f9ed', '127.0.0.1', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `mark_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `equipment_id` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `car`
--

INSERT INTO `car` (`id`, `mark_id`, `model_id`, `equipment_id`, `year`) VALUES
(1, 2, 1, 1, 2021);

-- --------------------------------------------------------

--
-- Структура таблицы `car_country_origin`
--

CREATE TABLE `car_country_origin` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `car_country_origin`
--

INSERT INTO `car_country_origin` (`id`, `name`) VALUES
(1, 'Россия');

-- --------------------------------------------------------

--
-- Структура таблицы `car_equipment`
--

CREATE TABLE `car_equipment` (
  `id` int(11) NOT NULL,
  `engine_type` enum('patrol','electric','hybrid') NOT NULL,
  `power` float NOT NULL,
  `transmission` enum('mechanic','automatic','mixed') NOT NULL,
  `fuel_tank` int(11) NOT NULL,
  `gears_count` int(11) NOT NULL,
  `drive_unit` enum('front','back','full') NOT NULL,
  `volume` int(11) NOT NULL,
  `fuel_grade_id` int(11) NOT NULL,
  `max_speed` int(11) NOT NULL,
  `acceleration_time` float NOT NULL,
  `fuel_consumption_city` float NOT NULL,
  `fuel_consumption_mixed` float NOT NULL,
  `fuel_consumption_country` float NOT NULL,
  `suspension_height` int(11) NOT NULL,
  `suspension_front` varchar(60) NOT NULL,
  `suspension_back` varchar(60) NOT NULL,
  `wheel_size` varchar(40) NOT NULL,
  `length` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `wheelbase` int(11) NOT NULL,
  `trunk_volume` int(11) NOT NULL,
  `curb_weight` int(11) NOT NULL,
  `full_mass` int(11) NOT NULL,
  `seats_count` int(11) NOT NULL,
  `doors_count` int(11) NOT NULL,
  `country_origin_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `car_equipment`
--

INSERT INTO `car_equipment` (`id`, `engine_type`, `power`, `transmission`, `fuel_tank`, `gears_count`, `drive_unit`, `volume`, `fuel_grade_id`, `max_speed`, `acceleration_time`, `fuel_consumption_city`, `fuel_consumption_mixed`, `fuel_consumption_country`, `suspension_height`, `suspension_front`, `suspension_back`, `wheel_size`, `length`, `height`, `width`, `wheelbase`, `trunk_volume`, `curb_weight`, `full_mass`, `seats_count`, `doors_count`, `country_origin_id`, `price`) VALUES
(1, 'patrol', 1.6, 'mechanic', 50, 6, 'front', 128, 2, 192, 12, 10, 8, 6, 150, 'независимая, пружинная', 'независимая, пружинная', '205/55/R16', 4310, 1447, 1800, 2650, 1291, 1232, 1800, 5, 5, 1, 974900);

-- --------------------------------------------------------

--
-- Структура таблицы `car_fuel_grade`
--

CREATE TABLE `car_fuel_grade` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `car_fuel_grade`
--

INSERT INTO `car_fuel_grade` (`id`, `name`) VALUES
(1, 'АИ-80'),
(2, 'АИ-92'),
(3, 'АИ-95'),
(4, 'АИ-95+'),
(5, 'АИ-98'),
(6, 'АИ-100');

-- --------------------------------------------------------

--
-- Структура таблицы `car_mark`
--

CREATE TABLE `car_mark` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `icon` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `car_mark`
--

INSERT INTO `car_mark` (`id`, `name`, `icon`) VALUES
(1, 'Lada', '/content/mark/lada.png'),
(2, 'Kia', '/content/mark/kia.png');

-- --------------------------------------------------------

--
-- Структура таблицы `car_model`
--

CREATE TABLE `car_model` (
  `id` int(11) NOT NULL,
  `mark_id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `image` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `car_model`
--

INSERT INTO `car_model` (`id`, `mark_id`, `name`, `image`) VALUES
(1, 2, 'Ceed', '/content/model/ceed.png'),
(2, 2, 'Ceed SW', '/content/model/ceed_sw.png'),
(3, 2, 'Cerato', '/content/model/cerato.png'),
(4, 2, 'Picanto', '/content/model/picanto.png'),
(5, 2, 'Rio', '/content/model/rio.png'),
(6, 2, 'Rio New', '/content/model/rio_new.png'),
(7, 2, 'Rio X', '/content/model/rio_x.png'),
(8, 2, 'Rio X-Line', '/content/model/rio_x_line.png');

-- --------------------------------------------------------

--
-- Структура таблицы `car_view`
--

CREATE TABLE `car_view` (
  `id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `hex_color` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `account_session`
--
ALTER TABLE `account_session`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mark_id` (`mark_id`,`model_id`,`equipment_id`),
  ADD KEY `equipment_id` (`equipment_id`),
  ADD KEY `model_id` (`model_id`);

--
-- Индексы таблицы `car_country_origin`
--
ALTER TABLE `car_country_origin`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_equipment`
--
ALTER TABLE `car_equipment`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_fuel_grade`
--
ALTER TABLE `car_fuel_grade`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_mark`
--
ALTER TABLE `car_mark`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_model`
--
ALTER TABLE `car_model`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `car_view`
--
ALTER TABLE `car_view`
  ADD PRIMARY KEY (`id`),
  ADD KEY `car_id` (`car_id`);

--
-- Индексы таблицы `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `account_session`
--
ALTER TABLE `account_session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `car_country_origin`
--
ALTER TABLE `car_country_origin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `car_equipment`
--
ALTER TABLE `car_equipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `car_fuel_grade`
--
ALTER TABLE `car_fuel_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `car_mark`
--
ALTER TABLE `car_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `car_model`
--
ALTER TABLE `car_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `car_view`
--
ALTER TABLE `car_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`equipment_id`) REFERENCES `car_equipment` (`id`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`mark_id`) REFERENCES `car_mark` (`id`),
  ADD CONSTRAINT `car_ibfk_3` FOREIGN KEY (`model_id`) REFERENCES `car_model` (`id`);

--
-- Ограничения внешнего ключа таблицы `car_view`
--
ALTER TABLE `car_view`
  ADD CONSTRAINT `car_view_ibfk_1` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`);

--
-- Ограничения внешнего ключа таблицы `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
