-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2018 at 06:32 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `apply_job_post`
--

DROP TABLE IF EXISTS `apply_job_post`;
CREATE TABLE IF NOT EXISTS `apply_job_post` (
  `id_apply` int(11) NOT NULL AUTO_INCREMENT,
  `id_jobpost` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_apply`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `id_company` int(11) NOT NULL AUTO_INCREMENT,
  `companyname` varchar(255) NOT NULL,
  `headofficecity` varchar(255) NOT NULL,
  `contactno` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `companytype` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_company`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `companyname`, `headofficecity`, `contactno`, `website`, `companytype`, `email`, `password`, `createdAt`) VALUES
(1, 'TCS', 'Bangalore', '8879096228', 'www.tcs.com', 'Software Solutions', 'careers@tcs.com', 'YjdlNDhmMTk4NjFhNDNjNGM2MDdhOGFlZTBiY2M3Mjg=', '2018-04-17 17:22:25'),
(2, 'Capital First', 'Delhi', '9987927330', 'www.capitalfirst.com', 'Sales & Marketing', 'careers@capfirst.com', 'YjdlNDhmMTk4NjFhNDNjNGM2MDdhOGFlZTBiY2M3Mjg=', '2018-04-17 17:23:22'),
(3, 'Infosys', 'Chennai', '9702818665', 'www.infosys.com', 'Software Solutions', 'careers@infosys.com', 'YjdlNDhmMTk4NjFhNDNjNGM2MDdhOGFlZTBiY2M3Mjg=', '2018-04-17 17:24:28'),
(4, 'Reliance', 'Mumbai', '7021275658', 'www.reliance.com', 'Electronics', 'careers@reliance.com', 'YjdlNDhmMTk4NjFhNDNjNGM2MDdhOGFlZTBiY2M3Mjg=', '2018-04-17 17:25:02'),
(5, 'Croma', 'Ahmedabad', '8655225165', 'www.croma.com', 'Electronics', 'careers@croma.com', 'YjdlNDhmMTk4NjFhNDNjNGM2MDdhOGFlZTBiY2M3Mjg=', '2018-04-17 17:25:59');

-- --------------------------------------------------------

--
-- Table structure for table `job_post`
--

DROP TABLE IF EXISTS `job_post`;
CREATE TABLE IF NOT EXISTS `job_post` (
  `id_jobpost` int(11) NOT NULL AUTO_INCREMENT,
  `id_company` int(11) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `minimumsalary` varchar(255) NOT NULL,
  `maximumsalary` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `qualification` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jobpost`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_post`
--

INSERT INTO `job_post` (`id_jobpost`, `id_company`, `jobtitle`, `description`, `minimumsalary`, `maximumsalary`, `experience`, `qualification`, `createdAt`) VALUES
(1, 1, 'Back Office Operations', 'TCS BPS Mega Hiring for Back office operations(Non Voice) @ Mumbai, Interviews on 25th April 2018\r\nInterview Location : Raj Palace, Worli, Mumbai.', '15000', '20000', 'Fresher', 'Any Graduate', '2018-04-17 17:28:48'),
(2, 1, 'Customer Service Advisor', 'Opportunity is knocking at your door steps. TCS gives you an opportunity to work with one of the leading BPO in India.', '10000', '15000', 'Fresher', 'HSC', '2018-04-17 17:33:58'),
(3, 2, 'Sales Managers', 'Should have worked in to the MSME Products.- Individual Business Loans. Good understanding of self-employed customer \r\nExposure in local market.', '23000', '25000', 'Fresher', 'Any Graduate', '2018-04-17 17:36:50'),
(4, 5, 'Deputy Manager', 'If you are interested in joining a purpose driven community that is dedicated to creating an ambitious and inclusive workplace, join our company that you can be proud to be a part of!!', '10000', '12000', 'Fresher', 'Any Graduate', '2018-04-17 17:39:03'),
(5, 3, 'Software Developer', 'Position Overview: As a Lead, you will interface with key stakeholders and apply your technical proficiency across different stages of the Software Development Life Cycle.', '40000', '43000', '5', 'MCA or B.Tech', '2018-04-17 17:40:53'),
(6, 4, 'Chat Process', 'Hi, Greeting from Reliance Jio. Currently we are hiring for Social Media / Chat / Email.', '7500', '10000', 'Fresher', 'HSC or Any Graduate', '2018-04-17 17:43:00'),
(7, 2, 'Area Collection Manager', 'He/ She will be responsible for collection efficiency and cost of collections for the assigned area.\r\nThe incumbent will be responsible to track & control the delinquency of the area.', '60000', '62000', 'Fresher', 'CS', '2018-04-17 17:45:17'),
(8, 1, 'Senior Level Account Management ', 'Responsible for the enterprise sales in TATA Group of Companies Preferably TCS , TCL ,TATA Steel, TATA Motors,etc.\r\nEstablish stable relationship with the Customers Senior and middle management for technical and commercial decisions.', '70000', '80000', '5', 'CA or CS', '2018-04-17 17:50:34'),
(9, 5, 'Sales Executive', 'Frame Selection \r\nBe familiar with all of the optical frame ranges we carry and be able to explain the different features and benefits, as well as the brand values.', '30000', '40000', '3', 'Any Graduate', '2018-04-17 17:52:06'),
(10, 3, 'Sales Head', 'Data Infosys takes pride in its employees. These are the values that inspire us, as we help out our clients to accelerate software development programs.', '50000', '60000', 'Fresher', 'MBA', '2018-04-17 17:53:19'),
(11, 4, 'HR Executive', 'End to end recruitment \r\nManpower search through various modes of recruitment viz. job portals, references, head-hunting, mapping. \r\nScreening and scheduling candidates with stakeholders.', '70000', '80000', '5', 'MBA', '2018-04-17 17:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `stream` varchar(255) DEFAULT NULL,
  `passingyear` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `age` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--
INSERT INTO `users` (`id_user`, `firstname`, `lastname`, `email`, `password`, `address`, `city`, `state`, `contactno`, `qualification`, `stream`, `passingyear`, `dob`, `age`, `designation`, `resume`) VALUES
(1, 'Rahul', 'Panchal', 'rahulnpanchal50@gmail.com', 'YjdlNDhmMTk4NjFhNDNjNGM2MDdhOGFlZTBiY2M3Mjg=', 'Bhayandar(East)', 'Mumbai', 'Maharashtra', '8879096228', 'MCA', 'Computer Science', '2017-05-15', '1996-10-13', '21', 'Student', '5ad628c5407ce.docx'),
(2, 'Shubham', 'Upadhyay', 'shubhamupadhyay109@gmail.com', 'YjdlNDhmMTk4NjFhNDNjNGM2MDdhOGFlZTBiY2M3Mjg=', 'Nallasopara(West)', 'Mumbai', 'Maharashtra', '7021275658', 'MCA', 'Computer Science', '2017-06-13', '1996-05-15', '22', 'Student', '5ad62932b4b3d.docx'),
(3, 'Bhavin', 'Panchal', 'bhavin@gmail.com', 'YjdlNDhmMTk4NjFhNDNjNGM2MDdhOGFlZTBiY2M3Mjg=', 'Bhayandar(East)', 'Mumbai', 'Maharashtra', '8655225165', 'B.Com', 'Commerce', '2016-06-15', '1996-06-04', '22', 'Student', '5ad62aa058c3b.docx'),
(4, 'Rishab', 'Sharma', 'rishab@gmail.com', 'YjdlNDhmMTk4NjFhNDNjNGM2MDdhOGFlZTBiY2M3Mjg=', 'Bhayandar(East)', 'Mumbai', 'Maharashtra', '8097239484', 'B.Com', 'Commerce', '2017-07-12', '1996-07-24', '21', 'Student', '5ad62b16c53a1.docx'),
(5, 'Prince', 'Vishwakarma', 'prince@gmail.com', 'YjdlNDhmMTk4NjFhNDNjNGM2MDdhOGFlZTBiY2M3Mjg=', 'Bhayandar(East)', 'Mumbai', 'Maharashtra', '9702019404', 'BSc.IT', 'Science', '2017-06-06', '1996-02-05', '22', 'Student', '5ad62be094863.docx'),
(6, 'Jash', 'Kansara', 'jash@gmail.com', 'YjdlNDhmMTk4NjFhNDNjNGM2MDdhOGFlZTBiY2M3Mjg=', 'Borivali(West)', 'Mumbai', 'Maharashtra', '8845457412', 'BSc.IT', 'Science', '2017-05-30', '1996-12-13', '21', 'Student', '5ad62c9a45ad5.docx'),
(7, 'Nitin', 'Patel', 'nitin@gmail.com', 'YjdlNDhmMTk4NjFhNDNjNGM2MDdhOGFlZTBiY2M3Mjg=', 'Bhayandar(East)', 'Mumbai', 'Maharashtra', '9702818665', 'BSc.IT', 'Science', '2017-02-10', '1996-08-23', '21', 'Student', '5ad62d070a91d.docx');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
