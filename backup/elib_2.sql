-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.51


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema elib
--

CREATE DATABASE IF NOT EXISTS elib;
USE elib;

--
-- Definition of table `elib`.`barrower`
--

DROP TABLE IF EXISTS `elib`.`barrower`;
CREATE TABLE  `elib`.`barrower` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `bar_id` varchar(50) default NULL,
  `school_code` varchar(50) default NULL,
  `last1` varchar(50) default NULL,
  `first1` varchar(50) default NULL,
  `type` varchar(50) NOT NULL default '',
  `course` varchar(50) default NULL,
  `year1` varchar(50) default NULL,
  `address` varchar(50) default NULL,
  `adviser` varchar(50) default NULL,
  `ex_date` varchar(50) NOT NULL default '0000-00-00',
  `contact` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  `active` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`barrower`
--

/*!40000 ALTER TABLE `barrower` DISABLE KEYS */;
LOCK TABLES `barrower` WRITE;
INSERT INTO `elib`.`barrower` VALUES  (28,'00028','MPC','Aguilar','Angie','batapa','HRM','2009','hhj','kljkl','2008-02-21','897897','hjkh',0),
 (30,'00030','PGMNHS','Sta. Maria','Joven','student','IT','2000-05-04','Paete, Laguna','El Terible','2008-02-02','748374','joven_sta_maria@yahoo.com',0),
 (25,'00001','MPC','caday2','mark2','admin','hrm','2008','Longos3, Kalayaan, Laguna','khhjhj','2008-03-03','6778732','kkkkkk',0),
 (26,'00026','PGMNHS','Carpio','Janice','student','hrm','2007','Longos, Kalayaan, Laguna','khan','2008-02-14','878978','hjgghkhjk',0),
 (27,'00027','LSIM','Cruz','Wendy','admin','HRM','2008','jkjk','jhjkh','2008-02-25','8787897','lklk',0),
 (13,'00006','MPC','Racelis3','Aaron Kerubin3','student','CMSC2','2001-08-08','Longos3, Kalayaan2, Laguna2','fdfd','2008-03-05','0918-2224567','aron3_racelis2@yahoo.com',0),
 (29,'00029','BNHS','Arevalo','Jeff','admin','gjh','2008','hg','j','2008-02-28','7787','kjj',0),
 (38,'00007','BNHS','Tadique','Cristina','Library Assistant','CMSC','2008-02-19','Longos, Kalayaan, Laguna','Prof. Medina','2008-02-02','09198776723','cristina@yahoo.com',0),
 (37,'00034','BNHS','Racelis3','Aaron3','batapa','CMSC','2008-01-01','Longos, Kalayaan, Laguna','Khan 3','2008-02-28','09197225680','dfhgdfhh@yahoo.com',0);
INSERT INTO `elib`.`barrower` VALUES  (33,'00033','PGMNHS','gagd','hhhj','admin','hjh','2000-05-04','Longos2, Kalayaan2, Laguna2','hhjh','2008-02-02','345','dfdfd',0),
 (39,'00008','BNHS','Tadique','Hobert','Library Assistant','CMSC','2008-02-19','Longos, Kalayaan, Laguna','Prof. Medina','2008-02-19','09198776723','cristina@yahoo.com',0),
 (40,'00010','PGMNHS','Gallano','Leocadia','student','IT','3rd Year','Longos, Kalayaan, Laguna','Pastora Angie Aguilar','2008-03-01','09197778987','leodcadia@yahoo.com',0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `barrower` ENABLE KEYS */;


--
-- Definition of table `elib`.`books`
--

DROP TABLE IF EXISTS `elib`.`books`;
CREATE TABLE  `elib`.`books` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `firstname` varchar(45) NOT NULL default '',
  `lastname` varchar(45) NOT NULL default '',
  `middle` varchar(45) NOT NULL default '',
  `books` varchar(45) NOT NULL default '',
  `numberno` int(10) unsigned NOT NULL default '0',
  `status` varchar(50) default NULL,
  `date_get` varchar(50) default NULL,
  `date_return` varchar(50) default NULL,
  `due_date` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`books`
--

/*!40000 ALTER TABLE `books` DISABLE KEYS */;
LOCK TABLES `books` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `books` ENABLE KEYS */;


--
-- Definition of table `elib`.`books_bar`
--

DROP TABLE IF EXISTS `elib`.`books_bar`;
CREATE TABLE  `elib`.`books_bar` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `bar_id` varchar(50) default NULL,
  `access_no` varchar(50) default NULL,
  `books` varchar(45) NOT NULL default '',
  `author` varchar(50) default NULL,
  `call_num` varchar(45) NOT NULL default '',
  `qty` int(11) NOT NULL default '0',
  `deadline` datetime NOT NULL default '0000-00-00 00:00:00',
  `date_borrow` date NOT NULL default '0000-00-00',
  `school_code` varchar(50) NOT NULL default '',
  `fees` float NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=157 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`books_bar`
--

/*!40000 ALTER TABLE `books_bar` DISABLE KEYS */;
LOCK TABLES `books_bar` WRITE;
INSERT INTO `elib`.`books_bar` VALUES  (155,'00001','44444','heart of mine','Aisel A. Arevalo','',0,'2008-02-22 00:22:03','2008-02-21','MPC',13),
 (156,'00001','11111','Watch man','Aaron K. Racelis','',0,'2008-02-22 00:26:06','2008-02-21','MPC',13);
UNLOCK TABLES;
/*!40000 ALTER TABLE `books_bar` ENABLE KEYS */;


--
-- Definition of table `elib`.`borrowers_pic`
--

DROP TABLE IF EXISTS `elib`.`borrowers_pic`;
CREATE TABLE  `elib`.`borrowers_pic` (
  `id` int(11) NOT NULL auto_increment,
  `bar_id` varchar(50) default NULL,
  `file_name` varchar(50) default NULL,
  `file_size` int(3) NOT NULL default '0',
  `file_type` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`borrowers_pic`
--

/*!40000 ALTER TABLE `borrowers_pic` DISABLE KEYS */;
LOCK TABLES `borrowers_pic` WRITE;
INSERT INTO `elib`.`borrowers_pic` VALUES  (27,'00007','Morning Sunrise.gif',10802,'image/gif'),
 (25,'00008','Illustration_03.jpg',18204,'image/pjpeg'),
 (24,'00034','avatar.jpg',28799,'image/pjpeg'),
 (21,'00031','Police Deputy DirectorGeneral JESUS AME VERZOSA, C',3113,'image/pjpeg'),
 (17,'00001','IMG0055A.jpg',25868,'image/pjpeg'),
 (18,'00002','3D_155.jpg',4590,'image/pjpeg'),
 (19,'00003','bot1.gif',851,'image/gif'),
 (23,'00030','right.jpg',415,'image/pjpeg');
UNLOCK TABLES;
/*!40000 ALTER TABLE `borrowers_pic` ENABLE KEYS */;


--
-- Definition of table `elib`.`card_cat`
--

DROP TABLE IF EXISTS `elib`.`card_cat`;
CREATE TABLE  `elib`.`card_cat` (
  `id` int(11) NOT NULL auto_increment,
  `school_code` varchar(50) default NULL,
  `pdb` text NOT NULL,
  `call_num` text NOT NULL,
  `author_sname` text NOT NULL,
  `author_fname` text NOT NULL,
  `author_mname` text NOT NULL,
  `other_author1_sname` text NOT NULL,
  `other_author1_fname` varchar(50) default NULL,
  `other_author1_mname` varchar(50) NOT NULL default '',
  `other_author2_sname` text NOT NULL,
  `other_author2_fname` varchar(50) NOT NULL default '',
  `other_author2_mname` varchar(50) NOT NULL default '',
  `other_author3_sname` text NOT NULL,
  `other_author3_fname` varchar(50) NOT NULL default '',
  `other_author3_mname` varchar(50) NOT NULL default '',
  `other_author4_sname` text NOT NULL,
  `other_author4_fname` text NOT NULL,
  `other_author4_mname` varchar(50) NOT NULL default '',
  `other_author5_sname` varchar(50) NOT NULL default '',
  `other_author5_fname` varchar(50) NOT NULL default '',
  `other_author5_mname` varchar(50) NOT NULL default '',
  `other_author6_sname` varchar(50) NOT NULL default '',
  `other_author6_fname` varchar(50) NOT NULL default '',
  `other_author6_mname` varchar(50) NOT NULL default '',
  `other_author7_sname` varchar(50) NOT NULL default '',
  `other_author7_fname` varchar(50) NOT NULL default '',
  `other_author7_mname` varchar(50) NOT NULL default '',
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
  `classification` text NOT NULL,
  `pdf` text NOT NULL,
  `help` text NOT NULL,
  `front` text NOT NULL,
  `status1` varchar(50) NOT NULL default '',
  `notes` text NOT NULL,
  `series` text NOT NULL,
  `qty` int(11) NOT NULL default '0',
  `access_no` varchar(50) NOT NULL default '',
  `parallel_title` text NOT NULL,
  `oti` text NOT NULL,
  `uti` varchar(50) NOT NULL default '',
  `gmd` varchar(50) NOT NULL default '',
  `eoi` text NOT NULL,
  `opd` text NOT NULL,
  `size_dimension` text NOT NULL,
  `accom_mat` text NOT NULL,
  `source_of_fund` text NOT NULL,
  `mode_of_ac` varchar(50) NOT NULL default '',
  `mode_ac` varchar(50) NOT NULL default '',
  `date_ac` text NOT NULL,
  `property_no` text NOT NULL,
  `are` text NOT NULL,
  `encoded_by` text NOT NULL,
  `date_encode` text NOT NULL,
  `verified_by` text NOT NULL,
  `date_verify` text NOT NULL,
  `flag` varchar(5) default NULL,
  PRIMARY KEY  (`id`,`access_no`),
  FULLTEXT KEY `NewIndex` (`access_no`),
  FULLTEXT KEY `author` (`author_sname`,`title`,`call_num`,`place_pub`,`publisher`,`date_pub`,`subject1`,`subject2`,`subject3`,`author_fname`,`author_mname`,`classification`,`location`)
) ENGINE=MyISAM AUTO_INCREMENT=704 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`card_cat`
--

/*!40000 ALTER TABLE `card_cat` DISABLE KEYS */;
LOCK TABLES `card_cat` WRITE;
INSERT INTO `elib`.`card_cat` VALUES  (662,'BNHS','','','Racelis','Aaron','Kerubin','','','','','','','','','','','','','','','','','','','','','','Watch man','Math','','','','','','','','','','','','','Book','','','','in','','',0,'11111','','','','Book','','','','','','Donation','','','','','admin','','','February 14, 2008, 12:51 pm','up'),
 (663,'PGMNHS','','B22','Racelis','Aaron','Kerubin','Racelis','Benjamin','Gallano','Racelis','Corazon','Gallano','Racelis','Benjie','Laban-Laban','','','','','','','','','','','','','Watch man','Math','Science','English','Filipino','','','','32434-54546','Shelf 4','','Muntinlupa City','Time Magazine','2008','Transparency','','','','in','','2007, Vol 3, p.9',1,'22222','Watch man 2','','','Transparency','','','','','','Donation','','','','','admin','February 14, 2008, 12:51 pm','','February 14, 2008, 11:33 pm','up'),
 (664,'BNHS','','','Racelis','Aaron','Kerubin','','','','','','','','','','','','','','','','','','','','','','Hello World','Social','','','','','','','','','','','','','Book','','','','in','','',1,'33333','Hello','World','World','Book','','','','','','Donation','','','','','admin','','','February 27, 2008, 10:19 pm','up'),
 (665,'BNHS','','','Arevalo','Aisel','Apalla','','','','','','','','','','','','','','','','','','','','','','heart of mine','Social','','','','','','','','','','','','','Transparency','','','','in','','',0,'44444','','','','Transparency','','','','','','Donation','','','','','admin','','','February 20, 2008, 1:20 pm','up');
INSERT INTO `elib`.`card_cat` VALUES  (670,'PGMNHS','','A56','Matienzo','John','Caday','Caday','Masrk','Anthony','Cruz','Wendy','Facundo','Santos','Honeylet','Delos','Carpio','Janice','Elca','Magdaong','Nilo','Santos','Arevalo','Jeff','Apalla','Apalla','James','Santos','Taga Pakil','Religion','Zoology','Botany','Horticulture','Physics','Chemistry','','88876-8988','','','Makati City, Philippines','Yes FM Magazine','2007','Transparency','','','','in','2 illus, 7 graphs;','2007, Vol 3, 10',1,'77676','','','','Transparency','','none','10X 2','diorama','GSIS','Donation','100','','13232','344','admin','','administrator','February 27, 2008, 10:39 pm','up'),
 (671,'MPC','','','Arevalo','Aisel','Apalla','','','','','','','','','','','','','','','','','','','','','','heart of mine','Physics','Chermistry','','','','','','','Shelf 2','','','','','Tape','','','','in','','',1,'87899080','','','','Tape','','','','','','Donation','','','','','admin','','','February 15, 2008, 4:35 am','up'),
 (677,'BNHS','','','','','','','','','','','','','','','','','','','','','','','','','','','Hello World','','','','','','','','','','','','','','Book','','','','in','','',1,'767565','','','','Book','','','','','','Donation','','','','','admin','','','February 20, 2008, 11:19 pm','up'),
 (673,NULL,'','','','','','',NULL,'','','','','','','','','','','','','','','','','','','','Hello World','','','','','','','','','','','','','','','','','','in','','',1,'34556656','','','','','','','','','','','','','','','','','','','up');
INSERT INTO `elib`.`card_cat` VALUES  (674,NULL,'','','','','','',NULL,'','','','','','','','','','','','','','','','','','','','Hello World','','','','','','','','','','','','','','','','','','in','','',1,'4234356','','','','','','','','','','','','','','','','','','','up'),
 (676,NULL,'','','Racelis','Aaron','Kerubin','',NULL,'','','','','','','','','','','','','','','','','','','','Hello World','','','','','','','','','','','','','','','','','','in','','',1,'567654','','','','','','','','','','','','','','','','','','','up'),
 (675,NULL,'','','','','','',NULL,'','','','','','','','','','','','','','','','','','','','Hello World','','','','','','','','','','','','','','','','','','in','','',1,'6565768787','','','','','','','','','','','','','','','','','','','up'),
 (679,'BNHS','','A34','Racelis','Benjamin','Gallano','','','','','','','','','','','','','','','','','','','','','','God is Good Sobra','Math','Science','English','','','','','232323-556','','1st','','','','Book','man.chm','','','in','','',1,'65677','God','Good','','Book','','','','','','Donation','','','','','admin','','','February 26, 2009, 9:04 am','up'),
 (680,'PGMNHS','','','Racelis','Benjamin','Gallano','','','','','','','','','','','','','','','','','','','','','','God is Good Sobra','','','','','','','','','','','','','','Book','','','','in','','',1,'87889','','','','Book','','','','','','Donation','','','','','wala','','','February 25, 2008, 8:09 pm','up');
INSERT INTO `elib`.`card_cat` VALUES  (681,'BNHS','','','Palliar','Anne rhiza','Yakusa','Mercado','Lani','Gutierrez','','','','','','','','','','','','','','','','','','','The Red Ribbon','Math','Social','','','','','','323236-43656','','','Los Banos, Laguna','Yes Magazine','2008','Tape','','','','in','','',1,'67664','Red Ribbon','Red Ribbon','','Tape','','','','','','Donation','','','','','admin','','','February 15, 2008, 1:45 pm','up'),
 (682,NULL,'','','Palliar','Anne rhiza','Yakusa','',NULL,'','','','','','','','','','','','','','','','','','','','The Red Ribbon','Math','Social','','','','','','','','','','','','','','','','in','','',1,'8989978','','','','','','','','','','','','','','','','','','','up'),
 (685,NULL,'','','Delos Santos','Honeylet','Madraso','',NULL,'','','','','','','','','','','','','','','','','','','','Still Worship Song','Music for Soul','Himig ng Puso','','','','','','','','','','','','','','','','in','','',1,'766654','','','','','','','','','','','','','','','','','','','up'),
 (686,NULL,'','','Delos Santos','Honeylet','Madraso','',NULL,'','','','','','','','','','','','','','','','','','','','Still Worship Song','Music for Soul','Himig ng Puso','','','','','','','','','','','','','','','','in','','',1,'32345','','','','','','','','','','','','','','','','','','','up');
INSERT INTO `elib`.`card_cat` VALUES  (687,NULL,'','','Shakespeare','William','Ewan','',NULL,'','','','','','','','','','','','','','','','','','','','Romeo And Juliet','Literature','','','','','','','','','','','','','','','','','in','','',1,'43567','','','','','','','','','','','','','','','','','','','up'),
 (688,NULL,'','','Shakespeare','William','Ewan','',NULL,'','','','','','','','','','','','','','','','','','','','Hamlet','Literature','','','','','','','','','','','','','','','','','in','','',1,'342123','','','','','','','','','','','','','','','','','','','up'),
 (689,'PGMNHS','','','Shakespeare','William','Ewan','','','','','','','','','','','','','','','','','','','','','','Romeo And Juliet','Literature','','','','','','','','','','','','','Book','','','','in','','',1,'77688','','','','Book','','','','','','Donation','','','','','admin','February 20, 2008, 1:28 pm','','February 20, 2008, 1:28 pm','up'),
 (690,'PGMNHS','','','Shakespeare','William','Ewan','','','','','','','','','','','','','','','','','','','','','','Romeo And Juliet','Literature','','','','','','','','','','','','','Book','','','','in','','',1,'11234','','','','Book','','','','','','Donation','','','','','admin','February 20, 2008, 1:28 pm','','February 20, 2008, 1:28 pm','up'),
 (693,'BNHS','','LB1025A23','Shakespeare','William','Ewan','','','','','','','','','','','','','','','','','','','','','','A Mid Summer Night Dream2','Literature','English & Poetry','','','','','','','Filipiniana','','Manila','Rex Bookstore','2000','Book','','','','in','','',1,'43556','','','','Book','','','','','','Donation','','','','','admin','February 20, 2008, 1:46 pm','','March 8, 2008, 1:30 pm','up');
INSERT INTO `elib`.`card_cat` VALUES  (692,'PGMNHS','','','Shakespeare','William','Ewan','','','','','','','','','','','','','','','','','','','','','','A Mid Summer Night Dream2','Literature','English & Poetry','','','','','','','','','','','','Book','','','','in','','',1,'54566','','','','Book','','','','','','Donation','','','','','admin','February 20, 2008, 1:41 pm','','February 20, 2008, 1:41 pm','up'),
 (694,'PGMNHS','','A344','racelis','corazon','Gallano','','','','','','','','','','','','','','','','','','','','','','A new song','Music','','','','','','','','','','','','','Book','','','','in','','',1,'656565','','','','Book','','','','','','Donation','','','','','admin','February 20, 2008, 1:47 pm','','February 20, 2008, 1:47 pm','up'),
 (695,NULL,'','','Shakespeare','William','Ewan','',NULL,'','','','','','','','','','','','','','','','','','','','Hamlet','Literature','','','','','','','','','','','','','','','','','in','','',1,'7567697','','','','','','','','','','','','','','','','','','','up'),
 (696,'BNHS','','C14','Arevalo','Jeffrey','Apalla','Arevalo','Catherine','Apalla','','','','','','','','','','','','','','','','','','','One Desire, Worship Song','Music In our hearts','','','','','','','','Music room','','Manila','Star Records','2008','CD','','','','in','','',1,'43456','','','','CD','','','','','','Donation','','2008-01-01','','','admin','February 27, 2008, 10:22 pm','','February 27, 2008, 10:22 pm','up');
INSERT INTO `elib`.`card_cat` VALUES  (697,'BNHS','','RM45','Baxter','Marry','Shelle','','','','','','','','','','','','','','','','','','','','','','Divine Revelation Of Heaven','Theology','','','','','','','76655-89976','Religion Section','','Queensland, Austalia','Maxwell Corporation','2005','Book','','','','in','','',1,'7777777','','','','Book','','','','','','Donation','','2007-01-01','','','admin','February 27, 2008, 10:42 pm','','February 20, 2008, 11:18 pm','up'),
 (698,'BNHS','','RM45','Baxter','Marry','Shelle','','','','','','','','','','','','','','','','','','','','','','Divine Revelation Of Heaven','Theology','','','','','','','','Religion Section','','Queensland, Austalia','Maxwell Corporation','2005','Book','hell is real.pdf','','','in','','',1,'34455','','','','Book','','','','','','Donation','','2007-01-01','','','admin','February 27, 2008, 10:45 pm','','February 27, 2008, 10:45 pm','up'),
 (699,'BNHS','','B67','Gallano','Leocadia','Panuntan','','','','','','','','','','','','','','','','','','','','','','Ang Baranggay Longos','History of Longos','','','','','','','','Shelf 3','','Municipality of Kalayaan, Laguna','Mayor\'s Office','2008','Book','','','','in','','',1,'455676','','','','Book','','','','','','Donation','Mayor Adao','','','','admin','February 20, 2008, 11:40 pm','','February 20, 2008, 11:40 pm','up'),
 (700,NULL,'','','Gallano','Leocadia','Panuntan','',NULL,'','','','','','','','','','','','','','','','','','','','Ang Baranggay Longos','History of Longos','','','','','','','','','','','','','','','','','in','','',1,'56654','','','','','','','','','','','','','','','','','','','up');
INSERT INTO `elib`.`card_cat` VALUES  (702,NULL,'','','Gallano','Leocadia','Panuntan','',NULL,'','','','','','','','','','','','','','','','','','','','Ang Baranggay Longos','History of Longos','','','','','','','','','','','','','','','','','in','','',1,'787888','','','','','','','','','','','','','','','','','','','up'),
 (701,NULL,'','','Gallano','Leocadia','Panuntan','',NULL,'','','','','','','','','','','','','','','','','','','','Ang Baranggay Longos','History of Longos','','','','','','','','','','','','','','','','','in','','',1,'766454','','','','','','','','','','','','','','','','','','','up'),
 (703,NULL,'','','Gallano','Leocadia','Panuntan','',NULL,'','','','','','','','','','','','','','','','','','','','Ang Baranggay Longos','History of Longos','','','','','','','','','','','','','','','','','in','','',1,'67775','','','','','','','','','','','','','','','','','','','up');
UNLOCK TABLES;
/*!40000 ALTER TABLE `card_cat` ENABLE KEYS */;


--
-- Definition of table `elib`.`history`
--

DROP TABLE IF EXISTS `elib`.`history`;
CREATE TABLE  `elib`.`history` (
  `id` int(11) NOT NULL auto_increment,
  `access_no` varchar(50) default NULL,
  `call_num` varchar(50) default NULL,
  `title` varchar(50) default NULL,
  `author` varchar(50) default NULL,
  `bar_id` varchar(50) default NULL,
  `date_borrow` date NOT NULL default '0000-00-00',
  `deadline` date default NULL,
  `school_code` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=223 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`history`
--

/*!40000 ALTER TABLE `history` DISABLE KEYS */;
LOCK TABLES `history` WRITE;
INSERT INTO `elib`.`history` VALUES  (196,'65677','A34','God is Good Sobra','Benjamin G. Racelis','00034','2008-02-18','2008-02-19','BNHS'),
 (197,'44444','','heart of mine','Aisel A. Arevalo','00034','2008-02-18','2008-02-19','BNHS'),
 (198,'87899080','','heart of mine','Aisel A. Arevalo','00034','2008-02-25','2008-02-26','BNHS'),
 (199,'87889','','God is Good Sobra','Benjamin G. Racelis','00034','2008-02-25','2008-02-26','BNHS'),
 (200,'65677','A34','God is Good Sobra','Benjamin G. Racelis','00029','2008-02-25','2008-02-26','BNHS'),
 (201,'67664','','The Red Ribbon','Anne rhiza Y. Palliar','00027','2009-02-26','2009-02-27','LSIM'),
 (202,'11111','','Watch man','Aaron K. Racelis','00027','2009-02-26','2009-02-27','LSIM'),
 (203,'767565','','Hello World',' .','00034','2009-02-26','2009-02-27','BNHS'),
 (204,'34556656','','Hello World',' .','00027','2008-02-19','2008-02-20','LSIM'),
 (205,'44444','','heart of mine','Aisel A. Arevalo','00034','2008-02-19','2008-02-20','BNHS'),
 (206,'87832','V19','Still','Honeylet M. Delos Santos','00027','2008-02-19','2008-02-20','LSIM'),
 (207,'766654','','Still Worship Song','Honeylet M. Delos Santos','00034','2008-02-19','2008-02-20','BNHS');
INSERT INTO `elib`.`history` VALUES  (208,'32345','','Still Worship Song','Honeylet M. Delos Santos','00027','2008-02-19','2008-02-20','LSIM'),
 (209,'54566','','A Mid Summer Night Dream2','William E. Shakespeare','00034','2008-02-20','2008-02-21','BNHS'),
 (210,'656565','A344','A new song','corazon G. racelis','00034','2008-02-20','2008-02-21','BNHS'),
 (211,'7567697','','Hamlet','William E. Shakespeare','00027','2008-02-20','2008-02-21','LSIM'),
 (212,'43556','','A Mid Summer Night Dream2','William E. Shakespeare','00028','2008-02-20','2008-02-21','MPC'),
 (213,'54566','','A Mid Summer Night Dream2','William E. Shakespeare','00028','2008-02-20','2008-02-21','MPC'),
 (214,'87889','','God is Good Sobra','Benjamin G. Racelis','00029','2008-02-20','2008-02-21','BNHS'),
 (215,'7567697','','Hamlet','William E. Shakespeare','00029','2008-02-20','2008-02-21','BNHS'),
 (216,'342123','','Hamlet','William E. Shakespeare','00034','2008-02-20','2008-02-21','BNHS'),
 (217,'766654','','Still Worship Song','Honeylet M. Delos Santos','00027','2008-02-20','2008-02-21','LSIM'),
 (218,'32345','','Still Worship Song','Honeylet M. Delos Santos','00027','2008-02-20','2008-02-21','LSIM');
INSERT INTO `elib`.`history` VALUES  (219,'77688','','Romeo And Juliet','William E. Shakespeare','00034','2008-02-27','2008-02-28','BNHS'),
 (220,'11234','','Romeo And Juliet','William E. Shakespeare','00034','2008-02-27','2008-02-28','BNHS'),
 (221,'44444','','heart of mine','Aisel A. Arevalo','00001','2008-02-21','2008-02-22','MPC'),
 (222,'11111','','Watch man','Aaron K. Racelis','00001','2008-02-21','2008-02-22','MPC');
UNLOCK TABLES;
/*!40000 ALTER TABLE `history` ENABLE KEYS */;


--
-- Definition of table `elib`.`income`
--

DROP TABLE IF EXISTS `elib`.`income`;
CREATE TABLE  `elib`.`income` (
  `id` int(11) NOT NULL auto_increment,
  `bar_id` varchar(50) NOT NULL default '',
  `subtotal` float NOT NULL default '0',
  `deduct` float default NULL,
  `total_amount` float default NULL,
  `justification` varchar(50) default NULL,
  `pay_date` date NOT NULL default '0000-00-00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`income`
--

/*!40000 ALTER TABLE `income` DISABLE KEYS */;
LOCK TABLES `income` WRITE;
INSERT INTO `elib`.`income` VALUES  (1,'00001',3,0,3,'','0000-00-00'),
 (3,'00034',8,0,8,'','0000-00-00'),
 (4,'00034',10,0,10,'','0000-00-00'),
 (7,'00027',45,5.5,39.5,'','0000-00-00'),
 (8,'00029',44,8.5,35.5,'','0000-00-00'),
 (9,'00027',20,3.25,16.75,'','2008-02-27'),
 (10,'00029',10,0,10,NULL,'2008-02-27'),
 (11,'',5,20,-15,'delinquent ','2008-02-22');
UNLOCK TABLES;
/*!40000 ALTER TABLE `income` ENABLE KEYS */;


--
-- Definition of table `elib`.`material_type`
--

DROP TABLE IF EXISTS `elib`.`material_type`;
CREATE TABLE  `elib`.`material_type` (
  `id` int(11) NOT NULL auto_increment,
  `mat_type` varchar(50) default NULL,
  `description` varchar(50) default NULL,
  `total` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`material_type`
--

/*!40000 ALTER TABLE `material_type` DISABLE KEYS */;
LOCK TABLES `material_type` WRITE;
INSERT INTO `elib`.`material_type` VALUES  (2,'Chart','Visual Presentation of Data',0),
 (3,'Book','Books',0),
 (4,'Magazine',NULL,0),
 (5,'Tape',NULL,0),
 (6,'CD','Compact Disk',0),
 (7,'Case','case 2',0),
 (8,'Map',NULL,0),
 (10,'Diorama',NULL,0),
 (11,'Film Strip',NULL,0),
 (12,'Flash Card',NULL,0),
 (13,'Game',NULL,0),
 (14,'Globe',NULL,0),
 (15,'Micro form',NULL,0),
 (16,'Microscope Slide',NULL,0),
 (17,'Model',NULL,0),
 (18,'Picture',NULL,0),
 (19,'Relic',NULL,0),
 (20,'Slide',NULL,0),
 (21,'Sound Recording',NULL,0),
 (22,'Transparency',NULL,0),
 (23,'Video Recording',NULL,0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `material_type` ENABLE KEYS */;


--
-- Definition of table `elib`.`recyclebin`
--

DROP TABLE IF EXISTS `elib`.`recyclebin`;
CREATE TABLE  `elib`.`recyclebin` (
  `id` int(11) NOT NULL auto_increment,
  `booktitle` varchar(50) default NULL,
  `author_sname` varchar(50) default NULL,
  `author_fname` varchar(50) default NULL,
  `author_mname` varchar(50) default NULL,
  `accession_no` varchar(50) default NULL,
  `mat_type` varchar(50) default NULL,
  `date_deleted` date default NULL,
  `person_deleted` varchar(50) default NULL,
  `type` varchar(50) default NULL,
  `school_code` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=175 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`recyclebin`
--

/*!40000 ALTER TABLE `recyclebin` DISABLE KEYS */;
LOCK TABLES `recyclebin` WRITE;
INSERT INTO `elib`.`recyclebin` VALUES  (167,'Ang Bayan Ko','Racelis','Aaron','Kerubin','55555','Video Recording','2008-02-14','Manny P. Isles','admin','LSIM'),
 (168,'Worship Songs','Carpio','Janice','Elca','09977','','2008-02-14','Manny P. Isles','admin',''),
 (170,'Watch man','Racelis','Aaron','Kerubin','78890','Tape','2008-02-14','Manny P. Isles','admin','BNHS'),
 (171,'Hello World','','','','6565785','Book','2008-02-15','Manny P. Isles','admin','BNHS'),
 (172,'Tapos na din','','','','234568','','2008-02-15','Manny P. Isles','admin',''),
 (173,'Still','Delos Santos','Honeylet','Madraso','12234','Tape','2008-02-19','Manny P. Isles','admin','MPC'),
 (174,'Still','Delos Santos','Honeylet','Madraso','87832','Book','2008-02-19','Manny P. Isles','admin','BNHS');
UNLOCK TABLES;
/*!40000 ALTER TABLE `recyclebin` ENABLE KEYS */;


--
-- Definition of table `elib`.`school`
--

DROP TABLE IF EXISTS `elib`.`school`;
CREATE TABLE  `elib`.`school` (
  `id` int(11) NOT NULL auto_increment,
  `school_name` varchar(50) default NULL,
  `school_code` varchar(50) default NULL,
  `total` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`school`
--

/*!40000 ALTER TABLE `school` DISABLE KEYS */;
LOCK TABLES `school` WRITE;
INSERT INTO `elib`.`school` VALUES  (1,'Pedro Guevarra Memo National High School','PGMNHS',0),
 (3,'Montessori Prof College','MPC',0),
 (4,'Little Shepherd Integ Montesorri','LSIM',0),
 (6,'Balian National High School','BNHS',0),
 (7,'MIS Training Center','MISO',0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `school` ENABLE KEYS */;


--
-- Definition of table `elib`.`settings`
--

DROP TABLE IF EXISTS `elib`.`settings`;
CREATE TABLE  `elib`.`settings` (
  `id` int(11) NOT NULL auto_increment,
  `css` varchar(50) default NULL,
  `logo` varchar(50) default NULL,
  `expiration_time` varchar(50) default NULL,
  `header_title` varchar(50) default NULL,
  `system_title` varchar(50) default NULL,
  `bg` varchar(50) default NULL,
  `footer` varchar(100) default NULL,
  `hour_allow` varchar(50) default NULL,
  `auto_id` int(11) NOT NULL default '1',
  `bar_id_start` int(11) NOT NULL default '0',
  `auto_deadline` varchar(50) default NULL,
  `rate` int(11) NOT NULL default '0',
  `sat` varchar(11) NOT NULL default '',
  `sun` varchar(50) NOT NULL default '',
  `location2` varchar(50) default NULL,
  `author_card` varchar(50) default NULL,
  `title_card` varchar(50) default NULL,
  `overdue_price` double NOT NULL default '0',
  `search_output` int(11) NOT NULL default '0',
  `rec_per_page` int(11) NOT NULL default '5',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`settings`
--

/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
LOCK TABLES `settings` WRITE;
INSERT INTO `elib`.`settings` VALUES  (1,'style2.css','lu-trans.gif','16','ANILAG Library System','Anilag Library System 0.90','back.gif','Copyright &copy; 2008 Provincial Government of Laguna','24',0,0,'1',1,'on','','','on','',1,2,14);
UNLOCK TABLES;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;


--
-- Definition of table `elib`.`titles`
--

DROP TABLE IF EXISTS `elib`.`titles`;
CREATE TABLE  `elib`.`titles` (
  `title_proper` varchar(50) default NULL,
  `quantity` varchar(50) default NULL,
  `author_sname` varchar(50) NOT NULL default '',
  `author_fname` varchar(50) NOT NULL default '',
  `author_mname` varchar(50) NOT NULL default '',
  `available` varchar(10) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`titles`
--

/*!40000 ALTER TABLE `titles` DISABLE KEYS */;
LOCK TABLES `titles` WRITE;
INSERT INTO `elib`.`titles` VALUES  ('Watch man','2','Racelis','Aaron','Kerubin','1'),
 ('heart of mine','2','Arevalo','Aisel','Apalla','1'),
 ('Taga Pakil','1','Matienzo','John','Caday','1'),
 ('Hello World','4','','','','4'),
 ('Hello World','2','Racelis','Aaron','Kerubin','2'),
 ('God is Good Sobra','2','Racelis','Benjamin','Gallano','2'),
 ('The Red Ribbon','2','Palliar','Anne rhiza','Yakusa','2'),
 ('Still Worship Song','2','Delos Santos','Honeylet','Madraso','2'),
 ('Romeo And Juliet','3','Shakespeare','William','Ewan','3'),
 ('Hamlet','2','Shakespeare','William','Ewan','2'),
 ('A Mid Summer Night Dream2','2','Shakespeare','William','Ewan','2'),
 ('A new song','1','racelis','corazon','Gallano','1'),
 ('One Desire, Worship Song','1','Arevalo','Jeffrey','Apalla','1'),
 ('Divine Revelation Of Heaven','2','Baxter','Marry','Shelle','2'),
 ('Ang Baranggay Longos','5','Gallano','Leocadia','Panuntan','5');
UNLOCK TABLES;
/*!40000 ALTER TABLE `titles` ENABLE KEYS */;


--
-- Definition of table `elib`.`user`
--

DROP TABLE IF EXISTS `elib`.`user`;
CREATE TABLE  `elib`.`user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) default NULL,
  `password` varchar(50) default NULL,
  `last1` varchar(50) default NULL,
  `first1` varchar(50) default NULL,
  `middle1` varchar(50) NOT NULL default '',
  `type` varchar(50) default NULL,
  PRIMARY KEY  (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
LOCK TABLES `user` WRITE;
INSERT INTO `elib`.`user` VALUES  (1,'admin','anilag','Racelis','Aaron','Pacqioa','admin'),
 (4,'benjie','racelis','Racelis','Benjamin','Gallano','Library Assistant'),
 (22,'annrhizapallar','student','pallaers','anne rhiza','rhiza','admin'),
 (18,'wala','etona','aaa','aa','aa','student'),
 (21,'anne','annrhiza','pallar','ann rhiza','yting','admin'),
 (14,'KIM3','KIM3','Racelis3','kimberly3','TORRES3','student'),
 (19,'aron','kkk','Racelis2','Aaron Kerubin2','Gallano2','student');
UNLOCK TABLES;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;


--
-- Definition of table `elib`.`usergroup`
--

DROP TABLE IF EXISTS `elib`.`usergroup`;
CREATE TABLE  `elib`.`usergroup` (
  `id` int(11) NOT NULL auto_increment,
  `type` varchar(50) default NULL,
  `add_book` varchar(50) default NULL,
  `edit_book` varchar(50) default NULL,
  `del_book` varchar(50) NOT NULL default '',
  `borrow_book` varchar(50) default NULL,
  `max_no` int(3) NOT NULL default '0',
  `add_borrower` varchar(50) default NULL,
  `edit_borrower` varchar(50) NOT NULL default '',
  `del_borrower` varchar(50) NOT NULL default '',
  `show_borrower` varchar(50) default NULL,
  `upload` varchar(50) default NULL,
  `remove` varchar(50) default NULL,
  `total` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`usergroup`
--

/*!40000 ALTER TABLE `usergroup` DISABLE KEYS */;
LOCK TABLES `usergroup` WRITE;
INSERT INTO `elib`.`usergroup` VALUES  (1,'admin','on','on','on','on',10,'on','on','on','on','on','on',0),
 (7,'student','off','off','off','off',2,'off','off','off','off','off','off',0),
 (13,'Library Assistant','on','on','off','on',10,'on','on','off','off','on','off',0),
 (14,'miso','on','on','on','on',22,'on','on','off','on','on','on',0);
UNLOCK TABLES;
/*!40000 ALTER TABLE `usergroup` ENABLE KEYS */;


--
-- Definition of table `elib`.`visitor`
--

DROP TABLE IF EXISTS `elib`.`visitor`;
CREATE TABLE  `elib`.`visitor` (
  `id` int(11) NOT NULL auto_increment,
  `counter` int(11) NOT NULL default '0',
  `r` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib`.`visitor`
--

/*!40000 ALTER TABLE `visitor` DISABLE KEYS */;
LOCK TABLES `visitor` WRITE;
INSERT INTO `elib`.`visitor` VALUES  (1,249,'ee');
UNLOCK TABLES;
/*!40000 ALTER TABLE `visitor` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
