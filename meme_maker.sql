-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 18, 2018 at 03:52 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meme maker`
--

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `url`) VALUES
(23, 'Creating a Class Diagram in Visio.mp4'),
(24, 'Creating a Class Diagram in Visio.mp4'),
(21, 'Creating a Class Diagram in Visio.mp4'),
(22, 'Creating a Class Diagram in Visio.mp4'),
(19, 'Creating a Class Diagram in Visio.mp4'),
(20, 'Creating a Class Diagram in Visio.mp4'),
(17, 'Creating a Class Diagram in Visio.mp4'),
(18, 'Creating a Class Diagram in Visio.mp4'),
(15, 'Creating a Class Diagram in Visio.mp4'),
(16, 'Creating a Class Diagram in Visio.mp4'),
(14, 'How To Get Fair Skin With Aloe Vera _ Aloe Vera Gel For Face _ rang gora karne ki tips in urdu.mp4'),
(13, 'How To Get Fair Skin With Aloe Vera _ Aloe Vera Gel For Face _ rang gora karne ki tips in urdu.mp4'),
(12, 'How To Get Fair Skin With Aloe Vera _ Aloe Vera Gel For Face _ rang gora karne ki tips in urdu.mp4'),
(11, 'Creating a Class Diagram in Visio.mp4'),
(25, 'Creating a Class Diagram in Visio.mp4'),
(26, 'Creating a Class Diagram in Visio.mp4'),
(27, 'Creating a Class Diagram in Visio.mp4'),
(28, 'Creating a Class Diagram in Visio.mp4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
