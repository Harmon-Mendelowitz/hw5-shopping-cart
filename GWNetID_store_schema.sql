-- add drop table for all your tables if they exist
-- DROP TABLE IF EXISTS table_name CASCADE;
drop table if exists products cascade;
drop table if exists orders cascade;
drop table if exists cart cascade;
drop table if exists users cascade;
drop table if exists history cascade;

-- add create table for all your tabled
create table users (username varchar(50) not null, password varchar(50) not null, primary key (username));
create table products (name varchar(50), pid int(4), price float(5,2), stock int(4), category varchar(50), primary key (pid));
create table orders (username varchar(50), orderdate date, orderid int(5), primary key (username, orderdate),
                     foreign key(username) references users(username), foreign key(orderid) references history(orderid));
create table history (orderid int(5), itemid int(4), quantity int(4), primary key (orderid), 
                     foreign key(itemid) references products(pid));
create table cart (username varchar(50), itemid int(4), quantity int(4), primary key (username, itemid), 
                  foreign key(username) references users(username), foreign key(itemid) references products(pid));
                                                                                                                                 
-- add insert statements to populate your tables
INSERT INTO users VALUES ('Joe','j');
INSERT INTO users VALUES ('Alex','a');
INSERT INTO users VALUES ('Iris','i');

INSERT INTO orders VALUES ('Alex','1999-01-01','1');
INSERT INTO orders VALUES ('Iris','2001-01-01','2');
INSERT INTO orders VALUES ('Iris','2002-02-02','3');
INSERT INTO orders VALUES ('Iris','2003-03-03','4');










