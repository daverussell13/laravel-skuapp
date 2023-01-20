<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFoodRequest;
use App\Modules\FrozenFood\FrozenFoodService;
use Exception;
use Illuminate\Http\Request;

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
        $foods->setPath('/food/table');
        return view('pages.table', compact('foods'));
    }

    public function addFormInput(Request $request)
    {
        return view("pages.add");
    }

    public function add(CreateFoodRequest $request)
    {
        $data = $request->validated();
        try {
            $this->service->createNewFroozenFood($data);
            return redirect()->back()->with("success", "Data has been successfully created");
        } catch (Exception $err) {
            return redirect()->back()->with("error", $err->getMessage());
        }
    }
}
