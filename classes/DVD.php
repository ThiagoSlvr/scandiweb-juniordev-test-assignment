<?php

require_once 'Product.php';

/**
 * The DVD class represents a DVD product.
 */
class DVD extends Product
{
    protected $size;

    /**
     * DVD constructor.
     *
     * @param string $sku
     * @param string $name
     * @param float  $price
     * @param int    $size
     */
    public function __construct($sku, $name, $price, $size)
    {
        parent::__construct($sku, $name, $price);
        $this->setSize($size);
    }

    /**
     * Set the size of the DVD.
     *
     * @param int $size
     */
    public function setSize($size)
    {
        $this->size = $size;
    }

    /**
     * Get the size of the DVD.
     *
     * @return int
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Bind DVD-specific parameters to columns, values, and parameters arrays.
     *
     * @param array $columns
     * @param array $values
     * @param array $parameters
     */
    protected function bindProductSpecificParameters(&$columns, &$values, &$parameters)
    {
        $columns[] = 'size';
        $values[] = $this->getSize();
        $parameters[] = '?';
    }

    /**
     * Get the product type.
     *
     * @return string
     */
    protected function getProductType()
    {
        return 'DVD';
    }
}
