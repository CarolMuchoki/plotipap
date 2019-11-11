-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2019 at 12:54 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propertymanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(100) NOT NULL,
  `description` varchar(3000) NOT NULL,
  `Payment` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `property` int(11) NOT NULL,
  `localpath` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `isCover` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `name`, `property`, `localpath`, `path`, `isCover`) VALUES
(4, '', 0, '', 'http://localhost/plotipap/assets/images/property-1.jpg', 0),
(5, '', 0, '', 'http://localhost/plotipap/assets/images/property-2.jpg', 0),
(6, '', 3, '', 'http://localhost/plotipap/assets/images/property-8.jpg', 0),
(7, '', 4, '', 'http://localhost/plotipap/assets/images/property-9.jpg', 0),
(8, '', 5, '', 'http://localhost/plotipap/assets/images/property-5.jpg', 0),
(9, '', 6, '', 'http://localhost/plotipap/assets/images/property-7.jpg', 1),
(10, '', 0, '', 'http://localhost/plotipap/assets/images/juja-2.jpg', 1),
(11, '', 8, '', 'http://localhost/plotipap/assets/images/Juja.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `location` varchar(20) NOT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `owner` int(11) NOT NULL,
  `cost` int(15) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `additional_info` varchar(300) NOT NULL,
  `tdi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `name`, `location`, `latitude`, `longitude`, `owner`, `cost`, `description`, `additional_info`, `tdi`) VALUES
(0, 'Juja', 'Juja farm Kalimoni', '20', '10', 23, 850000, 'Plots for sale in a Juja farm Kalimoni. Located near Mastoo shopping center ( main landmark is jewel hotel)', 'You\'ll love this amazing Parcel of land that offers redevelopment opportunity .\r\nIt is 1 acre and is rectangular shaped with a slight slope as you enter the driveway .On it sits and old house that allows for renovation or ideally tearing it down to build a new family or two . Situated in a friendly ', 0),
(1, 'Juja farm heights', 'Juja', '20', '10', 1, 800000, '40*80 plots located in juja farm near Athi Primary School. It is in the section of the plotipap investment plan', '', 1),
(2, 'Kamulu', 'Kangundo Road', '30', '20', 1, 900000, '50*100 plots with ready title deeds', '', 1),
(3, 'Kitengela', 'kitengela', '50', '30', 0, 1000000, 'Well maintained plots in a developed region', '', 1),
(4, 'Murera', 'Ruiru', '30', '10', 0, 900000, 'Near the main road', '', 0),
(5, 'Kajiado', 'kajiado', '10', '20', 0, 750000, 'Beautiful views', '', 1),
(6, 'Komarock', 'Near Malaa', '40', '20', 1, 650000, 'Title deeds available', '', 1),
(8, 'Kenyatta road', 'Kenyatta road', '10', '20', 34, 1500000, 'The plots are near the main road, buy and build', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `property` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `length` int(6) NOT NULL,
  `width` int(6) NOT NULL,
  `colNo` int(6) NOT NULL,
  `rowNo` int(6) NOT NULL,
  `costPerUnit` int(10) NOT NULL,
  `bookingFee` float NOT NULL,
  `status` enum('saved','active','sold_out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `property`, `name`, `length`, `width`, `colNo`, `rowNo`, `costPerUnit`, `bookingFee`, `status`) VALUES
(1, 0, 'Juja phase 2', 40, 80, 20, 10, 850000, 0.04, 'active'),
(2, 0, 'Kajiado', 50, 100, 2, 2, 850000, 0.04, 'active'),
(3, 2, 'Kamulu', 40, 80, 2, 1, 850000, 0.04, 'sold_out'),
(4, 3, 'Kitengela', 50, 100, 3, 2, 850000, 0.04, 'active'),
(76, 4, 'Joska Kangundo', 80, 60, 5, 5, 420000, 80000, 'saved'),
(77, 4, 'johnito 2', 80, 60, 11, 10, 560000, 100000, 'saved');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `section` int(10) DEFAULT NULL,
  `rowIndex` int(10) DEFAULT NULL,
  `colIndex` int(10) DEFAULT NULL,
  `cost` varchar(10) NOT NULL,
  `bookingFee` int(10) NOT NULL,
  `type` enum('road','plot','river') DEFAULT NULL,
  `status` enum('available','unavailable','booked','sold') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `title`, `section`, `rowIndex`, `colIndex`, `cost`, `bookingFee`, `type`, `status`) VALUES
(1, '', '', 1, 1, 1, 'Ksh. 90000', 0, 'plot', 'available'),
(2, '', '', 1, 1, 2, '800000', 0, 'plot', 'available'),
(3, '', '', 1, 2, 3, '0', 0, 'plot', 'available'),
(4, '', '', 2, 1, 1, '900000', 40, 'plot', 'available'),
(672, ' 1, 1', '', 76, 1, 1, '420000', 80000, 'plot', 'available'),
(673, ' 1, 2', '', 76, 1, 2, '420000', 80000, 'plot', 'available'),
(674, ' 1, 3', '', 76, 1, 3, '0', 0, 'road', 'available'),
(675, ' 1, 4', '', 76, 1, 4, '420000', 80000, 'plot', 'available'),
(676, ' 1, 5', '', 76, 1, 5, '0', 0, 'river', 'available'),
(677, ' 2, 1', '', 76, 2, 1, '420000', 80000, 'plot', 'available'),
(678, ' 2, 2', '', 76, 2, 2, '420000', 80000, 'plot', 'available'),
(679, ' 2, 3', '', 76, 2, 3, '0', 0, 'road', 'available'),
(680, ' 2, 4', '', 76, 2, 4, '0', 0, 'river', 'available'),
(681, ' 2, 5', '', 76, 2, 5, '420000', 80000, 'plot', 'unavailable'),
(682, ' 3, 1', '', 76, 3, 1, '0', 0, 'road', 'available'),
(683, ' 3, 2', '', 76, 3, 2, '0', 0, 'road', 'available'),
(684, ' 3, 3', '', 76, 3, 3, '0', 0, 'road', 'available'),
(685, ' 3, 4', '', 76, 3, 4, '0', 0, 'road', 'available'),
(686, ' 3, 5', '', 76, 3, 5, '0', 0, 'road', 'available'),
(687, ' 4, 1', '', 76, 4, 1, '420000', 80000, 'plot', 'available'),
(688, ' 4, 2', '', 76, 4, 2, '420000', 80000, 'plot', 'available'),
(689, ' 4, 3', '', 76, 4, 3, '0', 0, 'road', 'available'),
(690, ' 4, 4', '', 76, 4, 4, '420000', 80000, 'plot', 'available'),
(691, ' 4, 5', '', 76, 4, 5, '0', 0, 'river', 'available'),
(692, ' 5, 1', '', 76, 5, 1, '420000', 80000, 'plot', 'available'),
(693, ' 5, 2', '', 76, 5, 2, '420000', 80000, 'plot', 'available'),
(694, ' 5, 3', '', 76, 5, 3, '0', 0, 'road', 'available'),
(695, ' 5, 4', '', 76, 5, 4, '420000', 80000, 'plot', 'available'),
(696, ' 5, 5', '', 76, 5, 5, '420000', 80000, 'plot', 'available'),
(697, ' 1, 1', '', 77, 1, 1, '560000', 100000, 'plot', 'available'),
(698, ' 1, 2', '', 77, 1, 2, '560000', 100000, 'plot', 'available'),
(699, ' 1, 3', '', 77, 1, 3, '0', 0, 'road', 'available'),
(700, ' 1, 4', '', 77, 1, 4, '560000', 100000, 'plot', 'available'),
(701, ' 1, 5', '', 77, 1, 5, '560000', 100000, 'plot', 'available'),
(702, ' 1, 6', '', 77, 1, 6, '0', 0, 'road', 'available'),
(703, ' 1, 7', '', 77, 1, 7, '560000', 100000, 'plot', 'available'),
(704, ' 1, 8', '', 77, 1, 8, '560000', 100000, 'plot', 'available'),
(705, ' 1, 9', '', 77, 1, 9, '0', 0, 'road', 'available'),
(706, ' 1, 10', '', 77, 1, 10, '0', 0, 'river', 'available'),
(707, ' 1, 11', '', 77, 1, 11, '0', 0, 'plot', 'available'),
(708, ' 2, 1', '', 77, 2, 1, '560000', 100000, 'plot', 'available'),
(709, ' 2, 2', '', 77, 2, 2, '560000', 100000, 'plot', 'available'),
(710, ' 2, 3', '', 77, 2, 3, '0', 0, 'road', 'available'),
(711, ' 2, 4', '', 77, 2, 4, '560000', 100000, 'plot', 'available'),
(712, ' 2, 5', '', 77, 2, 5, '560000', 100000, 'plot', 'available'),
(713, ' 2, 6', '', 77, 2, 6, '0', 0, 'road', 'available'),
(714, ' 2, 7', '', 77, 2, 7, '560000', 100000, 'plot', 'available'),
(715, ' 2, 8', '', 77, 2, 8, '560000', 100000, 'plot', 'available'),
(716, ' 2, 9', '', 77, 2, 9, '0', 0, 'road', 'available'),
(717, ' 2, 10', '', 77, 2, 10, '560000', 100000, 'plot', 'available'),
(718, ' 2, 11', '', 77, 2, 11, '0', 0, 'river', 'available'),
(719, ' 3, 1', '', 77, 3, 1, '560000', 100000, 'plot', 'available'),
(720, ' 3, 2', '', 77, 3, 2, '560000', 100000, 'plot', 'available'),
(721, ' 3, 3', '', 77, 3, 3, '0', 0, 'road', 'available'),
(722, ' 3, 4', '', 77, 3, 4, '560000', 100000, 'plot', 'available'),
(723, ' 3, 5', '', 77, 3, 5, '560000', 100000, 'plot', 'available'),
(724, ' 3, 6', '', 77, 3, 6, '0', 0, 'road', 'available'),
(725, ' 3, 7', '', 77, 3, 7, '560000', 100000, 'plot', 'available'),
(726, ' 3, 8', '', 77, 3, 8, '560000', 100000, 'plot', 'available'),
(727, ' 3, 9', '', 77, 3, 9, '0', 0, 'road', 'available'),
(728, ' 3, 10', '', 77, 3, 10, '560000', 100000, 'plot', 'available'),
(729, ' 3, 11', '', 77, 3, 11, '560000', 100000, 'plot', 'available'),
(730, ' 4, 1', '', 77, 4, 1, '0', 0, 'road', 'available'),
(731, ' 4, 2', '', 77, 4, 2, '0', 0, 'road', 'available'),
(732, ' 4, 3', '', 77, 4, 3, '0', 0, 'road', 'available'),
(733, ' 4, 4', '', 77, 4, 4, '0', 0, 'road', 'available'),
(734, ' 4, 5', '', 77, 4, 5, '0', 0, 'road', 'available'),
(735, ' 4, 6', '', 77, 4, 6, '0', 0, 'road', 'available'),
(736, ' 4, 7', '', 77, 4, 7, '0', 0, 'road', 'available'),
(737, ' 4, 8', '', 77, 4, 8, '0', 0, 'road', 'available'),
(738, ' 4, 9', '', 77, 4, 9, '0', 0, 'road', 'available'),
(739, ' 4, 10', '', 77, 4, 10, '0', 0, 'road', 'available'),
(740, ' 4, 11', '', 77, 4, 11, '0', 0, 'road', 'available'),
(741, ' 5, 1', '', 77, 5, 1, '560000', 100000, 'plot', 'available'),
(742, ' 5, 2', '', 77, 5, 2, '560000', 100000, 'plot', 'available'),
(743, ' 5, 3', '', 77, 5, 3, '0', 0, 'road', 'available'),
(744, ' 5, 4', '', 77, 5, 4, '560000', 100000, 'plot', 'available'),
(745, ' 5, 5', '', 77, 5, 5, '560000', 100000, 'plot', 'available'),
(746, ' 5, 6', '', 77, 5, 6, '0', 0, 'road', 'available'),
(747, ' 5, 7', '', 77, 5, 7, '560000', 100000, 'plot', 'available'),
(748, ' 5, 8', '', 77, 5, 8, '560000', 100000, 'plot', 'available'),
(749, ' 5, 9', '', 77, 5, 9, '0', 0, 'road', 'available'),
(750, ' 5, 10', '', 77, 5, 10, '560000', 100000, 'plot', 'available'),
(751, ' 5, 11', '', 77, 5, 11, '560000', 100000, 'plot', 'available'),
(752, ' 6, 1', '', 77, 6, 1, '560000', 100000, 'plot', 'available'),
(753, ' 6, 2', '', 77, 6, 2, '560000', 100000, 'plot', 'available'),
(754, ' 6, 3', '', 77, 6, 3, '0', 0, 'road', 'available'),
(755, ' 6, 4', '', 77, 6, 4, '560000', 100000, 'plot', 'available'),
(756, ' 6, 5', '', 77, 6, 5, '560000', 100000, 'plot', 'available'),
(757, ' 6, 6', '', 77, 6, 6, '0', 0, 'road', 'available'),
(758, ' 6, 7', '', 77, 6, 7, '560000', 100000, 'plot', 'available'),
(759, ' 6, 8', '', 77, 6, 8, '560000', 100000, 'plot', 'available'),
(760, ' 6, 9', '', 77, 6, 9, '0', 0, 'road', 'available'),
(761, ' 6, 10', '', 77, 6, 10, '560000', 100000, 'plot', 'available'),
(762, ' 6, 11', '', 77, 6, 11, '560000', 100000, 'plot', 'available'),
(763, ' 7, 1', '', 77, 7, 1, '0', 0, 'road', 'available'),
(764, ' 7, 2', '', 77, 7, 2, '0', 0, 'road', 'available'),
(765, ' 7, 3', '', 77, 7, 3, '0', 0, 'road', 'available'),
(766, ' 7, 4', '', 77, 7, 4, '0', 0, 'road', 'available'),
(767, ' 7, 5', '', 77, 7, 5, '0', 0, 'road', 'available'),
(768, ' 7, 6', '', 77, 7, 6, '0', 0, 'road', 'available'),
(769, ' 7, 7', '', 77, 7, 7, '0', 0, 'road', 'available'),
(770, ' 7, 8', '', 77, 7, 8, '0', 0, 'road', 'available'),
(771, ' 7, 9', '', 77, 7, 9, '0', 0, 'road', 'available'),
(772, ' 7, 10', '', 77, 7, 10, '0', 0, 'road', 'available'),
(773, ' 7, 11', '', 77, 7, 11, '0', 0, 'road', 'available'),
(774, ' 8, 1', '', 77, 8, 1, '560000', 100000, 'plot', 'available'),
(775, ' 8, 2', '', 77, 8, 2, '560000', 100000, 'plot', 'available'),
(776, ' 8, 3', '', 77, 8, 3, '0', 0, 'road', 'available'),
(777, ' 8, 4', '', 77, 8, 4, '560000', 100000, 'plot', 'available'),
(778, ' 8, 5', '', 77, 8, 5, '560000', 100000, 'plot', 'available'),
(779, ' 8, 6', '', 77, 8, 6, '0', 0, 'road', 'available'),
(780, ' 8, 7', '', 77, 8, 7, '560000', 100000, 'plot', 'available'),
(781, ' 8, 8', '', 77, 8, 8, '560000', 100000, 'plot', 'available'),
(782, ' 8, 9', '', 77, 8, 9, '0', 0, 'road', 'available'),
(783, ' 8, 10', '', 77, 8, 10, '560000', 100000, 'plot', 'available'),
(784, ' 8, 11', '', 77, 8, 11, '560000', 100000, 'plot', 'available'),
(785, ' 9, 1', '', 77, 9, 1, '560000', 100000, 'plot', 'available'),
(786, ' 9, 2', '', 77, 9, 2, '560000', 100000, 'plot', 'available'),
(787, ' 9, 3', '', 77, 9, 3, '0', 0, 'road', 'available'),
(788, ' 9, 4', '', 77, 9, 4, '560000', 100000, 'plot', 'available'),
(789, ' 9, 5', '', 77, 9, 5, '560000', 100000, 'plot', 'available'),
(790, ' 9, 6', '', 77, 9, 6, '0', 0, 'road', 'available'),
(791, ' 9, 7', '', 77, 9, 7, '560000', 100000, 'plot', 'available'),
(792, ' 9, 8', '', 77, 9, 8, '560000', 100000, 'plot', 'available'),
(793, ' 9, 9', '', 77, 9, 9, '0', 0, 'road', 'available'),
(794, ' 9, 10', '', 77, 9, 10, '560000', 100000, 'plot', 'available'),
(795, ' 9, 11', '', 77, 9, 11, '560000', 100000, 'plot', 'available'),
(796, ' 10, 1', '', 77, 10, 1, '560000', 100000, 'plot', 'available'),
(797, ' 10, 2', '', 77, 10, 2, '560000', 100000, 'plot', 'available'),
(798, ' 10, 3', '', 77, 10, 3, '0', 0, 'road', 'available'),
(799, ' 10, 4', '', 77, 10, 4, '560000', 100000, 'plot', 'available'),
(800, ' 10, 5', '', 77, 10, 5, '560000', 100000, 'plot', 'available'),
(801, ' 10, 6', '', 77, 10, 6, '0', 0, 'road', 'available'),
(802, ' 10, 7', '', 77, 10, 7, '560000', 100000, 'plot', 'available'),
(803, ' 10, 8', '', 77, 10, 8, '560000', 100000, 'plot', 'available'),
(804, ' 10, 9', '', 77, 10, 9, '0', 0, 'road', 'available'),
(805, ' 10, 10', '', 77, 10, 10, '560000', 100000, 'plot', 'available'),
(806, ' 10, 11', '', 77, 10, 11, '560000', 100000, 'plot', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `property` int(11) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property` (`property`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `property` (`property`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section` (`section`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `property` (`property`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=807;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`property`) REFERENCES `properties` (`id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`property`) REFERENCES `properties` (`id`);

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`section`) REFERENCES `sections` (`id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`property`) REFERENCES `properties` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
