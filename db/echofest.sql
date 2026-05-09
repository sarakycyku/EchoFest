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

INSERT INTO tickets (id, img_class, img_src, name, description, price, available, coming_date, sort_order) VALUES
('early', 'img-early', '/EchoFest/assets/images/ticket1.jpg', 'Early Bird', 'Lock in the best price and be among the first to experience EchoFest! Early Bird tickets give you full access to all main stages and performances. Perfect for the dedicated music fan who plans ahead. These limited tickets won''t last long, so grab yours now and save big while securing your spot at the biggest festival of the summer.', 79, 1, NULL, 1),
('regular', 'img-regular', '/EchoFest/assets/images/ticket2.jpg', 'Regular', 'The complete festival experience with added perks! Skip the long lines with fast-track entry and enjoy complimentary water refills throughout the day. Regular tickets include access to all stages plus special areas not available to Early Bird holders. Get ready for three days of non-stop music, amazing vibes, and memories that will last forever.', 129, 0, 'Coming May 1, 2026', 2),
('vip', 'img-vip', '/EchoFest/assets/images/ticket3.jpg', 'VIP Experience', 'Live like a rockstar with our exclusive VIP package! Enjoy premium viewing areas with the best sightlines, relax in air-conditioned VIP lounges, and indulge in complimentary gourmet food and premium drinks. Meet your favorite artists, access private restrooms, and receive an exclusive merchandise pack. This is the ultimate festival experience for those who demand the very best.', 299, 0, 'Coming June 1, 2026', 3)
ON DUPLICATE KEY UPDATE img_class = VALUES(img_class), img_src = VALUES(img_src), name = VALUES(name), description = VALUES(description), price = VALUES(price), available = VALUES(available), coming_date = VALUES(coming_date), sort_order = VALUES(sort_order);

INSERT INTO events (id, title, event_date, event_time, location, stage, description, artist, image, category) VALUES
('djsnake-ks', 'Midnight Bass Takeover', 'July 15, 2026', '21:00 - 23:00', 'Pristina', 'Main Stage', 'DJ Snake brings heavy bass, lights and festival energy to the Main Stage.', 'DJ Snake', '/EchoFest/assets/images/dj_snake.png', 'electronic'),
('ritaora-ks', 'Pop Lights & Neon Dreams', 'July 15, 2026', '19:00 - 20:30', 'Pristina', 'Pop Stage', 'Rita Ora performs a colorful pop show filled with neon visuals and hit songs.', 'Rita Ora', '/EchoFest/assets/images/rita_ora.png', 'pop'),
('billieeilish-ks', 'Dark Echoes Experience', 'July 15, 2026', '23:30 - 01:00', 'Pristina', 'Main Stage', 'Billie Eilish creates a dark, emotional and cinematic live atmosphere.', 'Billie Eilish', '/EchoFest/assets/images/billie_eilish.png', 'pop'),
('davidguetta-ks', 'Electric Pulse Night', 'July 15, 2026', '23:00 - 01:30', 'Pristina', 'EDM Stage', 'David Guetta turns the EDM Stage into a powerful electric party.', 'David Guetta', '/EchoFest/assets/images/david_guetta.png', 'electronic'),
('dualipa-ks', 'Future Rhythm Show', 'July 16, 2026', '22:00 - 23:30', 'Pristina', 'Main Stage', 'Dua Lipa performs a futuristic pop show full of rhythm and movement.', 'Dua Lipa', '/EchoFest/assets/images/dua_lipa.png', 'pop'),
('theweeknd-ks', 'After Midnight Vibes', 'July 16, 2026', '23:45 - 01:15', 'Pristina', 'Main Stage', 'The Weeknd brings late-night atmosphere, lights and emotional vocals.', 'The Weeknd', '/EchoFest/assets/images/weeknd.png', 'pop'),
('edsheeran-ks', 'Strings & Stories Session', 'July 16, 2026', '19:00 - 20:30', 'Pristina', 'Acoustic Stage', 'Ed Sheeran performs an intimate acoustic session with guitar and storytelling.', 'Ed Sheeran', '/EchoFest/assets/images/ed_sheeran.png', 'acoustic'),
('martingarrix-ks', 'Festival Energy Peak', 'July 17, 2026', '21:00 - 23:00', 'Pristina', 'EDM Stage', 'Martin Garrix brings the highest energy moment of the festival weekend.', 'Martin Garrix', '/EchoFest/assets/images/martin_garrix.png', 'electronic'),
('calvinharris-ks', 'Summer Sound Finale', 'July 17, 2026', '23:30 - 01:30', 'Pristina', 'EDM Stage', 'Calvin Harris closes the night with summer hits and festival fireworks.', 'Calvin Harris', '/EchoFest/assets/images/calvin_harris.png', 'electronic'),
('sia-ks', 'Voices of Emotion', 'July 17, 2026', '19:30 - 21:00', 'Pristina', 'Pop Stage', 'Sia delivers a powerful emotional vocal performance.', 'Sia', '/EchoFest/assets/images/sia.png', 'pop'),
('djsnake-al', 'Beach Bass Explosion', 'August 5, 2026', '22:00 - 00:00', 'Durres', 'Beach Stage', 'DJ Snake opens the beach edition with explosive bass and seaside energy.', 'DJ Snake', '/EchoFest/assets/images/dj_snake.png', 'electronic'),
('ritaora-al', 'Homecoming Pop Night', 'August 5, 2026', '20:00 - 21:30', 'Durres', 'Arena Stage', 'Rita Ora performs a special pop night with Albanian pride and energy.', 'Rita Ora', '/EchoFest/assets/images/rita_ora.png', 'pop'),
('billieeilish-al', 'Ocean Mood Experience', 'August 5, 2026', '23:30 - 01:00', 'Durres', 'Arena Stage', 'Billie Eilish brings a deep, moody seaside performance.', 'Billie Eilish', '/EchoFest/assets/images/billie_eilish.png', 'pop'),
('davidguetta-al', 'Midnight Beach Party', 'August 5, 2026', '00:30 - 02:30', 'Durres', 'Beach Stage', 'David Guetta turns the beach into a midnight EDM party.', 'David Guetta', '/EchoFest/assets/images/david_guetta.png', 'electronic'),
('dualipa-al', 'Neon Waves Show', 'August 6, 2026', '22:00 - 23:30', 'Durres', 'Arena Stage', 'Dua Lipa performs a neon-inspired show near the waves.', 'Dua Lipa', '/EchoFest/assets/images/dua_lipa.png', 'pop'),
('theweeknd-al', 'Night Lights Experience', 'August 6, 2026', '23:45 - 01:15', 'Durres', 'Arena Stage', 'The Weeknd creates a night show with lights, emotion and atmosphere.', 'The Weeknd', '/EchoFest/assets/images/weeknd.png', 'pop'),
('edsheeran-al', 'Sunset Acoustic Vibes', 'August 6, 2026', '19:00 - 20:30', 'Durres', 'Sunset Terrace', 'Ed Sheeran performs acoustic songs during sunset by the sea.', 'Ed Sheeran', '/EchoFest/assets/images/ed_sheeran.png', 'acoustic'),
('martingarrix-al', 'Final Drop Experience', 'August 7, 2026', '21:00 - 23:00', 'Durres', 'Beach Stage', 'Martin Garrix delivers one of the final EDM drops of EchoFest Albania.', 'Martin Garrix', '/EchoFest/assets/images/martin_garrix.png', 'electronic'),
('calvinharris-al', 'Ultimate Beach Finale', 'August 7, 2026', '23:30 - 01:30', 'Durres', 'Beach Stage', 'Calvin Harris closes the beach festival with a massive final show.', 'Calvin Harris', '/EchoFest/assets/images/calvin_harris.png', 'electronic'),
('sia-al', 'Echoes of Farewell', 'August 7, 2026', '19:30 - 21:00', 'Durres', 'Arena Stage', 'Sia gives an emotional farewell performance to close the festival mood.', 'Sia', '/EchoFest/assets/images/sia.png', 'pop')
ON DUPLICATE KEY UPDATE title = VALUES(title), event_date = VALUES(event_date), event_time = VALUES(event_time), location = VALUES(location), stage = VALUES(stage), description = VALUES(description), artist = VALUES(artist), image = VALUES(image), category = VALUES(category);
