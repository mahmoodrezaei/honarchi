<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/admin';

    public function __construct()
    {
        $this->middleware('guest:staff, /admin')->except('logout');
    }

    public function redirectTo()
    {
        return '/admin';
    }

    protected function guard()
    {
        return Auth::guard('staff');
    }

    public function showLoginForm()
    {
        return view('panel.auth.login');
    }
}