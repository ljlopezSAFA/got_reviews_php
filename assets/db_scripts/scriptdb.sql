CREATE TABLE `got_character` (
                                 `id` int(10) NOT NULL AUTO_INCREMENT,
                                 `firtsName` varchar(150) DEFAULT NULL,
                                 `lastName` varchar(150) DEFAULT NULL,
                                 `fullName` varchar(300) DEFAULT NULL,
                                 `title` varchar(100) DEFAULT NULL,
                                 `family` varchar(100) DEFAULT NULL,
                                 `image` varchar(200) DEFAULT NULL,
                                 `imageUrl` varchar(800) DEFAULT NULL,
                                 `code` int(11) DEFAULT NULL,
                                 PRIMARY KEY (`id`)
);


create table category(
                         id int(10) NOT NULL auto_increment primary key ,
                         name varchar(100) not null,
                         image text not null
);

create table user(
                     id int(10) NOT NULL auto_increment primary key ,
                     username varchar(100) not null,
                     mail varchar(500) not null,
                     role int(1) not null,
                     password text not null
);

create table review(
                       id int(10) not null auto_increment primary key,
                       comment text not null,
                       stars int(1) not null,
                       id_user int(10) not null,
                       id_character int(10) not null,
                       constraint fk_review_character foreign key (id_character) references got_character(id),
                       constraint fk_review_user foreign key (id_user) references user(id)
);


create table ranking(
                        id int(10) not null auto_increment primary key,
                        id_user int(10) not null,
                        id_category int(10) not null,
                        constraint fk_ranking_user foreign key (id_user) references user(id),
                        constraint fk_ranking_category foreign key (id_category) references category(id)
);



create table ranking_character(
                                  id int(10) not null auto_increment primary key,
                                  id_character int(10) not null,
                                  id_ranking int(10) not null,
                                  position int(10) not null,
                                  constraint fk_ranking_character_character foreign key (id_character) references got_character(id),
                                  constraint fk_ranking_character_ranking foreign key (id_ranking) references ranking(id)
);


create table category_character(
                                   id_character int(10) not null,
                                   id_category int(10) not null,
                                   constraint fk_category_character_category foreign key (id_category) references category(id),
                                   constraint fk_category_character_character foreign key (id_character) references got_character(id)
);
