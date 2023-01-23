<?php

namespace App\Modules\Transaction;

use Illuminate\Support\Facades\DB;

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
                t.created_at as date,
                t.user_id as user_id,
                u.name as user_name,
                u.email as user_email
            FROM transactions t
            INNER JOIN users u ON t.user_id = u.id
        SQL;

        $statement = $this->connection->prepare($query);
        $statement->execute();

        return $statement->fetchAll();
    }
}
