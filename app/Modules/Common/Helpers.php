<?php

namespace App\Modules\Common;

abstract class Helpers
{
    public static function nullStringToInt($str): ?int
    {
        if ($str !== null) return (int)$str;
        return null;
    }
}
