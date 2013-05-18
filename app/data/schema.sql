create database if not exists hacker default charset utf8 COLLATE utf8_general_ci;

use hacker;

create table if not exists `users` (
    `id` int not null auto_increment,
    primary key (`id`),
    `name` varchar(40) not null,
    `email` varchar(40) not null,
    unique (`email`),
    `pass` varchar(40) not null,
    `type` int not null
);

create table if not exists `groups` (
    `id` int not null auto_increment,
    primary key (`id`),
    `uid` int not null,
    foreign key (`uid`) references `users`(`id`)
);

create table if not exists `orders` (
    `id` int not null auto_increment,
    primary key (`id`),
    `uid` int not null,
    foreign key (`uid`) references `users`(`id`),
    `time` timestamp not null default current_timestamp,
    `description` text,
    `address` text not null,
    `status` int not null,
    `gid` int,
    foreign key (`gid`) references `groups`(`id`)
);

insert into users (name, email, pass, type) values ('user1', 'user1@user1', md5('user1'), 0);
insert into users (name, email, pass, type) values ('user2', 'user2@user2', md5('user2'), 0);
insert into users (name, email, pass, type) values ('deliverer1', 'deliverer1@ deliverer1', md5('deliverer1'), 1);

create user 'hacker_dev'@'localhost' identified by 'hacker_dev';
grant all privileges on hacker.* to 'hacker_dev'@'localhost' with grant option;