<?php

namespace App\Modules\Transaction;

use App\Modules\Transaction\TransactionRepository;
use App\Modules\Common\Helpers;

class TransactionService
{
    private TransactionRepository $repository;

    public function __construct(TransactionRepository $repo)
    {
        $this->repository = $repo;
    }

    public function getPaginatedData($perPage)
    {
        $data = $this->repository->getAllTransactionWithUser();
        $paginatedData = Helpers::paginate($data, $perPage);
        return $paginatedData;
    }
}
