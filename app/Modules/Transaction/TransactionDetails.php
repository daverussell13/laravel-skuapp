<?php

namespace App\Modules\Transaction;

class TransactionDetails
{
    public $quantity;
    public $food_name;
    public $food_weight;
    public $food_price;

    public function __construct(
        $quantity,
        $food_name,
        $food_weight,
        $food_price
    )
    {
        $this->quantity = $quantity;
        $this->food_name = $food_name;
        $this->food_weight = $food_weight;
        $this->food_price = $food_price;
    }
}



