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