<?php

namespace App\Modules\FrozenFood;

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
            WHERE id = ? AND deleted_at IS NULL", [$id]);
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

    public function getByDate(string $date)
    {
        $result = DB::select("SELECT * FROM $this->tableName
            WHERE expiration_date = ? AND deleted_at IS NULL", [$date]);
        return $result;
    }

    public function insert(array $input)
    {
        $status = DB::insert("INSERT INTO $this->tableName
            (name, user_id, weight, price, stock, expiration_date, description)
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
            SET name = ?, weight = ?, price = ?, stock = ?, expiration_date = ?, description = ?, updated_at = ?
            WHERE id = ?",
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
            SET deleted_at = ? WHERE id = ?",
            [
                Carbon::now()->toDateTimeString(),
                $id
            ]);
        return $status;
    }
}

