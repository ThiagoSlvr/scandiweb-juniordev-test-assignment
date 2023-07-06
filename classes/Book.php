<?php

require_once 'Product.php';

/**
 * The Book class represents a book product.
 */
class Book extends Product
{
    protected $weight;

    /**
     * Book constructor.
     *
     * @param string $sku
     * @param string $name
     * @param float  $price
     * @param float  $weight
     */
    public function __construct($sku, $name, $price, $weight)
    {
        parent::__construct($sku, $name, $price);
        $this->setWeight($weight);
    }

    /**
     * Set the weight of the book.
     *
     * @param float $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * Get the weight of the book.
     *
     * @return float
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Bind book-specific parameters to columns, values, and parameters arrays.
     *
     * @param array $columns
     * @param array $values
     * @param array $parameters
     */
    protected function bindProductSpecificParameters(&$columns, &$values, &$parameters)
    {
        $columns[] = 'weight';
        $values[] = $this->getWeight();
        $parameters[] = '?';
    }

    /**
     * Get the product type.
     *
     * @return string
     */
    protected function getProductType()
    {
        return 'Book';
    }
}
