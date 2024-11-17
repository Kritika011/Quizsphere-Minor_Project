-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2024 at 03:26 PM
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
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `role` varchar(50) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `verified`, `role`) VALUES
(1, 'Kritika Pramanik', 'pramanikkritika46@gmail.com', 'password', 1, 'admin'),
(2, 'sohini das ', 'pramanikrupai46@gmail.com', '$2y$10$IqOPjoMXH/fl9ZQ9JLwqJu9MTC.YB0GmZaGn9d8NpQ/8CEo1HTK9e', 1, 'admin'),
(3, 'Pauli Mallick', 'paulirimi@gmail.com', '$2y$10$Ix9qAJTPn8MJV/b05azc/OY27H1p9AWqo5N60vv5bFGEs3B4wW4EC', 0, 'admin'),
(5, 'Kritika pramanik ', 'kritika@gmail.com', '$2y$10$gXW37zPv9sRPQYA1P1cqw.Igf/xhDa/3Nq9nM29cpHIDtN9./gEgi', 0, 'admin'),
(6, 'sohini das ', 'sohini@gmail.com', '$2y$10$mUTeDh0PtmM9mDSQVfI6a.DoKV4dufeeejD8hg.TitFfL6EL2tIsS', 0, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `exam_answers`
--

CREATE TABLE `exam_answers` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` char(1) NOT NULL,
  `status` enum('attended','unattended','marked') NOT NULL DEFAULT 'unattended',
  `is_correct` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_answers`
--

INSERT INTO `exam_answers` (`id`, `student_id`, `question_id`, `answer`, `status`, `is_correct`) VALUES
(14, 4, 1, 'A', 'attended', 0),
(15, 4, 2, 'A', '', 0),
(16, 4, 3, '1', 'attended', 0),
(17, 4, 4, 'P', 'attended', 0),
(18, 4, 5, 'a', 'attended', 0),
(19, 4, 6, 'O', 'attended', 0),
(20, 4, 7, '', '', 0),
(21, 4, 11, 'O', '', 0),
(22, 4, 12, 'N', '', 0),
(23, 4, 1, 'O', 'attended', 1),
(24, 4, 2, '1', 'attended', 0),
(25, 4, 3, 'P', 'attended', 0),
(26, 4, 4, '', 'unattended', 0),
(27, 4, 5, 'O', 'attended', 0),
(28, 4, 6, '', 'unattended', 0),
(29, 4, 7, '', 'unattended', 0),
(30, 4, 8, '', 'unattended', 0),
(31, 4, 9, '', 'unattended', 0),
(32, 4, 10, '', 'unattended', 0),
(33, 4, 11, '', 'unattended', 0),
(34, 4, 12, '', 'unattended', 0),
(35, 4, 1, 'N', 'attended', 0),
(36, 4, 2, '1', 'attended', 0),
(37, 4, 3, 'P', 'attended', 0),
(38, 4, 4, 'a', 'attended', 0),
(39, 4, 5, '', 'unattended', 0),
(40, 4, 6, '', 'unattended', 0),
(41, 4, 7, '', 'unattended', 0),
(42, 4, 8, '', 'unattended', 0),
(43, 4, 9, '', 'unattended', 0),
(44, 4, 10, '', 'unattended', 0),
(45, 4, 11, '', 'unattended', 0),
(46, 4, 12, '', 'unattended', 0),
(47, 4, 1, 'O', 'attended', 1),
(48, 4, 2, '1', 'attended', 0),
(49, 4, 3, '', 'unattended', 0),
(50, 4, 4, '', 'unattended', 0),
(51, 4, 5, '', 'unattended', 0),
(52, 4, 6, '', 'unattended', 0),
(53, 4, 7, '', 'unattended', 0),
(54, 4, 8, '', 'unattended', 0),
(55, 4, 9, '', 'unattended', 0),
(56, 4, 10, '', 'unattended', 0),
(57, 4, 11, '', 'unattended', 0),
(58, 4, 12, '', 'unattended', 0),
(59, 4, 1, 'N', 'attended', 0),
(60, 4, 2, '1', 'attended', 0),
(61, 4, 3, 'B', 'attended', 0),
(62, 4, 4, '', 'unattended', 0),
(63, 4, 5, '', 'unattended', 0),
(64, 4, 6, '', 'unattended', 0),
(65, 4, 7, '', 'unattended', 0),
(66, 4, 8, '', 'unattended', 0),
(67, 4, 9, '', 'unattended', 0),
(68, 4, 10, '', 'unattended', 0),
(69, 4, 11, '', 'unattended', 0),
(70, 4, 12, '', 'unattended', 0),
(71, 4, 13, '', 'unattended', 0),
(72, 4, 14, '', 'unattended', 0),
(73, 4, 15, '', 'unattended', 0),
(74, 4, 16, '', 'unattended', 0),
(75, 4, 17, '', 'unattended', 0),
(76, 4, 18, '', 'unattended', 0),
(77, 4, 1, 'N', 'attended', 0),
(78, 4, 2, '1', 'attended', 0),
(79, 4, 3, '', 'unattended', 0),
(80, 4, 4, '', 'unattended', 0),
(81, 4, 5, '', 'unattended', 0),
(82, 4, 6, '', 'unattended', 0),
(83, 4, 7, '', 'unattended', 0),
(84, 4, 8, '', 'unattended', 0),
(85, 4, 9, '', 'unattended', 0),
(86, 4, 10, '', 'unattended', 0),
(87, 4, 11, '', 'unattended', 0),
(88, 4, 12, '', 'unattended', 0),
(89, 4, 20, '', 'unattended', 0),
(90, 4, 20, '', 'unattended', 0);

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
(1, 1, 'If the two inputs of a logic gate are 1 and 0, then the output of which logic gate is 1: ', 'AND gate', 'OR gate', 'NOR gate', 'NOT gate', 'OR gate'),
(2, 1, 'Which digital gate performs the multiplication operation?', 'AND gate', 'NOR gate', 'OR gate', 'NAND gate', 'AND gate'),
(3, 1, 'Which of the following is an INVALID state in an 8421 binary-coded decimal?', '1001', '1101', '1000', '0100', '1101'),
(4, 1, 'Which of the following languages is used for programmable logic devices?', 'BASIC', 'PASCAL', 'PALASM', 'TASM', 'PALASM'),
(5, 1, 'A three Input NOR gate gives high O/P when _______.', 'one I/P is high', 'one I/P is low', 'all I/P are low', 'all I/P are high', 'all I/P are low'),
(6, 1, 'The digital equivalent of an electric series circuit is the:', 'AND gate', 'OR gate', 'NOR gate', 'NAND gate', 'AND gate'),
(7, 1, 'Latches are _______ circuits.', 'edge triggered', 'pulse triggered', 'count triggered', 'level triggered', 'level triggered'),
(8, 1, 'A decade counter requires', '4 flipflops', '3 flipflops', '10 flipflops', '2 flipflops', '4 flipflops'),
(9, 1, 'A NAND circuit with positive logic will operates as', 'NOR with negative logic', 'AND with negative logic', 'OR with negative logic input', 'AND with negative logic output', 'NOR with negative logic'),
(10, 1, 'In a 8085 microprocessor the first machine cycle of an instruction is', 'An I/O write cycle', 'A Memory Read Cycle', 'A Memory Write Cycle', 'An op-code Fetch Cycle', 'An op-code Fetch Cycle'),
(11, 1, 'Which digital gate performs the multiplication operation?', 'AND Gate', 'NOR Gate', 'OR Gate', 'NAND Gate', 'AND Gate'),
(12, 1, 'Which digital gate performs the multiplication operation?', 'AND Gate', 'NOR Gate', 'OR Gate', 'NAND Gate', 'AND Gate'),
(13, 2, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(14, 2, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(15, 2, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(16, 2, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(17, 2, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(18, 2, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(19, 7, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(20, 8, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum');

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
  `submitted_by` varchar(255) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paperdetails`
--

INSERT INTO `paperdetails` (`paper_id`, `subject_id`, `num_of_questions`, `marks_per_question`, `time_limit`, `submitted_by`) VALUES
(1, 3, 12, 1, 30, 'admin'),
(2, 3, 2, 1, 2, 'admin'),
(7, 6, 1, 1, 2, '1'),
(8, 5, 1, 1, 10, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `result_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `paper_id` int(11) DEFAULT NULL,
  `total_questions` int(11) DEFAULT NULL,
  `correct_answers` int(11) DEFAULT NULL,
  `score` float DEFAULT NULL,
  `total_attended` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`result_id`, `student_id`, `paper_id`, `total_questions`, `correct_answers`, `score`, `total_attended`) VALUES
(2, 4, 1, 12, 0, 0, 9),
(3, 4, 1, 12, 1, 1, 4),
(4, 4, 1, 12, 0, 0, 4),
(5, 4, 1, 12, 1, 1, 2),
(6, 4, 1, 12, 0, 0, 3),
(7, 4, 2, 6, 0, 0, 0),
(8, 4, 1, 12, 0, 0, 2),
(9, 4, 8, 1, 0, 0, 0),
(10, 4, 8, 1, 0, 0, 0);

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
(5, 'Principle of Management', 'BBA101', 'BBA', 1, 'Management principles are a set of guidelines that help organizations use their resources efficiently to achieve their goals.', '../uploads/download (2).jpeg', 'admin'),
(6, 'c program', 'bcac106', 'BCA', 2, 'c ', '../uploads/download.jpeg', 'admin'),
(8, 'Business Economics', 'BBA102', 'BBA', 1, 'Business economics is a field of applied economics that studies the financial, organizational, market-related, and environmental issues faced by corporations. Business economics encompasses subjects such as the concept of scarcity, production factors, distribution, and consumption.', '../uploads/busi_economics.jpg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','teacher') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'Kritika pramanik ', 'pramanikkritika46@gmail.com', '$2y$10$MUto1wIix06fw0uNiq5TheC0pCPFNxSKSl05zV12UEog5w7Pzqa1G', 'teacher'),
(2, 'swapnadeep dhar', 'swapna33@gmail.com', '$2y$10$D.NEDXqf4eW0B3ckWR.iN.VDBPcwrUkSCVP7LRqZIHPghIl67GLjS', 'student'),
(3, 'sohini das ', 'sohini@gmail.com', '$2y$10$5pwXNJ.5xlb6fkdfu3Ov8.himwmNnw4y6P.0LLpy/le9EIqYB1iXm', 'teacher'),
(4, 'prabir pramanik', 'pragg@gmail.com', '$2y$10$pMKjp3/vkMOS8A.KYpopJuclIciHuTzYfL7phfxir/lLEcvefusP2', 'student'),
(5, 'pauli mallick', 'pauli@gmail.com', '$2y$10$Qy.YnJgDtlGebWdewm0nSebMooHbri45OuthYyRTYb0aXEZ8EetHC', 'teacher');

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
-- Indexes for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `question_id` (`question_id`);

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
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `paper_id` (`paper_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `subject_code` (`subject_code`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `paperdetails`
--
ALTER TABLE `paperdetails`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam_answers`
--
ALTER TABLE `exam_answers`
  ADD CONSTRAINT `exam_answers_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exam_answers_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `exam_questions` (`question_id`) ON DELETE CASCADE;

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

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`paper_id`) REFERENCES `paperdetails` (`paper_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
