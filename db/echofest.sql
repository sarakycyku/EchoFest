CREATE DATABASE IF NOT EXISTS echofest CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE echofest;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  first_name VARCHAR(100) NOT NULL,
  last_name VARCHAR(100) NOT NULL,
  phone VARCHAR(30) NOT NULL,
  age INT NOT NULL,
  role VARCHAR(20) NOT NULL DEFAULT 'user',
  created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS lineup (
  id INT AUTO_INCREMENT PRIMARY KEY,
  artist VARCHAR(120) NOT NULL,
  stage VARCHAR(80) NOT NULL,
  day VARCHAR(30) NOT NULL,
  image VARCHAR(255) NOT NULL,
  hits TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS tickets (
  id VARCHAR(50) PRIMARY KEY,
  img_class VARCHAR(80) DEFAULT NULL,
  img_src VARCHAR(255) NOT NULL,
  name VARCHAR(120) NOT NULL,
  description TEXT NOT NULL,
  price INT NOT NULL,
  available TINYINT(1) NOT NULL DEFAULT 0,
  coming_date VARCHAR(100) DEFAULT NULL,
  sort_order INT NOT NULL DEFAULT 0
);

CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  ticket_type VARCHAR(50) DEFAULT NULL,
  ticket_name VARCHAR(120) NOT NULL,
  qty INT NOT NULL,
  event_name VARCHAR(120) NOT NULL,
  event_dates VARCHAR(120) NOT NULL,
  location_code VARCHAR(20) DEFAULT NULL,
  total DECIMAL(10,2) NOT NULL,
  order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (username) REFERENCES users(username) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS events (
  id VARCHAR(80) PRIMARY KEY,
  title VARCHAR(150) NOT NULL,
  event_date VARCHAR(80) NOT NULL,
  event_time VARCHAR(80) NOT NULL,
  location VARCHAR(120) NOT NULL,
  stage VARCHAR(80) NOT NULL,
  description TEXT NOT NULL,
  artist VARCHAR(120) NOT NULL,
  image VARCHAR(255) NOT NULL,
  category VARCHAR(80) NOT NULL
);

INSERT INTO users (username, password, email, first_name, last_name, phone, age, role, created_at) VALUES
('admin1', '$2y$10$zACmuYDI936I.R9.rWyT9OBxXlJfJ625gRWLRAFRbEK95vOOAE7pK', 'admin1@echofest.com', 'Sara', 'Admin', '049123456', 25, 'admin', NOW()),
('admin2', '$2y$10$DKkB9az/MewyGmEzhh9yxumumeTDIdxXbrUWgS7qWgs0l3M6Iv4.e', 'admin2@echofest.com', 'Echo', 'Fest', '044987654', 30, 'admin', NOW()),
('johndoe', '$2y$10$6OZdPEoxVaB3GHIEgRCP8elb7kd.B/j.0PWqujmVUPrjrS6dwd/4O', 'john@test.com', 'John', 'Doe', '044111111', 20, 'user', NOW())
ON DUPLICATE KEY UPDATE
  password = VALUES(password),
  email = VALUES(email),
  first_name = VALUES(first_name),
  last_name = VALUES(last_name),
  phone = VALUES(phone),
  age = VALUES(age),
  role = VALUES(role);

INSERT INTO lineup (id, artist, stage, day, image, hits) VALUES
(1, 'Dua Lipa', 'Main Stage', 'Saturday', '/EchoFest/assets/images/dua_lipa.png', '["Levitating","New Rules","Don''t Start Now"]'),
(2, 'DJ Snake', 'Main Stage', 'Friday', '/EchoFest/assets/images/dj_snake.png', '["Taki Taki","Lean On","Let Me Love You"]'),
(3, 'Martin Garrix', 'EDM Stage', 'Sunday', '/EchoFest/assets/images/martin_garrix.png', '["Animals","Scared to Be Lonely","In the Name of Love"]'),
(4, 'Rita Ora', 'Pop Stage', 'Friday', '/EchoFest/assets/images/rita_ora.png', '["Anywhere","Let You Love Me","Your Song"]'),
(5, 'The Weeknd', 'Main Stage', 'Saturday', '/EchoFest/assets/images/weeknd.png', '["Blinding Lights","Starboy","Save Your Tears"]'),
(6, 'Calvin Harris', 'EDM Stage', 'Sunday', '/EchoFest/assets/images/calvin_harris.png', '["Summer","One Kiss","Feel So Close"]'),
(7, 'Billie Eilish', 'Main Stage', 'Friday', '/EchoFest/assets/images/billie_eilish.png', '["Bad Guy","Ocean Eyes","Happier Than Ever"]'),
(8, 'Ed Sheeran', 'Acoustic Stage', 'Saturday', '/EchoFest/assets/images/ed_sheeran.png', '["Shape of You","Perfect","Photograph"]'),
(9, 'David Guetta', 'EDM Stage', 'Friday', '/EchoFest/assets/images/david_guetta.png', '["Titanium","Play Hard","Without You"]'),
(10, 'Sia', 'Pop Stage', 'Sunday', '/EchoFest/assets/images/sia.png', '["Chandelier","Cheap Thrills","Elastic Heart"]'),
(11, 'Rihanna', 'Main Stage', 'Friday', '/EchoFest/assets/images/rihanna.png', '["Diamonds","Umbrella","We Found Love"]'),
(12, 'Drake', 'Main Stage', 'Saturday', '/EchoFest/assets/images/drake.png', '["God''s Plan","Hotline Bling","One Dance"]'),
(13, 'Taylor Swift', 'Pop Stage', 'Sunday', '/EchoFest/assets/images/taylor_swift.png', '["Love Story","Blank Space","Shake It Off"]'),
(14, 'Ariana Grande', 'Main Stage', 'Saturday', '/EchoFest/assets/images/ariana_grande.png', '["7 rings","Into You","No Tears Left To Cry"]'),
(15, 'Dafina Zeqiri', 'Pop Stage', 'Friday', '/EchoFest/assets/images/dafina_zeqiri.png', '["Four Seasons","Million Dollar Baby","Bye Bye"]'),
(16, 'Ledri Vula', 'Main Stage', 'Saturday', '/EchoFest/assets/images/ledri_vula.png', '["Piano Rap","Krejt Shoket","Princess Diana"]'),
(17, 'Noizy', 'Main Stage', 'Friday', '/EchoFest/assets/images/noizy.png', '["Toto","Jena Mbreter","Big Body Benzo"]'),
(18, 'Tayna', 'Pop Stage', 'Saturday', '/EchoFest/assets/images/tayna.png', '["Columbiana","Sicko","Si ai"]'),
(19, 'Nora Istrefi', 'Pop', 'Saturday', '/EchoFest/assets/images/logo2-pabg.png', '["Ske me pa","Je vone","Bye Bye"]'),
(20, 'Kida', 'Main', 'Friday', '/EchoFest/assets/images/logo2-pabg.png', '["Ferrari","Brabus","Sillna"]')
ON DUPLICATE KEY UPDATE artist = VALUES(artist), stage = VALUES(stage), day = VALUES(day), image = VALUES(image), hits = VALUES(hits);

