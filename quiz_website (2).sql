-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 02:32 AM
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
-- Table structure for table `admindetails`
--

CREATE TABLE `admindetails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other','prefer-not') NOT NULL,
  `institute` varchar(100) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `verification_status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admindetails`
--

INSERT INTO `admindetails` (`id`, `user_id`, `phone_no`, `dob`, `gender`, `institute`, `profile_image`, `verification_status`) VALUES
(1, 16, '7056084925', '2004-02-29', 'male', 'tih', '../uploads/swapnadeep.jpeg', 'pending'),
(2, 17, '9052036852', '1960-02-14', 'male', 'tih', '../uploads/suman.jpg', 'pending');

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
(1, 'Kritika Pramanik', 'pramanikkritika46@gmail.com', '$2y$10$F6gKfTU/HwMNyiyNtNTtneRO9HqyZ64c9VtWn2YCBU3a6m4Uh8tsK', 1, 'admin'),
(2, 'Pauli Mallick', 'paulirimi@gmail.com', '$2y$10$Ix9qAJTPn8MJV/b05azc/OY27H1p9AWqo5N60vv5bFGEs3B4wW4EC', 1, 'admin'),
(16, 'Swapnadeep Dhar', 'swapnadeep@gmail.com', '$2y$10$BsTYADOc8mgrlGMBkx9jRugB3kMvsZn5i1e6sIEoJOdHacuBX6.hS', 1, 'admin'),
(17, 'suman das', 'suman@gmail.com', '$2y$10$ZFguKjbhd8JstU0Fq638JeYASoJfXgQhYx8RCL/abn94dAV8mBI1S', 0, 'admin');

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
(1, 79, 1, 'N', 'attended', 0),
(2, 79, 2, '1', 'attended', 0),
(3, 79, 3, 'P', 'attended', 0),
(4, 79, 4, 'o', 'attended', 0),
(5, 79, 5, '', 'unattended', 0),
(6, 79, 6, '', 'unattended', 0),
(7, 79, 7, '4', 'attended', 0),
(8, 79, 8, 'O', 'attended', 0),
(9, 79, 9, 'A', 'attended', 0),
(10, 79, 10, 'A', 'attended', 0),
(11, 79, 11, 'N', 'attended', 0),
(12, 79, 12, '', 'unattended', 0),
(13, 79, 20, '', 'unattended', 0),
(14, 79, 20, '', 'unattended', 0);

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
(20, 8, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(21, 9, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(22, 9, 'First generation computers had which of the following?', 'Magnetic tapes', 'Transistors', 'ICs', 'Vaccum tubes & Magnetic drum', 'Vaccum tubes & Magnetic drum'),
(23, 10, 'Which of these pins will allow to activate and deactivate a multiplexer?', 'Enable pin', 'Selection pin', 'Logic pin', 'Preset pin', 'Enable pin'),
(24, 10, 'Which of the following options are correct for a 4×1 multiplexer?', 'It has four 3 – input AND gates', 'It has four 2 – input AND gates', 'It has one 3 – input AND gate', ' It has one 3 – input AND gate', ' It has four 3 – input AND gates'),
(25, 10, ' A priority encoder has four inputs I0, I1, I2, and I3 where I3 has the highest priority and I0 has the least priority. If I2 = 1, what will be the output?', '00', '01', '10', '11', '10'),
(26, 10, 'Which of the following options represent the correct reduction of XYZ + XYZ ?', '0', ' YZ', 'X + X', '2YZ', ' YZ'),
(27, 10, 'What frequency division of the pulsed clock signal can be obtained by connecting 4 flip – flops in cascade?', '2', '4', '8', '16', '16');

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
(8, 5, 1, 1, 10, 'admin'),
(9, 5, 2, 1, 10, '3'),
(10, 3, 5, 1, 5, '83');

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
(1, 79, 1, 12, 0, 0, 9),
(2, 79, 8, 1, 0, 0, 0),
(3, 79, 8, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `student_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other','prefer-not') NOT NULL,
  `course` varchar(50) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `institute` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`student_id`, `user_id`, `phone_no`, `dob`, `gender`, `course`, `semester`, `institute`, `profile_image`) VALUES
(2, 79, '8583033646', '2003-12-11', 'female', 'bca', '5th', 'tih', '../uploads/WhatsApp Image 2023-08-10 at 23.37.01.jpg');

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
(7, 'Business Economics', 'BBA102', 'BBA', 1, 'Business economics is a field of applied economics that studies the financial, organizational, market-related, and environmental issues faced by corporations. Business economics encompasses subjects such as the concept of scarcity, production factors, distribution, and consumption.', '../uploads/busi_economics.jpg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `teacherdetails`
--

CREATE TABLE `teacherdetails` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone_no` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female','other','prefer-not') NOT NULL,
  `institute` varchar(100) NOT NULL,
  `profile_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacherdetails`
--

INSERT INTO `teacherdetails` (`id`, `user_id`, `phone_no`, `dob`, `gender`, `institute`, `profile_image`) VALUES
(1, 83, '8583033646', '2003-12-11', 'female', 'tih', '../uploads/IMG_20241114_090739_646.jpg');

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
(79, 'Kritika Pramanik', 'pramanikkritika46@gmail.com', '$2y$10$lrZ8.87JRu3ZvXIlOSP5iuszipC0wSBsyMWPTXndOJ15fIFs2chy2', 'student'),
(83, 'Kritika Pramanik', 'pramanikrupai46@gmail.com', '$2y$10$ljaJ92U7ibiaSRUFDs3wJOke8R.TcdKRJdFBcojyxjWixio25GyMe', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
  ADD KEY `question_id` (`question_id`),
  ADD KEY `student_id` (`student_id`) USING BTREE;

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
  ADD KEY `paper_id` (`paper_id`),
  ADD KEY `student_id` (`student_id`) USING BTREE;

--
-- Indexes for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`),
  ADD UNIQUE KEY `subject_code` (`subject_code`);

--
-- Indexes for table `teacherdetails`
--
ALTER TABLE `teacherdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `admindetails`
--
ALTER TABLE `admindetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `exam_answers`
--
ALTER TABLE `exam_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `exam_questions`
--
ALTER TABLE `exam_questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `paperdetails`
--
ALTER TABLE `paperdetails`
  MODIFY `paper_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentdetails`
--
ALTER TABLE `studentdetails`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacherdetails`
--
ALTER TABLE `teacherdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admindetails`
--
ALTER TABLE `admindetails`
  ADD CONSTRAINT `admindetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`paper_id`) REFERENCES `paperdetails` (`paper_id`);

--
-- Constraints for table `studentdetails`
--
ALTER TABLE `studentdetails`
  ADD CONSTRAINT `studentdetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teacherdetails`
--
ALTER TABLE `teacherdetails`
  ADD CONSTRAINT `teacherdetails_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
