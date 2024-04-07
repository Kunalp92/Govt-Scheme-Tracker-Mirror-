-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql113.byetcluster.com
-- Generation Time: Apr 07, 2024 at 03:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atc`
--

-- --------------------------------------------------------

--
-- Table structure for table `gondia_scheme_table`
--

CREATE TABLE `gondia_scheme_table` (
  `schemeName` varchar(500) NOT NULL,
  `greaterAge` varchar(100) NOT NULL,
  `greaterIncome` longtext DEFAULT NULL,
  `marriedStatus` varchar(500) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `work` varchar(500) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `category` varchar(500) NOT NULL,
  `id` int(255) NOT NULL,
  `lessAge` int(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `year` int(100) NOT NULL,
  `fund` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gondia_scheme_table`
--

INSERT INTO `gondia_scheme_table` (`schemeName`, `greaterAge`, `greaterIncome`, `marriedStatus`, `state`, `country`, `work`, `gender`, `category`, `id`, `lessAge`, `status`, `year`, `fund`) VALUES
('Vit Bhatti Yojna', '100', '50000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra ', 'India', 'Worker', 'Both (Male & Female)', 'OBC', 1, 21, 'Active', 2024, '850000'),
('Kutir va Laghu Udyog Yojana', '100', '50000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra ', 'India', 'Worker', 'Both (Male & Female)', 'SC', 2, 18, 'Active', 2024, '1700000'),
('Tadpatri Anudan Yojana', '100', '50000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra ', 'India', 'Farmer', 'Both (Male & Female)', 'OBC', 4, 21, 'Active', 2024, '1700000'),
('Sinchan Yojana', '100', '50000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra', 'India', 'Farmer', 'Both (Male & Female)', 'OBC', 5, 21, 'Active', 2024, '850000'),
('E-Rickshaw va Malvahan Yojana', '100', '20000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra', 'India', 'Worker', 'Both (Male & Female)', 'OBC', 7, 21, 'Active', 2024, '510000'),
('Bambu Lagwad Yojana', '100', '20000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra', 'India', 'Farmer', 'Both (Male & Female)', 'OBC', 8, 21, 'Inactive', 2023, '425000'),
('E-Rickshaw va Malvahan Yojana', '100', '20000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra', 'India', 'Worker', 'Both (Male & Female)', 'OBC', 10, 21, 'Inactive', 2023, '510000'),
('Vit Bhatti Yojna', '100', '50000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra ', 'India', 'Worker', 'Both (Male & Female)', 'OBC', 11, 21, 'Inactive', 2020, '850000'),
('Tadpatri Anudan Yojana', '100', '50000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra ', 'India', 'Farmer', 'Both (Male & Female)', 'OBC', 13, 21, 'Inactive', 2021, '1700000'),
('Bambu Lagwad Yojana', '100', '20000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra', 'India', 'Farmer', 'Both (Male & Female)', 'OBC', 14, 21, 'Inactive', 2021, '425000'),
('Bambu Lagwad Yojana', '100', '20000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra', 'India', 'Farmer', 'Both (Male & Female)', 'OBC', 15, 21, 'Inactive', 2022, '425000');

-- --------------------------------------------------------

--
-- Table structure for table `gondia_user_table`
--

CREATE TABLE `gondia_user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `village` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `income` mediumtext NOT NULL,
  `religion` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `married` varchar(20) NOT NULL,
  `work` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `receivedSchemes` int(100) NOT NULL,
  `schemesName` longtext NOT NULL,
  `schemeAmount` longtext NOT NULL,
  `schemesName1` longtext NOT NULL,
  `schemeAmount1` longtext NOT NULL,
  `schemesName2` longtext NOT NULL,
  `schemeAmount2` longtext NOT NULL,
  `election` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gondia_user_table`
--

INSERT INTO `gondia_user_table` (`id`, `name`, `age`, `category`, `mobile`, `aadhar`, `village`, `state`, `country`, `income`, `religion`, `gender`, `married`, `work`, `dob`, `receivedSchemes`, `schemesName`, `schemeAmount`, `schemesName1`, `schemeAmount1`, `schemesName2`, `schemeAmount2`, `election`) VALUES
(1, 'Arjun Patel', 20, 'Open', '9876543210', '123456486058', 'Panjra', 'Maharashtra', 'India', '50,000', 'Hindu', 'Male', 'Single', 'Farmer', '1994-05-15', 2, 'E-Rickshaw va Malvahan Yojana', '50000', 'Tadpatri Anudan Yojana', '10000', '', '', 'GHI4804180'),
(2, 'Priya Sharma', 32, 'OBC', '8765432109', '234567312422', 'Mahadula', 'Maharashtra', 'India', '45,000', 'Hindu', 'Female', 'Married', 'Worker', '1989-08-22', 1, 'Vit Bhatti Yojna', '10000', '', '', '', '', 'HIJ3847504'),
(3, 'Rajesh Kumar', 30, 'SC', '7654321098', '345678103935', 'Khairi', 'Maharashtra', 'India', '55,000', 'Hindu', 'Male', 'Single', 'Worker', '1992-03-10', 2, 'Vit Bhatti Yojna', '20000', 'Kutir va Laghu Udyog Yojana', '10000', '', '', 'CDE2670211'),
(4, 'Sneha Verma', 25, 'ST', '9876123450', '456789582410', 'Waregaon', 'Maharashtra', 'India', '40,000', 'Hindu', 'Female', 'Single', 'Worker', '1997-12-05', 2, 'E-Rickshaw va Malvahan Yojana', '60000', 'Tadpatri Anudan Yojana', '12000', '', '', 'CDE6106474'),
(5, 'Amit Singh', 15, 'General', '8765987654', '567890600245', 'Mhasala', 'Maharashtra', 'India', '0', 'Sikh', 'Male', 'Single', 'Student', '2007-09-18', 0, '', '', '', '', '', '', ''),
(6, 'Shreya Gupta', 19, 'General', '7654678901', '678901253997', 'Bidbina', 'Maharashtra', 'India', '35,000', 'Hindu', 'Female', 'Single', 'Job', '2004-02-28', 1, 'Vit Bhatti Yojna', '25000', '', '', '', '', 'PQR2873106'),
(7, 'Rahul Kumar', 32, 'OBC', '9876543210', '789012469250', 'Koradi', 'Maharashtra', 'India', '42,000', 'Hindu', 'Male', 'Married', 'Worker', '1989-11-07', 2, 'E-Rickshaw va Malvahan Yojana', '45000', 'Vit Bhatti Yojna', '18000', '', '', 'STU6668895'),
(8, 'Neha Sharma', 30, 'SC', '8765432109', '890123584263', 'Kawtha', 'Maharashtra', 'India', '30,000', 'Hindu', 'Female', 'Single', 'Worker', '1992-06-15', 1, 'E-Rickshaw va Malvahan Yojana', '30000', '', '', '', '', 'FGH8510698'),
(9, 'Vikram Singh', 25, 'ST', '7654321098', '901234513563', 'Khasala', 'Maharashtra', 'India', '48,000', 'Christian', 'Male', 'Single', 'Worker', '1997-04-22', 2, 'Kutir va Laghu Udyog Yojana', '15000', 'Vit Bhatti Yojna', '22000', '', '', 'UVW6150266'),
(10, 'Anita Verma', 30, 'Open', '9876123450', '123456815027', 'Beena', 'Maharashtra', 'India', '38,000', 'Hindu', 'Female', 'Married', 'Farmer', '1992-10-12', 1, 'E-Rickshaw va Malvahan Yojana', '40000', '', '', '', '', 'TUV9195438'),
(11, 'Alok Yadav', 28, 'OBC', '8765987654', '234567534448', 'Suradevi', 'Maharashtra', 'India', '48,000', 'Hindu', 'Male', 'Single', 'Worker', '1994-09-05', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'IJK9360936'),
(12, 'Suman Kumari', 30, 'ST', '7654678901', '345678227159', 'Khasala', 'Maharashtra', 'India', '30,000', 'Hindu', 'Female', 'Single', 'Worker', '1992-12-18', 3, 'E-Rickshaw va Malvahan Yojana', '75000', 'Vit Bhatti Yojna', '30000', 'Sinchan Yojana', '12000', 'RST5098845'),
(13, 'Rahul Gupta', 15, 'Open', '9876543210', '456789532453', 'Bidbina', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2008-06-01', 0, '', '', '', '', '', '', ''),
(14, 'Kiran Devi', 28, 'SC', '8765432109', '567890980787', 'Beena', 'Maharashtra', 'India', '40,000', 'Sikh', 'Female', 'Single', 'Farmer', '1994-02-12', 1, 'Vit Bhatti Yojna', '18000', '', '', '', '', 'QRS4073559'),
(15, 'Amit Sharma', 32, 'ST', '7654321098', '678901306582', 'Panjra', 'Maharashtra', 'India', '42,000', 'Hindu', 'Male', 'Married', 'Worker', '1989-11-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'DEF3730872'),
(16, 'Anjali Singh', 25, 'OBC', '9876123450', '789012590546', 'Koradi', 'Maharashtra', 'India', '35,000', 'Hindu', 'Female', 'Single', 'Job', '1997-08-03', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'NOP4224541'),
(17, 'Rajeev Kumar', 32, 'Open', '8765987654', '890123032988', 'Beena', 'Maharashtra', 'India', '60,000', 'Christian', 'Male', 'Married', 'Worker', '1989-03-30', 1, 'E-Rickshaw va Malvahan Yojana', '32000', '', '', '', '', 'PQR6688436'),
(18, 'Shivani Verma', 30, 'SC', '7654678901', '901234393302', 'Khairi', 'Maharashtra', 'India', '38,000', 'Hindu', 'Female', 'Married', 'Farmer', '1992-10-15', 3, 'E-Rickshaw va Malvahan Yojana', '11000', 'Tadpatri Anudan Yojana', '20000', 'Sochalay Anudan Yojana', '35000', 'PQR9059425'),
(19, 'Vikas Yadav', 28, 'OBC', '9876543210', '123456867545', 'Mahadula', 'Maharashtra', 'India', '48,000', 'Hindu', 'Male', 'Single', 'Worker', '1994-09-05', 1, 'Vit Bhatti Yojna', '18000', '', '', '', '', 'UVW1933153'),
(20, 'Pooja Sharma', 18, 'Open', '7654678901', '345678157823', 'Koradi', 'Maharashtra', 'India', '30,000', 'Hindu', 'Female', 'Single', 'Worker', '2005-12-18', 1, 'Vit Bhatti Yojna', '22000', '', '', '', '', 'QRS5195092'),
(21, 'Sonali Patel', 28, 'SC', '8765432109', '567890186480', 'Bhilgaon', 'Maharashtra', 'India', '42,000', 'Hindu', 'Female', 'Married', 'Worker', '1994-02-12', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'TUV1308385'),
(23, 'Kavita Sharma', 25, 'OBC', '8765987654', '890123735219', 'Koradi', 'Maharashtra', 'India', '60,000', 'Christian', 'Female', 'Single', 'Job', '1997-08-03', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'STU2190843'),
(24, 'Amit Kumar', 32, 'ST', '9876543210', '123456299302', 'Waregaon', 'Maharashtra', 'India', '48,000', 'Hindu', 'Male', 'Single', 'Worker', '1989-03-30', 1, 'E-Rickshaw va Malvahan Yojana', '32000', '', '', '', '', 'XYZ8694619'),
(26, 'Rajesh Verma', 18, 'SC', '8765432109', '567890556364', 'Khairi', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2005-02-12', 0, '', '', '', '', '', '', ''),
(27, 'Neha Gupta', 25, 'OBC', '9876123450', '789012909260', 'Suradevi', 'Maharashtra', 'India', '45,000', 'Hindu', 'Female', 'Married', 'Worker', '1997-08-03', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'KLM2244677'),
(28, 'Ankit Yadav', 32, 'ST', '8765987654', '890123877208', 'Mahadula', 'Maharashtra', 'India', '48,000', 'Hindu', 'Male', 'Single', 'Job', '1989-03-30', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'YZ9801659'),
(29, 'Divya Sharma', 30, 'Open', '7654678901', '345678658264', 'Waregaon', 'Maharashtra', 'India', '30,000', 'Hindu', 'Female', 'Single', 'Worker', '1992-12-18', 1, 'Vit Bhatti Yojna', '22000', '', '', '', '', 'CDE6029443'),
(30, 'Vikram Singh', 28, 'SC', '8765432109', '567890659695', 'Khairi', 'Maharashtra', 'India', '42,000', 'Hindu', 'Male', 'Married', 'Worker', '1994-02-12', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'RST6344498'),
(31, 'Arun Sharma', 16, 'OBC', '8765987654', '890123323686', 'Beena', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2008-07-22', 0, '', '', '', '', '', '', ''),
(32, 'Sneha Patel', 29, 'ST', '9876543210', '123456639345', 'Beena', 'Maharashtra', 'India', '50,000', 'Hindu', 'Female', 'Married', 'Worker', '1993-04-15', 1, 'Vit Bhatti Yojna', '25000', '', '', '', '', 'VWX2228707'),
(33, 'Rahul Verma', 32, 'Open', '7654678901', '345678225669', 'Koradi', 'Maharashtra', 'India', '60,000', 'Hindu', 'Male', 'Single', 'Worker', '1989-11-30', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'QRS5821095'),
(34, 'Pooja Singh', 27, 'SC', '8765432109', '567890210308', 'Kawtha', 'Maharashtra', 'India', '38,000', 'Hindu', 'Female', 'Married', 'Worker', '1995-09-08', 2, 'Vit Bhatti Yojna', '20000', 'Sinchan Yojana', '35000', '', '', 'YZ5424407'),
(35, 'Rohit Yadav', 11, 'OBC', '9876123450', '789012374537', 'Waregaon', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2010-02-18', 0, '', '', '', '', '', '', ''),
(36, 'Aarti Sharma', 28, 'ST', '8765987654', '890123241759', 'Panjra', 'Maharashtra', 'India', '48,000', 'Christian', 'Female', 'Single', 'Job', '1994-06-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'UVW5531926'),
(37, 'Raj Gupta', 29, 'Open', '9876543210', '123456085186', 'Mahadula', 'Maharashtra', 'India', '55,000', 'Hindu', 'Male', 'Married', 'Worker', '1993-10-12', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'KLM3857926'),
(38, 'Meera Yadav', 26, 'SC', '7654678901', '345678700653', 'Mhasala', 'Maharashtra', 'India', '38,000', 'Hindu', 'Female', 'Married', 'Worker', '1996-12-25', 1, 'Vit Bhatti Yojna', '25000', '', '', '', '', 'STU3513263'),
(39, 'Amit Verma', 30, 'OBC', '8765432109', '567890247709', 'Suradevi', 'Maharashtra', 'India', '42,000', 'Hindu', 'Male', 'Single', 'Job', '1992-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'QRS2030680'),
(40, 'Nisha Patel', 27, 'ST', '9876123450', '789012136585', 'Kawtha', 'Maharashtra', 'India', '50,000', 'Hindu', 'Female', 'Married', 'Worker', '1995-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'BCD6963562'),
(41, 'Ramesh Kumar', 28, 'Open', '8765987654', '890123939800', 'Waregaon', 'Maharashtra', 'India', '40,000', 'Hindu', 'Male', 'Single', 'Worker', '1994-08-22', 2, 'Vit Bhatti Yojna', '18000', 'Sinchan Yojana', '28000', '', '', 'HIJ4031568'),
(42, 'Priya Singh', 15, 'SC', '9876543210', '123456289249', 'Koradi', 'Maharashtra', 'India', '0', 'Hindu', 'Female', 'Single', 'Student', '2008-02-15', 0, '', '', '', '', '', '', ''),
(43, 'Rajesh Patel', 19, 'OBC', '7654678901', '345678626844', 'Bidbina', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2005-11-30', 0, '', '', '', '', '', '', ''),
(44, 'Anita Verma', 30, 'ST', '8765432109', '567890266477', 'Beena', 'Maharashtra', 'India', '45,000', 'Christian', 'Female', 'Married', 'Worker', '1992-09-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'JKL3164608'),
(45, 'Rajat Yadav', 29, 'Open', '9876123450', '789012451849', 'Bidbina', 'Maharashtra', 'India', '48,000', 'Hindu', 'Male', 'Single', 'Job', '1993-04-18', 1, 'Vit Bhatti Yojna', '25000', '', '', '', '', 'MNO5041883'),
(46, 'Sarika Sharma', 26, 'ST', '8765987654', '890123459817', 'Bidbina', 'Maharashtra', 'India', '42,000', 'Hindu', 'Female', 'Single', 'Worker', '1996-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'BCD7314319'),
(47, 'Ankit Gupta', 31, 'Open', '9876543210', '123456943539', 'Panjra', 'Maharashtra', 'India', '55,000', 'Hindu', 'Male', 'Married', 'Worker', '1990-07-12', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'NOP3595110'),
(48, 'Neeta Yadav', 27, 'SC', '7654678901', '345678338245', 'Beena', 'Maharashtra', 'India', '38,000', 'Hindu', 'Female', 'Married', 'Worker', '1994-12-25', 1, 'Vit Bhatti Yojna', '25000', '', '', '', '', 'GHI2478236'),
(49, 'Alok Verma', 29, 'OBC', '8765432109', '567890860609', 'Khasala', 'Maharashtra', 'India', '42,000', 'Hindu', 'Male', 'Single', 'Job', '1992-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'LMN4730505'),
(50, 'Nidhi Patel', 28, 'ST', '9876123450', '789012288313', 'Koradi', 'Maharashtra', 'India', '50,000', 'Hindu', 'Female', 'Married', 'Worker', '1993-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'ABC7575466'),
(51, 'Amit Kumar', 26, 'SC', '8765987654', '890123859738', 'Waregaon', 'Maharashtra', 'India', '38,000', 'Sikh', 'Male', 'Single', 'Worker', '1995-09-12', 2, 'Kutir va Laghu Udyog Yojana', '12000', 'Vit Bhatti Yojna', '25000', '', '', 'RST1359321'),
(52, 'Pooja Sharma', 30, 'OBC', '9876543210', '123456433755', 'Mahadula', 'Maharashtra', 'India', '42,000', 'Hindu', 'Female', 'Married', 'Worker', '1991-05-20', 1, 'Vit Bhatti Yojna', '18000', '', '', '', '', 'QRS7647918'),
(53, 'Rahul Patel', 28, 'Open', '7654678901', '345678589561', 'Mhasala', 'Maharashtra', 'India', '55,000', 'Hindu', 'Male', 'Single', 'Worker', '1993-08-18', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'XYZ3076561'),
(54, 'Meera Devi', 29, 'ST', '8765432109', '567890646540', 'Panjra', 'Maharashtra', 'India', '45,000', 'Hindu', 'Female', 'Single', 'Worker', '1992-03-15', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'UVW9623405'),
(55, 'Vikas Yadav', 12, 'Open', '9876123450', '789012464020', 'Panjra', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2010-11-30', 0, '', '', '', '', '', '', ''),
(56, 'Shikha Sharma', 27, 'SC', '8765987654', '890123380479', 'Kawtha', 'Maharashtra', 'India', '42,000', 'Hindu', 'Female', 'Single', 'Worker', '1996-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'DEF1346823'),
(57, 'Rajesh Gupta', 31, 'Open', '9876543210', '123456510335', 'Kawtha', 'Maharashtra', 'India', '55,000', 'Hindu', 'Male', 'Married', 'Worker', '1990-07-12', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'GHI9188744'),
(58, 'Preeti Yadav', 29, 'SC', '7654678901', '345678410240', 'Kawtha', 'Maharashtra', 'India', '38,000', 'Hindu', 'Female', 'Married', 'Worker', '1994-12-25', 1, 'Vit Bhatti Yojna', '25000', '', '', '', '', 'UVW2464732'),
(59, 'Amit Verma', 29, 'OBC', '8765432109', '567890520197', 'Beena', 'Maharashtra', 'India', '42,000', 'Hindu', 'Male', 'Single', 'Job', '1992-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'VWX4131221'),
(60, 'Anjali Patel', 28, 'ST', '9876123450', '789012370265', 'Kawtha', 'Maharashtra', 'India', '50,000', 'Hindu', 'Female', 'Married', 'Worker', '1993-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'OPQ6310612'),
(61, 'Manish Singh', 30, 'Open', '8765987654', '890123290734', 'Beena', 'Maharashtra', 'India', '48,000', 'Hindu', 'Male', 'Single', 'Worker', '1991-09-12', 2, 'Kutir va Laghu Udyog Yojana', '12000', 'Vit Bhatti Yojna', '25000', '', '', 'LMN2720642'),
(62, 'Neha Kumari', 28, 'OBC', '9876543210', '123456342876', 'Koradi', 'Maharashtra', 'India', '38,000', 'Hindu', 'Female', 'Married', 'Worker', '1993-05-20', 0, '', '', '', '', '', '', 'BCD4896704'),
(63, 'Ravi Sharma', 25, 'ST', '7654678901', '345678842177', 'Mhasala', 'Maharashtra', 'India', '35,000', 'Hindu', 'Male', 'Single', 'Worker', '1996-08-18', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'GHI8551596'),
(64, 'Aarti Yadav', 32, 'Open', '9876123450', '789012182261', 'Beena', 'Maharashtra', 'India', '60,000', 'Hindu', 'Female', 'Married', 'Worker', '1989-03-15', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'MNO8409996'),
(65, 'Sunil Kumar', 29, 'SC', '8765432109', '567890384775', 'Mahadula', 'Maharashtra', 'India', '42,000', 'Sikh', 'Male', 'Single', 'Worker', '1992-11-30', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'TUV2825565'),
(66, 'Riya Singh', 27, 'OBC', '8765987654', '890123377090', 'Kawtha', 'Maharashtra', 'India', '38,000', 'Hindu', 'Female', 'Single', 'Job', '1994-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'DEF7995784'),
(67, 'Alok Kumar', 11, 'Open', '9876543210', '123456731129', 'Beena', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2010-07-12', 0, '', '', '', '', '', '', ''),
(68, 'Sneha Verma', 28, 'ST', '7654678901', '345678524374', 'Bidbina', 'Maharashtra', 'India', '45,000', 'Hindu', 'Female', 'Married', 'Worker', '1993-12-25', 0, '', '', '', '', '', '', 'KLM1344531'),
(69, 'Rahul Yadav', 29, 'Open', '8765432109', '567890428487', 'Khairi', 'Maharashtra', 'India', '42,000', 'Hindu', 'Male', 'Single', 'Worker', '1992-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'LMN7137709'),
(70, 'Divya Patel', 26, 'SC', '9876123450', '789012569311', 'Panjra', 'Maharashtra', 'India', '50,000', 'Hindu', 'Female', 'Married', 'Worker', '1995-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'HIJ3515695'),
(71, 'Amit Kumar', 30, 'OBC', '8765987654', '890123561094', 'Bhilgaon', 'Maharashtra', 'India', '48,000', 'Hindu', 'Male', 'Single', 'Worker', '1991-09-12', 2, 'Kutir va Laghu Udyog Yojana', '12000', 'Vit Bhatti Yojna', '25000', '', '', 'WXY2558826'),
(72, 'Anjali Singh', 28, 'SC', '9876543210', '123456097541', 'Koradi', 'Maharashtra', 'India', '38,000', 'Hindu', 'Female', 'Married', 'Farmer', '1993-05-20', 0, '', '', '', '', '', '', 'STU6976444'),
(73, 'Raj Sharma', 25, 'ST', '7654678901', '345678804422', 'Suradevi', 'Maharashtra', 'India', '35,000', 'Hindu', 'Male', 'Single', 'Farmer', '1996-08-18', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'KLM9523016'),
(74, 'Nisha Yadav', 32, 'Open', '9876123450', '789012729491', 'Khasala', 'Maharashtra', 'India', '60,000', 'Hindu', 'Female', 'Married', 'Worker', '1989-03-15', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'NOP8149313'),
(75, 'Rahul Kumar', 29, 'SC', '8765432109', '567890234191', 'Suradevi', 'Maharashtra', 'India', '42,000', 'Sikh', 'Male', 'Single', 'Worker', '1992-11-30', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'MNO9129818'),
(76, 'Kavita Singh', 27, 'OBC', '8765987654', '890123982481', 'Beena', 'Maharashtra', 'India', '38,000', 'Hindu', 'Female', 'Single', 'Job', '1994-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'DEF1227365'),
(77, 'Ravi Kumar', 11, 'Open', '9876543210', '123456209834', 'Khairi', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2010-07-12', 0, '', '', '', '', '', '', ''),
(78, 'Simran Verma', 28, 'ST', '7654678901', '345678101725', 'Koradi', 'Maharashtra', 'India', '45,000', 'Hindu', 'Female', 'Married', 'Worker', '1993-12-25', 0, '', '', '', '', '', '', 'GHI2004289'),
(79, 'Rajesh Yadav', 29, 'Open', '8765432109', '567890879123', 'Koradi', 'Maharashtra', 'India', '42,000', 'Hindu', 'Male', 'Single', 'Worker', '1992-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'GHI6608866'),
(80, 'Priya Patel', 26, 'SC', '9876123450', '789012090443', 'Khairi', 'Maharashtra', 'India', '50,000', 'Hindu', 'Female', 'Married', 'Worker', '1995-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'OPQ7529861'),
(81, 'Suresh Sharma', 34, 'Open', '8765987654', '890123814844', 'Bhilgaon', 'Maharashtra', 'India', '65,000', 'Hindu', 'Male', 'Married', 'Manager', '1987-09-12', 2, 'Kutir va Laghu Udyog Yojana', '12000', 'Vit Bhatti Yojna', '25000', '', '', 'DEF3587564'),
(82, 'Ajay Verma', 26, 'OBC', '7654678901', '345678569954', 'Khasala', 'Maharashtra', 'India', '40,000', 'Hindu', 'Male', 'Single', 'Worker', '1995-08-18', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'YZ5216628'),
(83, 'Vikas Kumar', 27, 'Open', '8765432109', '567890495535', 'Beena', 'Maharashtra', 'India', '45,000', 'Sikh', 'Male', 'Single', 'Worker', '1994-03-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'IJK8710841'),
(84, 'Anita Sharma', 30, 'ST', '8765987654', '890123154438', 'Waregaon', 'Maharashtra', 'India', '38,000', 'Hindu', 'Female', 'Single', 'Worker', '1991-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'LMN5456283'),
(85, 'Rajat Verma', 13, 'Open', '9876543210', '123456285584', 'Mahadula', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2009-07-12', 0, '', '', '', '', '', '', ''),
(86, 'Shikha Singh', 28, 'ST', '7654678901', '345678964609', 'Mhasala', 'Maharashtra', 'India', '50,000', 'Hindu', 'Female', 'Married', 'Worker', '1993-12-25', 0, '', '', '', '', '', '', 'IJK1058080'),
(87, 'Rajiv Yadav', 29, 'Open', '8765432109', '567890966294', 'Koradi', 'Maharashtra', 'India', '55,000', 'Hindu', 'Male', 'Single', 'Worker', '1992-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'NOP2657118'),
(88, 'Nandini Patel', 26, 'SC', '9876123450', '789012937647', 'Kawtha', 'Maharashtra', 'India', '48,000', 'Hindu', 'Female', 'Married', 'Worker', '1995-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'UVW9625273'),
(89, 'Alok Singh', 31, 'OBC', '8765987654', '890123789353', 'Panjra', 'Maharashtra', 'India', '42,000', 'Hindu', 'Male', 'Married', 'Worker', '1990-09-12', 2, 'Kutir va Laghu Udyog Yojana', '12000', 'Vit Bhatti Yojna', '25000', '', '', 'DEF4373958'),
(90, 'Nisha Gupta', 28, 'ST', '9876543210', '123456133825', 'Koradi', 'Maharashtra', 'India', '38,000', 'Hindu', 'Female', 'Single', 'Job', '1993-05-20', 0, '', '', '', '', '', '', 'TUV4442467'),
(91, 'Ravi Kumar', 25, 'SC', '7654678901', '345678301066', 'Beena', 'Maharashtra', 'India', '35,000', 'Hindu', 'Male', 'Single', 'Worker', '1996-08-18', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'Z5041266'),
(92, 'Kirti Yadav', 33, 'Open', '9876123450', '789012103858', 'Koradi', 'Maharashtra', 'India', '55,000', 'Hindu', 'Female', 'Single', 'Worker', '1988-11-30', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'QRS5801847'),
(93, 'Rahul Sharma', 29, 'OBC', '8765432109', '567890616089', 'Bhilgaon', 'Maharashtra', 'India', '48,000', 'Hindu', 'Male', 'Single', 'Worker', '1992-03-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'BCD4863712'),
(94, 'Anjali Verma', 32, 'SC', '8765987654', '890123768872', 'Waregaon', 'Maharashtra', 'India', '42,000', 'Hindu', 'Female', 'Single', 'Worker', '1989-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'HIJ1939130'),
(95, 'Amit Patel', 15, 'Open', '9876543210', '123456996097', 'Bidbina', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2008-07-12', 0, '', '', '', '', '', '', ''),
(96, 'Preeti Singh', 28, 'ST', '7654678901', '345678673871', 'Mhasala', 'Maharashtra', 'India', '38,000', 'Hindu', 'Female', 'Married', 'Worker', '1993-12-25', 0, '', '', '', '', '', '', 'IJK6562608'),
(97, 'Vishal Yadav', 30, 'Open', '8765432109', '567890381065', 'Mhasala', 'Maharashtra', 'India', '45,000', 'Hindu', 'Male', 'Single', 'Worker', '1991-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'HIJ5491129'),
(98, 'Neeta Patel', 27, 'SC', '9876123450', '789012883709', 'Bidbina', 'Maharashtra', 'India', '40,000', 'Hindu', 'Female', 'Married', 'Worker', '1994-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'VWX5267982'),
(99, 'Sunita Sharma', 26, 'OBC', '8765987654', '890123275357', 'Mahadula', 'Maharashtra', 'India', '36,000', 'Hindu', 'Female', 'Single', 'Worker', '1995-09-12', 2, 'Kutir va Laghu Udyog Yojana', '12000', 'Vit Bhatti Yojna', '25000', '', '', 'DEF6714969'),
(100, 'Rajat Verma', 14, 'ST', '9876543210', '123456725654', 'Suradevi', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2007-05-20', 0, '', '', '', '', '', '', ''),
(101, 'Priya Yadav', 31, 'SC', '7654678901', '345678802203', 'Koradi', 'Maharashtra', 'India', '42,000', 'Hindu', 'Female', 'Single', 'Worker', '1990-08-18', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'VWX5542061'),
(102, 'Amit Kumar', 29, 'Open', '9876123450', '789012834054', 'Mahadula', 'Maharashtra', 'India', '35,000', 'Hindu', 'Male', 'Single', 'Job', '1992-11-30', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'HIJ7179705'),
(103, 'Pooja Sharma', 27, 'OBC', '8765432109', '567890763661', 'Mhasala', 'Maharashtra', 'India', '40,000', 'Hindu', 'Female', 'Married', 'Worker', '1994-03-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'TUV6535861'),
(104, 'Rahul Verma', 33, 'ST', '8765987654', '890123316146', 'Mhasala', 'Maharashtra', 'India', '45,000', 'Hindu', 'Male', 'Single', 'Worker', '1989-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'Z9564023'),
(105, 'Anita Singh', 35, 'Open', '9876543210', '123456289747', 'Bhilgaon', 'Maharashtra', 'India', '55,000', 'Hindu', 'Female', 'Single', 'Worker', '1986-07-12', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'VWX2893698'),
(106, 'Rajesh Kumar', 28, 'SC', '7654678901', '345678500295', 'Mahadula', 'Maharashtra', 'India', '38,000', 'Hindu', 'Male', 'Married', 'Worker', '1993-12-25', 1, 'Vit Bhatti Yojna', '25000', '', '', '', '', 'YZ8904063'),
(107, 'Sonia Yadav', 30, 'Open', '8765432109', '567890632237', 'Waregaon', 'Maharashtra', 'India', '45,000', 'Hindu', 'Female', 'Single', 'Worker', '1991-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'PQR3133928'),
(108, 'Sanjay Patel', 26, 'SC', '9876123450', '789012660301', 'Bhilgaon', 'Maharashtra', 'India', '36,000', 'Hindu', 'Male', 'Married', 'Worker', '1995-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'UVW9408073'),
(109, 'Sunita Sharma', 26, 'OBC', '8765987654', '890123404794', 'Mhasala', 'Maharashtra', 'India', '36,000', 'Hindu', 'Female', 'Single', 'Worker', '1995-09-12', 2, 'Kutir va Laghu Udyog Yojana', '12000', 'Vit Bhatti Yojna', '25000', '', '', 'JKL5480411'),
(110, 'Rajat Verma', 14, 'ST', '9876543210', '123456043068', 'Waregaon', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2007-05-20', 0, '', '', '', '', '', '', 'DEF5740123'),
(111, 'Priya Yadav', 31, 'SC', '7654678901', '345678000959', 'Bidbina', 'Maharashtra', 'India', '42,000', 'Hindu', 'Female', 'Single', 'Worker', '1990-08-18', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'LMN4129982'),
(112, 'Amit Kumar', 29, 'Open', '9876123450', '789012875590', 'Kawtha', 'Maharashtra', 'India', '35,000', 'Hindu', 'Male', 'Single', 'Job', '1992-11-30', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'UVW6808551'),
(113, 'Pooja Sharma', 27, 'OBC', '8765432109', '567890375077', 'Panjra', 'Maharashtra', 'India', '40,000', 'Hindu', 'Female', 'Married', 'Worker', '1994-03-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'BCD2192645'),
(114, 'Rahul Verma', 33, 'ST', '8765987654', '890123248613', 'Mhasala', 'Maharashtra', 'India', '45,000', 'Hindu', 'Male', 'Single', 'Worker', '1989-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'YZ3833054'),
(115, 'Anita Singh', 35, 'Open', '9876543210', '123456117836', 'Bhilgaon', 'Maharashtra', 'India', '55,000', 'Hindu', 'Female', 'Single', 'Worker', '1986-07-12', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'JKL7548994'),
(116, 'Rajesh Kumar', 15, 'SC', '7654678901', '345678843340', 'Koradi', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2008-12-25', 0, '', '', '', '', '', '', 'QRS9981158'),
(117, 'Sonia Yadav', 30, 'Open', '8765432109', '567890863196', 'Koradi', 'Maharashtra', 'India', '45,000', 'Hindu', 'Female', 'Single', 'Worker', '1991-03-08', 0, '', '', '', '', '', '', 'ABC1701056'),
(118, 'Sanjay Patel', 26, 'SC', '9876123450', '789012785962', 'Khasala', 'Maharashtra', 'India', '36,000', 'Hindu', 'Male', 'Married', 'Worker', '1995-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'TUV2489645'),
(119, 'Shreya Sharma', 28, 'OBC', '8765987654', '890123340222', 'Panjra', 'Maharashtra', 'India', '42,000', 'Hindu', 'Female', 'Single', 'Worker', '1993-09-12', 0, '', '', '', '', '', '', 'Z1993768'),
(120, 'Vivek Yadav', 12, 'ST', '9876543210', '123456343226', 'Kawtha', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2009-05-20', 0, '', '', '', '', '', '', ''),
(121, 'Preeti Verma', 29, 'Open', '7654678901', '345678695463', 'Khairi', 'Maharashtra', 'India', '38,000', 'Hindu', 'Female', 'Single', 'Job', '1992-11-30', 1, 'Vit Bhatti Yojna', '15000', '', '', '', '', 'QRS6077047'),
(122, 'Alok Kumar', 35, 'SC', '8765432109', '567890447640', 'Koradi', 'Maharashtra', 'India', '55,000', 'Hindu', 'Male', 'Married', 'Worker', '1986-03-15', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'CDE6190823'),
(123, 'Ritu Sharma', 33, 'OBC', '9876123450', '789012151813', 'Koradi', 'Maharashtra', 'India', '48,000', 'Hindu', 'Female', 'Single', 'Worker', '1989-12-25', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'VWX2932211'),
(124, 'Aryan Verma', 30, 'Open', '8765987654', '890123416145', 'Khairi', 'Maharashtra', 'India', '42,000', 'Hindu', 'Male', 'Single', 'Worker', '1991-07-12', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'Z9994618'),
(125, 'Seema Patel', 28, 'SC', '7654678901', '345678625287', 'Mhasala', 'Maharashtra', 'India', '36,000', 'Hindu', 'Female', 'Married', 'Worker', '1993-04-15', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'BCD3507856'),
(126, 'Rohit Kumar', 32, 'Open', '8765432109', '567890878000', 'Koradi', 'Maharashtra', 'India', '45,000', 'Hindu', 'Male', 'Single', 'Worker', '1989-09-12', 0, '', '', '', '', '', '', 'OPQ6697698'),
(127, 'Shweta Yadav', 26, 'ST', '9876123450', '789012514142', 'Waregaon', 'Maharashtra', 'India', '40,000', 'Hindu', 'Female', 'Married', 'Worker', '1995-11-30', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'STU5685560'),
(128, 'Alok Sharma', 10, 'OBC', '8765987654', '890123936709', 'Koradi', 'Maharashtra', 'India', '0', 'Hindu', 'Male', 'Single', 'Student', '2011-03-15', 0, '', '', '', '', '', '', ''),
(129, 'Anju Verma', 29, 'Open', '9876543210', '123456141125', 'Bidbina', 'Maharashtra', 'India', '48,000', 'Hindu', 'Female', 'Single', 'Worker', '1992-12-25', 2, 'Kutir va Laghu Udyog Yojana', '10000', 'Vit Bhatti Yojna', '20000', '', '', 'UVW6011140'),
(130, 'Vikas Yadav', 32, 'SC', '7654678901', '345678895495', 'Bidbina', 'Maharashtra', 'India', '35,000', 'Hindu', 'Male', 'Married', 'Worker', '1989-07-12', 1, 'Vit Bhatti Yojna', '15000', '', '', '', '', 'QRS4494273'),
(131, 'Deepika Sharma', 31, 'OBC', '8765432109', '567890054103', 'Panjra', 'Maharashtra', 'India', '40,000', 'Hindu', 'Female', 'Single', 'Job', '1990-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'HIJ1290938'),
(132, 'Sumit Kumar', 35, 'Open', '9876123450', '789012584029', 'Khasala', 'Maharashtra', 'India', '55,000', 'Hindu', 'Male', 'Single', 'Worker', '1986-09-12', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'TUV4079361'),
(133, 'Nisha Patel', 19, 'SC', '8765987654', '890123757837', 'Khairi', 'Maharashtra', 'India', '0', 'Hindu', 'Female', 'Single', 'Student', '2010-12-25', 0, '', '', '', '', '', '', 'TUV5889434'),
(134, 'Rajeev Verma', 30, 'Open', '9876543210', '123456037103', 'Khasala', 'Maharashtra', 'India', '45,000', 'Hindu', 'Male', 'Single', 'Worker', '1991-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'RST5185003'),
(137, 'Deepa Singh', 29, 'ST', '9876543210', '123456802897', 'Mahadula', 'Maharashtra', 'India', '48,000', 'Hindu', 'Female', 'Married', 'Worker', '1992-05-20', 0, '', '', '', '', '', '', 'LMN3949847'),
(138, 'Priyanka Yadav', 32, 'SC', '9876123450', '789012441079', 'Koradi', 'Maharashtra', 'India', '55,000', 'Hindu', 'Female', 'Single', 'Job', '1989-11-30', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'VWX5561078'),
(139, 'Kavita Sharma', 29, 'Open', '9876123450', '789012507452', 'Kawtha', 'Maharashtra', 'India', '48,000', 'Hindu', 'Female', 'Single', 'Worker', '1992-12-25', 2, 'Kutir va Laghu Udyog Yojana', '10000', 'Vit Bhatti Yojna', '20000', '', '', 'IJK2937360');

-- --------------------------------------------------------

--
-- Table structure for table `govt_scheme_table`
--

CREATE TABLE `govt_scheme_table` (
  `schemeName` varchar(500) NOT NULL,
  `greaterAge` varchar(100) NOT NULL,
  `greaterIncome` longtext DEFAULT NULL,
  `marriedStatus` varchar(500) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `work` varchar(500) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `category` varchar(500) NOT NULL,
  `id` int(255) NOT NULL,
  `lessAge` int(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `year` int(100) NOT NULL,
  `fund` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `govt_scheme_table`
--

INSERT INTO `govt_scheme_table` (`schemeName`, `greaterAge`, `greaterIncome`, `marriedStatus`, `state`, `country`, `work`, `gender`, `category`, `id`, `lessAge`, `status`, `year`, `fund`) VALUES
('Vit Bhatti Yojna', '100', '50000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra ', 'India', 'Worker', 'Both (Male & Female)', 'OBC', 1, 21, 'Active', 2024, '850000'),
('Kutir va Laghu Udyog Yojana', '100', '50000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra ', 'India', 'Worker', 'Both (Male & Female)', 'SC', 2, 18, 'Active', 2024, '1700000'),
('Tadpatri Anudan Yojana', '100', '50000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra ', 'India', 'Farmer', 'Both (Male & Female)', 'OBC', 4, 21, 'Active', 2024, '1700000'),
('Sinchan Yojana', '100', '50000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra', 'India', 'Farmer', 'Both (Male & Female)', 'OBC', 5, 21, 'Active', 2024, '850000'),
('E-Rickshaw va Malvahan Yojana', '100', '20000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra', 'India', 'Worker', 'Both (Male & Female)', 'OBC', 7, 21, 'Active', 2024, '510000'),
('Bambu Lagwad Yojana', '100', '20000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra', 'India', 'Farmer', 'Both (Male & Female)', 'OBC', 8, 21, 'Inactive', 2023, '425000'),
('Saikal Purvatha Yojana', '20', '0', 'Single', 'Maharashtra', 'India', 'Students', 'Both (Male & Female)', 'OBC', 9, 10, 'Inactive', 2023, '150000'),
('E-Rickshaw va Malvahan Yojana', '100', '20000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra', 'India', 'Worker', 'Both (Male & Female)', 'OBC', 10, 21, 'Inactive', 2023, '510000'),
('Vit Bhatti Yojna', '100', '50000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra ', 'India', 'Worker', 'Both (Male & Female)', 'OBC', 11, 21, 'Inactive', 2020, '850000'),
('Saikal Purvatha Yojana', '18', '0', 'Single', 'Maharashtra', 'India', 'Students', 'Both (Male & Female)', 'OBC', 12, 10, 'Active', 2023, '150000'),
('Tadpatri Anudan Yojana', '100', '50000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra ', 'India', 'Farmer', 'Both (Male & Female)', 'OBC', 13, 21, 'Inactive', 2021, '1700000'),
('Bambu Lagwad Yojana', '100', '20000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra', 'India', 'Farmer', 'Both (Male & Female)', 'OBC', 14, 21, 'Inactive', 2021, '425000'),
('Bambu Lagwad Yojana', '100', '20000', 'Both (Married, Single, Divorced & Widowed)', 'Maharashtra', 'India', 'Farmer', 'Both (Male & Female)', 'OBC', 15, 21, 'Inactive', 2022, '425000');

-- --------------------------------------------------------

--
-- Table structure for table `gymdata`
--

CREATE TABLE `gymdata` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `user_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gymdata`
--

INSERT INTO `gymdata` (`id`, `username`, `password`, `created_at`, `user_type`) VALUES
(1, 'Bhandara', 'Bhandara@123', '2024-02-11 13:02:44', 'bhandara_atc'),
(2, 'ATCNagpur', 'ATCNagpur@123', '2024-02-11 13:02:44', 'atc_nagpur'),
(5, 'Gondia', 'Gondia@123', '2024-02-11 19:11:41', 'gondia_atc'),
(6, 'Nagpur', 'Nagpur@123', '2024-02-11 19:11:41', 'nagpur_atc'),
(9, 'Wardha', 'Wardha@123', '2024-02-11 19:11:41', 'wardha_atc'),
(10, 'Chandrapur', 'Chandrapur@123', '2024-02-11 13:02:44', 'chandrapur_atc'),
(11, 'Gadchiroli', 'Gadchiroli@123', '2024-02-11 13:02:44', 'gadchiroli_atc');

-- --------------------------------------------------------

--
-- Table structure for table `nagpur_user_table`
--

CREATE TABLE `nagpur_user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `village` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `income` mediumtext NOT NULL,
  `gender` varchar(10) NOT NULL,
  `married` varchar(20) NOT NULL,
  `work` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `receivedSchemes` int(100) NOT NULL,
  `schemesName` longtext NOT NULL,
  `schemeAmount` longtext NOT NULL,
  `schemesName1` longtext NOT NULL,
  `schemeAmount1` longtext NOT NULL,
  `schemesName2` longtext NOT NULL,
  `schemeAmount2` longtext NOT NULL,
  `election` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nagpur_user_table`
--

INSERT INTO `nagpur_user_table` (`id`, `name`, `age`, `category`, `mobile`, `aadhar`, `village`, `state`, `country`, `income`, `gender`, `married`, `work`, `dob`, `receivedSchemes`, `schemesName`, `schemeAmount`, `schemesName1`, `schemeAmount1`, `schemesName2`, `schemeAmount2`, `election`) VALUES
(1, 'Arjun Patel', 20, 'NT-B', '9876543210', '123456486058', 'Panjra', 'Maharashtra', 'India', '50,000', 'Male', 'Single', 'Farmer', '1994-05-15', 2, 'E-Rickshaw va Malvahan Yojana', '50000', 'Tadpatri Anudan Yojana', '10000', '', '', 'GHI4804180'),
(2, 'Priya Sharma', 32, 'VJ', '8765432109', '234567312422', 'Mahadula', 'Maharashtra', 'India', '45,000', 'Female', 'Married', 'Worker', '1989-08-22', 1, 'Vit Bhatti Yojna', '10000', '', '', '', '', 'HIJ3847504'),
(3, 'Rajesh Kumar', 30, 'SC', '7654321098', '345678103935', 'Khairi', 'Maharashtra', 'India', '55,000', 'Male', 'Single', 'Worker', '1992-03-10', 2, 'Vit Bhatti Yojna', '20000', 'Kutir va Laghu Udyog Yojana', '10000', '', '', 'CDE2670211'),
(4, 'Sneha Verma', 25, 'ST', '9876123450', '456789582410', 'Waregaon', 'Maharashtra', 'India', '40,000', 'Female', 'Single', 'Worker', '1997-12-05', 2, 'E-Rickshaw va Malvahan Yojana', '60000', 'Tadpatri Anudan Yojana', '12000', '', '', 'CDE6106474'),
(5, 'Amit Singh', 15, 'General', '8765987654', '567890600245', 'Mhasala', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2007-09-18', 0, '', '', '', '', '', '', ''),
(6, 'Shreya Gupta', 19, 'General', '7654678901', '678901253997', 'Bidbina', 'Maharashtra', 'India', '35,000', 'Female', 'Single', 'Job', '2004-02-28', 1, 'Vit Bhatti Yojna', '25000', '', '', '', '', 'PQR2873106'),
(7, 'Rahul Kumar', 32, 'VJ', '9876543210', '789012469250', 'Koradi', 'Maharashtra', 'India', '42,000', 'Male', 'Married', 'Worker', '1989-11-07', 2, 'E-Rickshaw va Malvahan Yojana', '45000', 'Vit Bhatti Yojna', '18000', '', '', 'STU6668895'),
(8, 'Neha Sharma', 30, 'SC', '8765432109', '890123584263', 'Kawtha', 'Maharashtra', 'India', '30,000', 'Female', 'Single', 'Worker', '1992-06-15', 1, 'E-Rickshaw va Malvahan Yojana', '30000', '', '', '', '', 'FGH8510698'),
(9, 'Vikram Singh', 25, 'ST', '7654321098', '901234513563', 'Khasala', 'Maharashtra', 'India', '48,000', 'Male', 'Single', 'Worker', '1997-04-22', 2, 'Kutir va Laghu Udyog Yojana', '15000', 'Vit Bhatti Yojna', '22000', '', '', 'UVW6150266'),
(10, 'Anita Verma', 30, 'NT-B', '9876123450', '123456815027', 'Beena', 'Maharashtra', 'India', '38,000', 'Female', 'Married', 'Farmer', '1992-10-12', 1, 'E-Rickshaw va Malvahan Yojana', '40000', '', '', '', '', 'TUV9195438'),
(11, 'Alok Yadav', 28, 'VJ', '8765987654', '234567534448', 'Suradevi', 'Maharashtra', 'India', '48,000', 'Male', 'Single', 'Worker', '1994-09-05', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'IJK9360936'),
(12, 'Suman Kumari', 30, 'ST', '7654678901', '345678227159', 'Khasala', 'Maharashtra', 'India', '30,000', 'Female', 'Single', 'Worker', '1992-12-18', 3, 'E-Rickshaw va Malvahan Yojana', '75000', 'Vit Bhatti Yojna', '30000', 'Sinchan Yojana', '12000', 'RST5098845'),
(13, 'Rahul Gupta', 15, 'NT-B', '9876543210', '456789532453', 'Bidbina', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2008-06-01', 0, '', '', '', '', '', '', ''),
(14, 'Kiran Devi', 28, 'SC', '8765432109', '567890980787', 'Beena', 'Maharashtra', 'India', '40,000', 'Female', 'Single', 'Farmer', '1994-02-12', 1, 'Vit Bhatti Yojna', '18000', '', '', '', '', 'QRS4073559'),
(15, 'Amit Sharma', 32, 'ST', '7654321098', '678901306582', 'Panjra', 'Maharashtra', 'India', '42,000', 'Male', 'Married', 'Worker', '1989-11-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'DEF3730872'),
(16, 'Anjali Singh', 25, 'VJ', '9876123450', '789012590546', 'Koradi', 'Maharashtra', 'India', '35,000', 'Female', 'Single', 'Job', '1997-08-03', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'NOP4224541'),
(17, 'Rajeev Kumar', 32, 'NT-B', '8765987654', '890123032988', 'Beena', 'Maharashtra', 'India', '60,000', 'Male', 'Married', 'Worker', '1989-03-30', 1, 'E-Rickshaw va Malvahan Yojana', '32000', '', '', '', '', 'PQR6688436'),
(18, 'Shivani Verma', 30, 'SC', '7654678901', '901234393302', 'Khairi', 'Maharashtra', 'India', '38,000', 'Female', 'Married', 'Farmer', '1992-10-15', 3, 'E-Rickshaw va Malvahan Yojana', '11000', 'Tadpatri Anudan Yojana', '20000', 'Sochalay Anudan Yojana', '35000', 'PQR9059425'),
(19, 'Vikas Yadav', 28, 'VJ', '9876543210', '123456867545', 'Mahadula', 'Maharashtra', 'India', '48,000', 'Male', 'Single', 'Worker', '1994-09-05', 1, 'Vit Bhatti Yojna', '18000', '', '', '', '', 'UVW1933153'),
(20, 'Pooja Sharma', 18, 'NT-B', '7654678901', '345678157823', 'Koradi', 'Maharashtra', 'India', '30,000', 'Female', 'Single', 'Worker', '2005-12-18', 1, 'Vit Bhatti Yojna', '22000', '', '', '', '', 'QRS5195092'),
(21, 'Sonali Patel', 28, 'SC', '8765432109', '567890186480', 'Bhilgaon', 'Maharashtra', 'India', '42,000', 'Female', 'Married', 'Worker', '1994-02-12', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'TUV1308385'),
(22, 'Arjun Singh', 32, 'NT-B', '9876123450', '789012458932', 'Bidbina', 'Maharashtra', 'India', '45,000', 'Male', 'Married', 'Worker', '1989-11-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'LMN8103489'),
(23, 'Kavita Sharma', 25, 'VJ', '8765987654', '890123735219', 'Koradi', 'Maharashtra', 'India', '60,000', 'Female', 'Single', 'Job', '1997-08-03', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'STU2190843'),
(24, 'Amit Kumar', 32, 'ST', '9876543210', '123456299302', 'Waregaon', 'Maharashtra', 'India', '48,000', 'Male', 'Single', 'Worker', '1989-03-30', 1, 'E-Rickshaw va Malvahan Yojana', '32000', '', '', '', '', 'XYZ8694619'),
(25, 'Riya Singh', 30, 'NT-B', '7654678901', '345678290854', 'Mhasala', 'Maharashtra', 'India', '30,000', 'Female', 'Single', 'Worker', '1992-12-18', 3, 'E-Rickshaw va Malvahan Yojana', '75000', 'Vit Bhatti Yojna', '30000', 'Sinchan Yojana', '12000', 'QRS5480183'),
(26, 'Rajesh Verma', 18, 'SC', '8765432109', '567890556364', 'Khairi', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2005-02-12', 0, '', '', '', '', '', '', ''),
(27, 'Neha Gupta', 25, 'VJ', '9876123450', '789012909260', 'Suradevi', 'Maharashtra', 'India', '45,000', 'Female', 'Married', 'Worker', '1997-08-03', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'KLM2244677'),
(28, 'Ankit Yadav', 32, 'ST', '8765987654', '890123877208', 'Mahadula', 'Maharashtra', 'India', '48,000', 'Male', 'Single', 'Job', '1989-03-30', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'YZ9801659'),
(29, 'Divya Sharma', 30, 'NT-B', '7654678901', '345678658264', 'Waregaon', 'Maharashtra', 'India', '30,000', 'Female', 'Single', 'Worker', '1992-12-18', 1, 'Vit Bhatti Yojna', '22000', '', '', '', '', 'CDE6029443'),
(30, 'Vikram Singh', 28, 'SC', '8765432109', '567890659695', 'Khairi', 'Maharashtra', 'India', '42,000', 'Male', 'Married', 'Worker', '1994-02-12', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'RST6344498'),
(31, 'Arun Sharma', 16, 'VJ', '8765987654', '890123323686', 'Beena', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2008-07-22', 0, '', '', '', '', '', '', ''),
(32, 'Sneha Patel', 29, 'ST', '9876543210', '123456639345', 'Beena', 'Maharashtra', 'India', '50,000', 'Female', 'Married', 'Worker', '1993-04-15', 1, 'Vit Bhatti Yojna', '25000', '', '', '', '', 'VWX2228707'),
(33, 'Rahul Verma', 32, 'NT-B', '7654678901', '345678225669', 'Koradi', 'Maharashtra', 'India', '60,000', 'Male', 'Single', 'Worker', '1989-11-30', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'QRS5821095'),
(34, 'Pooja Singh', 27, 'SC', '8765432109', '567890210308', 'Kawtha', 'Maharashtra', 'India', '38,000', 'Female', 'Married', 'Worker', '1995-09-08', 2, 'Vit Bhatti Yojna', '20000', 'Sinchan Yojana', '35000', '', '', 'YZ5424407'),
(35, 'Rohit Yadav', 11, 'VJ', '9876123450', '789012374537', 'Waregaon', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2010-02-18', 0, '', '', '', '', '', '', ''),
(36, 'Aarti Sharma', 28, 'ST', '8765987654', '890123241759', 'Panjra', 'Maharashtra', 'India', '48,000', 'Female', 'Single', 'Job', '1994-06-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'UVW5531926'),
(37, 'Raj Gupta', 29, 'NT-B', '9876543210', '123456085186', 'Mahadula', 'Maharashtra', 'India', '55,000', 'Male', 'Married', 'Worker', '1993-10-12', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'KLM3857926'),
(38, 'Meera Yadav', 26, 'SC', '7654678901', '345678700653', 'Mhasala', 'Maharashtra', 'India', '38,000', 'Female', 'Married', 'Worker', '1996-12-25', 1, 'Vit Bhatti Yojna', '25000', '', '', '', '', 'STU3513263'),
(39, 'Amit Verma', 30, 'VJ', '8765432109', '567890247709', 'Suradevi', 'Maharashtra', 'India', '42,000', 'Male', 'Single', 'Job', '1992-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'QRS2030680'),
(40, 'Nisha Patel', 27, 'ST', '9876123450', '789012136585', 'Kawtha', 'Maharashtra', 'India', '50,000', 'Female', 'Married', 'Worker', '1995-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'BCD6963562'),
(41, 'Ramesh Kumar', 28, 'NT-B', '8765987654', '890123939800', 'Waregaon', 'Maharashtra', 'India', '40,000', 'Male', 'Single', 'Worker', '1994-08-22', 2, 'Vit Bhatti Yojna', '18000', 'Sinchan Yojana', '28000', '', '', 'HIJ4031568'),
(42, 'Priya Singh', 15, 'SC', '9876543210', '123456289249', 'Koradi', 'Maharashtra', 'India', '0', 'Female', 'Single', 'Student', '2008-02-15', 0, '', '', '', '', '', '', ''),
(43, 'Rajesh Patel', 19, 'VJ', '7654678901', '345678626844', 'Bidbina', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2005-11-30', 0, '', '', '', '', '', '', ''),
(44, 'Anita Verma', 30, 'ST', '8765432109', '567890266477', 'Beena', 'Maharashtra', 'India', '45,000', 'Female', 'Married', 'Worker', '1992-09-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'JKL3164608'),
(45, 'Rajat Yadav', 29, 'NT-B', '9876123450', '789012451849', 'Bidbina', 'Maharashtra', 'India', '48,000', 'Male', 'Single', 'Job', '1993-04-18', 1, 'Vit Bhatti Yojna', '25000', '', '', '', '', 'MNO5041883'),
(46, 'Sarika Sharma', 26, 'ST', '8765987654', '890123459817', 'Bidbina', 'Maharashtra', 'India', '42,000', 'Female', 'Single', 'Worker', '1996-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'BCD7314319'),
(47, 'Ankit Gupta', 31, 'NT-B', '9876543210', '123456943539', 'Panjra', 'Maharashtra', 'India', '55,000', 'Male', 'Married', 'Worker', '1990-07-12', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'NOP3595110'),
(48, 'Neeta Yadav', 27, 'SC', '7654678901', '345678338245', 'Beena', 'Maharashtra', 'India', '38,000', 'Female', 'Married', 'Worker', '1994-12-25', 1, 'Vit Bhatti Yojna', '25000', '', '', '', '', 'GHI2478236'),
(49, 'Alok Verma', 29, 'VJ', '8765432109', '567890860609', 'Khasala', 'Maharashtra', 'India', '42,000', 'Male', 'Single', 'Job', '1992-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'LMN4730505'),
(50, 'Nidhi Patel', 28, 'ST', '9876123450', '789012288313', 'Koradi', 'Maharashtra', 'India', '50,000', 'Female', 'Married', 'Worker', '1993-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'ABC7575466'),
(51, 'Amit Kumar', 26, 'SC', '8765987654', '890123859738', 'Waregaon', 'Maharashtra', 'India', '38,000', 'Male', 'Single', 'Worker', '1995-09-12', 2, 'Kutir va Laghu Udyog Yojana', '12000', 'Vit Bhatti Yojna', '25000', '', '', 'RST1359321'),
(52, 'Pooja Sharma', 30, 'VJ', '9876543210', '123456433755', 'Mahadula', 'Maharashtra', 'India', '42,000', 'Female', 'Married', 'Worker', '1991-05-20', 1, 'Vit Bhatti Yojna', '18000', '', '', '', '', 'QRS7647918'),
(53, 'Rahul Patel', 28, 'NT-B', '7654678901', '345678589561', 'Mhasala', 'Maharashtra', 'India', '55,000', 'Male', 'Single', 'Worker', '1993-08-18', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'XYZ3076561'),
(54, 'Meera Devi', 29, 'ST', '8765432109', '567890646540', 'Panjra', 'Maharashtra', 'India', '45,000', 'Female', 'Single', 'Worker', '1992-03-15', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'UVW9623405'),
(55, 'Vikas Yadav', 12, 'NT-B', '9876123450', '789012464020', 'Panjra', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2010-11-30', 0, '', '', '', '', '', '', ''),
(56, 'Shikha Sharma', 27, 'SC', '8765987654', '890123380479', 'Kawtha', 'Maharashtra', 'India', '42,000', 'Female', 'Single', 'Worker', '1996-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'DEF1346823'),
(57, 'Rajesh Gupta', 31, 'NT-B', '9876543210', '123456510335', 'Kawtha', 'Maharashtra', 'India', '55,000', 'Male', 'Married', 'Worker', '1990-07-12', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'GHI9188744'),
(58, 'Preeti Yadav', 29, 'SC', '7654678901', '345678410240', 'Kawtha', 'Maharashtra', 'India', '38,000', 'Female', 'Married', 'Worker', '1994-12-25', 1, 'Vit Bhatti Yojna', '25000', '', '', '', '', 'UVW2464732'),
(59, 'Amit Verma', 29, 'VJ', '8765432109', '567890520197', 'Beena', 'Maharashtra', 'India', '42,000', 'Male', 'Single', 'Job', '1992-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'VWX4131221'),
(60, 'Anjali Patel', 28, 'ST', '9876123450', '789012370265', 'Kawtha', 'Maharashtra', 'India', '50,000', 'Female', 'Married', 'Worker', '1993-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'OPQ6310612'),
(61, 'Manish Singh', 30, 'NT-B', '8765987654', '890123290734', 'Beena', 'Maharashtra', 'India', '48,000', 'Male', 'Single', 'Worker', '1991-09-12', 2, 'Kutir va Laghu Udyog Yojana', '12000', 'Vit Bhatti Yojna', '25000', '', '', 'LMN2720642'),
(62, 'Neha Kumari', 28, 'VJ', '9876543210', '123456342876', 'Koradi', 'Maharashtra', 'India', '38,000', 'Female', 'Married', 'Worker', '1993-05-20', 0, '', '', '', '', '', '', 'BCD4896704'),
(63, 'Ravi Sharma', 25, 'ST', '7654678901', '345678842177', 'Mhasala', 'Maharashtra', 'India', '35,000', 'Male', 'Single', 'Worker', '1996-08-18', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'GHI8551596'),
(64, 'Aarti Yadav', 32, 'NT-B', '9876123450', '789012182261', 'Beena', 'Maharashtra', 'India', '60,000', 'Female', 'Married', 'Worker', '1989-03-15', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'MNO8409996'),
(65, 'Sunil Kumar', 29, 'SC', '8765432109', '567890384775', 'Mahadula', 'Maharashtra', 'India', '42,000', 'Male', 'Single', 'Worker', '1992-11-30', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'TUV2825565'),
(66, 'Riya Singh', 27, 'VJ', '8765987654', '890123377090', 'Kawtha', 'Maharashtra', 'India', '38,000', 'Female', 'Single', 'Job', '1994-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'DEF7995784'),
(67, 'Alok Kumar', 11, 'NT-B', '9876543210', '123456731129', 'Beena', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2010-07-12', 0, '', '', '', '', '', '', ''),
(68, 'Sneha Verma', 28, 'ST', '7654678901', '345678524374', 'Bidbina', 'Maharashtra', 'India', '45,000', 'Female', 'Married', 'Worker', '1993-12-25', 0, '', '', '', '', '', '', 'KLM1344531'),
(69, 'Rahul Yadav', 29, 'NT-B', '8765432109', '567890428487', 'Khairi', 'Maharashtra', 'India', '42,000', 'Male', 'Single', 'Worker', '1992-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'LMN7137709'),
(70, 'Divya Patel', 26, 'SC', '9876123450', '789012569311', 'Panjra', 'Maharashtra', 'India', '50,000', 'Female', 'Married', 'Worker', '1995-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'HIJ3515695'),
(71, 'Amit Kumar', 30, 'VJ', '8765987654', '890123561094', 'Bhilgaon', 'Maharashtra', 'India', '48,000', 'Male', 'Single', 'Worker', '1991-09-12', 2, 'Kutir va Laghu Udyog Yojana', '12000', 'Vit Bhatti Yojna', '25000', '', '', 'WXY2558826'),
(72, 'Anjali Singh', 28, 'SC', '9876543210', '123456097541', 'Koradi', 'Maharashtra', 'India', '38,000', 'Female', 'Married', 'Farmer', '1993-05-20', 0, '', '', '', '', '', '', 'STU6976444'),
(73, 'Raj Sharma', 25, 'ST', '7654678901', '345678804422', 'Suradevi', 'Maharashtra', 'India', '35,000', 'Male', 'Single', 'Farmer', '1996-08-18', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'KLM9523016'),
(74, 'Nisha Yadav', 32, 'NT-B', '9876123450', '789012729491', 'Khasala', 'Maharashtra', 'India', '60,000', 'Female', 'Married', 'Worker', '1989-03-15', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'NOP8149313'),
(75, 'Rahul Kumar', 29, 'SC', '8765432109', '567890234191', 'Suradevi', 'Maharashtra', 'India', '42,000', 'Male', 'Single', 'Worker', '1992-11-30', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'MNO9129818'),
(76, 'Kavita Singh', 27, 'VJ', '8765987654', '890123982481', 'Beena', 'Maharashtra', 'India', '38,000', 'Female', 'Single', 'Job', '1994-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'DEF1227365'),
(77, 'Ravi Kumar', 11, 'NT-B', '9876543210', '123456209834', 'Khairi', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2010-07-12', 0, '', '', '', '', '', '', ''),
(78, 'Simran Verma', 28, 'ST', '7654678901', '345678101725', 'Koradi', 'Maharashtra', 'India', '45,000', 'Female', 'Married', 'Worker', '1993-12-25', 0, '', '', '', '', '', '', 'GHI2004289'),
(79, 'Rajesh Yadav', 29, 'NT-B', '8765432109', '567890879123', 'Koradi', 'Maharashtra', 'India', '42,000', 'Male', 'Single', 'Worker', '1992-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'GHI6608866'),
(80, 'Priya Patel', 26, 'SC', '9876123450', '789012090443', 'Khairi', 'Maharashtra', 'India', '50,000', 'Female', 'Married', 'Worker', '1995-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'OPQ7529861'),
(81, 'Suresh Sharma', 34, 'NT-B', '8765987654', '890123814844', 'Bhilgaon', 'Maharashtra', 'India', '65,000', 'Male', 'Married', 'Manager', '1987-09-12', 2, 'Kutir va Laghu Udyog Yojana', '12000', 'Vit Bhatti Yojna', '25000', '', '', 'DEF3587564'),
(82, 'Ajay Verma', 26, 'VJ', '7654678901', '345678569954', 'Khasala', 'Maharashtra', 'India', '40,000', 'Male', 'Single', 'Worker', '1995-08-18', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'YZ5216628'),
(83, 'Vikas Kumar', 27, 'NT-B', '8765432109', '567890495535', 'Beena', 'Maharashtra', 'India', '45,000', 'Male', 'Single', 'Worker', '1994-03-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'IJK8710841'),
(84, 'Anita Sharma', 30, 'ST', '8765987654', '890123154438', 'Waregaon', 'Maharashtra', 'India', '38,000', 'Female', 'Single', 'Worker', '1991-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'LMN5456283'),
(85, 'Rajat Verma', 13, 'NT-B', '9876543210', '123456285584', 'Mahadula', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2009-07-12', 0, '', '', '', '', '', '', ''),
(86, 'Shikha Singh', 28, 'ST', '7654678901', '345678964609', 'Mhasala', 'Maharashtra', 'India', '50,000', 'Female', 'Married', 'Worker', '1993-12-25', 0, '', '', '', '', '', '', 'IJK1058080'),
(87, 'Rajiv Yadav', 29, 'NT-B', '8765432109', '567890966294', 'Koradi', 'Maharashtra', 'India', '55,000', 'Male', 'Single', 'Worker', '1992-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'NOP2657118'),
(88, 'Nandini Patel', 26, 'SC', '9876123450', '789012937647', 'Kawtha', 'Maharashtra', 'India', '48,000', 'Female', 'Married', 'Worker', '1995-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'UVW9625273'),
(89, 'Alok Singh', 31, 'VJ', '8765987654', '890123789353', 'Panjra', 'Maharashtra', 'India', '42,000', 'Male', 'Married', 'Worker', '1990-09-12', 2, 'Kutir va Laghu Udyog Yojana', '12000', 'Vit Bhatti Yojna', '25000', '', '', 'DEF4373958'),
(90, 'Nisha Gupta', 28, 'ST', '9876543210', '123456133825', 'Koradi', 'Maharashtra', 'India', '38,000', 'Female', 'Single', 'Job', '1993-05-20', 0, '', '', '', '', '', '', 'TUV4442467'),
(91, 'Ravi Kumar', 25, 'SC', '7654678901', '345678301066', 'Beena', 'Maharashtra', 'India', '35,000', 'Male', 'Single', 'Worker', '1996-08-18', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'Z5041266'),
(92, 'Kirti Yadav', 33, 'NT-B', '9876123450', '789012103858', 'Koradi', 'Maharashtra', 'India', '55,000', 'Female', 'Single', 'Worker', '1988-11-30', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'QRS5801847'),
(93, 'Rahul Sharma', 29, 'VJ', '8765432109', '567890616089', 'Bhilgaon', 'Maharashtra', 'India', '48,000', 'Male', 'Single', 'Worker', '1992-03-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'BCD4863712'),
(94, 'Anjali Verma', 32, 'SC', '8765987654', '890123768872', 'Waregaon', 'Maharashtra', 'India', '42,000', 'Female', 'Single', 'Worker', '1989-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'HIJ1939130'),
(95, 'Amit Patel', 15, 'NT-B', '9876543210', '123456996097', 'Bidbina', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2008-07-12', 0, '', '', '', '', '', '', ''),
(96, 'Preeti Singh', 28, 'ST', '7654678901', '345678673871', 'Mhasala', 'Maharashtra', 'India', '38,000', 'Female', 'Married', 'Worker', '1993-12-25', 0, '', '', '', '', '', '', 'IJK6562608'),
(97, 'Vishal Yadav', 30, 'NT-B', '8765432109', '567890381065', 'Mhasala', 'Maharashtra', 'India', '45,000', 'Male', 'Single', 'Worker', '1991-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'HIJ5491129'),
(98, 'Neeta Patel', 27, 'SC', '9876123450', '789012883709', 'Bidbina', 'Maharashtra', 'India', '40,000', 'Female', 'Married', 'Worker', '1994-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'VWX5267982'),
(99, 'Sunita Sharma', 26, 'VJ', '8765987654', '890123275357', 'Mahadula', 'Maharashtra', 'India', '36,000', 'Female', 'Single', 'Worker', '1995-09-12', 2, 'Kutir va Laghu Udyog Yojana', '12000', 'Vit Bhatti Yojna', '25000', '', '', 'DEF6714969'),
(100, 'Rajat Verma', 14, 'ST', '9876543210', '123456725654', 'Suradevi', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2007-05-20', 0, '', '', '', '', '', '', ''),
(101, 'Priya Yadav', 31, 'SC', '7654678901', '345678802203', 'Koradi', 'Maharashtra', 'India', '42,000', 'Female', 'Single', 'Worker', '1990-08-18', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'VWX5542061'),
(102, 'Amit Kumar', 29, 'NT-B', '9876123450', '789012834054', 'Mahadula', 'Maharashtra', 'India', '35,000', 'Male', 'Single', 'Job', '1992-11-30', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'HIJ7179705'),
(103, 'Pooja Sharma', 27, 'VJ', '8765432109', '567890763661', 'Mhasala', 'Maharashtra', 'India', '40,000', 'Female', 'Married', 'Worker', '1994-03-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'TUV6535861'),
(104, 'Rahul Verma', 33, 'ST', '8765987654', '890123316146', 'Mhasala', 'Maharashtra', 'India', '45,000', 'Male', 'Single', 'Worker', '1989-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'Z9564023'),
(105, 'Anita Singh', 35, 'NT-B', '9876543210', '123456289747', 'Bhilgaon', 'Maharashtra', 'India', '55,000', 'Female', 'Single', 'Worker', '1986-07-12', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'VWX2893698'),
(106, 'Rajesh Kumar', 28, 'SC', '7654678901', '345678500295', 'Mahadula', 'Maharashtra', 'India', '38,000', 'Male', 'Married', 'Worker', '1993-12-25', 1, 'Vit Bhatti Yojna', '25000', '', '', '', '', 'YZ8904063'),
(107, 'Sonia Yadav', 30, 'NT-B', '8765432109', '567890632237', 'Waregaon', 'Maharashtra', 'India', '45,000', 'Female', 'Single', 'Worker', '1991-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'PQR3133928'),
(108, 'Sanjay Patel', 26, 'SC', '9876123450', '789012660301', 'Bhilgaon', 'Maharashtra', 'India', '36,000', 'Male', 'Married', 'Worker', '1995-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'UVW9408073'),
(109, 'Sunita Sharma', 26, 'VJ', '8765987654', '890123404794', 'Mhasala', 'Maharashtra', 'India', '36,000', 'Female', 'Single', 'Worker', '1995-09-12', 2, 'Kutir va Laghu Udyog Yojana', '12000', 'Vit Bhatti Yojna', '25000', '', '', 'JKL5480411'),
(110, 'Rajat Verma', 14, 'ST', '9876543210', '123456043068', 'Waregaon', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2007-05-20', 0, '', '', '', '', '', '', 'DEF5740123'),
(111, 'Priya Yadav', 31, 'SC', '7654678901', '345678000959', 'Bidbina', 'Maharashtra', 'India', '42,000', 'Female', 'Single', 'Worker', '1990-08-18', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'LMN4129982'),
(112, 'Amit Kumar', 29, 'NT-B', '9876123450', '789012875590', 'Kawtha', 'Maharashtra', 'India', '35,000', 'Male', 'Single', 'Job', '1992-11-30', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'UVW6808551'),
(113, 'Pooja Sharma', 27, 'VJ', '8765432109', '567890375077', 'Panjra', 'Maharashtra', 'India', '40,000', 'Female', 'Married', 'Worker', '1994-03-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'BCD2192645'),
(114, 'Rahul Verma', 33, 'ST', '8765987654', '890123248613', 'Mhasala', 'Maharashtra', 'India', '45,000', 'Male', 'Single', 'Worker', '1989-02-20', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'YZ3833054'),
(115, 'Anita Singh', 35, 'NT-B', '9876543210', '123456117836', 'Bhilgaon', 'Maharashtra', 'India', '55,000', 'Female', 'Single', 'Worker', '1986-07-12', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'JKL7548994'),
(116, 'Rajesh Kumar', 15, 'SC', '7654678901', '345678843340', 'Koradi', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2008-12-25', 0, '', '', '', '', '', '', 'QRS9981158'),
(117, 'Sonia Yadav', 30, 'NT-B', '8765432109', '567890863196', 'Koradi', 'Maharashtra', 'India', '45,000', 'Female', 'Single', 'Worker', '1991-03-08', 0, '', '', '', '', '', '', 'ABC1701056'),
(118, 'Sanjay Patel', 26, 'SC', '9876123450', '789012785962', 'Khasala', 'Maharashtra', 'India', '36,000', 'Male', 'Married', 'Worker', '1995-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'TUV2489645'),
(119, 'Shreya Sharma', 28, 'VJ', '8765987654', '890123340222', 'Panjra', 'Maharashtra', 'India', '42,000', 'Female', 'Single', 'Worker', '1993-09-12', 0, '', '', '', '', '', '', 'Z1993768'),
(120, 'Vivek Yadav', 12, 'ST', '9876543210', '123456343226', 'Kawtha', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2009-05-20', 0, '', '', '', '', '', '', ''),
(121, 'Preeti Verma', 29, 'NT-B', '7654678901', '345678695463', 'Khairi', 'Maharashtra', 'India', '38,000', 'Female', 'Single', 'Job', '1992-11-30', 1, 'Vit Bhatti Yojna', '15000', '', '', '', '', 'QRS6077047'),
(122, 'Alok Kumar', 35, 'SC', '8765432109', '567890447640', 'Koradi', 'Maharashtra', 'India', '55,000', 'Male', 'Married', 'Worker', '1986-03-15', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'CDE6190823'),
(123, 'Ritu Sharma', 33, 'VJ', '9876123450', '789012151813', 'Koradi', 'Maharashtra', 'India', '48,000', 'Female', 'Single', 'Worker', '1989-12-25', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'VWX2932211'),
(124, 'Aryan Verma', 30, 'NT-B', '8765987654', '890123416145', 'Khairi', 'Maharashtra', 'India', '42,000', 'Male', 'Single', 'Worker', '1991-07-12', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'Z9994618'),
(125, 'Seema Patel', 28, 'SC', '7654678901', '345678625287', 'Mhasala', 'Maharashtra', 'India', '36,000', 'Female', 'Married', 'Worker', '1993-04-15', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'BCD3507856'),
(126, 'Rohit Kumar', 32, 'NT-B', '8765432109', '567890878000', 'Koradi', 'Maharashtra', 'India', '45,000', 'Male', 'Single', 'Worker', '1989-09-12', 0, '', '', '', '', '', '', 'OPQ6697698'),
(127, 'Shweta Yadav', 26, 'ST', '9876123450', '789012514142', 'Waregaon', 'Maharashtra', 'India', '40,000', 'Female', 'Married', 'Worker', '1995-11-30', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'STU5685560'),
(128, 'Alok Sharma', 10, 'VJ', '8765987654', '890123936709', 'Koradi', 'Maharashtra', 'India', '0', 'Male', 'Single', 'Student', '2011-03-15', 0, '', '', '', '', '', '', ''),
(129, 'Anju Verma', 29, 'NT-B', '9876543210', '123456141125', 'Bidbina', 'Maharashtra', 'India', '48,000', 'Female', 'Single', 'Worker', '1992-12-25', 2, 'Kutir va Laghu Udyog Yojana', '10000', 'Vit Bhatti Yojna', '20000', '', '', 'UVW6011140'),
(130, 'Vikas Yadav', 32, 'SC', '7654678901', '345678895495', 'Bidbina', 'Maharashtra', 'India', '35,000', 'Male', 'Married', 'Worker', '1989-07-12', 1, 'Vit Bhatti Yojna', '15000', '', '', '', '', 'QRS4494273'),
(131, 'Deepika Sharma', 31, 'VJ', '8765432109', '567890054103', 'Panjra', 'Maharashtra', 'India', '40,000', 'Female', 'Single', 'Job', '1990-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '60000', 'Vit Bhatti Yojna', '12000', 'Sinchan Yojana', '25000', 'HIJ1290938'),
(132, 'Sumit Kumar', 35, 'NT-B', '9876123450', '789012584029', 'Khasala', 'Maharashtra', 'India', '55,000', 'Male', 'Single', 'Worker', '1986-09-12', 2, 'Kutir va Laghu Udyog Yojana', '9000', 'Vit Bhatti Yojna', '22000', '', '', 'TUV4079361'),
(133, 'Nisha Patel', 19, 'SC', '8765987654', '890123757837', 'Khairi', 'Maharashtra', 'India', '0', 'Female', 'Single', 'Student', '2010-12-25', 0, '', '', '', '', '', '', 'TUV5889434'),
(134, 'Rajeev Verma', 30, 'NT-B', '9876543210', '123456037103', 'Khasala', 'Maharashtra', 'India', '45,000', 'Male', 'Single', 'Worker', '1991-03-08', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'RST5185003'),
(135, 'Meera Yadav', 26, 'ST', '7654678901', '345678911999', 'Koradi', 'Maharashtra', 'India', '36,000', 'Female', 'Married', 'Worker', '1995-04-15', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'QRS5510150'),
(136, 'Avinash Patel', 32, 'VJ', '8765432109', '567890448690', 'Khairi', 'Maharashtra', 'India', '42,000', 'Male', 'Single', 'Worker', '1989-11-30', 3, 'E-Rickshaw va Malvahan Yojana', '55000', 'Vit Bhatti Yojna', '25000', 'Sinchan Yojana', '13000', 'XYZ8027826'),
(137, 'Deepa Singh', 29, 'ST', '9876543210', '123456802897', 'Mahadula', 'Maharashtra', 'India', '48,000', 'Female', 'Married', 'Worker', '1992-05-20', 0, '', '', '', '', '', '', 'LMN3949847'),
(138, 'Priyanka Yadav', 32, 'SC', '9876123450', '789012441079', 'Koradi', 'Maharashtra', 'India', '55,000', 'Female', 'Single', 'Job', '1989-11-30', 2, 'Kutir va Laghu Udyog Yojana', '8000', 'Vit Bhatti Yojna', '16000', '', '', 'VWX5561078'),
(139, 'Kavita Sharma', 29, 'NT-B', '9876123450', '789012507452', 'Kawtha', 'Maharashtra', 'India', '48,000', 'Female', 'Single', 'Worker', '1992-12-25', 2, 'Kutir va Laghu Udyog Yojana', '10000', 'Vit Bhatti Yojna', '20000', '', '', 'IJK2937360');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gondia_scheme_table`
--
ALTER TABLE `gondia_scheme_table`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `gondia_user_table`
--
ALTER TABLE `gondia_user_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `govt_scheme_table`
--
ALTER TABLE `govt_scheme_table`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `gymdata`
--
ALTER TABLE `gymdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nagpur_user_table`
--
ALTER TABLE `nagpur_user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gondia_scheme_table`
--
ALTER TABLE `gondia_scheme_table`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gondia_user_table`
--
ALTER TABLE `gondia_user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=540;

--
-- AUTO_INCREMENT for table `govt_scheme_table`
--
ALTER TABLE `govt_scheme_table`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `gymdata`
--
ALTER TABLE `gymdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `nagpur_user_table`
--
ALTER TABLE `nagpur_user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=540;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
