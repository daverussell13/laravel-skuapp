<?php

namespace App\Modules\FrozenFood;

use Exception;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Mockery\CountValidator\Exact;

use function PHPUnit\Framework\returnSelf;

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

    public function getDataById(int $id)
    {
        $data = $this->repository->getById($id)[0];
        if (!$data || $data === []) throw new Exception("No records match");
        return $data;
    }

    public function update(array $input, int $id)
    {
        $success = $this->repository->update($input, $id);
        if (!$success) throw new Exception("Failed to update data");
    }
}

