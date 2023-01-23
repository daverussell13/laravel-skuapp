<?php

namespace App\Modules\Transaction;

use Illuminate\Support\Facades\DB;

class TransactionRepository
{
    private $tableName = "transactions";

    public function getAllTransaction()
    {
        $result = DB::select("SELECT * FROM $this->tableName
            WHERE deleted_at IS NULL");
        return $result;
    }
}


