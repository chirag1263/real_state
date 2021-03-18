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