<?php 
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use ShoppingCart\Products;
use ShoppingCart\ProductsView;
use ShoppingCart\ShoppingCartController;

final class ShoppingCartTest extends TestCase
{
    public function testCanInstanceOfClass(): void
    {
        $products = new Products();
        $cart = new ShoppingCartController($products,'GBP');
        $this->assertInstanceOf(ShoppingCartController::class,$cart);
    }

    public function testTotal(): void
    {
        $products = new Products();
        $cart = new ShoppingCartController($products,'GBP');
        $cart->addProduct(1); //190.50
        $cart->addProduct(2); //562.131
        $cart->setTotal();
        $this->assertEquals($_SESSION['total'],752.631);    
    }

    public function testAddProduct(): void
    {
        $products = new Products();
        $cart = new ShoppingCartController($products,'GBP');
        $cart->addProduct(1);
        $cart->addProduct(2);
        $this->assertEquals(count($_SESSION['cart']),2);
    }

    public function testRemoveProduct(): void
    {
        $products = new Products();
        $cart = new ShoppingCartController($products,'GBP');
        $cart->addProduct(1);
        $cart->addProduct(2);
        $cart->addProduct(3);
        $cart->removeProduct(1);
        $this->assertEquals(count($_SESSION['cart']),2);
    }

    public function testAddSameProduct(): void
    {
        $products = new Products();
        $cart = new ShoppingCartController($products,'GBP');
        $cart->addProduct(5);
        $cart->addProduct(5);
        $quantity = $_SESSION['cart'][5]['quantity'];
        $this->assertEquals($quantity,2);
    }

    public function testPriceDecimalPlaces(): void
    {
        $products = new Products();
        $products_view = new ProductsView('products',$products);
        $num = 12.3;
        $this->assertEquals(strlen(substr(strrchr($products_view->toTwoDecimalPlaces($num), "."), 1)),2);
    }
}
