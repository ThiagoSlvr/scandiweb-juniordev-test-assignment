<?php

require_once 'Product.php';

/**
 * The Furniture class represents a furniture product.
 */
class Furniture extends Product
{
    protected $height;
    protected $width;
    protected $length;

    /**
     * Furniture constructor.
     *
     * @param string $sku
     * @param string $name
     * @param float  $price
     * @param int    $height
     * @param int    $width
     * @param int    $length
     */
    public function __construct($sku, $name, $price, $height, $width, $length)
    {
        parent::__construct($sku, $name, $price);
        $this->setDimensions($height, $width, $length);
    }

    /**
     * Set the dimensions of the furniture.
     *
     * @param int $height
     * @param int $width
     * @param int $length
     */
    public function setDimensions($height, $width, $length)
    {
        $this->height = $height;
        $this->width = $width;
        $this->length = $length;
    }

    /**
     * Get the dimensions of the furniture.
     *
     * @return array
     */
    public function getDimensions()
    {
        return [
            'height' => $this->height,
            'width' => $this->width,
            'length' => $this->length
        ];
    }

    /**
     * Bind furniture-specific parameters to columns, values, and parameters arrays.
     *
     * @param array $columns
     * @param array $values
     * @param array $parameters
     */
    protected function bindProductSpecificParameters(&$columns, &$values, &$parameters)
    {
        $columns[] = 'height';
        $columns[] = 'width';
        $columns[] = 'length';
        $values[] = $this->getDimensions()['height'];
        $values[] = $this->getDimensions()['width'];
        $values[] = $this->getDimensions()['length'];
        $parameters[] = '?';
        $parameters[] = '?';
        $parameters[] = '?';
    }

    /**
     * Get the product type.
     *
     * @return string
     */
    protected function getProductType()
    {
        return 'Furniture';
    }
}
