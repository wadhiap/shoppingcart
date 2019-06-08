<?php

namespace ShoppingCart;

/**
 * Products View class
 * 
 * The class will display the shopping cart
 */
class ShoppingCartView
{
    /**
     * Specify the currency formatting trait
     */
    use CurrencyFormat;

    /**
     * Variable to hold template filename
     *
     * @var string
     */
    private $template;

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
        $main_template = file_get_contents('../src/'.$this->template.'_main_template.php');
        $content = '';
        if (count($_SESSION['cart']) == 0) {
            $content = "<p id=\"cart-message\">Your cart is empty</p>";
        } else {
            foreach ($_SESSION['cart'] as $k => $v) {  
                $p = $this->products->getProduct($k);
                $price = $this->toTwoDecimalPlaces($p['price']);
                $total = $this->toTwoDecimalPlaces($p['price'] * $v['quantity']);
                ob_start();
                include $this->template.'_template.php';
                $content .= ob_get_clean();
            }
        }
        $content = str_replace('@rows',$content,$main_template);
        $content = str_replace('@total',$this->toTwoDecimalPlaces($_SESSION['total']),$content);
        return $content;
    }

    /**
     * Function to render messages to the user
     *
     * @return string
     */
    public function renderMsg()
    {
        $class = '';
        if (isset($_SESSION['msg_type'])) {
            switch ($_SESSION['msg_type']) {
                case 0:
                    $class = 'msgerror';
                    $msg = 'Error! That product doesn\'t exist.';
                    break;
                case 1:
                    $class = 'msgsuccess';
                    $msg = 'Success! Product has been added to your cart.';
                    break;
                case 2:
                    $class = 'msgsuccess';
                    $msg = 'Success! Product has been removed from your cart.';
                    break;
                case 3:
                    $class = 'msgerror';
                    $msg = 'Error! That action is invalid.';
                    break;
            }
            unset($_SESSION['msg_type']);
            return "<div id=\"messages\" class=\"".$class."\">".htmlspecialchars($msg)."</div>";           
        }
    }
}