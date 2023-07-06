<?php
require_once 'classes/Product.php';
require_once 'classes/DVD.php';
require_once 'classes/Furniture.php';
require_once 'classes/Book.php';

/**
 * Product Add Page
 *
 * This page allows users to add new products to the database. It handles the form submission, validates the form data,
 * creates the appropriate product object based on the selected type, and saves the product to the database.
 */

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $sku = $_POST['sku'] ?? '';
    $name = $_POST['name'] ?? '';
    $price = $_POST['price'] ?? '';
    $productType = $_POST['productType'] ?? '';

    // Validate form data
    if (empty($sku)) {
        $errors[] = 'Please enter SKU';
    }

    if (empty($name)) {
        $errors[] = 'Please enter Name';
    }

    if (empty($price)) {
        $errors[] = 'Please enter Price';
    }

    // Create the appropriate product object based on the selected type
    switch ($productType) {
        case 'DVD':
            $size = $_POST['size'] ?? '';
            $product = new DVD($sku, $name, $price, $size);
            break;
        case 'Book':
            $weight = $_POST['weight'] ?? '';
            $product = new Book($sku, $name, $price, $weight);
            break;
        case 'Furniture':
            $height = $_POST['height'] ?? '';
            $width = $_POST['width'] ?? '';
            $length = $_POST['length'] ?? '';
            $product = new Furniture($sku, $name, $price, $height, $width, $length);
            break;
        default:
            $errors[] = 'Please select a valid Product Type';
            break;
    }

    // If no errors, save the product to the database
    if (empty($errors)) {
        $product->saveToDatabase();
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Add</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>

    <form id="product_form" action="" method="post">

        <div class="top-container">
            <h1 id="h1-title">Product Add</h1>
            <div class="button-container">
                <button class="submit-btn" type="submit">Save</button>
                <a class="cancel-btn" href="index.php">Cancel</a>
            </div>
        </div>

        <hr>

        <div class="input-group">
            <label for="sku">SKU:</label>
            <input type="text" id="sku" name="sku" placeholder="Please provide a product SKU" required>
        </div>
        <div class="input-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Please provide a product Name" required>
        </div>
        <div class="input-group">
            <label for="price">Price:</label>
            <input type="text" id="price" name="price" placeholder="Please provide a product Price" required>
        </div>

        <div class="type-switcher">
            <label for="productType">Product Type:</label>
            <select id="productType" name="productType">
            <option value="">Select Type</option>
            <option value="DVD">DVD</option>
            <option value="Book">Book</option>
            <option value="Furniture">Furniture</option>
            </select>
        </div>

        <div class="typeFields" id="dvdFields">
            <div class="input-group">
                <label for="size">Size (MB):</label>
                <input type="text" id="size" name="size" placeholder="Please provide size in megabytes (MB)">
            </div>
            <span class="prod-description">Please provide DVD size in megabytes (MB)</span>
        </div>
        <div class="typeFields" id="bookFields">
            <div class="input-group">
                <label for="weight">Weight (KG):</label>
                <input type="text" id="weight" name="weight" placeholder="Please provide weight in kilograms (KG)">
            </div>
            <span class="prod-description">Please provide Book weight in kilograms (KG)</span>
        </div>
        <div class="typeFields" id="furnitureFields">
            <div class="input-group">
                <label for="height">Height (CM):</label>
                <input type="text" id="height" name="height" placeholder="Please provide height in centimeters (CM)">
            </div>
            <div class="input-group">
                <label for="width">Width (CM):</label>
                <input type="text" id="width" name="width" placeholder="Please provide width in centimeters (CM)">
            </div>
            <div class="input-group">
                <label for="length">Length (CM):</label>
                <input type="text" id="length" name="length" placeholder="Please provide length in centimeters (CM)">
            </div>
            <span class="prod-description">Please provide Furniture dimensions in centimeters (CM)</span>
        </div>
    </form>

    <hr>

    <div class="footer">
        <p>Scandiweb Test Assignment</p>
    </div>

    <script src="js/script.js"></script>
</body>

</html>