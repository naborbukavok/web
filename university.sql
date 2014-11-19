-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 19 2014 г., 23:53
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `university`
--

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `tid` int(10) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`tid`, `content`) VALUES
(1, 'случайным образом (распределяет система)'),
(2, 'принудительно (распределяет \r\nпреподаватель)'),
(3, 'по выбору (выбирают сами студенты)');

-- --------------------------------------------------------

--
-- Структура таблицы `proffessors`
--

CREATE TABLE IF NOT EXISTS `proffessors` (
  `id` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Secondname` char(50) NOT NULL,
  `Name` char(50) NOT NULL,
  `Middlename` char(50) NOT NULL,
  `Acs` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `proffessors`
--

INSERT INTO `proffessors` (`id`, `pid`, `login`, `password`, `Secondname`, `Name`, `Middlename`, `Acs`) VALUES
(1, 1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Краюшкин', 'Владимир', 'Валентинович', 1),
(2, 2, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'Карвовский', 'Дмитрий', 'Александрович', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `GroupID` int(10) unsigned NOT NULL,
  `Numb` int(10) unsigned NOT NULL,
  `Secondname` char(50) NOT NULL,
  `Name` char(50) NOT NULL,
  `Middlename` char(50) NOT NULL,
  `Acs` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `login`, `password`, `GroupID`, `Numb`, `Secondname`, `Name`, `Middlename`, `Acs`) VALUES
(1, 'nabor', '8d7cf27db66ab79c3fd603989ca40ff8', 7, 13, 'Мизинов', 'Сергей', 'Викторович', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(10) unsigned NOT NULL,
  `pid` int(10) unsigned NOT NULL,
  `task_id` int(10) unsigned NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `pid`, `task_id`, `text`) VALUES
(1, 1, 1, 'Описание первого задания');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
