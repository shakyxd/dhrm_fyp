-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2023 at 10:32 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointmentID` int(11) NOT NULL,
  `timeSlotID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `clinicID` int(11) NOT NULL,
  `staffID` int(11) NOT NULL,
  `treatmentID` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `firstNameStaff` varchar(100) DEFAULT NULL,
  `lastNameStaff` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `treatmentName` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `clinicID` int(11) NOT NULL,
  `emailClinic` varchar(100) NOT NULL,
  `passwordClinic` text NOT NULL,
  `nameClinic` varchar(100) NOT NULL,
  `phoneNum` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `specialisation` varchar(100) DEFAULT NULL,
  `rating` float NOT NULL DEFAULT 0,
  `deactivated` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`clinicID`, `emailClinic`, `passwordClinic`, `nameClinic`, `phoneNum`, `address`, `area`, `specialisation`, `rating`, `deactivated`) VALUES
(1, 'rafflesdental@hotmail.com', 'clinicPassword1', 'Raffles Dental Clinic', 95562244, '54 Raffles Boulevard, #06-11, S(48954)', 'East', 'General, Hygiene, Root Canal', 4.5, 0),
(2, 'tantoothcare@hotmail.com', 'clinicPassword2', 'Tan Tooth Care', 87654321, '44 Orchard Road, #02-04, S(782244)', 'Central', 'General, Hygiene, Tooth Removal', 5, 0),
(3, 'bedoklanedc@yahoo.com', 'clinicPassword3', 'Bedok Lane Dental Clinic', 86655412, 'Blk 78, Bedok Lane, #2-25, S(442278)', 'East', 'Teeth Cleaning, Crown and Bridges, Orthodontics(Braces)', 4, 0),
(4, 'yishunfamilydc@yahoo.com', 'clinicPassword3', 'Yishun Family Dental Clinic', 9866521, 'Blk 122, Bedok Lane, #01-55, S(201122)', 'North', 'General Checkup, Wisdom Tooth, Tooth Extraction', 3.5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patientID` int(11) NOT NULL,
  `emailPatient` varchar(100) NOT NULL,
  `passwordPatient` text NOT NULL,
  `mobileNum` int(11) NOT NULL,
  `firstName` varchar(100) DEFAULT NULL,
  `lastName` varchar(100) NOT NULL,
  `addressPatient` varchar(100) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `dateOfBirth` date NOT NULL,
  `nationality` varchar(100) DEFAULT NULL,
  `allergiesList` text DEFAULT NULL,
  `deactivated` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patientID`, `emailPatient`, `passwordPatient`, `mobileNum`, `firstName`, `lastName`, `addressPatient`, `gender`, `dateOfBirth`, `nationality`, `allergiesList`, `deactivated`) VALUES
(1, 'amandachan@hotmail.com', 'Password1', 11112222, 'Amanda', 'Chan', 'Blk 222 Boon Lay Avenue, S(101222)', 'F', '1995-02-24', 'Singaporean', 'Nuts, Ant Bite', 0),
(2, 'johnong@hotmail.com', 'Password2', 22223333, 'John', 'Ong', 'Blk 72 Serangoon North, S(550072)', 'M', '1990-11-04', 'Singaporean', 'Strawberry', 0),
(3, 'thomaslee@hotmail.com', 'Password3', 33334444, 'Thomas', 'Lee', 'Blk 25 Yishun Avenue, S(12425)', 'M', '1995-07-16', 'Malaysian', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `clinicID` int(11) NOT NULL,
  `emailStaff` varchar(100) NOT NULL,
  `phoneNumStaff` int(11) NOT NULL,
  `staffType` varchar(100) NOT NULL,
  `dateJoined` date NOT NULL,
  `dateLeft` date DEFAULT NULL,
  `salary` float NOT NULL,
  `firstNameStaff` varchar(100) DEFAULT NULL,
  `lastNameStaff` varchar(100) NOT NULL,
  `genderStaff` char(1) DEFAULT NULL,
  `dateOfBirthStaff` date NOT NULL,
  `deactivated` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `clinicID`, `emailStaff`, `phoneNumStaff`, `staffType`, `dateJoined`, `dateLeft`, `salary`, `firstNameStaff`, `lastNameStaff`, `genderStaff`, `dateOfBirthStaff`, `deactivated`) VALUES
(1, 2, 'sarahtan@hotmail.com', 88564223, 'Dentist', '2004-02-01', NULL, 60001, 'Sarah', 'Tan', 'F', '1982-02-21', 0),
(2, 2, 'mandeepsingh@gmail.com', 98561331, 'Dentist', '2010-10-01', NULL, 5200, 'Mandeep', 'Singh', 'M', '1989-04-01', 0),
(3, 2, 'chelstonlow@gmail.com', 85236542, 'Admin', '2001-08-14', NULL, 3400, 'Chelston', 'Low', 'M', '1990-10-27', 0),
(4, 1, 'mariahkong@gmail.com', 99886532, 'Admin', '2020-05-12', NULL, 3200, 'Mariah', 'Kong', 'F', '1995-03-02', 0),
(5, 1, 'francisbaker@hotmail.com', 98654412, 'Dentist', '2018-05-12', NULL, 4800, 'Francis', 'Baker', 'M', '1992-05-11', 0),
(6, 1, 'hendrickheng@hotmail.com', 85619193, 'Dentist', '2015-01-02', NULL, 5200, 'Hendrick', 'Heng', 'M', '1978-12-25', 0),
(7, 1, 'thierryhenry@hotmail.com', 88761315, 'Dentist', '2016-03-22', NULL, 5000, 'Thierry', 'Henry', 'M', '1980-03-17', 0),
(8, 4, 'jakeyip@gmail.com', 87331629, 'Admin', '2010-03-26', NULL, 3600, 'Jake', 'Yip', 'M', '1965-01-28', 0),
(9, 4, 'samanthawee@hotmail.com', 9916712, 'Dentist', '2019-02-03', NULL, 5500, 'Samantha', 'Wee', 'F', '1988-05-22', 0),
(10, 4, 'jamesong@hotmail.com', 89895132, 'Dentist', '2019-01-25', NULL, 6200, 'James', 'Ong', 'M', '1969-08-08', 0),
(11, 3, 'lisapo@gmail.com', 91123466, 'Admin', '2018-06-01', NULL, 3400, 'Lisa', 'Po', 'F', '1994-11-24', 0),
(12, 3, 'janetteo@hotmail.com', 84043064, 'Dentist', '2018-02-22', NULL, 6050, 'Janet', 'Teo', 'F', '1985-06-02', 0),
(13, 3, 'ericyang@hotmail.com', 80334909, 'Dentist', '2006-11-30', NULL, 6400, 'Eric', 'Yang', 'M', '1972-05-09', 0),
(14, 3, 'tommyyang@hotmail.com', 93304468, 'Dentist', '2008-01-03', NULL, 6300, 'Tommy', 'Yang', 'M', '1976-12-27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `timeslot`
--

CREATE TABLE `timeslot` (
  `timeSlotID` int(11) NOT NULL,
  `clinicID` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `dentistList` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`dentistList`))
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeslot`
--

INSERT INTO `timeslot` (`timeSlotID`, `clinicID`, `date`, `time`, `dentistList`) VALUES
(1, 1, '2023-05-20', '09:00', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(2, 1, '2023-05-20', '09:30', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(3, 1, '2023-05-20', '10:00', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(4, 1, '2023-05-20', '10:30', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(5, 1, '2023-05-20', '11:00', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(6, 1, '2023-05-20', '11:30', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(7, 1, '2023-05-20', '12:00', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(8, 1, '2023-05-20', '12:30', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(9, 1, '2023-05-20', '13:00', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(10, 1, '2023-05-20', '13:30', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(11, 1, '2023-05-20', '14:00', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(12, 1, '2023-05-20', '14:30', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(13, 1, '2023-05-20', '15:00', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(14, 1, '2023-05-20', '15:30', '[\"Hendrick Heng\"]'),
(15, 1, '2023-05-20', '16:00', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(16, 1, '2023-05-20', '16:30', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(17, 1, '2023-05-20', '17:00', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(18, 1, '2023-05-20', '17:30', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(19, 1, '2023-05-20', '18:00', '[\"Francis Baker, Hendrick Heng, Thierry Henry\"]'),
(20, 2, '2023-05-20', '09:00', '[\"Sarah Tan, Mandeep Singh\"]'),
(21, 2, '2023-05-20', '09:30', '[\"Sarah Tan, Mandeep Singh\"]'),
(22, 2, '2023-05-20', '10:00', '[\"Sarah Tan, Mandeep Singh\"]'),
(23, 2, '2023-05-20', '10:30', '[\"Sarah Tan, Mandeep Singh\"]'),
(24, 2, '2023-05-20', '11:00', '[\"Sarah Tan, Mandeep Singh\"]'),
(25, 2, '2023-05-20', '11:30', '[\"Mandeep Singh\"]'),
(26, 2, '2023-05-20', '12:00', '[\"Sarah Tan, Mandeep Singh\"]'),
(27, 2, '2023-05-20', '12:30', '[\"Sarah Tan, Mandeep Singh\"]'),
(28, 2, '2023-05-20', '13:00', '[\"Sarah Tan, Mandeep Singh\"]'),
(29, 2, '2023-05-20', '13:30', '[\"Sarah Tan, Mandeep Singh\"]'),
(30, 2, '2023-05-20', '14:00', '[\"Sarah Tan, Mandeep Singh\"]'),
(31, 2, '2023-05-20', '14:30', '[\"Sarah Tan, Mandeep Singh\"]'),
(32, 2, '2023-05-20', '15:00', '[\"Sarah Tan, Mandeep Singh\"]'),
(33, 2, '2023-05-20', '15:30', '[\"Sarah Tan, Mandeep Singh\"]'),
(34, 2, '2023-05-20', '16:00', '[\"Sarah Tan, Mandeep Singh\"]'),
(35, 2, '2023-05-20', '16:30', '[\"Sarah Tan, Mandeep Singh\"]'),
(36, 2, '2023-05-20', '17:00', '[\"Sarah Tan, Mandeep Singh\"]'),
(37, 2, '2023-05-20', '17:30', '[\"Sarah Tan, Mandeep Singh\"]'),
(38, 2, '2023-05-20', '18:00', '[\"Sarah Tan, Mandeep Singh\"]'),
(39, 3, '2023-05-20', '09:00', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(40, 3, '2023-05-20', '09:30', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(41, 3, '2023-05-20', '10:00', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(42, 3, '2023-05-20', '10:30', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(43, 3, '2023-05-20', '11:00', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(44, 3, '2023-05-20', '11:30', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(45, 3, '2023-05-20', '12:00', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(46, 3, '2023-05-20', '12:30', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(47, 3, '2023-05-20', '13:00', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(48, 3, '2023-05-20', '13:30', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(49, 3, '2023-05-20', '14:00', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(50, 3, '2023-05-20', '14:30', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(51, 3, '2023-05-20', '15:00', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(52, 3, '2023-05-20', '15:30', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(53, 3, '2023-05-20', '16:00', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(54, 3, '2023-05-20', '16:30', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(55, 3, '2023-05-20', '17:00', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(56, 3, '2023-05-20', '17:30', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(57, 3, '2023-05-20', '18:00', '[\"Janet Teo, Eric Yang, Tommy Yang\"]'),
(58, 4, '2023-05-20', '09:00', '[\"Samantha Wee, James Ong\"]'),
(59, 4, '2023-05-20', '09:30', '[\"Samantha Wee, James Ong\"]'),
(60, 4, '2023-05-20', '10:00', '[\"Samantha Wee, James Ong\"]'),
(61, 4, '2023-05-20', '10:30', '[\"Samantha Wee, James Ong\"]'),
(62, 4, '2023-05-20', '11:00', '[\"Samantha Wee, James Ong\"]'),
(63, 4, '2023-05-20', '11:30', '[\"Samantha Wee, James Ong\"]'),
(64, 4, '2023-05-20', '12:00', '[\"Samantha Wee, James Ong\"]'),
(65, 4, '2023-05-20', '12:30', '[\"Samantha Wee, James Ong\"]'),
(66, 4, '2023-05-20', '13:00', '[\"Samantha Wee, James Ong\"]'),
(67, 4, '2023-05-20', '13:30', '[\"Samantha Wee, James Ong\"]'),
(68, 4, '2023-05-20', '14:00', '[\"Samantha Wee, James Ong\"]'),
(69, 4, '2023-05-20', '14:30', '[\"Samantha Wee, James Ong\"]'),
(70, 4, '2023-05-20', '15:00', '[\"Samantha Wee, James Ong\"]'),
(71, 4, '2023-05-20', '15:30', '[\"Samantha Wee, James Ong\"]'),
(72, 4, '2023-05-20', '16:00', '[\"Samantha Wee, James Ong\"]'),
(73, 4, '2023-05-20', '16:30', '[\"Samantha Wee, James Ong\"]'),
(74, 4, '2023-05-20', '17:00', '[\"Samantha Wee, James Ong\"]'),
(75, 4, '2023-05-20', '17:30', '[\"Samantha Wee, James Ong\"]'),
(76, 4, '2023-05-20', '18:00', '[\"Samantha Wee, James Ong\"]');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `treatmentID` int(11) NOT NULL,
  `clinicID` int(11) NOT NULL,
  `treatmentType` varchar(100) DEFAULT NULL,
  `treatmentName` varchar(100) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `availability` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`treatmentID`, `clinicID`, `treatmentType`, `treatmentName`, `price`, `availability`) VALUES
(1, 1, 'Tooth Extraction', 'Wisdom Tooth Extraction', 450, 1),
(2, 1, 'General Checkup', 'Regular Checkup Plus', 90, 1),
(3, 1, 'General Checkup', 'Regular Checkup', 78, 1),
(4, 1, 'Root Canal', 'Root Canal Operation', 222, 1),
(5, 1, 'Teeth Cleaning', 'Scaling And Polish', 120, 1),
(6, 1, 'Teeth Whitening', 'Whitening And Polish', 100, 1),
(7, 2, 'General Checkup', 'Normal Package', 88, 1),
(8, 2, 'Teeth Cleaning', 'Teeth Scaling', 60, 1),
(9, 2, 'Teeth Cleaning', 'Teeth Cleaning Package', 110, 1),
(10, 2, 'Tooth Extraction', 'Tooth Extract - 1 pc', 80, 1),
(11, 2, 'Tooth Extraction', 'Tooth Extract - 2 pc', 130, 1),
(12, 2, 'Tooth Implant', 'Tooth Implant - Standard', 200, 1),
(13, 2, 'Tooth Implant', 'Tooth Implant - Gold', 450, 1),
(14, 2, 'Tooth Filling', 'Fillers', 80, 1),
(15, 2, 'X-ray', 'Upper Row X-ray', 130, 1),
(16, 2, 'X-ray', 'Lower Row X-ray', 130, 1),
(17, 2, 'X-ray', 'Full X-ray', 200, 1),
(18, 3, 'Crown and Bridges', 'Crowning', 70, 1),
(19, 3, 'Crown and Bridges', 'Bridging', 65, 1),
(20, 3, 'Teeth Cleaning', 'Teeth Clean Pro', 110, 1),
(21, 3, 'Orthodontics(Braces)', 'Top Braces', 150, 1),
(22, 3, 'Orthodontics(Braces)', 'Bottom Braces', 150, 1),
(23, 3, 'Orthodontics(Braces)', 'Full Braces', 270, 1),
(24, 4, 'General Checkup', 'Checkup and Consultation - $60', 60, 1),
(25, 4, 'Tooth Extraction', 'Tooth Extraction $90', 90, 1),
(26, 4, 'Wisdom Tooth', 'Wisdom Tooth Extraction - 1 session $150', 150, 1),
(27, 4, 'Wisdom Tooth', 'Wisdom Tooth Extraction - 2 session $180', 180, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointmentID`,`timeSlotID`,`patientID`,`clinicID`,`staffID`,`treatmentID`),
  ADD KEY `timeSlotID` (`timeSlotID`),
  ADD KEY `patientID` (`patientID`),
  ADD KEY `clinicID` (`clinicID`),
  ADD KEY `staffID` (`staffID`),
  ADD KEY `treatmentID` (`treatmentID`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`clinicID`,`emailClinic`),
  ADD UNIQUE KEY `UK_Clinic` (`phoneNum`,`nameClinic`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patientID`,`emailPatient`),
  ADD UNIQUE KEY `UK_Patient` (`mobileNum`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`,`clinicID`),
  ADD UNIQUE KEY `UK_Staff` (`emailStaff`,`phoneNumStaff`),
  ADD KEY `FK_Staff` (`clinicID`);

--
-- Indexes for table `timeslot`
--
ALTER TABLE `timeslot`
  ADD PRIMARY KEY (`timeSlotID`,`clinicID`),
  ADD KEY `FK_Timeslot` (`clinicID`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`treatmentID`,`clinicID`),
  ADD KEY `FK_Treatment` (`clinicID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointmentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `clinicID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patientID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `timeslot`
--
ALTER TABLE `timeslot`
  MODIFY `timeSlotID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `treatmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
