<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AvatarController extends Controller
{
    public function store()
    {
        request()->validate([
            'avatar' => 'required|image'
        ]);

        if (($avatar = auth()->user()->avatar_path) != null) {
            $avatar_link_parts = explode('/', $avatar);
            Storage::disk('public')
                ->delete($avatar_link_parts[2] . '/' . $avatar_link_parts[3]);
        }

        auth()->user()->update([
            'avatar_path' => \request()
                ->file('avatar')
                ->storeAs('avatars',
                    Str::random(30) . '.' . \request()->file('avatar')->getClientOriginalExtension()  ,
                    'public'
                )
        ]);

        return response()->json([
            'message' => 'تصویر شما با موفقیت بروزرسانی شد',
            'avatar' => auth()->user()->avatar_path,
            'avatar_parts' => $avatar_link_parts
        ], 200);
    }
}
