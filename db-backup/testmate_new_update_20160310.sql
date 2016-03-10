/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50523
Source Host           : localhost:3306
Source Database       : testmate

Target Server Type    : MYSQL
Target Server Version : 50523
File Encoding         : 65001

Date: 2016-03-10 16:18:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for assets
-- ----------------------------
DROP TABLE IF EXISTS `assets`;
CREATE TABLE `assets` (
  `assetID` int(11) NOT NULL AUTO_INCREMENT,
  `projectID` int(11) DEFAULT NULL,
  `uploadDate` date DEFAULT NULL,
  `name` varchar(450) DEFAULT NULL,
  `description` text,
  `url` varchar(500) DEFAULT NULL,
  `assetType` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`assetID`),
  UNIQUE KEY `assetID_UNIQUE` (`assetID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of assets
-- ----------------------------
INSERT INTO `assets` VALUES ('1', '1', '2016-02-15', 'WES_TM_0116_1_Path3_Tester5', 'Path 3 for tester 4', '156218644', 'VIDEO', 'APPROVED');
INSERT INTO `assets` VALUES ('2', '1', '2016-02-15', 'Test video 2', 'This is the 2nd description', '156218644', 'VIDEO', 'PENDING');
INSERT INTO `assets` VALUES ('3', '1', '2016-02-15', 'Final Report', 'This is the final report', 'https://drive.google.com/open?id=0B2xUBlk8YWYwQV9mcmlxdUJWeFE', 'DOCUMENT', 'APPROVED');
INSERT INTO `assets` VALUES ('4', '1', '2016-02-10', 'Project Kick Off', 'Today we started the project!!!', '', 'TIMELINE', 'APPROVED');
INSERT INTO `assets` VALUES ('5', '1', '2016-02-14', 'Users testing in process', '6 Testers are testing today the videos', '', 'TIMELINE', 'APPROVED');
INSERT INTO `assets` VALUES ('6', '1', '2016-03-15', 'XXXX', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '', 'DOCUMENT', 'APPROVED');

-- ----------------------------
-- Table structure for comments
-- ----------------------------
DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `assetID` int(11) NOT NULL,
  `senderUserID` int(11) DEFAULT NULL,
  `receiverUserID` int(11) DEFAULT NULL,
  `comment` varchar(2000) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of comments
-- ----------------------------
INSERT INTO `comments` VALUES ('1', '2', '1', '2', 'xxx', '2016-03-05 12:08:29');
INSERT INTO `comments` VALUES ('2', '2', '1', '2', 'aaaa', '2016-03-05 12:09:23');
INSERT INTO `comments` VALUES ('3', '2', '1', '2', 'aaaa', '2016-03-05 12:09:57');
INSERT INTO `comments` VALUES ('4', '2', '1', '2', 'aaaa', '2016-03-05 12:10:02');
INSERT INTO `comments` VALUES ('5', '2', '1', '2', 'aaaa', '2016-03-05 12:10:10');
INSERT INTO `comments` VALUES ('6', '2', '1', '2', 'aaaa', '2016-03-05 12:15:06');
INSERT INTO `comments` VALUES ('7', '2', '1', '2', 'aaaa', '2016-03-05 12:15:16');
INSERT INTO `comments` VALUES ('8', '1', '11', '1', 'asasas', '2016-03-08 08:29:46');

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies` (
  `companyID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`companyID`),
  UNIQUE KEY `companyID_UNIQUE` (`companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES ('1', 'TestMate', 'testmate-logo.png');
INSERT INTO `companies` VALUES ('2', 'Westpac', 'westpac-logo.jpg');

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL AUTO_INCREMENT,
  `companyID` int(11) DEFAULT NULL,
  `name` varchar(450) DEFAULT NULL,
  `description` text,
  `startingDate` date DEFAULT NULL,
  `lastUpdateDate` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `code` varchar(45) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `adminID` int(11) DEFAULT NULL,
  `testersAmount` int(11) DEFAULT NULL,
  `projectBriefPercentCompleted` int(11) DEFAULT NULL,
  `kickOffMeetingPercentCompleted` int(11) DEFAULT NULL,
  `recruitmentPercentCompleted` int(11) DEFAULT NULL,
  `userTestPlanPercentCompleted` int(11) DEFAULT NULL,
  `userTestingPercentCompleted` int(11) DEFAULT NULL,
  `resultsAnalysisPercentCompleted` int(11) DEFAULT NULL,
  `preliminaryFindingsPercentCompleted` int(11) DEFAULT NULL,
  `finalReportPercentCompleted` int(11) DEFAULT NULL,
  `highlightsVideoPercentCompleted` int(11) DEFAULT NULL,
  `susScore` int(11) DEFAULT NULL,
  PRIMARY KEY (`projectID`),
  UNIQUE KEY `projectID_UNIQUE` (`projectID`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES ('1', '1', 'Login', 'This project was xxxxx', '2016-01-15', '2016-01-29', 'COMPLETED', 'WES-LOG', '1', '2', '8', '20', '50', '40', '30', '30', '30', '30', '30', '20', '20');
INSERT INTO `projects` VALUES ('2', '1', 'Wonder', 'This was the Wonder project!!!', '2016-01-15', '2016-01-29', 'APPROVAL PENDING', 'WES-WON', '1', '2', '5', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `projects` VALUES ('3', '1', 'New', 'This is new project', '2016-03-09', '2016-03-31', 'IN PROGRESS', 'WES-NEW', '1', '2', '6', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `projects` VALUES ('4', '1', 'Test 1', 'This is test project', '2016-03-09', '2016-03-09', 'DELAYED', 'WES-TEST', '1', '2', '9', null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `companyID` int(11) DEFAULT NULL,
  `firstName` varchar(250) DEFAULT NULL,
  `lastName` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `enabled` bit(1) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `isCompanyAdmin` bit(1) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userID_UNIQUE` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '2', 'Jhon', 'Wayne', 'gesseesse@gmail.com', null, '$2y$10$BaWhElKcLeoB5g54CXI7r.ymSMeYjO/9je19/kyHIRK/gTFz.Qsv6', '', 'QEwV6AR37p6XheSHa953rMfL1GL6PNMmHpwbHF9klI8UW9f31UuNp0DdaYJ6', '2016-03-06');
INSERT INTO `users` VALUES ('2', '1', 'Gabriel', 'Esseesse', 'gabriel@testmate.com.au', null, '$2y$10$BaWhElKcLeoB5g54CXI7r.ymSMeYjO/9je19/kyHIRK/gTFz.Qsv6', '\0', 'qQGf2n9HZriQZiak60UpjQOEnoxJ6tsaE89NxHFF2Ob3b67koA8cs9NgiROG', '2016-03-06');
INSERT INTO `users` VALUES ('3', '1', 'Harold', 'Clark', 'hclark2@360.cn', null, null, null, null, null);
INSERT INTO `users` VALUES ('4', '1', 'James', 'Banks', 'jbanks3@yelp.com', null, null, null, null, null);
INSERT INTO `users` VALUES ('5', '1', 'Mary', 'Hill', 'mhill4@ning.com', null, null, null, null, null);
INSERT INTO `users` VALUES ('6', '1', 'Louise', 'Harper', 'lharper5@cam.ac.uk', null, null, null, null, null);
INSERT INTO `users` VALUES ('7', '1', 'Carl', 'Williams', 'cwilliams6@livejournal.com', null, null, null, null, null);
INSERT INTO `users` VALUES ('8', '1', 'Joyce', 'Rice', 'jrice7@state.gov', null, null, null, null, null);
INSERT INTO `users` VALUES ('9', '1', 'Cheryl', 'Garza', 'cgarza8@wiley.com', null, null, null, null, null);
INSERT INTO `users` VALUES ('10', '1', 'Henry', 'Tran', 'henry.tran@qsoftvietnam.com', null, '$2y$10$jfOXeW9aqtuP4QA0gzn1re6GEoTCsokcrNAmFISBx677PG1m4kx5q', '', 'b2t0GoEeNTRK4O80jQPCh2gjmZXGQLB5XaxmkMQaPl4wYBO75LF1cPCXlEir', null);
INSERT INTO `users` VALUES ('11', '1', 'Henry', 'Dev', 'hoaitn@qsoftvietnam.com', null, '$2y$10$jfOXeW9aqtuP4QA0gzn1re6GEoTCsokcrNAmFISBx677PG1m4kx5q', null, 'MwhfRhcINvj5OVNv6nlEMX1QZPF0Q1nd7AlrZXjoxoj6VVi6tQUZI7FFTcXX', '2016-03-09');
