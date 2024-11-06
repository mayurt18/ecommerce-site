
CREATE DATABASE IF NOT EXISTS ecommerce_db;
USE ecommerce_db;


CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);


INSERT INTO users (username, password) VALUES ('admin', SHA2('adminpassword', 256));


CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    category VARCHAR(50),
    image VARCHAR(255),
    stock INT DEFAULT 0
);


INSERT INTO products (name, description, price, category, image, stock) VALUES
('Apple iPhone 13', 'The latest iPhone with a stunning display and powerful camera.', 999.99, 'Electronics', 'iphone13.jpg', 10),
('Samsung Galaxy S21', 'High-performance Android phone with excellent battery life.', 899.99, 'Electronics', 'galaxys21.jpg', 8),
('Sony WH-1000XM4', 'Noise-canceling headphones with superior sound quality.', 349.99, 'Audio', 'sonyheadphones.jpg', 15);


CREATE TABLE IF NOT EXISTS cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    quantity INT DEFAULT 1,
    session_id VARCHAR(255),
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    session_id VARCHAR(255),
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total DECIMAL(10, 2)
);
