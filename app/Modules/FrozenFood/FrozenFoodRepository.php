<?php

namespace App\Modules\FrozenFood;

use Illuminate\Support\Facades\DB;

class FrozenFoodRepository
{
    private $tableName = "foods";

    public function selectAllFrozenFood()
    {
        $result = DB::select("select * from foods");
        return $result;
    }
}

