-- CREATE TABLE `Student` (
--  `sid` VARCHAR(5) NOT NULL,
--  `sname` VARCHAR(20) NOT NULL,
--  `spassword` VARCHAR(20) NOT NULL,
--  PRIMARY KEY (`sid`));
-- 
-- INSERT INTO `Student` VALUES ('S001', 'Sally M. Sampl','sms001');
-- INSERT INTO `Student` VALUES ('S002', 'John W. Smith','jws002');
-- INSERT INTO `Student` VALUES ('S003', 'Elise Diane Welsh','edw003');
-- INSERT INTO `Student` VALUES ('S004', 'Mary Biomajor','mb004');
-- INSERT INTO `Student` VALUES ('S005', 'Jake Mcclean','jm005');
-- INSERT INTO `Student` VALUES ('S006', 'Carly Finance','cf006');
-- INSERT INTO `Student` VALUES('S007','Da Guai Liu','dgl007');
-- 
-- CREATE TABLE `StudentInfo` (
--   `sid` VARCHAR(5) NOT NULL,
--   `suniversity` VARCHAR(45) NOT NULL,
--   `sdegree` VARCHAR(45) NOT NULL,
--   `smajor` VARCHAR(45) NOT NULL,
--   `sgpa` DECIMAL(2,1) NOT NULL,
--   `sinfo` VARCHAR(255) NOT NULL,
--   `srestriction` ENUM('Y', 'N') NOT NULL,
--   `sresumeaddr` VARCHAR(255) NOT NULL,
--   PRIMARY KEY (`sid`,`sresumeaddr`),
--   FOREIGN KEY (`sid`) REFERENCES `Student` (`sid`));
-- 
-- INSERT INTO `StudentInfo` VALUES 
-- ('S001', 'Colorado State University', 'MA','Speech Communication',3.6,'Retail Management','N', '../cv/cv_sally.pdf');
-- INSERT INTO `StudentInfo` VALUES 
-- ('S002', 'University of Arkansas', 'BS','Early Childhood Development',3.4,'care of
-- special needs children and adults','N','../cv/cv_john.pdf');
-- INSERT INTO `StudentInfo` VALUES 
-- ('S003', 'American University', 'MA','International Relations',3.6,'Social Study and Education','N','../cv/cv_elise.pdf');
-- INSERT INTO `StudentInfo` VALUES 
-- ('S004', 'American University', 'BS','Biology',3.8,'Biology research and social programming','N','../cv/cv_mary.pdf');
-- INSERT INTO `StudentInfo` VALUES 
-- ('S005', 'New York University', 'JD','Law',3.9,'Legal Assistant and Legislative Assistant','Y','../cv/cv_jake.pdf');
-- INSERT INTO `StudentInfo` VALUES 
-- ('S006', 'Columbia University','MBA','Finance',3.7,'Finance MBA Development Program','Y','../cv/cv_carly.pdf');
-- INSERT INTO `StudentInfo` VALUES 
-- ('S007', 'New York University','MS','Engineering',3.7,'Database System and computer vision','Y','../cv/cv_daguai.pdf');
-- 
-- -- INSERT INTO `StudentInfo` VALUES ('S001', 'Colorado State University', 3.6,'Retail Management','https://www.id.uscourts.gov/Content_Fetcher/index.cfml/Sample_Chronological_Resume_132.pdf?Content_ID=132');
-- -- INSERT INTO `StudentInfo` VALUES ('S002', 'University of Arkansas', 3.4,'Early Childhood Development','https://writing.colostate.edu/guides/documents/resume/functionalSample.pdf');
-- -- INSERT INTO `StudentInfo` VALUES ('S003', 'American University', 3.6,'International Relations','https://www.american.edu/careercenter/upload/Functional-Format-Resume-Sample.pdf');
-- -- INSERT INTO `StudentInfo` VALUES ('S004', 'American University', 3.8,'Biology','https://www.american.edu/careercenter/upload/Curriculum-Vitae-Samples.pdf');
-- -- INSERT INTO `StudentInfo` VALUES ('S005', 'New York University', 3.9,'Law','http://www.law.nyu.edu/sites/default/files/ECM_PRO_060550.pdf');
-- -- INSERT INTO `StudentInfo` VALUES ('S006', 'Columbia University',3.7,'Finance','https://www8.gsb.columbia.edu/career-management/sites/career-management/files/files/2.1%20%20Professional%20Branding_Corporate%20Finance_Resumes.pdf');
-- 
-- CREATE TABLE `ResumeInfo`(
--   `sid` VARCHAR(5) NOT NULL,
--   `sresumeaddr` VARCHAR(255) NOT NULL,
--   `resumecontent` BLOB NOT NULL,
--   PRIMARY KEY (`sid`,`sresumeaddr`),
--   FOREIGN KEY (`sid`,`sresumeaddr`) REFERENCES `StudentInfo` (`sid`,`sresumeaddr`));
-- 
-- CREATE TABLE `Friends` (
--   `sid` VARCHAR(5) NOT NULL,
--   `fid` VARCHAR(5) NOT NULL,
--   PRIMARY KEY (`sid`, `fid`),
--   FOREIGN KEY (`sid`) REFERENCES `Student` (`sid`),
--   FOREIGN KEY (`fid`) REFERENCES `Student` (`sid`));
-- 
-- INSERT INTO `Friends` VALUES ('S001','S002');INSERT INTO `Friends` VALUES ('S002','S001');
-- INSERT INTO `Friends` VALUES ('S001','S003');INSERT INTO `Friends` VALUES ('S003','S001');
-- INSERT INTO `Friends` VALUES ('S005','S007');INSERT INTO `Friends` VALUES ('S007','S005');
-- 
-- CREATE TABLE `FriendRequest` (
--   `sid` VARCHAR(5) NOT NULL,
--   `rid` VARCHAR(5) NOT NULL,
--   `requesttime` DATETIME NOT NULL,
--   `frstatus` ENUM('Pending', 'Agreed','Rejected') NOT NULL,
--   PRIMARY KEY (`sid`, `rid`,`requesttime`),
--   FOREIGN KEY (`sid`) REFERENCES `Student` (`sid`),
--   FOREIGN KEY (`rid`) REFERENCES `Student` (`sid`));
-- 
-- INSERT INTO `FriendRequest` VALUES ('S001', 'S004', '2017-11-15','Pending');
-- INSERT INTO `FriendRequest` VALUES ('S001', 'S005', '2018-04-17','Rejected');
-- INSERT INTO `FriendRequest` VALUES ('S005', 'S001', '2018-01-01','Pending');
-- INSERT INTO `FriendRequest` VALUES ('S007', 'S001', '2018-04-20','Pending');
-- 
-- CREATE TABLE `FriendMessage` (
--   `sid` VARCHAR(5) NOT NULL,
--   `fid` VARCHAR(5) NOT NULL,
--   `mdate` DATETIME NOT NULL,
--   `message` BLOB NOT NULL,
--   PRIMARY KEY (`sid`, `fid`,`mdate`),
--   FOREIGN KEY (`sid`,`fid`) REFERENCES `Friends` (`sid`,`fid`));
-- 
-- INSERT INTO `FriendMessage` VALUES ('S001', 'S002', '2018-03-12 12:00:00','Hope you find job before you graduate!');
-- INSERT INTO `FriendMessage` VALUES ('S002', 'S001', '2018-03-12 12:10:00','Thank you, you too.');
-- INSERT INTO `FriendMessage` VALUES ('S001', 'S003', '2018-04-17 18:00:00','Hello nice to meet you');
-- 
-- CREATE TABLE `FriendTrigger` (
--   `sid` VARCHAR(5) NOT NULL,
--   `fmesTrigger` BOOLEAN NOT NULL,
--   `fmesFrom` VARCHAR(5),
--   `freqTrigger` BOOLEAN NOT NULL,
--   `freqFrom` VARCHAR(5),
--   PRIMARY KEY (`sid`),
--   FOREIGN KEY (`sid`) REFERENCES `Student` (`sid`));










-- CREATE TABLE `CompanySign` (
--   `cid` VARCHAR(5) NOT NULL,
--   `cemail` VARCHAR (50) NOT NULL,
--   `cpassword` VARCHAR(20) NOT NULL,
--   PRIMARY KEY (`cid`));
-- 
-- INSERT INTO `CompanySign` VALUES ('C01','recruiter@adobe.com','adobe');
-- INSERT INTO `CompanySign` VALUES ('C02','recruiter@apple.com','apple');
-- INSERT INTO `CompanySign` VALUES ('C03','recruiter@amazon.com','amazon');
-- INSERT INTO `CompanySign` VALUES ('C04','recruiter@oracle.com','oracle');
-- INSERT INTO `CompanySign` VALUES ('C05','recruiter@telsa.com','tesla');
-- INSERT INTO `CompanySign` VALUES ('C06','recruiter@microsoft.com','microsoft');
-- 
-- CREATE TABLE `Company` (
--   `cid` VARCHAR(5) NOT NULL,
--   `cname` VARCHAR(45) NOT NULL,
--   `ccity` VARCHAR(20) NOT NULL,
--   `cstate` VARCHAR(20) NOT NULL,
--   `cindustry` VARCHAR(45) NOT NULL,
--   PRIMARY KEY (`cid`),
--   FOREIGN KEY (`cid`) REFERENCES `CompanySign` (`cid`));
-- 
-- INSERT INTO `Company` VALUES ('C01', 'Adobe', 'San Jose', 'CA', 'Computer Software');
-- INSERT INTO `Company` VALUES ('C02', 'Apple', 'Cupertino', 'CA', 'Consumer Electronics');
-- INSERT INTO `Company` VALUES ('C03', 'Amazon', 'Seattle', 'WA', 'Internet');
-- INSERT INTO `Company` VALUES ('C04', 'Oracle', 'Redwood', 'CA', 'IT&Services');
-- INSERT INTO `Company` VALUES ('C05', 'Tesla', 'Palo Alto', 'CA', 'Automotive');
-- INSERT INTO `Company` VALUES ('C06', 'Microsoft', 'Redmond', 'WA', 'Consumer Electronics');
-- 
-- 
-- CREATE TABLE `JobInfo` (
--   `jid` VARCHAR(5) NOT NULL,
--   `cid` VARCHAR(5) NOT NULL,
--   `jcity` VARCHAR(20) NOT NULL,
--   `jstate` VARCHAR(40) NOT NULL,
--   `jtitle` VARCHAR(45) NOT NULL,
--   `jsalary` INTEGER(1) NOT NULL,
--   `jdegree` VARCHAR(10) NOT NULL,
--   `jmajor` VARCHAR(45) NOT NULL,
--   `jpostdate` DATETIME NOT NULL,
--   `jdesc` TEXT NOT NULL,
--   PRIMARY KEY (`jid`),
--   FOREIGN KEY (`cid`) REFERENCES `Company` (`cid`));
-- -- 
-- INSERT INTO `JobInfo` VALUES ('J001', 'C02', 'New York','NY','Manager',100000,'BS','Any','2018-04-14','As a Manager, you are responsible for inspiring your team to create ownership opportunities for customers on the sales floor.');
-- INSERT INTO `JobInfo` VALUES ('J002', 'C02', 'Berkeley','CA','Software Engineer',150000,'MS','Computer Science','2017-04-14','You will work in a small team of backend service engineers to build new services from the ground-up, as well as integrate new features into Apple services such as iCloud.');
-- INSERT INTO `JobInfo` VALUES ('J003', 'C02', 'Los Angeles','CA','Market Leader',100000,'BS','Marketing','2018-01-01','Create the vision for the market or country that aligns with the brand and purpose.');
-- INSERT INTO `JobInfo` VALUES ('J004', 'C03', 'Palo Alto','CA','UX Designer',80000,'BS','Any','2018-04-19','It will be a fast-paced, entrepreneurial, but test driven environment seeking to inform critical and tough decisions with research. You will work collaboratively with designers, researchers, product managers, developers, users, and executive to create world-class experiences to customers. ');
-- INSERT INTO `JobInfo` VALUES ('J005', 'C03', 'New York','NY','Data Engineer',150000,'MS','Computer Science','2017-12-01','Design, develop, implement, test, document, and operate large-scale, high-volume, high-performance data structures for business intelligence analytics.');
-- INSERT INTO `JobInfo` VALUES ('J006', 'C03', 'Seattle','WA','Economist',150000,'PhD','Economics','2018-02-04','Are you passionate about building data-driven solutions to drive the profitability of the business? Are you excited about solving complex real world problems? Do you have proven analytical capabilities, exceptional communication, project management skills?');
-- INSERT INTO `JobInfo` VALUES ('J007', 'C03', 'Memphis','TN','HR Business Partner',60000,'BS','Any','2018-03-12','At Amazon, we are working to be the most customer-centric company on earth. To get there, we need exceptionally talented, bright, and driven people.');
-- INSERT INTO `JobInfo` VALUES ('J008', 'C05', 'Draper','UT','Administrative Specialist',70000,'BS','Business','2017-08-19','The Business Processing Team that is part of our Energy Products Division is currently hiring for two positions: the Document Processing Specialist and the Document Generation Specialist.');
-- INSERT INTO `JobInfo` VALUES ('J009', 'C05', 'Fremont','CA','Data and Analytics Engineer',150000,'MS','Computer Science','2018-04-14','The Data and Analytics Engineer will participate end to end on the Tesla Finance BI project; developing reports, dashboards, ETLs and database models that enables business decision makers mostly using Microsoft BI and database technologies.');
-- 
--  
CREATE TABLE `Follow` (
  `sid` VARCHAR(5) NOT NULL,
  `cid` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`sid`, `cid`),
  FOREIGN KEY (`sid`) REFERENCES `Student` (`sid`),
  FOREIGN KEY (`cid`) REFERENCES `Company` (`cid`));

INSERT INTO `Follow` VALUES ('S001', 'C01');
INSERT INTO `Follow` VALUES ('S001', 'C02');
INSERT INTO `Follow` VALUES ('S005', 'C06');


CREATE TABLE `JobApply` (
  `sid` VARCHAR(5) NOT NULL,
  `jid` VARCHAR(5) NOT NULL,
  `cid` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`sid`, `jid`),
  FOREIGN KEY (`sid`) REFERENCES `Student` (`sid`),
  FOREIGN KEY (`jid`) REFERENCES `JobInfo` (`jid`),
  FOREIGN KEY (`cid`) REFERENCES `Company` (`cid`));

INSERT INTO `JobApply` VALUES ('S001', 'J001', 'C02');
INSERT INTO `JobApply` VALUES ('S001', 'J002', 'C02');


CREATE TABLE `JobNotifications` (
  `sid` VARCHAR(5) NOT NULL,
  `jid` VARCHAR(5) NOT NULL,
  `cid` VARCHAR(5) NOT NULL,
  `NotifyDate` DATETIME NOT NULL,
  `ViewStstus` ENUM('Viewed','New') NOT NULL,
  PRIMARY KEY (`sid`, `jid`),
  FOREIGN KEY (`sid`) REFERENCES `Student` (`sid`),
  FOREIGN KEY (`jid`) REFERENCES `JobInfo` (`jid`),
  FOREIGN KEY (`cid`) REFERENCES `Company` (`cid`));

INSERT INTO `JobNotifications` VALUES ('S001', 'J001', 'C02', '2018-04-14 00:00:00', 'Viewed');
INSERT INTO `JobNotifications` VALUES ('S001', 'J002', 'C02', '2018-04-05 00:00:00', 'New');
INSERT INTO `JobNotifications` VALUES ('S001', 'J003', 'C02', '2018-01-01 00:00:00', 'New');

CREATE TABLE `Forward` (
  `sid` VARCHAR(5) NOT NULL,
  `fid` VARCHAR(5) NOT NULL,
  `jid` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`sid`, `fid`,`jid`),
  FOREIGN KEY (`sid`) REFERENCES `Student` (`sid`),
  FOREIGN KEY (`jid`) REFERENCES `JobInfo` (`jid`),
  FOREIGN KEY (`fid`) REFERENCES `Friends` (`fid`));
