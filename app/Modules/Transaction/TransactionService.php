<?php

namespace App\Modules\Transaction;

use App\Modules\Transaction\TransactionRepository;
use App\Modules\Common\Helpers;
use Yajra\DataTables\Exceptions\Exception;

class TransactionService
{
    private TransactionRepository $repository;

    public function __construct(TransactionRepository $repo)
    {
        $this->repository = $repo;
    }

    public function getPaginatedData($perPage)
    {
        $data = $this->repository->getAllWithUser();
        $paginatedData = Helpers::paginate($data, $perPage);
        return $paginatedData;
    }

    public function getSingleTransaction($id)
    {
        $transaction = $this->repository->getById($id);
        if (!$transaction)
            throw new Exception("Transaction not found");
        return $transaction;
    }

    public function getRelatedTransactionDetails($transactionId)
    {
        return $this->repository->getDetailsById($transactionId);
    }
}
