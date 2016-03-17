/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50523
Source Host           : localhost:3306
Source Database       : testmate

Target Server Type    : MYSQL
Target Server Version : 50523
File Encoding         : 65001

Date: 2016-03-17 14:05:25
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
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`assetID`),
  UNIQUE KEY `assetID_UNIQUE` (`assetID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of assets
-- ----------------------------
INSERT INTO `assets` VALUES ('1', '1', '2016-02-15', 'WES_TM_0116_1_Path3_Tester5', 'Path 3 for tester 4', '156218644', 'VIDEO', 'APPROVED', null);
INSERT INTO `assets` VALUES ('2', '1', '2016-02-15', 'Test video 2', 'This is the 2nd description', '156218644', 'VIDEO', 'PENDING', null);
INSERT INTO `assets` VALUES ('3', '1', '2016-02-15', 'Final Report', 'This is the final report', 'https://drive.google.com/open?id=0B2xUBlk8YWYwQV9mcmlxdUJWeFE', 'DOCUMENT', 'APPROVED', null);
INSERT INTO `assets` VALUES ('4', '1', '2016-02-10', 'Project Kick Off', 'Today we started the project!!!', '', 'TIMELINE', 'APPROVED', null);
INSERT INTO `assets` VALUES ('5', '1', '2016-02-14', 'Users testing in process', '6 Testers are testing today the videos', '', 'TIMELINE', 'APPROVED', null);
INSERT INTO `assets` VALUES ('6', '1', '2016-03-15', 'XXXX', 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA', '', 'DOCUMENT', 'APPROVED', null);
INSERT INTO `assets` VALUES ('7', '1', '2016-03-01', 'Test', 'test a bit', 'https://youtu.be/1Zn4L7vi9gg', 'VIDEO', 'PENDING', null);
INSERT INTO `assets` VALUES ('8', '1', '2016-03-01', 'Test', 'test a bit', 'https://youtu.be/1Zn4L7vi9gg', 'VIDEO', 'PENDING', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of projects
-- ----------------------------
INSERT INTO `projects` VALUES ('1', '1', 'Login', 'This project was xxxxx', '2016-01-15', '2016-01-29', 'APPROVAL PENDING', 'WES-LOG', '1', '2', '8', '15', '65', '5', '0', '0', '0', '0', '0', '0', '20');
INSERT INTO `projects` VALUES ('2', '1', 'Wonder', 'This was the Wonder project!!!', '2016-01-15', '2016-01-29', 'APPROVAL PENDING', 'WES-WON', '1', '2', '5', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `projects` VALUES ('3', '2', 'New', 'This is new project', '2016-03-09', '2016-03-31', 'IN PROGRESS', 'WES-NEW', '1', '2', '6', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `projects` VALUES ('4', '2', 'Test 1', 'This is test project', '2016-03-09', '2016-03-09', 'DELAYED', 'WES-TEST', '1', '2', '9', '5', '10', '15', '20', '25', '30', '35', '40', '45', null);
INSERT INTO `projects` VALUES ('13', '1', 'Login 123', 'This project was xxxxx', '2016-01-15', '2016-03-14', 'COMPLETED', 'WES-LOG-123-456', '10', '10', '8', '100', '100', '100', '0', '0', '0', '0', '0', '0', null);

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
  `enabled` tinyint(1) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `isCompanyAdmin` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userID_UNIQUE` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '2', 'Jhon', 'Wayne', 'gesseesse@gmail.com', null, '$2y$10$BaWhElKcLeoB5g54CXI7r.ymSMeYjO/9je19/kyHIRK/gTFz.Qsv6', '1', 'QEwV6AR37p6XheSHa953rMfL1GL6PNMmHpwbHF9klI8UW9f31UuNp0DdaYJ6', '2016-03-06', null);
INSERT INTO `users` VALUES ('2', '1', 'Gabriel', 'Esseesse', 'gabriel@testmate.com.au', null, '$2y$10$BaWhElKcLeoB5g54CXI7r.ymSMeYjO/9je19/kyHIRK/gTFz.Qsv6', '0', 'qQGf2n9HZriQZiak60UpjQOEnoxJ6tsaE89NxHFF2Ob3b67koA8cs9NgiROG', '2016-03-06', null);
INSERT INTO `users` VALUES ('3', '1', 'Harold', 'Clark', 'hclark2@360.cn', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('4', '1', 'James', 'Banks', 'jbanks3@yelp.com', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('5', '1', 'Mary', 'Hill', 'mhill4@ning.com', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('6', '1', 'Louise', 'Harper', 'lharper5@cam.ac.uk', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('7', '1', 'Carl', 'Williams', 'cwilliams6@livejournal.com', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('8', '1', 'Joyce', 'Rice', 'jrice7@state.gov', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('9', '1', 'Cheryl', 'Garza', 'cgarza8@wiley.com', null, null, null, null, null, null);
INSERT INTO `users` VALUES ('10', '1', 'Henry', 'Tran', 'henry.tran@qsoftvietnam.com', '1', '$2y$10$jfOXeW9aqtuP4QA0gzn1re6GEoTCsokcrNAmFISBx677PG1m4kx5q', '1', 'obhb6nNBbY6ZnyKDx7PipJSfQXqVJLmNHIUJ0AXodprM8FZmbfqPTTtLxUn2', '2016-03-16', '57617.png');
INSERT INTO `users` VALUES ('11', '2', 'Henry', 'Dev', 'hoaitn@qsoftvietnam.com', null, '$2y$10$GSrK.EA6N0Au1kRIThBsZejkafjOR4RxSEdlUo870fsMnCHIes/IW', null, 'VuhM0oxYy1W78lRkkLzmlpGl1HY3MAW4NllptgerJrPpXqsbx7GbnLMDhrG9', '2016-03-16', null);
INSERT INTO `users` VALUES ('12', '1', 'Hoai', 'nam', 'itlsvn@gmail.com', '1', '$2y$10$usuR0M3XDHAuc95/y0x58e97oHc7o9ZUl6uitY6s2MJE0VEESALVK', '1', null, '2016-03-16', '48204.jpg');
