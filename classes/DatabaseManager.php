<?php

/**
 * DatabaseManager class handles the database connection.
 */
class DatabaseManager
{
    private static $pdo;

    /**
     * Get the PDO instance for database connection.
     *
     * @return PDO
     */
    public static function getPdo()
    {
        if (!isset(self::$pdo)) {
            $host = 'localhost';
            $username = 'root';
            $password = '';
            $database = 'products_db';

            try {
                self::$pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection error: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
