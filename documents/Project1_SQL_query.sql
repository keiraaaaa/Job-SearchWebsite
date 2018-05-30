# 1
INSERT INTO `Student` VALUES('S007','Da Guai Liu','dgl007');
#2
SELECT Student.sname
FROM Friends, Student
WHERE Student.sid = Friends.fid
AND Friends.sid = "S001"
#3
DELETE FROM FriendRequest
WHERE TIMESTAMPDIFF(MONTH, requesttime, CURDATE()) > 1
AND frstatus != 'Agreed'
#4
SELECT StudentInfo.sid
FROM Follow, StudentInfo, Company
WHERE Follow.sid = StudentInfo.sid AND Follow.cid = Company.cid
AND StudentInfo.suniversity = 'New York University'
AND Company.cname = 'Microsoft'
AND Follow.followstatus = 'Followed'
#5
SELECT jid
FROM JobInfo
WHERE TIMESTAMPDIFF(DAY, jpostdate, CURDATE()) >= 7
AND TIMESTAMPDIFF(DAY, jpostdate, CURDATE()) < 14
AND jdegree = 'MS' AND jmajor = 'Computer Science'
#6
SELECT StudentInfo.sid
FROM StudentInfo, ResumeInfo
WHERE StudentInfo.sid = ResumeInfo.sid AND StudentInfo.sresumeaddr = ResumeInfo.sresumeaddr
AND sgpa > '3.5' AND resumecontent like '%database%' collate utf8_general_ci

INSERT INTO `JobNotifications` VALUES (sid, 'J009','C05');