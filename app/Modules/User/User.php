<?php

namespace App\Modules\User;

class User
{
    public $id;
    public $role_id;
    public $name;
    public $email;
    public $password;
    public $phoneNumber;
    public $address;
    public $createdAt;
    public $updatedAt;
    public $deletedAt;

    public function __construct(
        $id,
        $name,
        $email,
        $password,
        $phoneNumber,
        $address,
        $createdAt,
        $updatedAt,
        $deletedAt
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->phoneNumber = $phoneNumber;
        $this->address = $address;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->deletedAt = $deletedAt;
    }

    public function toArray(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "phoneNumber" => $this->phoneNumber,
            "address" => $this->address,
            "createdAt" => $this->createdAt,
            "updatedAt" => $this->updatedAt,
            "deletedAt" => $this->deletedAt
        ];
    }

    public function toSQL(): array
    {
        return [
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "phone_number" => $this->phoneNumber,
            "address" => $this->address,
            "created_at" => $this->createdAt,
            "updated_at" => $this->updatedAt,
            "deleted_at" => $this->deletedAt
        ];
    }
}


