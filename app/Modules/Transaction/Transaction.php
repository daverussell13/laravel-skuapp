<?php

namespace App\Modules\Transaction;

class Transaction
{
    public $id;
    public $user_id;
    public $user_name;
    public $total_price;
    public $time;

    public function __construct(
        $id,
        $user_id,
        $user_name,
        $total_price,
        $transaction_time,
    )
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->user_name = $user_name;
        $this->total_price = $total_price;
        $this->time = $transaction_time;
    }
}



