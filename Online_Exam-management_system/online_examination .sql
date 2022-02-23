-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2018 at 04:01 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_examination`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`A_id` int(11) NOT NULL,
  `Admin_name` varchar(20) NOT NULL,
  `Admin_Password` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`A_id`, `Admin_name`, `Admin_Password`) VALUES
(1, 'pulak', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `answer_responses`
--

CREATE TABLE IF NOT EXISTS `answer_responses` (
  `s_name` text NOT NULL,
  `question` varchar(255) NOT NULL,
  `response` varchar(255) NOT NULL,
  `dateOfResponse` date NOT NULL,
  `subject_title` varchar(100) NOT NULL,
  `q_no` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `subject_title` varchar(100) NOT NULL,
  `q_no` int(20) NOT NULL,
  `question` varchar(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `option1` varchar(200) NOT NULL,
  `option2` varchar(200) NOT NULL,
  `option3` varchar(200) NOT NULL,
  `option4` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`subject_title`, `q_no`, `question`, `correct_answer`, `option1`, `option2`, `option3`, `option4`) VALUES
('Artifical Inteligence', 1, 'Output segments of Artificial Intelligence programming contain(s)', 'All of the mentioned', 'Printed language and synthesized speech', 'Manipulation of physical object', 'Locomotion', 'All of the mentioned'),
('Artifical Inteligence', 2, 'Which instruments are used for perceiving and acting upon the environment?', 'Sensors and Actuators', 'Sensors', 'None of the mentioned', 'Sensors and Actuators', 'Perceiver'),
('Artifical Inteligence', 3, ' What is meant by agentâ€™s percept sequence?', ' Complete history of perceived things', ' Complete history of perceived things', 'Complete history of actuator', 'Used to perceive the environment', 'None of the mentioned'),
('Artifical Inteligence', 4, ' How many types of agents are there in artificial intelligence?', '4', '3', '2', '1', '4'),
('Artifical Inteligence', 5, ' Which search strategy is also called as blind search?', ' Uninformed search', 'Informed search', ' Uninformed search', 'Simple reflex search', 'All of the mentioned');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
`s_id` int(20) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `student_password` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`s_id`, `student_name`, `address`, `email`, `student_password`) VALUES
(2, 'Rahul', 'NLP', 'rahul@gmail.com', '12344'),
(3, 'raj', 'lakhimpur', '123', '12345'),
(4, 'plk', 'lakhimpur', 'qwe', '456'),
(5, 'luk', 'asd', 'qwe', 'zxc'),
(6, 'biki', 'aaa', 'wswsw', '123456'),
(7, 'pranab', 'laluk', 'pranab@', 'azxs'),
(8, 'qwerty', '52 No. National Highway', 'pulaksarmah333@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`subject_code` int(11) NOT NULL,
  `subject_title` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_code`, `subject_title`) VALUES
(1, 'Artifical Inteligence'),
(2, 'Mathematics'),
(3, 'C++'),
(4, 'Java'),
(5, 'PHP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`A_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
 ADD PRIMARY KEY (`q_no`), ADD KEY `exam_code` (`subject_title`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
 ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`subject_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `A_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
MODIFY `s_id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `subject_code` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
