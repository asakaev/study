# ************************************************************
# Sequel Pro SQL dump
# Версия 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Адрес: 127.0.0.1 (MySQL 5.6.17)
# Схема: study
# Время создания: 2014-06-19 20:53:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы disciplines
# ------------------------------------------------------------

DROP TABLE IF EXISTS `disciplines`;

CREATE TABLE `disciplines` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `disc_name` text,
  `kaf_fkey_id` int(11) DEFAULT NULL,
  `disc_alias` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `disciplines` WRITE;
/*!40000 ALTER TABLE `disciplines` DISABLE KEYS */;

INSERT INTO `disciplines` (`id`, `disc_name`, `kaf_fkey_id`, `disc_alias`)
VALUES
	(1,'tes5',2,'t5'),
	(2,'Информатика1',2,'Инф1'),
	(3,'Управление на предприятии',1,'УнП'),
	(4,'Экономика',1,'Экон'),
	(5,'Математический анализ',2,'Матан'),
	(6,'Компьютерная графика',2,'КГ'),
	(7,'Финансы и кредит',3,'ФиК');

/*!40000 ALTER TABLE `disciplines` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы kafedra
# ------------------------------------------------------------

DROP TABLE IF EXISTS `kafedra`;

CREATE TABLE `kafedra` (
  `kaf_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `kaf_name` text,
  PRIMARY KEY (`kaf_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `kafedra` WRITE;
/*!40000 ALTER TABLE `kafedra` DISABLE KEYS */;

INSERT INTO `kafedra` (`kaf_id`, `kaf_name`)
VALUES
	(1,'Кафедра Менеджмента'),
	(2,'Кафедра ПО ВТ и АС'),
	(3,'Кафедра Финансов');

/*!40000 ALTER TABLE `kafedra` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
