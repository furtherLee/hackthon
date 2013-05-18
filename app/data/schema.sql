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
    `phone` text not null,
    `status` int not null,
    `gid` int,
    foreign key (`gid`) references `groups`(`id`)
);

insert into users (name, email, pass, type) values ('李诗剑', 'u1@u', md5('u1'), 0);
insert into users (name, email, pass, type) values ('瞿钧', 'u2@u', md5('u2'), 0);
insert into users (name, email, pass, type) values ('王孟晖', 'u3@u', md5('u3'), 0);
insert into users (name, email, pass, type) values ('贾枭', 'd1@d', md5('d1'), 1);

create user 'hacker_dev'@'localhost' identified by 'hacker_dev';
grant all privileges on hacker.* to 'hacker_dev'@'localhost' with grant option;
