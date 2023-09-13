-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2022 at 05:18 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mnhs`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
`course_Id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_description` varchar(255) NOT NULL,
  `course_image` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_Id`, `course_name`, `course_description`, `course_image`) VALUES
(2, 'TECHNICAL VOCATIONAL LIVELIHOOD', 'Technical Vocational Livelihood', 'Screenshot (247).png'),
(3, 'ACCOUNTANCY BUSINESS and MANAGEMENT', 'Accountancy Businees and Management', 'business-08-400x250.jpg'),
(4, 'GENERAL ACADEMIC STRAND', 'General Academic Stranddd12', 'join-job-fair-as-job-seekers3.gif');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE IF NOT EXISTS `enrollment` (
`enrollment_id` int(11) NOT NULL,
  `school_year_id` varchar(30) NOT NULL,
  `student_id` int(30) NOT NULL,
  `level_section_id` int(30) NOT NULL,
  `faculty_id` int(30) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_id`, `school_year_id`, `student_id`, `level_section_id`, `faculty_id`, `date`) VALUES
(126, '110', 130, 156, 106, 'January 19, 2022 - Wednesday - 8:47 am');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
`fac_Id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level_section_id` int(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT 'Faculty',
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`fac_Id`, `firstname`, `middlename`, `lastname`, `date_of_birth`, `age`, `gender`, `address`, `contact`, `email`, `level_section_id`, `username`, `password`, `token`, `usertype`, `image`) VALUES
(84, 'Ralph123', 'I.', 'Rosael', '1999-01-13', '22', 'Male', 'San Rem', '9269228230', 'ralphrosael27@gmail.com', 163, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'c1b2c7f58e6abd669ca6cfd67f57cc78', 'Admin', 'Screenshot (158).png'),
(106, 'Jethro', 'Ver', 'Verdida', '2002-07-11', '19', 'Male', 'San Remigio', '9178962378', 'jethro@gmail.com', 150, '', '', '', 'Faculty', 'Screenshot (246).png');

-- --------------------------------------------------------

--
-- Table structure for table `level_section`
--

CREATE TABLE IF NOT EXISTS `level_section` (
`lev_sec_Id` int(11) NOT NULL,
  `level` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=174 ;

--
-- Dumping data for table `level_section`
--

INSERT INTO `level_section` (`lev_sec_Id`, `level`, `section`) VALUES
(149, 'Grade 7', 'Purity'),
(150, 'Grade 7', 'Obedience'),
(152, 'Grade 7', 'Humility'),
(153, 'Grade 8', 'Honesty'),
(154, 'Grade 8', 'Responsible'),
(155, 'Grade 8', 'Sincere'),
(156, 'Grade 8', 'Friendly'),
(158, 'Grade 9', 'Smart'),
(159, 'Grade 9', 'Gentleness'),
(160, 'Grade 9', 'Meekness'),
(161, 'Grade 9', 'Goodness'),
(162, 'Grade 11', 'Mercury'),
(163, 'Grade 11', 'Venus'),
(164, 'Grade 11', 'Earth'),
(165, 'Grade 11', 'Jupiter'),
(166, 'Grade 12', 'Artemis'),
(167, 'Grade 12', 'Aphrodite'),
(168, 'Grade 12', 'Athena'),
(169, 'Grade 12', 'Hera'),
(170, 'Grade 10', 'Hope'),
(171, 'Grade 10', 'Joy'),
(172, 'Grade 10', 'Peace'),
(173, 'Grade 10', 'Love');

-- --------------------------------------------------------

--
-- Table structure for table `registered_students`
--

CREATE TABLE IF NOT EXISTS `registered_students` (
`stud_Id` int(11) NOT NULL,
  `stud_type` varchar(255) NOT NULL,
  `lrn` int(255) NOT NULL,
  `student_firstname` varchar(255) NOT NULL,
  `student_middlename` varchar(255) NOT NULL,
  `student_lastname` varchar(255) NOT NULL,
  `student_extname` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` varchar(255) NOT NULL,
  `contact_num` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `fathers_name` varchar(255) NOT NULL,
  `mothers_name` varchar(255) NOT NULL,
  `parents_contact` varchar(255) NOT NULL,
  `last_grade_level` varchar(255) NOT NULL,
  `last_school_year` varchar(255) NOT NULL,
  `last_school_name` varchar(255) NOT NULL,
  `year_level_to_enroll` varchar(255) NOT NULL,
  `school_to_enroll` varchar(255) NOT NULL,
  `schooladd_to_enroll` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `track` varchar(255) NOT NULL,
  `strand` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `date_registered` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=131 ;

--
-- Dumping data for table `registered_students`
--

INSERT INTO `registered_students` (`stud_Id`, `stud_type`, `lrn`, `student_firstname`, `student_middlename`, `student_lastname`, `student_extname`, `gender`, `date_of_birth`, `age`, `contact_num`, `email`, `password`, `address`, `zipcode`, `fathers_name`, `mothers_name`, `parents_contact`, `last_grade_level`, `last_school_year`, `last_school_name`, `year_level_to_enroll`, `school_to_enroll`, `schooladd_to_enroll`, `semester`, `track`, `strand`, `image`, `status`, `date_registered`) VALUES
(130, 'New', 2147483647, 'Erwin', 'Cabag', 'Son', '', 'Female', '1997-09-24', '24', '9269228230', 'sonerwin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Old Towns, Medellin, Cebu', '6012', 'Ernesto Son', 'Helen Cabag', '9359428933', 'Grade 6', '2020-2021', 'Medellin Central School', 'Grade 7', 'Medellin National High School', 'Poblacion, Medellin, Cebu', '', '', '', 'daniel-lincoln-NR705beN_CU-unsplash.jpg', 'Enrolled', 'Jan. 19, 2022');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE IF NOT EXISTS `school_year` (
`year_Id` int(11) NOT NULL,
  `schoolyear` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Inactive'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=112 ;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`year_Id`, `schoolyear`, `status`) VALUES
(110, '2021-2022', 'Active'),
(111, '2022-2023', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`sub_Id` int(11) NOT NULL,
  `subject_level` varchar(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `strand` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_Id`, `subject_level`, `subject_name`, `strand`) VALUES
(14, 'Grade 7', 'edited', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
 ADD PRIMARY KEY (`course_Id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
 ADD PRIMARY KEY (`enrollment_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
 ADD PRIMARY KEY (`fac_Id`);

--
-- Indexes for table `level_section`
--
ALTER TABLE `level_section`
 ADD PRIMARY KEY (`lev_sec_Id`);

--
-- Indexes for table `registered_students`
--
ALTER TABLE `registered_students`
 ADD PRIMARY KEY (`stud_Id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
 ADD PRIMARY KEY (`year_Id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`sub_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
MODIFY `course_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
MODIFY `fac_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `level_section`
--
ALTER TABLE `level_section`
MODIFY `lev_sec_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `registered_students`
--
ALTER TABLE `registered_students`
MODIFY `stud_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=131;
--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
MODIFY `year_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `sub_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
