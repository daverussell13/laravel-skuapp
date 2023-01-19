<?php

namespace App\Modules\User;

use App\Modules\Common\Helpers;

class UserMapper
{
    public static function mapFrom (object $data): User
    {
        return new User(
            Helpers::nullStringToInt($data->id ?? null),
            $data->name,
            $data->email,
            $data->password,
            $data->phoneNumber,
            $data->address,
            $data->createdAt ?? date("Y-m-d H:i:s"),
            $data->updatedAt ?? null,
            $data->deletedAt ?? null
        );
    }
}

