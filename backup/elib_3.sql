DROP SCHEMA IF EXISTS elib; 
CREATE DATABASE elib; 
USE elib; 
-- 
-- Table structure for table `barrower` 
-- 

DROP TABLE IF EXISTS `barrower`; 
CREATE TABLE `barrower` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `bar_id` varchar(50),
  `school_code` varchar(50),
  `last1` varchar(50),
  `first1` varchar(50),
  `type` varchar(50) NOT NULL,
  `course` varchar(50),
  `year1` varchar(50),
  `address` varchar(50),
  `adviser` varchar(50),
  `ex_date` varchar(50) DEFAULT '0000-00-00' NOT NULL,
  `contact` varchar(50),
  `email` varchar(50),
  `active` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE = MYISAM ;

-- 
-- Dumping data for table `barrower` 
-- 

INSERT INTO `barrower` (`id`, `bar_id`, `school_code`, `last1`, `first1`, `type`, `course`, `year1`, `address`, `adviser`, `ex_date`, `contact`, `email`, `active`) VALUES ('28', '00028', 'MPC', 'Aguilar', 'Angie', 'batapa', 'HRM', '2009', 'hhj', 'kljkl', '2008-02-21', '897897', 'hjkh', '0');
INSERT INTO `barrower` (`id`, `bar_id`, `school_code`, `last1`, `first1`, `type`, `course`, `year1`, `address`, `adviser`, `ex_date`, `contact`, `email`, `active`) VALUES ('30', '00030', 'PGMNHS', 'Sta. Maria', 'Joven', 'student', 'IT', '2000-05-04', 'Paete, Laguna', 'El Terible', '2008-02-02', '748374', 'joven_sta_maria@yahoo.com', '0');
INSERT INTO `barrower` (`id`, `bar_id`, `school_code`, `last1`, `first1`, `type`, `course`, `year1`, `address`, `adviser`, `ex_date`, `contact`, `email`, `active`) VALUES ('25', '00001', 'MPC', 'caday2', 'mark2', 'admin', 'hrm', '2008', 'Longos3, Kalayaan, Laguna', 'khhjhj', '2008-03-03', '6778732', 'kkkkkk', '1');
INSERT INTO `barrower` (`id`, `bar_id`, `school_code`, `last1`, `first1`, `type`, `course`, `year1`, `address`, `adviser`, `ex_date`, `contact`, `email`, `active`) VALUES ('26', '00026', 'PGMNHS', 'Carpio', 'Janice', 'student', 'hrm', '2007', 'Longos, Kalayaan, Laguna', 'khan', '2008-02-14', '878978', 'hjgghkhjk', '0');
INSERT INTO `barrower` (`id`, `bar_id`, `school_code`, `last1`, `first1`, `type`, `course`, `year1`, `address`, `adviser`, `ex_date`, `contact`, `email`, `active`) VALUES ('27', '00027', 'LSIM', 'Cruz', 'Wendy', 'admin', 'HRM', '2008', 'jkjk', 'jhjkh', '2008-02-25', '8787897', 'lklk', '0');
INSERT INTO `barrower` (`id`, `bar_id`, `school_code`, `last1`, `first1`, `type`, `course`, `year1`, `address`, `adviser`, `ex_date`, `contact`, `email`, `active`) VALUES ('13', '00006', 'MPC', 'Racelis3', 'Aaron Kerubin3', 'student', 'CMSC2', '2001-08-08', 'Longos3, Kalayaan2, Laguna2', 'fdfd', '2008-02-05', '0918-2224567', 'aron3_racelis2@yahoo.com', '0');
INSERT INTO `barrower` (`id`, `bar_id`, `school_code`, `last1`, `first1`, `type`, `course`, `year1`, `address`, `adviser`, `ex_date`, `contact`, `email`, `active`) VALUES ('29', '00029', 'BNHS', 'Arevalo', 'Jeff', 'admin', 'gjh', '2008', 'hg', 'j', '2008-02-28', '7787', 'kjj', '0');
INSERT INTO `barrower` (`id`, `bar_id`, `school_code`, `last1`, `first1`, `type`, `course`, `year1`, `address`, `adviser`, `ex_date`, `contact`, `email`, `active`) VALUES ('37', '00034', 'BNHS', 'Racelis3', 'Aaron3', 'batapa', 'CMSC', '2008-01-01', 'Longos, Kalayaan, Laguna', 'Khan 3', '2008-02-01', '09197225680', 'dfhgdfhh@yahoo.com', '0');
INSERT INTO `barrower` (`id`, `bar_id`, `school_code`, `last1`, `first1`, `type`, `course`, `year1`, `address`, `adviser`, `ex_date`, `contact`, `email`, `active`) VALUES ('33', '00033', 'PGMNHS', 'gagd', 'hhhj', 'admin', 'hjh', '2000-05-04', 'Longos2, Kalayaan2, Laguna2', 'hhjh', '2008-02-02', '345', 'dfdfd', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `books` 
-- 

DROP TABLE IF EXISTS `books`; 
CREATE TABLE `books` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `middle` varchar(45) NOT NULL,
  `books` varchar(45) NOT NULL,
  `numberno` int(10) unsigned NOT NULL,
  `status` varchar(50),
  `date_get` varchar(50),
  `date_return` varchar(50),
  `due_date` varchar(50),
  PRIMARY KEY  (`id`)
) ENGINE = MYISAM ;

-- 
-- Dumping data for table `books` 
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `books_bar` 
-- 

DROP TABLE IF EXISTS `books_bar`; 
CREATE TABLE `books_bar` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `bar_id` varchar(50),
  `access_no` varchar(50),
  `books` varchar(45) NOT NULL,
  `author` varchar(50),
  `call_num` varchar(45) NOT NULL,
  `qty` int(11) NOT NULL,
  `deadline` datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
  `date_borrow` date DEFAULT '0000-00-00' NOT NULL,
  `school_code` varchar(50) NOT NULL,
  `fees` float NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE = MYISAM ;

-- 
-- Dumping data for table `books_bar` 
-- 

INSERT INTO `books_bar` (`id`, `bar_id`, `access_no`, `books`, `author`, `call_num`, `qty`, `deadline`, `date_borrow`, `school_code`, `fees`) VALUES ('124', '00001', '65677', 'God is Good Sobra', 'Benjamin G. Racelis', '', '0', '2008-03-02 08:46:24', '2008-03-01', 'MPC', '0');
INSERT INTO `books_bar` (`id`, `bar_id`, `access_no`, `books`, `author`, `call_num`, `qty`, `deadline`, `date_borrow`, `school_code`, `fees`) VALUES ('123', '00001', '87899080', 'heart of mine', 'Aisel A. Arevalo', '', '0', '2008-03-02 08:45:44', '2008-03-01', 'MPC', '0');
INSERT INTO `books_bar` (`id`, `bar_id`, `access_no`, `books`, `author`, `call_num`, `qty`, `deadline`, `date_borrow`, `school_code`, `fees`) VALUES ('116', '00001', '11111', 'Watch man', 'Aaron K. Racelis', '', '0', '2008-02-15 13:20:48', '2008-02-14', 'MPC', '10');
INSERT INTO `books_bar` (`id`, `bar_id`, `access_no`, `books`, `author`, `call_num`, `qty`, `deadline`, `date_borrow`, `school_code`, `fees`) VALUES ('117', '00001', '22222', 'Watch man', 'Aaron K. Racelis', '', '0', '2008-02-16 09:27:24', '2008-02-15', 'MPC', '10');
INSERT INTO `books_bar` (`id`, `bar_id`, `access_no`, `books`, `author`, `call_num`, `qty`, `deadline`, `date_borrow`, `school_code`, `fees`) VALUES ('121', '00001', '33333', 'Hello World', ' .', '', '0', '2008-02-16 17:10:57', '2008-02-15', 'MPC', '10');
INSERT INTO `books_bar` (`id`, `bar_id`, `access_no`, `books`, `author`, `call_num`, `qty`, `deadline`, `date_borrow`, `school_code`, `fees`) VALUES ('122', '00001', '77676', 'Taga Pakil', 'John C. Matienzo', '', '0', '2008-03-02 08:38:35', '2008-03-01', 'MPC', '0');
INSERT INTO `books_bar` (`id`, `bar_id`, `access_no`, `books`, `author`, `call_num`, `qty`, `deadline`, `date_borrow`, `school_code`, `fees`) VALUES ('120', '00034', '87889', 'God is Good Sobra', 'Benjamin G. Racelis', '', '0', '2008-02-16 16:00:39', '2008-02-15', 'BNHS', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `borrowers_pic` 
-- 

DROP TABLE IF EXISTS `borrowers_pic`; 
CREATE TABLE `borrowers_pic` (
  `id` int(11) NOT NULL auto_increment,
  `bar_id` varchar(50),
  `file_name` varchar(50),
  `file_size` int(3) NOT NULL,
  `file_type` varchar(50),
  PRIMARY KEY  (`id`)
) ENGINE = MYISAM ;

-- 
-- Dumping data for table `borrowers_pic` 
-- 

INSERT INTO `borrowers_pic` (`id`, `bar_id`, `file_name`, `file_size`, `file_type`) VALUES ('24', '00034', 'avatar.jpg', '28799', 'image/pjpeg');
INSERT INTO `borrowers_pic` (`id`, `bar_id`, `file_name`, `file_size`, `file_type`) VALUES ('21', '00031', 'Police Deputy DirectorGeneral JESUS AME VERZOSA, C', '3113', 'image/pjpeg');
INSERT INTO `borrowers_pic` (`id`, `bar_id`, `file_name`, `file_size`, `file_type`) VALUES ('17', '00001', 'IMG0055A.jpg', '25868', 'image/pjpeg');
INSERT INTO `borrowers_pic` (`id`, `bar_id`, `file_name`, `file_size`, `file_type`) VALUES ('18', '00002', '3D_155.jpg', '4590', 'image/pjpeg');
INSERT INTO `borrowers_pic` (`id`, `bar_id`, `file_name`, `file_size`, `file_type`) VALUES ('19', '00003', 'bot1.gif', '851', 'image/gif');
INSERT INTO `borrowers_pic` (`id`, `bar_id`, `file_name`, `file_size`, `file_type`) VALUES ('23', '00030', 'right.jpg', '415', 'image/pjpeg');

-- --------------------------------------------------------

-- 
-- Table structure for table `card_cat` 
-- 

DROP TABLE IF EXISTS `card_cat`; 
CREATE TABLE `card_cat` (
  `id` int(11) NOT NULL auto_increment,
  `school_code` varchar(50),
  `pdb` text NOT NULL,
  `call_num` varchar(50) NOT NULL,
  `author_sname` text NOT NULL,
  `author_fname` varchar(50) NOT NULL,
  `author_mname` varchar(50) NOT NULL,
  `other_author1_sname` text NOT NULL,
  `other_author1_fname` varchar(50),
  `other_author1_mname` varchar(50) NOT NULL,
  `other_author2_sname` text NOT NULL,
  `other_author2_fname` varchar(50) NOT NULL,
  `other_author2_mname` varchar(50) NOT NULL,
  `other_author3_sname` text NOT NULL,
  `other_author3_fname` varchar(50) NOT NULL,
  `other_author3_mname` varchar(50) NOT NULL,
  `other_author4_sname` text NOT NULL,
  `other_author4_fname` text NOT NULL,
  `other_author4_mname` varchar(50) NOT NULL,
  `other_author5_sname` varchar(50) NOT NULL,
  `other_author5_fname` varchar(50) NOT NULL,
  `other_author5_mname` varchar(50) NOT NULL,
  `other_author6_sname` varchar(50) NOT NULL,
  `other_author6_fname` varchar(50) NOT NULL,
  `other_author6_mname` varchar(50) NOT NULL,
  `other_author7_sname` varchar(50) NOT NULL,
  `other_author7_fname` varchar(50) NOT NULL,
  `other_author7_mname` varchar(50) NOT NULL,
  `title` text NOT NULL,
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
  `classification` varchar(50) NOT NULL,
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
  `flag` varchar(5),
  PRIMARY KEY  (`access_no`),
  FULLTEXT `author` (`author`,`title`,`call_num`,`other_author1`,`other_author2`,`other_author3`,`other_author4`,`place_pub`,`publisher`,`date_pub`,`edition`,`isbn`,`subject1`,`subject2`,`subject3`,`subject4`)
,
  FULLTEXT `NewIndex` (`author`,`title`,`call_num`,`other_author1`,`other_author2`,`other_author3`,`other_author4`,`place_pub`,`publisher`,`date_pub`,`edition`,`isbn`,`subject1`,`subject2`,`subject3`,`subject4`)

) ENGINE = MYISAM ;

-- 
-- Dumping data for table `card_cat` 
-- 

INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('662', 'BNHS', '', '', 'Racelis', 'Aaron', 'Kerubin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Watch man', 'Math', '', '', '', '', '', '', '', '', '', '', '', '', 'Book', '', '', '', 'in', '', '', '0', '11111', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'February 14, 2008, 12:51 pm', 'up');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('663', 'PGMNHS', '', 'B22', 'Racelis', 'Aaron', 'Kerubin', 'Racelis', 'Benjamin', 'Gallano', 'Racelis', 'Corazon', 'Gallano', 'Racelis', 'Benjie', 'Laban-Laban', '', '', '', '', '', '', '', '', '', '', '', '', 'Watch man', 'Math', 'Science', 'English', 'Filipino', '', '', '', '32434-54546', 'Shelf 4', '', 'Muntinlupa City', 'Time Magazine', '2008', 'Transparency', '', '', '', 'in', '', '2007, Vol 3, p.9', '0', '22222', 'Watch man 2', '', '', 'Transparency', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', 'February 14, 2008, 12:51 pm', '', 'February 14, 2008, 11:33 pm', 'up');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('664', 'BNHS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Hello World', 'Social', '', '', '', '', '', '', '', '', '', '', '', '', 'Book', '', '', '', 'in', '', '', '0', '33333', 'Hello', 'World', 'World', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'February 15, 2008, 9:31 am', 'up');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('665', 'BNHS', '', '', 'Arevalo', 'Aisel', 'Apalla', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'heart of mine', 'Social', '', '', '', '', '', '', '', '', '', '', '', '', 'Book', 'Chapter1.pdf', '', '', 'in', '', '', '1', '44444', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'February 14, 2008, 1:49 pm', 'up');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('670', 'PGMNHS', '', 'A56', 'Matienzo', 'John', 'Caday', 'Caday', 'Masrk', 'Anthony', 'Cruz', 'Wendy', 'Facundo', 'Santos', 'Honeylet', 'Delos', 'Carpio', 'Janice', 'Elca', 'Magdaong', 'Nilo', 'Santos', 'Arevalo', 'Jeff', 'Apalla', 'Apalla', 'James', 'Santos', 'Taga Pakil', 'Religion', 'Zoology', 'Botany', 'Horticulture', 'Physics', 'Chemistry', '', '88876-8988', '', '', 'Makati City, Philippines', 'Yes FM Magazine', '2007', 'Transparency', '', '', '', 'in', '2 illus, 7 graphs;', '2007, Vol 3, 10', '0', '77676', '', '', '', 'Transparency', '', 'none', '10X 2', 'diorama', 'GSIS', 'Donation', '100', '', '13232', '344', 'admin', '', 'administrator', 'February 14, 2008, 10:33 pm', 'up');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('671', 'MPC', '', '', 'Arevalo', 'Aisel', 'Apalla', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'heart of mine', 'Physics', 'Chermistry', '', '', '', '', '', '', 'Shelf 2', '', '', '', '', 'Tape', '', '', '', 'in', '', '', '0', '87899080', '', '', '', 'Tape', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'February 15, 2008, 4:35 am', 'up');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('677', 'BNHS', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Hello World', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Book', '', '', '', 'in', '', '', '1', '767565', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'February 15, 2008, 4:16 am', 'up');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('673', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Hello World', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', '1', '34556656', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('674', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Hello World', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', '1', '4234356', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('676', '', '', '', 'Racelis', 'Aaron', 'Kerubin', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Hello World', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', '1', '567654', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('675', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Hello World', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', '1', '6565768787', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('679', 'BNHS', '', 'A34', 'Racelis', 'Benjamin', 'Gallano', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'God is Good Sobra', 'Math', 'Science', 'English', '', '', '', '', '232323-556', '', '1st', '', '', '', 'Book', '', '', '', 'in', '', '', '0', '65677', 'God', 'Good', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'wala', '', '', 'February 15, 2008, 9:24 am', 'up');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('680', 'BNHS', '', '', 'Racelis', 'Benjamin', 'Gallano', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'God is Good Sobra', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Book', 'catalog.pdf', '', '', 'in', '', '', '0', '87889', '', '', '', 'Book', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'February 15, 2008, 3:48 pm', 'up');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('681', 'BNHS', '', '', 'Palliar', 'Anne rhiza', 'Yakusa', 'Mercado', 'Lani', 'Gutierrez', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'The Red Ribbon', 'Math', 'Social', '', '', '', '', '', '323236-43656', '', '', 'Los Banos, Laguna', 'Yes Magazine', '2008', 'Tape', '', '', '', 'in', '', '', '1', '67664', 'Red Ribbon', 'Red Ribbon', '', 'Tape', '', '', '', '', '', 'Donation', '', '', '', '', 'admin', '', '', 'February 15, 2008, 1:45 pm', 'up');
INSERT INTO `card_cat` (`id`, `school_code`, `pdb`, `call_num`, `author_sname`, `author_fname`, `author_mname`, `other_author1_sname`, `other_author1_fname`, `other_author1_mname`, `other_author2_sname`, `other_author2_fname`, `other_author2_mname`, `other_author3_sname`, `other_author3_fname`, `other_author3_mname`, `other_author4_sname`, `other_author4_fname`, `other_author4_mname`, `other_author5_sname`, `other_author5_fname`, `other_author5_mname`, `other_author6_sname`, `other_author6_fname`, `other_author6_mname`, `other_author7_sname`, `other_author7_fname`, `other_author7_mname`, `title`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`, `subject7`, `isbn`, `location`, `edition`, `place_pub`, `publisher`, `date_pub`, `classification`, `pdf`, `help`, `front`, `status1`, `notes`, `series`, `qty`, `access_no`, `parallel_title`, `oti`, `uti`, `gmd`, `eoi`, `opd`, `size_dimension`, `accom_mat`, `source_of_fund`, `mode_of_ac`, `mode_ac`, `date_ac`, `property_no`, `are`, `encoded_by`, `date_encode`, `verified_by`, `date_verify`, `flag`) VALUES ('682', '', '', '', 'Palliar', 'Anne rhiza', 'Yakusa', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'The Red Ribbon', 'Math', 'Social', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'in', '', '', '1', '8989978', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'up');

-- --------------------------------------------------------

-- 
-- Table structure for table `history` 
-- 

DROP TABLE IF EXISTS `history`; 
CREATE TABLE `history` (
  `id` int(11) NOT NULL auto_increment,
  `access_no` varchar(50),
  `call_num` varchar(50),
  `title` varchar(50),
  `author` varchar(50),
  `borrower` varchar(50),
  `date_borrow` date DEFAULT '0000-00-00' NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE = MYISAM ;

-- 
-- Dumping data for table `history` 
-- 

INSERT INTO `history` (`id`, `access_no`, `call_num`, `title`, `author`, `borrower`, `date_borrow`) VALUES ('185', '22222', '', 'Watch man', 'Aaron K. Racelis', '00001', '2008-02-15');
INSERT INTO `history` (`id`, `access_no`, `call_num`, `title`, `author`, `borrower`, `date_borrow`) VALUES ('186', '33333', '', 'Hello World', ' .', '00001', '2008-02-15');
INSERT INTO `history` (`id`, `access_no`, `call_num`, `title`, `author`, `borrower`, `date_borrow`) VALUES ('187', '44444', '', 'heart of mine', 'Aisel A. Arevalo', '00001', '2008-02-15');
INSERT INTO `history` (`id`, `access_no`, `call_num`, `title`, `author`, `borrower`, `date_borrow`) VALUES ('188', '87889', '', 'God is Good Sobra', 'Benjamin G. Racelis', '00034', '2008-02-15');
INSERT INTO `history` (`id`, `access_no`, `call_num`, `title`, `author`, `borrower`, `date_borrow`) VALUES ('189', '33333', '', 'Hello World', ' .', '00001', '2008-02-15');
INSERT INTO `history` (`id`, `access_no`, `call_num`, `title`, `author`, `borrower`, `date_borrow`) VALUES ('190', '77676', '', 'Taga Pakil', 'John C. Matienzo', '00001', '2008-03-01');
INSERT INTO `history` (`id`, `access_no`, `call_num`, `title`, `author`, `borrower`, `date_borrow`) VALUES ('191', '87899080', '', 'heart of mine', 'Aisel A. Arevalo', '00001', '2008-03-01');
INSERT INTO `history` (`id`, `access_no`, `call_num`, `title`, `author`, `borrower`, `date_borrow`) VALUES ('192', '65677', 'A34', 'God is Good Sobra', 'Benjamin G. Racelis', '00001', '2008-03-01');

-- --------------------------------------------------------

-- 
-- Table structure for table `income` 
-- 

DROP TABLE IF EXISTS `income`; 
CREATE TABLE `income` (
  `id` int(11) NOT NULL auto_increment,
  `bar_id` varchar(50) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `deduct` int(11),
  `total_amount` float,
  `justification` varchar(50),
  PRIMARY KEY  (`id`)
) ENGINE = MYISAM ;

-- 
-- Dumping data for table `income` 
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `material_type` 
-- 

DROP TABLE IF EXISTS `material_type`; 
CREATE TABLE `material_type` (
  `id` int(11) NOT NULL auto_increment,
  `mat_type` varchar(50),
  `description` varchar(50),
  `total` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE = MYISAM ;

-- 
-- Dumping data for table `material_type` 
-- 

INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('2', 'Chart', 'Visual Presentation of Data', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('3', 'Book', 'Books', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('4', 'Magazine', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('5', 'Tape', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('6', 'CD', 'Compact Disk', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('7', 'Case', 'case 2', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('8', 'Map', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('10', 'Diorama', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('11', 'Film Strip', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('12', 'Flash Card', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('13', 'Game', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('14', 'Globe', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('15', 'Micro form', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('16', 'Microscope Slide', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('17', 'Model', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('18', 'Picture', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('19', 'Relic', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('20', 'Slide', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('21', 'Sound Recording', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('22', 'Transparency', '', '0');
INSERT INTO `material_type` (`id`, `mat_type`, `description`, `total`) VALUES ('23', 'Video Recording', '', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `recyclebin` 
-- 

DROP TABLE IF EXISTS `recyclebin`; 
CREATE TABLE `recyclebin` (
  `id` int(11) NOT NULL auto_increment,
  `booktitle` varchar(50),
  `author_sname` varchar(50),
  `author_fname` varchar(50),
  `author_mname` varchar(50),
  `accession_no` varchar(50),
  `mat_type` varchar(50),
  `date_deleted` date,
  `person_deleted` varchar(50),
  `type` varchar(50),
  `school_code` varchar(50),
  PRIMARY KEY  (`id`)
) ENGINE = MYISAM ;

-- 
-- Dumping data for table `recyclebin` 
-- 

INSERT INTO `recyclebin` (`id`, `booktitle`, `author_sname`, `author_fname`, `author_mname`, `accession_no`, `mat_type`, `date_deleted`, `person_deleted`, `type`, `school_code`) VALUES ('167', 'Ang Bayan Ko', 'Racelis', 'Aaron', 'Kerubin', '55555', 'Video Recording', '2008-02-14', 'Manny P. Isles', 'admin', 'LSIM');
INSERT INTO `recyclebin` (`id`, `booktitle`, `author_sname`, `author_fname`, `author_mname`, `accession_no`, `mat_type`, `date_deleted`, `person_deleted`, `type`, `school_code`) VALUES ('168', 'Worship Songs', 'Carpio', 'Janice', 'Elca', '09977', '', '2008-02-14', 'Manny P. Isles', 'admin', '');
INSERT INTO `recyclebin` (`id`, `booktitle`, `author_sname`, `author_fname`, `author_mname`, `accession_no`, `mat_type`, `date_deleted`, `person_deleted`, `type`, `school_code`) VALUES ('169', 'Worship Songs', 'Carpio', 'Janice', 'Elca', '09998', '', '2008-02-14', 'Manny P. Isles', 'admin', '');
INSERT INTO `recyclebin` (`id`, `booktitle`, `author_sname`, `author_fname`, `author_mname`, `accession_no`, `mat_type`, `date_deleted`, `person_deleted`, `type`, `school_code`) VALUES ('170', 'Watch man', 'Racelis', 'Aaron', 'Kerubin', '78890', 'Tape', '2008-02-14', 'Manny P. Isles', 'admin', 'BNHS');
INSERT INTO `recyclebin` (`id`, `booktitle`, `author_sname`, `author_fname`, `author_mname`, `accession_no`, `mat_type`, `date_deleted`, `person_deleted`, `type`, `school_code`) VALUES ('171', 'Hello World', '', '', '', '6565785', 'Book', '2008-02-15', 'Manny P. Isles', 'admin', 'BNHS');
INSERT INTO `recyclebin` (`id`, `booktitle`, `author_sname`, `author_fname`, `author_mname`, `accession_no`, `mat_type`, `date_deleted`, `person_deleted`, `type`, `school_code`) VALUES ('172', 'Tapos na din', '', '', '', '234568', '', '2008-02-15', 'Manny P. Isles', 'admin', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `school` 
-- 

DROP TABLE IF EXISTS `school`; 
CREATE TABLE `school` (
  `id` int(11) NOT NULL auto_increment,
  `school_name` varchar(50),
  `school_code` varchar(50),
  `total` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE = MYISAM ;

-- 
-- Dumping data for table `school` 
-- 

INSERT INTO `school` (`id`, `school_name`, `school_code`, `total`) VALUES ('1', 'Pedro Guevarra Memo National High School', 'PGMNHS', '0');
INSERT INTO `school` (`id`, `school_name`, `school_code`, `total`) VALUES ('3', 'Montessori Prof College', 'MPC', '0');
INSERT INTO `school` (`id`, `school_name`, `school_code`, `total`) VALUES ('4', 'Little Shepherd Integ Montesorri', 'LSIM', '0');
INSERT INTO `school` (`id`, `school_name`, `school_code`, `total`) VALUES ('6', 'Balian National High School', 'BNHS', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `settings` 
-- 

DROP TABLE IF EXISTS `settings`; 
CREATE TABLE `settings` (
  `id` int(11) NOT NULL auto_increment,
  `css` varchar(50),
  `logo` varchar(50),
  `expiration_time` varchar(50),
  `header_title` varchar(50),
  `system_title` varchar(50),
  `bg` varchar(50),
  `footer` varchar(100),
  `hour_allow` varchar(50),
  `auto_id` int(11) DEFAULT '1' NOT NULL,
  `bar_id_start` int(11) NOT NULL,
  `auto_deadline` varchar(50),
  `rate` int(11) NOT NULL,
  `sat` varchar(11) NOT NULL,
  `sun` varchar(50) NOT NULL,
  `location1` varchar(50),
  `location2` varchar(50),
  `overdue_price` double NOT NULL,
  `search_output` int(11) NOT NULL,
  `rec_per_page` int(11) DEFAULT '5' NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE = MYISAM ;

-- 
-- Dumping data for table `settings` 
-- 

INSERT INTO `settings` (`id`, `css`, `logo`, `expiration_time`, `header_title`, `system_title`, `bg`, `footer`, `hour_allow`, `auto_id`, `bar_id_start`, `auto_deadline`, `rate`, `sat`, `sun`, `location1`, `location2`, `overdue_price`, `search_output`, `rec_per_page`) VALUES ('1', 'style1.css', 'lu-trans.gif', '16', 'Provincial Library System', 'Anilag Library System 0.90', 'back.gif', 'Copyright &copy; 2008 Provincial Government of Laguna', '24', '1', '0', '1', '1', '', '', '', 'on', '1', '2', '10');

-- --------------------------------------------------------

-- 
-- Table structure for table `titles` 
-- 

DROP TABLE IF EXISTS `titles`; 
CREATE TABLE `titles` (
  `title_proper` varchar(50),
  `quantity` varchar(50),
  `author_sname` varchar(50) NOT NULL,
  `author_fname` varchar(50) NOT NULL,
  `author_mname` varchar(50) NOT NULL,
  `available` varchar(10)
) ENGINE = MYISAM ;

-- 
-- Dumping data for table `titles` 
-- 

INSERT INTO `titles` (`title_proper`, `quantity`, `author_sname`, `author_fname`, `author_mname`, `available`) VALUES ('Watch man', '2', 'Racelis', 'Aaron', 'Kerubin', '0');
INSERT INTO `titles` (`title_proper`, `quantity`, `author_sname`, `author_fname`, `author_mname`, `available`) VALUES ('heart of mine', '1', 'Arevalo', 'Aisel', 'Apalla', '2');
INSERT INTO `titles` (`title_proper`, `quantity`, `author_sname`, `author_fname`, `author_mname`, `available`) VALUES ('Taga Pakil', '0', 'Matienzo', 'John', 'Caday', '1');
INSERT INTO `titles` (`title_proper`, `quantity`, `author_sname`, `author_fname`, `author_mname`, `available`) VALUES ('Hello World', '5', '', '', '', '4');
INSERT INTO `titles` (`title_proper`, `quantity`, `author_sname`, `author_fname`, `author_mname`, `available`) VALUES ('Hello World', '1', 'Racelis', 'Aaron', 'Kerubin', '1');
INSERT INTO `titles` (`title_proper`, `quantity`, `author_sname`, `author_fname`, `author_mname`, `available`) VALUES ('God is Good Sobra', '1', 'Racelis', 'Benjamin', 'Gallano', '1');
INSERT INTO `titles` (`title_proper`, `quantity`, `author_sname`, `author_fname`, `author_mname`, `available`) VALUES ('The Red Ribbon', '2', 'Palliar', 'Anne rhiza', 'Yakusa', '2');

-- --------------------------------------------------------

-- 
-- Table structure for table `user` 
-- 

DROP TABLE IF EXISTS `user`; 
CREATE TABLE `user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50),
  `password` varchar(50),
  `last1` varchar(50),
  `first1` varchar(50),
  `middle1` varchar(50) NOT NULL,
  `type` varchar(50),
  PRIMARY KEY  (`id`),
  KEY `type` (`type`)
) ENGINE = MYISAM ;

-- 
-- Dumping data for table `user` 
-- 

INSERT INTO `user` (`id`, `username`, `password`, `last1`, `first1`, `middle1`, `type`) VALUES ('1', 'admin', 'admin1', 'Isles', 'Manny', 'Pacqioa', 'admin');
INSERT INTO `user` (`id`, `username`, `password`, `last1`, `first1`, `middle1`, `type`) VALUES ('4', 'benjie', 'racelis', 'Racelis', 'Benjamin', 'Gallano', 'batapa');
INSERT INTO `user` (`id`, `username`, `password`, `last1`, `first1`, `middle1`, `type`) VALUES ('22', 'annrhizapallar', 'student', 'pallaers', 'anne rhiza', 'rhiza', 'admin');
INSERT INTO `user` (`id`, `username`, `password`, `last1`, `first1`, `middle1`, `type`) VALUES ('18', 'wala', 'eto', 'aaa', 'aa', 'aa', 'batapa');
INSERT INTO `user` (`id`, `username`, `password`, `last1`, `first1`, `middle1`, `type`) VALUES ('21', 'anne', 'annrhiza', 'pallar', 'ann rhiza', 'yting', 'admin');
INSERT INTO `user` (`id`, `username`, `password`, `last1`, `first1`, `middle1`, `type`) VALUES ('14', 'KIM3', 'KIM3', 'Racelis3', 'kimberly3', 'TORRES3', 'student');
INSERT INTO `user` (`id`, `username`, `password`, `last1`, `first1`, `middle1`, `type`) VALUES ('19', 'aron', 'kkk', 'Racelis2', 'Aaron Kerubin2', 'Gallano2', 'student');

-- --------------------------------------------------------

-- 
-- Table structure for table `usergroup` 
-- 

DROP TABLE IF EXISTS `usergroup`; 
CREATE TABLE `usergroup` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(50),
  `add_book` varchar(50),
  `edit_book` varchar(50),
  `del_book` varchar(50) NOT NULL,
  `borrow_book` varchar(50),
  `max_no` int(3) NOT NULL,
  `add_borrower` varchar(50),
  `edit_borrower` varchar(50) NOT NULL,
  `del_borrower` varchar(50) NOT NULL,
  `total` int(10) unsigned NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE = MYISAM ;

-- 
-- Dumping data for table `usergroup` 
-- 

INSERT INTO `usergroup` (`id`, `type`, `add_book`, `edit_book`, `del_book`, `borrow_book`, `max_no`, `add_borrower`, `edit_borrower`, `del_borrower`, `total`) VALUES ('1', 'admin', 'on', 'on', 'on', 'on', '10', 'on', 'on', 'on', '0');
INSERT INTO `usergroup` (`id`, `type`, `add_book`, `edit_book`, `del_book`, `borrow_book`, `max_no`, `add_borrower`, `edit_borrower`, `del_borrower`, `total`) VALUES ('7', 'student', 'off', 'on', 'off', 'on', '2', 'off', 'off', 'on', '0');
INSERT INTO `usergroup` (`id`, `type`, `add_book`, `edit_book`, `del_book`, `borrow_book`, `max_no`, `add_borrower`, `edit_borrower`, `del_borrower`, `total`) VALUES ('10', 'batapa', 'on', 'on', 'on', 'off', '4', 'on', 'on', 'on', '0');
INSERT INTO `usergroup` (`id`, `type`, `add_book`, `edit_book`, `del_book`, `borrow_book`, `max_no`, `add_borrower`, `edit_borrower`, `del_borrower`, `total`) VALUES ('12', 'asas', 'on', 'off', 'on', 'off', '34', 'on', 'off', 'on', '0');

-- --------------------------------------------------------

-- 
-- Table structure for table `visitor` 
-- 

DROP TABLE IF EXISTS `visitor`; 
CREATE TABLE `visitor` (
  `id` int(11) NOT NULL auto_increment,
  `counter` int(11) NOT NULL,
  `r` varchar(50),
  PRIMARY KEY  (`id`)
) ENGINE = MYISAM ;

-- 
-- Dumping data for table `visitor` 
-- 

INSERT INTO `visitor` (`id`, `counter`, `r`) VALUES ('1', '249', 'ee');

-- --------------------------------------------------------

