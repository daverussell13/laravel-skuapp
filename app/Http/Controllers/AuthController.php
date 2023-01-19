<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Modules\User\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    private UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function loginPage()
    {
        return view("pages.login");
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        try {
            $this->service->authenticate($credentials);
        } catch (Exception $e) {
            return back()->with("error", $e->getMessage());
        }

        Auth::attempt($credentials);

        $request->session()->regenerate();
        return redirect()->intended("/");
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect("/login");
    }
}
