Requirements:
LAMP/WAMP server intalled

DB structure:
db name : raj

create table:
CREATE TABLE `names` (
 `first_name` varchar(25) COLLATE utf8_bin NOT NULL COMMENT 'for first names',
 `last_name` varchar(25) COLLATE utf8_bin NOT NULL COMMENT 'for last names',
 UNIQUE KEY `first_name` (`first_name`,`last_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin

Here uniqe on both columns as pairs is used to remove duplicates and make searching faster by use of indexes

EXPLAIN (SELECT * FROM `names` WHERE `first_name` like '%r%' and `last_name` like '%v%')
result
id select_type table partitions type possible_keys key key_len ref rows filtered Extra
1 SIMPLE names NULL index NULL first_name 154 NULL 881111 1.23 Using where; Using index

Procedure:
User needs to copy the files to the folder he wants to set up project and change in test.php and populateData.php for username and passwords.
Then call the index file (index.php) for the result.
