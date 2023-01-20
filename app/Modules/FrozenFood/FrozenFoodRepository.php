<?php

namespace App\Modules\FrozenFood;

use Illuminate\Support\Facades\DB;

class FrozenFoodRepository
{
    private $tableName = "foods";

    public function selectAllFrozenFood()
    {
        $result = DB::select("SELECT * FROM $this->tableName");
        return $result;
    }

    public function insert(array $input)
    {
        $status = DB::insert("INSERT INTO $this->tableName
            (food_name, user_id, weight, price, stock, expiration_date, description)
            values (?, ?, ?, ?, ?, ?, ?)",
            [
                $input["name"],
                auth()->user()->getAuthIdentifier(),
                $input["weight"],
                $input["price"],
                $input["stock"],
                $input["expiration_date"],
                $input["description"]
            ]);
        return $status;
    }
}

