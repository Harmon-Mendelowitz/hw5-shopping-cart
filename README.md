# Homework: PHP Shopping Cart

**Harmon Mendelowitz**
 - mendelowitz@gwu.edu
 - HarmonMendelowitz
 - http://gwupyterhub.seas.gwu.edu/~mendelowitz/hw5-HarmonMendelowitz/front.php

## Description
This homework will have you develop a web store application.

## Deadlines
- Phase 1: Database ER diagram due 02/20 before lab time via GitHub (please also bring a printed copy to lab).
  - [x] Open an issue in your repository when the file is ready for review. Use markdown in the comment to add a link to your file in your local repository
- Phase 2: Complete application due 02/26 at 7 pm.

## Application Requirements

A user visiting your web store application can search for products (you must be able to search for a specific item name and display that item, and search and display all items in a certain category) and see all products and their available quantity.

Only a logged in user can add products to a shopping cart and "buy" various quantities of products. To "buy" a product means to reduce the quantity from that product with the quantity that was "bought" (i.e. your database should be updated to reflect the reduction in quantity of items after purchase).

A logged in user shopping cart can be viewed, edited, checked out or deleted. A logged in user can also see his/her orders history if there are any.

## Grading levels
You have to complete all the requirements for a level before you can move to the next one.

### Base level 85% of the grade
- [ ] Database schema and scripts to create and populate the tables.
  - [ ] rename the file [GWNetID_store_schema.sql](GWNetID_store_schema.sql) use `git mv` command

- [ ] Minimal web interface: web page does not to look professional, minimal styling, no form checks.
- [ ] The user can see all the products the store sells.
- [ ] The user can search for a specific item by name.
- [ ] The user can see all the products in a specific category.
- [ ] The user can login, but not create a new account.
  - [ ] users who are not in the DB can't login.
- [ ] The logged in user can view, add to, edit, check out or delete the cart.
- [ ] The database is updated when a user buys or checks out.
- [ ] The store doesn't let a user buy negative amounts or more than it is in the inventory.
- [ ] The logged in user can see his/her previous orders history.

### Medium level takes you to 95%
- [ ] A new user can sign up.
- [ ] The front end is user friendly: website is easy and intuitive to navigate, no server error messages are presented to to user (if an error give a user friendly message).
- [ ] Website style: products have pictures.

### Prime level takes you to 100%
- [ ] Implement validation for input forms (i.e. new user creation, quantity added to cart).
- [ ] The logged in user can sort its orders by date.
- [ ] The logged in user can search for a product in his/her past orders.
- [ ] Website inspires a professional look: has logo, product descriptions, etc.

## Resources

### TOOLS
- PHP	syntax	checker:	[https://www.piliapp.com/php-syntax-check/](https://www.piliapp.com/php-syntax-check/)
- MySQL	syntax	checker:	[https://www.piliapp.com/mysql-syntax-check/](https://www.piliapp.com/mysql-syntax-check/)
- PHP	official	site:	[www.php.net](www.php.net)
- PHP	manual	page:	[http://www.php.net/manual/en/index.php](http://www.php.net/manual/en/index.php)
- Useful	packages:	[http://www.easyphp.org/](http://www.easyphp.org/)

### PHP	Usage

#### GET:	`$_GET['variablename']`
The	variable	is	appended	to	the	http	address,	and	is	transmitted	in	the	same	stream (i.e.:	http://www.somesite.com/index.php?a=1&b='x') making it easy	to bookmark

#### POST:	`$_POST['variablename']`
A new	stream	is	created,	and	all	the	post	variables	are	transmitted	in	this	stream.	The	http	address	is	clean	(no	bookmarks).

#### SESSION
HTTP	is	stateless,	so	we	need	something	to	simulate	a	stateful	connection.	This	maintains	records	on	the	server	side	until	the	browser	is	closed. This	allows	us	to	build	a	'shopping	cart',	or	anything	similar.

USAGE:
```
session_start();
$_SESSION['foo']='bar';
$_SESSION['a']['b']='c';
```
More	resources:
- PRACTICE	HERE:	[https://www.w3schools.com/php/php_sessions.asp](https://www.w3schools.com/php/php_sessions.asp)
- [http://php.net/manual/en/session.examples.basic.php](http://php.net/manual/en/session.examples.basic.php)
