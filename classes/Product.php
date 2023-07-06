<?php

require_once 'DatabaseManager.php';

/**
 * The abstract Product class represents a generic product.
 */
abstract class Product
{
    protected $sku;
    protected $name;
    protected $price;

    /**
     * Product constructor.
     *
     * @param string $sku
     * @param string $name
     * @param float  $price
     */
    public function __construct($sku, $name, $price)
    {
        $this->setSku($sku);
        $this->setName($name);
        $this->setPrice($price);
    }

    /**
     * Set the SKU of the product.
     *
     * @param string $sku
     */
    public function setSku($sku)
    {
        $this->sku = $sku;
    }

    /**
     * Get the SKU of the product.
     *
     * @return string
     */
    public function getSku()
    {
        return $this->sku;
    }

    /**
     * Set the name of the product.
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get the name of the product.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the price of the product.
     *
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get the price of the product.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get all products from the database.
     *
     * @return array
     */
    public static function getAllProducts()
    {
        try {
            $pdo = DatabaseManager::getPdo();
            $sql = "SELECT * FROM products ORDER BY id";
            $stmt = $pdo->query($sql);
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        } catch (PDOException $e) {
            die("Error retrieving products: " . $e->getMessage());
        }
    }

    /**
     * Save the product to the database.
     */
    public function saveToDatabase()
    {
        try {
            $pdo = DatabaseManager::getPdo();

            $tableName = 'products';
            $columns = ['sku', 'name', 'price', 'type'];
            $values = [$this->getSku(), $this->getName(), $this->getPrice(), $this->getProductType()];
            $parameters = ['?', '?', '?', '?'];

            $this->bindProductSpecificParameters($columns, $values, $parameters);

            $columnsStr = implode(', ', $columns);
            $parametersStr = implode(', ', $parameters);

            $query = "INSERT INTO $tableName ($columnsStr) VALUES ($parametersStr)";

            $stmt = $pdo->prepare($query);

            $stmt->execute($values);

            header('Location: index.php');
            exit();
        } catch (PDOException $e) {
            $errors[] = 'Error saving product: ' . $e->getMessage();
            // Handle the error or display an error message
        } finally {
            if (isset($errors)) {
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
            }
        }
    }

    /**
     * Bind product-specific parameters to columns, values, and parameters arrays.
     *
     * @param array $columns
     * @param array $values
     * @param array $parameters
     */
    abstract protected function bindProductSpecificParameters(&$columns, &$values, &$parameters);

    /**
     * Get the product type.
     *
     * @return string
     */
    abstract protected function getProductType();

}
