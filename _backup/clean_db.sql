-- -------------------------------------------
SET AUTOCOMMIT=0;
START TRANSACTION;
SET SQL_QUOTE_SHOW_CREATE = 1;
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
-- -------------------------------------------
-- -------------------------------------------
-- START BACKUP
-- -------------------------------------------
-- -------------------------------------------
-- TABLE `YiiSession`
-- -------------------------------------------
DROP TABLE IF EXISTS `YiiSession`;
CREATE TABLE IF NOT EXISTS `YiiSession` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ha_logins`
-- -------------------------------------------
DROP TABLE IF EXISTS `ha_logins`;
CREATE TABLE IF NOT EXISTS `ha_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `loginProvider` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `loginProviderIdentifier` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loginProvider_2` (`loginProvider`,`loginProviderIdentifier`),
  KEY `loginProvider` (`loginProvider`),
  KEY `loginProviderIdentifier` (`loginProviderIdentifier`),
  KEY `userId` (`userId`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_auth_session`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_auth_session`;
CREATE TABLE IF NOT EXISTS `tbl_auth_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_code` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `device_token` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_session_create_user` (`create_user_id`),
  CONSTRAINT `fk_session_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_blog`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_blog`;
CREATE TABLE IF NOT EXISTS `tbl_blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail_file` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_blog_create_user` (`create_user_id`),
  CONSTRAINT `FK_blog_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_comment`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_comment`;
CREATE TABLE IF NOT EXISTS `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model_id` int(11) NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `comment` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `rate` float(5,2) DEFAULT NULL,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comment_create_user` (`create_user_id`),
  CONSTRAINT `tbl_comment_ibfk_2` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `tbl_favourite`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_favourite`;
CREATE TABLE IF NOT EXISTS `tbl_favourite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_favourite_job_id` (`job_id`),
  KEY `fk_favourite_create_user` (`create_user_id`),
  CONSTRAINT `fk_favourite_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`),
  CONSTRAINT `fk_favourite_job_id` FOREIGN KEY (`job_id`) REFERENCES `tbl_job` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_job`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_job`;
CREATE TABLE IF NOT EXISTS `tbl_job` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image_file` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT '0',
  `age_to` int(11) NOT NULL,
  `age_from` int(11) NOT NULL,
  `experience_to` int(11) NOT NULL,
  `experience_from` int(11) NOT NULL,
  `skills` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `need_by_date` date NOT NULL,
  `vacation_due_date` date DEFAULT NULL,
  `language` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` int(11) NOT NULL,
  `zip_code` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `long` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `is_feature` tinyint(1) NOT NULL DEFAULT '0',
  `is_view` tinyint(1) NOT NULL DEFAULT '1',
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `job_state_id` int(11) NOT NULL DEFAULT '0',
  `service_id` int(11) NOT NULL,
  `nationality_id` int(11) NOT NULL,
  `religion_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_job_service` (`service_id`),
  KEY `fk_job_religion_id` (`religion_id`),
  KEY `fk_job_nationality_id` (`nationality_id`),
  KEY `location_id` (`location_id`),
  CONSTRAINT `fk_job_nationality_id` FOREIGN KEY (`nationality_id`) REFERENCES `tbl_nationality` (`id`),
  CONSTRAINT `fk_job_religion_id` FOREIGN KEY (`religion_id`) REFERENCES `tbl_religion` (`id`),
  CONSTRAINT `fk_job_service` FOREIGN KEY (`service_id`) REFERENCES `tbl_service` (`id`),
  CONSTRAINT `tbl_job_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `tbl_location` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_job_employer`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_job_employer`;
CREATE TABLE IF NOT EXISTS `tbl_job_employer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) NOT NULL DEFAULT '0',
  `is_archive` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-purchase,1-archieve',
  `user_id` int(11) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_job_employer_create_user` (`user_id`),
  CONSTRAINT `FK_job_employer_create_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_job_skill`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_job_skill`;
CREATE TABLE IF NOT EXISTS `tbl_job_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skill_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_job_skill_job_id` (`job_id`),
  KEY `FK_job_skill_create_user` (`create_user_id`),
  KEY `FK_job_skill_id` (`skill_id`),
  CONSTRAINT `FK_job_skill_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`),
  CONSTRAINT `FK_job_skill_id` FOREIGN KEY (`skill_id`) REFERENCES `tbl_skills` (`id`),
  CONSTRAINT `FK_job_skill_job_id` FOREIGN KEY (`job_id`) REFERENCES `tbl_job` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_location`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_location`;
CREATE TABLE IF NOT EXISTS `tbl_location` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_arabic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_location_create_user` (`create_user_id`),
  CONSTRAINT `fk_location_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_menu`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE IF NOT EXISTS `tbl_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `page_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_menu_create_user` (`create_user_id`),
  CONSTRAINT `FK_menu_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_message`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_message`;
CREATE TABLE IF NOT EXISTS `tbl_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL,
  `to_state_id` int(11) NOT NULL,
  `from_state_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `read` int(11) NOT NULL DEFAULT '0',
  `image_file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbl_from_id` (`from_id`),
  KEY `tbl_toid` (`to_id`),
  CONSTRAINT `tbl_from_id` FOREIGN KEY (`from_id`) REFERENCES `tbl_user` (`id`),
  CONSTRAINT `tbl_to_id` FOREIGN KEY (`to_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_nationality`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_nationality`;
CREATE TABLE IF NOT EXISTS `tbl_nationality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `short_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `title_arabic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_nationality_create_user` (`create_user_id`),
  CONSTRAINT `fk_nationality_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_page`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_page`;
CREATE TABLE IF NOT EXISTS `tbl_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_page_create_user` (`create_user_id`),
  CONSTRAINT `FK_page_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_religion`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_religion`;
CREATE TABLE IF NOT EXISTS `tbl_religion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `title_arabic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_religion_create_user` (`create_user_id`),
  CONSTRAINT `fk_religion_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_service`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_service`;
CREATE TABLE IF NOT EXISTS `tbl_service` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_arabic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image_file` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_service_create_user` (`create_user_id`),
  CONSTRAINT `fk_service_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_skills`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_skills`;
CREATE TABLE IF NOT EXISTS `tbl_skills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `image_file` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_skills_create_user` (`create_user_id`),
  CONSTRAINT `fk_skills_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



-- -------------------------------------------
-- TABLE `tbl_subscription_plans`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_subscription_plans`;
CREATE TABLE IF NOT EXISTS `tbl_subscription_plans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `price` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `validity` int(11) NOT NULL DEFAULT '3',
  `vat_apply` int(11) NOT NULL DEFAULT '0',
  `search_hits` int(11) NOT NULL,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL DEFAULT '1',
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_user`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `nationality` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `work_in_abroad` tinyint(4) DEFAULT '0' COMMENT '0 means with in country, 1 all over the world',
  `salary` int(11) NOT NULL,
  `martial_status` tinyint(1) NOT NULL,
  `employment` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `experience` float(5,2) DEFAULT NULL,
  `religion` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` int(11) NOT NULL,
  `currency_type` int(11) NOT NULL,
  `timezone` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `about_me` text COLLATE utf8_unicode_ci,
  `image_file` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `long` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `tos` int(11) NOT NULL DEFAULT '0',
  `role_id` int(11) NOT NULL,
  `is_notification` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-enable notification ,0-disable notification',
  `state_id` int(11) NOT NULL DEFAULT '0',
  `last_visit_time` datetime DEFAULT NULL,
  `activation_key` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `login_error_count` int(11) NOT NULL DEFAULT '0',
  `employer_id` int(11) DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_user_email`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_user_email`;
CREATE TABLE IF NOT EXISTS `tbl_user_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `model_id` int(11) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `view` varchar(512) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `model_type` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `failure_count` int(11) NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `update_time` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_email_user` (`user_id`),
  CONSTRAINT `fk_user_email_user` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_user_plan`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_user_plan`;
CREATE TABLE IF NOT EXISTS `tbl_user_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `validity` int(11) NOT NULL,
  `is_expired` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 - not expire,1-expired',
  `search_hits` int(11) NOT NULL,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL DEFAULT '0',
  `plan_id` int(11) DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_plan_id` (`plan_id`),
  KEY `fk_user_plan_user` (`create_user_id`),
  CONSTRAINT `fk_user_plan_id` FOREIGN KEY (`plan_id`) REFERENCES `tbl_subscription_plans` (`id`),
  CONSTRAINT `fk_user_plan_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_user_skill`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_user_skill`;
CREATE TABLE IF NOT EXISTS `tbl_user_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `job_id` int(11) NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_user_skill_job_id` (`job_id`),
  KEY `FK_user_skill_create_user` (`create_user_id`),
  CONSTRAINT `FK_user_skill_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`),
  CONSTRAINT `FK_user_skill_job_id` FOREIGN KEY (`job_id`) REFERENCES `tbl_job` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;









-- -------------------------------------------
-- TABLE DATA tbl_location
-- -------------------------------------------
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('8','Riyadh','الرياض','','0','0','2015-07-13 18:25:37','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('9','Jeddah','جدة','','0','0','2015-07-13 18:26:19','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('10','Mecca','مكة المكرمة','','0','0','2015-07-13 18:26:30','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('11','Medina','المدينة المنورة','','0','0','2015-07-13 18:26:41','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('12','Al-Ahsa','الأحساء','','0','0','2015-07-13 18:26:51','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('13','Ta\'if','الطائف','','0','0','2015-07-13 18:27:09','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('14','Dammam','دمام','','0','0','2015-07-13 18:27:22','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('15','Khamis Mushait','خميس مشيط','','0','0','2015-07-13 18:27:32','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('16','Buraidah','بريده','','0','0','2015-07-13 18:27:44','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('17','Khobar','الخبر','','0','0','2015-07-13 18:27:54','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('18','Tabuk','تبوك','','0','0','2015-07-13 18:28:08','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('19','Ha\'il','حائل','','0','0','2015-07-13 18:28:20','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('20','Hafar Al-Batin','حفر الباطن','','0','0','2015-07-13 18:28:33','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('21','Jubail','الجبيل','','0','0','2015-07-13 18:28:45','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('22','Al-Kharj','الخرج','','0','0','2015-07-13 18:28:54','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('23','Qatif','القطيف','','0','0','2015-07-13 18:29:05','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('24','Abha','أبها','','0','0','2015-07-13 18:29:16','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('25','Najran','نجران','','0','0','2015-07-13 18:29:27','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('26','Yanbu','ينبع','','0','0','2015-07-13 18:29:39','1');
INSERT INTO `tbl_location` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('27','Al Qunfudhah','القنفذة','','0','0','2015-07-13 18:29:50','1');



-- -------------------------------------------
-- TABLE DATA tbl_message
-- -------------------------------------------




-- -------------------------------------------
-- TABLE DATA tbl_nationality
-- -------------------------------------------
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('247','','Afghanistan','أفغانستان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('248','','Albania','ألبانيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('249','','Algeria','الجزائر','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('250','','American Samoa','ساموا-الأمريكي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('251','','Andorra','أندورا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('252','','Angola','أنغولا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('253','','Anguilla','أنغويلا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('254','','Antarctica','أنتاركتيكا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('255','','Antigua and Barbuda','أنتيغوا وبربودا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('256','','Argentina','الأرجنتين','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('257','','Armenia','أرمينيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('258','','Aruba','أروبه','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('259','','Australia','أستراليا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('260','','Austria','النمسا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('261','','Azerbaijan','أذربيجان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('262','','Bahamas','الباهاماس','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('263','','Bahrain','البحرين','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('264','','Bangladesh','بنغلاديش','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('265','','Barbados','بربادوس','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('266','','Belarus','روسيا البيضاء','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('267','','Belgium','بلجيكا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('268','','Belize','بيليز','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('269','','Benin','بنين','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('270','','Bermuda','جزر برمودا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('271','','Bhutan','بوتان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('272','','Bolivia','بوليفيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('273','','Bosnia and Herzegovina','البوسنة و الهرسك','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('274','','Botswana','بوتسوانا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('275','','Brazil','البرازيل','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('276','','Brunei Darussalam','بروني','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('277','','Bulgaria','بلغاريا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('278','','Burkina Faso','بوركينا فاسو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('279','','Burundi','بوروندي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('280','','Cambodia','كمبوديا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('281','','Cameroon','كاميرون','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('282','','Canada','كندا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('283','','Cape Verde','الرأس الأخضر','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('284','','Cayman Islands','Not Available','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('285','','Central African Republic','جمهورية أفريقيا الوسطى','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('286','','Chad','تشاد','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('287','','Chile','شيلي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('288','','China','جمهورية الصين الشعبية','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('289','','Colombia','كولومبيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('290','','Comoros','جزر القمر','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('291','','Democratic Republic','جمهورية الكونغو الديمقراطية','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('292','','of the Congo (Kinshasa)','Not Available','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('293','','Congo, Republic of (Brazzaville)','جمهورية الكونغو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('294','','Cook Islands','جزر كوك','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('295','','Costa Rica','كوستاريكا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('296','','Cote dIvoire','ساحلالعاج','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('297','','Croatia','كرواتيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('298','','Cuba','كوبا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('299','','Cyprus','قبرص','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('300','','Czech Republic','الجمهوريةالتشيكية','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('301','','Denmark','الدانمارك','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('302','','Djibouti','جيبوتي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('303','','Dominica','دومينيكا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('304','','Dominican Republic','الجمهوريةالدومينيكية','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('305','','East Timor Timor-Leste','تيمورالشرقية','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('306','','Ecuador','إكوادور','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('307','','Egypt','مصر','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('308','','El Salvador','إلسلفادور','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('309','','Equatorial Guinea','غينياالاستوائي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('310','','Eritrea','إريتريا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('311','','Estonia','استونيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('312','','Ethiopia','أثيوبيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('313','','Falkland Islands','NotAvailable','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('314','','FaroeIslands','جزرفارو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('315','','Fiji','فيجي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('316','','Finland','فنلندا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('317','','France','فرنسا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('318','','FrenchGuiana','غوياناالفرنسية','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('319','','FrenchPolynesia','بولينيزياالفرنسية','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('320','','Gabon','الغابون','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('321','','Gambia','غامبيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('322','','Georgia','جيورجيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('323','','Germany','ألمانيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('324','','Ghana','غانا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('325','','Gibraltar','جبلطارق','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('326','','Greece','اليونان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('327','','Greenland','جرينلاند','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('328','','Grenada','غرينادا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('329','','Guadeloupe','جزرجوادلوب','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('330','','Guam','جوام','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('331','','Guatemala','غواتيمال','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('332','','Guinea','غينيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('333','','Guinea-Bissau','غينيا-بيساو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('334','','Guyana','غيانا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('335','','Haiti','هايتي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('336','','Honduras','هندوراس','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('337','','HongKong','هونغكونغ','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('338','','Hungary','المجر','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('339','','Iceland','آيسلندا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('340','','India','الهند','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('341','','Indonesia','أندونيسيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('342','','Iran','إيران','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('343','','Iraq','العراق','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('344','','Ireland','إيرلندا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('345','','Israel','إسرائيل','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('346','','Italy','إيطاليا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('347','','Jamaica','جمايكا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('348','','Japan','اليابان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('349','','Jordan','الأردن','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('350','','Kazakhstan','كازاخستان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('351','','Kenya','كينيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('352','','Kiribati','كيريباتي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('353','','Korea, (NorthKorea)','كورياالشمالية','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('354','','Korea, (SouthKorea)','كورياالجنوبية','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('355','','Kuwait','الكويت','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('356','','Kyrgyzstan','قيرغيزستان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('357','','Lao, PDR','لاوس','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('358','','Latvia','لاتفيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('359','','Lebanon','لبنان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('360','','Lesotho','ليسوتو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('361','','Liberia','ليبيريا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('362','','Libya','ليبيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('363','','Liechtenstein','ليختنشتين','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('364','','Lithuania','لتوانيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('365','','Luxembourg','لوكسمبورغ','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('366','','Macao','ماكاو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('367','','Macedonia, Rep.of','مقدونيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('368','','Madagascar','مدغشقر','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('369','','Malawi','مالاوي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('370','','Malaysia','ماليزيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('371','','Maldives','المالديف','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('372','','Mali','مالي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('373','','Malta','مالطا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('374','','MarshallIslands','جزرمارشال','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('375','','Martinique','مارتينيك','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('376','','Mauritania','موريتانيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('377','','Mauritius','موريشيوس','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('378','','Mexico','المكسيك','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('379','','Micronesia','مايكرونيزيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('380','','Moldova','مولدافيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('381','','Monaco','موناكو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('382','','Mongolia','منغوليا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('383','','Montenegro','الجبلالأسو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('384','','Montserrat','مونتسيرات','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('385','','Morocco','المغرب','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('386','','Mozambique','موزمبيق','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('387','','Myanmar, Burma','ميانمار','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('388','','Namibia','ناميبيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('389','','Nauru','نورو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('390','','Nepal','نيبال','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('391','','Netherlands','هولندا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('392','','Netherlands Antilles','جزرالأنتيلالهولندي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('393','','NewCaledonia','كاليدونياالجديدة','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('394','','NewZealand','نيوزيلندا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('395','','Nicaragua','نيكاراجوا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('396','','Niger','النيجر','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('397','','Nigeria','نيجيريا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('398','','Niue','ني','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('399','','Northern Mariana Islands','جزرمارياناالشمالية','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('400','','Norway','النرويج','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('401','','Oman','عُمان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('402','','Pakistan','باكستان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('403','','Palau','بالاو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('404','','Palestine','فلسطين','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('405','','Panama','بنما','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('406','','Papua New Guinea','بابواغينياالجديدة','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('407','','Paraguay','باراغواي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('408','','Peru','بيرو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('409','','Philippines','الفليبين','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('410','','Poland','بولونيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('411','','Portugal','البرتغال','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('412','','PuertoRico','بورتوريكو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('413','','Qatar','قطر','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('414','','Reunion Island','ريونيون','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('415','','Romania','رومانيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('416','','Russia','روسيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('417','','Rwanda','رواندا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('418','','SaintKittsandNevis','سانتكيتسونيفس','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('419','','SaintLucia','سانتلوسيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('420','','SaintVincentandthe','سانتفنسنتوجزرغرينادين','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('421','','Grenadines','NotAvailable','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('422','','Samoa','المناطق','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('423','','SanMarino','سانمارينو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('424','','Sao Tome and Príncipe','ساوتوميوبرينسيبي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('425','','Saudi Arabia','المملكةالعربيةالسعودية','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('426','','Senegal','السنغال','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('427','','Serbia','جمهوريةصربيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('428','','Seychelles','سيشيل','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('429','','SierraLeone','سيراليون','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('430','','Singapore','سنغافورة','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('431','','Slovakia','سلوفاكيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('432','','Slovenia','سلوفينيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('433','','Solomon Islands','جزرسليمان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('434','','Somalia','الصومال','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('435','','South Africa','جنوبأفريقيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('436','','Spain','إسبانيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('437','','SriLanka','سريلانكا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('438','','Sudan','السودان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('439','','Suriname','سورينام','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('440','','Swaziland','سوازيلند','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('441','','Sweden','السويد','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('442','','Switzerland','سويسرا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('443','','Syria','سوريا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('444','','Taiwan','تايوان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('445','','Tajikistan','طاجيكستان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('446','','Tanzania','تنزانيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('447','','Thailand','تايلندا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('448','','Tibet','تبت','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('449','','Timor-Leste(EastTimor)','تيمورالشرقية','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('450','','Togo','توغو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('451','','Tokelau','NotAvailable','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('452','','Tonga','تونغا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('453','','Trinidad and Tobago','ترينيدادوتوباغو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('454','','Tunisia','تونس','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('455','','Turkey','تركيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('456','','Turkmenistan','تركمانستان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('457','','Tuvalu','توفالو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('458','','Uganda','أوغندا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('459','','Ukraine','أوكرانيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('460','','United Arab Emirates','الإماراتالعرب','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('461','','United Kingdom','المملكةالمتحدة','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('462','','United States','الولاياتالمتحدة','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('463','','Uruguay','أورغواي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('464','','Uzbekistan','أوزباكستان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('465','','Vanuatu','فانواتو','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('466','','VaticanCityState','الفاتيكان','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('467','','Venezuela','فنزويلا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('468','','Vietnam','فيتنام','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('469','','VirginIslands(British)','الجزرالعذراءالبريطانية','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('470','','VirginIslands(U.S.)','الجزرالعذراءالأمريكي','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('471','','Wallisand','والسوفوتونا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('472','','FutunaIslands','NotAvailable','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('473','','WesternSahara','الصحراءالغربية','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('474','','Yemen','اليمن','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('475','','Zambia','زامبيا','','0','0','','');
INSERT INTO `tbl_nationality` (`id`,`short_name`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('476','','Zimbabwe','زمبابوي','','0','0','','');



-- -------------------------------------------
-- TABLE DATA tbl_religion
-- -------------------------------------------
INSERT INTO `tbl_religion` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('1','Islam','الإسلام','','0','0','2015-07-14 09:38:29','1');
INSERT INTO `tbl_religion` (`id`,`title`,`title_arabic`,`description`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('2','Others','آخرون','','0','0','2015-07-14 09:38:39','1');



-- -------------------------------------------
-- TABLE DATA tbl_service
-- -------------------------------------------
INSERT INTO `tbl_service` (`id`,`title`,`title_arabic`,`description`,`image_file`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('50','Maid','خادمة','Labour working','Service-1437571943-image_file.jpg','0','0','2015-07-07 16:14:12','1');
INSERT INTO `tbl_service` (`id`,`title`,`title_arabic`,`description`,`image_file`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('51','Driver','سائق','driving work','Service-1437571923-image_file.jpeg','0','0','2015-07-07 16:14:42','1');
INSERT INTO `tbl_service` (`id`,`title`,`title_arabic`,`description`,`image_file`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('52','Cooker','طباخة','Kitching Gardning','Service-1437571894-image_file.jpg','0','0','2015-07-07 16:16:10','1');
INSERT INTO `tbl_service` (`id`,`title`,`title_arabic`,`description`,`image_file`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('53','Nanny','مربية','','Service-1437571911-image_file.jpg','0','0','2015-07-14 18:38:25','1');
INSERT INTO `tbl_service` (`id`,`title`,`title_arabic`,`description`,`image_file`,`state_id`,`type_id`,`create_time`,`create_user_id`) VALUES
('59','Nurse','ممرضة','','Service-1437571811-image_file.jpeg','0','0','2015-07-20 09:52:21','1');



-- -------------------------------------------
-- TABLE DATA tbl_skills
-- -------------------------------------------





-- -------------------------------------------
-- TABLE DATA tbl_subscription_plans
-- -------------------------------------------
INSERT INTO `tbl_subscription_plans` (`id`,`title`,`description`,`price`,`validity`,`vat_apply`,`search_hits`,`state_id`,`type_id`,`create_time`) VALUES
('1','Yearly Subscription plan ','Yearly Subscription plan with unlimited Free Search Hits','168','12','0','5','1','1','2015-07-03 14:33:09');
INSERT INTO `tbl_subscription_plans` (`id`,`title`,`description`,`price`,`validity`,`vat_apply`,`search_hits`,`state_id`,`type_id`,`create_time`) VALUES
('5','6 Month Subscription plan','6 Month Subscription plan Unlimited free hits','96','6','0','5','0','1','2015-07-20 15:20:59');
INSERT INTO `tbl_subscription_plans` (`id`,`title`,`description`,`price`,`validity`,`vat_apply`,`search_hits`,`state_id`,`type_id`,`create_time`) VALUES
('6','3 Month Subscription plan','3 Month Subscription plan','54','3','0','5','0','1','2015-07-20 15:21:22');
INSERT INTO `tbl_subscription_plans` (`id`,`title`,`description`,`price`,`validity`,`vat_apply`,`search_hits`,`state_id`,`type_id`,`create_time`) VALUES
('7','1 Month Subscription plan','1 Month Subscription plan','20','1','0','5','0','1','2015-07-20 15:21:51');
INSERT INTO `tbl_subscription_plans` (`id`,`title`,`description`,`price`,`validity`,`vat_apply`,`search_hits`,`state_id`,`type_id`,`create_time`) VALUES
('8','Free Trial','15 days free trial','0','0','0','15','0','0','2015-07-21 00:00:00');



-- -------------------------------------------
-- TABLE DATA tbl_user
-- -------------------------------------------
INSERT INTO `tbl_user` (`id`,`first_name`,`last_name`,`email`,`password`,`phone_no`,`language`,`nationality`,`date_of_birth`,`work_in_abroad`,`salary`,`martial_status`,`employment`,`experience`,`religion`,`address`,`city`,`country`,`zip_code`,`currency_type`,`timezone`,`about_me`,`image_file`,`lat`,`long`,`tos`,`role_id`,`is_notification`,`state_id`,`last_visit_time`,`activation_key`,`login_error_count`,`employer_id`,`create_user_id`,`create_time`) VALUES
('1','Karan','ad','admin@flamedevelopers.com','21232f297a57a5a743894a0e4a801fc3','8894054847','ar','india','0000-00-00','0','0','0','','0.00','','','dehli','','0','0','','helo everyone','User-1436946233-image_file.jpg','12.1212','12.1515','0','1','0','1','2015-08-05 19:45:16','63e68a17f6434f1f68dae0a82681187e','0','0','0','2015-07-01 11:20:03');




-- -------------------------------------------
-- TABLE DATA tbl_user_plan
-- -------------------------------------------



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
