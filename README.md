# TestDayPHP
Необхідно створити сервіс обліку документів.

sql - скрипт

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Гру 19 2023 р., 18:59
-- Версія сервера: 8.0.30
-- Версія PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `documents`
--

-- --------------------------------------------------------

--
-- Структура таблиці `Client`
--

CREATE TABLE `Client` (
  `client_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `tax_id` varchar(20) NOT NULL,
  `contact_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `Client`
--

INSERT INTO `Client` (`client_id`, `name`, `tax_id`, `contact_number`) VALUES
(2, 'Client2', '987654321', '+98765432109'),
(3, 'Client1', '123456789', '+12345678901'),
(4, 'dmytro', '123456789', '1234567899'),
(5, 'dmytro', '123456789', '1234567899'),
(6, 'dmytro', '3453454', '3454356456'),
(7, 'dmytro', '44645457567', '4747566'),
(8, 'dmytro', '44645457567', '4747566'),
(9, 'dmytro', '44645457567', '4747566'),
(10, 'dmytro', '44645457567', '4747566'),
(11, 'dmytro', '44645457567', '4747566'),
(12, 'dmytro', '44645457567', '4747566'),
(13, 'dmytro', '44645457567', '4747566');

-- --------------------------------------------------------

--
-- Структура таблиці `Contract`
--

CREATE TABLE `Contract` (
  `contract_id` int NOT NULL,
  `client_id` int DEFAULT NULL,
  `signing_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `Contract`
--

INSERT INTO `Contract` (`contract_id`, `client_id`, `signing_date`, `expiry_date`, `amount`) VALUES
(2, 2, '2023-02-01', '2024-02-01', '8000.00');

-- --------------------------------------------------------

--
-- Структура таблиці `Employee`
--

CREATE TABLE `Employee` (
  `employee_id` int NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `photo` blob,
  `contract_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `Employee`
--

INSERT INTO `Employee` (`employee_id`, `full_name`, `birth_date`, `salary`, `photo`, `contract_id`) VALUES
(1, 'John Doe', '1990-01-15', '60000.00', NULL, NULL),
(2, 'Jane Smith', '1985-05-20', '75000.00', NULL, NULL),
(3, 'dmytro', '2023-12-12', '342335.00', NULL, NULL);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`client_id`);

--
-- Індекси таблиці `Contract`
--
ALTER TABLE `Contract`
  ADD PRIMARY KEY (`contract_id`),
  ADD KEY `contract_ibfk_1` (`client_id`);

--
-- Індекси таблиці `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`employee_id`),
  ADD KEY `contract_id` (`contract_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `Client`
--
ALTER TABLE `Client`
  MODIFY `client_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблиці `Contract`
--
ALTER TABLE `Contract`
  MODIFY `contract_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `Employee`
--
ALTER TABLE `Employee`
  MODIFY `employee_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `Contract`
--
ALTER TABLE `Contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `Client` (`client_id`) ON DELETE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `Employee`
--
ALTER TABLE `Employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `Contract` (`contract_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


