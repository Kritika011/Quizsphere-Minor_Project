-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2024 at 03:05 PM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `verified`) VALUES
(1, 'Kritika Pramanik', 'pramanikkritika46@gmail.com', 'password', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam_questions`
--

CREATE TABLE `exam_questions` (
  `question_id` int(11) NOT NULL,
  `paper_id` int(11) DEFAULT NULL,
  `question` text NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_questions`
--

INSERT INTO `exam_questions` (`question_id`, `paper_id`, `question`, `option1`, `option2`, `option3`, `option4`, `correct_answer`) VALUES
(1, 1, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(2, 1, 'If the two inputs of a logic gate are 1 and 0, then the output of which logic gate is 1: ', 'AND gate', 'OR gate', 'NOR gate', 'NOT gate', 'OR gate'),
(3, 1, 'Which digital gate performs the multiplication operation?', 'AND gate', 'NOR gate', 'OR gate', 'NAND gate', 'AND gate'),
(4, 1, 'Which of the following is an INVALID state in an 8421 binary-coded decimal?', '1001', '1101', '1000', '0100', '1101'),
(5, 1, 'Which of the following languages is used for programmable logic devices?', 'BASIC', 'PASCAL', 'PALASM', 'TASM', 'PALASM'),
(6, 1, 'A three Input NOR gate gives high O/P when _______.', 'one I/P is high', 'one I/P is low', 'all I/P are low', 'all I/P are high', 'all I/P are low'),
(7, 1, 'The digital equivalent of an electric series circuit is the:', 'AND gate', 'OR gate', 'NOR gate', 'NAND gate', 'AND gate'),
(8, 1, 'Latches are _______ circuits.', 'edge triggered', 'pulse triggered', 'count triggered', 'level triggered', 'level triggered'),
(9, 1, 'A decade counter requires', '4 flipflops', '3 flipflops', '10 flipflops', '2 flipflops', '4 flipflops'),
(10, 1, 'A NAND circuit with positive logic will operates as', 'NOR with negative logic', 'AND with negative logic', 'OR with negative logic input', 'AND with negative logic output', 'NOR with negative logic'),
(11, 1, 'In a 8085 microprocessor the first machine cycle of an instruction is', 'An I/O write cycle', 'A Memory Read Cycle', 'A Memory Write Cycle', 'An op-code Fetch Cycle', 'An op-code Fetch Cycle'),
(12, 1, 'Which digital gate performs the multiplication operation?', 'AND Gate', 'NOR Gate', 'OR Gate', 'NAND Gate', 'AND Gate'),
(13, 2, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(14, 2, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(15, 2, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(16, 2, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(17, 2, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(18, 2, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum');

-- --------------------------------------------------------

--
-- Table structure for table `paperdetails`
--

CREATE TABLE `paperdetails` (
  `paper_id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `num_of_questions` int(11) NOT NULL,
  `marks_per_question` int(11) NOT NULL,
  `time_limit` int(11) DEFAULT NULL,
  `submitted_by` text NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paperdetails`
--

INSERT INTO `paperdetails` (`paper_id`, `subject_id`, `num_of_questions`, `marks_per_question`, `time_limit`, `submitted_by`) VALUES
(1, 3, 12, 1, 30, 'admin'),
(2, 3, 2, 1, 2, 'teacher'),
(3, 4, 2, 1, 10, 'teacher'),
(4, 4, 1, 1, 10, 'admin');

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

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `course` varchar(100) NOT NULL,
  `semester` int(10) NOT NULL,
  `details` text DEFAULT NULL,
  `id_card` varchar(255) DEFAULT NULL,
  `submit_by` varchar(50) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_code`, `course`, `semester`, `details`, `id_card`, `submit_by`) VALUES
(3, 'Digital Electronics ', 'BCA101', 'BCA', 1, 'Digital electronics is a field of electronics that uses digital signals to represent and process information, typically in binary (0s and 1s). It forms the basis of modern computing, enabling the design and function of circuits like logic gates, microprocessors, and digital devices.', '../uploads/download.jpeg', 'admin'),
(4, 'Business Systems and Applications ', 'BCAC102', 'BCA', 1, 'usiness systems and applications (BSA) are software and tools that help businesses improve their efficiency, competitiveness, and innovation.', '../uploads/download (1).jpeg', 'admin'),
(5, 'Principle of Management', 'BBA102', 'BBA', 1, 'Management principles are a set of guidelines that help organizations use their resources efficiently to achieve their goals.', '../uploads/download (2).jpeg', 'admin'),
(6, 'c program', 'bcac106', 'BCA', 2, 'c ', '../uploads/download.jpeg', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `paper_id` (`paper_id`);

--
-- Indexes for table `paperdetails`
--
ALTER TABLE `paperdetails`
  ADD PRIMARY KEY (`paper_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `subject_code` (`subject_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `paperdetails`
--
ALTER TABLE `paperdetails`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_questions`
--
ALTER TABLE `exam_questions`
  ADD CONSTRAINT `exam_questions_ibfk_1` FOREIGN KEY (`paper_id`) REFERENCES `paperdetails` (`paper_id`) ON DELETE CASCADE;

--
-- Constraints for table `paperdetails`
--
ALTER TABLE `paperdetails`
  ADD CONSTRAINT `paperdetails_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
