<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AvatarController extends Controller
{
    public function store()
    {
        request()->validate([
            'avatar' => 'required|image'
        ]);

        if ($avatar = auth()->user()->avatar_path != null) {
            explode('/', $avatar);
            Storage::disk('public')->delete(auth()->user()->avatar_path);
        }

        auth()->user()->update([
            'avatar_path' => \request()->file('avatar')->store('avatars', 'public')
        ]);

        return response()->json([
            'message' => 'تصویر شما با موفقیت بروزرسانی شد',
            'avatar' => auth()->user()->avatar_path,
        ], 200);
    }
}
