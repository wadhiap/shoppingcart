<?php

namespace ShoppingCart;

/**
 * Products view class
 * 
 * The class will display products
 */
class ProductsView
{
    /**
     * specify the currency formatting trait
     */
    use CurrencyFormat;

    /**
     * Variable to hold template filename
     *
     * @var string
     */
    private $template;

    /**
     * Variable to hold main Products object/model
     *
     * @var Products
     */
    private $products;

    /**
     * Main constructor
     *
     * @param string $template
     * @param Products $products
     */
    function __construct($template, Products $products)
    {
        $this->template = $template;
        $this->products = $products;
    }

    /**
     * Function to render the output using template files
     *
     * @return string
     */
    public function render()
    {
        $content = '';
        foreach ($this->products->getProducts() as $k => $p) {  
            $price = $this->toTwoDecimalPlaces($p['price']);
            ob_start();
            include $this->template.'_template.php';
            $content .= ob_get_clean();
        }
        return $content;
    }
}