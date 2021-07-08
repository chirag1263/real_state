<?php


CREATE TABLE `listing_photos` (
  `id` int(11) NOT NULL,
  `list_id` int(11) NOT NULL,
  `photo` text NOT NULL,
  `thumb` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `listing_photos`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `listing_photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

ALTER TABLE `listings` ADD `short_address` TEXT NULL DEFAULT NULL AFTER `thumb`;
ALTER TABLE `projects` ADD `short_address` TEXT NULL DEFAULT NULL AFTER `location`;

CREATE TABLE `wishlist` ( `id` INT NOT NULL AUTO_INCREMENT , `type` INT NOT NULL , `item_id` INT NOT NULL , `user_id` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `enquiries` ( `id` INT NOT NULL AUTO_INCREMENT , `type` INT NOT NULL , `item_id` INT NOT NULL , `user_id` INT NULL DEFAULT NULL , `name` VARCHAR(200) NULL DEFAULT NULL , `email` TEXT NULL DEFAULT NULL , `phone` VARCHAR(200) NULL DEFAULT NULL , `message` TEXT NULL DEFAULT NULL , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `created_at` TIMESTAMP NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


// 22 Mar
CREATE TABLE `visit_history` ( `id` INT NOT NULL AUTO_INCREMENT , `entity_type` INT NOT NULL , `entity_id` INT NOT NULL , `user_id` INT NOT NULL , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `visit_count` INT NOT NULL DEFAULT '0' , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `users` ADD `picture` TEXT NULL DEFAULT NULL AFTER `state`;

// 26 March 
CREATE TABLE `mail_queue` (
  `id` int(11) NOT NULL,
  `mailto` text COLLATE latin1_general_ci NOT NULL,
  `mailcc` text COLLATE latin1_general_ci NOT NULL,
  `mailbcc` text COLLATE latin1_general_ci NOT NULL,
  `subject` text COLLATE latin1_general_ci NOT NULL,
  `content` text COLLATE latin1_general_ci NOT NULL,
  `solved` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

ALTER TABLE `mail_queue`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `mail_queue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;


CREATE TABLE `seller_reviews` ( `id` INT NOT NULL AUTO_INCREMENT , `seller_id` INT NOT NULL , `review` TEXT NULL DEFAULT NULL , `rating` INT NOT NULL , `added_by` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `seller_reviews` ADD `status` TINYINT(1) NOT NULL DEFAULT '0' AFTER `added_by`;

CREATE TABLE `faqs` ( `id` INT NOT NULL AUTO_INCREMENT , `question` TEXT NULL DEFAULT NULL , `answer` TEXT NULL DEFAULT NULL , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `created_at` TIMESTAMP NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `testimonials` ( `id` INT NOT NULL AUTO_INCREMENT , `content` TEXT NULL DEFAULT NULL , `user_name` TEXT NULL DEFAULT NULL , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `created_at` TIMESTAMP NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `users` ADD `company_name` TEXT NULL DEFAULT NULL AFTER `blocked`, ADD `pro_type` VARCHAR(100) NULL DEFAULT NULL AFTER `company_name`;