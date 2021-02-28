<?php

CREATE TABLE `patool`.`last_search_companies` ( `id` INT NOT NULL AUTO_INCREMENT , `com_id` INT NOT NULL , `year` INT NOT NULL , `search_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `last_search_companies` ADD `user_id` INT NOT NULL AFTER `year`;

CREATE TABLE `patool`.`company_categorization` ( `id` INT NOT NULL AUTO_INCREMENT , `category_name` VARCHAR(300) NOT NULL , `com_count` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `patool`.`bulk_companies` ( `id` INT NOT NULL AUTO_INCREMENT , `category_id` INT NOT NULL , `com_id` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `projects` ADD `cover_image` TEXT NULL DEFAULT NULL AFTER `featured`, ADD `feature_image` TEXT NULL DEFAULT NULL AFTER `cover_image`;