-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 10 2018 г., 22:16
-- Версия сервера: 5.6.37
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `keram`
--

-- --------------------------------------------------------

--
-- Структура таблицы `contact`
--

CREATE TABLE `contact` (
  `idc` int(11) NOT NULL,
  `idu` int(250) NOT NULL,
  `mes` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `contact`
--

INSERT INTO `contact` (`idc`, `idu`, `mes`) VALUES
(3, 3, 'fghfghg');

-- --------------------------------------------------------

--
-- Структура таблицы `kat`
--

CREATE TABLE `kat` (
  `idk` int(11) NOT NULL,
  `kat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `kat`
--

INSERT INTO `kat` (`idk`, `kat`) VALUES
(4, 'Кафель для ванны'),
(5, 'Кафель для кухни'),
(6, 'Кафель для пола'),
(7, 'Керамогранит'),
(8, 'Распродажа'),
(9, 'Мозаика'),
(10, 'Клинкерная плитка');

-- --------------------------------------------------------

--
-- Структура таблицы `korzina`
--

CREATE TABLE `korzina` (
  `idko` int(11) NOT NULL,
  `idt` int(11) NOT NULL,
  `idu` int(11) NOT NULL,
  `kolvo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `korzina`
--

INSERT INTO `korzina` (`idko`, `idt`, `idu`, `kolvo`) VALUES
(2, 4, 3, 1),
(5, 13, 3, 1),
(6, 14, 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tovar`
--

CREATE TABLE `tovar` (
  `idt` int(11) NOT NULL,
  `nametov` varchar(100) NOT NULL,
  `opistovar` text NOT NULL,
  `imagetovar` varchar(100) NOT NULL,
  `idk` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `datad` date NOT NULL,
  `h` int(11) NOT NULL,
  `w` int(11) NOT NULL,
  `kolvom` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tovar`
--

INSERT INTO `tovar` (`idt`, `nametov`, `opistovar`, `imagetovar`, `idk`, `cena`, `datad`, `h`, `w`, `kolvom`) VALUES
(1, 'ОНИКС 3', 'Настенная глянцевая плитка \r\nЦвет: светло-бежевый', './images/product/0491-300x300.jpg', 4, 387, '0000-00-00', 20, 30, 0),
(2, 'ТЕМАРИ МОЗАИКА ', 'Производитель: Kerama Marazzi/Россия\r\n\r\n', './images/product/0457-300x300.jpg', 9, 162, '2017-11-21', 30, 30, 0),
(3, 'ВЕНЕЦИЯ 7П', '', './images/product/3813-300x300.jpg', 6, 500, '2017-11-21', 30, 30, 0),
(4, 'TERRA', 'БЕЖЕВЫЙ С-ТВК011D\r\nПроизводитель: Cersanit/Польша', './images/product/3483-300x300.jpg', 4, 530, '2017-11-21', 30, 20, 0),
(5, 'ФАНТАЗИЯ 09 032 ', 'КОРИЧНЕВАЯ \r\nПроизводитель: ИнтерКерама/Россия', './images/product/00321-300x300.jpg', 6, 850, '2017-11-27', 45, 45, 0),
(6, ' ARABESKI PURPLE PG 03', 'Производитель: Gracia Ceramica/Россия', './images/product/860379_auto_240_jpg.jpg', 6, 940, '2018-01-14', 45, 45, 0),
(7, 'МАРМАРА', 'Производитель: Кировская Керамика/Россия\r\nРозовая', './images/product/mac_mini2014_auto_240_jpg.jpg', 7, 820, '2018-01-14', 33, 33, 0),
(8, 'РОДОНИТ', 'ОБЪЕМНАЯ\r\nПроизводитель: М-квадрат/Россия', './images/product/702894_0_auto_240_jpg.jpg', 7, 680, '2018-01-15', 33, 33, 0),
(9, 'BELLARIVA ', 'Производитель: Cersanit/Польша', './images/product/702989.jpg', 6, 920, '2018-01-15', 42, 42, 0),
(10, 'PELEGRINA BEIGE PANNO', 'ПАННО\r\nПроизводитель: Gracia Ceramica/Россия', './images/product/703033.jpg', 4, 635, '2018-01-15', 50, 40, 0),
(11, 'ТРАДИЦИЯ КЛЕТКА', 'Производитель: Kerama Marazzi/Россия', './images/product/760533_1.jpg', 6, 850, '2018-01-15', 30, 30, 0),
(12, 'ГРАДАРА ', 'БЕЖЕВЫЙ', './images/product/351259_0_175_auto_jpg.jpg', 6, 690, '2018-01-15', 45, 45, 0),
(13, 'АРОМА БЕЖЕВЫЙ ', 'Производитель: Global Tile/Россия', './images/product/351254_0_auto_130_jpg.jpg', 5, 650, '2018-01-15', 25, 45, 0),
(14, 'АСТРД ', 'КОФЕЙНАЯ \r\nПроизводитель: Ласселсбергер/Россия', './images/product/353593_0_175_auto_jpg.jpg', 5, 800, '2018-01-15', 20, 40, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `idu` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `password` varchar(15) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `tel` varchar(12) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`idu`, `login`, `password`, `fio`, `adres`, `tel`, `email`) VALUES
(1, 'admin', '111', 'Администратор', 'Строительная 75-5', '544-55-55', 'srt@mail.ru'),
(2, 'irinahart', '111', 'Линк Ирина Александровна', 'Строительная 66-7', '77-58-96', 'tt@mail.ru'),
(3, 'anna', '111', 'Иванова Анна Александровна', 'Ленина 6-71', '11111111', 'irinahart@mail.ru'),
(4, 'krav', '111', 'Кравцова Марина Анатольевна', 'Строительна 95-7', '8741-22-33', 'krav@mail.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idc`),
  ADD KEY `FK_contact_users` (`idu`);

--
-- Индексы таблицы `kat`
--
ALTER TABLE `kat`
  ADD PRIMARY KEY (`idk`);

--
-- Индексы таблицы `korzina`
--
ALTER TABLE `korzina`
  ADD PRIMARY KEY (`idko`),
  ADD KEY `idu` (`idu`),
  ADD KEY `FK_korzina_tovar` (`idt`);

--
-- Индексы таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD PRIMARY KEY (`idt`),
  ADD KEY `FK_tovar_kat` (`idk`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idu`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `contact`
--
ALTER TABLE `contact`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `kat`
--
ALTER TABLE `kat`
  MODIFY `idk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT для таблицы `korzina`
--
ALTER TABLE `korzina`
  MODIFY `idko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `tovar`
--
ALTER TABLE `tovar`
  MODIFY `idt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `idu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `FK_contact_users` FOREIGN KEY (`idu`) REFERENCES `users` (`idu`);

--
-- Ограничения внешнего ключа таблицы `korzina`
--
ALTER TABLE `korzina`
  ADD CONSTRAINT `FK_korzina_tovar` FOREIGN KEY (`idt`) REFERENCES `tovar` (`idt`),
  ADD CONSTRAINT `korzina_ibfk_1` FOREIGN KEY (`idu`) REFERENCES `users` (`idu`);

--
-- Ограничения внешнего ключа таблицы `tovar`
--
ALTER TABLE `tovar`
  ADD CONSTRAINT `FK_tovar_kat` FOREIGN KEY (`idk`) REFERENCES `kat` (`idk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
