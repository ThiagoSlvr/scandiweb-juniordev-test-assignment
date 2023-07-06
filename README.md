# Introduction

Welcome to my Scandiweb Junior Developer test assignment!
This project represents my interpretation of the assignment requirements, showcasing my skills in PHP and MySQL web development.
I hope you enjoy reviewing my work and assessing my potential as a Junior Developer. Thank you for considering my submission!

## General Information

This web application consists of two pages: Product List page and Adding a Product page. The application is developed using PHP, MySQL, and follows the OOP (Object-Oriented Programming) principles.

## Features

- View a list of products with details such as SKU, Name, Price, and additional type-specific information.
- Add new products with different types (DVD, Book, Furniture) and their respective attributes.
- Perform a mass delete operation on selected products.

## Database

The MySQL database uses the following table schema:

```sql
products (
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
```

## Requirements

- PHP: ^7.0
- MySQL: ^5.6

## Installation

1. Clone the repository or download the source code.
2. Import the database structure from `database.sql` into your MySQL database.
3. Configure the database connection settings in `DatabaseManager.php`.
4. Upload the files to your web server.
5. Open the application in your web browser.

## File Structure

- `classes/`: Contains PHP classes for different product types.
- `css/styles.css`: CSS styles for the application.
- `js/script.js`: JavaScript/jQuery code for handling dynamic functionality.
- `index.php`: Displays the list of products and provides add/delete functionality.
- `add-product.php`: Allows users to add new products.
- `delete.php`: Handles the mass delete operation.



## Developed by: Thiago Chim Silvera
