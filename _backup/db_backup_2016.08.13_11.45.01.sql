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
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `device_id` int(11) NOT NULL,
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
-- TABLE `tbl_book_table`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_book_table`;
CREATE TABLE IF NOT EXISTS `tbl_book_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `party_size` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_no` int(11) NOT NULL,
  `special_request` text NOT NULL,
  `email_subscription` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_book_table_create_user` (`create_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `tbl_contact_details`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_contact_details`;
CREATE TABLE IF NOT EXISTS `tbl_contact_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `google_plus` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `working_days` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `working_hours` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `zip_code` int(11) NOT NULL,
  `type_id` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `state_id` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `create_user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contact_details_create_user` (`create_user_id`),
  CONSTRAINT `tbl_contact_details_fk` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  KEY `fk_favourite_create_user` (`create_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_homepage`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_homepage`;
CREATE TABLE IF NOT EXISTS `tbl_homepage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tab_1_title` varchar(255) NOT NULL,
  `tab_1_sub_title` varchar(255) NOT NULL,
  `tab_1_description` text NOT NULL,
  `tab_1_image` varchar(255) NOT NULL,
  `box_1_title` varchar(255) NOT NULL,
  `box_1_description` text NOT NULL,
  `box_1_button_text` varchar(255) NOT NULL,
  `box_1_link` varchar(255) NOT NULL,
  `box_1_background` varchar(255) NOT NULL,
  `box_2_title` varchar(255) NOT NULL,
  `box_2_description` text NOT NULL,
  `box_2_button_text` varchar(255) NOT NULL,
  `box_2_link` varchar(255) NOT NULL,
  `box_2_background` varchar(255) NOT NULL,
  `tab_2_title` varchar(255) NOT NULL,
  `tab_2_text` varchar(255) NOT NULL,
  `tab_2_link` varchar(255) NOT NULL,
  `tab_2_button_text` varchar(255) NOT NULL,
  `tab_2_background` varchar(255) NOT NULL,
  `tab_3_title_1` varchar(255) NOT NULL,
  `tab_3_sub_title_1` varchar(255) NOT NULL,
  `tab_3_description` text NOT NULL,
  `tab_3_title_2` varchar(255) NOT NULL,
  `tab_3_sub_title_2` varchar(255) NOT NULL,
  `tab_3_background` varchar(255) NOT NULL,
  `tab_3_background_right` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_homepage_create_user` (`create_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `tbl_homepage_slider`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_homepage_slider`;
CREATE TABLE IF NOT EXISTS `tbl_homepage_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `link_label` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_homepage_slider_create_user` (`create_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

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
  KEY `FK_page_create_user` (`create_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_user`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `social_media_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `language` varchar(256) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'en',
  `nationality` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `work_in_abroad` tinyint(4) DEFAULT '0',
  `salary` int(11) NOT NULL,
  `martial_status` tinyint(1) NOT NULL,
  `employment` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `service_type` int(11) NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
  `email_verify` int(11) NOT NULL DEFAULT '0',
  `is_notification` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-enable notification ,0-disable notification',
  `state_id` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `last_visit_time` datetime DEFAULT NULL,
  `activation_key` varchar(512) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `login_error_count` int(11) NOT NULL DEFAULT '0',
  `employer_id` int(11) DEFAULT NULL,
  `create_user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `yiisession`
-- -------------------------------------------
DROP TABLE IF EXISTS `yiisession`;
CREATE TABLE IF NOT EXISTS `yiisession` (
  `id` char(32) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` longblob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE DATA YiiSession
-- -------------------------------------------
INSERT INTO `YiiSession` (`id`,`expire`,`data`) VALUES
('23rjeefejfi0h1mgk4uemmi0t5','1471070330','e1f990f79aae9e3f46fe67ce64c72a86__id|s:1:\"1\";e1f990f79aae9e3f46fe67ce64c72a86__name|s:5:\"Admin\";e1f990f79aae9e3f46fe67ce64c72a86id|s:1:\"1\";e1f990f79aae9e3f46fe67ce64c72a86__states|a:1:{s:2:\"id\";b:1;}');



-- -------------------------------------------
-- TABLE DATA tbl_book_table
-- -------------------------------------------
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('1','0000-00-00','05:00:00','1','1','1','1','1','<p>1</p>
','1','1','0','2016-08-09','0000-00-00','1');



-- -------------------------------------------
-- TABLE DATA tbl_contact_details
-- -------------------------------------------
INSERT INTO `tbl_contact_details` (`id`,`email`,`phone_no`,`facebook`,`twitter`,`google_plus`,`instagram`,`youtube`,`working_days`,`working_hours`,`address`,`city`,`country`,`zip_code`,`type_id`,`state_id`,`create_user_id`,`create_time`) VALUES
('1','info@test.in','1 234-567-8','facebook.com','twitter.com','google.com','instagram.com','youtube.com','Monday - Sunday','9.00 AM to 11.00 PM','11 phase mohali ','dehli','india','177208','0','0','1','');



-- -------------------------------------------
-- TABLE DATA tbl_homepage
-- -------------------------------------------
INSERT INTO `tbl_homepage` (`id`,`tab_1_title`,`tab_1_sub_title`,`tab_1_description`,`tab_1_image`,`box_1_title`,`box_1_description`,`box_1_button_text`,`box_1_link`,`box_1_background`,`box_2_title`,`box_2_description`,`box_2_button_text`,`box_2_link`,`box_2_background`,`tab_2_title`,`tab_2_text`,`tab_2_link`,`tab_2_button_text`,`tab_2_background`,`tab_3_title_1`,`tab_3_sub_title_1`,`tab_3_description`,`tab_3_title_2`,`tab_3_sub_title_2`,`tab_3_background`,`tab_3_background_right`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('1','about us','The Real Tast in Your Hands','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book....
','Homepage-1471005881-tab_1_image.jpg','Our Suppliers','The Real Tast in Your Hands','View our Suppliers','1','Homepage-1471005881-box_1_background.png','Our Events','The Real Tast in Your Hands
','View our Event','1','Homepage-1471005881-box_2_background.png','The Perfect','blend','1','Book a Table','Homepage-1471005881-tab_2_background.png','Meet Our Chef','The Real Tast in Your Hands','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.
','Shela Mathews','Executive Chef','Homepage-1471005881-tab_3_background.png','','0','0','2016-08-12','0000-00-00','1');



-- -------------------------------------------
-- TABLE DATA tbl_homepage_slider
-- -------------------------------------------
INSERT INTO `tbl_homepage_slider` (`id`,`title`,`sub_title`,`description`,`image`,`link`,`link_label`,`order`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('2','Welcome To','Our Restaurant','Lorem Ipsum is simply dummy text of the printing and typesetting industry','HomepageSlider-1470994433-image.jpg','','book a table','0','0','0','2016-08-11','0000-00-00','1');
INSERT INTO `tbl_homepage_slider` (`id`,`title`,`sub_title`,`description`,`image`,`link`,`link_label`,`order`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('3','Welcome To','Our Restaurant','Lorem Ipsum is simply dummy text of the printing and typesetting industry','HomepageSlider-1470918162-image.jpg','','book a table','0','0','0','2016-08-11','0000-00-00','1');
INSERT INTO `tbl_homepage_slider` (`id`,`title`,`sub_title`,`description`,`image`,`link`,`link_label`,`order`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('4','Welcome To','Our Restaurant','test','HomepageSlider-1470918386-image.jpg','','book a table','0','0','0','2016-08-11','0000-00-00','1');
INSERT INTO `tbl_homepage_slider` (`id`,`title`,`sub_title`,`description`,`image`,`link`,`link_label`,`order`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('5','sda','asd','asdsada','HomepageSlider-1470924084-image.jpg','','sa','0','0','0','2016-08-11','0000-00-00','1');



-- -------------------------------------------
-- TABLE DATA tbl_user
-- -------------------------------------------
INSERT INTO `tbl_user` (`id`,`role_id`,`first_name`,`last_name`,`title`,`email`,`password`,`social_media_id`,`phone_no`,`date_of_birth`,`language`,`nationality`,`work_in_abroad`,`salary`,`martial_status`,`employment`,`service_type`,`facebook`,`twitter`,`instagram`,`experience`,`religion`,`address`,`city`,`country`,`zip_code`,`currency_type`,`timezone`,`about_me`,`image_file`,`lat`,`long`,`tos`,`email_verify`,`is_notification`,`state_id`,`last_visit_time`,`activation_key`,`login_error_count`,`employer_id`,`create_user_id`,`create_time`) VALUES
('1','1','Admin','ad','','testing.swapdevelopment@gmail.com','cd84d683cc5612c69efe115c80d0b7dc','','8894054847','2014-03-04','en','india','0','0','0','','0','','','','0.00','','','dehli','','5','0','','helo everyone','','12.1212','12.1515','0','0','0','1','2016-08-13 10:14:37','63e68a17f6434f1f68dae0a82681187e','0','0','0','2015-07-01 11:20:03');
INSERT INTO `tbl_user` (`id`,`role_id`,`first_name`,`last_name`,`title`,`email`,`password`,`social_media_id`,`phone_no`,`date_of_birth`,`language`,`nationality`,`work_in_abroad`,`salary`,`martial_status`,`employment`,`service_type`,`facebook`,`twitter`,`instagram`,`experience`,`religion`,`address`,`city`,`country`,`zip_code`,`currency_type`,`timezone`,`about_me`,`image_file`,`lat`,`long`,`tos`,`email_verify`,`is_notification`,`state_id`,`last_visit_time`,`activation_key`,`login_error_count`,`employer_id`,`create_user_id`,`create_time`) VALUES
('38','3','Karan','asd','','swap.karan@gmail.com','cd84d683cc5612c69efe115c80d0b7dc','','123242343','2014-03-04','en','','0','0','0','','0','','','','','','sdsad','','','47','0','','','','','','1','0','1','0','2016-07-04 23:58:36','oSqz5GXM','0','','','2016-07-04 23:27:47');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
