DROP DATABASE IF EXISTS gamestore;
CREATE DATABASE gamestore;
USE gamestore;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'user') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    image VARCHAR(255) DEFAULT 'default.jpg', 
    category ENUM('store', 'trade') DEFAULT 'store',
    stock INT DEFAULT 10,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    game_id INT NOT NULL,
    payment_method VARCHAR(50) NOT NULL,
    status VARCHAR(50) DEFAULT 'Pending',
    order_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (game_id) REFERENCES games(id) ON DELETE CASCADE
);

INSERT INTO games (title, price, description, category, image, stock) VALUES
('Grand Theft Auto V', 450000, 'Jelajahi dunia Los Santos yang luas dalam game open-world paling populer sepanjang masa. Termasuk mode online.', 'store', 'gta5.jpg', 50),
('Elden Ring', 799000, 'Game RPG Soulslike pemenang Game of The Year. Jelajahi Lands Between dan hadapi boss yang menantang.', 'store', 'eldenring.jpg', 30),
('EA SPORTS FC 24', 759000, 'Era baru sepak bola dimulai. Rasakan pengalaman bermain bola paling realistis dengan teknologi Hypermotion.', 'store', 'eafc24.jpg', 45),
('Red Dead Redemption 2', 640000, 'Kisah epik Arthur Morgan dan geng Van der Linde di penghujung era Wild West. Grafis memukau dan cerita mendalam.', 'store', 'rdr2.jpg', 25),
('Cyberpunk 2077', 699000, 'Action-adventure RPG yang berlatar di megalopolis Night City, tempat kamu bermain sebagai tentara bayaran.', 'store', 'cyberpunk.jpg', 40),
('Minecraft', 400000, 'Bangun apa saja yang kamu bayangkan, dari rumah sederhana hingga istana megah. Mainkan dalam mode kreatif atau survival.', 'store', 'minecraft.jpg', 100),
('God of War Ragnarök', 879000, 'Bergabunglah dengan Kratos dan Atreus dalam perjalanan mitologi Nordik untuk mencegah kiamat.', 'store', 'gow.jpg', 20),
('Hogwarts Legacy', 890000, 'Rasakan pengalaman menjadi murid di Hogwarts pada tahun 1800-an. Tentukan asramamu dan pelajari sihir.', 'store', 'hogwarts.jpg', 35),
('Resident Evil 4 Remake', 830999, 'Survival horror klasik yang dibuat ulang dengan grafis modern. Leon S. Kennedy harus menyelamatkan putri presiden.', 'store', 're4.jpg', 20),
('Call of Duty: MW III', 1050000, 'Sekuel langsung dari MWII. Hadapi ancaman pamungkas Vladimir Makarov dalam kampanye yang menegangkan.', 'store', 'codmw3.jpg', 50),
('Baldur\'s Gate 3', 899999, 'RPG Dungeons & Dragons generasi baru. Pilihanmu menentukan nasib dunia dalam kisah persahabatan dan pengkhianatan.', 'store', 'bg3.jpg', 15),
('Stardew Valley', 115999, 'Bangun kembali pertanian kakekmu, berteman dengan penduduk desa, dan temukan rahasia lembah. Game santai terbaik.', 'store', 'stardew.jpg', 60),
('The Witcher 3: Wild Hunt', 250000, 'Kondisi: Bekas (Mulus). Game RPG open world terbaik tentang pemburu monster Geralt of Rivia.', 'trade', 'witcher3.jpg', 1),
('Marvel\'s Spider-Man', 879000, 'Berayun melintasi kota New York sebagai Peter Parker. Lawan penjahat ikonik dalam cerita original yang emosional.', 'store', 'spiderman.jpg', 25),
('Dark Souls III', 350000, 'Kondisi: Bekas (No Box). Game action RPG yang menantang dan memuaskan bagi para penggemar tingkat kesulitan tinggi.', 'trade', 'darksouls3.jpg', 1);


INSERT INTO users (name, email, password, role) VALUES 
('Admin', 'admin@gamestore.com', 'admin123', 'admin');
