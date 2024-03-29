<?php

namespace App\Http\Controllers\API\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GalleryController extends Controller
{

    public function index(Request $request)
    {
        $galleries = Gallery::orderBy('updated_at', 'DESC')->get();

        if ($request['blocked']) {
            $galleries = Gallery::where('state', -1)->orderBy('updated_at', 'DESC')->get();
        } elseif ($request['unapproved']) {
            $galleries = Gallery::where('state', 0)->orderBy('updated_at', 'DESC')->get();
        }


        $data = [
            'galleries' => $galleries,
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'gallery_name' => 'required|unique:galleries',
            'location' => 'required',
            'type' => 'required'
        ]);

        $gallery = Gallery::create($request->only([
            'owner_id',
            'gallery_name',
            'location',
            'type'
        ]));

        // Galleries created by SuperAdmin are approved by default
        $gallery->update([
            'state' => 1
        ]);

        $data = [
            'message' => 'گالری با موفقیت ایجاد شد',
            'status_code' => 201,
            'gallery' => $gallery
        ];

        return response()->json($data, 201);
    }

    public function show(Gallery $gallery)
    {
        $data = [
            'gallery' => $gallery,
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'gallery_name' => 'required',
            'location' => 'required',
            'type' => 'required'
        ]);

        $gallery->update($request->only([
            'gallery_name',
            'location',
            'type'
        ]));

        $data = [
            'message' => 'گالری با موفقیت بروزرسانی شد',
            'gallery' => $gallery,
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }

    public function approveGallery(Gallery $gallery)
    {
        $gallery->update(['state' => 1]);

        $data = [
            'message' => 'گالری با موفقیت تایید شد',
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }

    public function blockGallery(Gallery $gallery)
    {
        $gallery->update(['state' => -1]);

        $data = [
            'message' => 'گالری با موفقیت مسدود شد',
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }

    public function unblockGallery(Gallery $gallery)
    {
        $gallery->update(['state' => 1]);

        $data = [
            'message' => 'گالری با موفقیت باز شد',
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }
}
