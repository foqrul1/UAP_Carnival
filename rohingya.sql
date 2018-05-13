-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2018 at 07:07 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rohingya`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `emailid` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `profilepic` varchar(11) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `contactno`, `emailid`, `password`, `profilepic`, `address`) VALUES
(1, 'Anik', '0194302917', 'anik7303@gmail.com', '12345', 'anik.jpg', 'Narayangonj'),
(2, 'Md Foqrul Islam', '01684656546', 'foqrulislam1030@gmail.com', '12345', 'foqrul.jpg', 'Mohammadpur,Dhaka');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `user_name` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  `issue` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `user_name`, `user_id`, `issue`, `description`, `created_date`, `modified_date`) VALUES
(12, 'papon', 1, 'sfgsdfgdfsg', 'gwregdfgdfgsgsdfg', '2018-05-13', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `subject` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `post` varchar(500) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `status` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `created_date`, `subject`, `name`, `post`, `comment_id`, `status`) VALUES
(12, '2018-05-13', '', 'Anik', 'asdgdfgd', 12, 'no'),
(13, '2018-05-13', '', 'papon', 'akgdafklsadmf', 13, 'no'),
(14, '2018-05-13', '', 'papon', 'nljklnj', 14, 'yes'),
(15, '2018-05-13', '', 'papon', 'jliuhjk', 15, 'yes'),
(17, '2018-05-13', '', 'papon', 'dksfjsdalgjsd', 17, 'no'),
(18, '2018-05-13', '', 'papon', 'sdjfklsadfklasd', 18, 'no'),
(19, '2018-05-13', '', 'papon', 'kjhsfjk', 19, 'no'),
(20, '2018-05-13', '', 'papon', 'k;jhfghjklhu', 20, 'no'),
(21, '2018-05-13', '', 'papon', 'oerogjierwkgl;er', 14, 'no'),
(22, '2018-05-13', '', 'papon', 'Anjnkjhfa', 15, 'no'),
(23, '2018-05-13', '', 'Md Foqrul Islam', 'hi\r\n', 13, 'no'),
(24, '2018-05-13', '', 'mitun', 'ajiosdjfksdlhfjsdhfs', 14, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `contactno` varchar(15) NOT NULL,
  `emailid` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_date` date NOT NULL,
  `modified_date` date NOT NULL,
  `profilepic` varchar(1000) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `contactno`, `emailid`, `password`, `address`, `status`, `created_date`, `modified_date`, `profilepic`, `modified_by`) VALUES
(1, 'papon', '01685555', 'papon@gmail.com', '123456', 'mohammadpur', 'Active', '2018-05-12', '0000-00-00', 'papon.png', 0),
(5, 'mitun', '1234468', 'm@gmail.com', '12345', 'mmm', 'Active', '2018-05-13', '0000-00-00', 'Default.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
