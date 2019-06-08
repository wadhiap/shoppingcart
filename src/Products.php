<?php

namespace ShoppingCart; 

/**
 * The main Products Class
 */
class Products
{
    /**
     * Products variable
     *
     * @var array
     */
    public $products = array();

    /**
     * Main constructor
     */
    public function __construct()
    {
        $this->products = [
            [ "name" => "Sega Genesis", "price" => 125.75, "img" => "61b6NxmH1rL._AC_UL654_QL65_.jpg" ],
            [ "name" => "PSP (White)", "price" => 190.50, "img" => "61oyQz0PeuL._AC_UL654_QL65_.jpg" ],
            [ "name" => "PSP (Black)", "price" => 562.131, "img" => "61u9wCn3gzL._AC_UL654_QL65_.jpg" ],
            [ "name" => "PS4", "price" => 12.9, "img" => "61xZUTMBbZL._AC_UL654_QL65_.jpg" ],
            [ "name" => "Snes Mini", "price" => 18.45, "img" => "81dKE5hBovL._AC_UL654_QL65_.jpg" ],
            [ "name" => "Nintendo Switch", "price" => 125.75, "img" => "81nn7QDJFeL._AC_UL654_QL65_.jpg" ],
            [ "name" => "Barcade", "price" => 190.50, "img" => "619n3ivAA7L._AC_UL654_QL65_.jpg" ],
            [ "name" => "XBOX One S", "price" => 562.131, "img" => "719v8kEUILL._AC_UL654_QL65_.jpg" ],
            [ "name" => "Nes Mini", "price" => 12.9, "img" => "811fdqvzKIL._AC_UL654_QL65_.jpg" ],
            [ "name" => "Nintendo DS XL", "price" => 18.45, "img" => "911x0kSME7L._AC_UL654_QL65_.jpg" ]
        ];
    }
    
    /**
     * Function to get all products
     *
     * @return array
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Function to get single products
     *
     * @param int $id
     * @return array
     */
    public function getProduct($id)
    {
            return $this->products[$id];
    }
}
