<?php

namespace App\Http\Controllers;

use App\Modules\Transaction\TransactionService;

class TransactionController extends Controller
{
    private TransactionService $service;

    public function __construct(TransactionService $service)
    {
        $this->service = $service;
    }

    public function table()
    {
        $transactions = $this->service->getPaginatedData(5);
        $transactions->setPath("/transaction/table");
        return view("pages.transaction.table", compact("transactions"));
    }

    public function detail($id)
    {
        try {
            $transaction = $this->service->getSingleTransaction($id);
            $transactionDetails = $this->service->getRelatedTransactionDetails($id);
            return view("pages.transaction.detail", compact(["transaction", "transactionDetails"]));
        } catch (\Exception $err) {
            abort(404);
        }
    }

    public function createForm()
    {
        return view("pages.transaction.add");
    }
}
