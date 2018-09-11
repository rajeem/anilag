-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2018 at 07:43 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elib`
--

-- --------------------------------------------------------

--
-- Table structure for table `barrower`
--

CREATE TABLE `barrower` (
  `id` int(10) UNSIGNED NOT NULL,
  `bar_id` varchar(50) DEFAULT NULL,
  `school_code` varchar(50) DEFAULT NULL,
  `last1` varchar(50) DEFAULT NULL,
  `first1` varchar(50) DEFAULT NULL,
  `type` varchar(50) NOT NULL,
  `course` varchar(50) DEFAULT NULL,
  `year1` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `adviser` varchar(50) DEFAULT NULL,
  `ex_date` varchar(50) NOT NULL DEFAULT '0000-00-00',
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `active` int(11) NOT NULL,
  `gender` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barrower`
--

INSERT INTO `barrower` (`id`, `bar_id`, `school_code`, `last1`, `first1`, `type`, `course`, `year1`, `address`, `adviser`, `ex_date`, `contact`, `email`, `active`, `gender`) VALUES
(47, '000002', 'CHS', 'Aljecera', 'Rhodora', 'Borrower', 'faculty', '1st year', '8 lily st. area 8, P. Tamo, QC', 'mrs. Aljecera', '2010-03-31', '09193722882', 'dorialjecera.com.ph', 1, 'Female'),
(46, '000001', 'CHS', 'Perez', 'Criselda', 'Borrower', 'Guidance Counselor', '1st year', 'Philand', 'Dr. Referente', '2010-o3-31', '09296017367', 'criseldaperez@yahoo.com', 0, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `middle` varchar(45) NOT NULL,
  `books` varchar(45) NOT NULL,
  `numberno` int(10) UNSIGNED NOT NULL,
  `status` varchar(50) DEFAULT NULL,
  `date_get` varchar(50) DEFAULT NULL,
  `date_return` varchar(50) DEFAULT NULL,
  `due_date` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `books_bar`
--

CREATE TABLE `books_bar` (
  `id` int(10) UNSIGNED NOT NULL,
  `bar_id` varchar(50) DEFAULT NULL,
  `access_no` varchar(50) DEFAULT NULL,
  `books` varchar(45) NOT NULL,
  `author` varchar(50) DEFAULT NULL,
  `call_num` varchar(45) NOT NULL,
  `qty` int(11) NOT NULL,
  `deadline` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `date_borrow` date NOT NULL DEFAULT '0000-00-00',
  `school_code` varchar(50) NOT NULL,
  `fees` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_bar`
--

INSERT INTO `books_bar` (`id`, `bar_id`, `access_no`, `books`, `author`, `call_num`, `qty`, `deadline`, `date_borrow`, `school_code`, `fees`) VALUES
(177, '000001', '2233', 'Introduction to Computer', 'Antonio  M. Andes', '', 0, '2009-06-10 14:45:40', '2009-06-09', 'CHS', 0),
(178, '000002', '320e', 'Retorika sa Mabisang Pagpapahayag Binagong Ed', 'Jose A. Arrogante', '', 0, '2009-06-17 10:26:01', '2009-06-16', 'CHS', 0),
(179, '000002', '340e', 'Retorika (Filipino III)', 'Marietta . Alagad-Abad', '', 0, '2009-06-17 10:26:42', '2009-06-16', 'CHS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `borrowers_pic`
--

CREATE TABLE `borrowers_pic` (
  `id` int(11) NOT NULL,
  `bar_id` varchar(50) DEFAULT NULL,
  `file_name` varchar(50) DEFAULT NULL,
  `file_size` int(3) NOT NULL,
  `file_type` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `card_cat`
--

CREATE TABLE `card_cat` (
  `id` int(11) NOT NULL,
  `school_code` varchar(50) DEFAULT NULL,
  `pdb` text NOT NULL,
  `call_num` text NOT NULL,
  `classification_no` varchar(45) NOT NULL,
  `book_no` varchar(45) NOT NULL,
  `author_no` varchar(45) NOT NULL,
  `author_sname` text NOT NULL,
  `author_fname` text NOT NULL,
  `author_mname` text NOT NULL,
  `other_author1_no` varchar(45) NOT NULL,
  `other_author1_sname` text NOT NULL,
  `other_author1_fname` varchar(50) DEFAULT NULL,
  `other_author1_mname` varchar(50) NOT NULL,
  `other_author2_no` varchar(45) NOT NULL,
  `other_author2_sname` text NOT NULL,
  `other_author2_fname` varchar(50) NOT NULL,
  `other_author2_mname` varchar(50) NOT NULL,
  `other_author3_sname` text NOT NULL,
  `other_author3_fname` varchar(50) NOT NULL,
  `other_author3_mname` varchar(50) NOT NULL,
  `other_author3_no` varchar(45) NOT NULL,
  `other_author4_no` varchar(45) NOT NULL,
  `other_author4_sname` text NOT NULL,
  `other_author4_fname` text NOT NULL,
  `other_author4_mname` varchar(50) NOT NULL,
  `other_author5_no` varchar(45) NOT NULL,
  `other_author5_sname` varchar(50) NOT NULL,
  `other_author5_fname` varchar(50) NOT NULL,
  `other_author5_mname` varchar(50) NOT NULL,
  `other_author6_no` varchar(45) NOT NULL,
  `other_author6_sname` varchar(50) NOT NULL,
  `other_author6_fname` varchar(50) NOT NULL,
  `other_author6_mname` varchar(50) NOT NULL,
  `other_author7_no` varchar(45) NOT NULL,
  `other_author7_sname` varchar(50) NOT NULL,
  `other_author7_fname` varchar(50) NOT NULL,
  `other_author7_mname` varchar(50) NOT NULL,
  `title` text NOT NULL,
  `subject_classification` varchar(45) NOT NULL,
  `subject1` text NOT NULL,
  `subject2` text NOT NULL,
  `subject3` text NOT NULL,
  `subject4` text NOT NULL,
  `subject5` text NOT NULL,
  `subject6` text NOT NULL,
  `subject7` text NOT NULL,
  `isbn` text NOT NULL,
  `location` text NOT NULL,
  `edition` text NOT NULL,
  `place_pub` text NOT NULL,
  `publisher` text NOT NULL,
  `date_pub` text NOT NULL,
  `classification` text NOT NULL,
  `pdf` text NOT NULL,
  `help` text NOT NULL,
  `front` text NOT NULL,
  `status1` varchar(50) NOT NULL,
  `notes` text NOT NULL,
  `series` text NOT NULL,
  `qty` int(11) NOT NULL,
  `access_no` varchar(50) NOT NULL,
  `parallel_title` text NOT NULL,
  `oti` text NOT NULL,
  `uti` varchar(50) NOT NULL,
  `gmd` varchar(50) NOT NULL,
  `eoi` text NOT NULL,
  `opd` text NOT NULL,
  `size_dimension` text NOT NULL,
  `accom_mat` text NOT NULL,
  `source_of_fund` text NOT NULL,
  `mode_of_ac` varchar(50) NOT NULL,
  `mode_ac` varchar(50) NOT NULL,
  `date_ac` text NOT NULL,
  `property_no` text NOT NULL,
  `are` text NOT NULL,
  `encoded_by` text NOT NULL,
  `date_encode` text NOT NULL,
  `verified_by` text NOT NULL,
  `date_verify` text NOT NULL,
  `flag` varchar(5) DEFAULT NULL,
  `editors` longtext NOT NULL,
  `illustrator` varchar(45) NOT NULL,
  `author_relatingto_edition` longtext NOT NULL,
  `preliminary` varchar(45) NOT NULL,
  `no_of_pages` varchar(45) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_size` varchar(100) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `card_cat`
--

INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `classification_no`, `book_no`, `author_no`, `author_sname`, `author_fname`, `author_mname`, `other_author1_no`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_no`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author3_no`, `other_author4_no`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_no`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_no`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_no`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject_classification`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`, `editors`, `illustrator`, `author_relatingto_edition`, `preliminary`, `no_of_pages`, `file_name`, `file_size`, `file_type`) VALUES
(836, 'CHS', '', '', '160', 'B328l ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Logic for Filipinos', '', '', 'Logic', '', '', '', '', '', '971-08-6221-9', 'elibrary', '', 'Manila', 'National Book Store', '2002', 'Book', '', '', '', 'in', 'includes bibliography', '', 1, '328e1', '', '', '', 'Book', 'illustrated', '', '23 cms', '', '', 'Donation', '', '', '', '', 'admin', 'June 1, 2009, 5:03 pm', '', 'June 1, 2009, 5:03 pm', 'up', '', '', '', 'xii', '251', '', '', ''),
(835, 'CHS', '', '', '899.2103', 'R618i', '', 'Rodrigo', 'Didith ', 'Tan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Inside Manila with kids : a travel companion for parents', '', 'Travel - Children', 'Guidebook', '', '', '', '', '', '', 'elibrary', '', 'Manila', 'Tahanan Books', '1999', 'Book', '', '', '', 'in', '', '', 1, '276e', '', '', '', 'Book', 'illustrated', '', '', '', '', 'Donation', '', '', '', '', 'admin', 'June 1, 2009, 4:44 pm', '', 'June 1, 2009, 4:44 pm', 'up', '', '', '', '', '', '', '', ''),
(833, 'CHS', '', '', '921', 'R528a', '', 'Alejandro', 'Rufino', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Buhay at diwa ni Jose Rizal', '', 'Rizal, Jose A., 1861-1896 --Biography. ', '', '', '', '', '', '', '', 'elibrary', '', '', '', '', 'Book', '', '', '', 'in', '', '', 1, '285e', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', 'May 20, 2009, 5:40 pm', '', 'May 20, 2009, 5:47 pm', 'up', '', '', '', '', '', '', '', ''),
(832, 'CHS', '', '', '899.2104', 'In7s', '', '', '', '', '', 'Hidalgo', 'Cristina', 'Pantoja', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sleepless in manila:funny essays, etc., on insomnia by insomniacs', '', 'Philippine essays (English)', '', '', '', '', '', '', '971-828-024-3', 'elibrary', '', 'Quezon City', 'Milflores Publishing, Inc.', '2003', 'Book', '', '', '', 'in', '', '', 1, '346e', '', '', '', 'Book', 'illustrated', '', '23 cms', '', '', 'Donation', '', '', '', '', 'admin', 'May 20, 2009, 3:31 pm', '', 'May 20, 2009, 3:32 pm', 'up', 'Cristina Pantoja Hidalgo', 'Robert Magnuson', '', 'xvi', '134', '', '', ''),
(831, 'CHS', '', '', '899.2104', 'Se84', '', 'Tirol', 'Lorna', 'Kalaw', '', 'Maramba', 'Asuncion', 'David', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Seven in the eye of history : featuring essays', '', 'Philippine essays (English)', '', '', '', '', '', '', '971-27-1029-7', 'elibrary', '', 'Pasig City', 'Anvil Publishing, Inc.', '2000', 'Book', '', '', '', 'in', '', '', 1, '283e', '', '', '', 'Book', 'illustrated', '', '22 cms', '', '', 'Donation', '', '', '', '', 'admin', 'May 20, 2009, 3:15 pm', '', 'May 20, 2009, 3:15 pm', 'up', '', '', '', 'xi', '439', '', '', ''),
(830, 'CHS', '', '', '332.024', 'C67', '', 'Colayco', 'Francisco', 'J.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Wealth within your reach', '', 'Finance, Personal', 'Investment Philippines', '', '', '', '', '', '971-92995-0-9', 'elibrary', '', 'Manila', 'Colayco Foundation for Education, Inc.', '2004', 'Book', '', '', '', 'in', '', '', 1, '391e', '', '', '', 'Book', 'illustrated', '', '22 cms', '', '', 'Donation', '', '', '', '', 'admin', 'May 20, 2009, 2:49 pm', '', 'May 20, 2009, 2:50 pm', 'up', '', '', '', '', '231', '', '', ''),
(829, 'CHS', '', '', '808.86', 'D36', '', 'De Guzman', 'Maria ', 'Odulio', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Model letters for all occasions, sentence stress, and emphasis', '', 'Letter writing', 'English language - Rhetoric', 'Form letters', '', '', '', '', '971-081-377-3', 'elibrary', '', 'Manila', 'Marja Odulio De Guzman', '1973', 'Book', '', '', '', 'in', '', '', 1, '308e', '', '', '', 'Book', '', '', '18 cms', '', '', 'Donation', '', '', '', '', 'admin', 'May 19, 2009, 4:18 pm', '', 'May 19, 2009, 4:18 pm', 'up', '', '', '', '', '81', '', '', ''),
(828, 'CHS', '', '', '347.5990', 'An88s', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'The Shari\'a courts in the Philippines : women, men & muslim personal laws', '', 'Courts, Islamic- Philippines', 'Islamic  law - Philippines', '', '', '', '', '', '971-92480-3-3', 'elibrary', '', 'Davao City', 'Pilipina Legal Resources Center, Inc .( PLRC)', '2003', 'Book', '', '', '', 'in', '', '', 1, '328e', '', '', '', 'Book', '', '', '23 cm', '', '', 'Donation', '', '', '', '', 'admin', 'May 19, 2009, 3:30 pm', '', 'May 19, 2009, 3:37 pm', 'up', '', '', '', '', '164', '', '', ''),
(827, 'CHS', '', '', '808.84', 'T67', '', 'Torrenueva', 'C', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Little Book of essays: A supplementary book for students in high school and college', '', 'Essays', '', '', '', '', '', '', '971-8905-38-3', 'elibrary', '', 'Manila', 'Palinsad Gen. Merchandise', '1999', 'Book', '', '', '', 'in', '', '', 1, '350e', '', '', '', 'Book', 'illustrated', '', '18 cms', '', '', 'Donation', '', '', '', '', 'admin', 'May 19, 2009, 2:58 pm', '', 'May 19, 2009, 2:58 pm', 'up', '', '', '', 'iv', '120', '', '', ''),
(826, 'CHS', '', '', '899.2113', 'F847', '', 'Francisco', 'Lazaro', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sugat ng alaala', '', '', '', '', '', '', '', '', '971-550-179-6', 'elibrary', '', 'Quezon City', 'Ateneo de Manila University Press', '1995', 'Book', '', '', '', 'in', '', '', 1, '289e', '', '', '', 'Book', '', '', '19 cms', '', '', 'Donation', '', '', '', '', 'admin', 'May 19, 2009, 2:51 pm', '', 'May 19, 2009, 2:51 pm', 'up', '', '', '', '', '370', '', '', ''),
(825, 'CHS', '', '', '001.64', 'L319i', '', 'La Putt', 'Juny', 'Pilapil', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Introduction to computer concepts', '', 'Computer ', 'Electronic data processing', '', '', '', '', '', '', 'elibrary', '', 'Manila', 'Juny La Putt', '2006', 'Book', '', '', '', 'in', '', '', 1, '205e', '', '', '', 'Book', '', '', '22 cms', '', '', 'Donation', '', '', '', '', 'admin', 'May 19, 2009, 2:45 pm', '', 'May 19, 2009, 2:45 pm', 'up', '', '', '', '', '306', '', '', ''),
(824, 'CHS', '', '', '572', 'C88', '', 'Cruz', 'Corazon', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Philosophy of Man', '', 'Man', 'Philosophical anthropology', '', '', '', '', '', '971-08-5885-8', 'elibrary', '3rd', 'Mandaluyong City', 'National Book Store', '1995', 'Book', '', '', '', 'in', 'includes index and bibliography', '', 1, '287', '', '', '', 'Book', '', '', '19 cms', '', '', 'Donation', '', '', '', '', 'admin', 'May 19, 2009, 2:22 pm', '', 'May 20, 2009, 2:18 pm', 'up', '', '', '', 'x', '236', '', '', ''),
(823, 'CHS', '', '', '780.7', 'So68t', '', 'Sorneo', 'Higino', 'A.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Teaching the fundamentals of Music', '', 'Music - instruction and study', '', '', '', '', '', '', '971-085526-3', 'elibrary', '', 'Mandaluyong City', 'National Book Store', '1993', 'Book', '', '', '', 'in', 'includes bibliography', '', 1, '301e', '', '', '', 'Book', 'illustrated', '', '25 cm', '', '', 'Donation', '', '', '', '', 'admin', 'May 14, 2009, 4:35 pm', '', 'May 14, 2009, 4:39 pm', 'up', '', '', '', '', '48', '', '', ''),
(822, 'CHS', '', '', '920', 'Q528g', '', 'Quirino', 'Carlos', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'The Great Malayan', '', 'Rizal, Jose A., 1861-1896. ', 'Heroes - Philippines - Biography.', '', '', '', '', '', '971-630-085-9', 'elibrary', '', 'Manila', 'Philippine Education Company Inc.', '1997', 'Book', '', '', '', 'in', '', '', 1, '298e', '', '', '', 'Book', '', 'illustrated', '17 cms', '', '', 'Donation', '', '', '', '', 'admin', 'May 13, 2009, 4:18 pm', '', 'May 13, 2009, 4:18 pm', 'up', '', '', '', '', '338', '', '', ''),
(818, 'CHS', '', '', '899.211', 'D42', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Sining ng pagbigkas at pasulat na pakikipagtalastasan', '', '  	 Filipino language Rhetoric. Filipino language Composition, exercises', '', '', '', '', '', '', '971-08-6307', 'elibrary', '', 'Mandaluyong City', 'National Book Store', '2002', 'Book', '', '', '', 'in', 'includes talasalitaan, talasanggunian', '', 1, '332a', '', '', '', 'Book', '', '', '22 cms', '', '', 'Donation', '', '', '', '', 'admin', 'May 12, 2009, 3:47 pm', '', 'May 12, 2009, 3:48 pm', 'up', '', '', '', '', '', '', '', ''),
(815, 'CHS', '', '', '', '', '', 'King', 'Jenny', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Success in writing school papers', '', 'Writing', 'Writing', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '327e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(814, 'CHS', '', '', '959.902', 'G937', '', 'Guerrero', 'Leon Ma.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'The first Filipino : a biography of Jose Rizal / by Leon Ma. Guerrero ; with an introduction by Carlos Quirino. ', '', 'Rizal, Jose,1861-1896. ', '', '', '', '', '', '', '971-270-740-7', 'elibrary', '', '[Manila]', 'Guerrero Pub', ' 1998', 'Book', '', '', '', 'in', 'includes bibliography', '', 1, '280e', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', 'May 5, 2009, 5:04 pm', '', 'May 20, 2009, 3:43 pm', 'up', '', '', '', 'xxiv', '512', '', '', ''),
(811, 'CHS', '', '', '371.33', 'G19t', '', 'Garo ', 'Candelaria ', 'D.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Teaching Educational Technology', '', 'Computer ', 'Computer Technology', '', '', '', '', '', '971-08-6514-5', 'elibrary', '', 'Mandaluyong City', 'National Book Store', '2004', 'Book', '', '', '', 'in', '', '', 1, '313e', '', '', '', 'Book', '', '', '23 cm', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'May 14, 2009, 4:12 pm', 'up', '', '', '', 'vii', '57', '', '', ''),
(812, 'CHS', '', '', '398.2', 'Aq56p', '', 'Aquino', 'Gaudencia', 'V.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Tales and Legends of Long Ago', '', 'legends - Philippines', '', '', '', '', '', '', '971-08-5811-4', 'elibrary', '', '', '', '', 'Book', '', '', '', 'in', '', '', 1, '288e', '', '', '', 'Book', 'illustrated', '', '22 cms', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'May 20, 2009, 2:36 pm', 'up', '', '', '', 'x', '104', '', '', ''),
(809, 'CHS', '', '', '899.213Pi', 'H47i', '', ' Hernandez', 'Amado', 'V.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Mga Ibong Mandaragit', '', 'Filipino fiction--History and criticism.    ', '', '', '', '', '', '', '', 'elib', '', 'Las Pinas City', 'M & L Licudine Enterprises', '1978', 'Book', '', '', '', 'in', '', '', 1, '292e', '', '', '', 'Book', '', '', '23 cms', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'May 20, 2009, 2:27 pm', 'up', '', '', '', '', '416 p.', '', '', ''),
(810, 'CHS', '', '', '899.211', 'L234a', '', 'Landicho', 'Domingo', 'G.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Anak ng Lupa', '', 'Short stories, Filipino.', '', '', '', '', '', '', '971-550-175-5', 'elibrary', '', 'Quezon City', 'Ateneo de Manila University Press', '1995', 'Book', '', '', '', 'in', '', '', 1, '277e', '', '', '', 'Book', '', 'illustrated', '18 cms', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'May 13, 2009, 3:48 pm', 'up', '', '', '', 'xi', '324', '', '', ''),
(806, 'CHS', '', '', '', '', '', 'Retizos', 'Isidro', 'L.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Guide to Highschool Book Reports', '', 'Biography', 'Literature', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '332e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(807, 'CHS', '', '', '242.802', 'C286', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'A Catholic\'s Treasury of Prayers for the new millenium', '', 'Catholic Church--English.--Prayer-books and devotions', 'Devotional literature. ', '', '', '', '', '', '971-27-0922-1', 'elibrary', '', 'Pasig City', 'Anvil Publishing, Inc.', '2000', 'Book', '', '', '', 'in', '', '', 1, '93A', '', '', '', 'Book', '', 'illustrated', '14.5 cms', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'May 13, 2009, 3:38 pm', 'up', 'Manuel Gabriel', '', '', 'xv', '175', '', '', ''),
(808, 'CHS', '', '', '398.2', 'Aq56p', '', 'Aquino', 'Gaudencia', 'V.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Philippine Legends', '', 'Folklore - Philippines', 'Legends - Philippines', '', '', '', '', '', '971-08-0615-7', 'elibrary', '', 'Manila', 'National Book Store', '1972', 'Book', '', '', '', 'in', '', '', 1, '268e', '', '', '', 'Book', 'illustrated', '', '17 cm', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'May 14, 2009, 4:50 pm', 'up', '', '', '', '', '133', '', '', ''),
(803, 'CHS', '', '', '', '', '', 'Hawthorne', 'Nathaniel', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'The Scarlet Letter', '', 'Novel', 'English', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '026e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(804, 'CHS', '', '', 'FIC', 'GEO', '', 'George', 'Jean', 'Craighead', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Julie of the Wolves', '', 'Novel', 'English', '', '', '', '', '', '', 'elibrary', '', 'New York', 'Harper Collins Publishers Inc.', '', 'Book', '', '', '', 'in', '', '', 1, '044e', '', '', '', 'Book', '', '', '17 cm', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'June 2, 2009, 6:17 pm', 'up', '', '', '', '', '201', '', '', ''),
(805, 'CHS', '', '', '', '', '', 'Soriano ', 'Oscar', 'Gatchalian', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Comprehensive Drug Education revised edition with RA 9165', '', ' Mapeh', 'Health', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '319e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(802, 'CHS', '', '', '', '', '', 'Salinger', 'J.D.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'The Catcher in the Rye', '', 'Novel', 'English', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '039e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(799, 'CHS', '', '', '', '', '', 'Velasco', 'Benjamin ', 'S.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Electronic Components Testing Simplified', '', 'Computer ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '195e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(800, 'CHS', '', '', '959.9', 'M291s', 'M291s', 'Malaya ', 'J. Eduardo', '', '', '', '', '', '', 'Malaya', 'Jonathan', 'E', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'So Help us God The Presidents of the Philippines and their Inaugural Addresses ', '', 'Presidents--Inaugural addresses.--Philippines', 'Presidents--Inauguration.--Philippines ', '', '', '', '', '', '971-27-1486-1', 'elibrary', '', 'Pasig City', 'Anvil Publishing, Inc.', '2004', 'Book', '', '', '', 'in', 'includes bibliography', '', 1, '271e', '', '', '', 'Book', 'illustrated', 'includes bibliography', '22 cms', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'March 16, 2010, 11:20 am', 'up', '', '', '', 'xvi', '351', '', '', ''),
(801, 'CHS', '', '', '', '', '', 'Hugo ', 'Victor', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Les Miserables', '', 'Novel', 'English', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '040e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(797, 'CHS', '', '', '', '', '', 'Leuterio', 'Dr. Florida', 'C.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Technology & Livelihood Education for Sustainable Development (1st year)', '', 'T.L.E.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '336e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(798, 'CHS', '', '', '', '', '', 'Leuterio', 'Dr. Florida', 'C.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Technology & Livelihood Education for Sustainable Development (3rd yr)', '', 'T.L.E.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '335e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(794, 'CHS', '', '', '', '', '', 'Henkes', 'Kevin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Olive\'s Ocean', '', 'English Literature', 'English', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '062e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(795, 'CHS', '', '', '', '', '', 'Torrenueva', 'Cristina', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Mini-Book of 300 english and Filipino Tongue Twisters', '', 'English', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '157e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(796, 'CHS', '', '', '', '', '', 'Azanza', 'Patrick', 'Alain', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Economics, Society and Development', '', 'Economics', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '318e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(792, 'CHS', '', '', '', '', '', 'Ching', 'Gregorio', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2000 Word Drills', '', 'Vocabulary', 'Language', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '303e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(793, 'CHS', '', '', '', '', '', 'Pepito', 'Copernicus', 'P.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Introduction to FOXPRO database Programming (for DOS Windows Environment)', '', 'Computer ', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '194e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(789, 'CHS', '', '', '', '', '', 'McDougald', 'Charles', 'C.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'The Marcos File', '', 'History', 'Biography', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '263e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(790, 'CHS', '', '', '', '', '', 'Bello', 'Walden', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'The Anti-Development State The Political Economy of Permanent Crisis in the Philippines', '', 'Social Science Philosophy', 'Sociology', 'Politics', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '330e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(791, 'CHS', '', '', '', '', '', 'Silverio', 'Julio', 'F.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Mga Pabula ng ating Bansa', '', 'Pabula', 'Filipino', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '267e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(786, 'CHS', '', '', '', '', '', 'Lachica PH.D.', 'Venerada', 'S.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Literaturang Filipino', '', 'Filipino', 'Literature', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '341e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(787, 'CHS', '', '', '687', 'H54c', '', 'Hilario', 'Carmelita', 'Bildan', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Clothing Technology made easy', '', 'T.L.E.', '', '', '', '', '', '', '971-08-6176-X', 'e-Library', '', '', 'National Book Store', '2001', 'Book', '', '', '', 'in', 'includes glossary and bibliography', '', 1, '311e', '', '', '', 'Book', 'illustrated', '', '25 cms', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'February 19, 2010, 10:08 am', 'up', '', '', '', 'xv', '281 p', '', '', ''),
(788, 'CHS', '', '', '', '', '', 'Mercado Jr.', 'Eliseo', 'R.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Mindanao on the mend', '', 'Mapeh', 'Culture and Arts', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '315e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(785, 'CHS', '', '', '', '', '', 'del Castillo y Tuazon', 'Teofilo', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Philippine Literature from ancient times to present', '', 'Filipino', 'Literature', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '259e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(783, 'CHS', '', '', '899.2113 ', 'D384h', '', 'De los Angeles', 'Servando', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ang Huling Timawa', '', 'Filipino fiction. ', 'Pagbasa', '', '', '', '', '', '', 'e-library', '', 'Quezon City ', 'ADMU Press', '1999', 'Book', '', '', '', 'in', '', '', 1, '261e', '', '', '', 'Book', '', '', '18 cm. ', '', '', 'Donation', '', '', '', '', 'admin', 'April 30, 2009, 11:23 am', '', 'March 19, 2010, 2:09 pm', 'up', '', '', '', 'xiv', '474', '', '', ''),
(784, 'CHS', '', '', '', '', '', 'Kalin', 'Robert', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Prentice Hall Geometry', '', 'Mathematics', 'Geometry', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '220e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(781, 'CHS', '', '', 'FICTION', 'Dic', '', 'Dickens', 'Charles', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ' Oliver Twist / by Charles Dickens ; Adapted by Les Martin with illustrations by Jean Zallinger.', '', 'Orphans--Fiction.', '', '   Robbers and outlaws--Fiction.', '', '', '', '', '', 'e-library', '', '', '', '', 'Book', '', '', '', 'in', '', '', 1, '016e', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', 'April 29, 2009, 3:43 pm', '', 'March 19, 2010, 1:54 pm', 'up', '', '', '', '', '', '', '', ''),
(782, 'CHS', '', '', '', '', '', 'Mapa', 'Felina ', 'G.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Introduction to Calculus', '', 'Mathematics', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '219e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(779, 'CHS', '', '', '005.369', 'P393i', '', 'Pepito', 'Copernicus', 'P.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Introduction to Turbo Pascal Programming', '', 'Computer ', 'Computer Programming', '', '', '', '', '', '', 'elibrary', '', '', '', '', 'Book', '', '', '', 'in', '', '', 1, '206e', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'May 12, 2009, 3:59 pm', 'up', '', '', '', '', '', '', '', ''),
(780, 'CHS', '', '', '641.5', 'El1', '', 'Del Rosario', 'Lourdes', 'P.', '', 'Lopez', 'Marilen', '', '', 'Lopez', 'Tina', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'El Comedor', '', 'Cookery', '', '', '', '', '', '', '971-27-1438-1', 'elibrary', '', 'Pasig City', 'Anvil Publishing, Inc.', '2004', 'Book', '', '', '', 'in', 'includes glossary', '', 1, '221e', '', '', '', 'Book', 'illustrated', '', '24 cm', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'May 12, 2009, 3:33 pm', 'up', '', 'Leonardo Giron', '', 'xxi', '162', '', '', ''),
(778, 'CHS', '', '', '', '', '', 'Enriquez', 'Michael', 'Q.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Simple Electronics (Basic) Fully Illustrated', '', 'Electronics', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '196e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(777, 'CHS', '', '', '', '', '', 'a Scott Fetzer company', 'World Book, INC.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'The World Book Encyclopedia', '', 'Encyclopedia', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '162A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(776, 'CHS', '', '', '', '', '', 'Leuterio', 'Dr. Florida', 'C.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Technology & Livelihood Education for Sustainable Development', '', 'T.L.E.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '337e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(860, 'CHS', '', '', '915.99059', 'H529m', 'H529m', 'HickS', 'Nigel', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ' The magic of the Philippines', '', 'Philippines--Description and travel--Pictorial works. ', '', '', '', '', '', '', '1-84330-133-4', 'e-library', '', 'London', 'New Holland Publishing', '2002', 'Book', '', '', '', 'in', '', '', 1, '339e', '', '', '', 'Book', '', '', '28 cm. ', '', '', 'Donation', '', '', '', '', 'admin', 'March 16, 2010, 2:34 pm', '', 'March 16, 2010, 2:38 pm', 'up', '', '', '', '', '80 p', '', '', ''),
(775, 'CHS', '', '', '', '', '', 'Aquino ', 'Francisca', 'Reyes', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Fundamental Dance Steps and Music', '', 'Music', 'Arts', 'MAPEH', 'Dance', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '338e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(773, 'CHS', '', '', '', '', '', 'Honda', 'Prof. M.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Easy Way to Learn JAPANESE with Filipino Text Second Edition', '', 'Language', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '117A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(771, 'CHS', '', '', '', '', '', 'Pacis', 'Carla ', 'M.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'O.C.W. a Young boy\'s Search for his Mother', '', 'English', 'Literature', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '293e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(772, 'CHS', '', '', '', '', '', 'Cardenas', 'Elpidio', 'J.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Technical Drafting 1', '', 'Engineering', 'Architecture', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '329e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(770, 'CHS', '', '', '', '', '', 'Tejero', 'Erlinda', 'G.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Thesis & Dissertation Writing: A Modular Approach', '', 'Thesis', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '365A', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(769, 'CHS', '', '', '398.6 ', 'V71b', '', 'Villianueva', 'Rene', 'O.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bugtong, Bugtong', '', 'Riddles - Filipino', '', '', '', '', '', '', '', '', '', '', '', '', 'Book', '', '', '', 'in', '', '', 1, '291e', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'March 19, 2010, 2:14 pm', 'up', '', '', '', '', '', '', '', ''),
(768, 'CHS', '', '', '909.095', 'A89', '', 'Banasihan', 'Ma. Estela', 'E.', '', 'Olivades-Correa', 'Monina', '', '', 'Fornier Ph.D.', 'Joselito', 'N.', 'Habana', 'Olivia', 'M.', '', '', 'Galvez', 'Virgilio', 'C.', '', '', '', '', '', '', '', '', '', '', '', '', 'Asya Lupang Biyaya Kasaysayan, Kabihasnan at Kalinangan', '', 'History', '', '', '', '', '', '', '', 'e-library', '', 'Pasig City', 'Anvil Publishing, Inc.', '2001', 'Book', '', '', '', 'in', '', '', 1, '312e', '', '', '', 'Book', '', '', '26 cms', '', '', 'Donation', '', '', '', '', 'admin', 'April 29, 2009, 10:46 am', '', 'March 19, 2010, 2:52 pm', 'up', '', '', '', 'vii', '382', '', '', ''),
(767, 'CHS', '', '', '', '', '', 'Pearson Education Company', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'The complete Idiot\'s guide to Photography Like a Pro', '', 'Arts', '', '', '', '', '', '', '', '', '', '', 'Marie Butler-Knight', '', 'Book', '', '', '', 'in', '', '', 1, '168e', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'April 29, 2009, 10:47 am', 'up', '', '', '', '', '', '', '', ''),
(766, 'CHS', '', '', '516.3', 'P94', '', 'Protter', 'Murray', 'H.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Analytical Geometry', '', 'Mathematics', 'Geometry', '', '', '', '', '', '', 'e-liibrary', '', '', '', '', 'Book', '', '', '', 'in', '', '', 1, '630', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'March 19, 2010, 1:58 pm', 'up', '', '', '', '', '', '', '', ''),
(764, 'CHS', '', '', '', '', '', 'Ocampo', 'Ambeth', 'R.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'RIZAL WITHOUT THE OVERCOAT expanded edition', '', 'Filipino', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '297e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(765, 'CHS', '', '', '', '', '', 'Nocon', 'Ferdinand', 'P.', '', 'Torrecampo', 'Joel', 'T.', '', 'Balacua', 'Ma. Magdalena', 'P.', 'Daguia', 'Wilfredo', 'B.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'General Statistics made simple for Filipinos', '', 'Statistics', '', '', '', '', '', '', '', '', '', '', '', '', 'Book', '', '', '', 'in', '', '', 1, '310e', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'April 29, 2009, 10:27 am', 'up', '', '', '', '', '', '', '', ''),
(763, 'CHS', '', '', '', '', '', 'Alagad-Abad', 'Marietta', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Retorika (Filipino III)', '', 'Filipino', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 0, '340e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(759, 'CHS', '', '', '959.9025', 'O15', '', 'Ocampo', 'Ambeth', 'R.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Meaning and History: The Rizal Lectures', '', 'Rizal, Jose - History', '', '', '', '', '', '', '971-27-1150-1', 'e-library', '', 'Pasig City', 'Anvil Publishing', '2001', 'Book', '', '', '', 'in', '', '', 1, '284e', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'March 16, 2010, 10:40 am', 'up', '', '', '', 'xix', '121 ', '', '', ''),
(760, 'CHS', '', '', '', '', '', 'Lacsamana-Jensen', 'Paz', 'A.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Speed Math Mutiplication and Addition', '', 'Mathematics', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '222e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(761, 'CHS', '', '', '', '', '', 'Oriondo', 'Leonora', 'Loyola', '', 'Dallo-Antonio', 'Eleanor', 'M.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Evaluating Educational Outcomes: Tests, Measurement and Evaluation', '', 'Educational tests and measurements--Philippines.', 'Statistics', '', '', '', '', '', '', '', '', '', '', '', 'Book', '', '', '', 'in', '', '', 1, '971230330', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'April 29, 2009, 10:31 am', 'up', '', '', '', '', '', '', '', ''),
(762, 'CHS', '', '', '', '', '', 'Arrogante', 'Jose', 'A.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Retorika sa Mabisang Pagpapahayag Binagong Edisyon', '', 'Filipino', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 0, '320e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(837, 'CHS', '', '', ' 004.07', 'An23i ', '', 'Andes', 'Antonio ', 'M', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Introduction to Computer', '', 'Computers', 'Computers - Handbooks, manuals, etc', '', '', '', '', '', '971-8523-15-4', 'elibrary', '', 's.l', 's.n', '2003', 'Book', '', '', '', 'in', 'includes index', '', 0, '2233', '', '', '', 'Book', 'illustrated', '', '26 cm', '', '', 'Donation', '', '', '', '', 'admin', 'June 9, 2009, 2:37 pm', '', 'June 9, 2009, 2:37 pm', 'up', 'Rodel N. Naz', '', '', '', '174', '', '', ''),
(838, 'CHS', '', '', 'k251', 'mcm', '', 'Keene', 'Carolyn', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Nancy Drew: The Moonstone Castle Mystery', '', 'mystery story', '', '', '', '', '', '', '', '', '', '', '', '', 'Book', '', '', '', 'in', '', '', 1, '106e', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'September 22, 2009, 3:33 pm', 'up', '', '', '', '', '', '', '', ''),
(840, 'CHS', '', '', '', '', '', 'Hawkins', 'Jerald ', 'D', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Walking', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', 1, '202e', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up', '', '', '', '', '', '', '', ''),
(841, 'CHS', '', '', '673.2', 'B76', '673.2', 'Brown', 'Judith', 'E.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Nutrition Now', '', 'Nutrition', '', '', '', '', '', '', '981-265-391-0', 'e-library', '4th', 'Australia', 'Wadsworth', '2005', 'Book', '', '', '', 'in', '', '', 1, '198e', '', '', '', 'Book', 'illustrated', '', '', '', 'SEF', 'Donation', '', '', '', '', 'admin', 'November 4, 2009, 12:49 pm', '', 'November 4, 2009, 12:49 pm', 'up', '', '', '', 'xxvi', '32-16', '', '', ''),
(842, 'CHS', '', '', '547', 'M32', 'M32', 'McMurry', 'John', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Organic Chemistry', '', 'organic chemistry', '', '', '', '', '', '', '0-534-42005-2', 'e-library', '6th edition', 'Australia', 'Thomson', '2004', 'Book', '', '', '', 'in', '', '', 1, '187e', '', '', '', 'Book', 'illustrated', '', '26 cms', '', 'SEF', 'Donation', '', '', '', '', 'admin ', 'November 16, 2009, 4:01 pm', '', 'November 16, 2009, 4:01 pm', 'up', '', '', '', 'xxxiii', '1176', '', '', ''),
(843, 'CHS', '', '', '796.34', 'B37', 'B37', 'Bassett', 'Glenn', '', 'Ot8', 'Otta', 'William', '', 'Sh5', 'Shelton', 'Christine', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Tennis Today', '', 'tennis', '', '', '', '', '', '', '981-240-553-4', 'e-library', '', 'Australia', 'Thomson Learning', '2000', 'Book', '', '', '', 'in', '', '', 1, '169e', '', '', '', 'Book', 'illustrated', '', '23 cms', '', 'SEF', 'Donation', '', '', '', '', 'admin', 'December 3, 2009, 11:13 am', '', 'December 4, 2009, 2:27 pm', 'up', '', '', '', 'xii', '225', '', '', ''),
(844, 'CHS', '', '', '158.2', 'M43', 'M43', 'Matthews', 'Andrew', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Making Friends: A guide to getting along with people', '', 'friendship', '', '', '', '', '', '', '981-00-1953-X', 'e-library', '', 'Singapore', 'Media Masters', '1990', 'Book', '', '', '', 'in', '', '', 1, '163e', '', '', '', 'Book', '', 'illustrated', '26cms', '', 'SEF', 'Donation', '', '', '', '', 'admin ', 'December 7, 2009, 2:24 pm', '', 'December 7, 2009, 2:31 pm', 'up', '', 'Andrew Matthews', '', '144', '', '', '', ''),
(845, 'CHS', '', '', '370.776', 'El2c', 'El2c', 'Elevazo', 'Aurelio', 'O.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Comprehensive reviewer for the Licensure Examination for Teachers', '', 'Teachers--Philippines--Examinations,questions, etc', 'Education-Philippines--Examinations, questions, etc', '', '', '', '', '', '', 'e-library', '', 'Mandaluyong City', 'National Book Store', '', 'Book', '', '', '', 'in', '', '', 1, '349e', '', '', '', 'Book', '', '', '', '', 'SEF', 'Donation', '', '', '', '', 'admin ', 'December 7, 2009, 3:09 pm', '', 'December 7, 2009, 3:09 pm', 'up', '', '', '', '', '', '', '', ''),
(846, 'CHS', '', '', '370.15', 'G37', 'G37', 'Gardner', 'Howard', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Multiple Intelligences: The theory in practice', '', 'Learning', 'Intellect', '', '', '', '', '', '046-501-822-X', 'e-Library', '', '', '', '', 'Book', '', '', '', 'in', 'includes bibliograhy and index', '', 1, '154e', '', '', '', 'Book', '', '', '23 cms', '', 'SEF', 'Donation', '', '', '', '', 'admin', 'December 8, 2009, 2:44 pm', '', 'December 8, 2009, 2:44 pm', 'up', '', '', '', 'xvi', '304', '', '', ''),
(847, 'CHS', '', '', '770.2', 'E22', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'The complete idiot\\\'s guide to photography like a pro', '', ' Photography--Handbooks, manuals, etc.', '', '', '', '', '', '', '981-409-620', 'eLibrary', '', 'USA', 'alpha books', '2000', 'Book', '', '', '', 'in', 'includes index and photo addresses and web sites', '', 1, '170e', '', '', '', 'Book', 'illustrated', '', '', '', 'SEF', 'Donation', '', '', '', '', 'admin', 'December 11, 2009, 12:09 pm', '', 'December 11, 2009, 12:09 pm', 'up', '', '', '', 'xvii', '405', '', '', ''),
(849, 'CHS', '', '', '503', 'V82', 'V82', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Visual encyclopedia of science', '', '', '', '', '', '', '', '', '1-4053-0676-9', 'e-Library', '', 'London', 'Dorling Kindersley', '1998', 'Book', '', '', '', 'in', 'includes index', '', 1, '389e', '', '', '', 'Book', 'illustrated', '', '16 cms', '', '', 'Donation', '', '', '', '', 'admin', 'February 19, 2010, 9:11 am', '', 'February 19, 2010, 9:11 am', 'up', '', '', '', '', '512 p', '', '', ''),
(850, 'CHS', '', '', '', 'Aq5b', 'Aq5b', 'Aquino', 'Fe', 'O.', '', 'Callang', 'Consuelo', 'C.', '', 'Bas', 'hermina', 'S.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Business English Correspondence', '', 'Business letters', 'Letter writing', '', '', '', '', '', '971-08-6104-2', 'e-Library', '', 'Mandaluyong City', 'National Book Store', '2000', 'Book', '', '', '', 'in', 'includes references', '', 1, '390e', '', '', '', 'Book', 'illustrated', '', '22 cms', '', '', 'Donation', '', '', '', '', 'admin', 'February 19, 2010, 9:24 am', '', 'February 19, 2010, 9:24 am', 'up', '', '', '', 'iii', '226 p', '', '', ''),
(851, 'CHS', '', '', '658.0546', 'T84i', '', 'Turban', 'Efraim', '', '', 'Rainer,Jr.', 'Kelly', '', '', 'Potter', 'Richard', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Introduction to information technology', '', 'Information technology', 'Management information systems', '', '', '', '', '', '9971-51-321-8', 'e-Library', '', 'New York', 'John Wiley & Sons, Inc.', '2001', 'Book', '', '', '', 'in', 'includes glossary, index and references', '', 1, '153e', '', '', '', 'Book', 'illustrated', '', '22 cms', '', '', 'Donation', '', '', '', '', 'admin', 'February 19, 2010, 10:25 am', '', 'February 19, 2010, 10:27 am', 'up', '', '', '', 'xvii', '550', '', '', ''),
(852, 'CHS', '', '', '070', 'M938', 'M938', 'Moyes', 'Norman', 'B', '', 'White', 'David', 'Manning', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Journalism in the mass media', '', 'Journalism', 'communication', '', '', '', '', '', '', 'Ref', '', 's.l.', 'Ginn and Company', '1970', 'Book', '', '', '', 'in', 'includes bibliography and index0-663-30497-0', '', 1, '445', '', '', '', 'Book', '', '', '22 cms', '', '', 'Donation', '', '', '', '', 'admin', 'March 3, 2010, 9:52 am', '', 'March 3, 2010, 9:52 am', 'up', '', '', '', 'xiv', '522', '', '', ''),
(853, 'CHS', '', '', '378', 'B46', 'B46', 'Bennett', 'John Michael', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Four powers of communication: skills for effective learning', '', 'Method of study', 'Language Arts', '', '', '', '', '', '0-07-557113-7', 'Ref', '', 'U.S.', 'McGraw-Hill, Inc.', '1991', 'Book', '', '', '', 'in', '', '', 1, '583', '', '', '', 'Book', '', '', '23 cms', '', '', 'Donation', '', '', '', '', 'admin', 'March 3, 2010, 10:02 am', '', 'March 3, 2010, 10:02 am', 'up', '', '', '', 'xv', '122', '', '', ''),
(854, 'CHS', '', '', '', 'H14h', 'H14', 'Hall', 'Homer', 'L', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'High school journalism', '', 'journalism - high school', '', '', '', '', '', '', '0-8239-0648-5', 'Ref', '1st edition', 'New York', 'The Rosen Publishing Group, Inc.', '1895', 'Book', '', '', '', 'in', 'includes glossary', '', 1, '450', '', '', '', 'Book', '', 'illustrated', '23 cms', '', '', 'Donation', '', '', '', '', 'admin', 'March 3, 2010, 10:26 am', '', 'March 3, 2010, 10:26 am', 'up', '', '', '', 'xii', '265', '', '', ''),
(855, 'CHS', '', '', '658.8', 'L29c', 'L29c', 'Lao, Jr.', 'Felix', 'M.', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Creative selling techniques', '', 'Selling--Handbooks, manuals, etc.', 'Success in business.', 'Sales personnel--Guidebooks. ', '', '', '', '', '971-27-1461-6', 'e-library', '', 'Pasig City', 'Anvil Publication', '2004', 'Book', '', '', '', 'in', 'includes glossary', '', 1, '132e', '', '', '', 'Book', '', '', '23 cm. ', '', '', 'Donation', '', '', '', '', 'admin', 'March 16, 2010, 10:03 am', '', 'March 16, 2010, 10:03 am', 'up', '', '', '', 'ix', '101 p', '', '', ''),
(856, 'CHS', '', '', '959.905', 'J86', 'J86', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '  Journey of 100 years : reflections on the centennial of Philippine independence', '', 'Philippines--History. ', '', '', '', '', '', '', '971-27-0948-5', 'e-library', '', 'Pasig City', 'Anvil Publication', '1999', 'Book', '', '', '', 'in', '', '', 1, '323e', 'Reflections on the centennial of Philippine Independence', '', '', 'Book', '', '', '22 cm. ', '', '', 'Donation', '', '', '', '', 'admin', 'March 16, 2010, 10:12 am', '', 'March 16, 2010, 10:13 am', 'up', 'Cecilia Manguerra Brainard and Edmundo F. Litton', '', '', 'xi', '260 p', '', '', ''),
(857, 'CHS', '', '', '959.904', 'O15', 'O15', 'Ocampo', 'Ambeth ', 'R', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Aguinaldo\'s breakfast and more looking back essays', '', 'Philippines--History', 'Philippines--Biography', '', '', '', '', '', '971-27-0281-2', 'e-library', '', 'Pasig, Metro Manila', 'Anvil Publishing,', '1993', 'Book', '', '', '', 'in', '', '', 1, '260e', '', '', '', 'Book', '', '', '26 cms', '', '', 'Donation', '', '', '', '', 'admin', 'March 16, 2010, 10:26 am', '', 'March 16, 2010, 10:31 am', 'up', '', '', '', 'xiii', '232', '', '', '');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `classification_no`, `book_no`, `author_no`, `author_sname`, `author_fname`, `author_mname`, `other_author1_no`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_no`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author3_no`, `other_author4_no`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_no`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_no`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_no`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject_classification`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`, `editors`, `illustrator`, `author_relatingto_edition`, `preliminary`, `no_of_pages`, `file_name`, `file_size`, `file_type`) VALUES
(858, 'CHS', '', '', '959.9026', 'O15', 'O15', 'Ocampo', 'Ambeth ', 'R', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bones of contention: The bonifacio lectures', '', 'Bonifacio, Andres, 1863-1897. ', 'Philippines--History--Revolution, 1896-1897', '', '', '', '', '', '971-27-1151-X', 'e-library', '', 'Pasig City', 'Anvil Publishing', '2001', 'Book', '', '', '', 'in', 'includes bibliography', '', 1, '281e', '', '', '', 'Book', '', '', '22 cm. ', '', '', 'Donation', '', '', '', '', 'admin', 'March 16, 2010, 10:54 am', '', 'March 16, 2010, 10:54 am', 'up', '', '', '', 'xx', '152', '', '', ''),
(859, 'CHS', '', '', '959.9042092', 'L585b', 'L585b', 'Lewis', 'Barbara-Ann', 'Gamboa', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Barefoot in fire : a world war II childhood', '', 'Lewis, Barbara-Ann G.--Childhood and youth.', 'World War II,1937-1945--Personal narratives. ', '', '', '', '', '', '971-630145-6', 'e-library', '', 'Manila', 'Tahanan Books for Young Readers', '2005', 'Book', '', '', '', 'in', '', '', 1, '053e', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', 'March 16, 2010, 11:06 am', '', 'March 16, 2010, 11:08 am', 'up', '', 'Barbara Pollack', '', '', '207 p.', '', '', ''),
(861, 'CHS', '', '', '398.2', 'Al72i', 'Al72i', 'retold by Roberto Alonzo', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Ibong Adarna', '', 'Folk literature, Filipino.', 'Children\\\'s stories, Filipino', '', '', '', '', '', '971-508-125-8', 'e-library', '', 'Quezon City ', 'Adarna House', '2005', 'Book', '', '', '', 'in', '', '', 1, '269e', '', '', '', 'Book', '', 'illustrated', '24 cm', '', '', 'Donation', '', '', '', '', 'admin', 'March 19, 2010, 2:43 pm', '', 'March 19, 2010, 2:43 pm', 'up', '', '', '', '', '[32]', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `bar_id` varchar(50) NOT NULL,
  `subtotal` float NOT NULL,
  `deduct` float DEFAULT NULL,
  `total_amount` float DEFAULT NULL,
  `justification` varchar(50) DEFAULT NULL,
  `pay_date` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `material_type`
--

CREATE TABLE `material_type` (
  `id` int(11) NOT NULL,
  `mat_type` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `total` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `material_type`
--

INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES
(2, 'Chart', 'Visual Presentation of Data', 0),
(3, 'Book', 'Books', 0),
(4, 'Magazine', '', 0),
(5, 'Tape', '', 0),
(6, 'CD', 'Compact Disk', 0),
(7, 'Case', 'case 2', 0),
(8, 'Map', '', 0),
(10, 'Diorama', '', 0),
(11, 'Film Strip', '', 0),
(12, 'Flash Card', '', 0),
(13, 'Game', '', 0),
(14, 'Globe', '', 0),
(15, 'Micro form', '', 0),
(16, 'Microscope Slide', '', 0),
(17, 'Model', '', 0),
(18, 'Picture', '', 0),
(19, 'Relic', '', 0),
(20, 'Slide', '', 0),
(21, 'Sound Recording', '', 0),
(22, 'Transparency', '', 0),
(23, 'Video Recording', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `recyclebin`
--

CREATE TABLE `recyclebin` (
  `id` int(11) NOT NULL,
  `booktitle` varchar(50) DEFAULT NULL,
  `author_sname` varchar(50) DEFAULT NULL,
  `author_fname` varchar(50) DEFAULT NULL,
  `author_mname` varchar(50) DEFAULT NULL,
  `accession_no` varchar(50) DEFAULT NULL,
  `mat_type` varchar(50) DEFAULT NULL,
  `date_deleted` date DEFAULT NULL,
  `person_deleted` varchar(50) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `school_code` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recyclebin`
--

INSERT INTO `recyclebin` (`id`, `booktitle`, `author_sname`, `author_fname`, `author_mname`, `accession_no`, `mat_type`, `date_deleted`, `person_deleted`, `type`, `school_code`) VALUES
(199, 'Nancy Drew: The Moonstone Castle Mystery', '', '', '', '106e1', 'Book', '2009-09-22', 'Rebecca V. Costales', 'admin', 'CHS'),
(198, 'Logic for Filipinos', '', '', '', '238e', 'Book', '2009-06-01', 'Rebecca V. Costales', 'admin', 'CHS'),
(197, 'Buhay at diwa ni Jose Rizal', '', '', '', '285a', 'Book', '2009-05-12', 'Rebecca V. Costales', 'admin', 'CHS'),
(196, 'Buhay at diwa ni Jose Rizal', 'Alejandro', 'Rufino', '', '285e', 'Book', '2009-05-12', 'Rebecca V. Costales', 'admin', 'CHS'),
(195, 'Buhay at diwa ni Jose Rizal', '', '', '', '285b', 'Book', '2009-05-12', 'Rebecca V. Costales', 'admin', 'CHS'),
(194, 'Buhay at diwa ni Jose Rizal', '', '', '', '285e1', 'Book', '2009-05-12', 'Rebecca V. Costales', 'admin', 'CHS'),
(193, 'Buhay at diwa ni Jose Rizal', '', '', '', '285a', 'Book', '2009-05-12', 'Rebecca V. Costales', 'admin', 'CHS'),
(192, 'Seven in the eye of history', '', '', '', '283e', '', '2009-05-05', 'Rebecca V. Costales', 'admin', 'CHS'),
(191, 'Evaluating Educational Outcomes: Tests, Measuremen', 'Oriondo', 'Leonora', 'Loyola', 'EL-1', 'Book', '2009-04-29', 'Rebecca V. Costales', 'admin', 'CHS'),
(190, 'Speed Math Mutiplication and Addition', 'Lacsamana-Jensen', 'Paz', 'A.', 'EL-3', '', '2009-04-29', 'Rebecca V. Costales', 'admin', 'CHS'),
(189, 'Meaning and History: The Rizal Lectures', 'Ocampo', 'Ambeth', 'R.', 'EL-2', 'Book', '2009-04-29', 'Rebecca V. Costales', 'admin', 'CHS'),
(200, 'O.C.W.  A young man\\\\\\\'s search for his mother', '', '', '', '294e', 'Book', '2010-02-18', 'Rebecca V. Costales', 'admin', 'CHS'),
(201, 'The magic of the Philippines / Nigel Hicks. ', ' 	  Hicks', 'Nigel', '', '339e', '', '2010-03-16', 'Rebecca V. Costales', 'admin', 'CHS');

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `school_name` varchar(50) DEFAULT NULL,
  `school_code` varchar(50) DEFAULT NULL,
  `total` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`id`, `school_name`, `school_code`, `total`) VALUES
(8, 'Culiat High School', 'CHS', 0);

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `session_id` varchar(256) NOT NULL,
  `time` datetime NOT NULL,
  `username` varchar(256) NOT NULL,
  `gid` varchar(256) NOT NULL,
  `guest` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `time`, `username`, `gid`, `guest`) VALUES
('9c664226608fa445fa1137a2f809abda', '0000-00-00 00:00:00', '', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `css` varchar(50) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `expiration_time` varchar(50) DEFAULT NULL,
  `expiration_date` date NOT NULL,
  `header_title` varchar(50) DEFAULT NULL,
  `system_title` varchar(50) DEFAULT NULL,
  `bg` varchar(50) DEFAULT NULL,
  `footer` varchar(100) DEFAULT NULL,
  `hour_allow` varchar(50) DEFAULT NULL,
  `auto_id` int(11) NOT NULL DEFAULT '1',
  `bar_id_start` int(11) NOT NULL,
  `auto_deadline` varchar(50) DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `sat` varchar(11) NOT NULL,
  `sun` varchar(50) NOT NULL,
  `location2` varchar(50) DEFAULT NULL,
  `author_card` varchar(50) DEFAULT NULL,
  `title_card` varchar(50) DEFAULT NULL,
  `overdue_price` double NOT NULL,
  `search_output` int(11) NOT NULL,
  `rec_per_page` int(11) NOT NULL DEFAULT '5',
  `default_school` varchar(45) NOT NULL,
  `book_preview` varchar(45) NOT NULL,
  `max_book` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `css`, `logo`, `expiration_time`, `expiration_date`, `header_title`, `system_title`, `bg`, `footer`, `hour_allow`, `auto_id`, `bar_id_start`, `auto_deadline`, `rate`, `sat`, `sun`, `location2`, `author_card`, `title_card`, `overdue_price`, `search_output`, `rec_per_page`, `default_school`, `book_preview`, `max_book`) VALUES
(1, 'style1.css', '173298861628s.jpg', '16', '0000-00-00', 'CHS LIBRARY SYSTEM', 'Anilag Library System 0.90', 'back.gif', 'Copyleft &copy; 2008 Provincial Government of Laguna', '24', 0, 0, '1', 1, '1', '1', '', 'on', 'on', 10, 2, 50, '', 'on', '');

-- --------------------------------------------------------

--
-- Table structure for table `templates_menu`
--

CREATE TABLE `templates_menu` (
  `template` varchar(256) NOT NULL,
  `client_id` int(11) NOT NULL,
  `menuid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates_menu`
--

INSERT INTO `templates_menu` (`template`, `client_id`, `menuid`) VALUES
('joomla_admin', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

CREATE TABLE `titles` (
  `title_proper` varchar(50) DEFAULT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `author_sname` varchar(50) NOT NULL,
  `author_fname` varchar(50) NOT NULL,
  `author_mname` varchar(50) NOT NULL,
  `available` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`title_proper`, `quantity`, `author_sname`, `author_fname`, `author_mname`, `available`) VALUES
('Technical Drafting 1', '1', 'Cardenas', 'Elpidio', 'J.', ''),
('O.C.W. a Young boy\'s Search for his Mother', '1', 'Pacis', 'Carla ', 'M.', ''),
('Thesis & Dissertation Writing: A Modular Approach', '1', 'Tejero', 'Erlinda', 'G.', ''),
('Bugtong, Bugtong', '1', 'Villianueva', 'Rene', 'O.', ''),
('The complete Idiot\'s guide to Photography Like a P', '1', '', '', '', ''),
('Asya Lupang Biyaya Kasaysayan, Kabihasnan at Kalin', '1', 'Banasihan', 'Ma. Estela', 'E.', ''),
('The complete Idiot\'s guide to Photography Like a P', '1', 'Pearson Education Company', '', '', ''),
('Evaluating Educational Outcomes: Tests, Measuremen', '1', '', '', '', ''),
('Evaluating Educational Outcomes: Tests, Measuremen', '1', '', '', '', ''),
('Analytical Geometry', '1', 'Protter', 'Murray', 'H.', ''),
('General Statistics made simple for Filipinos', '1', 'Nocon', 'Ferdinand', 'P.', ''),
('RIZAL WITHOUT THE OVERCOAT expanded edition', '1', 'Ocampo', 'Ambeth', 'R.', ''),
('Evaluating Educational Outcomes: Tests, Measuremen', '1', 'Oriondo', 'Leonora', 'Loyola', ''),
('Evaluating Educational Outcomes: Tests, Measuremen', '1', '', '', '', ''),
('Speed Math Mutiplication and Addition', '1', 'Lacsamana-Jensen', 'Paz', 'A.', ''),
('Evaluating Educational Outcomes: Tests, Measuremen', '1', '', '', '', ''),
('Evaluating Educational Outcomes: Tests, Measuremen', '1', '', '', '', ''),
('Evaluating Educational Outcomes: Tests, Measuremen', '1', '', '', '', ''),
('Meaning and History: The Rizal Lectures', '1', 'Ocampo', 'Ambeth', 'R.', ''),
('Evaluating Educational Outcomes: Tests, Measuremen', '1', 'Oriondo', 'Leonora', 'Loyola', ''),
('Easy Way to Learn JAPANESE with Filipino Text Seco', '1', 'Honda', 'Prof. M.', '', ''),
('Fundamental Dance Steps and Music', '1', 'Aquino ', 'Francisca', 'Reyes', ''),
('Technology & Livelihood Education for Sustainable ', '1', 'Leuterio', 'Dr. Florida', 'C.', ''),
('The World Book Encyclopedia', '1', 'a Scott Fetzer company', 'World Book, INC.', '', ''),
('Simple Electronics (Basic) Fully Illustrated', '1', 'Enriquez', 'Michael', 'Q.', ''),
('Introduction to Turbo Pascal Programming', '1', 'Pepito', 'Copernicus', 'P.', ''),
('El Comedor', '1', 'Del Rosario', 'Lourdes', 'P.', ''),
(' Oliver Twist / by Charles Dickens ; Adapted by Le', '1', 'Dickens', 'Charles', '', ''),
(' Oliver Twist / by Charles Dickens ; Adapted by Le', '1', '', '', '', ''),
('Introduction to Calculus', '1', 'Mapa', 'Felina ', 'G.', ''),
('Ang Huling Timawa', '1', 'de los Angeles', 'Servando', '', ''),
('Prentice Hall Geometry', '1', 'Kalin', 'Robert', '', ''),
('Philippine Literature from ancient times to presen', '1', 'del Castillo y Tuazon', 'Teofilo', '', ''),
('Literaturang Filipino', '1', 'Lachica PH.D.', 'Venerada', 'S.', ''),
('Clothing Technology made easy', '1', 'Hilario', 'Carmelita', 'Bildan', ''),
('Mindanao on the mend', '1', 'Mercado Jr.', 'Eliseo', 'R.', ''),
('The Marcos File', '1', 'McDougald', 'Charles', 'C.', ''),
('The Anti-Development State The Political Economy o', '1', 'Bello', 'Walden', '', ''),
('Mga Pabula ng ating Bansa', '1', 'Silverio', 'Julio', 'F.', ''),
('2000 Word Drills', '1', 'Ching', 'Gregorio', '', ''),
('Introduction to FOXPRO database Programming (for D', '1', 'Pepito', 'Copernicus', 'P.', ''),
('Olive\'s Ocean', '1', 'Henkes', 'Kevin', '', ''),
('Mini-Book of 300 english and Filipino Tongue Twist', '1', 'Torrenueva', 'Cristina', '', ''),
('Economics, Society and Development', '1', 'Azanza', 'Patrick', 'Alain', ''),
('Technology & Livelihood Education for Sustainable ', '1', 'Leuterio', 'Dr. Florida', 'C.', ''),
('Technology & Livelihood Education for Sustainable ', '1', 'Leuterio', 'Dr. Florida', 'C.', ''),
('Electronic Components Testing Simplified', '1', 'Velasco', 'Benjamin ', 'S.', ''),
('So Help us God The Presidents of the Philippines a', '1', 'Malaya ', 'J. Eduardo', '', ''),
('Les Miserables', '1', 'Hugo ', 'Victor', '', ''),
('The Catcher in the Rye', '1', 'Salinger', 'J.D.', '', ''),
('The Scarlet Letter', '1', 'Hawthorne', 'Nathaniel', '', ''),
('Julie of the Wolves', '1', 'George', 'Jean', 'Craighead', ''),
('Comprehensive Drug Education revised edition with ', '1', 'Soriano ', 'Oscar', 'Gatchalian', ''),
('Guide to Highschool Book Reports', '1', 'Retizos', 'Isidro', 'L.', ''),
('A Catholic\'s Treasury of Prayers for the new mille', '1', 'Gabriel', 'MSGR. Manuel', '', ''),
('Philippine Legends', '1', 'Aquino', 'Gaudencia', 'V.', ''),
('Mga Ibong Mandaragit', '1', ' Hernandez', 'Amado', 'V.', ''),
('Anak ng Lupa', '1', 'Landicho', 'Domingo', 'G.', ''),
('Teaching Educational Technology', '1', 'Garo ', 'Candelaria ', 'D.', ''),
('Tales and Legends of Long Ago', '1', 'Aquino', 'Gaudencia', 'V.', ''),
('The first Filipino : a biography of Jose Rizal / b', '1', 'Guerrero', 'Leon Ma.', '', ''),
('The first Filipino : a biography of Jose Rizal / b', '1', '', '', '', ''),
('The first Filipino : a biography of Jose Rizal / b', '1', '', '', '', ''),
('The first Filipino : a biography of Jose Rizal / b', '1', '', '', '', ''),
('Success in writing school papers', '1', 'King', 'Jenny', '', ''),
('Buhay at diwa ni Jose Rizal', '1', 'Alejandro', 'Rufino', '', ''),
('Sining ng pagbigkas at pasulat na pakikipagtalasta', '1', '', '', '', ''),
('Sining ng pagbigkas at pasulat na pakikipagtalasta', '1', '', '', '', ''),
('A Catholic\'s Treasury of Prayers for the new mille', '1', '', '', '', ''),
('A Catholic\'s Treasury of Prayers for the new mille', '1', '', '', '', ''),
('A Catholic\'s Treasury of Prayers for the new mille', '1', '', '', '', ''),
('A Catholic\'s Treasury of Prayers for the new mille', '1', '', '', '', ''),
('A Catholic\'s Treasury of Prayers for the new mille', '1', '', '', '', ''),
('A Catholic\'s Treasury of Prayers for the new mille', '1', '', '', '', ''),
('A Catholic\'s Treasury of Prayers for the new mille', '1', '', '', '', ''),
('A Catholic\'s Treasury of Prayers for the new mille', '1', '', '', '', ''),
('The Great Malayan', '1', 'Quirino', 'Carlos', '', ''),
('Teaching the fundamentals of Music', '1', 'Sorneo', 'Higino', 'A.', ''),
('Philosophy of Man', '1', 'Cruz', 'Corazon', '', ''),
('Introduction to computer concepts', '1', 'La Putt', 'Juny', 'Pilapil', ''),
('Sugat ng alaala', '1', 'Francisco', 'Lazaro', '', ''),
('Little Book of essays: A supplementary book for st', '1', 'Torrenueva', 'C', '', ''),
('The Shari\\\\\\\'a courts in the Philippines : women, ', '1', '', '', '', ''),
('The Shari\'a courts in the Philippines : women, men', '1', '', '', '', ''),
('Model letters for all occasions, sentence stress, ', '1', 'De Guzman', 'Maria ', 'Odulio', ''),
('Wealth within your reach', '1', 'Colayco', 'Francisco', 'J.', ''),
('Seven in the eye of history : featuring essays', '1', 'Tirol', 'Lorna', 'Kalaw', ''),
('Sleepless in manila:funny essays, etc., on insomni', '1', '', '', '', ''),
('Sleepless in manila:funny essays, etc., on insomni', '1', '', '', '', ''),
('The first Filipino : a biography of Jose Rizal / b', '1', '', '', '', ''),
('The first Filipino : a biography of Jose Rizal / b', '1', '', '', '', ''),
('Logic for Filipinos', '1', '', '', '', ''),
('Inside Manila with kids : a travel companion for p', '1', 'Rodrigo', 'Didith ', 'Tan', ''),
('So Help us God The Presidents of the Philippines a', '1', '', '', '', ''),
('So Help us God The Presidents of the Philippines a', '1', '', '', '', ''),
('Nancy Drew: The Moonstone Castle Mystery', '1', 'Keene', 'Carolyn', '', ''),
('Walking', '1', 'Hawkins', 'Jerald ', 'D', ''),
('Nutrition Now', '1', 'Brown', 'Judith', 'E.', ''),
('Organic Chemistry', '1', 'McMurry', 'John', '', ''),
('Tennis Today', '1', 'Bassett', 'Glenn', '', ''),
('Making Friends: A guide to getting along with peop', '1', 'Matthews', 'Andrew', '', ''),
('Making Friends: A guide to getting along with peop', '1', '', '', '', ''),
('Making Friends: A guide to getting along with peop', '1', '', '', '', ''),
('Making Friends: A guide to getting along with peop', '1', '', '', '', ''),
('Making Friends: A guide to getting along with peop', '1', '', '', '', ''),
('Comprehensive reviewer for the Licensure Examinati', '1', 'Elevazo', 'Aurelio', 'O.', ''),
('Multiple Intelligences: The theory in practice', '1', 'Gardner', 'Howard', '', ''),
('The complete idiot\\\'s guide to photography like a ', '1', '', '', '', ''),
('O.C.W.  A young man\\\\\\\\\\\\\\\'s search for his mother', '1', '', '', '', ''),
('Visual encyclopedia of science', '1', '', '', '', ''),
('Business English Correspondence', '1', 'Aquino', 'Fe', 'O.', ''),
('Introduction to information technology', '1', 'Turban', 'Efraim', '', ''),
('Journalism in the mass media', '1', 'Moyes', 'Norman', 'B', ''),
('Four powers of communication: skills for effective', '1', 'Bennett', 'John Michael', '', ''),
('High school journalism', '1', 'Hall', 'Homer', 'L', ''),
('Creative selling techniques', '1', 'Lao, Jr.', 'Felix', 'M.', ''),
('  Journey of 100 years : reflections on the centen', '1', '', '', '', ''),
('  Journey of 100 years : reflections on the centen', '1', '', '', '', ''),
('Aguinaldo\\\'s breakfast and more looking back essay', '1', 'Ocampo', 'Ambeth ', 'R', ''),
('Aguinaldo\\\'s breakfast and more looking back essay', '1', '', '', '', ''),
('Aguinaldo\'s breakfast and more looking back essays', '1', '', '', '', ''),
('Bones of contention: The bonifacio lectures', '1', 'Ocampo', 'Ambeth ', 'R', ''),
('Barefoot in fire : a world war II childhood', '1', 'Lewis', 'Barbara-Ann', 'Gamboa', ''),
('So Help us God The Presidents of the Philippines a', '1', '', '', '', ''),
(' The magic of the Philippines', '1', 'HickS', 'Nigel', '', ''),
(' Oliver Twist / by Charles Dickens ; Adapted by Le', '1', '', '', '', ''),
('Ibong Adarna', '1', 'retold by Roberto Alonzo', '', '', ''),
('Asya Lupang Biyaya Kasaysayan, Kabihasnan at Kalin', '1', '', '', '', ''),
('Asya Lupang Biyaya Kasaysayan, Kabihasnan at Kalin', '1', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `last1` varchar(50) DEFAULT NULL,
  `first1` varchar(50) DEFAULT NULL,
  `middle1` varchar(50) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `last1`, `first1`, `middle1`, `type`) VALUES
(1, 'admin', 'anilag', 'Costales', 'Rebecca', 'Valdez', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `usergroup`
--

CREATE TABLE `usergroup` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `add_book` varchar(50) DEFAULT NULL,
  `edit_book` varchar(50) DEFAULT NULL,
  `del_book` varchar(50) NOT NULL,
  `borrow_book` varchar(50) DEFAULT NULL,
  `max_no` int(3) NOT NULL,
  `add_borrower` varchar(50) DEFAULT NULL,
  `edit_borrower` varchar(50) NOT NULL,
  `del_borrower` varchar(50) NOT NULL,
  `show_borrower` varchar(50) DEFAULT NULL,
  `upload` varchar(50) DEFAULT NULL,
  `remove` varchar(50) DEFAULT NULL,
  `total` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergroup`
--

INSERT INTO `usergroup` (`id`, `type`, `add_book`, `edit_book`, `del_book`, `borrow_book`, `max_no`, `add_borrower`, `edit_borrower`, `del_borrower`, `show_borrower`, `upload`, `remove`, `total`) VALUES
(1, 'admin', 'on', 'on', 'on', 'on', 10, 'on', 'on', 'on', 'on', 'on', 'on', 0),
(7, 'student', 'off', 'off', 'off', 'off', 10000, 'off', 'off', 'off', 'off', 'off', 'off', 0),
(13, 'Library Assistant', 'on', 'on', 'off', 'on', 10, 'on', 'on', 'off', 'off', 'on', 'off', 0),
(14, 'miso', 'on', 'on', 'on', 'on', 22, 'on', 'on', 'off', 'on', 'on', 'on', 0),
(16, 'Borrower', 'off', 'off', 'off', 'off', 2, 'off', 'off', 'off', 'off', 'off', 'off', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `r` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `counter`, `r`) VALUES
(1, 249, 'ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barrower`
--
ALTER TABLE `barrower`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_bar`
--
ALTER TABLE `books_bar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `borrowers_pic`
--
ALTER TABLE `borrowers_pic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_cat`
--
ALTER TABLE `card_cat`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `card_cat` ADD FULLTEXT KEY `NewIndex` (`title`,`call_num`,`place_pub`,`publisher`,`date_pub`,`edition`,`isbn`,`subject1`,`subject2`,`subject3`,`subject4`);
ALTER TABLE `card_cat` ADD FULLTEXT KEY `author` (`title`,`call_num`,`place_pub`,`publisher`,`date_pub`,`edition`,`isbn`,`subject1`,`subject2`,`subject3`,`subject4`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `material_type`
--
ALTER TABLE `material_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recyclebin`
--
ALTER TABLE `recyclebin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `usergroup`
--
ALTER TABLE `usergroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barrower`
--
ALTER TABLE `barrower`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books_bar`
--
ALTER TABLE `books_bar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `borrowers_pic`
--
ALTER TABLE `borrowers_pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `card_cat`
--
ALTER TABLE `card_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=862;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `material_type`
--
ALTER TABLE `material_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `recyclebin`
--
ALTER TABLE `recyclebin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usergroup`
--
ALTER TABLE `usergroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
