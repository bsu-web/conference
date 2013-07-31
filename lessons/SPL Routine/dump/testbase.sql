CREATE TABLE IF NOT EXISTS `corral` (
  `corral_id` int(11) NOT NULL AUTO_INCREMENT,
  `corral_name` char(100) NOT NULL,
  PRIMARY KEY (`corral_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `corral`
--

INSERT INTO `corral` (`corral_id`, `corral_name`) VALUES
(1, 'Загон №1'),
(2, 'Загон №2'),
(3, 'Тандер блафф'),
(13, 'Загон №8'),
(12, 'Загон №7'),
(11, 'Загон №6'),
(10, 'Загон №5'),
(9, 'Загон №4');

-- --------------------------------------------------------

--
-- Table structure for table `cows`
--

CREATE TABLE IF NOT EXISTS `cows` (
  `cow_id` int(11) NOT NULL AUTO_INCREMENT,
  `cow_name` text NOT NULL,
  `cow_color` text NOT NULL,
  `corral_id` int(11) NOT NULL,
  PRIMARY KEY (`cow_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `cows`
--

INSERT INTO `cows` (`cow_id`, `cow_name`, `cow_color`, `corral_id`) VALUES
(1, 'Февралька', 'Чёрно - белая', 1),
(2, 'Пеструшка', 'Коричневый', 2),
(3, 'Питак', 'Коричневый', 2),
(4, 'Дварт', 'Коричневый', 3);
