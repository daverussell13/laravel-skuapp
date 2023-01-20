<?php

namespace App\Modules\FrozenFood;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class FrozenFoodService
{
    private FrozenFoodRepository $repository;

    public function __construct(FrozenFoodRepository $repository)
    {
        $this->repository = $repository;
    }

     public function paginate($items, $perPage, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function getPaginatedData(int $perPage)
    {
        $data = $this->repository->selectAllFrozenFood();
        $paginatedData = $this->paginate($data, $perPage);
        return $paginatedData;
    }

    public function createNewFroozenFood(array $input)
    {
        $success = $this->repository->insert($input);
        if (!$success) throw new Exception("Failed to create new data");
    }
}

