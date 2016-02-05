DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `comm_id` int(10) NOT NULL AUTO_INCREMENT,
  `bug_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `comm_date` int(11) NOT NULL COMMENT 'Date creation bug (timestamp)',
  `comm_text` text NOT NULL,
  PRIMARY KEY (`comm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `bugs`;
CREATE TABLE `bugs` (
  `bug_id` int(10) NOT NULL AUTO_INCREMENT,
  `submitted_by` int(10),
  `submitted_date`  int(11) NOT NULL COMMENT 'Date creation (timestamp)',
  `cat_id` int(10) NOT NULL,
  `assign_to` int(10),
  `last_date` int(11) NOT NULL COMMENT 'Date de dernière modif (timestamp)',
  `bug_name` varchar(64) NOT NULL,
  `bug_text` text NOT NULL,
  `priority` int(1) NOT NULL COMMENT 'De 1 a 5',
  `state` int(3) NOT NULL COMMENT '0 à 100 en %',
  PRIMARY KEY (`bug_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(32) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `realname` varchar(32),
  `level` int(1) NOT NULL COMMENT '1 = normal, 2 = team, 3 = admin',
  `mail` varchar(64) DEFAULT NULL,
  `notification` boolean,
  `enabled` boolean,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- Jeu de test
INSERT INTO categories VALUES (1,'catégorie1');
INSERT INTO users VALUES (1,'adrien',sha1('adrien'),'Adrien D', '3', 'adrien@lan.local', '0', '1');

