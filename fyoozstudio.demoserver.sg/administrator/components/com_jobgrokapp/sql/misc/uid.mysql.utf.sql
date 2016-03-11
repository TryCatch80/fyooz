INSERT INTO `#__tst_jgapp_uids` (`uid`)
SELECT DISTINCT `a`.`uid` 
    FROM `#__tst_jgapp_applications` `a` 
    LEFT JOIN `#__tst_jgapp_uids` `u` ON `a`.`uid`=`u`.`uid` 
    WHERE `u`.`uid` IS NULL AND `a`.`uid` IS NOT NULL;

