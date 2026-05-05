create database echofest;

use echofest;

CREATE TABLE users (
  id int AUTO_INCREMENT PRIMARY KEY,
  first_name varchar(100) not null,
  last_name varchar(100) not null,
  username varchar(50) not null unique,
  email varchar(150) not null unique,
  phone varchar(30) not null,
  age int not null,
  password varchar(255) not null,
  role varchar(20) not null DEFAULT 'user',
  created_at TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP,

  CHECK (age BETWEEN 18 AND 120),
  CHECK (role IN ('admin', 'user'))
);

CREATE TABLE artists (
  id int AUTO_INCREMENT PRIMARY KEY,
  name varchar(120) not null,
  genre varchar(80) not null,
  bio text DEFAULT null,
  image varchar(255) DEFAULT null
);

CREATE TABLE events (
  id int AUTO_INCREMENT PRIMARY KEY,
  title varchar(150) not null,
  event_date DATETIME not null,
  location varchar(120) not null,
  description text DEFAULT null,
  price DECIMAL(10,2) not null DEFAULT 0.00,
  image varchar(255) DEFAULT null,
  CHECK (price >= 0)
);


CREATE TABLE event_artists (
  id int AUTO_INCREMENT PRIMARY KEY,
  event_id int not null,
  artist_id int not null,
  created_at TIMESTAMP not null DEFAULT CURRENT_TIMESTAMP,
    foreign key (event_id) references events(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key (artist_id) references artists(id)
    ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE bookings (
  id int AUTO_INCREMENT PRIMARY KEY,
  user_id int not null,
  event_id int not null,
  quantity int not null,
  total_price DECIMAL(10,2) not null,
    foreign key (user_id) references users(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    foreign key (event_id) references events(id)
    ON DELETE CASCADE ON UPDATE CASCADE,
  CHECK (quantity > 0),
  CHECK (total_price >= 0)
);



