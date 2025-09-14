

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Airline`
--

DROP TABLE IF EXISTS `Airline`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Airline` (
  `AirlineCode` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AirlineName` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`AirlineCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Airline`
--

LOCK TABLES `Airline` WRITE;
/*!40000 ALTER TABLE `Airline` DISABLE KEYS */;
INSERT INTO `Airline` VALUES ('AC','AIR CANADA'),('CZ','China Southern Airlines'),('MU','China Eastern Airlines');
/*!40000 ALTER TABLE `Airline` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Airplane`
--

DROP TABLE IF EXISTS `Airplane`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Airplane` (
  `AirplaneID` int(11) NOT NULL,
  `AirplaneYear` int(11) DEFAULT NULL,
  `AirlineCode` char(3) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TypeName` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`AirplaneID`),
  KEY `AirlineCode` (`AirlineCode`),
  KEY `TypeName` (`TypeName`),
  CONSTRAINT `Airplane_ibfk_1` FOREIGN KEY (`AirlineCode`) REFERENCES `Airline` (`AirlineCode`),
  CONSTRAINT `Airplane_ibfk_2` FOREIGN KEY (`TypeName`) REFERENCES `Type` (`TypeName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Airplane`
--

LOCK TABLES `Airplane` WRITE;
/*!40000 ALTER TABLE `Airplane` DISABLE KEYS */;
INSERT INTO `Airplane` VALUES (3457,3,'MU','737'),(3741,19,'AC','A380'),(5428,11,'CZ','787');
/*!40000 ALTER TABLE `Airplane` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Airport`
--

DROP TABLE IF EXISTS `Airport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Airport` (
  `AirportCode` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AirportName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AirportLocationCity` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AirportLocationProvince` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`AirportCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Airport`
--

LOCK TABLES `Airport` WRITE;
/*!40000 ALTER TABLE `Airport` DISABLE KEYS */;
INSERT INTO `Airport` VALUES ('LHR','Heathrow Airport','London','London'),('YVR','Vancouver International Airport','Vancouver','British Columbia'),('YYZ','Toronto Pearson International Airport','Toronto','Ontario');
/*!40000 ALTER TABLE `Airport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DayForFlight`
--

DROP TABLE IF EXISTS `DayForFlight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DayForFlight` (
  `FlightDay` date NOT NULL,
  `FlightNumber` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`FlightDay`,`FlightNumber`),
  KEY `FlightNumber` (`FlightNumber`),
  CONSTRAINT `DayForFlight_ibfk_1` FOREIGN KEY (`FlightNumber`) REFERENCES `Flight` (`FlightNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DayForFlight`
--

LOCK TABLES `DayForFlight` WRITE;
/*!40000 ALTER TABLE `DayForFlight` DISABLE KEYS */;
INSERT INTO `DayForFlight` VALUES ('2009-01-07','CZ741'),('2020-01-01','AC123'),('2020-11-12','MU207'),('2021-01-01','AC030'),('2021-01-01','MU207'),('2021-03-25','CZ987');
/*!40000 ALTER TABLE `DayForFlight` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Flight`
--

DROP TABLE IF EXISTS `Flight`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Flight` (
  `FlightNumber` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AirlineCode` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DepartAirportCode` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AirplaneID` int(11) DEFAULT NULL,
  `FlightDepartActualTime` time DEFAULT NULL,
  `FlightDepartScheduledTime` time DEFAULT NULL,
  `FlightArrivesActualTime` time DEFAULT NULL,
  `FlightArrivesScheduledTime` time DEFAULT NULL,
  `ArriveAirportCode` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AvailableSeats` int(11) DEFAULT NULL,
  PRIMARY KEY (`FlightNumber`,`AirlineCode`),
  KEY `AirlineCode` (`AirlineCode`),
  KEY `AirplaneID` (`AirplaneID`),
  KEY `Flight_ibfk_4` (`DepartAirportCode`),
  KEY `Flight_ibfk_5` (`ArriveAirportCode`),
  CONSTRAINT `Flight_ibfk_1` FOREIGN KEY (`AirlineCode`) REFERENCES `Airline` (`AirlineCode`),
  CONSTRAINT `Flight_ibfk_2` FOREIGN KEY (`DepartAirportCode`) REFERENCES `Airport` (`AirportCode`),
  CONSTRAINT `Flight_ibfk_3` FOREIGN KEY (`AirplaneID`) REFERENCES `Airplane` (`AirplaneID`),
  CONSTRAINT `Flight_ibfk_5` FOREIGN KEY (`ArriveAirportCode`) REFERENCES `Airport` (`AirportCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Flight`
--

LOCK TABLES `Flight` WRITE;
/*!40000 ALTER TABLE `Flight` DISABLE KEYS */;
INSERT INTO `Flight` VALUES ('AC030','AC','YVR',3741,'04:33:32','04:34:05','10:11:34','10:11:34','YYZ',200),('AC123','AC','LHR',NULL,'10:00:00','10:00:00','12:00:00','12:00:00','YYZ',321),('CZ741','CZ','YYZ',5428,'11:55:22','11:54:03','16:04:03','16:04:03','LHR',300),('CZ987','CZ','YVR',NULL,'13:00:23','13:00:00','15:30:00','15:30:00','LHR',234),('MU207','MU','LHR',3457,'19:03:21','18:04:00','02:20:00','02:20:00','YVR',400);
/*!40000 ALTER TABLE `Flight` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Type`
--

DROP TABLE IF EXISTS `Type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Type` (
  `TypeName` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NumberOfSeats` int(11) DEFAULT NULL,
  `Company` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`TypeName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Type`
--

LOCK TABLES `Type` WRITE;
/*!40000 ALTER TABLE `Type` DISABLE KEYS */;
INSERT INTO `Type` VALUES ('737',189,'Boeing'),('787',330,'Boeing'),('A380',853,'Airbus');
/*!40000 ALTER TABLE `Type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `handelling`
--

DROP TABLE IF EXISTS `handelling`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `handelling` (
  `AirportCode` char(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TypeName` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`AirportCode`,`TypeName`),
  KEY `TypeName` (`TypeName`),
  CONSTRAINT `handelling_ibfk_1` FOREIGN KEY (`AirportCode`) REFERENCES `Airport` (`AirportCode`),
  CONSTRAINT `handelling_ibfk_2` FOREIGN KEY (`TypeName`) REFERENCES `Type` (`TypeName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `handelling`
--

LOCK TABLES `handelling` WRITE;
/*!40000 ALTER TABLE `handelling` DISABLE KEYS */;
INSERT INTO `handelling` VALUES ('LHR','737'),('YVR','A380'),('YYZ','787');
/*!40000 ALTER TABLE `handelling` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'airlineDB'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

