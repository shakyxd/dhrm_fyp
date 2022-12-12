SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


DROP TABLE IF EXISTS `Accounts`;
CREATE TABLE IF NOT EXISTS `Accounts` (
  `accountID` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` text NOT NULL,
  `profileID` int NOT NULL,
  `deactivated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`accountID`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `Accounts` (`accountID`, `username`, `password`, `profileID`, `deactivated`) VALUES
(0, 'admin', 'Password1', 1, 0),
(1, 'dentist1', 'Password2', 2, 0),
(2, 'dentist2', 'Password3', 2, 0),
(3, 'dentist3', 'Password4', 2, 0),
(4, 'patient1', 'Password5', 3, 0),
(5, 'patient2', 'Password6', 3, 0),
(6, 'patient3', 'Password7', 3, 0);


DROP TABLE IF EXISTS `Profiles`;
CREATE TABLE IF NOT EXISTS `Profiles` (
  `profileID` int NOT NULL AUTO_INCREMENT,
  `profileName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `deactivated` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`profileID`),
  UNIQUE KEY `profileName` (`profileName`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `Profiles` (`profileID`, `profileName`, `deactivated`) VALUES
(1, 'Administrator', 0),
(2, 'Dentist', 0),
(3, 'patient', 0);


DROP TABLE IF EXISTS `Staffs`;
CREATE TABLE IF NOT EXISTS `Staffs` (
  `staffID` int NOT NULL AUTO_INCREMENT,
  `firstName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` text NOT NULL,
  `retired` tinyint(1) NOT NULL DEFAULT '0',
  `accountID` int NOT NULL,
  PRIMARY KEY (`staffID`),
  UNIQUE KEY `accountID` (`accountID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `Staffs` (`staffID`, `firstName`, `lastName`, `accountID`) VALUES
(1, 'The', 'Wok', 1),
(2, 'Goofy', 'Ahh', 2),
(3, 'Elonge', 'Moss', 3);


DROP TABLE IF EXISTS `Patients`;
CREATE TABLE IF NOT EXISTS `Patients` (
  `patientID` int NOT NULL AUTO_INCREMENT,
  `firstName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastName` text NOT NULL,
  `accountID` int NOT NULL,
  `planID` int NOT NULL,
  `treatmentID` int NOT NULL,
  PRIMARY KEY (`patientID`),
  UNIQUE KEY `accountID` (`accountID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `Patients` (`patientID`, `firstName`, `lastName`, `accountID`, `planID`, `treatmentID`) VALUES
(1, 'Teeth', 'Pain', 4, 1, 1),
(2, 'Teeth', 'Ache', 5, 2, 2),
(3, 'Teeth', 'Decay', 6, 3, 3);


DROP TABLE IF EXISTS `Service Plans`;
CREATE TABLE IF NOT EXISTS `Service Plans` (
  `planID` int NOT NULL,
  `planName` varchar(100) NOT NULL,
  PRIMARY KEY (`planID`),
  UNIQUE KEY `planName` (`planName`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `Service Plans` (`planID`, `planName`) VALUES
(1, 'planname1'),
(2, 'planname2'),
(3, 'planname3');


DROP TABLE IF EXISTS `Treatments`;
CREATE TABLE IF NOT EXISTS `Treatments` (
  `treatmentID` int NOT NULL,
  `treatmentName` varchar(100) NOT NULL,
  `lastVisited` datetime NOT NULL,
  PRIMARY KEY (`treatmentID`),
  UNIQUE KEY `treatmentName` (`treatmentName`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `Treatments` (`treatmentID`, `treatmentName`, `lastVisited`) VALUES
(1, 'treatment1', '2021-01-12 23:13:28'),
(2, 'treatment2', '2021-01-14 23:12:58'),
(3, 'treatment3', '2021-01-17 23:13:10');


DROP TABLE IF EXISTS `Material`;
CREATE TABLE IF NOT EXISTS `Material` (
  `itemID` int NOT NULL AUTO_INCREMENT,
  `itemName` varchar(100) NOT NULL,
  `itemQty` int NOT NULL,
  PRIMARY KEY (`itemID`),
  UNIQUE KEY `itemName` (`itemName`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `Material` (`itemID`, `itemName`, `itemQty`) VALUES
(1, 'artificialcrown', '1000'),
(2, 'braces', '1000'),
(3, 'syringe', '1000');

COMMIT;