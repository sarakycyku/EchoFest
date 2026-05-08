create database echofest;

use echofest;

create table users (
  id int auto_increment primary key,
  first_name varchar(100) not null,
  last_name varchar(100) not null,
  username varchar(50) not null unique,
  email varchar(150) not null unique,
  phone varchar(30) not null,
  age int not null check (age >= 18 and age <= 120),
  password varchar(255) not null,
  role varchar(20) not null default 'user' check (role in ('admin','user')),
  created_at timestamp not null default current_timestamp
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
  price DECIMAL(10,2) not null DEFAULT 0.00 CHECK (price >= 0),
  image varchar(255) DEFAULT null
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
  quantity int not null CHECK (quantity > 0),
  total_price DECIMAL(10,2) not null CHECK (total_price >= 0),

  foreign key (user_id) references users(id)
    ON DELETE CASCADE ON UPDATE CASCADE,

  foreign key (event_id) references events(id)
    ON DELETE CASCADE ON UPDATE CASCADE
);