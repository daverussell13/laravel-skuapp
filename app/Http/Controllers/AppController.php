<?php

namespace App\Http\Controllers;

class AppController extends Controller
{
    public function dashboardPage()
    {
        return view("pages.dashboard");
    }
}
