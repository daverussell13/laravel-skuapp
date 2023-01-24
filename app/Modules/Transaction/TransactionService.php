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
        $data = $this->repository->getAllTransactionWithUser();
        $paginatedData = Helpers::paginate($data, $perPage);
        return $paginatedData;
    }

    public function getSingleTransaction(int $id)
    {
        $transaction = $this->repository->getTransactionById($id);
        if (!$transaction)
            throw new Exception("Transaction not found");
        return $transaction;
    }

    public function getRelatedTransactionDetails(int $transactionId)
    {
        $transactionDetails = $this->repository->getTransactionDetailsById($transactionId);
        return $transactionDetails;
    }
}
