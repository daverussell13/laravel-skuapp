<?php

namespace App\Modules\Common;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class Helpers
{
    public static function nullStringToInt($str): ?int
    {
        if ($str !== null) return (int)$str;
        return null;
    }

    public static function clearCurrencyFormat($str): string
    {
        $str = str_ireplace("rp", '', $str);
        $str = str_ireplace(".", '', $str);
        $str = str_replace(" ", '', $str);
        return $str;
    }

    public static function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
