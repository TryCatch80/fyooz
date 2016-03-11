CREATE TABLE IF NOT EXISTS
`#__tst_jgapp_static_referral` (
        `id` INT NOT NULL AUTO_INCREMENT,
        `referral` TEXT NOT NULL,
        PRIMARY KEY(id)) ENGINE=InnoDB
CHARACTER SET 'utf8' COLLATE 'utf8_general_ci';
CREATE TABLE IF NOT EXISTS
	`#__tst_jgapp_applications`
		(`id` int(11) NOT NULL auto_increment,
		 `uid` varchar(30),
                 `email_uid` varchar(40),
		 `ssn` varchar(20),
 		 `hired` tinyint(1) unsigned NOT NULL default '0',
		 `create_date` datetime NOT NULL,
		 `hire_date` datetime,
		 `service_date` datetime,
		 `termination_date` datetime,
		 `termination_reason` varchar(255),
                 `notes` text,
                 `job_code` varchar(255),
                 `Itemid` int(11) NOT NULL default '0',
                 `NextItemid` int(11) NOT NULL default '0',
                 `parent_id` int(11) NOT NULL default '0',
                 `child_id` int(11) NOT NULL default '0',
                 `level` int(11) NOT NULL default '0',

		 `first_name` varchar(255) NOT NULL,
		 `last_name` varchar(255) NOT NULL,
		 `middle_name` varchar(255),
		 `home_phone` varchar(20) NOT NULL,
		 `work_phone` varchar(20),
 		 `cell_phone` varchar(20),
 		 `email_address` varchar(255),
 		 
 		 `street` varchar(255),
 		 `city` varchar(255),
 		 `state` varchar(20),
 		 `zip_code` varchar(20),
 		 `from_date` varchar(20),

 		 `street1` varchar(255),
 		 `city1` varchar(255),
 		 `state1` varchar(20),
 		 `zip_code1` varchar(20),
 		 `from_date1` varchar(20), 
 		 `to_date1` varchar(20),	
 		 
  		 `street2` varchar(255),
 		 `city2` varchar(255),
 		 `state2` varchar(20),
 		 `zip_code2` varchar(20),
 		 `from_date2` varchar(20), 
 		 `to_date2` varchar(20),

 		 `school` varchar(255),
 		 `school_city` varchar(255),
 		 `school_state` varchar(255),
 		 `school_diploma` tinyint(1) unsigned NOT NULL default '0',
 		 
 		 `school1` varchar(255),
 		 `school_city1` varchar(255),
 		 `school_state1` varchar(255),
 		 `school_diploma1` tinyint(1) unsigned NOT NULL default '0',
 		 `diploma_text1` varchar(255),
 		 `study_area1` varchar(255),
 		 
 		 `school2` varchar(255),
 		 `school_city2` varchar(255),
 		 `school_state2` varchar(255),
 		 `school_diploma2` tinyint(1) unsigned NOT NULL default '0',
 		 `diploma_text2` varchar(255),
 		 `study_area2` varchar(255),
 		 
 		 `school3` varchar(255),
 		 `school_city3` varchar(255),
 		 `school_state3` varchar(255),
 		 `school_diploma3` tinyint(1) unsigned NOT NULL default '0',
 		 `diploma_text3` varchar(255),
 		 `study_area3` varchar(255),
 		 
 		 `position` varchar(255),
 		 `available_date` varchar(20),
 		 `desired_pay` varchar(20),
 		 `work_preferences` varchar(20),
                 `shiftwork` tinyint(1) unsigned NOT NULL default '0',
 		 `weekends` tinyint(1) unsigned NOT NULL default '0',
  		 `evenings` tinyint(1) unsigned NOT NULL default '0',
  		 `monday` tinyint(1) unsigned NOT NULL default '0',
  		 `tuesday` tinyint(1) unsigned NOT NULL default '0',
		 `wednesday` tinyint(1) unsigned NOT NULL default '0',
		 `thursday` tinyint(1) unsigned NOT NULL default '0',
		 `friday` tinyint(1) unsigned NOT NULL default '0',
   		 `saturday` tinyint(1) unsigned NOT NULL default '0',
   		 `sunday` tinyint(1) unsigned NOT NULL default '0',
   		 `unavailability` varchar(255),
   		 `eligible` tinyint(1) unsigned NOT NULL default '0',
                 `provideproof` tinyint(1) unsigned NOT NULL default '0',
   		 `worked_here_before` tinyint(1) unsigned NOT NULL default '0',
   		 `worked_here_text` varchar(255),
   		 `job_desc_received` tinyint(1) unsigned NOT NULL default '0',
   		 `understand_reqs` tinyint(1) unsigned NOT NULL default '0',
   		 `no_understand_reqs` varchar(255),
   		 `on_layoff` tinyint(1) unsigned NOT NULL default '0',
   		 `conf_agreement` tinyint(1) unsigned NOT NULL default '0',
   		 `conf_explain` varchar(255),
   		 `discharged` tinyint(1) unsigned NOT NULL default '0',
   		 `discharge_explain` varchar(255),
   		 `convict` tinyint(1) unsigned NOT NULL default '0',
   		 `convict_explain` varchar(255),
                 `family` tinyint(1) unsigned NOT NULL default '0',
                 `family_explain` text,
   		 
                 `currently_employed` tinyint(1) unsigned NOT NULL default '0',
   		 `contact_emp` tinyint(1) unsigned NOT NULL default '0',
   		 
   		 `employer` varchar(255),
   		 `employer_city` varchar(255),
   		 `employer_state` varchar(20),
   		 `employer_zip` varchar(20),
   		 `employer_phone` varchar(20),
   		 `employer_pos` varchar(50),
   		 `employer_from` varchar(20),
   		 `employer_to` varchar(20),
   		 `employer_pay` varchar(20),
   		 `employer_sup` varchar(255),
   		 `employer_dut` varchar(255),
   		 `employer_leave` varchar(255),
   		 
   		 `employer1` varchar(255),
   		 `employer1_city` varchar(255),
   		 `employer1_state` varchar(20),
   		 `employer1_zip` varchar(20),
   		 `employer1_phone` varchar(20),
   		 `employer1_pos` varchar(50),
   		 `employer1_from` varchar(20),
   		 `employer1_to` varchar(20),
   		 `employer1_pay` varchar(20),
   		 `employer1_sup` varchar(255),
   		 `employer1_dut` varchar(255),
   		 `employer1_leave` varchar(255),

   		 `employer2` varchar(255),
   		 `employer2_city` varchar(255),
   		 `employer2_state` varchar(20),
   		 `employer2_zip` varchar(20),
   		 `employer2_phone` varchar(20),
   		 `employer2_pos` varchar(50),
   		 `employer2_from` varchar(20),
   		 `employer2_to` varchar(20),
   		 `employer2_pay` varchar(20),
   		 `employer2_sup` varchar(255),
   		 `employer2_dut` varchar(255),
   		 `employer2_leave` varchar(255),

   		 `employer3` varchar(255),
   		 `employer3_city` varchar(255),
   		 `employer3_state` varchar(20),
   		 `employer3_zip` varchar(20),
   		 `employer3_phone` varchar(20),
   		 `employer3_pos` varchar(50),
   		 `employer3_from` varchar(20),
   		 `employer3_to` varchar(20),
   		 `employer3_pay` varchar(20),
   		 `employer3_sup` varchar(255),
   		 `employer3_dut` varchar(255),
   		 `employer3_leave` varchar(255),
 		 
 		 `driver_license` tinyint(1) unsigned NOT NULL default '0',
 		 `dl_number` varchar(20),
 		 `dl_issued` varchar(20),
 		 `driving_offense` tinyint(1) unsigned NOT NULL default '0',
                 `driving_offense_reason` varchar(255),
 		 `dl_modified` tinyint(1) unsigned NOT NULL default '0',
                 `dl_modified_reason` varchar(255),
 		 `dl_states` varchar(255),
 		 `skills` text,
 		 `professional` text,
 		 
 		 `ref1_name` varchar(255),
 		 `ref1_address` varchar(255),
 		 `ref1_telephone` varchar(20),
 		 `ref1_relationship` varchar(20),
 		 `ref1_years` varchar(10),

 		 `ref2_name` varchar(255),
 		 `ref2_address` varchar(255),
 		 `ref2_telephone` varchar(20),
 		 `ref2_relationship` varchar(20),
 		 `ref2_years` varchar(10),

 		 `ref3_name` varchar(255),
 		 `ref3_address` varchar(255),
 		 `ref3_telephone` varchar(20),
 		 `ref3_relationship` varchar(20),
 		 `ref3_years` varchar(10),
 		 
 		 `ref4_name` varchar(255),
 		 `ref4_address` varchar(255),
 		 `ref4_telephone` varchar(20),
 		 `ref4_relationship` varchar(20),
 		 `ref4_years` varchar(10), 

		 `text_resume` text,

                 `custom_yes_no` tinyint(1) unsigned NOT NULL default '0',
 		 
 		 `file_name` varchar(255),
		 `file_id` int,
 		 `signature` varchar(255),

                 `referral_id` int,
 		 PRIMARY KEY (`id`) ) ENGINE=InnoDB CHARACTER SET `utf8` COLLATE `utf8_general_ci`;
 		 
CREATE TABLE IF NOT EXISTS
	`#__tst_jgapp_uploads`
		(`id` int(11) NOT NULL auto_increment,
		 `uid` text,
		 `name` text,
		 `type` text,
		 `size` int,
		 `content` mediumblob,
  		 PRIMARY KEY (`id`) ) ENGINE=InnoDB CHARACTER SET `utf8` COLLATE `utf8_general_ci`;
CREATE TABLE IF NOT EXISTS
        `#__tst_jgapp_lists`
                (`id` int (11) NOT NULL auto_increment,
                 `user_id` int(11) NOT NULL default '0',
                 `list` text,
                 `description` text,
                 `list_text` text,
                 `tags` text,
                 `create_date` DATETIME,
                 `modify_date` DATETIME,
                 `hits` int(11) NOT NULL default '0',
                 PRIMARY KEY (`id`) ) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS
	`#__tst_jgapp_photos`
		(`id` int(11) NOT NULL auto_increment,
		 `uid` text,
		 `name` text,
		 `type` text,
		 `size` int,
		 `content` mediumblob,
  		 PRIMARY KEY (`id`) ) ENGINE=InnoDB CHARACTER SET `utf8` COLLATE `utf8_general_ci`;


CREATE TABLE IF NOT EXISTS
        `#__tst_jgapp_uids`
        (`id` INT(11) NOT NULL AUTO_INCREMENT,
         `uid` VARCHAR(50) NOT NULL,
        PRIMARY KEY (`id`) ) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS
        `#__tst_jgapp_values`
            (`variable` text,
             `value` text) ENGINE=InnoDB;
