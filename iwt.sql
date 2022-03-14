CREATE DATABASE iwtproject;
CREATE TABLE IF NOT EXISTS `admin` (
  `ID` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`ID`)
);

INSERT INTO `admin` (`ID`, `username`, `password`) VALUES
(1, 'admin', 'admin123');

CREATE TABLE `admission` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(45) NOT NULL,
  `sex` varchar(15) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sscgpa` double NOT NULL,
   `hscgpa` double NOT NULL,
  `faculty` varchar(30) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `status` varchar(44) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `date_admission` varchar(22) NOT NULL,
  `applicationID` varchar(15) NOT NULL,
  PRIMARY KEY (`ID`)
);

