<?php

namespace App\Http\Controllers\API\Admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProduct;
use App\Http\Requests\Product\UpdateProduct;
use File;
use App\Product;
use DB;

class ProductController extends Controller
{

    public function index()
    {

    }

    public function store(StoreProduct $request)
    {
        $request->validated();


    }
}
