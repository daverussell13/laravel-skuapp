<?php

namespace App\Modules\FrozenFood;

use App\Modules\Common\Helpers;
use Exception;

class FrozenFoodService
{
    private FrozenFoodRepository $repository;

    public function __construct(FrozenFoodRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getPaginatedData(int $perPage)
    {
        $data = $this->repository->getAllFrozenFood();
        $paginatedData = Helpers::paginate($data, $perPage);
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

    public function softDelete(int $id)
    {
        $success = $this->repository->softDeleteById($id);
        if (!$success) throw new Exception("Failed to delete data");
    }

    public function searchRepositoryMapper(string $colName, ?string $keyword)
    {
        $data = [];
        $keyword ?? $keyword = "";
        switch($colName) {
            case "name":
                $data = $this->repository->getLikeCol("name", $keyword);
                break;
            case "weight":
                $data = $this->repository->getLikeCol("weight", $keyword);
                break;
            case "price":
                $keyword = Helpers::clearCurrencyFormat($keyword);
                $data = $this->repository->getLikeCol("price", $keyword);
                break;
            case "stock":
                $data = $this->repository->getLikeCol("stock", $keyword);
                break;
            case "expiration":
                $data = $this->repository->getByDate($keyword);
                break;
            case "description":
                $data = $this->repository->getLikeCol("description", $keyword);
                break;
            default:
                break;
        }
        return $data;
    }

    public function searchByColName(array $input)
    {
        $colName = $input["colname"];
        $keyword = $input["keyword"];
        $data = $this->searchRepositoryMapper($colName, $keyword);
        $paginatedData = Helpers::paginate($data);
        return $paginatedData;
    }
}

