<?php
require_once 'classes/Product.php';

// This script handles the deletion of selected products from the database

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
    // Get the selected product IDs from the request
    $selectedProducts = $_POST['products'];

    try {
        $pdo = DatabaseManager::getPdo();

        // Prepare the delete statement with placeholders for the selected product IDs
        $placeholders = implode(',', array_fill(0, count($selectedProducts), '?'));

        $sql = "DELETE FROM products WHERE id IN ($placeholders)";
        $stmt = $pdo->prepare($sql);

        // Bind the product IDs to the placeholders
        $stmt->execute($selectedProducts);

        // Return a success response
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        // Handle any database errors
        echo json_encode(['error' => $e->getMessage()]);
    }
}