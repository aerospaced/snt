-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2016 at 07:16 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `snt`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllListings`()
BEGIN
 SELECT * 
 FROM `tblmls`; 
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetPhotos`(IN mlsNum INT)
BEGIN
 SELECT * 
 FROM `tblphotos`
 WHERE mlsNum = mlsNumber; 
 END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SetPhoto`(IN `photoUrlAddr` VARCHAR(255), IN `mlsNum` INT, IN `user` VARCHAR(50))
BEGIN
INSERT INTO `snt`.`tblPhotos` (`photoIndex`, `mlsNumber`, `photoUrl`, `timestamp`, `user`) VALUES (NULL, mlsNum, photoUrlAddr, CURRENT_TIMESTAMP, user);
 END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblmls`
--

CREATE TABLE IF NOT EXISTS `tblmls` (
  `mlsNumber` int(11) NOT NULL,
  `mlsName` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `key` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `listingURL` varchar(100) NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `propertyType` varchar(20) NOT NULL,
  `listingCategory` varchar(20) NOT NULL,
  `discloseAddress` tinyint(1) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(30) NOT NULL,
  `zip` varchar(12) NOT NULL,
  `country` varchar(50) NOT NULL,
  `listingDesc` varchar(1024) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedBy` varchar(15) NOT NULL,
  PRIMARY KEY (`mlsNumber`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmls`
--

INSERT INTO `tblmls` (`mlsNumber`, `mlsName`, `price`, `key`, `status`, `listingURL`, `bedrooms`, `bathrooms`, `propertyType`, `listingCategory`, `discloseAddress`, `street`, `city`, `state`, `zip`, `country`, `listingDesc`, `timestamp`, `modifiedBy`) VALUES
(12777, 'Benton County Multiple Listing Service', '154900.00', '3yd-BCMLSIA-12777', 'Active', 'http://listings.listhub.net/pages/BCMLSIA/12777/?channel=passfail', 3, 3, 'Residential', 'Purchase', 0, '2251 58 Street', 'Vinton', 'IA', '52349', 'US', 'Excellent location and view. Multi level home with lots of space! Large masonry fireplace,\n            living room and family room. 2.26 acres gives you lots of room for your hobby farm project!\n        ', '2016-08-20 21:52:03', 'root'),
(54149, 'Burlington Alamance Board of Realtors', '125000.00', '3yd-BABORNC-54149', 'Active', 'http://listings.listhub.net/pages/BABORNC/54149/?channel=passfail', 0, 0, 'Commercial', 'Purchase', 1, '12071209 E WEBB AVENUE', 'Burlington', 'NC', '27215', 'US', 'Possible Owner Financing. Property consists of 2 units which are being leased for\n            $600/unit.1 water\n            heater,1 gas meter,2 water meters,2 electrical main panels in basement,Shared parking.Basement not included\n            in\n            square footage. Storage. New 20 year roof on entire building and new a/c for 1207 installed 06/10.\n        ', '2016-08-20 21:52:03', 'root'),
(59140, 'Burlington Alamance Board of Realtors', '2600000.00', '3yd-BABORNC-59140', 'Active', 'http://listings.listhub.net/pages/BABORNC/59140/?channel=passfail', 0, 0, 'Lots And Land', 'Purchase', 1, '0 UNIVERSITY DR', 'Burlington', 'NC', '27215', 'US', 'Zoning allows for many commercial uses. Located on one of the 4 corners at University Dr.\n            &\n            I-40/85 with great interstate access & exposure. Near University Commons & Alamance Crossing retail\n            centers.\n            Convenient to Elon Univ. and main entrance to the 600-acre Mackintosh on the Lake S/D.\n        ', '2016-08-20 21:52:03', 'root'),
(66535, 'Burlington Alamance Board of Realtors', '325000.00', '3yd-BABORNC-66535', 'Active', 'http://listings.listhub.net/pages/BABORNC/66535/?channel=passfail', 0, 0, 'Lots And Land', 'Purchase', 1, '225 S ELEVENTH', 'Mebane', 'NC', '27302', 'US', 'Located just outside Mebane city limits but inside ETJ. Convenient to downtown Mebane &\n            Tanger Outlets (1.2 miles), restaurants, grocery stores, healthcare & pharmacies. Less than 2 miles to\n            I-40/85 access! Great location for multifamily or SFR development.\n        ', '2016-08-20 21:52:03', 'root'),
(71218, 'Burlington Alamance Board of Realtors', '199900.00', '3yd-BABORNC-71218', 'Active', 'http://listings.listhub.net/pages/BABORNC/71218/?channel=passfail', 0, 0, 'Lots And Land', 'Purchase', 1, '5510 FRIEDEN CHURCH ROAD', 'McLeansville', 'NC', '27301', 'US', 'Great site for development. Lots of road frontage. Located across from shopping at a four\n            way intersection. There is a 1,344 sq. ft. former Post Office building also on the site. Septic tank does\n            not work.\n        ', '2016-08-20 21:52:03', 'root');

-- --------------------------------------------------------

--
-- Table structure for table `tblphotos`
--

CREATE TABLE IF NOT EXISTS `tblphotos` (
  `photoIndex` int(11) NOT NULL AUTO_INCREMENT,
  `mlsNumber` int(11) NOT NULL,
  `photoUrl` varchar(200) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(25) NOT NULL,
  PRIMARY KEY (`photoIndex`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=403 ;

--
-- Dumping data for table `tblphotos`
--

INSERT INTO `tblphotos` (`photoIndex`, `mlsNumber`, `photoUrl`, `timestamp`, `user`) VALUES
(361, 12777, 'http://photos.listhub.net/BCMLSIA/12777/1?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(362, 12777, 'http://photos.listhub.net/BCMLSIA/12777/2?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(363, 12777, 'http://photos.listhub.net/BCMLSIA/12777/3?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(364, 12777, 'http://photos.listhub.net/BCMLSIA/12777/4?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(365, 12777, 'http://photos.listhub.net/BCMLSIA/12777/5?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(366, 12777, 'http://photos.listhub.net/BCMLSIA/12777/6?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(367, 12777, 'http://photos.listhub.net/BCMLSIA/12777/7?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(368, 12777, 'http://photos.listhub.net/BCMLSIA/12777/8?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(369, 12777, 'http://photos.listhub.net/BCMLSIA/12777/9?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(370, 12777, 'http://photos.listhub.net/BCMLSIA/12777/10?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(371, 12777, 'http://photos.listhub.net/BCMLSIA/12777/11?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(372, 12777, 'http://photos.listhub.net/BCMLSIA/12777/12?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(373, 12777, 'http://photos.listhub.net/BCMLSIA/12777/13?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(374, 12777, 'http://photos.listhub.net/BCMLSIA/12777/14?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(375, 12777, 'http://photos.listhub.net/BCMLSIA/12777/15?lm=20160106T175645', '2016-08-22 04:03:53', 'root'),
(376, 54149, 'http://photos.listhub.net/BABORNC/54149/1?lm=20131113T212638', '2016-08-22 04:03:53', 'root'),
(377, 66535, 'http://photos.listhub.net/BABORNC/66535/1?lm=20150114T232426', '2016-08-22 04:03:53', 'root'),
(378, 66535, 'http://photos.listhub.net/BABORNC/66535/2?lm=20150114T232426', '2016-08-22 04:03:53', 'root'),
(379, 66535, 'http://photos.listhub.net/BABORNC/66535/3?lm=20150114T232426', '2016-08-22 04:03:53', 'root'),
(380, 66535, 'http://photos.listhub.net/BABORNC/66535/4?lm=20150114T232426', '2016-08-22 04:03:53', 'root'),
(381, 71218, 'http://photos.listhub.net/BABORNC/71218/1?lm=20110224T031709', '2016-08-22 04:03:53', 'root'),
(382, 12777, 'http://photos.listhub.net/BCMLSIA/12777/1?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(383, 12777, 'http://photos.listhub.net/BCMLSIA/12777/2?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(384, 12777, 'http://photos.listhub.net/BCMLSIA/12777/3?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(385, 12777, 'http://photos.listhub.net/BCMLSIA/12777/4?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(386, 12777, 'http://photos.listhub.net/BCMLSIA/12777/5?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(387, 12777, 'http://photos.listhub.net/BCMLSIA/12777/6?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(388, 12777, 'http://photos.listhub.net/BCMLSIA/12777/7?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(389, 12777, 'http://photos.listhub.net/BCMLSIA/12777/8?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(390, 12777, 'http://photos.listhub.net/BCMLSIA/12777/9?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(391, 12777, 'http://photos.listhub.net/BCMLSIA/12777/10?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(392, 12777, 'http://photos.listhub.net/BCMLSIA/12777/11?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(393, 12777, 'http://photos.listhub.net/BCMLSIA/12777/12?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(394, 12777, 'http://photos.listhub.net/BCMLSIA/12777/13?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(395, 12777, 'http://photos.listhub.net/BCMLSIA/12777/14?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(396, 12777, 'http://photos.listhub.net/BCMLSIA/12777/15?lm=20160106T175645', '2016-08-22 05:14:46', 'root'),
(397, 54149, 'http://photos.listhub.net/BABORNC/54149/1?lm=20131113T212638', '2016-08-22 05:14:46', 'root'),
(398, 66535, 'http://photos.listhub.net/BABORNC/66535/1?lm=20150114T232426', '2016-08-22 05:14:46', 'root'),
(399, 66535, 'http://photos.listhub.net/BABORNC/66535/2?lm=20150114T232426', '2016-08-22 05:14:46', 'root'),
(400, 66535, 'http://photos.listhub.net/BABORNC/66535/3?lm=20150114T232426', '2016-08-22 05:14:46', 'root'),
(401, 66535, 'http://photos.listhub.net/BABORNC/66535/4?lm=20150114T232426', '2016-08-22 05:14:46', 'root'),
(402, 71218, 'http://photos.listhub.net/BABORNC/71218/1?lm=20110224T031709', '2016-08-22 05:14:46', 'root');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
