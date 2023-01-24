<?php

namespace App\Modules\Transaction;

use Illuminate\Support\Facades\DB;
use App\Modules\Transaction\Transaction;

class TransactionRepository
{
    private \PDO $connection;

    public function __construct()
    {
        $this->connection = DB::connection()->getPdo();
    }

    public function getAllTransactionWithUser()
    {
        $query = <<<SQL
            SELECT
                t.id as id,
                t.created_at as time,
                t.user_id as user_id,
                u.name as user_name,
                t.total_price as total_price
            FROM transactions t
            INNER JOIN users u ON t.user_id = u.id
        SQL;

        $statement = $this->connection->prepare($query);
        $statement->execute();

        $transactions = [];
        try {
            while (($result = $statement->fetch())) {
                $transactions[] = new Transaction(
                    $result["id"],
                    $result["user_id"],
                    $result["user_name"],
                    $result["total_price"],
                    $result["time"]
                );
            }
        } finally {
            $statement->closeCursor();
        }

        return $transactions;
    }

    public function getTransactionById(int $id)
    {
        $query = <<<SQL
            SELECT
                t.id as id,
                t.created_at as time,
                t.user_id as user_id,
                u.name as user_name,
                t.total_price as total_price
            FROM transactions t
            INNER JOIN users u ON t.user_id = u.id AND t.id = ?
        SQL;

        $statement = $this->connection->prepare($query);
        $statement->execute([$id]);

        try {
            if (($result = $statement->fetch())) {
                return new Transaction(
                    $result["id"],
                    $result["user_id"],
                    $result["user_name"],
                    $result["total_price"],
                    $result["time"]
                );
            }
            else return null;
        } finally {
            $statement->closeCursor();
        }
    }

    public function getTransactionDetailsById(int $id)
    {
        $query = <<<SQL
            SELECT
                td.quantity as quantity,
                f.name as food_name,
                f.weight as food_weight,
                td.price as food_price
            FROM transaction_details td
            INNER JOIN foods f ON td.food_id = f.id AND td.transaction_id = ?
        SQL;

        $statement = $this->connection->prepare($query);
        $statement->execute([$id]);

        $transactionDetails = [];
        try {
            while (($result = $statement->fetch())) {
                $transactionDetails[] = new TransactionDetails(
                    $result["quantity"],
                    $result["food_name"],
                    $result["food_weight"],
                    $result["food_price"]
                );
            }
        } finally {
            $statement->closeCursor();
        }
        return $transactionDetails;
    }
}
