<?php

namespace App\Modules\Transaction;

class TransactionDetails
{
    public $quantity;
    public $food_name;
    public $food_price;

    public function __construct(
        $quantity,
        $food_name,
        $food_price
    )
    {
        $this->quantity = $quantity;
        $this->food_name = $food_name;
        $this->food_price = $food_price;
    }
}



