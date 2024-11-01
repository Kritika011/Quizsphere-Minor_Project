-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 09:58 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(4) NOT NULL,
  `semester` int(2) NOT NULL,
  `box_title` varchar(200) NOT NULL,
  `box_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `semester`, `box_title`, `box_description`) VALUES
(1, 3, 'C Programming', 'Learn the basics of C programming.'),
(2, 3, 'Database Management', 'Introduction to database management systems.'),
(3, 3, 'Web Development', 'Basics of HTML, CSS, and JavaScript.'),
(4, 3, 'Data Structures', 'Introduction to data structures using C.'),
(5, 3, 'Computer Networks', 'Basics of networking.'),
(6, 4, 'Advanced Java', 'Deep dive into Java programming.'),
(7, 4, 'Operating Systems', 'Understanding OS principles.'),
(8, 4, 'Software Engineering', 'Basics of software development process.'),
(9, 5, 'Python Programming', 'Learn Python programming.'),
(10, 5, 'Soft Skill', 'Learn the basics of soft skill.'),
(11, 1, 'cyber', 'Learn the basics of Cyber.'),
(12, 2, 'law', 'Introduction to law.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
