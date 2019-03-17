<?php

namespace App\Http\Controllers\API\Admin;

use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
            'owner_id' => 'unique:galleries',
            'gallery_name' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'unique:galleries|required|email',
            'phone_number' => 'unique:galleries|required',
            'location' => 'required',
            'type' => 'required'
        ]);

        $gallery = Gallery::create($request->only([
            'owner_id',
            'gallery_name',
            'first_name',
            'last_name',
            'email',
            'phone_number',
            'location',
            'type'
        ]));

        // Galleries created by SuperAdmin are approved by default
        $gallery->update([
            'state' => 1
        ]);

        $data = [
            'message' => 'Gallery created',
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
            'first_name' => 'required',
            'last_name' => 'required',
            'location' => 'required',
            'email' => 'required|unique:galleries,email,' . $gallery->id,
            'phone_number' => 'required|unique:galleries,phone_number,' . $gallery->id,
            'type' => 'required'
        ]);

        $gallery->update($request->all());

        $data = [
            'gallery' => $gallery,
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }

    public function approveGallery(Gallery $gallery)
    {
        $gallery->update(['state' => 1]);

        $data = [
            'message' => 'Gallery approved',
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }

    public function blockGallery(Gallery $gallery)
    {
        $gallery->update(['state' => -1]);

        $data = [
            'message' => 'Gallery is blocked',
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }

    public function unblockGallery(Gallery $gallery)
    {
        $gallery->update(['state' => 1]);

        $data = [
            'message' => 'Gallery is unblocked',
            'status_code' => 200
        ];

        return response()->json($data, 200);
    }
}
