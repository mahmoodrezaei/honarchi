<?php

namespace App\Http\Controllers\User;

use App\Address;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function index()
    {
        return response()->json([
            'addresses' => auth()->user()->addresses
        ]);
    }

    public function update(Request $request, Address $address)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'province' => 'required',
            'city' => 'required',
            'postal_address' => 'required',
            'postal_code' => 'required',
        ]);

        if ($request->user()->id == $address->user_id) {

            $address->update([
                'full_name' => $request->full_name,
                'phone' => $request->phone,
                'province' => $request->province,
                'city' => $request->city,
                'postal_address' => $request->postal_address,
                'postal_code' => $request->postal_code
            ]);

            return response()->json([
                'address' => $address,
                'message' => 'آدرس با موفقیت ویرایش شد'
            ]);
        }

        return response()->json([
            'message' => 'خطایی رخ داده است'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'province' => 'required',
            'city' => 'required',
            'postal_address' => 'required',
            'postal_code' => 'required',
        ]);

        $address = auth()->user()->addresses()->create([
            'full_name' => $request->full_name,
            'phone' => $request->phone,
            'province' => $request->province,
            'city' => $request->city,
            'postal_address' => $request->postal_address,
            'postal_code' => $request->postal_code
        ]);

        return response()->json([
            'address' => $address,
            'message' => 'آدرس جدید با موفقیت اضافه شد'
        ]);
    }

    public function destroy(Address $address)
    {
        if (auth()->user()->id == $address->user_id) {
            $address->delete();

            return response()
                ->json([
                    'message' => 'آدرس با موفقیت حذف شد'
                ]);
        }

        return response()
            ->json([
                'message' => 'خطایی رخ داده است'
            ]);
    }
}
