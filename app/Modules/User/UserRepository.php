<?php

namespace App\Modules\User;

use Exception;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    private $tableName = "users";

    private $selectColumns = [
        "users.id",
        "users.role_id",
        "users.name",
        "users.email",
        "users.password",
        "users.phone_number AS phoneNumber",
        "users.address",
        "users.created_at AS createdAt",
        "users.updated_at AS updatedAt",
        "users.deleted_at AS deletedAt",
    ];

    public function getUserByEmail(string $email): User
    {
        $selectCol = implode(", ", $this->selectColumns);

        $result = json_decode(json_encode(
            DB::selectOne("SELECT $selectCol
                FROM {$this->tableName}
                WHERE email = :email AND deleted_at IS NULL
            ", [
                "email" => $email
            ])
        ));

        if ($result === null) throw new Exception("Wrong credentials");
        return UserMapper::mapFrom($result);
    }
}

