-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2024 at 01:38 AM
-- Server version: 8.0.39
-- PHP Version: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exambitx`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Aid` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Aid`, `username`, `password`) VALUES
(1, 'saivenkatadada', '@Svenkat1');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `Qid` int NOT NULL,
  `Opt_id` char(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `quizid` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`Qid`, `Opt_id`, `quizid`) VALUES
(1, 'A programming language', 1),
(2, 'JavaScript', 1),
(3, 'Python Enhancement Proposal', 1),
(4, 'All of the above', 1),
(5, 'def', 1),
(6, 'List', 1),
(7, 'append()', 1),
(8, '**', 1),
(9, 'Returns length of an object\n', 1),
(10, '{}', 1),
(11, '.py', 1),
(12, 'print()', 1),
(13, '	\nlambda', 1),
(14, 'class', 1),
(15, 'except', 1),
(16, 'for', 1),
(17, '[1, 2, 3]', 1),
(18, 'remove()', 1),
(19, '//', 1),
(20, '#', 1),
(21, 'Skips the code block', 1),
(22, '9', 1),
(23, '	\nSet', 1),
(24, 'All of the above', 1),
(25, '4', 1),
(26, 'import module', 1),
(27, 'random.randint()', 1),
(28, 'return', 1),
(29, 'def function_name():', 1),
(30, 'type()', 1),
(46, '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Qid` int NOT NULL,
  `Quizid` int DEFAULT NULL,
  `Subid` int DEFAULT NULL,
  `question_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Opt_1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Opt_2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Opt_3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Opt_4` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Qid`, `Quizid`, `Subid`, `question_text`, `Opt_1`, `Opt_2`, `Opt_3`, `Opt_4`) VALUES
(1, 1, 1, 'What is Python?', 'A programming language', 'A snake', 'A car', 'A database'),
(2, 1, 1, 'Which language is primarily used for web development?', 'Python', 'C++', 'JavaScript', 'Java'),
(3, 1, 1, 'What does PEP stand for in Python?', 'Python Enhancement Proposal', 'Python Enhancement Program', 'Python Enhanced Proposal', 'None of the above'),
(4, 1, 1, 'Which of the following is a Python framework?', 'Django', 'Flask', 'Pyramid', 'All of the above'),
(5, 1, 1, 'Which keyword is used to define a function in Python?', 'function', 'def', 'define', 'func'),
(6, 1, 1, 'What is the output of print(type([])) in Python?', 'List', 'Dict', 'Set', 'Tuple'),
(7, 1, 1, 'What is the method to add an element to a list in Python?', 'append()', 'add()', 'insert()', 'extend()'),
(8, 1, 1, 'Which operator is used for exponentiation in Python?', '**', '^', '^^', 'exp'),
(9, 1, 1, 'What does the len() function do?', 'Returns length of an object', 'Returns size of an object', 'Returns type of an object', 'None of the above'),
(10, 1, 1, 'How do you create a dictionary in Python?', '{}', '[]', '()', '<>'),
(11, 1, 1, 'What is the correct file extension for Python files?', '.py', '.python', '.pyt', '.p'),
(12, 1, 1, 'Which function is used to output text in Python?', 'output()', 'write()', 'print()', 'display()'),
(13, 1, 1, 'Which of the following is used to create an anonymous function in Python?', 'def', 'lambda', 'fun', 'anon'),
(14, 1, 1, 'What is the keyword used to create a class in Python?', 'class', 'def', 'object', 'create'),
(15, 1, 1, 'Which statement is used to handle exceptions in Python?', 'catch', 'except', 'try', 'finally'),
(16, 1, 1, 'What is used to iterate over a sequence in Python?', 'for', 'while', 'loop', 'each'),
(17, 1, 1, 'How do you declare a list in Python?', '[1, 2, 3]', '(1, 2, 3)', '{1, 2, 3}', '<1, 2, 3>'),
(18, 1, 1, 'Which method is used to remove an item from a list in Python?', 'remove()', 'delete()', 'discard()', 'drop()'),
(19, 1, 1, 'Which operator is used for floor division in Python?', '//', '/', '%%', '%'),
(20, 1, 1, 'How do you start a comment in Python?', '#', '//', '--', '/*'),
(21, 1, 1, 'What does the \"pass\" statement do?', 'Skips the code block', 'Stops the execution', 'Defines a function', 'Returns a value'),
(22, 1, 1, 'What is the output of 3**2 in Python?', '9', '6', '8', 'None'),
(23, 1, 1, 'Which of the following is a mutable data type in Python?', 'List', 'Tuple', 'String', 'Set'),
(24, 1, 1, 'Which function is used to convert data types in Python?', 'int()', 'float()', 'str()', 'All of the above'),
(25, 1, 1, 'What is the output of len([1,2,3,4])?', '3', '4', '5', 'None'),
(26, 1, 1, 'What is the correct way to import a module in Python?', 'import module', 'load module', 'require module', 'include module'),
(27, 1, 1, 'How do you generate random numbers in Python?', 'random.randint()', 'math.random()', 'generate.random()', 'rand()'),
(28, 1, 1, 'Which keyword is used to return a value from a function?', 'return', 'output', 'send', 'yield'),
(29, 1, 1, 'What is the correct syntax for defining a function in Python?', 'def function_name():', 'func function_name():', 'function function_name():', 'declare function_name():'),
(30, 1, 1, 'How do you check the type of a variable in Python?', 'type()', 'var_type()', 'check_type()', 'is_type()'),
(46, 3, NULL, 'Which of the following SQL commands is used to retrieve data from a database?', ' SELECT', 'GET', 'SET', 'UPDATE');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quizid` int NOT NULL,
  `quizname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Subid` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quizid`, `quizname`, `Subid`) VALUES
(1, 'Python', 1),
(2, 'Java', 2),
(3, 'DBMS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `Rid` int NOT NULL,
  `Sid` varchar(255) NOT NULL,
  `quizid` varchar(255) NOT NULL,
  `score` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`Rid`, `Sid`, `quizid`, `score`) VALUES
(1, '', '1', 0),
(2, '', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Sid` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Sid`, `username`, `password`) VALUES
(1, 'saivenkatadada', '@Svenkat1'),
(2, '22331A0501', 'yourwish'),
(3, '22331A0553', '22331A0553');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `Subid` int NOT NULL,
  `Subname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`Subid`, `Subname`) VALUES
(1, 'Python'),
(2, 'Java');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`Qid`),
  ADD KEY `fk_quizid` (`quizid`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Qid`),
  ADD KEY `Quizid` (`Quizid`),
  ADD KEY `Subid` (`Subid`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quizid`),
  ADD KEY `Subid` (`Subid`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`Rid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Sid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Aid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Qid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quizid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `Rid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Sid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_quizid` FOREIGN KEY (`quizid`) REFERENCES `quiz` (`quizid`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_2` FOREIGN KEY (`Subid`) REFERENCES `subject` (`Subid`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_2` FOREIGN KEY (`Subid`) REFERENCES `subject` (`Subid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
