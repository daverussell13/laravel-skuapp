<?php

namespace App\Modules\Transaction;

use App\Modules\Common\Helpers;

class TransactionService
{
    private TransactionRepository $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getPaginatedData(int $perPage)
    {
        $data = $this->repository->getAllTransaction();
        $paginatedData = Helpers::paginate($data, $perPage);
        return $paginatedData;
    }
}


