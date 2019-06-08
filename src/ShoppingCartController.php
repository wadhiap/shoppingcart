<?php

namespace ShoppingCart; 

/**
 * Shopping Cart Controller
 * 
 * The class will handle the updating the cart
 */
class ShoppingCartController
{
    /**
     * Variable to hold Products model
     *
     * @var Products
     */
    public $products;

    /**
     * Main constructor
     * 
     * Will initialise the cart in session if needed 
     */
    function __construct($products,$currency)
    {
        if (!isset($_SESSION['cart'])) {  
            $_SESSION['cart'] = array();
            $_SESSION['currency'] = $currency;
            $_SESSION['total'] = 0;
        }
        $this->products = $products;
    }

    /**
     * Function to update the cart based on user interaction
     *
     * @param array $get
     * @return void
     */
    public function updateCart($get)
    {
        $productid = htmlspecialchars($get['id']);
        switch ($get['do']) {
            case "productadd":
                $this->addProduct($productid);
                break;
            case "productremove":
                $this->removeProduct($productid);
                break;
            default:
                $this->addMsg(3); // invalid action
        }
    }

    /**
     * Function to add product to cart
     *
     * @param int $id
     * @return void
     */
    public function addProduct($id) 
    {
        if (isset($this->products->products[$id])) {
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity'] = $_SESSION['cart'][$id]['quantity'] + 1;
            } else {
                $_SESSION['cart'][$id]['quantity'] = 1;
            }
            $this->addMsg(1);
            $this->setTotal();

        } else {
            $this->addMsg(0);
        }
    }

    /**
     * Function to remove product from cart
     *
     * @param int $id
     * @return void
     */
    public function removeProduct($id)
    {
        unset($_SESSION['cart'][$id]);
        $this->setTotal();
        $this->addMsg(2);
    }

    /**
     * Function to set message type
     *
     * @param int $id
     * @return void
     */
    public function addMsg($id)
    {
        $_SESSION['msg_type'] = $id;
    }

    /**
     * Function to set cart total
     *
     * @return void
     */
    public function setTotal()
    {
        $total = 0;
        foreach ($_SESSION['cart'] as $k => $v) {
           $total = $total + ($this->products->products[$k]['price'] * $v['quantity']);
        }
        $_SESSION['total'] = $total;
    }
}
