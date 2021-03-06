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