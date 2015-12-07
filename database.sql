-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 07, 2015 at 08:03 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techmuzz`
--
CREATE DATABASE IF NOT EXISTS `techmuzz` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `techmuzz`;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` bigint(20) unsigned NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `content` text,
  `date` date NOT NULL,
  `publish` tinyint(1) NOT NULL DEFAULT '1',
  `commentsAllowed` tinyint(1) NOT NULL DEFAULT '1',
  `commentCount` int(10) NOT NULL DEFAULT '0',
  `user_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `content`, `date`, `publish`, `commentsAllowed`, `commentCount`, `user_id`) VALUES
(1, 'ISIS Deadliest Attack On Paris', 'Paris, France (CNN)French authorities took the offensive Wednesday, raiding a purported hideout of the ringleader in last week''s deadly Paris attacks in an ordeal that ended with eight detained, two dead and potentially more bloodshed thwarted in the European nation.\r\n\r\nBut what about that ringleader, Abdelhamid Abaaoud?\r\n\r\nParis prosecutor Francois Molins said Wednesday that Abaaoud, a Frenchman who''s thought to have recently come from ISIS'' de facto capital of Raqqa in Syria, was thought to have holed up at one point on the third floor of an apartment building in Saint-Denis, a northern Paris suburb. Whether he was there when scores of heavily armed French police launched their assault at 4:20 a.m. Wednesday (10:20 p.m. ET Tuesday) is unknown.\r\n\r\nAuthorities zeroed in on the building in Saint-Denis after picking up phone conversations indicating that a relative of Abaaoud might be there. They met fierce resistance from the start, including a woman who blew herself up and bullets flying back and forth for about an hour. The French officers even used powerful munitions, which led to one floor collapsing.\r\n\r\nThat violence produced rubble that included body parts, on which investigators are conducting DNA tests, trying to pinpoint the identities of the two slain terrorists.\r\n\r\nMolins did note that neither Abaaoud or Salah Abdeslam, who also was allegedly involved in last week''s bloodshed, are among the eight detained.\r\n\r\nFrench President Francois Hollande held up the vicious back-and-forth as further proof that "we are at war" with ISIS.\r\n\r\n"What the terrorists were targeting was what France represents. This is what was attacked on the night of November 13th," he said. "These barbarians targeted France''s diversity. It was the youth of France who were targeted simply because they represent life."\r\n\r\nGiven this threat, Hollande has proposed extending France''s state of emergency for three more months -- a measure that, among other things, gives authorities greater powers in conducting searches, holding people and dissolving certain groups. He''ll also appeal to world leaders -- including meeting next week with U.S. President Barack Obama and Russian President Vladimir Putin, who have been at odds on what to do in Syria -- to go after the savage Islamist extremist group.\r\n\r\n"There is no more ... divide. There are only men and women of duty," he said. "... We must destroy this army that menaces the entire world, not just some countries."', '2015-11-18', 1, 1, 21, 1),
(2, 'ISIS coolest Attack On Paris', '\r\n\r\nBut what about that ringleader, Abdelhamid Abaaoud?\r\n\r\nParis prosecutor Francois Molins said Wednesday that Abaaoud, a Frenchman who''s thought to have recently come from ISIS'' de facto capital of Raqqa in Syria, was thought to have holed up at one point on the third floor of an apartment building in Saint-Denis, a northern Paris suburb. Whether he was there when scores of heavily armed French police launched their assault at 4:20 a.m. Wednesday (10:20 p.m. ET Tuesday) is unknown.\r\n\r\nAuthorities zeroed in on the building in Saint-Denis after picking up phone conversations indicating that a relative of Abaaoud might be there. They met fierce resistance from the start, including a woman who blew herself up and bullets flying back and forth for about an hour. The French officers even used powerful munitions, which led to one floor collapsing.\r\n\r\nThat violence produced rubble that included body parts, on which investigators are conducting DNA tests, trying to pinpoint the identities of the two slain terrorists.\r\n\r\nMolins did note that neither Abaaoud or Salah Abdeslam, who also was allegedly involved in last week''s bloodshed, are among the eight detained.\r\n\r\nFrench President Francois Hollande held up the vicious back-and-forth as further proof that "we are at war" with ISIS.\r\n\r\n"What the terrorists were targeting was what France represents. This is what was attacked on the night of November 13th," he said. "These barbarians targeted France''s diversity. It was the youth of France who were targeted simply because they represent life."\r\n\r\nGiven this threat, Hollande has proposed extending France''s state of emergency for three more months -- a measure that, among other things, gives authorities greater powers in conducting searches, holding people and dissolving certain groups. He''ll also appeal to world leaders -- including meeting next week with U.S. President Barack Obama and Russian President Vladimir Putin, who have been at odds on what to do in Syria -- to go after the savage Islamist extremist group.\r\n\r\n"There is no more ... divide. There are only men and women of duty," he said. "... We must destroy this army that menaces the entire world, not just some countries."', '2015-12-18', 1, 0, 1, 1),
(5, 'Parth1', 'dsfsdf ', '2015-12-05', 1, 1, 0, 1),
(7, 'Parth3', 'sd dsfs f', '2015-12-06', 1, 1, 0, 1),
(8, 'Technology stuff', 'only tech category test', '2015-12-06', 1, 1, 0, 1),
(9, 'parth post 1', 'hi how are oyu', '2015-12-06', 1, 1, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `articles_tags`
--

DROP TABLE IF EXISTS `articles_tags`;
CREATE TABLE `articles_tags` (
  `id` bigint(20) unsigned NOT NULL,
  `article_id` bigint(20) unsigned NOT NULL,
  `tag_id` bigint(20) unsigned NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `articles_tags`
--

INSERT INTO `articles_tags` (`id`, `article_id`, `tag_id`) VALUES
(2, 2, 1),
(3, 1, 3),
(18, 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL,
  `article_id` bigint(20) unsigned NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `authorName` varchar(50) DEFAULT NULL,
  `authorEmail` varchar(50) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `content`, `date`, `authorName`, `authorEmail`, `approved`) VALUES
(1, 1, 'Hi, This is very informative article.', '2015-11-18', 'Parth Kheni', 'kheni.parth@gmail.com', 1),
(2, 1, 'Hi, This is new comment', '2015-12-03', 'Parth Kheni', 'kheni.parth@gmail.com', 0),
(3, 2, 'Hi, This is new comment', '2015-12-03', 'Parth Kheni', 'kheni.parth@gmail.com', 1),
(5, 1, 'first comment', '1970-01-01', 'gajesh', 'a@b.c', 1),
(6, 1, 'test 1', '1970-01-01', 'swapna', 'swapna@gmail.com', 1),
(7, 1, 'test 2', '1970-01-01', 'parth', 'sf', 0),
(8, 1, 'test 2', '1970-01-01', 'parth', 'sf', 0),
(9, 1, 'test 2', '1970-01-01', 'parth', 'sf', 0),
(10, 1, 'test 3', '1970-01-01', 'parth', 'swapna@gmail.com', 0),
(11, 1, 'sdf', '1970-01-01', 'parth', 'a@b.c', 0),
(12, 1, 'sdfa', '1970-01-01', 'parth', 'a@b.c', 0),
(13, 1, 'sdf sdf s f', '1970-01-01', 'parth', 'a@b.c', 0),
(14, 1, 'sdfs f', '1970-01-01', 'parth', 'a@b.c', 0),
(15, 1, 'sdfs f', '1970-01-01', 'parth', 'a@b.c', 0),
(16, 1, 'sdfs f', '1970-01-01', 'parth', 'a@b.c', 0),
(17, 1, '\r\ntime check', '1970-01-01', 'parth', 'sf', 0),
(18, 1, 'sf fs', '1970-01-01', 'parth', 'a@b.c', 0),
(19, 1, 'date check', '1970-01-01', 'parth', 'a@b.c', 0),
(20, 1, 's', '2015-12-04', 'parth', 'a@b.c', 0),
(21, 9, 'm fine.', '2015-12-06', 'Nuhman', 'n@gmail.com', 1),
(22, 1, 'hi', '2015-12-07', 'kishor', 'k@a.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL,
  `value` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `value`, `slug`) VALUES
(1, 'News', 'News'),
(3, 'Videos', 'Videos');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$Wz1Udl.yR0Dri0uVQR75BuoPCpQekB1yLsdYEcylX/oMhU754wORm', 'admin'),
(4, 'parth', '$2y$10$q82YloZFg2MYnjz0LeDfROW2Fzr7GzNN25hypDP3.BJM4ZjeGotgW', 'author');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `articles_tags`
--
ALTER TABLE `articles_tags`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
