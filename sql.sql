SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS  `agent-mail`;
CREATE TABLE `agent-mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `host` varchar(32) DEFAULT NULL,
  `adress` varchar(32) DEFAULT NULL,
  `title` varchar(64) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

DROP TABLE IF EXISTS  `open-mail`;
CREATE TABLE `open-mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `adress` varchar(32) DEFAULT NULL,
  `title` varchar(64) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

SET FOREIGN_KEY_CHECKS = 1;