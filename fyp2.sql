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
  `nationality` varchar(100),
  `allergiesList` text,
  `deactivated` tinyint(1) NOT NULL DEFAULT '0',
  CONSTRAINT PK_Patient PRIMARY KEY (`patientID`, `emailPatient`),
  CONSTRAINT UK_Patient UNIQUE (`mobileNum`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `Patient` (`emailPatient`, `passwordPatient`,  `mobileNum`, `firstName`, 
                        `lastName`,`gender`,`dateOfBirth`,`nationality`,`allergiesList`, `deactivated`) VALUES
('patient1@hotmail.com', 'Password1', 11112222, 'Patient', 'One', 'M', '1995-2-24', 'Singaporean', 'Nuts, Ant Bite', 0),
('patient1@hotmail.com', 'Password2', 22223333, 'Patient', 'Two', 'F', '1990-11-04', 'Singaporean', '', 0),
('patient1@hotmail.com', 'Password3', 33334444, 'Patient', 'Three', 'M', '1995-7-16', 'Malaysian', '', 0);


-- CLINIC TABLE

DROP TABLE IF EXISTS `Clinic`;
CREATE TABLE IF NOT EXISTS `Clinic` (
  `clinicID` int NOT NULL AUTO_INCREMENT,
  `emailClinic` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `passwordClinic` text NOT NULL,
  `nameClinic` varchar(100) NOT NULL,
  `phoneNum` int NOT NULL,
  `blockNum` int,
  `streetName` varchar(100), 
  `unitNum` varchar(100),
  `postalCode` int,
  `specialisation` varchar(100),
  `rating` float NOT NULL DEFAULT '0', 
  `deactivated` int NOT NULL DEFAULT '0',
  CONSTRAINT PK_Clinic PRIMARY KEY (`clinicID`, `emailClinic`),
  CONSTRAINT UK_Clinic UNIQUE (`phoneNum`, `nameClinic`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `Clinic` (`emailClinic`, `passwordClinic`, `nameClinic`, `phoneNum`, `blockNum`, `streetName`, `unitNum`, `postalCode`, `specialisation`, `rating`) VALUES
('clinic1@hotmail.com', 'clinicPassword1', 'Raffles Dental Clinic', 12345678, 54, 'Raffles Boulevard', '06-11', 112250, 'General, Hygiene, Root Canal', 4.5),
('clinic2@hotmail.com', 'clinicPassword2', 'Ah Huat Tooth Care', 87654321, 44, 'Orchard Road', '02-04', 782241, 'General, Hygiene, Tooth Removal', 5),
('clinic3@hotmail.com', 'clinicPassword3', 'Shiny Teeth That Twinkle', 11223344, 78, 'Boon Lay Street', '14-25', 442215, 'Hygiene, Braces', 3);



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
(2, 'staff2@hotmail.com', 11111111, 'Dentist', '2010-10-01', 5200, 'Dentist', 'Two', 'M', '1989-04-01'),
(3, 'staff3@hotmail.com', 22221111, 'Admin', '2001-8-14', 3400, 'Admin', 'One', 'F', '1990-10-27');



-- TREATMENT TABLE

DROP TABLE IF EXISTS `Treatment`;
CREATE TABLE IF NOT EXISTS `Treatment` (
  `treatmentID` int NOT NULL AUTO_INCREMENT,
  `clinicID` int NOT NULL,
  `treatmentType` varchar(100),
  `treatmentName` varchar(100),
  `price` float,
  `availability` int NOT NULL DEFAULT '0',
  CONSTRAINT PK_Treatment PRIMARY KEY (`treatmentID`, `clinicID`),
  CONSTRAINT FK_Treatment FOREIGN KEY (`clinicID`) 
  REFERENCES Clinic(`clinicID`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Treatment` (`clinicID`, `treatmentType`, `treatmentName`, `price`) VALUES
(1, 'Tooth Extraction', 'Wisdom Tooth Extraction', 450),
(1, 'General Checkup', 'General Checkup', 78),
(1, 'Teeth Scaling', 'Scaling and Polishing', 45),
(1, 'Root Canal', 'Root Canal', 78),
(2, 'Dental Filing', 'Dental Filing', 120),
(2, 'Implants', 'Dental Implants', 450),
(2, 'Orthodontics', 'Orthodontic treatment', 78),
(2, 'Crowns', 'Dental Crowns and Bridges', 400),
(3, 'Whitening', 'Teeth Whitening', 200),
(3, 'Tooth Extraction', 'Normal Extraction', 70),
(3, 'Implants', 'Dental Implants', 88),
(3, 'Root Canal', 'Root Canal', 58);


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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Timeslot` (`clinicID`, `date`, `time`, `dentistList`) VALUES
(1, '2022-01-05', '09:00', '["Thomas", "Harry", "Diane"]'),
(2, '2022-01-05', '13:30', '["Harry", "Diane"]'),
(3, '2022-01-22', '17:30', '["Jackson"]');

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
(1, 1, 2, 1, 2, 'Tim', 'Baker', 'Diane', 'Hemsworth', '17:30', 'Dental Filing', 120),
(1, 1, 2, 1, 1, 'Henry', 'Baker', 'Harry', 'Mason', '17:30', 'Dental Implants', 450),
(8, 2, 1, 2, 3, 'Adeline', 'Wellington', 'Jackson', 'Butterworth', '09:30', 'General Checkup', 78),
(1, 3, 1, 2, 2, 'Patient', 'One', 'Jackson', 'Butterworth', '09:30', 'Scaling and Polishing', 45),
(7, 3, 3, 3, 1, 'Patient', 'One', 'Dentist', 'One', '10:30', 'Teeth Whitening', 200);



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