CREATE TABLE IF NOT EXISTS
	`#__tst_jgapp_photos`
		(`id` int(11) NOT NULL auto_increment,
		 `uid` text,
		 `name` text,
		 `type` text,
		 `size` int,
		 `content` mediumblob,
  		 PRIMARY KEY (`id`) ) ENGINE=InnoDB CHARACTER SET `utf8` COLLATE `utf8_general_ci`;

