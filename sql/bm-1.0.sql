USE bullet_monkey;

CREATE TABLE `addresses` (
  `address_id` bigint(19) NOT NULL AUTO_INCREMENT,
  `vendor_id` bigint(19) NOT NULL,
  `address1` varchar(50) DEFAULT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(2) DEFAULT NULL,
  `zipcode` varchar(15) NOT NULL,
  `country` varchar(50) NOT NULL DEFAULT 'US',
  `address_type` enum('primary','alternate') NOT NULL DEFAULT 'primary',
  `phone_number` varchar(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `geolat` decimal(10,5) DEFAULT NULL,
  `geolng` decimal(10,5) DEFAULT NULL,
  `geolatbox` decimal(10,5) DEFAULT NULL,
  `geolngbox` decimal(10,5) DEFAULT NULL,
  `description` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`address_id`),
  KEY `addresses_vid_idx` (`vendor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `alerts` (
  `alert_id` bigint(19) NOT NULL AUTO_INCREMENT,
  `member_id` bigint(19) DEFAULT NULL,
  `alert_type_id` int(11) DEFAULT NULL,
  `product_id` bigint(19) DEFAULT NULL,
  `distance` int(4) DEFAULT NULL,
  `zipcode` varchar(15) DEFAULT NULL,
  `is_active` smallint(1) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_processed` datetime DEFAULT NULL,
  PRIMARY KEY (`alert_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` bigint(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `members` (
  `member_id` bigint(19) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `password_salt` bigint(19) DEFAULT NULL,
  `email_address` varchar(50) NOT NULL,
  `faceBook_id` varchar(50) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_email_verified` smallint(1) DEFAULT '0',
  `is_active_account` smallint(1) NOT NULL DEFAULT '1',
  `last_login` datetime DEFAULT NULL,
  `validation_string` varchar(20) DEFAULT NULL,
  `zipcode` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `product_availability` (
  `product_availability_id` bigint(19) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(19) DEFAULT NULL,
  `address_id` bigint(19) DEFAULT NULL,
  `member_id` bigint(19) DEFAULT NULL,
  `in_stock` enum('Yes','No') DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_availability_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `product_categories` (
  `product_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  `parent_category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`product_category_id`),
  KEY `parent_product_category_idx` (`parent_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

CREATE TABLE `products` (
  `product_id` bigint(19) NOT NULL AUTO_INCREMENT,
  `product_category_id` int(11) DEFAULT NULL,
  `product_subcategory_id` int(11) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `product_description` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`),
  KEY `product_category_idx` (`product_category_id`,`product_subcategory_id`),
  UNIQUE KEY `products_pname_idx` (`product_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

CREATE TABLE `rewards` (
  `reward_id` bigint(19) NOT NULL AUTO_INCREMENT,
  `member_id` bigint(19) DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `reward_points` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`reward_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `vendors` (
  `vendor_id` bigint(19) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` int(1) NOT NULL DEFAULT '1',
  `is_paid` int(1) NOT NULL DEFAULT '0',
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`vendor_id`),
  UNIQUE KEY `vendors_vname_idx` (`vendor_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `zipcodes` (
  `id` mediumint(6) NOT NULL AUTO_INCREMENT,
  `zip` varchar(5) CHARACTER SET ascii NOT NULL DEFAULT '',
  `latitude` varchar(11) CHARACTER SET ascii NOT NULL DEFAULT '',
  `longitude` varchar(11) CHARACTER SET ascii NOT NULL DEFAULT '',
  `city` varchar(40) CHARACTER SET ascii NOT NULL DEFAULT '',
  `state` char(2) CHARACTER SET ascii NOT NULL DEFAULT '',
  `fullstate` varchar(30) CHARACTER SET ascii NOT NULL DEFAULT '',
  `county` varchar(40) CHARACTER SET ascii NOT NULL DEFAULT '',
  `zipclass` varchar(20) CHARACTER SET ascii NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `zip` (`zip`),
  KEY `city` (`city`,`state`),
  KEY `state` (`state`,`city`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

CREATE TABLE product_availability_flag (
   flag_id BIGINT(19) AUTO_INCREMENT NOT NULL,
   product_availability_id BIGINT(20) NOT NULL,
   member_id BIGINT(19) NOT NULL,
   created_date TIMESTAMP NOT NULL,
  PRIMARY KEY (flag_id),
  KEY `product_availability_flag_idx` (`product_availability_id`)
) ENGINE = InnoDB ROW_FORMAT = DEFAULT;

CREATE TABLE contests (
   contest_id BIGINT(19) AUTO_INCREMENT NOT NULL,
   member_id BIGINT(19) NOT NULL,
   contest_month VARCHAR(10),
   contest_year VARCHAR(4),
   is_winner SMALLINT(1),
   created_date TIMESTAMP NOT NULL,
  PRIMARY KEY (contest_id)
) ENGINE = InnoDB ROW_FORMAT = DEFAULT;