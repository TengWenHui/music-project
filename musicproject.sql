-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 12, 2022 at 11:50 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `musicproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `create_playlist`
--

DROP TABLE IF EXISTS `create_playlist`;
CREATE TABLE IF NOT EXISTS `create_playlist` (
  `playlist_xid` int(11) NOT NULL AUTO_INCREMENT,
  `song_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`playlist_xid`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `create_playlist`
--

INSERT INTO `create_playlist` (`playlist_xid`, `song_id`, `user_id`) VALUES
(15, 2, 1),
(16, 4, 1),
(14, 4, 1),
(13, 2, 1),
(12, 3, 1),
(6, 6, 1),
(17, 6, 1),
(18, 6, 1),
(19, 3, 1),
(20, 3, 1),
(21, 3, 1),
(22, 4, 1),
(23, 6, 1),
(24, 6, 1),
(25, 20, 1),
(26, 6, 1),
(27, 10, 1),
(28, 6, 1),
(29, 3, 1),
(34, 3, 2914),
(32, 8, 2912);

-- --------------------------------------------------------

--
-- Table structure for table `favourites_song`
--

DROP TABLE IF EXISTS `favourites_song`;
CREATE TABLE IF NOT EXISTS `favourites_song` (
  `favourite_xid` int(11) NOT NULL AUTO_INCREMENT,
  `song_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`favourite_xid`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `favourites_song`
--

INSERT INTO `favourites_song` (`favourite_xid`, `song_id`, `user_id`) VALUES
(38, 6, 2912),
(32, 6, 1),
(31, 3, 1),
(37, 10, 2912),
(36, 4, 123),
(35, 2, 123),
(34, 3, 1),
(33, 10, 1),
(30, 3, 1),
(39, 6, 2912),
(40, 10, 2912),
(41, 5, 2915),
(44, 3, 2914),
(43, 20, 2915);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `login_xid` int(11) NOT NULL AUTO_INCREMENT,
  `login_username` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `login_email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `login_password` varchar(16) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`login_xid`)
) ENGINE=MyISAM AUTO_INCREMENT=2916 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_xid`, `login_username`, `login_email`, `login_password`) VALUES
(2915, 'gem', 'gem77@gmail.com', '12345678'),
(2914, 'damian123', 'damian123@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

DROP TABLE IF EXISTS `playlist`;
CREATE TABLE IF NOT EXISTS `playlist` (
  `playlist_xid` int(11) NOT NULL AUTO_INCREMENT,
  `playlist_title` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `playlist_image` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`playlist_xid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`playlist_xid`, `playlist_title`, `playlist_image`) VALUES
(1, 'Blackpink', 'bpcover6.jpg'),
(2, 'Sorn', 'sorncover6.jpg'),
(3, 'GOT7', 'got7cover6.jpg'),
(4, '邓紫棋', 'gemcover4.jpg'),
(5, 'Billie Eillish', 'becover4.jpg'),
(6, 'RISA ORIBE', 'rocover6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `playlist_items`
--

DROP TABLE IF EXISTS `playlist_items`;
CREATE TABLE IF NOT EXISTS `playlist_items` (
  `playlistitem_xid` int(11) NOT NULL AUTO_INCREMENT,
  `song_FK` int(11) NOT NULL,
  `playlist_FK` int(11) NOT NULL,
  `user_FK` int(11) NOT NULL,
  PRIMARY KEY (`playlistitem_xid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `playlist_items`
--

INSERT INTO `playlist_items` (`playlistitem_xid`, `song_FK`, `playlist_FK`, `user_FK`) VALUES
(1, 3, 1, 1),
(2, 2, 1, 1),
(3, 1, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1),
(6, 6, 2, 1),
(7, 7, 2, 1),
(8, 8, 2, 1),
(9, 9, 2, 1),
(10, 10, 3, 1),
(11, 11, 3, 1),
(12, 12, 3, 1),
(13, 13, 3, 1),
(14, 14, 3, 1),
(15, 15, 4, 1),
(16, 16, 4, 1),
(17, 17, 4, 1),
(18, 18, 5, 1),
(19, 19, 5, 1),
(20, 20, 5, 1),
(21, 21, 6, 1),
(22, 22, 6, 1),
(23, 23, 6, 1),
(24, 24, 6, 1),
(25, 25, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

DROP TABLE IF EXISTS `songs`;
CREATE TABLE IF NOT EXISTS `songs` (
  `song_xid` int(11) NOT NULL AUTO_INCREMENT,
  `song_title` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `song_image` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `song_rating` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `song_duration` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `song_url` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`song_xid`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_xid`, `song_title`, `song_image`, `song_rating`, `song_duration`, `song_url`) VALUES
(1, 'How You Like That', 'bpcover1.jpg', ' 646,918,901', ' 3:00', 'HowYouLikeThat.mp3'),
(2, 'As If It\'s Your Last', 'bpcover2.jpg', '383,792,521', '3:33', 'AsIfItsYourLast.mp3'),
(3, 'DDU-DU DDU-DU', 'bpcover3.jpg', '506,739,810', '3:29', 'DUDUDU.mp3'),
(4, 'Kill This Love', 'bpcover4.jpg', '599,726,207', '3:09', 'KillThisLove.mp3'),
(5, 'Boombayah', 'bpcover5.jpg', '364,756,423', '4:00', 'BoomBayah.mp3'),
(6, 'Save Me', 'sorncover1.jpg', '194,232', '3:40', 'SaveMe.mp3'),
(7, 'Sharp Objects', 'sorncover2.jpg', '1,401,996', '2:49', 'SharpObjects.mp3'),
(8, 'RUN', 'sorncover3.jpeg', '3,822,402', '2:44', 'Run.mp3'),
(9, 'Scorpio', 'sorncover4.jpg', '478,348', '3:36', 'Scorpio.mp3'),
(10, 'NANANA', 'got7cover1.jpg', '1,1629,013', '3:07', 'Nanana.mp3'),
(11, 'Just Right', 'got7cover2.jpg', '54,397,133', '3:42', 'JustRight.mp3'),
(12, 'You Calling My Name', 'got7cover3.jpg', '66,859,483', '3:14', 'YouCallingMyName.mp3'),
(13, 'Not By The Moon', 'got7cover4.jpg', '49,587,816', '3:24', 'NotByTheMoon.mp3'),
(14, 'ECLIPSE', 'got7cover5.jpg', '24,660,695', '3:29', 'Eclipse.mp3'),
(15, '泡沫', 'gemcover1.jpg', '48,639,189', '4:18', 'PaoMo.mp3'),
(16, '光年之外', 'gemcover2.jpg', '59,122,752', '3:42', 'GuangNianZhiWai.mp3'),
(17, '喜欢你', 'gemcover3.jpg', '24,707,564', '4:30', 'XihuanNi.mp3'),
(18, 'Happier Than Ever', 'becover1.jpg', '691,934,024', '4:58', 'HappierThanEver.mp3'),
(19, 'Everything I Wanted', 'becover2.jpg', '1,099,157,254', '4:05', 'EverythingIWanted.mp3'),
(20, 'Bad Guy', 'becover3.jpg', '2,083,271,874', '3:14', 'BadGuy.mp3'),
(21, 'Gurenge', 'rocover1.jpg', '300,103,657', '3:57', 'Gurenge.mp3'),
(22, 'Crossing Field', 'rocover2.jpg', '128,695,356', '4:08', 'CrossingFields.mp3'),
(23, 'Homura', 'rocover3.jpg', '140,372,206', '4:35', 'Homura.mp3'),
(24, 'Akeboshi', 'rocover4.jpg', '20,430,071', '4:29', 'Akeboshi.mp3'),
(25, 'ADAMAS', 'rocover5.jpg', '54,024,578', '3:45', 'Adamas.mp3');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
