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
) default charset utf8 COLLATE utf8_general_ci;

create table if not exists `groups` (
    `id` int not null auto_increment,
    primary key (`id`),
    `uid` int not null,
    foreign key (`uid`) references `users`(`id`)
) default charset utf8 COLLATE utf8_general_ci;

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
) default charset utf8 COLLATE utf8_general_ci;

insert into users (name, email, pass, type) values ('李诗剑', 'u1@u', md5('u1'), 0);
insert into users (name, email, pass, type) values ('瞿钧', 'u2@u', md5('u2'), 0);
insert into users (name, email, pass, type) values ('王孟晖', 'u3@u', md5('u3'), 0);
insert into users (name, email, pass, type) values ('贾枭', 'd1@d', md5('d1'), 1);
insert into users (name, email, pass, type) values ('李伟', 'd2@d', md5('d2'), 1);

insert into groups (uid) values (4);

insert into orders (uid, description, address, phone, status, gid) values (2, '农家小炒肉', '东1', '15216788888', 1, 1);
insert into orders (uid, description, address, phone, status, gid) values (2, '韩式拌饭', '东19-306', '15216788888', 1, 1);
insert into orders (uid, description, address, phone, status, gid) values (2, '茄汁猪排蛋包饭', '电院3-101', '15216788888', 1, 1);
insert into orders (uid, description, address, phone, status, gid) values (2, '妖怪size汉堡', '逸夫楼', '15216788888', 1, 1);
insert into orders (uid, description, address, phone, status, gid) values (2, '酸汤肥牛套餐', '嘉应驿站', '15216788888', 1, 1);
insert into orders (uid, description, address, phone, status) values (3, '小盘鸡吧', '图书信息楼', '15216766666', 0);
insert into orders (uid, description, address, phone, status) values (3, '茄纸炒肉盖浇饭', '第二餐饮大楼-教工餐厅', '15216766666', 0);
insert into orders (uid, description, address, phone, status) values (3, '好大好大的鸡排饭', '东19-303', '15216766666', 0);
insert into orders (uid, description, address, phone, status) values (3, '泡泡碳烤大鸡排', '新行政楼', '15216766666', 0);

create user 'hacker_dev'@'localhost' identified by 'hacker_dev';
grant all privileges on hacker.* to 'hacker_dev'@'localhost' with grant option;
