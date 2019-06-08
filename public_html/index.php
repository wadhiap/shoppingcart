<?php

namespace ShoppingCart; 

require "../vendor/autoload.php";

session_start();
//session_unset();

$products = new Products();
$products_view = new ProductsView('products',$products);
$cart_controller = new ShoppingCartController($products,'GBP');
$cart_view = new ShoppingCartView('shopping_cart',$products);

if (isset($_GET['do'])) { 
    $cart_controller->updateCart($_GET);
    header('location: '.$_SERVER['PHP_SELF']);
	exit;
}

include('../src/main_template.php');





