create database if not exists hacker default charset utf8 COLLATE utf8_general_ci;

use hacker;

create table if not exists user (
    id int not null auto_increment,
    primary key (id),
    name varchar(40) not null,
    email varchar(40) not null,
    pass varchar(40) not null
);

create table if not exists submit (
    id int not null auto_increment,
    primary key (id),
    time timestamp not null default current_timestamp,
    uid int not null,
    foreign key (uid) references user(id),
    file varchar(40),
    text text
);

create table if not exists review (
    id int not null auto_increment,
    primary key(id),
    sid int not null,
    foreign key(sid) references user(id),
    uid int not null,
    foreign key(uid) references user(id),
    time timestamp not null default current_timestamp,
    score int,
    question text,
    ans text
);

create table if not exists site (
    phase int not null,
    uid int not null,
    foreign key(uid) references user(id),
    text text
);

insert into user (id, name, email, pass) values (1, 'admin', 'admin@admin', md5('admin'));
insert into site (phase, uid, text) values (1, 1, '嘻嘻');
insert into user (name, email, pass) values ('user1', 'user1@user1', md5('user1'));
insert into user (name, email, pass) values ('user2', 'user2@user2', md5('user2'));

create user 'hacker_dev'@'localhost' identified by 'hacker_dev';
grant all privileges on hacker.* to 'hacker_dev'@'localhost' with grant option;
