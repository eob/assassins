CREATE TABLE `assassins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `real_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `killed_by` int(11) NOT NULL DEFAULT '0',
  `killed_conf` int(11) NOT NULL DEFAULT '0',
  `obituary` text NOT NULL,
  `points` int(11) NOT NULL DEFAULT '0',
  `agent_number` int(11) NOT NULL,
  `tod` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1

