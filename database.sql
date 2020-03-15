-- phpMyAdmin SQL Dump
-- version 4.7.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2018 at 01:22 AM
-- Server version: 5.6.38
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `sta` int(11) NOT NULL DEFAULT '1',
  `user_name` varchar(150) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `no` text NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `Pattern` varchar(225) NOT NULL DEFAULT '000000',
  `pr_id` varchar(240) DEFAULT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `sta`, `user_name`, `user_email`, `no`, `user_pass`, `Pattern`, `pr_id`, `joining_date`) VALUES
(1, 0, 'admin', 'admin@mail.com', '', '$2y$10$EbBLImoxXi9OI8LGOWtBK.qXdPQdk31HDzw4cgIA1qgtPDlZMuAEC', '$2y$10$sdGVMjGxU0wnc4PDwbI/o.4mE7RCkW5ghP0dOtW/NVdzJqDwTXPyO', 'ZNY7mx0Uk7yVjcZhXSjyUp6w2yntaPwgLKPMS3cnl6ixtwDY0LbDBHpRi7pCadMl', '2017-05-07 08:32:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
