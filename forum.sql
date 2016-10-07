CREATE TABLE forums (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`description` TEXT(800) NOT NULL,
	`active` BOOLEAN NOT NULL,
	`category_id` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE threads (
	`id` INT NOT NULL AUTO_INCREMENT,
	`subject` varchar(255) NOT NULL,
	`text` TEXT NOT NULL,
	`created` DATETIME NOT NULL,
	`user_id` INT NOT NULL,
	`forum_id` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE posts (
	`id` INT NOT NULL AUTO_INCREMENT,
	`title` varchar(255) NOT NULL,
	`message` TEXT NOT NULL,
	`created` DATETIME NOT NULL,
	`modified` DATETIME NOT NULL,
	`user_id` INT NOT NULL,
	`thread_id` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE files (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL,
	`type` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
);


CREATE TABLE posts_files (
	`post_id` INT NOT NULL,
	`file_id` INT NOT NULL
);

CREATE TABLE categories (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(100) NOT NULL,
	PRIMARY KEY (`id`)
);


ALTER TABLE `forums` ADD CONSTRAINT `forums_fk0` FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`);

ALTER TABLE `threads` ADD CONSTRAINT `threads_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `threads` ADD CONSTRAINT `threads_fk1` FOREIGN KEY (`forum_id`) REFERENCES `forums`(`id`);

ALTER TABLE `posts` ADD CONSTRAINT `posts_fk0` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`);

ALTER TABLE `posts` ADD CONSTRAINT `posts_fk1` FOREIGN KEY (`thread_id`) REFERENCES `threads`(`id`);

ALTER TABLE `posts_files` ADD CONSTRAINT `posts_files_fk0` FOREIGN KEY (`post_id`) REFERENCES `posts`(`id`);

ALTER TABLE `posts_files` ADD CONSTRAINT `posts_files_fk1` FOREIGN KEY (`file_id`) REFERENCES `files`(`id`);

