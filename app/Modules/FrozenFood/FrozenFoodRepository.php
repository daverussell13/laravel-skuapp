<?php

namespace App\Modules\FrozenFood;

use App\Modules\Common\Helpers;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FrozenFoodRepository
{
    private $tableName = "foods";

    public function getAllFrozenFood()
    {
        $result = DB::select("SELECT * FROM $this->tableName
            WHERE deleted_at IS NULL");
        return $result;
    }

    public function getById(int $id)
    {
        $result = DB::select("SELECT * FROM $this->tableName
            WHERE food_id = ? AND deleted_at IS NULL", [$id]);
        return $result;
    }

    public function getLikeCol(string $colname, string $keyword)
    {
        $result = DB::select(
            DB::raw("SELECT * FROM $this->tableName WHERE $colname LIKE ? AND deleted_at IS NULL"),
            ['%' . $keyword . '%']
        );
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

    public function update(array $input, int $id)
    {
        $status = DB::update("UPDATE $this->tableName
            SET food_name = ?, weight = ?, price = ?, stock = ?, expiration_date = ?, description = ?, updated_at = ?
            WHERE food_id = ?",
            [
                $input["name"],
                $input["weight"],
                $input["price"],
                $input["stock"],
                $input["expiration_date"],
                $input["description"],
                Carbon::now()->toDateTimeString(),
                $id
            ]);
        return $status;
    }

    public function softDeleteById(int $id)
    {
        $status = DB::update("UPDATE $this->tableName
            SET deleted_at = ? WHERE food_id = ?",
            [
                Carbon::now()->toDateTimeString(),
                $id
            ]);
        return $status;
    }
}

