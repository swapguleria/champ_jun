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
-- TABLE `ms_Remarks_Inc_Grades`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_Remarks_Inc_Grades`;
CREATE TABLE IF NOT EXISTS `ms_Remarks_Inc_Grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `Grade` varchar(20) NOT NULL,
  `MarksFrom` decimal(11,2) NOT NULL,
  `MarksTo` decimal(11,2) NOT NULL,
  `Remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_activites`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_activites`;
CREATE TABLE IF NOT EXISTS `ms_activites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `max_marks` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_activity_feed`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_activity_feed`;
CREATE TABLE IF NOT EXISTS `ms_activity_feed` (
  `id` bigint(20) NOT NULL,
  `MSID` bigint(20) NOT NULL,
  `initiator_id` int(11) NOT NULL,
  `initiator_name` varchar(255) NOT NULL,
  `initiator_type` varchar(255) NOT NULL,
  `activity_type` varchar(255) NOT NULL,
  `goal_id` int(11) DEFAULT NULL,
  `goal_name` varchar(120) DEFAULT NULL,
  `field_name` varchar(120) DEFAULT NULL,
  `initial_field_value` varchar(120) DEFAULT NULL,
  `new_field_value` varchar(120) DEFAULT NULL,
  `ip_address` varchar(255) NOT NULL,
  `activity_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `notify_flag` int(2) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_attendance_term`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_attendance_term`;
CREATE TABLE IF NOT EXISTS `ms_attendance_term` (
  `MSID` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `tw_days` int(11) NOT NULL,
  `ta_days` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  PRIMARY KEY (`id`,`MSID`,`s_id`,`term`,`session`),
  KEY `MSID` (`id`,`MSID`,`s_id`,`term`,`session`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_attendances`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_attendances`;
CREATE TABLE IF NOT EXISTS `ms_attendances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(4) NOT NULL,
  `AttDate` date NOT NULL,
  `SId` int(50) NOT NULL,
  `Att` varchar(50) NOT NULL,
  `ClassName` varchar(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `Role` varchar(50) NOT NULL,
  `Reason` varchar(50) NOT NULL,
  `Type` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`MSID`,`AttDate`,`SId`,`Att`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_book`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_book`;
CREATE TABLE IF NOT EXISTS `ms_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `MSID` bigint(15) NOT NULL,
  `isbn` varchar(120) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `category_id` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `edition` varchar(255) DEFAULT NULL,
  `publisher` varchar(255) DEFAULT NULL,
  `o_stock` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `age_group` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `shelf_no` varchar(120) DEFAULT NULL,
  `year_of_publication` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `source` varchar(150) NOT NULL,
  `bill_no` varchar(150) NOT NULL,
  `book_position` varchar(120) DEFAULT NULL,
  `copy_taken` varchar(120) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `is_deleted` int(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_book_borrow`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_book_borrow`;
CREATE TABLE IF NOT EXISTS `ms_book_borrow` (
  `id` int(11) NOT NULL,
  `MSID` bigint(15) NOT NULL,
  `student_id` varchar(120) DEFAULT NULL,
  `book_name` varchar(120) DEFAULT NULL,
  `book_id` varchar(120) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `return_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fine_amount` varchar(120) DEFAULT NULL,
  `created` date DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_book_category`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_book_category`;
CREATE TABLE IF NOT EXISTS `ms_book_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `MSID` bigint(15) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `ms_category`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_category`;
CREATE TABLE IF NOT EXISTS `ms_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `MSID` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `short_name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_classes`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_classes`;
CREATE TABLE IF NOT EXISTS `ms_classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` bigint(20) NOT NULL,
  `MSID` bigint(20) NOT NULL,
  `class_no` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `ClassFeeGroupId` int(11) NOT NULL,
  `class_fullname` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_date`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_date`;
CREATE TABLE IF NOT EXISTS `ms_date` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `date_name` varchar(100) NOT NULL,
  `datevn` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_date_in_words`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_date_in_words`;
CREATE TABLE IF NOT EXISTS `ms_date_in_words` (
  `s_id` int(50) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `d_id` int(50) NOT NULL,
  `Monthno` varchar(100) NOT NULL,
  `m_id` int(50) NOT NULL,
  `DateInWords` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_dates`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_dates`;
CREATE TABLE IF NOT EXISTS `ms_dates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_id` date NOT NULL,
  `weak_day` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `date_id` (`date_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_department`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_department`;
CREATE TABLE IF NOT EXISTS `ms_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` bigint(20) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_design_reportcard`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_design_reportcard`;
CREATE TABLE IF NOT EXISTS `ms_design_reportcard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sample` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `class_from` int(11) NOT NULL,
  `class_to` int(11) NOT NULL,
  `url_all` varchar(100) NOT NULL,
  `upgradation` tinyint(4) NOT NULL DEFAULT '0',
  `hyap` varchar(100) NOT NULL,
  `hyap_all` varchar(100) NOT NULL,
  `weekly_report` varchar(100) NOT NULL,
  `consolidate_sheet` varchar(250) NOT NULL,
  `stream` int(4) NOT NULL,
  `defualt_msid` int(4) NOT NULL,
  `term_2` varchar(100) NOT NULL,
  `term_2_all` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_designation`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_designation`;
CREATE TABLE IF NOT EXISTS `ms_designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_designs`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_designs`;
CREATE TABLE IF NOT EXISTS `ms_designs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `design` varchar(50) CHARACTER SET latin1 NOT NULL,
  `class_from` int(4) NOT NULL,
  `class_to` int(4) NOT NULL,
  `f_url` varchar(255) NOT NULL,
  `reg` varchar(100) NOT NULL,
  `tpt` varchar(100) NOT NULL,
  `birth_certificate` varchar(100) NOT NULL,
  `tc` varchar(100) NOT NULL,
  `character_certificate` varchar(100) NOT NULL,
  `fee_book` varchar(100) NOT NULL,
  `fee_all` varchar(100) NOT NULL,
  `cash_r` varchar(100) NOT NULL,
  `cash_r_t` varchar(100) NOT NULL,
  `bb` varchar(50) NOT NULL,
  `bb_t` varchar(50) NOT NULL,
  `fee_rec` varchar(100) NOT NULL,
  `cash_r_d2` varchar(100) NOT NULL,
  `cash_r_t_d2` varchar(100) NOT NULL,
  `bb_r_d2` varchar(100) NOT NULL,
  `bb_r_t_d2` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_discount_names`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_discount_names`;
CREATE TABLE IF NOT EXISTS `ms_discount_names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `discount_id` int(11) NOT NULL,
  `MSID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_discount_rule`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_discount_rule`;
CREATE TABLE IF NOT EXISTS `ms_discount_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `discount_id` varchar(100) NOT NULL,
  `fee_id` int(4) NOT NULL,
  `class_from` int(11) NOT NULL,
  `class_to` int(11) NOT NULL,
  `sr_no_from` int(11) NOT NULL,
  `sr_no_to` int(11) NOT NULL,
  `percent` decimal(10,2) NOT NULL,
  `fixed_amount` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`MSID`,`date_from`,`date_to`,`discount_id`,`fee_id`,`class_from`,`class_to`,`sr_no_from`,`sr_no_to`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_discounted_student`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_discounted_student`;
CREATE TABLE IF NOT EXISTS `ms_discounted_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `discount_id` varchar(100) NOT NULL,
  PRIMARY KEY (`MSID`,`s_id`,`date_from`,`date_to`,`discount_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_employee`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_employee`;
CREATE TABLE IF NOT EXISTS `ms_employee` (
  `employee_id` bigint(20) NOT NULL,
  `MSID` bigint(20) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `spouse_name` varchar(50) NOT NULL,
  `epf_no` varchar(50) NOT NULL,
  `epf_join_date` date NOT NULL,
  `emp_dob` date NOT NULL,
  `gender` varchar(50) NOT NULL,
  `p_qualification` varchar(50) NOT NULL,
  `e_qualification` varchar(50) NOT NULL,
  `bank_ac_no` varchar(50) NOT NULL,
  `hire_date` date NOT NULL,
  `retire_date` date NOT NULL,
  `emp_category` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `basic_address` varchar(255) NOT NULL,
  `uid` varchar(50) NOT NULL,
  `emp_image` varchar(100) NOT NULL,
  `is_librarian` int(2) DEFAULT NULL,
  `rank` varchar(100) NOT NULL,
  `prefix` varchar(255) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `my_session` int(100) NOT NULL,
  `my_date` date NOT NULL,
  `ulevel` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aadhar_no` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `ac_begins` date NOT NULL,
  `ac_ends` date NOT NULL,
  `ac_date` date NOT NULL,
  `experience` varchar(50) NOT NULL,
  `m_name` varchar(255) NOT NULL,
  `confirmation_date` date NOT NULL,
  `curr_add` varchar(255) NOT NULL,
  `basic_pay` varchar(255) NOT NULL,
  `da_allowances` varchar(255) NOT NULL,
  `gross` varchar(255) NOT NULL,
  `bank_add_IFSC` varchar(255) NOT NULL,
  `pf_account` varchar(255) NOT NULL,
  `pension_acc` varchar(255) NOT NULL,
  `UAN_no` varchar(255) NOT NULL,
  `pan_card` varchar(255) NOT NULL,
  `voter_card` varchar(255) NOT NULL,
  `name_pf` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `doc_list` varchar(255) NOT NULL,
  `file_no` varchar(255) NOT NULL,
  `service_book` varchar(255) NOT NULL,
  `probation_join_date` date NOT NULL,
  `my_period_from` date DEFAULT NULL,
  `my_period_to` date DEFAULT NULL,
  `blood_group` varchar(50) NOT NULL,
  `emp_name_prefix` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `my_school` int(11) NOT NULL,
  `locality` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_date` datetime NOT NULL,
  `status` int(4) NOT NULL,
  PRIMARY KEY (`MSID`,`employee_id`),
  UNIQUE KEY `id` (`id`),
  KEY `uid` (`department`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_events`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_events`;
CREATE TABLE IF NOT EXISTS `ms_events` (
  `id` bigint(20) NOT NULL,
  `MSID` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `color` varchar(50) NOT NULL,
  `startdate` datetime NOT NULL,
  `enddate` datetime NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_exam_acedemic_performance`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_exam_acedemic_performance`;
CREATE TABLE IF NOT EXISTS `ms_exam_acedemic_performance` (
  `MSID` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `marks_obtained` varchar(50) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `class` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendance` int(11) NOT NULL DEFAULT '1',
  `datesheet_id` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_exam_activities_assign`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_exam_activities_assign`;
CREATE TABLE IF NOT EXISTS `ms_exam_activities_assign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `activity_id` int(11) NOT NULL,
  `assesment_id` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  PRIMARY KEY (`MSID`,`activity_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_exam_assesments`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_exam_assesments`;
CREATE TABLE IF NOT EXISTS `ms_exam_assesments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `assesment_id` int(11) NOT NULL,
  `MSID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `term` varchar(50) NOT NULL,
  `class` varchar(255) NOT NULL,
  `class_to` int(4) NOT NULL,
  `max_marks` int(11) NOT NULL,
  PRIMARY KEY (`assesment_id`,`MSID`,`title`,`class`,`class_to`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_exam_co_scholastic_areas`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_exam_co_scholastic_areas`;
CREATE TABLE IF NOT EXISTS `ms_exam_co_scholastic_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `partno` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `max_marks` float NOT NULL,
  `class` varchar(255) NOT NULL,
  `class_to` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_exam_co_scholastic_indicators`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_exam_co_scholastic_indicators`;
CREATE TABLE IF NOT EXISTS `ms_exam_co_scholastic_indicators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `maxmarks` float NOT NULL,
  `classfrom` int(11) NOT NULL,
  `classto` int(11) NOT NULL,
  `co_scholastic_id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `description` text NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_exam_co_scholastic_marks`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_exam_co_scholastic_marks`;
CREATE TABLE IF NOT EXISTS `ms_exam_co_scholastic_marks` (
  `MSID` int(11) NOT NULL,
  `s_id` int(50) NOT NULL,
  `session` int(50) NOT NULL,
  `class` int(11) NOT NULL,
  `particular` varchar(255) NOT NULL,
  `marks` varchar(20) NOT NULL,
  `term` varchar(500) NOT NULL,
  `indicator` text NOT NULL,
  `grade` varchar(20) NOT NULL,
  `co_scholastic_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `particular` (`particular`),
  KEY `marks` (`marks`),
  KEY `particular_2` (`particular`),
  KEY `s_id` (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_exam_datesheet`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_exam_datesheet`;
CREATE TABLE IF NOT EXISTS `ms_exam_datesheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msid` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `assessment` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `activity` int(11) NOT NULL,
  `exam_date` date NOT NULL,
  `exam_time_from` time NOT NULL,
  `exam_time_to` time NOT NULL,
  `max_marks` int(11) NOT NULL,
  `pass_marks` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_exam_grades`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_exam_grades`;
CREATE TABLE IF NOT EXISTS `ms_exam_grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `percent_from` decimal(6,2) NOT NULL,
  `percent_to` decimal(6,2) NOT NULL,
  `5_point_grade` varchar(11) NOT NULL,
  `grade_point` int(11) NOT NULL,
  `for_class` varchar(255) NOT NULL,
  `class_to` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`MSID`,`grade`,`percent_from`,`percent_to`,`for_class`,`class_to`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_exam_health_data`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_exam_health_data`;
CREATE TABLE IF NOT EXISTS `ms_exam_health_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `session` int(50) NOT NULL,
  `s_id` int(50) NOT NULL,
  `height` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `vision_l` varchar(50) NOT NULL,
  `vision_r` varchar(50) NOT NULL,
  `dental_hygiene` varchar(50) NOT NULL,
  `att_term_1` int(50) NOT NULL,
  `att_term_2` int(50) NOT NULL,
  `ear_l` varchar(100) NOT NULL,
  `ear_r` varchar(100) NOT NULL,
  `nose` varchar(100) NOT NULL,
  `throat` varchar(100) NOT NULL,
  `pulse` varchar(100) NOT NULL,
  `heart` varchar(100) NOT NULL,
  `alergy` varchar(100) NOT NULL,
  `chronic_diease` varchar(100) NOT NULL,
  `physical_activity_problem` varchar(100) NOT NULL,
  `bcg_v` varchar(255) NOT NULL,
  `hepatitis_b` varchar(255) NOT NULL,
  `dpt` varchar(255) NOT NULL,
  `hb` varchar(255) NOT NULL,
  `oral_polio` varchar(255) NOT NULL,
  `measles` varchar(255) NOT NULL,
  `hepatitis_a` varchar(255) NOT NULL,
  `chickenpox` varchar(255) NOT NULL,
  `dt_opa` varchar(255) NOT NULL,
  `mmr` varchar(255) NOT NULL,
  `dpt_opt_hb` varchar(255) NOT NULL,
  `typhoid` varchar(255) NOT NULL,
  `any_other` varchar(100) NOT NULL,
  `term` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  PRIMARY KEY (`MSID`,`session`,`s_id`,`att_term_1`,`term`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_exam_remarks`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_exam_remarks`;
CREATE TABLE IF NOT EXISTS `ms_exam_remarks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `session` int(11) NOT NULL,
  `term` varchar(50) NOT NULL,
  PRIMARY KEY (`MSID`,`s_id`,`class`,`session`,`term`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_exam_remarks_inc_grades`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_exam_remarks_inc_grades`;
CREATE TABLE IF NOT EXISTS `ms_exam_remarks_inc_grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `marks_from` decimal(11,2) NOT NULL,
  `marks_to` decimal(11,2) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `MSID` (`MSID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_exam_weeklytest`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_exam_weeklytest`;
CREATE TABLE IF NOT EXISTS `ms_exam_weeklytest` (
  `Session` int(50) NOT NULL,
  `StudentId` int(50) NOT NULL,
  `SubjectId` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `MarksObtained` varchar(100) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `MaxMarks` int(11) NOT NULL,
  `Class` int(11) NOT NULL,
  `MSID` int(11) NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_exam_weightage`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_exam_weightage`;
CREATE TABLE IF NOT EXISTS `ms_exam_weightage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `assesment_id` int(4) NOT NULL,
  `term` int(4) NOT NULL,
  `term_wtg` int(11) NOT NULL,
  `assessment_type` int(4) NOT NULL,
  `assessment_wtg` int(11) NOT NULL,
  `overall_wtg` int(11) NOT NULL,
  `class` int(4) NOT NULL,
  `class_to` int(11) NOT NULL,
  PRIMARY KEY (`MSID`,`assesment_id`,`overall_wtg`,`class`,`class_to`),
  UNIQUE KEY `id` (`id`),
  KEY `overall_wtg` (`overall_wtg`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_exams`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_exams`;
CREATE TABLE IF NOT EXISTS `ms_exams` (
  `MSID` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) NOT NULL,
  `date_result` date NOT NULL,
  `result` int(11) NOT NULL,
  PRIMARY KEY (`MSID`,`s_id`,`date_result`,`result`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_fee`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee`;
CREATE TABLE IF NOT EXISTS `ms_fee` (
  `id` bigint(20) NOT NULL,
  `MSID` bigint(20) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `fee_id` int(11) NOT NULL,
  `class_from` int(11) NOT NULL,
  `class_to` int(11) NOT NULL,
  `sr_no_from` int(4) NOT NULL,
  `sr_no_to` int(4) NOT NULL,
  `ff` int(11) NOT NULL,
  `ff_from` int(11) NOT NULL,
  `ff_to` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `fee_rate` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`,`MSID`,`date_from`,`date_to`,`fee_id`,`class_from`,`class_to`,`sr_no_from`,`sr_no_to`,`ff`,`ff_from`,`ff_to`,`group_id`,`fee_rate`),
  UNIQUE KEY `id` (`id`),
  KEY `fee_id` (`fee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_fee_billing`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_billing`;
CREATE TABLE IF NOT EXISTS `ms_fee_billing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(6) NOT NULL,
  `AcNo` int(10) NOT NULL,
  `SID` int(10) NOT NULL,
  `type` int(11) NOT NULL,
  `SrNo` int(4) NOT NULL,
  `RSrNo` int(4) NOT NULL,
  `DueDate` date NOT NULL,
  `FeeId` int(4) NOT NULL,
  `FeeAmt` decimal(10,2) NOT NULL,
  `FeeGroup` varchar(100) NOT NULL,
  `Session` int(11) NOT NULL,
  `Class` varchar(20) NOT NULL,
  `FatherName` varchar(50) NOT NULL,
  `Village` varchar(50) NOT NULL,
  `MobileSMS` varchar(255) NOT NULL,
  `FeeName` varchar(50) NOT NULL,
  `House` varchar(20) NOT NULL,
  PRIMARY KEY (`MSID`,`SID`,`DueDate`,`FeeId`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_fee_discount`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_discount`;
CREATE TABLE IF NOT EXISTS `ms_fee_discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_fee_ledgers`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_ledgers`;
CREATE TABLE IF NOT EXISTS `ms_fee_ledgers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL DEFAULT '1001',
  `ledgers_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `ud_grp_id` int(11) NOT NULL,
  `opening_bal` int(250) NOT NULL,
  `cr_dr` varchar(500) NOT NULL,
  `cost_center_app` varchar(10) NOT NULL,
  `pre_def_cost_center` varchar(10) NOT NULL,
  PRIMARY KEY (`MSID`,`ledgers_id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `ud_grp_id` (`ud_grp_id`),
  KEY `id` (`ledgers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_fee_names`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_names`;
CREATE TABLE IF NOT EXISTS `ms_fee_names` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fee_id` int(11) NOT NULL,
  `MSID` bigint(20) NOT NULL,
  `fee_name` varchar(100) NOT NULL,
  `fee_group_id` int(11) NOT NULL,
  `fee_group_name` varchar(50) NOT NULL,
  `type` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`fee_id`,`MSID`,`fee_group_id`),
  UNIQUE KEY `id` (`id`),
  KEY `fee_name` (`fee_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_fee_nature_of_group`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_nature_of_group`;
CREATE TABLE IF NOT EXISTS `ms_fee_nature_of_group` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `nogroup` int(11) NOT NULL,
  `nature` varchar(50) NOT NULL,
  `cat_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `nogroup` (`nogroup`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_fee_pr_groups`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_pr_groups`;
CREATE TABLE IF NOT EXISTS `ms_fee_pr_groups` (
  `Id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `no_grp` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_fee_schedule`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_schedule`;
CREATE TABLE IF NOT EXISTS `ms_fee_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scedule_id` bigint(20) NOT NULL,
  `MSID` bigint(20) NOT NULL,
  `pay_mode` int(11) NOT NULL DEFAULT '0',
  `r_sr_no` int(11) NOT NULL,
  `sr_no_from` int(11) NOT NULL,
  `sr_no_to` int(11) NOT NULL,
  `date_from` date NOT NULL,
  `date_to` date NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`MSID`,`pay_mode`,`r_sr_no`,`sr_no_from`,`sr_no_to`,`date_from`,`date_to`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_fee_sec_groups`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_sec_groups`;
CREATE TABLE IF NOT EXISTS `ms_fee_sec_groups` (
  `id` int(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `pr_grp_id` int(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pr_grp_id` (`pr_grp_id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_fee_slsubgrp`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_slsubgrp`;
CREATE TABLE IF NOT EXISTS `ms_fee_slsubgrp` (
  `id` int(11) NOT NULL,
  `MSID` bigint(20) NOT NULL,
  `subgroupid` int(11) NOT NULL,
  `feegroupid` int(11) NOT NULL,
  `stream` varchar(20) NOT NULL,
  `group` varchar(20) NOT NULL,
  `optional_sub` varchar(20) NOT NULL,
  `class_from` int(11) NOT NULL,
  `class_to` int(11) NOT NULL,
  PRIMARY KEY (`MSID`,`subgroupid`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_fee_transaction_dtl`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_transaction_dtl`;
CREATE TABLE IF NOT EXISTS `ms_fee_transaction_dtl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tr_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `item_id` int(11) NOT NULL,
  `go_down_id` int(11) NOT NULL,
  `qty` decimal(10,3) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1',
  `tr_id_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_fee_transaction_dtl_bkup`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_transaction_dtl_bkup`;
CREATE TABLE IF NOT EXISTS `ms_fee_transaction_dtl_bkup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tr_id` varchar(255) CHARACTER SET latin1 NOT NULL,
  `item_id` int(11) NOT NULL,
  `go_down_id` int(11) NOT NULL,
  `qty` decimal(10,3) NOT NULL,
  `rate` decimal(10,2) NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1',
  `tr_id_no` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_fee_transactions`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_transactions`;
CREATE TABLE IF NOT EXISTS `ms_fee_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  `tr_date` date NOT NULL,
  `v_id` int(4) NOT NULL,
  `dr` int(11) NOT NULL,
  `cr` int(11) NOT NULL,
  `cost_center` int(11) NOT NULL,
  `cc_type` int(4) NOT NULL,
  `m_reading` int(100) NOT NULL,
  `late_fee` int(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `ttl_paid` int(11) NOT NULL,
  `sr_no` int(11) NOT NULL,
  `narration` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fee_receipt_id` varchar(100) NOT NULL,
  `status` int(4) NOT NULL,
  `tr_id_no1` varchar(255) NOT NULL,
  `EOD` int(11) NOT NULL DEFAULT '0',
  `type` varchar(50) NOT NULL,
  `cal_late_fee` int(11) NOT NULL DEFAULT '0',
  `due_month` int(11) NOT NULL,
  `party_refference` int(11) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `crt_timestamp` datetime NOT NULL,
  `edited_by` varchar(100) NOT NULL,
  `ed_timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_fee_transactions_bkup`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_transactions_bkup`;
CREATE TABLE IF NOT EXISTS `ms_fee_transactions_bkup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  `tr_date` date NOT NULL,
  `v_id` int(4) NOT NULL,
  `dr` int(11) NOT NULL,
  `cr` int(11) NOT NULL,
  `cost_center` int(11) NOT NULL,
  `cc_type` int(4) NOT NULL,
  `m_reading` int(100) NOT NULL,
  `late_fee` int(255) NOT NULL,
  `discount` int(11) NOT NULL,
  `ttl_paid` int(11) NOT NULL,
  `sr_no` int(11) NOT NULL,
  `narration` varchar(250) NOT NULL,
  `username` varchar(50) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `party_refference` int(100) NOT NULL,
  `fee_receipt_id` varchar(100) NOT NULL,
  `status` int(4) NOT NULL,
  `tr_id_no1` varchar(255) NOT NULL,
  `EOD` int(11) NOT NULL DEFAULT '0',
  `type` varchar(50) NOT NULL,
  `cal_late_fee` int(11) NOT NULL DEFAULT '0',
  `due_month` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_fee_type`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_type`;
CREATE TABLE IF NOT EXISTS `ms_fee_type` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_fee_ud_groups`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fee_ud_groups`;
CREATE TABLE IF NOT EXISTS `ms_fee_ud_groups` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sc_grp_id` int(11) NOT NULL,
  KEY `id` (`id`),
  KEY `name` (`name`),
  KEY `sc_grp_id` (`sc_grp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_fixed_holidays`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_fixed_holidays`;
CREATE TABLE IF NOT EXISTS `ms_fixed_holidays` (
  `Id` int(4) NOT NULL,
  `holiday_id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(4) NOT NULL,
  `WDFrom` int(4) NOT NULL,
  `WDTo` int(4) NOT NULL,
  `DayFrom` int(4) NOT NULL,
  `DayTo` int(4) NOT NULL,
  `MonthFrom` int(4) NOT NULL,
  `MonthTo` int(4) NOT NULL,
  `HName` varchar(50) NOT NULL,
  PRIMARY KEY (`holiday_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_hide_show_columns`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_hide_show_columns`;
CREATE TABLE IF NOT EXISTS `ms_hide_show_columns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` bigint(20) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `fields` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_history`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_history`;
CREATE TABLE IF NOT EXISTS `ms_history` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `s_id` int(4) NOT NULL,
  `MSID` int(4) NOT NULL,
  `session` int(4) NOT NULL,
  `history` varchar(500) NOT NULL,
  `reward` text NOT NULL,
  `warning` int(11) NOT NULL,
  `date` date NOT NULL,
  `any_other` varchar(100) NOT NULL,
  `fine` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Warning` (`warning`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_history_wornings`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_history_wornings`;
CREATE TABLE IF NOT EXISTS `ms_history_wornings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_holidays`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_holidays`;
CREATE TABLE IF NOT EXISTS `ms_holidays` (
  `holiday_id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `ID` int(4) NOT NULL,
  `DateFrom` date NOT NULL,
  `DateTo` date NOT NULL,
  `Particular` varchar(50) NOT NULL,
  `colour` varchar(255) NOT NULL,
  PRIMARY KEY (`holiday_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_homework`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_homework`;
CREATE TABLE IF NOT EXISTS `ms_homework` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `MSID` bigint(20) NOT NULL,
  `created_date` date NOT NULL,
  `class_id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `homework` text NOT NULL,
  `hw_uniquied` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hw_uniquied` (`hw_uniquied`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_hostel_name`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_hostel_name`;
CREATE TABLE IF NOT EXISTS `ms_hostel_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `hostel_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_hosteler`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_hosteler`;
CREATE TABLE IF NOT EXISTS `ms_hosteler` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `hostel_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  PRIMARY KEY (`MSID`,`s_id`,`from_date`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_hostels`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_hostels`;
CREATE TABLE IF NOT EXISTS `ms_hostels` (
  `MSID` int(15) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`MSID`,`id`),
  KEY `MSID` (`MSID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_houses`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_houses`;
CREATE TABLE IF NOT EXISTS `ms_houses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `house_id` bigint(20) NOT NULL,
  `MSID` bigint(20) NOT NULL,
  `house_s_name` varchar(50) NOT NULL,
  `house_f_name` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`house_id`,`MSID`),
  UNIQUE KEY `id` (`id`),
  KEY `house_s_name` (`house_s_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_locality`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_locality`;
CREATE TABLE IF NOT EXISTS `ms_locality` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `MSID` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `postoffice` varchar(50) NOT NULL,
  `tehsil` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `MSID` (`MSID`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_locality_b`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_locality_b`;
CREATE TABLE IF NOT EXISTS `ms_locality_b` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postoffice` varchar(50) NOT NULL,
  `pincode` int(11) NOT NULL,
  `tehsil` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_main_ms_main_subjects`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_main_ms_main_subjects`;
CREATE TABLE IF NOT EXISTS `ms_main_ms_main_subjects` (
  `MSID` int(20) NOT NULL,
  `ID` int(50) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Used_for_lib` tinyint(1) NOT NULL,
  `UsedinRcard` int(4) NOT NULL,
  `ClassFrom` int(4) NOT NULL,
  `ClassTo` int(4) NOT NULL,
  `Overall_grade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_main_subjects`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_main_subjects`;
CREATE TABLE IF NOT EXISTS `ms_main_subjects` (
  `MSID` int(20) NOT NULL,
  `ID` int(50) NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Used_for_lib` tinyint(1) NOT NULL,
  `UsedinRcard` int(4) NOT NULL,
  `ClassFrom` int(4) NOT NULL,
  `ClassTo` int(4) NOT NULL,
  `Overall_grade` int(11) NOT NULL,
  PRIMARY KEY (`MSID`,`ID`),
  KEY `Subject` (`Subject`),
  KEY `Subject_2` (`Subject`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_modules`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_modules`;
CREATE TABLE IF NOT EXISTS `ms_modules` (
  `id` bigint(11) NOT NULL,
  `module_name` varchar(50) NOT NULL,
  `description` varchar(120) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_month`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_month`;
CREATE TABLE IF NOT EXISTS `ms_month` (
  `Month` varchar(250) NOT NULL,
  `Monthno` int(100) NOT NULL,
  `SrNo` int(50) NOT NULL,
  `MonthName` varchar(100) NOT NULL,
  `MSID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_months`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_months`;
CREATE TABLE IF NOT EXISTS `ms_months` (
  `month` varchar(250) NOT NULL,
  `no` int(100) NOT NULL,
  `sr_no` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `MSID` int(11) NOT NULL,
  PRIMARY KEY (`month`,`no`,`sr_no`,`MSID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_old_students`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_old_students`;
CREATE TABLE IF NOT EXISTS `ms_old_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(255) NOT NULL,
  `Ref` varchar(11) NOT NULL,
  `SID` int(255) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `SubjectSTD` varchar(100) NOT NULL,
  `TotalWdays` int(11) NOT NULL,
  `Attendance` int(11) NOT NULL,
  `LastResult` varchar(100) NOT NULL,
  `RollNo` int(11) NOT NULL,
  `Mraks_obtained` varchar(100) NOT NULL,
  `Promotion` varchar(200) NOT NULL,
  `Feeconcession` varchar(200) NOT NULL,
  `NCC` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `Gamesplayed` varchar(100) NOT NULL,
  `General_conduct` varchar(100) NOT NULL,
  `Reason` varchar(100) NOT NULL,
  `Bookno` int(11) NOT NULL,
  `Srno` int(11) NOT NULL,
  `failed` varchar(100) NOT NULL,
  PRIMARY KEY (`MSID`,`SID`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_parents`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_parents`;
CREATE TABLE IF NOT EXISTS `ms_parents` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `MSID` bigint(20) NOT NULL,
  `my_session` int(11) NOT NULL,
  `my_date` date NOT NULL,
  `f_name` varchar(500) NOT NULL,
  `f_occupation` varchar(500) NOT NULL,
  `f_qualification` varchar(500) NOT NULL,
  `f_mobile` varchar(500) NOT NULL,
  `m_name` varchar(500) NOT NULL,
  `m_occupation` varchar(500) NOT NULL,
  `m_qualification` varchar(500) NOT NULL,
  `m_mobile` varchar(500) NOT NULL,
  `phone_home` varchar(500) NOT NULL,
  `mobile_sms` varchar(200) NOT NULL,
  `category` varchar(500) NOT NULL,
  `sfeebookr` tinyint(1) NOT NULL,
  `address_line1` varchar(100) NOT NULL,
  `address_line2` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `village` varchar(500) NOT NULL,
  `annual_income` varchar(200) NOT NULL,
  `feepaymentmode` int(100) NOT NULL DEFAULT '0',
  `password` varchar(100) NOT NULL,
  `ulevel` int(11) NOT NULL,
  `religion` varchar(50) NOT NULL,
  `uid` varchar(100) NOT NULL,
  `old_Id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `my_school` int(11) NOT NULL,
  `status` int(4) NOT NULL,
  `my_period_from` date NOT NULL,
  `my_period_to` date NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `village` (`village`(255)),
  KEY `category` (`category`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_privileges_users`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_privileges_users`;
CREATE TABLE IF NOT EXISTS `ms_privileges_users` (
  `id` bigint(11) NOT NULL,
  `MSID` bigint(15) NOT NULL,
  `user_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `privilege_id` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- -------------------------------------------
-- TABLE `ms_qbank`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_qbank`;
CREATE TABLE IF NOT EXISTS `ms_qbank` (
  `MSID` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `session` int(11) NOT NULL,
  `q_no` int(11) NOT NULL,
  `class` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `sub_group` varchar(100) NOT NULL,
  `chapter` int(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `section` varchar(100) NOT NULL,
  `qHeading` text NOT NULL,
  `quid` varchar(100) NOT NULL,
  `noofqu` int(11) NOT NULL,
  `sectionheading` text NOT NULL,
  `status` int(4) NOT NULL,
  `difficultylevel` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_questions`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_questions`;
CREATE TABLE IF NOT EXISTS `ms_questions` (
  `id` int(11) NOT NULL,
  `MSID` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `question` text NOT NULL,
  `qUID` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_school_boards`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_school_boards`;
CREATE TABLE IF NOT EXISTS `ms_school_boards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_schools`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_schools`;
CREATE TABLE IF NOT EXISTS `ms_schools` (
  `id` bigint(20) NOT NULL,
  `MSID` bigint(20) NOT NULL,
  `name` varchar(64) NOT NULL,
  `place` varchar(100) NOT NULL,
  `post` varchar(50) NOT NULL,
  `distt` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pin` int(11) NOT NULL,
  `board` varchar(100) NOT NULL,
  `affNo` int(50) NOT NULL,
  `recNo` varchar(50) NOT NULL,
  `schoolNo` int(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `acno` varchar(200) NOT NULL,
  `class_from` int(11) NOT NULL,
  `class_to` int(11) NOT NULL,
  `bank_cash` varchar(50) NOT NULL,
  `fee_last_date` datetime NOT NULL,
  `logo_img` varchar(100) NOT NULL,
  `activity_day` varchar(50) NOT NULL,
  `transport` int(2) NOT NULL,
  `hostel` int(2) NOT NULL,
  `science` int(2) NOT NULL,
  `arts` int(2) NOT NULL,
  `commerce` int(2) NOT NULL,
  `section` int(11) NOT NULL,
  `house` int(2) NOT NULL,
  `ShowDiscount` varchar(4) NOT NULL,
  `BillOnAc` varchar(50) NOT NULL,
  `TermDate` date NOT NULL,
  `BookStartDate` date NOT NULL,
  `RegFormPrint` varchar(50) NOT NULL,
  `SMS` varchar(50) NOT NULL,
  `EMail` varchar(50) NOT NULL,
  `Category` tinyint(4) NOT NULL DEFAULT '4',
  `Grade` varchar(11) NOT NULL,
  `SFeebookR` int(11) NOT NULL,
  `FeePaymentmode` varchar(30) NOT NULL,
  `FBKDesigns` varchar(50) NOT NULL,
  `RFormDesigns` varchar(100) NOT NULL,
  `Periods` int(4) NOT NULL,
  `Lunchbreakaftr` int(4) NOT NULL,
  `Theme` varchar(20) NOT NULL,
  `ReportcrdDesign` varchar(100) NOT NULL,
  `ViewOption` int(4) NOT NULL,
  `TCDesign` varchar(50) NOT NULL,
  `SMSSID` varchar(10) NOT NULL,
  `SeprateTPTFBook` tinyint(4) NOT NULL DEFAULT '0',
  `ExamClassTWise` tinyint(4) NOT NULL DEFAULT '0',
  `Roll_No` tinyint(4) NOT NULL DEFAULT '0',
  `CoScholastic` tinyint(4) NOT NULL,
  `FeebkafterReceive` tinyint(4) NOT NULL DEFAULT '0',
  `Website` text NOT NULL,
  `WeeklyReport` tinyint(4) NOT NULL DEFAULT '0',
  `SMS_Homework` int(11) NOT NULL DEFAULT '0',
  `CoScholasticUpgardation` tinyint(4) NOT NULL,
  `Board_full_name` varchar(200) NOT NULL,
  `TCDesignfillform` varchar(50) NOT NULL,
  `Viewcategory` tinyint(4) NOT NULL DEFAULT '0',
  `Entergradeforsubject` tinyint(4) NOT NULL DEFAULT '0',
  `Coeducational` int(4) NOT NULL DEFAULT '0',
  `ORALTEST` int(11) NOT NULL DEFAULT '0',
  `Full_Address` int(11) DEFAULT '0',
  `Custom_Dis` int(11) DEFAULT '0',
  `CombinedFBRQ` int(2) NOT NULL DEFAULT '0',
  `Print_rout_list` int(11) DEFAULT '0',
  `Bday_SMS` int(11) NOT NULL DEFAULT '0',
  `Emaillink` varchar(100) NOT NULL,
  `Marks_SMS` int(11) NOT NULL DEFAULT '0',
  `ViewReportcashBankwise` int(11) NOT NULL DEFAULT '0',
  `Upload_TC` int(11) DEFAULT '0',
  `Viewprintslip` int(4) NOT NULL DEFAULT '0',
  `ViewAddress` int(4) NOT NULL DEFAULT '0',
  `GroupId` int(11) NOT NULL,
  `Director` int(4) NOT NULL DEFAULT '0',
  `Add_ReportC` varchar(200) NOT NULL,
  `Detailed_Headwise` int(11) NOT NULL DEFAULT '0',
  `TCFee` int(4) NOT NULL DEFAULT '0',
  `AssesmentDet` int(4) NOT NULL DEFAULT '1',
  `LatefeeDate` int(4) NOT NULL,
  `LatefeeAmt` int(11) NOT NULL,
  `Amrit_dhari` int(11) NOT NULL DEFAULT '0',
  `ACL` int(11) NOT NULL,
  `watermark` varchar(100) NOT NULL,
  `Feereceipt` int(11) NOT NULL,
  `RoundAmt` int(4) NOT NULL,
  `feebook_for_all` int(11) NOT NULL,
  `SSSM_ID` int(11) NOT NULL,
  `fv_due_total` int(11) NOT NULL,
  `order_by_exam` varchar(255) NOT NULL,
  `report_card_from` int(11) NOT NULL,
  `cosacholastic_term` int(11) NOT NULL,
  `health_term` int(11) NOT NULL,
  `display_vehicle_no` int(11) NOT NULL,
  `display_narration` int(11) NOT NULL,
  `calculation_on_late_fee` int(11) NOT NULL,
  `b_day_time` int(50) NOT NULL,
  `b_day_msg` varchar(255) NOT NULL,
  `session_end_date` date NOT NULL,
  `session_start_date` date NOT NULL,
  `created_date` datetime NOT NULL,
  `selection` int(2) NOT NULL,
  `school_type` int(11) NOT NULL DEFAULT '0',
  `library` int(2) NOT NULL,
  `adm_no` int(2) NOT NULL,
  `amount_multiple_of` int(11) NOT NULL,
  `no_of_term` int(11) NOT NULL,
  `activity` int(11) NOT NULL,
  `ward_of_company` int(11) NOT NULL,
  `separate_tpt_book` int(11) NOT NULL,
  `bank_reciept` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `status` int(3) NOT NULL,
  `locality_pincode` varchar(300) NOT NULL,
  `admno_auto` int(11) NOT NULL,
  `combine_feebook` int(11) NOT NULL,
  `working_days` varchar(255) NOT NULL DEFAULT '1,2,3,4,5,6',
  `grades_in_acc_perf` int(11) NOT NULL DEFAULT '0',
  `birthday_template` text NOT NULL,
  PRIMARY KEY (`MSID`),
  UNIQUE KEY `id` (`id`),
  KEY `MSID` (`MSID`),
  KEY `FBKDesigns` (`FBKDesigns`),
  KEY `RFormDesigns` (`RFormDesigns`),
  KEY `ReportcrdDesign` (`ReportcrdDesign`),
  KEY `TCDesignfillform` (`TCDesignfillform`),
  KEY `AssesmentDet` (`AssesmentDet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_schools_section`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_schools_section`;
CREATE TABLE IF NOT EXISTS `ms_schools_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `sec_name` varchar(255) NOT NULL,
  `class_id` int(11) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `sec_seats` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`MSID`,`section_id`),
  UNIQUE KEY `id_2` (`id`),
  KEY `id` (`section_id`),
  KEY `MSID` (`MSID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_schoolwise_subjects`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_schoolwise_subjects`;
CREATE TABLE IF NOT EXISTS `ms_schoolwise_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` int(20) NOT NULL,
  `subject_id` int(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lib` tinyint(1) NOT NULL,
  `record` int(4) NOT NULL,
  `class` int(4) NOT NULL,
  `class_to` int(4) NOT NULL,
  `overall_grade` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- -------------------------------------------
-- TABLE `ms_sections`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_sections`;
CREATE TABLE IF NOT EXISTS `ms_sections` (
  `id` int(11) NOT NULL,
  `sec_name` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -------------------------------------------
-- TABLE `ms_sessions`
-- -------------------------------------------
DROP TABLE IF EXISTS `ms_sessions`;
CREATE TABLE IF NOT EXISTS `ms_sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `MSID` bigint(20) NOT NULL,
  `session_id` bigint(20) NOT NULL,
  `begins` date NOT NULL,
  `ends` date NOT NULL,
  `sess_year` int(4) NOT NULL,
  PRIMARY KEY (`MSID`,`session_id`),
  UNIQUE KEY `id` (`id`),
  KEY `MSID` (`MSID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

