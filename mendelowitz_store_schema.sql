-- add drop table for all your tables if they exist
-- DROP TABLE IF EXISTS table_name CASCADE;
drop table if exists cart cascade;
drop table if exists orders cascade;
drop table if exists users cascade;
drop table if exists history cascade;
drop table if exists products cascade;

-- add create table for all your tabled
create table users (fname varchar(20), lname varchar(20), username varchar(20) not null, password varchar(20) not null, primary key (username));
create table products (name varchar(20), pid int(4), price float(5,2), stock int(4), category varchar(20), primary key (pid));
create table history (orderid int(5), itemid int(4), quantity int(4), primary key (orderid, itemid), 
                     foreign key(itemid) references products(pid));
create table orders (username varchar(20), orderdate date, orderid int(5), primary key (username, orderdate),
                     foreign key(username) references users(username), foreign key(orderid) references history(orderid));
create table cart (username varchar(20), itemid int(4), quantity int(4), primary key (username, itemid), 
                  foreign key(username) references users(username), foreign key(itemid) references products(pid));
                                                                                                                                 
-- add insert statements to populate your tables

INSERT INTO products VALUES ('Oreos','1000','5.99','150','Food');
INSERT INTO products VALUES ('Milk','1001','3.99','30','Food');
INSERT INTO products VALUES ('Cheese','1002','6.05','203','Food');
INSERT INTO products VALUES ('Spaghetti','1003','2.00','9999','Food');
INSERT INTO products VALUES ('Squash','1004','1.59','2','Food');
INSERT INTO products VALUES ('Bacon','1005','7.85','467','Food');
INSERT INTO products VALUES ('Bread','1006','3.45','5364','Food');

INSERT INTO products VALUES ('Phone0','2000','99.99','50','Electronics');
INSERT INTO products VALUES ('Phone1','2001','199.99','51','Electronics');
INSERT INTO products VALUES ('Phone2','2002','299.99','52','Electronics');
INSERT INTO products VALUES ('Phone3','2003','399.99','53','Electronics');
INSERT INTO products VALUES ('Phone4','2004','499.99','54','Electronics');
INSERT INTO products VALUES ('Phone5','2005','599.99','55','Electronics');
INSERT INTO products VALUES ('Phone6','2006','699.99','56','Electronics');

INSERT INTO products VALUES ('Picture0','3000','50.00','99','Art');
INSERT INTO products VALUES ('Picture1','3001','50.01','99','Art');
INSERT INTO products VALUES ('Picture2','3002','50.02','99','Art');
INSERT INTO products VALUES ('Picture3','3003','50.03','99','Art');
INSERT INTO products VALUES ('Picture4','3004','50.04','99','Art');
INSERT INTO products VALUES ('Picture5','3005','50.05','99','Art');
INSERT INTO products VALUES ('Picture6','3006','50.06','99','Art');


INSERT INTO users VALUES ('Joe','Lan','Joe','j');
INSERT INTO users VALUES ('Alex','Can','Alex','a');
INSERT INTO users VALUES ('Iris','Lilith','Iris','i');


INSERT INTO history VALUES ('1','1000','1');
INSERT INTO history VALUES ('1','1001','1');
INSERT INTO history VALUES ('1','1002','1');

INSERT INTO history VALUES ('2','2000','1');
INSERT INTO history VALUES ('3','2000','2');
INSERT INTO history VALUES ('3','3000','2');
INSERT INTO history VALUES ('4','1001','1');
INSERT INTO history VALUES ('4','2001','2');
INSERT INTO history VALUES ('4','3001','3');


INSERT INTO orders VALUES ('Alex','1999-01-01','1');
INSERT INTO orders VALUES ('Iris','2001-01-01','2');
INSERT INTO orders VALUES ('Iris','2002-02-02','3');
INSERT INTO orders VALUES ('Iris','2003-03-03','4');




