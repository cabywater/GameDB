-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 25, 2013 at 02:48 PM
-- Server version: 5.5.28
-- PHP Version: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `u1072031`
--

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE IF NOT EXISTS `developer` (
  `developer_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `developer_name` varchar(30) NOT NULL,
  `developer_city` varchar(20) NOT NULL,
  `developer_country` varchar(30) NOT NULL,
  `date_established` date NOT NULL,
  `developer_website` varchar(50) NOT NULL,
  PRIMARY KEY (`developer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`developer_id`, `developer_name`, `developer_city`, `developer_country`, `date_established`, `developer_website`) VALUES
(1, 'NetherRealm Studios', 'Chicago', 'United States', '2010-04-09', 'http://www.netherrealm.com/'),
(5, 'Square Enix', 'Shibuya', 'Tokyo', '2003-04-01', 'http://www.square-enix.com/'),
(6, 'Ubisoft Montreal', 'Quebec', 'Canada', '1997-06-25', 'http://montreal.ubisoft.com/en'),
(7, 'EA Canada', 'British Columbia', 'Canada', '1983-01-15', 'http://www.easports.com/'),
(9, 'Rockstar North', 'Edinburgh', 'United Kingdom', '2002-07-09', 'http://www.rockstarnorth.com/'),
(10, 'Ninja Theory', 'Cambridge', 'United Kingdom', '2000-03-08', 'http://www.ninjatheory.com/'),
(11, 'Kojima Productions', 'Roppongi', 'Tokyo', '2005-04-01', 'http://www.konami.jp/kojima_pro/index.html'),
(12, 'Nintendo', 'Kyoto', 'Japan', '1983-09-30', 'http://www.nintendo.co.jp/');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `game_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `game_name` varchar(50) NOT NULL,
  `platforms` varchar(200) NOT NULL,
  `release_date` date NOT NULL,
  `age_rating` tinyint(3) unsigned NOT NULL,
  `cover_img` varchar(50) DEFAULT NULL,
  `developer_id` int(10) unsigned DEFAULT NULL,
  `genre_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `game_name`, `platforms`, `release_date`, `age_rating`, `cover_img`, `developer_id`, `genre_id`) VALUES
(1, 'FIFA 13', 'Microsoft Windows, Xbox 360, PlayStation 3', '2012-09-28', 3, '../images/fifa13cover.png', 7, 2),
(2, 'DMC (Devil May Cry)', 'PlayStation 3, Xbox 360, Microsoft Windows', '2013-12-15', 17, '../images/dmcboxart.png', 10, 6),
(3, 'Far Cry 3', 'Microsoft Windows, Playstation 3, Xbox 360', '2012-11-30', 17, '../images/farcry3boxart.png', 6, 1),
(4, 'Metal Gear Solid 4: Guns of the Patriots', 'Playstation 3', '2008-12-06', 17, '../images/mgsboxart.png', 11, 3),
(5, 'Final Fantasy XIII', 'PlayStation 3, Xbox 360', '2010-12-16', 12, '../images/ffxiiiboxart.png', 5, 4),
(6, 'Grand Theft Auto IV', 'PlayStation 3, Xbox 360, Microsoft Windows', '2008-04-29', 17, '../images/gtaivboxart.png', 9, 8),
(7, 'Super Mario Galaxy', 'Wii', '2007-11-16', 6, '../images/mariogalaxy.png', 12, 7),
(9, 'Mortal Kombat', 'PlayStation 3, Xbox 360, Playstation Vita', '2011-04-21', 17, '../images/mkboxart.png', 1, 5),
(10, 'Final Fantasy VII', 'PlayStation, Windows, Playstation Network', '1997-01-31', 13, '../images/finalfantasyviiboxart.png', 5, 4),
(11, 'Assassins Creed: Revelations', 'PlayStation 3, Xbox 360, Microsoft Windows, Cloud', '2011-11-15', 15, '../images/ascreedrev.png', 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE IF NOT EXISTS `genre` (
  `genre_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `genre_name` varchar(30) NOT NULL,
  `description` varchar(400) NOT NULL,
  PRIMARY KEY (`genre_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`genre_id`, `genre_name`, `description`) VALUES
(1, 'First-Person Shooter', 'First-person shooter (FPS) is a video game genre centered on gun and projectile weapon-based combat through a first-person perspective; that is, the player experiences the action through the eyes of the protagonist.'),
(2, 'Football Simulation', 'A sports simulation game is a video game that simulates the practice of traditional sports. Most sports have been recreated with a game, including team sports, athletics and extreme sports. Some games emphasize actually playing the sport, whilst others emphasize strategy and organization.'),
(3, 'Stealth Action', 'A stealth game is a video game genre that rewards the player for using stealth to overcome antagonists. Games in the genre typically allow the player to remain undetected by hiding, using disguises, and/or avoiding noise. Some games allow the player to choose between a stealthy approach or directly attacking antagonists, perhaps rewarding the player for greater levels of stealth.'),
(4, 'Role-playing', 'Role-playing video games (commonly referred to as role-playing games or RPGs are a video game genre where the player controls the actions of a protagonist as this character lives immersed in a fictional world. The player in RPGs controls one character, or several adventuring party members, fulfilling one or many quests.'),
(5, 'Fighting', 'Fighting game is a video game genre where the player controls an on-screen character and engages in close combat with an opponent. These characters tend to be of equal power and fight matches consisting of several rounds, which take place in an arena. Players must master techniques such as blocking, counter-attacking, and chaining together sequences of attacks known as "combos".'),
(6, 'Hack and Slash', ' In console and arcade-style video games, the usage specifically implies a focus on combat with hand-to-hand weapons. In other contexts it is more general, and an archer or unarmed martial artist may participate as fully in a hack and slash game, or be as hack-and-slash oriented as an individual, as an armed melee fighter.'),
(7, 'Platform', 'A platform game is a video game which requires players to jump to and from suspended platforms or over obstacles. The player must control these jumps to avoid falling from platforms or missing necessary jumps. The most common unifying element to games in this video game genre is a jump button; other jump mechanics include swinging from extendable arms.'),
(8, 'Action-adventure', 'An action-adventure game is a video game that combines elements of the adventure game genre with various action game elements. It is perhaps the broadest and most diverse genre in gaming, and can include many games which might better be categorized under narrow genres.');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
