-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 22 2013 г., 17:40
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
-- Структура таблицы `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `text` text CHARACTER SET utf8 NOT NULL,
  `file` text NOT NULL,
  `group_id` int(11) NOT NULL,
  `datetime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=33 ;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `author`, `text`, `file`, `group_id`, `datetime`) VALUES
(1, 1, 'HI!', '', 1, '2013-08-01 04:53:22'),
(2, 2, 'Hello!', '', 1, '2013-08-02 07:29:48'),
(3, 3, 'HI!', '', 1, '2013-08-03 07:30:00'),
(32, 2, '222', '', 1, '2013-08-26 10:16:20');

-- --------------------------------------------------------

--
-- Структура таблицы `message_group`
--

CREATE TABLE IF NOT EXISTS `message_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `userset` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `message_group`
--

INSERT INTO `message_group` (`id`, `title`, `userset`) VALUES
(1, 'Message group 1', 1),
(2, 'Message group 2', 2);

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
-- Структура таблицы `rulemap`
--

CREATE TABLE IF NOT EXISTS `rulemap` (
  `rule_id` int(11) NOT NULL,
  `rule_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rulemap`
--

INSERT INTO `rulemap` (`rule_id`, `rule_name`) VALUES
(1, 'USER'),
(2, 'GUEST'),
(3, 'TEST');

-- --------------------------------------------------------

--
-- Структура таблицы `rules`
--

CREATE TABLE IF NOT EXISTS `rules` (
  `user_id` int(11) NOT NULL,
  `obj_id` int(11) NOT NULL,
  `rule_id` int(11) NOT NULL,
  `obj_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `rules`
--

INSERT INTO `rules` (`user_id`, `obj_id`, `rule_id`, `obj_type`) VALUES
(3, 1, 1, 'MessageGroup'),
(1, 1, 1, 'MessageGroup'),
(1, 2, 1, 'MessageGroup'),
(2, 2, 1, 'MessageGroup'),
(2, 1, 1, 'MessageGroup');

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

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `user`, `pass`) VALUES
(1, 'Peter', 'peter', 'peter'),
(2, 'Vova', 'vova', 'vova'),
(3, 'Tom', 'tom', 'tom'),
(4, 'Nikolai', 'nikolai', 'nikolai');

-- --------------------------------------------------------

--
-- Структура таблицы `userset`
--

CREATE TABLE IF NOT EXISTS `userset` (
  `userset` int(11) NOT NULL,
  `user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `userset`
--

INSERT INTO `userset` (`userset`, `user`) VALUES
(1, 2),
(1, 1),
(1, 3),
(2, 1),
(2, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
