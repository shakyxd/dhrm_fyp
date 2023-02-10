SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- PATIENT TABLE

DROP TABLE IF EXISTS `Patient`;
CREATE TABLE IF NOT EXISTS `Patient` (
  `patientID` int NOT NULL AUTO_INCREMENT,
  `emailPatient` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `passwordPatient` text NOT NULL,
  `mobileNum` int NOT NULL,
  `firstName` varchar(100),
  `lastName` varchar(100) NOT NULL,
  `gender` char,
  `dateOfBirth` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `nationality` varchar(100),
  `allergiesList` text,
  `deactivated` tinyint(1) NOT NULL DEFAULT '0',
  CONSTRAINT PK_Patient PRIMARY KEY (`patientID`, `emailPatient`),
  CONSTRAINT UK_Patient UNIQUE (`mobileNum`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `Patient` (`emailPatient`, `passwordPatient`,  `mobileNum`, `firstName`, 
                        `lastName`,`gender`,`dateOfBirth`, `address`, `nationality`,`allergiesList`, `deactivated`) VALUES
('patient1@hotmail.com', 'Password1', 11112222, 'Patient', 'One', 'M', '1995-2-24', 'Blk 123 Singapore road', 'Singaporean', 'Nuts, Ant Bite', 0),
('patient1@hotmail.com', 'Password2', 22223333, 'Patient', 'Two', 'F', '1990-11-04', 'Blk 223 Singapore road', 'Singaporean', '', 0),
('patient1@hotmail.com', 'Password3', 33334444, 'Patient', 'Three', 'M', '1995-7-16', 'Blk 323 Singapore road', 'Malaysian', '', 0);


-- CLINIC TABLE

DROP TABLE IF EXISTS `Clinic`;
CREATE TABLE IF NOT EXISTS `Clinic` (
  `clinicID` int NOT NULL AUTO_INCREMENT,
  `emailClinic` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `passwordClinic` text NOT NULL,
  `nameClinic` varchar(100) NOT NULL,
  `phoneNum` int NOT NULL,
  `area` varchar(100) NOT NULL,
  `specialisation` varchar(100),
  `rating` float NOT NULL DEFAULT '0', 
  `deactivated` int NOT NULL DEFAULT '0',
  CONSTRAINT PK_Clinic PRIMARY KEY (`clinicID`, `emailClinic`),
  CONSTRAINT UK_Clinic UNIQUE (`phoneNum`, `nameClinic`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `Clinic` (`emailClinic`, `passwordClinic`, `nameClinic`, `phoneNum`, `area`, `specialisation`, `rating`) VALUES
('clinic1@hotmail.com', 'clinicPassword1', 'Raffles Dental Clinic', 12345678, '54 Raffles Boulevard 06-11 112250', 'General, Hygiene, Root Canal', 4.5),
('clinic2@hotmail.com', 'clinicPassword2', 'Ah Huat Tooth Care', 87654321, '44 Orchard Road 02-04 782241', 'General, Hygiene, Tooth Removal', 5),
('clinic3@hotmail.com', 'clinicPassword3', 'Shiny Teeth That Twinkle', 11223344, '78 Boon Lay Street 14-25 442215', 'Hygiene, Braces', 3);



-- STAFF TABLE

DROP TABLE IF EXISTS `Staff`;
CREATE TABLE IF NOT EXISTS `Staff` (
  `staffID` int NOT NULL AUTO_INCREMENT,
  `clinicID` int NOT NULL,
  `emailStaff` varchar(100) NOT NULL,
  `phoneNumStaff` int NOT NULL,
  `staffType` varchar(100) NOT NULL,
  `dateJoined` date NOT NULL,
  `dateLeft` date,
  `salary` float NOT NULL,
  `firstNameStaff` varchar(100),
  `lastNameStaff` varchar(100) NOT NULL,
  `genderStaff` char,
  `dateOfBirthStaff` date NOT NULL,
  `deactivated` int NOT NULL DEFAULT '0',
  CONSTRAINT PK_Staff PRIMARY KEY (`staffID`, `clinicID`),
  CONSTRAINT UK_Staff UNIQUE (`emailStaff`, `phoneNumStaff`),
  CONSTRAINT FK_Staff FOREIGN KEY (`clinicID`) 
  REFERENCES Clinic(`clinicID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Staff` (`clinicID`, `emailStaff`, `phoneNumStaff`, `staffType`, `dateJoined`, `salary`, `firstNameStaff`, `lastNameStaff`, `genderStaff`, `dateOfBirthStaff`) VALUES
(1, 'staff1@hotmail.com', 33344455, 'Dentist', '2004-2-01', 6000, 'Dentist', 'One', 'F', '1982-02-21'),
(1, 'staff2@hotmail.com', 11111111, 'Dentist', '2010-10-01', 5200, 'Dentist', 'Two', 'M', '1989-04-01'),
(1, 'staff3@hotmail.com', 13423411, 'Dentist', '2010-10-02', 5400, 'Dentist', 'Three', 'M', '1989-05-01'),
(2, 'staff4@hotmail.com', 13545411, 'Dentist', '2010-10-06', 5100, 'Dentist', 'Four', 'F', '1989-05-02'),
(2, 'staff5@hotmail.com', 13344411, 'Dentist', '2010-11-02', 5500, 'Dentist', 'Five', 'M', '1989-03-01'),
(2, 'staff6@hotmail.com', 13876811, 'Dentist', '2010-12-02', 5700, 'Dentist', 'Six', 'F', '1989-04-01'),
(3, 'staff7@hotmail.com', 13987911, 'Dentist', '2010-4-02', 5480, 'Dentist', 'Seven', 'F', '1989-06-01'),
(3, 'staff8@hotmail.com', 14323421, 'Dentist', '2010-6-02', 5490, 'Dentist', 'Eight', 'M', '1989-07-01'),
(3, 'staff9@hotmail.com', 13234411, 'Dentist', '2010-7-02', 5430, 'Dentist', 'Nine', 'M', '1989-08-01'),
(10, 'staff10@hotmail.com', 22221111, 'Admin', '2001-8-14', 3400, 'Admin', 'One', 'F', '1990-10-27');



-- TREATMENT TABLE

DROP TABLE IF EXISTS `Treatment`;
CREATE TABLE IF NOT EXISTS `Treatment` (
  `treatmentID` int NOT NULL AUTO_INCREMENT,
  `clinicID` int NOT NULL,
  `treatmentType` varchar(100),
  `treatmentName` varchar(100),
  `price` float,
  `availability` int NOT NULL DEFAULT '1',
  CONSTRAINT PK_Treatment PRIMARY KEY (`treatmentID`, `clinicID`),
  CONSTRAINT FK_Treatment FOREIGN KEY (`clinicID`) 
  REFERENCES Clinic(`clinicID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Treatment` (`clinicID`, `treatmentType`, `treatmentName`, `price`, `availability`) VALUES
(1, 'Wisdom Tooth', 'Wisdom Tooth Extraction', 450, 1),
(1, 'General Checkup', 'General Checkup', 78, 1),
(1, 'Root Canal', 'Root Canal', 78, 1),
(1, 'Teeth Cleaning', 'Cleaning', 78, 1),
(2, 'Tooth Filling', 'Dental Fillings', 120, 1),
(2, 'Teeth Whitening', 'Whitening', 450, 1),
(2, 'Orthodontics(Braces)', 'Braces', 78, 1),
(2, 'Crown and Bridges', 'Dental Crowns and Bridges', 400, 1),
(2, 'X-ray', 'Dental X-ray', 400, 1),
(3, 'Teeth Whitening', 'Dental Whitening', 200, 1),
(3, 'Tooth Extraction', 'Normal Extraction', 70, 1),
(3, 'Tooth Implant', 'Dental Implants', 88, 1),
(3, 'Tooth Filling', 'Dental Fillings', 58, 1);


-- TIMESLOT TABLE

DROP TABLE IF EXISTS `Timeslot`;
CREATE TABLE IF NOT EXISTS `Timeslot` (
  `timeSlotID` int NOT NULL AUTO_INCREMENT,
  `clinicID` int NOT NULL,
  `date` date NOT NULL,
  `time` varchar(100) NOT NULL,
  `dentistList` JSON,
  CONSTRAINT PK_Timeslot PRIMARY KEY (`timeSlotID`, `clinicID`),
  CONSTRAINT FK_Timeslot FOREIGN KEY (`clinicID`) 
  REFERENCES Clinic(`clinicID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Timeslot` (`clinicID`, `date`, `time`, `dentistList`) VALUES
(1, '2022-01-05', '09:00', '["Dentist One", "Dentist Two", "Dentist Three"]'),
(2, '2022-01-05', '13:30', '["Dentist Four", "Dentist Five", "Dentist Six"]'),
(3, '2022-01-22', '17:30', '["Dentist Seven", "Dentist Eight", "Dentist Nine"]');

-- APPOINTMENT TABLE

DROP TABLE IF EXISTS `Appointment`;
CREATE TABLE IF NOT EXISTS `Appointment` (
  `appointmentID` int NOT NULL AUTO_INCREMENT,
  `timeSlotID` int NOT NULL,
  `patientID` int NOT NULL,
  `clinicID` int NOT NULL,
  `staffID` int NOT NULL,
  `treatmentID` int NOT NULL,
  `firstName` varchar(100),
  `lastName` varchar(100),
  `firstNameStaff` varchar(100),
  `lastNameStaff` varchar(100),
  `time` varchar(100),
  `treatmentName` varchar(100),
  `price` int,
  CONSTRAINT PK_Appointment PRIMARY KEY (`appointmentID`,`timeSlotID`, `patientID`, `clinicID`, `staffID`, `treatmentID`),
  FOREIGN KEY (`timeSlotID`) REFERENCES Timeslot(`timeSlotID`),
  FOREIGN KEY (`patientID`) REFERENCES Patient(`patientID`),
  FOREIGN KEY (`clinicID`) REFERENCES Clinic(`clinicID`),
  FOREIGN KEY (`staffID`) REFERENCES Staff(`staffID`),
  FOREIGN KEY (`treatmentID`) REFERENCES Treatment(`treatmentID`)
  
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Appointment` (`timeslotID`, `patientID`, `clinicID`, `staffID`, `treatmentID`, `firstName`, `lastName`, `firstNameStaff`, `lastNameStaff`, `time`, `treatmentName`, `price`) VALUES
(1, 1, 2, 1, 13, 'Patient', 'One', 'Dentist', 'Four', '09:00', 'Dental Fillings', 58),
(1, 1, 3, 1, 12, 'Patient', 'One', 'Dentist', 'Seven', '09:00', 'Dental Implants', 88),
(2, 2, 1, 2, 2, 'Patient', 'Two', 'Dentist', 'Two', '13:30', 'General Checkup', 78),
(1, 3, 1, 2, 10, 'Patient', 'Three', 'Dentist', 'One', '09:00', 'Dental Whitening', 200),
(3, 3, 3, 3, 6, 'Patient', 'Three', 'Dentist', 'Eight', '17:30', 'Whitening', 450);



-- DROP TABLE IF EXISTS `Service Plans`;
-- CREATE TABLE IF NOT EXISTS `Service Plans` (
--   `planID` int NOT NULL AUTO_INCREMENT,
--   `planName` varchar(100) NOT NULL,
--   PRIMARY KEY (`planID`),
--   UNIQUE KEY `planName` (`planName`)
-- ) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- INSERT INTO `Service Plans` (`planID`, `planName`) VALUES
-- (1, 'planname1'),
-- (2, 'planname2'),
-- (3, 'planname3');


-- DROP TABLE IF EXISTS `Treatments`;
-- CREATE TABLE IF NOT EXISTS `Treatments` (
--   `treatmentID` int NOT NULL AUTO_INCREMENT,
--   `treatmentName` varchar(100) NOT NULL,
--   `lastVisited` datetime NOT NULL,
--   PRIMARY KEY (`treatmentID`),
--   UNIQUE KEY `treatmentName` (`treatmentName`)
-- ) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- INSERT INTO `Treatments` (`treatmentID`, `treatmentName`, `lastVisited`) VALUES
-- (1, 'treatment1', '2021-01-12 23:13:28'),
-- (2, 'treatment2', '2021-01-14 23:12:58'),
-- (3, 'treatment3', '2021-01-17 23:13:10');



COMMIT;