# Login and Registration System
A complete login and registration system with email activation.
First create a database named as login.

#Creating a table

CREATE TABLE users(
  id int(11) AUTO_INCREMENT PRIMARY KEY,
  first_name varchar(255) not null,
  last_name varchar(255) not null,
  username varchar(255) not null,
  email varchar(255) not null,
  password varchar(255) not null,
  validation_code text,
  active tinyint(4)
);
