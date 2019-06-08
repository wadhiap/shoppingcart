<?php

namespace ShoppingCart; 

/**
 * Generic Trait to format currency values
 */
trait CurrencyFormat
{
    public function toTwoDecimalPlaces($num)
    {
        return $_SESSION['currency'].number_format((float)$num, 2, '.', '');
    }
}
