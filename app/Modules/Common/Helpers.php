<?php

namespace App\Modules\Common;

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
}
