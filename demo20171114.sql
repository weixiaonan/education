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

/*Table structure for table `ci_access` */

DROP TABLE IF EXISTS `ci_access`;

CREATE TABLE `ci_access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `r_id` int(11) DEFAULT NULL,
  `n_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `r_id` (`r_id`) USING BTREE,
  KEY `n_id` (`n_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=1152 DEFAULT CHARSET=utf8;

/*Data for the table `ci_access` */

insert  into `ci_access`(`id`,`r_id`,`n_id`) values (482,2,7),(481,2,5),(480,2,6),(479,2,2),(478,2,1),(1151,1,18),(1150,1,17),(1149,1,21),(1148,1,16),(1147,1,15),(1146,1,13),(1145,1,12),(1144,1,11),(1143,1,49),(1142,1,48),(483,2,20),(484,2,8),(485,2,19),(1141,1,47),(1140,1,46),(1139,1,8),(1138,1,20),(1137,1,7),(1136,1,5),(1135,1,45),(1134,1,26),(1133,1,25),(1132,1,24),(1131,1,23),(1130,1,22),(1129,1,39),(1128,1,37),(1127,1,36),(969,3,11),(968,3,19),(967,3,45),(966,3,26),(965,3,25),(964,3,24),(963,3,23),(962,3,22),(961,3,55),(960,3,46),(959,3,8),(958,3,20),(957,3,7),(956,3,5),(955,3,6),(954,3,3),(953,3,2),(952,3,14),(951,3,1),(1126,1,58),(1125,1,54),(1124,1,53),(1123,1,52),(1122,1,51),(1121,1,4),(1120,1,3),(1119,1,1),(1118,1,14),(1117,1,35),(1116,1,50);

/*Table structure for table `ci_group` */

DROP TABLE IF EXISTS `ci_group`;

CREATE TABLE `ci_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT '',
  `status` tinyint(1) DEFAULT '1',
  `sort` tinyint(4) DEFAULT NULL,
  `remark` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `ci_group` */

insert  into `ci_group`(`id`,`title`,`status`,`sort`,`remark`) values (1,'心理危机干预管理',1,5,''),(2,'数据统计',0,6,''),(3,'系统设置',1,7,''),(4,'分布示意图',0,1,''),(5,'解压仓',1,4,''),(6,'公示名单信息',0,5,''),(7,'咨询类型管理',1,3,''),(8,'咨询师管理',1,2,'');

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
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

/*Data for the table `ci_node` */

insert  into `ci_node`(`id`,`d`,`c`,`f`,`title`,`remark`,`sort`,`status`,`pid`,`level`,`gid`) values (1,'admin','Crisis_files','index','心理危机档案','',1,1,0,1,1),(2,'admin','Statistics','index','按安置项目统计','',1,1,0,1,2),(3,'admin','User','index','用户管理','',1,1,0,1,3),(4,'admin','Role','index','角色管理','',2,1,0,1,3),(5,'admin','Crisis_files','add','新增','',2,1,1,3,1),(6,'admin','Crisis_files','statistics','数据统计','',2,1,0,1,1),(7,'admin','Crisis_files','edit','修改','',3,1,1,3,1),(8,'admin','Crisis_files','del','删除','',5,1,1,3,1),(9,'admin','Map','index','安置分布示意图','',1,1,0,1,4),(10,'admin','Publicity','index','公示名单管理','',1,0,0,1,6),(11,'admin','User','user_add','新增','',2,1,3,3,3),(12,'admin','User','user_edit','修改','',3,1,3,3,3),(13,'admin','User','user_del','删除','',4,1,3,3,3),(14,'admin','Decom_bin','index','解压仓管理','',1,1,0,1,5),(15,'admin','Role','role_add','新增','',2,1,4,3,3),(16,'admin','Role','role_edit','修改','',3,1,4,3,3),(17,'admin','Role','role_set','设置权限','',5,1,4,3,3),(18,'admin','Role','role_del','删除','',6,1,4,3,3),(19,'admin','Statistics','pro_tj_data','统计','',1,1,2,3,2),(20,'admin','Member','member_save','保存','',4,1,1,3,1),(21,'admin','Role','role_save','保存','',4,1,4,3,3),(33,'admin','Map','map_data','百度地图数据展示','',1,1,9,3,4),(22,'admin','Decom_bin','pro_show','详情','',1,1,14,3,5),(23,'admin','Decom_bin','add','新增','',2,1,14,3,5),(24,'admin','Decom_bin','edit','修改','',3,1,14,3,5),(25,'admin','Decom_bin','save','保存','',4,1,14,3,5),(26,'admin','Decom_bin','del','删除','',5,1,14,3,5),(27,'admin','Publicity','pub_add','新增','',1,1,10,3,6),(28,'admin','Publicity','pub_edit','标注','',3,1,10,3,6),(29,'admin','Publicity','pub_save','新增保存','',2,1,10,3,6),(30,'admin','Publicity','pub_edit_save','标注保存','',4,1,10,3,6),(31,'admin','Publicity','pub_del','删除','',5,1,10,3,6),(32,'admin','Publicity','pub_export','导出','',6,1,10,3,6),(34,'admin','Statistics','statistics_member','按安置申请人统计','',2,1,0,1,2),(35,'admin','Consultant_type','index','管理咨询类型','',1,1,0,1,7),(36,'admin','Consultant_type','add','添加类型','',1,1,35,3,7),(37,'admin','Consultant_type','edit','修改类型','',2,1,35,3,7),(38,'admin','Consultant_type','com_save','保存','',3,0,35,3,7),(39,'admin','Consultant_type','del','删除类型','',4,1,35,3,7),(40,'admin','Statistics','mem_tj_data','统计','',1,1,34,3,2),(41,'admin','Company','com_uploadfile','导入','',5,0,35,3,7),(42,'admin','Company','com_uploadfile_save','导入保存','',6,0,35,3,7),(43,'admin','Company','com_export','导出','',7,0,35,3,7),(44,'admin','Company','com_downmbfile','下载模板','',8,0,38,3,7),(45,'admin','Project','pro_export','导出','',6,1,14,3,5),(46,'admin','Member','member_uploadfile','导入','',6,1,1,3,1),(47,'admin','Member','member_uploadfile_save','导入保存','',7,1,1,3,1),(48,'admin','Member','member_export','导出','',8,1,1,3,1),(49,'admin','Member','member_downmbfile','下载模板','',9,1,1,3,1),(50,'admin','Therapist','index','管理咨询师','',1,1,0,1,8),(51,'admin','Therapist','therapist_edit','添加咨询师','',2,1,50,3,8),(52,'admin','Therapist','therapist_edit','修改咨询师','',3,1,50,3,8),(53,'admin','Therapist','therapist_del','删除咨询师','',4,1,50,3,8),(54,'admin','Address','address_del','地址删除','',5,1,50,3,8),(55,'admin','Member','check_member','审核申请','',6,1,1,3,1),(56,'admin','Book','online_book','在线预约','',2,1,0,1,8),(57,'admin','Book','index','我的预约','',3,1,0,1,8),(58,'admin','Therapist','bind_user','绑定用户','',5,1,50,3,8);

/*Table structure for table `ci_role` */

DROP TABLE IF EXISTS `ci_role`;

CREATE TABLE `ci_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) DEFAULT '',
  `status` tinyint(1) DEFAULT '1',
  `remark` varchar(100) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `ci_role` */

insert  into `ci_role`(`id`,`name`,`status`,`remark`) values (1,'超级管理员',1,''),(2,'普通管理员',1,''),(3,'录入员',1,'1111133');

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

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `act_type` int(1) DEFAULT '0' COMMENT '账号类型1超级管理员2分支管理员',
  `department` varchar(120) DEFAULT '' COMMENT '所属部门',
  `username` varchar(60) DEFAULT '' COMMENT '用户名',
  `nickname` varchar(120) DEFAULT '' COMMENT '昵称',
  `password` varchar(40) DEFAULT '' COMMENT '密码',
  `token` varchar(50) DEFAULT '' COMMENT 'token',
  `ip` varchar(20) DEFAULT '' COMMENT 'IP',
  `lastlogin_time` int(10) DEFAULT NULL COMMENT '最后登录时间',
  `beizhu` varchar(200) DEFAULT '' COMMENT '备注',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1为禁用',
  `create_time` int(10) DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  KEY `act_type` (`act_type`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='管理员用户表';

/*Data for the table `user` */

insert  into `user`(`id`,`act_type`,`department`,`username`,`nickname`,`password`,`token`,`ip`,`lastlogin_time`,`beizhu`,`status`,`create_time`) values (1,1,'超级管理员','admin','超级管理员','9bad2764044171acdab696d32fb4c16d','f8b5bcf1d7f145bfd6dc6e835e3e69d1','127.0.0.1',1510639897,'',0,0),(3,3,'测试','admin1','123456','9bad2764044171acdab696d32fb4c16d','','127.0.0.1',1510107319,'123456',0,0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
