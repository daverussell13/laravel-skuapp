<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $foods = $this->service->getPaginatedData(5);
        $foods->setPath('/transaction/table');
        return view('pages.transaction.table', compact('foods'));
    }
}
