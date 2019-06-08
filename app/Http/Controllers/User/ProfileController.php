<?php

namespace App\Http\Controllers\User;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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

    public function show()
    {
        return response()->json([
            'user' => Auth::user(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // update user info
        $user = Auth::user();
        $user->update($request->all());

        return response()->json([
            'user' => $user
        ]);
    }

}
