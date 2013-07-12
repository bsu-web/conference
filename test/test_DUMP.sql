-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июл 12 2013 г., 12:40
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `family` text NOT NULL,
  `patronymic` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `name`, `family`, `patronymic`) VALUES
(1, 'Григорий', 'Семёнов', 'Иванович'),
(2, 'Андрей', 'Игриков', 'Аристархович'),
(3, 'Гарик', 'Волоков', 'Семёнович');

-- --------------------------------------------------------

--
-- Структура таблицы `journal`
--

CREATE TABLE IF NOT EXISTS `journal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `journal_paper`
--

CREATE TABLE IF NOT EXISTS `journal_paper` (
  `journal_id` int(11) NOT NULL,
  `paper_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `journal_paper`
--

INSERT INTO `journal_paper` (`journal_id`, `paper_id`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `paper`
--

CREATE TABLE IF NOT EXISTS `paper` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `paper`
--

INSERT INTO `paper` (`id`, `title`, `content`) VALUES
(1, '"Абстрактные функции в php"', 'test-test-test-test-test-test-test-test-test-test-test-test-test-test-test-test-test-test-test-test'),
(2, '"Закономерности в логике", часть 1', 'test-test-test-test-test-test-test-test-test-test-test-test-test-test-test-test-test-test-test');

-- --------------------------------------------------------

--
-- Структура таблицы `paper_authors`
--

CREATE TABLE IF NOT EXISTS `paper_authors` (
  `paper_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `paper_authors`
--

INSERT INTO `paper_authors` (`paper_id`, `author_id`) VALUES
(1, 2),
(1, 3),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `thesis`
--

CREATE TABLE IF NOT EXISTS `thesis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `thesis`
--

INSERT INTO `thesis` (`id`, `title`, `content`) VALUES
(1, 'тезис_1', 'мини-контент_тезис_1'),
(2, 'тезис_2', 'мини-контент_тезис_2');

-- --------------------------------------------------------

--
-- Структура таблицы `thesis_authors`
--

CREATE TABLE IF NOT EXISTS `thesis_authors` (
  `thesis_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `thesis_authors`
--

INSERT INTO `thesis_authors` (`thesis_id`, `author_id`) VALUES
(1, 2),
(2, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
