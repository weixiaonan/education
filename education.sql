/*
SQLyog v10.2 
MySQL - 5.5.53 : Database - education
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`education` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `education`;

/*Table structure for table `action_log` */

DROP TABLE IF EXISTS `action_log`;

CREATE TABLE `action_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL DEFAULT '' COMMENT '地址',
  `parameters` text NOT NULL,
  `ip` varchar(20) DEFAULT '',
  `browser` varchar(512) DEFAULT '',
  `uid` int(5) NOT NULL DEFAULT '0',
  `addtime` int(11) DEFAULT NULL,
  `insert_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10576 DEFAULT CHARSET=utf8;

/*Data for the table `action_log` */


/*Table structure for table `advices` */

DROP TABLE IF EXISTS `advices`;

CREATE TABLE `advices` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT '',
  `content` text,
  `add_uid` int(5) DEFAULT '0',
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='建言献策';

/*Data for the table `advices` */

insert  into `advices`(`id`,`title`,`content`,`add_uid`,`add_time`) values (1,'系统建设','希望系统更加完善和功能人性化',1,1523955103);

/*Table structure for table `attachment` */

DROP TABLE IF EXISTS `attachment`;

CREATE TABLE `attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) DEFAULT '' COMMENT '原文件名称',
  `file_size` varchar(20) DEFAULT '' COMMENT '文件大小',
  `download_num` int(5) DEFAULT '0' COMMENT '下载次数',
  `filepath` varchar(255) DEFAULT '',
  `uid` int(5) DEFAULT '0',
  `ip` varchar(20) DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '附件类型，1是教学课件，2是教学视频，3是文体活动的，4是创新工作，5是民警荣誉证书',
  `data_id` int(11) DEFAULT '0' COMMENT '属于哪条数据',
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `attachment` */

insert  into `attachment`(`id`,`file_name`,`file_size`,`download_num`,`filepath`,`uid`,`ip`,`type`,`data_id`,`add_time`) values (21,'创新工作文档.doc','9.5 KB',1,'./uploads/attachment/20180416/1de82ec2fc6397eee9d048f26b83f930.doc',1,'127.0.0.1',4,3,1523843009),(20,'考勤系统使用文档.doc','217 KB',1,'./uploads/attachment/20171127/d42f4ac6712bd99453379adf81d98b92.doc',1,'127.0.0.1',3,0,1511752254),(10,'安置房申请表数据导出2017-11-06-13-38.xls','5.5 KB',0,'./uploads/attachment/20171122/525bc0c56bd2b198312804837792e0f3.xls',1,'127.0.0.1',1,0,1511322255),(11,'安置房申请表数据导出2017-11-06-15-04.xls','247 KB',0,'./uploads/attachment/20171122/78bb6f44da0bd1f10a10b029e14f960a.xls',1,'127.0.0.1',1,0,1511322312),(15,'Free-Converter.com-save_data-77334905.png','273.59 KB',0,'./uploads/attachment/20171122/2c879a6c6cba318c0eeece4b80e666b6.png',1,'127.0.0.1',1,0,1511333190),(16,'考勤系统使用文档.doc','217 KB',0,'./uploads/attachment/20171122/eaf64cd1186108c29fc7a991c901e178.doc',1,'127.0.0.1',1,0,1511333199),(17,'考勤系统使用文档.doc','217 KB',0,'./uploads/attachment/20171122/8c75e02dce6a706de7013bb8c954c662.doc',1,'127.0.0.1',1,0,1511333268),(18,'各省会广播电台APP.docx','4.73 MB',1,'./uploads/attachment/20171122/8c5eef08c90a7b3045c22e88c19e9808.docx',1,'127.0.0.1',2,0,1511333327),(19,'各省会广播电台APP.docx','4.73 MB',2,'./uploads/attachment/20171122/cbf25ac80e380a2941aaab9a283e9dc6.docx',1,'127.0.0.1',3,1,1511333669);

/*Table structure for table `ci_access` */

DROP TABLE IF EXISTS `ci_access`;

CREATE TABLE `ci_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) DEFAULT NULL,
  `n_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `r_id` (`r_id`) USING BTREE,
  KEY `n_id` (`n_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2363 DEFAULT CHARSET=utf8;

/*Data for the table `ci_access` */

insert  into `ci_access`(`id`,`r_id`,`n_id`) values (2262,2,53),(2261,2,52),(2260,2,51),(2259,2,9),(2258,2,2),(2359,1,86),(2358,1,18),(2357,1,17),(2356,1,21),(2355,1,16),(2354,1,15),(2353,1,13),(2352,1,12),(2351,1,11),(2350,1,46),(2257,2,1),(2256,2,94),(2255,2,50),(2349,1,20),(2348,1,33),(2347,1,34),(2346,1,40),(2345,1,19),(2344,1,82),(2343,1,80),(2342,1,79),(2341,1,78),(2340,1,76),(2339,1,75),(2338,1,74),(2337,1,73),(2336,1,54),(2335,1,49),(1723,3,20),(1722,3,19),(1721,3,73),(1720,3,55),(1719,3,69),(1718,3,63),(1717,3,8),(1716,3,7),(1715,3,6),(1714,3,5),(1713,3,26),(1712,3,25),(1711,3,24),(1710,3,23),(1709,3,22),(1708,3,58),(1707,3,3),(1706,3,9),(1705,3,2),(2334,1,55),(2333,1,30),(2332,1,69),(2331,1,63),(2330,1,62),(2329,1,61),(2328,1,60),(2327,1,59),(2326,1,47),(2325,1,8),(2324,1,7),(2323,1,6),(2322,1,5),(2321,1,26),(2320,1,25),(2319,1,24),(2318,1,23),(2317,1,22),(2316,1,39),(2315,1,37),(2314,1,36),(2313,1,98),(2312,1,97),(2311,1,95),(2310,1,93),(2309,1,92),(2308,1,71),(2307,1,91),(2306,1,84),(2305,1,58),(1704,3,72),(1703,3,48),(1702,3,45),(1701,3,1),(1700,3,14),(1699,3,50),(1724,3,46),(1725,3,11),(2304,1,53),(2303,1,52),(2302,1,51),(2301,1,85),(2300,1,4),(2299,1,3),(2298,1,9),(2297,1,2),(2296,1,77),(2295,1,72),(2294,1,64),(2293,1,48),(2292,1,45),(2291,1,1),(2290,1,14),(2289,1,35),(2288,1,96),(2287,1,94),(2286,1,90),(2285,1,50),(2263,2,58),(2264,2,84),(2265,2,95),(2266,2,5),(2267,2,6),(2268,2,7),(2269,2,8),(2270,2,19),(2271,2,20),(2272,6,50),(2273,6,94),(2274,6,90),(2275,6,51),(2276,6,52),(2277,6,53),(2278,6,58),(2279,6,84),(2280,6,95),(2281,6,91),(2282,6,71),(2283,6,92),(2284,6,93),(2360,1,87),(2361,1,88),(2362,1,89);

/*Table structure for table `ci_group` */

DROP TABLE IF EXISTS `ci_group`;

CREATE TABLE `ci_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT '',
  `status` tinyint(1) DEFAULT '1',
  `sort` tinyint(4) DEFAULT NULL,
  `remark` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `ci_group` */

insert  into `ci_group`(`id`,`title`,`status`,`sort`,`remark`) values (1,'训练计划管理',1,5,''),(2,'创新工作管理',1,7,''),(3,'系统设置',1,10,''),(4,'文体活动管理',1,8,''),(5,'训练教官管理',1,4,''),(6,'评价管理',1,9,''),(7,'训练档案管理',1,3,''),(8,'民警信息管理',1,2,''),(9,'在线考试管理',1,6,'');

/*Table structure for table `ci_node` */

DROP TABLE IF EXISTS `ci_node`;

CREATE TABLE `ci_node` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `d` varchar(100) DEFAULT '',
  `c` varchar(100) DEFAULT '',
  `f` varchar(100) DEFAULT '',
  `title` varchar(200) DEFAULT '',
  `remark` varchar(100) DEFAULT '',
  `sort` tinyint(4) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `pid` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `gid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `d` (`d`) USING BTREE,
  KEY `c` (`c`) USING BTREE,
  KEY `f` (`f`) USING BTREE,
  KEY `status` (`status`) USING BTREE,
  KEY `level` (`level`) USING BTREE,
  KEY `pid` (`pid`) USING BTREE,
  KEY `gid` (`gid`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

/*Data for the table `ci_node` */

insert  into `ci_node`(`id`,`d`,`c`,`f`,`title`,`remark`,`sort`,`status`,`pid`,`level`,`gid`) values (1,'admin','Curriculum','index','管理培训计划','',1,1,0,1,1),(2,'admin','Innovate_work','index','管理创新工作','',1,1,0,1,2),(3,'admin','User','index','用户管理','',1,1,0,1,3),(4,'admin','Role','index','角色管理','',2,1,0,1,3),(5,'admin','Curriculum','add','新增','',2,1,1,3,1),(6,'admin','Curriculum','mark','培训评价','',2,1,1,3,1),(7,'admin','Curriculum','edit','修改','',3,1,1,3,1),(8,'admin','Curriculum','del','删除','',5,1,1,3,1),(9,'admin','Sports_ac','index','管理文体活动','',1,1,0,1,4),(10,'admin','Mark','index','管理评价','',1,1,0,1,6),(11,'admin','User','user_add','新增','',2,1,3,3,3),(12,'admin','User','user_edit','修改','',3,1,3,3,3),(13,'admin','User','user_del','删除','',4,1,3,3,3),(14,'admin','Drillmaster','index','管理教官','',1,1,0,1,5),(15,'admin','Role','role_add','新增','',2,1,4,3,3),(16,'admin','Role','role_edit','修改','',3,1,4,3,3),(17,'admin','Role','role_set','设置权限','',5,1,4,3,3),(18,'admin','Role','role_del','删除','',6,1,4,3,3),(19,'admin','Innovate_work','add','添加','',1,1,2,3,2),(20,'admin','Sports_ac','edit','修改','',3,1,9,3,4),(21,'admin','Role','role_save','保存','',4,1,4,3,3),(33,'admin','Sports_ac','add','添加','',2,1,9,3,4),(22,'admin','Drillmaster','mark','评价教官','',1,1,14,3,5),(23,'admin','Drillmaster','add','新增','',2,1,14,3,5),(24,'admin','Drillmaster','edit','修改','',3,1,14,3,5),(25,'admin','Drillmaster','look_mark','查看评论','',4,1,14,3,5),(26,'admin','Drillmaster','del','删除','',5,1,14,3,5),(27,'admin','Mark','add','新增','',1,0,10,3,6),(28,'admin','Mark','edit','编辑','',3,1,10,3,6),(29,'admin','Mark','pub_save','新增保存','',2,0,10,3,6),(30,'admin','Question_bank','del','删除','',4,1,48,3,9),(31,'admin','Mark','del','删除','',5,1,10,3,6),(32,'admin','Publicity','pub_export','导出','',6,0,10,3,6),(34,'admin','Innovate_work','edit','修改','',2,1,2,3,2),(35,'admin','Training_files','index','管理培训档案','',1,1,0,1,7),(36,'admin','Training_files','add','添加','',1,1,35,3,7),(37,'admin','Training_files','edit','修改','',2,1,35,3,7),(38,'admin','Training_files','save','保存','',3,0,35,3,7),(39,'admin','Training_files','del','删除类型','',4,1,35,3,7),(40,'admin','Innovate_work','del','删除','',1,1,2,3,2),(41,'admin','Company','com_uploadfile','导入','',5,0,35,3,7),(42,'admin','Company','com_uploadfile_save','导入保存','',6,0,35,3,7),(43,'admin','Company','com_export','导出','',7,0,35,3,7),(44,'admin','Company','com_downmbfile','下载模板','',8,0,38,3,7),(45,'admin','Exam','index','考试管理','',1,1,0,1,9),(46,'admin','Sports_ac','del','删除','',4,1,9,3,4),(47,'admin','Curriculum','look_mark','查看评价','',7,1,1,3,1),(48,'admin','Question_bank','index','题库管理','',2,1,0,1,9),(49,'admin','Question_bank','add','添加','',9,1,48,3,9),(50,'admin','Police','index','管理民警信息','',1,1,0,1,8),(51,'admin','Police','add','添加','',2,1,50,3,8),(52,'admin','Police','edit','修改','',3,1,50,3,8),(53,'admin','Police','del','删除','',4,1,50,3,8),(54,'admin','Exam','exam_log_list','列表','',5,1,64,3,9),(55,'admin','Question_bank','edit','修改','',6,1,48,3,9),(56,'admin','Book','online_book','在线预约','',2,0,0,1,8),(57,'admin','Book','index','我的预约','',3,0,0,1,8),(58,'admin','Police','sync','同步信息','',5,1,50,3,8),(59,'admin','Exam','add','添加','',7,1,45,3,9),(60,'admin','Exam','edit','编辑','',7,1,45,3,9),(61,'admin','Exam','del','删除','',7,1,45,3,9),(62,'admin','Exam','choose_ques','选择题目','',7,1,45,3,9),(63,'admin','Exam','start_exam','进行考试','',7,1,45,3,9),(64,'admin','Exam','exam_log','考试记录','',3,1,0,1,9),(65,'admin','Attachment','index','教学资料','',4,0,0,1,9),(66,'admin','Attachment','upload','上传资料','',4,0,65,3,9),(67,'admin','Attachment','download','下载资料','',4,0,65,3,9),(68,'admin','Attachment','del','删除资料','',4,0,65,3,9),(71,'admin','Flow_path','add_apply','添加申请','',2,1,90,3,8),(69,'admin','Exam','exam_book','预约考试','',8,1,45,3,9),(72,'admin','Attachment','video','教学视频管理','',5,1,0,1,9),(73,'admin','Attachment','video_list','列表','',5,1,72,3,9),(74,'admin','Attachment','video_upload','上传','',5,1,72,3,9),(75,'admin','Attachment','video_download','下载','',5,1,72,3,9),(76,'admin','Attachment','video_del','删除','',5,1,72,3,9),(77,'admin','Attachment','courseware','教学课件管理','',6,1,0,1,9),(78,'admin','Attachment','courseware_list','列表','',6,1,77,3,9),(79,'admin','Attachment','courseware_upload','上传','',6,1,77,3,9),(80,'admin','Attachment','courseware_download','下载','',6,1,77,3,9),(81,'admin','Attachment','courseware_del','删除','',6,1,77,3,9),(82,'admin','Mark','add','评价','',6,1,77,3,9),(83,'admin','Mark','add','评价','',6,1,72,3,9),(84,'admin','Attachment','police_attach','上传证书','',5,1,50,3,8),(85,'admin','Flow_path','index','流程管理','',3,1,0,1,3),(86,'admin','Flow_path','list_data','流程列表','',1,1,85,3,3),(87,'admin','Flow_path','add','流程添加','',2,1,85,3,3),(88,'admin','Flow_path','edit','流程修改','',3,1,85,3,3),(89,'admin','Flow_path','del','流程删除','',4,1,85,3,3),(90,'admin','Flow_path','online_apply','在线申请','',2,1,0,1,8),(91,'admin','Flow_path','online_apply_data','申请列表','',1,1,90,3,8),(92,'admin','Flow_path','edit_apply','修改申请','',3,1,90,3,8),(93,'admin','Flow_path','del_apply','删除申请','',4,1,90,3,8),(94,'admin','Review','index','待办/处理','',3,1,0,1,8),(95,'admin','Review','list_data','列表','',1,1,94,3,8),(96,'admin','Advices','index','建言献策','',4,1,0,1,8),(97,'admin','Advices','list_data','列表','',1,1,96,3,8),(98,'admin','Advices','add','添加建言献策','',2,1,96,3,8),(99,'admin','Advices','del','删除建言献策','',3,1,96,3,8);

/*Table structure for table `ci_role` */

DROP TABLE IF EXISTS `ci_role`;

CREATE TABLE `ci_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT '',
  `status` tinyint(1) DEFAULT '1',
  `remark` varchar(100) DEFAULT '',
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `ci_role` */

insert  into `ci_role`(`id`,`name`,`status`,`remark`,`add_time`) values (1,'市局',1,'',NULL),(2,'派出所',1,'',NULL),(3,'学员',1,'1111133',NULL),(6,'分局',1,'',NULL);

/*Table structure for table `curriculum` */

DROP TABLE IF EXISTS `curriculum`;

CREATE TABLE `curriculum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `training_type` int(1) NOT NULL DEFAULT '0' COMMENT '如初任培训、晋升训练、专业训练等',
  `training_name` varchar(20) NOT NULL DEFAULT '' COMMENT '训练名称',
  `training_info` varchar(512) DEFAULT '' COMMENT '训练内容',
  `training_object` varchar(100) DEFAULT '' COMMENT '训练对象',
  `training_days` int(3) DEFAULT '0' COMMENT '训练天数',
  `training_people` int(5) DEFAULT '0' COMMENT '参训人数',
  `start_time` varchar(20) DEFAULT '' COMMENT '训练开始时间',
  `end_time` varchar(20) DEFAULT '' COMMENT '训练结束时间',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '未开始、进行中、已结束',
  `add_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order` (`training_type`,`training_name`,`status`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='训练计划';

/*Data for the table `curriculum` */

insert  into `curriculum`(`id`,`training_type`,`training_name`,`training_info`,`training_object`,`training_days`,`training_people`,`start_time`,`end_time`,`status`,`add_time`) values (1,1,'初级训练1','跑步','新兵',0,0,'2017-11','2017-12',1,1510887063),(2,2,'晋升训练1','滴滴','一个月新兵',3,0,'2018-04-10','2018-04-12',0,1510889935);

/*Table structure for table `decom_bin` */

DROP TABLE IF EXISTS `decom_bin`;

CREATE TABLE `decom_bin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `content` varchar(1024) DEFAULT '' COMMENT '内容',
  `addtime` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='解压仓';

/*Data for the table `decom_bin` */

insert  into `decom_bin`(`id`,`title`,`content`,`addtime`) values (5,'测试','对对对',1510295147),(4,'对对对','ces ',1510294998);

/*Table structure for table `drillmaster` */

DROP TABLE IF EXISTS `drillmaster`;

CREATE TABLE `drillmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL DEFAULT '' COMMENT '姓名',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别',
  `police_num` varchar(50) DEFAULT '' COMMENT '警号',
  `work_unit` varchar(100) DEFAULT '' COMMENT '工作单位',
  `birth` varchar(20) DEFAULT '' COMMENT '出生年月',
  `style` varchar(50) DEFAULT '' COMMENT '教官类别',
  `curriculum_id` varchar(30) DEFAULT '' COMMENT '所教课程',
  `speciality` varchar(50) DEFAULT '' COMMENT '专长',
  `experience` varchar(512) DEFAULT '' COMMENT '经历',
  `add_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='训练教官管理';

/*Data for the table `drillmaster` */

insert  into `drillmaster`(`id`,`name`,`sex`,`police_num`,`work_unit`,`birth`,`style`,`curriculum_id`,`speciality`,`experience`,`add_time`) values (1,'张飞',1,'12345678','市局政治部团委','1978-10-01','射击','2,1','射击，搏斗','射击冠军',1510902442);

/*Table structure for table `exam` */

DROP TABLE IF EXISTS `exam`;

CREATE TABLE `exam` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '' COMMENT '考试名称',
  `content` varchar(200) DEFAULT '' COMMENT '考试目的',
  `exam_time` int(3) NOT NULL DEFAULT '0' COMMENT '考试时长（分钟）',
  `start_time` int(11) DEFAULT '0' COMMENT '考试开始时间',
  `end_time` int(11) DEFAULT '0' COMMENT '结束时间',
  `used_book` tinyint(1) DEFAULT '0' COMMENT '是否用预约，1是用',
  `add_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `exam` */

insert  into `exam`(`id`,`title`,`content`,`exam_time`,`start_time`,`end_time`,`used_book`,`add_time`) values (1,'期中考试01','考评期中',90,1515133440,1515145920,1,1511162238),(2,'期末考试1','期末检测',90,1524794400,1524798000,1,1511336600);

/*Table structure for table `exam_book` */

DROP TABLE IF EXISTS `exam_book`;

CREATE TABLE `exam_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL DEFAULT '0' COMMENT '考试id',
  `uid` int(5) DEFAULT '0' COMMENT '预约用户的id',
  `status` tinyint(1) DEFAULT '0' COMMENT '1是取消预约',
  `add_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0' COMMENT '从新预约',
  PRIMARY KEY (`id`),
  KEY `order` (`exam_id`,`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `exam_book` */

insert  into `exam_book`(`id`,`exam_id`,`uid`,`status`,`add_time`,`update_time`) values (1,2,1,0,1511405353,1511405634),(2,1,2,0,1511405562,0);

/*Table structure for table `exam_log` */

DROP TABLE IF EXISTS `exam_log`;

CREATE TABLE `exam_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL DEFAULT '0' COMMENT '考试名称id',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '考试人',
  `start_time` int(11) DEFAULT '0' COMMENT '开始时间',
  `end_time` int(11) DEFAULT '0' COMMENT '结束时间',
  `score` int(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='考试记录表';

/*Data for the table `exam_log` */

insert  into `exam_log`(`id`,`exam_id`,`uid`,`start_time`,`end_time`,`score`) values (1,1,1,1511247384,1511247524,100),(2,1,1,1511247775,1511247888,69),(3,1,1,1511247924,1511248183,69),(8,2,8,1524731277,0,0),(7,2,8,1524730464,1524730507,0),(9,2,8,1524731433,0,0),(10,2,8,1524731520,0,0),(11,2,8,1524731649,0,0),(12,2,8,1524795905,0,0),(13,2,1,1524796183,0,0);

/*Table structure for table `exam_ques` */

DROP TABLE IF EXISTS `exam_ques`;

CREATE TABLE `exam_ques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_id` int(11) NOT NULL DEFAULT '0' COMMENT '考试名称id',
  `ques_id` int(11) NOT NULL DEFAULT '0' COMMENT '题目id',
  `add_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order` (`exam_id`,`ques_id`)
) ENGINE=MyISAM AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COMMENT='考试题目';

/*Data for the table `exam_ques` */

insert  into `exam_ques`(`id`,`exam_id`,`ques_id`,`add_time`) values (1,1,5,1511166465),(2,1,3,1511166465),(3,1,1,1511166481),(35,1,641,1511240010),(32,1,633,1511236103),(31,1,634,1511236097),(30,1,635,1511235902),(29,1,636,1511235901),(28,1,637,1511235901),(27,1,638,1511235900),(26,1,639,1511235899),(25,1,640,1511235899),(33,1,632,1511238580),(36,1,7,1511335054),(56,2,18,1511399529),(38,2,175,1511339103),(43,2,1,1511339402),(44,2,2,1511339838),(58,2,3,1511399582),(45,2,4,1511340332),(47,2,5,1511340369),(49,2,7,1511340439),(50,2,8,1511340508),(51,2,9,1511340543),(52,2,10,1511340566),(53,2,11,1511340683),(55,2,12,1511341125),(57,2,13,1511399534);

/*Table structure for table `exam_ques_log` */

DROP TABLE IF EXISTS `exam_ques_log`;

CREATE TABLE `exam_ques_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_log_id` int(11) NOT NULL DEFAULT '0' COMMENT '考试id',
  `ques_id` int(11) NOT NULL DEFAULT '0' COMMENT '题目id',
  `select_id` int(4) NOT NULL DEFAULT '0' COMMENT '自己的选项',
  `correct` int(4) NOT NULL DEFAULT '0' COMMENT '正确答案',
  `add_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COMMENT='考试答题记录';

/*Data for the table `exam_ques_log` */

insert  into `exam_ques_log`(`id`,`exam_log_id`,`ques_id`,`select_id`,`correct`,`add_time`) values (1,1,1,3,0,1511247524),(2,1,3,4,0,1511247524),(3,1,5,4,0,1511247524),(4,1,632,3,0,1511247524),(5,1,633,5,0,1511247524),(6,1,634,4,0,1511247524),(7,1,635,3,0,1511247524),(8,1,636,4,0,1511247524),(9,1,637,3,0,1511247524),(10,1,638,5,0,1511247524),(11,1,639,4,0,1511247524),(12,1,640,3,0,1511247524),(13,1,641,4,0,1511247524),(14,2,1,4,3,1511247888),(15,2,3,4,4,1511247888),(16,2,5,4,4,1511247888),(17,2,632,3,3,1511247888),(18,2,633,5,5,1511247888),(19,2,634,4,4,1511247888),(20,2,635,4,3,1511247888),(21,2,636,4,4,1511247888),(22,2,637,4,3,1511247888),(23,2,638,5,5,1511247888),(24,2,639,4,4,1511247888),(25,2,640,4,3,1511247888),(26,2,641,4,4,1511247888),(27,3,1,3,3,1511248183),(28,3,3,4,4,1511248183),(29,3,5,4,4,1511248183),(30,3,632,3,3,1511248183),(31,3,633,5,5,1511248183),(32,3,634,4,4,1511248183),(33,3,635,4,3,1511248183),(34,3,636,4,4,1511248183),(35,3,637,4,3,1511248183),(36,3,638,4,5,1511248183),(37,3,639,4,4,1511248183),(38,3,640,4,3,1511248183),(39,3,641,4,4,1511248183),(81,7,175,1,3,1524730507),(80,7,18,1,5,1524730507),(79,7,13,1,5,1524730507),(78,7,12,1,3,1524730507),(77,7,11,1,4,1524730507),(76,7,10,1,3,1524730507),(75,7,9,1,4,1524730507),(74,7,8,1,5,1524730507),(73,7,7,1,3,1524730507),(72,7,5,1,4,1524730507),(71,7,4,2,3,1524730507),(70,7,3,1,4,1524730507),(69,7,2,1,5,1524730507),(68,7,1,1,3,1524730507);

/*Table structure for table `innovate_work` */

DROP TABLE IF EXISTS `innovate_work`;

CREATE TABLE `innovate_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL DEFAULT '' COMMENT '教育创新标题',
  `develop_unit` varchar(60) DEFAULT '' COMMENT '研发单位',
  `url` varchar(256) DEFAULT '' COMMENT '项目地址',
  `use_time` varchar(30) DEFAULT '' COMMENT '开始使用时间',
  `content` varchar(1024) DEFAULT '' COMMENT '创新内容',
  `add_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='创新工作';

/*Data for the table `innovate_work` */

insert  into `innovate_work`(`id`,`title`,`develop_unit`,`url`,`use_time`,`content`,`add_time`) values (2,'这里是创新工作标题','','','','这里是创新工作内容',1515135135),(3,'智慧政工项目','XXX网络科技有限公司','','2018年','项目简介项目简介项目简介项目简介项目简介项目简介<br />',1523760721);

/*Table structure for table `lc_flow` */

DROP TABLE IF EXISTS `lc_flow`;

CREATE TABLE `lc_flow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `lc_flow` */

insert  into `lc_flow`(`id`,`name`,`add_time`) values (1,'学习申请',1523869231),(2,'学历变更',1523954832);

/*Table structure for table `lc_flowpath` */

DROP TABLE IF EXISTS `lc_flowpath`;

CREATE TABLE `lc_flowpath` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flow_id` int(11) DEFAULT '0',
  `uid` int(5) DEFAULT '0',
  `orders` int(2) DEFAULT '0',
  `add_time` int(11) DEFAULT '0',
  `add_uid` int(5) DEFAULT '0' COMMENT '添加人',
  `review_time` int(11) DEFAULT '0' COMMENT '审批时间',
  `review_uid` int(5) DEFAULT '0' COMMENT '审批人',
  PRIMARY KEY (`id`),
  KEY `flow_id` (`flow_id`),
  KEY `uid` (`uid`),
  KEY `orders` (`orders`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci COMMENT='流程走向表';

/*Data for the table `lc_flowpath` */

insert  into `lc_flowpath`(`id`,`flow_id`,`uid`,`orders`,`add_time`,`add_uid`,`review_time`,`review_uid`) values (12,1,6,2,1523870526,1,0,0),(11,1,5,1,1523870526,1,0,0),(10,1,4,0,1523870526,1,0,0),(13,2,4,0,1523954832,1,0,0),(14,2,6,1,1523954832,1,0,0);

/*Table structure for table `lc_userflow` */

DROP TABLE IF EXISTS `lc_userflow`;

CREATE TABLE `lc_userflow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `flow_id` int(11) DEFAULT '0' COMMENT '流程的id',
  `uid` int(5) DEFAULT '0',
  `content` varchar(512) DEFAULT '' COMMENT '事由',
  `isok` tinyint(1) DEFAULT '0',
  `towhere` int(1) DEFAULT '0',
  `add_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `flow_id` (`flow_id`),
  KEY `uid` (`uid`),
  KEY `towhere` (`towhere`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='用户申请记录';

/*Data for the table `lc_userflow` */

insert  into `lc_userflow`(`id`,`flow_id`,`uid`,`content`,`isok`,`towhere`,`add_time`) values (1,1,1,'我要去学习<br />',0,1,1523928261),(2,2,5,'由大专转成本科学历',0,0,1523954901);

/*Table structure for table `lc_userflow_review` */

DROP TABLE IF EXISTS `lc_userflow_review`;

CREATE TABLE `lc_userflow_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userflow_id` int(11) DEFAULT '0' COMMENT '用户的申请id',
  `review_time` int(11) DEFAULT '0' COMMENT '审批时间',
  `review_uid` int(5) DEFAULT '0' COMMENT '审批人',
  `orders` int(2) DEFAULT '0' COMMENT '流程走到哪一步',
  PRIMARY KEY (`id`),
  KEY `userflow_id` (`userflow_id`),
  KEY `review_time` (`review_time`,`review_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_estonian_ci;

/*Data for the table `lc_userflow_review` */

insert  into `lc_userflow_review`(`id`,`userflow_id`,`review_time`,`review_uid`,`orders`) values (3,1,1524556429,4,0);

/*Table structure for table `mark` */

DROP TABLE IF EXISTS `mark`;

CREATE TABLE `mark` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '评分人',
  `score` int(3) NOT NULL DEFAULT '0' COMMENT '分数',
  `title` varchar(200) DEFAULT '' COMMENT '评价',
  `type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1是教官的评分，2是课程的评分,3是培训视频，4培训课件',
  `data_id` int(11) NOT NULL DEFAULT '0' COMMENT '评价的对象的id',
  `uid` int(6) NOT NULL DEFAULT '0' COMMENT '评分人',
  `add_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order` (`name`,`score`,`type`,`data_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='对教官进行评分评价';

/*Data for the table `mark` */

insert  into `mark`(`id`,`name`,`score`,`title`,`type`,`data_id`,`uid`,`add_time`) values (1,'韦某',99,'很好',2,1,1,1510889789),(11,'wei',88,'文档课件详细',4,17,1,1523761537),(3,'我',11,'222',2,1,1,1510889876),(4,'王五',59,'哈哈',2,2,1,1510889953),(5,'宋某',99,'极好',1,1,1,1510903421),(6,'李某',88,'滴滴',2,2,1,1510907612),(7,'王五',66,'呃呃呃',2,2,1,1510908053),(8,'王五',0,'嗯嗯',2,2,1,1510908070),(9,'小李',88,'对对对',1,1,1,1511141684),(10,'小李',78,'对对对',1,1,1,1511142875);

/*Table structure for table `mz` */

DROP TABLE IF EXISTS `mz`;

CREATE TABLE `mz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mz_title` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

/*Data for the table `mz` */

insert  into `mz`(`id`,`mz_title`) values (2,'汉族'),(3,'蒙古族'),(4,'回族'),(5,'藏族'),(6,'维吾尔族'),(7,'苗族'),(8,'彝族'),(9,'壮族'),(10,'布依族'),(11,'朝鲜族'),(12,'满族'),(13,'侗族'),(14,'瑶族'),(15,'白族'),(16,'土家族'),(17,'哈尼族'),(18,'哈萨克族'),(19,'傣族'),(20,'黎族'),(21,'傈僳族'),(22,'佤族'),(23,'畲族'),(24,'高山族'),(25,'拉祜族'),(26,'水族'),(27,'东乡族'),(28,'纳西族'),(29,'景颇族'),(30,'柯尔克孜族'),(31,'土族'),(32,'达斡尔族'),(33,'仫佬族'),(34,'羌族'),(35,' 布朗族'),(36,' 撒拉族'),(37,' 毛难族'),(38,' 仡佬族'),(39,' 锡伯族'),(40,' 阿昌族'),(41,' 普米族'),(42,' 塔吉克族'),(43,' 怒族'),(44,' 乌孜别克族'),(45,' 俄罗斯族'),(46,' 鄂温克族'),(47,' 崩龙族'),(48,' 保安族'),(49,' 裕固族'),(50,' 京族'),(51,' 塔塔尔族'),(52,' 独龙族'),(53,' 鄂伦春族'),(54,' 赫哲族'),(55,' 门巴族'),(56,' 珞巴族'),(57,' 基诺族'),(58,' 其他'),(1,'请选择');

/*Table structure for table `police` */

DROP TABLE IF EXISTS `police`;

CREATE TABLE `police` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department` varchar(200) DEFAULT '' COMMENT '部门',
  `name` varchar(30) DEFAULT '' COMMENT '姓名',
  `sex` varchar(3) DEFAULT '' COMMENT '性别',
  `birth_time` varchar(10) DEFAULT '' COMMENT '出生日期',
  `birth_time_code` int(10) DEFAULT NULL COMMENT '出生日期code',
  `jiguan` varchar(200) DEFAULT '' COMMENT '籍贯',
  `mz` varchar(120) DEFAULT '' COMMENT '民族',
  `political_status` varchar(50) DEFAULT '' COMMENT '政治面貌',
  `sfz` varchar(18) DEFAULT '' COMMENT '身份证号',
  `xueli` varchar(60) DEFAULT '' COMMENT '学历',
  `zhuanye` varchar(50) DEFAULT '' COMMENT '专业',
  `position` varchar(120) DEFAULT '' COMMENT '职务',
  `phone` varchar(30) DEFAULT '' COMMENT '手机号',
  `tel` varchar(30) DEFAULT '' COMMENT '办公电话',
  `in_org` varchar(120) DEFAULT '' COMMENT '所在单位',
  `family_address` varchar(200) DEFAULT '' COMMENT '家庭地址',
  `now_address` varchar(200) DEFAULT '' COMMENT '现在住址',
  `job_num` varchar(100) DEFAULT '' COMMENT '警号',
  `specialty` varchar(120) DEFAULT '' COMMENT '文体类特长',
  `bz` varchar(200) DEFAULT '' COMMENT '备注',
  `status` varchar(30) DEFAULT '' COMMENT '状态',
  `create_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `create_by` varchar(120) DEFAULT '' COMMENT '创建人',
  `update_time` int(10) DEFAULT NULL COMMENT '修改时间',
  `update_by` varchar(120) DEFAULT '' COMMENT '修改人',
  `come_from` varchar(10) DEFAULT '' COMMENT '来源',
  PRIMARY KEY (`id`),
  KEY `name` (`name`) USING BTREE,
  KEY `sfz` (`sfz`) USING BTREE,
  KEY `status` (`status`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='民警信息表';

/*Data for the table `police` */

insert  into `police`(`id`,`department`,`name`,`sex`,`birth_time`,`birth_time_code`,`jiguan`,`mz`,`political_status`,`sfz`,`xueli`,`zhuanye`,`position`,`phone`,`tel`,`in_org`,`family_address`,`now_address`,`job_num`,`specialty`,`bz`,`status`,`create_time`,`create_by`,`update_time`,`update_by`,`come_from`) values (1,'技术部','张三','1','1990-11-11',NULL,'广西南宁','壮族','共青团员','452126199006210666','全日制大专','计算机','班长','','13737129294','','','','12345678','','','',1510715853,'',NULL,'',''),(3,'','李四','0','1989-02-23',NULL,'广西柳州','汉族','党员','452126988745451425','本科','电子商务','','','13435454754','','南宁','燕子岭','321654987','','','',1510797147,'',NULL,'',''),(4,'xxxx组织2','上官丽丽','0','1935-03-09',NULL,'jg','蒙古族','群众','123456789123456789','本科','','wu','133','0771','工作单位','jtdd','0771','gh','唱歌，跳舞，篮球','','',NULL,'',NULL,'','同步');

/*Table structure for table `question_bank` */

DROP TABLE IF EXISTS `question_bank`;

CREATE TABLE `question_bank` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `correct` tinyint(2) NOT NULL,
  `add_time` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=642 DEFAULT CHARSET=utf8;

/*Data for the table `question_bank` */

insert  into `question_bank`(`id`,`question`,`answer`,`correct`,`add_time`) values (1,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(2,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(3,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(4,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(5,'下列哪个标签不是HTML5中的新标签？','A.九型人格测试主要用于帮助你有效地掌握个人的行为习惯，测试中所回答的问题答案没有好与坏之分、没有正确与错误之别，它仅是反映你自己的个性和你的世界观。测评问卷将有助于你更好地了解自身的优势和弱点，并知道在何种情形下你的行动将更为有效。同时，你还可以通过测评结论知道他人是如何看待他们自己的，以及相互间又是如何相处影响的###B.<canvas>###C.<section>###D.<sub>',4,1511229974),(7,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(8,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(9,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(10,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(11,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(12,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(13,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(14,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(15,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(16,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(17,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(18,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229984),(19,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(20,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(21,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(22,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(23,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(24,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(25,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(26,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(27,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(28,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(29,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(30,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(31,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(32,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(33,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(34,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(35,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(36,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(37,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(38,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(39,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(40,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(41,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(42,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(43,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(44,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(45,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(46,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(47,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(48,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(49,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(50,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(51,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(52,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(53,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(54,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(55,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(56,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(57,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(58,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(59,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(60,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(61,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(62,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(63,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(64,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(65,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(66,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(67,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(68,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(69,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(70,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(71,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(72,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(73,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(74,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(75,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(76,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(77,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(78,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(79,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(80,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(81,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(82,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(83,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(84,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(85,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(86,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(87,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(88,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(89,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(90,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(91,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(92,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(93,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(94,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(95,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(96,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(97,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(98,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(99,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(100,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(101,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(102,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(103,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(104,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(105,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(106,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(107,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(108,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(109,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(110,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(111,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(112,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(113,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(114,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(115,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(116,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(117,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(118,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(119,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(120,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(121,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(122,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(123,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(124,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(125,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(126,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(127,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(128,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(129,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(130,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(131,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(132,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(133,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(134,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(135,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(136,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(137,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(138,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(139,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(140,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(141,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(142,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(143,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(144,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(145,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(146,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(147,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(148,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(149,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(150,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(151,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(152,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(153,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(154,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(155,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(156,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(157,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(158,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(159,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(160,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(161,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(162,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(163,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(164,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(165,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(166,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(167,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(168,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(169,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(170,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(171,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(172,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(173,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(174,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(175,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229984),(176,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(177,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(178,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(179,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(180,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(181,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(182,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(183,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(184,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(185,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(186,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(187,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(188,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(189,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(190,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(191,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(192,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(193,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(194,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(195,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(196,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(197,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(198,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(199,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(200,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(201,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(202,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(203,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(204,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(205,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(206,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(207,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(208,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(209,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(210,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(211,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(212,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(213,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(214,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(215,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(216,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(217,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(218,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(219,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(220,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(221,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(222,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(223,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(224,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(225,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(226,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(227,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(228,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(229,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(230,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(231,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(232,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(233,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(234,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(235,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(236,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(237,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(238,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(239,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(240,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(241,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(242,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(243,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(244,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(245,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(246,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(247,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(248,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(249,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(250,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(251,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(252,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(253,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(254,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(255,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(256,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(257,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(258,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(259,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(260,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(261,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(262,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(263,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(264,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(265,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(266,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(267,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(268,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(269,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(270,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(271,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(272,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(273,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(274,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(275,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(276,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(277,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(278,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(279,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(280,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(281,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(282,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(283,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(284,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(285,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(286,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(287,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(288,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(289,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(290,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(291,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(292,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(293,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(294,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(295,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(296,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(297,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(298,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(299,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(300,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(301,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(302,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(303,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(304,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(305,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(306,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(307,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(308,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(309,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(310,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(311,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(312,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(313,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(314,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(315,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(316,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(317,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(318,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(319,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(320,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(321,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(322,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(323,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(324,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(325,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(326,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(327,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(328,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(329,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(330,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(331,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(332,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(333,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(334,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(335,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(336,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(337,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(338,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(339,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(340,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(341,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(342,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(343,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(344,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(345,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(346,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(347,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(348,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(349,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(350,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(351,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(352,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(353,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(354,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(355,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(356,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(357,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(358,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(359,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(360,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(361,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(362,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(363,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(364,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(365,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(366,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(367,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(368,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(369,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(370,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(371,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(372,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(373,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(374,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(375,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(376,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(377,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(378,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(379,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(380,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(381,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(382,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(383,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(384,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(385,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(386,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(387,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(388,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(389,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(390,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(391,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(392,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(393,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(394,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(395,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(396,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(397,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(398,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(399,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(400,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(401,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(402,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(403,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(404,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(405,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(406,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(407,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(408,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(409,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(410,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(411,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(412,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(413,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(414,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(415,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(416,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(417,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(418,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(419,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(420,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(421,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(422,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(423,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(424,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(425,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(426,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(427,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(428,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(429,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(430,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(431,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(432,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(433,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(434,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(435,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(436,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(437,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(438,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(439,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(440,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(441,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(442,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(443,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(444,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(445,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(446,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(447,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(448,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(449,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(450,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(451,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(452,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(453,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(454,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(455,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(456,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(457,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(458,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(459,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(460,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(461,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(462,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(463,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(464,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(465,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(466,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(467,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(468,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(469,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(470,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(471,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(472,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(473,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(474,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(475,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(476,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(477,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(478,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(479,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(480,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(481,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(482,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(483,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(484,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(485,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(486,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(487,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(488,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(489,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(490,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(491,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(492,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(493,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(494,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(495,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(496,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(497,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(498,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(499,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(500,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(501,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(502,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(503,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(504,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(505,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(506,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(507,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(508,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(509,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(510,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(511,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(512,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(513,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(514,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(515,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(516,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(517,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(518,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(519,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(520,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(521,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(522,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(523,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(524,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(525,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(526,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(527,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(528,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(529,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(530,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(531,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(532,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(533,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(534,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(535,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(536,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(537,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(538,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(539,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(540,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(541,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(542,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(543,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(544,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(545,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(546,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(547,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(548,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(549,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(550,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(551,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(552,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(553,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(554,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(555,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(556,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(557,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(558,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(559,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(560,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(561,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(562,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(563,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(564,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(565,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(566,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(567,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(568,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(569,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(570,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(571,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(572,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(573,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(574,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(575,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(576,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(577,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(578,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(579,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(580,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(581,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(582,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(583,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(584,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(585,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(586,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(587,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(588,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(589,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(590,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(591,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(592,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(593,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(594,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(595,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(596,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(597,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(598,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(599,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(600,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(601,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(602,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(603,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(604,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(605,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(606,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(607,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(608,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(609,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(610,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(611,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(612,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(613,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(614,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(615,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(616,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(617,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(618,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(619,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(620,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(621,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(622,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(623,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(624,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(625,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(626,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(628,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(629,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(630,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(631,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(632,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(633,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(634,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(635,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(636,'下列哪个标签不是HTML5中的新标签？','A.&lt;article&gt;###B.&lt;canvas&gt;###C.&lt;section&gt;###D.&lt;sub&gt;',4,1511229974),(637,'罗马帝国曾一度辉煌，令人神往，故有“条条大陆通罗马”一说。那么，今天你是怎样理解这一谚语的准确含义的？','A．入乡随俗 ###B．四通八达 ###C．殊途同归 ###D．流连忘返',3,1511229974),(638,'找出不同类的一项：','A.斑马 ###B.军马 ###C.赛马 ###D.骏马 ###E.驸马',5,1511229974),(639,' 蜡烛在空气中燃烧，蜡烛质量逐渐变小。这说明','A.物质可以自生自灭###B.发生的不是化学变化###C.不遵守质量守恒定律###D.生成物为气体，散发到空气中了',4,1511229974),(640,'以下哪位歌手没有获得过《我是歌手》总冠军？','A.羽泉###B.韩磊###C.邓紫棋###D.韩红',3,1511229974),(641,'下列哪个标签不是HTML5中的新标签？','A.九型人格测试主要用于帮助你有效地掌握个人的行为习惯，测试中所回答的问题答案没有好与坏之分、没有正确与错误之别，它仅是反映你自己的个性和你的世界观。测评问卷将有助于你更好地了解自身的优势和弱点，并知道在何种情形下你的行动将更为有效。同时，你还可以通过测评结论知道他人是如何看待他们自己的，以及相互间又是如何相处影响的###B.<canvas>###C.<section>###D.<sub>',4,1511229974);

/*Table structure for table `sports_activities` */

DROP TABLE IF EXISTS `sports_activities`;

CREATE TABLE `sports_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '活动名称',
  `type` varchar(20) DEFAULT '' COMMENT '活动类型',
  `scope` varchar(50) DEFAULT '' COMMENT '活动范围',
  `charge_name` varchar(30) DEFAULT '' COMMENT '活动负责人',
  `contact_info` varchar(50) DEFAULT '' COMMENT '负责人联系方式',
  `content` varchar(250) DEFAULT '' COMMENT '活动内容',
  `activity_time` varchar(30) DEFAULT '' COMMENT '活动时间',
  `charge_unit` varchar(150) DEFAULT '' COMMENT '举办单位',
  `related file` varbinary(512) DEFAULT '' COMMENT '活动相关文件',
  `add_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `sports_activities` */

insert  into `sports_activities`(`id`,`title`,`type`,`scope`,`charge_name`,`contact_info`,`content`,`activity_time`,`charge_unit`,`related file`,`add_time`) values (1,'光棍节活动','相亲','单身男女','宋某','13737454154','户外团体活动，烧烤之类的','2017-11-11','某某机关单位','',1510905661);

/*Table structure for table `training_files` */

DROP TABLE IF EXISTS `training_files`;

CREATE TABLE `training_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `police_id` int(11) NOT NULL DEFAULT '0' COMMENT '民警id',
  `curriculum_id` int(5) NOT NULL DEFAULT '0' COMMENT '课程名称（训练计划）',
  `sign_in` varchar(25) NOT NULL DEFAULT '' COMMENT '签到时间',
  `score` int(3) NOT NULL DEFAULT '0' COMMENT '分数',
  `ranking` int(5) NOT NULL DEFAULT '0' COMMENT '排名',
  `training_days` int(5) DEFAULT '0' COMMENT '培训天数',
  `training_stime` varchar(25) DEFAULT '' COMMENT '训练时间开始',
  `training_etime` varchar(25) DEFAULT '' COMMENT '训练时间结束',
  `is_overtime` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否超时',
  `training_pro_info` varchar(512) DEFAULT '' COMMENT '训练过程信息',
  `add_time` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order` (`police_id`,`score`,`ranking`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='训练档案管理';

/*Data for the table `training_files` */

insert  into `training_files`(`id`,`police_id`,`curriculum_id`,`sign_in`,`score`,`ranking`,`training_days`,`training_stime`,`training_etime`,`is_overtime`,`training_pro_info`,`add_time`) values (1,1,2,'2017-11-15 16:36:03',91,1,0,'2018-04-13','2018-04-14',0,'问问',1510734785),(2,3,1,'2017-11-17 14:29:22',88,3,3,'2018-04-11','2018-04-13',1,'是是是',1510900178);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `act_type` int(1) DEFAULT '0' COMMENT '账号类型1超级管理员2分支管理员',
  `department` varchar(120) DEFAULT '' COMMENT '所属部门',
  `username` varchar(60) DEFAULT '' COMMENT '用户名',
  `nickname` varchar(120) DEFAULT '' COMMENT '昵称',
  `police_id` varchar(20) DEFAULT '' COMMENT '警号',
  `password` varchar(40) DEFAULT '' COMMENT '密码',
  `token` varchar(50) DEFAULT '' COMMENT 'token',
  `ip` varchar(20) DEFAULT '' COMMENT 'IP',
  `lastlogin_time` int(10) DEFAULT NULL COMMENT '最后登录时间',
  `beizhu` varchar(200) DEFAULT '' COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1为禁用',
  `create_time` int(10) DEFAULT '0' COMMENT '创建时间',
  `login_num` int(5) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  KEY `act_type` (`act_type`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='管理员用户表';

/*Data for the table `user` */

insert  into `user`(`id`,`act_type`,`department`,`username`,`nickname`,`police_id`,`password`,`token`,`ip`,`lastlogin_time`,`beizhu`,`status`,`create_time`,`login_num`) values (1,1,'超级管理员','admin','超级管理员','','9bad2764044171acdab696d32fb4c16d','f8b5bcf1d7f145bfd6dc6e835e3e69d1','192.168.112.208',1524729498,'',0,0,55),(3,3,'测试','admin1','某学员','','9bad2764044171acdab696d32fb4c16d','','127.0.0.1',1523760540,'123456',0,0,4),(4,2,'某派出所','pcs','某派出所','','9bad2764044171acdab696d32fb4c16d','','127.0.0.1',1524556347,'',0,0,5),(5,6,'某分局','fj','某分局','','9bad2764044171acdab696d32fb4c16d','','::1',1524468163,'',0,0,4),(6,1,'市局','sj','市局','','9bad2764044171acdab696d32fb4c16d','','',NULL,'',0,0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;