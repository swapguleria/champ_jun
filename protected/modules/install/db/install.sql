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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_post`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_post`;
CREATE TABLE IF NOT EXISTS `tbl_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image_file` varchar(1024) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_post_create_user` (`create_user_id`),
  CONSTRAINT `FK_post_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
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
  `contact_no` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `zipcode` int(11) NOT NULL,
  `currency_type` int(11) NOT NULL,
  `timezone` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `about_me` text COLLATE utf8_unicode_ci,
  `image_file` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `long` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `tos` int(11) NOT NULL DEFAULT '0',
  `role_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `last_visit_time` datetime DEFAULT NULL,
  `last_action_time` datetime DEFAULT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `activation_key` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `login_error_count` int(11) NOT NULL DEFAULT '0',
  `create_user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE DATA YiiSession
-- -------------------------------------------
INSERT INTO `YiiSession` (`id`,`expire`,`data`) VALUES
('gavtug5ik8tl844nbouu25gaf0','1434374599','6f6833d8c9ebc25bf72ac7ca5f6a9f0d__returnUrl|s:38:\"/php/projectBase/backup/default/create\";6f6833d8c9ebc25bf72ac7ca5f6a9f0d__id|s:1:\"4\";6f6833d8c9ebc25bf72ac7ca5f6a9f0d__name|s:5:\"admin\";6f6833d8c9ebc25bf72ac7ca5f6a9f0did|s:1:\"4\";6f6833d8c9ebc25bf72ac7ca5f6a9f0d__states|a:1:{s:2:\"id\";b:1;}');



-- -------------------------------------------
-- TABLE DATA tbl_blog
-- -------------------------------------------
INSERT INTO `tbl_blog` (`id`,`title`,`content`,`thumbnail_file`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('2','choco','<p>chocolate</p>
','Blog-1434353197-thumbnail_file.jpg','0','0','2015-06-15 12:56:37','0000-00-00 00:00:00','4');



-- -------------------------------------------
-- TABLE DATA tbl_menu
-- -------------------------------------------
INSERT INTO `tbl_menu` (`id`,`title`,`page_id`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('1','About','1','0','1','2015-06-15 13:34:49','0000-00-00 00:00:00','4');
INSERT INTO `tbl_menu` (`id`,`title`,`page_id`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('2','Privacy','2','0','1','2015-06-15 14:31:53','0000-00-00 00:00:00','4');
INSERT INTO `tbl_menu` (`id`,`title`,`page_id`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('4','settings','3','0','1','2015-06-15 14:54:26','0000-00-00 00:00:00','4');



-- -------------------------------------------
-- TABLE DATA tbl_page
-- -------------------------------------------
INSERT INTO `tbl_page` (`id`,`title`,`description`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('1','About','<p>About Us</p>
','0','0','2015-06-15 13:32:29','0000-00-00 00:00:00','4');
INSERT INTO `tbl_page` (`id`,`title`,`description`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('2','Privacy','<p>Privacy</p>
','0','0','2015-06-15 14:37:48','0000-00-00 00:00:00','4');
INSERT INTO `tbl_page` (`id`,`title`,`description`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('3','settings','<p>settings</p>
','0','0','2015-06-15 14:55:16','0000-00-00 00:00:00','4');



-- -------------------------------------------
-- TABLE DATA tbl_post
-- -------------------------------------------
INSERT INTO `tbl_post` (`id`,`title`,`content`,`image_file`,`tags`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('1','chocolate','<p>Chocolate<br />
&nbsp;</p>
','Post-1434352443-image_file.jpg','chocolate','0','0','2015-06-15 12:40:02','0000-00-00 00:00:00','4');



-- -------------------------------------------
-- TABLE DATA tbl_user
-- -------------------------------------------
INSERT INTO `tbl_user` (`id`,`first_name`,`last_name`,`email`,`password`,`contact_no`,`address`,`city`,`country`,`zipcode`,`currency_type`,`timezone`,`date_of_birth`,`about_me`,`image_file`,`lat`,`long`,`tos`,`role_id`,`state_id`,`last_visit_time`,`last_action_time`,`last_password_change`,`activation_key`,`login_error_count`,`create_user_id`,`create_time`) VALUES
('4','admin','','admin@flamedevelopers.com','21232f297a57a5a743894a0e4a801fc3','99999999999','','','','0','0','','2015-06-18','hi.I am admin','User-1434350697-image_file.png','','','0','1','1','2015-06-15 18:28:25','','','','0','','2015-06-15 12:09:15');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
