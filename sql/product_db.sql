CREATE DATABASE IF NOT EXISTS products_db;
USE products_db;


CREATE TABLE IF NOT EXISTS products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sku VARCHAR(255) NOT NULL UNIQUE,
  name VARCHAR(255) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  type ENUM('DVD', 'Book', 'Furniture') NOT NULL,
  size INT,
  weight DECIMAL(10, 2),
  height INT,
  width INT,
  length INT
);


INSERT INTO products (sku, name, price, type, size) VALUES ('D101', 'The Godfather DVD', 10.99, 'DVD', 700);
INSERT INTO products (sku, name, price, type, size) VALUES ('D102', 'The Shawshank Redemption', 12.99, 'DVD', 1700);
INSERT INTO products (sku, name, price, type, size) VALUES ('D103', 'The Lord of the Rings: The Fellowship of the Ring', 19.99, 'DVD', 1000);
INSERT INTO products (sku, name, price, type, size) VALUES ('D104', 'The Matrix', 12.99, 'DVD', 700);
INSERT INTO products (sku, name, price, type, size) VALUES ('D105', 'Inception', 9.99, 'DVD', 900);

INSERT INTO products (sku, name, price, type, weight) VALUES ('B201', 'To Kill a Mockingbird', 8.99, 'Book', 0.45);
INSERT INTO products (sku, name, price, type, weight) VALUES ("B202", '1984', 8.99, 'Book', 0.6);
INSERT INTO products (sku, name, price, type, weight) VALUES ("B203", 'The Catcher in the Rye', 7.99, 'Book', 0.4);
INSERT INTO products (sku, name, price, type, weight) VALUES ("B204", 'Harry Potter and the Philosopher''s Stone', 14.99, 'Book', 1.2);
INSERT INTO products (sku, name, price, type, weight) VALUES ("B205", 'To Kill a Mockingbird', 9.99, 'Book', 0.8);

INSERT INTO products (sku, name, price, type, height, width, length) VALUES ("F301", 'Chest of Drawers', 199.99, 'Furniture', 120, 80, 60);
INSERT INTO products (sku, name, price, type, height, width, length) VALUES ("F302", 'Sofa Bed', 299.99, 'Furniture', 80, 180, 110);
INSERT INTO products (sku, name, price, type, height, width, length) VALUES ("F303", 'Wardrobe', 499.99, 'Furniture', 200, 150, 60);
INSERT INTO products (sku, name, price, type, height, width, length) VALUES ("F304", 'Sofa', 399.99, 'Furniture', 90, 150, 180);