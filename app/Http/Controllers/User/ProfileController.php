<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('public.profile.profile');
    }

    public function getUserInfo()
    {
        return response()->json([
            'user' => Auth::user(),
        ]);
    }

    public function updateUserInfo()
    {

    }

}
