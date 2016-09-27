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
-- TABLE `tbl_about`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_about`;
CREATE TABLE IF NOT EXISTS `tbl_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tab_1_title` varchar(255) NOT NULL,
  `tab_1_sub_title` varchar(255) NOT NULL,
  `tab_1_image` varchar(255) NOT NULL,
  `tab_2_title` varchar(255) NOT NULL,
  `tab_2_sub_title` varchar(255) NOT NULL,
  `tab_2_description` text NOT NULL,
  `tab_2_image` varchar(255) NOT NULL,
  `box_1_image_logo` varchar(255) NOT NULL,
  `box_1_title` varchar(255) NOT NULL,
  `box_1_description` varchar(255) NOT NULL,
  `box_2_image_logo` varchar(255) NOT NULL,
  `box_2_title` varchar(255) NOT NULL,
  `box_2_description` varchar(255) NOT NULL,
  `box_3_image_logo` varchar(255) NOT NULL,
  `box_3_title` varchar(255) NOT NULL,
  `box_3_description` varchar(255) NOT NULL,
  `tab_4_title` varchar(255) NOT NULL,
  `tab_4_sub_title` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_about_create_user` (`create_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_banner`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_banner`;
CREATE TABLE IF NOT EXISTS `tbl_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tagline` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_banner_create_user` (`create_user_id`),
  KEY `fk_banner_url` (`url_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

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
-- TABLE `tbl_book_page`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_book_page`;
CREATE TABLE IF NOT EXISTS `tbl_book_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tab_1_title` varchar(255) NOT NULL,
  `tab_2_title` varchar(255) NOT NULL,
  `tab_1_image` varchar(255) NOT NULL,
  `tab_2_image` varchar(255) NOT NULL,
  `tab_1_desc` varchar(255) NOT NULL,
  `tab_2_desc` varchar(255) NOT NULL,
  `button_2_text` varchar(255) NOT NULL,
  `button_1_text` varchar(255) NOT NULL,
  `image_right` varchar(255) NOT NULL,
  `image_left` varchar(255) NOT NULL,
  `subscribe` varchar(255) NOT NULL DEFAULT '0',
  `img_tr` varchar(255) NOT NULL,
  `title_tr` varchar(255) NOT NULL,
  `tag_line_tr` varchar(255) NOT NULL,
  `map_title_tr` varchar(255) NOT NULL,
  `map_content_tr` text NOT NULL,
  `page_title_tr` varchar(255) NOT NULL,
  `page_tag_line_tr` varchar(255) NOT NULL,
  `desc_tr` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `cnf_descp` varchar(255) NOT NULL,
  `cnf_checkbox_text` varchar(255) NOT NULL,
  `cnf_btn_text` varchar(255) NOT NULL,
  `thankyou_title` varchar(255) NOT NULL,
  `thankyou_tagline` varchar(255) NOT NULL,
  `thankyou_descp` text NOT NULL,
  `thankyou_cancel_button` varchar(255) NOT NULL,
  `cancel_title` varchar(255) NOT NULL,
  `cancel_tagline` varchar(255) NOT NULL,
  `cancel_descp` text NOT NULL,
  `extra_text_1` int(11) NOT NULL,
  `extra_text_2` int(11) NOT NULL,
  `extra_text_3` int(11) NOT NULL,
  `extra_textarea_1` varchar(255) NOT NULL,
  `extra_textarea_2` varchar(255) NOT NULL,
  `extra_textarea_3` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

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
-- TABLE `tbl_booked_table`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_booked_table`;
CREATE TABLE IF NOT EXISTS `tbl_booked_table` (
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
  KEY `fk_booked_table_create_user` (`create_user_id`)
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
-- TABLE `tbl_contact`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_contact`;
CREATE TABLE IF NOT EXISTS `tbl_contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `create_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `map` text COLLATE utf8_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_sub_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `footer_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `state_id` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `create_user_id` int(11) DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_contact_details_create_user` (`create_user_id`),
  CONSTRAINT `tbl_contact_details_fk` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_enquiry`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_enquiry`;
CREATE TABLE IF NOT EXISTS `tbl_enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `party_size` int(11) NOT NULL,
  `terms` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_enquery_create_user` (`create_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

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
-- TABLE `tbl_meal`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_meal`;
CREATE TABLE IF NOT EXISTS `tbl_meal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `sub_title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `days` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `timings` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `background_image` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_meal_create_user` (`create_user_id`),
  CONSTRAINT `fk_meal_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_meal_item`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_meal_item`;
CREATE TABLE IF NOT EXISTS `tbl_meal_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meal_id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `sub_title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `image` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `background_image` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL DEFAULT '0',
  `type_id` int(11) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_meal_item_meal` (`meal_id`),
  KEY `fk_meal_item_create_user` (`create_user_id`),
  CONSTRAINT `fk_meal_item_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`),
  CONSTRAINT `fk_meal_item_meal` FOREIGN KEY (`meal_id`) REFERENCES `tbl_meal` (`id`)
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
-- TABLE `tbl_offers`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_offers`;
CREATE TABLE IF NOT EXISTS `tbl_offers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_offers_create_user` (`create_user_id`),
  CONSTRAINT `fk_offers_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_opening_time`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_opening_time`;
CREATE TABLE IF NOT EXISTS `tbl_opening_time` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `offer_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_opening_time_create_user` (`create_user_id`),
  KEY `fk_opening_time_offer` (`offer_id`),
  CONSTRAINT `fk_opening_time_create_user` FOREIGN KEY (`create_user_id`) REFERENCES `tbl_user` (`id`),
  CONSTRAINT `fk_opening_time_offer` FOREIGN KEY (`offer_id`) REFERENCES `tbl_offers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `tbl_our_team`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_our_team`;
CREATE TABLE IF NOT EXISTS `tbl_our_team` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_our_team_create_user` (`create_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

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
-- TABLE `tbl_testimonial`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_testimonial`;
CREATE TABLE IF NOT EXISTS `tbl_testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_testimonial_create_user` (`create_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `tbl_url`
-- -------------------------------------------
DROP TABLE IF EXISTS `tbl_url`;
CREATE TABLE IF NOT EXISTS `tbl_url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `create_time` date NOT NULL,
  `update_time` date NOT NULL,
  `create_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_url_create_user` (`create_user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

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
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
('o8aflhbcc8ldti40dlmbqubsb0','1474976795','09ec7edbe55c724a84f22eef1d26237a__returnUrl|s:12:\"/beta/backup\";09ec7edbe55c724a84f22eef1d26237a__id|s:1:\"1\";09ec7edbe55c724a84f22eef1d26237a__name|s:5:\"Admin\";09ec7edbe55c724a84f22eef1d26237aid|s:1:\"1\";09ec7edbe55c724a84f22eef1d26237a__states|a:1:{s:2:\"id\";b:1;}');
INSERT INTO `YiiSession` (`id`,`expire`,`data`) VALUES
('bmog8okkqije91gi0q5d24va04','1474976486','');
INSERT INTO `YiiSession` (`id`,`expire`,`data`) VALUES
('mjvi8s5u5skgh96h5jesihh0q5','1474975965','');
INSERT INTO `YiiSession` (`id`,`expire`,`data`) VALUES
('uo7tffg2m4ajnug3qkffecu9r6','1474976497','');
INSERT INTO `YiiSession` (`id`,`expire`,`data`) VALUES
('i970r0peed5ik4qrcal50p7t13','1474975960','');
INSERT INTO `YiiSession` (`id`,`expire`,`data`) VALUES
('ki211a09c363a7kfbcdtujv4i3','1474976609','');
INSERT INTO `YiiSession` (`id`,`expire`,`data`) VALUES
('vv5h0368p4ieh3sghp757pvfb5','1474975814','');
INSERT INTO `YiiSession` (`id`,`expire`,`data`) VALUES
('k7qsqourgh3g6smam61jap1no0','1474975632','');



-- -------------------------------------------
-- TABLE DATA tbl_about
-- -------------------------------------------
INSERT INTO `tbl_about` (`id`,`tab_1_title`,`tab_1_sub_title`,`tab_1_image`,`tab_2_title`,`tab_2_sub_title`,`tab_2_description`,`tab_2_image`,`box_1_image_logo`,`box_1_title`,`box_1_description`,`box_2_image_logo`,`box_2_title`,`box_2_description`,`box_3_image_logo`,`box_3_title`,`box_3_description`,`tab_4_title`,`tab_4_sub_title`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('1','About ','Juniper Tree','About-1471527282-tab_1_image.jpg','About Us','The Real Tast in Your Hands','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book....','About-1471865973-tab_2_image.png','About-1471693785-box_1_image_logo.png','We Are Open Everyday','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the...','About-1471693785-box_2_image_logo.png','Special Dishes','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the...','About-1471693785-box_3_image_logo.png','Expert Chef','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the...','Meet Our Team','The Real Tast in Your Hands','0','0','2016-08-18','0000-00-00','1');



-- -------------------------------------------
-- TABLE DATA tbl_banner
-- -------------------------------------------
INSERT INTO `tbl_banner` (`id`,`url_id`,`name`,`tagline`,`image`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('1','1','About','Juniper Tree','Banner-1471692025-image.jpg','0','0','2016-08-20','0000-00-00','1');
INSERT INTO `tbl_banner` (`id`,`url_id`,`name`,`tagline`,`image`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('2','2','Menu','Juniper Tree','Banner-1471692175-image.jpg','0','0','2016-08-20','0000-00-00','1');
INSERT INTO `tbl_banner` (`id`,`url_id`,`name`,`tagline`,`image`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('3','3','Book table','Juniper tree','Banner-1471692259-image.jpg','0','0','2016-08-20','0000-00-00','1');
INSERT INTO `tbl_banner` (`id`,`url_id`,`name`,`tagline`,`image`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('5','4','Contact Us','Juniper Tree','Banner-1471692325-image.jpg','0','0','2016-08-20','0000-00-00','1');
INSERT INTO `tbl_banner` (`id`,`url_id`,`name`,`tagline`,`image`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('6','10','Book Table','Juniper Tree','Banner-1472815625-image.jpg','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_banner` (`id`,`url_id`,`name`,`tagline`,`image`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('7','8','Book Table','Juniper Tree','Banner-1472817024-image.jpg','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_banner` (`id`,`url_id`,`name`,`tagline`,`image`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('8','6','Book Table','Juniper Tree','Banner-1472817147-image.jpg','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_banner` (`id`,`url_id`,`name`,`tagline`,`image`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('9','7','Book Table','Juniper Tree','Banner-1472818073-image.jpg','0','0','2016-09-02','0000-00-00','1');



-- -------------------------------------------
-- TABLE DATA tbl_book_page
-- -------------------------------------------
INSERT INTO `tbl_book_page` (`id`,`tab_1_title`,`tab_2_title`,`tab_1_image`,`tab_2_image`,`tab_1_desc`,`tab_2_desc`,`button_2_text`,`button_1_text`,`image_right`,`image_left`,`subscribe`,`img_tr`,`title_tr`,`tag_line_tr`,`map_title_tr`,`map_content_tr`,`page_title_tr`,`page_tag_line_tr`,`desc_tr`,`description`,`cnf_descp`,`cnf_checkbox_text`,`cnf_btn_text`,`thankyou_title`,`thankyou_tagline`,`thankyou_descp`,`thankyou_cancel_button`,`cancel_title`,`cancel_tagline`,`cancel_descp`,`extra_text_1`,`extra_text_2`,`extra_text_3`,`extra_textarea_1`,`extra_textarea_2`,`extra_textarea_3`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('1','Book a Table','Group bookings','BookPage-1472800143-tab_1_image.png','BookPage-1472800143-tab_2_image.png','1 - 12 people','13+ people','Enquire now','Book now','BookPage-1472800143-image_right.png','BookPage-1472800143-image_left.png','I would like to subscribe to receive information about private dining and events','BookPage-1472800143-img_tr.jpg','Juniper Tree Restaurant','eque porro quisquam est qui dolorem...','View Google Maps','https://www.google.co.in/maps/place/Swapdevelopment+Pvt.+Ltd./@30.6793597,76.7443723,17z/data=!3m1!4b1!4m5!3m4!1s0x390fec0f1288ae75:0x15daac8b51615df3!8m2!3d30.6793551!4d76.746561?hl=en','Juniper Tree Restaurant','Lorem Ipsum is simply dummy text','Click time to reserve','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book....',' Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has s','I would like to subscribe to receive information about private dining and events','Confirm booking','hank You For Making Your Reservation At Juniper Tree.','The Real Tast in Your Hands','Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Morbi nec leo id lacus aliquet mattis a sit amet libero.  Pellentesque lobortis nunc magna, ut lacinia lorem aliquam vel. Suspendisse nulla nulla, pulvinar finibus porttit','Cancel Booking','Your Order Has Been Cancelled.','The Real Tast in Your Hands','Lorem ipsum dolor sit amet, consectetur adipiscing elit.  Morbi nec leo id lacus aliquet mattis a sit amet libero.  Pellentesque lobortis nunc magna, ut lacinia lorem aliquam vel. Suspendisse nulla nulla, pulvinar finibus porttitor.  Etiam nunc felis, ti','0','0','0','','','','0','0','2016-09-01','0000-00-00','1');



-- -------------------------------------------
-- TABLE DATA tbl_book_table
-- -------------------------------------------
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('39','2016-09-07','00:30:00','1','','','','0','','','0','0','2016-09-01','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('38','2016-09-08','01:00:00','3','','','','0','','','0','0','2016-09-01','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('37','2016-08-31','01:00:00','2','','','','0','','','0','0','2016-09-01','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('36','2016-09-14','00:45:00','3','','','','0','','','0','0','2016-09-01','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('35','2016-09-02','03:45:00','7','','','','0','','','0','0','2016-09-01','0000-00-00','0');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('34','2016-09-21','03:30:00','11','','','','0','','','0','0','2016-09-01','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('33','2016-09-01','00:30:00','5','','','','0','','','0','0','2016-09-01','0000-00-00','0');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('40','2016-09-28','03:30:00','10','','','','0','','','0','0','2016-09-01','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('41','2016-09-28','08:00:00','4','','','','0','','','0','0','2016-09-01','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('42','2016-09-15','02:30:00','4','','','','0','','','0','0','2016-09-01','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('43','2016-09-29','03:00:00','10','','','','0','','','0','0','2016-09-01','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('44','2016-09-28','04:30:00','4','','','','0','','','0','0','2016-09-01','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('45','2016-09-14','00:45:00','4','','','','0','','','0','0','2016-09-01','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('46','2016-09-28','00:30:00','5','','','','0','','','0','0','2016-09-01','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('47','2016-09-22','03:15:00','8','','','','0','','','0','0','2016-09-01','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('48','2016-09-06','01:30:00','5','','','','0','','','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('49','2016-08-31','00:30:00','2','','','','0','','','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('50','2016-09-22','04:00:00','10','','','','0','','','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('51','2016-08-31','00:45:00','5','','','','0','','','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('52','2016-09-13','01:45:00','7','','','','0','','','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('53','2016-09-08','01:45:00','3','','','','0','','','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('54','2016-09-27','04:00:00','8','','','','0','','','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('55','2016-09-28','03:45:00','9','','','','0','','','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('56','2016-09-22','04:00:00','9','','','','0','','','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('57','2016-09-07','00:15:00','2','','','','0','','','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('58','2016-09-28','04:00:00','10','','','','0','','','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('59','2016-09-08','01:00:00','2','','','','0','','','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('60','2016-09-08','01:15:00','3','','','','0','','','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('61','2016-09-28','02:30:00','3','','','','0','','','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('62','2016-09-24','03:00:00','10','','','','0','','','0','0','2016-09-23','0000-00-00','1');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('63','2016-09-28','03:45:00','5','','','','0','','','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_book_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('64','2016-09-28','04:00:00','8','','','','0','','','0','0','2016-09-23','0000-00-00','0');



-- -------------------------------------------
-- TABLE DATA tbl_booked_table
-- -------------------------------------------
INSERT INTO `tbl_booked_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('16','2016-09-04','04:00:00','10','upcoming','singh','swap.guleria@gmail.com','2147483647','','1','1','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_booked_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('15','2016-09-03','04:00:00','8','today','sdf','swap.guleria@gmail.com','213','','1','1','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_booked_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('11','2016-09-03','03:15:00','8','nirmla','sdf','swap.guleria@gmail.com','2147483647','','1','1','0','2016-09-01','0000-00-00','1');
INSERT INTO `tbl_booked_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('12','2016-09-01','00:30:00','2','dfs','df','swap.guleria@gmail.com','231','','1','1','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_booked_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('13','2016-09-02','00:45:00','5','previous','hj','jh@hj.asd','89456120','','1','1','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_booked_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('14','2016-09-10','04:00:00','8','adf','asdf','sdfa','324','','0','1','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_booked_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('17','2016-09-28','02:30:00','3','test','test','test@gmail.com','1234567890','','1','1','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_booked_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('18','2016-09-24','03:00:00','10','karan','Guleria','swap.guleria@gmail.com','2147483647','','1','1','0','2016-09-23','0000-00-00','1');
INSERT INTO `tbl_booked_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('19','2016-09-28','04:00:00','8','karan','singh','swap.guleria@gmail.com','2147483647','','1','1','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_booked_table` (`id`,`date`,`time`,`party_size`,`first_name`,`last_name`,`email`,`phone_no`,`special_request`,`email_subscription`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('20','2016-09-28','04:00:00','8','adf','sdf','swap.guleria@gmail.com','2147483647','','1','1','0','2016-09-23','0000-00-00','0');



-- -------------------------------------------
-- TABLE DATA tbl_comment
-- -------------------------------------------
INSERT INTO `tbl_comment` (`id`,`model_id`,`model_type`,`comment`,`rate`,`state_id`,`create_time`,`create_user_id`) VALUES
('2','15','BookTable','JI','','0','2016-08-19 19:12:34','1');



-- -------------------------------------------
-- TABLE DATA tbl_contact_details
-- -------------------------------------------
INSERT INTO `tbl_contact_details` (`id`,`email`,`phone_no`,`facebook`,`twitter`,`google_plus`,`instagram`,`youtube`,`working_days`,`working_hours`,`address`,`city`,`country`,`zip_code`,`map`,`page_title`,`page_sub_title`,`page_image`,`footer_image`,`logo`,`type_id`,`state_id`,`create_user_id`,`create_time`) VALUES
('1','swap.guleria@gmail.com','1 234-567-8','facebook.com','twitter.com','google.com','instagram.com','youtube.com','Monday - Sunday','9.00 AM to 11.00 PM','11 phase mohali ','dehli','india','177208','<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109750.9190273166!2d76.69637418636185!3d30.72637729746698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390fed0be66ec96b%3A0xa5ff67f9527319fe!2sChandigarh%2C+160017!5e0!3m2!1sen!2sin!4v1471501004769\" width=\"1200\" height=\"400\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>','Contact Us ','contact us mam','ContactDetails-1471503847-page_image.jpg','ContactDetails-1471073653-footer_image.png','ContactDetails-1471074634-logo.png','0','0','1','0000-00-00 00:00:00');



-- -------------------------------------------
-- TABLE DATA tbl_enquiry
-- -------------------------------------------
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('1','Swap','test','123456','test@test.com','0000-00-00','03:15:00','10','1','0','0','2016-08-23','0000-00-00','1');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('2','sda','sda','123654','456@sad.fg','0000-00-00','04:15:00','21','0','0','0','2016-08-23','0000-00-00','1');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('3','j','kj','45','fdg@fd.sad','0000-00-00','00:45:00','15','0','0','0','2016-08-23','0000-00-00','1');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('4','sad','fdg','fdg','fdg@fd.sad','0000-00-00','04:15:00','23','0','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('5','sad','dsa','54','fdg@fd.sad','0000-00-00','04:00:00','24','0','0','0','2016-09-02','0000-00-00','1');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('6','sad','dsa','54','swap.guleria@gmail.com','0000-00-00','03:15:00','24','0','0','0','2016-09-03','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('7','sad','dsa','54','swap.guleria@gmail.com','0000-00-00','03:15:00','24','0','0','0','2016-09-03','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('8','sad','dsa','54','swap.guleria@gmail.com','0000-00-00','03:15:00','24','0','0','0','2016-09-03','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('9','sad','dsa','54','swap.guleria@gmail.com','0000-00-00','03:15:00','24','0','0','0','2016-09-03','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('10','sad','dsa','54','swap.guleria@gmail.com','0000-00-00','03:15:00','24','0','0','0','2016-09-03','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('11','sad','dsa','54','swap.guleria@gmail.com','0000-00-00','03:15:00','24','0','0','0','2016-09-03','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('12','sad','dsa','54','swap.guleria@gmail.com','0000-00-00','03:15:00','24','0','0','0','2016-09-03','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('13','fdg','fdg','231','swap.guleria@gmail.com','0000-00-00','02:30:00','17','0','0','0','2016-09-03','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('14','fdg','sad','fdg','213@sd.j','2016-09-23','03:00:00','15','0','0','0','2016-09-23','0000-00-00','1');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('15','sad','dsa','123','swap.guleria@gmail.com','2016-09-28','04:00:00','14','0','0','0','2016-09-23','0000-00-00','1');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('16','sad','dsa','123','swap.guleria@gmail.com','2016-09-28','04:00:00','14','0','0','0','2016-09-23','0000-00-00','1');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('17','asd','asd','123654','swap.guleria@gmail.com','2016-09-28','04:00:00','23','0','0','0','2016-09-23','0000-00-00','1');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('18','fdg','dsa','sda','swap.guleria@gmail.com','2016-09-30','03:45:00','25','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('19','sad','dsa','231','swap.guleria@gmail.com','2016-09-27','04:00:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('20','sad','dsa','231','swap.guleria@gmail.com','2016-09-27','04:00:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('21','sad','dsa','231','swap.guleria@gmail.com','2016-09-27','04:00:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('22','sad','dsa','231','swap.guleria@gmail.com','2016-09-27','04:00:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('23','sad','dsa','231','swap.guleria@gmail.com','2016-09-27','04:00:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('24','sad','dsa','231','swap.guleria@gmail.com','2016-09-27','04:00:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('25','sad','dsa','231','swap.guleria@gmail.com','2016-09-27','04:00:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('26','sad','dsa','231','swap.guleria@gmail.com','2016-09-27','04:00:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('27','sad','dsa','231','swap.guleria@gmail.com','2016-09-27','04:00:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('28','sad','dsa','231','swap.guleria@gmail.com','2016-09-27','04:00:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('29','sad','dsa','231','swap.guleria@gmail.com','2016-09-27','04:00:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('30','sad','dsa','231','swap.guleria@gmail.com','2016-09-27','04:00:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('31','sad','dsa','231','swap.guleria@gmail.com','2016-09-27','04:00:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('32','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('33','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('34','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('35','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('36','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('37','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('38','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('39','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('40','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('41','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('42','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('43','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('44','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('45','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('46','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('47','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('48','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('49','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('50','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('51','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('52','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('53','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('54','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('55','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('56','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('57','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('58','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('59','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('60','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('61','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('62','sad','fdsa','54','swap.guleria@gmail.com','2016-09-27','01:15:00','16','0','0','0','2016-09-23','0000-00-00','0');
INSERT INTO `tbl_enquiry` (`id`,`first_name`,`last_name`,`phone`,`email`,`booking_date`,`booking_time`,`party_size`,`terms`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('63','sda','dsa','45','info@lugares.qa','2016-09-28','04:15:00','24','0','0','0','2016-09-26','0000-00-00','0');



-- -------------------------------------------
-- TABLE DATA tbl_homepage
-- -------------------------------------------
INSERT INTO `tbl_homepage` (`id`,`tab_1_title`,`tab_1_sub_title`,`tab_1_description`,`tab_1_image`,`box_1_title`,`box_1_description`,`box_1_button_text`,`box_1_link`,`box_1_background`,`box_2_title`,`box_2_description`,`box_2_button_text`,`box_2_link`,`box_2_background`,`tab_2_title`,`tab_2_text`,`tab_2_link`,`tab_2_button_text`,`tab_2_background`,`tab_3_title_1`,`tab_3_sub_title_1`,`tab_3_description`,`tab_3_title_2`,`tab_3_sub_title_2`,`tab_3_background`,`tab_3_background_right`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('1','about us','The Real Tast in Your Hands','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book....
','Homepage-1471005881-tab_1_image.jpg','Our Suppliers','The Real Tast in Your Hands','View our Suppliers','1','Homepage-1471005881-box_1_background.png','Our Events','The Real Tast in Your Hands
','View our Event','1','Homepage-1471005881-box_2_background.png','The Perfect','blend','1','Book a Table','Homepage-1471005881-tab_2_background.png','Meet Our Chef','The Real Tast in Your Hands','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English.
','Shela Mathew','Executive Chef','Homepage-1471069794-tab_3_background.png','','0','0','2016-08-12','0000-00-00','1');



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
-- TABLE DATA tbl_meal
-- -------------------------------------------
INSERT INTO `tbl_meal` (`id`,`title`,`sub_title`,`description`,`days`,`timings`,`image`,`background_image`,`state_id`,`type_id`,`create_user_id`,`create_time`,`update_time`) VALUES
('1','Our Breskfast','','','Weekdays','7:30 a.m 11:30 a.m','Meal-1471594922-image.jpg','Meal-1471594922-background_image.jpg','0','0','1','2016-08-19 13:02:15','0000-00-00 00:00:00');
INSERT INTO `tbl_meal` (`id`,`title`,`sub_title`,`description`,`days`,`timings`,`image`,`background_image`,`state_id`,`type_id`,`create_user_id`,`create_time`,`update_time`) VALUES
('2','Our lunch','','','Monday','7:30 a.m 11:30 a.m','Meal-1471595021-image.jpg','Meal-1471595021-background_image.png','0','0','1','2016-08-19 13:53:41','0000-00-00 00:00:00');
INSERT INTO `tbl_meal` (`id`,`title`,`sub_title`,`description`,`days`,`timings`,`image`,`background_image`,`state_id`,`type_id`,`create_user_id`,`create_time`,`update_time`) VALUES
('3','Our Dinner','','','Monday','7:30 a.m 11:30 a.m','Meal-1471595082-image.jpg','Meal-1471595082-background_image.png','0','0','1','2016-08-19 13:54:42','0000-00-00 00:00:00');
INSERT INTO `tbl_meal` (`id`,`title`,`sub_title`,`description`,`days`,`timings`,`image`,`background_image`,`state_id`,`type_id`,`create_user_id`,`create_time`,`update_time`) VALUES
('4','Our drinks','','','Monday','7:30 a.m 11:30 a.m','Meal-1471595112-image.jpg','Meal-1471595112-background_image.jpg','0','0','1','2016-08-19 13:55:12','0000-00-00 00:00:00');



-- -------------------------------------------
-- TABLE DATA tbl_meal_item
-- -------------------------------------------
INSERT INTO `tbl_meal_item` (`id`,`meal_id`,`title`,`sub_title`,`price`,`image`,`background_image`,`description`,`state_id`,`type_id`,`create_user_id`,`create_time`,`update_time`) VALUES
('1','1','Soft-Boiled Organic E','with “soldiers”','5.00','','','','0','0','1','2016-08-19 13:29:47','0000-00-00 00:00:00');
INSERT INTO `tbl_meal_item` (`id`,`meal_id`,`title`,`sub_title`,`price`,`image`,`background_image`,`description`,`state_id`,`type_id`,`create_user_id`,`create_time`,`update_time`) VALUES
('2','3','Scrambled Eggs in Puff Pastry','with wild mushrooms and asparagus','11.00','','','','0','0','1','2016-08-19 13:44:01','0000-00-00 00:00:00');
INSERT INTO `tbl_meal_item` (`id`,`meal_id`,`title`,`sub_title`,`price`,`image`,`background_image`,`description`,`state_id`,`type_id`,`create_user_id`,`create_time`,`update_time`) VALUES
('3','1','Eggs Benedict','with homefries','15.00','','','','0','0','1','2016-08-19 13:44:49','0000-00-00 00:00:00');
INSERT INTO `tbl_meal_item` (`id`,`meal_id`,`title`,`sub_title`,`price`,`image`,`background_image`,`description`,`state_id`,`type_id`,`create_user_id`,`create_time`,`update_time`) VALUES
('4','2','Eggs Norwegian','poached eggs with smoked salmon and hollandaise','23.00','','','','0','0','1','2016-08-19 13:45:38','0000-00-00 00:00:00');
INSERT INTO `tbl_meal_item` (`id`,`meal_id`,`title`,`sub_title`,`price`,`image`,`background_image`,`description`,`state_id`,`type_id`,`create_user_id`,`create_time`,`update_time`) VALUES
('5','1','Soft-Boiled Organic Egg','with “soldiers”','10.00','','','','0','0','1','2016-08-19 13:46:07','0000-00-00 00:00:00');
INSERT INTO `tbl_meal_item` (`id`,`meal_id`,`title`,`sub_title`,`price`,`image`,`background_image`,`description`,`state_id`,`type_id`,`create_user_id`,`create_time`,`update_time`) VALUES
('6','4','Scrambled Eggs in Puff Pastry','with wild mushrooms and asparagus','22.00','','','','0','0','1','2016-08-19 13:47:39','0000-00-00 00:00:00');



-- -------------------------------------------
-- TABLE DATA tbl_offers
-- -------------------------------------------
INSERT INTO `tbl_offers` (`id`,`name`,`description`,`image`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('1','Offers - 1','Offers DESCP - 1','IMAGE','1','0','2016-08-23','0000-00-00','1');
INSERT INTO `tbl_offers` (`id`,`name`,`description`,`image`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('2','Offer - 2 -up','Offers- 2 - up','','0','0','2016-08-24','0000-00-00','1');
INSERT INTO `tbl_offers` (`id`,`name`,`description`,`image`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('3','Offer - 3','Offer - 3','','0','0','2016-08-24','0000-00-00','1');



-- -------------------------------------------
-- TABLE DATA tbl_our_team
-- -------------------------------------------
INSERT INTO `tbl_our_team` (`id`,`name`,`designation`,`facebook`,`twitter`,`linkedin`,`google_plus`,`image`,`description`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('3','rohit ','posdjsa','sl d','j lj','j','  j','OurTeam-1471514848-image.jpg','sad','0','0','2016-08-18','0000-00-00','1');
INSERT INTO `tbl_our_team` (`id`,`name`,`designation`,`facebook`,`twitter`,`linkedin`,`google_plus`,`image`,`description`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('2','asds','asd','asd','asd','asd','sad','OurTeam-1471514186-image.jpg','sada','0','0','2016-08-18','0000-00-00','1');
INSERT INTO `tbl_our_team` (`id`,`name`,`designation`,`facebook`,`twitter`,`linkedin`,`google_plus`,`image`,`description`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('4','neeraj','cook ','asjd','ljk','jklkjl','sadas','OurTeam-1471514871-image.jpg','asda','0','0','2016-08-18','0000-00-00','1');
INSERT INTO `tbl_our_team` (`id`,`name`,`designation`,`facebook`,`twitter`,`linkedin`,`google_plus`,`image`,`description`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('5','asda','asdasd','fg','fgh','fghgf','fgh','OurTeam-1471514890-image.jpg','fgh','0','0','2016-08-18','0000-00-00','1');



-- -------------------------------------------
-- TABLE DATA tbl_testimonial
-- -------------------------------------------
INSERT INTO `tbl_testimonial` (`id`,`title`,`sub_title`,`description`,`created_by`,`image`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('1','Sara Doe','The Real Taste In Your hand','<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting</p>
','Sarah Doe','Testimonial-1471694459-image.jpg','0','0','2016-08-18','0000-00-00','1');
INSERT INTO `tbl_testimonial` (`id`,`title`,`sub_title`,`description`,`created_by`,`image`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('2','Swap Test','The Real Taste In Your hand','<p>&nbsp;Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting</p>
','Swap Test','Testimonial-1471694510-image.jpg','0','0','2016-08-18','0000-00-00','1');



-- -------------------------------------------
-- TABLE DATA tbl_url
-- -------------------------------------------
INSERT INTO `tbl_url` (`id`,`name`,`controller`,`action`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('1','About ','site','about ','0','0','2016-08-20','0000-00-00','1');
INSERT INTO `tbl_url` (`id`,`name`,`controller`,`action`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('2','Menu','site','menu','0','0','2016-08-20','0000-00-00','1');
INSERT INTO `tbl_url` (`id`,`name`,`controller`,`action`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('3','Book Table','bookTable','book','0','0','2016-08-20','0000-00-00','1');
INSERT INTO `tbl_url` (`id`,`name`,`controller`,`action`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('4','Contact','site','contact','0','0','2016-08-20','0000-00-00','1');
INSERT INTO `tbl_url` (`id`,`name`,`controller`,`action`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('6','Book Table Fill Details','bookedTable','create','0','0','2016-08-20','0000-00-00','1');
INSERT INTO `tbl_url` (`id`,`name`,`controller`,`action`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('7','Book Table Booked','bookedTable','booked','0','0','2016-08-20','0000-00-00','1');
INSERT INTO `tbl_url` (`id`,`name`,`controller`,`action`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('8','Book Table Cancel','bookedTable','canceled','0','0','2016-08-20','0000-00-00','1');
INSERT INTO `tbl_url` (`id`,`name`,`controller`,`action`,`state_id`,`type_id`,`create_time`,`update_time`,`create_user_id`) VALUES
('10','Book Table Time Reservation','bookTable','timeReservation','0','0','2016-09-02','0000-00-00','1');



-- -------------------------------------------
-- TABLE DATA tbl_user
-- -------------------------------------------
INSERT INTO `tbl_user` (`id`,`role_id`,`first_name`,`last_name`,`title`,`email`,`username`,`password`,`social_media_id`,`phone_no`,`date_of_birth`,`language`,`nationality`,`work_in_abroad`,`salary`,`martial_status`,`employment`,`service_type`,`facebook`,`twitter`,`instagram`,`experience`,`religion`,`address`,`city`,`country`,`zip_code`,`currency_type`,`timezone`,`about_me`,`image_file`,`lat`,`long`,`tos`,`email_verify`,`is_notification`,`state_id`,`last_visit_time`,`activation_key`,`login_error_count`,`employer_id`,`create_user_id`,`create_time`) VALUES
('1','1','Admin','ad','','testing.swapdevelopment@gmail.com','admin','21232f297a57a5a743894a0e4a801fc3','','8894054847','2014-03-04','en','india','0','0','0','','0','','','','0.00','','','dehli','','5','0','','helo everyone','','12.1212','12.1515','0','0','0','1','2016-09-27 16:52:25','63e68a17f6434f1f68dae0a82681187e','0','0','0','2015-07-01 11:20:03');
INSERT INTO `tbl_user` (`id`,`role_id`,`first_name`,`last_name`,`title`,`email`,`username`,`password`,`social_media_id`,`phone_no`,`date_of_birth`,`language`,`nationality`,`work_in_abroad`,`salary`,`martial_status`,`employment`,`service_type`,`facebook`,`twitter`,`instagram`,`experience`,`religion`,`address`,`city`,`country`,`zip_code`,`currency_type`,`timezone`,`about_me`,`image_file`,`lat`,`long`,`tos`,`email_verify`,`is_notification`,`state_id`,`last_visit_time`,`activation_key`,`login_error_count`,`employer_id`,`create_user_id`,`create_time`) VALUES
('38','3','Karan','asd','','swap.karan@gmail.com','user','cd84d683cc5612c69efe115c80d0b7dc','','123242343','2014-03-04','en','','0','0','0','','0','','','','0.00','','sdsad','','','47','0','','','','','','1','0','1','0','2016-07-04 23:58:36','oSqz5GXM','0','0','0','2016-07-04 23:27:47');



-- -------------------------------------------
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
COMMIT;
-- -------------------------------------------
-- -------------------------------------------
-- END BACKUP
-- -------------------------------------------
