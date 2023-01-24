<?php

namespace App\Modules\Transaction;

use App\Modules\Transaction\TransactionRepository;
use App\Modules\FrozenFood\FrozenFoodRepository;
use App\Modules\Common\Helpers;
use Illuminate\Support\Facades\DB;

class TransactionService
{
    private TransactionRepository $repository;
    private FrozenFoodRepository $foodRepository;

    public function __construct(TransactionRepository $repo, FrozenFoodRepository $foodRepo)
    {
        $this->repository = $repo;
        $this->foodRepository = $foodRepo;
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
            throw new \Exception("Transaction not found");
        return $transaction;
    }

    public function getRelatedTransactionDetails($transactionId)
    {
        return $this->repository->getDetailsById($transactionId);
    }

    public function addNewTransaction($items, $total_price)
    {
        DB::beginTransaction();
        try {
            $id = $this->repository->insert($total_price);
            if (!$id) throw new \Exception("Failed to create new transaction");
            foreach ($items as $item) {
                $this->foodRepository->decrementStock($item["food_id"], $item["food_qty"]);
                $status = $this->repository->insertDetails($id, $item);
                if (!$status) throw new \Exception("Failed to create new transaction");
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
    }
}
