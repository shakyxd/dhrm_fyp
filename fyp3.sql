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
  `addressPatient` varchar(100),
  `gender` char,
  `dateOfBirth` date NOT NULL,
  `nationality` varchar(100),
  `allergiesList` text,
  `deactivated` tinyint(1) NOT NULL DEFAULT '0',
  CONSTRAINT PK_Patient PRIMARY KEY (`patientID`, `emailPatient`),
  CONSTRAINT UK_Patient UNIQUE (`mobileNum`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `Patient` (`emailPatient`, `passwordPatient`,  `mobileNum`, `firstName`, 
                        `lastName`, `addressPatient`, `gender`,`dateOfBirth`,`nationality`,`allergiesList`, `deactivated`) VALUES
('amandachan@hotmail.com', 'Password1', 11112222, 'Amanda', 'Chan', 'Blk 222 Boon Lay Avenue, S(101222)', 'F', '1995-02-24', 'Singaporean', 'Nuts, Ant Bite', 0),
('johnong@hotmail.com', 'Password2', 22223333, 'John', 'Ong', 'Blk 72 Serangoon North, S(550072)', 'M', '1990-11-04', 'Singaporean', '', 0),
('thomaslee@hotmail.com', 'Password3', 33334444, 'Thomas', 'Lee', 'Blk 25 Yishun Avenue, S(12425)', 'M', '1995-07-16', 'Malaysian', '', 0);


-- CLINIC TABLE

DROP TABLE IF EXISTS `Clinic`;
CREATE TABLE IF NOT EXISTS `Clinic` (
  `clinicID` int NOT NULL AUTO_INCREMENT,
  `emailClinic` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `passwordClinic` text NOT NULL,
  `nameClinic` varchar(100) NOT NULL,
  `phoneNum` int NOT NULL,
  `address` varchar(100), 
  `area` varchar(100),
  `specialisation` varchar(100),
  `rating` float NOT NULL DEFAULT '0', 
  `deactivated` int NOT NULL DEFAULT '0',
  CONSTRAINT PK_Clinic PRIMARY KEY (`clinicID`, `emailClinic`),
  CONSTRAINT UK_Clinic UNIQUE (`phoneNum`, `nameClinic`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `Clinic` (`emailClinic`, `passwordClinic`, `nameClinic`, `phoneNum`, `address`, `area`, `specialisation`, `rating`) VALUES
('rafflesdental@hotmail.com', 'clinicPassword1', 'Raffles Dental Clinic', 95562244,'54 Raffles Boulevard, #06-11, S(48954)','Central', 'General, Hygiene, Root Canal', 4.5),
('tantoothcare@hotmail.com', 'clinicPassword2', 'Tan Tooth Care', 87654321,'44 Orchard Road, #02-04, S(782244)', 'Central', 'General, Hygiene, Tooth Removal', 5),
('bedoklanedc@yahoo.com', 'clinicPassword3', 'Bedok Lane Dental Clinic', 86655412, 'Blk 78, Bedok Lane, #2-25, S(442278)', 'East', 'Teeth Cleaning, Crown and Bridges, Orthodontics(Braces)', 4),
('yishunfamilydc@yahoo.com', 'clinicPassword3', 'Yishun Family Dental Clinic', 9866521, 'Blk 122, Bedok Lane, #01-55, S(201122)', 'North', 'General Checkup, Wisdom Tooth, Tooth Extraction', 3.5);



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
(2, 'sarahtan@hotmail.com', 88564223, 'Dentist', '2004-02-01', 6000, 'Sarah', 'Tan', 'F', '1982-02-21'),
(2, 'mandeepsingh@gmail.com', 98561331, 'Dentist', '2010-10-01', 5200, 'Mandeep', 'Singh', 'M', '1989-04-01'),
(2, 'chelstonlow@gmail.com', 85236542, 'Admin', '2001-08-14', 3400, 'Chelston', 'Low', 'M', '1990-10-27'),

(1, 'mariahkong@gmail.com', 99886532, 'Admin', '2020-5-12', 3200, 'Mariah', 'Kong', 'F', '1995-03-02'),
(1, 'francisbaker@hotmail.com', 98654412, 'Dentist', '2018-05-12', 4800, 'Francis', 'Baker', 'M', '1992-05-11'),
(1, 'hendrickheng@hotmail.com', 85619193, 'Dentist', '2015-01-02', 5200, 'Hendrick', 'Heng', 'M', '1978-12-25'),
(1, 'thierryhenry@hotmail.com', 88761315, 'Dentist', '2016-03-22', 5000, 'Thierry', 'Henry', 'M', '1980-03-17'),

(4, 'jakeyip@gmail.com', 87331629, 'Admin', '2010-3-26', 3600, 'Jake', 'Yip', 'M', '1965-01-28'),
(4, 'samanthawee@hotmail.com', 9916712, 'Dentist', '2019-02-03', 5500, 'Samantha', 'Wee', 'F', '1988-05-22'),
(4, 'jamesong@hotmail.com', 89895132, 'Dentist', '2019-01-25', 6200, 'James', 'Ong', 'M', '1969-08-08'),

(3, 'lisapo@gmail.com', 91123466, 'Admin', '2018-06-01', 3400, 'Lisa', 'Po', 'F', '1994-11-24'),
(3, 'janetteo@hotmail.com', 84043064, 'Dentist', '2018-02-22', 6050, 'Janet', 'Teo', 'F', '1985-06-02'),
(3, 'ericyang@hotmail.com', 80334909, 'Dentist', '2006-11-30', 6400, 'Eric', 'Yang', 'M', '1972-05-09'),
(3, 'tommyyang@hotmail.com', 93304468, 'Dentist', '2008-01-03', 6300, 'Tommy', 'Yang', 'M', '1976-12-27');




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

INSERT INTO `Treatment` (`clinicID`, `treatmentType`, `treatmentName`, `price`) VALUES
(1, 'Tooth Extraction', 'Wisdom Tooth Extraction', 450),
(1, 'General Checkup', 'Regular Checkup Plus', 90),
(1, 'General Checkup', 'Regular Checkup', 78),
(1, 'Root Canal', 'Root Canal Operation', 222),
(1, 'Teeth Cleaning', 'Scaling And Polish', 120),
(1, 'Teeth Whitening', 'Whitening And Polish', 100),


(2, 'General Checkup', 'Normal Package', 88),
(2, 'Teeth Cleaning', 'Teeth Scaling', 60),
(2, 'Teeth Cleaning', 'Teeth Cleaning Package', 110),
(2, 'Tooth Extraction', 'Tooth Extract - 1 pc', 80),
(2, 'Tooth Extraction', 'Tooth Extract - 2 pc', 130),
(2, 'Tooth Implant', 'Tooth Implant - Standard', 200),
(2, 'Tooth Implant', 'Tooth Implant - Gold', 450),
(2, 'Tooth Filling', 'Fillers', 80),
(2, 'X-ray', 'Upper Row X-ray', 130),
(2, 'X-ray', 'Lower Row X-ray', 130),
(2, 'X-ray', 'Full X-ray', 200),

(3, 'Crown and Bridges', 'Crowning', 70),
(3, 'Crown and Bridges', 'Bridging', 65),
(3, 'Teeth Cleaning', 'Teeth Clean Pro', 110),
(3, 'Orthodontics(Braces)', 'Top Braces', 150),
(3, 'Orthodontics(Braces)', 'Bottom Braces', 150),
(3, 'Orthodontics(Braces)', 'Full Braces', 270),

(4, 'General Checkup', 'Checkup and Consultation - $60', 60),
(4, 'Tooth Extraction', 'Tooth Extraction $90', 90),
(4, 'Wisdom Tooth', 'Wisdom Tooth Extraction - 1 session $150', 150),
(4, 'Wisdom Tooth', 'Wisdom Tooth Extraction - 2 session $180', 180);




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
(1, '2023-05-20', '09:00', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '09:30', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '10:00', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '10:30', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '11:00', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '11:30', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '12:00', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '12:30', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '13:00', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '13:30', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '14:00', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '14:30', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '15:00', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '15:30', '["Hendrick Heng"]'),
(1, '2023-05-20', '16:00', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '16:30', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '17:00', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '17:30', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),
(1, '2023-05-20', '18:00', '["Francis Baker, Hendrick Heng, Thierry Henry"]'),

(2, '2023-05-20', '09:00', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '09:30', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '10:00', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '10:30', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '11:00', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '11:30', '["Mandeep Singh"]'),
(2, '2023-05-20', '12:00', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '12:30', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '13:00', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '13:30', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '14:00', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '14:30', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '15:00', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '15:30', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '16:00', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '16:30', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '17:00', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '17:30', '["Sarah Tan, Mandeep Singh"]'),
(2, '2023-05-20', '18:00', '["Sarah Tan, Mandeep Singh"]'),



(3, '2023-05-20', '09:00', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '09:30', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '10:00', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '10:30', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '11:00', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '11:30', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '12:00', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '12:30', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '13:00', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '13:30', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '14:00', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '14:30', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '15:00', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '15:30', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '16:00', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '16:30', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '17:00', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '17:30', '["Janet Teo, Eric Yang, Tommy Yang"]'),
(3, '2023-05-20', '18:00', '["Janet Teo, Eric Yang, Tommy Yang"]'),


(4, '2023-05-20', '09:00', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '09:30', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '10:00', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '10:30', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '11:00', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '11:30', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '12:00', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '12:30', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '13:00', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '13:30', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '14:00', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '14:30', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '15:00', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '15:30', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '16:00', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '16:30', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '17:00', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '17:30', '["Samantha Wee, James Ong"]'),
(4, '2023-05-20', '18:00', '["Samantha Wee, James Ong"]');



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
  `date` date,
  `time` varchar(100),
  `treatmentName` varchar(100),
  `price` int,
  `paid` tinyint NOT NULL DEFAULT '0',
  CONSTRAINT PK_Appointment PRIMARY KEY (`appointmentID`,`timeSlotID`, `patientID`, `clinicID`, `staffID`, `treatmentID`),
  FOREIGN KEY (`timeSlotID`) REFERENCES Timeslot(`timeSlotID`),
  FOREIGN KEY (`patientID`) REFERENCES Patient(`patientID`),
  FOREIGN KEY (`clinicID`) REFERENCES Clinic(`clinicID`),
  FOREIGN KEY (`staffID`) REFERENCES Staff(`staffID`),
  FOREIGN KEY (`treatmentID`) REFERENCES Treatment(`treatmentID`)
  
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `Appointment` (`timeslotID`, `patientID`, `clinicID`, `staffID`, `treatmentID`, `firstName`, `lastName`, `firstNameStaff`, `lastNameStaff`, `time`, `date`, `treatmentName`, `price`, `paid`) VALUES
(14, 1, 1, 7, 2, 'Amanda', 'Chan', 'Thierry', 'Henry', '15:30', '2023-05-20', 'Regular Checkup Plus', 90,0),
(16, 1, 1, 7, 2, 'Amanda', 'Chan', 'Thierry', 'Henry', '16:30', '2023-05-20', 'Regular Checkup Plus', 90, 0),
(14, 2, 1, 5, 6, 'John', 'Ong', 'Francis', 'Baker', '15:30', '2023-05-20', 'Whitening and Polishing', 100, 0),
(25, 3, 2, 1, 8, 'Sarah', 'Tan', 'Thomas', 'Lee', '11:30', '2023-05-20', 'Teeth Scaling', 60, 0);



-- FRIEND TABLE

DROP TABLE IF EXISTS `Friend`;
CREATE TABLE IF NOT EXISTS `Friend` (
  `friendID` int NOT NULL AUTO_INCREMENT,
  `oneFriendID` int NOT NULL,
  `oneFriendemail` varchar(100) NOT NULL,
  `twoFriendID` int NOT NULL,
  `twoFriendemail` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
    CONSTRAINT PK_Friend PRIMARY KEY (`friendID`)
  ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
  

INSERT INTO `friend` (`friendID`, `oneFriendID`, `oneFriendemail`, `twoFriendID`, `twoFriendemail`, `status`) VALUES
(2, 1, 'amandachan@hotmail.com', 3, 'thomaslee@hotmail.com', 'Pending');
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