-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 26, 2013 at 02:43 PM
-- Server version: 5.5.31-0ubuntu0.12.10.1
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `BlueAnime`
--
use BlueAnime;
-- --------------------------------------------------------

--
-- Table structure for table `ChatMessages`
--

CREATE TABLE IF NOT EXISTS `ChatMessages` (
  `C_Id` int(11) NOT NULL AUTO_INCREMENT,
  `U_Id` int(11) NOT NULL,
  `Message` text NOT NULL,
  `CreationDate` datetime NOT NULL,
  `Edited` tinyint(1) NOT NULL DEFAULT '0',
  `Blocked` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`C_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `ChatMessages`
--

INSERT INTO `ChatMessages` (`C_Id`, `U_Id`, `Message`, `CreationDate`, `Edited`, `Blocked`) VALUES
(1, 1, 'Hallo Welt!', '2013-01-18 19:01:44', 1, 0),
(2, 1, 'Tsch&uuml;ss Welt :(', '2013-01-18 19:01:44', 0, 0),
(3, 1, 'Hallo Leute Was geht...Warum ist niemand im Chat?', '2013-04-07 16:04:54', 0, 0),
(4, 1, 'adaesafse', '2013-04-07 21:27:48', 0, 0),
(5, 1, 'Hallo Welt', '2013-04-07 23:14:38', 0, 0),
(6, 1, 'Hallo Welt!', '2013-04-13 18:30:24', 0, 0),
(7, 1, 'moin moin min Jung', '2013-04-13 18:33:21', 0, 0),
(8, 1, 'Hallo Fettbacke', '2013-04-15 13:10:37', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Folgen`
--

CREATE TABLE IF NOT EXISTS `Folgen` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SerienId` int(11) NOT NULL,
  `Folge` int(11) NOT NULL,
  `Titel` text NOT NULL,
  `Dateipfad` text NOT NULL,
  KEY `Id` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Genres`
--

CREATE TABLE IF NOT EXISTS `Genres` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(32) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `Genres`
--

INSERT INTO `Genres` (`Id`, `Name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `News`
--

CREATE TABLE IF NOT EXISTS `News` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(64) NOT NULL,
  `Text` text NOT NULL,
  `CreationDate` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `News`
--

INSERT INTO `News` (`Id`, `Title`, `Text`, `CreationDate`) VALUES
(4, 'test4', 'Hallo Welt', '2012-12-30'),
(5, 'test5', 'Moin Moin Sven... Diese News sind nur für dich', '2013-01-17'),
(6, 'Die Seite wird am 26. 11. er&ouml;ffnet', 'Der Titel sagt eigendlich alles. Bald sind wir so weit. Der Countdown ist angelaufen.', '2013-04-13');

-- --------------------------------------------------------

--
-- Table structure for table `SerieInGenre`
--

CREATE TABLE IF NOT EXISTS `SerieInGenre` (
  `S_ID` int(11) NOT NULL,
  `G_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SerieInGenre`
--

INSERT INTO `SerieInGenre` (`S_ID`, `G_ID`) VALUES
(11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Serien`
--

CREATE TABLE IF NOT EXISTS `Serien` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Userlevel` int(11) NOT NULL,
  `Shortdescription` text NOT NULL,
  `Picturename` text NOT NULL,
  `Year` varchar(16) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id` (`Id`),
  KEY `Userlevel` (`Userlevel`),
  KEY `Id_2` (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `Serien`
--

INSERT INTO `Serien` (`Id`, `Name`, `Userlevel`, `Shortdescription`, `Picturename`, `Year`, `Description`) VALUES
(1, 'awefawe3', 0, 'awefawef', 'default.png', '', 'awfawf');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Password` text NOT NULL,
  `email` text NOT NULL,
  `Userlevel` int(11) NOT NULL,
  UNIQUE KEY `Id_2` (`Id`),
  KEY `Id` (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`Id`, `Name`, `Password`, `email`, `Userlevel`) VALUES
(1, 'jan', '598d4c200461b81522a3328565c25f7c', 'amenophisthegod@googlemail.com', 100),
(2, 'meeni', '6a204bd89f3c8348afd5c77c717a097a', 'asdf.asdf@asdf.asdf', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
