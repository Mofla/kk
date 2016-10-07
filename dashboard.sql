CREATE TABLE `projects` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`description` TEXT NOT NULL,
	`users_number` INT NOT NULL,
	`finished` BOOLEAN NOT NULL,
	`start_date` DATE NOT NULL,
	`end_date` DATE NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `tasks` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	`description` TEXT NOT NULL,
	`state_id` INT NOT NULL,
	`project_id` INT NOT NULL,
	`start_date` DATE NOT NULL,
	`end_date` DATE NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `states` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` varchar(255) NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `diaries` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`user_id` INT NOT NULL,
	`project_id` INT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `entries` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`diary_id` INT NOT NULL,
	`date` DATE NOT NULL,
	`content` TEXT NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `projects_users` (
	`project_id` INT NOT NULL ,
	`user_id` INT NOT NULL,
	PRIMARY KEY (`project_id`, `user_id`)
);

CREATE TABLE `tasks_users` (
	`task_id` INT NOT NULL,
	`user_id` INT NOT NULL,
	PRIMARY KEY (`task_id`, `user_id`)
);

INSERT INTO `states`(`name`) VALUES
	('todo'),
	('doing'),
	('done');
