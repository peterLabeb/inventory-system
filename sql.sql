CREATE DATABASE IF NOT EXISTS inventory_db;
USE inventory_db;

CREATE TABLE IF NOT EXISTS items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL DEFAULT 0
);

INSERT INTO items (name, quantity) VALUES
('ورق طباعة', 10),
('بامبرز', 50),
('ألعاب أطفال', 100);