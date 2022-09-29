create database akerna;

use akerna;

CREATE TABLE `users` (
    `id` int(11) NOT NULL auto_increment,
    `name` varchar(100) NOT NULL,
    `email` varchar(100) NOT NULL,
    `beverages` varchar(100) NOT NULL,
    `consumed` varchar(100) NOT NULL,
    `date_consumed` TIMESTAMP DEFAULT now(),
  PRIMARY KEY  (`id`)
);