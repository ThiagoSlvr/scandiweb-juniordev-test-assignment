<?php
require_once 'classes/Product.php';
require_once 'delete.php';

/**
 * Product List Page
 *
 * This page displays a list of products retrieved from the database. It allows users to add new products
 * and perform a mass delete operation on selected products using AJAX.
 */

// Retrieve the products from the database
$products = Product::getAllProducts();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product List</title>
    <!-- Include any necessary CSS files -->
    <link rel="stylesheet" href="css/styles.css">
    <!-- Include jQuery library (if needed) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include custom JavaScript/jQuery (if needed) -->
    <script src="js/script.js"></script>
</head>
<body>
    <div class="top-container">
        <h1 id="h1-title">Product List</h1>

        <!-- ADD and MASS DELETE buttons -->
        <div class="button-container">
            <button id="add-product-btn">ADD</button>
            <button id="delete-product-btn">MASS DELETE</button>
        </div>
    </div>

    <hr>

    <!-- Product List -->
    <div class="product-list">
        <?php foreach ($products as $product) : ?>
            <div class="product">
                <input type="checkbox" class="delete-checkbox" value="<?php echo $product['id']; ?>">
                <div class="product-info">
                    <span class="product-sku"><?php echo $product['sku']; ?></span>
                    <span class="product-name"><?php echo $product['name']; ?></span>
                    <span class="product-price"><?php echo $product['price']; ?></span>
                    <?php if ($product['type'] === 'DVD') : ?>
                        <span class="product-type">Size: <?php echo $product['size']; ?> MB</span>
                    <?php elseif ($product['type'] === 'Book') : ?>
                        <span class="product-type">Weight: <?php echo $product['weight']; ?> KG</span>
                    <?php elseif ($product['type'] === 'Furniture') : ?>
                        <span class="product-type">Dimensions: <?php echo $product['height']; ?>x<?php echo $product['width']; ?>x<?php echo $product['length']; ?></span>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <hr>

    <div class="footer">
        <p>Scandiweb Test Assignment</p>
    </div>

    <!-- JavaScript/jQuery code -->
    <script>
         // Add button click event handler
        $('#add-product-btn').on('click', function() {
            // Redirect to the add-product page
            window.location.href = 'add-product.php';
        });
        // Delete button click event handler
        $('#delete-product-btn').on('click', function() {
            // Get the selected products' IDs using the checkboxes
            var selectedProducts = $('.delete-checkbox:checked').map(function() {
                return $(this).val();
            }).get();

            // Make an AJAX request to delete the selected products
            $.ajax({
                url: 'delete.php',
                method: 'POST',
                data: { products: selectedProducts, delete: true },
                success: function(response) {
                    // Handle the success response
                    setTimeout(function() {
                        location.reload();
                        // Resume interacting with elements here
                    }, 100); // Adjust the delay as needed
                },
            });
        });
    </script>
</body>
</html>
