CREATE DATABASE IF NOT EXISTS game_collection;
USE game_collection;

CREATE TABLE IF NOT EXISTS games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    platform VARCHAR(100) NOT NULL,
    release_year INT NOT NULL,
    rating DECIMAL(3,1) DEFAULT 0.0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO games (title, genre, platform, release_year, rating) VALUES
('The Witcher 3', 'RPG', 'PC, PS4, Xbox', 2015, 9.5),
('God of War', 'Action-Adventure', 'PS4, PS5, PC', 2018, 9.3),
('Minecraft', 'Sandbox', 'Multi-platform', 2011, 9.0);