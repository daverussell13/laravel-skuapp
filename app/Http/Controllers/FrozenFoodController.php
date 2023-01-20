<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Modules\FrozenFood\FrozenFoodService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrozenFoodController extends Controller
{
    private FrozenFoodService $service;

    public function __construct(FrozenFoodService $service)
    {
        $this->service = $service;
    }

    public function table(Request $request)
    {
        $foods = $this->service->getPaginatedData(5);
        $foods->setPath('/table');
        return view('pages.table', compact('foods'));
    }
}
