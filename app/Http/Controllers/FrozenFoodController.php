<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrozenFoodController extends Controller
{
    public function table()
    {
        return view("pages.table");
    }
}
