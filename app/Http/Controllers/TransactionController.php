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
}
