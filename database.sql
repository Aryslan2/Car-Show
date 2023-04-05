CREATE TABLE users (
  id int(30) NOT NULL AUTO_INCREMENT,
  username varchar(25) NOT NULL,
  email varchar(50) NOT NULL,
  password varchar(75) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE car (
  id int(30) NOT NULL AUTO_INCREMENT,
  name varchar(200) NOT NULL,
  image varchar(200) NOT NULL,
  price varchar(200) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE dashboard (
  id int(30) NOT NULL AUTO_INCREMENT,
  name varchar(200) NOT NULL,
  image varchar(200) NOT NULL,
  price varchar(200) NOT NULL,
   PRIMARY KEY (id)
);

INSERT INTO car (id, name, image, price) VALUES
(1, 'Honda Civic', '1.jpeg', '30000$'),
(2, 'Ford Escape', '2.jpeg', '33000$'),
(3, 'Nissan Altima', '3.jpeg', '27000$'),
(4, 'Subaru Outback', '4.jpeg', '23000$'),
(5, 'Mazda CX-5', '5.jpeg', '43000$'),
(6, 'Honda Accord', '6.jpeg', '37000$');
